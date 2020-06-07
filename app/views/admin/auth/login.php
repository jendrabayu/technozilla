<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Toko Online &mdash; <?= $data['judul']; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= asset('backend/css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('backend/css/components.css') ?>">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <h3>LOGIN ADMIN</h3>
                        </div>

                        <div class="card card-primary">

                            <div class="card-body">
                                <?= \App\Core\Session::getFlash() ?>
                                <form method="POST" action="<?= url('admin/auth/do_login') ?>" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label for="password" class="control-label">Password</label>


                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Belum Punya Akun? <a href="<?= url('admin/auth/register') ?>">Buat Akun</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= asset('backend/modules/jquery.min.js') ?>"></script>
    <script src="<?= asset('backend/modules/popper.js') ?>"></script>
    <script src="<?= asset('backend/modules/tooltip.js') ?>"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="<?= asset('backend/modules/nicescroll/jquery.nicescroll.min.js') ?>"></script>
    <script src="<?= asset('backend/modules/moment.min.js') ?>"></script>
    <script src="<?= asset('backend/js/stisla.js') ?>"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= asset('backend/js/scripts.js') ?>"></script>
    <script src="<?= asset('backend/js/custom.js') ?>"></script>
</body>

</html>