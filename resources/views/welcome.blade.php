<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
Session::forget('userType');

$loggined_user = auth()->user();
if(isset($loggined_user))
{
$userType = $loggined_user->userType;
}
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ntaafuo</title>
     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <script src="{{ asset('js/login.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/nav.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/listroom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <style>
        body {
            background-color: #545C45;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        .imgpos{
            position: absolute;
        }

        @media screen and (min-width: 1800px) {
            /*body {*/
            /*    background-image: url('full-max.png');*/
            /*}*/
            .chairImg
            {
                position: absolute;
                top: 10%;
                left: 10%;
                width: 180px;
            }
            .pImage1
            {
                bottom: 12%;
                left: 6%;
                width: 100px;
            }
             .pImage2
            {
                bottom: 19%;
                left: 22%;
                width: 110px;
            }
            .pImage3
            {
                bottom: 5%;
                left: 33%;
                width: 100px;
            }
            .pImage4
            {
                bottom: 14%;
                left: 50%;
                width: 85px;
            }
            .pImage5
            {
                bottom: 18%;
                right: 16%;
                width: 110px;
            }
            .pImage6
            {
                bottom: 7%;
                right: 8%;
                width: 90px;
            }
            .pImage7{
                 bottom: 7%;
                right: 28%;
                width: 90px;
            }
        }

        @media screen and (max-width: 1800px) {
            /*body {*/
            /*    background-image: url('full.png');*/
            /*}*/
            
            .chairImg
            {
                top: 8%;
                left: 8%;
                width: 160px;
            }
            .pImage1
            {
                bottom: 12%;
                left: 6%;
                width: 100px;
            }
             .pImage2
            {
                bottom: 19%;
                left: 22%;
                width: 110px;
            }
            .pImage3
            {
                bottom: 5%;
                left: 33%;
                width: 100px;
            }
            .pImage4
            {
                bottom: 14%;
                left: 50%;
                width: 85px;
            }
            .pImage5
            {
                bottom: 18%;
                right: 16%;
                width: 110px;
            }
            .pImage6
            {
                bottom: 7%;
                right: 8%;
                width: 90px;
            }
            .pImage7{
                 bottom: 7%;
                right: 28%;
                width: 90px;
            }
        }

        @media screen and (max-width: 1024px) {
            /*body {*/
            /*    background-image: url('1022.png');*/
            /*}*/
            
            .chairImg
            {
                top: 10%;
                left: 10%;
                width: 150px;
            }
             .pImage1
            {
                bottom: 12%;
                left: 6%;
                width: 80px;
            }
             .pImage2
            {
                bottom: 19%;
                left: 22%;
                width: 90px;
            }
            .pImage3
            {
                bottom: 5%;
                left: 33%;
                width: 80px;
            }
            .pImage4
            {
                bottom: 14%;
                left: 50%;
                width: 65px;
            }
            .pImage5
            {
                bottom: 18%;
                right: 16%;
                width: 90px;
            }
            .pImage6
            {
                bottom: 7%;
                right: 8%;
                width: 70px;
            }
            .pImage7{
                 bottom: 7%;
                right: 28%;
                width: 70px;
            }
            
        }

        @media screen and (max-width: 768px) {
            /*body {*/
            /*    background-image: url('768.png');*/
            /*}*/
            
            .chairImg
            {
                top: 5%;
                left: 8%;
                width: 90px;
            }
             .pImage1
            {
                bottom: 12%;
                left: 6%;
                width: 50px;
            }
             .pImage2
            {
                bottom: 19%;
                left: 22%;
                width: 60px;
            }
            .pImage3
            {
                bottom: 5%;
                left: 33%;
                width: 50px;
            }
            .pImage4
            {
                bottom: 14%;
                left: 50%;
                width: 35px;
            }
            .pImage5
            {
                bottom: 18%;
                right: 16%;
                width: 60px;
            }
            .pImage6
            {
                bottom: 7%;
                right: 8%;
                width: 40px;
            }
            
            
            .txt-pad
            {
                padding-top: 5px !important;
            }
            .txt-mar
            {
                padding-top: 10px !important;
                margin-bottom: 10px !important;
            }
            .pt-10
            {
                padding-top: 3rem !important;
            }
        }
        
        @media screen and (max-width: 600px) {
            
             .chairImg
            {
                top: 3%;
                left: 7%;
                width: 70px;
            }
            .pImage7{
                 display: none;
            }
             .pImage1
            {
                bottom: 12%;
                left: 6%;
                width: 50px;
            }
             .pImage2
            {
                bottom: 19%;
                left: 22%;
                width: 60px;
            }
            .pImage3
            {
                bottom: 5%;
                left: 33%;
                width: 50px;
            }
            .pImage4
            {
                bottom: 14%;
                left: 50%;
                width: 35px;
            }
            .pImage5
            {
                bottom: 18%;
                right: 16%;
                width: 60px;
            }
            .pImage6
            {
                bottom: 7%;
                right: 8%;
                width: 40px;
            }
           
        }

        @media screen and (max-width: 500px) {
            
             .chairImg
            {
                top: 3%;
                left: 8%;
                width: 50px;
            }
             .pImage1
            {
                bottom: 12%;
                left: 6%;
                width: 50px;
            }
             .pImage2
            {
                bottom: 19%;
                left: 22%;
                width: 60px;
            }
            .pImage3
            {
                bottom: 5%;
                left: 33%;
                width: 50px;
            }
            .pImage4
            {
                bottom: 14%;
                left: 50%;
                width: 35px;
            }
            .pImage5
            {
                bottom: 18%;
                right: 16%;
                width: 60px;
            }
            .pImage6
            {
                bottom: 7%;
                right: 8%;
                width: 40px;
            }
           
        }
                .sticky {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .bubbles {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
            top: 0;
            left: 0;
        }

        .bubble {
            position: absolute;
            bottom: -100px;
            width: 60px;
            /* Increase the bubble size */
            height: 60px;
            /* Increase the bubble size */
            background: #545C45;
            border-radius: 50%;
            opacity: 1;
            animation: rise 10s infinite ease-in;
             overflow: hidden;
        }

        /* Styling and animation properties for each bubble */
        .bubble:nth-child(1) {
            left: 5%;
            animation-duration: 8s;
            width: 100px;
            height: 100px;
        }

        .bubble:nth-child(2) {
            left: 15%;
            animation-duration: 5s;
            animation-delay: 1s;
            width: 80px;
            height: 80px;
        }

        .bubble:nth-child(3) {
            left: 25%;
            animation-duration: 7s;
            animation-delay: 2s;
            width: 60px;
            height: 60px;
        }

        .bubble:nth-child(4) {
            left: 35%;
            animation-duration: 11s;
            animation-delay: 0s;
            width: 100px;
            height: 100px;
        }

        .bubble:nth-child(5) {
            left: 45%;
            animation-duration: 6s;
            animation-delay: 1s;
            width: 80px;
            height: 80px;
        }

        .bubble:nth-child(6) {
            left: 55%;
            animation-duration: 8s;
            animation-delay: 3s;
            width: 60px;
            height: 60px;
        }

        .bubble:nth-child(7) {
            left: 65%;
            animation-duration: 12s;
            animation-delay: 2s;
            width: 100px;
            height: 100px;
        }

        .bubble:nth-child(8) {
            left: 75%;
            animation-duration: 6s;
            animation-delay: 2s;
            width: 80px;
            height: 80px;
        }

        .bubble:nth-child(9) {
            left: 85%;
            animation-duration: 5s;
            animation-delay: 1s;
            width: 60px;
            height: 60px;
        }

        .bubble:nth-child(10) {
            left: 95%;
            animation-duration: 10s;
            animation-delay: 4s;
            width: 100px;
            height: 100px;
        }

        .bubble:nth-child(11) {
            left: 10%;
            animation-duration: 9s;
            animation-delay: 2s;
            width: 80px;
            height: 80px;
        }

        .bubble:nth-child(12) {
            left: 30%;
            animation-duration: 8s;
            animation-delay: 1s;
            width: 60px;
            height: 60px;
        }

        .bubble:nth-child(13) {
            left: 60%;
            animation-duration: 10s;
            animation-delay: 3s;
            width: 60px;
            height: 60px;
        }

        .bubble:nth-child(14) {
            left: 80%;
            animation-duration: 7s;
            animation-delay: 2s;
            width: 80px;
            height: 80px;
        }

        .bubble:nth-child(15) {
            left: 40%;
            animation-duration: 9s;
            animation-delay: 3s;
            width: 100px;
            height: 100px;
        }
        .newpart {
            position: relative;
            z-index: 1;
        }
        @keyframes rise {
            0% {
    bottom: -100px;
  }
  100% {
    bottom: 1080px;
  }
}
    </style>
</head>

<body>
    <!--<img src="Group 3.png" alt="A descriptive text about the image" class="imgpos chairImg">-->
    <!--<img src="Mask group.png" alt="A descriptive text about the image" class="imgpos pImage1">-->
    <!--<img src="Mask group.png" alt="A descriptive text about the image" class="imgpos pImage2">-->
    <!--<img src="Mask group.png" alt="A descriptive text about the image" class="imgpos pImage3">-->
    <!--<img src="Mask group.png" alt="A descriptive text about the image" class="imgpos pImage4">-->
    <!--<img src="Mask group.png" alt="A descriptive text about the image" class="imgpos pImage5">-->
    <!--<img src="Mask group.png" alt="A descriptive text about the image" class="imgpos pImage6">-->
    <!--<img src="Mask group.png" alt="A descriptive text about the image" class="imgpos pImage7">-->
    
    <section class="sticky">
        <div class="bubbles">
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
            <div class="bubble">
                <img src="Mask group.png" alt="Bubble Image" width="100%" height="100%" />
            </div>
        </div>
    </section>
    
    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0 newpart">
        @if (Route::has('login'))
        <div class=" fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <!-- Settings Dropdown -->
            <div class="sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <!-- <div>{{ Auth::user()->name }}</div> -->
                            <!--<img src="" alt="Person" id="profileLogo" class="card__image2">-->
                             @php
                    $loggined_user = auth()->user();
                    $loggined_user_email = $loggined_user->email;
                    $profileData = App\Models\Profile::where('email', $loggined_user_email)->first();
                    if($profileData){
                    $firstLetter = substr($profileData->firstName, 0, 1);
                    $firstLetter = ucfirst($firstLetter);
                    }else{
                    $firstLetter = "";
                    }
                    
                    @endphp
                            <label style="display: inline-block; border-radius: 50%; background-color:white ; color:#717171; font-family:Inter;
                            padding-top: 6px; padding-bottom: 6px; font-weight:700; padding-left: 10px; padding-right: 10px; text-align:center; margin: 0px; border:none;" id="profileLogo">{{$firstLetter}}</label>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('home')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('show-Profile')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <a href="{{ route('login') }}" class="text-sm text-white">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-white">Register</a>
            @endif
            @endauth
        </div>
        @endif
        <div class="main-d max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>
            <div class="flex justify-center pt-8 sm:justify-center txt-mar sm:pt-0">
                <span class="tag-line">Ghana’s Favourite Apartment-Share</span>
            </div>
            <div class="flex justify-center mt-6 mb-8 pt-8 txt-mar sm:justify-center sm:pt-0">
                @auth
                <a href="/home?type=room" class="landing-button pt-4" style="padding-left: 10px; padding-right: 10px;">Find a room</a>
                @else
                <a href="/login?type=lessee" class="landing-button pt-4" style="padding-left: 10px; padding-right: 10px;">Find a room</a>
                @endauth
                
                @auth
                <a href="/home?type=roomie" class="landing-button pt-4 ml-2">Find a roomie</a>
                @else
                <a href="/login?type=lessor" class="landing-button pt-4 ml-2">List a room</a>
                @endauth
            </div>
            <div class="flex justify-center pt-8 sm:justify-center txt-pad sm:pt-0">
                <span class="main-line">Find a Room / Roomie</span>
            </div>
            <div class="flex justify-center pt-8 mt-1 sm:justify-center txt-pad sm:pt-0">
                <span class="under-main-line">Free forever</span>
            </div>
        </div>
    </div>
</body>
<script>
    // Mouse over bubble item
    var wrapper = $('.wrapper');
    $(".bubble-item").mouseenter(function() {
        $('.wrapper').addClass("paused");
    });

    // Mouse leave bubble item
    $(".bubble-item").mouseleave(function() {
        $('.wrapper').removeClass("paused");
    });

    $('.wrapper').on('animationiteration', function() {
        // Clone the gallery items and append them to the gallery
        $('.gallery-cluster').each(function() {
            $(this).clone().appendTo('.gallery');
        });

        // Calculate the new gallery width
        galleryWidth += clusterWidth * numClusters;

        // Set the new gallery width
        $('.gallery').css('width', galleryWidth + 'px');
    });
</script>

</html>