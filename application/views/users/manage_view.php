<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
<div class="wrapper">
	<h1><?php echo $this->lang->line('h1_users_manage'); ?></h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 
    
<!-- content area -->    
	<section id="content" class="wide-content">
		<a href="<?php echo base_url(); ?>users/manage/edit/0"><?php echo $this->lang->line('new'); ?></a>
		<table>
			<tr><th><?php echo $this->lang->line('id'); ?></th>
				<th><?php echo $this->lang->line('login'); ?></th>
				<th><?php echo $this->lang->line('level'); ?></th>
				<th><?php echo $this->lang->line('actions'); ?></th></tr>
			<?php $i = 1; ?>
			<?php foreach ($users as $user) { ?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><b><?php echo $user['login']; ?><b></td>
					<td>
						<?php if($user['level']==1) { echo 'Magazynier'; } ?>
						<?php if($user['level']==2) { echo 'Administrator'; } ?>
					</td>
					<td>
						<a href="<?php echo base_url(); ?>users/manage/del/<?php echo $user['id']; ?>">Kasuj</a>
						<a href="<?php echo base_url(); ?>users/manage/edit/<?php echo $user['id']; ?>">Edytuj</a>
					</td>
				</tr>
			<?php } ?>			
		</table>
</section><!-- #end content area -->
         
</div><!-- #end div #main .wrapper -->

 <?php $this->load->view('template/footer_view.php'); ?>