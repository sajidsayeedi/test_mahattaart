<link href="<?=base_url()?>assets/css2/fonts.css" rel="stylesheet" type="text/css" /><link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="<?=base_url()?>assets/js2/jquery-1.6.1.min.js"></script></head><body><!--MIDDLE PAGE WRAPPER STARTS--><div id="middle-wrapper"><div id="middle-container">  <div class="main-hdr-quotation">Printer Job Sheet</div>    <div id="quotationListDiv" class="manage-order" >      <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">        <tr  class="darktr">          <td width="18%" class="bold">Order ID:</td>                    <td><?=$view_job_sheet[0]->order_id?></td>        </tr>        <tr style="border-bottom:none">          <td colspan="2" ><div class="viewcplist-inner">              <table width="100%" border="0" cellspacing="0" cellpadding="0">                <tr class="hdrs">                  <td width="150">Images Id</td>                  <td>Name</td>                  <td>Region</td>                  <td>Status</td>                  <td>Time Alloted</td>                </tr>                <?php foreach($order_details as $ord){                     $status_printer=$this->backend_model->status_printer($ord->order_id);                                                              $data_split= split('/',$ord->image_id);                    if($data_split[0]=='images')                    {                   $fileName=$data_split[2];                        $image_url=base_url().$ord->image_id;                    }else {                         $fileName=$ord->image_id;                        $image_url="http://www.indiapicture.in/wallsnart/398/".$ord->image_id."";                    }                                          ?>                <tr>                  <td><b><?php echo $fileName;?></b><br>                      <span class="thumbtd"><img src="<?=$image_url;?>" width="107" height="107" alt="art"/><br />                    </span></td>                  <td><?php echo ucwords($ord->first_name).' '.ucwords($ord->last_name);?></td>                  <td><?php echo $ord->region;?></td>                  <td><?php if($status_printer==0){ echo 'Pending';}elseif($status_printer!=0){ echo 'Finish';}?></td>                  <td><?php $db_split=split(' ',$ord->created_date);                                 $date=split('-',$db_split[0]);                                   $time= $date[2]+1;                             echo   $date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];                             $alloweted_date=$date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];                             $system_date=date('Y-m-d h:t');                            $time_allow= strtotime($alloweted_date);                            $time_system= strtotime($system_date);                            $to='printer@wallsnart.com';                             if($time_allow<=$time_system && $status_printer==0)                             {                               $this->backend_model->sendmail('Printer',$to);                               }                    ?></td>                </tr>                <?php }?>              </table>            </div></td>        </tr>        <div>          <tr>            <td colspan="2" style="padding:0;"><div style="padding:30px; ">              </div>              <span style="color: green; font-size: 14px;" id="status"></span>              <div class="quotation-div"  id="quotation2Div" style="margin-left:25px">                <!--DETAILS TABLE-->                <table width="100%" border="0" cellspacing="0" cellpadding="0">                  <tr >                    <td class="bold">Printer</td>                    <td><?php if($view_job_sheet[0]->services==1){ echo 'Row Material';}elseif($view_job_sheet[0]->services==2){ echo 'Services';}?>                    </td>                    <td></td>                    <td></td>                  </tr>                  <tr class="darktr">                    <td width="120" class="bold">Company Name:</td>                    <td width="250"><?=$view_job_sheet[0]->printer_company_name?></td>                    <td width="120">&nbsp;</td>                    <td>&nbsp;</td>                  </tr>                  <tr >                    <td width="120" class="bold">Surface</td>                    <td width="250"><?=$view_job_sheet[0]->surface?></td>                    <td width="120">&nbsp;</td>                    <td>&nbsp;</td>                  </tr>                  <tr>                    <td class="bold">Print Size(Height X Width)</td>                    <td ><?=$view_job_sheet[0]->print_size?></td>                    <td></td>                    <td>&nbsp;</td>                  </tr>                  <tr class="darktr">                    <td class="bold">Total Print</td>                    <td ><?=$view_job_sheet[0]->total_print?>                      </td>                    <td>&nbsp;</td>                    <td>&nbsp;</td>                  </tr>                  <tr>                    <td class="bold">Name</td>                    <td> <?=$view_job_sheet[0]->name?></td>                    <td>&nbsp;</td>                    <td>&nbsp;</td>                  </tr>                  <tr class="darktr">                    <td class="bold">Date</td>                    <td><?=date('Y-m-d h:t');?></td>                    <td class="bold">Completion Date</td>                    <td><?=$view_job_sheet[0]->completion_date?></td>                  </tr>                  <tr class="darktr">                    <td class="bold">QC</td>                    <td><?php if($view_job_sheet[0]->quality_check==1){ echo 'Yes';}elseif($view_job_sheet[0]->quality_check==0){ echo 'No';}?></td>                    <td class="bold">QC done by</td>                    <td><?=$view_job_sheet[0]->quality_checker_name?></td>                  </tr>                  <tr>                    <td class="bold">Person Incharge</td>                    <td><?=$view_job_sheet[0]->person_incharge?>                    </td>                    <td>&nbsp;</td>                    <td>&nbsp;</td>                  </tr>                </table>                <p>&nbsp;</p>                <p>&nbsp;</p>              </div></td>          </tr>        </div>      </table>  </div></div><style>    .txtClass{        width: 90px;        height: 30px;    }     </style>