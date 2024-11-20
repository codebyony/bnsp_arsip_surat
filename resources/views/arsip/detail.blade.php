@extends('layout')
@section('isi')
<div class="content-wrapper" style="padding-left: 1%; background-color: white;">
	<section class="content-header" style="margin-bottom: -1%; padding-top: 4%; background-image: url('{{ asset('dist/img/peta.png') }}'); background-repeat: no-repeat; background-position: right bottom;">
		<h1 class="text-danger">
			ARSIP SURAT  >>  Lihat
		</h1>
		<div class="row" style="padding-bottom: 6%; margin-top:1%; padding-left:2%;">
            <table class="table-responsive">
                <tr>
                    <td>Nomor</td>
                    <td>: &nbsp;</td>
                    <td>{{ $item->nomor_surat }}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>: </td>
                    <td>{{ $item->kategori->nama_kategori }}</td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>: </td>
                    <td>{{ $item->judul }}</td>
                </tr>
                <tr>
                    <td>Waktu Unggah</td>
                    <td>: </td>
                    <td>{{ $item->waktu_pengarsipan }}</td>
                </tr>
            </table>
        </div>
		<ol class="breadcrumb" style="padding-top: 3%;">
			<li><a href="/"><i class="fa fa-dashboard"></i> Arsip</a></li>
			<li class="active">Detail Arsip</li>
		</ol>
	</section>
	<section class="content">
        @if (\Session::has('edit_success'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! \Session::get('edit_success') !!}
            </div>
          @endif
            <div class="row justify-content-center">
                <embed src="{{ asset($item->file_surat) }}" width="100%" height="700">
            </div>
            <div class="row" style="margin-top: 1%">
                <div class="col-md-1">
                    <a href="/" class="btn btn-default">Kembali</a>
                </div>
                <div class="col-md-3 pull-right text-right">
                <a href="/download/{{ $item->nomor_surat }}"class="btn btn-warning">Unduh</a>
                <a href="/edit/{{ $item->nomor_surat }}" class="btn btn-primary">Edit/Ganti File</a>
                </div>
            </div>
	</section>
</div>
@endsection