<!-- parent - row -->
<div class="row my-4">
    <div class="col-12">        
        <h6 class="lead my-2 mb-4">Submit request for your personal information removal</h6>
    </div>
    <div class="col-12">
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete account</button>

<!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure you want to delete your account?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger">Delete Account</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

