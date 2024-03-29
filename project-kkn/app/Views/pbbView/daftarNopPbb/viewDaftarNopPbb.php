<!DOCTYPE html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

</html>
<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Daftar NOP PBB &mdash; PBB Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div>
            <h1>Daftar NOP PBB</h1>
        </div>
        <!-- <div class="section-header-button">
            <input class="btnSudahBayar btn btn-success" type="submit" form="sudahBayar" value="Sudah Bayar"></input>
        </div> -->
    </div>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-warning alert-dismissible show fade">
    <div class="alert-body">
        <!-- <b>Error !</b> -->
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn btn-success"><a href="<?= site_url('daftarDihapus/') ?>" class="ms-auto">Klik Pulihkan</a></button>
    </div>
</div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <form action="" method="post">
            <?= csrf_field() ?>
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Seluruh Objek Pajak PBB Desa Hanura</h4>
                    <div class="float-right ml-auto">
                        <div class="d-inline ml-2">
                            <a href="<?= site_url('daftarnoppbb/add') ?>" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <!-- <div class="d-inline ml-2">
                            <button class="btn btn-success">Tandai Tidak Ditemukan</button>
                        </div>
                        <div class="d-inline ml-2">
                            <button class="btn btn-success">Tandai Ingin Dihapus</button>
                        </div> -->
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
                        <div class="d-inline ml-2">
                            <a href="<?= site_url('noppbb/export') ?>" class="btn btn-primary">
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
                                <th>Alamat Wajib</th>
                                <th>Besaran PBB</th>
                                <th>Denda</th>
                                <th>Tanggal Terdata</th>
                                <th>Status</th>
                                <th>Status WP/OP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <form action="daftarnoppbb/sudahBayar" method="post" id="sudahBayar"> -->
                            <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 + (10 * ($page - 1));
                            foreach ($noppbb as $key => $value) : ?>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox<?= $key ?>" name="checkbox[]" value="<?= $value->id ?>">
                                            <label class="custom-control-label" for="checkbox<?= $key ?>"></label>
                                        </div>
                                        
                                    </td>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nop ?></td>
                                    <td><?= $value->tahun ?></td>
                                    <td><?= $value->nama ?></td>
                                    <td width=45%><?= $value->alamat ?></td>
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
                                    <td>
                                        <?php if ($value->jenis_pajak == "1") {
                                            echo "<p style='color:green;'>Ditemukan</p>";
                                        } else {
                                            echo "<p style='color:red;'>Tidak Ditemukan</p>";
                                        } ?>
                                    </td>
                                    <td class="text-center" style=" width:15%">
                                        <a href="<?= site_url('daftarnoppbb/edit/' . $value->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?= base_url('daftarnoppbb/delete/' . $value->id) ?>" method="POST" class="d-inline" id="del-<?= $value->id ?>">
                                            <?= csrf_field() ?>
                                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                            <button class="btn btn-danger btn-sm" data-confirm="Hapus Data | Apakah Anda yakin ingin menghapus data ini?" data-confirm-yes="submitDel(<?= $value->id ?>)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- </form> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
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