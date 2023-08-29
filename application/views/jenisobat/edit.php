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
                        <label for="editNamajenisobat">Namajenisobat:</label>
                        <input type="text" name="editNamajenisobat" id="editNamajenisobat" class="form-control" value="">
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
            var itemNamajenisobat = button.data('itemnamajenisobat');

            var modal = $(this);
            modal.find('#editNamajenisobat').val(itemNamajenisobat);

            $('#confirmEditButton').on('click', function() {
                response = $.ajax({
                    url: '<?= base_url('jenisobat/update/') ?>' + itemId,
                    method: 'POST',
                    data: {
                        '<?= $this->security->get_csrf_token_name() ?>': '<?= $this->security->get_csrf_hash() ?>',
                        'id_jenis_obat': itemId,
                        'nama_jenis_obat': $('#editNamajenisobat').val(),
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
            $('#editNamajenisobat').html('');
            $('#editAjaxResponse').html('');
            $('#editAjaxAlert').attr('hidden', '');
        });
    });
</script>