<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Manajemen Operator</h1>
            <a href="<?= base_url('/admin/operators/create') ?>" class="btn btn-primary">
                Tambah Operator
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="text-muted mb-0">
                    Daftar akun operator akan ditampilkan di sini.
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>