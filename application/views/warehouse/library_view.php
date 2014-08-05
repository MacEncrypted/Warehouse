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
		<a href="<?php echo base_url(); ?>warehouse/library/edit/0">Nowy</a>
		<table>
			<tr><th>Id</th><th>Nazwa</th><th>Opis</th><th>Akcje</th></tr>
			<?php foreach ($products as $product) { ?>
				<tr>
					<td><?php echo $product['id']; ?></td>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['desc']; ?></td>
					<td>
						<?php if ($this->session->userdata('admin_lvl')) { ?>
						<a href="<?php echo base_url(); ?>warehouse/library/del/<?php echo $product['id']; ?>">Kasuj</a>
						<?php } ?>
						<a href="<?php echo base_url(); ?>warehouse/library/edit/<?php echo $product['id']; ?>">Edytuj</a>
					</td>
				</tr>
			<?php } ?>			
		</table>
</section><!-- #end content area -->
         
</div><!-- #end div #main .wrapper -->

 <?php $this->load->view('template/footer_view.php'); ?>