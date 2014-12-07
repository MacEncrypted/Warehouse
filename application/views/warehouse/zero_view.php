<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">   
	<div class="wrapper">
		<h1><?php echo $this->lang->line('menu_system_zero'); ?></h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">
		<div class="grid_4">
			<h2><?php echo $this->lang->line('h2_zero_all'); ?></h2>
			<form action="" method="POST">				
				<input type="hidden" name="sent" value="yes">
				<input type="checkbox" class="chx" name="zero_all" value="yes" required="required"><?php echo $this->lang->line('confirm'); ?>
				<input type="submit" >
			</form>
		</div>
		<div class="grid_4">
			<h2><?php echo $this->lang->line('h2_zero_desc'); ?></h2>
			<form action="" method="POST">				
				<input type="hidden" name="sent" value="yes">
				<select name="zero_desc">
					<?php foreach ($descriptions as $product) { ?>
						<option value="<?php
						if (isset($product['desc'])) {
							echo $product['desc'];
						}
						?>">
									<?php
									if (isset($product['desc'])) {
										echo $product['desc'];
									}
									?>
						</option>
					<?php } ?>
				</select>
				<input type="submit" value="<?php echo $this->lang->line('submit'); ?>">
			</form>
		</div>	
		<div class="grid_4">
			<h2><?php echo $this->lang->line('h2_zero_pro'); ?></h2>
			<form action="" method="POST">				
				<input type="hidden" name="sent" value="yes">
				<input type="checkbox" class="chx" name="zero_pro" value="yes" required="required"><?php echo $this->lang->line('confirm'); ?>
				<input type="submit" >
			</form>
		</div>
		<div class="grid_12">
			<h2><?php echo $info; ?></h2>
		</div>
	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>