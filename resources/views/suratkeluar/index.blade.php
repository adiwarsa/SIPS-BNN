<x-app-layout title="SIPS BNN - Surat Keluar">
    <x-breadcrumb
        :values="[__('Manajemen Surat'), __('Surat Keluar')]">
    </x-breadcrumb>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Surat Keluar') }}
            </h5>

            <div class="mb-4">
                <a href="#" class="btn btn-primary" id="createButton" data-bs-toggle="modal" data-bs-target="#createModal">
					{{ __('Buat baru') }}
				  </a>
            </div>

            @include('suratkeluar._partials.table')

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Buat Surat Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <a href="{{ route('suratkeluar.createsprint') }}" class="btn btn-primary">Surat Sprin</a>
					<a href="{{ route('suratkeluar.create') }}" class="btn btn-primary">Surat Biasa</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
<script>
	$(document).ready(function() {
		$('#createButton').on('click', function(e) {
			e.preventDefault();
			$('#createModal').modal('show');
		});
	});
</script>