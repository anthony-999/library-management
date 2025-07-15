<form action="{{ route('borrowed.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Create Borrowed</h5>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Book</label>
                        <select name="book_id" class="form-control">
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Student Number</label>
                        <input name="student_number" class="form-control"  type="number"/>
                           @error('student_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                       
                    </div>


                    <div class="form-group">
                        <label>Borrowed Date</label>
                        <div class="input-group date">
                            <input name="borrow_date" type="date" class="form-control datetimepicker-input">
                        </div>
                         @error('borrow_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Due Date</label>
                        <div class="input-group date">
                            <input name="due_date" type="date" class="form-control datetimepicker-input">
                        </div>
                         @error('due_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                



                
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="borrowed">Borrowed</option>
                            <option value="returned">Returned</option>
                            <option value="overdue">Overdue</option>


                        </select>
                         @error('book_id')
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
