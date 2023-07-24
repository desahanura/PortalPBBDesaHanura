<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Daftar Sudah Bayar &mdash; PBB Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <form action="daftarnoppbb/belumBayar" method="post">
        <?= csrf_field() ?>
        <div class="section-header">
            <div>
                <h1>Daftar Sudah Bayar</h1>
            </div>
            <div class="section-header-button">
                <button class="btn btn-success">Tandai Belum Bayar</button>
            </div>
            <div class="card m-1">
                <div class="card-header p-1">
                    <!-- <form action="" method="get" autocomplete="off">
                        <div class="float-left">
                            <input type="text" name="keyword" value="" class="form-control" style="width:250pt" placeholder="Cari Data">
                        </div>
                        <div class="float-right ml-2">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </form> -->
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

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Error !</b>
                    <?= session()->getFlashdata('error') ?>
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
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Sudah Bayar PBB Desa Hanura</h4>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($noppbb as $key => $value) : ?>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox<?= $key ?>" name="checkbox[]" value="<?= $value->id ?>">
                                            <label class="custom-control-label" for="checkbox<?= $key ?>"></label>
                                        </div>
                                    </td>
                                    <td><?= $key + 1 ?></td>
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
                                    <td class="text-center" style=" width:15%">
                                        <a href="<?= site_url('daftarnoppbb/edit/' . $value->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?= site_url('daftarnoppbb/delete/' . $value->id) ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin hapus data ini?')">
                                            <?= csrf_field() ?>
                                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</section>
<?= $this->endSection() ?>