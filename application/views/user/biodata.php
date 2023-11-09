<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i> Edit Biodata</button>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalUpload"><i class="fas fa-upload"></i> Upload Foto</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url('uploads/profile/' . $this->dt_user->image); ?>" class="img-fluid mb-5" style="width: 400px; height: 400px;" alt="">
                        </div>
                        <div class="col-md-8 table-responsive">
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table border="0" width="80%" style="padding-left: 2px; padding-right: 13px;">
                                                <tbody>
                                                    <h5><strong>Biodata Calon Peserta Didik</strong></h5>
                                                    <tr>
                                                        <td width="25%">Nama</td>
                                                        <td width="2%">:</td>
                                                        <td style="color: rgb(118, 157, 29); font-weight:bold"><?= $this->dt_user->name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>:</td>
                                                        <td><?= $user->jk; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat Lahir</td>
                                                        <td>:</td>
                                                        <td><?= $user->tempat_lahir; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Lahir</td>
                                                        <td>:</td>
                                                        <td><?= ($user->tanggal_lahir == NULL) ? '' : date('d-m-Y', strtotime($user->tanggal_lahir)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td><?= $user->alamat; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>:</td>
                                                        <td><?= $this->dt_user->email; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Penerima Bantuan</td>
                                                        <td>:</td>
                                                        <td><?= ($user->penerima_bantuan == NULL) ? '-' : $user->penerima_bantuan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Bantuan</td>
                                                        <td>:</td>
                                                        <td><?= ($user->no_bantuan == NULL) ? '-' : $user->no_bantuan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Pendaftaran</td>
                                                        <td>:</td>
                                                        <td><?= $user->jenis_pendaftaran; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat Tinggal</td>
                                                        <td>:</td>
                                                        <td><?= $user->tempat_tinggal; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No Hp/Whatsapp</td>
                                                        <td>:</td>
                                                        <td><?= $user->no_hp; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sekolah Asal</td>
                                                        <td>:</td>
                                                        <td><?= $user->sekolah_asal; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Sekolah</td>
                                                        <td>:</td>
                                                        <td><?= $user->alamat_sekolah; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Studi</td>
                                                        <td>:</td>
                                                        <td><?= $user->progstudi; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- modal edit biodata -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulir Biodata Calon Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/biodata/updateBiodata'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="nik" value="<?= $user->nik; ?>" required>
                                <small>NIK dapat dilihat di Kartu Keluarga</small>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="<?= $this->dt_user->name; ?>" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group" id="jk">
                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6 col-sm-2">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk" value="Laki-laki" <?= ($user->jk == 'Laki-laki') ? 'checked' : ''; ?> id="lk">
                                            <label>
                                                Laki-laki
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-2">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk" value="Perempuan" <?= ($user->jk == 'Perempuan') ? 'checked' : ''; ?> id="pr">
                                            <label>
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= $user->tempat_lahir; ?>" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal Lahir<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="<?= $user->tanggal_lahir; ?>" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat<span class="text-danger">*</span></label>
                        <textarea name="alamat" class="form-control" required><?= $user->alamat; ?></textarea>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penerima Bantuan</label>
                                <select class="form-control selectric" name="penerima_bantuan">
                                    <option value="">-- Pilih Penerima Bantuan --</option>
                                    <option value="KPS" <?= ($user->penerima_bantuan == 'KPS') ? 'selected' : '' ?>>KPS</option>
                                    <option value="KIP" <?= ($user->penerima_bantuan == 'KIP') ? 'selected' : '' ?>>KIP</option>
                                    <option value="KKS" <?= ($user->penerima_bantuan == 'KKS') ? 'selected' : '' ?>>KKS</option>
                                    <option value="PKH" <?= ($user->penerima_bantuan == 'PKH') ? 'selected' : '' ?>>PKH</option>
                                </select>
                                <small class="text-warning">kosongkan jika bukan penerima bantuan</small>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Bantuan</label>
                                <input type="text" class="form-control" name="no_bantuan" value="<?= $user->no_bantuan; ?>">
                                <small class="text-warning">kosongkan jika bukan penerima bantuan</small>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Pendaftaran<span class="text-danger">*</span></label>
                                <select class="form-control selectric" name="jenis_pendaftaran">
                                    <option>-- Pilih Jenis Pendaftaran --</option>
                                    <option value="Siswa Baru" <?= ($user->jenis_pendaftaran == 'Siswa Baru') ? 'selected' : '' ?>>Siswa Baru</option>
                                    <option value="Pindahan" <?= ($user->jenis_pendaftaran == 'Pindahan') ? 'selected' : '' ?>>Pindahan</option>
                                </select>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Tinggal<span class="text-danger">*</span></label>
                                <select class="form-control selectric" name="tempat_tinggal">
                                    <option>-- Pilih Tempat Tinggal --</option>
                                    <option value="Bersama orang tua" <?= ($user->tempat_tinggal == 'Bersama orang tua') ? 'selected' : '' ?>>Bersama orang tua</option>
                                    <option value="Bersama wali" <?= ($user->tempat_tinggal == 'Bersama wali') ? 'selected' : '' ?>>Bersama wali</option>
                                    <option value="Kontrak/Kos" <?= ($user->tempat_tinggal == 'Kontrak/Kos') ? 'selected' : '' ?>>Kontrak/Kos</option>
                                    <option value="Asrama" <?= ($user->tempat_tinggal == 'Asrama') ? 'selected' : '' ?>>Asrama</option>
                                    <option value="Panti Asuhan" <?= ($user->tempat_tinggal == 'Panti Asuhan') ? 'selected' : '' ?>>Panti Asuhan</option>
                                    <option value="Lainya" <?= ($user->tempat_tinggal == 'Lainya') ? 'selected' : '' ?>>Lainya</option>
                                </select>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Handphone/Whatsapp<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="no_hp" value="<?= $user->no_hp; ?>">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sekolah Asal<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="sekolah_asal" value="<?= $user->sekolah_asal; ?>">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat Sekolah Asal<span class="text-danger">*</span></label>
                        <textarea name="alamat_sekolah" class="form-control" required><?= $user->alamat_sekolah; ?></textarea>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kompetensi Keahlian<span class="text-danger">*</span></label>
                        <select class="form-control selectric" name="progstudi" required>
                            <option>-- Pilih Kompetensi Keahlian --</option>
                            <option value="Rekayasa Perangkat Lunak" <?= ($user->progstudi == 'Rekayasa Perangkat Lunak') ? 'selected' : '' ?>>Rekayasa Perangkat Lunak</option>
                            <option value="Teknik Komputer dan Jaringan" <?= ($user->progstudi == 'Teknik Komputer dan Jaringan') ? 'selected' : '' ?>>Teknik Komputer dan Jaringan</option>
                            <option value="Akuntansi Keuangan dan Lembaga" <?= ($user->progstudi == 'Akuntansi Keuangan dan Lembaga') ? 'selected' : '' ?>>Akuntansi Keuangan dan Lembaga</option>
                        </select>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- modal edit biodata -->
<div class="modal fade" id="modalUpload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Unggah Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/biodata/uploadFoto'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Foto <span class="text-info">(format foto jpg/png/jpeg)</span></label>
                                <input type="file" class="form-control" name="image">
                                <small class="text-danger">Ukuran file maksimal 2 MB</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>