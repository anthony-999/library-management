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
    <div class="scale-in-center" style="font-size: 50px; margin-top: 200px">
        <p class="text-primary text-center p-5 ">
            When in doubt, <br>
            Go to the library.
        </p>
    </div>

    <div class="container " style=" margin-top: 300px">
        <p class="text-center" style="font-size: 30px">About</p>

        <div class="row align-items-start " style=" margin-top: 100px">
            <div class="col">
                <img src="{{ asset('images/about2.jpg') }}" alt=""
                    style="width: 500px;  box-shadow: 0px 13px 12px -7px rgba(128, 128, 128, 1);">
            </div>

            <div class="col">
                <p class="text-center fs-4 mt-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur tempore excepturi sunt dicta
                    officiis molestiae libero nostrum mollitia ad eligendi amet fugit ex eius, commodi laudantium.
                    Incidunt quidem eos accusamus!
                </p>
            </div>
        </div>

    </div>


    {{-- Category --}}
    <div style=" margin-top: 400px">
        <p class="text-center" style="font-size: 30px">Category</p>

       <div id="booksCarousel" class="carousel slide " data-bs-ride="carousel" style=" margin-top: 100px">
            <div class="carousel-inner">

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

                                               <div class="card-title">{{ $ctg->name }}</div>
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

    <div style=" margin-top: 400px">
        <p class="text-center" style="font-size: 30px">Books</p>
  <div class="container text-center mt-5">

            <div class="row justify-content-start ">


                @foreach ($books as $book)
                    <div class="col-3 mb-4">
                        <div class="card" style="width: 15rem;">
                            <img src="{{ asset('storage/' . $book->cover_page) }}" class= "p-1 card-img-top"
                                alt="categories" style="height: 300px; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">{{ $book->name }}</h5>
                                  @if ($book->is_available == 0)
                                         <div class="ribbon"><span>Not Available</span></div>

                                  @else
                                      <div class="ribbon"><span> Available</span></div>

                                  @endif

                                                <a href="{{ route('view.book', $book) }}}}" class="btn btn-primary btn-sm d-block">View</a>

                              
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </div>




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
