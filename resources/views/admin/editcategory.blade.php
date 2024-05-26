<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="{{ url('updatecategory' ,$data->id) }}" method="post">
                
                <div class="form-group">
                    <label for="category-name">Category Name</label>
                    @csrf
                    <input type="text" name="category" value="{{ $data->category_name }}" class="form-control">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update Category</button>
                </div>
            </form>
            
            </div>
        </div>
    </div>
</div>