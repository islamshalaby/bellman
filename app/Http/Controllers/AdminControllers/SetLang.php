<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetLang extends Controller
{
    public function index($lang) {
        if (in_array($lang, ['en', 'ar'])) {
            if (auth()->user()) {
                $user = auth()->user();
                $user->lang = $lang;
                $user->save();
            }else {
                if (session()->has('lang')) {
                    session()->forget('lang');
                }
                session()->put('lang', $lang);
            }
        }else {
            if (auth()->user()) {
                $user = auth()->user();
                $user->lang = 'en';
                $user->save();
            }else {
                if (session()->has('lang')) {
                    session()->forget('lang');
                }
                session()->put('lang', $lang);
            }
            session()->put('lang', 'en');
        }

        return redirect()->back();
    }
}
