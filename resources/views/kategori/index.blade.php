@extends('layout')
@section('isi')
<div class="content-wrapper" style="padding-left: 1%; background-color: white;">
	<section class="content-header" style="margin-bottom: -1%; padding-top: 4%; background-image: url('{{ asset('dist/img/peta.png') }}'); background-repeat: no-repeat; background-position: right bottom;">
		<h1 class="text-danger">
			KATEGORI SURAT
		</h1>
		<h4 style="padding-bottom: 6%; margin-top:1%">
			Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. <br />  Klik "Tambah Kategori Baru" pada untuk menambahkan kategori baru.
		</h4>
		<ol class="breadcrumb" style="padding-top: 3%;">
			<li><a href="/kategori"><i class="fa fa-dashboard"></i> Kategori</a></li>
		</ol>
	</section>
	<section class="content">
		<div class="box box-danger">
			<div class="box-header with-border">
        <div class="box-footer">
          <form action="/cari" method="GET">
          <div class="input-group col-md-offset-8">
            <input class="form-control" placeholder="Cari Kategori..." value="{{ Request::get('search') }}" name="search">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
          </form>
          </div>
        </div>
			</div>
			<div class="box-body">
        <div class="row">
          @if (\Session::has('kategori_input_success'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! \Session::get('kategori_input_success') !!}
            </div>
          @endif
          @if (\Session::has('kategori_edit_success'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! \Session::get('kategori_edit_success') !!}
            </div>
          @endif
          @if (\Session::has('kategori_delete_success'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! \Session::get('kategori_delete_success') !!}
            </div>
          @endif
          </div>
        </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($item as $i)
                        <tr>
                          <td>{{ $i->id }}</td>
                          <td>{{ $i->nama_kategori }}</td>
                          <td>{{ $i->keterangan }}</td>
                          <td>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete" data-nomor_surat={{ $i->id }} id="btn-delete-kategori">
                              Hapus
                            </button>
                            <a class="btn btn-sm btn-warning" href="/kategori/{{ $i->id }}/edit">Edit</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      </tfoot>
                    </table>
                  </div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
        <div class="col-md-3">
          <a href="/kategori/create" class="btn btn-block btn-primary btn-sm"><i class="fa fa-plus"></i> &nbsp; Tambah Kategori Baru</a></div>
			</div>
			<!-- /.box-footer-->
		</div>
	</section>
</div>
<div class="modal fade" id="modal-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus arsip surat ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <form id="hapus_form" method="POST"> @method('DELETE') @csrf
          <button class="btn btn-primary" type="submit">Ya!</a>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection