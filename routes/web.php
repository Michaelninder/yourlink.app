<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\RegisterController as AuthRegisterController;
use App\Http\Controllers\Auth\DiscordController as AuthDiscordController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public routes
Route::get('/', [PageController::class, 'home'])->name('pages.home');
Route::get('/create', [LinkController::class, 'create'])->name('links.create');
Route::post('/store', [LinkController::class, 'store'])->name('links.store');

// Auth routes
Route::get('/login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthLoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');

Route::get('/register', [AuthRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthRegisterController::class, 'register']);

Route::get('/auth/discord/redirect', [AuthDiscordController::class, 'redirect'])->name('discord.redirect');
Route::get('/auth/discord/callback', [AuthDiscordController::class, 'callback'])->name('discord.callback');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'overview'])->name('dashboard.user');
    Route::get('/dashboard/links', [DashboardController::class, 'links'])->name('dashboard.links');

    Route::get('/account/settings', [SettingsController::class, 'edit'])->name('account.settings');
    Route::post('/account/settings', [SettingsController::class, 'update'])->name('account.settings.update');

    Route::middleware('is_admin')->group(function () {
        Route::get('/admin', [DashboardController::class, 'overviewAdmin'])->name('dashboard.admin');
        Route::get('/admin/links', [DashboardController::class, 'linksAdmin'])->name('admin.links');
    });
});

// Legal
Route::get('legal/{section}', [LegalController::class, 'show'])->name('legal.show');

// Link redirection
Route::get('/{shortCode}', [LinkController::class, 'show'])->name('links.redirect');
