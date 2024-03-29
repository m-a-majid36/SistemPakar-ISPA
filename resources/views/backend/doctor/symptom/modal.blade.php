<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $symptom->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title color-white">Hapus Penyakit</h5>
                <button type="button" class="close color-white" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin menghapus penyakit <strong>{{ $symptom->name }}</strong> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('symptom.destroy', ['symptom' => $symptom->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
