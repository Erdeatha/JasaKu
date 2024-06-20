<?= $this->extend('layout/template.php'); ?>

<?= $this->section('content'); ?>
<div class="list-group">
    <?php foreach ($notifikasi as $data) :?>
    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?= $data['head']; ?></h5>
            <small><?= $data['time_stamp']; ?></small>
        </div>
        <p class="mb-1"><?= $data['deskripsi']; ?></p>
        <!-- <small>And some small print.</small> -->
    </a>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>