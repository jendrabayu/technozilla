    <?= require_once 'templates/header.php' ?>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <h3>REGISTRASI ADMIN</h3>
                        </div>

                        <div class="card card-primary">

                            <div class="card-body">
                                <?= \App\Core\Session::getFlash() ?>
                                <form method="POST" action="<?= url('admin/auth/store') ?>" class="needs-validation" novalidate="">

                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input id="name" type="text" class="form-control" name="nama" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your Name
                                        </div>
                                    </div>

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

                                        <label for="password" class="control-label">Konfirmasi Password</label>


                                        <input id="password" type="password" class="form-control" name="repassword" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password Confirmation
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                    <div class="text-muted text-center">
                                        Sudah Punya Akun ? <a href="<?= url('admin/auth/login') ?>">Login</a>
                                    </div>
                                </form>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>

    <?= require_once 'templates/footer.php' ?>