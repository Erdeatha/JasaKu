<?= $this->extend('layout/template_profil.php'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Jasa</h2>
        <a href="#" class="btn btn-outline-primary">+ Tambah Jasa</a>
    </div>
    <div class="card mb-3 w-100">
        <div class="row g-0">
            <div class="col-md-2">
                <img src="path/to/your/image.jpg" class="img-fluid rounded-start" alt="Service Image">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title">Jasa Service Handphone</h5>
                    <p class="card-text">
                        Deskripsi: Service HP Samsung A54 5g<br>
                        Lama Pengerjaan: 5 hari<br>
                        Kota Bandung
                    </p>
                </div>
            </div>
            <div class="col-md-3 d-flex flex-column justify-content-center align-items-end pr-3">
                <h5 class="mb-4">Rp. 300.000,00</h5>
                <div>
                    <button class="btn btn-outline-success btn-sm me-1">Kelola Jasa</button>
                    <button class="btn btn-outline-primary btn-sm me-1">Edit Jasa</button>
                    <button class="btn btn-outline-danger btn-sm">Hapus Jasa</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>