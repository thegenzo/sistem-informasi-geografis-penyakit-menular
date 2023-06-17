@extends('admin-panel.layout.app')

@section('title', 'Tambah Jurusan')

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
                <h1>Tambah Jurusan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Jurusan</div>
                    <div class="breadcrumb-item active">Tambah Jurusan</div>
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
                    <form action="{{ route('admin-panel.major.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Jurusan</h4>
                            </div>
                            <div class="card-body">
								<div class="d-flex justify-content-center">
                                    <img src="https://via.placeholder.com/1920x780.jpg?text=1920x780" style="max-height:400px;" id="cover_image_preview" alt="Gambar Banner">
                                </div>
                                <div class="form-group">
                                    <label for="">Sampul Jurusan <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="cover_image" id="cover_image" value="">
                                    <small class="text-muted">Sampul Jurusan harus berupa file gambar(JPG, JPEG, PNG)</small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Jurusan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama jurusan"
                                        name="name" id="name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="level">Jenjang Karir <span class="text-danger">*</span></label>
                                    <select name="level" id="level" class="form-control select2">
										<option value="" selected hidden>--- Pilih jenjang karir ---</option>
										<option value="S1">S1</option>
										<option value="S2">S2</option>
										<option value="S3">S3</option>
									</select>
                                </div>
								<div class="form-group">
									<label for="page_content">Konten Halaman <span class="text-danger">*</span></label>
									<textarea class="summernote" name="page_content" id="page_content">{{ old('page_content') }}</textarea>
								</div>
								<div class="form-group">
									<label for="total_credit">Jumlah SKS <span class="text-danger">*</span></label>
									<input type="number" class="form-control" name="total_credit" id="total_credit" placeholder="Masukkan jumlah SKS" value="{{ old('total_credit') }}">
								</div>
								<div class="form-group">
									<label for="certification_number">Nomor Sertifikasi <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="certification_number" id="certification_number" placeholder="Masukkan nomor sertifikasi" value="{{ old('certification_number') }}">
								</div>
								<div class="form-group">
									<label for="pddikti_url">Tautan PDDIKTI <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="pddikti_url" id="pddikti_url" placeholder="Masukkan tautan PDDIKTI" value="{{ old('pddikti_url') }}">
								</div>
                                <div class="form-group">
                                    <label for="accreditation">Akreditasi<span class="text-danger">*</span></label>
                                    <select name="accreditation" id="accreditation" class="form-control select2">
										<option value="" selected hidden>--- Pilih Akreditasi ---</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
									</select>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.major.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
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
