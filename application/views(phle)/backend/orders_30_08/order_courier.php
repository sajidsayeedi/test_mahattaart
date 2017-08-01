<link href="<?=base_url()?>assets/css2/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit / Update Order - Printing</title>
<script type="text/javascript">        function get_printer_name(id)        {            if(id)            {                var datastring='id=' +id;                              $.ajax({                    url:"<?=base_url()?>index.php/orders/get_printer",                    type: "POST",                    data:datastring,                    success: function(data)                    {                        $('#printer_name').html(data);                    }                });            }        }                           $(document).ready(function(){   $('#default_printer').show();   $('#printer').hide();   });         function change_services(values) {     if(values=='material')     {      $('#default_printer').show();      $('#printer').hide();        }else if(values=='services')     {      $('#default_printer').hide();      $('#printer').show();        } }function update_courier_details()        {                
if ($("#online").is(":checked")) {    
var print_type=document.getElementsByName('type')[0].value;    }    if ($("#offline").is(":checked")) {    var print_type=document.getElementsByName('type')[1].value;    }  var edit_id=$('#edit_id').val();  var order_id=$('#order_id').val();     var company=$('#company').val();    if(company=='')    {       var company=$('#company2').val();     }else{        company=$('#company').val();     } 
var delivery_mode=$('#delivery_mode').val();
 var total_courier=$('#total_courier').val();  

 var tracking_id=$('#tracking_id').val();  var order_detail=$('#order_detail').val();  var delivery_place=$('#delivery_place').val();     var dispatch_date=$('#dispatch_date').val();     var completion_date=$('#completion_date').val();      var quality_check=$('#quality_check').val();      var quality_checker_name=$('#quality_checker_name').val();      var person_incharge=$('#person_incharge').val();       var datastring='type='+print_type+'&edit_id='+edit_id+'&order_id='+order_id+'&company='+company+'&total_courier='+total_courier+'&tracking_id='+tracking_id+'&order_detail='+order_detail+'&completion_date='+completion_date+'&quality_check='+quality_check+'&quality_checker_name='+quality_checker_name+'&person_incharge='+person_incharge+'&delivery_place='+delivery_place+'&dispatch_date='+dispatch_date;                $.ajax({                    url:"<?=base_url()?>index.php/backend/update_courier_order_details",                    type: "POST",                    data:datastring,                    success: function(response)                    {                                           $('#status').html(response);                     setTimeout(function(){ reload();}, 3000);                    }                });        }                                function save_courier_details()        {    if ($("#online").is(":checked")) {    var print_type=document.getElementsByName('type')[0].value;    }    if ($("#offline").is(":checked")) {    var print_type=document.getElementsByName('type')[1].value;    }  var order_id=$('#order_id').val();     var company=$('#company').val();    if(company=='')    {       var company=$('#company2').val();     }else{        company=$('#company').val();     }  var total_courier=$('#total_courier').val();   var tracking_id=$('#tracking_id').val();  var order_detail=$('#order_detail').val(); 
 
  var delivery_place=$('#delivery_place').val(); 
  var delivery_mode=$('#delivery_mode').val();
      var dispatch_date=$('#dispatch_date').val();     var completion_date=$('#completion_date').val();      var quality_check=$('#quality_check').val();      var quality_checker_name=$('#quality_checker_name').val();      var person_incharge=$('#person_incharge').val();       var datastring='delivery_mode='+delivery_mode+'&delivery_mode='+delivery_mode+'&type='+print_type+'&order_id='+order_id+'&company='+company+'&total_courier='+total_courier+'&tracking_id='+tracking_id+'&order_detail='+order_detail+'&completion_date='+completion_date+'&quality_check='+quality_check+'&quality_checker_name='+quality_checker_name+'&person_incharge='+person_incharge+'&delivery_place='+delivery_place+'&dispatch_date='+dispatch_date;                $.ajax({                    url:"<?=base_url()?>index.php/backend/save_courier_order_details",                    type: "POST",                    data:datastring,                    success: function(response)                    {                                           $('#status').html(response);                     setTimeout(function(){ reload();}, 3000);                    }                });        }                        function reload() {    location.reload();}    </script>
