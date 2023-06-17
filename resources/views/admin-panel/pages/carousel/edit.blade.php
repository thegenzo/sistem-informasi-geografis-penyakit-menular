@extends('admin-panel.layout.app')

@section('title', 'Edit Carousel')

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
                <h1>Edit Carousel</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Carousel</div>
                    <div class="breadcrumb-item active">Edit Carousel</div>
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
                    <form action="{{ route('admin-panel.carousel.update', $carousel->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
						@method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Carousel</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ $carousel->banner_image }}" style="max-height:400px;" id="banner_image_preview" alt="Gambar Banner">
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Banner</label>
                                    <input type="file" class="form-control" name="banner_image" id="banner_image" value="">
                                    <small class="text-muted">Gambar Banner harus berupa file gambar(JPG, JPEG, PNG)</small>
                                </div>
                                <div class="form-group">
                                    <label for="url">Banner HTML (Blade Template) <span class="text-danger">*</span></label>
                                    <textarea name="banner_html" id="banner_html" class="form-control codeeditor">{!! $carousel->banner_html !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Link</label>
                                    <select name="link_type" class="form-control" id="type-selector">
                                            <option value="">-- Pilih Tipe Link --</option>
                                            <option value="route" {{ $carousel->link_type == "route" ? 'selected' : '' }}>Route</option>
                                            <option value="page" {{ $carousel->link_type == "page" ? 'selected' : '' }}>Halaman</option>
                                            <option value="news" {{ $carousel->link_type == "news" ? 'selected' : '' }}>Berita</option>
                                    </select>
                                </div>
                                <div class="form-group link-target" id="target-route">
                                    <label>Target Route</label>
                                    <select name="target_route" class="form-control selectric">
                                        <option value="">-- Pilih Route --</option>
                                        @foreach($allRoutes as $route)
                                                @if(!empty($route->getName()))
                                                    <option value="{{ $route->getName() }}" @if($carousel->link_type == 'route') {{ $carousel->link_target == $route->getName() ? 'selected' : '' }} @endif>{{ $route->getName() }}</option>
                                                @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group link-target" id="target-page">
                                    <label>Target Halaman</label>
                                    <select name="target_page" class="form-control selectric">
                                        <option value="">-- Pilih Halaman --</option>
                                        @foreach($allPages as $page)
                                        <option value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group link-target" id="target-news">
                                    <label>Target Berita</label>
                                    <select name="target_news" class="form-control selectric">
                                        <option value="">-- Pilih Berita --</option>
                                        @foreach($allNewses as $news)
                                        <option value="{{ $news->id }}">{{ $news->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="link_title">Judul Link <span class="text-danger">*</span></label>
                                    <input type="text" name="link_title" id="link_title" class="form-control" placeholder="Masukkan Judul Link" value="{{ $carousel->link_title }}">
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.carousel.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
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
    <script src="{{ asset('panel-assets/node_modules/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('panel-assets/node_modules/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('panel-assets/node_modules/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#banner_image_preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#banner_image").change(function(){
        readURL(this);
    });
    $(document).ready(function() {
        $(".link-target").hide();
        $("#target-{{ $carousel->link_type}}").show();
        // Initialize Selectric and bind to 'change' event
        $('#type-selector').selectric().on('change', function() {
            $(".link-target").hide();
            $("#target-" + $(this).val()).show();
        });
    });
    </script>
@endpush
