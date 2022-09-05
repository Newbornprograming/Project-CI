<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-2">Pembelian Papercup</h1>
            <h3 class="pt-2 pb-2 mt-2" style="text-align: center;">Masukkan Barang Yang Akan Dibeli</h3>
            <div class="table-responsive">
                <form action="<?= base_url('barang/add') ?>" method="post">
                    <table class="table table-striped m-auto" style="width: 400px" border="3">
                        <tr>
                            <td>Kode</td>
                            <td>:</td>
                            <td><input type="text" name="kode" require placeholder="Masukkan Kode"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="nama" require placeholder="Masukkan Nama"></td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td><input type="number" name="jumlah" require placeholder="Masukkan Jumlah"></td>
                        </tr>
                        <tr>
                            <td> <button type="submit" class="btn btn-success">Input Data Menuju Keranjang</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <!--------------------------------------------------------------------------------------------------------------------- -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Judul</th>
                        <th scope="col">jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>basic</td>
                        <td>5</td>
                        <td>
                            <a href="" class='btn btn-warning'>Edit</a>
                            <a href="" class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>