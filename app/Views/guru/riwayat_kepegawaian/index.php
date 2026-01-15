<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <h1 class="mb-3">Riwayat Kepegawaian</h1>
        <p class="text-muted">
            Riwayat perubahan status dan jabatan kepegawaian Anda.
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= esc(session()->getFlashdata('success')) ?>
                    </div>
                <?php endif; ?>

                <p class="text-muted mb-3">
                    Daftar riwayat kepegawaian (append-only) akan ditampilkan di sini.
                </p>

                <a href="<?= base_url('/guru/dashboard') ?>" class="btn btn-secondary">
                    Kembali ke Dashboard
                </a>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>