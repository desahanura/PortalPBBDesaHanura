<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Daftar Objek Pajak Tidak ditemukan &mdash; PBB Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div>
            <h1>Daftar Objek Pajak dan Wajib Pajak Tidak Ditemukan</h1>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Objek Pajak dan Wajib Pajak Tidak Ditemukan PBB Desa Hanura</h4>
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
                            <th>Status WP/OP</th>
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
                                    <td>
                                        <?php if ($value->jenis_pajak == "1") {
                                            echo "<p style='color:green;'>Ditemukan</p>";
                                        } else {
                                            echo "<p style='color:red;'>Tidak Ditemukan</p>";
                                        } ?>
                                    </td>
                                    <td class="text-center" style=" width:15%">
                                        <a href="<?= site_url('daftarnoppbb/edit/' . $value->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?= site_url('daftarnoppbb/delete/' . $value->id) ?>" method="POST" class="d-inline" id="del-<?= $value->id ?>">
                                            <?= csrf_field() ?>
                                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                            <button class="btn btn-danger btn-sm" data-confirm="Hapus Data | Apakah Anda yakin ingin menghapus data ini?" data-confirm-yes="submitDel(<?= $value->id ?>)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                </table>
            </div>
</section>
<?= $this->endSection() ?>