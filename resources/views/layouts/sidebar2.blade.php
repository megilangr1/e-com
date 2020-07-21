<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
	<div class="scrollbar-inner">
		<!-- Brand -->
		<div class="sidenav-header  align-items-center">
			<a class="navbar-brand" href="javascript:void(0)">
				<img src="{{ asset('frontend/logo.png') }}" class="navbar-brand-img" alt="{{ asset('backend') }}" style="max-height: 65px !important;">
			</a>
		</div>
		<div class="navbar-inner">
			<hr class="my-3">
			<!-- Collapse -->
			<div class="collapse navbar-collapse" id="sidenav-collapse-main">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/home') }}">
							<i class="ni ni-tv-2 text-primary"></i>
							<span class="nav-link-text">Dashboard</span>
						</a>
					</li>
				</ul>
				<hr class="my-3">
				<!-- Heading -->
				<h6 class="navbar-heading p-0 text-muted">
					<span class="docs-normal">Master Data</span>
				</h6>
				<!-- Nav items -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/category') }}">
							<i class="ni ni-settings-gear-65 text-primary"></i>
							<span class="nav-link-text">Kategori</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/product') }}">
							<i class="ni ni-bag-17 text-orange"></i>
							<span class="nav-link-text">Produk</span>
						</a>
					</li>
				</ul>
				
				<hr class="my-3">
				<!-- Heading -->
				<h6 class="navbar-heading p-0 text-muted">
					<span class="docs-normal">Transaksi</span>
				</h6>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/order') }}">
							<i class="ni ni-delivery-fast text-primary"></i>
							<span class="nav-link-text">Data Pemesanan</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/confirmAdmin') }}">
							<i class="ni ni-money-coins text-primary"></i>
							<span class="nav-link-text">Konfirmasi Pembayaran</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>