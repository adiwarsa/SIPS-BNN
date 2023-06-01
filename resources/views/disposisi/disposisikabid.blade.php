<form action="{{ route('disposisi.update', ['id' => $surat->id , 'disposisi' => $disposisi->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="modal-body">
        <input type="hidden" name="id" id="id" value="{{ $disposisi->id }}">
        <input type="hidden" name="surat_id" id="surat_id" value="{{ $disposisi->surat_id }}">
        <input type="hidden" name="kepada" id="kepada" value="{{ $disposisi->kepada }}">
        <input type="hidden" name="tenggat" id="tenggat" value="{{ $disposisi->tenggat }}">
        <input type="hidden" name="disposisi_kbnn" id="disposisi_kbnn" value="{{ $disposisi->disposisi_kbnn }}">
        <input type="hidden" name="status" id="status" value="{{ $disposisi->status }}">
        <x-input-text-area name="disposisi_kabid" id="disposisi_kabid" :placeholder="__('Disposisi Kepala Bidang')" :value="old('disposisi_kabid')" />
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            {{ __('Batal') }}
        </button>
        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
    </div>
</form>

