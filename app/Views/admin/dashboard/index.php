<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <h1 class="mb-3">Dashboard Admin</h1>
        <p class="text-muted">
            Ringkasan sistem & monitoring umum.
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Status Sistem</h5>
                <p class="card-text">
                    Sistem berjalan normal.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Akun Operator</h5>
                <p class="card-text">
                    Monitoring akun operator aktif.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Log Aktivitas</h5>
                <p class="card-text">
                    Pantau aktivitas terbaru sistem.
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>