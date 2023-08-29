<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php $this->load->view('user/create') ?>
                <input type="text" id="search" class="form-control mb-2" placeholder="Cari user">
                <div class="table-responsive">
                    <div class="table" id="table-user">
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Fullname</th>
                                    <th>Status Aktif</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $key => $user) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $user['username'] ?></td>
                                        <td><?= $user['password'] ?></td>
                                        <td><?= $user['fullname'] ?></td>
                                        <td class="text-center">
                                            <?php if ($user['is_active'] == 1) : ?>
                                                <span class="badge badge-success">Aktif</span>
                                            <?php else : ?>
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#editFormModal" data-itemid="<?= $user['id_user'] ?>" data-itemusername="<?= $user['username'] ?>" data-itemfullname="<?= $user['fullname'] ?>" data-itemisactive="<?= $user['is_active'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="<?= base_url('user/delete/' . $user['id_user']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini [<?= $user['fullname'] ?>]?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <?php $this->load->view('user/edit') ?>
                    <script>
                        $(document).ready(function() {
                            $('#search').on('keyup', function() {
                                var value = $(this).val().toLowerCase();
                                $('tbody tr').filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>