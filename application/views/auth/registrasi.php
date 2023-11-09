<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="login-brand">
                    <!-- IMAGE HERE -->
                    <img class="img-fluid" src="<?= base_url('assets/img/logo_alir.png'); ?>" width="150" alt="">
                    <h6 class="mt-2">PPDB SMK AL-IRSYAD TEGAL</h6>
                </div>

                <form method="POST" action="<?= base_url('auth/registrasi'); ?>" id="registerForm">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4><strong>Biodata Calon Siswa</strong></h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>NIK Peserta didik<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nik">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama Lengkap<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nomor HP / Whatsapp<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="no_hp">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kompetensi Keahlian<span class="text-danger">*</span></label>
                                <select class="form-control selectric" name="progstudi">
                                    <option value="">-- Pilih Kompetensi Keahlian --</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                    <option value="Akuntansi Keuangan dan Lembaga">Akuntansi Keuangan dan Lembaga</option>
                                </select>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" id="password" class="form-control" name="password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Konfirmasi Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="retype_password">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="btnRegister" class="btn btn-primary btn-lg btn-block">
                                    DAFTAR
                                </button>
                            </div>
                            <div class="text-center" id="spinner" style="display: none;">
                                <div class="spinner-grow" role="status">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="mt-5 text-muted text-center">
                    <div class="alert alert-info">
                        Sudah memiliki akun? <a class="text-dark" href="<?= base_url('auth'); ?>">Login disini</a>
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
    const loginButton = document.getElementById("btnRegister");
    const spinner = document.getElementById("spinner");
    loginButton.addEventListener("click", function() {
        loginButton.style.display = "none";

        spinner.style.display = "block";
    });
</script> -->