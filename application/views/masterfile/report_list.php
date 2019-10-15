<div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>                                        
            </div>
            <form method='POST' action='upload_excel' enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" class="form-control" name="csv">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4 class="title">
                                        CHECK VOUCHER
                                    </h4>  
                                    <p class="category" style="color:#040606"><b><?php echo $location_name; ?></b></p><br>
                                    <button type="button" class="btn btn-primary btn-fill btn-sm" data-toggle="modal" data-target="#saveFile">
                                        <span class="ti-plus"></span> Add
                                    </button>
                                    <button type="button" class="btn btn-info btn-fill btn-sm" data-toggle="modal" data-target="#filter">
                                        <span class="ti-filter"></span> Filter
                                    </button>
                                    <?php if(!empty($filt)){ ?>
                                    <a href = "<?php echo base_url(); ?>index.php/masterfile/export_cv/<?php echo $payee;?>/<?php echo $t_from;?>/<?php echo $t_to;?>/<?php echo $cv_from;?>/<?php echo $cv_to;?>/<?php echo $cv_no;?>/<?php echo $bank;?>/<?php echo $cancelled;?>" class="btn btn-success btn-fill btn-sm"><span class="ti-export"></span> Export to Excel</a>
                                    <?php } else { ?>
                                    <a href = "<?php echo base_url(); ?>index.php/masterfile/export_cv/loc/<?php echo $location_id;?>" class="btn btn-success btn-fill btn-sm"><span class="ti-export"></span> Export to Excel</a>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-4">
                                    <!-- action="<?php echo base_url(); ?>index.php/masterfile/generateLocation" -->
                                    <form method="POST" >
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <select class="form-control" name = "location" id = "location" onchange="onchangeLocation();">
                                                    <option value = ''>--Select Location here--</option>
                                                    <?php foreach($location AS $l){ ?>
                                                    <option value = "<?php echo $l->location_id;?>"><?php echo $l->location_name; ?></option>
                                                    <?php } ?>
                                                </select>   
                                            </div>
                                        </div>  
                                        <input type="hidden" name="base_url" id = "base_url" value = "<?php echo base_url(); ?>">
                                        <!-- <div class="row">
                                            <div class="col-lg-12">
                                                <input type="submit" class="btn btn-info btn-fill btn-block btn-xs" value="Select" name=""> 
                                            </div>
                                        </div>  -->
                                    </form>  
                                </div>
                            </div>
                            
                           <!--  <div class="row">
                                <div class="col-lg-12">
                                    <center>                             
                                        <h4 class="title">CHECK VOUCHER</h4>  
                                    </center>      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <select class="form-control">
                                    <option>asdasd</option>
                                    </select>   
                                </div>
                                <div class="col-lg-4"></div>
                            </div>  
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <input type="button" class="btn btn-info btn-fill btn-block btn-xs" value="Select" name=""> 
                                </div>
                                <div class="col-lg-4"></div>
                            </div>    
                            <br>
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <center>
                                        <h5>Location</h5>
                                    </center>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>     -->                                               
                        </div>
                        <br>
                        <br>

                        <?php if(!empty($filt)){ ?>     
                        <div class=' alert  alert-warning'><b >Filter Applied</b> - <?php echo $filt ?>, <a href='<?php echo base_url(); ?>index.php/masterfile/report_list' class='remove_filter alert-link pull-right btn btn-xs'><span class="ti-close"></span></a></div>                    
                        <?php } ?>

                        <?php if(!empty($check)){ ?>
                        <a href = '<?php echo base_url(); ?>index.php/masterfile/cancelled/<?php echo $location_id; ?>' class="btn btn-danger btn-sm btn-fill pull-right">
                            <span class="ti-close"></span> Cancelled CV
                        </a>
                    	<div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <th width="15%">Date</th>
                                	<th width="35%">Payee</th>
                                	<th width="20%">Reference</th>
                                    <th width="15%">CV No.</th>
                                	<th width="5%">Status</th>
                                	<th width="10%" align="center"><span class="ti-menu"></span></th>
                                </thead>
                                <tbody>
                                    <?php foreach($check AS $c){ ?>
                                    <tr>
                                    	<td><?php echo $c['cv_date']; ?></td>
                                    	<td><?php echo $c['payee']; ?></td>
                                    	<td><?php echo $c['reference']." / ".$c['reference2']; ?></td>
                                        <td><?php echo $c['cv_no']; ?></td>
                                    	<td>
                                        <?php if($c['saved'] == 1 && $c['cancelled']==0){ ?>
                                            <span class = "label label-info label-sm">Saved</span>
                                        <?php } else if($c['cancelled'] == 1) { ?>
                                            <span class = "label label-danger label-sm">Cancelled</span>
                                        <?php } else { ?>
                                            <span class = "label label-warning label-sm">Pending</span>
                                        <?php } ?>
                                        </td>
                                    	<td align="center">
                                            <?php if($c['saved']==0){ ?>
                                            <a href="<?php echo base_url(); ?>index.php/masterfile/form/<?php echo $c['cv_id']; ?>" target = "_blank" class="btn btn-xs btn-warning btn-fill">
                                                <span class="ti-eye"></span>
                                            </a>
                                            <?php } else { ?>
                                        		<a href="<?php echo base_url(); ?>index.php/masterfile/print_cv/<?php echo $c['cv_id']; ?>" target = "_blank" class="btn btn-xs btn-warning btn-fill">
                                        			<span class="ti-eye"></span>
                                        		</a>
                                            <?php } ?>

                                            <?php if($c['cancelled']==0){ ?>
                                            <a class="btn btn-xs btn-danger btn-fill" id ="updateCancel_button" data-toggle="modal" data-target="#cancelFile" data-id = '<?php echo $c['cv_id'];?>' data-name = '<?php echo $location_id; ?>'>
                                                <span class="ti-close"></span> 
                                            </a>
                                            <?php } ?>
                                    	</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



        