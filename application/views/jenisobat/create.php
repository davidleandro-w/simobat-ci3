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
                        <label for="createNamajenisobat">Nama Jenis Obat:</label>
                        <input type="text" name="createNamajenisobat" id="createNamajenisobat" class="form-control" value="">
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
                    url: '<?= base_url('jenisobat/store') ?>',
                    method: 'POST',
                    data: {
                        '<?= $this->security->get_csrf_token_name() ?>': '<?= $this->security->get_csrf_hash() ?>',
                        'nama_jenis_obat': $('#createNamajenisobat').val(),
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
            $('#createNamajenisobat').html('');
            $('#createAjaxResponse').html('');
            $('#createAjaxAlert').attr('hidden', '');
        });
    });
</script>