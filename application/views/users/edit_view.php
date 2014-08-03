<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
<div class="wrapper">
	<h1>Zarządzanie użytkownikami</h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
<section id="content" class="wide-content">
		<form action="" method="POST">
			<input type="hidden" name="sent" value="yes">
					<input type="text" name="login" value="<?php if (isset($user['login'])) { echo $user['login']; } ?>" required>
					<input type="password" name="passwd" value="" required>
					<input type="number" name="level" value="<?php if (isset($user['level'])) { echo $user['level']; } ?>" required>
					<input type="submit">
		</form>
</section><!-- #end content area -->
         
</div><!-- #end div #main .wrapper -->

 <?php $this->load->view('template/footer_view.php'); ?>