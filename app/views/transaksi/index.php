    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="<?= url('') ?>">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Transaksi</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-belum-bayar-tab" data-toggle="pill" href="#v-pills-belum-bayar" role="tab" aria-controls="v-pills-belum-bayar" aria-selected="true">Belum Bayar</a>
                        <a class="nav-link" id="v-pills-sedang-dicek-tab" data-toggle="pill" href="#v-pills-sedang-dicek" role="tab" aria-controls="v-pills-sedang-dicek" aria-selected="true">Sedang Dicek</a>
                        <a class="nav-link" id="v-pills-sedang-diproses-tab" data-toggle="pill" href="#v-pills-sedang-diproses" role="tab" aria-controls="v-pills-sedang-diproses" aria-selected="false">Diproses</a>
                        <a class="nav-link" id="v-pills-dikirim-tab" data-toggle="pill" href="#v-pills-dikirim" role="tab" aria-controls="v-pills-dikirim" aria-selected="false">Dikirim</a>
                        <a class="nav-link" id="v-pills-selesai-tab" data-toggle="pill" href="#v-pills-selesai" role="tab" aria-controls="v-pills-selesai" aria-selected="false">Selesai</a>
                        <a class="nav-link" id="v-pills-dibatalkan-tab" data-toggle="pill" href="#v-pills-dibatalkan" role="tab" aria-controls="v-pills-dibatalkan" aria-selected="false">Dibatalkan</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-belum-bayar" role="tabpanel" aria-labelledby="v-pills-belum-bayar-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="h3 text-black">Belum Dibayar</h1>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>No</td>
                                                <td>Pesanan</td>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['one']['detail'] as $key => $d) : ?>
                                                <tr>
                                                    <td class="text-center text-dark">
                                                        <?= 1 + $key++ ?>
                                                    </td>
                                                    <td>

                                                        <h4 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?></h4>

                                                        <?php foreach ($data['one']['order'] as $o) : ?>
                                                            <?php if ($o['o_id'] == $d['o_id']) : ?>

                                                                <div class="row p-2">
                                                                    <div class="col-md-12 border">
                                                                        <div class="row p-2">
                                                                            <div class="col-md-4">
                                                                                <img style="max-width: 70px" src="<?= url('images/' . $o['p_gambar']) ?>" alt="">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <p class="m-1 text-dark"><?= $o['p_nama']; ?> X <?= $o['od_qty']; ?></p>
                                                                                <h5 class="text-primary">Rp. <?= number_format(($o['p_harga'] * $o['od_qty']), 0, ".", ",") ?></h5>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <div class="d-flex align-items-center mt-4">
                                                            <p class="text-primary">Transfer Ke Bank <?= $d['r_bank']; ?><br>
                                                                <span class="text-black font-weight-bold " style="font-size: 25px;"><?= $d['r_norek']; ?></span>
                                                            </p>
                                                            <h5 class="text-body text-right  ml-auto">Jumlah Harus Dibayar : Rp. <?= number_format(($d['o_total']), 0, ".", ",") ?></h5>
                                                        </div>


                                                        <div class="d-flex">
                                                            <div class="ml-auto">
                                                                <a href="<?= url('transaksi/payment/' . $d['o_invoice']) ?>" type="button" class="btn btn-primary">Bayar Sekarang</a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-sedang-dicek" role="tabpanel" aria-labelledby="v-pills-sedang-dicek-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="h3 text-black">Dalam Pengecekkan</h1>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>No</td>
                                                <td>Pesanan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['two']['detail'] as $key => $d) : ?>
                                                <tr>
                                                    <td class="text-center text-dark">
                                                        <?= 1 + $key++ ?>
                                                    </td>
                                                    <td>

                                                        <h4 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?></h4>

                                                        <?php foreach ($data['two']['order'] as $o) : ?>
                                                            <?php if ($o['o_id'] == $d['o_id']) : ?>

                                                                <div class="row p-2">
                                                                    <div class="col-md-12 border">
                                                                        <div class="row p-2">
                                                                            <div class="col-md-4">
                                                                                <img style="max-width: 70px" src="<?= url('images/' . $o['p_gambar']) ?>" alt="">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <p class="m-1 text-dark"><?= $o['p_nama']; ?> <span class="font-weight-bold">X</span> <?= $o['od_qty']; ?></p>
                                                                                <h5 class="text-primary">Rp. <?= number_format(($o['p_harga'] * $o['od_qty']), 0, ".", ",") ?></h5>

                                                                            </div>

                                                                        </div>
                                                                        <div class="row p-2">

                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            <?php endif; ?>
                                                        <?php endforeach; ?>

                                                    </td>

                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-sedang-diproses" role="tabpanel" aria-labelledby="v-pills-sedang-diproses-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="h3 text-black">Pesanan Sedang Diproses</h1>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>No</td>
                                                <td>Pesanan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['three']['detail'] as $key => $d) : ?>
                                                <tr>
                                                    <td class="text-center text-dark">
                                                        <?= 1 + $key++ ?>
                                                    </td>
                                                    <td>

                                                        <h4 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?></h4>

                                                        <?php foreach ($data['three']['order'] as $o) : ?>
                                                            <?php if ($o['o_id'] == $d['o_id']) : ?>

                                                                <div class="row p-2">
                                                                    <div class="col-md-12 border">
                                                                        <div class="row p-2">
                                                                            <div class="col-md-4">
                                                                                <img style="max-width: 70px" src="<?= url('images/' . $o['p_gambar']) ?>" alt="">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <p class="m-1 text-dark"><?= $o['p_nama']; ?> X <?= $o['od_qty']; ?></p>
                                                                                <h5 class="text-primary">Rp. <?= number_format(($o['p_harga'] * $o['od_qty']), 0, ".", ",") ?></h5>

                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                </div>


                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <div class="row p-2 ">
                                                            <h6 class="text-dark ml-auto">Status : <?= $d['s_nama']; ?></h6>
                                                        </div>

                                                    </td>

                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-dikirim" role="tabpanel" aria-labelledby="v-pills-dikirim-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="h3 text-black">Barang Sudah Dikirim</h1>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>No</td>
                                                <td>Pesanan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['four']['detail'] as $key => $d) : ?>
                                                <tr>
                                                    <td class="text-center text-dark">
                                                        <?= 1 + $key++ ?>
                                                    </td>
                                                    <td>

                                                        <h4 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?></h4>

                                                        <?php foreach ($data['four']['order'] as $o) : ?>
                                                            <?php if ($o['o_id'] == $d['o_id']) : ?>

                                                                <div class="row p-2">
                                                                    <div class="col-md-12 border">
                                                                        <div class="row p-2">
                                                                            <div class="col-md-4">
                                                                                <img style="max-width: 70px" src="<?= url('images/' . $o['p_gambar']) ?>" alt="">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <p class="m-1 text-dark"><?= $o['p_nama']; ?> X <?= $o['od_qty']; ?></p>
                                                                                <h5 class="text-primary">Rp. <?= number_format(($o['p_harga'] * $o['od_qty']), 0, ".", ",") ?></h5>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <div class="row p-2 ">
                                                            <h6 class="text-dark">No Resi : <?= $d['o_kurir']; ?> <?= $d['o_no_resi']; ?></h6>
                                                            <h6 class="text-dark ml-auto">Status : <?= $d['s_nama']; ?></h6>
                                                        </div>
                                                    </td>

                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-selesai" role="tabpanel" aria-labelledby="v-pills-selesai-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="h3 text-black">Pesanan Selesai</h1>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>No</td>
                                                <td>Pesanan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['five']['detail'] as $key => $d) : ?>
                                                <tr>
                                                    <td class="text-center text-dark">
                                                        <?= 1 + $key++ ?>
                                                    </td>
                                                    <td>

                                                        <h4 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?></h4>

                                                        <?php foreach ($data['five']['order'] as $o) : ?>
                                                            <?php if ($o['o_id'] == $d['o_id']) : ?>

                                                                <div class="row p-2">
                                                                    <div class="col-md-12 border">
                                                                        <div class="row p-2">
                                                                            <div class="col-md-4">
                                                                                <img style="max-width: 70px" src="<?= url('images/' . $o['p_gambar']) ?>" alt="">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <p class="m-1 text-dark"><?= $o['p_nama']; ?> X <?= $o['od_qty']; ?></p>
                                                                                <h5 class="text-primary">Rp. <?= number_format(($o['p_harga'] * $o['od_qty']), 0, ".", ",") ?></h5>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <div class="row p-2 ">
                                                            <h6 class="text-dark">No Resi : <?= $d['o_kurir']; ?> <?= $d['o_no_resi']; ?></h6>
                                                            <h6 class="text-dark ml-auto">Status : <?= $d['s_nama']; ?></h6>
                                                        </div>
                                                    </td>

                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-dibatalkan" role="tabpanel" aria-labelledby="v-pills-dibatalkan-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="h3 text-black">Pesanan Dibatalkan</h1>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>No</td>
                                                <td>Pesanan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['six']['detail'] as $key => $d) : ?>
                                                <tr>
                                                    <td class="text-center text-dark">
                                                        <?= 1 + $key++ ?>
                                                    </td>
                                                    <td>

                                                        <h4 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?></h4>

                                                        <?php foreach ($data['six']['order'] as $o) : ?>
                                                            <?php if ($o['o_id'] == $d['o_id']) : ?>

                                                                <div class="row p-2">
                                                                    <div class="col-md-12 border">
                                                                        <div class="row p-2">
                                                                            <div class="col-md-4">
                                                                                <img style="max-width: 70px" src="<?= url('images/' . $o['p_gambar']) ?>" alt="">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <p class="m-1 text-dark"><?= $o['p_nama']; ?> X <?= $o['od_qty']; ?></p>
                                                                                <h5 class="text-primary">Rp. <?= number_format(($o['p_harga'] * $o['od_qty']), 0, ".", ",") ?></h5>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <div class="row p-2 ">
                                                            <h6 class="text-dark">Alasan Pembatalan : <?= $d['o_alasan_pembatalan']; ?></h6>
                                                            <h6 class="text-dark ml-auto">Status : <?= $d['s_nama']; ?></h6>
                                                        </div>
                                                    </td>

                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>