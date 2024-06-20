<?= $this->extend('layout/template.php'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <!-- Tombol Kategori -->
    <div class="row justify-content-center mb-4">
        <div class="col-auto">
            <!-- Tombol Kategori -->
            <button class="btn tombol category-btn" data-category="semua" style="border-color: black;">Semua</button>
            <button class="btn tombol category-btn" data-category="kesehatan" style="border-color: black;">Kesehatan</button>
            <button class="btn tombol category-btn" data-category="kebersihan" style="border-color: black;">Kebersihan</button>
            <button class="btn tombol category-btn" data-category="konstruksi" style="border-color: black;">Konstruksi</button>
            <button class="btn tombol category-btn" data-category="pendidikan" style="border-color: black;">Pendidikan</button>
            <button class="btn tombol category-btn" data-category="teknologi" style="border-color: black;">Teknologi</button>
        </div>
    </div>

    <!-- Input untuk Pencarian -->
    <div class="row justify-content-center mb-4">
        <div class="col-auto">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari jasa...">
        </div>
    </div>

    <div class="row" id="jasaContainer">
        <?php foreach ($jasa as $j) : ?>
            <div class="col-md-4 mb-4 jasa-item" data-category="<?= strtolower($j['kategori']); ?>">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoryButtons = document.querySelectorAll('.category-btn');
        const jasaItems = document.querySelectorAll('.jasa-item');
        const searchInput = document.getElementById('searchInput');

        categoryButtons.forEach(button => {
            button.addEventListener('click', function () {
                const category = button.getAttribute('data-category');
                filterJasa(category);
            });
        });

        searchInput.addEventListener('input', function () {
            const searchText = searchInput.value.trim().toLowerCase();
            filterJasa(null, searchText);
        });

        function filterJasa(category, searchText) {
            jasaItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category').toLowerCase();
                const itemName = item.querySelector('.card-title').textContent.toLowerCase();
                
                const categoryMatch = category === null || category === 'semua' || category === itemCategory;
                const searchMatch = searchText === '' || itemName.includes(searchText);

                if (categoryMatch && searchMatch) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    });
</script>

<?= $this->endSection(); ?>
