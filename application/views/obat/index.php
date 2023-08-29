<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php $this->load->view('obat/create') ?>
                <input type="text" id="search" class="form-control mb-2" placeholder="Cari user">
                <div class="table-responsive">
                    <div class="table" id="table-obat">
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <th style="width: 10px">No</th>
                                <th>Nama Obat</th>
                                <th>Nama Jenis Obat</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Total Harga Stok</th>
                                <th>Tgl.Expired</th>
                                <th>Status</th>
                                <th style="width: 40px">Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($obats as $key => $obat) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $obat['nama_obat'] ?></td>
                                        <td><?= $obat['nama_jenis_obat'] ?></td>
                                        <td><?= $obat['satuan'] ?></td>
                                        <td>Rp <?= number_format($obat['harga'], 0, ',', '.') ?></td>
                                        <td><?= number_format($obat['stok'], 0, ',', '.') ?></td>
                                        <td>Rp <?= number_format($obat['total_harga_stok'], 0, ',', '.') ?></td>
                                        <td><?= $obat['tanggal_expired_str'] ?></td>
                                        <td>
                                            <?php if ($obat['tanggal_expired'] < date('Y-m-d')) : ?>
                                                <span class="badge badge-danger">Expired</span>
                                            <?php else : ?>
                                                <span class="badge badge-success">Belum Expired</span>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#editFormModal" data-itemid="<?= $obat['id_obat'] ?>" data-itemnamaobat="<?= $obat['nama_obat'] ?>" data-itemidjenisobat="<?= $obat['id_jenis_obat'] ?>" data-itemsatuan="<?= $obat['satuan'] ?>" data-itemharga="<?= $obat['harga'] ?>" data-itemstok="<?= $obat['stok'] ?>" data-itemtanggalexpired="<?= $obat['tanggal_expired'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="<?= base_url('obat/delete/' . $obat['id_obat']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini [<?= $obat['nama_obat'] ?>]?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <?php $this->load->view('obat/edit') ?>
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