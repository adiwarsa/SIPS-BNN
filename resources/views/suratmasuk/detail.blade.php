<x-app-layout title="SIPS BNN - Surat Masuk">
    <style>
           .iframe-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        height: 0;
    }
    .iframe-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    </style>
	<x-breadcrumb
        :values="[__('Manajemen Surat'), __('Surat Masuk'), $surat->no_surat]">
    </x-breadcrumb>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">
				{{ __('Detail Surat Masuk') }}
			</h5>

			<div class="mb-4">
                <a href="{{ route('suratmasuk.index') }}" class="btn btn-dark">
                    {{ __('Kembali') }}
                </a>
			</div>

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between flex-column flex-sm-row">
                        <div class="card-title">
                            <h5 class="text-nowrap mb-0 fw-bold">{{ $surat->no_surat }}</h5>
                            <small class="text-black">
                                {{ $surat->dari  }} |
                                <span
                                    class="text-secondary">{{ __('No Surat') }}:</span> {{ $surat->no_surat }}
                                |
                                {{ $surat->kepada }}
                            </small>
                        </div>
                        <div class="card-title d-flex flex-row">
                            <div class="d-inline-block mx-2 text-end text-black">
                                <small class="d-block text-secondary">{{ __('Tanggal Surat') }}</small>
                                {{ $surat->formatted_tanggal_surat }}
                            </div>
                                <div class="mx-3">
                                    <a href="{{ route('disposisi.create', ['id' => $surat->id]) }}"
                                       class="btn btn-primary btn">{{ __('Disposisi') }} <span>({{ $countdisposisi }})</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="divider">
                        <div class="divider-text">Perihal</div>
                    </div>
                    <p>{{ $surat->perihal }}</p>
                    <div class="d-flex justify-content-between flex-column flex-sm-row">
                            <dt class="col-sm-2">Keterangan Waktu/Tempat</dt>
                            <dd class="col-sm-12">: {{ $surat->keterangan }}</dd>
                    </div>
                    <div class="mt-2">
                        <div class="divider">
                            <div class="divider-text">Detail Surat</div>
                        </div>
                        <dl class="row mt-3">
                            <dt class="col-sm-3">Tanggal Surat</dt>
                            <dd class="col-sm-9">{{ $surat->formatted_tanggal_surat }}</dd>
            
                            <dt class="col-sm-3">Tanggal Terima</dt>
                            <dd class="col-sm-9">{{ $surat->formatted_tanggal_terima }}</dd>
            
                            <dt class="col-sm-3">No Surat</dt>
                            <dd class="col-sm-9">{{ $surat->no_surat }}</dd>
            
                            <dt class="col-sm-3">Dituju ke</dt>
                            <dd class="col-sm-9">{{ $surat->kepada }}</dd>
            
                            <dt class="col-sm-3">Dari</dt>
                            <dd class="col-sm-9">{{ $surat->dari }}</dd>
            
                            <dt class="col-sm-3">Dibuat pada</dt>
                            <dd class="col-sm-9">{{ $surat->formatted_created_at }}</dd>
            
                            <dt class="col-sm-3">Diubah pada</dt>
                            <dd class="col-sm-9">{{ $surat->formatted_updated_at }}</dd>

                            <div class="divider">
                                <div class="divider-text">Disposisi Surat</div>
                            </div>
                            {{-- @foreach($disposition as $disposisi)
                            <x-disposisi
                            :disposisi="$disposisi"
                            :surat="$surat"

                            />
                            @endforeach --}}
                            @forelse ($disposition as $disposisi)
                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between flex-column flex-sm-row">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-0 fw-bold">Kepada : Bidang {{ $disposisi->kepada }}</h5>
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
                                        <button type="button" class="btn-edit btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $disposisi->id }}">Tambah Disposisi</button>
                                    </div>
                                    @endif
                                </div>
                                </div>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $disposisi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Disposisi Kepala Bidang {{ $disposisi->kepada }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="edit-form">
                                            <form action="{{ route('disposisi.update', ['id' => $surat->id , 'disposisi' => $disposisi->id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <input hidden name="id" id="id" value="{{ $disposisi->id }}">
                                                    <input hidden name="surat_id" id="surat_id" value="{{ $disposisi->surat_id }}">
                                                    <input hidden name="kepada" id="kepada" value="{{ $disposisi->kepada }}">
                                                    <input hidden name="tenggat" id="tenggat" value="{{ $disposisi->tenggat }}">
                                                    <input hidden name="disposisi_kbnn" id="disposisi_kbnn" value="{{ $disposisi->disposisi_kbnn }}">
                                                    <input hidden name="status" id="status" value="{{ $disposisi->status }}">
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
                        @empty
                                <div class="d-flex justify-content-center">
                                    <dt>Belum Ada Disposisi Untuk Surat Ini</dt> 
                                </div>
                                
                        @endforelse
                            </div>
                            <div class="divider">
                                <div class="divider-text">File Surat</div>
                            </div>
                            @if (!$surat->file)
                            <dt class="col-sm-3">File</dt> 
                            <dd class="col-sm-9">File Tidak Ada</dd>
                            @else
                            <dt class="col-sm-3">File</dt>
                            <div class="iframe-container">
                                <iframe src="{{ asset('storage/suratmasuk/' . $surat->file) }}"></iframe>
                            </div>
                            @endif
                        </dl>
                    </div>
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
</x-app-layout>