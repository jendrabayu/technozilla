<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Toko Online &mdash; <?= $data['judul'] ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= asset('backend/modules/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('backend/modules/fontawesome/css/all.min.css') ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= asset('backend/modules/datatables/datatables.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('backend/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('backend/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= asset('backend/css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('backend/css/components.css') ?>">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>

    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 9999999;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .modal-content,
        #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav mr-3 mr-auto">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>

                <ul class="navbar-nav navbar-right ml-auto">

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                            <div class="d-sm-none d-lg-inline-block">
                                <?php
                                $nama = explode(' ', $_SESSION['is_admin']['nama']);
                                $nama = $nama[0];
                                echo $nama;
                                ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Pengaturan
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= url('admin/auth/do_logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>


            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= url('admin') ?>">Toko Online</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= url('admin') ?>">JB</a>
                    </div>
                    <ul class="sidebar-menu mt-3">
                        <li class=""><a class="nav-link" href="<?= url('admin') ?>"><i class="fas  fa-fire"></i> <span>Dashboard</span></a></li>

                        <li class=""><a class="nav-link" href="<?= url('admin/customer') ?>"><i class="fas fa-users"></i> <span>Customer</span></a></li>

                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th"></i> <span>Data Master</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?= url('admin/produk') ?>">Produk</a></li>
                                <li><a class="nav-link" href="<?= url('admin/kategori') ?>">Kategori</a></li>
                                <li><a class="nav-link" href="<?= url('admin/brand') ?>">Merk</a></li>
                                <li><a class="nav-link" href="<?= url('admin/gallery') ?>">Galeri Foto</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-cart" aria-hidden="true"></i></i> <span>Transaksi</span></a>
                            <ul class="dropdown-menu">

                                <li><a class="nav-link" href="<?= url('admin/transaksi/pesananbaru') ?>">Belum Dibayar</a></li>
                                <li><a class="nav-link" href="<?= url('admin/transaksi/perludicek') ?>">Perlu Dicek</a></li>
                                <li><a class="nav-link" href="<?= url('admin/transaksi/perludikirim') ?>">Perlu Dikirim</a></li>
                                <li><a class="nav-link" href="<?= url('admin/transaksi/barangdikirim') ?>">Barang Dikirim</a></li>
                                <li><a class="nav-link" href="<?= url('admin/transaksi/selesai') ?>">Selesai</a></li>
                                <li><a class="nav-link" href="<?= url('admin/transaksi/pembatalan') ?>">Pembatalan</a></li>
                            </ul>
                        </li>

                        <li class=""><a class="nav-link" href="<?= url('admin/rekening') ?>"><i class="fas fa-credit-card"></i> <span>Rekening Bank</span></a></li>

                </aside>
            </div>