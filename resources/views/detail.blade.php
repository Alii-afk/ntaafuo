<x-app-layout>
    <x-slot name="header">
        <div class="text-green pt-8 headsect">
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <span class="tag-line">Ghana’s Favourite Apartment-Share</span>
            </div>
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0 mt-2">
                <span class="tag-5-line">Free forever</span>
            </div>
        </div>

    </x-slot>
    @php
    $loggined_user = auth()->user();
    $loggined_user_email = $loggined_user->email;
    $email = $profile->email;
    $userType = $user->userType;
    @endphp
    @if ($userType === 'lessee')
    <div class="back-div">
        <a href="/home?type=roomie" class="back-btn">Back</a>
    </div>
    <div class="grid-container-det">
        <div class="grid-item-det">
           <img src="{{ asset('images/' . $profile->profilePicture) }}" alt="Person" class="card__image img-respo">
        </div>
        <div class="grid-item-det">
            <div class="class-cour-8-det">
                <p  class="class-cour-6">{{ $profile->firstName }}</p>
                <p class="class-cour-7">{{ $profile->tagOne }}, {{ $profile->tagTwo }} & {{ $profile->tagThree }}</p>
                <p  class="class-cour-6"> Location: <br> {{ $profile->city }} ( {{ $profile->town }} )</p>
            </div>
        </div>
        <div class="grid-item-det">
            <div class="undercard">
            <div class="items-center under">
                <span class="card-tag  mx-auto reveal-btn">Reveal Number</span>
            </div>
            <div class="items-center under">
                <input type="hidden" id="hidden-email" value="{{ $email }}">
                <span class="phone-tag mx-auto" id="telephoneNo">{{ __('(+233) xxx xxx xxxx') }}</span>
            </div>
        </div>
        </div>
    </div>
    @endif

    @if ($userType === 'lessor')
   <div class="back-div">
        <a href="/home?type=room" class="back-btn">Back</a>
    </div>
    <div class="grid-container-det">
        <div class="grid-item-det">
           <img src="{{ asset('images/' . $profile->profilePicture) }}" alt="Person" class="card__image img-respo">
        </div>
        <div class="grid-item-det">
            <div class="class-cour-8-det">
                <p  class="class-cour-6">{{ $profile->firstName }}</p>
                <p class="class-cour-7">{{ $profile->tagOne }}, {{ $profile->tagTwo }} & {{ $profile->tagThree }}</p>
                <p  class="class-cour-6"> Location: <br> {{ $profile->city }} ( {{ $profile->town }} )</p>
            </div>
        </div>
        <div class="grid-item-det">
            <div class="undercard">
            <div class="items-center under">
                <span class="card-tag  mx-auto reveal-btn">Reveal Number</span>
            </div>
            <div class="items-center under">
                <input type="hidden" id="hidden-email" value="{{ $email }}">
                <span class="phone-tag mx-auto" id="telephoneNo">{{ __('(+233) xxx xxx xxxx') }}</span>
            </div>
        </div>
        </div>
    </div>
     <div class="grid-container-d">
        <div class="grid-item-d">
            <img src="{{ asset('images/' . $room->imageData1) }}" alt="Person" >
        </div>
        <div class="grid-item-d">
            <img src="{{ asset('images/' . $room->imageData2) }}" alt="Person" >
        </div>
        <div class="grid-item-d">
            <img src="{{ asset('images/' . $room->imageData3) }}" alt="Person" >
        </div>
    </div>
        
    </div>
    @endif

    </div>



</x-app-layout>