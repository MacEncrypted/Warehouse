<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
	<div class="wrapper">
		<?php if (isset($user['name'])) { ?> 
			<h1><?php echo $this->lang->line('edit'); ?>: <?php echo $user['name']; ?></h1>
		<?php } else { ?>
			<h1><?php echo $this->lang->line('h1_add_order'); ?></h1>
		<?php } ?>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">
		<div class="grid_4">
			<form action="" method="POST">				
				<input type="hidden" name="sent" value="yes">
				<div class="label"><?php echo $this->lang->line('name'); ?></div>
				<input type="text" name="name" value="<?php
				if (isset($user['name'])) {
					echo $user['name'];
				}
				?>" required>
				<div class="label"><?php echo $this->lang->line('desc'); ?></div>
				<input type="text" name="desc" value="<?php
				if (isset($user['desc'])) {
					echo $user['desc'];
				}
				?>" required>
				<input type="submit" value="<?php echo $this->lang->line('submit'); ?>">
			</form>
		</div>
		<div class="grid_8">
			<table>
				<tr><!--<th><?php //echo $this->lang->line('id');    ?></th>-->
					<th><?php echo $this->lang->line('name'); ?></th>
					<th><?php echo $this->lang->line('desc'); ?></th>
					<th><?php echo $this->lang->line('actions'); ?></th></tr>
				<?php foreach ($orders as $order) { ?>
					<tr>
						<!--<td><?php //echo $order['id'];    ?></td>-->
						<td><?php echo $order['name']; ?></td>
						<td><?php echo $order['desc']; ?></td>
						<td>
							<?php if ($this->session->userdata('admin_lvl')) { ?>
								<a href="<?php echo base_url(); ?>warehouse/order/del/<?php echo $order['id']; ?>" onclick="return confirm(<?php echo $this->lang->line('confirm_delete'); ?>);"><?php echo $this->lang->line('del'); ?></a>
							<?php } ?>
							<a href="<?php echo base_url(); ?>warehouse/order/edit/<?php echo $order['id']; ?>"><?php echo $this->lang->line('edit'); ?></a>
						</td>
					</tr>
				<?php } ?>			
			</table>
		</div>
	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>