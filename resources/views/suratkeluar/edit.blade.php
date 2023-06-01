<x-app-layout title="SIPS BNN - Edit Surat Keluar">
    <x-breadcrumb
        :values="[__('Manajemen Surat'), __('Surat Keluar'), __('Edit Surat')]">
    </x-breadcrumb>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Edit Surat Keluar') }}
            </h5>

            <div class="mb-4">
                <a href="{{ route('suratkeluar.index') }}" class="btn btn-dark">
                    {{ __('Kembali') }}
                </a>
            </div>
            @if ($surat->type == 'Sprin')
            @include('suratkeluar._partials.formsprint')
            @else
            @include('suratkeluar._partials.form')
            @endif
        </div>
    </div>
</x-app-layout>