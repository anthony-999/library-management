<div class="">
    <div class="scale-in-center" style="font-size: 50px; margin-top: 200px">
        <p class="text-primary text-center p-5">
            The library is not just a place for books but a community space that fosters learning, engagement, and
            experience
        </p>
    </div>

    <div class="container " style=" margin-top: 200px">
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
    {{-- <div class=" " style=" margin-top: 200px">
        <p class="text-center" style="font-size: 30px">Category</p>

        <div class="container text-center mt-5">

            <div class="row justify-content-start ">


                @foreach ($categories as $category)
                    <div class="col-3 mb-4">
                        <div class="card" style="width: 15rem;">
                            <img src="{{ asset('storage/' . $category->cover_page) }}" class= "p-1 card-img-top"
                                alt="categories" style="height: 300px; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">{{ $category->name }}</h5>

                              
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>


    </div> --}}
    {{-- Category --}}


    {{-- Books Carousel --}}
    <div class="mt-5">
        <p class="text-center" style="font-size: 30px">Books</p>

        <div id="booksCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner">

                @foreach ($books->chunk(4) as $chunkIndex => $bookChunk)
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="container">
                            <div class="row justify-content-center">
                                @foreach ($bookChunk as $book)
                                    <div class="col-md-3">
                                        <div class="card mb-3" style="width: 100%;">
                                            <img src="{{ asset('storage/' . $book->cover_page) }}"
                                                class="card-img-top p-2" style="height: 300px; object-fit: cover;"
                                                alt="Book Cover">
                                            <div class="card-body">

                                                <a href="{{ route('view.book', $book) }}}}" class="btn btn-primary btn-sm d-block">Borrow</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- Carousel Controls --}}
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






</div>