<style>                
.error{            color: #FB3A3A;    display: inline-block;        padding: 0;    text-align: left;    width: 220px;        }    
</style>
</head>
<body>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr-quotation"> Edit/Update Order</div>
    <?php foreach($order_details as $ord){?>
    <?}?>
    <div id="quotationListDiv" class="manage-order" >
      <form name="update_printer_status"  novalidate="novalidate" id="update_printer_status" method="post" action="<?php echo base_url();?>index.php/orders/update_printer_status/<?php echo $ord->order_id?>">
        <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
          <tr  class="darktr">
            <td width="18%" class="bold">Order ID:</td>
            <?php foreach($order_details as $ord){?>
            <?}?>
            <td><?php echo $ord->order_id;?>
              <input type="hidden" id="order_id" value="<?=$ord->order_id?>"></td>
          </tr>
          <tr style="border-bottom:none">
            <td colspan="2" ><div class="viewcplist-inner">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="hdrs">
                    <td>SR No.</td>
                    <td width="150">Images Id</td>
                    <td>Name</td>
                    <td>Region</td>
                    <td>Status</td>
                    <td>Time Alloted</td>
                  </tr>
                  <?php $i=1; foreach($order_details as $ord){                                     $status_courier=$this->backend_model->status_courier($ord->order_id); $data_split= split('/',$ord->image_id);                    if($data_split[0]=='images')                    {                   $fileName=$data_split[2];                        $image_url=base_url().$ord->image_id;                    }else {                         $fileName=$ord->image_id;                        $image_url="http://www.indiapicture.in/wallsnart/398/".$ord->image_id."";                    }                                  ?>
                  <tr>
                    <td><?=$i.'.';?></td>
                    <td><b><?php echo $fileName;?></b><br>
                      <span class="thumbtd"><img src="<?php echo $image_url;?>" width="107" height="107" alt="art"/><br />
                      </span></td>
                    <td><?php echo ucwords($ord->first_name).' '.ucwords($ord->last_name);?></td>
                    <td><?php echo $ord->region;?></td>
                    <td><?php if($status_framer==0){ echo 'Pending';}elseif($status_courier!=0){ echo 'Finished';}?></td>
                    <td><?php                      $time_allow= $this->backend_model->get_courier_allowed_time($_REQUEST['order_id']);                    $db_split=split(' ',$time_allow[0]->dispatch_date);                                 $date=split('-',$db_split[0]);                                   $time= $date[2]+1;                             echo   $date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];                                                         $alloweted_date=$date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];                             $system_date=date('Y-m-d h:t');                            $time_allow= strtotime($alloweted_date);                            $time_system= strtotime($system_date);                            $to='courier@wallsnart.com';                             if($time_allow<=$time_system && $status_framer==0)                             {                               $this->backend_model->sendmail('Courier',$to);                               }                                                 ?></td>
                  </tr>
                  <? $i++; }?>
                </table>
                <table style="width:100%">
                  <tr>
                    <td class="bold">Order Id </td>
                    <td class="bold"> Company Name</td>
                    <td class="bold">Tracking Id</td>
                    <td class="bold">No Of Courier</td>
                    <td class="bold">order_detail</td>
                    <td class="bold">Dispatch Date</td>
                    <td class="bold"> Deliver Date </td>
                    <td class="bold"> Completion Date </td>
                    <td class="bold"> Check Status </td>
                    <td class="bold"> Checker Name </td>
                    <td class="bold"> Person Incharge</td>
                  </tr>
                  <?php                        $printer=$this->backend_model->get_courier_jobsheet_details($_REQUEST['order_id']);                          foreach($printer as $result):                               ?>
                  <tr>
                    <td><?=$result->order_id;?>
                    </td>
                    <td><?=$result->courier_company_name;?></td>
                    <td><?=$result->tracking_id;?></td>
                    <td><?=$result->total_courier;?></td>
                    <td><?=$result->order_detail;?></td>
                    <td><?=$result->dispatch_date;?></td>
                    <td><?=$result->delivery_date;?></td>
                    <td><?=$result->completion_date;?>
                    </td>
                    <td><?php if($result->quality_check=='1'){echo 'Yes';}elseif($result->quality_check=='0'){ echo 'No';} ?></td>
                    <td><?=$result->quality_checker_name;?>
                    </td>
                    <td><?=$result->person_incharge   ;?></td>
                  </tr>
                  <?php endforeach;?>
                </table>
              </div></td>
          </tr>
          <div>
            <tr>
              <td colspan="2" style="padding:0;"><div class="quotation-div"  id="quotation2Div" style="margin-left:25px">
                  <!--DETAILS TABLE-->
                  <span id="status" style="color: green; font-size:14px; "></span>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="darktr">
                      <td ></td>
                      <td>OnLine
                        <input <?php if($printer[0]->print_type==1){ echo 'checked';}elseif($printer[0]->print_type==''){ echo 'checked';}?> type="radio" data-id="1" name="type" id="online" class="type" value="1">
                        &nbsp;Off Line
                        <input type="radio" data-id="2"  id="offline" name="type" <?php if($printer[0]->print_type==2){ echo 'checked';}?> class="type" value="2">
                      </td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr class="darktr">
                      <td width="120" class="bold">Courier Company</td>
                      <td width="250"><input type="text"  value="<?=$printer[0]->courier_company_name?>" name="company" id="company2" class="txtClass offline">
                        <select name="company" class="online" id="company"  onchange="get_printer_name(this.value);">
                          <option value="">---Select Courier---</option>
                          <?php foreach($courier as $print){?>
                          <option value="<?php echo $print->company_name;?>"><?php echo $print->company_name;?></option>
                          <?}?>
                        </select></td>
                      <td width="120">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr class="darktr">
                      <td class="bold">Total Courier</td>
                      <td ><input type="text" value="<?=$printer[0]->total_courier?>" class="txtClass"  name="total_courier" id="total_courier"></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr >
                      <td class="bold">Tracking Id</td>
                      <td ><input value="<?=$printer[0]->tracking_id?>" type="text" class="txtClass"  name="tracking_id" id="tracking_id"></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr class="darktr">
                      <td class="bold">Order Status</td>
                      <td ><select name="order_detail" id="order_detail" class="inputs">
                          <option <?php if($printer[0]->order_detail==1){ echo 'selected';} ?> value="1">Ready To Ship</option>
                          <option <?php if($printer[0]->order_detail==2){ echo 'selected';} ?> value="2">Shipped</option>
                        </select></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
					
					 <tr >

                        <td class="bold">Delivery Mode</td>

                        <td ><select name="delivery_mode" id="delivery_mode" class="inputs">
                                <option <?php if($printer[0]->delivery_mode==1){ echo 'selected';} ?> value="1">Own</option>
                                <option <?php if($printer[0]->delivery_mode==2){ echo 'selected';} ?> value="2">Channel Partner</option></select></td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                    </tr>
                    <!--                    <tr class="darktr">                        <td class="bold">Delivery Place </td>                        <td ><textarea name="delivery_place" id="delivery_place" cols="22" rows="4"></textarea></td>                        <td>&nbsp;</td>                        <td>&nbsp;</td>                    </tr>-->
                    <tr class="darktr">
                      <td class="bold">Date</td>
                      <td><?=date('Y-m-d h:t')?></td>
                      <td class="bold">Completion Date</td>
                      <td><input  <?php if($printer[0]->completion_date==''){?> type="date"<?php }?> value="<?=$printer[0]->completion_date?>"  name="completion_date" <?php if($printer[0]->completion_date==''){?>id="completion_date"<?php }?>></td>
                    </tr>
                    <tr class="darktr">
                      <td class="bold">QC</td>
                      <td><select name="quality_check" id="quality_check" class="inputs">
                          <option value="1" <?php if($printer[0]->quality_check==1){ echo 'selected';}?> >Yes</option>
                          <option value="0" <?php if($printer[0]->quality_check==0){ echo 'selected';}?>>No</option>
                        </select></td>
                      <td class="bold">QC done by</td>
                      <td><input id="quality_checker_name" value="<?=$printer[0]->quality_checker_name?>" type="text" name="quality_checker_name" /></td>
                    </tr>
                    <tr>
                      <td class="bold">Person Incharge</td>
                      <td><input type="text" id="person_incharge" value="<?=$printer[0]->person_incharge?>" name="person_incharge" >
                      </td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                </div></td>
            </tr>
          </div>
        </table>
        <div style="padding:30px; ">
          <?php if($printer[0]->quality_check==''){?>
          <input type="button" onClick="return save_courier_details();" name="addcpn" id="addcpn" value="Save" class="bt-add" />
          <?php }elseif($printer[0]->quality_check<>''){?>
          <input type="hidden" name="edit_id" id="edit_id" value="<?=$printer[0]->order_courier_status_id?>">
          <input type="button" onClick="return update_courier_details();" name="addcpn" id="addcpn" value="Update" class="bt-add" />
          <?php }?>
          <input type="button" name="addcpn2" id="addcpn2" value="Print" onClick="PrintElem('.viewcplist-inner')"   class="bt-add"/>
        </div>
      </form>
      <form name="download_pdf" action="<?=base_url()?>index.php/backend/dowload_courier_xsl" method="post">
        <input type="hidden" name="order_id" id="order_id" value="<?php echo $_REQUEST['order_id']?>">
        <input type="submit"  name="addcpn"  value="Download" class="bt-add" />
      </form>
    </div>
    <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
  </div>
