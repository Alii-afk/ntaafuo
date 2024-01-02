<?php

namespace App\Http\Controllers;

use App\Models\ListRoom;
use App\Models\Profile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;


class ProfileController extends Controller
{
    public function create()
    {
        return view('create-profile');
    }

    public function check()
    {
        $user = auth()->user();
        $email = $user->email;

        $existingProfile = Profile::where('email', $email)->first();

        if ($existingProfile) {
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return redirect()->route('profile.create');
        }
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        $email = $user->email;

        $existingProfile = Profile::where('email', $email)->first();

        if ($existingProfile) {
            return redirect()->route('profile.create')->withErrors('Failed', 'Profile Already Exist Against This User.');
        } else {
            // Validate the input data
            $validatedData = $request->validate([
                'email' => 'email|unique',
                'firstName' => 'required',
                'lastName' => 'required',
                'profilePicture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'tagOne' => 'required',
                'tagTwo' => 'required',
                'tagThree' => 'required',
                'telephoneNo' => 'required',
                'dateOfBirth' => 'required',
                'gender' => 'required',
                'sexualOrientation' => 'required',
                'city' => 'required',
                'town' => 'required',
                'socialOne' => 'required',
                'socialTwo' => 'required',
                'referal' => 'required',
            ]);

            // Handle profile picture upload
            $image = $request->file('profilePicture');
            $path = $image->store('profilePictures', ['disk' => 'my_files']);

            // Create a new profile
            $profile = new Profile($validatedData);
            $user = auth()->user();
            $profile->email = $user->email; // Assign the email from the logged-in user
            $profile->profilePicture = $path;
            $profile->save();

            $user = auth()->user();
            $email = $user->email;
            $userType = $user->userType;

            $existingProfile = Profile::where('email', $email)->first();
            $existingList = ListRoom::where('email', $email)->first();

            if ($existingProfile) {
                if ($userType == "lessor") {
                    if ($existingList) {
                        return redirect()->intended(RouteServiceProvider::HOME);
                    } else {
                        return redirect()->route('ListRoom.create');
                    }
                }
            } else {
                return redirect()->route('profile.create');
            }

            return redirect()->route('dashboard')->with('success', 'Profile created successfully.');
        }
    }

    function showProfile()
    {
        $user = auth()->user();
        $email = $user->email;
        $userType = $user->userType;

        if ($userType === 'lessee') {
            $usersToShow = User::join('profiles', 'users.email', '=', 'profiles.email')
                ->where('users.userType', '=', 'lessee')
                ->where('profiles.email', '=', $email) // Filter by the specific email
                ->select('profiles.*') // Select profile columns
                ->get();
        } else {
            $usersToShow1 = Profile::join('users', 'profiles.email', '=', 'users.email')
                ->join('list_rooms', 'users.email', '=', 'list_rooms.email') // Join with list_rooms table
                ->where('users.userType', '=', 'lessor')
                ->where('profiles.email', '=', $email) // Filter by the specific email
                ->get(['profiles.*']); // Retrieve columns from both profiles and list_rooms tables

            $usersToShow2 = Profile::join('users', 'profiles.email', '=', 'users.email')
                ->join('list_rooms', 'users.email', '=', 'list_rooms.email') // Join with list_rooms table
                ->where('users.userType', '=', 'lessor')
                ->where('profiles.email', '=', $email) // Filter by the specific email
                ->get(['list_rooms.*']); // Retrieve columns from both profiles and list_rooms tables
            if ($usersToShow2) {

                $usersToShow = User::join('profiles', 'users.email', '=', 'profiles.email')
                    ->where('users.userType', '=', 'lessor')
                    ->where('profiles.email', '=', $email) // Filter by the specific email
                    ->select('profiles.*') // Select profile columns
                    ->get();

                return view('profile', ['user' => $email, 'profile' => $usersToShow, 'list' => $usersToShow2]);
            } else {
                return view('profile', ['user' => $email, 'profile' => $usersToShow1, 'list' => '']);
            }
        }
        return view('profile', ['user' => $email, 'profile' => $usersToShow]);
    }

