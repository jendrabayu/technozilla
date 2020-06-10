<div class="container">

    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Klik <a href="<?= url('admin') ?>" class="alert-link" target="blank">disini</a>. Untuk Masuk Ke Halaman Admin &mdash;
        <?= ADMIN_REGISTER == true ? 'Registrasi Admin : <strong>True</strong>' : 'Registrasi Admin : <strong>False</strong>' ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<div class="pt-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">
                    <?php foreach ($data['merk'] as $merk) : ?>
                        <div class="item">
                            <div class="block-4 text-center" style="background-image: linear-gradient(to right, #5433FF, #20BDFF);">
                                <div class="block-4-text p-3">
                                    <a href="<?= url('produk/merk/' . $merk['slug']) ?>">
                                        <h5 class="text-light p-0 m-0"><?= $merk['nama']; ?></h5>
                                    </a>

                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Produk Terbaru</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">

                    <?php foreach ($data['produk_baru'] as $produk) : ?>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <a href="<?= url($produk['slug']) ?>"> <img src="<?= IMG_URL .  $produk['gambar'] ?>"></a>
                                </figure>
                                <div class="block-4-text p-4">
                                    <a href="<?= url($produk['slug']) ?>">
                                        <h4 class="text-dark">

                                            <?= stringLimit($produk['nama'], 45) ?>

                                        </h4>
                                    </a>
                                    <p class="mb-2"><?= $produk['brand']; ?></p>
                                    <p class="text-primary font-weight-bold h5">
                                        <?= rupiahFormat($produk['harga']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section site-section-sm site-blocks-1">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-truck"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">Pengiriman</h2>
                    <p>Pengiriman bisa ke seluruh wilayah indonesia dengan kurir JNE</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-star"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">Kualitas Oke</h2>
                    <p>Kualitas barangnya terjamin karena semuanya disini original bukan kw.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-security"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">Keamanan</h2>
                    <p>Kami menjamin keamanan dalam pengiriman barang sampai diterima oleh anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>