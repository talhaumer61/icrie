<?php 
echo'
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form method="post" autocomplete="off" enctype="multipart/form-data">
            
            <div class="modal-header bg-primary">
                <h6 class="modal-title"><i class="fas fa-lock"></i> Change Password</h6>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">New Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="new_password" placeholder="New Password" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" name="chnage_pass">Save</button>
                <button class="btn btn-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>';
?>