    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="<?= url('') ?>">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Alamat</strong></div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?= \App\Core\Session::getFlash() ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label class="text-black h5 mb-3">Alamat Sekarang </label><br>
                                    <p>
                                        <?= $data['alamat']['nama'] ?><br>
                                        <?= $data['alamat']['no_telp'] ?><br>
                                        <?= $data['alamat']['alamat'] ?><br>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="<?= url('alamat/edit') ?>" class="btn btn-primary">Ubah Alamat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

        </div>
    </div>