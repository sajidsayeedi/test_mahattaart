<?phpclass Quotation extends CI_Controller{    function __construct()    {        parent::__construct();        $this->load->library('form_validation');        $this->load->library('session');        $this->load->library('email');        $this->load->library('pagination');        $this->load->helper('form');        $this->load->helper('url');        $this->load->model('quotation_model');        $this->load->model('backend_model');        $this->load->model('search_model');        $this->load->model('channel_partner_model');        $this->load->database();    }       public function create_quotation()    {        $data['surface']= $this->backend_model->get_printers_surface();                 $this->load->view('backend/dashboard_header');        $this->load->view('backend/quotation/create_quotation_new',$data);        $this->load->view('backend/footer');    }public function quotation_view($quotation_id=""){    die('asdasdas');       $data['quotation_data']= $this->quotation_model->get_view_quotation_details($quotation_id);     $data['quotation_details']= $this->quotation_model->get_all_quotation_details($quotation_id);             $this->load->view('backend/quotation/quotation_details',$data);           }    public function show_images_viusal(){       $image_id= $this->input->post('image_id');   echo $images_url = "http://www.indiapicture.in/wallsnart/398/".$image_id."";}public function edit_show_images_viusal(){      echo $image_id= $this->input->post('image_id');  //  $images_url = "http://www.indiapicture.in/wallsnart/398/".$image_id."";}      public function save_create_quotation()    {                                      $firstname=$this->input->post('firstname');         $lastname=$this->input->post('lastname');          $email=$this->input->post('email');           $martialstatus=$this->input->post('martialstatus');            $address=$this->input->post('address');             $companyname=$this->input->post('companyname');              $country=$this->input->post('country');               $state=$this->input->post('state');                $city=$this->input->post('city');                 $gender=$this->input->post('gender');                 $region=$this->input->post('region');                 $pincode=$this->input->post('pincode');                 $contactnumber=$this->input->post('contactnumber');                                       $customer_id=$this->input->post('selected_customer_id');        $date=date('Y-m-d h:t');        $quotation_id=$this->input->post('quotation_id');        $image_id=$this->input->post('imgid');        $licence_cost=$this->input->post('license_cost');        //print_r($licence_cost);        $surface=$this->input->post('surface');        $print_size_height=$this->input->post('print_height');        $print_size_width=$this->input->post('print_width');        $print_cost=$this->input->post('print_cost');       // print_r($print_cost);die;        $frame_code=$this->input->post('frame_code');        $frame_size_width=$this->input->post('frame_width');        $frame_cost=$this->input->post('frame_cost');        $frame_cost=$this->input->post('frame_cost');        $frame_total=$this->input->post('frame_total');        $mount_code=$this->input->post('mount_code');        $mount_size_width=$this->input->post('mount_width');        $mount_cost=$this->input->post('mount_cost');        $glass_cover=$this->input->post('cover');        $glass_cost=$this->input->post('glass_cost');         $packaging_charge=30;          $courier_charge=$this->input->post('courier_charge');           $createdby=$this->input->post('createdby');           $discount=$this->input->post('discount');            //$after_discount=$this->input->post('after_discount');             $tax=$this->input->post('tax');              $s_name=$this->input->post('s_name');               $s_email=$this->input->post('s_email');                $s_contact=$this->input->post('s_contact');                                $c_name=$this->input->post('c_name');               $c_email=$this->input->post('c_email');                $c_contact=$this->input->post('c_contact');                                                       $status=1;        $total=$this->input->post('Q_total');        //print_r($total);                       if($image_id<>'')        {       for($i=0;$i<count($image_id);$i++)        {       $after_discount_val=$total[$i]*$discount/100;       $after_discount=$total[$i]-$after_discount_val;        $OrgPrintCost=($licence_cost[$i]+$print_size_height[$i]*$print_size_width[$i])*2;        $OrgMountHeight=$print_size_height[$i]+($mount_size_width[$i]*2);        $OrgMountWidth= $print_size_width[$i]+($mount_size_width[$i]*2);        $OrgMountSize=$OrgMountHeight*$OrgMountWidth;        $OrgMountCost=$OrgMountSize*2;        $OrgFrametRuningArea = ($OrgMountHeight + $frame_size_width[$i]*2) * ($OrgMountWidth+$frame_size_width[$i]*2);        $OrgFramCost=($OrgFrametRuningArea)/(12)*2;//rate 2        $totalCost=$OrgPrintCost+$OrgFramCost+$OrgMountCost;                  $insert=" insert into tbl_quotation set createdby='".$createdby."',after_discount='".$after_discount."', discount='".$discount."', tax='".$tax."', packing_charge='".$packaging_charge."', courier_charge='".$courier_charge."', sales_person='".$s_name."', sales_emailid='".$s_email."', sales_contact='".$s_contact."', client_servicing='".$c_name."', client_emailid='".$c_email."', client_contact='".$c_contact."', customer_id='".$customer_id."',         quotation_id='".$quotation_id."', image_id='".$image_id[$i]."', licence_cost='".$licence_cost[$i]."', surface='".$surface[$i]."', print_size_height='".$print_size_height[$i]."', print_size_width='".$print_size_width[$i]."', print_cost='".$print_cost[$i]."', frame_code='".$frame_code[$i]."',  frame_size_width='".$frame_size_width[$i]."', frame_cost='".$frame_cost[$i]."',   mount_code='".$mount_code[$i]."',  mount_size_width='".$mount_size_width[$i]."', mount_cost='".$mount_cost[$i]."', glass_id='".$cover[$i]."', glass_cost='".$glass_cost[$i]."', status='1', total='".$total[$i]."',created_date='".$date."'";      $QueryExecute= mysql_query($insert);          $insert1="insert into tbl_quotation_details set customer_id='".$customer_id."',  quotation_id='".$quotation_id."', first_name='".$firstname."', last_name='".$lastname."', email_id='".$email."', gander='".$gender."', marries_statue='".$martialstatus."', address='".$address."', company_name='".$companyname."', country='".$country."', state='".$state."', city='".$city."', region='".$region."', pincode='".$pincode."', contact='".$contactnumber."', created_date='".date('Y-m-d h:t')."'";     mysql_query($insert1);        if($QueryExecute)            {           $data['msg']='Quotation create successfully';                       }else{               $data['msg']='accuring error';            }                 }  // eend loop        }// end if condition           unset($image_id);                                     $this->load->view('backend/dashboard_header');        $this->load->view('backend/quotation/create_quotation_new',$data);        $this->load->view('backend/footer');    }                                    public function convert_into_invoice()    {        die('controller');         $invoice_id=$this->input->post('invoice_id');                          if($invoice_id<>'')        {             $quotation_data= $this->quotation_model->convert_into_invoice($invoice_id);                       if($quotation_data==1)            {            $data['msg']='Invoice create successfully';                       }else if($quotation_data==0){                $data['msg']='accuring error';            }               }// end if condition           unset($image_id);                                    $this->load->view('backend/dashboard_header');        $this->load->view('backend/manage_quotation',$data);        $this->load->view('backend/footer');    }                         public function save_edit_quotation()    {                                    $this->load->view('backend/dashboard_header');        $this->load->view('quotation/edit_quotation_details',$data);        $this->load->view('backend/footer');    }                        public function generate_quotation()    {        if($this->session->userdata('userid'))        {            // $this->form_validation->set_rules('hide','Custom','required');            //if($this->form_validation->run()==true)            //{            $data=array(                'quotation_date'=>$this->input->post('qdate'),                'customer_id'=>$this->input->post('hide'),                'tin_number'=>$this->input->post('tin_no'),'tax_type'=>$this->input->post('taxtype'),                'pan_card_number'=>$this->input->post('pancardnumber'),                'payment_mode'=>$this->input->post('paymentmode'),            );            // print_r($data);            $insert_id = $this->quotation_model->insert_quotation($data);            redirect('quotation/create_quotation_detail/'.$insert_id);        }        else{            redirect('backend/index');        }    }    public function create_quotation_detail($insert_id)    {        if($this->session->userdata('userid'))        {            $this->form_validation->set_rules('total_price','Total','required');            $this->form_validation->set_rules('imgid','IMAGE','required');            // $this->form_validation->set_rules('quotation_id','Quotation','required');            if($this->form_validation->run()==true)            {                $quotation_id=$this->uri->segment(3);                $data2= array('image_id'=>$this->input->post('imgid'),'print_total'=>$this->input->post('printsno'),                    'frame_total'=>$this->input->post('frameno'),'mount_total'=>$this->input->post('mountno'),                    'print_id'=>$this->input->post('print_surface'),'print_size_length'=>$this->input->post('print_size_length'),                    'print_size_width'=>$this->input->post('print_size_width'),                    'frame_id'=>$this->input->post('frame_type'),'frame_cost'=>$this->input->post('frame_cost'),                    'frame_size_length'=>$this->input->post('frame_size_length'),                    'frame_size_width'=>$this->input->post('frame_size_width'),'mount_size_length'=>$this->input->post('mount_size_length'),                    'mount_size_width'=>$this->input->post('mount_size_width'),                    'mount_id'=>$this->input->post('mount_type'),'glass_id'=>$this->input->post('glass'),                    'glass_cost'=>$this->input->post('glass_cost'),                    'print_cost'=>$this->input->post('cost'),'mount_cost'=>$this->input->post('mount_cost'),                    'quotation_id'=>$quotation_id,                    'total'=>$this->input->post('total_price')                );                $result=mysql_query("select total_amount from tbl_quotation where id=".$quotation_id."");                $amount=mysql_fetch_row($result);                $data4=$this->input->post('total_price');                $data3=$amount[0]+$data4;                //   $tot[]= array('total'=>$data3);                //$data3= array('total_amount'=>$this->input->post('total_price'));                $detail_id= $this->quotation_model->insert_quotation_detail($data2);                //redirect('backend/create_quotation_detail/'.$insert_id);                $totale= $this->quotation_model->update_quotation_total($quotation_id,$data3);                //redirect('backend/print_quotation/'.$insert_id);                //print($totale);            }            $this->load->view('backend/dashboard_header');            $this->load->view('backend/quotation/create_quotation_detail');            $this->load->view('backend/footer');        }        else{            redirect('backend/index');        }    }    public function  create_quotation_final()    {        $this->load->view('backend/dashboard_header');        $this->load->view('backend/quotation/create_quotation_final');        $this->load->view('backend/footer');    }    public function create_quotation_end()    {        if($this->session->userdata('userid'))        {            $this->form_validation->set_rules('total_prize','Total','required');            if($this->form_validation->run()==true)            {                if(isset($_POST['generate_quotation']))                {                    $id=$this->input->post('hide');                    $data3=array('sales_person'=>$this->input->post('sales_name'),                        'sales_person_email'=>$this->input->post('sales_email'),'sales_person_number'=>$this->input->post('sales_number'),                        'client_name'=>$this->input->post('client_name'),'client_email'=>$this->input->post('client_email'),                        'client_number'=>$this->input->post('client_number'),'created_by'=>$this->input->post('created_by'),'updated_by'=>$this->input->post('updated_by'),                        'packaging_charges'=>$this->input->post('pack_charges'),                        'courier_charges'=>$this->input->post('courier_charges'),                        'discount'=>$this->input->post('discount'),                        'vat'=>$this->input->post('vat'),                        'final_amount'=>$this->input->post('total_prize'),                        //'total_amount'=>$this->input->post('after_discount'),                        'total_prints'=>$this->input->post('totalprints'),                        'total_frames'=>$this->input->post('totalframes'),                        'total_mounts'=>$this->input->post('totalmounts'),                        'total_images'=>$this->input->post('totalimages'),                        'payment_mode'=>$this->input->post('paymentmode'),                        'tax_type'=>$this->input->post('taxtype'),                        'pan_card_number'=>$this->input->post('pancardnumber'),                        'tin_number'=>$this->input->post('tin_no'),                        'quotation_date'=>$this->input->post('qdate'));                    // print_r($data3);                    $value=$this->quotation_model->update_quotation_final($id,$data3);                    redirect('quotation/print_quotation/'.$id);                    //     print_r($value);                }                elseif(isset($_POST['convert_to_invoice']))                {                    $id=$this->input->post('hide');                    $data3=array('sales_person'=>$this->input->post('sales_name'),                        'sales_person_email'=>$this->input->post('sales_email'),'sales_person_number'=>$this->input->post('sales_number'),                        'client_name'=>$this->input->post('client_name'),'client_email'=>$this->input->post('client_email'),                        'client_number'=>$this->input->post('client_number'),'created_by'=>$this->input->post('created_by'),'updated_by'=>$this->input->post('updated_by'),                        'packaging_charges'=>$this->input->post('pack_charges'),                        'courier_charges'=>$this->input->post('courier_charges'),                        'discount'=>$this->input->post('discount'),                        'vat'=>$this->input->post('vat'),                        'final_amount'=>$this->input->post('total_prize'),                        //'total_amount'=>$this->input->post('after_discount'),                        'total_prints'=>$this->input->post('totalprints'),                        'total_frames'=>$this->input->post('totalframes'),                        'total_mounts'=>$this->input->post('totalmounts'),                        'total_images'=>$this->input->post('totalimages'),                        'payment_mode'=>$this->input->post('paymentmode'),                        'tax_type'=>$this->input->post('taxtype'),                        'pan_card_number'=>$this->input->post('pancardnumber'),                        'tin_number'=>$this->input->post('tin_no'),                        'quotation_date'=>$this->input->post('qdate'),                        'convert_to_invoice'=>1                    );                    // print_r($data3);                    $value=$this->quotation_model->update_quotation_final($id,$data3);                    redirect('quotation/print_quotation/'.$id);                    //     print_r($value);                }            }        }    }    public  function print_quotation($id)    {        if($this->session->userdata('userid'))        {            $details['quotation']=$this->quotation_model->get_quotation_det($id);            $details['img']=$this->quotation_model->get_quotation_image($id);            $this->load->view('backend/dashboard_header');            $this->load->view('backend/quotation/print_quotation',$details);            $this->load->view('backend/footer');        }        else{            redirect('backend/index');        }    }    public function edit_quotation_detail()    {                $details['print']=$this->quotation_model->edit_quotation_image($id);                      $this->load->view('backend/dashboard_header');        $this->load->view('backend/quotation/edit_quotation_detail',$details);        $this->load->view('backend/footer');    }    public function edit_quotation_save()    {        $edit_id=$this->input->post('edit_id');         $addcpn=$this->input->post('addcpn');         $customer_id=$this->input->post('selected_customer_id');        $date=date('Y-m-d h:t');        $quotation_id=$this->input->post('quotation_id');        $image_id=$this->input->post('imgid');        $licence_cost=$this->input->post('license_cost');        //print_r($licence_cost);        $surface=$this->input->post('surface');        $print_size_height=$this->input->post('print_height');        $print_size_width=$this->input->post('print_width');        $print_cost=$this->input->post('print_cost');       // print_r($print_cost);die;        $frame_code=$this->input->post('frame_code');        $frame_size_width=$this->input->post('frame_width');        $frame_cost=$this->input->post('frame_cost');        $frame_cost=$this->input->post('frame_cost');        $frame_total=$this->input->post('frame_total');        $mount_code=$this->input->post('mount_code');        $mount_size_width=$this->input->post('mount_width');        $mount_cost=$this->input->post('mount_cost');        $glass_cover=$this->input->post('cover');        $glass_cost=$this->input->post('glass_cost');        $status=1;                        $packaging_charge=30;          $courier_charge=$this->input->post('courier_charge');           $createdby=$this->input->post('createdby');           $discount=$this->input->post('discount');            //$after_discount=$this->input->post('after_discount');             $tax=$this->input->post('tax');              $s_name=$this->input->post('s_name');               $s_email=$this->input->post('s_email');                $s_contact=$this->input->post('s_contact');                                $c_name=$this->input->post('c_name');               $c_email=$this->input->post('c_email');                $c_contact=$this->input->post('c_contact');        $total=$this->input->post('Q_total');        //print_r($total);               if($addcpn=='Edit_Quotation'){        if($image_id<>'')        {       for($i=0;$i<count($image_id);$i++)        {         $after_discount_val=$total[$i]*$discount/100;        $after_discount=$total[$i]-$after_discount_val;        $OrgPrintCost=($licence_cost[$i]+$print_size_height[$i]*$print_size_width[$i])*2;        $OrgMountHeight=$print_size_height[$i]+($mount_size_width[$i]*2);        $OrgMountWidth= $print_size_width[$i]+($mount_size_width[$i]*2);        $OrgMountSize=$OrgMountHeight*$OrgMountWidth;        $OrgMountCost=$OrgMountSize*2;        $OrgFrametRuningArea = ($OrgMountHeight + $frame_size_width[$i]*2) * ($OrgMountWidth+$frame_size_width[$i]*2);        $OrgFramCost=($OrgFrametRuningArea)/(12)*2;//rate 2        $totalCost=$OrgPrintCost+$OrgFramCost+$OrgMountCost;                  $insert=" update tbl_quotation set createdby='".$createdby."',after_discount='".$after_discount."', discount='".$discount."', tax='".$tax."', packing_charge='".$packaging_charge."', courier_charge='".$courier_charge."', sales_person='".$s_name."', sales_emailid='".$s_email."', sales_contact='".$s_contact."', client_servicing='".$c_name."', client_emailid='".$c_email."', client_contact='".$c_contact."', image_id='".$image_id[$i]."', licence_cost='".$licence_cost[$i]."', surface='".$surface[$i]."', print_size_height='".$print_size_height[$i]."', print_size_width='".$print_size_width[$i]."', print_cost='".$print_cost[$i]."', frame_code='".$frame_code[$i]."',  frame_size_width='".$frame_size_width[$i]."', frame_cost='".$frame_cost[$i]."',   mount_code='".$mount_code[$i]."',  mount_size_width='".$mount_size_width[$i]."', mount_cost='".$mount_cost[$i]."', glass_id='".$cover[$i]."', glass_cost='".$glass_cost[$i]."', total='".$totalCost."' where id ='".$edit_id[$i]."'";      $QueryExecute= mysql_query($insert);        if($QueryExecute)            {            $data['msg']='Quotation updated successfully';                       }else{                $data['msg']='accuring error';            }                 }  // eend loop        }// end if condition           unset($image_id);        }// end action edit quotation        $data['quotation']=$quotation_id;       // echo $quotation_id;die;         $this->load->view('backend/dashboard_header');        $this->load->view('backend/quotation/edit_quotation_detail',$data);        $this->load->view('backend/footer');    }    public function save_edit_quotation_detail($id,$quotation_id)    {        if($this->session->userdata('userid'))        {            $this->form_validation->set_rules('total_price','Total','required');            if($this->form_validation->run()==true)            { $data['msg']="";                $quotation_id=$this->uri->segment(3);                $data2= array('image_id'=>$this->input->post('imgid'),'print_total'=>$this->input->post('printsno'),                    'frame_total'=>$this->input->post('frameno'),'mount_total'=>$this->input->post('mountno')                ,'print_id'=>$this->input->post('print_surface'),'frame_id'=>$this->input->post('frame_type'),                    'mount_id'=>$this->input->post('mount_type'),'glass_id'=>$this->input->post('glass'),                    'print_cost'=>$this->input->post('cost'),'mount_cost'=>$this->input->post('mount_cost'),                    'frame_cost'=>$this->input->post('frame_cost')                );                $result=mysql_query("select total_amount from tbl_quotation where id=".$quotation_id."");                $amount=mysql_fetch_row($result);                $data4=$this->input->post('total_price');                $data3=$amount[0]+$data4;                $detail_id= $this->quotation_model->update_quotation_detail($data2,$id);                             $totale= $this->quotation_model->update_quotation_total($quotation_id,$data3);                $data['msg']="Successfully Changed";                           }        }    }    public function convert_to_doc($id)    {        $details['quotation']=$this->quotation_model->get_quotation_det($id);        $details['img']=$this->quotation_model->get_quotation_image($id);        $this->load->view('backend/quotation/printquotation',$details);        /*header("Content-Type: application/vnd.ms-word");        header("Expires: 0");        header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");        header("Content-disposition: attachment; filename=\"mydocument_name.doc\"");        $output = $this->load->view("backend/quotation/printquotation", $quotation);        echo $data;        exit;*/    }    public function suggestion()    {        /* if (isset($_GET['term'])){              exit;          }*/        $q = stripslashes($_GET['term']);        $details= $this->quotation_model->get_customer_byname($q);    }    public function delete_quotation_data($id)    {//echo $id;       $delete=   $this->quotation_model->delete_quotation($id);       $this->quotation_model->delete_quotation_detail($id);        if($delete==1)        {            $data['msg']='Quotation deleted';        }else if($delete==0){            $data['msg']='accuring error';        }              $this->load->view('backend/dashboard_header');            $this->load->view('backend/manage_onlineorders',$data);           $this->load->view('backend/footer');            }    public function convert_quotation_data($id)    {        $this->quotation_model->convert_quotation($id);        //$this->quotation_model->delete_quotation_detail($id);        redirect('quotation/view_quotation');    }    public function view_quotation()    {        if($this->session->userdata('userid'))        {            if($this->input->post('search'))            {                $company_name=$this->input->post('company_name');                $contact_person=$this->input->post('contact_person');                $quotation_id=$this->input->post('quotation_id');                $region=$this->input->post('region');                $quotation_status=$this->input->post('quotation_status');                $sales_person =$this->input->post('sales_person');                if($quotation_status=='0')                {                    $status= 0;                }                else if($quotation_status=='1')                {                    $status= 1;                }                else                {                    $status = $quotation_status;                }                $data['quotation']=$this->quotation_model->search_quotation($contact_person,$quotation_id,$quotation_status,$sales_person);                $data['links']="";                $data['total_records']=count($data['quotation']);            }            else            {                $config['base_url'] = base_url().'index.php/quotation/view_quotation';                $config['total_rows'] = $this->quotation_model->record_count_quotation();                $config['per_page'] = 4;                $config["uri_segment"] = 3;                $this->pagination->initialize($config);                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;                $data['quotation']=$this->quotation_model->get_quotation_pagination($config['per_page'],$page);                                $data['total_records']=$this->quotation_model->record_count_quotation();            }            $this->load->view('backend/dashboard_header');            $this->load->view('backend/quotation/view_quotation',$data);            $this->load->view('backend/footer');        }        else{redirect('backend/index');}    }    public function view_quotation_details($id)    {        if($this->session->userdata('userid'))        {            // $data['print']=$this->quotation_model->get_quotation_details($id);            redirect('quotation/print_quotation/'.$id);        }        else{redirect('backend/index');}    }           public function get_customers()    {        $details=($this->quotation_model->get_customers_byid($this->input->post('id')));        print($details->first_name."^");        print($details->last_name."^");        print($details->email_id."^");        print($details->occupation."^");        print($details->gender."^");        print($details->martial_status."^");        print(mysql_real_escape_string($details->address)."^");        print($details->company_name."^");        print($details->country."^");        print($details->state."^");        print($details->zip_code."^");        print($details->contact."^");         print($details->city."^");           print($details->region."^");        //  print($details->customer_id."^");        // print($details->first_name." ".$details->last_name);    }    public function get_images()    {        $details=$this->quotation_model->get_image_byid($this->input->post('id'));        // print('https://s3.amazonaws.com/wallsnart/158/'.$details->images_filename.''."/");        print( $details->images_filename."/");        print($details->images_price."/");        //  print($details->images_filename);    }    public function get_surfaces()    {        $details=$this->quotation_model->get_surface_byid($this->input->post('id'));        //print($details->surface_type."/");        print($details->surface_gsm."/");        print($details->cost);    }    public function get_frames()    {        $details=$this->quotation_model->get_frame_byid($this->input->post('id'));        //print($details->surface_type."/");        print($details->frame_code."/");        print($details->frame_width."/");        print($details->frame_cost."/");        print($details->frame_upload_image_name);    }    public function get_mounts()    {        $details=$this->quotation_model->get_mount_byid($this->input->post('id'));        //print($details->surface_type."/");        print($details->mount_code."/");        print($details->mount_thickness."/");        print($details->mount_cost."/");        print($details->mount_upload_image_name);    }    public function  get_glasses()    { $details=$this->quotation_model->get_glass_byid($this->input->post('id'));        print($details->glass_cost."/");    }    public function get_packagers()    {$details=$this->quotation_model->get_pack_byid($this->input->post('id'));        print($details->packaging_cost_per_size_of_print);    }    public function get_couriers()    {        $details=$this->quotation_model->get_cor_byid($this->input->post('id'));        print($details->courier_cost);    }    public function get_total_images($id)    {        $details=$this->quotation_model->get_total_images($this->input->post('id'));        //print($details);        $i = 0;        foreach($details as $img)        {            // print_r($img['image_id']);//echo $img[$i]['print_total'];            $t_img= $t_img+ count($img['image_id']);            $t_print = $t_print+ $img['print_total'];            $t_frame =  $t_frame +$img['frame_total'];            $t_mount =  $t_mount+$img['mount_total'];            $i++;        }        //echo $t_print."/".$t_frame."/".$t_mount;        echo $t_print."/";        echo $t_frame."/";        echo $t_mount."/";        echo $t_img."/";        // echo mysql_num_rows($details);        //  print($details->id[1]);        //print($details->image_id[0]."/");        //print($details->print_total."/");        //print($details->frame_total."/");        //print($details->mount_total."/");    }    public function send_mail_quotation()    {        $this->load->view('backend/dashboard_header');        $this->load->view('backend/quotation/send_mail_quotation');        $this->load->view('backend/footer');    }    public function view_invoice()    {        if($this->session->userdata('userid'))        {            if($this->input->post('search'))            {                $company_name=$this->input->post('company_name');                $contact_person=$this->input->post('contact_person');                $quotation_id=$this->input->post('quotation_id');                $region=$this->input->post('region');                $quotation_status=$this->input->post('quotation_status');                $sales_person =$this->input->post('sales_person');                if($quotation_status=='0')                {                    $status= 0;                }                else if($quotation_status=='1')                {                    $status= 1;                }                else                {                    $status = $quotation_status;                }                $data['quotation']=$this->quotation_model->search_invoice($contact_person,$quotation_id,$quotation_status,$sales_person);                $data['links']="";                $data['total_records']=count($data['quotation']);            }            else            {                $config['base_url'] = base_url().'index.php/backend/view_invoice';                $config['total_rows'] = $this->quotation_model->record_count_quotation();                $config['per_page'] = 4;                $config["uri_segment"] = 3;                $this->pagination->initialize($config);                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;                $data['quotation']=$this->quotation_model->get_quotation_pagination($config['per_page'],$page);                $data['links']= $this->pagination->create_links();                $data['total_records']=$this->quotation_model->record_count_quotation();            }            $this->load->view('backend/dashboard_header');            $this->load->view('backend/quotation/view_invoice',$data);            $this->load->view('backend/footer');        }        else{redirect('backend/index');}    }    public function send_mails_quotation()    {        if($this->session->userdata('userid'))        {            $data['msg']="";            $this->form_validation->set_rules('emails','Email','required');            $this->form_validation->set_rules('msg-mail','MSG','required');            if($this->form_validation->run()==true)            {                if($this->input->post('emails'))                {                    $mails= explode(',',$this->input->post('emails'));                    for($i=0;$i<count($mails);$i++)                    {                        $this->email->from('admin@wallsnart.com', 'Wallsnart');                        $this->email->to($mails[$i]);                        $this->email->subject($this->input->post('sbj'));                        $this->email->message($this->input->post('msg-mail'));                        $this->email->send();                        $data['msg']="Mail Has been Sent Successfully";                    }                }            }            $this->load->view('backend/dashboard_header');            $this->load->view('backend/quotation/send_mail_quotation',$data);            $this->load->view('backend/footer');        }        else        {            redirect('backend/index');        }    }public function add_quotation()    {        if($this->session->userdata('userid'))        {                       $this->load->view('backend/dashboard_header');            $this->load->view('backend/quotation/add_quotation',$data);            $this->load->view('backend/footer');        }        else        {            redirect('backend/index');        }    }}