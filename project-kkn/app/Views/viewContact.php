<?= $this->extend('layout/portal') ?>

<?= $this->section('title') ?>
<title>Contact &mdash; Portal Desa Hanura</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Contact</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-center">
                        <h4>OUR MAIN OFFICE</h4>
                    </div>
                    <div class="card-body d-flex justify-content-center text-center">
                        <p>Jl. Jendral Ahmad Yani No 27
                            Kecamatan Teluk Pandan Kabupaten Pesawaran Provinsi Lampung
                            Kode Pos 35454</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-center">
                        <h4>PHONE NUMBER</h4>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <p>0811177613</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-center">
                        <h4>SOCIAL MEDIA</h4>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <a href="https://www.instagram.com/desahanuraofficial/" class="mr-1"><img src="\images\instagram.png" alt="instagram" style="max-width: 40px; margin-bottom: 30px;"></a>
                        <a href="https://web.facebook.com/Trans-AD-2-Desa-Hanura-101663045327686/?ref=page_internal" class="mr-1"><img src="\images\facebook.png" alt="facebook" style="max-width: 40px; margin-bottom: 30px;"></a>
                        <a href="https://www.youtube.com/channel/UCQC1notylNYPOOv8dkezS4w/featured" class="mr-1"><img src="\images\youtube.png" alt="youtube" style="max-width: 40px; margin-bottom: 30px;"></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-primary d-flex justify-content-center">
                    <div class="card-header">
                        <h4>EMAIL</h4>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <p>admin@desahanura.id</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>