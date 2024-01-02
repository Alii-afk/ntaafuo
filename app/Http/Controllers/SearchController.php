<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\ListRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function showResult(Request $request)
    {
        $user = auth()->user();
        $email = $user->email;
        $userType = $user->userType;
        $city = $request->input('city');
        $town = $request->input('town');
        $type = $request->input('type');

        if ($type == "lessee") {
            $usersToShow = User::join('profiles', 'users.email', '=', 'profiles.email')
                ->where('users.userType', '=', 'lessee')
                ->where('profiles.activeStatus', '=', 'on')
                ->where('profiles.city', '=', $city)
                ->where('profiles.town', '=', $town)
                ->select('profiles.*') // Select profile columns
                ->get();

            return response()->json(['users' => $usersToShow, 'userType' => $type]);
        } else if ($type == "lessor") {

            $usersToShow = Profile::join('users', 'profiles.email', '=', 'users.email')
                ->join('list_rooms', 'users.email', '=', 'list_rooms.email') // Join with list_rooms table
                ->where('users.userType', '=', 'lessor')
                ->where('profiles.activeStatus', '=', 'on')
                ->where('list_rooms.city', '=', $city)
                ->where('list_rooms.town', '=', $town)
                ->get(['profiles.*', 'list_rooms.*']);

            return response()->json(['users' => $usersToShow, 'userType' => $type]);
        }
    }
}
