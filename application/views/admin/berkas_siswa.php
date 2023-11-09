<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>

        <div class="section-body">

            <!-- main -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Berkas Calon Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama</th>
                                            <th>Kartu Keluarga</th>
                                            <th>Akte</th>
                                            <th>Ijazah/SKL</th>
                                            <th>Sertifikat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($berkas as $data) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $data->name; ?></td>

                                                <!-- kartu keluarga -->
                                                <?php if ($data->kartu_keluarga != NULL) : ?>
                                                    <td><a href="<?= base_url('uploads/berkas/' . $data->kartu_keluarga); ?>" class="badge badge-info" target="_blank">lihat</a></td>
                                                <?php else : ?>
                                                    <td><span class="badge badge-danger">belum upload</span></td>
                                                <?php endif; ?>

                                                <!-- akte -->
                                                <?php if ($data->akte != NULL) : ?>
                                                    <td><a href="<?= base_url('uploads/berkas/' . $data->akte); ?>" class="badge badge-info" target="_blank">lihat</a></td>
                                                <?php else : ?>
                                                    <td><span class="badge badge-danger">belum upload</span></td>
                                                <?php endif; ?>

                                                <!-- ijazah -->
                                                <?php if ($data->ijazah != NULL) : ?>
                                                    <td><a href="<?= base_url('uploads/berkas/' . $data->ijazah); ?>" class="badge badge-info" target="_blank">lihat</a></td>
                                                <?php else : ?>
                                                    <td><span class="badge badge-danger">belum upload</span></td>
                                                <?php endif; ?>

                                                <!-- sertifikat -->
                                                <?php if ($data->sertifikat != NULL) : ?>
                                                    <td><a href="<?= base_url('uploads/berkas/' . $data->sertifikat); ?>" class="badge badge-info" target="_blank">lihat</a></td>
                                                <?php else : ?>
                                                    <td><span class="badge badge-danger">belum upload</span></td>
                                                <?php endif; ?>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end main -->
        </div>
    </section>
</div>