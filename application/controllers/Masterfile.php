<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterfile extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('super_model');
        $this->dropdown['location'] = $this->super_model->select_all_order_by('location', 'location_name', 'ASC');
        $this->dropdown['supplier']=$this->super_model->select_all_order_by('supplier','supplier_name',"ASC");
        $this->dropdown['bank']=$this->super_model->select_all_order_by('bank','bank_name',"ASC");
    	/**
    	 * Index Page for this controller.
    	 *
    	 * Maps to the following URL
    	 * 		http://example.com/index.php/welcome
    	 *	- or -
    	 * 		http://example.com/index.php/welcome/index
    	 *	- or -
    	 * Since this controller is set as the default controller in
    	 * config/routes.php, it's displayed at http://example.com/
    	 *
    	 * So any other public methods not prefixed with an underscore will
    	 * map to /index.php/welcome/<method_name>
    	 * @see https://codeigniter.com/user_guide/general/urls.html
    	 */

	  function arrayToObject($array){
            if(!is_array($array)) { return $array; }
            $object = new stdClass();
            if (is_array($array) && count($array) > 0) {
                foreach ($array as $name=>$value) {
                    $name = strtolower(trim($name));
                    if (!empty($name)) { $object->$name = arrayToObject($value); }
                }
                return $object;
            } 
            else {
                return false;
            }
        }

	}

	public function index(){
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$data['count']=$this->super_model->count_custom_where('check_voucher',"saved='0'");
		$this->load->view('masterfile/dashboard',$data);
		$this->load->view('template/footer');

	}

	public function login(){
        if($this->input->post()){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $count=$this->super_model->login_user($username,$password);
            if($count>0){   
                $password1 =md5($this->input->post('password'));
                $fetch=$this->super_model->select_custom_where("users", "username = '$username' AND (password = '$password' OR password = '$password1')");
                foreach($fetch AS $d){
                    $userid = $d->user_id;
                    $username = $d->username;
                    $fullname = $d->fullname;
                }
                $newdata = array(
                   'user_id'=> $userid,
                   'username'=> $username,
                   'fullname'=> $fullname,
                   'logged_in'=> TRUE
                );
                $this->session->set_userdata($newdata);
                //redirect(base_url());
                redirect(base_url().'index.php/masterfile/index');
            }
            else{
                $this->session->set_flashdata('error_msg', 'Username And Password Do not Exist!');
                $this->load->view('masterfile/login');      
            }
        } else {
            $this->load->view('masterfile/login');    
        }
    }

    public function user_logout(){
        $this->session->sess_destroy();
        echo "<script>alert('You have successfully logged out.'); 
        window.location ='".base_url()."'; </script>";
    }

	public function report_list(){
        $location_id=$this->uri->segment(3);
		$data['location_id']=$location_id;
		$this->load->view('template/header');
		$this->load->view('template/navbar',$this->dropdown);
        $data['location_name'] = $this->super_model->select_column_where("location","location_name","location_id",$location_id);
		/*$data['check']=$this->super_model->select_custom_where('check_voucher',"location_id = '$location_id'");*/
        foreach($this->super_model->select_custom_where('check_voucher',"location_id = '$location_id' AND cancelled ='0' ORDER BY payee ASC") AS $cv){
            $payee = $this->super_model->select_column_where("supplier","supplier_name","supplier_id",$cv->payee);
            $data['check'][]=array(
                'cv_id'=>$cv->cv_id,
                'payee'=>$payee,
                'reference'=>$cv->reference,
                'reference2'=>$cv->reference2,
                'cv_no'=>$cv->cv_no,
                'saved'=>$cv->saved,
                'cv_date'=>$cv->cv_date,
                'cancelled'=>$cv->cancelled,
            );
        }

		$this->load->view('masterfile/report_list',$data);
		$this->load->view('template/footer');
	}

    public function insert_voucher(){
        $location = trim($this->input->post('location')," ");
        $rows_head = $this->super_model->count_rows("check_voucher");
        if($rows_head==0){
            $cv_id=1;
        } else {
            $max = $this->super_model->get_max("check_voucher", "cv_id");
            $cv_id = $max+1;
        }

        $cur_year=date('Y');
        $check_existing = $this->super_model->count_custom_where("cv_series", "location_id='$location' AND year = '$cur_year'");
        if($check_existing==0){
              $cv_no= "CV".$cur_year."-00100";
              $left = "00100";
        } else {
            $latest = $this->super_model->get_max_where("cv_series", "series","location_id='$location' AND year = '$cur_year'");
            $series = $latest+1;
            $left = str_pad($series, 5, '00', STR_PAD_LEFT);
            $cv_no = "CV".$cur_year."-".$left;
        }   

        $cv_data= array(
            'year'=>$cur_year,
            'series'=>$left,
            'location_id'=>$location,
        );
        $this->super_model->insert_into("cv_series", $cv_data);
        $count = $this->super_model->count_rows_where("check_voucher","check_no",$check_no);
        if($count!=0){
            echo "<script>alert('Duplicate Check No. ".$check_no."'); location.replace(document.referrer); </script>";
        }else {
            $data = array(
                'cv_id'=>$cv_id,
                'location_id'=>$location,
                'cv_no'=>$cv_no,
            );
            if($this->super_model->insert_into("check_voucher", $data)){
                redirect(base_url().'index.php/masterfile/form/'.$cv_id);
            }
        }
    }

    public function search_report(){
        $location_id=$this->uri->segment(3);
        $data['location_id']=$location_id;
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);


        if(!empty($this->input->post('payee'))){
            $data['payee'] = $this->input->post('payee');
        } else {
            $data['payee']= "null";
        }

        if(!empty($this->input->post('t_from'))){
            $data['t_from'] = $this->input->post('t_from');
        } else {
            $data['t_from']= "null";
        }

        if(!empty($this->input->post('t_to'))){
            $data['t_to'] = $this->input->post('t_to');
        } else {
            $data['t_to']= "null";
        }

        if(!empty($this->input->post('cv_from'))){
            $data['cv_from'] = $this->input->post('cv_from');
        } else {
            $data['cv_from']= "null";
        }

        if(!empty($this->input->post('cv_to'))){
            $data['cv_to'] = $this->input->post('cv_to');
        } else {
            $data['cv_to']= "null";
        }

        if(!empty($this->input->post('cv_no'))){
            $data['cv_no'] = $this->input->post('cv_no');
        } else {
            $data['cv_no']= "null";
        }

        if(!empty($this->input->post('bank'))){
            $data['bank'] = $this->input->post('bank');
        } else {
            $data['bank']= "null";
        }

        if(!empty($this->input->post('cancelled'))){
            $data['cancelled'] = $this->input->post('cancelled');
        } else {
            $data['cancelled']= "null";
        }


        $sql="";
        $filter = " ";
        if(!empty($this->input->post('payee'))){
            $payee = $this->input->post('payee');
            $sql.=" payee = '$payee' AND";
            $pay = $this->super_model->select_column_where("supplier", "supplier_name", "supplier_id", $payee);
            $filter .= "Payee - ".$pay.", ";
        }

        if(!empty($this->input->post('t_from')) && !empty($this->input->post('t_to'))){
            $t_from = $this->input->post('t_from');
            $t_to = $this->input->post('t_to');
            $sql.= " transaction_date BETWEEN '$t_from' AND '$t_to' AND";
            $filter .= "Transaction Date - ".$t_from.' <strong>To</strong> '.$t_to.", ";
        }

        if(!empty($this->input->post('cv_from')) && !empty($this->input->post('cv_to'))){
            $cv_from = $this->input->post('cv_from');
            $cv_to = $this->input->post('cv_to');
            $sql.= " cv_date BETWEEN '$cv_from' AND '$cv_to' AND";
            $filter .= "CV Date - ".$cv_from.' <strong>To</strong> '.$cv_to.", ";
        }

        if(!empty($this->input->post('cv_no'))){
            $cv_no = $this->input->post('cv_no');
            $sql.=" cv_no LIKE '%$cv_no%' AND";
            $filter .= "CV No. - ".$cv_no.", ";
        }

        if(!empty($this->input->post('bank'))){
            $bank = $this->input->post('bank');
            $sql.=" bank = '$bank' AND";
            $banks = $this->super_model->select_column_where("bank", "bank_name", "bank_id", $bank);
            $filter .= "Bank - ".$banks.", ";
        }

        if(!empty($this->input->post('cancelled'))){
            $cancelled = $this->input->post('cancelled');
            $sql.=" cancelled = '$cancelled' AND";
            $filter .= "Cancelled ,";
        }

        $query=substr($sql, 0, -3);
        $data['filt']=substr($filter, 0, -2);
        $data['location_name'] = $this->super_model->select_column_where("location","location_name","location_id",$location_id);
        foreach($this->super_model->select_custom_where('check_voucher',"$query") AS $cv){
            $payee = $this->super_model->select_column_where("supplier","supplier_name","supplier_id",$cv->payee);
            $data['check'][]=array(
                'cv_id'=>$cv->cv_id,
                'payee'=>$payee,
                'reference'=>$cv->reference,
                'reference2'=>$cv->reference2,
                'cv_no'=>$cv->cv_no,
                'saved'=>$cv->saved,
                'cv_date'=>$cv->cv_date,
                'cancelled'=>$cv->cancelled,
            );
        }
        $this->load->view('masterfile/report_list',$data);
        $this->load->view('template/footer');
    }

    public function export_cv(){
        require_once(APPPATH.'../assets/js/phpexcel/Classes/PHPExcel/IOFactory.php');
        $objPHPExcel = new PHPExcel();
        $exportfilename="CVF Report.xlsx";
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', "CVF REPORT");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', "Transaction Date");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', "CV Date");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', "Payee");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', "Bank");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', "CV No.");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', "Status");

        $payee=$this->uri->segment(3);
        $t_from=$this->uri->segment(4);
        $t_to=$this->uri->segment(5);
        $cv_from=$this->uri->segment(6);
        $cv_to=$this->uri->segment(7);
        $cv_no=str_replace("%20"," ",$this->uri->segment(8));
        $bank=$this->uri->segment(9);
        $cancelled=$this->uri->segment(10);


        $sql="";
        $filter = " ";
        if($payee!='null'){
            $payee = $payee;
            $sql.=" payee = '$payee' AND";
            $pay = $this->super_model->select_column_where("supplier", "supplier_name", "supplier_id", $payee);
            $filter .= "Payee - ".$pay.", ";
        }

        if($t_from!='null' && $t_to!='null'){
            $t_from = $t_from;
            $t_to = $t_to;
            $sql.= " transaction_date BETWEEN '$t_from' AND '$t_to' AND";
            $filter .= "Transaction Date - ".$t_from.' <strong>To</strong> '.$t_to.", ";
        }

        if($cv_from!='null' && $cv_to!='null'){
            $cv_from = $cv_from;
            $cv_to = $cv_to;
            $sql.= " cv_date BETWEEN '$cv_from' AND '$cv_to' AND";
            $filter .= "CV Date - ".$cv_from.' <strong>To</strong> '.$cv_to.", ";
        }

        if($cv_no!='null'){
            $cv_no = $cv_no;
            $sql.=" cv_no LIKE '%$cv_no%' AND";
            $filter .= "CV No. - ".$cv_no.", ";
        }

        if($bank!='null'){
            $bank = $bank;
            $sql.=" bank = '$bank' AND";
            $banks = $this->super_model->select_column_where("bank", "bank_name", "bank_id", $bank);
            $filter .= "Bank - ".$banks.", ";
        }

        if($cancelled!='null'){
            $cancelled = $cancelled;
            $sql.=" cancelled = '$cancelled' AND";
            $filter .= "Cancelled";
        }

        $query=substr($sql, 0, -3);
        $filt=substr($filter, 0, -2);
        $styleArray = array(
          'borders' => array(
            'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
            )
          )
        );
        foreach(range('A','F') as $columnID){
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        if($filt!='' AND $payee!='loc'){
            $num = 3;
            foreach($this->super_model->select_custom_where('check_voucher',"$query") AS $cv){
                $payee = $this->super_model->select_column_where("supplier","supplier_name","supplier_id",$cv->payee);
                $bank = $this->super_model->select_column_where("bank","bank_name","bank_id",$cv->bank);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$num, $cv->transaction_date);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$num, $cv->cv_date);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$num, $payee);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$num, $bank);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$num, $cv->cv_no);
                if($cv->cancelled==1){
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$num, 'Cancelled');
                }else{
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$num, '');
                }
                $objPHPExcel->getActiveSheet()->getStyle('A'.$num.":F".$num)->applyFromArray($styleArray);
                $num++;
            }
        }else {
            $location_id=$this->uri->segment(4);
            $num = 3;
            foreach($this->super_model->select_custom_where('check_voucher',"location_id = '$location_id' AND cancelled ='0' ORDER BY payee ASC") AS $cv){
                $payee = $this->super_model->select_column_where("supplier","supplier_name","supplier_id",$cv->payee);
                $bank = $this->super_model->select_column_where("bank","bank_name","bank_id",$cv->bank);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$num, $cv->transaction_date);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$num, $cv->cv_date);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$num, $payee);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$num, $bank);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$num, $cv->cv_no);
                if($cv->cancelled==1){
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$num, 'Cancelled');
                }else{
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$num, '');
                }
                $objPHPExcel->getActiveSheet()->getStyle('A'.$num.":F".$num)->applyFromArray($styleArray);
                $num++;
            }
        }
        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->getFont()->setBold(true)->setName('Arial')->setSize(9.5);
        $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true)->setName('Arial Black')->setSize(12);
        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($styleArray);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        if (file_exists($exportfilename))
        unlink($exportfilename);
        $objWriter->save($exportfilename);
        unset($objPHPExcel);
        unset($objWriter);   
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="CVF Report.xlsx"');
        readfile($exportfilename);
    }

	/*public function generateLocation(){
           $location_id= $this->input->post('location'); 
           ?>
           <script>
            window.location.href ='<?php echo base_url(); ?>index.php/masterfile/report_list/<?php echo $location_id; ?>'</script> <?php
    }*/

	public function form(){
		$cv_id = $this->uri->segment(3);
		$data['cv_id'] = $cv_id;
		$this->load->view('template/header');
		$this->load->view('template/navbar',$this->dropdown);
		foreach($this->super_model->select_row_where("check_voucher","cv_id",$cv_id) AS $cv){
			$location_name = $this->super_model->select_column_where("location","location_name","location_id",$cv->location_id);
			$address = $this->super_model->select_column_where("location","address","location_id",$cv->location_id);
			$contact_no = $this->super_model->select_column_where("location","contact_no","location_id",$cv->location_id);
			$logo = $this->super_model->select_column_where("location","logo","location_id",$cv->location_id);
            $supplier = $this->super_model->select_column_where("supplier","supplier_name","supplier_id",$cv->payee);
            $bank = $this->super_model->select_column_where("bank","bank_name","bank_id",$cv->bank);
            $data['saved']=$cv->saved;
			$data['save_temp']=$cv->save_temp;
			$data['voucher'][] = array(
                'payee'=>$supplier,
				'payee_id'=>$cv->payee,
				'cv_date'=>$cv->cv_date,
				'transaction_date'=>$cv->transaction_date,
				'check_no'=>$cv->check_no,
				'original_amount'=>$cv->original_amount,
				'description'=>$cv->description,
				'check_date'=>$cv->check_date,
				'reference'=>$cv->reference,
                'reference2'=>$cv->reference2,
				'payment'=>$cv->payment,
				'prepared_by'=>$cv->prepared_by,
	            'checked_by'=>$cv->checked_by,
	            'approved_by'=>$cv->approved_by,
	            'released_by'=>$cv->released_by,
	            'received_by'=>$cv->received_by,
	            'or_no'=>$cv->or_no,
	            'cv_no'=>$cv->cv_no,
	            'location_name'=>$location_name,
	            'address'=>$address,
	            'contact_no'=>$contact_no,
                'logo'=>$logo,
                'bank'=>$bank,
                'bank_id'=>$cv->bank,
	            'type'=>$cv->type,
                'balance_due'=>$cv->balance_due,
                'discount'=>$cv->discount,
			);
		}
		$this->load->view('masterfile/form',$data);
		$this->load->view('template/footer');

	}

	public function print_cv(){
		$this->load->view('template/header');
		$cv_id = $this->uri->segment(3);
		$data['cv_id'] = $cv_id;
		foreach($this->super_model->select_row_where("check_voucher","cv_id",$cv_id) AS $cv){
			$location_name = $this->super_model->select_column_where("location","location_name","location_id",$cv->location_id);
			$address = $this->super_model->select_column_where("location","address","location_id",$cv->location_id);
			$contact_no = $this->super_model->select_column_where("location","contact_no","location_id",$cv->location_id);
            $logo = $this->super_model->select_column_where("location","logo","location_id",$cv->location_id);
            $supplier = $this->super_model->select_column_where("supplier","supplier_name","supplier_id",$cv->payee);
			$bank = $this->super_model->select_column_where("bank","bank_name","bank_id",$cv->bank);
            $data['saved']=$cv->saved;
			$data['cancelled']=$cv->cancelled;
			$data['voucher'][] = array(
				'payee'=>$supplier,
				'cv_date'=>$cv->cv_date,
				'transaction_date'=>$cv->transaction_date,
				'check_no'=>$cv->check_no,
				'original_amount'=>$cv->original_amount,
				'description'=>$cv->description,
				'check_date'=>$cv->check_date,
                'reference'=>$cv->reference,
                'reference2'=>$cv->reference2,
				'payment'=>$cv->payment,
				'prepared_by'=>$cv->prepared_by,
	            'checked_by'=>$cv->checked_by,
	            'approved_by'=>$cv->approved_by,
	            'released_by'=>$cv->released_by,
	            'received_by'=>$cv->received_by,
	            'or_no'=>$cv->or_no,
	            'cv_no'=>$cv->cv_no,
	            'location_name'=>$location_name,
	            'address'=>$address,
                'contact_no'=>$contact_no,
                'type'=>$cv->type,
                'balance_due'=>$cv->balance_due,
                'discount'=>$cv->discount,
                'bank'=>$bank,
	            'logo'=>$logo,
			);
		}
		$this->load->view('masterfile/print_cv',$data);
		$this->load->view('template/footer');

	}


	public function insert_update(){
        $cv_id = trim($this->input->post('cv_id')," ");
        $payee = trim($this->input->post('payee')," ");
        $check_date = trim($this->input->post('check_date')," ");
        $cv_date = trim($this->input->post('cv_date')," ");
        $trans_date = trim($this->input->post('trans_date')," ");
        $type = trim($this->input->post('type')," ");
        $reference_no = trim($this->input->post('ref1')," ");
        $reference_no2 = trim($this->input->post('ref2')," ");
        $orig_amount = trim($this->input->post('original_amount')," ");
        $bal_due = trim($this->input->post('bal_due')," ");
        $discount = trim($this->input->post('discount')," ");
        $payment = trim($this->input->post('payment')," ");
        $bank = trim($this->input->post('bank')," ");
        $check_no = trim($this->input->post('check_no')," ");
        $or_no = trim($this->input->post('or_no')," ");
        $description = trim($this->input->post('description')," ");
        $type = trim($this->input->post('type')," ");
        $prepared_by = trim($this->input->post('prepared_by')," ");
        $checked_by = trim($this->input->post('checked_by')," ");
        $approved_by = trim($this->input->post('approved_by')," ");
        $released_by = trim($this->input->post('released_by')," ");
        $received_by = trim($this->input->post('received_by')," ");
        $print = trim($this->input->post('print')," ");
        $save = trim($this->input->post('save')," ");
        if($save=='Save'){
            $data = array(
                'payee'=>$payee,
                'cv_date'=>$cv_date,
                'transaction_date'=>$trans_date,
                'reference'=>$reference_no,
                'reference2'=>$reference_no2,
                'original_amount'=>$orig_amount,
                'balance_due'=>$bal_due,
                'discount'=>$discount,
                'payment'=>$payment,
                'bank'=>$bank,
                'check_no'=>$check_no,
                'check_date'=>$check_date,
                'or_no'=>$or_no,
                'type'=>$type,
                'description'=>$description,
                'prepared_by'=>$prepared_by,
                'checked_by'=>$checked_by,
                'approved_by'=>$approved_by,
                'released_by'=>$released_by,
                'received_by'=>$received_by,
                'saved'=>1,
            );
        }else if($print=='Print'){
            $data = array(
                'payee'=>$payee,
                'cv_date'=>$cv_date,
                'transaction_date'=>$trans_date,
                'reference'=>$reference_no,
                'reference2'=>$reference_no2,
                'original_amount'=>$orig_amount,
                'balance_due'=>$bal_due,
                'discount'=>$discount,
                'payment'=>$payment,
                'bank'=>$bank,
                'check_no'=>$check_no,
                'check_date'=>$check_date,
                'or_no'=>$or_no,
                'type'=>$type,
                'description'=>$description,
                'prepared_by'=>$prepared_by,
                'checked_by'=>$checked_by,
                'approved_by'=>$approved_by,
                'released_by'=>$released_by,
                'received_by'=>$received_by,
                'save_temp'=>1,
            );
        }
        if($this->super_model->update_where("check_voucher", $data, "cv_id", $cv_id)){
            redirect(base_url().'index.php/masterfile/print_cv/'.$cv_id);
        }
    }

    public function location_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['location']=$this->super_model->select_all_order_by('location','location_name',"ASC");
        $this->load->view('masterfile/location_list',$data);
        $this->load->view('template/footer');
    }

    public function save_location(){
    	$location = trim($this->input->post('location')," ");
        $address = trim($this->input->post('address')," ");
        $contact_no = trim($this->input->post('contact_no')," ");
        $cv_start = trim($this->input->post('cv_start')," ");
        $year = trim($this->input->post('year')," ");
    	$error_ext=0;
        $dest= realpath(APPPATH . '../uploads/');
        if(!empty($_FILES['logo']['name'])){
             $logo= basename($_FILES['logo']['name']);
             $logo=explode('.',$logo);
             $ext1=$logo[1];
            
            if($ext1=='php' || ($ext1!='png' && $ext1 != 'jpg' && $ext1!='jpeg')){
                $error_ext++;
            } else {
                 $filename=$location.'.'.$ext1;
                 move_uploaded_file($_FILES["logo"]['tmp_name'], $dest.'/'.$filename);
            }

        } else {
            $filename="";
        }

        $rows_head = $this->super_model->count_rows("location");
        if($rows_head==0){
            $location_id=1;
        } else {
            $max = $this->super_model->get_max("location", "location_id");
            $location_id = $max+1;
        }

        $data_series = array(
            'location_id'=>$location_id,
            'series'=>$cv_start,
            'year'=>$year,
        );
        $this->super_model->insert_into("cv_series", $data_series);

        $data = array(
            'location_id'=>$location_id,
            'location_name'=>$location,
            'address'=>$address,
            'contact_no'=>$contact_no,
            'logo'=>$filename,
            'cv_start'=>$cv_start,
            'year'=>$year,
        );

        if($this->super_model->insert_into("location", $data)){
            redirect(base_url().'index.php/masterfile/location_list');
        }
    }

    public function update_location(){
        $location_id = trim($this->input->post('location_id')," ");
        $location_name = trim($this->input->post('location_name')," ");
        $address = trim($this->input->post('address')," ");
        $contact_no = trim($this->input->post('contact_no')," ");
        $error_ext=0;
        $dest= realpath(APPPATH . '../uploads/');
        if(!empty($_FILES['logo']['name'])){
            $logo= basename($_FILES['logo']['name']);
            $logo=explode('.',$logo);
            $ext1=$logo[1];
            
            if($ext1=='php' || ($ext1!='png' && $ext1 != 'jpg' && $ext1!='jpeg')){
                $error_ext++;
            } else {
                $filename1=$location_name.'.'.$ext1;
                echo $filename;
                move_uploaded_file($_FILES["logo"]['tmp_name'], $dest.'\/'.$filename1);
                $data_pic = array(
                    'logo'=>$filename1
                );
                $this->super_model->update_where("location", $data_pic, "location_id", $location_id);
            }
        }

        $data = array(
            'location_name'=>$location_name,
            'address'=>$address,
            'contact_no'=>$contact_no,
        );
        if($this->super_model->update_where("location", $data, "location_id", $location_id)){
            redirect(base_url().'index.php/masterfile/location_list');
        }
    }

    public function delete_location(){
        $location_id=$this->uri->segment(3);
        if($this->super_model->delete_where("location", "location_id", $location_id)){
             redirect(base_url().'index.php/masterfile/location_list');
        }  
    }


    public function supplier_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['supplier']=$this->super_model->select_all_order_by('supplier','supplier_name',"ASC");
        $this->load->view('masterfile/supplier_list',$data);
        $this->load->view('template/footer');
    }

    public function save_supplier(){
        $supplier = trim($this->input->post('supplier')," ");
        $data = array(
            'supplier_name'=>$supplier,
        );

        if($this->super_model->insert_into("supplier", $data)){
            redirect(base_url().'index.php/masterfile/supplier_list');
        }
    }

    public function update_supplier(){
        $supplier_id = trim($this->input->post('supplier_id')," ");
        $supplier_name = trim($this->input->post('supplier_name')," ");
        $data = array(
            'supplier_name'=>$supplier_name,
        );
        if($this->super_model->update_where("supplier", $data, "supplier_id", $supplier_id)){
            redirect(base_url().'index.php/masterfile/supplier_list');
        }
    }

    public function delete_supplier(){
        $supplier_id=$this->uri->segment(3);
        if($this->super_model->delete_where("supplier", "supplier_id", $supplier_id)){
             redirect(base_url().'index.php/masterfile/supplier_list');
        }  
    }

    public function bank_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['bank']=$this->super_model->select_all_order_by('bank','bank_name',"ASC");
        $this->load->view('masterfile/bank_list',$data);
        $this->load->view('template/footer');
    }

    public function save_bank(){
        $bank = trim($this->input->post('bank')," ");
        $data = array(
            'bank_name'=>$bank,
        );

        if($this->super_model->insert_into("bank", $data)){
            redirect(base_url().'index.php/masterfile/bank_list');
        }
    }

    public function update_bank(){
        $bank_id = trim($this->input->post('bank_id')," ");
        $bank_name = trim($this->input->post('bank_name')," ");
        $data = array(
            'bank_name'=>$bank_name,
        );
        if($this->super_model->update_where("bank", $data, "bank_id", $bank_id)){
            redirect(base_url().'index.php/masterfile/bank_list');
        }
    }

    public function delete_bank(){
        $bank_id=$this->uri->segment(3);
        if($this->super_model->delete_where("bank", "bank_id", $bank_id)){
             redirect(base_url().'index.php/masterfile/bank_list');
        }  
    }

    public function cancelled(){
        $location_id=$this->uri->segment(3);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['location_name'] = $this->super_model->select_column_where("location","location_name","location_id",$location_id);
        foreach($this->super_model->select_custom_where('check_voucher',"location_id = '$location_id' AND cancelled='1'") AS $cv){
            $payee = $this->super_model->select_column_where("supplier","supplier_name","supplier_id",$cv->payee);
            $data['check'][]=array(
                'cv_id'=>$cv->cv_id,
                'payee'=>$payee,
                'reference'=>$cv->reference,
                'reference2'=>$cv->reference2,
                'cv_no'=>$cv->cv_no,
                'saved'=>$cv->saved,
                'cv_date'=>$cv->cv_date,
                'cancelled_reason'=>$cv->cancelled_reason,
            );
        }
        $this->load->view('masterfile/cancelled',$data);
        $this->load->view('template/footer');

    }

    public function cancel_cv(){
        $cv_id = trim($this->input->post('cv_id')," ");
        $reason = trim($this->input->post('reason')," ");
        $location_id = trim($this->input->post('loc_id')," ");
        $data = array(
            'cancelled'=>1,
            'cancelled_reason'=>$reason,
            'cancelled_date'=>date('Y-m-d'),
            'cancelled_by'=>$_SESSION['user_id'],
        );
        if($this->super_model->update_where("check_voucher", $data, "cv_id", $cv_id)){
             echo "<script>alert('Successfully Cancelled!'); 
             window.location ='".base_url()."index.php/masterfile/report_list/".$location_id."'; </script>";
        }
    }

    public function upload(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['location']=$this->super_model->select_all_order_by('location','location_name',"ASC");
        $this->load->view('masterfile/upload',$data);
        $this->load->view('template/footer');
    }
}
