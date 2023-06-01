<x-auth-layout title="SIPS BNN - Daftar">
	<h4 class="mb-2">
		{{ __('Daftar 🚀') }}
	</h4>
	<p class="mb-4">
		{{ __('Silahkan isi data dengan benar!') }}
	</p>

	<form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
		@csrf
		<div class="mb-3">
			<x-label for="nama" :value="__('Name')" />
			<x-input type="text" name="name" id="name" :placeholder="__('Nama')" :value="old('name')" autofocus />
			<x-invalid error="name" />
		</div>
		<div class="mb-3">
			<x-label for="email" :value="__('Email')" />
			<x-input type="email" name="email" id="email" :placeholder="__('Email')" :value="old('email')" />
			<x-invalid error="email" />
		</div>
		<div class="mb-3 form-password-toggle">
			<div class="d-flex justify-content-between">
				<x-label for="password" :value="__('Password')" />
			</div>
			<div class="input-group input-group-merge">
				<x-input type="password" name="password" id="password" :placeholder="__('Password')" aria-describedby="password" />
				<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
				<x-invalid error="password" />
			</div>
		</div>
		<div class="mb-3 form-password-toggle">
			<div class="d-flex justify-content-between">
				<x-label for="password_confirmation" :value="__('Konfirmasi password')" />
			</div>
			<div class="input-group input-group-merge">
				<x-input type="password" name="password_confirmation" id="password_confirmation" :placeholder="__('Password confirmation')" aria-describedby="password" />
				<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
				<x-invalid error="password_confirmation" />
			</div>
		</div>
		<div class="mb-3">
			<div class="form-check">
				<input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" id="terms-conditions" name="terms" {{ old('terms') ? 'checked' : '' }}>
				<label class="form-check-label" for="terms-conditions">
					{{ __('Saya setuju dengan') }}
					<a href="javascript:void(0);">{{ __('syarat & ketentuan') }}</a>
				</label>
				<x-invalid error="terms" />
			</div>
		</div>
		<div class="mb-3">
			<x-button type="submit" class="btn btn-primary d-grid w-100" :value="__('Sign up')" onClickDisabled />
		</div>

		@if(Route::has('login'))
		<p class="text-center">
			<span>{{ __('Sudah mempunyai akun?') }}</span>
			<a href="{{ route('login') }}">
				<span>{{ __('Masuk sekarang!') }}</span>
			</a>
		</p>
		@endif
	</form>
</x-auth-layout>