<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <h1 class="mb-3">Dashboard Guru</h1>
        <p class="text-muted">
            Ringkasan status kelengkapan data pribadi Anda.
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Biodata</h5>
                <p class="card-text">
                    Cek dan lengkapi data biodata pribadi.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kepegawaian</h5>
                <p class="card-text">
                    Status kepegawaian dan SK aktif.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sertifikasi</h5>
                <p class="card-text">
                    Informasi sertifikasi guru.
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>