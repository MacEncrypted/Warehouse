<?php $this->load->view('template/header_view.php'); ?>

    <section id="page-header" class="clearfix">
        <div class="wrapper">
            <h1><?php echo $this->lang->line('h1_pick_client'); ?></h1>
        </div>

    </section>


    <!-- main content area -->
    <div class="wrapper" id="main">

        <!-- content area -->
        <section id="content" class="wide-content">
            <div class="grid_4">
                <form action="" method="POST">
                    <input type="hidden" name="sent" value="yes">
                    <div class="label"><?php echo $this->lang->line('name'); ?></div>
                    <select name="client">
                        <?php foreach ($clients as $client) { ?>
                            <option value="<?php echo $client['id'] ?>"><?php echo $client['name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="<?php echo $this->lang->line('submit'); ?>">
                </form>
            </div>
        </section><!-- #end content area -->

    </div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>