<?php

namespace App\Http\Controllers;

class LocalesController extends Controller
{

    public function change($changeToLocale)
    {
        session(['app_locale' => $changeToLocale]);
        return redirect('home')->with('success', 'Locale changed to ' . $changeToLocale);
    }

}
