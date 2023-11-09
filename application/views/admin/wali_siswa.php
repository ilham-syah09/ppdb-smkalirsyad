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
                            <h4>Data Calon Wali Siswa</h4>
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
                                            <th>Nama Ayah</th>
                                            <th>NIK Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>NIK Ibu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($wali as $data) : ?>
                                            <tr>
                                                <td class="text-center"><?= $i++; ?></td>
                                                <td><?= $data->name; ?></td>
                                                <td><?= $data->nama_ayah; ?></td>
                                                <td><?= $data->nik_ayah; ?></td>
                                                <td><?= $data->nama_ibu; ?></td>
                                                <td><?= $data->nik_ibu; ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                            Aksi
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Detail</a>
                                                            <a class="dropdown-item btn-delete" href="<?= base_url('admin/calon_siswa/deleteCalonSiswa/' . $data->id); ?>">Delete</a>
                                                            <a class="dropdown-item" href="#">Reset password</a>
                                                        </div>
                                                    </div>
                                                </td>
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