<div class="row">
    <!-- On route vehicles Table -->
    <div class="col-12 order-5">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Daftar Matapelajaran</h5>
                </div>
                <div class="dropdown">
                    <button
                        class="btn btn-text-secondary rounded-pill text-muted border-0 p-2 me-n1"
                        type="button"
                        id="routeVehicles"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ti ti-dots-vertical ti-md text-muted"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="routeVehicles">
                        <a class="dropdown-item" href="javascript:newData(0);">Tambah Mapel</a>
                        <a class="dropdown-item" href="javascript:APP.reloadTable();">Refresh</a>
                        <!-- <a class="dropdown-item" href="javascript:void(0);">Share</a> -->
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="maintable" class="dt-route-vehicles table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Matapelajaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!--/ On route vehicles Table -->
</div>

<div class="modal fade show" id="modal-main" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0;margin: 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;margin: 0;">
                <h4>Form Matapelajaran</h4>
                <form id="formMain" class="row" method="post" action="javascript:onSaveIt('formMain')">
                    <div class="mb-4">
                        <label class="form-label">Email address</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
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