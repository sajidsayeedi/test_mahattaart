<?php $printer=$this->backend_model->get_packager_jobsheet_details($_REQUEST['order_id']);    ?>
<link href="<?=base_url()?>assets/css2/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css2/wallsnart1.0.css" rel="stylesheet" type="text/css" />


<script type="text/javascript">        function get_printer_name(id)        {            if(id)            {                var datastring='id=' +id;                $.ajax({                    url:"<?=base_url()?>index.php/orders/get_printer",                    type: "POST",                    data:datastring,                    success: function(data)                    {                        $('#printer_name').html(data);                    }                });            }        }   $(document).ready(function(){   $('#default_printer').show();   $('#printer').hide();   }); function change_services(values) {     if(values=='material')     {      $('#default_printer').show();      $('#printer').hide();     }else if(values=='services')     {      $('#default_printer').hide();      $('#printer').show();     } }function save_packager_details()        {  var order_id=$('#order_id').val();   var service=$('#service').val();  var materials=$('#materials').val();   var total_print=$('#total_print').val();   var packager1=document.getElementsByName('packager1');   var packager2=document.getElementsByName('packager2');   var packager3=document.getElementsByName('packager3');   if(packager1!='')   {       var packager=packager1;   }else if(packager2!='')   {        packager=packager2;   }else if(packager3!='')   {        packager=packager3;   }   var size_box_packats=document.getElementsByName('size_box_packats[]');   var height=document.getElementsByName('height[]');   var width=document.getElementsByName('width[]');   var depth=document.getElementsByName('depth[]');   var final_wight=document.getElementsByName('final_wight[]');     var completion_date=$('#completion_date').val();      var quality_check=$('#quality_check').val();      var quality_checker_name=$('#quality_checker_name').val();      var person_incharge=$('#person_incharge').val();alert(size_box_packats);return false;   if(service!='')   {       var printer_services=service;   }else if(materials!='')   {        printer_services=materials;   }         if(document.getElementById('materials').checked==true)         {             var printer=$('#default_printer').val();         }else if(document.getElementById('service').checked==true)         {               printer=$('#printer').val();         }var datastring='order_id='+order_id+'&printer_services='+printer_services+'&printer='+printer+'&total_print='+total_print+'&completion_date='+completion_date+'&quality_check='+quality_check+'&quality_checker_name='+quality_checker_name+'&person_incharge='+person_incharge+'&size_box_packats='+size_box_packats+'&height='+height+'&width='+width+'&depth='+depth+'&final_wight='+final_wight+'&packager='+packager;                $.ajax({                    url:"<?=base_url()?>index.php/backend/save_packager_order_details",                    type: "POST",                    data:datastring,                    success: function(response)                    {                                           $('#status').html(response);                    setTimeout(function(){ reload();}, 3000);                    }                });        }  function reload() {    location.reload();}    </script>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr-quotation">Packager Job Sheet</div>
	<br>
    <a href="<?=base_url()?>index.php/backend/online_order"><button  class="bt-add">Close</button></a> 
    <div id="quotationListDiv" class="manage-order" >
	 
	  
    <?php if($printer[0]->quality_check==''){        $action='save_packager_order_details';     }elseif($printer[0]->quality_check<>''){        $action='update_packager_order_details';      }     ?>
    <form name="update_printer_status" id="update_printer_status" method="post" action="<?=base_url()?>index.php/backend/<?=$action?>">
      <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
        <tr  class="darktr">
          <td width="18%" class="bold">Order ID:</td>
          <?php foreach($order_details as $ord){?>
          <? } ?>
          <td><?php echo $ord->order_id;?>
            <input type="hidden" name="order_id" id="order_id" value="<?=$ord->order_id?>"></td>
        </tr>
        <tr style="border-bottom:none">
          <td colspan="2" ><div class="viewcplist-inner">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="hdrs">
                  <td>Sr NO.</td>
                  <td width="150">Images Id</td>
                  <td>Name</td>
                  <td>Region</td>
                  <td>Status</td>
                  <td>Time Alloted</td>
                </tr>
                <?php $i=1; foreach($order_details as $ord){                 $status_packager=$this->backend_model->status_packager($ord->order_id);                 $data_split= split('/',$ord->image_id);                    if($data_split[0]=='images')                    {                   $fileName=$data_split[2];                        $image_url=base_url().$ord->image_id;                    }else {                         $fileName=$ord->image_id;                        $image_url="http://static.mahattaart.com/398/".$ord->image_id."";                    }?>
                <tr>
                  <td><?=$i.'.';?></td>
                  <td><b><?php echo $fileName;?></b><br>
                    <span class="thumbtd"><img src="<?php echo $image_url;?>" width="107" height="107" alt="art"/><br />
                    </span></td>
                  <td><?php echo ucwords($ord->first_name).' '.ucwords($ord->last_name);?></td>
                  <td><?php echo $ord->region;?></td>
                  <td><?php if($status_packager==0){ echo 'Pending';}elseif($status_packager!=0){ echo 'Finished';}?></td>
                  <td><?php                                        
                  $time_allow= $this->backend_model->get_framer_allowed_time($_REQUEST['order_id']);                                                         
                    $time_allow[0]->completion_date;
                  $db_split=split(' ',$time_allow[0]->completion_date);                                
                  $date=split('-',$db_split[0]);                                 
                  $time= $date[2]+1;                           
                    echo     $date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];                            /* $alloweted_date=$date[0].'-'.$date[1].'-'.$time.' '.$db_split[1];                             $system_date=date('Y-m-d h:t');                            $time_allow= strtotime($alloweted_date);                            $time_system= strtotime($system_date);                            $to='mohansinghmca0912@gmail.com';                             if($time_allow<=$time_system && $status_packager==0)                             {                              $send=  $this->backend_model->sendmail('Packager',$to);                             if($send==1)                             {                                 echo 'Send mail';                             }elseif($send==0)                             {                                 echo 'error send mail';                             }                             } */                   ?></td>
                </tr>
                <?php $i++; }?>
              </table>
              <table style="width:100%">
                <tr>
                  <td class="bold">Order Id </td>
                  <td class="bold"> Company Name</td>
                  <td class="bold">Packager Name</td>
                  <td class="bold">No Of Package</td>
                  <td class="bold"> Package Size</td>
                  <td class="bold">Final Height</td>
                  <td class="bold">Final Width</td>
                  <td class="bold"> Final Depth</td>
                  <td class="bold"> Final Weight </td>
                 
                  <td class="bold"> Completion Date </td>
                  <td class="bold"> Quality Check Status </td>
                  <td class="bold"> Quality Checker Name </td>
                  <td class="bold"> Person Incharge</td>
                </tr>
                <?php                                      foreach($printer as $result):                               ?>
                <tr>
                  <td><?=$result->order_id;?>
                  </td>
                  <td><?=$result->packager_company_name;?></td>
                  <td><?=$result->packager_name;?></td>
                  <td><?=$result->total_packets;?></td>
                  <td><? if($result->packets_size==1){ echo 'Small';}elseif($result->packets_size==2){ echo 'Medium';}if($result->packets_size==3){ echo 'Large';}if($result->packets_size==4){ echo 'Extra Large';}?></td>
                  <td><?=$result->final_packets_height;?></td>
                  <td><?=$result->final_packets_width;?></td>
                  <td><?=$result->final_packets_depth;?></td>
                  <td><?=$result->final_packets_weight;?></td>
                 
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
             
                <?php 
                     $status_framer=$this->backend_model->status_framer($_REQUEST['order_id']);
                     if($status_framer>0){
                     ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr >
                    <td class="bold">Invoice Date</td>
                    <td><?=$invoice_date[0]->created_date;?>
                    </td>
                    <td></td>
                    <td width="486"></td>
                  </tr>
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
                  <tr class="online">
                    <td class="bold">Packager</td>
                    <td>Row Material
                      <input  onclick="return change_services('material');"  type="radio" name="printer" id="materials" value="1">
                      &nbsp;Services
                      <input type="radio" onClick="return change_services('services');"  id="service" name="printer" value="2">
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr class="darktr">
                    <td width="338" class="bold"><span class="offline bold">Packager</span></td>
                    <td width="273"><input <?php if($printer[0]->packager_name<>''){ echo 'readonly';}?> value="<?=$printer[0]->packager_name?>"  type="text" name="packager1" class="txtClass offline">
                      <select name="packager2" class="online" id="default_printer">
                        <option value="mahatta multimeda pvt ltd">Mahatta Multimeda Pvt Ptd</option>
                      </select>
                      <select class="online" name="packager3" id="packager" onChange="get_printer_name(this.value);">
                        <option value="">---Select Packager---</option>
                        <?php foreach($packager as $print){?>
                        <option value="<?php echo $print->company_name;?>"><?php echo $print->company_name;?></option>
                        <?}?>
                      </select></td>
                    <td width="220">&nbsp;</td>
                    <td><input type="hidden" id="only_buuble_dyn" value="<?=$printer[0]->metarial_used?>"></td>
                  </tr>
                  <tr>
                    <td class="bold">Total Packets</td>
                    <td ><input  readonly="" type="text" value="<?php echo count($order_details);?>" class="txtClass"  name="total_print" id="total_print"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
				  <tr>
                    <td class="bold">Metarial Used</td>
					
                    <td ><label>Current&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="current" onchange="current_checkbox()" name="current[]" value="current"></label></td>
                   <td ><label>Only Bubble&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onchange="bubble_checkbox()" id="only_bubble" name="bubble[]" value="bubble"></label></td>
				   <td ><label>Others&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onchange="others_checkbox()" id="others" name="others[]" value="others"></label></td>
                  </tr>
				  <script>
				  $(document).ready(function(){
				  var other_textbox_id=$('#other_textbox_id').val();
				  
				  var only_buuble_dyn=$('#only_buuble_dyn').val();
				if(only_buuble_dyn=='bubble'){
				$('#only_bubble').trigger('click');
				$('#only_bubble').prop('disabled',true);
				}
				else if(only_buuble_dyn=='current'){
				$('#current').trigger('click');
				$('#current').prop('disabled',true);
				}
				else if(only_buuble_dyn=='others'){
				 $('#others').trigger('click');
				 $('#others').prop('disabled',true);
				 }
				  
				  });
				   function bubble_checkbox(){
				  if($('#only_bubble').is(":checked"))   
                   $(".size_of_box").hide();
                  else
                  $(".size_of_box").show();
                    }
					 function others_checkbox(){
					 if($('#others').is(":checked")){
					// alert('othhers');
					 $('.other_textbox').show();
					 }
					 else
                      $('.other_textbox').hide();				 
					 }
				  
				  </script>     	 	
				  
                  <?php $i=1;   $index=0;  foreach($order_details as $ord){    if($i%2==0){  $classColor='#FF9966';}else{    $classColor='#66CC00';}//echo $printer[0]->packets_size;    ?>
                  <input type="hidden" name="edit_id[]" id="edit_id" value="<?=$printer[$index]->order_packager_status_id?>">
                  <tr  style="background-color:<?=$classColor;?>">
                    <td  class="bold " style="background-color:<?=$classColor;?>"><?=$i.'. '?>
                      <span class="size_of_box">Size of box use for packaging</span> </td>
                    <td><select class="txtClass size_of_box" name="size_box_packats[]" >
                        <option value="">---Size---</option>
                        <option value="1" <?php if($printer[$index]->packets_size==1){ echo 'selected';}?>>Small</option>
                        <option value="2" <?php if($printer[$index]->packets_size==2){ echo 'selected';}?>>Medium</option>
                        <option value="3" <?php if($printer[$index]->packets_size==3){ echo 'selected';}?>>Large</option>
                        <option value="4" <?php if($printer[$index]->packets_size==4){ echo 'selected';}?>>Extra Large</option>
                      </select></td>
					  <?php $data_split= split('/',$ord->image_id);

                    if($data_split[0]=='images')
                    {
                   $fileName=$data_split[2];
                        $image_url=base_url().$ord->image_id;
                    }else {
                         $fileName=$ord->image_id;
                         $image_url="http://static.mahattaart.com/398/".$ord->image_id."";
                    }?>
                    <td></td>
                    <td><span class="thumbtd"><img src="<?php echo $image_url;?>" width="80" height="107" alt="art"/>
                      </span>SKU Id=&nbsp;<?=$ord->sku_id;?></td>
                  </tr>
                  <tr >
                    <td class="bold">Final product size after packaging (Inch)</td>
                    <td><input <?php if($printer[$index]->final_packets_height<>''){ echo 'readonly';}?> type="text" name="height[]" class="txtClass" value="<?=$printer[$index]->final_packets_height?>" placeholder="Height">
                    </td>
                    <td><input  placeholder="Width" type="text" <?php if($printer[$index]->final_packets_width<>''){ echo 'readonly';}?> name="width[]" value="<?=$printer[$index]->final_packets_width?>" class="txtClass">
                    </td>
                    <td><input  type="text"  placeholder="Depth" name="depth[]"  value="<?=$printer[$index]->final_packets_depth?>" class="txtClass" <?php if($printer[$index]->final_packets_depth<>''){ echo 'readonly';}?>>
                    </td>
                  </tr>
                  <tr  class="darktr">
                    <td class="bold">Final product weight after packaging (in Kg)</td>
                    <td><input  type="text"  name="final_wight[]" value="<?=$printer[$index]->final_packets_weight?>" <?php if($printer[$index]->final_packets_weight<>''){ echo 'readonly';}?> class="txtClass"></td>
					
                    <td style="display:none;" class="other_textbox">Other</td>
                    <td style="display:none;" class="other_textbox"><input type="text" id="other_textbox_id" name="others_textbox[]" readonly value="<?=$printer[$index]->others?>"></td>
				
                  </tr>
                  <?php $index++; $i++;}?>
                  <tr class="darktr">
                    <td class="bold">Date</td>
                    <td><?php
					date_default_timezone_set('Asia/Kolkata');
		      echo  $date=date('Y-m-d H:i:s');
					?></td>
                    <td class="bold">Completion Date</td>
                    <td><div id="datetimepicker" class="input-append date">
                        <input style="height:20px;" value="<?=$printer[0]->completion_date?>" <?php if($printer[0]->completion_date<>''){ echo 'readonly';}?> type="text" name="completion_date"></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
    </div></td>
                  </tr>
                  <tr class="darktr">
                    <td class="bold">QC</td>
                    <td><select name="quality_check" id="quality_check" class="inputs">
                        <option value="1" <?php if($printer[0]->quality_check==1){ echo 'selected';}?> >Yes</option>
                        <option value="0" <?php if($printer[0]->quality_check==0){ echo 'selected';}?>>No</option>
                      </select></td>
                    <td class="bold">QC done by</td>
                    <td><input id="quality_checker_name" <?php if($printer[0]->quality_checker_name<>''){ echo 'readonly';}?> value="<?=$printer[0]->quality_checker_name?>" type="text" name="quality_checker_name" /></td>
                  </tr>
                  <tr>
                    <td class="bold">Person Incharge</td>
                    <td><input type="text" <?php if($printer[0]->person_incharge<>''){ echo 'readonly';}?> id="person_incharge" value="<?=$printer[0]->person_incharge?>" name="person_incharge" >
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                        <?php }elseif($status_framer==0){
						    echo '<span style="color:red; font-size:14px;">Pending with Framer Not allow</span>';
						?>
						
						<?php }?>
                <p></p>
                <p>&nbsp;</p>
              </div></td>
          </tr>
        </div>
      </table>
      <?php if($printer[0]->quality_check==''){?>
      <input type="submit" onclick="return save_print_details();" name="addcpn" id="addcpn" value="Save" class="bt-add" />
      <?php }if($this->session->userdata('userid')=='admin@mahattaart.com'){?>
      <input type="submit"  name="addcpn" id="addcpn" value="Update" class="bt-add" />
      <?php }?>
      <input type="button" name="addcpn2" id="addcpn2" value="Print" onclick="PrintElem('.viewcplist-inner')"   class="bt-add"/>
      </div>
    </form>
    <form name="download_pdf" action="<?=base_url()?>index.php/backend/dowload_packager_xsl" method="post">
      <input type="hidden" name="order_id" id="order_id" value="<?php echo $_REQUEST['order_id']?>">
      <input type="submit"  name="addcpn"  value="Download" class="bt-add" />
    </form>
  </div>
