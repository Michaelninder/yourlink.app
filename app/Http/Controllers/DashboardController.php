<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;
use App\Models\View;

class DashboardController extends Controller
{
    public function user()
    {
        $user = Auth::user();

        return view('dashboard.user', [
            'user' => $user,
            'links_count' => $user->links()->count() ?? 0,
            'views_count' => $user->views()->count() ?? 0,
        ]);
    }

    public function admin()
    {
        return view('dashboard.admin', [
            'users_count' => User::count(),
            'links_count' => Link::count(),
            'views_count' => View::count(),
        ]);
    }
}
