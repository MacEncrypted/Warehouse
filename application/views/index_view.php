<?php $this->load->view('template/header_view.php'); ?>

<!-- hero area (the grey one with a slider -->
<section id="hero" class="clearfix">    
    <!-- responsive FlexSlider image slideshow -->
    <div class="wrapper">
		<div class="row"> 
			<div class="grid_5">
				<h1>This Warehouse project</h1>
                                <p>...is <b>free</b> for any commercial or non commercial use, PHP software based on CodeIgniter 2.2 that allows you to manage warehouse. Fast, simple and mobile. </p> 
				<p><b>Project is available with MIT license. Project belongs to &copy; Encrypted.pl.</b></p>
				<p>Project covers users management (admin or worker levels), products and list management, flow of products, reports, search engine and easy backups. It can even print all results to PDF or export it to CSV (so you can view it in Excel or Calc).</p>
				<p><a href="#buy" class="buttonlink">License</a>
					<a href="#demo" class="buttonlink">Demo</a> 
					<a href="https://github.com/encrypted-systems/Warehouse" class="buttonlink">GitHub</a> 
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
		<h1>Upcoming changes</h1>
		<ul>
			<li>restriction of + values in some forms</li>
		</ul>
		If you would like to find out how flow in Warehouse works, please read this <a href="<?php base_url(); ?>flow.pdf" target="_blank">flow.pdf</a> document.
	</section><!-- #end content area -->
</div>

<section id="buy" class="blueelement vertical-padding">
	<div class="wrapper clearfix">
		<h1>Licensing MIT short summary</h1>
                <p>MIT is a short, permissive software license. Basically, you can do whatever you want as long as you include the original copyright to <b>Encrypted.pl</b> and license notice in any copy of the software/source.</p>
		<div class="grid_12">   	
			<div class="grid_4">            
				<h3>You can</h3>
                                <p><ul>
                                    <li>Commercial Use</li>
                                    <li>Modify</li>
<li>Distribute</li>
<li>Sublicense</li>
<li>Private Use</li>
                                </ul></p>				
			</div>

			<div class="grid_4">        	
				<h3>You Cannot</h3>
				<p><ul>
                                    <li>Hold liable</li>
                                </ul></p>
                        </div>

			<div class="grid_4">        	
				<h3>You Must</h3> 

				<p><ul>
                                    <li>Include Copyright</li>
                                    <li>Include License</li>
                                </ul></p>
			</div>
		</div>
		<div class="grid_12">
                    <small>Please take in mind that Warehouse software is licensed with MIT NWC (without any warranty). Quick Summary from tldrlegal.com</small>
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