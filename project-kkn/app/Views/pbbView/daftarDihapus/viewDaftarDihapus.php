<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Daftar Permintaan Dihapus &mdash; PBB Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div>
            <h1>Daftar Permintaan Dihapus</h1>
        </div>
    </div>
    <?php if (session()->getFlashData('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo session()->getFlashData('success'); ?>
        </div>
    <?php endif; ?>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Permintaan Dihapus PBB Desa Hanura</h4>
                <div class="float-right ml-auto">
                    <div class="d-inline ml-2">
                        <a href="<?= site_url('daftardihapus/hapus/') ?>" class="btn btn-info ">Hapus Semua</i></a>
                    </div>
                    <div class="d-inline ml-2">
                        <form action="<?= site_url('daftardihapus/hapusPermanen/') ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin hapus semua data ini secara permanen?')">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm">Hapus Permanen Semua</button>
                        </form>
                    </div>
                    <!-- <a href="<?= site_url('daftardihapus/hapus/') ?>" class="btn btn-info">Hapus Semua</a>
                    <form action="<?= site_url('daftardihapus/hapusPermanen/') ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin hapus data ini secara permanen?')">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="<?= site_url('daftardihapus/hapusPermanen/') ?>" class="btn btn-danger">Delete All Permanently</a>
                    </form> -->
                    <div class="d-inline ml-2">
                        <a href="<?= site_url('daftarDihapus/export') ?>" class="btn btn-primary">
                            <i class="fas fa-file-download"></i> Export Excel
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="table1">
                    <thead>
                        <tr class="text-center">
                            <th>Select</th>
                            <th>No.</th>
                            <th>Nomor Objek Pajak (NOP)</th>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th>Alamat Wajib Pajak dan Objek Pajak</th>
                            <th>Besaran PBB</th>
                            <th>Denda</th>
                            <th>Tanggal Terdata</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($noppbb as $key => $value) : ?>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox<?= $key ?>" name="checkbox<?= $key ?>">
                                        <label class="custom-control-label" for="checkbox<?= $key ?>"></label>
                                    </div>
                                </td>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->nop ?></td>
                                <td><?= $value->tahun ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->alamat ?></td>
                                <td><?= $value->besaran_pbb ?></td>
                                <td><?= $value->denda ?></td>
                                <td width=15%><?= $value->tanggal ?></td>
                                <td>
                                    <?php if ($value->status_bayar == "1") {
                                        echo "<p style='color:green;'>Sudah Bayar</p>";
                                    } else {
                                        echo "<p style='color:red;'>Belum Bayar</p>";
                                    } ?>
                                </td>
                                <td class="text-center" style=" width:15%">
                                    <a href="<?= site_url('daftardihapus/hapus/' . $value->id) ?>" class="btn btn-info btn-sm">Pulihkan</i></a>
                                    <form action="<?= site_url('daftardihapus/hapusPermanen/' . $value->id) ?>" method="POST" class="d-inline" id="del-<?= $value->id ?>">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm" data-confirm="Hapus Data | Apakah Anda yakin ingin menghapus data ini?" data-confirm-yes="submitDel(<?= $value->id ?>)">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>