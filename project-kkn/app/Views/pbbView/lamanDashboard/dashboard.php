<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; PBB Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            <?= countData('tb_users') ?>
                        </div>
                    </div>
                </div>
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color: rgba(1, 116, 190);">
                        <i class="fas fa-money-bill"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Uang Sudah Bayar</h4>
                        </div>
                        <div class="card-body"><i>Rp.</i>
                            <?= sumBesaranPbb(1) ?>
                        </div>
                    </div>
                </div>
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color: rgba(255, 227, 130);">
                        <i class="fas fa-money-bill"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Uang Harus di Tagih</h4>
                        </div>
                        <div class="card-body"><i>Rp.</i>
                            <?= sumBesaranPbb(0) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>NOP PBB</h4>
                        </div>
                        <div class="card-body">
                            <?= countData('tb_noppbb') ?>
                        </div>
                    </div>
                </div>
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sudah Bayar</h4>
                        </div>
                        <div class="card-body">
                            <?= countDataSudahBayar('tb_noppbb') ?>
                        </div>
                    </div>
                </div>
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Harus Ditagih</h4>
                        </div>
                        <div class="card-body">
                            <?= countDataHarusDitagih('tb_noppbb') ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($sudahBayarCount == 0 && $belumBayarCount == 0 ) {?>
            <!-- <div class="main-panel"> -->
                <!-- <div class="content-wrapper"> -->
                    <div class="card-wrap col-lg-6 col-md-6 col-sm-6 col-6"> 
                        <div class="col-lg-12 col-md-6 col-sm-12 col-12 ">
                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Status Pembayaran PBB</h4>
                                <p>Belum Ada Data</p>
                            </div>
                            </div>
                        </div>  `                  
                    </div>
                <!-- </div> -->
            <!-- </div> -->
            <?php } else {?>
            <!-- <div class="main-panel">
                <div class="content-wrapper"> -->
                    <div class="card-wrap col-lg-6 col-md-6 col-sm-6 col-6"> 
                        <div class="col-lg-12 col-md-6 col-sm-12 col-12 ">
                            <div class="card" style="height: 360px;">
                            <div class="card-body">
                                <h4 class="card-title"><center>Status Pembayaran PBB</center></h4>
                                <center  class="h-75"><canvas  id="statusBayarChart"></canvas></center>
                            </div>
                            </div>
                        </div>                
                    </div>
                <!-- </div>
            </div> -->
            <?php }?>  
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
            

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
    var ctx = document.getElementById('statusBayarChart').getContext('2d');
    var belumBayarCount = <?= $belumBayarCount ?>;
    var sudahBayarCount = <?= $sudahBayarCount ?>;
    var totalData = belumBayarCount + sudahBayarCount;

    // Calculate the percentage
    var belumBayarPercentage = (belumBayarCount / totalData) * 100;
    var sudahBayarPercentage = (sudahBayarCount / totalData) * 100;

    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Belum Bayar (%)', 'Sudah Bayar (%)'],
            datasets: [{
                data: [belumBayarPercentage.toFixed(2), sudahBayarPercentage.toFixed(2)],
                backgroundColor: ['rgba(255, 227, 130)',  'rgba(1, 116, 190)'],
            }],
        },
        options: {
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var dataset = data.datasets[tooltipItem.datasetIndex];
                        var labels = data.labels[tooltipItem.index];
                        var currentValue = dataset.data[tooltipItem.index];
                        return labels + " : " + currentValue.toFixed(2) + "%";
                    }
                }
            }
        }
    });
</script>


    <!-- Bootstrap JS and Popper.js (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    </div>
</section>
<?= $this->endSection() ?>