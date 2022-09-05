<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Data Papercup</h2>

            <form action="/papercup/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ?
                                                                    'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('stok')) ?
                                                                    'is-invalid' : ''; ?>" id="stok" name="stok" value="<?= old('stok'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('ukuran')) ?
                                                                    'is-invalid' : ''; ?>" id="ukuran" name="ukuran" value="<?= old('ukuran'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ukuran'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kapasitas" class="col-sm-2 col-form-label">Kapasitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kapasitas')) ?
                                                                    'is-invalid' : ''; ?>" id="kapasitas" name="kapasitas" value="<?= old('kapasitas'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kapasitas'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('harga')) ?
                                                                    'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="koleksi" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/default.jpeg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('koleksi')) ?
                                                                            'is-invalid' : ''; ?>" id="koleksi" name="koleksi" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('koleksi'); ?>
                            </div>
                            <label class="custom-file-label" for="koleksi">Pilih Gambar</label>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('koleksi'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>