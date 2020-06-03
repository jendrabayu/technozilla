<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pembatalan Pesanan</h1>
        </div>
        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h3>Pembatalan Pesanan <?= $data['order']['c_nama']; ?></h3>
                                <div class="invoice-number">Order <?= $data['order']['o_invoice']; ?></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" action="<?= url('admin/transaksi/storepembatalan') ?>">
                                        <div class="form-group">
                                            <label for="">Masukkan Alasan Pembatalan</label>
                                            <input type="text" name="alasan" id="" class="form-control">
                                            <input type="hidden" name="invoice" value="<?= $data['order']['o_invoice'] ?>">
                                        </div>
                                        <div class="form-group text-right">
                                            <a class="btn btn-warning mr-2" href="<?= url('admin/transaksi/detail/' . $data['order']['o_invoice'] . '/pesananbaru/' . $data['order']['o_status_id']) ?>">Kembali</a>
                                            <button type="submit" class="btn btn-primary" href="">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>