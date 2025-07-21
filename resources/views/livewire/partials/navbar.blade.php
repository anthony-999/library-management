<div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <!-- Brand/logo -->
            <a class="navbar-brand d-flex align-items-center mx-5" href="{{ route('landing') }}">
                <img src="{{ asset('images/book_logo.png') }}" alt="Logo" height="80" class="me-2">
               
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
                                <a href="{{ route('dashboard') }}" class="nav-link fs-5" >   <i class="fa-solid fa-house text-primary fs-4" data-toggle="tooltip" data-placement="top" title="Home" ></i></a>
                             
                            </li>
                            <li class="nav-item mx-2">
                                <a href="{{ route('borrow.cart') }}" class="nav-link fs-5">
                                    <i class="fa-solid fa-cart-shopping text-primary fs-4"
                                data-toggle="tooltip" data-placement="top" title="Cart"></i></a>
                            </li>
                            <li class="nav-item mx-2">
                                <a href="{{ route('borrow.list') }}" class="nav-link fs-5"><i class="fa-solid fa-book text-primary fs-4"   data-toggle="tooltip" data-placement="top" title="Borrowed List"></i></a>
                            </li>
                        @else
                            <li class="nav-item mx-2">
                                <a href="{{ route('login') }}" class="nav-link fs-5">Login</a>
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
