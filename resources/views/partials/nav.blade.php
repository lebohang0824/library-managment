<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="/">
			<img src="{{ asset('images/umuzi-logo.png') }}" alt="Umuzi Logo" style="width: 100px">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span>
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item {{ active() }}"><a href="{{ URL('/') }}" class="nav-link">Home</a></li>
				<li class="nav-item {{ active('books') }}"><a href="{{ URL('books') }}" class="nav-link">Books</a></li>
				@if(!Auth::check())
				<li class="nav-item {{ active('register') }}"><a href="{{ URL('/register') }}" class="nav-link">Register</a></li>
				<li class="nav-item {{ active('login') }}"><a href="{{ URL('/login') }}" class="nav-link">Login</a></li>
				@endif
				@if(Auth::check())
				<li class="nav-item {{ active('account') }}"><a href="{{ URL('/account') }}" class="nav-link">Account</a></li>
				<li class="nav-item {{ active('my-books') }}"><a href="{{ URL('/my-books') }}" class="nav-link">My Books</a></li>
				@endif
				<li class="nav-item {{ active('contact') }}"><a href="{{ URL('/contact') }}" class="nav-link">Contact</a></li>
				@if(Auth::check())
				<div id="logout"></div>
				@endif
			</ul>
		</div>
	</div>
</nav>