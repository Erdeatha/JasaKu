<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row gx-5">
        <!-- Detail Produk -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white p-0">
                    <img src="<?= base_url('assets/images/produk-jasa/' . $jasa['gambar']); ?>" class="card-img-top rounded-top" alt="<?= $jasa['nama']; ?>">
                </div>
                <div class="card-body p-4">
                    <h4 class="card-title fw-bold text-dark"><?= $jasa['nama']; ?></h4>
                    <p class="card-text text-muted"><?= $jasa['deskripsi']; ?></p>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item"><strong>Kategori:</strong> <?= $jasa['kategori']; ?></li>
                        <li class="list-group-item"><strong>Alamat:</strong> <?= $jasa['alamat']; ?></li>
                        <li class="list-group-item"><strong>Rating:</strong> <?= $jasa['rating']; ?>/5</li>
                        <li class="list-group-item"><strong>Total Pesanan:</strong> <?= $jasa['total_pesanan']; ?></li>
                    </ul>
                    <h5 class="fw-bold text-dark">Paket yang Dipilih</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Nama Paket:</strong> <?= $paket['nama']; ?></li>
                        <li class="list-group-item"><strong>Rincian:</strong> <?= $paket['rincian']; ?></li>
                        <li class="list-group-item"><strong>Harga:</strong> Rp<?= number_format($paket['harga'], 0, ',', '.'); ?></li>
                        <li class="list-group-item"><strong>Estimasi:</strong> <?= $paket['estimasi']; ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Form Pemesanan -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 p-4">
                <h3 class="h5 mb-4 text-dark">Form Pemesanan</h3>
                <form action="<?= base_url('/pesanan/store'); ?>" method="post" class="needs-validation" novalidate>
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_jasa" value="<?= $jasa['id']; ?>">
                    <input type="hidden" name="id_paket" value="<?= $id_paket; ?>">
                    <input type="hidden" name="total_pembayaran" value="<?= $paket['harga']; ?>">

                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                        <div class="invalid-feedback">
                            Tanggal mulai diperlukan.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                        <div class="invalid-feedback">
                            Jam mulai diperlukan.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        <div class="invalid-feedback">
                            Alamat diperlukan.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="metode" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="metode" name="metode" required>
                            <option value="">Pilih Metode</option>
                            <option value="BSI">BSI</option>
                            <option value="BCA">BCA</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="Dana">Dana</option>
                        </select>
                        <div class="invalid-feedback">
                            Metode pembayaran diperlukan.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Pesan Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Bootstrap form validation
    (function () {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<?= $this->endSection(); ?>
