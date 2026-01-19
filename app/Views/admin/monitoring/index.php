<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <h1 class="mb-3">Monitoring Aktivitas</h1>
        <p class="text-muted">
            Riwayat aktivitas sistem akan ditampilkan di halaman ini.
        </p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">
                    Data log aktivitas (audit trail) akan dimuat di sini.
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>