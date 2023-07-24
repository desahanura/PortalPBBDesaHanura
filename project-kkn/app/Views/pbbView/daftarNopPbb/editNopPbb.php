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
                        <textarea name="alamat" cols="30" rows="10" class="form-control" required><?= $noppbb->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Besaran PBB *</label>
                        <input type="text" name="besaran_pbb" value="<?= $noppbb->besaran_pbb ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Denda *</label>
                        <input type="text" name="denda" value="<?= $noppbb->denda ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Status *</label>
                        <select name="status_bayar" id="status">
                            <option value="<?= $noppbb->status_bayar ?>"><?php if ($noppbb->status_bayar == "0") {
                                                                                echo "Belum Bayar";
                                                                            } else {
                                                                                echo "Sudah Bayar";
                                                                            } ?></option>
                            <option value="<?= !$noppbb->status_bayar ?>"><?php if (!$noppbb->status_bayar == "0") {
                                                                                echo "Belum Bayar";
                                                                            } else {
                                                                                echo "Sudah Bayar";
                                                                            } ?></option>
                            <!-- <option value="">--Pilih Status--</option> -->
                            <!-- <option value="1">Sudah Bayar</option>
                            <option value="0">Belum Bayar</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Terdata *</label>
                        <input type="date" name="tanggal" value="<?= $noppbb->tanggal ?>" class="form-control" required>
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