<?php $surface_framer=$this->backend_model->get_framer_surface('FRM');$framer_width=$this->backend_model->get_framer_width('FRM');$surface_mount=$this->backend_model->get_framer_surface('MNT');$surface_glass=$this->backend_model->get_framer_surface('GLS');?>
<html>
<head>
    
     
<title>Create Quotation</title>
<link href="<?php echo base_url()?>assets/css/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?php echo base_url()?>assets/js/common.js"></script>
<style>        
.txtbox_f {    width: 61px;    height: 30px;}        
</style>
<script type="text/javascript">$(document).ready(function(){
    $('#packaging_charge').val(30);	  
    var counter = 1;		    
    $("#addButton").click(function () { 
        
        if(document.getElementById('old_image').checked==true)
        {
          var status='1';
        }else if(document.getElementById('new_image').checked==true){
            status='2';
        }
         change_div(status);
        
        if(counter>10){    alert("Only 10 textboxes allow");            return false;	}   			var newTextBoxDiv = $(document.createElement('div'))	     .attr("id", 'TextBoxDiv' + counter);                	
      newTextBoxDiv.after().html('<tr><td style="width:119px;"><div class="old_class"><input type="text" class="txtbox_f" name="imgid[]" data-id="'+counter+'"  id="imgid'+counter+'" /></div><div class="new_class" id="new_image" class="new"><input type="file"  name="file[]"  data-id="'+counter+'" class="file"  id="file'+counter+'" style="width:100px;" /></div></td><td ><div class="image_preview" id="image_preview'+counter+'"><img id="previewing'+counter+'" src="" width="50" height="50"/></div><span id="image_visual'+counter+'" class="image_visual" style="height:80px; width: 80px; border: solid 1px; color:#CCCCCC "></span></td><td><input type="text" class="txtbox" name="license_cost[]" id="license_cost'+counter+'"  onkeyup="return calculator_show();" /></td><td><select name="surface[]" id="surface"> <?php $surface=$this->backend_model->get_surface(); foreach($surface as $surf) {  ?><option value="<?php echo $surf['surface']; ?>"><?php echo $surf['surface'] ?></option><?php } ?> </select></td> <td><input type="text" name="print_height[]" id="print_height'+counter+'" onkeyup="return calculator_show();" onBlur="return calculator_show();" class="txtbox"></td> <td><input type="text" name="print_width[]" id="print_width'+counter+'" class="txtbox" onBlur="return calculator_show();" onkeyup="return calculator_show();"></td> <td><input type="tex" readonly="" name="print_cost" id="print_cost'+counter+'" class="txtbox" ></td><td>  <select name="mount_code[]" id="mount_code'+counter+'"><?php foreach ($surface_mount as $mount) {  ?><option value="<?php echo $mount['surface']; ?>"><?php echo $mount['surface'] ?></option><?php } ?> </select> </td><td></td><td><input type="text" name="mount_width[]" onkeyup="return calculator_show();" onBlur="return calculator_show();" class="txtbox" id="mount_width'+counter+'"></td><td><input type="tex" readonly="" name="mount_cost" id="mount_cost'+counter+'" class="txtbox" ></td><td><select name="frame_code[]" id="framer_code'+counter+'"><?php foreach ($surface_framer as $framer) {?><option value="<?php echo $framer['surface']; ?>"><?php echo $framer['surface'] ?></option><?php } ?> </select></td><td></td><td><select name="frame_width[]" id="frame_width'+counter+'" onkeyup="return calculator_show();" onchange="return calculator_show();"><?php foreach ($framer_width as $width) {?><option value="<?php echo $width['width']; ?>"><?php echo $width['width'] ?></option><?php } ?> </select></td><td><input type="tex" readonly="" name="frame_cost" id="frame_cost'+counter+'" class="txtbox" ></td><td><select name="cover[]" id="cover'+counter+'"><?php foreach ($surface_glass as $GLASS) {  ?><option value="<?php echo $GLASS['surface']; ?>"><?php echo $GLASS['surface'] ?></option><?php } ?> </select></td> <td><input type="tex" readonly="" name="glass_cost" id="glass_cost'+counter+'" class="txtbox" ></td><td><input type="text" readonly="" style="background-color:#F7F7F7; text-align: center; font: bold; border: none;" name="Q_total[]" id="total'+counter+'"></td></tr>');          
        newTextBoxDiv.appendTo("#TextBoxesGroup");					counter++;           });              $("#removeButton").click(function () {         	if(counter==1){          	                        alert("No more textbox to remove");                              return false;       }                           	counter--;		         var packaging_charge=30*counter;$('#packaging_charge').val(packaging_charge);                $("#TextBoxDiv" + counter).remove();		     });		     $("#getButtonValue").click(function () {			var msg = '';	for(i=1; i<counter; i++){   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();	}    	  alert(msg);     });  });  var clicks=2;  
    function increase_values()  {    
        var packaging_charge=30*clicks;$('#packaging_charge').val(packaging_charge);	 
        if(clicks>2){    $('#courier_charge').val(0);}else{  $('#courier_charge').val(50);  }  
        clicks++;  }    
    function calculate_discount() 
    {   
        var discount=$('#discount').val();    
        var finalTotal_txt=$('#Total_txt_amount').val();     
        var dis_val=parseFloat(finalTotal_txt*discount/100);   
        var after_discount=parseFloat(finalTotal_txt-dis_val);  
        $('#after_discount').val(after_discount);  }     
    function GetQuotationImg(imgid)    {           
        $.ajax({            type: "GET",        
            url: "<?=base_url()?>application/controllers/get_quotationimg.php?image_name="+imgid,              
            dataType: "html",                 
            success: function(response){           
                $("#responsecontainer").html(response);        
            }        });    }</script>
