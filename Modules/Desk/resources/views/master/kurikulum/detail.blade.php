<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <h4 class="mb-1">Detail Kurikulum</h4>
        <p class="mb-0"><span class="detail-name"></span></p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
        <div class="d-flex gap-4">
            <button id="cancelButton" class="btn btn-label-danger">Back</button>
            <!-- <button class="btn btn-label-primary">Save draft</button> -->
        </div>
        <!-- <button type="submit" class="btn btn-primary">Publish product</button> -->
    </div>
</div>

<div class="row">
    <!-- Customer-detail Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
        <!-- Customer-detail Card -->
        <div class="card mb-6">
            <div class="card-body">
                <div class="info-container">
                    <h5 class="pb-4 border-bottom text-capitalize mb-4">Details</h5>
                    <ul class="list-unstyled mb-6">
                        <li class="mb-2">
                            <span class="h6 me-1">Nama :</span>
                            <span class="detail-name"></span>
                        </li>
                        <li class="mb-2">
                            <span class="h6 me-1">Status :</span>
                            <label class="switch switch-square">
                                <input type="checkbox" class="switch-input" name="status_kurikulum" value="1">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"><i class="ti ti-check"></i></span>
                                    <span class="switch-off"><i class="ti ti-x"></i></span>
                                </span>
                            </label>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center d-none">
                        <a
                            href="javascript:void(0);"
                            class="btn btn-primary w-100"
                            onclick="showEditKurikulum()">Edit Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Customer-detail Card -->
    </div>
    <!--/ Customer Sidebar -->

    <!-- Customer Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
        <div class="nav-align-top">
            <ul id="tabMainData" class="nav nav-pills flex-column flex-md-row mb-6 row-gap-2">
                <li class="nav-item">
                    <a class="nav-link active" onclick="showTab(this)" data-tabName="ktgMapel" href="javascript:void(0)"><i class="ti ti-map-pin ti-sm me-1_5"></i>Kelompok Mapel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="showTab(this)" data-tabName="kelas" href="javascript:void(0);"><i class="ti ti-lock ti-sm me-1_5"></i>Kelas</a>
                </li>
                <li class="nav-item d-none">
                    <a class="nav-link" onclick="showTab(this)" href="javascript:void(0)"><i class="ti ti-user ti-sm me-1_5"></i>Semester</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="showTab(this)" href="javascript:void(0)"><i class="ti ti-bell ti-sm me-1_5"></i>Kompetensi</a>
                </li>
            </ul>
        </div>

        <div id="panel-ktgMapel" class="card mb-6 tabKurikulum">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Kategori Mapel</h5>
                </div>
                <div class="dropdown">
                    <button onclick="onNewKelompokMapel()" class="btn btn-sm btn-outline-primary">Tambah</button>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="tableKelompokMapel" class="table border-top table-border-bottom-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-truncate">Kategori Mapel</th>
                            <th class="text-truncate">Parent</th>
                            <th class="text-truncate">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div id="panel-kelas" class="card mb-6 tabKurikulum">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Daftar Kelas</h5>
                </div>
                <div class="dropdown">
                    <button onclick="onNewKelas()" class="btn btn-sm btn-outline-primary">Tambah</button>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="tableKelas" class="table border-top table-border-bottom-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-truncate">Kelas</th>
                            <th class="text-truncate">Tingkat</th>
                            <th class="text-truncate">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>