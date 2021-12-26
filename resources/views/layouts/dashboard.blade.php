<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Laravel' }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="font-sans text-gray-600 antialiased">
    <div class="min-h-screen bg-gray-100 flex flex-row">
        {{-- @include('layouts.navigation') --}}

        <!-- Page Heading -->
        {{-- <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header> --}}

        <!-- Page Content -->

        @include('layouts.sidebar')

        <div class="flex-1">
            @include('layouts.navbar')

            <main class="relative px-8 space-y-6">
                <div class="pt-8">
                    <h1 class="font-bold text-gray-700 text-3xl">{{$title ?? ''}}</h1>
                </div>
                {{ $slot }}
            </main>
        </div>
    </div>


    {{$script ?? '' }}
</body>

</html>