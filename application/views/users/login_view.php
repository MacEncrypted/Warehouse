<!-- not used -->

<?php if ($this->session->userdata('user_id')) { ?>
	<a href="?logout=true">Logout</a> <?php echo $this->session->userdata('user_login'); ?>
<?php } ?>

<form action="" method="POST">
    <input type="text" name="login">
    <input type="password" name="passwd">
    <input type="submit" value="<?php echo $this->lang->line('submit'); ?>">
</form>


