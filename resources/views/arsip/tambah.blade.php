@extends('layout')
@section('isi')
<div class="content-wrapper" style="padding-left: 1%; background-color: white;">
	<section class="content-header" style="margin-bottom: -1%; padding-top: 4%; background-image: url('{{ asset('dist/img/peta.png') }}'); background-repeat: no-repeat; background-position: right bottom;">
		<h1 class="text-danger">
			ARSIP Surat >> Unggah
		</h1>
		<h4 style="padding-bottom: 6%; margin-top:1%">
			Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br/> Catatan:
			<ul>
				<li>Gunakan file berformat PDF</li>
			</ul>
		</h4>
		<ol class="breadcrumb" style="padding-top: 3%;">
			<li><a href="/"><i class="fa fa-dashboard"></i> Arsip</a></li>
			<li class="active">Tambah Arsip</li>
		</ol>
	</section>
	<section class="content">
		<div class="box box-danger">
            <!-- form start -->
            <form action="/" method="POST" class="form-horizontal" style="margin-top: 3%;" enctype="multipart/form-data">@csrf
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Surat</label>

                  <div class="col-sm-10 @error('nomor_surat') has-error @enderror">
                    <input type="text" class="form-control" placeholder="Masukkan Nomor Surat" name="nomor_surat">
					@error('nomor_surat')
						<span class="help-block">{{ $message }}</span>
					@enderror
                  </div>
                </div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Kategori</label>
					<div class="col-md-10">
						<select class="form-control" name="id_kategori">
							@foreach ($kategori as $k)
								<option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
							@endforeach
						</select>
					</div>
				</div>
                <div class="form-group">
					<label class="col-sm-2 control-label">Judul</label>
  
					<div class="col-sm-10 @error('judul') has-error @enderror"">
					  <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul">
					  @error('judul')
						<span class="help-block">{{ $message }}</span>
					@enderror
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">File Surat (PDF)</label>
  
					<div class="col-sm-10 @error('file_surat') has-error @enderror">
						<input type="file" class="form-control" accept="application/pdf" name="file_surat"/>
						@error('file_surat')
						<span class="help-block">{{ $message }}</span>
					@enderror
					</div>
				</div>
				</div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="/" class="btn btn-default">Kembali</a>
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