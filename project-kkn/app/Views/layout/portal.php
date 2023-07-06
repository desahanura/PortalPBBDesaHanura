<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <?= $this->renderSection('title') ?>

    <!-- General CSS Files -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body class="sidebar-mini">
    <script id="__bs_script__">
        //<![CDATA[
        document.write("<script async src='/browser-sync/browser-sync-client.js?v=2.27.10'><\/script>".replace("HOST", location.hostname));
        //]]>
    </script>

    <div id="app">
        <div class="main-wrapper">
            <!-- NAVBAR -->
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="navbar-nav mr-auto">
                    <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Copyright</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="navbar-nav navbar-right">
                    <img alt="Logo Hanura" src="images/logohanura.png" width="30px">
                </ul>
            </nav>

            <!-- SIDEBAR -->
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= site_url() ?>">Portal Desa Hanura</a>
                        <div>
                            <img alt="Logo Hanura" src="images/logohanura.png" style="width: 100px">
                        </div>
                        &nbsp;
                    </div>
                    <ul class="sidebar-menu">
                        <?= $this->include('layout/portalMenu'); ?>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?= $this->renderSection('content') ?>

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
            </div>

            <!-- FOOTER -->
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> Developed By <a href="">Tim IT KKN Desa Hanura Unila Periode 2</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>