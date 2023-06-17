@extends('admin-panel.layout.app')

@section('title', 'Tambah Akun')

@push('addon-style')
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/selectric/public/selectric.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/summernote/dist/summernote-bs4.css') }}">
    <style>
    .select2-selection__choice__display {
        padding-left: 20px !important;
        color: #504d4d;
    }
    </style>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Akun</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Akun</div>
                    <div class="breadcrumb-item active">Tambah Akun</div>
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
                    <form action="{{ route('admin-panel.user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Akun</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama"
                                        name="name" id="name" value="{{ old('name') }}">
                                </div>
								<div class="form-group">
									<label for="level">Level <span class="text-danger">*</span></label>
									<select name="level" id="level" class="form-control">
										<option selected hidden>--- Pilih Level ---</option>
										<option value="admin">Admin</option>
										<option value="user">User</option>
									</select>
								</div>
                                <div class="form-group">
									<label for="level">Akses Situs <span class="text-danger">*</span></label>
									<select class="select2-sites" name="sites[]" multiple="multiple">
                                        <option value="*">Semua Situs</option>
                                        @foreach($sites as $site)
                                            <option value="{{ $site->app_id }}">{{ $site->name }}</option>
                                        @endforeach
                                    </select>
								</div>
								<div class="form-group">
									<label for="email">Email <span class="text-danger">*</span></label>
									<input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email">
								</div>
								<div class="form-group">
									<label for="password">Password <span class="text-danger">*</span></label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
								</div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.user.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('addon-script')
	<script type="text/javascript">
        $(document).ready(function() {
            $('.select2-sites').select2();
        });
    </script>
@endpush