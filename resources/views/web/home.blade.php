@extends('web.layout.app')

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
		#map { height: 800px; }
	</style>
@endpush

@section('content')
<!-- Banner Section start here -->
<section class="banner-section pb-0">
	<div class="banner-area">
		<div class="container">
			<div class="row no-gutters align-items-center justify-content-center">
				<div class="col-12">
					<div class="content-part text-center">
						<div class="section-header">
							<h2>Sistem Informasi Geografis Penyakit Menular Kota Baubau</h2>
							<h3>Total Kasus Terlapor</h3>
							<h2 class="count-people">{{ \App\Models\Cases::sum('total') }}</h2>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="section-wrapper">
						<div class="banner-thumb">
							<img src="assets/images/banner/01.png" alt="lab-banner">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner Section ending here -->

<!-- corona count section start here -->
<section class="corona-count-section bg-corona padding-tb">
	<div class="corona-count-top wow fadeInUp" data-wow-delay="0.3s">
		<div class="row justify-content-center align-items-center">
			<div class="col-xl-12 col-md-12 col-12">
				<h2 class="text-center">Wilayah Persebaran Penduduk Penderita Penyakit Menular Kota Baubau</h2>
				<div id="map"></div>
			</div>
		</div>
	</div>
</section>
<!-- corona count section ending here -->

