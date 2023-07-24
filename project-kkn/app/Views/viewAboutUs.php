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
                    <i>Tim IT KKN Unila Periode II Tahun 2023 Desa Hanura</i>
                    <!-- foto -->
                    <div class="row">
                        <div class="col">
                            <img src="images/contributor/contributor_aniisah.png" alt="contributor" style="max-width: 200px;">
                        </div>
                        <div class="col">
                            <img src="images/contributor/contributor_aniisah.png" alt="contributor" style="max-width: 200px;">
                        </div>
                        <div class="col">
                            <img src="images/contributor/contributor_aniisah.png" alt="contributor" style="max-width: 200px;">
                        </div>
                    </div>
                    <!-- nama -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">Aniisah Mufiidah Suharso</div>
                        </div>
                        <div class="col">
                            <div class="mb-2">Ages Mahesa</div>
                        </div>
                        <div class="col">
                            <div class="mb-2">Aura Husnaini Putri Zaidani</div>
                        </div>
                    </div>
                    <!-- npm -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">2017051012</div>
                        </div>
                        <div class="col">
                            <div class="mb-2">2017051027</div>
                        </div>
                        <div class="col">
                            <div class="mb-2">2017051045</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>