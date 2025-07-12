<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
     @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Category</h5>
      
                           

                </div>
                <div class="modal-body">
                     <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @error('name')
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
                    <label>Cover Image</label>
                    <div class="input-group">
                        <input type="file" name="cover_page" id="" class="form-control">
                    </div>

                    @error('cover_page')
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
