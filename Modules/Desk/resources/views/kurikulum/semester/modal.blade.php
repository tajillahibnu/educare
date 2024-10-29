<div class="modal fade show" id="modal-mapel" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-simple">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0;margin: 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;margin: 0;">
                <h4>Set Matapelajaran</h4>

                <div class="table-responsive">
                    <table id="tableMapel" class="table border-top table-border-bottom-0">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 90%;" class="text-truncate">Mapel</th>
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

<div class="modal fade show" id="modal-edit" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0;margin: 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;margin: 0;">
                <h4>Form Edit Kurikulum</h4>
                <form id="addNewCCForm" class="row g-6 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">
                    <div class="col-12 fv-plugins-icon-container">
                        <label class="form-label w-100" for="modalAddCard">Card Number</label>
                        <div class="input-group input-group-merge has-validation">
                            <input id="modalAddCard" name="modalAddCard" class="form-control credit-card-mask" type="text" placeholder="1356 3215 6548 7898" aria-describedby="modalAddCard2">
                            <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                        </div>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalAddCardName">Name</label>
                        <input type="text" id="modalAddCardName" class="form-control" placeholder="John Doe">
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="modalAddCardExpiryDate">Exp. Date</label>
                        <input type="text" id="modalAddCardExpiryDate" class="form-control expiry-date-mask" placeholder="MM/YY">
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="modalAddCardCvv">CVV Code</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="modalAddCardCvv" class="form-control cvv-code-mask" maxlength="3" placeholder="654">
                            <span class="input-group-text cursor-pointer ps-0" id="modalAddCardCvv2"><i class="text-muted ti ti-help" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Card Verification Value" data-bs-original-title="Card Verification Value"></i></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="futureAddress">
                            <label for="futureAddress" class="switch-label">Save card for future billing?</label>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Submit</button>
                        <button type="reset" class="btn btn-label-secondary btn-reset waves-effect" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                    </div>
                    <input type="hidden">
                </form>
            </div>
        </div>
    </div>
</div>