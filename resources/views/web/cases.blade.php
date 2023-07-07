@extends('web.layout.app')

@section('title', 'Detail Kasus')

@section('content')
<!-- Page Header Section Start Here -->
<section class="page-header">
	<div class="container">
		<div class="page-title">
			<h2>Detail Kasus</h2>
			<ul class="breadcrumb lab-ul">
				<li><a href="/">Home</a></li>
				<li>Detail Kasus</li>
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
				<h3 class="text-center">Data kasus pada {{ $healthcare->name }}</h3>
				<hr>
				<table class="table">
					<thead>
						<tr>
							<th>Nama Penyakit</th>
							<th class="text-center">Status</th>
							<th class="text-center">Usia</th>
							<th class="text-center">Jenis Kelamin</th>
							<th class="text-center">Total Pasien</th>
							<th class="text-center">Kekerasan</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($cases as $disease => $groupCases)
							<tr>
								<td rowspan="{{ $groupCases->count() + 1 }}">{{ $disease }}</td>
							@foreach ($groupCases as $case)
								<tr>
									<td class="text-center">
										@if ($case->status == 'suspected')
											<span class="badge badge-warning">Terduga</span>
										@elseif ($case->status == 'confirmed')
											<span class="badge badge-danger">Positif</span>
										@elseif ($case->status == 'recovered')
											<span class="badge badge-success">Sembuh</span>
										@else
											<span class="badge badge-light">Meninggal</span>
										@endif
									</td>
									<td class="text-center">{{ $case->age }}</td>
									<td class="text-center">
										@if ($case->gender == 'male')
											Laki-laki
										@elseif ($case->gender == 'female')
											Perempuan
										@else
											Laki-laki + Perempuan
										@endif
									</td>
									<td class="text-center">{{ $case->total }}</td>
									<td class="text-center">
										@if ($case->severity == 'mild')
											<span class="badge badge-info">Ringan</span>
										@elseif ($case->severity == 'moderate')
											<span class="badge badge-warning">Sedang</span>
										@elseif ($case->severity == 'severe')
											<span class="badge badge-danger">Berat</span>
										@elseif ($case->severity == 'critical')
											<span class="badge badge-dark">Kritis</span>
										@else
											<span class="badge badge-light">Tanpa gejala</span>
										@endif
									</td>
								</tr>                                
							</tr>
							@endforeach
						@endforeach
					</tbody>
				</table>
				<a href="/" class="btn btn-md btn-warning">Kembali</a>
			</div>
		</div>
	</div>
</div>
<!-- Blog Section Ending Here -->
@endsection