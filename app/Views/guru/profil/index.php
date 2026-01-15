<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <h1 class="mb-3">Biodata Guru</h1>
        <p class="text-muted">
            Kelola data biodata pribadi Anda di halaman ini.
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= esc(session()->getFlashdata('success')) ?>
                    </div>
                <?php endif; ?>

                <p class="text-muted mb-3">
                    Form biodata akan diimplementasikan pada fase validasi & service berikutnya.
                </p>

                <a href="<?= base_url('/guru/dashboard') ?>" class="btn btn-secondary">
                    Kembali ke Dashboard
                </a>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>