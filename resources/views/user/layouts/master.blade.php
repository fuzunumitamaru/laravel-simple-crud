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
            {{-- NAVBAR --}}
            @include('user.layouts.navbar')
            {{-- /navbar --}}

			<!-- Main Content -->
			<div class="main-content">
				@yield('content')
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

    <script>
        $(document).ready(function(){

            // LARAVEL CSRF VIA AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            // DELETE CONFIRMATION VIA SWEETALERT
            $('body').on('click', '.delete-item', function(event){
                event.preventDefault();
                let url = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete these records?  Deleted Records can be reviewed at 'Trashed'.  ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            success: function(data){
                                if(data.status == 'success'){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: data.message,
                                    }).then((result) => {
                                        window.location.reload();
                                    })
                                }else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Item cannot be deleted.',
                                        text: 'Try again.',
                                    })
                                }
                            },
                            error: function(xhr, status, error){
                                Swal.fire({
                                    icon: 'error',
                                    title: error,
                                    text: xhr.responseJSON.message,
                                })
                            }
                        })
                    }
                })
            })
            // /delete confirm


            // RESTORE CONFIRMATION VIA SWEETALERT
            $('body').on('click', '.restore-item', function(event){
                event.preventDefault();
                let url = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to restore these records?  ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, restore it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'PATCH',
                            url: url,
                            success: function(data){
                                if(data.status == 'success'){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Restored!',
                                        text: data.message,
                                    }).then((result) => {
                                        window.location.reload();
                                    })
                                }else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Item cannot be restored.',
                                        text: 'Try again.',
                                    })
                                }
                            },
                            error: function(xhr, status, error){
                                Swal.fire({
                                    icon: 'error',
                                    title: error,
                                    text: xhr.responseJSON.message,
                                })
                            }
                        })
                    }
                })
            })
            // /restore confirm


            // FORCE DELETE CONFIRMATION VIA SWEETALERT
            $('body').on('click', '.delete-permanent-item', function(event){
                event.preventDefault();
                let url = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to permanently remove these records?  You won't be able to revert this.   ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it permanently!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            success: function(data){
                                if(data.status == 'success'){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: data.message,
                                    }).then((result) => {
                                        window.location.reload();
                                    })
                                }else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Item cannot be deleted.',
                                        text: 'Try again.',
                                    })
                                }
                            },
                            error: function(xhr, status, error){
                                Swal.fire({
                                    icon: 'error',
                                    title: error,
                                    text: xhr.responseJSON.message,
                                })
                            }
                        })
                    }
                })
            })
            // /force dlete confirm
        })
    </script>
    @stack('scripts')
</body>
</html>
