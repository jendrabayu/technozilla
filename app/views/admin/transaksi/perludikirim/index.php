<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Perlu Dikirim</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Perlu Dikirim - Sudah Dibayar</h4>
                            <div class="ml-auto">
                                <a href="<?= url('admin/transaksi/perludicek') ?>" class="btn btn-icon btn-info mr-3"><i class="fa fa-arrow-circle-left pr-2" aria-hidden="true"></i>Perlu Dicek</a>
                                <a href="<?= url('admin/transaksi/barangdikirim') ?>" class="btn btn-icon btn-primary">Barang Dikirim<i class="fa fa-arrow-circle-right pl-2" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class=" card-body">
                            <?= \App\Core\Session::getFlash() ?>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Invoice</th>
                                            <th>Customer</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['order'] as $key => $order) : ?>
                                            <tr class="text-center">
                                                <td><?= 1 + $key++; ?></td>
                                                <td><?= $order['o_invoice']; ?></td>
                                                <td><?= $order['c_nama']; ?></td>
                                                <td>Rp. <?= number_format(($order['o_total']), 0, ".", ",") ?></td>
                                                <td><?= $order['s_nama']; ?></td>
                                                <td class="text-center"><a href="<?= url('admin/transaksi/detail/' . $order['o_invoice'] . '/perludikirim/' . $order['o_status_id']) ?>" class="btn btn-warning">Input Nomor Resi</a>
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
    </section>
</div>