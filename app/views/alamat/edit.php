    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="<?= url('') ?>">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <a href="<?= url('alamat') ?>">Alamat</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Pengaturan Alamat</strong></div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-black text-center mb-4">Pengaturan Alamat</h3>
                            <?php
                            $db =  new \App\Helpers\DB;
                            $alamat = $db->select('*')
                                ->from('alamat')
                                ->where('customer_id', '=', $_SESSION['is_customer']['id'])
                                ->first();
                            if ($alamat) : ?>
                                <form action="<?= url('alamat/update') ?>" method="POST">
                                <?php else : ?>
                                    <form action="<?= url('alamat/store') ?>" method="POST">
                                    <?php endif; ?>
                                    <div class="form-grup mb-2">
                                        <label for="">Nama Anda</label>
                                        <input type="text" name="nama" class="form-control" value="<?= isset($data['alamat']['nama']) ? $data['alamat']['nama'] : '' ?>">
                                        </select>
                                    </div>
                                    <div class="form-grup mb-2">
                                        <label for="">Nomor Telepon</label>
                                        <input type="text" name="no_telp" class="form-control" value="<?= isset($data['alamat']['no_telp']) ?  $data['alamat']['no_telp'] : '' ?>">
                                        </select>
                                    </div>
                                    <div class=" form-grup mb-2">
                                        <label for="">Alamat Lengkap</label>
                                        <textarea class="form-control" name="alamat" cols="30" rows="5"><?= isset($data['alamat']['alamat']) ?  $data['alamat']['alamat'] : '' ?></textarea>
                                        </select>
                                    </div>
                                    <div class="mt-4 text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

        </div>
    </div>