<style>                    
.txtbox{ width: 61px; height: 30px;}                    
</style>
<!-- FOR SHOW HIDE TABLES-->
<script>        function filter_customers(id)        {                  if(id)            {                $('#selected_customer_id').val(id);                var datastring='id='+id;                $.ajax({                    url:"<?=base_url()?>index.php/backend/get_customers",                    type: "POST",                    data:datastring,                    success: function(data)                    {                                               var value=data.split("^");                        $('#firstname').val(value[0]);                        $('#lastname').val(value[1]);                        $('#email').val(value[2]);                        $('#occupation').val(value[3]);                        $('#gender').val(value[4]);                        $('#martialstatus').val(value[5]);                        $('#address').val(value[6]);                        $('#companyname').val(value[7]);                        $('#country').val(value[8]);                        $('#state').val(value[9]);                        $('#pincode').val(value[10]);                        $('#contactnumber').val(value[11]);                        $('#city').val(value[12]);                         $('#region').val(value[13]);                                      }                });            }                  }        </script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/anylinkmenu.css" />
<script type="text/javascript" src="<?=base_url()?>assets/js/menucontents.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/anylinkmenu.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
</head>
<body>
<!--MIDDLE PAGE WRAPPER STARTS-->
<div id="middle-wrapper">
  <div id="middle-container" style=" width:100%;">
    <div class="main-hdr-quotation"> Create Quotations</div>
    <style>
