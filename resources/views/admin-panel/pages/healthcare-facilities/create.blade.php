@extends('admin-panel.layout.app')

@section('title', 'Tambah FASKES')

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('panel-assets/node_modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel-assets/node_modules/selectric/public/selectric.css') }}">
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css"
        integrity="sha512-gc3xjCmIy673V6MyOAZhIW93xhM9ei1I+gLbmFjUHIjocENRsLX/QUE1htk5q1XV2D/iie/VQ8DXI6Vu8bexvQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"
        integrity="sha512-ozq8xQKq6urvuU6jNgkfqAmT7jKN2XumbrX1JiB3TnF7tI48DPI4Gy1GXKD/V3EExgAs1V+pRO7vwtS1LHg0Gw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        #map {
            height: 600px;
        }
    </style>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah FASKES</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data FASKES</div>
                    <div class="breadcrumb-item active">Tambah FASKES</div>
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
                    <form action="{{ route('admin-panel.healthcare-facilities.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data FASKES</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Kecamatan <span class="text-danger">*</span></label>
                                    <select name="district_id" id="district_id" class="form-control select2">
										<option value="" hidden>--- Pilih Kecamatan ---</option>
										@forelse (\App\Models\District::all() as $data)
										<option value="{{ $data->id }}">{{ $data->name }}</option>
										@empty
										<option value="" disabled>Data Kecamatan Kosong</option>
										@endforelse
									</select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat <span class="text-danger">*</span></label>
                                    <textarea name="address" id="address" cols="30" rows="30" class="form-control">{{ old('address') }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="type">Tipe FASKES <span class="text-danger">*</span></label>
                                            <select name="type" id="type" class="form-control select2">
                                                <option value="" hidden>--- Pilih Tipe ---</option>
                                                <option value="public_health_center">PUSKESMAS</option>
                                                <option value="hospital">Rumah Sakit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_information">Informasi Kontak <span class="text-danger">*</span></label>
                                            <input type="number" name="contact_information" id="contact_information" class="form-control" value="{{ old('contact_information') }}">
                                        </div>
                                    </div>
                                </div>
                                <div id="map"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" name="latitude" id="latitude" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" name="longitude" id="longitude" class="form-control" readonly>
                                    </div>
                                </div>
                                <input type="hidden" name="coordinates" id="coordinates">
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.healthcare-facilities.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
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
        var map = L.map('map').setView([-5.469706875781235, 122.59711751121827], 13.5);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(map);
    
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);
    
        var drawControl = new L.Control.Draw({
            draw: {
                polygon: false,
                marker: true,
                polyline: false,
                rectangle: false,
                circle: false,
            },
            edit: {
                featureGroup: drawnItems,
                remove: false,
            },
        });
        map.addControl(drawControl);
    
        // hide map on first initial
        $('#map').hide();
    
        // triggering show map when district_id is changing
        $('#district_id').on('change', function () {
            var selectedId = $(this).val();
    
            $.ajax({
                url: '/admin-panel/district-polygon/' + selectedId,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data); // Check the content of the data object
                    var dataCoords = JSON.parse(data.coordinates)
    
                    if (dataCoords && Array.isArray(dataCoords) && dataCoords.length > 0) {
                        var coordinates = dataCoords; // Assign the data array to coordinates
    
                        drawnItems.clearLayers();
    
                        var polygon = L.polygon(coordinates, { color: data.color }).addTo(drawnItems); // Set the color of the polygon
                        map.fitBounds(polygon.getBounds());
    
                        $('#coordinates').val(coordinates);
    
                        $('#map').show();
                    } else {
                        console.error('Invalid or empty coordinates data');
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });

        map.on('click', function (e) {
            var marker;

            map.on('click', function (e) {
            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker(e.latlng).addTo(map).bindPopup('Lokasi FASKES: ' + e.latlng.toString()).openPopup();
            });
            var latitudeInput = document.getElementById('latitude');
            var longitudeInput = document.getElementById('longitude');

            var latLng = e.latlng;
            latitudeInput.value = latLng.lat;
            longitudeInput.value = latLng.lng;
        });
    
    </script>
    
    
    
    
@endpush