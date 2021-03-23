<ul>
	<li class="active"><a href="{{ route('site_home') }}">SITE</a></li>
	<li class="active"><a href="{{ route('index') }}">home</a></li>
	@guest
		<li class="menu-btn">
			<a href="{{ route('login') }}" class="login">log in</a>
			<a href="#" class="template-btn">sign up</a>
		</li>
	@else
		<li class="menu-btn">
			<a class="template-btn" href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
		</li>
	@endguest
</ul>