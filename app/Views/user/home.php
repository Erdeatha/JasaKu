<?= $this->extend('layout/template.php'); ?>

<?= $this->section('content'); ?>

<style>
    #tombol-kategori {
        border-color: black;
        background-color: #FFFFFF;
        color: black;
        transition: background-color 0.3s, color 0.3s;
        margin: 5px;
    }

    #tombol-kategori:hover {
        background-color: #177DFF;
        color: #FFFFFF;
    }

    #tombol-kategori.active {
        background-color: #1D4D8E;
        color: #FFFFFF;
    }

    @media (max-width: 768px) {
        .category-btn {
            width: 50px;
        }
        .teks-kategori {
            display: none;
        }
    }
</style>

<div class="container-fluid mt-2" style="background: linear-gradient(180deg, #177DFF 23%, #1D4D8E 63%, #10253F 88%); min-height: 100vh">
    <!-- Carousel Iklan -->
    <div id="iklanCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner pt-5 px-5">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="assets/images/iklan1.png" class="d-block w-100 img-fluid" style="max-height: 300px; object-fit: cover" alt="Iklan 1">
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="assets/images/iklan2.png" class="d-block w-100" style="max-height: 300px; width: auto; object-fit: cover;" alt="Iklan 2">
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="assets/images/iklan3.png" class="d-block w-100" style="max-height: 300px; width: auto; object-fit: cover;" alt="Iklan 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#iklanCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#iklanCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="row justify-content-center mb-4 pt-5">
        <div class="col-auto">
            <!-- Tombol Kategori -->
            <button id="tombol-kategori" class="btn tombol category-btn active" data-category="semua"><i class="bi bi-globe"></i> <span class="teks-kategori"> Semua</span></button>
            <button id="tombol-kategori" class="btn tombol category-btn" data-category="kesehatan"><i class="bi bi-heart-fill"></i><span class="teks-kategori"> Kesehatan</span></button>
            <button id="tombol-kategori" class="btn tombol category-btn" data-category="kebersihan"><i class="bi bi-droplet-fill"></i> <span class="teks-kategori"> Kebersihan</span></button>
            <button id="tombol-kategori" class="btn tombol category-btn" data-category="konstruksi"><i class="bi bi-tools"></i><span class="teks-kategori"> Konstruksi</span></button>
            <button id="tombol-kategori" class="btn tombol category-btn" data-category="pendidikan"><i class="bi bi-book"></i><span class="teks-kategori"> Pendidikan</span></button>
            <button id="tombol-kategori" class="btn tombol category-btn" data-category="teknologi"><i class="bi bi-laptop"></i><span class="teks-kategori"> Teknologi</span></button>
        </div>
    </div>

    <div class="row px-5 py-3" id="jasaContainer">
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
    <div id="noResultsMessage" class="text-center" style="display: none; color: while">
        <h4 style="color: white">Jasa tidak ditemukan</h4>
        <button id="searchAgainButton" class="btn btn-primary mt-3">Cari Lagi</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryButtons = document.querySelectorAll('.category-btn');
        const jasaItems = document.querySelectorAll('.jasa-item');
        const noResultsMessage = document.getElementById('noResultsMessage');
        const searchAgainButton = document.getElementById('searchAgainButton');
        const carousel = document.getElementById('iklanCarousel');

        // Event listener for category buttons
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                categoryButtons.forEach(btn => btn.classList.remove('active'));

                // Add active class to the clicked button
                button.classList.add('active');

                const category = button.getAttribute('data-category');
                filterJasa(category);
            });
        });

        // Event listener for "Cari Lagi" button
        searchAgainButton.addEventListener('click', function() {
            const searchInput = document.getElementById('searchInput');
            searchInput.focus();
        });

        // Function to filter jasa items
        function filterJasa(category) {
            let hasVisibleItems = false;
            jasaItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category').toLowerCase();

                // Show or hide item based on category match
                if (category === 'semua' || category === itemCategory) {
                    item.style.display = 'block';
                    hasVisibleItems = true;
                } else {
                    item.style.display = 'none';
                }
            });
            // Show "no results" message if no items match
            noResultsMessage.style.display = hasVisibleItems ? 'none' : 'block';

            // Hide carousel when filtering results
            carousel.style.display = 'none';
        }
    });
</script>

<?= $this->endSection(); ?>
