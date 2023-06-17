@extends('admin-panel.layout.app')

@section('title', 'Tambah Menu')

@push('addon-style')
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/selectric/public/selectric.css') }}">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@if($isSubmenu == false) Tambah Menu @else Tambah Sub Menu @endif</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Menu</div>
                    <div class="breadcrumb-item active"> @if($isSubmenu == false) Tambah Menu @else Tambah Sub Menu @endif</div>
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
                    <form action="{{ route('admin-panel.menu.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                @if($isSubmenu == false)
                                <h4>Masukkan Data Menu</h4>
                                @else
                                <h4>Masukkan Data Sub-Menu</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                @if($isSubmenu == true)
                                <div class="form-group">
                                    <label>Parent Menu</label>
                                    <select name="parent" class="form-control selectric">
                                        <option value="null">-- Tidak Ada--</option>
                                        @foreach($allParent as $parent)
                                        <option value="{{ $parent->id }}" {{ $parent->id == $parent_id ? 'selected' : '' }}>{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                <input type="hidden" name="parent" value="">
                                @endif
                                <div class="form-group">
                                    <label for="">Nama Menu</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama menu" name="name" id="name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Tipe Menu</label>
                                    <select name="type" class="form-control" id="type-selector">
                                            <option value="">-- Pilih Tipe Menu --</option>
                                            <option value="route">Route</option>
                                            <option value="page">Halaman</option>
                                            <option value="link">Tautan</option>
                                            @if($isSubmenu == false)
                                                <option value="dropdown">Sub-Menu</option>
                                            @endif
                                    </select>
                                </div>
                                <div class="form-group menu-target" id="target-route">
                                    <label>Target Route</label>
                                    <select name="target_route" class="form-control selectric">
                                        <option value="">-- Pilih Route --</option>
                                        @foreach($allRoutes as $route)
                                        @if(!empty($route->getName()))
                                            <option value="{{ $route->getName() }}">{{ $route->getName() }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group menu-target" id="target-page">
                                    <label>Target Halaman</label>
                                    <select name="target_page" class="form-control selectric">
                                        <option value="">-- Pilih Halaman --</option>
                                        @foreach($allPages as $page)
                                        <option value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group menu-target" id="target-link">
                                    <label for="">Tautan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan link tautan" name="target_link" id="target_link" value="{{ old('target_link') }}">
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.menu.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
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
    <script>
        $(document).ready(function() {
            $(".menu-target").hide();
            // Initialize Selectric and bind to 'change' event
          $('#type-selector').selectric().on('change', function() {
            $(".menu-target").hide();
            $("#target-" + $(this).val()).show();
          });
        });
    </script>
@endpush
