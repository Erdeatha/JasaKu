<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?= $this->include('layout/navbar'); ?>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link <?= (service('uri')->getSegment(1) == 'profil') ? 'active' : ''; ?>" aria-current="page" href="/profil">Profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (service('uri')->getSegment(1) == 'alamat') ? 'active' : ''; ?>" href="/alamat">Daftar Alamat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (service('uri')->getSegment(1) == 'pengaturan') ? 'active' : ''; ?>" href="/pengaturan">Pengaturan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (service('uri')->getSegment(1) == 'pesananSaya') ? 'active' : ''; ?>" href="/pesananSaya">Pesanan Saya</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (service('uri')->getSegment(1) == 'jasaSaya') ? 'active' : ''; ?>" href="/jasaSaya">Jasa Saya</a>
        </li>
    </ul>
    <?= $this->renderSection('content'); ?>
    <?= $this->include('layout/footer'); ?>
</body>

</html>