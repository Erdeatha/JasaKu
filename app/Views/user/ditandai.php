<?= $this->extend('layout/template.php'); ?>

<?= $this->section('content'); ?>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php if (!empty($ditandai)) : ?>
        <?php foreach ($ditandai as $jasa) : ?>
            <div class="col">
                <a href="">
                    <div class="card h-100">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $jasa['nama']; ?></h5>
                            <p class="card-text"><?= $jasa['deskripsi']; ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><?= $jasa['status']; ?></small>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p style="text-align : center;">Tidak Ada Jasa Yang Ditandai</p>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>