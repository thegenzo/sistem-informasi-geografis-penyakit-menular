<!DOCTYPE html>
<html lang="en">
	
	<!-- Mirrored from demos.codexcoder.com/labartisan/html/covid-19/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2023 12:27:48 GMT -->
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/x-icon/01.png">

		<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/lightcase.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		<!-- SweetAlert2 -->
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
		

		@stack('addon-style')
		
		<title>@yield('title') - SISPEMEN Kota Baubau</title>
	</head>

	<body>
		@include('web.layout.navigation')

		@yield('content')

		<!-- Footer Section Start Here -->
		<footer style="background-image: url(assets/css/bg-image/footer-bg.jpg);">
			<div class="footer-top padding-tb">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<div class="footer-item first-set">
								<div class="footer-inner">
									<div class="footer-content">
										<div class="title">
											<h6>About Covid-19</h6>
										</div>
										<div class="content">
											<p>We believe in Simple Creative and Flexible Design Standards.</p>
											<h6>Headquarters:</h6>
											<p>795 Folsom Ave, Suite 600 San Francisco, CA 94107</p>
											<ul class="lab-ul">
												<li>
													<p><span>Phone:</span>(91) 8547 632521</p>
												</li>
												<li>
													<p><span>Email:</span><a href="#">info@covid-19.com</a></p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="footer-item">
								<div class="footer-inner">
									<div class="footer-content">
										<div class="title">
											<h6>Navigate</h6>
										</div>
										<div class="content">
											<ul class="lab-ul">
												<li><a href="#"><i class="icofont-caret-right"></i>Advertisers</a></li>
												<li><a href="#"><i class="icofont-caret-right"></i>Developers</a></li>
												<li><a href="#"><i class="icofont-caret-right"></i>Resources</a></li>
												<li><a href="#"><i class="icofont-caret-right"></i>Company</a></li>
												<li><a href="#"><i class="icofont-caret-right"></i>Connect</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="footer-item">
								<div class="footer-inner">
									<div class="footer-content">
										<div class="title">
											<h6>Social Contact</h6>
										</div>
										<div class="content">
											<ul class="lab-ul">
												<li><a href="#"><i class="icofont-facebook"></i>Facebook</a></li>
												<li><a href="#"><i class="icofont-twitter"></i>Twitter</a></li>
												<li><a href="#"><i class="icofont-instagram"></i>Instagram</a></li>
												<li><a href="#"><i class="icofont-youtube"></i>YouTube</a></li>
												<li><a href="#"><i class="icofont-xing"></i>Xing</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="footer-item">
								<div class="footer-inner">
									<div class="footer-content">
										<div class="title">
											<h6>Privacy And Tos</h6>
										</div>
										<div class="content">
											<ul class="lab-ul">
												<li><a href="#"><i class="icofont-caret-right"></i>Advertiser Agreement</a></li>
												<li><a href="#"><i class="icofont-caret-right"></i>Acceptable Use Policy</a></li>
												<li><a href="#"><i class="icofont-caret-right"></i>Privacy Policy</a></li>
												<li><a href="#"><i class="icofont-caret-right"></i>Technology Privacy</a></li>
												<li><a href="#"><i class="icofont-caret-right"></i>Developer Agreement</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="section-wrapper">
						<p>&copy; 2023 All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer Section Ending Here -->

		<!-- scrollToTop start here -->
		<a href="#" class="scrollToTop"><i class="icofont-swoosh-up"></i><span class="pluse_1"></span><span class="pluse_2"></span></a>
		<!-- scrollToTop ending here -->

		
		<script src="{{ asset('assets/js/jquery.js') }}"></script>
		<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/lightcase.js') }}"></script>
		<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
		<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
		<script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
		<!-- SweetAlert2 -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>


		@stack('addon-script')
	</body>

<!-- Mirrored from demos.codexcoder.com/labartisan/html/covid-19/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2023 12:29:29 GMT -->
</html>