@extends('web.layout.app')

@section('title', 'Detail Penyakit')

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
<!-- Page Header Section Start Here -->
<section class="page-header">
	<div class="container">
		<div class="page-title">
			<h2>Detail Penyakit</h2>
			<ul class="breadcrumb lab-ul">
				<li><a href="/">Home</a></li>
				<li><a href="{{ route('web.diseases.index') }}">Data Penyakit</a></li>
				<li>Detail Penyakit</li>
			</ul>
		</div>
	</div>
</section>
<!-- Page Header Section Ending Here -->

<!-- Blog Section Start Here -->
<div class="blog-section blog-single padding-tb">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 col-md-12 col-12">
				<article>
					<div class="section-wrapper">
						<div class="post-item">
							<div class="post-item-inner">
								<input type="hidden" id="id" value="{{ $disease->id }}">
								<input type="hidden" id="diseaseName" value="{{ $disease->name }}">
								<div class="post-thumb">
									<img src="{{ asset($disease->cover_image)}}" alt="blog">
								</div>
								<div class="post-content">
									<h3>{{ $disease->name }}</h3>

									{!! $disease->description !!}
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2 class="text-center">Wilayah Persebaran Penduduk Penderita Penyakit {{ $disease->name }} (Tahun 2022)</h2>
				<div id="map"></div>
			</div>
		</div>
	</div>
</div>
<!-- Blog Section Ending Here -->
@endsection

@push('addon-script')
    <!-- Initialize leaflet js map -->
    <script>
        var map = L.map('map').setView([-5.434256171801455, 122.64244079589845], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(map);

		var idData = document.getElementById('id').value;
        $.getJSON(`/admin-panel/get-districts-by-id/${idData}`, function(data) {
            $.each(data, function (index) {
				var totalCases = data[index].total_cases;
				console.log(totalCases)
				
				var polyColor;
				if (totalCases === null) {
					polyColor = '#ffffb2'
				}
				else if(totalCases < 250) {
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
				var diseaseName = document.getElementById('diseaseName').value;
				var legendTitle = `Persebaran Penduduk dengan Penyakit ${diseaseName}` // Add your desired legend title here

				div.innerHTML = '<div class="legend-title">' + legendTitle + '</div>'; // Adding the legend title
				
				// Handle null totalCases
				div.innerHTML += '<i style="background:#ffffb2"></i> Data Tidak Tersedia<br>';
				for (var i = 0; i < grades.length; i++) {
					div.innerHTML +=
						'<i style="background:' + colors[i] + '"></i> ' +
						(grades[i] === 0 ? '0' : (grades[i] + 1)) + 
						(grades[i + 1] ? ' &ndash; ' + grades[i + 1] + ' Orang<br>' : '+ Orang');
				}

				return div;
			};

			legend.addTo(map);
        });

    </script>
@endpush