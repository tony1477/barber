<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/favicon.png">
  <title>Executive Barber :: <?= lang('Auth.login') ?> </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="<?=base_url()?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?=base_url()?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?=base_url()?>/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <!-- <div class="page-header align-items-start min-vh-100" style="background-image: url('<?=base_url()?>assets/img/EXECUTIVE.jpg');"> -->
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php elseif (session('errors') !== null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php if (is_array(session('errors'))) : ?>
                            <?php foreach (session('errors') as $error) : ?>
                                <?= $error ?>
                                <br>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?= session('errors') ?>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <?php if (session('message') !== null) : ?>
                <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                <?php endif ?>
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0"><?= lang('Auth.login') ?></h4>
                    <!-- <div class="row mt-3">
                        <div class="col-2 text-center ms-auto">
                        <a class="btn btn-link px-3" href="javascript:;">
                            <i class="fa fa-facebook text-white text-lg"></i>
                        </a>
                        </div>
                        <div class="col-2 text-center px-1">
                        <a class="btn btn-link px-3" href="javascript:;">
                            <i class="fa fa-github text-white text-lg"></i>
                        </a>
                        </div>
                        <div class="col-2 text-center me-auto">
                        <a class="btn btn-link px-3" href="javascript:;">
                            <i class="fa fa-google text-white text-lg"></i>
                        </a>
                        </div>
                    </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" class="text-start" action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label" for="floatingEmailInput"></label>
                        <input type="text" name="username" class="form-control" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" id="floatingEmailInput" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="floatingPasswordInput"></label>
                        <input type="password" class="form-control" id="floatingPasswordInput" name="password" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required>
                    </div>

                    <!-- Remember me -->
                    <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                        <div class="form-check form-switch d-flex align-items-center mb-3">
                            <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" <?php if (old('remember')): ?> checked<?php endif ?>>
                            <label class="form-check-label mb-0 ms-3" for="rememberMe"><?= lang('Auth.rememberMe') ?></label>
                        </div>
                    <?php endif; ?>

                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2"><?= lang('Auth.login') ?></button>
                    </div>

                    <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                        <p class="text-center"><?= lang('Auth.forgotPassword') ?> <a href="<?= url_to('magic-link') ?>"><?= lang('Auth.useMagicLink') ?></a></p>
                    <?php endif ?>

                    <?php if (setting('Auth.allowRegistration')) : ?>
                        <p class="mt-4 text-sm text-center">
                            <?= lang('Auth.needAccount') ?>
                            <a href="<?= url_to('register') ?>" class="text-primary text-gradient font-weight-bold"><?= lang('Auth.register') ?></a>
                        </p>
                    <?php endif ?>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-12 col-md-6 my-auto">
                        <div class="copyright text-center text-sm text-white text-lg-start">
                        © 2024, made with <i class="fa fa-heart" aria-hidden="true"></i> by<a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a> for a better web.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
    </main>

  
</body>
</html>
