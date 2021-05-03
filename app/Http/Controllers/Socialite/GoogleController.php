<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->getId())->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect()->route('home');
            } else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getemail(),
                    'google_id' => $user->getId(),
                ]);

                Auth::login($newUser);
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            return redirect()->route('register')->withErrors('Email tersebut sudah pernah terdaftar, silahkan daftar email lain.')->withInput();
        }
    }
}
