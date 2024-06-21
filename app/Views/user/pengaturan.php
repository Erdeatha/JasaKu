<?= $this->extend('layout/template_profil.php'); ?>

<?= $this->section('content'); ?>
<?php d($pass); ?>
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Hapus Akun</h5>
                <i class="fas fa-user-times fa-5x my-3"></i>
                <p class="card-text">Menghapus akun secara permanen</p>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Hapus</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Ubah Password</h5>
                <i class="fas fa-key fa-5x my-3"></i>
                <p class="card-text">Mengubah password lama dengan password yang baru</p>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Ubah</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Notifikasi</h5>
                <i class="fas fa-bell fa-5x my-3"></i>
                <p class="card-text">Pengaturan untuk notifikasi dari pesanan dan jasa</p>
                <a href="#" class="btn btn-success">Atur</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Akun -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLabel">Konfirmasi Hapus Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Silakan ketik "Hapus Akun" untuk mengkonfirmasi penghapusan akun Anda:</p>
                <input type="text" id="confirmInput" class="form-control" placeholder="Hapus Akun">
                <div id="error-message" class="text-danger mt-2" style="display: none;">Konfirmasi tidak sesuai.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus Akun</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah Password -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Ubah Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="changePasswordForm" action="/pengaturan/ubahPassword" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Password Saat Ini</label>
                        <input type="password" name="currentPassword" id="currentPassword" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password Baru</label>
                        <input type="password" name="newPassword" id="newPassword" class="form-control" minlength="6" required>
                    </div>
                    <div id="password-error-message" class="text-danger mt-2" style="display: none;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('confirmDeleteButton').addEventListener('click', function() {
        var userInput = document.getElementById('confirmInput').value;
        if (userInput === 'Hapus Akun') {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/pengaturan/hapusAkun', true);
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        alert('Akun Anda telah dihapus.');
                        window.location.href = '/login'; // Redirect to homepage or login page
                    } else {
                        alert('Gagal menghapus akun.');
                    }
                }
            };
            xhr.send();
        } else {
            document.getElementById('error-message').style.display = 'block';
        }
    });

    document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var currentPassword = document.getElementById('currentPassword').value;
        var newPassword = document.getElementById('newPassword').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/pengaturan/ubahPassword', true);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        alert('Password Anda berhasil diubah.');
                        window.location.reload(); // Reload current page or redirect as needed
                    } else {
                        document.getElementById('password-error-message').innerText = response.message;
                        document.getElementById('password-error-message').style.display = 'block';
                    }
                } else {
                    alert('Terjadi kesalahan saat menghubungi server.');
                }
            }
        };

        var data = {
            currentPassword: currentPassword,
            newPassword: newPassword
        };

        xhr.send(JSON.stringify(data));
    });
</script>

<?= $this->endSection(); ?>