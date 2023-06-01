<div class="card mb-4">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between flex-column flex-sm-row">
            <div class="card-title">
                <h5 class="text-nowrap mb-0 fw-bold">Kepada : {{ $disposisi->kepada }}</h5>
                @if ($disposisi->status == 1)
                <small class="text-black">Status : Rahasia</small>
                @else
                <small class="text-black">Status : Biasa</small>
                @endif
            </div>
            <div class="card-title d-flex flex-row">
                <div class="d-inline-block mx-2 text-end text-black">
                    <small class="d-block text-secondary">{{ __('Tenggat') }}</small>
                    {{ $disposisi->formatted_tenggat }}
                </div>
                <div class="dropdown d-inline-block">
                    <button class="btn p-0" type="button" id="dropdown-disposition-{{ $disposisi->id }}" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-disposition-{{ $disposisi->id }}">
                        <a class="dropdown-item"
                           href="{{ route('disposisi.edit',['id' => $surat->id, 'disposisi' => $disposisi->id]) }}">{{ __('Edit') }}</a>
                           <form action="{{ route('disposisi.delete', ['id' => $surat->id, 'disposisi' => $disposisi->id]) }}" class="d-inline" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="dropdown-item cursor-pointer btn-delete">{{ __('Hapus') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <hr>
        <small class="d-block text-secondary">{{ __('Disposisi Kepala BNN') }}</small>
        <p>{{ $disposisi->disposisi_kbnn }}</p>
        @if ($disposisi->disposisi_kabid != null)
        <hr>
        <small class="text-secondary">{{ __('Disposisi Kepala Bidang') }}</small>
        <p>{{ $disposisi->disposisi_kabid }}</p>
        @else
        <hr>
        <small class="d-block text-secondary">{{ __('Disposisi Kepala Bidang') }}</small>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn-edit btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-attr="{{ route('disposisi.kabid', $disposisi->id) }}">Tambah Disposisi</button>
        </div>
        @endif
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Disposisi Kepala Bidang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="edit-form">
            <form action="/suratmasuk/{{ $disposisi->surat_id }}/disposisi/{{ $disposisi->id }}/update" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="surat_id" id="surat_id" value="">
                    <x-input-text-area name="disposisi_kabid" id="disposisi_kabid" :placeholder="__('Disposisi Kepala Bidang')" :value="old('disposisi_kabid')" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        {{ __('Batal') }}
                    </button>
                    <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).on('click', '.btn-edit', function(event) {
      event.preventDefault();
      let href = $(this).attr('data-attr');
      $.ajax({
        url: href,
        success: function(response) {
          $('#editModal').modal("show");
          $('.edit-form').html(response);
        }
      });
    });
    </script>
