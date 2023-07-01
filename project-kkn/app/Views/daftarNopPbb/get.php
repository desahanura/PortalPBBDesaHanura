<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Daftar NOP PBB &mdash; PBB Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Daftar NOP PBB</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Berikut Daftar Seluruh Objek Pajak PBB Desa Hanura</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>NOP</th>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Besaran PBB</th>
                            <th>Denda</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($tb_noppbb as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->nop ?></td>
                                <td><?= $value->tahun ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->alamat ?></td>
                                <td><?= $value->besaranPBB ?></td>
                                <td><?= $value->denda ?></td>
                                <td><?= $value->tanggal ?></td>
                                <td class="text-center" style="width:15%">
                                    <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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