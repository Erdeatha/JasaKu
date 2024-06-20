<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Jasaku</title>
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
                <h1 class="text-center mb-4 mt-10" style="color: white; font-size: 50px">Jasaku</h1>
                <img src="assets/images/logo-jasaku.png" alt="Logo Jasaku" class="img-fluid mb-3">
                <p class="text-muted">Tempat pesan jasa online semua keperluan anda disini</p>
            </div>

            <div class="form-container col-md-6 mb-5 ">
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="text-decoration-none mt-3 mb-5" style="color: white; font-weight: bold;">Butuh bantuan?</a>
                </div>

                <form action="/login/auth" method="POST" class="bg-white rounded shadow p-4 mt-10" style="height: 750px; width: 560px; font-size: 14px">
                    <h2 class="text-center mb-3 text-primary">Login</h2>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <script>
                            alert('<?php echo session()->getFlashdata('success'); ?>');
                        </script>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('msg'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" value="<?php echo session()->getFlashdata('username') ?>" style="height: 30px">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password">
                            <span class="input-group-text" id="togglePassword">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>

                    <div class="button">
                        <input type="submit" class="btn btn-primary mt-3" name="login" value="Masuk">
                        <a href="/register" class="btn btn-secondary mt-3">Register</a>
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
    </script>
</body>

</html>