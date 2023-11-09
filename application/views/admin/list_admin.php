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
                            <h4>Daftar Administrator</h4>
                            <button class="d-block btn btn-primary ml-auto" data-toggle="modal" data-target="#addAdmin"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($admin as $data) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $data->name; ?></td>
                                                <td><?= $data->email; ?></td>
                                                <?php if (password_verify('adminalir03', $data->password)) : ?>
                                                    <td>
                                                        <div class="badge badge-info">Default</div>
                                                    </td>
                                                <?php else : ?>
                                                    <td>
                                                        <div class="badge badge-success">Custom</div>
                                                    </td>
                                                <?php endif; ?>

                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                            Aksi
                                                        </a>

                                                        <?php if ($data->id != $this->dt_user->id) : ?>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item btn-delete" href="<?= base_url('admin/list_admin/delete/' . $data->id); ?>">Delete</a>
                                                                <a class="dropdown-item" href="<?= base_url('admin/list_admin/resetpwd/' . $data->id); ?>">Reset password</a>
                                                            </div>
                                                        <?php endif; ?>
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

<!-- add admin -->
<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah administrator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/list_admin/add'); ?>" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
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