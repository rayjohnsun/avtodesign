<header class="header-area main-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
				<div class="logo-area">
					<a href="{{ route('home') }}"><img src="/assets/images/logo.png" alt="logo"></a>
				</div>
			</div>
			<div class="col-lg-10">
				<div class="custom-navbar">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="main-menu">
					<ul>
						<li><a href="{{ route('ads.index') }}">Объявления</a></li>
						<li><a href="{{ route('regions.index') }}">Области</a></li>
						<li><a href="{{ route('cities.index') }}">Города/районы</a></li>
						<li><a href="{{ route('colors.index') }}">Цвета</a></li>
						<li><a href="{{ route('marks.index') }}">Марки</a></li>
						<li><a href="{{ route('car-models.index') }}">Модели</a></li>
						<!-- <li><a href="#">blog</a>
							<ul class="sub-menu">
								<li><a href="{{ route('site_blog_home') }}">Blog Home</a></li>
								<li><a href="blog-details.html">Blog Details</a></li>
							</ul>
						</li>
						<li><a href="contact-us.html">contact</a></li>
						<li><a href="#">pages</a>
							<ul class="sub-menu">
								<li><a href="job-search.html">Job Search</a></li>
								<li><a href="job-single.html">Job Single</a></li>
								<li><a href="pricing-plan.html">Pricing Plan</a></li>
								<li><a href="elements.html">Elements</a></li>
							</ul>
						</li> -->
						<li class="menu-btn">
							<a class="login" href="{{ route('logout') }}"
				        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				        {{ __('Logout') }} ({{ Auth::user()->name }})
				      </a>

				      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				          @csrf
				      </form>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>