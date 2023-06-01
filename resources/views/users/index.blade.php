<x-app-layout title="SIPS BNN - Manajemen User">
	<x-breadcrumb
        :values="[__('Manajemen User'), __('User'),]">
    </x-breadcrumb>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">
				{{ __('Manajemen User') }}
			</h5>

			@if(auth()->user()->role == 'Admin')
			<div class="mb-4">
				<a href="{{ route('users.create') }}" class="btn btn-primary">
					{{ __('Buat baru') }}
				</a>
			</div>
			@endif
			
			@include('users._partials.table')

		</div>
	</div>
</x-app-layout>