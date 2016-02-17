<?php $this->load->view('template/header_view.php'); ?>

    <section id="page-header" class="clearfix">
        <div class="wrapper">
                <h1><?php echo $this->lang->line('h1_add_products_to_document'); ?>: <?php echo $document['name']; ?></h1>
        </div>

    </section>


    <!-- main content area -->
    <div class="wrapper" id="main">

        <!-- content area -->
        <section id="content" class="wide-content">
            <div class="grid_4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="sent" value="yes">
                    <div class="label"><?php echo $this->lang->line('product'); ?></div>
                    <select name="product">
                        <?php foreach ($products as $product) { ?>
                            <option value="<?php echo $product['id'] ?>"><?php echo $product['name'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="label"><?php echo $this->lang->line('lists_type'); ?></div>
                    <select name="type">
                        <option value="1"><?php echo $this->lang->line('req'); ?></option>
                        <option value="0"><?php echo $this->lang->line('bought'); ?></option>
                    </select>
                    <div class="label"><?php echo $this->lang->line('amount'); ?></div>
                    <input type="number" name="amount" min="1" max="1000" required>
                    <div class="label"><?php echo $this->lang->line('date'); ?></div>
                    <input type="date" name="date" value="" required>
                    <input type="submit" value="<?php echo $this->lang->line('submit'); ?>">
                    <div class="label"></div>
                </form>
            </div>
            <div class="grid_4">
                <h2><?php echo $this->lang->line('req'); ?></h2>
                <table>
                    <tr>
                        <th><?php echo $this->lang->line('product'); ?></th>
                        <th><?php echo $this->lang->line('date'); ?></th>
                        <th><?php echo $this->lang->line('amount'); ?></th>
                        <th><?php echo $this->lang->line('actions'); ?></th>
                    </tr>
                    <?php foreach ($reqs as $list) { ?>
                        <tr>
                            <td><?php echo $list['product']['name']; ?></td>
                            <td><?php echo $list['date']; ?></td>
                            <td><?php echo $list['amount']; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>crm/lists/del/<?php echo $list['id']; ?>"
                                   onclick="return confirm(<?php echo $this->lang->line('confirm_delete'); ?>);"><?php echo $this->lang->line('del'); ?></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="grid_4">
                <h2><?php echo $this->lang->line('bought'); ?></h2>
                <table>
                    <tr>
                        <th><?php echo $this->lang->line('product'); ?></th>
                        <th><?php echo $this->lang->line('date'); ?></th>
                        <th><?php echo $this->lang->line('amount'); ?></th>
                        <th><?php echo $this->lang->line('actions'); ?></th>
                    </tr>
                    <?php foreach ($bought as $list) { ?>
                        <tr>
                            <td><?php echo $list['product']['name']; ?></td>
                            <td><?php echo $list['date']; ?></td>
                            <td><?php echo 0 - $list['amount']; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>crm/lists/del/<?php echo $list['id']; ?>"
                                   onclick="return confirm(<?php echo $this->lang->line('confirm_delete'); ?>);"><?php echo $this->lang->line('del'); ?></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </section><!-- #end content area -->

    </div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>