<x-app-layout title="SIPS BNN - Tambah Surat Masuk">
	<x-breadcrumb
        :values="[__('Manajemen Surat'), __('Surat Masuk'), __('Tambah Surat')]">
    </x-breadcrumb>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">
				{{ __('Tambah Surat Masuk') }}
			</h5>

			<div class="mb-4">
				<a href="{{ route('suratmasuk.index') }}" class="btn btn-dark">
					{{ __('Kembali') }}
				</a>
			</div>

			@include('suratmasuk._partials.form')

		</div>
	</div>
</x-app-layout>