<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Daftar SPPT Tidak ditemukan &mdash; PBB Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div>
            <h1>Daftar SPPT Tidak Ditemukan</h1>
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

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Daftar SPPT Tidak Ditemukan PBB Desa Hanura</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Objek Pajak (NOP)</th>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th>Alamat Wajib Pajak dan Objek Pajak</th>
                            <th>Besaran PBB</th>
                            <th>Denda</th>
                            <th>Tanggal Terdata</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
</section>
<?= $this->endSection() ?>