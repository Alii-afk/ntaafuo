<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\ListRoom;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();
        $email = $user->email;
        $userType = $user->userType;

        // Set a session value



        $existingProfile = Profile::where('email', $email)->first();
        $existingList = ListRoom::where('email', $email)->first();

        if ($existingProfile) {
            if ($userType == "lessor") {
                if ($existingList) {
                    Session::put('new_login', '1');
                    return redirect()->intended(RouteServiceProvider::HOME);
                } else {
                    return redirect()->route('ListRoom.create');
                }
            } else {
                Session::put('new_login', '1');
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        } else {
            return redirect()->route('profile.create');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
