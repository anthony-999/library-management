<div class="p-1">
    @if (session()->has('success'))
     <div class="alert alert-success">
        <p>{{ session('success') }}</p>
     </div>
    @elseif (session()->has('error'))
          <div class="alert alert-danger">
        <p>{{ session('error') }}</p>
     </div>
    @endif

    

    <div class="card-body">
        <div class="row g-4 align-items-start p-5">
            <div class="col-12 col-sm-6 text-center">
                <img src="{{ asset('storage/' . $book->cover_page) }}" alt="Book Cover"
                    class="img-fluid rounded shadow-sm book-cover" width="400">
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

                    <h5>Status</h5>
                <div class="">
                    @if ($book->is_available == 0)
                       <button  class="btn btn-warning btn-sm">Not Available</button>
                    @else
                                        <button wire:click="addToCart" class="btn btn-success btn-sm">Add to Cart</button>

                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </script>
</div>
