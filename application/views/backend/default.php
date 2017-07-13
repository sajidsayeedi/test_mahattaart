<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WallsnArt</title>
<link href="<?=base_url()?>assets/css/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/css/wallsnart1.0.css" rel="stylesheet" type="text/css" />
	
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">

		$(document).ready(function(){
			
		$("#admin_login").submit(function(){
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(	$('#cname').val()=="")
				{
					$('#form_error').html("Enter email");
					return false;
				}
				else if(!emailReg.test($('#cname').val()))
				 	{   
				 		$('#form_error').html("Enter a valid email");
				 		//alert("hi");
					 	return false;
				 	}	
		else if($('#pwdfg').val()=="")
		{
			$('#form_error').html("Please Enter The Password");
			return false;
		}
		});
		
	});
    </script>
</head>

<body>

<div id="login-page-wrapper">
<span style="color:#F00"></span>
<div class="login-bg-image"><div class="logo-holder"><img src="<?=base_url()?>assets/images/logo.png" /></div>
   <?php if($this->session->userdata('userid')==''){?>
    <div class="login-details-bg">
	
        <form action="<?=base_url()?>index.php/backend/index" method="post" id="admin_login">
         
		 
		<div class="login-detail-div">
		  <input type="text" name="cname" id="cname" class="uname" />
          <input type="password" name="pwdfg" id="pwdfg" class="pwd" />
		  <span style="color:#F00"><?php print $msg;?></span><br>
             <select name="login_user"  class="dropdown">
			 <option value="1">Admin</option>
			 <option value="2">Vendor</option>
			 </select> 
			   
        <input type="submit" name="sbt" id="sbt" value="Submit" class="login-sbt" /> 
        <a href="#" class="forgot-pw">Forgot Password </a></div>
        
        <div class="reg-msg">To begin submitting your photographs 
to Walls n Art for representation, 
please register. </div>
<div><a href="#" class="register-bt"> Register</a></div>
        </form>
    </div>
    
  </div>
   <?php }?>

</div>
<style>
.dropdown{font-family: 'MyriadProLight';
    font-weight: normal; background-color: #000000;
   
    padding: 8px 0 8px 0;
    width: 135px;
    color: #fff;
    font-size: 16px;
    text-transform: uppercase;
    border: 1px solid #515151;
    margin: 10px 15px 15px 0;
    cursor: pointer;
	}
</style>
