<?= require_once 'templates/header.php' ?>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Ubah Password</h4>
                        </div>

                        <div class="card-body">
                            <?= \App\Core\Session::getFlash() ?>
                            <form method="POST" action="<?= url('admin/auth/updatepassword') ?>">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control" name="old_password" required>
                                </div>

                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" name="new_password" required>
                                </div>

                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" name="re_newpassword" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Reset Password
                                    </button>
                                    <p class="text-center text-black m-0 m-1">OR</p>
                                    <a href="<?= url('admin') ?>" class="btn btn-warning btn-lg btn-block">
                                        Back To Home
                                    </a>
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