<!-- safe actions section start here -->
<section class="safe-actions padding-tb bg-action">
	<div class="action-shape">
		<img src="assets/images/safe/shape/01.png" alt="action-shape">
	</div>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-6 col-12 wow fadeInUp" data-wow-delay="0.3s">
				<div class="sa-thumb-part">
					<div class="safe-thumb">
						<img src="assets/images/safe/01.jpg" alt="safe-actions">
						<div class="shape-icon">
							<div class="sa-icon sa-green saicon-1">
								<img src="assets/images/safe/shape/green/01.png" alt="green-signal">
								{{-- <div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div> --}}
							</div>
							<div class="sa-icon sa-green saicon-2">
								<img src="assets/images/safe/shape/green/02.png" alt="green-signal">
								{{-- <div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div> --}}
							</div>
							<div class="sa-icon sa-green saicon-3">
								<img src="assets/images/safe/shape/green/03.png" alt="green-signal">
								{{-- <div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div> --}}
							</div>
							<div class="sa-icon sa-green saicon-4">
								<img src="assets/images/safe/shape/green/04.png" alt="green-signal">
								{{-- <div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div> --}}
							</div>
							<div class="sa-icon sa-green saicon-5">
								<img src="assets/images/safe/shape/green/05.png" alt="green-signal">
								{{-- <div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div> --}}
							</div>
							<div class="sa-icon sa-red saicon-6">
								<img src="assets/images/safe/shape/red/01.png" alt="red-signal">
								{{-- <div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div> --}}
							</div>
							<div class="sa-icon sa-red saicon-7">
								<img src="assets/images/safe/shape/red/02.png" alt="red-signal">
								{{-- <div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div> --}}
							</div>
							<div class="sa-icon sa-red saicon-8">
								<img src="assets/images/safe/shape/red/03.png" alt="red-signal">
								{{-- <div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div> --}}
							</div>
							<div class="sa-icon sa-red saicon-9">
								<img src="assets/images/safe/shape/red/04.png" alt="red-signal">
								{{-- <div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div> --}}
							</div>
							<div class="sa-icon sa-red saicon-10">
								<img src="assets/images/safe/shape/red/05.png" alt="red-signal">
								{{-- <div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-12 wow fadeInUp" data-wow-delay="0.4s">
				<div class="sa-content-part">
					<h2>Tindakan Pencegahan</h2>
					<p>Bagaimana cara melindungi diri dari penyakit menular</p>
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="sa-title">
								<h6><i class="icofont-checked"></i>Do's</h6>
							</div>
							<ul class="lab-ul">
								<li><i class="icofont-check-circled"></i>Menjaga Kebersihan</li>
								<li><i class="icofont-check-circled"></i>Pakai Masker Bila Perlu</li>
								<li><i class="icofont-check-circled"></i>Vaksin</li>
								<li><i class="icofont-check-circled"></i>Tetap di Rumah Saat Sakit</li>
								<li><i class="icofont-check-circled"></i>Praktikkan Social Distancing</li>
								<li><i class="icofont-check-circled"></i>Konsultasi Rutin dengan Dokter</li>
							</ul>
						</div>
						<div class="col-lg-6 col-12">
							<div class="sa-title">
								<h6><i class="icofont-not-allowed"></i>Don'ts</h6>
							</div>
							<ul class="lab-ul">
								<li><i class="icofont-close-circled"></i>Hindari Kontak dengan Orang Sakit</li>
								<li><i class="icofont-close-circled"></i>Hindari Menyentuh Wajah</li>
								<li><i class="icofont-close-circled"></i>Jangan Berbagi Barang Pribadi</li>
								<li><i class="icofont-close-circled"></i>Jangan Mengabaikan Kesehatan</li>
								<li><i class="icofont-close-circled"></i>Hindari Kerumunan Bila Perlu</li>
								<li><i class="icofont-close-circled"></i>Tidak Menjaga Kebersihan</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- safe actions section ending here -->

<!-- faq section start here -->
<section class="faq-section bg-faq padding-tb">
	<div class="faq-shape">
		<img src="{{ asset('assets/images/faq/shape/01.png') }}" alt="action-shape">
	</div>
	<div class="container">
		<div class="section-header wow fadeInUp" data-wow-delay="0.3s">
			<h2>Frequently Ask Questions</h2>
			<p> Terkait Layanan Kami Kepada Masyarakat</p>
		</div>
		<div class="section-wrapper wow fadeInUp" data-wow-delay="0.4s">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-sm-8 col-12">
					<ul class="accordion lab-ul">
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>Apa tujuan dari SISPEMEN Kota Baubau?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Untuk memberikan informasi geografis mengenai berapa jumlah penduduk yang memiliki penyakit menular di suatu daerah di Kota Baubau</p>
							</div>
						</li>
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>Informasi apa saja yang bisa kita lihat di SISPEMEN Kota Baubau?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Informasi wilayah dengan penduduk yang mengalami penyakit menular dan penyakit apa saja yang dialami oleh penduduk tersebut</p>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-lg-6 col-sm-8 col-12">
					<ul class="accordion lab-ul">
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>Kenapa pencegahan penyebaran penyakit menular penting bagi saya?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Dengan menerapkan langkah-langkah pencegahan, Anda dapat melindungi diri sendiri dari infeksi penyakit menular. Pencegahan penyebaran penyakit menular juga melibatkan melindungi anggota keluarga Anda. Jika Anda terinfeksi penyakit menular, kemungkinan besar akan menularkan penyakit tersebut kepada orang-orang di sekitar Anda, terutama keluarga yang tinggal bersama Anda.</p>
							</div>
						</li>
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>Apa yang harus saya lakukan jika saya memiliki penyakit menular?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>
									Jika Anda mengalami gejala penyakit menular atau didiagnosis dengan penyakit menular, berikut adalah langkah-langkah yang disarankan untuk diikuti:
								</p>
								<p>1. Segera hubungi tenaga medis</p>
								<p>2. Karantina diri</p>
								<p>3. Ikuti pengobatan dan perawatan yang direkomendasikan</p>
								<p>4. Hindari kontak dengan orang lain</p>
								<p>5. Berikan informasi kepada kontak erat</p>
								<p>6. Jaga kesehatan dan kebersihan</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- faq section ending here -->
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
					 <a href="{{ route('web.cases', $healthcare->id) }}" class="btn btn-sm btn-info">Lihat Data Pasien</a>
                    `
                )
            });
        </script>        
    @endforeach
@endpush