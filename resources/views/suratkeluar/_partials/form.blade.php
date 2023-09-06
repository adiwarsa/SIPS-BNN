<form action="{{ $surat->id ? route('suratkeluar.update', $surat->id) : route('suratkeluar.store') }}" method="POST" enctype="multipart/form-data">
	@csrf

	@if($surat->id)
	@method("PUT")
	@endif
	<div class="card-body row">
		@if ($surat->id)
		<label>
			<input type="radio" name="kategori" id="Lain" value="{{ $surat->kategori }}" checked>
			{{ $surat->kategori }}
		</label>
		@else
		<label>
			<input type="radio" name="kategori" id="Lain" value="Lain" onclick="toggleInputForm()" checked>
			Lain
			<input type="radio" name="kategori" id="Undangan" value="Undangan" onclick="toggleInputForm()">
			Undangan
		</label>
		@endif
		
		<div class="col-sm-12 col-12 col-md-6 col-lg-6">
			<div class="">
				<x-label for="bidang" :value="__('Bidang')" />
				<input type="hidden" name="type" value="Biasa">
				<select class="form-select" id="bidang" name="bidang" onchange="updateNoSurat()">
						<option
							value="Bidang P2M Cegah"
							{{ $surat->bidang == 'Bidang P2M Cegah' ? 'selected' : '' }}>Bidang P2M Cegah</option>
						<option
							value="Bidang P2M Pemberdayaan Masyarakat"
							{{ $surat->bidang == 'Bidang P2M Pemberdayaan Masyarakat' ? 'selected' : '' }}>Bidang P2M Pemberdayaan Masyarakat</option>
						<option
							value="Bidang Rehabilitasi"
							{{ $surat->bidang == 'Bidang Rehabilitasi' ? 'selected' : '' }}>Bidang Rehabilitasi</option>
						<option
							value="Bidang Humas"
							{{ $surat->bidang == 'Bidang Humas' ? 'selected' : '' }}>Bidang Humas</option>
						<option
							value="Bidang Umum"
							{{ $surat->bidang == 'Bidang Umum' ? 'selected' : '' }}>Bidang Umum</option>
						<option
							value="Bidang Berantas"
							{{ $surat->bidang == 'Bidang Berantas' ? 'selected' : '' }}>Bidang Berantas</option>
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
    <div class="col-sm-12 col-12 col-md-6 col-lg-4" id="kepada">
		<x-label for="Kepada" :value="__('kepada')" />
		<x-input type="kepada" name="kepada" id="kepada" :placeholder="__('Kepada')" :value="old('kepada', $surat->kepada)" />
	</div>
	<div class="col-sm-12 col-12 col-md-6 col-lg-6" id="sebagai" style="display:none;">
		<x-label for="sebagai" :value="__('sebagai')" />
								<select class="form-select" id="sebagai" name="sebagai">
										<option
											value="Pemateri"
											{{ $surat->sebagai == 'Pemateri' ? 'selected' : '' }}>Pemateri</option>
										<option
											value="Peserta"
											{{ $surat->sebagai == 'Peserta' ? 'selected' : '' }}>Peserta</option>
								</select>
	</div>
	{{-- <div class="col-sm-12 col-12 col-md-6 col-lg-4" id="sifat" style="display:none;">
		<x-label for="sifat" :value="__('Sifat')" />
								<select class="form-select" id="sifat" name="sifat">
										<option
											value="1"
											{{ $surat->sifat == '1' ? 'selected' : '' }}>Tetap</option>
										<option
											value="2"
											{{ $surat->sifat == '2' ? 'selected' : '' }})>Biasa</option>
								</select>
	</div> --}}
    <div class="col-sm-12 col-12 col-md-6 col-lg-4">
		<x-label for="hal" :value="__('Hal')" />
		<x-input name="hal" id="hal" :placeholder="__('Hal')" :value="old('hal', $surat->hal)" />
		<x-invalid error="hal" />
	</div>
	<div class="col-sm-12 col-12 col-md-6 col-lg-4" id="topik" style="display: none;">
		<x-label for="topik" :value="__('Topik')" />
		<x-input name="topik" id="topik" :placeholder="__('Topik')" :value="old('topik', $surat->topik)" />
	</div>
	
    <div class="col-sm-12 col-12 col-md-6 col-lg-4">
		<x-label for="Tanggal Surat" :value="__('Tanggal Surat')" />
		<x-input required type="date" name="tanggal_surat" id="tanggal_surat" :value="old('tanggal_surat', $surat->tanggal_surat)" />
	</div>

	@if ($surat->kategori == 'Lain')
	<div class="col-sm-12 col-12 col-md-12 col-lg-12">
		<x-label for="Rujukan" :value="__('Rujukan')" />
		<x-input-text-area name="menimbang" id="menimbang" :placeholder="__('Rujukan')" :value="str_replace('<br />', '', old('menimbang', $surat->menimbang))" />
	</div>
	<div class="col-sm-12 col-12 col-md-12 col-lg-12">
		<x-label for="isi" :value="__('Isi Lain')" />
		<x-input-text-area name="isilain" id="isilain" :placeholder="__('Isi ')" :value="old('isilain', $surat->isilain)" />
	</div>
	<div class="col-sm-12 col-12 col-md-12 col-lg-12">
		<x-label for="kesimpulan" :value="__('Kesimpulan')" />
		<x-input-text-area name="kesimpulan" id="kesimpulan" :placeholder="__('Kesimpulan')" :value="old('kesimpulan', $surat->kesimpulan)" />
	</div>
	@else

	@if (!$surat->kategori)
	<div class="col-sm-12 col-12 col-md-12 col-lg-12" id="rujukan">
		<x-label for="Rujukan" :value="__('Rujukan')" />
		<x-input-text-area name="menimbang" id="menimbang" :placeholder="__('Rujukan')" :value="str_replace('<br />', '', old('menimbang', $surat->menimbang))" />
	</div>
	<div class="col-sm-12 col-12 col-md-12 col-lg-12" id="isi-lain">
		<x-label for="isi" :value="__('Isi Lain')" />
		<x-input-text-area name="isilain" id="isilain" :placeholder="__('Isi')" :value="old('isilain', $surat->isilain)" />
	</div>
	<div class="col-sm-12 col-12 col-md-12 col-lg-12" id="kesimpulan">
		<x-label for="kesimpulan" :value="__('Kesimpulan')" />
		<x-input-text-area name="kesimpulan" id="kesimpulan" :placeholder="__('Kesimpulan')" :value="old('kesimpulan', $surat->kesimpulan)" />
	</div>
	@endif

	@endif
	@if ($surat->kategori == 'Undangan')
    <div class="col-sm-12 col-12 col-md-12 col-lg-12">
		<x-label for="isi" :value="__('Isi')" />
		<x-input-text-area name="isi" id="isi" :placeholder="__('Isi')" :value="old('isi', $surat->isi)" />
	</div>

    <div class="col-sm-12 col-12 col-md-6 col-lg-4">
		<x-label for="Mulai" :value="__('Mulai')" />
		<x-input required type="time" name="mulai" id="mulai" :value="old('mulai', $surat->mulai)" />
	</div>
	<div class="col-sm-12 col-12 col-md-6 col-lg-4">
		<x-label for="Selesai" :value="__('Selesai')" />
		<x-input type="time" name="selesai" id="selesai" :value="old('selesai', $surat->selesai)" />
	</div>
	<div class="col-sm-12 col-12 col-md-6 col-lg-4" id="tanggal-pelaksanaan-input">
		<x-label for="Tanggal Pelaksanaan" :value="__('Tanggal Pelaksanaan')" />
		<x-input required type="date" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan" :value="old('tanggal_pelaksanaan', $surat->tanggal_pelaksanaan)" />
	</div>
	<div class="col-sm-12 col-12 col-md-12 col-lg-12">
		<x-label for="Tempat" :value="__('Tempat')" />
		<x-input-text-area name="tempat" id="tempat" :placeholder="__('Tempat')" :value="old('tempat', $surat->tempat)" />
	</div>
	@else
	
	@if(!$surat->kategori)
	<div class="col-sm-12 col-12 col-md-12 col-lg-12" id="isi-input" style="display:none">
		<x-label for="isi" :value="__('Isi')" />
		<x-input-text-area name="isi" id="isi" :placeholder="__('Isi')" :value="old('isi', $surat->isi)" />
	</div>
    <div class="col-sm-12 col-12 col-md-6 col-lg-4" id="mulai-input" style="display:none">
		<x-label for="Mulai" :value="__('Mulai')" />
		<x-input required type="time" name="mulai" id="mulai" :value="old('mulai', $surat->mulai)" />
	</div>
	<div class="col-sm-12 col-12 col-md-6 col-lg-4" id="selesai-input" style="display:none">
		<x-label for="Selesai" :value="__('Selesai')" />
		<x-input type="time" name="selesai" id="selesai" :value="old('selesai', $surat->selesai)" />
	</div>
	<div class="col-sm-12 col-12 col-md-6 col-lg-4" id="tanggal-pelaksanaan-input" style="display:none">
		<x-label for="Tanggal Pelaksanaan" :value="__('Tanggal Pelaksanaan')" />
		<x-input required type="date" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan" :value="old('tanggal_pelaksanaan', $surat->tanggal_pelaksanaan)" />
	</div>
	<div class="col-sm-12 col-12 col-md-12 col-lg-12" id="tempat-input" style="display:none">
		<x-label for="Tempat" :value="__('Tempat')" />
		<x-input-text-area name="tempat" id="tempat" :placeholder="__('Tempat')" :value="old('tempat', $surat->tempat)" />
	</div>
	@endif

    @endif

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
				nomorSurat = 'B/{{$nosurat}}/II/KA/PC.01/2023/BNNP-Bali';
				break;
			case 'Bidang P2M Pemberdayaan Masyarakat':
				nomorSurat = 'B/{{$nosurat}}/II/KA/PM.01/2023/BNNP-Bali';
				break;
			case 'Bidang Rehabilitasi':
				nomorSurat = 'B/{{$nosurat}}/IV/Ka/KU.06.01/2023/BNNP-Bali';
				break;
			case 'Bidang Humas':
				nomorSurat = 'B/{{$nosurat}}/ll/Ka/BU.00.00/2023/BNNP-Bali';
				break;
			case 'Bidang Umum':
				nomorSurat = 'B/{{$nosurat}}/II/KA/KP.03.01/2023/BNNP-Bali';
				break;
			case 'Bidang Berantas':
				nomorSurat = 'B/{{$nosurat}}/IV/Ka/Pb.00/2023/BNNP-Bali';
				break;
		}
		
		// Update the value of the disabled input field
		document.getElementById('no_surat').value = nomorSurat;
		document.getElementById('nomor_surat').value = nomorSurat;
	}

	function toggleInputForm() {
    var mulaiInput = document.getElementById("mulai-input");
    var isiInput = document.getElementById("isi-input");
    var isiLain = document.getElementById("isi-lain");
	var rujukan = document.getElementById("rujukan");
	var kesimpulan = document.getElementById("kesimpulan");
    var selesaiInput = document.getElementById("selesai-input");
    var tanggalInput = document.getElementById("tanggal-pelaksanaan-input");
    var tempatInput = document.getElementById("tempat-input");
    var undanganRadio = document.getElementById("Undangan");
    var lainRadio = document.getElementById("Lain");
	var sebagaiInput = document.getElementById("sebagai");
	var topikInput = document.getElementById("topik");
	var kepadaInput = document.getElementById("kepada");

    if (undanganRadio.checked) {
        mulaiInput.style.display = "block";
        isiInput.style.display = "block";
		sebagaiInput.style.display = "block";
		topikInput.style.display = "block";
        isiLain.style.display = "none";
		rujukan.style.display = "none";
		kesimpulan.style.display = "none";
        selesaiInput.style.display = "block";
        tanggalInput.style.display = "block";
        tempatInput.style.display = "block";

        // Reset input values
        mulaiInput.querySelector('input[type="time"]').value = '';
        isiInput.querySelector('textarea').value = '';
        selesaiInput.querySelector('input[type="time"]').value = '';
        tanggalInput.querySelector('input[type="date"]').value = '';
        tempatInput.querySelector('textarea').value = '';
		
		//change class kepadainput
		kepadaInput.classList.remove("col-md-6", "col-lg-4");
    	kepadaInput.classList.add("col-md-6", "col-lg-6");

    } else {
        mulaiInput.style.display = "none";
        isiInput.style.display = "none";
        isiLain.style.display = "block";
		rujukan.style.display = "block";
		kesimpulan.style.display = "block";
        selesaiInput.style.display = "none";
        tanggalInput.style.display = "none";
        tempatInput.style.display = "none";
		sebagaiInput.style.display = "none";
		topikInput.style.display = "none";

        // Reset input values
        isiLain.querySelector('textarea').value = '';
		rujukan.querySelector('textarea').value = '';
		kesimpulan.querySelector('textarea').value = '';

		//change class kepadainput
		kepadaInput.classList.remove("col-md-6", "col-lg-6");
    	kepadaInput.classList.add("col-md-6", "col-lg-4");

		//Remove required
		tanggalInput.querySelector('input[type="date"]').required = false;
		mulaiInput.querySelector('input[type="time"]').required = false;
    }
}

    document.addEventListener('DOMContentLoaded', function() {
        const inputTanggalSurat = document.getElementById('tanggal_surat');
        
        // Mengambil data hari ini dengan  YYYY-MM-DD format
        const currentDate = new Date().toISOString().split('T')[0];
        
        // Set input tanggal surat
        inputTanggalSurat.value = currentDate;
    });
	</script>