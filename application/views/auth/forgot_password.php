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
                        <h4>Lupa Kata Sandi</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?= base_url('auth/forgotPassword'); ?>" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Email harus diisi!
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                            <hr>
                            <p class="text-center">Kembali ke halaman <a href="<?= base_url('auth'); ?>">Login</a></p>
                        </form>
                    </div>
                </div>

                <div class="simple-footer">
                    Copyright &copy; 2023 <div class="bullet"></div> <a href="https://instagram.com/ilhaamm.syh" target="_blank">Ilham Syah</a>
                </div>
            </div>
        </div>
    </div>
</section>