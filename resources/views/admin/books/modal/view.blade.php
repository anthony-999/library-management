<div class="modal fade text-left" id="ModalView" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Book</h5>

            </div>
            <div class="modal-body">

            {{-- $('#view-category_id').text(category_id);
            $('#view-name').text(name);
            $('#view-author').text(author);
            $('#view-isbn').text(isbn);
            $('#view-description').text(description);
            $('#view-cover_page').attr('src', image);
            $('#view-published_year').text(published_year); --}}
        

                 <div class="form-group">
                    <label>Category</label>
                    <p id="view-category_id" class="form-control-plaintext"></p>
                </div>


                <div class="form-group">
                    <label>Name</label>
                    <p id="view-name" class="form-control-plaintext"></p>
                </div>
                
                <div class="form-group">
                    <label>Author</label>
                    <p id="view-author" class="form-control-plaintext"></p>
                </div>

                  
                <div class="form-group">
                    <label>ISBN - International Standard Book Number</label>
                    <p id="view-isbn" class="form-control-plaintext"></p>
                </div>


                <div class="form-group">
                    <label>Description</label>
                    <p id="view-description" class="form-control-plaintext"></p>
                </div>

                   <div class="form-group">
                    <label>Published Year</label>
                    <p id="view-published_year" class="form-control-plaintext"></p>
                </div>

                <div class="form-group">
                    <label>Cover Page</label><br>
                    <img id="view-cover_page" src="" alt="Cover Image" class="img-fluid rounded d-block mx-auto"
                        width="200">
                </div>


            </div>
            <div class="modal-footer">
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
            </div>
        </div>
    </div>
</div>
