@extends('admin-panel.layout.app')

@section('title', 'Edit Jurusan')

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
                <h1>Edit Jurusan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Jurusan</div>
                    <div class="breadcrumb-item active">Edit Jurusan</div>
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
                    <form action="{{ route('admin-panel.major.update', $major->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
						@method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Jurusan</h4>
                            </div>
                            <div class="card-body">
								<div class="d-flex justify-content-center">
                                    <img src="{{ $major->cover_image }}" style="max-height:400px;" id="cover_image_preview" alt="Sampul Jurusan">
                                </div>
                                <div class="form-group">
                                    <label for="">Sampul Jurusan</label>
                                    <input type="file" class="form-control" name="cover_image" id="cover_image" value="">
                                    <small class="text-muted">Sampul Jurusan harus berupa file gambar(JPG, JPEG, PNG)</small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Jurusan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama jurusan"
                                        name="name" id="name" value="{{ $major->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="level">Jenjang Karir <span class="text-danger">*</span></label>
                                    <select name="level" id="level" class="form-control select2">
										<option value="S1" {{ $major->level == 'S1' ? 'selected' : '' }}>S1</option>
										<option value="S2" {{ $major->level == 'S2' ? 'selected' : '' }}>S2</option>
										<option value="S3" {{ $major->level == 'S3' ? 'selected' : '' }}>S3</option>
									</select>
                                </div>
								<div class="form-group">
									<label for="page_content">Konten Halaman <span class="text-danger">*</span></label>
									<textarea class="summernote" name="page_content" id="page_content">{!! $major->page_content !!}</textarea>
								</div>
								<div class="form-group">
									<label for="total_credit">Jumlah SKS <span class="text-danger">*</span></label>
									<input type="number" class="form-control" name="total_credit" id="total_credit" value="{{ $major->total_credit }}">
								</div>
								<div class="form-group">
									<label for="certification_number">Nomor Sertifikasi <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="certification_number" id="certification_number" value="{{ $major->certification_number }}">
								</div>
								<div class="form-group">
									<label for="pddikti_url">Tautan PDDIKTI <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="pddikti_url" id="pddikti_url" value="{{ $major->pddikti_url }}">
								</div>
                                <div class="form-group">
                                    <label for="accreditation">Akreditasi<span class="text-danger">*</span></label>
                                    <select name="accreditation" id="accreditation" class="form-control select2">
										<option value="A" {{ $major->accreditation == 'A' ? 'selected' : '' }}>A</option>
										<option value="B" {{ $major->accreditation == 'B' ? 'selected' : '' }}>B</option>
										<option value="C" {{ $major->accreditation == 'C' ? 'selected' : '' }}>C</option>
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
