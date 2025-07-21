<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body style="background-color: #f4f4f5">
    @livewire('partials.navbar')


    <div class="">
        {{ $slot }}
    </div>



    @livewireScripts
  
        {{-- <x-livewire-alert::scripts /> --}}



</body>

</html>
