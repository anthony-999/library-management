<form action="" method="POST" enctype="multipart/form-data" id="edit-form">
    @csrf
    @method('PUT')

    <div class="modal fade text-left" id="ModalEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Borrowed</h5>
                </div>

                <div class="modal-body">

                    {{-- Hidden id to update --}}
                    <input type="hidden" name="id" id="edit-id">

           

          <div class="form-group">
    <label for="book-select">Books</label>
    <select name="book_id[]" id="book-select" class="form-control" multiple disabled>
        @foreach ($books as $book)
            <option value="{{ $book->id }}"
                @if(isset($selectedBookIds) && in_array($book->id, $selectedBookIds)) selected @endif>
                {{ $book->name }}
            </option>
        @endforeach
    </select>
    @error('book_id')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>






                    <div class="form-group">
                        <label>Student Number</label>
                        <input type="number" class="form-control" name="student_number" id="edit-student_number" disabled>
                        @error('student_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label>Borrow Date</label>
                        <input type="date" class="form-control" name="borrow_date" id="edit-borrow_date">
                        @error('borrow_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date" class="form-control" name="due_date" id="edit-due_date">
                        @error('due_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Return Date</label>
                        <input type="date" class="form-control" name="return_date" id="edit-return_date">
                        @error('return_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="edit-status">
                            <option value="borrowed">Borrowed</option>
                            <option value="returned">Returned</option>
                            <option value="overdue">Overdue</option>

                        </select>
                    </div>


                   

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>


            </div>
        </div>
    </div>
</form>
