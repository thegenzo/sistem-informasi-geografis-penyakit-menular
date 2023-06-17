@extends('admin-panel.layout.app')

@section('title', 'Tambah Dokumen')

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
                <h1>Tambah Dokumen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Dokumen</div>
                    <div class="breadcrumb-item active">Tambah Dokumen</div>
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
                    <form action="{{ route('admin-panel.document.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Dokumen</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Dokumen <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Dokumen" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi Dokumen <span class="text-danger">*</span></label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Masukkan Deskripsi Dokumen" value="{{ old('description') }}">
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Tipe Dokumen</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type_upload" value="file" checked>
                                        <label class="form-check-label" for="type_upload">
                                        File Upload
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" value="url" id="type_url">
                                        <label class="form-check-label" for="type_url">
                                        Link / URL
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" id="file_upload">
                                    <label for="">Upload Dokumen <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file" id="file" value="">
                                    <small class="text-muted">Dokumen harus berupa file (WORD, PPT, PDF, EXCEL)</small>
                                </div>
                                <div class="form-group" id="url_input" style="display: none">
                                    <label for="">Link / URL <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="url"value="">
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.document.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('input:radio[name="type"]').change(function(){
                if ($(this).is(':checked')) {
                    if($(this).val() == 'file'){
                        $("#url_input").hide();
                        $("#file_upload").show();
                    }
                    if($(this).val() == 'url'){
                        $("#file_upload").hide();
                        $("#url_input").show();
                    }
                }
            });
        })
    </script>
@endpush
