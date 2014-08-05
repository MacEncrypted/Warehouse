<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
<div class="wrapper">
	<h1>Dodawanie / edycja użytkownika</h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
<section id="content" class="wide-content">
		<form action="" method="POST">
			<input type="hidden" name="sent" value="yes">
			<div class="label">Login:</div>
					<input type="text" name="login" value="<?php if (isset($user['login'])) { echo $user['login']; } ?>" required>
			<div class="label">Hasło:</div>
					<input type="password" name="passwd" value="" required>
					<div class="label">Uprawnienia:</div>
					<select name="level">						
						<option value="1" <?php if (isset($user['level'])&&($user['level']==1)) { echo 'selected="true"'; } ?>>Magazynier</option>
						<option value="2" <?php if (isset($user['level'])&&($user['level']==2)) { echo 'selected="true"'; } ?>>Administrator</option>
					</select>
					<input type="submit" value="ZAPISZ">
		</form>
</section><!-- #end content area -->
         
</div><!-- #end div #main .wrapper -->

 <?php $this->load->view('template/footer_view.php'); ?>