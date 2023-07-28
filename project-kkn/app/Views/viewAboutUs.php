<?= $this->extend('layout/portal') ?>

<?= $this->section('title') ?>
<title>About Us - Portal Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>About Us</h1>
    </div>

    <!-- CARD -->
    <div class="row">
        <!-- Contributor -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Contributor</h4>
                </div>
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        <b>Version 1.0</b><br>
                        <a>Tim IT KKN Unila Periode II Tahun 2023 Desa Hanura</a>
                        <br><br>
                        <i>- 26 Juli 2023 s.d. 4 Agustus 2023 -</i>
                    </div>
                    <div style="justify-content: space-between;">
                        <!-- biodata -->
                        <div class="row">
                            <div class="col card" style="margin: 20px; align-items: center; padding: 30px; border-radius: 10px;">
                                <img src="images/contributor/contributor_aniisah_circle.png" alt="contributor" style="max-width: 200px; margin-bottom: 30px;">
                                <b style="margin-bottom: 20px; color: #6777ef">Aniisah Mufiidah Suharso</b>
                                <a>2017051012</a>
                                <a>S1 Ilmu Komputer</a>
                                <a>FMIPA Universitas Lampung</a>
                            </div>
                            <div class="col card" style="margin: 20px; align-items: center; padding: 30px; border-radius: 10px;">
                                <img src="images/contributor/contributor_ages_circle.png" alt="contributor" style="max-width: 200px; margin-bottom: 30px;">
                                <b style="margin-bottom: 20px; color: #6777ef">Ages Mahesa</b>
                                <a>2017051027</a>
                                <a>S1 Ilmu Komputer</a>
                                <a>FMIPA Universitas Lampung</a>
                            </div>
                            <div class="col card" style="margin: 20px; align-items: center; padding: 30px; border-radius: 10px;">
                                <img src="images/contributor/contributor_aura_circle.png" alt="contributor" style="max-width: 200px; margin-bottom: 30px;">
                                <b style="margin-bottom: 20px; color: #6777ef">Aura Husnaini Putri Zaidani</b>
                                <a>2017051045</a>
                                <a>S1 Ilmu Komputer</a>
                                <a>FMIPA Universitas Lampung</a>
                            </div>
                        </div>
                    </div>
                    <!-- fitur yang dikembangkan -->
                    <div style="margin-top: 10px;">
                        <b>Fitur yang Dikembangkan</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>