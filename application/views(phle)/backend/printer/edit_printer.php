<?php
/////////////print_r($edit_details);
//print_r($edit_id);


    ?>
  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script>
    
    
    
    
    $(document).ready(function(){
  
  var typesofvender=document.getElementById('typesofvender').checked;
  var typesofvender1=document.getElementById('typesofvender1').checked;
   if(typesofvender==true)
   {
       var servives=1;
   }else if(typesofvender1==true)
   {
       var servives=1;
   }
        //alert(servives);
          if(servives=='1')
          {
             $('.noofpicest').hide();
            $('.qty').hide(); 
          }else if(servives=='2')
          {
             $('.noofpicest').show();
            $('.qty').show(); 
          }
  });
function services_vaalidate(values)
{
       if(values=='services')
    {
        
        $('.noofpicest').hide();
        $('.qty').hide();
          
        
     
    }else if(values=='material'){
        $('.noofpicest').show();
        $('.qty').show();
        
    }
    
}
    
  



$(document).ready(function(){ 
    $(document).on("click", ".inputbxs2", function () {
     var myBookId = $(this).data('id');
     var d = new Date();
var n = d.getTime();
      var code_gen = parseInt((Math.random() * 100), 10);
      //alert(code_gen);
      document.getElementById('product_code_gen'+myBookId).value='PTR'+code_gen+n;    
    });
    });
 
    


  



    
 
 
      function show_newTextBox2()
 {
    
      document.getElementById('display_namen').style.display="block";
      document.getElementById('display_name_listn').style.display="none";
      document.getElementById('new_display_namen').style.display="none";
      document.getElementById('list_display_namen').style.display="block";
   
 }
 

 function show_oldTextBox2()
 {
    $('#display_namen').hide();
    $('#new_display_namen').show();
    $('#display_name_listn').show();
    $('#list_display_namen').hide();
 }
 
 
    
 
 function show_newTextBox2() {          
     document.getElementById('display_namen').style.display="block";     
     document.getElementById('display_name_listn').style.display="none";      
     document.getElementById('new_display_namen').style.display="none";     
     document.getElementById('list_display_namen').style.display="block";    
 }  function show_oldTextBox2() {    
     $('#display_namen').hide();    
     $('#new_display_namen').show();   
     $('#display_name_listn').show();  
     $('#list_display_namen').hide();
 }  
 
    
    $(document).ready(function(){    
     $(document).on("click", ".newClass", function () {     
         var myBookId = $(this).data('id');    
         var action = $(this).data('action');           
         var newTextBoxDiv = $(document.createElement('div'))      
                 .attr("id", 'TextBoxDiv' + myBookId);   
         var target = document.getElementById('display_name_listn');   
         var wrap = document.createElement('td');   
         wrap.appendChild(target.cloneNode(true));    
         var display_name_list=  wrap.innerHTML;               
     if(action=='new_list')    {           
         var my_new_texBox='<a id="new_textBox'+myBookId+'" class="newClass" style="margin-left:5px" data-toggle="modal" data-id="'+myBookId+'" data-action="old_list">Old Display Name</a><br><input type="text" name="display_namen[]" id="display_namen" style="width: 93px; height: 28px;    margin-left: 12px;">';   
         document.getElementById('text_box'+myBookId).innerHTML= my_new_texBox;    
         document.getElementById('list_display_namen'+myBookId).style.display="block";           
     }else if(action=='old_list')    {    
         var my_new_texBox='<a  id="new_textBox'+myBookId+'" class="newClass" style="margin-left:5px" data-toggle="modal" data-id="'+myBookId+'" data-action="new_list">New Display Name</a><br>'+display_name_list;    
         document.getElementById('text_box'+myBookId).innerHTML= my_new_texBox;     
         document.getElementById('list_display_namen'+myBookId).style.display="none";        
     }
     });       
     });
 
 
 

    
    
  
 $(document).ready(function(){

$('#display_name_listn').show();
$('#list_display_namen').hide();
 $('#new_display_namen').show();

    var counter = 2;
		
    $("#addButton").click(function () {
			
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv' + counter);
    var target = document.getElementById('display_name_listn');
    var wrap = document.createElement('td');
    wrap.appendChild(target.cloneNode(true));
    var display_name_list=  wrap.innerHTML;
    
    newTextBoxDiv.after().html(
'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr style="padding: 11px 17px 13px 25px;"><td id="td"> <input type="hidden" name="product_code[]" id="product_code_gen'+counter+'" ><input type="text"name="surfacen[]" id="surface'+counter+'" data-toggle="modal" data-id="'+counter+'" class="inputbxs2" style="margin-left: 17px;" placeholder="surface"/></td> <td id="td"><input type="text"name="costn[]" id="cost'+counter+'" class="inputbxs2" placeholder="Cost"/></td><td id="td"><input type="text"name="unitn[]" id="unit'+counter+'" class="inputbxs2" placeholder="Unit"/></td><td><select name="noofpicesn[]" style="height: 29px; padding-left: 20px;margin-left: 9px;width: 80px;"><option value="roll">Roll</option><option value="cut_sheet">Cut Sheet</option></select></td><td id="td"><input type="text"name="qtyn[]" id="qty'+counter+'" class="inputbxs2" placeholder="Quantity"/></td><td id="td"><input type="text"name="gsmn[]" id="gsm'+counter+'" class="inputbxs2" placeholder="GSM"/></td><td><input type="text"name="heightn[]" id="height" class="inputbxs1" placeholder="Height"/></td><td><input type="text"name="widthn[]" id="width" class="inputbxs1" placeholder="Width"/></td><td id="text_box'+counter+'"><a   id="new_textBox'+counter+'" class="newClass" style="margin-left:5px" data-toggle="modal" data-id="'+counter+'" data-action="new_list">New Display Name</a><a data-toggle="modal" data-id="'+counter+'" data-action="old_list" class="newClass" style="margin-left:25px; display:none; "  id="list_display_name'+counter+'" >Old Display Name</a><br>'+display_name_list+'</td><td id="td"><textarea name="descn[]" id="desc'+counter+'" rows="4" cols="15" placeholder="Description" style="margin-right: 23px;"></textarea></td></tr></table>');
       newTextBoxDiv.appendTo("#TextBoxesGroup");
       newTextBoxDiv.appendTo("#display_name"+counter);
	counter++;
      
     });

     $("#removeButton").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          ;
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv" + counter).remove();
      
     });
		
     $("#getButtonValue").click(function () {
		
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
  });
  
  
  
   
   
  
   $(document).ready(function(){

    var counter = 2;
		
    $("#addButton6").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
    	
   
    
  var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv6' + counter);
    
    newTextBoxDiv.after().html(
'<table style="border-top: 0px; border-bottom: 0px; width:100%;"><tr><td id="td11"> <input type="hidden" name="product_code[]" id="product_code_geno'+counter+'" ><input type="text"name="surfacen[]"  id="othername'+counter+'" class="inputbxs11" style="margin-left: 17px;" data-toggle="modal" data-id="'+counter+'" placeholder="Other Name"/></td> <td id="td11"><input type="text"name="costn[]" id="cost'+counter+'" class="inputbxs11" placeholder="Amount"/></td><td id="td11"><input type="text"name="qtyn[]" id="rate'+counter+'" class="inputbxs11" placeholder="Quantity"/></td><td id="td11"><input type="text"name="unitn[]" id="unit'+counter+'" class="inputbxs11" placeholder="Unit"/></td></tr></table>');
       newTextBoxDiv.appendTo("#TextBoxesGroup6");
      
	counter++;
      //show_newTextBox(counter)
     });

     $("#removeButton6").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          ;
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv6" + counter).remove();
      
     });
		
     $("#getButtonValue").click(function () {
		
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
     
     
  
     
     
  });
 
 $(document).ready(function(){
  
  var typesofvender=document.getElementById('typesofvender').checked;
  var typesofvender1=document.getElementById('typesofvender1').checked;
   if(typesofvender==true)
   {
       var servives=1;
   }else if(typesofvender1==true)
   {
       var servives=2;
   }
        //alert(servives);
          if(servives=='1')
          {
             $('.noofpicest').hide();
            $('.qty').hide(); 
          }else if(servives=='2')
          {
             $('.noofpicest').show();
            $('.qty').show(); 
          }
  });
  
