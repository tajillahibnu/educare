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
                            href="javascript:;"
                            class="btn btn-primary w-100"
                            data-bs-target="#editUser"
                            data-bs-toggle="modal">Edit Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Customer-detail Card -->
    </div>
    <!--/ Customer Sidebar -->

    <!-- Customer Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
        <!-- Customer Pills -->
        <div class="nav-align-top">
            <ul id="tabMainData" class="nav nav-pills flex-column flex-md-row mb-6 row-gap-2">
                <li class="nav-item">
                    <a class="nav-link active" onclick="showTab(this)" href="javascript:void(0)"><i class="ti ti-map-pin ti-sm me-1_5"></i>Kelompok Mapel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="showTab(this)" href="javascript:void(0);"><i class="ti ti-lock ti-sm me-1_5"></i>Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="showTab(this)" href="javascript:void(0)"><i class="ti ti-user ti-sm me-1_5"></i>Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="showTab(this)" href="javascript:void(0)"><i class="ti ti-bell ti-sm me-1_5"></i>Kompetensi</a>
                </li>
            </ul>
        </div>
        <!--/ Customer Pills -->

        <!-- Recent Devices -->
        <div class="card mb-6">
            <h5 class="card-header">Recent Devices</h5>
            <div class="table-responsive">
                <table class="table border-top table-border-bottom-0">
                    <thead>
                        <tr>
                            <th class="text-truncate">Browser</th>
                            <th class="text-truncate">Device</th>
                            <th class="text-truncate">Location</th>
                            <th class="text-truncate">Recent Activities</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-truncate text-heading">
                                <i class="mb-1 ti ti-brand-windows ti-md text-info me-4"></i> Chrome on Windows
                            </td>
                            <td class="text-truncate">HP Spectre 360</td>
                            <td class="text-truncate">Switzerland</td>
                            <td class="text-truncate">10, July 2021 20:07</td>
                        </tr>
                        <tr>
                            <td class="text-truncate text-heading">
                                <i class="mb-1 ti ti-device-mobile ti-md text-danger me-4"></i> Chrome on iPhone
                            </td>
                            <td class="text-truncate">iPhone 12x</td>
                            <td class="text-truncate">Australia</td>
                            <td class="text-truncate">13, July 2021 10:10</td>
                        </tr>
                        <tr>
                            <td class="text-truncate text-heading">
                                <i class="mb-1 ti ti-brand-android ti-md text-success me-4"></i> Chrome on Android
                            </td>
                            <td class="text-truncate">Oneplus 9 Pro</td>
                            <td class="text-truncate">Dubai</td>
                            <td class="text-truncate">14, July 2021 15:15</td>
                        </tr>
                        <tr>
                            <td class="text-truncate text-heading">
                                <i class="mb-1 ti ti-brand-apple ti-md me-4"></i>Chrome on MacOS
                            </td>
                            <td class="text-truncate">Apple iMac</td>
                            <td class="text-truncate">India</td>
                            <td class="text-truncate">16, July 2021 16:17</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Recent Devices -->
    </div>
    <!--/ Customer Content -->
</div>