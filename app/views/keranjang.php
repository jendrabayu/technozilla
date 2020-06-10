    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="<?= url('') ?>">Home</a>
            <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Keranjang</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <?= \App\Core\Session::getFlash() ?>
        <div class="row mb-5">
          <form class="col-md-12" method="post" action="<?= url('keranjang/update') ?>">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Gambar</th>
                    <th class="product-name">Produk</th>
                    <th class="product-price">Harga</th>
                    <th class="product-quantity">Kuantitas</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($data['produk'] as $produk) : ?>
                    <tr>
                      <td class="product-thumbnail">
                        <img src="<?= IMG_URL . $produk['gambar'] ?>" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name" style="max-width: 300px;">
                        <h2 class="h5 text-black"><?= $produk['nama'] ?></h2>
                      </td>
                      <td><?= rupiahFormat($produk['harga']) ?></td>

                      <td class="text-center">
                        <p class="mb-1">Stok : <?= $produk['stok']; ?></p>
                        <div class="input-group m-auto" style="max-width: 120px;">

                          <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                          </div>

                          <input type="hidden" name="id[]" value="<?= $produk['id'] ?>">
                          <input type="hidden" name="produk_id[]" value="<?= $produk['produk_id'] ?>">

                          <input type="number" name="qty[]" class="form-control text-center" value="<?= $produk['qty'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">

                          <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                          </div>
                        </div>
                      </td>

                      <td><?= rupiahFormat($produk['harga'] * $produk['qty']) ?></td>
                      <td><a href="<?= url('keranjang/destroy/' . $produk['id']) ?>" class="btn btn-primary btn-sm">Hapus</a></td>

                    </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>

        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block">Update Keranjang</button>
              </div>
              </form>
              <div class="col-md-6">
                <a href="<?= url('produk') ?>" class="btn btn-outline-primary btn-sm btn-block">Lanjutkan Belanja</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-9">

                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Ongkos Kirim</span>
                    <h4 class="text-black mt-4">Total</h4>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php
                    $subtotal = 0;
                    foreach ($data['produk'] as $produk) {
                      $subtotal += $produk['harga'] * $produk['qty'];
                    }
                    ?>
                    <strong class="text-black">
                      <h5>Gratis</h5>
                      <h3 class="mt-4"><?= rupiahFormat($subtotal) ?></h3>
                    </strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <?php
                    $db =  new \App\Core\DB;
                    $alamat = $db->select('*')
                      ->from('alamat')
                      ->where('customer_id', '=', $_SESSION['is_customer']['id'])
                      ->first();
                    if ($alamat) : ?>
                      <a href="<?= url('checkout') ?>" class="btn btn-primary btn-lg py-3 btn-block">Checkout</a>
                    <?php else : ?>
                      <p>Anda belum mengatur alamat pengiriman</p>
                      <a href="<?= url('alamat/edit')  ?>" class="btn btn-primary btn-lg py-3 btn-block">Atur Alamat</a>
                    <?php endif; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>