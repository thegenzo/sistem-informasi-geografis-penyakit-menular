@extends('admin-panel.layout.app')

@section('title', 'Tambah Berita')

@push('addon-style')
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/selectric/public/selectric.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Berita</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Berita</div>
                    <div class="breadcrumb-item active">Tambah Berita</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 col-12 col-sm-6">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-has-icon">
                            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Gagal Simpan Data</div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('admin-panel.news.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Berita</h4>
                            </div>
                            <div class="card-body">
								<div class="d-flex justify-content-center">
                                    <img src="https://via.placeholder.com/1920x780.jpg?text=1920x780" style="max-height:400px;" id="cover_image_preview" alt="Gambar Banner">
                                </div>
                                <div class="form-group">
                                    <label for="">Sampul Berita <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="cover_image" id="cover_image" value="">
                                    <small class="text-muted">Sampul Berita harus berupa file gambar(JPG, JPEG, PNG)</small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Judul Berita <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Masukkan judul berita"
                                        name="title" id="title" value="{{ old('title') }}">
                                </div>
								<div class="form-group">
									<label for="content">Konten Berita <span class="text-danger">*</span></label>
									<textarea class="summernote" name="content" id="content">{{ old('content') }}</textarea>
								</div>
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control select2">
										<option value="" selected hidden>--- Pilih Status ---</option>
										<option value="draft">Diarsipkan</option>
										<option value="published">Publikasi</option>
									</select>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.news.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
	<script src="{{ asset('panel-assets/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('panel-assets/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
	<script src="{{ asset('panel-assets/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$('#cover_image_preview').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#cover_image").change(function(){
			readURL(this);
		});
	</script>
@endpush
