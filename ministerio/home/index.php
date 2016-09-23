<!DOCTYPE html>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
 protegePagina();  // Inclui o arquivo com o sistema de segurança
 
 // Chama a função que protege a página

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PIBG - Integração</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet">
<!--

Template 2075 Digital Team

http://www.tooplate.com/view/2075-digital-team

--><link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/animate.min.css">
	<link rel="stylesheet" href="/css/et-line-font.css">
	<link rel="stylesheet" href="/css/nivo-lightbox.css">
	<link rel="stylesheet" href="/css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="/css/style.css">
	
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- preloader section -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-circle">
       <div class="sk-circle1 sk-circle"></div>
       <div class="sk-circle2 sk-circle"></div>
       <div class="sk-circle3 sk-circle"></div>
       <div class="sk-circle4 sk-circle"></div>
       <div class="sk-circle5 sk-circle"></div>
       <div class="sk-circle6 sk-circle"></div>
       <div class="sk-circle7 sk-circle"></div>
       <div class="sk-circle8 sk-circle"></div>
       <div class="sk-circle9 sk-circle"></div>
       <div class="sk-circle10 sk-circle"></div>
       <div class="sk-circle11 sk-circle"></div>
       <div class="sk-circle12 sk-circle"></div>
    </div>
</div>

<!-- navigation section -->
<section class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<p class="navbar-header"">
				<a href="#" ><img src="/images/logo.png"> </a>
			</p>
		
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/ministerio/home" class="smoothScroll">HOME</a></li>
				<li><a href="/ministerio/pgm" class="smoothScroll">PGM</a></li>
				<li><a href="/ministerio/lideres" class="smoothScroll">LÍDERES</a></li>
				<li><a href="/ministerio/discipulos" class="smoothScroll">DISCÍPULOS</a></li>
				<li><a href="/ministerio/discipuladores" class="smoothScroll">DISCIPULADORES</a></li>
				<li><a href="/ministerio/discipulados" class="smoothScroll">DISCIPULADOS</a></li>
				<li><a href="/ministerio/contatos" class="smoothScroll">AGENDA</a></li>
			</ul>
		</div>
	</div>
</section>


<section id="work">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-title">
					
					<h1 class="heading bold">BEM VINDO</h1>
					<hr>
				</div>
			</div>
			<a href="/ministerio/solicitados">
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0s">
			
				<i class="icon-document medium-icon"></i>
					<h3>ESTUDOS SOLICITADOS</h3>
					<hr>
			
			</div></a>
			<a href="/ministerio/contatos">
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<i class="icon-search medium-icon"></i>
					<h3>CONTATOS DIVERSOS </h3>
					<hr>
				
			</div></a>
			<a href="/ministerio/discipulos">
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="1s">
				<i class="icon-profile-male medium-icon"></i>
					<h3>DISCÍPULOS</h3>
					<hr>
				
			</div></a>
			<a href="/ministerio/discipuladores">
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="1.5s">
				<i class="icon-pencil medium-icon"></i>
					<h3>DISCIPULADORES</h3>
					<hr>
				
			</div></a>
			<a href="/ministerio/discipulados">
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="2s">
				<i class="icon-book-open medium-icon"></i>
					<h3>DISCIPULADOS</h3>
					<hr>
			
			</div></a>
			<a href="/ministerio/relatorios">
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="2.5s">
				<i class="icon-documents medium-icon"></i>
					<h3>RELATORIOS</h3>
					<hr>
					
			</div></a>
		</div>
	</div>
</section>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/smoothscroll.js"></script>
<script src="/js/isotope.js"></script>
<script src="/js/imagesloaded.min.js"></script>
<script src="/js/nivo-lightbox.min.js"></script>
<script src="/js/jquery.backstretch.min.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/custom.js"></script>

</body>
</html>