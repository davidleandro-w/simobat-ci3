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
                        <label for="editFullname">Fullname:</label>
                        <input type="text" name="editFullname" id="editFullname" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="editUsername">Username:</label>
                        <input type="text" name="editUsername" id="editUsername" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="editIsActive">Status Aktif:</label>
                        <select name="editIsActive" id="editIsActive" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editPassword">Ganti Password (optional):</label>
                        <input type="text" name="editPassword" id="editPassword" class="form-control" value="">
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
            var itemUsername = button.data('itemusername');
            var itemFullName = button.data('itemfullname');
            var itemIsActive = button.data('itemisactive');

            var modal = $(this);
            modal.find('#editUsername').val(itemUsername);
            modal.find('#editFullname').val(itemFullName);
            modal.find('#editIsActive').val(itemIsActive);

            $('#confirmEditButton').on('click', function() {
                response = $.ajax({
                    url: '<?= base_url('user/update/') ?>' + itemId,
                    method: 'POST',
                    data: {
                        '<?= $this->security->get_csrf_token_name() ?>': '<?= $this->security->get_csrf_hash() ?>',
                        'id_user': itemId,
                        'username': $('#editUsername').val(),
                        'fullname': $('#editFullname').val(),
                        'password': $('#editPassword').val(),
                        'is_active': $('#editIsActive').val()
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
            $('#editUsername').html('');
            $('#editFullname').html('');
            $('#editPassword').html('');
            $('#editIsActive').html('');
            $('#editAjaxResponse').html('');
            $('#editAjaxAlert').attr('hidden', '');
        });
    });
</script>