@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1 class="text-primary">Users</h1>
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
                        <th style="width: 30%;">Student No.</th>
                        <th style="width: 30%;">Name</th>
                        <th style="width: 30%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $count += 1 }}</td>
                            <td>{{ $user->student_number }}</td>
                            <td>{{ Str::title($user->name) }}</td>

                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- VIEW --}}
                                    <a href="#" class="btn btn-warning mx-2 btn-view" data-toggle="modal"
                                        data-target="#ModalView" data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}" data-student_number="{{ $user->student_number }}"
                                        data-email="{{ $user->email }}" data-role="{{ $user->role }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    {{-- VIEW --}}



                                    {{-- EDIT --}}
                                    <a href="#" class="btn btn-primary mx-2 btn-edit" data-toggle="modal"
                                        data-target="#ModalEdit" data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}" data-student_number="{{ $user->student_number }}"
                                        data-email="{{ $user->email }}" data-role="{{ $user->role }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- EDIT --}}


                                    {{-- DELETE --}}
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
            <div class="float-right">{{ $users->links() }}</div>


        </div>
    </div>

    {{--  MODAL PATH --}}
    @include('admin.users.modal.view')
    @include('admin.users.modal.edit')
    @include('admin.users.modal.create')

    {{-- MODAL PATH --}}


@stop

@section('css')

@stop

@section('js')
    {{-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> --}}
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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


        function toTitleCase(str) {
            return str.toLowerCase().split(' ').map(function(word) {
                return word.charAt(0).toUpperCase() + word.slice(1);
            }).join(' ');
        }

        // VIEW MODAL 
        $('.btn-view').on('click', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const student_number = $(this).data('student_number');
            const email = $(this).data('email');
            const role = $(this).data('role');


            $('#view-id').text(id);
            $('#view-name').text(name);
            $('#view-student_number').text(student_number);
            $('#view-email').text(email);
            $('#view-role').text(toTitleCase(role));
        })

        // EDIT MODAL 
        $('.btn-edit').on('click', function() {

            // Get the data from tag
            const id = $(this).data('id');
            const name = $(this).data('name');
            const student_number = $(this).data('student_number');
            const email = $(this).data('email');
            const role = $(this).data('role');


            // Display the data value in modal edit.blade.php
            $('#edit-id').val(id);
            $('#edit-name').val(name);
            $('#edit-student_number').val(student_number);
            $('#edit-email').val(email);
            $('#edit-role').val(role);

            // set form action dynamically  in modal edit.blade.php
            // get the id of the form and pass the route and id
            $('#edit-form').attr('action', '/users/' + id);

        })
    </script>

@stop
