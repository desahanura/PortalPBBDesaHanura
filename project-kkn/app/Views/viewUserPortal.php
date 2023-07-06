<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal Desa Hanura</title>
</head>

<body>
    <div>
        <h1>Portal Desa Hanura</h1>
    </div>
    <div>
        <button type="button" onclick="location.href=''">PBB</button>
    </div>
</body>

</html> -->

<?= $this->extend('layout/portal') ?>

<?= $this->section('title') ?>
<title>Portal Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>PORTAL DESA HANURA</h1>
    </div>

    <!-- <div class="section-body">
        <h1>Ini Portal</h1>
        <a href="<?= site_url('lamanOverview') ?>">PBB</a>
    </div> -->
</section>
<?= $this->endSection() ?>