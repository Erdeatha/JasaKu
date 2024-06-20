// View user/home.php
<?= $this->extend('layout/template.php'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <!-- Tombol Kategori -->
    <div class="row justify-content-center mb-4">
        <div class="col-auto">
            <button class="btn tombol" style="border-color: black;">Semua</button>
            <button class="btn tombol" style="border-color: black;">Kesehatan</button>
            <button class="btn tombol" style="border-color: black;">Kebersihan</button>
            <button class="btn tombol" style="border-color: black;">Konstruksi</button>
            <button class="btn tombol" style="border-color: black;">Pendidikan</button>
            <button class="btn tombol" style="border-color: black;">Teknologi</button>
        </div>
    </div>

    <div class="row" id="jasaContainer">
        <?php foreach ($jasa as $j) : ?>
            <div class="col-md-4 mb-4">
                <div class="card jasa-card h-100">
                    <a href="/home/detailJasa/<?= $j['slug']; ?>" class="text-decoration-none text-dark">
                        <img src="<?= base_url('assets/images/produk-jasa/' . $j['gambar']); ?>" class="card-img-top" alt="<?= $j['nama']; ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $j['nama']; ?></h5>
                            <?php if (!empty($j['paket'])) : ?>
                                <p class="card-text">
                                    <span class="text-primary" style="font-size: 20px; margin-bottom: 15px">Rp<?= number_format($j['paket'][0]['harga'], 0, ',', '.'); ?></span><br>
                                    <span class="badge bg-info text-dark"><?= $j['kategori']; ?></span>
                                    <span class="badge bg-success"><?= $j['status']; ?></span>
                                </p>
                            <?php endif; ?>
                            
                            <div class="row mt-2">
                                <div class="col d-flex align-items-center">
                                    <i class="bi bi-star-fill text-warning me-1"></i> <?= $j['rating']; ?> / 5
                                </div>
                                <div class="col d-flex align-items-center">
                                    <i class="bi bi-cart3 text-muted me-1"></i> <?= $j['total_pesanan']; ?>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <i class="bi bi-heart text-muted me-1"></i> <?= $j['difavoritkan']; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>
