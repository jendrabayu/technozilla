<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran Perlu Dicek</h1>

        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h4>Detail Pesanan <?= $data['order']['c_nama']; ?></h4>
                                <div class="invoice-number"><?= $data['order']['o_invoice']; ?></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Detail Order:</strong><br>
                                        <div class="row mt-2">
                                            <div class="col-md-10">
                                                <div class="form-group p-0 my-2">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            No. Invoice
                                                        </div>
                                                        <div class="col-md-8">
                                                            <?= $data['order']['o_invoice']; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group p-0 my-2">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            Status Pesanan
                                                        </div>
                                                        <div class="col-md-8">
                                                            <?= $data['order']['s_nama']; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group p-0 my-2">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            Total
                                                        </div>
                                                        <div class="col-md-8">
                                                            Rp. <?= number_format($data['order']['o_total'], 0, ".", ",") ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group p-0 my-2">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            Pesan
                                                        </div>
                                                        <div class="col-md-8">
                                                            <?php if ($data['order']['o_pesan']) : ?>
                                                                <?= $data['order']['o_pesan']; ?>
                                                            <?php else : ?>
                                                                Tidak Ada Pesan
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group p-0 my-2">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            Bukti Transfer
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label for=""><i class="text-danger">Klik Untuk Memperbesar</i></label>
                                                            <img class="img_bukti_transfer" style="max-width: 120px;" src="<?= url('images/' . $data['order']['o_bukti_transfer']) ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Alamat Pengiriman</strong><br>
                                        <?= $data['order']['a_nama']; ?><br>
                                        <?= $data['order']['a_no_telp']; ?><br>
                                        <?= $data['order']['a_alamat']; ?>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Metode Pembayaran:</strong><br>
                                        Transfer Ke <?= $data['order']['r_nama_bank']; ?><br>
                                        Nomor Rekening : <?= $data['order']['r_no_rekening']; ?><br>
                                        a / n <?= $data['order']['r_atas_nama']; ?>
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Waktu Order</strong><br>
                                        <?= $data['order']['o_date']; ?><br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Produk</div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr class="text-center">
                                        <th data-width="40">#</th>
                                        <th>Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Kuantitas</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    <?php foreach ($data['produk'] as $key => $produk) : ?>

                                        <tr class="text-center">
                                            <td><?= 1 + $key++; ?></td>
                                            <td><?= $produk['p_nama']; ?></td>
                                            <td><?= $produk['p_harga']; ?></td>
                                            <td><?= $produk['od_qty']; ?></td>
                                            <td>
                                                Rp. <?= number_format($produk['p_harga'] * $produk['od_qty'], 0, ".", ",") ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">

                                </div>
                                <div class="col-lg-4 text-right">

                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">Rp. <?= number_format($data['order']['o_total'], 0, ".", ",") ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-right">

                    <a href="<?= url('admin/transaksi/perludicek') ?>" class="btn btn-warning mr-2">Kembali</a>


                    <form class="d-inline" action="<?= url('admin/transaksi/updatepembayaran') ?>" method="post">
                        <input type="hidden" name="invoice" value="<?= $data['order']['o_invoice'] ?>">
                        <button type="submit" class="btn btn-primary mr-2">Konfirmasi Pembayaran</button>
                    </form>


                    <?php if ($data['order']['o_status_id'] == 1 || $data['order']['o_status_id'] == 2) : ?>
                        <form action="<?= url('admin/transaksi/batal') ?>" method="POST" class="d-inline">
                            <input type="hidden" name="invoice" value="<?= $data['order']['o_invoice'] ?>">
                            <button type="submit" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Batalkan</button>
                        </form>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
</div>



<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>