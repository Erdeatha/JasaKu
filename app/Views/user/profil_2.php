<?= $this->extend('layout/template_profil.php'); ?>

<?= $this->section('content'); ?>
<p></p>
<img src="..." class="img-thumbnail" alt="...">
<a href="">Hapus Foto</a>
<a href="">Ubah Foto</a>
<p>Nama             : <?= $data['nama']; ?></p>
<p>Email            : <?= $data['email']; ?></p>
<p>Username         : <?= $data['username']; ?></p>
<p>Tanggal Lahir    : <?= $data['tanggal_lahir']; ?></p>
<p>Nomor Telepon    : <?= $data['nomor_telepon']; ?></p>
<p>Jenis Kelamin    : <?= $data['jenis_kelamin']; ?></p>
<p><p></p></p>
<a href="">Ubah Profil</a>

<?= $this->endSection(); ?>