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
                    <a class="nav-link active" id="v-pills-belum-bayar-tab" data-toggle="pill" href="#v-pills-belum-bayar" role="tab" aria-controls="v-pills-belum-bayar" aria-selected="true">Belum Bayar <?= count($data['one']['detail']) != 0 ? '(' . count($data['one']['detail']) . ')' : '' ?></a>
                    <a class="nav-link" id="v-pills-sedang-dicek-tab" data-toggle="pill" href="#v-pills-sedang-dicek" role="tab" aria-controls="v-pills-sedang-dicek" aria-selected="true">Sedang Dicek <?= count($data['two']['detail']) != 0 ? '(' . count($data['two']['detail']) . ')' : '' ?></a>
                    <a class="nav-link" id="v-pills-sedang-diproses-tab" data-toggle="pill" href="#v-pills-sedang-diproses" role="tab" aria-controls="v-pills-sedang-diproses" aria-selected="false">Diproses <?= count($data['three']['detail']) != 0 ? '(' . count($data['three']['detail']) . ')' : '' ?></a>
                    <a class="nav-link" id="v-pills-dikirim-tab" data-toggle="pill" href="#v-pills-dikirim" role="tab" aria-controls="v-pills-dikirim" aria-selected="false">Dikirim <?= count($data['four']['detail']) != 0 ? '(' . count($data['four']['detail']) . ')' : '' ?></a>
                    <a class="nav-link" id="v-pills-selesai-tab" data-toggle="pill" href="#v-pills-selesai" role="tab" aria-controls="v-pills-selesai" aria-selected="false">Selesai <?= count($data['five']['detail']) != 0 ? '(' . count($data['five']['detail']) . ')' : '' ?></a>
                    <a class="nav-link" id="v-pills-dibatalkan-tab" data-toggle="pill" href="#v-pills-dibatalkan" role="tab" aria-controls="v-pills-dibatalkan" aria-selected="false">Dibatalkan <?= count($data['six']['detail']) != 0 ? '(' . count($data['six']['detail']) . ')' : '' ?></a>
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
                                                    <h5 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?>
                                                        <span class="ml-2" style="font-size: 15px;"><a href="<?= url('transaksi/detail/' . $d['o_invoice']) ?>">Detail</a></span>
                                                    </h5>
                                                    <?php foreach ($data['one']['order'] as $o) : ?>
                                                        <?php if ($o['o_id'] == $d['o_id']) : ?>
                                                            <div class="row p-2">
                                                                <div class="col-md-12 border">
                                                                    <div class="row p-2">
                                                                        <div class="col-md-4">
                                                                            <img style="max-width: 70px" src="<?= IMG_URL . $o['p_gambar'] ?>" alt="">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <p class="m-1 text-dark"><?= $o['p_nama']; ?> (qty : <?= $o['od_qty']; ?>)</p>
                                                                            <h6 class="text-primary m-1"><?= rupiahFormat($o['p_harga']) ?>
                                                                                <span style="font-size: 13px;" class="text-secondary">(Harga satuan saat ini)</span>
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <div class="d-flex align-items-center justify-content-between my-2">
                                                        <h6 class="text-body">Jumlah Harus Dibayar : <?= rupiahFormat($d['o_total']) ?></h6>
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
                                                    <h5 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?>
                                                        <span class="ml-2" style="font-size: 15px;"><a href="<?= url('transaksi/detail/' . $d['o_invoice']) ?>">Detail</a></span>
                                                    </h5>
                                                    <?php foreach ($data['two']['order'] as $o) : ?>
                                                        <?php if ($o['o_id'] == $d['o_id']) : ?>

                                                            <div class="row p-2">
                                                                <div class="col-md-12 border">
                                                                    <div class="row p-2">
                                                                        <div class="col-md-4">
                                                                            <img style="max-width: 70px" src="<?= IMG_URL . $o['p_gambar'] ?>" alt="">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <p class="m-1 text-dark"><?= $o['p_nama']; ?> (qty : <?= $o['od_qty']; ?>)</p>
                                                                            <h6 class="text-primary m-1"><?= rupiahFormat($o['p_harga']) ?>
                                                                                <span style="font-size: 13px;" class="text-secondary">(Harga satuan saat ini)</span>
                                                                            </h6>

                                                                        </div>

                                                                    </div>
                                                                    <div class="row p-2">

                                                                    </div>

                                                                </div>
                                                            </div>


                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <div class="d-flex align-items-center justify-content-between my-2">
                                                        <h6 class="text-body">Total <?= rupiahFormat($d['o_total']) ?></h6>
                                                    </div>
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


                                                    <h5 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?>
                                                        <span class="ml-2" style="font-size: 15px;"><a href="<?= url('transaksi/detail/' . $d['o_invoice']) ?>">Detail</a></span>
                                                    </h5>
                                                    <?php foreach ($data['three']['order'] as $o) : ?>
                                                        <?php if ($o['o_id'] == $d['o_id']) : ?>

                                                            <div class="row p-2">
                                                                <div class="col-md-12 border">
                                                                    <div class="row p-2">
                                                                        <div class="col-md-4">
                                                                            <img style="max-width: 70px" src="<?= IMG_URL . $o['p_gambar'] ?>" alt="">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <p class="m-1 text-dark"><?= $o['p_nama']; ?> (qty : <?= $o['od_qty']; ?>)</p>
                                                                            <h6 class="text-primary m-1"><?= rupiahFormat($o['p_harga']) ?>
                                                                                <span style="font-size: 13px;" class="text-secondary">(Harga satuan saat ini)</span>
                                                                            </h6>

                                                                        </div>
                                                                    </div>



                                                                </div>
                                                            </div>


                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <div class="d-flex align-items-center justify-content-between my-2">
                                                        <h6 class="text-body">Total : <?= rupiahFormat($d['o_total']) ?></h6>
                                                        <h6 class="text-dark">Status : <?= $d['s_nama']; ?></h6>
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
                                                    <h5 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?>
                                                        <span class="ml-2" style="font-size: 15px;"><a href="<?= url('transaksi/detail/' . $d['o_invoice']) ?>">Detail</a></span>
                                                    </h5>

                                                    <?php foreach ($data['four']['order'] as $o) : ?>
                                                        <?php if ($o['o_id'] == $d['o_id']) : ?>

                                                            <div class="row p-2">
                                                                <div class="col-md-12 border">
                                                                    <div class="row p-2">
                                                                        <div class="col-md-4">
                                                                            <img style="max-width: 70px" src="<?= IMG_URL . $o['p_gambar'] ?>" alt="">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <p class="m-1 text-dark"><?= $o['p_nama']; ?> (qty : <?= $o['od_qty']; ?>)</p>
                                                                            <h6 class="text-primary m-1"><?= rupiahFormat($o['p_harga']) ?>
                                                                                <span style="font-size: 13px;" class="text-secondary">(Harga satuan saat ini)</span>
                                                                            </h6>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <div class="d-flex align-items-center justify-content-between my-2">
                                                        <span>
                                                            <h6 class="text-dark">Kurir : <?= $d['o_kurir']; ?></h6>
                                                            <h6 class="text-dark">No. Resi : <?= $d['o_no_resi']; ?></h6>
                                                        </span>

                                                        <h6 class="text-dark">Status : <?= $d['s_nama']; ?></h6>
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
                                                    <h5 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?>
                                                        <span class="ml-2" style="font-size: 15px;"><a href="<?= url('transaksi/detail/' . $d['o_invoice']) ?>">Detail</a></span>
                                                    </h5>
                                                    <?php foreach ($data['five']['order'] as $o) : ?>
                                                        <?php if ($o['o_id'] == $d['o_id']) : ?>
                                                            <div class="row p-2">
                                                                <div class="col-md-12 border">
                                                                    <div class="row p-2">
                                                                        <div class="col-md-4">
                                                                            <img style="max-width: 70px" src="<?= IMG_URL . $o['p_gambar'] ?>" alt="">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <p class="m-1 text-dark"><?= $o['p_nama']; ?> (qty : <?= $o['od_qty']; ?>)</p>
                                                                            <h6 class="text-primary m-1"><?= rupiahFormat($o['p_harga']) ?>
                                                                                <span style="font-size: 13px;" class="text-secondary">(Harga satuan saat ini)</span>
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <div class="d-flex align-items-center justify-content-end my-2">

                                                        <h6 class="text-dark">Status : <?= $d['s_nama']; ?></h6>
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
                                                    <h5 class="text-black">Nomor Pesanan <?= $d['o_invoice']; ?>
                                                        <span class="ml-2" style="font-size: 15px;"><a href="<?= url('transaksi/detail/' . $d['o_invoice']) ?>">Detail</a></span>
                                                    </h5>
                                                    <?php foreach ($data['six']['order'] as $o) : ?>
                                                        <?php if ($o['o_id'] == $d['o_id']) : ?>
                                                            <div class="row p-2">
                                                                <div class="col-md-12 border">
                                                                    <div class="row p-2">
                                                                        <div class="col-md-4">
                                                                            <img style="max-width: 70px" src="<?= IMG_URL . $o['p_gambar'] ?>" alt="">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <p class="m-1 text-dark"><?= $o['p_nama']; ?> (qty : <?= $o['od_qty']; ?>)</p>
                                                                            <h6 class="text-primary m-1"><?= rupiahFormat($o['p_harga']) ?>
                                                                                <span style="font-size: 13px;" class="text-secondary">(Harga satuan saat ini)</span>
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <div class="d-flex align-items-center my-2 justify-content-between">
                                                        <h6 class="text-dark">Alasan : <?= $d['o_alasan_pembatalan']; ?></h6>
                                                        <h6 class="text-dark">Status : <?= $d['s_nama']; ?></h6>
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