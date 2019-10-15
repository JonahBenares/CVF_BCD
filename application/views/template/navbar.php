<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="warning">
    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    CV FORM
                </a>
            </div>

            <ul class="nav">
                <!-- <li class="active">
                    <a href="<?php echo base_url(); ?>index.php/masterfile/index">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li> -->
                <!-- <?php 
                    $a=$this->uri->segment(3);
                    $active='';
                    if($a==1){
                        $active="active";
                    }

                    $active2='';
                    if($a==2){
                        $active2="active";
                    }

                    $active3='';
                    if($a==3){
                        $active3="active";
                    }

                    $active4='';
                    if($a==4){
                        $active4="active";
                    }
                ?> -->
                <li class="active">
                    <a href="<?php echo base_url(); ?>index.php/masterfile/index">
                        <i class="ti-view-list"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo base_url(); ?>index.php/masterfile/location_list">
                        <i class="ti-location-pin"></i>
                        <p>Location</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url(); ?>index.php/masterfile/supplier_list">
                        <i class="ti-user"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url(); ?>index.php/masterfile/bank_list">
                        <i class="ti-home"></i>
                        <p>Bank</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url(); ?>index.php/masterfile/report_list">
                        <i class="ti-panel"></i>
                        <p>Report</p>
                    </a>
                </li>
                <!-- <li>
                    <a href="user.html">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="ti-view-list-alt"></i>
                        <p>Table List</p>
                    </a>
                </li> -->
            </ul>
    	</div>
    </div>  
    <div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Location
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>                                        
                </div>
                <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/save_location' enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            Location Name
                            <input type="text" class="form-control " name="location" placeholder="type here ..">
                        </div>
                        <div class="form-group">
                            Address
                            <input type="text" class="form-control " name="address" placeholder="type here ..">
                        </div>
                        <div class="form-group">
                            Contact No.
                            <input type="text" class="form-control " name="contact_no" placeholder="type here ..">
                        </div>
                        <div class="form-group">
                            Logo
                            <input type="file" class="form-control " name="logo" placeholder="">
                        </div>
                        <div class="form-group">
                            CV Start
                            <input type="text" class="form-control " name="cv_start" placeholder="type here .." required="required">
                        </div>
                        <div class="form-group">
                            Choose Year:
                            <select class="form-control" name="year" required="required">
                                <option value='' selected="selected">-Select Year-</option>
                                <?php 
                                    $currently_selected = date('Y');
                                    $earliest_year = 2000; 
                                    $latest_year = date('Y'); 
                                    foreach (range( $latest_year, $earliest_year) as $i ) {
                                ?>
                                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>;
                                <?php } ?>
                                <!-- <?php
                                $curr_year = date('Y'); 
                                for($x=2019;$x<=$curr_year;$x++){ ?>
                                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                <?php } ?> -->
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-block" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateLocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Location
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>                                        
                </div>
                <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/update_location' enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            Location Name
                            <input type="text" class="form-control " name="location_name" id = "location_name">
                        </div>
                        <div class="form-group">
                            Address
                            <input type="text" class="form-control " name="address" id = "address">
                        </div>
                        <div class="form-group">
                            Contact No.
                            <input type="text" class="form-control " name="contact_no" id = "contact_no">
                        </div>
                        <div class="form-group">
                            Logo
                            <input type="file" class="form-control " name="logo">
                        </div>
                        <div class="form-group">
                            CV Start
                            <input type="text" class="form-control" id = "cv_start" name="cv_start" readonly>
                        </div>
                        <div class="form-group">
                            Year
                            <input type="text" class="form-control" id = "year" name="year" readonly>
                        </div>
                    </div>
                    <input type="hidden" name = "location_id" id = "location_id">
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-block" name = "sub" value="Save Changes">
                    </div>
                </form>
            </div>
        </div>
    </div> 

    <div class="modal fade" id="addSupp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Supplier
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>                                        
                </div>
                <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/save_supplier' enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            Supplier Name
                            <input type="text" class="form-control " name="supplier" placeholder="type here ..">
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-block" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateSupp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Supplier
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>                                        
                </div>
                <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/update_supplier' enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            Supplier Name
                            <input type="text" class="form-control " name="supplier_name" id = "supplier_name">
                        </div>
                    </div>
                    <input type="hidden" name = "supplier_id" id = "supplier_id">
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-block" name = "sub" value="Save Changes">
                    </div>
                </form>
            </div>
        </div>
    </div>  

    <div class="modal fade" id="addBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Bank
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>                                        
                </div>
                <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/save_bank' enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            Bank Name
                            <input type="text" class="form-control " name="bank" placeholder="type here ..">
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-block" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Bank
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>                                        
                </div>
                <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/update_bank' enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            Bank Name
                            <input type="text" class="form-control " name="bank_name" id = "bank_name">
                        </div>
                    </div>
                    <input type="hidden" name = "bank_id" id = "bank_id">
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-block" name = "sub" value="Save Changes">
                    </div>
                </form>
            </div>
        </div>
    </div> 

    <div class="modal fade" id="saveFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Check Voucher
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>                                        
                </div>
                <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/insert_voucher' enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                Choose Location:
                                <select class="form-control" name="location" required="required" id="image" onChange="imageUpdate();">
                                    <option value=''>-Select Location-</option>
                                    <?php foreach($location AS $l){ ?>
                                        <option value = "<?php echo $l->location_id;?>" myTag="<?php echo $l->logo;?>"><?php echo $l->location_name; ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>
                            <div class = "col-lg-4">
                                <div class="form-group">
                                    <div class="thumbnail" style="width: 150px">
                                        <img class="imageNews"  />
                                    </div>                       
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-block" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cancelFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Check Voucher
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>                                        
                </div>
                <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/cancel_cv' enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                Reason:
                                <textarea name = "reason" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name = "cv_id" id = "cv_id">
                    <input type="hidden" name = "loc_id" id = "loc_id">
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger btn-block" value="Cancel">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>                                        
                </div>
                <form method='POST' action='<?php echo base_url(); ?>index.php/masterfile/search_report' enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            Payee
                            <select class="form-control" name="payee">
                                <option value=''>--Select Payee--</option>
                                <?php foreach($supplier AS $ss){ ?>
                                <option value='<?php echo $ss->supplier_id; ?>'><?php echo $ss->supplier_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class = "row">
                            <div class = "col-lg-6">
                                <div class="form-group">
                                    Transaction Date From:
                                    <input type="date" class="form-control " name="t_from">
                                </div>
                            </div>
                            <div class = "col-lg-6">
                                <div class="form-group">
                                    Transaction Date To:
                                    <input type="date" class="form-control " name="t_to">
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-lg-6">
                                <div class="form-group">
                                    CV Date From:
                                    <input type="date" class="form-control " name="cv_from">
                                </div>
                            </div>
                            <div class = "col-lg-6">
                                <div class="form-group">
                                    CV Date To:
                                    <input type="date" class="form-control " name="cv_to">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            CV No.
                            <input type="text" class="form-control " name="cv_no">
                        </div>
                        <div class="form-group">
                            Bank
                            <select class="form-control" name="bank">
                                <option value=''>--Select Bank--</option>
                                <?php foreach($bank AS $bb){ ?>
                                <option value='<?php echo $bb->bank_id; ?>'><?php echo $bb->bank_name; ?></option>
                                <?php } ?>
                            </select> 
                        </div>
                        <div class="form-group">
                            Cancelled
                        </div>
                        <div class="form-group">
                            <input type="checkbox"  name="cancelled" value ="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary btn-block" name = "sub" value="Filter">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="main-panel">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="javascript:history.go(-1)" class="btn btn-success btn-md p-l-100 p-r-100"><span class="ti-arrow-left"></span> Back</a>            
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ti-panel"></i>
                            <p>Stats</p>
                        </a>
                    </li> -->
                    <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-settings"></i>
                                <p>Settings</p>
                                <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/masterfile/user_logout">Logout</a></li>
                          </ul>
                    </li>
                    <!-- <li>
                        <a href="#">
                            <i class="ti-settings"></i>
                            <p>Settings</p>
                        </a>
                    </li> -->
                </ul>

            </div>
        </div>
    </nav>