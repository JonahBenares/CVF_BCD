

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Supplier
                                <button type="button" class="btn btn-primary btn-fill pull-right" data-toggle="modal" data-target="#addSupp">
                                  <span class="ti-plus"></span> Add
                                </button> 
                            </h4>
                            <p class="category">..</p>
                        </div>
                    	<div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <th width="25%">Supplier Name</th>
                                	<th width="10%" align="center"><span class="ti-menu"></span></th>
                                </thead>
                                <tbody>
                                    <?php foreach($supplier AS $s){ ?>
                                    <tr>
                                    	<td><?php echo $s->supplier_name; ?></td>
                                    	<td>
                                    		<a href = "" type="button" class="btn btn-xs btn-info btn-fill" data-id="<?php echo $s->supplier_id; ?>" data-name = '<?php echo $s->supplier_name; ?>' id ="updateSupp_button" data-toggle="modal" data-target="#updateSupp">
                                    			<span class="ti-pencil-alt"></span>
                                    		</a>
                                            <a href="<?php echo base_url(); ?>index.php/masterfile/delete_supplier/<?php echo $s->supplier_id; ?>" onclick="confirmationDelete(this);return false;" class="btn btn-xs btn-danger btn-fill">
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


        