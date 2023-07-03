@extends('web.layout.app')

@section('title', 'Data Penyakit')

@section('content')
<!-- Page Header Section Start Here -->
<section class="page-header">
	<div class="container">
		<div class="page-title">
			<h2>Data Penyakit</h2>
			<ul class="breadcrumb lab-ul">
				<li><a href="/">Home</a></li>
				<li>Data Penyakit</li>
			</ul>
		</div>
	</div>
</section>
<!-- Page Header Section Ending Here -->

<!-- Blog Section Start Here -->
<section class="blog-section padding-tb">
	<div class="container">
		<div class="section-wrapper">
			<div class="row">
				@foreach ($diseases as $disease)
				<div class="col-lg-4 col-sm-6 col-12">
					<div class="post-item">
						<div class="post-item-inner">
							<div class="post-thumb">
								<a href="{{ route('web.diseases.detail', $disease->id) }}"><img src="{{ asset($disease->cover_image) }}" alt="lab-blog" width="300px"></a>
							</div>
							<div class="post-content">
								<h5><a href="{{ route('web.diseases.detail', $disease->id) }}">{{ $disease->name }}</a></h5>
								<div class="post-footer">
									<a href="{{ route('web.diseases.detail', $disease->id) }}" class="text-btn">Baca Selengkapnya<i class="icofont-double-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				{{ $diseases->links() }}
			</div>
		</div>
	</div>
</section>
<!-- Blog Section Ending Here -->
@endsection