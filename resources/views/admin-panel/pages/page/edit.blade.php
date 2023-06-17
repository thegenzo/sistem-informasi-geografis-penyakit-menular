@extends('admin-panel.layout.app')

@section('title', 'Edit Halaman')

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
                <h1>Edit Halaman</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Halaman</div>
                    <div class="breadcrumb-item active">Edit Halaman</div>
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
                    <form action="{{ route('admin-panel.page.update', $dataPage->id) }}" method="POST">
						@csrf
						@method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Halaman</h4>
                            </div>
                            <div class="card-body">
								<div class="form-group">
									<label for="category_id">Kategori <span class="text-danger">*</span></label>
									<select name="category_id" id="category_id" class="form-control select2">
										@foreach ($kategori as $data)
										<option value="{{ $data->id }}" {{ $data->id == $dataPage->id ? 'selected' : '' }}>{{ $data->name }}</option>
										@endforeach
									</select>
								</div>
                                <div class="form-group">
                                    <label for="title">Judul halaman <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $dataPage->title }}"
                                        name="title" id="title">
                                </div>
								<div class="form-group">
									<label for="page_content">Konten Halaman <span class="text-danger">*</span></label>
									<textarea class="summernote" name="page_content" id="page_content">{{ $dataPage->page_content }}</textarea>
								</div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.page.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
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
@endpush
