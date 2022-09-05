<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/papercup/create" class="btn btn-primary mt-3">Tambah Data Papercup</a>
            <h1 class="my-2"> Daftar Paper Cup</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Koleksi</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($papercup as $key) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $key['koleksi']; ?>" alt="" class="koleksi"></td>
                            <td><?= $key['judul']; ?></td>
                            <td><a href="/papercup/<?= $key['id']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>