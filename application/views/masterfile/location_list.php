

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Location
                                <button type="button" class="btn btn-primary btn-fill pull-right" data-toggle="modal" data-target="#uploadfile">
                                  <span class="ti-plus"></span> Add
                                </button> 
                            </h4>
                            <p class="category">..</p>
                        </div>
                    	<div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <th width="25%">Location Name</th>
                                	<th width="25%">Address</th>
                                	<th width="15%">Contact No.</th>
                                    <th width="15%">CV Series</th>
                                	<th width="15%">Logo</th>
                                	<th width="10%" align="center"><span class="ti-menu"></span></th>
                                </thead>
                                <tbody>
                                    <?php foreach($location AS $l){ ?>
                                    <tr>
                                    	<td><?php echo $l->location_name; ?></td>
                                    	<td><?php echo $l->address; ?></td>
                                    	<td><?php echo $l->contact_no; ?></td>
                                        <td><?php echo $l->cv_start; ?></td>
                                    	<td><img style = "width:150px;" src="<?php echo base_url() ?>uploads/<?php echo $l->logo; ?>" alt="your image" /></td>
                                    	<td>
                                    		<a href = "" type="button" class="btn btn-xs btn-info btn-fill" data-id="<?php echo $l->location_id; ?>" data-name = '<?php echo $l->location_name; ?>' data-myvalue = '<?php echo $l->address;?>' data-trigger = '<?php echo $l->contact_no; ?>' data-bb='<?php echo $l->logo; ?>' data-did = '<?php echo $l->cv_start; ?>' data-aa = '<?php echo $l->year; ?>' id ="updateLocation_button" data-toggle="modal" data-target="#updateLocation">
                                    			<span class="ti-pencil-alt"></span>
                                    		</a>
                                            <a href="<?php echo base_url(); ?>index.php/masterfile/delete_location/<?php echo $l->location_id;?>" onclick="confirmationDelete(this);return false;" class="btn btn-xs btn-danger btn-fill">
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


        