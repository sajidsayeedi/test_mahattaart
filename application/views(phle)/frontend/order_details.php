<script type="text/javascript">
			$(document).ready(function() {

				//syntax highlighter
				hljs.tabReplace = '    ';
				hljs.initHighlightingOnLoad();

				//accordion
				$('h3.accordion').accordion({
					defaultOpen: 'body-section1',
					cookieName: 'accordion_nav',
					speed: 'slow',
					animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
						elem.next().slideFadeToggle(opts.speed);
					},
					animateClose: function (elem, opts) { //replace the standard slideDown with custom function
						elem.next().slideFadeToggle(opts.speed);
					}
				});
	

				//custom animation for open/close
				$.fn.slideFadeToggle = function(speed, easing, callback) {
					return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
				};

			});
		</script>

    <script>
		$(document).ready(function(){

		$("#form1").submit(function(){	
		var passw=$('#pwd').val();
		var repassw=$('#conpwd').val();
		if($('#pwd').val()=="")
		{
			$('#pwd_error').html("Please Enter The Password");
			return false;
		}
		else if($('#conpwd').val()=="")
		{   
			$('#pwd_error').html("");
		    $('#conpwd_error').html("Please Re Enter The Password");
		return false;
	     }
		else if(passw!=repassw)
	     {    $('#pwd_error').html("");
	          $('#conpwd_error').html("");
	           $('#conpwd_error').html("Please Re Enter The Same Password");
	            return false;
		}
		else if($('#fname').val()=="")
		{ 
			    $('#pwd_error').html(""); 
				$('#conpwd_error').html("");
			    $('#fname_error').html("Please Enter The First Name");
			            return false;
				}
		      else if($('#phone').val().length<'10')
				{
					$('#pwd_error').html(""); 
					$('#conpwd_error').html("");
				    $('#fname_error').html("");
				    $('#phone_error').html("Please Enter 10 digit Mobile No.");
				    return false;
				}
		
	});

		
	
			//Examples of how to assign the ColorBox event to elements
			
			$(".loginlogout").colorbox({width:"308px", height:"380px", iframe:true});

			
		});
                
                
           function numbersonly(e){
		var unicode=e.charCode? e.charCode : e.keyCode
		if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
		if (unicode<48||unicode>57) //if not a number
		return false //disable key press
		}
	}		
	     
</script>
<div class="main-container">
    	
        <div class="pagination">
 <span> <a href="<?php print base_url();?>index.php">HOME</a> > My Account > <span> Profile</span> </span>
        </div>
        
        <!-- art style -->
        <div class="art-style">
        	
            <!-- aside -->
            <aside style="width: 150px;">
            	<p>Let Us Help</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>index.php/frontend/contact">Contact us</a></li>
                        <li><a href="<?=base_url()?>index.php/frontend/faq">FAQ's</a></li>
                        <li><a href="#">Ordering</a></li>
                        <li><a href="#">Shipping & Delivery</a></li>
                    </ul>
                </div>

                <p>My Account</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>index.php/frontend/contact">My Profile</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="<?=base_url()?>index.php/user/order_history">Order History</a></li>
                    </ul>
                </div>
                
                <p>Mahatta art</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>index.php/frontend/about">The Company</a></li>
<!--                        <li><a href="<?=base_url()?>index.php/frontend/media_center">Media Center</a></li>-->
                        <li><a href="<?=base_url()?>index.php/frontend/career">Careers</a></li>
                        <li><a href="<?=base_url()?>index.php/frontend/partner">Partners</a></li>
                    </ul>
                </div>
                
            </aside>
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel">
            	
                <!--  Art Movements -->
                	<div class="art-movements">
                        <div class="art-inner" style="position:absolute;">
                            <p>My Profile</p>
                            <img src="<?php print base_url();?>assets/img/profile.jpg" width="710" height="210" border="0">
                        </div>
                    </div>
					
            
            <!-- right panel -->
            <div class="right-panel">
            	
                <!--  Art Movements -->
                	<div class="art-movements">
                        <div class="art-inner">
                            <p>Order History</p>
                            <img src="img/oderhistry.jpg" width="697" height="210" border="0">
                        </div>
                    </div>
                    
                    <div class="orderhistroywrap">
                        <div class="orderhistroy">
                            <ul>
							    <li>Product.Id-</li>
                                <li>Order ID</li>
                                <li>File Name</li>
                                <li>Product Image</li>
                               
                                <li>Status</li>
								 <li>AWB No./Courier Partner(Useful for tracking.)</li>
								 
                            </ul>        
                        </div>
                 <?php 
				 //print_r($order_idd);
				// $orders=$this->frontend_model->get_tbl_order_details();
				// print_r($orders);
				 foreach($order_idd as $order_id){
				 $sr_id=$order_id->sr_id;
				 $invoice_id=$order_id->invoice_id;
				 $xyz=$this->user_model->get_tracking_id($sr_id,$invoice_id);
				 //print_r($xyz);
				 $file_name=$order_id->sku_id;
 $search_file = "http://api.indiapicture.in/wallsnart/search.php?q=$file_name&page=1&per_page=1";
$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);

$search_data_file = file_get_contents($search_file, false, $context);
$search_data_r=json_decode($search_data_file,TRUE);
//print_r($search_data_r);
$collection_id=$search_data_r['results'][0]['image_collection_id'];
$image_id=$search_data_r['results'][0]['image_id'];

				 ?>
                        <div class="odd">
                            <ul>
							    <li><?=$order_id->sr_id;?></li>
                                <li><?=$order_id->invoice_id;?></li>
                                <li><?=$order_id->sku_id;?></li>
                                <li style="background:rgba(0, 0, 0, 0) url('<?=base_url()?>images/uploaded_pdf/mount/<?=$order_id->mount_color;?>.jpg') no-repeat scroll 0 0 / cover ; border-image: url('<?=base_url()?>images/uploaded_pdf/frames/horizontal/<?=$order_id->frame_color;?>.jpg') 10 10 10 10 round round;margin-left:50px" class="mainhor"><a href="<?=base_url()?>index.php/search/image_detail/<?=$file_name?>/<?=$image_id?>/<?=$collection_id?>"><img src="http://static.mahattaart.com/398/<?=$order_id->sku_id;?>"width="100%" /></a></li>
                                 <li><?=$order_id->updated_status;?></li>
								 
								 <li><?php 
								 foreach($xyz as $trk_id){
								 //$trk_id->sub_tracking_id;
								 ?><p><?=$trk_id->tracking_id;?></p><br> <?php
								 }
								 ?></li>
								
                               
                            </ul>        
                        </div>
               <?php
			   }
			   ?>
                        
                    </div>
                </div>
                <!--  Art Movements -->
 
            </div>
            <!-- right panel -->
            
        </div>
        <!-- art style -->
        
    </div>
    <!-- container -->
    
    
    <!-- footer -->
 <style>
.mainhor {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  
  border-color: transparent;
 
  border-style: solid;
  border-width: 10px;
  padding: 10px;
}

 </style>
