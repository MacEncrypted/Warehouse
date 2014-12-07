<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
	<div class="wrapper">
		<h1><?php echo $this->lang->line('h1_add_packing_grouponway'); ?></h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">
		<div class="grid_4">
			<form action="" method="POST">
				<input type="hidden" name="sent" value="yes">
				<div class="label"><?php echo $this->lang->line('product'); ?></div>
				<select name="id">
					<?php foreach ($products as $product) { ?>
						<option value="<?php
						if (isset($product['id'])) {
							echo $product['id'];
						}
						?>">
									<?php
									if (isset($product['name'])) {
										echo $product['name'];
									}
									?>
						</option>
					<?php } ?>
				</select>
				<div class="label"><?php echo $this->lang->line('packing'); ?></div>
				<select disabled="disabled">
					<?php foreach ($packings as $product) { ?>
						<option value="<?php
						if (isset($product['id'])) {
							echo $product['id'];
						}
						?>"<?php
								if (isset($product['id']) && ($product['id'] == $lock)) {
									echo ' selected="selected"';
								}
								?>>
									<?php
									if (isset($product['name'])) {
										echo $product['name'];
									}
									?>
						</option>
					<?php } ?>
				</select>
				<input type="hidden" name="pckgid" value="<?php echo $lock; ?>">
				<div class="label"><?php echo $this->lang->line('amount'); ?></div>
				<input type="number" name="amount" required>
				<input type="submit" value="<?php echo $this->lang->line('submit'); ?>">
			</form>
		</div>
		<div class="grid_8">
			<table>
				<tr><th><?php echo $this->lang->line('product'); ?></th><th><?php echo $this->lang->line('amount'); ?></th><th><?php echo $this->lang->line('packing'); ?></th></tr>
				<?php foreach ($reports as $report) { ?>
					<tr>
						<td><?php echo $report['name']; ?></td>
						<td><?php echo (0 - $report['sum']); ?></td>
						<td><?php echo $report['packing']; ?></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>