<div id="page-main" class="row">
    <!-- On route vehicles Table -->
    <div class="col-3 order-0">
        <div class="card mb-6">
            <div class="card-body">
                <h5 class="mb-4">Filter</h5>
                <div class="mb-6">
                    <select class="form-select" id="filter_tahun_pelajaran"></select>
                </div>
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
                    <button type="button" class="btn btn-sm btn-secondary btn-primary waves-effect waves-light" onclick="enrolKurikulum()">
                        <span><i class="ti ti-plus me-0 me-sm-1 mb-1 ti-xs"></i><span class="d-none d-sm-inline-block">Kurikulum</span></span>
                    </button>
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
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="maintable" class="dt-route-vehicles table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tingkat</th>
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