function services_vaalidate(values)
{
       if(values=='services')
    {
        
        $('.noofpicest').hide();
        $('.qty').hide();
          
        
     
    }else if(values=='material'){
        $('.noofpicest').show();
        $('.qty').show();
        
    }
    
}



</script>
<!--MIDDLE PAGE WRAPPER STARTS-->

<div id="middle-wrapper">
  <div id="middle-container">
    <div class="main-hdr"> Edit Printer Details</div>
    <div class="add-newcp"><span style="color:#F00;font-size:16px"><?php
    if($msg<>'')
    {
        ?><script>setTimeout(function(){timeOut();},2000); function timeOut(){window.location.href="edit_printer/<?=$edit_id?>"}</script>
		<?php
    }print $msg;?></span>
     <div class="mndry"> <a href="<?=base_url()?>index.php/backend/view_printer_details"><input type="button" class="bt-sbt-upload" value="View Details"  />  </a>  *Mandatory Fields</div>
      <form action="<?=base_url()?>index.php/backend/edit_printer_details" id="add_printer_form" method="post" enctype="multipart/form-data">
          <input type="hidden" name="printer_code" value="<?=$edit_details[0]->printer_code;?>">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr style="background:#e5e5e5">
            <td>Personal / Company Information </td>
            <td>&nbsp;</td>
          </tr>
          <tr class="toptr">
            <td>Company Name*</td>
            <td><?php 
            $printer_code= $edit_details[0]->printer_code;
 
        $printer_code_str= substr($printer_code,0,3);    
            
            ?><input type="text" name="name" readonly="" id="name" class="inputbxs" value="<?=$edit_details[0]->company_name;?>" />
              <br />
              <span id="name_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Contact Person Name*</td>
            <td><input value="<?=$edit_details[0]->contact_person_name;?>"  type="text" name="contactname" id="contactname" class="inputbxs"  />
              <br />
              <span  id="contactname_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Contact Number*</td>
            <td><input value="<?=$edit_details[0]->contact_number;?>"  type="text" name="contact" onkeypress="return isNumber(event)" maxlength="10" id="contact" class="inputbxs" placeholder="Enter Only Number"/>
              <br />
              <span id="contact_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Mobile Number*</td>
            <td><input value="<?=$edit_details[0]->mobile_number;?>"  type="text" name="mobile" onkeypress="return isNumber(event)" maxlength="10" id="mobile" class="inputbxs" placeholder="Enter Only Number"/>
              <br />
              <span id="mobile_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Email*</td>
            <td><input value="<?=$edit_details[0]->email_id;?>"  type="text" name="email" id="email" class="inputbxs" />
              <br />
              <span id="email_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Address*</td>
            <td><textarea name="address" id="address" class="inputbxs" ><?=$edit_details[0]->address;?></textarea>
              <br />
              <span id="address_error" style="color:#F00"></span></td>
          </tr>
          <!--  <tr class="toptr">    <td>City*</td>    <td><input type="text" name="city" id="city" class="inputbxs" /><br /><span id="city_error" style="color:#F00"></span></td>    </tr>-->
          <tr class="toptr">
            <td>State*</td>
            <td><input value="<?=$edit_details[0]->state;?>"  type="text" name="state" id="state" class="inputbxs" />
              <br />
              <span id="state_error" style="color:#F00"></span></td>
          </tr>
          <tr class="toptr">
            <td>Pin Code*</td>
            <td><input value="<?=$edit_details[0]->pin_code;?>"  type="text" name="pin_code" onkeypress="return isNumber(event)" maxlength="6" id="pin_code" class="inputbxs" placeholder="Enter Only Number" />
              <br />
              <span id="pin_code_error" style="color:#F00"></span></td>
          </tr>
          <tr>
            <td>Status</td>
            <td><select name="vender_status" id="vender_status" class="inputbxs">
                    <option  <?php if($edit_details[0]->status==1){?> selected=""<?php }?> value="1">Active</option>
                <option <?php if($edit_details[0]->status==0){?> selected=""<?php }?>  value="0">Inactive</option>
              </select>
              <span id="vender_status_error" style="color:#F00"></span></td>
          </tr>
          <!--<tr class="toptr">    <td>Region</td>    <td><select name="region" id="region" class="inputbxs" style="width:243px;"><option>Select Region</option><option>North</option><option>South</option><option>East</option><option>West</option></select></td>    </tr>-->
          <!---------------------------------------printing_details--------------------------------------------------------------------------------------------->
          <!-- <tr style="background:#e5e5e5">    <td>Printing Details</td>    <td>&nbsp;</td>    </tr>   <!--    <tr>    <td>Type of Surface</td>    <td>Surface Code</td>    <td>Cost/sq. inch</td>    <td>Time/print</td>     </tr>   <tr>    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>    </tr>      <tr>    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>    </tr>    <tr>    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>    </tr><tr>    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>    </tr><tr>    <td><input type="text"name="tp_sur" id="tp_sur"  placeholder="Type of Surface"/></td>    <td><input type="text"name="sur_code" id="sur_code"  placeholder="Surface Code"/></td>    <td><input type="text"name="cost_inch" id="cost_inch"  placeholder="Cost/sq. inch"/></td>     <td><input type="text"name="time_print" id="time_print"  placeholder="Time/print"/></td>    </tr>-->
          <!--<tr>    <td>Max prints/day</td>    <td><input type="text"name="max_prints" id="max_prints" class="inputbxs" placeholder="Max prints/day"/></td>    </tr>        <tr>    <td>Min prints/day</td>    <td><input type="text"name="min_prints" id="min_prints" class="inputbxs" placeholder="Min prints/day"/></td>    </tr>         <tr>    <td>GSM of Surface</td>    <td><input type="text"name="gsm_sur" id="gsm_sur" class="inputbxs" placeholder="GSM of Surface"/></td>    </tr>    <tr>    <td>Printing machine-width(max size 40)</td>    <td><input type="text"name="print_mac" id="print_mac" class="inputbxs" placeholder="Printing machine-width"/></td>    </tr>          <tr>    <td>Off Days</td>    <td><input type="text"name="off_days" id="off_days" class="inputbxs" placeholder="Off Days"/></td>    </tr>-->
          <!--------------------------------------------------packaging_details_start-------------------------------------------------------------------------->
          
          <!--------------------------------------------------------packaging_details_end/other_details_start-------------------------------------------------------------------------------->
          <tr style="background:#e5e5e5">
            <td>Other Details</td>
            <td>&nbsp;</td>
          </tr>
          <!--<tr>   <td>Delivery to framer</td>  <td><input type="radio" name="delivery_to_framer" id="delivery_to_framer" value="1" checked>Yes</input><br/><input type="radio" name="delivery_to_framer" id="delivery_to_framer" value="0">No</input></td>  </tr>-->
          <tr>
            <td>Delivery to office</td>
            <td><input type="radio"  <?php if($edit_details[0]->delivery_to_office==1){?> checked="checked" <?php }?> name="delivery_to_office" id="delivery_to_office" value="1"  >
              Yes
              </input>
              <br/>
              <input type="radio" <?php if($edit_details[0]->delivery_to_office==0){?> checked="checked" <?php }?> name="delivery_to_office" id="delivery_to_office" value="0">
              No
              </input></td>
          </tr>
          <tr>
            <td>Pick up from office</td>
            <td><input type="radio" <?php if($edit_details[0]->pick_office==1){?> checked="checked" <?php }?> name="pick_office" id="pick_office" value="1" >
              Yes
              </input>
              <br/>
              <input type="radio" <?php if($edit_details[0]->pick_office==0){?> checked="checked" <?php }?> name="pick_office" id="pick_office" value="0">
              No
              </input></td>
          </tr>
          <tr>
            <td>Working on off days</td>
            <td><input type="radio" <?php if($edit_details[0]->working_days==1){?> checked="checked" <?php }?> name="working_days" id="working_days" value="1" >
              Yes
              </input>
              <br/>
              <input type="radio" <?php if($edit_details[0]->working_days==0){?> checked="checked" <?php }?> name="working_days" id="working_days" value="0">
              No
              </input></td>
          </tr>
          <tr>
            <td>Remarks</td>
            <td><textarea name="remark"  id="remark" class="inputbxs" placeholder="Remarks"><?=$edit_details[0]->remarks?></textarea></td>
          </tr>
          <tr>
            <td>Satisfaction Level</td>
            <td><select name="level" id="level" style="width:243px; height:33px;" class="inputbxs">
                <option>Select Satisfaction Level</option>
                <option <?php if($edit_details[0]->satisfaction_level==1){?> selected="" <?php }?>  value="1">Excellent</option>
                <option <?php if($edit_details[0]->satisfaction_level==2){?> selected="" <?php }?> value="2">Good</option>
                <option <?php if($edit_details[0]->satisfaction_level==3){?> selected="" <?php }?> value="3">Fair</option>
                <option <?php if($edit_details[0]->satisfaction_level==4){?> selected="" <?php }?> value="4">Average</option>
                <option  <?php if($edit_details[0]->satisfaction_level==5){?> selected="" <?php }?> value="5">Poor</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Preferred</td>
            <td><input type="radio" <?php if($edit_details[0]->preferred_surface==1){?> checked="checked" <?php }?> name="preferred" id="preferred" value="1" >
              Yes
              </input>
              <br>
              <input type="radio" <?php if($edit_details[0]->preferred_surface==0){?> checked="checked" <?php }?> name="preferred"  value="0">
              No
              </input>
            </td>
          </tr>
          <!------------------------------------------------------------other_details_end/payment_details_start---------------------------------------------------------------------------------------------------->
          <tr style="background:#e5e5e5">
            <td>Payment Details</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
          <tr>
            <td>Name on Cheque</td>
            <td><input value="<?=$edit_details[0]->name_on_cheque;?>" type="text"name="cheque" id="cheque" class="inputbxs" placeholder="Name on Cheque"/></td>
          </tr>
          <tr>
            <td>Upload the file (If there is any change)</td>
            <td><input type="file" name="pdf_file" id="pdf_file" size="chars" />
              <br />
              <span id="pdf_error" style="color:#F00"></span></td>
          </tr>
          <tr>
            <td>Labor Charge</td>
            <td><input type="text"name="labor_charge"  value="<?php echo $edit_details[0]->labor_charge;?>"  id="labor_charge" class="inputbxs" placeholder="Labor Charge"/></td>
          </tr>
          <tr>
            <td>Types of Vender</td>
            <td><input type="radio"  onclick="return services_vaalidate('services');" <?php if($edit_details[0]->typesofvender==1){ ?>  checked=""<?php }?> name="typesofvender" id="typesofvender" value="1" >
              Services
              </input>
              <br/>
              <input type="radio" name="typesofvender" onclick="return services_vaalidate('material');" <?php if($edit_details[0]->typesofvender==2){ ?>  checked=""<?php }?> id="typesofvender1" value="2">
              Row Material
              </input></td>
          </tr>
          
          
          <tr style="background:#e5e5e5">
              <td><b>Material offered</b></td>
          
          <input type="hidden" name="printer_code" value="<?php echo $edit_details[0]->printer_code;?>">
    <td></td>
    </tr>
    </table>
          <!--<div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton' >Add New Item</a> <a href="#!" class="subtractwcp" id='removeButton'>Remove Item</a></div>-->
       <br>
         <div >
	<div >  
            <table style="border-bottom: 0px;  width: 100%">
        
     <tr id="tr"> <td>Surface</td> <td>Rate</td><td>Unit</td><td class="noofpicest">No of Pieces</td><td  class="qty">QTY</td><td>GSM</td><td>Height</td><td>Width</td><td>Display Name </td> <td>Description</td><td></td></tr>  
    <?php if($printer_code_str=='PTR'){ 
          $printer= $this->backend_model->Get_all_printer_details($printer_code);
         $i=1;  while($data_values=  mysql_fetch_object($printer)):
        ?>  
    <input type="hidden" name="edit_id[]" value="<?php echo $data_values->printer_id;?>">
   <tr>
       <td><? $data_values->printer_id;?><input value="<?php echo $data_values->surface;?>" type="text"name="surface[]" style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="surface"/></td>
      
       <td><input type="text"name="cost[]" id="cost1" value="<?php echo $data_values->cost_per_sq_inch;?>"  class="inputbxs1" placeholder="Cost"/></td>
       
   <td><input type="text"name="unit[]" value="<?php echo $data_values->unit;?>"  id="unit1" class="inputbxs1" placeholder="Per Unit"/></td>
     <td class="noofpicest"><select name="noofpices[]" style="height: 29px; padding-left: 20px;
    margin-left: 9px;
    width: 80px;">
            <option <?php if($data_values->noofpieces=='roll'){?> selected=""<?php }?> value="roll">Roll</option>
            <option value="cut_sheet" <?php if($data_values->noofpieces=='cut_sheet'){?> selected=""<?php }?>>Cut Sheet</option></select></td>  
            <td class="qty"><input type="text" name="qty[]" id="qty" value="<?php echo $data_values->qty;?>"  class="inputbxs1"></td>
            <td><input type="text"name="gsm[]" value="<?php echo $data_values->gsm_of_surface;?>"  id="gsm1" class="inputbxs1" placeholder="GSM"/></td>
    <td><input type="text"name="height[]" value="<?php echo $data_values->height;?>"  id="height" class="inputbxs1" placeholder="Height"/></td>
    <td><input type="text"name="width[]"  value="<?php echo $data_values->width;?>"  id="width" class="inputbxs1" placeholder="Width"/></td>
   
    <td id="show_selectpicker">
        <a onclick="return show_newTextBox<?=$i?>(); " style="margin-left:25px;" id="new_display_name<?=$i?>">New Display Name</a><a onclick="return show_oldTextBox<?=$i?>(); " style="margin-left:25px; display:none;"  id="list_display_name<?=$i?>" >Old Display Name</a><br>
        
        <select name="display_name_list[]" id="display_name_list<?=$i?>"  class="inputbxs1" style="height: 29px; padding-left:0px;
    margin-left: 0px;
    width: 92px;">
            <option value="">---Select---</option>
            <?php foreach($printer_rows as $values){?>
            <option  <?php if($data_values->display_name==$values->display_name){?> selected=""<?php }?> value="<?=$values->display_name;?>"><?php echo $values->display_name;?></option>
            <?php }?>
        </select>
       
       <input  type="text"  name="display_name[]" id="display_name<?=$i?>"  style="display:none; width: 92px; height: 28px;    margin-left: 12px;"  >
        <?php //}?>
    </td>
    <td><textarea name="desc[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"><?php echo $data_values->sur_desc;?></textarea></td>
       <td></td> 
   </tr>
   <script>
      function show_newTextBox<?=$i?>()
 {
    
      document.getElementById('display_name<?=$i?>').style.display="block";
      document.getElementById('display_name_list<?=$i?>').style.display="none";
      document.getElementById('new_display_name<?=$i?>').style.display="none";
      document.getElementById('list_display_name<?=$i?>').style.display="block";
   
 }
 

 function show_oldTextBox<?=$i?>()
 {
    $('#display_name<?=$i?>').hide();
    $('#new_display_name<?=$i?>').show();
    $('#display_name_list<?=$i?>').show();
    $('#list_display_name<?=$i?>').hide();
 }
 
 
       </script>
   <?php $i++; endwhile; }// end lopp?>
       
        </table>
     <table style="border-bottom: 0px;  width: 100%"> 
         
       <tr id="tr"> <td>Other Name</td> <td>Amount</td><td>Qty</td><td>Unit</td></tr>  
    <?php  $oth_printer= $this->backend_model->Get_all_other_printer_details($printer_code);
          while($other_val=  mysql_fetch_object($oth_printer)):?>
                <tr id="get_data">
                    <td id="td10"><input type="hidden" name="edit_id[]" value="<?php echo $other_val->printer_id;?>"><input type="text"name="surface[]" value="<?=$other_val->surface;?>" style="margin-right: 0px;" id="othername" class="inputbxs10" placeholder="Other Name"/></td>
    <td id="td10"><input type="text"name="cost[]" value="<?=$other_val->cost_per_sq_inch;?>" id="cost1" class="inputbxs10" placeholder="Amount"/></td>
    <td id="td10"><input type="text"name="qty[]" value="<?=$other_val->qty;?>" id="qty1" class="inputbxs10" placeholder="Quantity"/></td>
    <td id="td10"><input type="text"name="unit[]" value="<?=$other_val->unit;?>" id="unit1" class="inputbxs10" placeholder="Unit"/></td>
    </tr>
     
   <?php endwhile; // end iif?>
       
       </table> 
          </div></div>
       <br>
       <input type="submit" class="bt-sbt-upload" name="upload_images" id="upload images" value="Update" style="float: right;"  onclick="return 1Validate_printer();" />  
       
      
         <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton' >Add New Item</a> <a href="#!" class="subtractwcp" id='removeButton'>Remove Item</a></div>
       <br>
         <div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">  
            
            <input type="hidden" name="product_code[]" id="product_code_gen" >
               <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Surface</td> <td>Cost</td><td>Unit</td><td>No of Pieces</td><td>QTY</td><td>GSM</td><td>Height</td><td>Width</td><td>Display Name </td> <td>Description</td><td></td></tr>  
    
   <tr>
       <td><input type="text"name="surfacen[]" onblur="return get_product_code();" onclick="return get_product_code();" style="margin-right: -5px;" id="surface1" class="inputbxs1" placeholder="surface"/></td>
    <td><input type="text"name="costn[]" id="cost1" class="inputbxs1" placeholder="Cost"/></td>
    <td><input type="text"name="unitn[]" id="unit1" class="inputbxs1" placeholder="Unit"/></td>
    <td><select name="noofpicesn" style="height: 29px; padding-left: 20px;
    margin-left: 9px;
    width: 80px;"><option value="roll">Roll</option><option value="cut_sheet">Cut Sheet</option></select></td>
    <td><input type="text" name="qtyn[]" id="qty" class="inputbxs1"  placeholder="Quantity"> </td>
    <td><input type="text"name="gsmn[]" id="gsm1" class="inputbxs1" placeholder="GSM"/></td>
    <td><input type="text"name="heightn[]" id="height" class="inputbxs1" placeholder="Height"/></td>
    <td><input type="text"name="widthn[]" id="width" class="inputbxs1" placeholder="Width"/></td>
    <td id="show_selectpicker">
        <a onclick="return show_newTextBox2();" style="margin-left:25px;" id="new_display_namen">New Display Name</a><a onclick="return show_oldTextBox2();" style="margin-left:25px; display:none;"  id="list_display_namen" >Old Display Name</a><br>
        
        <select name="display_name_listn[]" id="display_name_listn"  class="inputbxs1" style="height: 29px; padding-left:0px;
    margin-left: 0px;
    width: 92px;">
            <option value="">---Select---</option>
            <?php foreach($printer_rows as $values){?>
            <option  value="<?=$values->display_name;?>"><?php echo $values->display_name;?></option>
            <?php }?>
        </select>
       
       <input  type="text"  name="display_namen[]" id="display_namen"  style="display:none; width: 92px; height: 28px;    margin-left: 12px;"  >
        <?php //}?>
    </td>
    <td><textarea name="descn[]" id="desc1" rows="4" cols="15" placeholder="Description" style="margin-left: 2px;"></textarea></td>
       <td></td> 
   </tr>
     
       
       </table> 
            
                 
            
            
            
          </div></div>
          <br>
          
          <div class="customer-list" id="btn_foucs" ><a href="#!"class="addnewcp" id='addButton6' >Add Row</a> <a href="#!" class="subtractwcp" id='removeButton6'>Remove Row</a></div>
       <br>
       
        <div id='TextBoxesGroup6'>
	<div id="TextBoxDiv6">  
            <input type="hidden" name="product_code[]" id="product_code_geno" >
           
            <table style="border-bottom: 0px;  width: 100%">
           
                <tr id="tr"> <td>Other Name</td> <td>Amount</td><td>Qty</td><td>Unit</td></tr>  
    
                <tr id="get_data">
       <td id="td10"><input type="text"name="surfacen[]" onblur="return get_product_codeo();" onclick="return get_product_codeo();" style="margin-right: 0px;" id="othername" class="inputbxs10" placeholder="Other Name"/></td>
    <td id="td10"><input type="text"name="costn[]" id="cost1" class="inputbxs10" placeholder="Amount"/></td>
    <td id="td10"><input type="text"name="qtyn[]" id="qty1" class="inputbxs10" placeholder="Quantity"/></td>
    <td id="td10"><input type="text"name="unitn[]" id="unit1" class="inputbxs10" placeholder="Unit"/></td>
    </tr>
     
       
       </table> 
          </div></div>
       
       
       
          <br>
          <input type="submit" class="bt-sbt-upload" name="add_more" id="upload images" value="Add Printer" style="float: right;"  onclick="return 1Validate_printer();" />  
           
       
      </form>
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
<?php
$curr =  date('d-m-Y');
$str = explode("-",$curr);
$year =  substr($str[2], 2, 3);
 $code=$str[0].$str[1].$year;
    ?>
