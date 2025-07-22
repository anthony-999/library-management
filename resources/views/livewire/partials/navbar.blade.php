<div class="fixed-top ">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary shadow-lg ">
        <div class="container-fluid">
            <!-- Brand/logo -->
            <a class="navbar-brand d-flex align-items-center text-light mx-5" href="{{ route('landing') }}">
                {{-- <img src="{{ asset('images/book_logo2.png') }}" alt="Logo" height="50" class="me-2"> --}}
                BookHaven
               
            </a>

            <!-- Toggle button for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-end mx-5" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item mx-2" >
                                <a href="{{ route('dashboard') }}" class="nav-link " >   <i class="fa-solid fa-house text-light fs-5" data-toggle="tooltip" data-placement="top" title="Home" ></i></a>
                             
                            </li>
                            <li class="nav-item mx-2">
                                <a href="{{ route('borrow.cart') }}" class="nav-link ">
                                    <i class="fa-solid fa-cart-shopping text-light fs-5"
                                data-toggle="tooltip" data-placement="top" title="Cart"></i></a>
                            </li>
                            <li class="nav-item mx-2">
                                <a href="{{ route('borrow.list') }}" class="nav-link "><i class="fa-solid fa-book text-light fs-5"   data-toggle="tooltip" data-placement="top" title="Borrowed List"></i></a>
                            </li>
                             
                        @else
                            <li class="nav-item mx-2">
                                <a href="{{ route('login') }}" class="nav-link text-light ">
                                    <i class="fa-solid fa-user text-light fs-5" data-toggle="tooltip" data-placement="top" title="Log in"></i>
                                </a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item mx-2">
                                    <a href="{{ route('register') }}" class="nav-link fs-5">Register</a>
                                </li>
                            @endif --}}
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
</div>
