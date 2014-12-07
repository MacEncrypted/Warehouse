<?php $this->load->view('template/header_view.php'); ?>

<!-- hero area (the grey one with a slider -->
<section id="hero" class="clearfix">    
    <!-- responsive FlexSlider image slideshow -->
    <div class="wrapper">
		<div class="row"> 
			<div class="grid_5">
				<h1>This Warehouse project</h1>
				<p>...is free for non commercial use, PHP software based on CodeIgniter 2.2 that allows you to manage warehouse. Fast, simple and mobile. </p> 
				<p><b>Commercial use is free for 1 month, after this time requires license.</b></p>
				<p>Project covers users management (admin or worker levels), products and list management, flow of products, reports, search engine and easy backups. It can even print all results to PDF or export it to CSV (so you can view it in Excel or Calc).</p>
				<p><a href="#buy" class="buttonlink">Buy</a>
					<a href="#demo" class="buttonlink">Demo</a> 
					<a href="https://github.com/encrypted-systems/Warehouse" class="buttonlink">GitHub Sources</a> 
					<a href="https://github.com/Wampirue/Warehouse/archive/master.zip" class="buttonlink">Download</a></p>
			</div>
			<div class="grid_7 rightfloat">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="<?php echo base_url(); ?>images/warehouse-pic3.jpg" />
							<p class="flex-caption">Easy to view on mobile phones and tablets</p>
						</li>
						<li>
							<img src="<?php echo base_url(); ?>images/warehouse-pic4.jpg" />
							<p class="flex-caption">System log, so nothing can hide.</p>
						</li>
						<li>
							<img src="<?php echo base_url(); ?>images/warehouse-pic1.jpg" />
							<p class="flex-caption">One click backup.</p>
						</li>
						<li>
							<img src="<?php echo base_url(); ?>images/warehouse-pic2.jpg" />
							<p class="flex-caption">Easy to export to CSV (and view in Microsoft Excel or Calc).</p>
						</li>
					</ul>
                </div><!-- FlexSlider -->
			</div><!-- end grid_7 -->
        </div><!-- end row -->
	</div><!-- end wrapper -->
</section><!-- end hero area -->

<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">
		<h1>Warehouse project covers</h1>
		<ul>
			<li>user authentication (admin and worker level)</li>
			<li>user management (add, edit, delete)</li>
			<li>library of products (add, edit, delete)</li>
			<li>adding products and management in flow (production -> on way -> in warehouse -> sold)</li>
			<li>notes management </li>
			<li>notes reminder </li>
			<li>action log (who?, when?, what?)</li>
			<li>search products changes in selected time</li>
			<li>one click backup</li>
			<li>easy system clearing (one button to clear all numeric values)</li>
			<li>multi language translation (translating one file translates whole warehouse)</li>
		</ul>
		If you would like to find out how flow in Warehouse works, please read this <a href="<?php base_url(); ?>flow.pdf" target="_blank">flow.pdf</a> document.
	</section><!-- #end content area -->
</div>

<section id="buy" class="blueelement vertical-padding">
	<div class="wrapper clearfix">
		<h1>Buying Warehouse for your company</h1>

		<div class="grid_12">   	
			<div class="grid_4">            
				<h3>30 days license</h3>
				<p>If you would like to test Warehouse in your company - do it! For the first 30 days it is completely free.</p>				
			</div>

			<div class="grid_4">        	
				<h3>Period license</h3>
				<p>An period license will allow the customer to use the licensed software and to download all updates for period of time. After the period ends, the software will no longer be legal unless a new license is purchased.</p>
			</div>

			<div class="grid_4">        	
				<h3>Perpetual License</h3>
				<p>An period license will allow the customer to use the licensed software and to download all updates forever.</p>
			</div>
		</div>
		<div class="grid_12">  
			<div class="grid_4"><h3>$0/30 days</h3></div>
			<div class="grid_4"><h3>$3/mo or $29/year</h3></div>
			<div class="grid_4"><h3>$99/forever</h3></div>		
		</div>
		<div class="grid_12">
			<h1>Contact us: mail@encrypted.pl</h1>
			<small>Please take in mind that Warehouse software is licensed and sold with NWC (without any warranty). However with any of this licenses you are allowed to report bugs and download latest updates! 
				Selling entity: Encrypted.pl Database Systems AIP, Piekna Street 68, 00-672 Warsaw, Poland</small>
		</div>
	</div><!-- #end div .wrapper -->
</section>

<div class="wrapper" id="demo"> 

	<!-- content area -->    
	<section id="content" class="wide-content">
		<h1>Demo</h1>
		<p>To signin please use following administrator's data. Please take in mind that editing admin data on this demo system is locked.</p>
		<ul>
			<li>login: <b>root</b></li>
			<li>password: <b>root</b></li>
		</ul>
	</section><!-- #end content area -->
</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>