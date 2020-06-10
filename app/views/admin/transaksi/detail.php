<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Order <?= $data['order']['o_invoice']; ?></h1>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>

                                    <tr>
                                        <td class="text-dark">
                                            Invoice
                                        </td>
                                        <td>
                                            <?= $data['order']['o_invoice']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">
                                            Tanggal Order
                                        </td>
                                        <td>
                                            <?= $data['order']['o_date']; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-dark">
                                            Total Harga
                                        </td>
                                        <td>
                                            <?= rupiahFormat($data['order']['o_total']); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-dark">
                                            Tujuan Transfer
                                        </td>
                                        <td>
                                            Bank <?= $data['order']['r_nama_bank']; ?>
                                            <br>
                                            a / n <?= $data['order']['r_atas_nama']; ?>
                                            <br>
                                            Nomor Rekening : <?= $data['order']['r_no_rekening']; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-dark">
                                            Status Order
                                        </td>
                                        <td>
                                            <?= $data['order']['s_nama']; ?>
                                        </td>
                                    </tr>

                                    <?php if ($data['order']['o_status_id'] == 6) : ?>
                                        <tr>
                                            <td class="text-dark">
                                                Alasan Pembatalan
                                            </td>
                                            <td>
                                                <?= $data['order']['o_batal']; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ($data['order']['o_status_id'] == 4 || $data['order']['o_status_id'] == 5) : ?>
                                        <tr>
                                            <td class="text-dark">
                                                Pengiriman
                                            </td>
                                            <td>
                                                Kurir : <?= $data['order']['o_kurir']; ?>
                                                <br>
                                                No. Resi : <?= $data['order']['o_no_resi']; ?>
                                                <br>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <tr>
                                        <td class="text-dark">
                                            Alamat Pengiriman
                                        </td>
                                        <td>
                                            <?= $data['order']['a_nama']; ?>
                                            <br>
                                            <?= $data['order']['a_no_telp']; ?>
                                            <br>
                                            <?= $data['order']['a_alamat']; ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-dark">
                                            Produk
                                        </td>
                                        <td>
                                            <?php foreach ($data['produk'] as $key => $p) : ?>
                                                <?= 1 + $key++; ?>. <?= $p['p_nama'] ?> <span class="font-weight-bold text-black">(<?= $p['od_qty']; ?> X <?= rupiahFormat($p['od_harga']); ?> = <?= rupiahFormat($p['od_qty'] * $p['od_harga']); ?>)</span>
                                                <br>
                                            <?php endforeach; ?>
                                            <br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-dark">
                                            Pesan Ke Penjual
                                        </td>
                                        <td>
                                            <?= $data['order']['o_pesan']; ?>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                <button onclick="window.history.back()" class="btn btn-warning">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>