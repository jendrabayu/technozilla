<!DOCTYPE html>
<html lang="en">

<head>
    <title>Technozilla &mdash;

        <?= $data['judul']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?= asset('frontend/fonts/icomoon/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css">

    <link rel="stylesheet" href="<?= asset('frontend/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('frontend/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= asset('frontend/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?= asset('frontend/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('frontend/css/owl.theme.default.min.css') ?>">


    <link rel="stylesheet" href="<?= asset('frontend/css/aos.css') ?>">

    <link rel="stylesheet" href="<?= asset('frontend/css/style.css') ?>">

    <script src="<?= asset('frontend/js/jquery-3.3.1.min.js') ?>"></script>

    <style>
        .active-image {
            filter: blur(3px);
        }

        .js .input-file-trigger {
            display: block;
            padding: 14px 45px;
            background: #39D2B4;
            color: #fff;
            font-size: 1em;
            transition: all .4s;
            cursor: pointer;
        }

        .js .input-file {
            position: absolute;
            top: 0;
            left: 0;
            width: 225px;
            opacity: 0;
            padding: 14px 0;
            cursor: pointer;
        }

        .js .input-file:hover+.input-file-trigger,
        .js .input-file:focus+.input-file-trigger,
        .js .input-file-trigger:hover,
        .js .input-file-trigger:focus {
            background: #34495E;
            color: #39D2B4;
        }

        .file-return {
            margin: 0;
        }

        .file-return:not(:empty) {
            margin: 1em 0;
        }

        .js .file-return {
            font-style: italic;
            font-size: .9em;
            font-weight: bold;
        }

        .js .file-return:not(:empty):before {
            content: "File yang dipilih: ";
            font-style: normal;
            font-weight: normal;
        }
    </style>

</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="<?= url('produk/cari') ?>" class="site-block-top-search" method="GET">
                                <span class="icon icon-search2"></span>
                                <input type="text" name="q" class="form-control border-0" placeholder="Cari produk...">
                            </form>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="<?= url('') ?>" class="js-logo-clone">Technozilla</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul>

                                    <?php if (isset($_SESSION['is_customer'])) : ?>

                                        <?php

                                        $db = new \App\Core\DB;

                                        $qty = $db->select('SUM(kuantitas) as qty')
                                            ->from('keranjang')
                                            ->where('customer_id', '=', $_SESSION['is_customer']['id'])
                                            ->first();

                                        ?>
                                        <li class="mr-2">
                                            <a href="<?= url('keranjang') ?>" class="site-cart">
                                                <span class="icon icon-shopping_cart"></span>
                                                <?php if ($qty['qty'] != null) : ?>
                                                    <span class="count"><?= $qty['qty']; ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a style="cursor: pointer;" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="">
                                                    <?php
                                                    $nama = $_SESSION['is_customer']['nama'];
                                                    $nama = explode(' ', $nama);
                                                    $nama = $nama[0];
                                                    echo $nama;
                                                    ?>

                                                </span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?= url('transaksi') ?>">Transaksi</a>
                                                <a class="dropdown-item" href="<?= url('alamat') ?>">Pengaturan Alamat</a>
                                                <a class="dropdown-item" href="<?= url('auth/resetpassword') ?>">Ubah Password</a>
                                                <a class="dropdown-item" href="<?= url('auth/do_logout') ?>">Keluar</a>
                                            </div>
                                        </li>
                                    <?php else : ?>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="icon icon-person"></span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?= url('auth') ?>">Masuk</a>
                                                <a class="dropdown-item" href="<?= url('auth/register') ?>">Daftar</a>
                                            </div>
                                        </li>
                                    <?php endif; ?>


                                    <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">
                        <li class=""><a href="<?= url('') ?>">Home</a></li>
                        <li><a href="<?= url('produk') ?>">Produk</a></li>
                        <li><a href="<?= url('transaksi') ?>">Transaksi

                                <?php
                                if (getUserId('customer')) {

                                    $db = new App\Core\DB;
                                    $belumBayar = $db
                                        ->select('COUNT(invoice) as jumlah')
                                        ->from('`order`')
                                        ->where([
                                            ['customer_id', '=', getUserId('customer')],
                                            ['status_order_id', '=', 1]
                                        ])
                                        ->first();

                                    if ($belumBayar) {
                                        echo '<span class="badge badge-pill badge-primary">' . $belumBayar['jumlah'] . '</span>';
                                    }
                                }
                                ?>
                            </a></li>

                    </ul>
                </div>
            </nav>
        </header>