</div>
<!--MIDDLE PAGE WRAPPER ENDS-->
</div>
</body>
</html><style>    
.txtClass{        width: 90px;        height: 30px;    }     
</style>
<script type="text/javascript" src="<?=base_url()?>assets/js2/jquery-1.6.1.min.js"></script>
<script>$(document).ready(function(){    <?php if($printer[0]->print_type==1){?>          $('.Online').show();      $('.offline').hide();      $('#printer').hide();    <?php }if($printer[0]->print_type==2){ ?>         $('.offline').show();        $('.Online').hide();    <?php }else{?>   $('.Online').show();      $('.offline').hide();      $('#printer').hide();    <?php }?>       });$(document).on('click','.type',function(){var val=$(this).data('id');   if(val=='1'){     $('.online').show();      $('.offline').hide();      $('#printer').hide();   }else if(val=='2'){     $('.offline').show();      $('.online').hide();   }});function PrintElem(elem)    {        Popup($(elem).html());    }    function Popup(data)    {        var mywindow = window.open('', 'viewcplist-inner', 'height=400,width=600');        mywindow.document.write('<html><head><title>Order Print</title>');               mywindow.document.write('</head><body >');        mywindow.document.write(data);        mywindow.document.write('</body></html>');        mywindow.document.close();         mywindow.focus();        mywindow.print();        mywindow.close();        return true;    }</script>