</div>
<style>    
.txtClass{        width: 90px;        height: 30px;    }
</style>
<script type="text/javascript" src="<?=base_url()?>assets/js2/jquery-1.6.1.min.js"></script>
<script>$(document).ready(function(){   <?php if($printer[0]->print_type==1){?>            $('.online').show();      $('.offline').hide();      $('#printer').hide();    <?php }if($printer[0]->print_type==2){ ?>       $('.offline').show();      $('.online').hide();    <?php }else{?>   $('.Online').show();      $('.offline').hide();      $('#printer').hide();    <?php }?>});$(document).on('click','.type',function(){var val=$(this).data('id');   if(val=='1'){     $('.online').show();      $('.offline').hide();      $('#printer').hide();   }else if(val=='2'){     $('.offline').show();      $('.online').hide();   }});  function PrintElem(elem)    {        Popup($(elem).html());    }    function Popup(data)    {        var mywindow = window.open('', 'viewcplist-inner', 'height=400,width=600');        mywindow.document.write('<html><head><title>Order Print</title>');               mywindow.document.write('</head><body >');        mywindow.document.write(data);        mywindow.document.write('</body></html>');        mywindow.document.close();         mywindow.focus();        mywindow.print();        mywindow.close();        return true;    }</script>


<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="<?=base_url()?>assets/css/bootstrap-datetimepicker.min.css">
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>  
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    
    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR'
      });
    </script>
