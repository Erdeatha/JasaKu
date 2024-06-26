<?= $this->extend('layout/template_profil.php'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="min-height: 100vh">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Jasa</h2>
        <a href="/jasa/tambah" class="btn btn-outline-primary">+ Tambah Jasa</a>
    </div>

    <?php foreach ($jasa as $j) : ?>
        <div class="card mb-3 w-100">
            <div class="row g-0">
                <div class="col-md-2">
                    <img src="<?= base_url('assets/images/produk-jasa/' . $j['gambar']) ?>" class="img-fluid rounded-start" alt="<?= $j['nama'] ?>">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title"><?= $j['nama'] ?></h5>
                        <p class="card-text">
                            Deskripsi: <?= $j['deskripsi'] ?><br>
                            Kategori: <?= $j['kategori'] ?><br>
                            Alamat: <?= $j['alamat'] ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-column justify-content-center align-items-end pr-3">
                    <?php if (isset($j['harga'])): ?>
                        <h5 class="mb-4">Rp. <?= number_format($j['harga'], 2, ',', '.') ?></h5>
                    <?php else: ?>
                        <h5 class="mb-4">Harga tidak tersedia</h5>
                    <?php endif; ?>
                    <div>
                        <!-- Gunakan form untuk mengirimkan metode DELETE -->
                        <form action="<?= base_url('/jasa/hapus/' . $j['id']) ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jasa ini?')">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm">Hapus Jasa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>
