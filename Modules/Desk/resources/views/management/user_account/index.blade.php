<div class="row">
    <div class="col-12">
        @include('desk::management.user_account.mainTable')
    </div>
</div>

<div class="modal fade show" id="modal-main" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0;margin: 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;margin: 0;">
                <h4>Form Data</h4>
                <form id="formMain" class="row" method="post" action="javascript:onSaveIt('formMain')">
                    <div class="mb-4">
                        <label class="form-label">Nama Akun User</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Role Akses Utama</label>
                        <select class="form-control" name="main_role" id="main_role"></select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Role Akses Tambahan</label>
                        <select class="form-control" multiple name="sub_role[]" id="sub_role"></select>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Submit</button>
                        <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>