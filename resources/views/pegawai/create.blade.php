<x-app-layout title="SIPS BNN - Tambah Pegawai">
	<x-breadcrumb
        :values="[__('Manajemen Pegawai'), __('Pegawai'), __('Tambah Pegawai')]">
    </x-breadcrumb>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">
				{{ __('Tambah Pegawai') }}
			</h5>

			<div class="mb-4">
				<a href="{{ route('pegawai.index') }}" class="btn btn-dark">
					{{ __('Kembali') }}
				</a>
			</div>

			@include('pegawai._partials.form')

		</div>
	</div>
</x-app-layout>