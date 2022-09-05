<?php

use App\Controllers\Papercup;
?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Ubah Data Papercup</h2>

            <form action="/papercup/update/<?= $papercup['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="koleksiLama" value="<?= $papercup['koleksi']; ?>">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ?
                                                                    'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= $papercup['judul']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('stok')) ?
                                                                    'is-invalid' : ''; ?>" id="stok" name="stok" value="<?= $papercup['stok']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('ukuran')) ?
                                                                    'is-invalid' : ''; ?>" id="ukuran" name="ukuran" value="<?= $papercup['stok']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ukuran'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kapasitas" class="col-sm-2 col-form-label">Kapasitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kapasitas')) ?
                                                                    'is-invalid' : ''; ?>" id="kapasitas" name="kapasitas" value="<?= $papercup['kapasitas']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kapasitas'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('harga')) ?
                                                                    'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= $papercup['harga']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="koleksi" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $papercup['koleksi']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('koleksi')) ?
                                                                            'is-invalid' : ''; ?>" id="koleksi" name="koleksi" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('koleksi'); ?>
                            </div>
                            <label class="custom-file-label" for="koleksi"><?= $papercup['koleksi']; ?></label>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('koleksi'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>