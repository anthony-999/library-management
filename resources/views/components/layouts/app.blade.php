<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
              <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

</head>

<body style="background-color: #d8d8db">
    @livewire('partials.navbar')


    <div class="mt-5">
        {{ $slot }}
    </div>



    @livewireScripts
  

  <script>

    AOS.init();
  </script>



</body>

</html>
