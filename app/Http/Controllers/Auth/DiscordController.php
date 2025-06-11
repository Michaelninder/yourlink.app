<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;

class DiscordController extends Controller
{
    protected $clientId;
    protected $clientSecret;
    protected $redirectUri;

    public function __construct()
    {
        $this->clientId = config('services.discord.client_id');
        $this->clientSecret = config('services.discord.client_secret');
        $this->redirectUri = config('services.discord.redirect');
    }

    // Redirect to Discords Auth Page
    public function redirect()
    {
        $query = http_build_query([
            'client_id'     => $this->clientId,
            'redirect_uri'  => $this->redirectUri,
            'response_type' => 'code',
            'scope'         => 'identify email',
            'prompt'        => 'consent',
        ]);

        return redirect("https://discord.com/api/oauth2/authorize?$query");
    }

    // Handle callback from Discord
    public function callback(Request $request)
    {
        $code = $request->input('code');

        if (!$code) {
            return redirect('/login')->withErrors('No code returned from Discord.');
        }

        // Exchange code for access token
        $response = Http::asForm()->post('https://discord.com/api/oauth2/token', [
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type'    => 'authorization_code',
            'code'          => $code,
            'redirect_uri'  => $this->redirectUri,
            'scope'         => 'identify email',
        ]);

        if ($response->failed()) {
            return redirect('/login')->withErrors('Failed to get access token from Discord.');
        }

        $tokenData = $response->json();

        $accessToken = $tokenData['access_token'];

        // Get user info from Discord
        $userResponse = Http::withHeaders([
            'Authorization' => "Bearer $accessToken",
        ])->get('https://discord.com/api/users/@me');

        if ($userResponse->failed()) {
            return redirect('/login')->withErrors('Failed to get user info from Discord.');
        }

        $discordUser = $userResponse->json();

        // Find or create user
        $user = User::firstOrCreate(
            ['discord_id' => $discordUser['id']],
            [
                'id'     => Str::uuid(),
                'email'    => $discordUser['email'] ?? $discordUser['id'] . '@discord.local',
                'role'     => 'user',
                'plan'     => 'free',
                'password' => null,
            ]
        );

        Auth::login($user, true);

        return redirect()->route('pages.home');
    }
}
