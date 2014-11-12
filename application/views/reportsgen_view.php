<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
	<div class="wrapper">
		<h1><?php echo $this->lang->line('h1_report'); ?> <?php
			if (isset($generate)) {
				echo '<br>' . $generate['start'] . ' - ' . $generate['end'];
			}
			if (isset($user['login'])) {
				echo ': ' . $user['login'];
			} else {
				echo ': ' . $this->lang->line('all');
			}
			?></h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">
		<?php if (isset($generate)) { ?>		
			<table id="print-table">
				<tr><th><?php echo $this->lang->line('data'); ?></th>
					<th><?php echo $this->lang->line('login'); ?></th>
					<th><?php echo $this->lang->line('actions'); ?></th>
					<th><?php echo $this->lang->line('product'); ?></th>
					<th><?php echo $this->lang->line('amount'); ?></th></tr>
				<?php foreach ($reports as $log) { ?>
					<tr>						
						<td><?php echo $log['date']; ?></td>					
						<td><?php echo $log['login']; ?></td>					
						<td><?php echo $log['action']; ?></td>
						<td><?php echo $log['pname']; ?></td>
						<td><?php echo $log['amount']; ?></td>
					</tr>
				<?php } ?>
			</table>
		<?php } ?>

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