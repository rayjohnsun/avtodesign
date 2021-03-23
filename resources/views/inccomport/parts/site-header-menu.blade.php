<ul>
	<li class="active"><a href="{{ route('site_home') }}">home</a></li>
	<li><a href="{{ route('site_about') }}">about us</a></li>
	<li><a href="{{ route('site_category') }}">category</a></li>
	<li><a href="#">blog</a>
		<ul class="sub-menu">
			<li><a href="{{ route('site_blog_home') }}">Blog Home</a></li>
			<li><a href="{{ route('site_blog_details') }}">Blog Details</a></li>
		</ul>
	</li>
	<li><a href="{{ route('site_contact_us') }}">contact</a></li>
	<li><a href="#">pages</a>
		<ul class="sub-menu">
			<li><a href="{{ route('site_job_search') }}">Job Search</a></li>
			<li><a href="{{ route('site_job_single') }}">Job Single</a></li>
			<li><a href="{{ route('site_pricing_plan') }}">Pricing Plan</a></li>
			<li><a href="{{ route('site_elements') }}">Elements</a></li>
		</ul>
	</li>
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