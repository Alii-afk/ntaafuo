<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Models\ListRoom;
use App\Models\Payment;
use App\Providers\RouteServiceProvider;

class PaymentController extends Controller
{
    
    public function redirectToGateway(Request $request)
    {
        $user = auth()->user();
        $email = $user->email;
         
        if($request->amount < 1000)
        {
           return redirect()->route('payment.form')->with('error', 'Payment failed. Please try again.'); 
        }

        $existingProfile = ListRoom::where('email', $email)->first();

        if ($existingProfile) {
            return redirect()->route('ListRoom.create')->withErrors('Failed', 'List Room Already Exist Against This User.');
        } else {
            // Validate the input data
            $validatedData = $request->validate([
                'email' => 'email|unique:list_rooms,email', // Replace 'list_rooms' with your actual table name
                'imageData1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'imageData2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'imageData3' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'rent' => 'required',
                'terms' => 'required',
                'city' => 'required',
                'town' => 'required',
                'referal' => 'required'
            ]);

            // Handle profile picture upload
            $image1 = $request->file('imageData1');
            $path1 = $image1->store('roomPictures', ['disk' => 'my_files']);

            // Handle profile picture upload
            $image2 = $request->file('imageData2');
            $path2 = $image2->store('roomPictures', ['disk' => 'my_files']);

            // Handle profile picture upload
            $image3 = $request->file('imageData3');
            $path3 = $image3->store('roomPictures', ['disk' => 'my_files']);

            // Create a new Listing of Room
            $listRoom = new ListRoom($validatedData);
            // $user = auth()->user();
            // $listRoom->email = $user->email; // Assign the email from the logged-in user
            $listRoom->imageData1 = $path1;
            $listRoom->imageData2 = $path2;
            $listRoom->imageData3 = $path3;
            $listRoom->save();
        }
        
        // $existingPayment = Payment::where('email', $email)->first();
        // if($existingPayment)
        // {
            return Paystack::getAuthorizationUrl()->redirectNow();
        // }
        // else
        // {
        //     return redirect()->route('dashboard');
        // }
    }
    
    
    public function redirectToGateway1(Request $request)
    {
        $user = auth()->user();
        $email = $user->email;
         
        if($request->amount < 1000)
        {
           return redirect()->route('show-Profile')->with('error', 'Payment failed. Please try again.'); 
        }

        $existingProfile = ListRoom::where('email', $email)->first();

        if ($existingProfile) {
            return redirect()->route('show-Profile')->withErrors('Failed', 'List Room Already Exist Against This User.');
        } else {
            // Validate the input data
            $validatedData = $request->validate([
                'email' => 'email|unique:list_rooms,email', // Replace 'list_rooms' with your actual table name
                'imageData1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'imageData2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'imageData3' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'rent' => 'required',
                'terms' => 'required',
                'city' => 'required',
                'town' => 'required',
                'referal' => 'required'
            ]);

            // Handle profile picture upload
            $image1 = $request->file('imageData1');
            $path1 = $image1->store('roomPictures', ['disk' => 'my_files']);

            // Handle profile picture upload
            $image2 = $request->file('imageData2');
            $path2 = $image2->store('roomPictures', ['disk' => 'my_files']);

            // Handle profile picture upload
            $image3 = $request->file('imageData3');
            $path3 = $image3->store('roomPictures', ['disk' => 'my_files']);

            // Create a new Listing of Room
            $listRoom = new ListRoom($validatedData);
            // $user = auth()->user();
            // $listRoom->email = $user->email; // Assign the email from the logged-in user
            $listRoom->imageData1 = $path1;
            $listRoom->imageData2 = $path2;
            $listRoom->imageData3 = $path3;
            $listRoom->save();
        }
        
        // $existingPayment = Payment::where('email', $email)->first();
        // if($existingPayment)
        // {
            return Paystack::getAuthorizationUrl()->redirectNow();
        // }
        // else
        // {
        //     return redirect()->route('show-Profile');
        // }
    }

    // Handle the Paystack callback
    public function handlePaymentCallback()
    {
        // Verify the payment status with Paystack
        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails['data']['status'] === 'success') {
            $dataToInsert = [
                'email' => $paymentDetails['data']['customer']['email'],
                'orderiD' => $paymentDetails['data']['customer']['id'],
                'amount' => $paymentDetails['data']['amount'],
                'currency' => $paymentDetails['data']['currency'],
                'reference' => $paymentDetails['data']['reference'],
            ];
            
            Payment::create($dataToInsert);
            return redirect()->route('dashboard')->with('success', 'Room added successfully after payment.');
        } else {
            
            $user = auth()->user();
            $email = $user->email;
    
            $currentImagePath1 = ListRoom::where('email', $email)->value('imageData1');
            $currentImagePath2 = ListRoom::where('email', $email)->value('imageData2');
            $currentImagePath3 = ListRoom::where('email', $email)->value('imageData3');

            if ($currentImagePath3) {
                Storage::disk('my_files')->delete($currentImagePath3);
            }
            if ($currentImagePath2) {
                Storage::disk('my_files')->delete($currentImagePath2);
            }
            if ($currentImagePath3) {
                Storage::disk('my_files')->delete($currentImagePath3);
            }
            
            $existingProfile = ListRoom::where('email', $email)->first();
            $existingProfile->delete();

            // Payment failed, handle the failure scenario
            return redirect()->route('payment.form')->with('error', 'Payment failed. Please try again.');
        }
    }
}
