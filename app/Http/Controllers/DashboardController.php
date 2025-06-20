<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;
use App\Models\View;

class DashboardController extends Controller
{
    public function overview()
    {
        $user = Auth::user();

        return view('dashboard.overview', [
            'user' => $user,
            'links_count' => $user->links()->count(),
            'views_count' => $user->views()->count(),
        ]);
    }

    public function overviewAdmin()
    {
        return view('admin.overview', [
            'users_count' => User::count(),
            'links_count' => Link::count(),
            'views_count' => View::count(),
        ]);
    }

    public function links()
    {
        $user = Auth::user();

        return view('dashboard.links', [
            'user' => $user,
            'links_count' => $user->links()->count(),
            'views_count' => $user->views()->count(),
            'links' => $user->links()->with('views')->paginate(8),
        ]);
    }

    public function linksAdmin()
    {
        return view('admin.links', [
            'users' => User::all(),
            'links_count' => Link::count(),
            'views_count' => View::count(),
            'links' => Link::with('user', 'views')->paginate(10),
            'views' => View::latest()->take(20)->get(),
        ]);
    }
}
