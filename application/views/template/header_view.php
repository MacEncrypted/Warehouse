<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php echo $this->lang->line('header_title'); ?></title>
		<meta name="description" content="<?php echo $this->lang->line('header_desc'); ?>">
		<meta name="keywords" content="<?php echo $this->lang->line('header_keywords'); ?>">

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
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/warehouse-logo.png" height="60" width="234"></a>
			</div>

			<!-- main navigation -->
			<nav id="topnav" role="navigation">
				<div class="menu-toggle"><?php echo $this->lang->line('menu_menu'); ?></div>
				<ul class="srt-menu" id="menu-main-navigation">
					<?php if ($this->session->userdata('admin_lvl')) { ?>	
						<li><a href="#"><?php echo $this->lang->line('menu_production'); ?></a>
							<ul>						
								<li><a href="<?php echo base_url(); ?>warehouse/add/production"><?php echo $this->lang->line('menu_inproduction'); ?></a></li>
								<li><a href="<?php echo base_url(); ?>main/proreports"><?php echo $this->lang->line('menu_proreport'); ?></a></li>
							</ul>
						</li>
					<?php } ?>
					<?php if ($this->session->userdata('user_lvl')) { ?>	
						<li><a href="#"><?php echo $this->lang->line('menu_add_packing'); ?></a>
							<ul>						
								<li><a href="<?php echo base_url(); ?>warehouse/add/onway"><?php echo $this->lang->line('menu_packing_transport'); ?></a></li>
								<li><a href="<?php echo base_url(); ?>warehouse/add/grouponway"><?php echo $this->lang->line('menu_group_packing_transport'); ?></a></li>
							</ul>
						</li>
					<?php } ?>
					<?php if ($this->session->userdata('user_lvl')) { ?>	
						<li><a href="#"><?php echo $this->lang->line('menu_warehouse'); ?></a>
							<ul>						
								<li><a href="<?php echo base_url(); ?>warehouse/add/packing"><?php echo $this->lang->line('menu_warehouse_in'); ?></a></li>
								<li><a href="<?php echo base_url(); ?>warehouse/add/grouppacking"><?php echo $this->lang->line('menu_warehouse_groupin'); ?></a></li>
								<li><a href="<?php echo base_url(); ?>warehouse/add/returner"><?php echo $this->lang->line('menu_warehouse_back'); ?></a></li>
								<?php if ($this->session->userdata('user_id')) { ?>
									<li><a href="<?php echo base_url(); ?>warehouse/add/admin"><?php echo $this->lang->line('menu_warehouse_correct'); ?></a></li>
								<?php } ?>
								<li><a href="<?php echo base_url(); ?>warehouse/add/sent"><?php echo $this->lang->line('menu_warehouse_out'); ?></a></li>								
								<li><a href="<?php echo base_url(); ?>main/status"><?php echo $this->lang->line('menu_warehouse_report'); ?></a></li>
							</ul>
						</li>
					<?php } ?>
					<?php if ($this->session->userdata('admin_lvl')) { ?>	
						<li><a href="#"><?php echo $this->lang->line('menu_lib'); ?></a>
							<ul>
								<li><a href="<?php echo base_url(); ?>warehouse/library"><?php echo $this->lang->line('menu_lib_products'); ?></a></li>							
								<li><a href="<?php echo base_url(); ?>warehouse/packing"><?php echo $this->lang->line('menu_lib_packing'); ?></a></li>
								<li><a href="<?php echo base_url(); ?>warehouse/order"><?php echo $this->lang->line('menu_lib_orders'); ?></a></li>
							</ul>
						</li>
					<?php } ?>
					<?php if ($this->session->userdata('admin_lvl')) { ?>	
						<li><a href="#"><?php echo $this->lang->line('menu_users'); ?></a>
							<ul>
								<li><a href="<?php echo base_url(); ?>users/manage"><?php echo $this->lang->line('menu_manage'); ?></a></li>
							</ul>
						</li>
					<?php } ?>
					<?php if ($this->session->userdata('user_lvl')) { ?>	
						<li><a href="#"><?php echo $this->lang->line('menu_system'); ?></a>
							<ul>
								<li><a href="<?php echo base_url(); ?>main/reports"><?php echo $this->lang->line('menu_system_log'); ?></a></li>								
								<li><a href="<?php echo base_url(); ?>notes/manage"><?php echo $this->lang->line('menu_system_notes'); ?></a></li>							
								<?php if ($this->session->userdata('admin_lvl')) { ?>
								<li><a href="<?php echo base_url(); ?>warehouse/zero"><?php echo $this->lang->line('menu_system_zero'); ?></a></li>	
								<?php } ?>
							</ul>
						</li>
					<?php } ?>
					<li><a href="#"><?php echo $this->lang->line('menu_login'); ?></a>
						<ul>							
							<li class="loginli">								
								<?php if ($this->session->userdata('user_id')) { ?>
									<?php echo $this->lang->line('menu_login_user'); ?><b><?php echo $this->session->userdata('user_login'); ?></b>	
									<form action="" method="POST">
										<input type="submit" name="logout" value="<?php echo $this->lang->line('menu_login_logout'); ?>">
									</form>

								<?php } else { ?>
									<form action="" method="POST">
										<?php echo $this->lang->line('menu_login_login'); ?>
										<input type="text" name="login">
										<?php echo $this->lang->line('menu_login_passwd'); ?>
										<input type="password" name="passwd">
										<input type="submit" value="<?php echo $this->lang->line('menu_login_signin'); ?>">
									</form>
								<?php } ?></li>
						</ul>						
					</li>
				</ul>     
			</nav><!-- #topnav -->
		</header><!-- end header -->