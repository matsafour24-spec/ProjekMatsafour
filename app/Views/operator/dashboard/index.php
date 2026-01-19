<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<h1 class="mb-3">Dashboard Operator</h1>
<p>Pencarian dan pengelolaan data guru dilakukan dari halaman ini.</p>

<div class="card">
    <div class="card-body">

        <!-- FORM SEARCH (fallback non-JS) -->
        <form id="operator-search-form"
            method="get"
            action="<?= base_url('operator/guru/search') ?>">

            <div class="form-row align-items-end">
                <div class="col-md-4">
                    <label for="keyword">Nama / NIP Guru</label>
                    <input type="text"
                        name="keyword"
                        id="keyword"
                        class="form-control"
                        placeholder="Ketik nama atau NIP">
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>
                </div>

                <div class="col-md-3 text-right">
                    <button type="button"
                        id="toggle-selected"
                        class="btn btn-outline-success">
                        Tampilkan Terpilih
                    </button>
                </div>

                <div class="col-md-3 text-right">
                    <span>
                        Terpilih:
                        <strong id="selected-counter">0</strong>
                    </span>
                </div>
            </div>
        </form>

        <hr>

        <!-- TABLE RESULT -->
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th width="40">#</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>Golongan</th>
                        <th>Jabatan</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody id="operator-table-body">
                    <!-- Diisi via JS (AJAX) -->
                </tbody>
            </table>
        </div>

    </div>
</div>

<?= $this->endSection() ?>