<x-app-layout title="SIPS BNN - Disposisi">
	<x-breadcrumb
        :values="[__('Surat Masuk'), $surat->no_surat,__('Disposisi')]">
    </x-breadcrumb>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">
				{{ __('Disposisi') }}
			</h5>

			<div class="mb-4">
				<a href="{{ route('disposisi.create', ['id' => $surat->id]) }}" class="btn btn-primary">
					{{ __('Tambah') }}
				</a>
			</div>

            @foreach($disposition as $disposisi)
			<x-disposisi
            :disposisi="$disposisi"
            :surat="$surat"

            />
            @endforeach
		</div>
	</div>
</x-app-layout>