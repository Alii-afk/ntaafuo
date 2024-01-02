<x-app-layout>
    <x-slot name="header">
        @php
        $profilee = $profile->first(); // Get the first Profile object from the Collection

        $user = auth()->user();
        $email = $user->email;
        $userType = $user->userType;

        if($userType == "lessor")
        {
        if($list)
        {
        $list = $list->first();
        }

        }

        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $url = $protocol . '://' . $host;
        $mainurl = $url.'/detail/'.$email;


        @endphp
        <div class="text-green pt-8 headsect" autofocus>
            <!-- Application Logo -->
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>

            <div class="flex justify-center pt-8 txt-mar sm:justify-center sm:pt-0 ">
                <span class="tag-5-line w-tag mb-8 mt-8 edit-des">Edit Profile & Listing</span>
            </div>
            <!-- Introduction Text -->
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <span class="tag-2-line w-tag mb-8">Ghana only and largest Apartment-share community
                    we are thrilled to have you on-board</span>
            </div>
        </div>

    </x-slot>
    <div class="login-form bg-white">

        @foreach ($errors->all() as $error)
        @if($error == "reset")
        <input type="hidden" id="message" value="Password Changed Successfully">
        @endif
        @endforeach

        @if(session('success'))
        <input type="hidden" id="message" value="{{ session('success') }}">
        @endif
        <div class="notification-banner">
            <span id="notification-message"></span>
        </div>

        <div class="notification-banner2">
            <span id="notification-message2"></span>
        </div>

        <div class="notification-banner3">
            <span id="notification-message3"></span>
        </div>

        <div class="parent-div bg-white">
            <!-- Register User Form -->

            <div class="text-center bg-form  h-full">
                
                
                <div class="column-6-2  column-6-6 mt-8">
                    <div class='active-cont mt-8'>
                        <span id="act" class="span-style">Active</span>
                        <label class='toggle-label'>
                            @if ($profilee->activeStatus == "on")
                            <input type='checkbox' id="activeUser" name="isChecked" value="on" checked />
                            @else
                            <input type='checkbox' id="activeUser" name="isChecked" value="off" />
                            @endif
                            <span class='back'>
                                <span class='toggle'>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="50" viewBox="0 0 47 38" fill="none">
                                        <path d="M0 10C0 4.47715 4.47715 0 10 0L23.25 0L36.5 0C42.0228 0 46.5 4.47715 46.5 10V18.75V27.5C46.5 33.0228 42.0228 37.5 36.5 37.5H23.75H10C4.47715 37.5 0 33.0228 0 27.5L0 19.25L0 10Z" fill="url(#pattern0)" />
                                        <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_12_3" transform="matrix(0.0107527 0 0 0.0133333 -3.05376 -0.959999)" />
                                            </pattern>
                                            <image id="image0_12_3" width="606" height="196" xlink:href="data:image/png;base64,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" />
                                        </defs>
                                    </svg>
                                </span>
                                <span class='label on'><i class="fa-solid fa-check"></i></span>
                                <span class='label off'><i class="fa-solid fa-xmark"></i></span>
                            </span>
                        </label>
                        <span id="inact" class="span-style1">Inactive</span>
                    </div>
                </div>
                <!--label-sub label-main-->
                <form method="POST" action="{{ route('userType.update') }}" style="padding: 10px; margin: 0px; overflow:hidden;" enctype="multipart/form-data">
                    @csrf
                    <!-- City Select Box -->
                    <div class="column-6-2 mt-4">
                        <x-label for="profile" class="label-main-2 mt-2" :value="__('Change Account Type')" />
                        <select name="userType" id="city" class="block  w-full input-general11 text-center mt-2" required>
                            <option value="" selected>{{$userType}} (Current)</option> 
                            <option value="lessee">Lessee</option>
                            <option value="lessor">Lessor</option>
                        </select>
                    </div>

                    <!-- Create User Button -->
                    <div style="margin-top: 10px;">
                        <div class="column-6-2 mt-4 text-center" style="margin:auto;">
                            <x-button class="w-100 " style="background-color: #D61414 !important; ">
                                {{ __('Change') }}
                            </x-button>
                        </div>
                    </div>
                </form>
                
                
                @php
                if($userType == "lessor")
                {
                @endphp

                @if ($list)
                <form method="POST" id="passwordForm" action="{{ route('listing.update') }}" class="pt-9" style=" margin: 0px;" enctype="multipart/form-data">
                    @csrf
                    <div class="column-9 mb-4 ">
                        <x-label for="profileImage" class="listing-info" :value="__('LISTING')" />
                    </div>
                    <div class="column-9 mb-4">
                        <x-label for="profileImage" class="label-main-2 mt-2" :value="__('One listing per profile')" />
                    </div>
                    <div class="column-9 mt-4 font-semibold">
                        <x-label for="profileImage" class="label-main-2 mt-2" style="font-weight: 700;" :value="__('Listing')" />
                    </div>
                    <div class="column-11">
                        <label for="profileImage1" class="image-preview-label1 image-preview2">
                            <div id="profileImagePreview1" class="image-preview2">
                                <img src="{{ asset('images/' . $list->imageData1) }}" alt="Profile Image" class="preview-image">
                            </div>
                        </label>
                        <span class="replaceImg" id="replace_1">Replace</span>
                        <input id="profileImage1" type="file" name="imageData1" class="hidden-file-input" accept="image/*" />
                    </div>
                    <div class="column-11">
                        <label for="profileImage2" class="image-preview-label2 image-preview2">
                            <div id="profileImagePreview2" class="image-preview2">
                                <img src="{{ asset('images/' . $list->imageData2) }}" alt="Profile Image" class="preview-image">
                            </div>
                        </label>
                        <span class="replaceImg" id="replace_2">Replace</span>
                        <input id="profileImage2" type="file" name="imageData2" class="hidden-file-input" accept="image/*" />
                    </div>
                    <div class="column-11">
                        <label for="profileImage3" class="image-preview-label3 image-preview2">
                            <div id="profileImagePreview3" class="image-preview2">
                                <img src="{{ asset('images/' . $list->imageData3) }}" alt="Profile Image" class="preview-image">
                            </div>
                        </label>
                        <span class="replaceImg" id="replace_3">Replace</span>
                        <input id="profileImage3" type="file" name="imageData3" class="hidden-file-input" accept="image/*" />
                    </div>
                    <!-- City Select Box -->
                    <div class="column-6-2 column-6-6 mt-4">
                        <x-label for="city" class="label-main-2 mt-2" :value="__('City')" />
                        <select name="city1" id="city1" class="block mt-1 w-full input-general11 text-center" required>
                            <option value="">- Select City -</option>
                            <option value="{{$list->city}}" selected>{{$list->city}}</option>
                            <option value="Accra">Accra</option>
                            <option value="Kumasi">Kumasi</option>
                        </select>
                    </div>

                    <!-- Towns Select Box -->
                    <div class="column-6-2 column-6-6 mt-4">
                        <x-label for="Towns" class="label-main-2 mt-2" :value="__('Towns')" />
                        <select name="town1" id="town1" class="block mt-1 w-full input-general11 text-center" required>
                            <option value="">- Select City First -</option>
                            <option value="{{$list->town}}" selected>{{$list->town}}</option>
                        </select>
                    </div>

                    <!-- Deposit Input -->
                    <div class="column-6-2 column-6-6  mt-4">
                        <x-label for="rent" class="label-main-2" :value="__('Deposit')" />
                        <label for="rent" class="block mt-2 w-full input-general23">
                            <span class="span-pay" style="font-weight: 400;">GHS</span>
                            <input id="rent" type="number" name="rent" min="0" class="pay-input" value="{{$list->rent}}" required>
                        </label>
                    </div>
                    
                    <!-- Term Input -->
                    <div class="column-6-2  column-6-6 mt-4">
                        <x-label class="label-main-2" for="Term" :value="__('Term')" />
                        <select name="terms" id="term" class="block mt-1 w-full input-general11 text-center" required>
                            <option value="">- Select Terms -</option>
                            <option value="{{$list->terms}}" selected>{{$list->terms}}</option>
                            <option value="1 year">1 year</option>
                            <option value="2 years">2 years</option>
                        </select>
                    </div>
                    
                    <!-- Create User Button -->
                    <div class="column-6-2 column-6-6 mt-4">
                        <x-button class="w-semi mt-4" style="background-color: #D61414 !important;">
                            {{ __('UPDATE LISTING') }}
                        </x-button>
                    </div>
                </form>
                @else
                <form method="POST" id="passwordForm" action="{{ route('listing.create') }}" style="padding: 0px; margin: 0px;" enctype="multipart/form-data">
                    @csrf
                    <div class="column-9 mb-4 ">
                        <x-label for="profileImage" class="listing-info" :value="__('LISTING')" />
                    </div>
                    <div class="column-9 mb-4">
                        <x-label for="profileImage" class="label-main-2 mt-2" :value="__('One listing per profile')" />
                    </div>
                    <div class="column-9 mt-4 font-semibold">
                        <x-label for="profileImage" class="label-main-2 mt-2" style="font-weight: 700;" :value="__('Listing')" />
                    </div>
                    <div class="column-11">
                        <label for="profileImage1" class="image-preview-label1 image-preview2">
                            <div id="profileImagePreview1" class="image-preview2">
                                <img src="default1.png" alt="Profile Image" class="preview-image">
                            </div>
                        </label>
                        <span class="replaceImg" id="replace_1">Replace</span>
                        <input id="profileImage1" type="file" name="imageData1" class="hidden-file-input" accept="image/*" />
                    </div>
                    <div class="column-11">
                        <label for="profileImage2" class="image-preview-label2 image-preview2">
                            <div id="profileImagePreview2" class="image-preview2">
                                <img src="default2.png" alt="Profile Image" class="preview-image">
                            </div>
                        </label>
                        <span class="replaceImg" id="replace_2">Replace</span>
                        <input id="profileImage2" type="file" name="imageData2" class="hidden-file-input" accept="image/*" />
                    </div>
                    <div class="column-11">
                        <label for="profileImage3" class="image-preview-label3 image-preview2">
                            <div id="profileImagePreview3" class="image-preview2">
                                <img src="default3.png" alt="Profile Image" class="preview-image">
                            </div>
                        </label>
                        <span class="replaceImg" id="replace_3">Replace</span>
                        <input id="profileImage3" type="file" name="imageData3" class="hidden-file-input" accept="image/*" />
                    </div>
                    <!-- City Select Box -->
                    <div class="column-6-2 column-6-6 mt-4">
                        <x-label for="city" class="label-main-2 mt-2" :value="__('City')" />
                        <select name="city" id="city1" class="block mt-1 w-full input-general11 text-center" required>
                            <option value="">- Select City -</option>
                            <option value="Accra">Accra</option>
                            <option value="Kumasi">Kumasi</option>
                        </select>
                    </div>

                    <!-- Towns Select Box -->
                    <div class="column-6-2 column-6-6 mt-4">
                        <x-label for="Towns" class="label-main-2 mt-2" :value="__('Towns')" />
                        <select name="town" id="town1" class="block mt-1 w-full input-general11 text-center" required>
                            <option value="">- Select City First -</option>
                        </select>
                    </div>

                    <!-- Deposit Input -->
                    <div class="column-6-2 column-6-6  mt-4">
                        <x-label for="rent" class="label-main-2" :value="__('Deposit')" />
                        <label for="rent" class="block mt-2 w-full input-general23">
                            <span class="span-pay" style="font-weight: 400;">GHS</span>
                            <input id="rent" type="number" name="rent" min="0" class="pay-input" required>
                        </label>
                    </div>
                    
                    <!-- Term Input -->
                    <div class="column-6-2  column-6-6 mt-4">
                        <x-label class="label-main-2" for="Term" :value="__('Term')" />
                        <select name="terms" id="term" class="block mt-1 w-full input-general11 text-center" required >
                            <option value="">- Select Terms -</option>
                            <option value="1 year">1 year</option>
                            <option value="2 years">2 years</option>
                        </select>
                    </div>
                    
                    @php
                    $user = auth()->user();
                    $email = $user->email;
                    $userType = $user->userType;
                    $orderID = $email."-".rand();
                    @endphp
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="order_id" value="{{ $orderID }}">
                    <input type="hidden" name="amount" value="1000">
                    <input type="hidden" name="currency" value="GHS">
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">

                    <input type="hidden" name="referal" value="autogenerated">
                    <!-- Create User Button -->
                    <div class="column-6-2 column-6-6 mt-4">
                        <x-button class="w-semi mt-4" style="background-color: #D61414 !important;">
                            {{ __('CREATE LISTING') }}
                        </x-button>
                    </div>
                </form>
                @endif

                @php
                }
                @endphp
                
            </div>
            <div class="bg-white p-9">
                <!-- Describe Yourself in Tags -->

                <div class="column-11 mb-4">
                    <x-label for="profileImage" class="profile-info" :value="__('PERSONAL PROFILE')" />
                </div>
                <form method="POST" id="passwordForm" action="{{ route('profile.update') }}" style="padding: 0px; margin: 0px;" enctype="multipart/form-data">
                    @csrf
                    <div class="column-11">
                        <label for="profileImage" class="image-preview-label image-preview12">
                            <div id="profileImagePreview" class="image-preview12">
                                <img src="{{ asset('images/' . $profilee->profilePicture) }}" alt="Profile Image" class="preview-image">
                            </div>
                        </label>
                        <input id="profileImage" type="file" name="profilePicture" class="hidden-file-input" accept="image/*" />
                    </div>
                    <!-- Personal Details -->
                    <div class="column-11 mb-4">
                        <x-label for="profileImage" class="profile-detail" :value="__('PERSONAL DETAILS')" />
                    </div>
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                    <div class="row-main-tags mb-4">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                @if($error != "reset")
                                <li>{{ $error }}</li>
                                <input type="hidden" id="message" value="Form Error">
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @if($errors->has('failed'))
                    <div class="row-main">
                        <div class="column-6">
                            <div class="alert alert-danger">
                                {{ $errors->first('failed') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="column-4-1-main column-4-1-small pr-4">
                        <x-label class="label-sub label-main" for="firstName" :value="__('First Name')" />
                        <x-input id="firstName" class="block mt-1 w-full input-sub-prof input-sub-small" type="text" name="firstName" value="{{$profilee->firstName}}" required />
                    </div>
                    <div class="column-4-1-main column-4-1-small">
                        <x-label class="label-sub" for="lasttName" :value="__('Last Name')" />
                        <x-input id="lasttName" class="block mt-1 w-full input-sub-prof input-sub-small" type="text" name="lastName" value="{{$profilee->lastName}}" required />
                    </div>

                    <div class="column-11 mb-4 mt-4">
                        <x-label class="tags" for="Charteristics" :value="__('TAGS')" />
                    </div>

                    <!-- Charteristics -->
                    <div class="row-main-tags col-wid-new mb-8">
                        <!-- First Tag -->
                        <div class="column-tag-4">
                            <select name="tagOne" id="tagOne" class="block mt-1 w-full drop-tag " required>
                                <option value="">DropDown</option>
                                <option value="{{$profilee->tagOne}}" Selected>{{$profilee->tagOne}}</option>
                                <option value="Movie buff">Movie buff</option>
                                <option value="Snapchatter">Snapchatter</option>
                                <option value="Sportfan">Sportfan</option>
                                <option value="Creative">Creative</option>
                                <option value="Foodie">Foodie</option>
                                <option value="Homebody">Homebody</option>
                                <option value="Tweeter">Tweeter</option>
                                <option value="Explorer">Explorer</option>
                                <option value="Bookworm">Bookworm</option>
                                <option value="Techy">Techy</option>
                                <option value="Gamer">Gamer</option>
                            </select>
                        </div>
                        <!-- Second Tag -->
                        <div class="column-tag-4">
                            <select name="tagTwo" id="tagTwo" class="block mt-1 w-full drop-tag" required>
                                <option value="{{$profilee->tagTwo}}" Selected>{{$profilee->tagTwo}}</option>
                                <option value="">DropDown</option>
                                <option value="Chatterbox">Chatterbox</option>
                                <option value="Neatfreak">Neatfreak</option>
                                <option value="Freedom Fighter">Freedom Fighter</option>
                                <option value="Feminist">Feminist</option>
                                <option value="Free spirited">Free spirited</option>
                                <option value="Political Enthusiast">Political Enthusiast</option>
                                <option value="Religious">Religious</option>
                                <option value="Girly">Girly</option>
                                <option value="Shy">Shy</option>
                                <option value="Grumpy">Grumpy</option>
                                <option value="Unsociable">Unsociable</option>
                                <option value="Cool">Cool</option>
                            </select>
                        </div>
                        <!-- Third Tag -->
                        <div class="column-tag-4">
                            <select name="tagThree" id="tagThree" class="block mt-1 w-full drop-tag" required>
                                <option value="">DropDown</option>
                                <option value="{{$profilee->tagThree}}" Selected>{{$profilee->tagThree}}</option>
                                <option value="Student">Student</option>
                                <option value="Professional">Professional</option>
                                <option value="Entrepreneur">Entrepreneur</option>
                                <option value="Influencer">Influencer</option>
                                <option value="Blogger">Blogger</option>
                                <option value="Make up Artis">Make up Artistt</option>
                                <option value="Event Planner">Event Planner</option>
                                <option value="Nurse/Doctor">Nurse/Doctor</option>
                                <option value="Designer">Designer</option>
                                <option value="Cook/Chef">Cook/Chef</option>
                                <option value="Farmer">Farmer</option>
                                <option value="IT">IT</option>
                            </select>
                        </div>
                    </div>

                    <!-- Telephone Number Input -->
                    <div class="column-6-2-small mt-4">
                        <x-label class="label-sub label-main" for="telephoneNo" :value="__('Telephone Number')" />
                        <x-input id="telephoneNo" class="block mt-1 w-full input-general-prof telephone-input" type="tel" name="telephoneNo" placeholder="(+233) 000 000 0000" value="{{$profilee->telephoneNo}}" required />
                    </div>

                    <!-- Date of Birth -->
                    <div class="column-6-2-small mt-4">
                        <x-label class="label-sub label-main" for="dateOfBirth" :value="__('Date of Birth')" />
                        <x-input id="dateOfBirth" class="block mt-1 w-full input-general-prof" type="date" name="dateOfBirth" value="{{$profilee->dateOfBirth}}" required />
                    </div>

                    <!-- Gender Select Box -->
                    <div class="column-6-2-small mt-4">
                        <x-label for="gender" class="label-sub label-main mt-2" :value="__('Gender')" />
                        <select name="gender" id="gender" class="block mt-1 w-full input-general-prof" required>
                            <option value="">- Select Gender -</option>
                            <option value="{{$profilee->gender}}" Selected>{{$profilee->gender}}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    
                    <!-- Sexual Orientation Input -->
                    <div class="column-6-2-small mt-4">
                        <x-label for="sexualOrientation" class="label-sub label-main mt-2" :value="__('Sexual Orientation')" />
                        <select name="sexualOrientation" id="sexualOrientation" class="block mt-1 w-full input-general-prof" required>
                            <option value="">- Select Sexual Orientation -</option>
                            <option value="{{$profilee->sexualOrientation}}" Selected>{{$profilee->sexualOrientation}}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- City Select Box -->
                    <div class=" column-6-2-small mt-4">
                        <x-label for="city" class="label-main mt-2" :value="__('City')" />
                        <select name="city" id="city" class="block mt-1 w-full input-general-prof" required>
                            <option value="">- Select City -</option>
                            <option value="{{$profilee->city}}" selected>{{$profilee->city}}</option>
                            <option value="Accra">Accra</option>
                            <option value="Kumasi">Kumasi</option>
                        </select>
                    </div>

                    <!-- Towns Select Box -->
                    <div class="column-6-2-small mt-4">
                        <x-label for="Towns" class="label-main mt-2" :value="__('Towns')" />
                        <select name="town" id="town" class="block mt-1 w-full input-general-prof" required>
                            <option value="">- Select City First -</option>
                            <option value="{{$profilee->town}}" selected>{{$profilee->town}}</option>
                        </select>
                    </div>

                    <!-- Create User Button -->
                    <div class="row-main-tags">
                        <div class="column-6-2 column-6-2-small mt-4">
                            <x-button class="but-sub" style="background-color: #D61414 !important;">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </div>

                </form>
                <form method="POST" id="passwordForm" action="{{ route('profile.update') }}" style="padding: 0px; margin: 0px;" enctype="multipart/form-data">
                    @csrf

                    <!-- Personal Details -->
                    <div class="column-11  mt-8">
                        <x-label for="profileImage" class="profile-detail" :value="__('PASSWORD')" />
                    </div>

                    <input type="hidden" name="email" value="{{ $email }}">

                    <!-- Change Password Input -->
                    <div class=" column-6-2-small mt-4">
                        <x-label class="label-sub label-main" for="changePassword" :value="__('Change Password')" />
                        <x-input id="changePassword" class="block mt-1 w-full input-general-prof" type="password" name="password" />
                    </div>

                    <!-- Confirm Password Input -->
                    <div class=" column-6-2-small mt-4">
                        <x-label class="label-sub label-main" for="confirmPassword" :value="__('Confirm Password')" />
                        <x-input id="confirmPassword" class="block mt-1 w-full input-general-prof" type="password" name="password_confirmation" />
                    </div>

                    <!-- Type CHANGE Input -->
                    <div class=" column-6-2-small mt-4">
                        <label class="label-sub label-main" for="confirmAuth">Type <span style="font-weight: 700">CHANGE</span></label>
                        <x-input id="confirmAuth" class="block mt-1 w-full captil input-general-prof" type="text" name="confirmAuth" />
                    </div>

                    <!-- Create User Button -->
                    <div class="row-main-tags">
                        <div class="column-6-2-small mt-4">
                            <x-button class="but-sub" style="background-color: #D61414 !important;">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </div>
                </form>
                

                <!-- Refer a friend -->
                <div class="row-main-tags mt-4 col-wid-new">
                    <div class=" column-6-2-small mt-4">
                        <x-label class="label-sub label-main-3 mt-4" for="referal" :value="__('Refer a friend')" />
                        <label id="referalLabel" class="block mt-1 w-full input-general-label">
                            <span id="referalLabel1">{{$mainurl}}</span>
                            <span class="copy-span">Copy</span>
                        </label>
                    </div>
                </div>



            </div>
        </div>

</x-app-layout>