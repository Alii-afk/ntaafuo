<?php

namespace App\Http\Controllers;

use App\Models\ListRoom;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class ListRoomController extends Controller
{
    public function create()
    {
         $user = auth()->user();
        $email = $user->email;

        $existingProfile = ListRoom::where('email', $email)->first();

        if ($existingProfile) {
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return view('list-room');
        }
       
    }

    public function check()
    {
        $user = auth()->user();
        $email = $user->email;

        $existingProfile = ListRoom::where('email', $email)->first();

        if ($existingProfile) {
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return redirect()->route('ListRoom.create');
        }
    }
    
}
