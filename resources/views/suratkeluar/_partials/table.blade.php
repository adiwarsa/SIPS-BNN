<div class="table-responsive">
	<table id="example" class="table table-striped table-bordered mb-4">
		<thead>
			<tr>
				<th>{{ __('#') }}</th>
				<th>{{ __('No Surat') }}</th>
				<th>{{ __('Type') }}</th>
				<th>{{ __('Kategori') }}</th>
				<th>{{ __('Status') }}</th>
				<th>{{ __('Tanggal Surat') }}</th>
                <th>{{ __('#') }}</th>
			</tr>
		</thead>
		<tbody>
			@forelse($surat as $suratkeluar)
			<tr>
				<td>{{ $loop->iteration }}</td>
			@if($suratkeluar->status == 1)
				<td>{{ $suratkeluar->no_surat }}</td>
			@else
				<td class="text-center"> - </td>
			@endif
                <td>{{ $suratkeluar->type }}</td>
			@if($suratkeluar->type == 'Sprin')
				<td>Surat Perintah</td>
			@else
				<td>{{ $suratkeluar->kategori }}</td>
				
			@endif
				@if (auth()->user()->role == 'Admin')
				<td>
					<button class="btn-edit btn btn-info btn-sm bg-{{ $suratkeluar->status == 0 ? 'danger' : 'success' }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $suratkeluar->id }}">
						{{ $suratkeluar->status == 0 ? __('Butuh Verifikasi') : __('Diverifikasi') }}
					</button>
				</td>
				@else
				<td>
					<span class="badge bg-{{ $suratkeluar->status == 0 ? 'danger' : 'success' }}">
						{{ $suratkeluar->status == 0 ? __('Belum diverifikasi') : __('Diverifikasi') }}
					</span>
				</td>
				@endif
				<td>{{ $suratkeluar->formatted_tanggal_surat }}</td>
				<td class="text-center">
				@if($suratkeluar->status == 1)
					@if ($suratkeluar->type == 'Sprin')
					{!! actionBtn(route('suratkeluar.printsprint', $suratkeluar->id), 'success', 'printer', ["target='_blank'"]) !!}
					@else
					{!! actionBtn(route('suratkeluar.print', $suratkeluar->id), 'success', 'printer', ["target='_blank'"]) !!}
					@endif
				@endif
					
                    {!! actionBtn(route('suratkeluar.edit', $suratkeluar->id), 'info', 'edit') !!}
					{!! actionBtn(route('suratkeluar.delete', $suratkeluar->id), 'danger', 'trash', ["onclick='del(this)'"]) !!}
				</td>
			</tr>

			<!-- Edit Modal -->
			<div class="modal fade" id="editModal{{ $suratkeluar->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header d-flex align-items-center">
					<h5 class="modal-title" id="exampleModalLabel">Verifikasi Surat {{ $suratkeluar->no_surat }}</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="edit-form">
						<form action="{{ route('suratkeluar.verifikasi', $suratkeluar->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('put')
							<div class="modal-body">
								<div class="col-sm-12 col-12 col-md-12 col-lg-12">
									<x-label for="No Surat" :value="__('No Surat')" />
									<x-input :placeholder="__('No Surat')" name="no_surat" id="no_surat" :value="old('no_surat', $suratkeluar->no_surat)"/>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
									{{ __('Batal') }}
								</button>
								<button type="submit" class="btn btn-primary">
									@if ($suratkeluar->status == 1)
									{{ __('Batalkan Verifikasi') }}
									@else
									{{ __('Verifikasi') }}
									@endif
									
								</button>
							</div>
						</form>
					</div>
				</div>
				</div>
			</div>
			@empty
			<tr>
				<td colspan="100%" class="text-center">
					{{ __('No data to display.') }}
				</td>
			</tr>
			@endforelse
		</tbody>
	</table>

	<!-- Delete forms with javascript -->
	<form method="POST" class="d-none" id="delete-form">
		@csrf
		@method("DELETE")
	</form>
</div>

@push('js')
<script>
	function del(element) {
		event.preventDefault()
		let form = document.getElementById('delete-form');
		form.setAttribute('action', element.getAttribute('href'))
		swalConfirm('Apa kamu yakin ingin menghapus ?', `Kamu tidak bisa mengembalikannya`, 'Ya, Hapus!', () => {
			form.submit()
		})
	}
</script>
@endpush