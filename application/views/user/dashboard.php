<div class="main-content">
    <section class="section">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="text-primary"><strong><?= $gelombang; ?> PPDB SMK AL-IRSYAD TEGAL</strong></h3>
                <h6><?= $waktu_mulai; ?> - <?= $waktu_akhir; ?></h6>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-statistic-1">

                        <?php if ($user->jk === NULL || $user->tempat_lahir === NULL || $user->tanggal_lahir === NULL || $user->alamat === NULL || $user->penerima_bantuan === NULL || $user->no_bantuan === NULL || $user->tempat_tinggal === NULL || $user->jenis_pendaftaran === NULL || $user->sekolah_asal === NULL || $user->alamat_sekolah === NULL) : ?>

                            <div class="card-icon bg-danger">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Biodata</h4>
                                </div>
                                <div class="card-body text-danger">
                                    Biodata Belum Lengkap!
                                </div>
                            </div>

                        <?php else : ?>
                            <div class="card-icon bg-success">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Biodata</h4>
                                </div>
                                <div class="card-body">
                                    Biodata Sudah Lengkap
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card-footer bg-whitesmoke">
                            <a href="<?= base_url('user/biodata'); ?>">Lihat Biodata</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-statistic-1">

                        <?php if ($wali->nama_ayah === NULL || $wali->nama_ibu === NULL || $wali->nama_wali === NULL || $wali->no_handphone === NULL || $wali->pendidikan_ayah === NULL || $wali->pendidikan_ibu === NULL || $wali->pekerjaan_ayah === NULL || $wali->pekerjaan_ibu === NULL || $wali->penghasilan_ayah === NULL || $wali->penghasilan_ibu === NULL) : ?>

                            <div class="card-icon bg-danger">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Orang Tua/Wali</h4>
                                </div>
                                <div class="card-body text-danger">
                                    Data Orang Tua/Wali Belum Lengkap!

                                </div>
                            </div>

                        <?php else : ?>
                            <div class="card-icon bg-success">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Orang Tua/Wali</h4>
                                </div>
                                <div class="card-body">
                                    Data Orang Tua/Wali Sudah Lengkap
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card-footer bg-whitesmoke">
                            <a href="<?= base_url('user/wali'); ?>">Lihat Data Orang Tua/Wali</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-statistic-1">

                        <?php if ($berkas->kartu_keluarga == NULL || $berkas->ijazah == NULL || $berkas->akte == NULL) : ?>

                            <div class="card-icon bg-danger">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Berkas</h4>
                                </div>
                                <div class="card-body text-danger">
                                    Data Berkas Belum Lengkap!

                                </div>
                            </div>

                        <?php else : ?>
                            <div class="card-icon bg-success">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Berkas</h4>
                                </div>
                                <div class="card-body">
                                    Data Berkas Sudah Lengkap
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card-footer bg-whitesmoke">
                            <a href="<?= base_url('user/berkas'); ?>">Lihat Data Berkas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>