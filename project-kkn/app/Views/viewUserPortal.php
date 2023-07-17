<?= $this->extend('layout/portal') ?>

<?= $this->section('title') ?>
<title>Portal Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>PORTAL DESA HANURA</h1>
    </div>

    <!-- CARD -->
    <div class="row">
        <!-- PBB -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>PBB</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url('lamanOverview') ?>" class="btn btn-primary">View</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2 text-muted">Pencatatan PBB Desa Hanura</div>
                    <div class="chocolat-parent">
                        <img href="<?= site_url('lamanOverview') ?>" src="images/logohanura.png" alt="Logo Hanura">
                    </div>
                </div>
            </div>
        </div>
        <!-- UMKM -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>UMKM</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url('lamanOverview') ?>" class="btn btn-primary">View</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2 text-muted">UMKM Desa Hanura</div>
                    <div class="chocolat-parent">
                        <img href="<?= site_url('lamanOverview') ?>" src="images/logohanura.png" alt="Logo Hanura">
                    </div>
                </div>
            </div>
        </div>
        <!-- BUMDES -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Bumdes</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url('lamanOverview') ?>" class="btn btn-primary">View</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2 text-muted">Bumdes Desa Hanura</div>
                    <div class="chocolat-parent">
                        <img href="<?= site_url('lamanOverview') ?>" src="images/logohanura.png" alt="Logo Hanura">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>