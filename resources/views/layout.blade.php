<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{ $judul }}</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/Ionicons/css/ionicons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/dist/css/AdminLTE.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/dist/css/skins/_all-skins.min.css') }}">
		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}
	</head>
	<body class="hold-transition skin-red sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<a href="{{ asset('/index2.html') }}" class="logo">
				<span class="logo-mini"><b>A</b>S</span>
				<span class="logo-lg"><b>Arsip</b>Surat</span>
				</a>
				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</a>
				</nav>
			</header>
			<aside class="main-sidebar">
				<section class="sidebar">
					<div class="user-panel" style="margin-top: 20%; margin-bottom: 20%;">
						<div class="pull-left image">
							<img src="{{ asset('/dist/img/garuda.png') }}" class="img-circle" alt="User Image">
						</div>
						<div class="pull-left info">
							<p>Desa Karangduren</p>
							<a href="#"></i> Kecamatan Pakisaji</a>
						</div>
					</div>
					<ul class="sidebar-menu" data-widget="tree" style="margin-top: 1%;">
						<li class="header">MENU</li>
						<li class="{{ $menu=='Arsip' ? 'active' : '' }}">
							<a href="/">
							<i class="fa fa-files-o"></i>
							<span>Arsip</span>
							</a>
						</li>
						<li class="{{ $menu=='Kategori' ? 'active' : '' }}">
							<a href="/kategori">
							<i class="fa fa-list-ul"></i>
							<span>Kategori Surat</span>
							</a>
						</li>
						<li class="{{ $menu=='About' ? 'active' : '' }}">
							<a href="/about">
							<i class="fa fa-info-circle"></i>
							<span>About</span>
							</a>
						</li>
					</ul>
				</section>
			</aside>
			@yield('isi')
		</div>
		<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
		<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
		<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
		<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
		<script src="{{ asset('dist/js/demo.js') }}"></script>
		<script>
			$(document).ready(function () {
			  $('.sidebar-menu').tree()
			})
			$(function () {
				$('#example1').DataTable({
				'paging'      : true,
				'lengthChange': false,
				'searching'   : false,
				'ordering'    : true,
				'info'        : true,
				'autoWidth'   : false
				})
			})
			$(document).on("click", "#btn-delete", function () {
				var nomor_surat = $(this).data('nomor_surat');
				$("#hapus_form").attr("action", '/'+nomor_surat);
			});
			$(document).on("click", "#btn-delete-kategori", function () {
				var nomor_surat = $(this).data('nomor_surat');
				$("#hapus_form").attr("action", '/kategori/'+nomor_surat);
			});
		</script>
	</body>
</html>