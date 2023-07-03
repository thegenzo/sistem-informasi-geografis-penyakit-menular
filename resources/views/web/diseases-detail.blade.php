@extends('web.layout.app')

@section('title', 'Detail Penyakit')

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
	</div>
</div>
<!-- Blog Section Ending Here -->
@endsection