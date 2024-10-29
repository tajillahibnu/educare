<div class="row">
    <div id="page-main">
        <div class="col-12 order-5">
            @include('desk::master.kurikulum.mainTable')
        </div>
    </div>
    <div id="page-detail" style="display: none;">
        <div class="col-12">
            @include('desk::master.kurikulum.detail')
        </div>
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
                        <label class="form-label">Kurikulum</label>
                        <input type="text" class="form-control" id="name" name="name">
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

<div class="modal fade show" id="modal-kelompok_mapel" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0;margin: 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;margin: 0;">
                <h4>Form Kategori Mapel</h4>
                <form id="formKelMapel" class="row" method="post" action="javascript:onSaveItKelMapel('formKelMapel')">
                    <div class="mb-4">
                        <label class="form-label">Kategori Mapel</label>
                        <input type="text" class="form-control" id="name" name="name">
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

<div class="modal fade show" id="modal-kelas" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0;margin: 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;margin: 0;">
                <h4>Form Kelas</h4>
                <form id="formKelas" class="row" method="post" action="javascript:onSaveItKelas('formKelas')">
                    <div class="mb-4">
                        <label class="form-label">Tingkat</label>
                        <select name="tingkat_id" id="tingkat_id" class="form-control"></select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="name" name="name">
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

<div class="modal fade show" id="modal-mapel" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-simple">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0;margin: 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;margin: 0;">
                <h4>Daftar Matapelajaran</h4>

                <div class="table-responsive">
                    <table id="tableMapel" class="table border-top table-border-bottom-0">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 90%;" class="text-truncate">Matapelajaran</th>
                                <th style="width: 5%;" class="text-truncate">Status</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>