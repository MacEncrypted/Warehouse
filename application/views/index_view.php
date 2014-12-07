<?php $this->load->view('template/header_view.php'); ?>

<!-- hero area (the grey one with a slider -->
    <section id="hero" class="clearfix">    
    <!-- responsive FlexSlider image slideshow -->
    <div class="wrapper">
       <div class="row"> 
        <div class="grid_5">
            <h1>This Warehouse project</h1>
            <p>...is free for non commercial use PHP software based on CodeIgniter 2.2 that allows you to manage warehouse. Fast, simple and secure.</p> 
			<p>Project covers users management (admin or worker levels), products and list management, flow of products, reports, search engine and easy backups. It can even print all results to PDF or export it to CSV (so you can view it in Excel or Calc).</p>
			<p><a href="https://github.com/Wampirue/Warehouse" class="buttonlink">GitHub Sources</a> <a href="https://github.com/Wampirue/Warehouse/archive/master.zip" class="buttonlink">Download</a></p>
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
		To signin please use following admin data.<br/>
		Please take in mind that editing admin data on this demo website is locked.<br/><br/>
		login: <b>root</b><br/>
		passwd: <b>root</b><br/><br/>
		Codes are available at: <a href="https://github.com/Wampirue/Warehouse">https://github.com/Wampirue/Warehouse</a>
	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>