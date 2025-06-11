<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SettingsController extends Controller
{
    public function edit()
    {
        return view('account.settings');
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'The current password is incorrect.',
            ]);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('account.settings')->with('success', 'Password updated successfully.');
    }
}
