@extends('admin-panel.layout.app')

@section('title', 'Home')

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
                <h1>Home</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Nama Situs</h4>
                            </div>
                            <div class="card-body">
                                {{ $site_config->site_name ?? '-' }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Berita</h4>
                            </div>
                            <div class="card-body">
                                {{ $newsCount }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Dokumen</h4>
                            </div>
                            <div class="card-body">
                                {{ $documentCount }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                            <h2>Selamat datang, {{ auth()->user()->name }}</h2>
                            {{-- <p class="lead">Silahkan pilih menu di sebelah kiri @ceklevel('admin')
                                    atau dibawah
                                @endceklevel untuk mengatur situs</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('admin-panel.site-setting') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-header">
                    <h4>Pengaturan Situs</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-3">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="setting-situs" data-toggle="tab" href="#situs" role="tab" aria-controls="situs" aria-selected="true">Situs</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="setting-halaman-depan" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">Halaman Depan</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="setting-kontak" data-toggle="tab" href="#lokasi-kontak" role="tab" aria-controls="lokasi-kontak" aria-selected="false">Lokasi & Kontak</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-sm-12 col-md-9">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade show active" id="situs" role="tabpanel" aria-labelledby="setting-situs">
                                <div class="form-group">
                                    <label>Nama Situs</label>
                                    <input type="text" class="form-control" name="site_name" value="{{ $site_config->site_name ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Logo Situs</label>
                                    <input type="text" class="form-control" name="site_logo" value="{{ $site_config->site_logo ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Situs</label>
                                    <input type="text" class="form-control" name="site_description" value="{{ $site_config->site_description ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Hari Kerja</label>
                                    <input type="text" class="form-control" name="site_workdays" value="{{ $site_config->site_workdays ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Sambutan Pimpinan</label>
                                    <textarea name="site_welcome" id="" cols="30" rows="30" class="form-control summernote">{{ $site_cofig->site_welcome ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="setting-halaman-depan">
                                <div class="form-group">
                                    <label>Video Halaman Depan</label>
                                    <input type="text" class="form-control" name="media_home_video" value="{{ $site_config->media_home_video ?? '' }}">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="lokasi-kontak" role="tabpanel" aria-labelledby="setting-kontak">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="contact_address" value="{{ $site_config->contact_address ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" class="form-control" name="contact_phone" value="{{ $site_config->contact_phone ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="text" class="form-control" name="contact_email" value="{{ $site_config->contact_email ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Kantor (Latitude, Longitude)</label>
                                    <input type="text" class="form-control" name="contact_latlng" value="{{ $site_config->contact_latlng ?? '' }}">
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" value="Simpan" class="btn btn-primary"></input>
                  </div>
                </div>
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
