<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php $this->load->view('jenisobat/create') ?>
                <input type="text" id="search" class="form-control mb-2" placeholder="Cari user">
                <div class="table-responsive">
                    <div class="table" id="table-jenisobat">
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jenis Obat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jenisobats as $key => $jenisobat) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $jenisobat['nama_jenis_obat'] ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#editFormModal" data-itemid="<?= $jenisobat['id_jenis_obat'] ?>" data-itemnamajenisobat="<?= $jenisobat['nama_jenis_obat'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="<?= base_url('jenisobat/delete/' . $jenisobat['id_jenis_obat']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini [<?= $jenisobat['nama_jenis_obat'] ?>]?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <?php $this->load->view('jenisobat/edit') ?>
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