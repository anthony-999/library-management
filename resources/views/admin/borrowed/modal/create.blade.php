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
                <label>Books</label>
                <div class="row">
                    @foreach ($books->chunk(2) as $chunk)
                        <div class="col-md-3">
                            @foreach ($chunk as $book)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="book_id[]" value="{{ $book->id }}" id="book-{{ $book->id }}">
                                    <label class="form-check-label" for="book-{{ $book->id }}">
                                        {{ $book->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                @error('book_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


                    {{-- 
                    <div class="form-group">
                        <label>Book</label>
                        <select multiple="" class="form-control" name="book_id[]">
                           @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                           
                        </select>
                        @error('book_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                       --}}

                    <div class="form-group">
                        <label>Student Number</label>
                        <input name="student_number" class="form-control" type="number" />
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
                        @error('status')
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
