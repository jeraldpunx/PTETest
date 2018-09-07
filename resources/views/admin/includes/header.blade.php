<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top has-fixed-navbar">
	<div class="container-fluid">
		<div class="navbar-wrapper">
			<a class="navbar-brand" href="#pablo">{{ $page_name }}</a>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
			<span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#pablo">
						<i class="material-icons">person</i>
						<p class="d-lg-none d-md-block">
							Account
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{ url('/logout') }}">
						<i class="material-icons">exit_to_app</i>
						<p class="d-lg-none d-md-block">
							Logout
						</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

