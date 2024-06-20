<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Jasaku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .input-group-text {
            cursor: pointer;
        }

        body {
            background: linear-gradient(to bottom, #00bfff, #00033b);
        }
    </style>

    
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column justify-content-between align-items-center p-5">
                <h1 class="text-center mb-4 mt-10" style="color: white;">Jasaku</h1>
                <img src="assets/images/logo-jasaku.png" alt="Logo Jasaku" class="img-fluid mb-3">
                <p class="text-muted">Tempat pesan jasa online semua keperluan anda disini</p>
            </div>

            <div class="form-container col-md-6 mb-5 ">
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="text-decoration-none mt-3 mb-5" style="color: white; font-weight: bold;">Butuh bantuan?</a>
                </div>

                <form action="/register/save" class="bg-white rounded shadow p-4 mt-10" style="height: 750px; width: 560px; font-size: 14px" method="POST">
                    <h2 class="text-center mb-3 text-primary">Register</h2>
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" style="height: 30px" name="email">
                        <small id="emailHelp" class="form-text text-muted">Pastikan email Anda valid.</small>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" style="height: 30px" name="nama">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" style="height: 30px" name="username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <span class="input-group-text" id="togglePassword">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password2" class="form-label">Verifikasi Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password2" name="verif">
                            <span class="input-group-text" id="togglePassword2">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="pria" name="jenis_kelamin" value="pria">
                            <label class="form-check-label" for="pria">Pria</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="wanita" name="jenis_kelamin" value="wanita">
                            <label class="form-check-label" for="wanita">Wanita</label>
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-primary mt-3">Register</button>
                        <a href="<?= base_url('/login') ?>" class="btn btn-secondary mt-3">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye-slash');
            this.querySelector('i').classList.toggle('fa-eye');
        });

        const togglePassword2 = document.querySelector('#togglePassword2');
        const password2 = document.querySelector('#password2');
        togglePassword2.addEventListener('click', function() {
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye-slash');
            this.querySelector('i').classList.toggle('fa-eye');
        });
    </script>

</body>

</html>