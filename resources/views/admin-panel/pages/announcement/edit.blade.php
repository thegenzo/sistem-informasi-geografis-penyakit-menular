@extends('admin-panel.layout.app')

@section('title', 'Edit Pengumuman')

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
                <h1>Edit Pengumuman</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Pengumuman</div>
                    <div class="breadcrumb-item active">Edit Pengumuman</div>
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
                    <form action="{{ route('admin-panel.announcement.update', $announcement->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Pengumuman</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Judul Pengumuman <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ $announcement->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="content">Konten Pengumuman <span class="text-danger">*</span></label>
                                    <textarea class="summernote" name="content" id="content">{!! $announcement->content !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control select2">
                                        <option value="draft" {{ $announcement->status == 'draft' ? 'selected' : '' }}>
                                            Diarsipkan</option>
                                        <option value="published"
                                            {{ $announcement->status == 'published' ? 'selected' : '' }}>Publikasi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.announcement.index') }}"
                            class="btn btn-lg btn-warning d-inline">Kembali</a>
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
