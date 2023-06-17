@extends('admin-panel.layout.app')

@section('title', 'Edit Galeri')

@push('addon-style')
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/selectric/public/selectric.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('panel-assets/node_modules/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('panel-assets/node_modules/codemirror/theme/duotone-dark.css') }}">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Galeri</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Galeri</div>
                    <div class="breadcrumb-item active">Edit Galeri</div>
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
                    <form action="{{ route('admin-panel.gallery.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
						@method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Galeri</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ $gallery->url }}" style="max-height:400px;" id="gallery_image_preview" alt="Gambar Galeri">
                                </div>
                                <div class="form-group">
                                    <label for="">Upload Gambar </label>
                                    <input type="file" class="form-control" name="file" id="file" value="">
                                    <small class="text-muted">Gambar Galeri harus berupa file gambar (JPG, JPEG, PNG)</small>
                                </div>
                                <div class="form-group">
									<label for="category">Kategori Galeri <span class="text-danger">*</span></label>
									<select name="category" id="category" class="form-control select2">
										<option value="kegiatan" {{ $gallery->category == "kegiatan" ? 'selected' : '' }}>Kegiatan</option>
										<option value="profil" {{ $gallery->category == "profil" ? 'selected' : '' }}>Profil</option>
										<option value="ruangan" {{ $gallery->category == "ruangan" ? 'selected' : '' }}>Ruangan</option>
									</select>
								</div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.gallery.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
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
    <script src="{{ asset('panel-assets/node_modules/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('panel-assets/node_modules/codemirror/mode/javascript/javascript.js') }}"></script>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#gallery_image_preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function(){
        readURL(this);
    });
    </script>
@endpush
