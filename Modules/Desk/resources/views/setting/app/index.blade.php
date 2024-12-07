<div class="app-ecommerce">
    <!-- Add Product -->
    <div
        class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">Setting Application</h4>
            <p class="mb-0">configuration management application</p>
        </div>
    </div>

    <div class="row">
        <!-- First column-->
        <div class="col-12 col-lg-8">
            <!-- Product Information -->
            <form action="javascript:onSaveApp('frmConfigApp')" id="frmConfigApp" method="post">
                <div class="card mb-6">
                    <div class="card-header">
                        <h5 class="card-tile mb-0">Data App & Sekolah</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-6">
                            <label class="form-label" for="ecommerce-product-name">Name Sekolah</label>
                            <input type="text" class="form-control" id="sekolah_name" placeholder="Product title" name="sekolah_name" aria-label="Product title" />
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="ecommerce-product-name">Alamat Sekolah</label>
                            <textarea class="form-control" name="sekolah_alamat" id="sekolah_alamat" placeholder="Masukkan alamat sekolah" cols="30" rows="4"></textarea>
                        </div>
                        <hr>
                        <div class="mb-6">
                            <label class="form-label" for="ecommerce-product-name">Name Singkat</label>
                            <input type="text" class="form-control" id="app_title" placeholder="Product title" name="app_title" aria-label="Product title" />
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="ecommerce-product-name">Name Application</label>
                            <input type="text" class="form-control" id="app_name" placeholder="Product title" name="app_name" aria-label="Product title" />
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="ecommerce-product-name">Deskripsi Applikasi</label>
                            <textarea class="form-control" name="app_deskripsi" id="app_deskripsi" placeholder="Masukkan deskripsi applikasi" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                <!-- /Product Information -->
                <!-- Inventory -->
                <div class="card mb-6">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Setting Etc</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Navigation -->
                            <div class="col-12 col-md-4 col-xl-5 col-xxl-4 mx-auto card-separator">
                                <div class="d-flex justify-content-between flex-column mb-4 mb-md-0 pe-md-4">
                                    <div class="nav-align-left">
                                        <ul class="nav nav-pills flex-column w-100">
                                            <li class="nav-item">
                                                <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#smtp">
                                                    <i class="ti ti-box ti-sm me-1_5"></i>
                                                    <span class="align-middle">SMTP</span>
                                                </button>
                                            </li>
                                            <li class="nav-item">
                                                <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#shipping">
                                                    <i class="ti ti-car ti-sm me-1_5"></i>
                                                    <span class="align-middle">Shipping</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /Navigation -->
                            <!-- Options -->
                            <div class="col-12 col-md-8 col-xl-7 col-xxl-8 pt-6 pt-md-0">
                                <div class="tab-content p-0 ps-md-4">
                                    <!-- Restock Tab -->
                                    <div class="tab-pane fade show active" id="smtp" role="tabpanel">
                                        <form action="javascript:onSaveItEmail('frmConfigEmail')" id="frmConfigEmail" method="post">
                                            <h6 class="text-body">SMTP Email</h6>
                                            <div class="row mb-4 g-4 pe-md-4">
                                                <div class="col-12 col-sm-12">
                                                    <label class="form-label" for="ecommerce-product-stock">Email Name</label>
                                                    <input type="text" class="form-control" id="email_name" name="email_name" placeholder="Quantity" aria-label="Quantity" />
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <label class="form-label" for="ecommerce-product-stock">Email Sender</label>
                                                    <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Quantity" aria-label="Quantity" />
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <label class="form-label" for="ecommerce-product-stock">Email Port</label>
                                                    <input type="text" class="form-control" id="email_port" name="email_port" placeholder="Quantity" aria-label="Quantity" />
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <label class="form-label" for="ecommerce-product-stock">User Email</label>
                                                    <input type="text" class="form-control" id="email_username" name="email_username" placeholder="Quantity" aria-label="Quantity" />
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <label class="form-label" for="ecommerce-product-stock">Password</label>
                                                    <input type="text" class="form-control" id="email_password" name="email_password" placeholder="Quantity" aria-label="Quantity" />
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Shipping Tab -->
                                    <div class="tab-pane fade" id="shipping" role="tabpanel">
                                        <h6 class="mb-3 text-body">Shipping Type</h6>
                                        <div>
                                            <div class="form-check mb-4">
                                                <input class="form-check-input" type="radio" id="seller" />
                                                <label class="form-check-label" for="seller">
                                                    <span class="mb-1 h6">Fulfilled by Seller</span><br />
                                                    <small>You'll be responsible for product delivery.<br />
                                                        Any damage or delay during shipping may cost you a Damage fee.</small>
                                                </label>
                                            </div>
                                            <div class="form-check mb-6">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    id="companyName"
                                                    checked />
                                                <label class="form-check-label" for="companyName">
                                                    <span class="mb-1 h6">Fulfilled by Company name &nbsp;<span
                                                            class="badge rounded-2 badge-warning bg-label-warning fs-tiny py-1">RECOMMENDED</span></span><br />
                                                    <small>Your product, Our responsibility.<br />
                                                        For a measly fee, we will handle the delivery process for you.</small>
                                                </label>
                                            </div>
                                            <p class="mb-0">
                                                See our <a href="javascript:void(0);">Delivery terms and conditions</a> for details
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Options-->
                        </div>
                    </div>
                </div>
                <!-- /Inventory -->
            </form>
        </div>
        <!-- /Second column -->

        <!-- Second column -->
        <div class="col-12 col-lg-4">
            <!-- Pricing Card -->
            <div class="card mb-6">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informasi</h5>
                </div>
                <div class="card-body">
                    <div class="mb-6">
                        <label class="form-label" for="ecommerce-product-price">Jenis Sekolah</label>
                        <select class="form-control" name="sekolah_tipe" id="sekolah_tipe">
                            <option value="SD">SD</option>
                            <option value="SD">SMP</option>
                            <option value="SMA">SMA/SMK</option>
                        </select>
                    </div>
                    <div class="form-check ms-2 mt-2 mb-4">
                        <input class="form-check-input" type="checkbox" value="SMK" id="sekolah_is_smk" name="sekolah_is_smk" />
                        <label class="switch-label" for="price-charge-tax"> Cheklist jika mengunakan mode SMK </label>
                    </div>
                    <hr>
                    <div class="mb-6">
                        <label class="form-label" for="ecommerce-product-discount-price">Email</label>
                        <input type="text" class="form-control" id="sekolah_email" placeholder="Discounted Price" name="sekolah_email" aria-label="Product discounted price" />
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="ecommerce-product-discount-price">Telepon</label>
                        <input type="text" class="form-control" id="sekolah_tlpn" placeholder="Discounted Price" name="sekolah_tlpn" aria-label="Product discounted price" />
                    </div>
                </div>
            </div>
            <!-- /Pricing Card -->
        </div>
        <!-- /Second column -->
    </div>
</div>