<div class="p-1">
    <div class="card-body">
        <div class="row g-4 align-items-start p-5">
            <div class="col-12 col-sm-6 text-center ">
               
                <div class="col-12">
                    <img 
                        src="{{ asset('storage/' . $book->cover_page) }}" 
                        alt="Book Cover" 
                        class="img-fluid rounded shadow-sm book-cover"
                       width="400" 
                    >
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <h1 class="my-3">{{ $book->name }}</h1>
                <p><strong>Genre:</strong> {{ $book->category->name }}</p>
                <p><strong>Author:</strong> {{ $book->author }}</p>
                <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                <p><strong>Published:</strong> {{ $book->published_year }}</p>
                <hr>

                <h5>Description</h5>
                <p class="text-muted">{{ $book->description }}</p>

                <div class="mt-4">
                    <a href="#" class="btn btn-primary btn-md btn-flat">
                        
                        Borrow
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
