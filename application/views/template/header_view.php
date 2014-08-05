<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Simple Responsive Template</title>
		<meta name="description" content="Simple Responsive Template is a template for responsive web design. Mobile first, responsive grid layout, toggle menu, navigation bar with unlimited drop downs, responsive slideshow">
		<meta name="keywords" content="">

		<!-- Mobile viewport -->
		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico"  type="image/x-icon" />

		<!-- CSS-->
		<!-- Google web fonts. You can get your own bundle at http://www.google.com/fonts. Don't forget to update the CSS accordingly!-->
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Ubuntu' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>js/flexslider/flexslider.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/basic-style.css">

		<!-- end CSS-->

		<!-- JS-->
		<script src="<?php echo base_url(); ?>js/libs/modernizr-2.6.2.min.js"></script>
		<!-- end JS-->

	</head>

	<body id="home">
		<!--[if lt IE 7]>
					<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
				<![endif]-->


		<!-- header area -->
		<header class="wrapper clearfix">

			<div id="banner">        
				<?php if ($this->session->userdata('user_id')) { ?>
				<form action="" method="POST">
					<input type="submit" name="logout" value="logout">
				</form>
					<?php echo $this->session->userdata('user_login'); ?>
				<?php }  else { ?>
				<form action="" method="POST">
					<input type="text" name="login">
					<input type="password" name="passwd">
					<input type="submit" value="login">
				</form>
				<?php } ?>
			</div>

			<!-- main navigation -->
			<nav id="topnav" role="navigation">
				<div class="menu-toggle">Menu</div>
					<ul class="srt-menu" id="menu-main-navigation">
					<?php if ($this->session->userdata('user_lvl')) { ?>	
					<li><a href="#">Ogólne</a>
						<ul>
							<li><a href="<?php echo base_url(); ?>main/status">Stan</a></li>
							<li><a href="<?php echo base_url(); ?>main/reports">Raporty</a></li>
							<li><a href="<?php echo base_url(); ?>main/notes">Notatki</a></li>
						</ul>
					</li>
					<?php } ?>
					<?php if ($this->session->userdata('user_lvl')) { ?>	
					<li><a href="#">Magazyn</a>
						<ul>
							<li><a href="<?php echo base_url(); ?>warehouse/library">Biblioteka</a></li>							
							<li><a href="<?php echo base_url(); ?>warehouse/add/packing">Dodaj Packing</a></li>
							<li><a href="<?php echo base_url(); ?>warehouse/add/returner">Dodaj Zwrot</a></li>
							<?php if ($this->session->userdata('user_id')) { ?>
								<li><a href="<?php echo base_url(); ?>warehouse/add/admin">Dodaj Korektę</a></li>
							<?php } ?>
							<li><a href="<?php echo base_url(); ?>warehouse/add/sent">Wyślij</a></li>
						</ul>
					</li>
					<?php } ?>
					<?php if ($this->session->userdata('admin_lvl')) { ?>	
					<li><a href="#">Użytkownicy</a>
						<ul>
							<li><a href="<?php echo base_url(); ?>users/manage">Zarządzaj</a></li>
						</ul>
					</li>
					<?php } ?>
					</ul>     
			</nav><!-- #topnav -->

		</header><!-- end header -->