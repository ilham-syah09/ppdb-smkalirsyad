<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <!-- IMAGE HERE -->
                    <img class="img-fluid" src="<?= base_url('assets/img/logo_alir.png'); ?>" width="150" alt="">
                    <h6 class="mt-2">PPDB SMK AL-IRSYAD TEGAL</h6>
                </div>

                <div class="card card-primary">
                    <div class="text-center card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?= base_url('auth/proses'); ?>" id="loginForm">
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email" class="form-control" name="email">
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label class="control-label">Password</label>
                                    <div class="float-right">
                                        <a href="<?= base_url('auth/forgotPassword'); ?>" class="text-small">
                                            Lupa kata sandi?
                                        </a>
                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control hide-pass" name="password">
                            </div>


                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input show-pass" tabindex="3" id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Show Password</label>
                                </div>
                            </div>
                            <button type="submit" id="btnLogin" class="btn btn-primary btn-block">Login</button>

                            <div class="text-center" id="spinner" style="display: none;">
                                <div class="spinner-grow" role="status">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-5 text-muted text-center">
                    <div class="alert alert-info">
                        Belum memiliki akun? <a class="text-dark" href="<?= base_url('auth/registrasi'); ?>">Registrasi disini</a>
                    </div>
                </div>

                <div class="simple-footer">
                    Copyright &copy; 2023 <div class="bullet"></div> <a href="https://instagram.com/ilhaamm.syh" target="_blank">Ilham Syah</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <script>
    const loginButton = document.getElementById("btnLogin");
    const spinner = document.getElementById("spinner");
    loginButton.addEventListener("click", function() {
        loginButton.style.display = "none";

        spinner.style.display = "block";
    });
</script> -->