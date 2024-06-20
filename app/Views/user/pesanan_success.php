<?= $this->extend('layout/template.php'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Pesanan Berhasil Dibuat!</h1>
            <p>Pesanan Anda telah berhasil dibuat. Terima kasih telah menggunakan layanan kami.</p>
            <a href="<?= base_url('/'); ?>" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
