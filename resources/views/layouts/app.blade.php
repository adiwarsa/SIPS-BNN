<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('/') }}" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>{{ $title }}</title>

	<meta name="description" content="" />

	<!-- Icon -->
	<link rel="icon" href="https://denpasarkota.bnn.go.id/konten/unggahan/2019/03/cropped-bnn-512x512-100x100.png" sizes="32x32"/>
	<link rel="icon" href="https://denpasarkota.bnn.go.id/konten/unggahan/2019/03/cropped-bnn-512x512-300x300.png" sizes="192x192"/>
	<link rel="apple-touch-icon" href="https://denpasarkota.bnn.go.id/konten/unggahan/2019/03/cropped-bnn-512x512-300x300.png"/>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

	<!-- Icons. Uncomment required icon fonts -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

	<!-- Select2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	
	<!-- Core CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

	<!-- Vendors CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

	<!-- Datatable CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">


	<!-- Helpers -->
	<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="{{ asset('assets/js/config.js') }}"></script>
	
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			@include('layouts._partials.aside')
			<!-- End Menu -->

			<!-- Layout container -->
			<div class="layout-page">
				<!-- Navbar -->
				@include('layouts._partials.navbar')
				<!-- / Navbar -->

				<!-- Content wrapper -->
				<div class="content-wrapper">
					<!-- Content -->

					<div class="container-xxl flex-grow-1 container-p-y">
						<x-alert />
						{{ $slot }}
					</div>
					<!-- / Content -->

					<!-- Footer -->
					<footer class="content-footer footer bg-footer-theme">
						<div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
							<div class="mb-2 mb-md-0">
								&copy;
								<script>
									document.write(new Date().getFullYear());
								</script>
								SIPS BNN - Surat
							</div>
							<div>
								<!-- .footer-link -->
							</div>
						</div>
					</footer>
					<!-- / Footer -->

					<div class="content-backdrop fade"></div>
				</div>
				<!-- Content wrapper -->
			</div>
			<!-- / Layout page -->
		</div>

		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>
	<!-- / Layout wrapper -->

	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->
	<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
	<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
	<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
	<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
	<!-- endbuild -->

	
	<script src="{{ asset('assets/vendor/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

	<!-- Main JS -->
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"></script>

	

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
	
	<!-- Datatable -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#example').DataTable({
			
			});
		});
		$(document).ready(function() {
		$('.kepada-multiple').select2();
	});
	</script>
	@stack('js')
</body>

</html>