<x-auth-layout title="SIPS BNN - Masuk">
	<h4 class="mb-2 text-center">{{ __('Selamat Datang! 👋') }}</h4>
	<p class="mb-4 text-center">
		{{ __('Silahkan masuk terlebih dahulu untuk melanjutkan') }}
	</p>

	<form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
		@csrf
		<div class="mb-3">
			<x-label for="email" :value="__('Email')" />
			<x-input type="text" name="email" id="email" :value="old('email')" :placeholder="__('Masukkan email')" autofocus />
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
		<div class="mb-3">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : ''}} />
				<label class="form-check-label" for="remember">
					{{ __('Ingat saya') }}
				</label>
			</div>
		</div>
		<div class="mb-3">
			<x-button type="submit" class="btn btn-primary d-grid w-100" :value="__('Masuk')" onClickDisabled />
		</div>
	</form>

	@if(Route::has('register'))
	<p class="text-center">
		<span>{{ __('Belum mempunyai akun?') }}</span>
		<a href="{{ route('register') }}">
			<span>{{ __('Daftar!') }}</span>
		</a>
	</p>
	@endif
</x-auth-layout>