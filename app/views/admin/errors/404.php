<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>404 &mdash; Stisla</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap4.min.css">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

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
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="page-error">
                    <div class="page-inner">
                        <h1>404</h1>
                        <div class="page-description">
                            The page you were looking for could not be found.
                        </div>
                        <div class="page-search">
                            <div class="mt-3">
                                <a href="<?= url('admin/auth') ?>">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= asset('backend/modules/jquery.min.js') ?>"></script>
    <script src="<?= asset('backend/modules/popper.js') ?>"></script>
    <script src="<?= asset('backend/modules/tooltip.js') ?>"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="<?= asset('backend/modules/nicescroll/jquery.nicescroll.min.js') ?>"></script>
    <script src="<?= asset('backend/modules/moment.min.js') ?>"></script>
    <script src="<?= asset('backend/js/stisla.js') ?>"></script>

    <!-- JS Libraies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
    <script src="<?= asset('backend/modules/jquery-ui/jquery-ui.min.js') ?>"></script>


    <!-- Page Specific JS File -->
    <script src="<?= asset('backend/js/page/modules-datatables.js') ?>"></script>


    <!-- Template JS File -->
    <script src="<?= asset('backend/js/scripts.js') ?>"></script>
    <script src="<?= asset('backend/js/custom.js') ?>"></script>

</body>

</html>