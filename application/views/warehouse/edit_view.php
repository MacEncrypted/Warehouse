<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
<div class="wrapper">
	<h1>Zarządzanie produktami</h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
<section id="content" class="wide-content">
		<form action="" method="POST">
			<input type="hidden" name="sent" value="yes">
					<input type="text" name="name" value="<?php if (isset($user['name'])) { echo $user['name']; } ?>" required>
					<input type="text" name="desc" value="<?php if (isset($user['desc'])) { echo $user['desc']; } ?>" required>
					<input type="submit">
		</form>
</section><!-- #end content area -->
         
</div><!-- #end div #main .wrapper -->

 <?php $this->load->view('template/footer_view.php'); ?>