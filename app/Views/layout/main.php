<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Portal Data Guru') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- AdminLTE 3.x CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/bootstrap.min.css') ?>">
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

    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap Bundle -->
    <script src="<?= base_url('assets/adminlte/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>

    <!-- UX JS (Sub-Phase 9.3) -->
    <script src="<?= base_url('assets/js/clipboard.js') ?>"></script>
    <script src="<?= base_url('assets/js/operator-table.js') ?>"></script>

    <?= $this->renderSection('js') ?>
</body>

</html>