<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo justify-content-center">
		<img style="max-width: 100%; max-height: 100%;" src="{{ asset('assets/img/elements/bnn.png') }}" alt="">
	</div>

	<div class="menu-inner-shadow"></div>

	<ul class="menu-inner py-1 mt-2">

		<!-- Dashboard -->
		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">
				{{ __('Dashboard') }}
			</span>
		</li>
		
		<li class="menu-item {{ menuIsActive('home') }}">
			<a href="{{ route('home') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-home-circle"></i>
				<div data-i18n="Analytics">
					{{ __('Dashboard') }}
				</div>
			</a>
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">
				{{ __('Manajemen User') }}
			</span>
		</li>

		<li class="menu-item {{ menuIsActive('users.*') }}">
			<a href="{{ route('users.index') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-user"></i>
				<div data-i18n="User">
					{{ __('User') }}
				</div>
			</a>
		</li>

		<li class="menu-item {{ menuIsActive('pegawai.*') }}">
			<a href="{{ route('pegawai.index') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-face"></i>
				<div data-i18n="Pegawai">
					{{ __('Pegawai') }}
				</div>
			</a>
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">
				{{ __('Manajemen Surat') }}
			</span>
		</li>

		<li class="menu-item {{ menuIsActives(['suratmasuk.*', 'disposisi.*']) }}">
			<a href="{{ route('suratmasuk.index') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-envelope"></i>
				<div data-i18n="Surat Masuk">
					{{ __('Surat Masuk') }}
				</div>
			</a>
		</li>

		<li class="menu-item {{ menuIsActive('suratkeluar.*') }}">
			<a href="{{ route('suratkeluar.index') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-send"></i>
				<div data-i18n="Surat Keluar">
					{{ __('Surat Keluar') }}
				</div>
			</a>
		</li>
		<!-- <li class="menu-item">
			<a href="javascript:void(0);" class="menu-link menu-toggle">
				<i class="menu-icon tf-icons bx bx-cube-alt"></i>
				<div data-i18n="Misc">Misc</div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item">
					<a href="javascript:void(0);" class="menu-link">
						<div data-i18n="Error">Error</div>
					</a>
				</li>
			</ul>
		</li> -->

	</ul>
</aside>