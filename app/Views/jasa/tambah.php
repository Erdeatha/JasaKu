<?= $this->extend('layout/template_profil.php'); ?>

<?= $this->section('content'); ?>

<div class="container py-4">
    <h2>Tambah Jasa</h2>
    <form action="/jasa/tambah" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Jasa</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" id="kategori" name="kategori" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" id="slug" name="slug" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" id="gambar" name="gambar" class="form-control">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" required>
                <option value="available">Available</option>
                <option value="unavailable">Unavailable</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="0.1" id="rating" name="rating" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total_pesanan" class="form-label">Total Pesanan</label>
            <input type="number" id="total_pesanan" name="total_pesanan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="difavoritkan" class="form-label">Difavoritkan</label>
            <input type="number" id="difavoritkan" name="difavoritkan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= $this->endSection(); ?>
