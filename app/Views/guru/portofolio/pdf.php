<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <h1 class="mb-3">Portofolio Guru (PDF)</h1>
        <p class="text-muted">
            Halaman ini digunakan untuk generate portofolio PDF pribadi (read-only).
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <p class="text-muted mb-3">
                    Konten portofolio PDF akan dirender dari data biodata, kepegawaian,
                    riwayat pendidikan, dan sertifikasi pada fase berikutnya.
                </p>

                <a href="<?= base_url('/guru/dashboard') ?>" class="btn btn-secondary">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>