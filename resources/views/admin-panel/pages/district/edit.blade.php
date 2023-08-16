@extends('admin-panel.layout.app')

@section('title', 'Edit Kecamatan')

@push('addon-style')
	{{-- <link rel="stylesheet" href="{{ asset('panel-assets/node_modules/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/selectric/public/selectric.css') }}">
	<link rel="stylesheet" href="{{ asset('panel-assets/node_modules/summernote/dist/summernote-bs4.css') }}"> --}}

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
                <h1>Edit Kecamatan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Kecamatan</div>
                    <div class="breadcrumb-item active">Edit Kecamatan</div>
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
                    <form action="{{ route('admin-panel.districts.update', $district->id) }}" method="post">
                        @csrf
						@method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Data Kecamatan</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" id="id" name="id" value="{{ $district->id }}">
                                <div class="form-group">
                                    <label for="name">Nama Kecamatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $district->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Warna Wilayah</label>
                                    <input type="color" name="color" class="form-control" id="colorPicker" value="{{ $district->color }}">
                                </div>
                                <div id="map"></div>
                                <input type="hidden" class="form-control" name="coordinates" id="coordinates" value="{{ $district->coordinates }}">
                            </div>
                        </div>
                        <a href="{{ route('admin-panel.districts.index') }}" class="btn btn-lg btn-warning d-inline">Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
	{{-- <script src="{{ asset('panel-assets/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('panel-assets/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
	<script src="{{ asset('panel-assets/node_modules/summernote/dist/summernote-bs4.js') }}"></script> --}}

    <script>
        var map = L.map('map').setView([-5.469706875781235, 122.59711751121827], 13.5);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(map);
    
        var drawnItems = new L.FeatureGroup();
        var polyColor = $('#colorPicker').val();
        map.addLayer(drawnItems);
    
        var coordinates = JSON.parse(document.getElementById('coordinates').value);
        var polygon = L.polygon(coordinates, { color: polyColor });
        drawnItems.addLayer(polygon);
        map.fitBounds(polygon.getBounds());
    
        var drawControl = new L.Control.Draw({
            draw: {
                polygon: {
                    shapeOptions: {
                        color: $('#colorPicker').val() //polygons being drawn will be purple color
                    },
                    allowIntersection: false,
                    drawError: {
                        color: 'orange',
                        timeout: 1000
                    },
                    showArea: true, //the area of the polygon will be displayed as it is drawn.
                    metric: false,
                    repeatMode: false
                },
                marker: false,
                polyline: false,
                rectangle: false,
                circle: false,
                circlemarker: false
            },
            edit: {
                featureGroup: drawnItems,
                remove: false,
            },
        });
        map.addControl(drawControl);
    
        map.on('draw:created', function (e) {
            drawnItems.clearLayers();
    
            var layer = e.layer;
            drawnItems.addLayer(layer);
    
            var newCoordinates = layer.getLatLngs()[0].map(function (latLng) {
                return [latLng.lat, latLng.lng];
            });
    
            // Reverse the order of coordinates (latitude first, longitude last)
            newCoordinates.reverse();
    
            $('#coordinates').val(JSON.stringify(newCoordinates));
        });

        // display existing polygons
        var idData = document.getElementById('id').value;
        $.getJSON(`/admin-panel/polygon-except-one/${idData}`, function(data) {
            $.each(data, function (index) {
				var totalCases = data[index].total_cases;
				
				var polyColor;
				if(totalCases < 250) {
					polyColor = '#ffeda0';
				} else if (totalCases > 250 && totalCases < 500) {
					polyColor = '#feb24c';
				} else {
					polyColor = '#f03b20';
				}

                var dataCoords = JSON.parse(data[index].coordinates);
                L.polygon(dataCoords, { 
						fillColor: polyColor,
						weight: 2,
						opacity: 1,
						dashArray: '3',
						fillOpacity: 0.7,
                        color: 'black'
					})
					.addTo(map)
                    .bindPopup(`
						${data[index].name}
						<br>
						Total Kasus: ${totalCases}
					`)
					.on('mouseover', function(e) {
                        this.openPopup();
                    })
					.on('mouseout', function (e) {
						this.closePopup();
					});
					
            });
        });
    
        // Function to edit the polygon
        function editPolygon() {
            drawnItems.clearLayers();
    
            var coordinates = JSON.parse($('#coordinates').val());
            var polygon = L.polygon(coordinates, { color: $('#colorPicker').val() });
            drawnItems.addLayer(polygon);
            map.fitBounds(polygon.getBounds());
    
            drawControl.setDrawingOptions({
                polygon: {
                    shapeOptions: {
                        color: $('#colorPicker').val(),
                    },
                },
            });
        }

        map.on("draw:edited", function(e) {
            let layers = e.layers;
            layers.eachLayer(function(layer) {
                drawnItems.addLayer(layer);
    
                var newCoordinates = layer.getLatLngs()[0].map(function (latLng) {
                    return [latLng.lat, latLng.lng];
                });

                // Reverse the order of coordinates (latitude first, longitude last)
                newCoordinates.reverse();

                $('#coordinates').val(JSON.stringify(newCoordinates));
            });
        });
    
        // Color picker change event
        $('#colorPicker').on('change', function () {
            var color = $(this).val();
    
            // Update the polygon draw color
            drawControl.setDrawingOptions({
                polygon: {
                    shapeOptions: {
                        color: color,
                    },
                },
            });
    
            editPolygon();
        });
    </script>
    
@endpush
