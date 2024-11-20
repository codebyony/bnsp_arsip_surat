@extends('layout')
@section('isi')
<div class="content-wrapper" style="padding-left: 1%; background-color: white;">
	<section class="content-header" style="margin-bottom: -1%; padding-top: 4%; background-image: url('{{ asset('dist/img/peta.png') }}'); background-repeat: no-repeat; background-position: right bottom;">
		<h1 class="text-danger">
			ABOUT
		</h1>
		<h4 style="padding-bottom: 6%; margin-top:1%">
			Aplikasi ini dibuat oleh
		</h4>
		<ol class="breadcrumb" style="padding-top: 3%;">
			<li><a href="/about"><i class="fa fa-dashboard"></i> About</a></li>
		</ol>
	</section>
	<section class="content">
    <div class="box box-danger" style="padding: 3%">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/2041720029.png') }}" alt="User profile picture"><br/>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Nama</b> <span class="pull-right">ONY NOVIANTI</span>
          </li>
          <li class="list-group-item">
            <b>Prodi</b> <span class="pull-right">D4 Teknik Informatika</span>
          </li>
          <li class="list-group-item">
            <b>NIM</b> <span class="pull-right">2041720029</span>
          </li>
          <li class="list-group-item">
            <b>Tanggal</b> <span class="pull-right">11 Juli 2024</span>
          </li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
	</section>
</div>
@endsection