<div class="row">
    <!-- On route vehicles Table -->
    <div class="col-12 order-5">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Daftar Karyawan</h5>
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
                        <a class="dropdown-item" href="javascript:APP.reloadTable();">Refresh</a>
                        <!-- <a class="dropdown-item" href="javascript:void(0);">Select All</a> -->
                        <!-- <a class="dropdown-item" href="javascript:void(0);">Share</a> -->
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="maintable" class="dt-route-vehicles table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>P/L</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!--/ On route vehicles Table -->
</div>