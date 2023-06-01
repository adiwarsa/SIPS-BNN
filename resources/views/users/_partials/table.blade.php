<div class="table-responsive">
	<table id="example" class="table table-striped table-bordered mb-4">
		<thead>
			<tr>
				<th>{{ __('#') }}</th>
				<th>{{ __('Name') }}</th>
				<th>{{ __('Email') }}</th>
				<th>{{ __('Role') }}</th>
				@if (auth()->user()->role == 'Admin')
				<th>{{ __('#') }}</th>
				@endif
			</tr>
		</thead>
		<tbody>
			@forelse($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->role }}</td>
				@if (auth()->user()->role == 'Admin')
				<td>
					{!! actionBtn(route('users.edit', $user->id), 'info', 'edit') !!}
					{!! actionBtn(route('users.delete', $user->id), 'danger', 'trash', ["onclick='del(this)'"]) !!}
				</td>	
				@endif
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
		swalConfirm('Apakah kamu yakin?', `Kamu tidak bisa mengembalikan datanya kembali.`, 'Ya, hapus!', () => {
			form.submit()
		}, { cancelButtonText: 'Batal' })
	}
</script>
@endpush