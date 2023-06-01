<x-app-layout title="SIPS BNN - Tambah Surat Keluar">
	<x-breadcrumb
        :values="[__('Manajemen Surat'), __('Surat Keluar'), __('Tambah Surat Biasa')]">
    </x-breadcrumb>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">
				{{ __('Tambah Surat Keluar') }}
			</h5>

			<div class="mb-4">
				<a href="{{ route('suratkeluar.index') }}" class="btn btn-dark">
					{{ __('Kembali') }}
				</a>
			</div>

			@include('suratkeluar._partials.form')

		</div>
	</div>
</x-app-layout>