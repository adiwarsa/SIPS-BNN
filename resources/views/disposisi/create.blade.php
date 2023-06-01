<x-app-layout title="SIPS BNN - Disposisi">
	<x-breadcrumb
        :values="[__('Surat Masuk'),$surat->no_surat,__('Tambah Disposisi')]">
    </x-breadcrumb>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">
				{{ __('Tambah Disposisi') }}
			</h5>

			<div class="mb-4">
				<a href="{{ route('suratmasuk.show', $surat->id) }}" class="btn btn-primary">
					{{ __('Kembali') }}
				</a>
			</div>
			<div class="card mb-4">
				<form action=" {{ route('disposisi.store', ['id' => $surat->id]) }}" method="POST">
					@csrf
					<div class="card-body row">
						<div class="col-sm-12 col-12 col-md-6 col-lg-12">
							<x-label for="Kepada" :value="__('Kepada Bidang')" />
							<div>
								<div class="form-check form-check-inline">
									<input type="checkbox" name="kepada[]" value="P2M" id="kepada1">
									<label for="kepada1">P2M</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="checkbox" name="kepada[]" value="Umum" id="kepada2">
									<label for="kepada2">Umum</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="checkbox" name="kepada[]" value="Pemberantasan" id="kepada3">
									<label for="kepada3">Pemberantasan</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="checkbox" name="kepada[]" value="Rehabilitasi" id="kepada4">
									<label for="kepada4">Rehabilitasi</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="checkbox" name="kepada[]" value="Humas" id="kepada5">
									<label for="kepada5">Humas</label>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-12 col-md-6 col-lg-6">
							<div class="">
								<x-label for="status" :value="__('Status')" />
								<select class="form-select" id="status" name="status">
										<option
											value="1"
											@selected(old('status') == '1')>Rahasia</option>
										<option
											value="2"
											@selected(old('status') == '2')>Biasa</option>
								</select>
							</div>
						</div>
						{{-- <div class="col-sm-12 col-12 col-md-6 col-lg-6">
							<x-label for="Kepada" :value="__('kepada')" />
							<x-input name="kepada" :placeholder="__('Penerima')" :label="__('kepada')"/>
						</div> --}}

						<div class="col-sm-12 col-12 col-md-6 col-lg-6">
							<x-label for="Tenggat" :value="__('Tenggat')" />
							<x-input name="tenggat" :label="__('tenggat')" type="date"/>
						</div>
						<div class="col-sm-12 col-12 col-md-12 col-lg-12">
							<x-label for="disposisi_kbnn" :value="__('Disposisi Kepala BNN')" />
							<x-input-text-area name="disposisi_kbnn" id="disposisi_kbnn" :placeholder="__('Disposisi Kepala BNN')" :value="old('disposisi_kbnn')" />
						</div>
						{{-- <div class="col-sm-12 col-12 col-md-6 col-lg-12">
							<x-label for="disposisi_kabid" :value="__('Disposisi Kepala Bidang')" />
							<x-input-text-area name="disposisi_kabid" id="disposisi_kabid" :placeholder="__('Disposisi Kepala Bidang')" :value="old('disposisi_kabid')" />
						</div> --}}
					</div>
					<div class="text-end mb-2 px-2">
						<x-button type="submit" class="btn btn-primary" :value="__('Tambah')" />
					</div>
				</form>
			</div>
		</div>
	</div>
</x-app-layout>