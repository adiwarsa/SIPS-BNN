<form action="{{ $surat->id ? route('suratkeluar.update', $surat->id) : route('suratkeluar.store') }}" method="POST" enctype="multipart/form-data">
	@csrf

	@if($surat->id)
	@method("PUT")
	@endif
	<div class="card-body row">
		<div class="col-sm-12 col-12 col-md-6 col-lg-6">
			<div class="">
				<x-label for="bidang" :value="__('Bidang')" />
				<input type="hidden" name="type" value="Sprin">
				<select class="form-select" id="bidang" name="bidang" onchange="updateNoSurat()">
						<option
							value="Bidang P2M Cegah"
							@selected(old('bidang') == 'Bidang P2M Cegah')>Bidang P2M Cegah</option>
						<option
							value="Bidang P2M Pemberdayaan Masyarakat"
							@selected(old('bidang') == 'Bidang P2M Pemberdayaan Masyarakat')>Bidang P2M Pemberdayaan Masyarakat</option>
						<option
							value="Bidang P2M Cegah"
							@selected(old('bidang') == 'Bidang P2M Cegah')>Bidang P2M Cegah</option>
						<option
							value="Bidang Rehabilitasi"
							@selected(old('bidang') == 'Bidang Rehabilitasi')>Bidang Rehabilitasi</option>
						<option
							value="Bidang Humas"
							@selected(old('bidang') == 'Bidang Humas')>Bidang Humas</option>
						<option
							value="Bidang Umum"
							@selected(old('bidang') == 'Bidang Umum')>Bidang Umum</option>
						<option
							value="Bidang Berantas"
							@selected(old('bidang') == 'Bidang Berantas')>Bidang Berantas</option>
				</select>
			</div>
		</div>
		@if($surat->id)
		<div class="col-sm-12 col-12 col-md-6 col-lg-6">
			<x-label for="No Surat" :value="__('No Surat')" />
			<x-input :placeholder="__('No Surat')" name="no_surat" id="no_surat" :value="old('no_surat', $surat->no_surat)"/>
			<x-invalid error="asal" />
		</div>
		@else
		<div class="col-sm-12 col-12 col-md-6 col-lg-6">
			<x-label for="No Surat" :value="__('No Surat')" />
			<x-input :placeholder="__('No Surat')" id="no_surat" disabled/>
			<input type="hidden" id="nomor_surat" name="no_surat" value="" >
			<x-invalid error="asal" />
		</div>
		@endif
        <div class="col-sm-12 col-12 col-md-6 col-lg-4">
			<x-label for="kepada" :value="__('Kepada Pegawai')" />
			<select class="form-select kepada-multiple" id="kepada_id" name="kepada_id[]" multiple>
			  @foreach ($pegawai as $p)
				<option value="{{ $p->id }}" @selected(old('pegawai') == $p->id)>{{ $p->nama }} || {{ $p->jabatan }} || {{ $p->status }}</option>
			  @endforeach
			</select>
		@if($surat->id)
			@foreach ($surat->suratkepada as $kepada)
				<span>{{ $kepada->pegawai->nama }}</span>
			@endforeach
		@endif
		</div>
    <div class="col-sm-12 col-12 col-md-6 col-lg-4">
		<x-label for="Tanggal Surat" :value="__('Tanggal Surat')" />
		<x-input required type="date" name="tanggal_surat" id="tanggal_surat" :value="old('tanggal_surat', $surat->tanggal_surat)" />
	</div>
    <div class="col-sm-12 col-12 col-md-12 col-lg-12">
		<x-label for="menimbang" :value="__('Menimbang')" />
		<x-input-text-area name="menimbang" id="menimbang" :placeholder="__('Menimbang')" :value="str_replace('<br />', '', old('menimbang', $surat->menimbang))" />
	</div>

    <div class="col-sm-12 col-12 col-md-12 col-lg-12">
		<x-label for="untuk" :value="__('Untuk')" />
		<x-input-text-area name="untuk" id="untuk" :placeholder="__('Untuk')" :value="str_replace('<br />', '', old('untuk', $surat->untuk))" />
	</div>
    <div class="col-sm-12 col-12 col-md-12 col-lg-12">
		<x-label for="dasar" :value="__('Dasar')" />
		<x-input-text-area name="dasar" id="dasar" :placeholder="__('Dasar')" :value="str_replace('<br />', '', old('dasar', $surat->dasar))" />
	</div>

	<div class="text-end mt-2">
		<x-button type="submit" class="btn btn-primary" :value="$surat->id ? __('Simpan') : __('Tambah')" />
	</div>
	</div>

</form>

<script>
	function updateNoSurat() {
		var bidang = document.getElementById('bidang').value;
		var nomorSurat = '';
		
		// Update the value of nomorSurat based on the selected option in the dropdown
		switch (bidang) {
			case 'Bidang P2M Cegah':
				nomorSurat = 'Sprin/{{$nosurat}}/III/KA/PC.01/2023/BNNP-BALI';
				break;
			case 'Bidang P2M Pemberdayaan Masyarakat':
				nomorSurat = 'Sprin/{{$nosurat}}/III/KA/PM.00/2023/BNNP-BALI';
				break;
			case 'Bidang Rehabilitasi':
				nomorSurat = 'Sprin/{{$nosurat}}/III/KA/RH.00.00/2023/BNNP-BALI';
				break;
			case 'Bidang Humas':
				nomorSurat = 'Sprin/{{$nosurat}}/III/Ka/Bu.02/2023/BNNP-BALI';
				break;
			case 'Bidang Umum':
				nomorSurat = 'Sprin/{{$nosurat}}/III/KA/KP.00.00/2023/BNNP-BALI';
				break;
			case 'Bidang Berantas':
				nomorSurat = 'Sprin/{{$nosurat}}/III/KA/Pb.00.00/2023/BNNP-BALI';
				break;
		}
		
		// Update the value of the disabled input field
		document.getElementById('no_surat').value = nomorSurat;
		document.getElementById('nomor_surat').value = nomorSurat;
	}
	</script>