<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="my-2"> Daftar Pelanggan</h1>
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Keyword Pencarian.. " name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1 class="my-2"> Daftar Pelanggan</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($admin as $key) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $key['nama']; ?></td>
                            <td><?= $key['role']; ?></td>
                            <td><a href="/admin/<?= $key['id']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach  ?>
                </tbody>
            </table>
            <?= $pager->links('admin', 'admin_pagination'); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>