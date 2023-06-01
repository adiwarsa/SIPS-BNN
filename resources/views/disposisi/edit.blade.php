<x-app-layout title="Edit Surat Masuk">
    <x-breadcrumb
        :values="[__('Surat Masuk'),$surat->no_surat,__('Tambah Disposisi')]">
    </x-breadcrumb>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Edit Disposisi') }}
            </h5>

            <div class="mb-4">
                <a href="{{ route('suratmasuk.show', ['surat' => $surat->id]) }}" class="btn btn-primary">
					{{ __('Kembali') }}
				</a>
            </div>
            <div class="card mb-4">
				<form action=" {{ route('disposisi.update', ['id' => $surat->id , 'disposisi' => $disposisi->id]) }}" method="POST">
					@csrf
                    @method("PUT")
					<div class="card-body row">
						<div class="col-sm-12 col-12 col-md-6 col-lg-12">
							<div class="">
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
						<div class="col-sm-12 col-12 col-md-6 col-lg-6">
							<x-label for="Kepada" :value="__('kepada')" />
							<x-input name="kepada" :placeholder="__('Penerima')" :label="__('kepada')" :value="old('kepada', $disposisi->kepada)"/>
						</div>
						<div class="col-sm-12 col-12 col-md-6 col-lg-6">
							<x-label for="Tenggat" :value="__('Tenggat')" />
							<x-input name="tenggat" :label="__('tenggat')" type="date" :value="old('tenggat', $disposisi->tenggat)"/>
						</div>
						<div class="col-sm-12 col-12 col-md-12 col-lg-12">
							<x-label for="disposisi_kbnn" :value="__('Disposisi Kepala BNN')" />
							<x-input-text-area name="disposisi_kbnn" id="disposisi_kbnn" :placeholder="__('Disposisi Kepala BNN')" :value="old('disposisi_kbnn', $disposisi->disposisi_kbnn)" />
						</div>
						@if ($disposisi->disposisi_kabid != null)
						<div class="col-sm-12 col-12 col-md-6 col-lg-12">
							<x-label for="disposisi_kabid" :value="__('Disposisi Kepala Bidang')" />
							<x-input-text-area name="disposisi_kabid" id="disposisi_kabid" :placeholder="__('Disposisi Kepala Bidang')" :value="old('disposisi_kabid', $disposisi->disposisi_kabid)" />
						</div>
						@endif
					</div>
					<div class="text-end mb-2 px-2">
						<x-button type="submit" class="btn btn-primary" :value="__('Simpan')" />
					</div>
				</form>
			</div>
        </div>
    </div>
</x-app-layout>