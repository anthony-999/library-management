<form action="" method="POST" enctype="multipart/form-data" id="edit-form">
     @csrf
         @method('PUT')

    <div class="modal fade text-left" id="ModalEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
      
                           

                </div>
                <div class="modal-body">

                    {{-- Hidden id to update --}}
                     <input type="hidden" id="edit-id" name="id">

                     <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="edit-name">
                    @error('name')
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
                        <img  src="" alt="Current Image" class="img-fluid rounded my-2  mx-auto d-block" width="100" id="edit-image">
                    </div>

                </div>
                <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
