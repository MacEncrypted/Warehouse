<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
	<div class="wrapper">
		<h1><?php echo $this->lang->line('h1_notes_manage'); ?></h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">
		<a href="<?php echo base_url(); ?>notes/manage/edit/0"><?php echo $this->lang->line('new'); ?></a>
		<table>
			<tr><th><?php echo $this->lang->line('data'); ?></th>
				<th><?php echo $this->lang->line('title'); ?></th>
				<th><?php echo $this->lang->line('text'); ?></th>
				<th><?php echo $this->lang->line('login'); ?></th>
				<th><?php echo $this->lang->line('actions'); ?></th></tr>
			<?php $i = 1; ?>
			<?php foreach ($notes as $note) { ?>
				<tr>
					<td><?php echo $note['data']; ?></td>
					<td><?php echo $note['title']; ?></td>								
					<td><?php echo $note['text']; ?></td>	
					<td><?php echo $note['user']; ?></td>		
					<td>
						<a href="<?php echo base_url(); ?>notes/manage/del/<?php echo $note['id']; ?>" onclick="return confirm(<?php echo $this->lang->line('confirm_delete'); ?>);"><?php echo $this->lang->line('del'); ?></a>
						<a href="<?php echo base_url(); ?>notes/manage/edit/<?php echo $note['id']; ?>"><?php echo $this->lang->line('edit'); ?></a>
					</td>
				</tr>
			<?php } ?>			
		</table>
	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>