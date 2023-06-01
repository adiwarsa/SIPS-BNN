<form action="{{ $pegawai->id ? route('pegawai.update', $pegawai->id) : route('pegawai.store') }}" method="POST">
	@csrf

	@if($pegawai->id)
	@method("PUT")
	@endif

	<div class="mb-3">
		<x-label for="nama" :value="__('Nama')" />
		<x-input type="text" name="nama" id="nama" :placeholder="__('Nama')" :value="old('nama', $pegawai->nama)" autofocus />
	</div>

	<div class="mb-3">
		<x-label for="Jabatan" :value="__('Jabatan')" />
		<x-input type="Jabatan" name="jabatan" id="jabatan" :placeholder="__('Jabatan')" :value="old('Jabatan', $pegawai->jabatan)" />
	</div>

    <div class="mb-3">
		<x-label for="NIP" :value="__('NIP')" />
		<x-input type="NIP" name="nip" id="nip" :placeholder="__('NIP')" :value="old('NIP', $pegawai->nip)" />
	</div>
	<div class="mb-3">
		<x-label for="status" :value="__('status')" />
		<select class="form-select" id="status" name="status">
				<option value="ASN"
					{{ $pegawai->status == 'ASN' ? 'selected' : '' }}>
					ASN
				</option>
				<option value="Kontrak"
					{{ $pegawai->status == 'Kontrak' ? 'selected' : '' }}>
					Kontrak
				</option>
		</select>
	</div>

	<div class="text-end">
		<x-button type="submit" class="btn btn-primary" :value="$pegawai->id ? __('Ubah') : __('Simpan')" />
	</div>
</form>