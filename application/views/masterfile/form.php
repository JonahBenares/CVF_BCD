<style type="text/css">
    .table > thead > tr > th, 
    .table > tbody > tr > th, 
    .table > tfoot > tr > th, 
    .table > thead > tr > td, 
    .table > tbody > tr > td, 
    .table > tfoot > tr > td {
        padding: 0px!important;
        vertical-align: middle;
    }
    .table-bord>tbody>tr>td, 
    .table-bord>tbody>tr>th, 
    .table-bord>tfoot>tr>td, 
    .table-bord>tfoot>tr>th, 
    .table-bord>thead>tr>td, 
    .table-bord>thead>tr>th {
        border:1px solid #9e9e9e!important;
    }
    .bor-all{
        border: 1px solid #9e9e9e!important; 
    }
    .bor-top{
        border-top: 1px solid #9e9e9e!important; 
    }
    .bor-bottom{
        border-bottom: 1px solid #9e9e9e!important; 
    }
    .bor-right{
        border-right: 1px solid #9e9e9e!important; 
    }
    .bor-left{
        border-left: 1px solid #9e9e9e!important; 
    }
    .padding-left{
        padding-left: 1px solid #9e9e9e!important; 
    }
    .nomarg{
        margin: 0px;
    }
    .text-red{
        color: red!important;
    }
    .text-blue{
        color: blue!important;
    }
    .emphasis{
        /*border-bottom: 1px solid red!important;*/
        background-color: #f0b7b7!important;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card">
                    <form method="POST" action = "<?php echo base_url();?>index.php/masterfile/insert_update">
                    	<div class="datatable-dashv1-list custom-datatable-overright">
                            <table class="table table-s">
                                <tr>
                                    <td width="5%" style="border: 0px!important"><br></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                    <td width="5%" style="border: 0px!important"></td>
                                </tr>
                                <?php foreach($voucher AS $v){ ?>
                                <tr>
                                    <td colspan="5" class="no-bord">
                                        <center>
                                            <img src="<?php echo base_url(); ?>uploads/<?php echo $v['logo'];?>" style="width:100px">
                                        </center>
                                    </td>
                                    <td colspan="10" class="no-bord">
                                        <center>
                                            <b><?php echo $v['location_name'];?> </b><br>
                                            <small><?php echo $v['address'];?></small><br>
                                            <small>Tel. No.: <?php echo $v['contact_no'];?></small><br>
                                        </center> 
                                    </td>
                                    <td colspan="5" class="no-bord"></td>
                                </tr>
                                <tr>
                                    <td colspan="20" class="no-bord"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="no-bord"><h5 class="nomarg"><b class="text-blue">CHECK VOUCHER</b></h5></td>
                                    <td colspan="10" class="no-bord"><h5 class="nomarg"><b class="text-red pull-right"><?php echo $v['cv_no'];?></b></h5></td>
                                </tr>
                                <tr>
                                    <td colspan="20" class="no-bord"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="bor-bottom bor-top bor-left">Payee: </td>
                                    <td colspan="7"  class="bor-bottom bor-top bor-left"> 
                                       <select style="width: 100%;<?php echo ($saved!=0) ? "pointer-events: none;-webkit-appearance: none;-moz-appearance: none;border:0px" : ''; ?>" name="payee">
                                            <option value=''>-Select Payee-</option>
                                            <?php foreach($supplier AS $s){ ?>
                                                <option value = "<?php echo $s->supplier_id;?>" <?php echo (($v['payee_id'] == $s->supplier_id) ? ' selected' : '');?>><?php echo $s->supplier_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td colspan="2" class="bor-bottom bor-top bor-right"></td>
                                    <td colspan="2" class="bor-bottom bor-top bor-right">CV Date:</td> 
                                    <td colspan="7" class="bor-bottom bor-top bor-right">
                                        <input  style="width: 100%;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;-webkit-appearance: none;-moz-appearance: none;" : ''; ?>"  type="date" id="date1" name = "cv_date" placeholder="" value = "<?php echo $v['cv_date'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="bor-bottom bor-right bor-left">Date
                                    </td>
                                    <td colspan="2" class="bor-bottom bor-right">Type
                                    </td>
                                    <td colspan="3" class="bor-bottom bor-right">Reference
                                    </td>
                                    <td colspan="3" class="bor-bottom bor-right">Original Amt.
                                    </td>
                                    <td colspan="4" class="bor-bottom bor-right">Balance Due
                                    </td>
                                    <td colspan="2" class="bor-bottom bor-right">Discount
                                    </td>
                                    <td colspan="4" class="bor-bottom bor-right">Payment
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="bor-bottom bor-right bor-left">
                                        <input style="height: 51px;width: 100%;pointer-events: none;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="date" name = "trans_date" placeholder="" value = "<?php echo date('Y-m-d');?>">
                                    </td>
                                    <td colspan="2" class="bor-bottom bor-right">
                                        <input style="height: 51px;width: 100%;pointer-events: none;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="text" name = "type" placeholder="" value = "<?php echo 'Bills Payment';?>">
                                    </td>
                                    <td colspan="3" class="bor-bottom bor-right">
                                        <input style="width: 100%;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="text" name = "ref1" placeholder="" value = "<?php echo $v['reference'];?>">
                                        <input style="width: 100%;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="text" name = "ref2" placeholder="" value = "<?php echo $v['reference2'];?>">
                                    </td>
                                    <td colspan="3" class="bor-bottom bor-right">
                                        <input style="height: 51px;width: 100%;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="text" id = "orig_amnt" onkeypress="return isNumberKey(this, event)" name = "original_amount" placeholder="" value = "<?php echo $v['original_amount'];?>">
                                    </td>
                                    <td colspan="4" class="bor-bottom bor-right">
                                        <input style="height: 51px;width: 100%;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="text" name = "bal_due" id ="bal_due" onkeypress="return isNumberKey(this, event)" placeholder="" value = "<?php echo $v['balance_due'];?>">
                                    </td>
                                    <td colspan="2" class="bor-bottom bor-right">
                                        <input style="height: 51px;width: 100%;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="text" name = "discount" onkeypress="return isNumberKey(this, event)" placeholder="" value = "<?php echo $v['discount'];?>">
                                    </td>
                                    <td colspan="4" class="bor-bottom bor-right">
                                        <input style="height: 51px;width: 100%;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="text" name = "payment" id = "payment" onkeypress="return isNumberKey(this, event)" placeholder="" value = "<?php echo $v['payment'];?>">
                                    </td>
                                </tr>    
                                <tr>
                                    <td colspan="2" class="bor-bottom bor-right bor-left">
                                    </td>
                                    <td colspan="2" class="bor-bottom bor-right">
                                    </td>
                                    <td colspan="3" class="bor-bottom bor-right">
                                    </td>
                                    <td colspan="3" class="bor-bottom bor-right">
                                    </td>
                                    <td colspan="4" class="bor-bottom bor-right">
                                    </td>
                                    <td colspan="2" class="bor-bottom bor-right">
                                    </td>
                                    <td colspan="4" class="bor-bottom bor-right">
                                        <span id = "error" style = "color:red;font-weight: bold"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="20" class="no-bord"><br></td>
                                </tr>                                    
                                <tr>
                                    <td colspan="20" align="center" class="bor-all">CHECK DETAILS:</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="bor-left bor-right">Bank</td>
                                    <td colspan="5" class="bor-right">Check No</td>
                                    <td colspan="5" class="bor-right">Check Date</td>
                                    <td colspan="5" class="bor-right">Amount</td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="center" class="bor-bottom bor-left bor-right">
                                        <b>
                                            <select style="width: 100%;<?php echo ($saved!=0) ? "pointer-events: none;-webkit-appearance: none;-moz-appearance: none;border:0px" : ''; ?>" name="bank">
                                                <option value=''>-Select Bank-</option>
                                                <?php foreach($bank AS $b){ ?>
                                                    <option value = "<?php echo $b->bank_id;?>" <?php echo (($v['bank_id'] == $b->bank_id) ? ' selected' : '');?>><?php echo $b->bank_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </b></td>
                                    <td colspan="5" align="center" class="bor-bottom bor-right">
                                        <b>
                                            <input style="width: 100%;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="text" name = "check_no" placeholder="" value = "<?php echo $v['check_no'];?>">
                                        </b>
                                    </td>
                                    <td colspan="5" align="center" class="bor-bottom bor-right">
                                        <b>
                                            <input style="width: 100%;pointer-events: none;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="date" name = "check_date" id="date2" placeholder="" value = "<?php echo $v['check_date'];?>">
                                        </b>
                                    </td>
                                    <td colspan="5" align="center" class="bor-bottom bor-right">
                                        <b>
                                            <input style="width: 100%;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" type="text" id = "dupay2" readonly placeholder="" value = "<?php echo $v['payment'];?>">
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="20" class="no-bord"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="bor-right bor-top bor-left">Prepared by:</td>
                                    <td colspan="7" class="bor-right bor-top">Checked by:</td>
                                    <td colspan="7" class="bor-right bor-top">Approved by:</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="bor-right bor-left"><input type="text" name = "prepared_by" class="<?php echo ($saved==0) ? "form-control emphasis": '';?>" style = "pointer-events: none;<?php echo ($saved!=0) ? "pointer-events: none;border:0px": '';?>" placeholder=""  value = "<?php echo $_SESSION['fullname']; ?>"></td>

                                    <td colspan="7" class="bor-right "><input type="text" name = "checked_by" class="<?php echo ($saved==0) ? "form-control emphasis": '';?>" style = "<?php echo ($saved!=0) ? "pointer-events: none;border:0px": '';?>" placeholder=""  value = "<?php echo $v['checked_by'];?>"></td>

                                    <td colspan="7" class="bor-right "><input type="text" name = "approved_by" class="<?php echo ($saved==0) ? "form-control emphasis": '';?>" style = "pointer-events: none;<?php echo ($saved!=0) ? "pointer-events: none;border:0px": '';?>" placeholder=""  value = "David C. Tan"></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="bor-top bor-right bor-left">Released by:</td>
                                    <td colspan="7" class="bor-top bor-right">Received by/Date:</td>
                                    <td colspan="7" class="bor-top bor-right">OR/SI/AR No.:</td>
                                </tr>
                                 <tr>
                                    <td colspan="6" class="bor-bottom bor-right bor-left"><input type="text" name = "released_by" class="<?php echo ($saved==0) ? "form-control emphasis": '';?>" style = "<?php echo ($saved!=0) ? "pointer-events: none;border:0px": '';?>" placeholder=""  value = "<?php echo $v['released_by'];?>"></td>
                                    <td colspan="7" class="bor-bottom bor-right"><input type="text" name = "received_by" class="<?php echo ($saved==0) ? "form-control emphasis": '';?>" style = "<?php echo ($saved!=0) ? "pointer-events: none;border:0px": '';?>" placeholder=""  value = "<?php echo $v['received_by'];?>"></td>
                                    <td colspan="7" class="bor-bottom bor-right"><input type="text" name = "or_no" class="<?php echo ($v['or_no']=='') ? "form-control": '';?> <?php echo ($saved==0) ? " emphasis": '';?>" style = "<?php echo ($v['or_no']!='') ? "pointer-events: none;border:0px": '';?>" placeholder=""  value = "<?php echo $v['or_no'];?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="20"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="bor-bottom bor-left bor-top">Description: 
                                    <td colspan="14" class="bor-bottom bor-left bor-top"> 
                                        <b>
                                            <textarea type="text" style="width: 100%;<?php echo ($saved!=0) ? "border:0px;pointer-events: none;" : ''; ?>" rows="1" name = "description" placeholder=""><?php echo $v['description'];?></textarea>
                                            
                                        </b>
                                    </td>
                                    <td colspan="4" class="bor-bottom bor-right bor-top" align = "right"><b><input type="text" id = "dupay" style ="<?php echo ($saved!=0) ? "border:0px;text-align: right" : ''; ?>" value = "<?php echo $v['payment'];?>" readonly></b></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <center>
                            <input type="hidden" name="cv_id" value = "<?php echo $cv_id; ?>">
                                <?php if($saved==0){ ?>
                                    <input type="submit"  class = "btn btn-md btn-info btn-fill" name="save" value="Save">
                                <?php } ?>
                                
                                <?php if($save_temp==0){ ?>
                                    <input type="submit"  class="btn btn-md btn-warning btn-fill" name="print" value="Print">
                                <?php } else { ?>
                                    <input type="submit"  class="btn btn-md btn-warning btn-fill" name="print" value="Print">
                                 <!-- <a href="<?php echo base_url(); ?>index.php/masterfile/print_cv/<?php echo $cv_id; ?>" class="btn btn-md btn-warning btn-fill"> 
                                    Print -->
                                </a>
                                <?php } ?>
                        </center>                        
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


        