<style>
    .inputbxs1{ width: 51px; height:29px;  }
     .inputbxs2{ width: 63px; height:27px;}
     #td{padding: 15px 0px 0px 6px;padding: 8px;}
     #tr{ border-bottom: solid 2px; border-bottom-color:#faa21b;}
     .inputbxs10{ width: 160px; height:27px;}
       .inputbxs11{ width: 158px; height:27px;}
      #td10{padding: 10px 11px 6px 84px;}
     #td11{padding: 10px 11px 6px 67px;}
    </style>
    <script>
        
 function get_product_codeo(){ 
    var int = parseInt((Math.random() * 100), 10);
   var code_gen='OTH'+<?=$code?>+int;
      //alert(code_gen);
    document.getElementById('product_code_geno').value=code_gen;   
     
   }// end function  
  
  
  function get_product_code(){ 
    var int = parseInt((Math.random() * 100), 10);
   var code_gen='PTR'+<?=$code?>+int;
      //alert(code_gen);
    document.getElementById('product_code_gen').value=code_gen;   
     
   }// end function  
    
  
   $(document).ready(function(){ 
    $(document).on("click", ".inputbxs2", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10);
      var code_gen='PTR'+<?=$code?>+int;
      //alert(code_gen);
      document.getElementById('product_code_gen'+myBookId).value=code_gen;  
    });
    });
 
    
 
$(document).ready(function(){ 
    $(document).on("click", ".inputbxs11", function () {
     var myBookId = $(this).data('id');
      var int = parseInt((Math.random() * 100), 10);
      var code_gen='OTH'+<?=$code?>+int;
      //alert(code_gen);
      document.getElementById('product_code_geno'+myBookId).value=code_gen;  
    });
    });
 
    
     </script>