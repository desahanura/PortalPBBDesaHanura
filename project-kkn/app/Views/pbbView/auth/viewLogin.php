<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login &mdash; Portal PBB</title>

    <link rel="shorcut icon" type="image/png/jpg" href="../images/logohanura.png">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <div>
                            <img alt="Logo Hanura" src="../images/logohanura.png" style="width: 100px">
                        </div>
                        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Portal PBB Desa Hanura</span></h4>
                        <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
                        <!-- Alert -->
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">x</button>
                                    <b>Error !</b>
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- Form Login -->
                        <form method="POST" action="<?= site_url('auth/loginProcess') ?>" class="needs-validation" novalidate="">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your username
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div> -->

                            <div class="form-group text-center">
                                <!-- <a href="auth-forgot-password.html" class="float-left mt-3">
                                    Forgot Password?
                                </a> -->
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>

                            <!-- <div class="mt-5 text-center">
                                Don't have an account? <a href="auth-register.html">Create new one</a>
                            </div> -->
                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; Kantor Desa Hanura.
                            <!-- Made with 💙 by Stisla -->
                            <div class="mt-2">
                                <a href="#">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../images/OFAF.gif">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold text-dark">Selamat Datang</h1>
                                <h5 class="font-weight-normal text-muted-transparent text-dark">Pesawaran, Lampung</h5>
                            </div>
                            <!-- Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>

</body>

</html>