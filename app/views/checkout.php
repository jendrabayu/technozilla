   <div class="bg-light py-3">
       <div class="container">
           <div class="row">
               <div class="col-md-12 mb-0">
                   <a href="<?= url('') ?>">Home</a>
                   <span class="mx-2 mb-0">/</span>
                   <a href="<?= url('keranjang') ?>">Keranjang</a>
                   <span class="mx-2 mb-0">/</span>
                   <strong class="text-black">Checkout</strong></div>
           </div>
       </div>
   </div>

   <div class="site-section">
       <div class="container">

           <form action="<?= url('checkout/store') ?>" method="post">
               <div class="row">
                   <div class="col-md-6 mb-5 mb-md-0">
                       <h2 class="h3 mb-3 text-black">Detail Pemesanan</h2>
                       <div class="p-3 p-lg-5 border">
                           <div class="form-group">
                               <label for="c_diff_phone" class="text-black">Nama Penerima Paket</label>
                               <input type="text" class="form-control" name="c_nama" placeholder="Phone Number" value="<?= $data['alamat']['nama'] ?>">
                           </div>

                           <div class="form-group">
                               <label for="c_diff_phone" class="text-black">Nomor Yang Bisa Dihubungi</label>
                               <input type="text" class="form-control" name="c_no_telp" placeholder="Phone Number" value="<?= $data['alamat']['no_telp'] ?>">
                           </div>

                           <div class="form-group">
                               <label for="c_order_notes" class="text-black">Alamat Lengkap</label>
                               <textarea name="c_alamat" cols="30" rows="5" class="form-control" placeholder="Alamat detail rumah anda..."><?= $data['alamat']['alamat']; ?></textarea>
                           </div>
                           <div class="form-group">
                               <label for="c_order_notes" class="text-black">Pesan</label>
                               <textarea name="o_pesan" cols="30" rows="5" class="form-control" placeholder="Pesan kepada penjual..."></textarea>
                           </div>

                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="row mb-5">
                           <div class="col-md-12">
                               <h2 class="h3 mb-3 text-black">Order kamu</h2>
                               <div class="p-3 p-lg-5 border">
                                   <table class="table site-block-order-table mb-5">
                                       <thead>
                                           <th>Produk</th>
                                           <th>Total</th>
                                       </thead>
                                       <tbody>
                                           <?php foreach ($data['order'] as $order) : ?>
                                               <tr>
                                                   <td style="max-width: 300px;"><?= $order['nama']; ?><strong class="mx-2 ">x</strong><span class="font-weight-bold"><?= $order['qty']; ?></span></td>
                                                   <td><?= rupiahFormat($order['harga'] * $order['qty']) ?></td>
                                               </tr>
                                           <?php endforeach; ?>
                                           <tr>
                                               <td class="text-black font-weight-bold"><strong>Total</strong></td>
                                               <?php
                                                $subtotal = 0;
                                                foreach ($data['order'] as $order) {
                                                    $subtotal += $order['harga'] * $order['qty'];
                                                }
                                                ?>
                                               <td><?= rupiahFormat($subtotal) ?></td></strong></td>
                                           </tr>
                                       </tbody>
                                   </table>

                                   <div class="form-group">
                                       <label class="text-black">Pilihan Pembayaran</label>
                                       <?php foreach ($data['bank'] as $bank) : ?>
                                           <div class="form-check mb-3">
                                               <input class="form-check-input" type="radio" name="bank_id" value="<?= $bank['id'] ?>" checked>
                                               <label class="form-check-label">
                                                   <h5 class="text-dark"> <?= $bank['nama']; ?>
                                                       &nbsp; <span style="font-size: 16px;">a/n <?= $bank['atas_nama']; ?></span>
                                                   </h5>
                                                   <h4 class="text-dark"> <?= $bank['nomor']; ?></h4>
                                               </label>
                                           </div>
                                       <?php endforeach; ?>
                                   </div>
                                   <div class="form-group">
                                       <div class="row">
                                           <div class="col">
                                               <a href="<?= url('keranjang') ?>" class="btn  btn-outline-primary py-3 btn-block">Keranjang</a>
                                           </div>
                                           <div class="col">
                                               <button type="submit" class="btn btn-primary text-light py-3 btn-block">Buat Pesanan</button>
                                           </div>
                                       </div>
                                   </div>

                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </form>

       </div>
   </div>