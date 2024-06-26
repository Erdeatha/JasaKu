<?= $this->extend('layout/template_profil.php'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" style="min-height: 100vh">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Form Tambah Jasa</h2>
    </div>

    <form action="<?= base_url('/jasa/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Jasa</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Kebersihan">Kebersihan</option>
                <option value="Konstruksi">Konstruksi</option>
                <option value="Teknologi">Teknologi</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Jasa</label>
            <input type="file" class="form-control" id="gambar" name="gambar" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="tersedia">Tersedia</option>
                <option value="tidak_tersedia">Tidak Tersedia</option>
            </select>
        </div>

        <!-- Paket Jasa -->
        <div id="paket_jasa">
            <hr>
            <h3>Paket Jasa 1</h3>
            <div class="mb-3">
                <label for="nama_paket_1" class="form-label">Nama Paket</label>
                <input type="text" class="form-control" id="nama_paket_1" name="paket_jasa[0][nama]" required>
            </div>
            <div class="mb-3">
                <label for="rincian_1" class="form-label">Rincian</label>
                <textarea class="form-control" id="rincian_1" name="paket_jasa[0][rincian]" required></textarea>
            </div>
            <div class="mb-3">
                <label for="harga_1" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga_1" name="paket_jasa[0][harga]" required>
            </div>
            <div class="mb-3">
                <label for="estimasi_1" class="form-label">Estimasi</label>
                <input type="text" class="form-control" id="estimasi_1" name="paket_jasa[0][estimasi]" required>
            </div>
        </div>

        <button type="button" class="btn btn-primary mb-3" onclick="tambahPaket()">Tambah Paket Jasa</button>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>

</div>

<script>
    let nextPaket = 1;

    function tambahPaket() {
        nextPaket++;
        const div = document.createElement('div');
        div.classList.add('paket_jasa');
        div.innerHTML = `
            <hr>
            <h3>Paket Jasa ${nextPaket}</h3>
            <div class="mb-3">
                <label for="nama_paket_${nextPaket}" class="form-label">Nama Paket</label>
                <input type="text" class="form-control" id="nama_paket_${nextPaket}" name="paket_jasa[${nextPaket}][nama]" required>
            </div>
            <div class="mb-3">
                <label for="rincian_${nextPaket}" class="form-label">Rincian</label>
                <textarea class="form-control" id="rincian_${nextPaket}" name="paket_jasa[${nextPaket}][rincian]" required></textarea>
            </div>
            <div class="mb-3">
                <label for="harga_${nextPaket}" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga_${nextPaket}" name="paket_jasa[${nextPaket}][harga]" required>
            </div>
            <div class="mb-3">
                <label for="estimasi_${nextPaket}" class="form-label">Estimasi</label>
                <input type="text" class="form-control" id="estimasi_${nextPaket}" name="paket_jasa[${nextPaket}][estimasi]" required>
            </div>
        `;
        document.getElementById('paket_jasa').appendChild(div);
    }
</script>

<?= $this->endSection(); ?>
