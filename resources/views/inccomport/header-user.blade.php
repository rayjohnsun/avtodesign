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
						<li><a href="{{ route('user_account') }}">Мой профиль</a></li>
						<li><a href="{{ route('user-ads.index') }}">Мои объявления</a></li>
						<li><a href="{{ route('user_message') }}">Связаться с нами</a></li>
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