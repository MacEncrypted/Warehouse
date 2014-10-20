<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
	<div class="wrapper">
		<h1><?php echo $this->lang->line('h1_noaccess'); ?></h1>
    </div>
</section>

<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">
		<?php echo $this->lang->line('long_noaccess'); ?>
	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>