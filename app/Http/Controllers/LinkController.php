<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use App\Models\View;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = Link::where('user_id', $user->id);

        if ($search = $request->get('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('original_url', 'like', "%{$search}%")
                  ->orWhere('short_code', 'like', "%{$search}%");
            });
        }

        $links = $query->withCount('views')->latest()->paginate(10);

        return view('links.index', compact('links', 'search'));
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
            'custom_code' => 'nullable|alpha_dash|unique:links,short_code',
            'uuid_type' => 'nullable|in:uuid,short',
        ]);

        $user = Auth::user();
        $uuidType = $request->input('uuid_type', 'uuid');

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

        return redirect()->route('dashboard.links')->with('success', 'Link created!');
    }

    protected function generateShortUuid(): string
    {
        return Str::lower(Str::random(8));
    }

    public function show($uuid)
    {
        $link = Link::where('id', $uuid)->firstOrFail();

        View::create([
            'link_id' => $link->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return redirect()->away($link->original_url);
    }
}
