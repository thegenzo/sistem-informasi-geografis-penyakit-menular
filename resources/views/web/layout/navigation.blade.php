<!-- Mobile Menu Start Here -->
<div class="mobile-menu">
	<nav class="mobile-header">
		<div class="header-logo">
			<a href="/"><img src="{{ asset('assets/images/logo/01.png')}}" alt="logo"></a>
		</div>
		<div class="header-bar">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</nav>
	<nav class="mobile-menu">
		<div class="mobile-menu-area">
			<div class="mobile-menu-area-inner">
				<ul class="lab-ul">
					<li class="{{ Route::is('web.home') ? 'active' : '' }}"><a href="{{ route('web.home') }}">Home</a></li>
					<li class="{{ Route::is('web.diseases.*') ? 'active' : '' }}"><a href="{{ route('web.diseases.index') }}">Data Penyakit</a></li>
				</ul>
				<div class="header-btn">
					@if (!Auth::check())
					<a href="{{ route('login') }}" class="lab-btn" target="_blank"><span>Login</span></a>
					@else
					<a href="{{ route('admin-panel.dashboard') }}" class="lab-btn" target="_blank"><span>Dashboard</span></a>
					@endif
				</div>
			</div>
		</div>
	</nav>
</div>
<!-- Mobile Menu Ending Here -->

<!-- desktop menu start here -->
<header class="header-section">
	<div class="header-area">
		<div class="container">
			<div class="primary-menu">
				<div class="logo">
					<a href="/"><img src="{{ asset('assets/images/logo/01.png') }}" alt="logo"></a>
				</div>
				<div class="main-area">
					<div class="main-menu">
						<ul class="lab-ul">
							<li class="{{ Route::is('web.home') ? 'active' : '' }}"><a href="{{ route('web.home') }}">Home</a></li>
							<li class="{{ Route::is('web.diseases.*') ? 'active' : '' }}"><a href="{{ route('web.diseases.index') }}">Data Penyakit</a></li>
						</ul>
					</div>
					<div class="header-btn">
						@if (!Auth::check())
						<a href="{{ route('login') }}" class="lab-btn" target="_blank"><span>Login</span></a>
						@else
						<a href="{{ route('admin-panel.dashboard') }}" class="lab-btn" target="_blank"><span>Dashboard</span></a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- desktop menu ending here -->