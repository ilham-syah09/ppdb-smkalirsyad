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
                            <h4>Data Calon Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Email</th>
                                            <th>No Hp/Whatsapp</th>
                                            <th>Tgl mendaftar</th>
                                            <th>Status Akun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($siswa as $data) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $data->nik; ?></td>
                                                <td><?= $data->name; ?></td>
                                                <td><?= $data->tempat_lahir; ?></td>
                                                <td><?= $data->tanggal_lahir; ?></td>
                                                <td><?= $data->email; ?></td>
                                                <td><?= $data->no_hp; ?></td>
                                                <td><?= date('d-m-Y', strtotime($data->created_at)); ?></td>
                                                <?php if ($data->is_active == 1) : ?>
                                                    <td><a href="" class="badge badge-success">Aktif</a></td>
                                                <?php else : ?>
                                                    <td><a href="" class="badge badge-danger">Nonaktif</a></td>
                                                <?php endif; ?>
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