<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Data NOP PBB &mdash; PBB Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('daftarNopPbb') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Data NOP PBB</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data NOP PBB</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('daftarnoppbb/' . $noppbb->id) ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <!-- <input type="hidden" name="_method" value="PUT"> -->
                    <div class="form-group">
                        <label>NOP *</label>
                        <input type="text" name="nop" value="<?= $noppbb->nop ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun *</label>
                        <input type="number" name="tahun" value="<?= $noppbb->tahun ?>" min=" 1900" max="2099" step="1" value="2016" />
                    </div>
                    <div class="form-group">
                        <label>Nama *</label>
                        <input type="text" name="nama" value="<?= $noppbb->nama ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat *</label>
                        <textarea name="alamat" cols="30" rows="10" class="form-control" required><?= $noppbb->alamat ?></textarea><br>
                        <select name="dusun">
                            <option value="Dusun A" class="form-control">Dusun A</option>
                            <option value="Dusun B" class="form-control">Dusun B</option>
                            <option value="Dusun C" class="form-control">Dusun C</option>
                            <option value="Dusun D" class="form-control">Dusun D</option>
                        </select>
                        <select name="rt">
                            <option value="1" class="form-control">RT 1</option>
                            <option value="2" class="form-control">RT 2</option>
                            <option value="3" class="form-control">RT 3</option>
                            <option value="4" class="form-control">RT 4</option>
                            <option value="5" class="form-control">RT 5</option>
                            <option value="6" class="form-control">RT 6</option>
                            <option value="7" class="form-control">RT 7</option>
                            <option value="8" class="form-control">RT 8</option>
                            <option value="9" class="form-control">RT 9</option>
                            <option value="10" class="form-control">RT 10</option>
                        </select>
                        <select name="rw">
                            <option value="A" class="form-control">RW A</option>
                            <option value="B" class="form-control">RW B</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Besaran PBB *</label>
                        <input type="text" name="besaran_pbb" value="<?= $noppbb->besaran_pbb ?>" class="form-control" pattern="\d+(\.\d{1,2})?" title="Enter a valid numeric value" required>
                    </div>
                    <div class="form-group">
                        <label>Denda *</label>
                        <input type="text" name="denda" value="<?= $noppbb->denda ?>" class="form-control" pattern="\d+(\.\d{1,2})?" title="Enter a valid numeric value" required>
                    </div>
                    <div class="form-group">
                        <label>Status *</label>
                        <select name="status_bayar" id="status">
                            <option value="1" <?php echo ($noppbb->status_bayar == "1") ? 'selected' : ''; ?>>Sudah Bayar</option>
                            <option value="0" <?php echo ($noppbb->status_bayar == "0") ? 'selected' : ''; ?>>Belum Bayar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pajak *</label>
                        <select name="jenis_pajak">
                            <option value="1" <?php echo ($noppbb->jenis_pajak == "1") ? 'selected' : ''; ?>>Ditemukan</option>
                            <option value="0" <?php echo ($noppbb->jenis_pajak == "0") ? 'selected' : ''; ?>>Tidak Ditemukan</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Terdata *</label>
                        <input type="DATETIME" name="tanggal" value="<?= $noppbb->tanggal ?>" class="form-control" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"> Save </i></button>
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