<div id="page-main" class="row">
    <!-- On route vehicles Table -->
    <div class="col-3 order-0">
        <div class="card mb-6">
            <div class="card-body">
                <h5 class="mb-4">Filter</h5>
                <select class="form-select mb-6" id="acceptPaymentsVia">
                    <option value="Bank Account">Bank Account</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Card">Credit/Debit Card</option>
                    <option value="UPI Transfer">UPI Transfer</option>
                </select>
                <select class="form-select mb-6" id="acceptPaymentsVia">
                    <option value="Bank Account">Bank Account</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Card">Credit/Debit Card</option>
                    <option value="UPI Transfer">UPI Transfer</option>
                </select>
            </div>
        </div>

    </div>
    <div class="col-9 order-1">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Daftar Semester</h5>
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
                        <a class="dropdown-item" href="javascript:newData(0);">Tambah Kurikulum</a>
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
                            <th>Kurikulum</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!--/ On route vehicles Table -->
</div>
<div id="page-detail" style="display: none;">
    @include('desk::kurikulum.semester.detail')
</div>

@include('desk::kurikulum.semester.modal')