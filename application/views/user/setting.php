<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Atur Ulang Kata Sandi</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('user/setting/changePassword'); ?>" method="post">
                                <div class="row">
                                    <div class="form-group col-md">
                                        <label>Kata sandi saat ini <span class="text-danger">(*)</span></label>
                                        <input type="password" name="current_password" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md">
                                        <label>Kata sandi saat baru <span class="text-danger">(*)</span></label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md">
                                        <label>Ketik ulang kata sandi saat baru <span class="text-danger">(*)</span></label>
                                        <input type="password" name="retype_password" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>