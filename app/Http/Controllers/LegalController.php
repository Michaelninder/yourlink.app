<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function show(string $section)
    {
        $section = Str::slug($section);

        if (!in_array($section, ['terms', 'privacy', 'imprint', 'cookie'])) {
            abort(404);
        }

        return view('legal.show', [
            'section' => $section,
            'content' => trans("legal.$section"),
        ]);
    }
}
