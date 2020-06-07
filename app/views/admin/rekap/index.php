<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Rekap Data Penjualan <small>(Transaksi Selesai)</small></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Hari Ini</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bulan Ini</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Tahun Ini</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-semua-tab" data-toggle="pill" href="#pills-semua" role="tab" aria-controls="pills-semua" aria-selected="false">Semua</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="card">
                                <div class="card-header">
                                    <?php

                                    $uang = 0;
                                    foreach ($data['rekap_harian'] as $order) {
                                        $uang += $order['total'];
                                    }
                                    ?>
                                    <h4>Penjualan Hari Ini
                                        <small class="d-block">
                                            Pendapatan : <?= rupiahFormat($uang) ?>
                                        </small>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Order Date</th>
                                                    <th>Invoice</th>
                                                    <th>Customer</th>
                                                    <th>Total</th>
                                                    <th>Selesai</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($data['rekap_harian'] as $key => $order) : ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <?= 1 + $key++; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['tgl']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['inv']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['cust']; ?>
                                                        </td>
                                                        <td>
                                                            <?= rupiahFormat($order['total']); ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['terkirim']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= url('admin/rekap/detail/' . $order['inv']) ?>" class="btn btn-info">Detail</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card">
                                <div class="card-header">
                                    <?php

                                    $uang = 0;
                                    foreach ($data['rekap_bulanan'] as $order) {
                                        $uang += $order['total'];
                                    }
                                    ?>
                                    <h4>Penjualan Bulan Ini
                                        <small class="d-block">
                                            Pendapatan : <?= rupiahFormat($uang) ?>
                                        </small>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-2">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Order Date</th>
                                                    <th>Invoice</th>
                                                    <th>Customer</th>
                                                    <th>Total</th>
                                                    <th>Selesai</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($data['rekap_bulanan'] as $key => $order) : ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <?= 1 + $key++; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['tgl']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['inv']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['cust']; ?>
                                                        </td>
                                                        <td>
                                                            <?= rupiahFormat($order['total']); ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['terkirim']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= url('admin/rekap/detail/' . $order['inv']) ?>" class="btn btn-info">Detail</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="card">
                                <div class="card-header">
                                    <?php

                                    $uang = 0;
                                    foreach ($data['rekap_tahunan'] as $order) {
                                        $uang += $order['total'];
                                    }
                                    ?>
                                    <h4>Penjualan Tahun Ini
                                        <small class="d-block">
                                            Pendapatan : <?= rupiahFormat($uang) ?>
                                        </small>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-3">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Order Date</th>
                                                    <th>Invoice</th>
                                                    <th>Customer</th>
                                                    <th>Total</th>
                                                    <th>Selesai</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($data['rekap_tahunan'] as $key => $order) : ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <?= 1 + $key++; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['tgl']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['inv']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['cust']; ?>
                                                        </td>
                                                        <td>
                                                            <?= rupiahFormat($order['total']); ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['terkirim']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= url('admin/rekap/detail/' . $order['inv']) ?>" class="btn btn-info">Detail</a>>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-semua" role="tabpanel" aria-labelledby="pills-semua-tab">
                            <div class="card">
                                <div class="card-header">
                                    <?php

                                    $uang = 0;
                                    foreach ($data['rekap'] as $order) {
                                        $uang += $order['total'];
                                    }
                                    ?>
                                    <h4>Semua Penjualan
                                        <small class="d-block">
                                            Pendapatan : <?= rupiahFormat($uang) ?>
                                        </small>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-4">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Order Date</th>
                                                    <th>Invoice</th>
                                                    <th>Customer</th>
                                                    <th>Total</th>
                                                    <th>Selesai</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($data['rekap'] as $key => $order) : ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <?= 1 + $key++; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['tgl']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['inv']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['cust']; ?>
                                                        </td>
                                                        <td>
                                                            <?= rupiahFormat($order['total']); ?>
                                                        </td>
                                                        <td>
                                                            <?= $order['terkirim']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= url('admin/rekap/detail/' . $order['inv']) ?>" class="btn btn-info">Detail</a>
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


    </section>
</div>