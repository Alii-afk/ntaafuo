<?php

namespace App\Http\Controllers;

use App\Models\ListRoom;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function showDashboard()
    {
        $user = auth()->user();
        $email = $user->email;
        $userType = $user->userType;
        if (isset($_GET['type'])) {
        $type = $_GET['type'];
        }
        else{
            $type = "";
        }

        if($type == "room")
        {
            $usersToShow = Profile::join('users', 'profiles.email', '=', 'users.email')
                        ->join('list_rooms', 'users.email', '=', 'list_rooms.email') // Join with list_rooms table
                        ->where('users.userType', '=', 'lessor')
                        ->where('profiles.activeStatus', '=', 'on')
                        ->get(['profiles.*', 'list_rooms.*']); // Retrieve columns from both profiles and list_rooms tables
        }
        else if($type == "roomie")
        {
            $usersToShow = User::join('profiles', 'users.email', '=', 'profiles.email')
                        ->where('users.userType', '=', 'lessee')
                        ->where('profiles.activeStatus', '=', 'on')
                        ->select('profiles.*') // Select profile columns
                        ->get();
        }
        else
        {
            if ($userType === 'lessor') {
                    $usersToShow = User::join('profiles', 'users.email', '=', 'profiles.email')
                        ->where('users.userType', '=', 'lessee')
                        ->where('profiles.activeStatus', '=', 'on')
                        ->select('profiles.*') // Select profile columns
                        ->get();
                } else {
                    $usersToShow = Profile::join('users', 'profiles.email', '=', 'users.email')
                        ->join('list_rooms', 'users.email', '=', 'list_rooms.email') // Join with list_rooms table
                        ->where('users.userType', '=', 'lessor')
                        ->where('profiles.activeStatus', '=', 'on')
                        ->get(['profiles.*', 'list_rooms.*']); // Retrieve columns from both profiles and list_rooms tables
        
                }
        }
        

        return view('dashboard', ['users' => $usersToShow, 'userType' => $userType]);
    }

    public function showUserDetails($email)
    {

        $user = auth()->user();
        $userType = $user->userType;

            $user1 = User::where('email', $email)->first();
            $UserType1 = $user1->userType;

            if (!$user1) {
                return view('login');  // User not found, you can customize the response here

            }

            if ($UserType1 == "lessee") {
               $profile = Profile::where('email', $email)->first();
                return view('detail', ['user' => $user1, 'profile' => $profile]);
            }

            if ($UserType1 == "lessor") {
                $profile = Profile::where('email', $email)->first();

                $room = ListRoom::where('email', $email)->first();
    
                if (!$room) {
                    return view('abort', ['Message' => "User Might have not listed Room Yet."]);
                }
            }

            return view('detail', ['user' => $user1, 'profile' => $profile, 'room' => $room]);
        
    }

    public function showTelephoneDetails($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            abort(404); // User not found, customize the response as needed
        }

        $profile = Profile::where('email', $email)->first();

        return response()->json([
            'telephoneNo' => $profile->telephoneNo,
        ]);
    }

    public function incrementRevealsDetails()
    {
        $user = auth()->user();
        $email = $user->email;

        if (!$user) {
            abort(404); // User not found, customize the response as needed
        }

        $profile = Profile::where('email', $email)->first();
        $profile->increment('noOfReveals');

        return response()->json([
            'Response' => "Success",
        ]);
    }

    public function getLogginedProfile()
    {

        $user = auth()->user();
        $email = $user->email;
        $profile = Profile::where('email', $email)->first();

        return response()->json(['loginUser' => $profile]);
    }

    public function showWelcome()
    {
        $user = auth()->user();
        if($user)
        {
            $email = $user->email;
            $userType = $user->userType;
    
            $existingProfile = Profile::where('email', $email)->first();
            $existingList = ListRoom::where('email', $email)->first();
    
            if ($existingProfile) {
                if ($userType == "lessor") {
                    if ($existingList) {
                        $profiles = Profile::orderBy('created_at', 'desc')->limit(20)->get();
                        $length = $profiles->count();
                        return view('welcome', ['profiles' => $profiles, 'length' => $length]);
                    } else {
                        return redirect()->route('ListRoom.create');
                    }
                } else {
                    $profiles = Profile::orderBy('created_at', 'desc')->limit(20)->get();
                    $length = $profiles->count();
                    return view('welcome', ['profiles' => $profiles, 'length' => $length]);
                }
            } else {
                return redirect()->route('profile.create');
            }
        }
        
        $profiles = Profile::orderBy('created_at', 'desc')->limit(20)->get();
                    $length = $profiles->count();
                    return view('welcome', ['profiles' => $profiles, 'length' => $length]);
        
        
    }
}