    function update(Request $request)
    {
        $user = auth()->user();
        $email = $user->email;
        $userType = $user->userType;
        $profile = $user->profile;

        // ---  Update profile table Data  --- 

        $updateData = [];

        if ($request->has('firstName')) {
            $updateData['firstName'] = $request->input('firstName');
        }
        if ($request->has('lastName')) {
            $updateData['lastName'] = $request->input('lastName');
        }
        if ($request->has('tagOne')) {
            $updateData['tagOne'] = $request->input('tagOne');
        }
        if ($request->has('tagTwo')) {
            $updateData['tagTwo'] = $request->input('tagTwo');
        }
        if ($request->has('tagThree')) {
            $updateData['tagThree'] = $request->input('tagThree');
        }
        if ($request->has('telephoneNo')) {
            $updateData['telephoneNo'] = $request->input('telephoneNo');
        }
        if ($request->has('dateOfBirth')) {
            $updateData['dateOfBirth'] = $request->input('dateOfBirth');
        }
        if ($request->has('gender')) {
            $updateData['gender'] = $request->input('gender');
        }
        if ($request->has('sexualOrientation')) {
            $updateData['sexualOrientation'] = $request->input('sexualOrientation');
        }
        if ($request->has('city')) {
            $updateData['city'] = $request->input('city');
        }
        if ($request->has('town')) {
            $updateData['town'] = $request->input('town');
        }

        if ($request->hasFile('profilePicture')) {

            $currentImagePath3 = Profile::where('email', $email)->value('profilePicture');

            // Handle profile profilePicture upload
            $newImage3 = $request->file('profilePicture');
            $newImagePath3 = $newImage3->store('profilePictures', ['disk' => 'my_files']);

            if ($currentImagePath3) {
                Storage::disk('my_files')->delete($currentImagePath3);
            }

            $updateData['profilePicture'] = $newImagePath3;
        }

        Profile::where('email', $email)->update($updateData);

        // ---  Update User Login Password Data  --- 
        if ($request->has('password')  && !empty($request->input('password'))) {

            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            // Here we will attempt to reset the user's password. If it is successful we
            // will update the password on an actual user model and persist it to the
            // database. Otherwise we will parse the error and return the response.

            $user = User::where('email', $request->email)->first();

            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(60);
            $user->save();

            $status = "reset";

            // If the password was successfully reset, we will redirect the user back to
            // the application's home authenticated view. If there is an error we can
            // redirect them back to where they came from with their error message.
            return $status == Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
        } else {
            return redirect()->route('show-Profile')->with('success', 'Profile Updated successfully.');
        }
    }

    public static function listUpdate(Request $request)
    {
        $user = auth()->user();
        $email = $user->email;
        $userType = $user->userType;
        $profile = $user->profile;

        // --- Update List Table Data --- 


        // Check if any of the image inputs have a file and update the corresponding columns
        if ($request->hasFile('imageData1')) {

            $currentImagePath = ListRoom::where('email', $email)->value('imageData1');

            // Handle profile imageData1 upload
            $newImage = $request->file('imageData1');
            $newImagePath = $newImage->store('roomPictures', ['disk' => 'my_files']);

            if ($currentImagePath) {
                Storage::disk('my_files')->delete($currentImagePath);
            }

            ListRoom::where('email', $email)->update(['imageData1' => $newImagePath]);
        }

        if ($request->hasFile('imageData2')) {

            $currentImagePath1 = ListRoom::where('email', $email)->value('imageData2');

            // Handle profile imageData2 upload
            $newImage1 = $request->file('imageData2');
            $newImagePath1 = $newImage1->store('roomPictures', ['disk' => 'my_files']);

            if ($currentImagePath1) {
                Storage::disk('my_files')->delete($currentImagePath1);
            }

            ListRoom::where('email', $email)->update(['imageData2' => $newImagePath1]);
        }

        if ($request->hasFile('imageData3')) {

            $currentImagePath2 = ListRoom::where('email', $email)->value('imageData3');

            // Handle profile imageData3 upload
            $newImage2 = $request->file('imageData3');
            $newImagePath2 = $newImage2->store('roomPictures', ['disk' => 'my_files']);

            if ($currentImagePath2) {
                Storage::disk('my_files')->delete($currentImagePath2);
            }

            ListRoom::where('email', $email)->update(['imageData3' => $newImagePath2]);
        }

        $updateData1 = [];

        if ($request->has('rent')) {
            $updateData1['rent'] = $request->input('rent');
        }

        if ($request->has('terms')) {
            $updateData1['terms'] = $request->input('terms');
        }

        if ($request->has('city1')) {
            $updateData1['city'] = $request->input('city1');
        }

        if ($request->has('town1')) {
            $updateData1['town'] = $request->input('town1');
        }

        ListRoom::where('email', $email)->update($updateData1);

        return redirect()->route('show-Profile')->with('success', 'Listing Updated successfully.');
    }


    public static function userTypeUpdate(Request $request)
    {
        $user = auth()->user();
        $email = $user->email;
        $userType = $user->userType;
        $profile = $user->profile;

        if ($request->has('userType')) {
            $updateData['userType'] = $request->input('userType');
        }
        User::where('email', $email)->update($updateData);

        return redirect()->route('show-Profile')->with('success', 'Account Type Updated successfully.');
    }


    public static function updateActiveUser(Request $request)
    {
        $user = auth()->user();
        $email = $user->email;
        $userType = $user->userType;
        $profile = $user->profile;

        if ($request->has('isChecked')) {
            $updateData['activeStatus'] = $request->input('isChecked');
        }
        Profile::where('email', $email)->update($updateData);

        if ($request->input('isChecked') == 'on') {
            return response()->json(['success' => 'User Account Activated', 'type' => 'Active']);
        } else {
            return response()->json(['success' => 'User Account Deactivated', 'type' => 'Inactive']);
        }
    }
}
