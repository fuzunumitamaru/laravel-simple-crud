<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name') }} </title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    {{-- CSS Libraries --}}

    {{-- DATATABLES --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
<!-- /END GA -->
</head>

<body class="layout-3">
	<div id="app">
		<div class="main-wrapper container">
			<div class="navbar-bg"></div>
{{-- TOP NAV --}}
<nav class="navbar navbar-expand-lg bg-primary">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto"></ul>

    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->firstname }} </div></a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-divider"></div>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </form>
          </div>
        </li>
      </ul>
    </div>
</nav>

{{-- TOP SUB-NAV --}}
<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
    <ul class="navbar-nav">
    </ul>
    </div>
</nav>




			<!-- Main Content -->
			<div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="card">
                            <div class="card-body">
                                {{ __("You're logged in!") }}
                            </div>
                        </div>
                    </div>
                </section>
			</div>

			<footer class="main-footer">
				<div class="footer-left">
				</div>
				<div class="footer-right">
				</div>
			</footer>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/modules/popper.js') }}"></script>
	<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
	<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
	<script src="{{ asset('assets/js/stisla.js') }}"></script>

	<!-- JS Libraies -->
	{{-- <script src="{{ asset('assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
	<script src="{{ asset('assets/modules/chart.min.js') }}"></script>
	<script src="{{ asset('assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
	<script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script> --}}
	<script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Page Specific JS File -->
	{{-- <script src="{{ asset('assets/js/page/index-0.js') }}"></script> --}}

	<!-- Template JS File -->
	<script src="{{ asset('assets/js/scripts.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"></script>

    @stack('scripts')
</body>
</html>
