<div class="modal fade" id="editFormModal" tabindex="-1" role="dialog" aria-labelledby="editFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFormModalLabel">Form Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="editAjaxAlert" hidden>
                    <span id="editAjaxResponse"></span>
                </div>
                <form id="editForm">
                    <div class="form-group">
                        <label for="editNamaobat">Nama Obat:</label>
                        <input type="text" name="editNamaobat" id="editNamaobat" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="editIdjenisobat">Nama Jenis Obat:</label>
                        <select name="editIdjenisobat" id="editIdjenisobat" class="form-control">
                            <option value="">Pilih Jenis Obat</option>
                            <?php foreach ($jenisobats as $jenisObat) : ?>
                                <option value="<?= $jenisObat['id_jenis_obat'] ?>"><?= $jenisObat['nama_jenis_obat'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editSatuan">Satuan:</label>
                        <input type="text" name="editSatuan" id="editSatuan" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="editHarga">Harga:</label>
                        <input type="number" name="editHarga" id="editHarga" class="form-control" value="" min="0">
                    </div>
                    <div class="form-group">
                        <label for="editStok">Stok:</label>
                        <input type="number" name="editStok" id="editStok" class="form-control" value="" min="0">
                    </div>
                    <div class="form-group">
                        <label for="editTanggalexpired">Tanggal Expired:</label>
                        <input type="date" name="editTanggalexpired" id="editTanggalexpired" class="form-control" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-info" id="confirmEditButton">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#editFormModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var itemId = button.data('itemid');
            var itemNamaobat = button.data('itemnamaobat');
            var itemIdjenisobat = button.data('itemidjenisobat');
            var itemSatuan = button.data('itemsatuan');
            var itemHarga = button.data('itemharga');
            var itemStok = button.data('itemstok');
            var itemTanggalexpired = button.data('itemtanggalexpired');

            var modal = $(this);
            modal.find('#editNamaobat').val(itemNamaobat);
            modal.find('#editIdjenisobat').val(itemIdjenisobat);
            modal.find('#editSatuan').val(itemSatuan);
            modal.find('#editHarga').val(itemHarga);
            modal.find('#editStok').val(itemStok);
            modal.find('#editTanggalexpired').val(itemTanggalexpired);

            $('#confirmEditButton').on('click', function() {
                response = $.ajax({
                    url: '<?= base_url('obat/update/') ?>' + itemId,
                    method: 'POST',
                    data: {
                        '<?= $this->security->get_csrf_token_name() ?>': '<?= $this->security->get_csrf_hash() ?>',
                        'id_obat': itemId,
                        'nama_obat': $('#editNamaobat').val(),
                        'id_jenis_obat': $('#editIdjenisobat').val(),
                        'satuan': $('#editSatuan').val(),
                        'harga': $('#editHarga').val(),
                        'stok': $('#editStok').val(),
                        'tanggal_expired': $('#editTanggalexpired').val()
                    },
                    success: function(response) {
                        if (response == 'success') {
                            $('#editFormModal').modal('hide');
                            location.reload();
                        } else {
                            $('#editAjaxAlert').removeAttr('hidden');
                            $('#editAjaxResponse').html(response);
                        }
                    },
                });
            });
        });

        $('#editFormModal').on('hidden.bs.modal', function() {
            $('#confirmEditButton').off('click');
            $('#editNamaobat').html('');
            $('#editSatuan').html('');
            $('#editHarga').html('');
            $('#editStok').html('');
            $('#editTanggalexpired').html('');
            $('#editAjaxResponse').html('');
            $('#editAjaxAlert').attr('hidden', '');
        });
    });
</script>