<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $data['judul']; ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="ml-auto">

                                <?php if ($data['status_id'] == 1) : ?>
                                    <a href="<?= url('admin/transaksi/perludicek') ?>" class="btn btn-icon btn-primary ml-auto">Perlu Dicek<i class="fa fa-arrow-circle-right pl-2" aria-hidden="true"></i></a>
                                <?php endif; ?>

                                <?php if ($data['status_id'] == 2) : ?>
                                    <a href="<?= url('admin/transaksi/pesananbaru') ?>" class="btn btn-icon btn-info mr-3"><i class="fa fa-arrow-circle-left pr-2" aria-hidden="true"></i>Pesanan Baru</a>
                                    <a href="<?= url('admin/transaksi/perludikirim') ?>" class="btn btn-icon btn-primary">Perlu Dikirim<i class="fa fa-arrow-circle-right pl-2" aria-hidden="true"></i></a>
                                <?php endif; ?>

                                <?php if ($data['status_id'] == 3) : ?>
                                    <a href="<?= url('admin/transaksi/perludicek') ?>" class="btn btn-icon btn-info mr-3"><i class="fa fa-arrow-circle-left pr-2" aria-hidden="true"></i>Perlu Dicek</a>
                                    <a href="<?= url('admin/transaksi/barangdikirim') ?>" class="btn btn-icon btn-primary">Barang Dikirim<i class="fa fa-arrow-circle-right pl-2" aria-hidden="true"></i></a>
                                <?php endif; ?>

                                <?php if ($data['status_id'] == 4) : ?>
                                    <a href="<?= url('admin/transaksi/perludikirim') ?>" class="btn btn-icon btn-info mr-3"><i class="fa fa-arrow-circle-left pr-2" aria-hidden="true"></i>Perlu Dikirim</a>
                                    <a href="<?= url('admin/transaksi/selesai') ?>" class="btn btn-icon btn-primary">Transaksi Selesai<i class="fa fa-arrow-circle-right pl-2" aria-hidden="true"></i></a>

                                <?php endif; ?>

                                <?php if ($data['status_id'] == 5) : ?>
                                    <a href="<?= url('admin/transaksi/barangdikirim') ?>" class="btn btn-icon btn-info mr-3"><i class="fa fa-arrow-circle-left pr-2" aria-hidden="true"></i>Barang Sedang Dikirim</a>
                                    <a href="<?= url('admin/transaksi/pembatalan') ?>" class="btn btn-icon btn-primary">Transaksi Batal<i class="fa fa-arrow-circle-right pl-2" aria-hidden="true"></i></a>
                                <?php endif; ?>

                                <?php if ($data['status_id'] == 6) : ?>
                                    <a href="<?= url('admin/transaksi/selesai') ?>" class="ml-auto btn btn-icon btn-info mr-3"><i class="fa fa-arrow-circle-left pr-2" aria-hidden="true"></i>Transaksi Selesai</a>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class=" card-body">
                            <?= \App\Core\Session::getFlash() ?>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Order Date</th>
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
                                                <td><?= $order['o_date']; ?></td>
                                                <td><?= $order['o_invoice']; ?></td>
                                                <td><?= $order['c_nama']; ?></td>
                                                <td><?= rupiahFormat($order['o_total']) ?></td>
                                                <td><?= $order['s_nama']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= url('admin/transaksi/detail/' . $order['o_invoice']) ?>" class="btn btn-info">Detail</a>

                                                    <?php if ($order['o_status_id'] == 1) : ?>
                                                        <button class="btn btn-danger btn-batal" data-toggle="modal" data-target="#modal-pembatalan" data-id="<?= url('admin/transaksi/prosespembatalan/' . $order['o_invoice']) ?>">Batalkan</button>
                                                    <?php endif; ?>

                                                    <?php if ($order['o_status_id'] == 2) : ?>

                                                        <button class="btn btn-warning btn-konfirmasi-pembayaran" data-toggle="modal" data-target="#modal-konfirmasi-pembayaran" data-image="<?= IMG_URL . '' . $order['o_bukti_transfer'] ?>" data-id="<?= url('admin/transaksi/proseskonfirmasipembayaran/' . $order['o_invoice']) ?>">Konfirmasi Pembayaran</button>
                                                        <button class="btn btn-danger btn-batal" data-toggle="modal" data-target="#modal-pembatalan" data-id="<?= url('admin/transaksi/prosespembatalan/' . $order['o_invoice']) ?>">Batalkan</button>
                                                    <?php endif; ?>

                                                    <?php if ($order['o_status_id'] == 3) : ?>
                                                        <button class="btn btn-warning btn-input-resi" data-toggle="modal" data-target="#modal-input-resi" data-id="<?= url('admin/transaksi/prosesinputresi/' . $order['o_invoice']) ?>">Input No Resi</button>
                                                    <?php endif; ?>

                                                    <?php if ($order['o_status_id'] == 4) : ?>
                                                        <a href="<?= url('admin/transaksi/prosesselesai/' . $order['o_invoice']) ?>" class="btn btn-warning">Selesaikan</a>
                                                    <?php endif; ?>


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



<!-- Modal Form Pembatalan -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-pembatalan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Pembatalan Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Masukkan Alasan Pembatalan</label>
                        <input name="alasan" type="text" class="form-control" required placeholder="Alasan Pembatalan">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal-konfirmasi-pembayaran -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-konfirmasi-pembayaran">
    <div class="modal-dialog" role="document" style="max-width: 700px">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Pembayaran - Cek Bukti Transfer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Foto Bukti Transfer</label>
                        <img class="w-100" src="" alt="">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Input Resi Pengiriman -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-input-resi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Input Resi Pengiriman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kurir</label>
                        <input name="kurir" type="text" class="form-control" required placeholder="Kurir">
                    </div>
                    <div class="form-group">
                        <label>Nomor Resi</label>
                        <input name="no_resi" type="text" class="form-control" required placeholder="Nomor Resi">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    $('.btn-batal').each(function() {
        $(this).click(function() {
            let id = $(this).data('id');
            let form = $('#modal-pembatalan').find('form');
            form.attr('action', '');
            form.attr('action', id);
        })
    });

    $('.btn-input-resi').each(function() {
        $(this).click(function() {
            let id = $(this).data('id');
            let form = $('#modal-input-resi').find('form');
            form.attr('action', '');
            form.attr('action', id);
        })
    });


    $('.btn-konfirmasi-pembayaran').each(function() {
        $(this).click(function() {

            let id = $(this).data('id')
            let form = $('#modal-konfirmasi-pembayaran').find('form')
            form.attr('action', '')
            form.attr('action', id)

            let image = $(this).data('image');
            let img = $('#modal-konfirmasi-pembayaran').find('img');
            img.attr('src', '')
            img.attr('src', image);

        })
    })
</script>