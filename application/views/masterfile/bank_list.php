

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Bank
                                <button type="button" class="btn btn-primary btn-fill pull-right" data-toggle="modal" data-target="#addBank">
                                  <span class="ti-plus"></span> Add
                                </button> 
                            </h4>
                            <p class="category">..</p>
                        </div>
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <th width="25%">Bank Name</th>
                                    <th width="10%" align="center"><span class="ti-menu"></span></th>
                                </thead>
                                <tbody>
                                    <?php foreach($bank AS $b){ ?>
                                    <tr>
                                        <td><?php echo $b->bank_name; ?></td>
                                        <td>
                                            <a href = "" type="button" class="btn btn-xs btn-info btn-fill" data-id="<?php echo $b->bank_id; ?>" data-name = '<?php echo $b->bank_name; ?>' id ="updateBank_button" data-toggle="modal" data-target="#updateBank">
                                                <span class="ti-pencil-alt"></span>
                                            </a>
                                            <a href="<?php echo base_url(); ?>index.php/masterfile/delete_bank/<?php echo $b->bank_id; ?>" onclick="confirmationDelete(this);return false;" class="btn btn-xs btn-danger btn-fill">
                                                <span class="ti-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