.manage-order .creat-ordertable tr td{ padding:8px 1px 8px 1px !important;} .hdrs td:nth-child(2) { width:100px;}
</style>
    <div id="quotationListDiv" class="manage-order" >
      <form  name="create_quotation" action="save_create_quotation" method="post"  enctype="multipart/form-data">
        <b  style=" font-size: 14px; color: green;">
        <?php if($msg<>'') {?>
        <script>              setTimeout(function(){outtime()},3000);             
            function outtime(){                  window.location.href="view_quotations/";              }           </script>
        <?php echo $msg;}?></b><br>
        <br>
        <table width="100%" cellpadding="0" cellspacing="0" class="creat-ordertable">
          <tr  class="darktr">
            <td width="18%" class="bold">Quotation ID:</td>
            <td><?php     $uniqueNo =mt_rand();    $uniqueNo=sprintf('%03d',$uniqueNo);    ECHO $QuotationN0='WNS'.$uniqueNo;        ?>
              <input type="hidden" id="selected_customer_id"  name="selected_customer_id">
              <input type="hidden" name="quotation_id" id="quotation_id" value="<?=$QuotationN0;?>">
            </td>
          </tr>
          <tr  class="darktr">
            <td class="bold">Customer ID </td>
            <td><select name="customer_id" id="customer_id"  onchange="filter_customers(this.value)"  class="selectpicker" data-hide-disabled="true" data-live-search="true">
                <optgroup >
                <option value="">--Select Cumstomer--</option>
                </optgroup>
                <?php $customers=$this->backend_model->get_customers();            foreach($customers as $cust)            {                 if($cust->first_name!='')                {                ?>
                <option value="<?php echo $cust->customer_id; ?>"><?php echo $cust->first_name." ".$cust->last_name; ?></option>
                <?php }                             }?>
              </select>
            </td>
          </tr>
          <div>
            <tr>
              <td colspan="2" style="padding:0;"><div class="quotation-div"  id="quotation2Div" style="margin-left:0px" >
                  <!--DETAILS TABLE-->
                  <div style="background:#388fc4; font-size:16px; color:#fff; padding:8px; "> Customer Details</div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="darktr">
                      <td width="150" class="bold">First Name:</td>
                      <td><input type="text" id ="firstname" name="firstname" readonly style="background-color: #eee; border: none;"></td>
                      <td class="bold">Last Name:</td>
                      <td><input type="text" id ="lastname" name="lastname" readonly style="background-color: #eee; border: none;">
                        </span></td>
                    </tr>
                    <tr>
                      <td class="bold">Email Id:</td>
                      <td><input type="text" id ="email" name="email" readonly style="background-color:#F7F7F7; border: none;"></td>
                      <td class="bold">Occupation</td>
                      <td><input type="text" id ="occupation" name="occupation" readonly style="background-color: #F7F7F7; border: none;"></td>
                    </tr>
                    <tr class="darktr">
                      <td class="bold">Gender</td>
                      <td><input type="text" id ="gender" name="gender" readonly style="background-color: #eee; border: none;"></td>
                      <td class="bold">Marital Status</td>
                      <td><input type="text" id ="martialstatus" name="martialstatus" readonly style="background-color: #eee; border: none;"></td>
                    </tr>
                    <tr>
                      <td class="bold">Address:</td>
                      <td><input type="text" id ="address" name="address" readonly style="background-color: #F7F7F7; border: none;"></td>
                      <td class="bold">Company Name</td>
                      <td><input type="text" id ="companyname" name="companyname" readonly style="background-color: #F7F7F7; border: none;"></td>
                    </tr>
                    <tr class="darktr">
                      <td class="bold">Country</td>
                      <td><input type="text" id ="country" name="country" readonly style="background-color: #eee; border: none;"></td>
                      <td class="bold">State</td>
                      <td><input type="text" id ="state" name="state" readonly style="background-color: #eee; border: none;"></td>
                    </tr>
                    <tr>
                      <td class="bold">City</td>
                      <td><input type="text" id ="city" name="city" readonly style="background-color: #F7F7F7; border: none;"></td>
                      <td  class="bold">Region</td>
                      <td><input type="text" id ="region" name="region" readonly style="background-color: #F7F7F7; border: none;"></td>
                    </tr>
                    <tr class="darktr">
                      <td class="bold">Pin Code</td>
                      <td><input type="text" id ="pincode" name="pincode" readonly style="background-color: #eee; border: none;"></td>
                      <td class="bold">Contact Number</td>
                      <td><input type="text"  id ="contactnumber" name="contactnumber" readonly style="background-color: #eee; border: none;"></td>
                    </tr>
                  </table>
                  <div style="background:#388fc4; font-size:16px; color:#fff; padding:8px; margin-top:25px "> Order Summary</div>
                  <!--    <table width="100%" border="0" cellspacing="0" cellpadding="0">      <tr class="darktr">    <td width="150" class="bold">Quotation Date:</td>    <td>xxxxxxxxxxxx</td>    <td class="bold">Payment Terms:</td>    <td>xxxxxxxxxxxx</td>  </tr>  <tr>    <td class="bold">Quotation Id:</td>    <td>xxxxxxxxxxxx</td>    <td class="bold">Contact Person:</td>    <td>xxxxxxxxxxxx</td>  </tr>  <tr class="darktr">    <td class="bold">Total Images:</td>    <td>xxxxxxxxxxxx</td>    <td class="bold">Payment Mode:</td>    <td>xxxxxxxxxxxx</td>  </tr>  <tr>    <td class="bold">Total Prints:</td>    <td>xxxxxxxxxxxx</td>    <td class="bold">Tax Type</td>    <td>xxxxxxxxxxxx</td>  </tr>    <tr class="darktr">    <td class="bold">Total Frames:</td>    <td>xxxxxxxxxxxx</td>    <td class="bold">PAN Card Number</td>    <td>xxxxxxxxxxxx</td>  </tr>  <tr>    <td class="bold">Total Amount</td>    <td>xxxxxxxxxxxx</td>    <td  class="bold">&nbsp;</td>    <td>&nbsp;</td>  </tr>    </table>-->
                </div></td>
            </tr>
           
            <tr style="border-bottom:none" >
              <td colspan="2" >
                 
              <div class="customer-list" id="btn_foucs"><a href="#!" class="addnewcp" id='addButton' onClick="return increase_values();">Add New Item</a> <a href="#!" class="subtractwcp"  id='removeButton'>Remove Item</a></div>
              <br>
              <div>Live Image <input type="radio" checked="" onclick="return change_div('1');" name="radio" id="old_image" >&nbsp;Upload Image <input type="radio"  onclick="return change_div('2');" name="radio" id="new_image" ></div><br>
              <div class="viewcplist-inner">
                <div id='TextBoxesGroup'>
                  <div id="TextBoxDiv1">
                    <table   border="0" cellspacing="0" cellpadding="0" >
                      <tr class="hdrs">
                          <td>&nbsp;Image Id&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        <td >Visual</td>
                        <td>License Cost(%)</td>
                        <td colspan="4">Print</td>
                        <td colspan="3">Mount</td>
                        <td colspan="3">Frame</td>
                        <td colspan="2">Cover</td>
                        <td><strong>Total</strong></td>
                      </tr>
                      <tr class="hdrs">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Surface</td>
                        <td>Height</td>
                        <td> Width</td>
                        <td>Print Cost</td>
                        <td>Name</td>
                        <td>Width</td>
                        <td>Mount Cost</td>
                        <td> Name</td>
                        <td>Width</td>
                        <td>Frame Cost</td>
                        <td>Glass</td>
                        <td>Glass Cost</td>
                        <td></td>
                      </tr>
                     
                      <tr>
                        
                         <td>
                             
                             <div class="old"><input type="text" class="txtbox" name="imgid[]" id="imgid0"  onBlur="return show_image_visual(this.value);" /></div>
                             <div class="new"  id="filediv"><input type="file"  name="file[]" style="width:100px;"  id="file" />  </div>
                         </td>
                         <td ><div id="image_preview" class="image_preview"><img id="previewing" src="" width="50" height="50"/></div><span id="image_visual" class="image_visual" ></span></td>
                        <td><input type="text" class="txtbox" name="license_cost[]" onkeyup="return calculator_show();" onBlur="return calculator_show();" id="license_cost0"  /></td>
                        <td><select name="surface[]" id="surface0">
                            <?php   foreach($surface as $surf) {  ?>
                            <option value="<?php echo $surf['surface']; ?>"><?php echo $surf['surface'] ?></option>
                            <?php } ?>
                          </select></td>
                        <td><input type="text" name="print_height[]" id="print_height0"  onkeyup="return calculator_show();" class="txtbox" onBlur="return calculator_show();"></td>
                        <td><input type="text" name="print_width[]" id="print_width0" onkeyup="return calculator_show();" onBlur="return calculator_show();" class="txtbox"></td>
                        <td><input type="tex" readonly="" name="print_cost" id="print_cost0" class="txtbox" ></td>
                        <td><select name="mount_code[]" id="mount_code0">
                            <?php foreach ($surface_mount as $mount) {  ?>
                            <option value="<?php echo $mount['surface']; ?>"><?php echo $mount['surface'] ?></option>
                            <?php } ?>
                          </select></td>
                        <td><input type="text" name="mount_width[]" id="mount_width0" onkeyup="return calculator_show();" onBlur="return calculator_show();" class="txtbox"></td>
                        <td><input type="tex" readonly="" name="mount_cost" id="mount_cost0" class="txtbox" ></td>
                        <td><select name="frame_code[]" id="framer_code0">
                            <?php foreach ($surface_framer as $framer) {?>
                            <option value="<?php echo $framer['surface']; ?>"><?php echo $framer['surface'] ?></option>
                            <?php } ?>
                          </select></td>
                        <td><select name="frame_width[]" id="frame_width0" onkeyup="return calculator_show();" onChange="return calculator_show();">
                            <?php foreach ($framer_width as $width) {?>
                            <option value="<?php echo $width['width']; ?>"><?php echo $width['width'] ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td><input type="tex" readonly="" name="frame_cost" id="frame_cost0" class="txtbox" ></td>
                        <td><select name="cover[]" id="surface0">
                            <?php foreach ($surface_glass as $GLASS) {  ?>
                            <option value="<?php echo $GLASS['surface']; ?>"><?php echo $GLASS['surface'] ?></option>
                            <?php } ?>
                          </select></td>
                        <td><input type="tex" readonly="" name="glass_cost" id="glass_cost0" class="txtbox" ></td>
                      </td>
                      
                      <td ><input type="text" readonly="" style="background-color:#F7F7F7; text-align: center; font: bold; border: none;" name="Q_total[]" id="total0"></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <p>&nbsp;</p>
              <table width="600" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="bold">Packaging Charges:</td>
                  <td><input type="text" name="packaging_charge" readonly="" id="packaging_charge" value="" class="txtbox">
                  </td>
                </tr>
                <tr class="darktr">
                  <td class="bold">Courier Charges:</td>
                  <td><input type="text" name="courier_charge"  readonly="" id="courier_charge" value="<?='50'?>"  class="txtbox"></td>
                </tr>
                <tr>
                  <td class="bold">Discount:</td>
                  <td><input type="text" name="discount"  id="discount" class="txtbox"  onkeyup="return calculator_show();" onBlur="return calculator_show();"></td>
                </tr>
                <tr class="darktr">
                  <td class="bold">Total After Discount:</td>
                  <td><input type="text" name="after_discount" readonly="" value="" id="after_discount" class="txtbox"></td>
                </tr>
                <tr>
                  <td class="bold">Tax - 5% VAT:</td>
                  <td><input type="text" readonly="" name="tax" value="<?='5'?>" class="txtbox"></td>
                </tr>
                <tr class="darktr">
                  <td class="bold">Final Amount:</td>
                  <td class="total-price"><div >
                      <input type="hidden" readonly=""  style="background-color:#08558d; font: bold; border: none;" name="finalTotal_txt" id="Total_txt_amount" value="">
                      <input type="text" readonly=""  style="background-color:#08558d; font: bold; border: none;" name="finalTotal_txt" id="finalTotal_txt" value="">
                    </div></td>
                </tr>
              </table>
              <br />
              <br />
              <table width="1000" border="0" cellspacing="0" cellpadding="0">
                <tr class="darktr">
                  <td width="150" class="bold">Sales Person:</td>
                  <td><input type="text" name="s_name" id="name-" placeholder="Name"/></td>
                  <td><input type="text" name="s_email" id="name-2" placeholder="Email"/></td>
                  <td><input type="text" name="s_contact" id="name-3" placeholder="Contact Number"/></td>
                </tr>
                <tr>
                  <td class="bold">Client Servicing:</td>
                  <td><input type="text" name="c_name" id="name-4" placeholder="Name"/></td>
                  <td><input type="text" name="c_email" id="name-5" placeholder="Email"/></td>
                  <td><input type="text" name="c_contact" id="name-6" placeholder="Contact Number"/></td>
                </tr>
                <tr class="darktr">
                  <td class="bold">Created by:</td>
                  <td><input type="text" name="createdby" id="name-7" placeholder="Name"/></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
              </td>
            </tr>
          </div>
        </table>
        <div style="padding:30px; text-align:left">
          <input type="submit" name="addcpn" id="addcpn" value="Generate Quotation" class="bt-create-quote" >
          <!--  <input type="submit" name="addcpn2" id="addcpn2" value="Convert to Invoice" class="bt-create-quote" style="background:#333399"/>-->
        </div>
      </form>
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
</body>
</html>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
               
                function change_div(status){
                    
                    if(status=='1')
                    {
                    $('.txtbox_f').show(); 
                      $('.td_class').show();
                         $('.old').show();
                            $('.image_visual').show();
                              $('.new').hide();
                                $('.image_preview').hide(); 
                     
                    $('.new_class').hide();
                     $('.old_class').show();
                     $('.td_class').show();
                     }else if(status=='2')
                    {
                     $('.txtbox_f').hide();
                   $('.td_class').hide();
                         $('.old').hide();
                            $('.image_visual').hide();
                              $('.new').show();
                    $('.new_class').show();
                      $('.old_class').hide();
                        $('.image_preview').show(); 
                     
                     }
                    
                     
                }
                $(document).ready(function(){
                    
                 
                         $('.old').show();
                            $('.image_visual').show();
                              $('.new').hide();
                     
                    $('.new_class').hide();
                     $('.old_class').show();
                     $('.td_class').hide(); 
     $('.txtbox_f').show(); 
     $('.image_preview').hide(); 

                     
                });
             
                </script>
              <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                      <script type="text/javascript">         function save_item_quotation()                    
                      {  
                      
                          var quotation_id=$('#quotation_id').val();                    
                          var imgid=$('#imgid').val();                    
                          var license_cost=$('#license_cost').val();         
                          var surface=$('#surface').val();                   
                          var print_height=$('#print_height').val();            
                          var print_width=$('#print_width').val();               
                          var frame_code=$('#frame_height').val();       
                          if(imgid=='')                          
                          {                             
                              alert("Enter Image Id");           
                              $('#imgid').focus();                  
                              return false;                            
                          }                                    
                          if(license_cost=='')           
                          {                              
                              alert("Enter License Cost");          
                              $('#license_cost').focus();        
                              
                              return false;                     
                          }                      if(surface=='')    
                          {                              
                              alert("Select surface");          
                              $('#surface').focus();          
                              return false;                    
                          }                                                                                      }                                       
                          function show_image_visual(image_id)                   
                          {                      
                              $.ajax({                       
                              type:'post',                       
                              url:'show_images_viusal',                       
                              data:'image_id='+image_id,                        
                              success:function(response)                         
                              {                                                                                                                 
                                  var a = document.createElement("img");                            
                                  a.src = response;                            
                                  a.height = 80;                            
                                  a.width = 80;                                                         
                                  $('#image_visual').html(a);                         
                              }                                                
                          });                   
                      }                                                         
                      $(document).ready(function(){                                        
                          $(document).on("blur", ".txtbox_f", function () {                    
                              var myBookId = $(this).data('id');                  
                              var image_id=  document.getElementById('imgid'+myBookId).value;   
                              $.ajax({                     
                                  type:'post',                    
                                  url:'show_images_viusal',       
                                  data:'image_id='+image_id,        
                                  success:function(response)       
                                  {                            
                                      var a = document.createElement("img");    
                                      a.src = response;                     
                                      a.height = 80;                   
                                      a.width = 80;               
                                      $('#image_visual'+myBookId).html(a);     
                                  }                                            
                              });                                 
                          });            
                      });                                   
                  
                  
                   
                   
           $(document).ready(function (e) {        
                   // Function to preview image after validation
                $(function() {
                    $("#file").change(function() {
                    $("#message").empty(); // To remove the previous error message
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match= ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                    {
                        $('#previewing').attr('src','noimage.png');
                        
                        return false;
                    }else{
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
             });
              function imageIsLoaded(e) {
                  $("#file").css("color","#FFFFFF");
                  $('#image_preview').css("display", "block");
                  $('#previewing').attr('src', e.target.result);
                  $('#previewing').attr('width', '80px');
                  $('#previewing').attr('height', '80px');
              };
          });
                   
                   
                   
                         $(document).ready(function(){                                        
                          $(document).on("blur", ".file", function () {                    
                              var myBookId = $(this).data('id');                  
                              
                                $(function() {
                    $("#file"+myBookId).change(function() {
                    $("#message"+myBookId).empty(); // To remove the previous error message
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match= ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                    {
                        $('#previewing'+myBookId).attr('src','noimage.png');
                        
                        return false;
                    }else{
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
             });
              function imageIsLoaded(e) {
                  $("#file"+myBookId).css("color","#FFFFFF");
                  $('#image_preview'+myBookId).css("display", "block");
                  $('#previewing'+myBookId).attr('src', e.target.result);
                  $('#previewing'+myBookId).attr('width', '80px');
                  $('#previewing'+myBookId).attr('height', '80px');
              };
          });
                
                            });
                         
                          
                   
        
                      </script>