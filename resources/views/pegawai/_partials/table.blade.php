<div class="table-responsive">
	<table id="example" class="table table-striped table-bordered mb-4">
		<thead>
			<tr>
				<th>{{ __('#') }}</th>
				<th>{{ __('Nama') }}</th>
				<th>{{ __('Jabatan') }}</th>
                <th>{{ __('NIP') }}</th>
				@if (auth()->user()->role == 'Admin')
				<th>{{ __('#') }}</th>	
				@endif
				
			</tr>
		</thead>
		<tbody>
			@forelse($pegawai as $pgw)
			<tr>
				<td>{{ $pgw->id }}</td>
				<td>{{ $pgw->nama }}</td>
				<td>{{ $pgw->jabatan }}</td>
                <td class="text-center">
					@if ($pgw->nip)
					{{ $pgw->nip }}
					@else
					-
					@endif
				</td>

				@if (auth()->user()->role == 'Admin')
				<td>
					{!! actionBtn(route('pegawai.edit', $pgw->id), 'info', 'edit') !!}
					{!! actionBtn(route('pegawai.delete', $pgw->id), 'danger', 'trash', ["onclick='del(this)'"]) !!}
				</td>	
				@endif
				
			</tr>
			@empty
			<tr>
				<td colspan="100%" class="text-center">
					{{ __('Belum ada data pegawai') }}
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