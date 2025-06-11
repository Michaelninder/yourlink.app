<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use App\Models\View;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::when(Auth::check(), function ($query) {
            return $query->where('user_id', Auth::id());
        })->get();

        return view('links.index', compact('links'));
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
            'custom_code'   => 'nullable|alpha_dash|unique:links,short_code',
            'uuid_type'     => 'nullable|in:uuid,short',
        ]);

        $user = Auth::user();
        $uuidType = $request->input('uuid_type', 'uuid');

        // Prevent guests from choosing short
        if (!$user && $uuidType === 'short') {
            $uuidType = 'uuid';
        }

        $link = new Link();
        $link->id = Str::uuid();
        $link->original_url = $request->original_url;

        if ($user) {
            $link->user_id = $user->id;

            if ($user->plan === 'premium' && $request->filled('custom_code')) {
                $link->short_code = $request->custom_code;
                $link->is_custom = true;
            } else {
                $link->short_code = $uuidType === 'short' ? $this->generateShortUuid() : (string) Str::uuid();
            }
        } else {
            $link->short_code = (string) Str::uuid();
        }

        $link->save();

        if (!$user) {
            return view('links.guest-success', compact('link'));
        }

        return redirect()->route('links.index')->with('success', 'Link created!');
    }

    protected function generateShortUuid(): string
    {
        return Str::lower(Str::random(8));
    }

    /*
	public function show($shortCode)
    {
        $link = Link::where('short_code', $shortCode)->firstOrFail();
        return redirect()->away($link->original_url);
    }
	*/
	
	public function show($uuid)
	{
	    $link = Link::where('id', $uuid)->firstOrFail();
	
	    // Record a view
	    View::create([
	        'link_id' => $link->id,
	        'ip_address' => request()->ip(),
	        'user_agent' => request()->userAgent(),
	    ]);
	
	        return redirect()->away($link->original_url);
	}
}
