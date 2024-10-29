<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <h4 class="mb-1">Detail Kurikulum</h4>
        <p class="mb-0"><span class="detail-name"></span></p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
        <div class="d-flex gap-4">
            <button id="cancelButton" class="btn btn-label-danger">Cancel</button>
            <button class="btn btn-label-primary">Save draft</button>
        </div>
        <button type="submit" class="btn btn-primary">Publish product</button>
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
                            <span class="h6 me-1">Status :</span>
                            <span class="badge bg-label-success">Active</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6 me-1">Tahun Akademik :</span>
                            <span>2021/2022</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6 me-1">Semester :</span>
                            <span>1 (satu)</span>
                        </li>

                        <li class="mb-2">
                            <span class="h6 me-1">Tanggal :</span>
                            <span>1 Okt 2022 s/d 1 Desember 2024</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center">
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
                    <a class="nav-link active" onclick="showTab(this)" href="javascript:void(0)"><i class="ti ti-map-pin ti-sm me-1_5"></i>Kelompok Mapel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="showTab(this)" href="javascript:void(0);"><i class="ti ti-lock ti-sm me-1_5"></i>Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="showTab(this)" href="javascript:void(0)"><i class="ti ti-user ti-sm me-1_5"></i>Semester</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="showTab(this)" href="javascript:void(0)"><i class="ti ti-bell ti-sm me-1_5"></i>Kompetensi</a>
                </li>
            </ul>
        </div>

        <div class="card mb-6">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Kelompok Mapel</h5>
                </div>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-primary">Tambah</button>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="tableKelompokMapel" class="table border-top table-border-bottom-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-truncate">Kelompok Mapel</th>
                            <th class="text-truncate">Parent</th>
                            <th class="text-truncate">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>