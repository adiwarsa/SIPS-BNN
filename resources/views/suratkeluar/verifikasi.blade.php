<form action="{{ route('suratkeluar.update', $surat->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="modal-body">
        <input type="text" name="no_surat" id="no_surat" value="{{ $surat->no_surat }}">
        <input type="hidden" name="status" id="status" value="1">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            {{ __('Batal') }}
        </button>
        <button type="submit" class="btn btn-primary">{{ __('Verifikasi') }}</button>
    </div>
</form>

