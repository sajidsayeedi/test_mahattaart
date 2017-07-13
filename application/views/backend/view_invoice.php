<?php //print_r($company_name).'asdadas';?>
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">
<script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<div id="middle-wrapper">
  <div id="middle-container" style="width:96%">
    <div class="main-hdr"> View Invoice</div>
    <script>    function search_by_company(company_name){        window.location.href="<?=base_url()?>index.php/backend/view_invoices/"+company_name;    }    function search_by_contact_person(contact_person){       // alert(contact_person);        window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/"+contact_person;    }    function search_by_sales_person(sales_person){      window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/"+sales_person;    }    function search_by_region(region){        window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/none/"+region;    }          function search_by_quotation_id(quotation_id){        window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/none/none/"+quotation_id;    }        function search_by_quotation_status(status){        window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/none/none/none/"+status;    }        function search_by_date(){        var from =$('#from').val();        var to =$('#to').val();        var search_date=from+'_'+to;        //alert(search_date);        window.location.href="<?=base_url()?>index.php/backend/view_invoices/none/none/none/none/none/none/"+search_date;    }            </script>
    <div class="view-cp">
      <div class="searchc" style="width:100%">Search Parameters</div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="120">Company Name</td>
          <td width="280"><select id="customer_id" name="customer_id" onchange="return search_by_company(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
              <optgroup  >
              <option value="">--Select--</option>
              </optgroup>
              <?php foreach ($company_name as $c_name):?>
              <option value="<?=$c_name->company_name?>">
              <?=$c_name->company_name?>
              </option>
              <?php endforeach;?>
            </select>
          </td>
          <td width="150">Contact Person</td>
          <td><select id="contact_person" name="contact_person" onchange="return search_by_contact_person(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
              <optgroup  >
              <option value="">--Select--</option>
              </optgroup>
              <?php foreach ($conact_person as $con_name):?>
              <option value="<?=$con_name->client_servicing?>">
              <?=$con_name->client_servicing?>
              </option>
              <?php endforeach;?>
            </select>
          </td>
          <td width="150">Sales Person</td>
          <td><select id="sales_person" name="sales_person" onchange="return search_by_sales_person(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
              <optgroup  >
              <option value="">--Select--</option>
              </optgroup>
              <?php foreach ($sales_person as $sale_name):?>
              <option value="<?=$sale_name->sales_person?>">
              <?=$sale_name->sales_person?>
              </option>
              <?php endforeach;?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Region</td>
          <td><select name="region" id="region" class="inputs" onchange="return search_by_region(this.value);">
              <option selected="selected" value=""> Select  Region</option>
              <option>East</option>
              <option>West</option>
              <option>North</option>
              <option>South</option>
            </select></td>
          <td>Invoice Status</td>
          <td><select name="operation2" id="operation2" class="inputs" onchange="return search_by_quotation_status(this.value);">
              <option selected="selected">---Select---</option>
              <option value="0">In progress</option>
              <option value="1">Finished</option>
            </select></td>
          <td>Invoice Id</td>
          <td><select id="order_id" name="order_id" onchange="return search_by_quotation_id(this.value);" class="selectpicker" data-hide-disabled="true" data-live-search="true">
              <optgroup  >
              <option value="">--Select--</option>
              </optgroup>
              <?php while($q_id=  mysql_fetch_object($invoice_dist)):?>
              <option value="<?=$q_id->invoice_id?>">
              <?=$q_id->invoice_id?>
              </option>
              <?php endwhile;?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Statement Period</td>
          <td><input name="from" type="date" id="from" style="width: 120px;"   class="date-range">
            -
            <input name="to" type="date" id="to" class="date-range" style="width: 120px;" onblur="search_by_date();"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div>
    <div id="PhotographersListDiv" >
      <div class="customer-list">
        <div class="hdrlist" style="width:140px">ORDER List</div>
        Total Orders : <span class="count">
        <?=$totals;?>
        </span> </div>
      <div class="view-cp-list">
        <?php if($msg<>'') {?>
        <script>              setTimeout(function(){outtime()},3000);              function outtime(){                  window.location.href="<?=base_url()?>index.php/backend/view_invoices";              }           </script>
        <?php echo $msg;}?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div class="viewcplist-inner">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="hdrs">
                    <td>Company Name </td>
                    <td>Discount<br />
                      (if any)</td>
                    <td>Invoice<br />
                      Date</td>
                    <td>Invoice  ID</td>
                    <td>Sales Person</td>
                    <td>Client Servicing</td>
                    <td>Region</td>
                    <td>Amount<br />
                      (Rs.)</td>
                    <td>Convert Into Order</td>
                    <td>Action</td>
                    <td>Create Date</td>
                    <script>// Popup window codefunction newPopup(url) {	popupWindow = window.open(		url,'popUpWindow','height=800,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')}</script>
                  </tr>
                  <?php      $frame_code= $this->uri->slash_segment(3);         $split_code=split('/',$frame_code);     if($split_code[0]<>''){                  $invoice_distinct=$search_data;              }else{                  $invoice_distinct=$invoice_distinct;              }           if(mysql_num_rows($invoice_distinct)>0){          //print_r($invoice_distinct);           while($result=mysql_fetch_assoc($invoice_distinct)):                                    //echo $print['quotation_id'];                     $print=$this->backend_model->get_invoice_data($result['invoice_id']);                ?>
                  <tr>
                    <td><?php echo $print['company_name'];?></td>
                    <td><?php echo $print['discount'];?>
                    <td><?php if($print['convert_to_order']=='1'){ print "Finalised";} else{ print "In Progress";}?></td>
                    <td><?php echo $print['invoice_id'];?></td>
                    <td><?php echo $print['sales_person'];?></td>
                    <td><?php echo $print['client_servicing'];?></td>
                    <td><?php echo $print['region'];?></td>
                    <td><?php echo $print['total'];?></td>
                    <td>
					
					<form name="convertintoorder" action="<?=base_url()?>index.php/backend/convert_into_order" method="post">
                        <input type="submit" name="convetintoorder" value="Convert into Order" style="background-color:#fff; border:none; ">
                        <input type="hidden" name="order_id" value="<?php echo $print['invoice_id'];?>">
                      </form></td>
                    <td><a href="JavaScript:newPopup('<?=base_url()?>index.php/backend/invoice_view/<?=$print['invoice_id'];?>');">View Invoice</a>
                      <?php   echo '<a href="'.base_url().'index.php/orders/delete_invoice_data/'.$print['invoice_id'].'">Delete</a> </td>';                                             ?>
                    <td><?php echo $print['created_date'];?></td>
                  </tr>
                  <?php endwhile; } else{?>
                  <td><span style="color:red">No data Found</span></td>
                    <?php } ?>
                </table>
              </div></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div>
</div>
