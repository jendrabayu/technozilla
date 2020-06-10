<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="<?= url('') ?>">Home</a>
                <span class="mx-2 mb-0">/</span>
                <a href="<?= url('produk') ?>">Semua Produk</a>
                <span class="mx-2 mb-0">/</span>
                <strong class="text-black"><?= $data['judul']; ?></strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?= App\Core\Session::getFlash() ?>
            </div>
            <div class="col-md-6">
                <div class="single_product_image">
                    <img src="<?= IMG_URL . $data['produk']['p_gambar'] ?>" alt="Image" class="img-fluid">
                </div>
                <div class="single_product_thumbnails">

                    <ul class="d-flex flex-wrap mt-5 list-unstyled">
                        <li class="mr-3 mb-3 border p-1 active-image">
                            <img style="width: 100px" src="<?= IMG_URL . $data['produk']['p_gambar'] ?>" alt="" data-image="<?= IMG_URL . $data['produk']['p_gambar'] ?>">
                        </li>

                        <?php foreach ($data['foto'] as $foto) : ?>
                            <li class="mr-3 mb-3 border p-1">
                                <img style="width: 100px" src="<?= IMG_URL . $foto['nama'] ?>" alt="" data-image="<?= IMG_URL . $foto['nama'] ?>">
                            </li>
                        <?php endforeach ?>

                    </ul>
                </div>

            </div>
            <div class="col-md-6 ">
                <h2 class="text-black font-weight-bold"><?= $data['produk']['p_nama']; ?></h2>
                <div class="row mt-4 mb-1 border-bottom">
                    <div class="col-md-3">
                        <strong class="h5 43">Harga</strong>
                    </div>

                    <div class="col-md-9">
                        <p><strong class="text-primary h3"><?= rupiahFormat($data['produk']['p_harga']) ?></strong></p>
                    </div>
                </div>

                <div class="row mt-4 mb-1 border-bottom">
                    <div class="col-md-3">
                        <strong class="h5 text-dark">Deskripsi</strong>
                    </div>

                    <div class="col-md-9">
                        <div class="text-dark">
                            <?= $data['produk']['p_desk']; ?>
                        </div>
                    </div>
                </div>

                <form action="<?= url('keranjang/store') ?>" method="POST" class="d-inline">
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <strong class="h5 text-dark">Jumlah</strong>
                        </div>

                        <div class="col-md-9">
                            <p class="mb-1">Stok : <?= $data['produk']['p_stok'] ?></p>
                            <div class="mb-5">
                                <div class="input-group mb-3" style="max-width: 140px;">
                                    <input type="hidden" name="produk_id" value="<?= $data['produk']['p_id']; ?>">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                    </div>
                                    <input type="number" name="kuantitas" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" min="1" max="<?= $data['produk']['p_stok'] ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                            <button type="submit" class=" buy-now btn btn-sm btn-primary">Tambah Ke Keranjang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>