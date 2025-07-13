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
                            @foreach ($borroweds as $borrowed)
                                <option value="{{ $borrowed->book->id }}">{{ $borrowed->book->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Student Number</label>
                        <input name="student_number" class="form-control"  type="number"/>
                          
                       
                    </div>


                    <div class="form-group">
                        <label>Borrowed Date</label>
                        <div class="input-group date">
                            <input name="borrow_date" type="date" class="form-control datetimepicker-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Due Date</label>
                        <div class="input-group date">
                            <input name="due_date" type="date" class="form-control datetimepicker-input">
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label>Return Date</label>
                        <div class="input-group date">
                            <input name="retrun_date" type="date" class="form-control datetimepicker-input">
                        </div>
                    </div> --}}



                
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control">
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
