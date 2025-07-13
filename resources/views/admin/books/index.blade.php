@extends('adminlte::page')

@section('title', 'Books')

@section('content_header')
    <h1 class="text-primary">Books</h1>
@stop

@section('content')




    <div class="card ">
        <div class="card-header ">
            <div class="card-tools">
                <a href="#" class="btn btn-primary " data-toggle="modal" data-target="#ModalCreate"><i
                        class="fas fa-plus"></i></a>

            </div>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered text-center align-middle">
                <thead class="table">
                    <tr>
                        <th style="width: 10%;">No.</th>
                        {{-- <th style="width: 10%;">Category</th> --}}
                        {{-- <th style="width: 10%;">Cover Page</th> --}}
                        <th style="width: 10%;">Title</th>
                        <th style="width: 10%;">Author</th>
                        {{-- <th style="width: 10%;">ISBN</th> --}}
                        <th style="width: 10%;">Published</th>
                           <th style="width: 10%;">Status</th>
                        <th style="width: 10%;">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            {{-- <td>{{ $book->category->name }}</td> --}}
                            {{-- <td>
                                <img src="{{ asset('storage/' . $book->cover_page) }}" alt="Cover Page" width="30"
                                    class="rounded">
                            </td> --}}
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            {{-- <td>{{ $book->isbn }}</td> --}}
                            <td>{{ $book->published_year }}</td>
                             <td>{{ $book->is_available == 1 ? "Available" : "Not Available"}}</td>
                             
                            <td>
                                <div class="d-flex justify-content-center gap-2">

                                    {{-- VIEW --}}
                                    <a href="#" class="btn btn-warning mx-2 btn-view" data-toggle="modal"
                                        data-target="#ModalView" data-category_id="{{ $book->category->name }}"
                                        data-name="{{ $book->name }}" data-author="{{ $book->author }}"
                                        data-isbn="{{ $book->isbn }}" data-description="{{ $book->description }}"
                                        data-cover_page="{{ asset('storage/' . $book->cover_page) }}"
                                        data-published_year="{{ $book->published_year }}"
                                          data-is_available="{{ $book->is_available }}"
                                        >
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    {{-- VIEW --}}


                                    <a href="#" class="btn-edit btn btn-primary mx-2" data-toggle="modal"
                                        data-target="#ModalEdit" data-id="{{ $book->id }}"
                                        data-name="{{ $book->name }}" data-category_id="{{ $book->category_id }}"
                                        data-author="{{ $book->author }}" data-isbn="{{ $book->isbn }}"
                                        data-description="{{ $book->description }}"
                                        data-cover_page="{{ $book->cover_page }}"
                                         data-published_year="{{ $book->published_year }}"
                                        data-is_available="{{ $book->is_available }}"> <i class="fas fa-edit"></i></a>

                                    <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button class="btn-delete btn btn-danger mx-2" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>


                            </td>
                        </tr>
                    @endforeach




                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="float-right">
                {{ $books->links() }}
            </div>


        </div>
    </div>

    {{--  MODAL PATH --}}
    @include('admin.books.modal.create')
    @include('admin.books.modal.edit')
    @include('admin.books.modal.view')
    {{-- MODAL PATH --}}




@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

@stop

@section('js')
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        // Toastr flash messages
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (session('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif

        // SweetAlert delete confirmation
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const form = this.closest('form');

                Swal.fire({
                    title: "Are you sure?",

                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <!-- Auto-open modal on validation error -->
    <script>
        @if ($errors->any())
            $(document).ready(function() {
                $('#ModalCreate').modal('show');
            });
        @endif
    </script>
    <!-- Auto-open modal on validation error -->



    <script>
        // // VIEW MODAL DATA 
        $('.btn-view').on('click', function() {

            const category_id = $(this).data('category_id');
            const name = $(this).data('name');
            const author = $(this).data('author');
            const isbn = $(this).data('isbn');
            const description = $(this).data('description');
            const cover_page = $(this).data('cover_page');
            const published_year = $(this).data('published_year');
            const is_available = $(this).data('is_available');
           
            // Display as text instead of 1 or 0
            const availabilityText = is_available == 1 ? 'Available' : 'Not Available';

            $('#view-category_id').text(category_id);
            $('#view-name').text(name);
            $('#view-author').text(author);
            $('#view-isbn').text(isbn);
            $('#view-description').text(description);
            $('#view-cover_page').attr('src', cover_page);
            $('#view-published_year').text(published_year);  
            $('#view-is_available').text(availabilityText);

        });
        // // VIEW MODAL DATA 


        // EDIT MODAL DATA 
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const category_id = $(this).data('category_id');
            const name = $(this).data('name');
            const author = $(this).data('author');
            const isbn = $(this).data('isbn');
            const description = $(this).data('description');
            const cover_page = $(this).data('cover_page');
 const published_year = $(this).data('published_year');
            const is_available = $(this).data('is_available');

              // Display as text instead of 1 or 0
           

            $('#edit-id').val(id);
            $('#edit-category_id').val(category_id);
            $('#edit-name').val(name);
            $('#edit-author').val(author);
            $('#edit-isbn').val(isbn);
            $('#edit-description').val(description);
            $('#edit-cover_page').attr('src', '/storage/' + cover_page);
            $('#edit-published_year').val(published_year);
             $('#edit-is_available').val(is_available);




            // set form action dynamically
            $('#edit-form').attr('action', '/books/' + id);

        });
        // EDIT MODAL DATA 
    </script>






@endsection
