<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
        <h4 class="mb-1">Jurnal KBM Guru</h4>
        <p class="mb-0">Jurnal Kegiatan Belajar Mengajar</p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
        <div class="d-flex gap-4">
            <button type="button" class="btn btn-success btn-danger waves-effect waves-light back-main">
                <span><i class="fa fa-arrow-left me-0 me-sm-1 mb-1 ti-xs"></i><span class="d-none d-sm-inline-block">Back</span></span>
            </button>
            <!-- <button class="btn btn-label-primary waves-effect">Save draft</button> -->
        </div>
        <button type="button" class="btn btn-success btn-primary waves-effect waves-light" onclick="onSaveIt()">
            <span><i class="fa fa-save me-0 me-sm-1 mb-1 ti-xs"></i><span class="d-none d-sm-inline-block">Simpan</span></span>
        </button>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <div class="card mb-6">
            <div class="card-header">
                <!-- <h5 class="card-tile mb-0">Product information</h5> -->
            </div>
            <div class="card-body">
                <div class="mb-6">
                    <label class="form-label" for="ecommerce-product-name">Judul Materi</label>
                    <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Product title" name="productTitle" aria-label="Product title">
                </div>
                <div class="row mb-6">
                    <div class="col">
                        <label class="form-label" for="ecommerce-product-sku">Tanggal Mulai</label>
                        <input type="number" class="form-control" id="ecommerce-product-sku" placeholder="SKU" name="productSku" aria-label="Product SKU">
                    </div>
                    <div class="col">
                        <label class="form-label" for="ecommerce-product-barcode">Tanggal Berakhir</label>
                        <input type="text" class="form-control" id="ecommerce-product-barcode" placeholder="0123-4567" name="productBarcode" aria-label="Product barcode">
                    </div>
                </div>
                <!-- Description -->
                <div>
                    <label class="mb-1">Description</label>
                    <textarea class="form-control" name="" id=""></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card mb-6">
            <div class="card-header">
                <h5 class="card-title mb-0">Data KBM</h5>
            </div>
            <div class="card-body">
                <!-- Base Price -->
                <div class="mb-6">
                    <label class="form-label" for="ecommerce-product-price">Kelas</label>
                    <input type="number" class="form-control" id="ecommerce-product-price" placeholder="Price" name="productPrice" aria-label="Product price">
                </div>
                <div class="mb-6">
                    <label class="form-label" for="ecommerce-product-price">Matapelajaran</label>
                    <input type="number" class="form-control" id="ecommerce-product-price" placeholder="Price" name="productPrice" aria-label="Product price">
                </div>
            </div>
        </div>
    </div>
</div>