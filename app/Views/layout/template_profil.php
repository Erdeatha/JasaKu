<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/assets/images/logo-jasaku.png">
    <title>Jasaku</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!-- Ajax -->
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