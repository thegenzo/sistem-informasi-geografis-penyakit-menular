@extends('admin-panel.layout.app')

@section('title', 'Edit Menu')

@push('addon-style')
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/selectric/public/selectric.css') }}">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@if($menu->parent == null) Edit Menu @else Edit Sub Menu @endif</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Menu</div>
                    <div class="breadcrumb-item active">@if($menu->parent == null) Edit Menu @else Edit Sub Menu @endif</div>
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
                    <form action="{{ route('admin-panel.menu.update', $menu->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
						@method('PUT')
                        <div class="card">
                            <div class="card-header">
                                @if($menu->parent == null)
                                <h4>Masukkan Data Menu</h4>
                                @else
                                <h4>Masukkan Data Sub-Menu</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nama Menu</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama menu" name="name" id="name" value="{{ $menu->name }}">
                                </div>
                                @if($menu->level == 1)
                                <div class="form-group">
                                    <label>Parent Menu</label>
                                    <select name="parent" class="form-control selectric">
                                        <option value="null" {{ $menu->parent == null ? 'selected' : '' }}>-- Tidak Ada--</option>
                                        @foreach($allParent as $parent)
                                        <option value="{{ $parent->id }}" {{ $menu->parent == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Tipe Menu</label>
                                    <select name="type" class="form-control selectric">
                                            <option value="route" {{ $menu->type == 'route' ? 'selected' : '' }}>Route</option>
                                            <option value="page" {{ $menu->type == 'page' ? 'selected' : '' }}>Halaman</option>
                                            <option value="link" {{ $menu->type == 'link' ? 'selected' : '' }}>Tautan</option>
                                            @if($menu->level == 0)
                                            <option value="dropdown" {{ $menu->type == 'dropdown' ? 'selected' : '' }}>Sub-Menu</option>
                                            @endif
                                    </select>
                                </div>
                                @if($menu->type == 'route')
                                <div class="form-group">
                                <label>Target Route</label>
                                <select name="target" class="form-control selectric">
                                    @foreach($allRoutes as $route)
                                    @if(!empty($route->getName()))
                                        <option value="{{ $route->getName() }}" {{ $menu->target == $route->getName() ? 'selected' : '' }}>{{ $route->getName() }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                </div>
                                @endif
                                @if($menu->type == 'page')
                                <div class="form-group">
                                <label>Target Halaman</label>
                                <select name="target" class="form-control selectric">
                                    @foreach($allPages as $page)
                                    <option value="{{ $page->id }}" {{ $menu->target == $page->id ? 'selected' : '' }}>{{ $page->title }}</option>
                                    @endforeach
                                </select>
                                </div>
                                @endif
                                @if($menu->type == 'link')
                                <div class="form-group">
                                    <label for="">Tautan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan link tautan" name="target" id="target" value="{{ $menu->target }}">
                                </div>
                                @endif
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
@endpush
