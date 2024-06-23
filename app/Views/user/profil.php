<?= $this->extend('layout/template_profil.php'); ?>

<?= $this->section('content'); ?>
<div class="container py-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <!-- Tampilkan foto profil dengan base_url jika sudah ada -->
                    <?php if (!empty($data['foto_profil'])): ?>
                        <img id="previewFoto" src="<?= base_url('assets/images/profile/' . $data['foto_profil']); ?>" class="img-fluid rounded-circle mb-3" alt="Foto Profil">
                    <?php else: ?>
                        <!-- Jika belum ada foto profil, tampilkan ikon profil default -->
                        <i class="bi bi-person-circle" style="font-size: 5rem;"></i>
                    <?php endif; ?>
                    <div class="d-flex justify-content-center">
                        <!-- Form untuk mengunggah foto profil -->
                        <form id="uploadFotoForm" action="/profil/uploadFoto" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="file" name="foto_profil" id="uploadFotoInput" class="d-none" onchange="previewImage(this)" disabled>
                            <label for="uploadFotoInput" class="btn btn-sm btn-primary me-2" id="ubahFotoBtn" disabled>Ubah Foto</label>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus foto profil?');" name="delete_foto_profil" value="1" id="hapusFotoBtn" disabled>Hapus Foto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <!-- Form untuk informasi profil -->
                    <form id="profilForm" action="/profil/update/<?= $data['id']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="<?= $data['nama']; ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?= $data['email']; ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= $data['username']; ?>" disabled>
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" value="<?= $data['nomor_telepon']; ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" disabled>
                                <option value="pria" <?= ($data['jenis_kelamin'] === 'pria') ? 'selected' : ''; ?>>Pria</option>
                                <option value="wanita" <?= ($data['jenis_kelamin'] === 'wanita') ? 'selected' : ''; ?>>Wanita</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="<?= $data['tanggal_lahir']; ?>" disabled>
                        </div>
                        <!-- Field tersembunyi untuk menyimpan nama file foto profil yang sudah ada -->
                        <input type="hidden" name="foto_profil_lama" value="<?= $data['foto_profil']; ?>">

                        <!-- Tombol Simpan Perubahan -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" id="simpanBtn" disabled>Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" id="ubahProfilBtn" class="btn btn-secondary">Ubah Profil</a>
                        <a href="/logout" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('ubahProfilBtn').addEventListener('click', function(event) {
        event.preventDefault();
        const formElements = document.getElementById('profilForm').elements;
        for (let i = 0; i < formElements.length; i++) {
            formElements[i].disabled = false;
        }
        document.getElementById('uploadFotoInput').disabled = false;
        document.getElementById('ubahFotoBtn').disabled = false;
        document.getElementById('hapusFotoBtn').disabled = false;
        document.getElementById('simpanBtn').disabled = false; // Aktifkan tombol Simpan Perubahan
    });

    // Fungsi untuk menampilkan preview foto sebelum diunggah
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewFoto').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?= $this->endSection(); ?>
