<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Data NOP PBB &mdash; PBB Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('daftarNopPbb') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data NOP PBB</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data NOP PBB</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('daftarnoppbb') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>NOP *</label>
                        <input type="text" name="nop" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Tahun *</label>
                        <input type="number" name="tahun" min="1900" max="2099" step="1" value="2023" />
                    </div>
                    <div class="form-group">
                        <label>Nama *</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat *</label>
                        <textarea name="alamat" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Besaran PBB *</label>
                        <input type="text" name="besaran_pbb" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Denda *</label>
                        <input type="text" name="denda" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Status *</label>
                        <select name="status_bayar" id="status">
                            <option value="">--Pilih Status--</option>
                            <option value="1">Sudah Bayar</option>
                            <option value="0">Belum Bayar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Terdata *</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"> Submit</i></button>
                        <button type="reset" class="btn btn-secondary" Reset>Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-import-noppbb">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">NOP PBB DESA HANURA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('noppbb/import') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>File Excel</label>
                    <div class="custom-file">
                        <?= csrf_field() ?>
                        <input type="file" name="file_excel" class="custom-file-input" id="file_excel" required>
                        <label for="file_excel" class="custom-file-label">Pilih File</label>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>