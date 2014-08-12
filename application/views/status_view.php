<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
<div class="wrapper">
	<h1>Aktualny stan magazynu</h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
	<section id="content" class="wide-content">
    
		<table>
			<tr><th>Id</th><th>Nazwa</th><th>Magazyn</th><th>W drodze</th><th>Produkcja</th><th>Total</th></tr>
			<?php foreach ($products as $product) { $sum = 0;?>
				<tr>
					<td><?php echo $product['id']; ?></td>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['magazyn_sum']; $sum += $product['magazyn_sum']; ?></td>
					<td><?php echo $product['onway_sum']; $sum += $product['onway_sum']; ?></td>
					<td><?php echo $product['production_sum']; $sum += $product['production_sum']; ?></td>
					<td><?php echo $sum; ?></td>
				</tr>
			<?php } ?>			
		</table>
		
		
</section><!-- #end content area -->
   
</div><!-- #end div #main .wrapper -->

 <?php $this->load->view('template/footer_view.php'); ?>