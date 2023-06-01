<x-app-layout title="SIPS BNN - Manajemen Pegawai">
	<x-breadcrumb
        :values="[__('Manajemen Pegawai'), __('Pegawai'),]">
    </x-breadcrumb>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">
				{{ __('Manajemen Pegawai') }}
			</h5>
			@if (auth()->user()->role == 'Admin')
			<div class="mb-4">
				<a href="{{ route('pegawai.create') }}" class="btn btn-primary">
					{{ __('Buat baru') }}
				</a>
			</div>
			@endif
			
			@include('pegawai._partials.table')

		</div>
	</div>
</x-app-layout>