<?php $this->load->view('template/header_view.php'); ?>

    <section id="page-header" class="clearfix">
        <div class="wrapper">
            <h1><?php echo $this->lang->line('h1_report_crm'); ?></h1>
            <?php if (isset($client)) { ?>
                <h2><?php echo $client['name']; ?>: <?php echo $start . ' - ' . $end; ?></h2>
            <?php } ?>
            <?php if (isset($product)) { ?>
                <h2><?php echo $product['name']; ?>: <?php echo $start . ' - ' . $end; ?></h2>
            <?php } ?>
        </div>

    </section>


    <!-- main content area -->
    <div class="wrapper" id="main">

        <!-- content area -->
        <section id="content" class="wide-content">
            <div class="grid_12">
                <table>
                    <tr><!--<th><?php //echo $this->lang->line('id');    ?></th>-->
                        <th><?php echo $this->lang->line('subject'); ?></th>
                        <th><?php echo $this->lang->line('req'); ?></th>
                        <th><?php echo $this->lang->line('bought'); ?></th>
                        <th><?php echo $this->lang->line('percent'); ?></th>
                    </tr>
                    <?php foreach ($report as $row) { ?>
                        <tr>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[3]; ?>%</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </section><!-- #end content area -->

    </div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>