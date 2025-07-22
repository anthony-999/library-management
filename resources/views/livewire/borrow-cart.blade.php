<div class="container mt-5 p-5">
    <h2>Your Borrow Cart</h2>

     @if (session()->has('success'))
     <div class="alert alert-success">
        <p>{{ session('success') }}</p>
     </div>
    @elseif (session()->has('error'))
          <div class="alert alert-danger">
        <p>{{ session('error') }}</p>
     </div>
    @endif

    @if ($cartBooks->isEmpty())
        <p class="text-danger text-center">Your cart is empty.</p>
    @else
        <div class="row">
            @if ($cartBooks->isEmpty())
                <p>
                    Your cart is empty.
                </p>
            @endif
            @foreach ($cartBooks as $book)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $book->cover_page) }}" class="card-img-top" alt="{{ $book->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->name }}</h5>
                            <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                            <p><strong>Genre:</strong> {{ $book->category->name }}</p>
                            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>

                          <button wire:click="removeFromCart({{ $book->id }})" class="btn btn-danger btn-sm">Remove</button>

                        </div>
                    </div>
                </div>
            @endforeach
            
            <button wire:click="borrowBookFromCart" class="btn btn-danger btn-sm">Borrow</button>

        </div>
    @endif
</div>
