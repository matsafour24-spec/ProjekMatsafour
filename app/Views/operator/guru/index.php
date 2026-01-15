<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Manajemen Guru</h1>
            <a href="<?= base_url('/operator/guru/create') ?>" class="btn btn-primary">
                Tambah Guru
            </a>
        </div>
        <p class="text-muted">
            Pencarian guru dilakukan secara on-demand. Data tidak dimuat otomatis.
        </p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">
                    Area Hybrid Data Table akan diimplementasikan pada fase service & frontend logic.
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>