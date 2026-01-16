<?= $this->extend('layout/operator/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Search -->
    <form id="searchForm" onsubmit="return false;">
        <div class="row mb-2">
            <div class="col-md-6">
                <input id="keyword" class="form-control" placeholder="Cari nama / NIP guru">
            </div>
            <div class="col-md-6 text-right">
                <button id="btnSearch" type="button" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    <!-- Action -->
    <div class="row mb-2">
        <div class="col-md-6">
            <button id="btnTampilkanTerpilih" type="button" class="btn btn-success">
                Tampilkan Terpilih
            </button>
            <span class="ml-2">Terpilih: <b id="selectedCount">0</b></span>
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table id="guruTable" class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th width="40">Pilih</th>
                    <th>Nama Lengkap</th>
                    <th>NIP</th>
                    <th>Golongan</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody id="guruTableBody">
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Silakan lakukan pencarian
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<script>
    const BASE_URL = "<?= base_url() ?>";
</script>
<script src="<?= base_url('assets/js/clipboard.js') ?>"></script>
<script src="<?= base_url('assets/js/operator-table.js') ?>"></script>

<?= $this->endSection() ?>