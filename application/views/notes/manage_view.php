<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
<!-- responsive FlexSlider image slideshow -->
<div class="wrapper">
	<h1>Zarządzanie notatkami</h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
	<section id="content" class="wide-content">
		<a href="<?php echo base_url(); ?>notes/manage/edit/0">Nowa notatka</a>
		<table>
			<tr><th>Data</th><th>Tytuł</th><th>Treść</th><th>User</th><th>Akcje</th></tr>
			<?php $i = 1; ?>
			<?php foreach ($notes as $note) { ?>
				<tr>
					<td><?php echo $note['data']; ?></td>
					<td><?php echo $note['title']; ?></td>								
					<td><?php echo $note['text']; ?></td>	
					<td><?php echo $note['user']; ?></td>		
					<td>
						<a href="<?php echo base_url(); ?>notes/manage/del/<?php echo $note['id']; ?>">Kasuj</a>
						<a href="<?php echo base_url(); ?>notes/manage/edit/<?php echo $note['id']; ?>">Edytuj</a>
					</td>
				</tr>
			<?php } ?>			
		</table>
</section><!-- #end content area -->
         
</div><!-- #end div #main .wrapper -->

 <?php $this->load->view('template/footer_view.php'); ?>