<body>
    <?php helper('form'); ?>
    <div id="app">
        <section class="section">
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand d-flex mb-3" style="align-items: center; justify-content: center;">
                            <img src="<?= base_url('assets/img/logo.png') ?>" alt="" width="100" class="shadow-light rounded-circle">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header" style="text-align: center;">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <?php if (isset($validation) && $validation->getErrors()): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                                <?php endif; ?>
                                <?= session()->getFlashdata('pesan'); ?>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="username">username</label>
                                        <input id="username" type="text" class="form-control" name="username"
                                            tabindex="1" autofocus style="border-radius: 20px !important;" required>
                                        <small
                                            class="muted text-danger"><?= $validation->getError('username'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" style="border-radius: 20px !important;" required>
                                        <small
                                            class="muted text-danger"><?= $validation->getError('password'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4"
                                            style="border-radius: 25px;">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <div class="text-muted text-center">
                                    Don't have an account? <a href="<?= base_url('auth/daftar') ?>">Create One</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>