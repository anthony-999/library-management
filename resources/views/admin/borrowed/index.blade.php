@extends('adminlte::page')

@section('title', 'Borrowed')

@section('content_header')
    <h1 class="text-primary">Borrowed</h1>
@stop

@section('content')




    <div class="card ">
        <div class="card-header ">
            {{-- <h3 class="card-title">Category</h3> --}}
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
                        <th style="width: 10%;">Books</th>
                        <th style="width: 10%;">Student No.</th>
                        <th style="width: 10%;">Borrowed Date</th>
                        <th style="width: 10%;">Due Date</th>
                        {{-- <th style="width: 10%;">Return Date</th> --}}
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%;">Action</th>



                    </tr>
                </thead>
                <tbody>

                    @foreach ($borroweds as $borrowed)
                        <tr>
                            <td>{{ $borrowed->id }}</td>
                            <td>{{ $borrowed->book->name }}</td>
                            <td>{{ $borrowed->user?->student_number ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($borrowed->borrow_date)->format('F d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($borrowed->due_date)->format('F d, Y') }}</td>
                            {{-- <td>{{ \Carbon\Carbon::parse($borrowed->return_date)->format('F d, Y') }}</td> --}}
                            <td>{{ Str::ucfirst($borrowed->status) }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- VIEW --}}
                                    <a href="#" class="btn btn-warning mx-2 btn-view" data-toggle="modal"
                                        data-target="#ModalView" data-name="{{ $borrowed->book->name }}"
                                        data-student_number="{{ $borrowed->user->student_number }}"
                                        data-borrow_date="{{ $borrowed->borrow_date }}"
                                        data-due_date="{{ $borrowed->due_date }}"
                                        data-return_date="{{ $borrowed->return_date }}"
                                        data-status="{{ $borrowed->status }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    {{-- VIEW --}}

                                    {{-- EDIT --}}
                                    {{-- <a href="#" class="btn btn-primary mx-2 btn-edit" data-toggle="modal"
                                        data-target="#ModalEdit" data-id="{{ $category->id }}"
                                        data-name="{{ $category->name }}" data-description="{{ $category->description }}"
                                        data-image="{{ asset('storage/' . $category->cover_page) }}">
                                        <i class="fas fa-edit"></i>
                                    </a> --}}
                                    {{-- EDIT --}}

                                    {{-- DELETE --}}
                                    <form action="{{ route('borrowed.destroy', $borrowed->id) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-delete btn btn-danger mx-2"> <i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                    {{-- DELETE --}}

                                </div>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{-- <div class="float-right">{{ $categories->links() }}</div> --}}


        </div>
    </div>

    {{--  MODAL PATH --}}
    @include('admin.borrowed.modal.create')
    @include('admin.borrowed.modal.view')
    {{-- @include('admin.category.modal.edit') --}}
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
        // data - name = "{{ $borrowed->book->name }}"
        // data - student_number = "{{ $borrowed->user->student_number }}"
        // data - borrow_date = "{{ $borrowed->borrow_date }}"
        // data - due_date = "{{ $borrowed->due_date }}"
        // data - return_date = "{{ $borrowed->return_date }}"
        // data - status = "{{ $borrowed->status }}"

       function formatDatePH(dateString) {
    if (!dateString) {
        return 'N/A';
    }
    const date = new Date(dateString);
    return date.toLocaleDateString('en-PH', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

        // VIEW MODAL DATA 
        $('.btn-view').on('click', function() {
            const name = $(this).data('name');
            const student_number = $(this).data('student_number');
            const borrow_date = $(this).data('borrow_date');
            const due_date = $(this).data('due_date');
            const return_date = $(this).data('return_date');
            const status = $(this).data('status');

            $('#view-name').text(name);
            $('#view-student_number').text(student_number);
          $('#view-borrow_date').text(formatDatePH(borrow_date));
$('#view-due_date').text(formatDatePH(due_date));
$('#view-return_date').text(formatDatePH(return_date));
$('#view-status').text(status.charAt(0).toUpperCase() + status.slice(1).toLowerCase());


        });
        // VIEW MODAL DATA 


        //     // EDIT MODAL DATA 
        //     $('.btn-edit').on('click', function() {
        //         const id = $(this).data('id');
        //         const name = $(this).data('name');
        //         const description = $(this).data('description');
        //         const image = $(this).data('image');

        //         $('#edit-id').val(id);
        //         $('#edit-name').val(name);
        //         $('#edit-description').val(description);
        //         $('#edit-image').attr('src', image);

        //         // set form action dynamically
        //         $('#edit-form').attr('action', '/categories/' + id);

        //     });
        //      // EDIT MODAL DATA 
        // 
    </script>




@endsection
