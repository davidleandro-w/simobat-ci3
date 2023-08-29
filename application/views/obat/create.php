<button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#createFormModal">
    <i class="fas fa-plus mr-1"></i>
    Tambah Data
</button>

<div class="modal fade" id="createFormModal" tabindex="-1" role="dialog" aria-labelledby="createFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFormModalLabel">Form Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="createAjaxAlert" hidden>
                    <span id="createAjaxResponse"></span>
                </div>
                <form id="createForm">
                    <div class="form-group">
                        <label for="createNamaObat">Nama Obat:</label>
                        <input type="text" name="createNamaObat" id="createNamaObat" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="createIdJenisObat">Nama Jenis Obat:</label>
                        <select name="createIdJenisObat" id="createIdJenisObat" class="form-control">
                            <option value="">Pilih Jenis Obat</option>
                            <?php foreach ($jenisobats as $jenisObat) : ?>
                                <option value="<?= $jenisObat['id_jenis_obat'] ?>"><?= $jenisObat['nama_jenis_obat'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="createSatuan">Satuan:</label>
                        <input type="text" name="createSatuan" id="createSatuan" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="createHarga">Harga:</label>
                        <input type="number" name="createHarga" id="createHarga" class="form-control" value="" min="0">
                    </div>
                    <div class="form-group">
                        <label for="createStok">Stok:</label>
                        <input type="number" name="createStok" id="createStok" class="form-control" value="" min="0">
                    </div>
                    <div class="form-group">
                        <label for="createTanggalExpired">Tanggal Expired:</label>
                        <input type="date" name="createTanggalExpired" id="createTanggalExpired" class="form-control" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-info" id="confirmCreateButton">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#createFormModal').on('show.bs.modal', function(event) {
            $('#confirmCreateButton').on('click', function() {
                response = $.ajax({
                    url: '<?= base_url('obat/store') ?>',
                    method: 'POST',
                    data: {
                        '<?= $this->security->get_csrf_token_name() ?>': '<?= $this->security->get_csrf_hash() ?>',
                        'nama_obat': $('#createNamaObat').val(),
                        'id_jenis_obat': $('#createIdJenisObat').val(),
                        'satuan': $('#createSatuan').val(),
                        'harga': $('#createHarga').val(),
                        'stok': $('#createStok').val(),
                        'tanggal_expired': $('#createTanggalExpired').val()
                    },
                    success: function(response) {
                        if (response == 'success') {
                            $('#createFormModal').modal('hide');
                            location.reload();
                        } else {
                            $('#createAjaxAlert').removeAttr('hidden');
                            $('#createAjaxResponse').html(response);
                        }
                    },
                });
            });
        });

        $('#createFormModal').on('hidden.bs.modal', function() {
            $('#confirmCreateButton').off('click');
            $('#createForm').trigger('reset');
            $('#createNamaJenisObat').removeClass('is-invalid');
            $('#createIdJenisObat').removeClass('is-invalid');
            $('#createSatuan').removeClass('is-invalid');
            $('#createHarga').removeClass('is-invalid');
            $('#createStok').removeClass('is-invalid');
            $('#createTanggalExpired').removeClass('is-invalid');
            $('#createAjaxResponse').html('');
            $('#createAjaxAlert').attr('hidden', '');
        });
    });
</script>