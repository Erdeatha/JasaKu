<?= $this->extend('layout/template.php'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-body">
                    <img src="<?= base_url('assets/images/produk-jasa/' . $jasa['gambar']); ?>" alt="<?= $jasa['nama']; ?>" class="img-fluid rounded mb-4" style="width: 100%; height: 400px; object-fit: cover;">
                    <div class="mb-3">
                        <span class="badge bg-info text-dark"><?= $jasa['kategori']; ?></span>
                        <span class="badge bg-success"><?= $jasa['status']; ?></span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="bi bi-star-fill text-warning"></i> <?= $jasa['rating']; ?> / 5
                        </div>
                        <div class="me-3">
                            <i class="bi bi-cart3 text-muted"></i> <?= $jasa['total_pesanan']; ?>
                        </div>
                        <div>
                            <i class="bi bi-heart text-muted"></i> <?= $jasa['difavoritkan']; ?>
                        </div>
                    </div>
                    <h4>Deskripsi:</h4>
                    <p class="card-text"><?= $jasa['deskripsi']; ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-body">
                    <h2 class="card-title text-center"><?= $jasa['nama']; ?></h2>
                    <h5 class="card-title">Paket Jasa</h5>
                    <?php foreach ($paket_jasa as $paket) : ?>
                        <div class="mb-3 p-3 border rounded bg-light">
                            <h6 class="card-subtitle mb-2 text-muted"><?= $paket['nama']; ?></h6>
                            <p class="card-text"><?= $paket['rincian']; ?></p>
                            <p class="card-text"><strong>Harga:</strong> Rp<?= number_format($paket['harga'], 0, ',', '.'); ?></p>
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('/pesanan/create?id_jasa=' . $jasa['id'] . '&id_paket=' . $paket['id'] . '&harga=' . $paket['harga']); ?>" class="btn btn-primary">Pesan Sekarang</a>
                                <a href="https://wa.me/6289529994677?text=Halo%20Admin,%20saya%20tertarik%20dengan%20paket%20jasa%20<?= urlencode($paket['nama']); ?>%20dengan%20harga%20Rp<?= number_format($paket['harga'], 0, ',', '.'); ?>." class="btn btn-secondary" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Chat dengan Penjual">Chat Penjual</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<script>
    // Tooltip initialization
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
