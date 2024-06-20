<?= $this->extend('layout/template_profil.php'); ?>

<?= $this->section('content'); ?>
<p></p>
<img src="..." class="img-thumbnail" alt="...">
<a href="#">Hapus Foto</a>
<a href="#">Ubah Foto</a>
<div class="mb-3">
    <label for="formFile" class="form-label">Default file input example</label>
    <input class="form-control" type="file" id="formFile">
</div>
<form id="profilForm" action="/edit-profil/update/<?= $data['id']; ?>" method="post">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="" class="col-form-label">Nama</label>
        </div>
        <div class="col-auto">
            <input type="text" name="nama" class="form-control" aria-describedby="passwordHelpInline" value="<?= $data['nama']; ?>" disabled>
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="" class="col-form-label">Email</label>
        </div>
        <div class="col-auto">
            <input type="email" name="email" class="form-control" aria-describedby="passwordHelpInline" value="<?= $data['email']; ?>" disabled>
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="" class="col-form-label">Username</label>
        </div>
        <div class="col-auto">
            <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" aria-describedby="passwordHelpInline" value="<?= $data['username']; ?>" disabled>
            <div class="invalid-feedback">
                <?= $validation->getError('username'); ?>
            </div>
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="" class="col-form-label">Nomor Telepon</label>
        </div>
        <div class="col-auto">
            <input type="text" name="nomor_telepon" class="form-control" aria-describedby="passwordHelpInline" value="<?= $data['nomor_telepon']; ?>" disabled>
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="" class="col-form-label">Jenis Kelamin</label>
        </div>
        <div class="col-auto">
            <select name="jenis_kelamin" class="form-control" disabled>
                <option value="pria" <?= ($data['jenis_kelamin'] === 'pria') ? 'selected' : ''; ?>>Pria</option>
                <option value="wanita" <?= ($data['jenis_kelamin'] === 'wanita') ? 'selected' : ''; ?>>Wanita</option>
            </select>
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="" class="col-form-label">Tanggal Lahir</label>
        </div>
        <div class="col-auto">
            <input type="date" name="tanggal_lahir" class="form-control" aria-describedby="passwordHelpInline" value="<?= $data['tanggal_lahir']; ?>" disabled>
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <button type="submit" class="btn btn-primary" disabled>Simpan Perubahan</button>
        </div>
    </div>
</form>
</p>
<a href="#" id="ubahProfilBtn">Ubah Profil</a>

<script>
    document.getElementById('ubahProfilBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah tautan mengarahkan ulang halaman
        const formElements = document.getElementById('profilForm').elements;
        for (let i = 0; i < formElements.length; i++) {
            formElements[i].disabled = false;
        }
    });
</script>

<?= $this->endSection(); ?>