<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ThemeController extends Controller
{
    public function light($theme)
    {
        $raw_theme = $theme;

        if (in_array($raw_theme, Config::get('app.themes'))) {
            $theme = $raw_theme;
        } else {
            $theme = Config::get('app.theme');
        }

        session(['theme' => $theme]);

        return redirect()->back();
    }

    public function dark($theme)
    {
        $raw_theme = $theme;

        if (in_array($raw_theme, Config::get('app.themes'))) {
            $theme = $raw_theme;
        } else {
            $theme = Config::get('app.theme');
        }

        session(['theme_dark' => $theme]);

        return redirect()->back();
    }
}
