<div class="">

    @if (session()->has('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <!-- Quote Section -->
    <div class="   text-white " style="min-height: 80vh;" data-aos="zoom-in" data-aos-delay="300">
        <div class="container">
            <div class="text-center text-primary"  >
                <h1 class="display-4 fw-bold" style="margin-top: 300px">
                    When in doubt, <br> Go to the library.
                </h1>
            </div>
        </div>
    </div>


    <!-- About Section -->
    <div class=" bg-primary " style="margin-top: 100px;  min-height: 100vh;">
        <div class="container p-4 ">
            <h2 class="text-center mb-5 text-light" data-aos="zoom-in" style="margin-top: 100px; ">About</h2>

            <div class="row align-items-center g-4" style="margin-top: 100px;  ">
                <!-- Image Column -->
                <div class="col-lg-6 col-md-12 text-center ">
                    <img src="{{ asset('images/about2.jpg') }}" alt="About Image" class="img-fluid rounded shadow-lg"
                        style="max-width: 100%;" data-aos="fade-right" data-aos-delay="200">
                </div>

                <!-- Text Column -->
                <div class="col-lg-6 col-md-12">
                    <p class="fs-5 text-center text-md-start text-light" data-aos="fade-left" data-aos-delay="500">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur tempore excepturi sunt
                        dicta
                        officiis molestiae libero nostrum mollitia ad eligendi amet fugit ex eius, commodi laudantium.
                        Incidunt quidem eos accusamus!
                    </p>
                </div>
            </div>
        </div>
    </div>



    {{-- Category --}}
    <div class=" py-5" style=" margin-top: 300px; min-height: 100vh;">
        <p class="text-center" style="font-size: 30px">Genre</p>

        <div id="booksCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner" style=" margin-top: 100px; ">

                @foreach ($categories->chunk(4) as $chunkIndex => $categoryChunk)
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="container">
                            <div class="row justify-content-center">
                                @foreach ($categoryChunk as $ctg)
                                    <div class="col-md-3">
                                        <div class="card mb-3" style="width: 100%;">
                                            <img src="{{ asset('storage/' . $ctg->cover_page) }}"
                                                class="card-img-top p-2" style="height: 300px; object-fit: cover;"
                                                alt="Book Cover">
                                            <div class="card-body">

                                                <div class="card-title text-center text-primary">{{ $ctg->name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


            <button class="carousel-control-prev " type="button" data-bs-target="#booksCarousel" data-bs-slide="prev"
                style="filter: invert(100%);">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#booksCarousel" data-bs-slide="next"
                style="filter: invert(100%);">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>


    </div>
    {{-- Category --}}

<div class="container " style=" margin-top: 300px; min-height: 100vh;">
    <h2 class="text-center mb-5" style="font-size: 30px;">Books</h2>

    <div class="row">
        @foreach ($books as $book)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4 d-flex align-items-stretch">
                <div class="card w-100">
                    <img src="{{ asset('storage/' . $book->cover_page) }}"
                         alt="Book Cover"
                         class="card-img-top p-1"
                         style="height: 300px; object-fit: cover;">

                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-start">{{ $book->name }}</h5>

                        @if ($book->is_available == 0)
                            <div class="ribbon"><span>Not Available</span></div>
                        @else
                            <div class="ribbon"><span>Available</span></div>
                        @endif

                        <a href="{{ route('view.book', $book) }}" class="btn btn-primary btn-sm w-100 mt-auto">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

   
<!-- Footer -->
<footer class="bg-primary text-white text-center text-lg-start " style="margin-top: 400px">
    <div class="container py-4">
        <!-- Branding -->
        <div class="mb-3">
            <h5 class="mb-0 text-center">Book Haven</h5>
        </div>

        <hr class="bg-white" />

        <!-- Description -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-10 col-lg-8">
                <p class="mb-0 text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                    distinctio earum repellat quaerat voluptatibus placeat nam,
                    commodi optio pariatur est quia magnam eum harum corrupti
                    dicta, aliquam sequi voluptate quas.
                </p>
            </div>
        </div>

        <!-- Social Icons -->
        <div class="mb-3 d-flex justify-content-center">
            <a href="#" class="text-white me-3">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-white me-3">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-white me-3">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-white me-3">
                <i class="fab fa-github"></i>
            </a>
        </div>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.15)">
        © 2025 Copyright:
        <a class="text-white text-decoration-none" href="#">Book Haven</a>
    </div>
</footer>
<!-- Footer -->


   




    <style>
        .box {
            width: 200px;
            height: 300px;
            position: relative;
            border: 1px solid #BBB;
            background: #EEE;
        }

        .ribbon {
            position: absolute;
            right: -5px;
            top: -5px;
            z-index: 1;
            overflow: hidden;
            width: 75px;
            height: 75px;
            text-align: right;
        }

        .ribbon span {
            font-size: 8px;
            font-weight: bold;
            color: #FFF;
            text-transform: uppercase;
            text-align: center;
            line-height: 20px;
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            width: 100px;
            display: block;
            background: #79A70A;
            background: linear-gradient(#F70505 0%, #8F0808 100%);
            box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
            position: absolute;
            top: 19px;
            right: -21px;
        }

        .ribbon span::before {
            content: "";
            position: absolute;
            left: 0px;
            top: 100%;
            z-index: -1;
            border-left: 3px solid #8F0808;
            border-right: 3px solid transparent;
            border-bottom: 3px solid transparent;
            border-top: 3px solid #8F0808;
        }

        .ribbon span::after {
            content: "";
            position: absolute;
            right: 0px;
            top: 100%;
            z-index: -1;
            border-left: 3px solid transparent;
            border-right: 3px solid #8F0808;
            border-bottom: 3px solid transparent;
            border-top: 3px solid #8F0808;
        }
    </style>




</div>
