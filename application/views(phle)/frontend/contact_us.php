<?php 
if($this->session->userdata('userid'))
{
$Obj=new Frontend();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 
?>
<div class="main-container container">
        <div class="pagination" style="margin:0">
        	<span> <a href="<?=base_url()?>frontend/index"> HOME </a> > Let Us Help > <span> Contact </span> </span>
        </div>    	
        <!-- art style -->
        <div class="art-style">
            <!-- aside -->
            <aside class="left-panel-page">
            	<p>Let Us Help</p>
            	<div class="list">
                	<ul>
                    	<li class="active-cat-link" style="color:#339900; font-size:16px;">Contact us</li>
                        <li><a href="<?=base_url()?>frontend/faq">FAQ's</a></li>
                        <li><a href="<?php echo base_url()?>frontend/ordering">Ordering</a></li>
                        <li><a href="<?php echo base_url()?>frontend/shipping">Shipping & Delivery</a></li>
                    </ul>
                </div>
          <?php if($this->session->userdata('userid')){?>
                <p>My Account</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?php print base_url();?>user/profile">My Profile</a></li>
                           <li><a href="<?php echo base_url()?>frontend/ordering">Track My Order</a></li>
                               <li><a href="<?php echo base_url()?>frontend/ordering">Order History</a></li>
                    </ul>
                </div>
                <?php }?>
                <p>Mahatta-Art</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>frontend/about">The Company</a></li>
                       
                        <li><a href="<?=base_url()?>frontend/career">Careers</a></li>
                        <li><a href="<?=base_url()?>frontend/partner">Partners</a></li>
                    </ul>
                </div>
                
            </aside>
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel-page">
            	
                <!--  Art Movements -->
                	<div class="art-movements">
                        <div class="art-inner">
                            <p>Contact Us </p>
                            <img src="<?php print base_url();?>assets/img/contact.jpg" border="0" class="img-responsive">
                        </div>
                    </div>
                    
                    <div class="career-page">
                        <h2>Corporate Office</h2>
                        <p>8/17, Ground Floor, Sarvapriya Vihar,  New Delhi -110016</p>
                        
                        <h2 class="margin-top">Call Us</h2>
                        <p>Tel : 91-11-41828972</p>
                        
                        <h2 class="margin-top">Mail Us</h2>
                        <p>Send a note to <a href="mailto:info@mahattaart.com"> info@mahattaart.com </a>  and we'll get back to you as quickly as possible. To make sure you receive our response, be sure to add us to your contact list.</p>
						
						<p>&nbsp;  </p> 
						<p>&nbsp;  </p> 
						
                    </div>
                </div>
                <!--  Art Movements -->
 
            </div>
            <!-- right panel -->
            
        </div>