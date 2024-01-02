<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ntaafuo</title>
     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Nokora:wght@100&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nokora:wght@400;700&display=swap" rel="stylesheet">
<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Circular">-->

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/listroom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coursel.css') }}">
    <script src="{{ asset('js/login.js') }}" defer></script>
    <script src="{{ asset('js/create-profile.js') }}" defer></script>
    <script src="{{ asset('js/list.js') }}" defer></script>
    <script src="{{ asset('js/detail.js') }}" defer></script>
    <script src="{{ asset('js/search.js') }}" defer></script>
    <script src="{{ asset('js/nav.js') }}" defer></script>
    <script src="https://unpkg.com/imask"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-...your-sha384-hash..." crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class=" shadow">
            <div class="max-w-full">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main style="background-color: #f5f5f5;">
            {{ $slot }}
        </main>
    </div>
</body>

</html>