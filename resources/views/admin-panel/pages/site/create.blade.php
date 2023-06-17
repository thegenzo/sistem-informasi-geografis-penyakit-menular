@extends('admin-panel.layout.app')

@section('title', 'Tambah Situs')

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
                <h1>Tambah Situs</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Situs</div>
                    <div class="breadcrumb-item active">Tambah Situs</div>
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
                    <form action="{{ route('admin-panel.site.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Situs</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama situs"
                                        name="name" id="name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Masukkan deskripsi Situs"
                                        name="description" id="description" value="{{ old('name') }}">
                                </div>
								<div class="form-group">
									<label for="app_id">App ID <span class="text-danger">*</span></label>
									<input type="text" name="app_id" id="app_id" class="form-control" placeholder="Masukkan Application ID (Huruf saja)" value="{{ old('app_id') }}">
								</div>
								<div class="form-group">
									<label for="url">URL <span class="text-danger">*</span></label>
									<input type="text" name="url" id="url" class="form-control" placeholder="Masukkan URL Situs" value="{{ old('url') }}">
								</div>
                                <div class="form-group">
									<label for="host">Host <span class="text-danger">*</span></label>
									<input type="text" name="host" id="host" class="form-control" placeholder="Masukkan Host Situs" value="{{ old('host') }}">
								</div>
                                <div class="form-group">
									<label for="db_name">Nama Database <span class="text-danger">*</span></label>
									<input type="text" name="db_name" id="db_name" class="form-control" placeholder="Masukkan Nama Database (Pastikan database telah dibuat)" value="{{ old('db_name') }}">
								</div>
                                <div class="form-group">
									<label for="db_name">Google Analytics Tag ID <span class="text-danger">*</span></label>
									<input type="text" name="gtag_id" id="gtag_id" class="form-control" placeholder="Masukkan Google Analytics Tag ID (Pastikan telah dibuat di google analytics console)" value="{{ old('gtag_id') }}">
								</div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.site.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
