<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i> EDIT</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md table-responsive">
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table border="0" width="80%" style="padding-left: 2px; padding-right: 13px;">
                                                <tbody>
                                                    <h5><strong>Biodata Orang/Tua Wali</strong></h5>

                                                    <tr>
                                                        <td width="25%">Nama Ayah</td>
                                                        <td width="2%">:</td>
                                                        <td><?= $wali->nama_ayah; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIK Ayah</td>
                                                        <td>:</td>
                                                        <td><?= $wali->nik_ayah; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ibu</td>
                                                        <td>:</td>
                                                        <td><?= $wali->nama_ibu; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIK Ibu</td>
                                                        <td>:</td>
                                                        <td><?= $wali->nik_ibu; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Wali</td>
                                                        <td>:</td>
                                                        <td><?= $wali->nama_wali; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIK Wali</td>
                                                        <td>:</td>
                                                        <td><?= $wali->nik_wali; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No Hp/Whatsapp</td>
                                                        <td>:</td>
                                                        <td><?= $wali->no_handphone; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pendidikan Ayah</td>
                                                        <td>:</td>
                                                        <td><?= $wali->pendidikan_ayah; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pendidikan Ibu</td>
                                                        <td>:</td>
                                                        <td><?= $wali->pendidikan_ibu; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pekerjaan Ayah</td>
                                                        <td>:</td>
                                                        <td><?= $wali->pekerjaan_ayah; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pekerjaan Ibu</td>
                                                        <td>:</td>
                                                        <td><?= $wali->pekerjaan_ibu; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Penghasilan Ayah</td>
                                                        <td>:</td>
                                                        <td><?= $wali->penghasilan_ayah; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Penghasilan Ibu</td>
                                                        <td>:</td>
                                                        <td><?= $wali->penghasilan_ibu; ?></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Formulir Orang Tua/Wali</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/wali/updateWali'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Ayah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_ayah" value="<?= $wali->nama_ayah; ?>" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Ibu<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_ibu" value="<?= $wali->nama_ibu; ?>" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Wali</label>
                                <input type="text" class="form-control" name="nama_wali" value="<?= $wali->nama_wali; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIK Ayah <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="nik_ayah" value="<?= $wali->nik_ayah; ?>" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIK Ibu <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="nik_ibu" value="<?= $wali->nik_ibu; ?>" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIK Wali</label>
                                <input type="number" class="form-control" name="nik_wali" value="<?= $wali->nik_wali; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No Hp/Whatsapp <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="no_handphone" value="<?= $wali->no_handphone; ?>" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pendidikan Ayah<span class="text-danger">*</span></label>
                                <select class="form-control selectric" name="pendidikan_ayah" required>
                                    <option value="">-- Pilih Pendidikan Ayah --</option>
                                    <option value="SD" <?= ($wali->pendidikan_ayah == 'SD') ? 'selected' : '' ?>>SD</option>
                                    <option value="SMP" <?= ($wali->pendidikan_ayah == 'SMP') ? 'selected' : '' ?>>SMP</option>
                                    <option value="SMA/SMK" <?= ($wali->pendidikan_ayah == 'SMA/SMK') ? 'selected' : '' ?>>SMA/SMK</option>
                                    <option value="D1" <?= ($wali->pendidikan_ayah == 'D1') ? 'selected' : '' ?>>D1</option>
                                    <option value="D2" <?= ($wali->pendidikan_ayah == 'D2') ? 'selected' : '' ?>>D2</option>
                                    <option value="D3" <?= ($wali->pendidikan_ayah == 'D3') ? 'selected' : '' ?>>D3</option>
                                    <option value="S1" <?= ($wali->pendidikan_ayah == 'S1') ? 'selected' : '' ?>>S1</option>
                                    <option value="S2" <?= ($wali->pendidikan_ayah == 'S2') ? 'selected' : '' ?>>S2</option>
                                    <option value="S3" <?= ($wali->pendidikan_ayah == 'S3') ? 'selected' : '' ?>>S3</option>
                                </select>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pendidikan Ibu<span class="text-danger">*</span></label>
                                <select class="form-control selectric" name="pendidikan_ibu" required>
                                    <option value="">-- Pilih Pendidikan Ibu --</option>
                                    <option value="SD" <?= ($wali->pendidikan_ibu == 'SD') ? 'selected' : '' ?>>SD</option>
                                    <option value="SMP" <?= ($wali->pendidikan_ibu == 'SMP') ? 'selected' : '' ?>>SMP</option>
                                    <option value="SMA/SMK" <?= ($wali->pendidikan_ibu == 'SMA/SMK') ? 'selected' : '' ?>>SMA/SMK</option>
                                    <option value="D1" <?= ($wali->pendidikan_ibu == 'D1') ? 'selected' : '' ?>>D1</option>
                                    <option value="D2" <?= ($wali->pendidikan_ibu == 'D2') ? 'selected' : '' ?>>D2</option>
                                    <option value="D3" <?= ($wali->pendidikan_ibu == 'D3') ? 'selected' : '' ?>>D3</option>
                                    <option value="S1" <?= ($wali->pendidikan_ibu == 'S1') ? 'selected' : '' ?>>S1</option>
                                    <option value="S2" <?= ($wali->pendidikan_ibu == 'S2') ? 'selected' : '' ?>>S2</option>
                                    <option value="S3" <?= ($wali->pendidikan_ibu == 'S3') ? 'selected' : '' ?>>S3</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pekerjaan Ayah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pekerjaan_ayah" value="<?= $wali->pekerjaan_ayah; ?>" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pekerjaan Ibu <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pekerjaan_ibu" value="<?= $wali->pekerjaan_ibu; ?>" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penghasilan Ayah<span class="text-danger">*</span></label>
                                <select class="form-control selectric" name="penghasilan_ayah" required>
                                    <option value="">-- Pilih Penghasilan Ayah --</option>
                                    <option value="Kurang dari 500.000" <?= ($wali->penghasilan_ayah == 'Kurang dari 500.000') ? 'selected' : '' ?>>Kurang dari 500.000</option>
                                    <option value="500.000 s/d 1jt" <?= ($wali->penghasilan_ayah == '500.000 s/d 1jt') ? 'selected' : '' ?>>500.000 s/d 1jt</option>
                                    <option value="1jt s/d 5jt" <?= ($wali->penghasilan_ayah == '1jt s/d 5jt') ? 'selected' : '' ?>>1jt s/d 5jt</option>
                                    <option value="5jt s/d 20jt" <?= ($wali->penghasilan_ayah == '5jt s/d 20jt') ? 'selected' : '' ?>>5jt s/d 20jt</option>
                                    <option value="Lebih dari 20jt" <?= ($wali->penghasilan_ayah == 'Lebih dari 20jt') ? 'selected' : '' ?>>Lebih dari 20jt</option>
                                </select>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penghasilan Ibu<span class="text-danger">*</span></label>
                                <select class="form-control selectric" name="penghasilan_ibu" required>
                                    <option value="">-- Pilih Penghasilan Ibu --</option>
                                    <option value="Kurang dari 500.000" <?= ($wali->penghasilan_ibu == 'Kurang dari 500.000') ? 'selected' : '' ?>>Kurang dari 500.000</option>
                                    <option value="500.000 s/d 1jt" <?= ($wali->penghasilan_ibu == '500.000 s/d 1jt') ? 'selected' : '' ?>>500.000 s/d 1jt</option>
                                    <option value="1jt s/d 5jt" <?= ($wali->penghasilan_ibu == '1jt s/d 5jt') ? 'selected' : '' ?>>1jt s/d 5jt</option>
                                    <option value="5jt s/d 20jt" <?= ($wali->penghasilan_ibu == '5jt s/d 20jt') ? 'selected' : '' ?>>5jt s/d 20jt</option>
                                    <option value="Lebih dari 20jt" <?= ($wali->penghasilan_ibu == 'Lebih dari 20jt') ? 'selected' : '' ?>>Lebih dari 20jt</option>
                                </select>
                                <div class="invalid-feedback">
                                </div>
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