<form action="" method="POST" enctype="multipart/form-data" id="edit-form">
    @csrf
    @method('PUT')

    <div class="modal fade text-left" id="ModalEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Books</h5>



                </div>
                <div class="modal-body">

                    {{-- Hidden id to update --}}
                    <input type="hidden" name="id" id="edit-id">

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control" id="edit-category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                        @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="name" id="edit-name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="author" id="edit-author">
                        @error('author')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>ISBN - International Standard Book Number</label>
                        <input type="text" class="form-control" name="isbn" id="edit-isbn">
                        @error('isbn')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" rows="5" name="description" id="edit-description"></textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Cover Page</label>
                        <input type="file" name="cover_page" class="form-control">
                        <img src="" alt="Current Image" class="img-fluid rounded my-2  mx-auto d-block"
                            width="100" id="edit-cover_page">
                    </div>

                    <div class="form-group">
                        <label>Published Year</label>
                        <input type="number" min="1000" max="9999" maxlength="4" class="form-control"
                            name="published_year" id="edit-published_year">
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
