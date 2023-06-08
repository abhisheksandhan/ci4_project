<?php include(INCLUDESPATH . 'header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!--- Success Message --->
            <?php if ($this->session->flashdata('success')) { ?>
                <p style="font-size: 20px; color:green">
                    <?php echo $this->session->flashdata('success'); ?>
                </p>
            <?php } ?>
            <!---- Error Message ---->
            <?php if ($this->session->flashdata('error')) { ?>
                <p style="font-size: 20px; color:red">
                    <?php echo $this->session->flashdata('error'); ?>
                </p>
            <?php } ?>


            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Isbn_no</th>
                        <th>Author</th>
                        <th>Created_at</th>
                    </thead>
                    <tbody>
                        <?php
                        $cnt = 1;
                        foreach ($result as $row) {
                            ?>  
                            <tr>
                                <td>
                                    <?php echo htmlentities($cnt); ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row->Title); ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row->Isbn_no); ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row->Author); ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row->Created_at); ?>
                                </td>
                                <td>
                                    <?php
                                    //for passing row id to controller
                                    echo anchor("Read/getdetails/{$row->id}", ' ', 'class="btn btn-primary btn-xs glyphicon glyphicon-pencil"') ?>
                                    Edit
                                </td>
                                <td>
                                    <a href="<?php echo site_url("Delete/index/{$row->id}"); ?>">
                                        <button type="button" class="btn btn-warning">
                                            <?php
                                            //for passing row id to controller
                                            echo anchor("Delete/index/{$row->id}", ' ', 'class="glyphicon glyphicon-trash btn-danger btn-xs"') ?>
                                            Delete
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            // for serial number increment
                            $cnt++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include(INCLUDESPATH . 'footer.php'); ?>