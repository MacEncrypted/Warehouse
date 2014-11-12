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
		<div class="grid_6">
			<form action="" method="POST">
				<input type="hidden" name="sent" value="yes">
				<div class="label"><?php echo $this->lang->line('data'); ?></div>
				<input type="date" name="data" placeholder="2014-01-01" value="<?php
				if (isset($note['data'])) {
					echo $note['data'];
				}
				?>" required>
				<div class="label"><?php echo $this->lang->line('title'); ?></div>
				<input type="text" name="title" value="<?php
				if (isset($note['title'])) {
					echo $note['title'];
				}
				?>" required>
				<div class="label"><?php echo $this->lang->line('text'); ?></div>
				<input type="text" name="text" value="<?php
				if (isset($note['text'])) {
					echo $note['text'];
				}
				?>" required>
				<div class="label"><?php echo $this->lang->line('login'); ?></div>
				<select name="id_user">
					<?php foreach ($users as $user) { ?>
						<option value="<?php echo $user['id']; ?>" 
						<?php if (isset($note['id_user']) && ($note['id_user'] == $user['id'])) { ?>
									selected="true"
								<?php } ?>>
									<?php echo $user['login']; ?>
						</option>
					<?php } ?>
				</select>
				<input type="submit" value="ZAPISZ">
			</form>
		</div>
	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>