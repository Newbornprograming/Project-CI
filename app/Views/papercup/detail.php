<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Papercup</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $papercup['koleksi']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $papercup['judul']; ?></h5>
                            <p class="card-text"><b>Stok : </b> <?= $papercup['stok']; ?></p>
                            <p class="card-text"><b>Ukuran : </b> <?= $papercup['ukuran']; ?></p>
                            <p class="card-text"><b>Kapasitas : </b> <?= $papercup['kapasitas']; ?></p>
                            <p class="card-text"><b>Harga : </b> <?= $papercup['harga']; ?></p>
                            <p class="card-text"><small class="text-muted">Last created <?= $papercup['created_at']; ?></small></p>
                            <p class="card-text"><small class="text-muted">Last updated <?= $papercup['updated_at']; ?></small></p>

                            <a href="/papercup/edit/<?= $papercup['id']; ?>" class='btn btn-warning'>Edit</a>

                            <form action="/papercup/<?= $papercup['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin');">Delete</button>
                            </form>
                            <br><br>
                            <a href="/papercup">Kembali ke Daftar Papercup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>