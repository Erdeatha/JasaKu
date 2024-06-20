<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?= $this->include('layout/navbar'); ?>
    <a href="/profil">Profil</a>
    <a href="/alamat">Daftar Alamat</a>
    <a href="/pengaturan">Pengaturan</a>
    <a href="/pesanan">Pesanan Saya</a>
    <a href="/jasa">Jasa Saya</a>
    <?= $this->renderSection('content'); ?>
    <?= $this->include('layout/footer'); ?>
</body>

</html>