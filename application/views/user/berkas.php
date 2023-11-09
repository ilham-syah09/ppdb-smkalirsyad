<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="alert alert-info">
                Ukuran file maksimal 2 MB, Jenis file yang dapat diunggah jpg / jpeg / png / pdf
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <form action="<?= base_url('user/berkas/uploadBerkas'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group row mt-3">
                                    <label class="col-md-2 col-form-label">Kartu Keluarga</label>
                                    <div class="col-md-6 mb-2">
                                        <input type="file" class="form-control" name="kartu_keluarga">
                                        <small class="text-success"><?= $this->session->flashdata('kartu_keluarga'); ?></small>
                                    </div>
                                    <div class="col-md-4">
                                        <?php if ($berkas && $berkas->kartu_keluarga) : ?>
                                            <small class="text-success"><a href="<?= base_url('uploads/berkas/' . $berkas->kartu_keluarga); ?>" target="_blank" class="badge badge-sm badge-primary">Lihat File</a></small>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-md-2 col-form-label">Akte Kelahiran</label>
                                    <div class="col-md-6 mb-2">
                                        <input type="file" class="form-control" name="akte">
                                        <small class="text-success"><?= $this->session->flashdata('akte'); ?></small>
                                    </div>
                                    <div class="col-md-4">
                                        <?php if ($berkas && $berkas->akte) : ?>
                                            <small class="text-success"><a href="<?= base_url('uploads/berkas/' . $berkas->akte); ?>" target="_blank" class="badge badge-sm badge-primary">Lihat File</a></small>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-md-2 col-form-label">Ijazah / SKL</label>
                                    <div class="col-md-6 mb-2">
                                        <input type="file" class="form-control" name="ijazah">
                                        <small class="text-success"><?= $this->session->flashdata('ijazah'); ?></small>
                                    </div>
                                    <div class="col-md-4">
                                        <?php if ($berkas && $berkas->ijazah) : ?>
                                            <small class="text-success"><a href="<?= base_url('uploads/berkas/' . $berkas->ijazah); ?>" target="_blank" class="badge badge-sm badge-primary">Lihat File</a></small>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-md-2 col-form-label">Sertifikat</label>
                                    <div class="col-md-6 mb-2">
                                        <input type="file" class="form-control" name="sertifikat">
                                        <small class="text-success"><?= $this->session->flashdata('sertifikat'); ?></small>
                                    </div>
                                    <div class="col-md-4">
                                        <?php if ($berkas && $berkas->sertifikat) : ?>
                                            <small class="text-success"><a href="<?= base_url('uploads/berkas/' . $berkas->sertifikat); ?>" target="_blank" class="badge badge-sm badge-primary">Lihat File</a></small>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Upload Dokumen
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>