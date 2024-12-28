<?= $this->extend('templates/index') ?>
<?= $this->section('content-index-2') ?>

<div class="form-container w-50" id="loginFormContainer">
    <form class="form" method="post" action="<?= base_url('auth/login'); ?>">
        <?= csrf_field() ?>
        <div class="login-label">Login</div>
        <div class="form-group mt-0">
            <input type="text" class="form-control form-control-user" id="email" placeholder="Email" name="email"
                required autocomplete="email">
        </div>
        <div class="form-group" style="margin-top: 1.2rem;">
            <input type="password" class="form-control form-control-user" id="login-password" placeholder="Password"
                name="password" required autocomplete="current-password">
        </div>
        <div class="form-button">
            <button type="submit" class="btn btn-primary btn-user btn-block cust-btn" name="login">Login</button>
            <div class="text-center">
                <a class="btn btn-primary btn-user btn-block cust-btn" id="toggleRegister" href="#">Register</a>
            </div>
        </div>
        <div class="cust-a2">
            <a class="" href="">Forgot The Password?</a>
        </div>
        <div class="cust-login">
            <a href="google.com"><i class="fa-brands fa-google fa-xl mx-2" style="color: #ff0000;"
                    id="login-icon"></i></a>
            <a href="facebook.com"><i class="fa-brands fa-facebook fa-xl mx-2" style="color: #ff0000;"
                    id="login-icon"></i></a>
            <a href="twitter.com"><i class="fa-brands fa-twitter fa-xl mx-2" style="color: #ff0000;"
                    id="login-icon"></i></a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>