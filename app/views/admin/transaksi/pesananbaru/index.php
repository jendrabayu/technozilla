<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pesanan Baru</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pesanan Baru - Belum Dibayar</h4>
                            <a href="<?= url('admin/transaksi/perludicek') ?>" class="btn btn-icon btn-primary ml-auto">Perlu Dicek<i class="fa fa-arrow-circle-right pl-2" aria-hidden="true"></i></a>
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
                                            <tr>
                                                <td><?= 1 + $key++; ?></td>
                                                <td><?= $order['o_invoice']; ?></td>
                                                <td><?= $order['c_nama']; ?></td>
                                                <td>Rp. <?= number_format(($order['o_total']), 0, ".", ",") ?></td>
                                                <td><?= $order['s_nama']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= url('admin/transaksi/detail/' . $order['o_invoice'] . '/' . 'pesananbaru/' . $order['o_status_id']) ?>" class="btn btn-warning">Lihat Detail</a>
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