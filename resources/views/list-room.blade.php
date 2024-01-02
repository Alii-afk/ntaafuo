<x-app-layout>
    <x-slot name="header">
        <div class="text-green pt-8">
            <!-- Application Logo -->
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>

            <!-- Create a profile -->
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <span class="landing-button-2 pt-4 mt-10 mb-4">List a room</span>
            </div>

            <!-- Introduction Text -->
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <span class="tag-2-line w-tag mb-8">Join Ghana’s only and largest Apartment-share community
                    we are thrilled to have you on-board</span>
            </div>
        </div>
    </x-slot>
    <!-- Display Validation Errors -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if($errors->has('failed'))
    <div class="alert alert-danger">
        {{ $errors->first('failed') }}
    </div>
    @endif
    <div class="w-80 py-12">

        <!-- Register User Form -->
        <form method="POST" action="{{ route('pay') }}" class="login-form" enctype="multipart/form-data" >
            @csrf

            <!-- Upload images -->
            <div class="row-main-2 mt-4 mb-4">
                <div class="column-6">
                    <x-label class="list-tag" for="Personal" :value="__('Upload images')" />
                </div>
            </div>

            <!-- Image Upload -->
            <div class="row-main-3">
                <div class="column-3">
                    <label for="profileImage1" class="image-preview-label1 image-preview1">
                        <div id="profileImagePreview1" class="image-preview1">
                            <img src="default1.png" alt="Profile Image" class="preview-image">
                        </div>
                    </label>
                    <input id="profileImage1" type="file" name="imageData1" class="hidden-file-input" accept="image/*" required />
                </div>
                <div class="column-3">
                    <label for="profileImage2" class="image-preview-label2 image-preview1">
                        <div id="profileImagePreview2" class="image-preview1">
                            <img src="default2.png" alt="Profile Image" class="preview-image">
                        </div>
                    </label>
                    <input id="profileImage2" type="file" name="imageData2" class="hidden-file-input" accept="image/*" required />
                </div>
                <div class="column-3">
                    <label for="profileImage3" class="image-preview-label3 image-preview1">
                        <div id="profileImagePreview3" class="image-preview1">
                            <img src="default3.png" alt="Profile Image" class="preview-image">
                        </div>
                    </label>
                    <input id="profileImage3" type="file" name="imageData3" class="hidden-file-input" accept="image/*" required />
                </div>
            </div>

            <!-- Monthly Rent Input -->
            <div class="row-main">
                <div class="column-6-2 mt-10">
                    <x-label for="rent" class="label-main-2" :value="__('Monthly Rent')" />
                    <label for="rent" class="block mt-1 w-full input-general2">
                        <span class="span-pay">GHS</span>
                        <input id="rent" type="number" name="rent" min="0" class="pay-input" required autofocus>
                    </label>
                </div>
            </div>

            <!-- Term Input -->
            <div class="row-main">
                <div class="column-6-2 mt-4">
                    <x-label class="label-main-2" for="Term" :value="__('Term')" />
                    <select name="terms" id="term" class="block mt-1 w-full input-general1 text-center" required autofocus>
                        <option value="">- Select Terms -</option>
                        <option value="1 year">1 year</option>
                        <option value="2 years">2 years</option>
                    </select>
                </div>
            </div>

            <!--Where is your place? -->
            <div class="row-main-2 ">
                <div class="mt-10 mb-4">
                    <x-label class="Personal" for="Personal" :value="__('Where is your place?')" />
                </div>
            </div>

            <!-- City Select Box -->
            <div class="row-main">
                <div class="column-6-2">
                    <x-label for="city" class="label-main-2 mt-2" :value="__('City')" />
                    <select name="city" id="city" class="block mt-1 w-full input-general text-center" required autofocus>
                        <option value="">- Select City -</option>
                        <option value="Accra">Accra</option>
                        <option value="Kumasi">Kumasi</option>
                    </select>
                </div>
            </div>

            <!-- Towns Select Box -->
            <div class="row-main">
                <div class="column-6-2">
                    <x-label for="Towns" class="label-main-2 mt-2" :value="__('Towns')" />
                    <select name="town" id="town" class="block mt-1 w-full input-general text-center" required autofocus>
                        <option value="">- Select City First -</option>
                    </select>
                </div>
            </div>

            <x-input id="referal" class="block mt-1 w-full input-general" type="hidden" name="referal" value="autogenerated" required autofocus />

            <!--Where is your place? -->
            <div class="row-main-2 ">
                <div class=" mt-10 ">
                    <x-label class="Personal" style="color: #F00;" for="Personal" :value="__('PAY 10GHS')" />
                    <x-label class="Charteristics" for="Personal" :value="__(' To unlock the features and benefits')" />
                </div>
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
            <!-- Create User Button -->
            <div class="row-main">
                <div class="column-6-2 mt-4">
                    <x-button class="w-100" onclick="validateForm()">
                        {{ __('PAY NOW') }}
                    </x-button>
                </div>
            </div>

        </form>
    </div>
</x-app-layout>