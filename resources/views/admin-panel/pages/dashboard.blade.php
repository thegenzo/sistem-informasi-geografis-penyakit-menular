@extends('admin-panel.layout.app')

@section('title', 'Home')

@push('addon-style')
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
	<style>
		#map { height: 600px; }
	</style>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Home</h1>
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
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Data Kecamatan</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\District::count() }}
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
                                <h4>Total Data FASKES</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\HealthcareFacilities::count() }}
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
                                <h4>Total Data Penyakit</h4>
                            </div>
                            <div class="card-body">
                                {{ \App\Models\Disease::count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Persebaran Penyakit Menular Kota Baubau</h4>
                        </div>
                        <div class="card-body">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
    <!-- Initialize leaflet js map -->
    <script>
        var map = L.map('map').setView([-5.469706875781235, 122.59711751121827], 13.5);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // $.getJSON('/admin-panel/get-all-healthcares', function(data) {
        //     $.each(data, function (index) {
        //         L.marker([data[index].latitude, data[index].longitude]).addTo(map).on('click', function(e) {
        //             Swal.fire(
        //                 data[index].name,
        //                 'Laki-laki: 20, <br> Perempuan: 12'
        //             )
        //         });
        //     });
        // });

        $.getJSON('/admin-panel/get-all-districts', function(data) {
            $.each(data, function (index) {
                var dataCoords = JSON.parse(data[index].coordinates);
                L.polygon(dataCoords, { color: data[index].color }).addTo(map)
                    .bindPopup(data[index].name)
                    .on('mouseover', function(e) {
                        this.openPopup();
                    });
            });
        });

    </script>
    
    <!-- Loop healthcare facilities -->
    @foreach (\App\Models\HealthcareFacilities::all() as $healthcare)
        <script>
            L.marker([{{ $healthcare->latitude }}, {{ $healthcare->longitude }}]).addTo(map).on('click', function(e) {
                Swal.fire(
                    '{{ $healthcare->name }}',
                    `Total pasien dengan penyakit menular: <br>
                     Dewasa: L({{ $healthcare->cases()->where("age", "!=", "0 - 18")->where("gender", "male")->sum('total') }}), P({{ $healthcare->cases()->where("age", "!=", "0 - 18")->where("gender", "female")->sum('total') }}) <br>
                     Anak-anak: L+P({{ $healthcare->cases()->where("age", "=", "0 - 18")->sum('total') }}) <br>
					 <a href="{{ route('web.cases', $healthcare->id) }}" class="btn btn-sm btn-info" target="_blank">Lihat Data Pasien</a>
                    `
                )
            });
        </script>        
    @endforeach
@endpush