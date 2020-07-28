<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lucky Photo | Photo Supply & Photo Digital Processing</title>

    <!-- Google Font -->
    <link href="{{ asset('font/cairo.css') }}" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/elegant-icons.css" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('frontend') }}/css/nice-select.css" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/datatable/datatables.min.css" type="text/css">
		
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
        
    @yield('css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('frontend/rsz_logo.png') }}" alt=""></a>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
					<ul>
						@if (!auth()->check())
							<li>
								<a href="{{ route('login') }}">Login</a>
							</li>
						@endif
						@if (auth()->check())
						<li>
							<a href="#">
								<i class="fa fa-user"></i> &ensp;
								Halo, {{ auth()->user()->name }}
							</a>
							<ul class="header__menu__dropdown">
								<li class="text-left"><a href="{{ url('/shopping-cart') }}">Keranjang Belanja</a></li>
								<li class="text-left"><a href="{{ url('/invoice/list') }}">List Invoice</a></li>
								<li class="text-left">
									<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">Logout</a>
								</li>
								<form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</ul>
						</li>
						@endif
						<li class="text-left">
							<a href="{{ url('/shopping-cart') }}">
								<i class="fa fa-shopping-bag"></i> &ensp;
								Keranjang Belanja
							</a>
						</li>
					</ul>
            <ul class="mt-4">
							<li class="{{ Request::is('/') ? 'active':'' }}"><a href="{{ url('/') }}">Home</a></li>
							<li class="{{ Request::is('/list-product') ? 'active':'' }}"><a href="{{ url('/list-product') }}">Daftar Product</a></li>
							<li class="{{ Request::is('/invoice/list') ? 'active':'' }}"><a href="{{ url('/invoice/list') }}">Konfirmasi Pembayaran</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> kodingku@mail.com</li>
                <li>Aplikasi E-Com v.1-0</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo text-center">
                        <a href="{{ url('/') }}"><img src="{{ asset('frontend/rsz_logo.png') }}" style="margin-top: 10px !important;" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
									<nav class="header__menu">
										<ul>
											<li class="{{ Request::is('/') ? 'active':'' }}"><a href="{{ url('/') }}">Home</a></li>
											<li class="{{ Request::is('/list-product') ? 'active':'' }}"><a href="{{ url('/list-product') }}">Daftar Product</a></li>
											<li class="{{ Request::is('/invoice/list') ? 'active':'' }}"><a href="{{ url('/invoice/list') }}">Konfirmasi Pembayaran</a></li>
										</ul>
									</nav>
                </div>
                <div class="col-lg-3">
									<nav class="header__menu">
										<ul class="text-right">
											@if (auth()->check())
											<li>
												<a href="#">
													<i class="fa fa-user"></i> &ensp;
													Halo, {{ auth()->user()->name }}
												</a>
												<ul class="header__menu__dropdown">
													<li class="text-left"><a href="{{ url('/shopping-cart') }}">Keranjang Belanja</a></li>
													<li class="text-left"><a href="{{ url('/invoice/list') }}">List Invoice</a></li>
													<li class="text-left">
														<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">Logout</a>
													</li>
													<form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
														@csrf
													</form>
												</ul>
											</li>
											<li>
												<a href="{{ url('/shopping-cart') }}">
													<i class="fa fa-shopping-bag"></i> 
												</a>
											</li>
											@endif
											@if (!auth()->check())
											<li>
												<a href="{{ route('login') }}" class="btn btn-sm btn-danger text-white">
													&ensp; <i class="fa fa-sign-in"></i> &ensp; Login &ensp;
												</a>
											</li>
											@endif
										</ul>
									</nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero {{ Request::is('/') ? '':'hero-normal' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Kategori Produk</span>
                        </div>
                        <ul>
                          @foreach (\App\Category::all() as $item)  
                            <li><a href="{{ url('/list-product').'?category='.$item->slug }}">{{ $item->name }}</a></li>
                          @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form" style="width: 100% !important;">
                            <form action="{{ url('/list-product') }}" method="GET"> 
                                <input type="text" name="search" placeholder="Apa yang kamu butuhin?" value="{{ request()->has('search') ? request()->search:'' }}">
                                <button type="submit" class="site-btn">Cari</button>
                            </form>
                        </div>
										</div>
										@if (Request::is('/'))
                    <div class="hero__item set-bg" data-setbg="{{ asset('frontend/jersey.jpg') }}">
												<div class="hero__text">
														<span>Toko Aksesoris Kamera</span>
														<h2>100% Original</h2>
														<p>Termurah dan Terpercaya !!</p>
														<button id="now" class="btn btn-danger">Yuk, Belanja Sekarang</button>
												</div>
										</div>
										@endif
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End --> 

    <!-- Featured Section Begin -->
    <section class="featured spad" id="product">
        <div class="container">
						@yield('content')	
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('frontend/rsz_logo.png') }}" alt=""></a>
                        </div>
                        <ul>
                            <li>Jl. Jamika 41, Bojong Loa Kaler, Jamika, Bandung 40231</li>
                            <li>Telp: (022) 6041155 / 081220090981</li>
                            <li>Email: luckyphoto41@gmail.com</li>
                        </ul>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="{{ asset('frontend') }}/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('frontend') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    {{-- <script src="{{ asset('frontend') }}/js/jquery.nice-select.min.js"></script> --}}
    <script src="{{ asset('frontend') }}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('frontend') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script>
    <script src="{{ asset('frontend') }}/datatable/datatables.min.js"></script>

    <script>
      $("#now").click(function() {
        $('html,body').animate({
          scrollTop: $("#product").offset().top},
          'slow');
      });
    </script>
		<script>
			$(document).ready(function () {
				var flash = "{{ Session::has('status') }}";
				if (flash) {
					var status = "{{ Session::get('status') }}";
					swal('success', status, 'success');
				}
			});
		</script>

		<script>
			$(document).ready(function(){
				$(".preloader").delay(550).fadeOut();
			})
		</script>
		@yield('script')	

</body>

</html>