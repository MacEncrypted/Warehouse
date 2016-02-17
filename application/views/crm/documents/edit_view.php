<?php $this->load->view('template/header_view.php'); ?>

    <section id="page-header" class="clearfix">
        <div class="wrapper">
            <?php if (isset($selected['name'])) { ?>
                <h1><?php echo $this->lang->line('edit'); ?> <?php echo $selected['name']; ?></h1>
            <?php } else { ?>
                <h1><?php echo $this->lang->line('h1_add_documents_to_client'); ?>: <?php echo $client['name']; ?></h1>
            <?php } ?>
        </div>

    </section>


    <!-- main content area -->
    <div class="wrapper" id="main">

        <!-- content area -->
        <section id="content" class="wide-content">
            <div class="grid_4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="sent" value="yes">
                    <div class="label"><?php echo $this->lang->line('name'); ?></div>
                    <input type="text" name="name" value="<?php
                    if (isset($selected['name'])) {
                        echo $selected['name'];
                    }
                    ?>" required>
                    <div class="label"><?php echo $this->lang->line('file'); ?></div>
                    <input type="file" name="file" size=1000" />
                    <div class="label"><?php echo $this->lang->line('start_date'); ?></div>
                    <input type="date" name="start" value="<?php
                    if (isset($selected['start'])) {
                        echo $selected['start'];
                    }
                    ?>" required>
                    <div class="label"><?php echo $this->lang->line('end_date'); ?></div>
                    <input type="date" name="end" value="<?php
                    if (isset($selected['end'])) {
                        echo $selected['end'];
                    }
                    ?>" required>
                    <input type="submit" value="<?php echo $this->lang->line('submit'); ?>">
                    <div class="label"></div>
                    <a href="<?php echo base_url(); ?>crm/documents/client/<?php echo $client['id']; ?>"><?php echo $this->lang->line('back_to_add'); ?></a>
                </form>
            </div>
            <div class="grid_8">
                <table>
                    <tr><!--<th><?php //echo $this->lang->line('id');    ?></th>-->
                        <th><?php echo $this->lang->line('name'); ?></th>
                        <th><?php echo $this->lang->line('file'); ?></th>
                        <th><?php echo $this->lang->line('start_date'); ?></th>
                        <th><?php echo $this->lang->line('end_date'); ?></th>
                        <th><?php echo $this->lang->line('actions'); ?></th>
                    </tr>
                    <?php foreach ($documents as $document) { ?>
                        <tr>
                            <td><?php echo $document['name']; ?></td>
                            <td>
                                <?php if ($document['file'] != '') { ?>
                                    <a href="<?php echo base_url() . 'uploads/' . $document['file']; ?>" target="_blank"><?php echo $this->lang->line('view'); ?></a>
                                <?php } ?>
                            </td>
                            <td><?php echo $document['start']; ?></td>
                            <td><?php echo $document['end']; ?></td>
                            <td>
                                <?php if ($this->session->userdata('admin_lvl')) { ?>
                                    <a href="<?php echo base_url(); ?>crm/documents/del/<?php echo $document['id']; ?>"
                                       onclick="return confirm(<?php echo $this->lang->line('confirm_delete'); ?>);"><?php echo $this->lang->line('del'); ?></a>
                                <?php } ?>
                                <a href="<?php echo base_url(); ?>crm/documents/client/<?php echo $client['id']; ?>/<?php echo $document['id']; ?>"><?php echo $this->lang->line('edit'); ?></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </section><!-- #end content area -->

    </div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>