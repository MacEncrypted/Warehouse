<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
<div class="wrapper">
	<?php if (isset($user['name'])) { ?> 
		<h1>Edycja packing listy: <?php echo $user['name']; ?></h1>
	<?php } else { ?>
		<h1>Dodawanie packing listy</h1>
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
				<div class="label">Nazwa produktu:</div>
						<input type="text" name="name" value="<?php if (isset($user['name'])) { echo $user['name']; } ?>" required>
				<div class="label">Opis produktu:</div>
						<input type="text" name="desc" value="<?php if (isset($user['desc'])) { echo $user['desc']; } ?>" required>
						<input type="submit" >
			</form>
		</div>
		<div class="grid_8">
			<table>
			<tr><th>Id</th><th>Nazwa</th><th>Opis</th><th>Akcje</th></tr>
			<?php foreach ($products as $product) { ?>
				<tr>
					<td><?php echo $product['id']; ?></td>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['desc']; ?></td>
					<td>
						<?php if ($this->session->userdata('admin_lvl')) { ?>
						<a href="<?php echo base_url(); ?>warehouse/packing/del/<?php echo $product['id']; ?>">Kasuj</a>
						<?php } ?>
						<a href="<?php echo base_url(); ?>warehouse/packing/edit/<?php echo $product['id']; ?>">Edytuj</a>
					</td>
				</tr>
			<?php } ?>			
			</table>
		</div>
</section><!-- #end content area -->
         
</div><!-- #end div #main .wrapper -->

 <?php $this->load->view('template/footer_view.php'); ?>