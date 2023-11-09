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
                            <h4>Setting Gelombang</h4>
                            <button class="d-block btn btn-primary ml-auto" data-toggle="modal" data-target="#addGelombang"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama Gelombang</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($gelombang as $data) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $data->nama; ?></td>
                                                <td><?= tanggal_indonesia($data->waktu_mulai); ?> - <?= tanggal_indonesia($data->waktu_akhir); ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                            Aksi
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editGelombang<?= $data->id; ?>">Edit</a>
                                                            <a class="dropdown-item btn-delete" href="<?= base_url('admin/gelombang/delete/' . $data->id); ?>">Delete</a>
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

<div class="modal fade" id="addGelombang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah gelombang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/gelombang/add'); ?>" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Waktu mulai</label>
                        <input type="date" name="waktu_mulai" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Waktu akhir</label>
                        <input type="date" name="waktu_akhir" class="form-control">
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

<?php foreach ($gelombang as $data) : ?>
    <div class="modal fade" id="editGelombang<?= $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah gelombang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/gelombang/edit'); ?>" method="post">
                        <input type="hidden" name="id" value="<?= $data->id; ?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $data->nama; ?>">
                        </div>
                        <div class="form-group">
                            <label>Waktu mulai</label>
                            <input type="date" name="waktu_mulai" class="form-control" value="<?= $data->waktu_mulai; ?>">
                        </div>
                        <div class="form-group">
                            <label>Waktu akhir</label>
                            <input type="date" name="waktu_akhir" class="form-control" value="<?= $data->waktu_akhir; ?>">
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
<?php endforeach; ?>