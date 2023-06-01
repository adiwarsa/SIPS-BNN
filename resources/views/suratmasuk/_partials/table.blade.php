<div class="table-responsive">
	<table id="example" class="table table-striped table-bordered mb-4">
		<thead>
			<tr>
				<th>{{ __('#') }}</th>
				<th>{{ __('No Surat') }}</th>
				<th>{{ __('Dari') }}</th>
				<th>{{ __('Kepada') }}</th>
				<th>{{ __('Tanggal Surat') }}</th>
                <th>{{ __('Tanggal Terima') }}</th>
                <th>{{ __('Perihal') }}</th>
                <th>{{ __('Keterangan Waktu/Tempat') }}</th>
                <th>{{ __('#') }}</th>
			</tr>
		</thead>
		<tbody>
			@forelse($surat as $suratmasuk)
			<tr>
				<td>{{ $suratmasuk->id }}</td>
				<td><a href="{{ route('suratmasuk.show', $suratmasuk->id) }}">{{ $suratmasuk->no_surat }}</a></td>
				<td>{{ $suratmasuk->dari }}</td>
                <td>{{ $suratmasuk->kepada }}</td>
				<td>{{ $suratmasuk->tanggal_surat }}</td>
                <td>{{ $suratmasuk->tanggal_terima }}</td>
				<td>{{ $suratmasuk->perihal }}</td>
                <td>{{ $suratmasuk->keterangan }}</td>
				<td>
                    {!! actionBtn(route('suratmasuk.edit', $suratmasuk->id), 'info', 'edit') !!}
					{!! actionBtn(route('suratmasuk.delete', $suratmasuk->id), 'danger', 'trash', ["onclick='del(this)'"]) !!}
				</td>
			</tr>
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