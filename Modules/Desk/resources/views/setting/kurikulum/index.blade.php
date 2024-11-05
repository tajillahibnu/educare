<div class="row g-6">
    <!-- Navigation -->
    <div class="col-12 col-lg-4">
        <div class="d-flex justify-content-between flex-column mb-4 mb-md-0">
            <h5 class="mb-4">Pengaturan Kurikulum</h5>
            <ul class="nav nav-align-left nav-pills flex-column">
                <li class="nav-item mb-1">
                    <a class="nav-link active" href="javascript:void(0);">
                        <i class="ti ti-building-store ti-sm me-1_5"></i>
                        <span class="align-middle">Semester</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link" href="app-ecommerce-settings-payments.html">
                        <i class="ti ti-credit-card ti-sm me-1_5"></i>
                        <span class="align-middle">Payments</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link" href="app-ecommerce-settings-checkout.html">
                        <i class="ti ti-shopping-cart ti-sm me-1_5"></i>
                        <span class="align-middle">Checkout</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link" href="app-ecommerce-settings-shipping.html">
                        <i class="ti ti-discount-2 ti-sm me-1_5"></i>
                        <span class="align-middle">Shipping & delivery</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link" href="app-ecommerce-settings-locations.html">
                        <i class="ti ti-map-pin ti-sm me-1_5"></i>
                        <span class="align-middle">Locations</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="app-ecommerce-settings-notifications.html">
                        <i class="ti ti-bell-ringing ti-sm me-1_5"></i>
                        <span class="align-middle">Notifications</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /Navigation -->

    <!-- Options -->
    <div class="col-12 col-lg-8 pt-6 pt-lg-0">
        <div class="tab-content p-0">
            <!-- Store Details Tab -->
            <div class="tab-pane fade show active" id="store_details" role="tabpanel">
                <div class="card mb-6">
                    <div class="card-header">
                        <h5 class="card-title m-0">Semester 1</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-6 g-6">
                            <div class="col-12 col-md-6">
                                <label class="form-label mb-1" for="ecommerce-settings-details-name">Tahun Pelajaran</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="ecommerce-settings-details-name"
                                    placeholder="John Doe"
                                    name="settingsDet"
                                    aria-label="settings Details" />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label mb-1" for="ecommerce-settings-details-phone">Tanggal Mulai s/d Akhir</label>
                                <input
                                    type="tel"
                                    class="form-control phone-mask"
                                    id="ecommerce-settings-details-phone"
                                    placeholder="+(123) 456-7890"
                                    name="phone"
                                    aria-label="phone" />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label mb-1" for="ecommerce-settings-details-email">Store contact email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="ecommerce-settings-details-email"
                                    placeholder="johndoe@gmail.com"
                                    name="email"
                                    aria-label="email" />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label mb-1" for="ecommerce-settings-sender-email">Sender email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="ecommerce-settings-sender-email"
                                    placeholder="johndoe@gmail.com"
                                    name="sender_email"
                                    aria-label="sender email" />
                            </div>
                        </div>

                        <div class="alert d-flex align-items-center alert-warning mb-0 h5" role="alert">
                            <span class="alert-icon me-4 rounded-2">
                                <i class="ti ti-bell ti-md"></i>
                            </span>
                            Confirm that you have access to johndoe@gmail.com in sender email settings.
                        </div>
                    </div>
                </div>

                <div class="card mb-6">
                    <div class="card-header">
                        <h5 class="card-title m-0">Billing information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-6">
                            <div class="col-12 col-md-6">
                                <label class="form-label mb-1" for="business-name">Legal business name</label>
                                <input type="text" id="business-name" class="form-control" placeholder="Business name" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label mb-1" for="country_region">Country/region</label>
                                <select id="country_region" class="select2 form-select" data-placeholder="United States">
                                    <option value="">United States</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Canada">Canada</option>
                                    <option value="China">China</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Korea">Korea, Republic of</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Russia">Russian Federation</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label mb-1" for="bill_address">Address</label>
                                <input type="text" id="bill_address" class="form-control" placeholder="Address" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label mb-1" for="apa_suite">Apartment, suite, etc.</label>
                                <input
                                    type="text"
                                    id="apa_suite"
                                    class="form-control"
                                    placeholder="Apartment, suite, etc." />
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label mb-1" for="bill_city">City</label>
                                <input type="text" id="bill_city" class="form-control" placeholder="City" />
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label mb-1" for="bill_state">State</label>
                                <input type="text" id="bill_state" class="form-control" placeholder="State" />
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label mb-1" for="bill_pincode">PIN Code</label>
                                <input
                                    type="number"
                                    id="bill_pincode"
                                    class="form-control"
                                    placeholder="PIN Code"
                                    min="0"
                                    max="999999" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-4">
                    <button type="reset" class="btn btn-label-secondary">Discard</button>
                    <a class="btn btn-primary" href="app-ecommerce-settings-payments.html">Save Changes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Options-->
</div>