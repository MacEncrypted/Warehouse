<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
<div class="wrapper">
	<h1>Generowanie raportu<?php if(isset($generate)) { echo '<br>Raport od ' . $generate['start'] . ' do ' . $generate['end']; } ?></h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
	<section id="content" class="wide-content">
    
		<form action="" method="POST">
			<input type="hidden" name="sent" value="yes">
			<div class="label">Data od:</div>
				<input type="date" name="start" placeholder="2014-01-01" required>
			<div class="label">Data do:</div>
				<input type="date" name="end" placeholder="2014-01-01" required>
			<input type="submit" value="GENERUJ">
		</form>
		
		<?php if(isset($generate)) { ?>		
			<?php foreach ($reports as $report) { $sum = 0;?>
				<table>
					<tr><th>Produkt</th><th>Data</th><th>Użytkownik</th><th>Akcja</th><th>Ilość</th></tr>
				<?php foreach ($report as $log) { ?>
					<tr>
					<td><?php echo $log['pname']; ?></td>
					<td><?php echo $log['date']; ?></td>
					<td><?php echo $log['login']; ?></td>
					<td><?php echo $log['action']; ?></td>
					<td><?php $sum += $log['amount']; echo $log['amount']; ?></td>
				</tr>
				<?php } ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>SUMA: <b><?php echo $sum; ?></b></td>
					</tr>
				</table>
			<?php } ?>
		<?php } ?>
		
		
</section><!-- #end content area -->
   
</div><!-- #end div #main .wrapper -->

 <?php $this->load->view('template/footer_view.php'); ?>