<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Landing page</title>
    @livewireStyles
    <!-- Include AdminLTE CSS here -->

         <link href="toastr.css" rel="stylesheet"/>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
   

  
             
                    {{ $slot }}
               

            <script src="toastr.js"></script>
    @livewireScripts
    <!-- Include AdminLTE JS here -->
</body>
</html>
