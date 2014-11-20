<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
	<div class="wrapper">
		<h1><?php echo $this->lang->line('h1_search'); ?>
			<?php
			if (isset($generate)) {
				echo '<br>' . $generate['start'] . ' - ' . $generate['end'];
			}
			if (isset($generate['product']) && ($generate['product'] != '')) {
				echo ', ' . $this->lang->line('product') . ': ' . $generate['product']['name'];
			} else {
				echo ', ' . $this->lang->line('product') . ': ' . $this->lang->line('all');
			}
			?></h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">

		<table id="print-table">
			<tr><!--<th><?php //echo $this->lang->line('id');     ?></th>-->
				<th><?php echo $this->lang->line('name'); ?></th>
				<th><?php echo $this->lang->line('wh'); ?></th>
				<th><?php echo $this->lang->line('onway'); ?></th>
				<th><?php echo $this->lang->line('production'); ?></th>
				<th><?php echo $this->lang->line('given'); ?></th>
				<th><?php echo $this->lang->line('total'); ?></th></tr>
			<?php
			foreach ($products as $product) {
				$sum = 0;
				?>
				<tr>
					<!--<td><?php //echo $product['id'];     ?></td>-->
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['magazyn_sum']; ?></td>
					<td><?php echo $product['onway_sum']; ?></td>
					<td><?php echo $product['production_sum']; ?></td>
					<td><?php echo $product['given_sum'] ?></td>
					<td><?php echo $product['total_sum'] ?></td>
				</tr>
			<?php } ?>			
		</table>
		<div id="print">
			<a href="#" class="buttonlink" onclick="window.print();
					return false;">
				   <?php echo $this->lang->line('print'); ?>
			</a>
			<form action="<?php echo base_url(); ?>enc/csv" method ="post" id="csv_form"> 
				<input type="hidden" name="csv_text" id="csv_text">
				<a href="#" 
				   class="buttonlink" onclick="getCSVData()">
					<?php echo $this->lang->line('print_csv'); ?>
				</a>
			</form>
		</div>
	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>