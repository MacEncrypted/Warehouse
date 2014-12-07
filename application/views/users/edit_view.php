<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
	<div class="wrapper">
		<h1><?php echo $this->lang->line('h1_users_manage_add'); ?></h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">
		<div class="grid_4">
		<form action="" method="POST">
			<input type="hidden" name="sent" value="yes">
			<div class="label"><?php echo $this->lang->line('login'); ?></div>
			<input type="text" name="login" value="<?php
			if (isset($user['login'])) {
				echo $user['login'];
			}
			?>" required>
			<div class="label"><?php echo $this->lang->line('passwd'); ?></div>
			<input type="password" name="passwd" value="" required>
			<div class="label"><?php echo $this->lang->line('level'); ?></div>
			<select name="level">						
				<option value="1" <?php
				if (isset($user['level']) && ($user['level'] == 1)) {
					echo 'selected="true"';
				}
				?>><?php echo $this->lang->line('user_1'); ?></option>
				<option value="2" <?php
				if (isset($user['level']) && ($user['level'] == 2)) {
					echo 'selected="true"';
				}
				?>><?php echo $this->lang->line('user_2'); ?></option>
			</select>
			<input type="submit" value="<?php echo $this->lang->line('submit'); ?>">
		</form>
		</div>
	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>