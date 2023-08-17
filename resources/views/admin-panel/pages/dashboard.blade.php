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
		#map { 
			height: 800px; 
		}
		.info.legend {
			background-color: white;
			padding: 6px 8px;
			font-size: 14px;
			border: 1px solid #ccc;
			line-height: 40px;
			color: #333;
			border-radius: 3px;
		}
		.info.legend i {
			width: 40px;
			height: 40px;
			float: left;
			margin-right: 8px;
			opacity: 0.7;
		}
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
        var map = L.map('map').setView([-5.434256171801455, 122.64244079589845], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(map);

        $.getJSON('/admin-panel/get-all-districts', function(data) {
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
						${data[index].district_name}
						<br>
						Total Kasus: ${totalCases}
						<br>
						Data Penyakit Menular: ${data[index].disease_names}
					`)
					.on('mouseover', function(e) {
                        this.openPopup();
                    })
					.on('mouseout', function (e) {
						this.closePopup();
					});
					
            });

            // Populate the legend
 			var legend = L.control({ position: 'bottomright' });

            legend.onAdd = function(map) {
                var div = L.DomUtil.create('div', 'info legend');
                var grades = [0, 250, 500];
                var colors = ['#ffeda0', '#feb24c', '#f03b20'];
                
                for (var i = 0; i < grades.length; i++) {
                    div.innerHTML +=
                        '<i style="background:' + colors[i] + '"></i> ' +
                        (grades[i] === 0 ? '0' : (grades[i] + 1)) + 
                        (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
                }
                return div;
            };

            legend.addTo(map);
        });

    </script>
    
    <!-- Loop healthcare facilities -->
    @foreach (\App\Models\HealthcareFacilities::all() as $healthcare)
        <script>
            L.marker([{{ $healthcare->latitude }}, {{ $healthcare->longitude }}]).addTo(map).on('click', function(e) {
                Swal.fire(
                    '{{ $healthcare->name }}',
                    `Data penyakit menular: <br>
						<ul style="list-style-type: none;">
						@foreach ($healthcare->cases->unique('disease_id') as $key => $value)
							<li>{{ $value->disease->name }}</li>
						@endforeach
                        </ul>
					 <a href="{{ route('web.cases', $healthcare->id) }}" class="btn btn-sm btn-info">Lihat Data Pasien</a>
                    `
                )
            });
        </script>        
    @endforeach
@endpush