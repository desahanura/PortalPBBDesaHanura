<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Daftar Dihapus &mdash; PBB Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div>
            <h1>Daftar Permintaan Dihapus</h1>
        </div><br>
        <div class="card m-1">
            <div class="card-header p-1">
                <form action="" method="get" autocomplete="off">
                    <div class="float-left">
                        <input type="text" name="keyword" value="" class="form-control" style="width:250pt" placeholder="Cari Data">
                    </div>
                    <div class="float-right ml-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <div class="dropdown d-inline ml-2">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-file-upload"></i> Import Excel
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item has-icon" href="<?= base_url('Example.xlsx') ?>">
                            <i class="fas fa-file-excel"></i> Download Example</a>
                        <a class="dropdown-item has-icon" href="#" data-toggle="modal" data-target="#modal-import-noppbb">
                            <i class="fas fa-file-import"></i> Upload File</a>
                    </div>
                </div>
            </div>
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
                <h4>Daftar Dihapus PBB Desa Hanura</h4>
                <div class="float-right ml-auto">
                    <a href="<?= site_url('daftardihapus/hapus/') ?>" class="btn btn-info ">Hapus Semua</i></a>
                    <form action="<?= site_url('daftardihapus/hapusPermanen/') ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin hapus semua data ini secara permanen?')">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm">Hapus Permanen Semua</button>
                    </form>
                    <!-- <a href="<?= site_url('daftardihapus/hapus/') ?>" class="btn btn-info">Hapus Semua</a>
                    <form action="<?= site_url('daftardihapus/hapusPermanen/') ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin hapus data ini secara permanen?')">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="<?= site_url('daftardihapus/hapusPermanen/') ?>" class="btn btn-danger">Delete All Permanently</a>
                    </form> -->
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md text-center">
                    <tbody>
                        <tr>
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
                        <?php foreach ($noppbb as $key => $value) : ?>
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
                                    <a href="<?= site_url('daftardihapus/hapus/' . $value->id) ?>" class="btn btn-info btn-sm">Hapus</i></a>
                                    <form action="<?= site_url('daftardihapus/hapusPermanen/' . $value->id) ?>" method="POST" class="d-inline" id="del-<?= $value->id ?>">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm" data-confirm="Hapus Data | Apakah Anda yakin ingin menghapus data ini?" data-confirm-yes="submitDel(<?= $value->id ?>)">Hapus Permanen</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
</section>
<?= $this->endSection() ?>