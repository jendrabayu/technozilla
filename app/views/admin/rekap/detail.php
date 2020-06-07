<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Order <?= $data['order']['o_invoice']; ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">

                        <div class="card-body">

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold">Nama Customer</td>
                                        <td><?= $data['order']['c_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">No. Invoice</td>
                                        <td><?= $data['order']['o_invoice']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Waktu Order</td>
                                        <td><?= $data['order']['o_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Status Pesanan</td>
                                        <td><?= $data['order']['s_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Produk Yang Dibeli</td>
                                        <td>
                                            <?php foreach ($data['produk'] as $produk) : ?>
                                                <?= $produk['p_nama']; ?> <b>( X <?= $produk['od_qty']; ?> )</b>
                                                <br>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Total Pembayaran</td>
                                        <td><?= rupiahFormat($data['order']['o_total']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Melakukan Pembayaran Ke</td>
                                        <td>
                                            Bank <?= $data['order']['r_nama_bank'] ?>
                                            <br>
                                            a / n <?= $data['order']['r_atas_nama'] ?>
                                            <br>
                                            No. Rekening : <?= $data['order']['r_no_rekening'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Pengiriman Melaluhi</td>
                                        <td>
                                            Kurir : <?= $data['order']['o_kurir']; ?>
                                            <br>
                                            No. Resi : <?= $data['order']['o_no_resi']; ?>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>

                            <button onclick="window.history.back()" class="btn btn-warning float-right">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>