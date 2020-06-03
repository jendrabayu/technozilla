    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="<?= url('') ?>">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black"><?= $data['judul'] ?></strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h3> Total Pembayaran : Rp. <?= number_format($data['order']['o_total'], 0, ".", ",")  ?></h3>
                    <p class="m-1">Pembayaran Via Transfer</p>
                    <h3>Bank <?= $data['order']['r_bank']; ?> <u><?= $data['order']['r_norek']; ?></u></h3>
                    <div class="row m-auto justify-content-center">
                        <div class="col-lg-7 p-3 mt-3 border">
                            <form action="<?= url('transaksi/uploadbuktitransfers/' . $data['order']['o_invoice']) ?>" method="POST" enctype="multipart/form-data">
                                <label>Upload Bukti Transfer Disini</label>


                                <div class="form-group mb-4 mt-3" style="padding: 0  150px;">
                                    <input class="input-file" id="my-file" type="file" name="bukti_transfer">
                                    <label tabindex="0" for="my-file" class="input-file-trigger">Pilih File...</label>
                                    <p class="file-return"></p>
                                </div>

                                <div class="form-group">
                                    <a href="<?= url('transaksi') ?>" type="button" class="mr-3 btn btn-outline-primary">Bayar nanti</a>
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>