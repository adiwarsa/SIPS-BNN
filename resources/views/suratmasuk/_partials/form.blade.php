<form action="{{ $surat->id ? route('suratmasuk.update', $surat->id) : route('suratmasuk.store') }}" method="POST" enctype="multipart/form-data">
	@csrf

	@if($surat->id)
	@method("PUT")
	@endif
	<div class="card-body row">
	<div class="col-sm-12 col-12 col-md-6 col-lg-4">
		<x-label for="No Surat" :value="__('No Surat')" />
		<x-input type="no_surat" name="no_surat" id="no_surat" :placeholder="__('No Surat')" :value="old('no_surat', $surat->no_surat)" />
		<x-invalid error="asal" />
	</div>
	
	<div class="col-sm-12 col-12 col-md-6 col-lg-4">
		<x-label for="dari" :value="__('Dari')" />
		<x-input type="dari" name="dari" id="dari" :placeholder="__('Dari')" :value="old('dari', $surat->dari)" />
		<x-invalid error="dari" />
	</div>

	<div class="col-sm-12 col-12 col-md-6 col-lg-4">
		<x-label for="Kepada" :value="__('kepada')" />
		<x-input type="kepada" name="kepada" id="kepada" :placeholder="__('Kepada')" :value="old('kepada', $surat->kepada)" />
		<x-invalid error="kepada" />
	</div>

	<div class="col-sm-12 col-12 col-md-6 col-lg-6">
		<x-label for="Tanggal Surat" :value="__('Tanggal Surat')" />
		<x-input required type="date" name="tanggal_surat" id="tanggal_surat" :value="old('tanggal_surat', $surat->tanggal_surat)" />
	</div>

	<div class="col-sm-12 col-12 col-md-6 col-lg-6">
		<x-label for="Tanggal Terima" :value="__('Tanggal Terima')" />
		<x-input required type="date" name="tanggal_terima" id="tanggal_terima" :value="old('tanggal_terima', $surat->tanggal_terima)" />
	</div>

    <div class="col-sm-12 col-12 col-md-12 col-lg-12">
		<x-label for="perihal" :value="__('perihal')" />
		<x-input-text-area name="perihal" id="perihal" :placeholder="__('Perihal')" :value="old('perihal', $surat->perihal)" />
		<x-invalid error="perihal" />
	</div>

    <div class="col-sm-12 col-12 col-md-12 col-lg-12">
		<x-label for="keterangan" :value="__('keterangan')" />
		<x-input-text-area name="keterangan" id="keterangan" :placeholder="__('Keterangan')" :value="old('keterangan', $surat->keterangan)" />
		<x-invalid error="keterangan" />
	</div>
	<div class="col-sm-12 col-12 col-md-6 col-lg-12">
		<x-label for="File" :value="__('File')" />
		<x-input type="file" name="file" id="file" />
	</div>
	<div class="text-end mt-2">
		<x-button type="submit" class="btn btn-primary" :value="$surat->id ? __('Simpan') : __('Tambah')" />
	</div>
	</div>


</form>