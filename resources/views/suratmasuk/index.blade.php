<x-app-layout title="SIPS BNN - Surat Masuk">
	<x-breadcrumb
        :values="[__('Manajemen Surat'), __('Surat Masuk')]">
    </x-breadcrumb>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">
				{{ __('Surat Masuk') }}
			</h5>

			<div class="mb-4">
				<a href="{{ route('suratmasuk.create') }}" class="btn btn-primary">
					{{ __('Buat baru') }}
				</a>
			</div>

			@include('suratmasuk._partials.table')

		</div>
	</div>
</x-app-layout>