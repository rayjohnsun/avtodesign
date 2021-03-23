<header class="header-area single-page">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<div class="logo-area">
						<a href="/"><img src="/assets/images/logo-light.png" alt="logo"></a>
					</div>
				</div>
				<div class="col-lg-10">
					<div class="custom-navbar">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<div class="main-menu main-menu-light">
						@include('inccomport.parts.site-header-menu')
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="page-title text-center">
		<div class="container">
			@yield('top')
		</div>
	</div>
</header>