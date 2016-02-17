<?php $this->load->view('template/header_view.php'); ?>

    <section id="page-header" class="clearfix">
        <div class="wrapper">
                <h1><?php echo $this->lang->line('h1_preparing_report'); ?></h1>
        </div>

    </section>


    <!-- main content area -->
    <div class="wrapper" id="main">

        <!-- content area -->
        <section id="content" class="wide-content">
            <div class="grid_6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="sentp" value="yes">
                    <div class="label"><?php echo $this->lang->line('product'); ?></div>
                    <select name="product">
                        <?php foreach ($products as $product) { ?>
                            <option value="<?php echo $product['id'] ?>"><?php echo $product['name'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="label"><?php echo $this->lang->line('start_date'); ?></div>
                    <input type="date" name="start" value="" required>
                    <div class="label"><?php echo $this->lang->line('end_date'); ?></div>
                    <input type="date" name="end" value="" required>
                    <input type="submit" value="<?php echo $this->lang->line('submit'); ?>">
                    <div class="label"></div>
                </form>
            </div>
            <div class="grid_6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="sentc" value="yes">
                    <div class="label"><?php echo $this->lang->line('client'); ?></div>
                    <select name="client">
                        <?php foreach ($clients as $client) { ?>
                            <option value="<?php echo $client['id'] ?>"><?php echo $client['name'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="label"><?php echo $this->lang->line('start_date'); ?></div>
                    <input type="date" name="start" value="" required>
                    <div class="label"><?php echo $this->lang->line('end_date'); ?></div>
                    <input type="date" name="end" value="" required>
                    <input type="submit" value="<?php echo $this->lang->line('submit'); ?>">
                    <div class="label"></div>
                </form>
            </div>
        </section><!-- #end content area -->

    </div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>