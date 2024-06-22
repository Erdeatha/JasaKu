<?= $this->extend('layout/template_profil.php'); ?>

<?= $this->section('content'); ?>
<div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="width: 300px;">
        <h4 class="mb-3" style="text-align: center">Status Pesanan</h4>
        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Menunggu Konfirmasi</button>
        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Layanan Mendatang</button>
        <button class="nav-link" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false">Berlangsung</button>
        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Selesai</button>
        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dibatalkan</button>
    </div>
    <div class="tab-content flex-grow-1" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
            <div class="row">
                <?php if (isset($konfirmasi) && count($konfirmasi) > 0) : ?>
                    <?php foreach ($konfirmasi as $dataKonfirm) : ?>
                        <div class="col-12 mb-3">
                            <div class="card w-100 p-3">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= esc($dataKonfirm['nama_jasa']); ?></h5>
                                            <p class="card-text mb-0">Deskripsi: <?= esc($dataKonfirm['catatan']); ?></p>
                                            <p class="card-text">Nama Paket: <?= esc($dataKonfirm['nama_paket']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex flex-column align-items-end">
                                        <div class="d-flex flex-grow-1 justify-content-end mb-3">
                                            <p class="card-text fw-bold">Rp. <?= number_format(esc($dataKonfirm['total_pembayaran']), 2, ',', '.'); ?></p>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-outline-primary">Hubungi Penjual</a>
                                        </div>
                                        <div class="text-end mt-3">
                                            <span class="text-muted" style="opacity: 0.6;"><?= esc($dataKonfirm['updated_at']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12">
                        <p>Belum Terdapat Pesanan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
            <div class="row">
                <h5 class="mt-3 mb-2 bg-success text-white p-2 rounded">Sudah Dibayar</h5>
                <?php if (isset($mendatang) && count($mendatang) > 0) : ?>
                    <?php $foundPaid = false; ?>
                    <?php foreach ($mendatang as $dataMendatang) : ?>
                        <?php if ($dataMendatang['status_pembayaran'] == 'sudah_dibayar') : ?>
                            <?php $foundPaid = true; ?>
                            <div class="col-12 mb-3">
                                <div class="card w-100 p-3">
                                    <div class="row g-0">
                                        <div class="col-md-2">
                                            <img src="..." class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= esc($dataMendatang['nama_jasa']); ?></h5>
                                                <p class="card-text mb-0">Nama Paket : <?= esc($dataMendatang['nama_paket']); ?></p>
                                                <p class="card-text mb-0">Rincian Paket : <?= esc($dataMendatang['rincian']); ?></p>
                                                <p class="card-text mb-0">Waktu Pengerjaan: <?= esc($dataMendatang['tanggal_mulai']); ?>, pukul <?= esc($dataMendatang['jam_mulai']); ?></p>
                                                <p class="card-text mb-0">Lokasi Pengerjaan : <?= esc($dataMendatang['alamat']); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex flex-column align-items-end">
                                            <div class="d-grid gap-2 mt-auto mb-3">
                                                <a href="#" class="btn btn-outline-primary">Hubungi Penjual</a>
                                            </div>
                                            <div class="text-end">
                                                <span class="text-muted" style="opacity: 0.6;"><?= esc($dataMendatang['updated_at']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!$foundPaid) : ?>
                        <div class="col-12">
                            <p>Pesanan belum ada.</p>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="col-12">
                        <p>Pesanan belum ada.</p>
                    </div>
                <?php endif; ?>

                <h5 class="mt-4 mb-2 bg-danger text-white p-2 rounded d-flex justify-content-between align-items-center">
                    Belum Dibayar
                    <span class="text-white-50" style="font-size: 0.9rem;">Apabila pesanan belum dibayar dalam 1x24 jam maka pesanan akan otomatis dibatalkan.</span>
                </h5>
                <?php if (isset($mendatang) && count($mendatang) > 0) : ?>
                    <?php $foundUnpaid = false; ?>
                    <?php foreach ($mendatang as $dataMendatang) : ?>
                        <?php if ($dataMendatang['status_pembayaran'] == 'belum_dibayar') : ?>
                            <?php $foundUnpaid = true; ?>
                            <div class="col-12 mb-3">
                                <div class="card w-100 p-3">
                                    <div class="row g-0">
                                        <div class="col-md-2">
                                            <img src="..." class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= esc($dataMendatang['nama_jasa']); ?></h5>
                                                <p class="card-text mb-0">Nama Paket : <?= esc($dataMendatang['nama_paket']); ?></p>
                                                <p class="card-text mb-0">Rincian Paket : <?= esc($dataMendatang['rincian']); ?></p>
                                                <p class="card-text mb-0">Waktu Pengerjaan : <?= esc($dataMendatang['tanggal_mulai']); ?>, pukul <?= esc($dataMendatang['jam_mulai']); ?></p>
                                                <p class="card-text mb-0">Lokasi Pengerjaan : <?= esc($dataMendatang['alamat']); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex flex-column align-items-end">
                                            <div class="d-flex flex-grow-1 justify-content-end mb-3">
                                                <p class="card-text fw-bold">Rp. <?= number_format(esc($dataMendatang['total_pembayaran']), 2, ',', '.'); ?></p>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <a href="#" class="btn btn-outline-primary">Hubungi Penjual</a>
                                                <a href="#" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#paymentModal">Bayar Pesanan</a>
                                            </div>
                                            <div class="text-end mt-3">
                                                <span class="text-muted" style="opacity: 0.6;"><?= esc($dataMendatang['updated_at']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!$foundUnpaid) : ?>
                        <div class="col-12">
                            <p>Pesanan belum ada.</p>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="col-12">
                        <p>Pesanan belum ada.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">
            <div class="row">
                <?php if (isset($berlangsung) && count($berlangsung) > 0) : ?>
                    <?php foreach ($berlangsung as $dataBerlangsung) : ?>
                        <div class="col-12 mb-3">
                            <div class="card w-100 p-3">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= esc($dataBerlangsung['nama_jasa']); ?></h5>
                                            <p class="card-text mb-0">Nama Paket : <?= esc($dataBerlangsung['nama_paket']); ?></p>
                                            <p class="card-text mb-0">Rincian Paket : <?= esc($dataBerlangsung['rincian']); ?></p>
                                            <p class="card-text mb-0">Waktu Pengerjaan : <?= esc($dataBerlangsung['tanggal_mulai']); ?>, pukul <?= esc($dataBerlangsung['jam_mulai']); ?></p>
                                            <p class="card-text mb-0">Lokasi Pengerjaan : <?= esc($dataBerlangsung['alamat']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex flex-column align-items-end">
                                        <div class="d-grid gap-2 mt-auto mb-3">
                                            <a href="#" class="btn btn-outline-primary">Hubungi Penjual</a>
                                            <a href="#" class="btn btn-outline-success">Konfirmasi Pesanan Selesai</a>
                                        </div>
                                        <div class="text-end">
                                            <span class="text-muted" style="opacity: 0.6;"><?= esc($dataBerlangsung['updated_at']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12">
                        <p>Belum Terdapat Pesanan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
            <div class="row">
                <?php if (isset($selesai) && count($selesai) > 0) : ?>
                    <?php foreach ($selesai as $dataSelesai) : ?>
                        <div class="col-12 mb-3">
                            <div class="card w-100 p-3">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= esc($dataSelesai['nama_jasa']); ?></h5>
                                            <p class="card-text mb-0">Nama Paket : <?= esc($dataSelesai['nama_paket']); ?></p>
                                            <p class="card-text mb-0">Rincian Paket : <?= esc($dataSelesai['rincian']); ?></p>
                                            <p class="card-text mb-0">Waktu Pengerjaan : <?= esc($dataSelesai['tanggal_mulai']); ?>, pukul <?= esc($dataSelesai['jam_mulai']); ?></p>
                                            <p class="card-text mb-0">Lokasi Pengerjaan : <?= esc($dataSelesai['alamat']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex flex-column align-items-end">
                                        <div class="d-grid gap-2 mt-auto mb-3">
                                            <a href="#" class="btn btn-outline-primary">Berikan Ulasan</a>
                                        </div>
                                        <div class="text-end">
                                            <span class="text-muted" style="opacity: 0.6;"><?= esc($dataSelesai['updated_at']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12">
                        <p>Belum Terdapat Pesanan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
            <div class="row">
                <?php if (isset($dibatalkan) && count($dibatalkan) > 0) : ?>
                    <?php foreach ($dibatalkan as $dataBatal) : ?>
                        <div class="col-12 mb-3">
                            <div class="card w-100 p-3">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= esc($dataBatal['nama_jasa']); ?></h5>
                                            <p class="card-text mb-0">Nama Paket : <?= esc($dataBatal['nama_paket']); ?></p>
                                            <p class="card-text mb-0">Rincian Paket : <?= esc($dataBatal['rincian']); ?></p>
                                            <p class="card-text mb-0">Alasan Pembatalan : <?= esc($dataBatal['pembatalan']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex flex-column align-items-end">
                                        <div class="d-grid gap-2 mt-auto mb-3">
                                            <a href="#" class="btn btn-outline-primary">Pesan Ulang</a>
                                        </div>
                                        <div class="text-end">
                                            <span class="text-muted" style="opacity: 0.6;"><?= esc($dataBatal['updated_at']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12">
                        <p>Belum Terdapat Pesanan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPembatalan" tabindex="-1" aria-labelledby="modalPembatalanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPembatalanLabel">Pembatalan Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="cancellationForm">
                    <div class="mb-3">
                        <label for="cancellationReason" class="form-label">Alasan Pembatalan</label>
                        <textarea class="form-control" id="cancellationReason" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="confirmText" class="form-label">Ketik "Batalkan Pesanan" untuk konfirmasi</label>
                        <input type="text" class="form-control" id="confirmText" required>
                    </div>
                </form>
                Silakan berikan alasan untuk pembatalan pesanan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="submitCancellation">Batalkan Pesanan</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Pembayaran Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Silakan lakukan pembayaran melalui metode pembayaran yang tersedia.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Lanjutkan ke Pembayaran</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.nav-link').forEach(function(tab) {
        tab.addEventListener('click', function() {
            localStorage.setItem('selectedTab', this.id);
        });
    });

    // Restore the state of the selected tab on page load
    document.addEventListener('DOMContentLoaded', function() {
        var selectedTab = localStorage.getItem('selectedTab');
        if (selectedTab) {
            var tab = document.getElementById(selectedTab);
            var tabContentId = tab.getAttribute('data-bs-target');
            document.querySelectorAll('.nav-link').forEach(function(t) {
                t.classList.remove('active');
            });
            document.querySelectorAll('.tab-pane').forEach(function(tc) {
                tc.classList.remove('show', 'active');
            });
            tab.classList.add('active');
            document.querySelector(tabContentId).classList.add('show', 'active');
        } else {
            document.querySelector('.nav-link').classList.add('active');
            document.querySelector('.tab-pane').classList.add('show', 'active');
        }
    });
    
    document.getElementById('submitCancellation').addEventListener('click', function() {
        var reason = document.getElementById('cancellationReason').value;
        var confirmText = document.getElementById('confirmText').value;

        if (reason.trim() === "") {
            alert('Harap masukkan alasan pembatalan.');
        } else if (confirmText !== "Batalkan Pesanan") {
            alert('Harap ketik "Batalkan Pesanan" untuk konfirmasi.');
        } else {
            // Proceed with the cancellation
            var form = document.getElementById('cancellationForm');
            form.submit(); // Submit the form if all validations pass
        }
    });
</script>

<?= $this->endSection(); ?>