@extends('layout')
@section('isi')
<div class="content-wrapper" style="padding-left: 1%; background-color: white;">
	<section class="content-header" style="margin-bottom: -1%; padding-top: 4%; background-image: url('{{ asset('dist/img/peta.png') }}'); background-repeat: no-repeat; background-position: right bottom;">
		<h1 class="text-danger">
			KATEGORI SURAT >> Edit
		</h1>
		<h4 style="padding-bottom: 6%; margin-top:1%">
			Edit kategori yang telah ditambahkkan pada sistem ini untuk diubah. 
		</h4>
		<ol class="breadcrumb" style="padding-top: 3%;">
			<li><a href="/kategori"><i class="fa fa-dashboard"></i> Kategori Surat</a></li>
			<li class="active">Edit Kategori</li>
		</ol>
	</section>
	<section class="content">
		<div class="box box-danger">
            <!-- form start -->
            <form action="/kategori/{{ $item->id }}" method="POST" class="form-horizontal" style="margin-top: 3%;" enctype="multipart/form-data">@csrf
				@method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID</label>

                  <div class="col-sm-10 @error('id') has-error @enderror">
                    <input type="text" class="form-control" placeholder="Masukkan Nomor Surat" name="id" value="{{ $item->id }}" readonly>
					@error('id')
						<span class="help-block">{{ $message }}</span>
					@enderror
                  </div>
                </div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Nama Kategori</label>
  
					<div class="col-sm-10 @error('nama_kategori') has-error @enderror">
					  <input type="text" class="form-control" placeholder="Masukkan Nomor Surat" name="nama_kategori" value="{{ $item->nama_kategori }}">
					  @error('nama_kategori')
						  <span class="help-block">{{ $message }}</span>
					  @enderror
					</div>
				  </div>
                <div class="form-group">
					<label class="col-sm-2 control-label">Keterangan</label>
  
					<div class="col-sm-10 @error('keterangan') has-error @enderror">
					  <input type="text" class="form-control" placeholder="Masukkan keterangan" name="keterangan" value="{{ $item->keterangan }}">
					  @error('keterangan')
						<span class="help-block">{{ $message }}</span>
					@enderror
					</div>
				</div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="/kategori" class="btn btn-default">Kembali</a>
                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
			<!-- /.box-footer-->
		</div>
	</section>
</div>
@endsection