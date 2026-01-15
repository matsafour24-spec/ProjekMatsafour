<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Portal Data Guru') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS: Bootstrap & AdminLTE -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/adminlte.min.css') ?>">

    <?= $this->renderSection('css') ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?= $this->include('partials/navbar') ?>

        <!-- Sidebar -->
        <?= $this->include('partials/sidebar') ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content pt-3">
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?= $this->include('partials/footer') ?>

    </div>

    <!-- JS: Bootstrap & AdminLTE -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>

    <?= $this->renderSection('js') ?>
</body>

</html>