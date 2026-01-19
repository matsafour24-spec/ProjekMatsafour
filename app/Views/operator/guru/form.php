<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-8">
        <h1 class="mb-3"><?= esc($title ?? 'Form Guru') ?></h1>

        <div class="card">
            <div class="card-body">
                <p class="text-muted">
                    Form input dan detail guru akan diimplementasikan pada fase service & validasi berikutnya.
                </p>

                <a href="<?= base_url('/operator/guru') ?>" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>