@if ($breadcrumbs)
<style type="text/css">
/*	.action-nav > a {
		color: rgba(255,255,255,0.7) !important;
	}
	
	.action-nav > a:hover, .action-nav > a:focus {
		color: #fff !important;
	}

    .breadcrumb.active {
    	color: #fff !important;
    }

    .breadcrumb {
    	color: rgba(255,255,255,0.7) !important;
    	display: unset;
    	background-color: unset;
    	padding: unset;
    }*/
</style>
<div class="navbar-fixed ">
	<nav>
		<div class="nav-wrapper">
			<a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons">menu</i></a>
			<span class="has-fixed-breadcrumb">
			@foreach ($breadcrumbs as $breadcrumb)
	            @if (!$breadcrumb->last)
					<a href="{{ $breadcrumb->url }}" class="breadcrumb">{{ $breadcrumb->title }}</a>
	            @else
					<a href="{{ $breadcrumb->url }}" class="breadcrumb active">{{ $breadcrumb->title }}</a>
	            @endif
			@endforeach
			</span>

			<ul class="right has-fixed-navbar">
				<li>
					<a href="#pablo">
						<i class="material-icons">person</i>
					</a>
				</li>

				<li>
					<a href="{{ url('/logout') }}">
						<i class="material-icons">exit_to_app</i>
					</a>
				</li>
	        </ul>
		</div>
	</nav>
</div>

<!-- <nav>
	<div class="nav-wrapper">
		<div class="col s12">
			@foreach ($breadcrumbs as $breadcrumb)
	            @if (!$breadcrumb->last)
					<a href="{{ $breadcrumb->url }}" class="breadcrumb">{{ $breadcrumb->title }}</a>
	            @else
					<a href="{{ $breadcrumb->url }}" class="breadcrumb active">{{ $breadcrumb->title }}</a>
	            @endif
			@endforeach

			<div class="pull-right action-nav">
				<a class="d-inline-block" href="#pablo">
					<i class="material-icons">person</i>
					<p class="d-lg-none d-md-block">
						Account
					</p>
				</a>

				<a class="d-inline-block" href="{{ url('/logout') }}">
					<i class="material-icons">exit_to_app</i>
					<p class="d-lg-none d-md-block">
						Logout
					</p>
				</a>
			</div>
		</div>
	</div>
</nav> -->
@endif