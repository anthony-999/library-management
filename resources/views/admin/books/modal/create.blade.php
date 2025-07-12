<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Books</h5>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>


                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="author" value="{{ old('author') }}">
                        @error('author')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>ISBN - International Standard Book Number</label>
                        <input type="text" class="form-control" name="isbn" value="{{ old('isbn') }}">
                        @error('isbn')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Cover Page</label>
                        <div class="input-group">
                            <input type="file" name="cover_page" id="" class="form-control">
                        </div>

                        @error('cover_page')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>


                    <div class="form-group">
                        <label>Published Year</label>
                        <input type="number" class="form-control" name="published_year" min="1000" max="9999"
                            maxlength="4" value="{{ old('published_year') }}"  placeholder="e.g. 2024">
                        @error('published_year')
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
