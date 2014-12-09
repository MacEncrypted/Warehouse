<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
	<!-- responsive FlexSlider image slideshow -->
	<div class="wrapper">
		<h1><?php echo $this->lang->line('h1_lib_manage'); ?></h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">
		<a href="<?php echo base_url(); ?>warehouse/library/edit/0">Nowy</a>
		<table>
				<tr><!--<th><?php //echo $this->lang->line('id');     ?></th>-->
				<th><?php echo $this->lang->line('name'); ?></th>
				<th><?php echo $this->lang->line('desc'); ?></th>
				<th><?php echo $this->lang->line('actions'); ?></th></tr>
			<?php foreach ($products as $product) { ?>
				<tr>
					<!--<td><?php //echo $product['id'];     ?></td>-->
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['desc']; ?></td>
					<td>
						<?php if ($this->session->userdata('admin_lvl')) { ?>
							<a href="<?php echo base_url(); ?>warehouse/packing/del/<?php echo $product['id']; ?>" onclick="return confirm(<?php echo $this->lang->line('confirm_delete'); ?>);"><?php echo $this->lang->line('del'); ?></a>
						<?php } ?>
						<a href="<?php echo base_url(); ?>warehouse/packing/edit/<?php echo $product['id']; ?>"><?php echo $this->lang->line('edit'); ?></a>
					</td>
				</tr>
			<?php } ?>			
		</table>
	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>