<form action="" method="POST" enctype="multipart/form-data" id="edit-form">
    @csrf
    @method('PUT')

    <div class="modal fade text-left" id="ModalEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Users</h5>



                </div>
                <div class="modal-body">

                    {{-- Hidden id to update --}}
                    <input type="hidden" name="id" id="edit-id">





                    <div class="form-group">
                        <label>Student No.</label>
                        <input type="number" class="form-control" name="student_number" id="edit-student_number" value="{{ old('student_number')  }}">
                        @error('student_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="edit-name" value="{{ old('name')  }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="edit-email" value="{{ old('email')  }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" >
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Role</label>
                       <select name="role" class="form-control">
    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
</select>
                        @error('role')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>





                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
