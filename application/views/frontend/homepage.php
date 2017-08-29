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
<link rel="stylesheet" href="<?php print base_url();?>assets/css/popular-art-slider.css" type="text/css">
<script src="<?php echo base_url()?>assets/js/jquery.flexslider.js"></script>

<div class="container"><div class="row">
<div id="myCarousel" class="carousel slide col-md-12" data-ride="carousel" style="margin-top:2px">
<div class="carousel-inner" role="listbox">
<div class="item active"> <img src="<?php echo base_url();?>assets/img/slider/sofa.jpg" alt="Chania">
<div class="carousel-caption caption2" style="top:2%">
<div class="welcomee">
<h1 class="text-font"> Framed Art Prints </h1>
<span class="slidercantant"> <span class="centers" style="padding:5px 0 0 0;display:block"> Buy Museum Quality Prints from the World's </span> <span class="centers" style="padding:5px 0 0 0;display:block"> renowned Artists and Photographers </span> <span class="centers" style="padding:5px 0 0 0;display:block"> &nbsp;</span> <a class="buttonslide" href="<?php echo base_url();?>search/dosearch/1/64/fine art painting/1"><span> EXPLORE NOW </span></a> </span> <span class="centers" style="padding:5px 0 0 0;display:block">&nbsp;</span> <span class="centers" style="padding:5px 0 0 0;display:block"> Framed Prints, Canvas Gallery Wrap, Posters! </span> </span> </div>
<div class="carousel-caption caption3" style="left:58%;top:54%"> <span style="font-size:14px;padding:10px;margin-right: 14%;"> Berthe Morisot </span> </div>
</div>
</div>
<div class="item"> <img src="<?php echo base_url();?>assets/img/slider/hold.jpg" alt="Chania">
<div class="carousel-caption caption2">
<div class="welcomee">
<h1 class="text-font"> Free Art Search Assistance </h1>
<br />
<span class="slidercantant"> <span class="centers" style="padding:5px 0 0 0;display:block"> Any specific art requirements for your </span> <span class="centers" style="padding:5px 0 0 0;display:block"> projects or home! </span> <span class="centers" style="padding:5px 0 0 0;display:block"> &nbsp;</span> <a class="buttonslide" href="<?php echo base_url();?>frontend/contact"><span> CONTACT US </span></a> </span>
<div class="carousel-caption caption3" style="top:43%;left:70%"> <span style="font-size:14px;padding:10px; margin-right:73%;"> Claude Monet </span> </div>
</div>
</div>
</div>
<div class="item"> <img src="<?php echo base_url();?>assets/img/slider/flo.jpg" alt="Flower">
    <div class="carousel-caption caption2 caption-flower">
        <div class="welcomee welcomee2">
	        <h1 class="text-font" style="color:#000; text-shadow:none"> Are you an Artist? <br /> Join us and earn  </h1>
    	    <br />
        	<span class="slidercantant on_print">
                <span class="centers" style="padding:5px 0 0 0;display:block;color:#000">  40% on print paid to artists  </span>
                <span class="centers" style="padding:5px 0 0 0;display:block;color:#000">  Global exposure with 100+ international art contributors  </span>
                <span class="centers" style="padding:5px 0 0 0;display:block;color:#000">   Free worldwide marketing promotions  </span>
                <span class="centers" style="padding:5px 0 0 0;display:block;color:#000">   Updates on latest market trends   </span>
                <span class="centers" style="padding:5px 0 0 0;display:block;color:#000">   Removes tedious burden of logistics   </span>
                <span class="centers" style="padding:5px 0 0 0;display:block;color:#000">   Helps to focus only on making art  </span>
                <span class="centers" style="padding:5px 0 0 0;display:block"> &nbsp;</span>
        	<a class="buttonslide" href="http://mahatta.com/submission"><span> START SELLING </span></a>
        	</span>
            <div class="carousel-caption caption3" style="top:45%;left:70%">
	            <span style="font-size:14px;padding:10px; margin-right:40%;">  Narahari Bhawandla  </span>
            </div>
        </div>
    </div>
</div>
<div class="item">
    <img src="<?php echo base_url();?>assets/img/slider/homepage style n space-01.jpg" border="0" />
    	<div class="Map_area">
        	<a href="<?=base_url()?>frontend/themes_view/22" id="map_area_01"></a>
        	<a href="<?=base_url()?>frontend/themes_view/21" id="map_area_02"></a>
        </div>
        <style>
			#map_area_01 {
				position: absolute;
				left: 0;
			}
			#map_area_02 {
				position: absolute;
				right: 0;
			}
		</style>
</div>

<div class="item">
    <img src="<?php echo base_url();?>assets/img/slider/homepage style n space-02.jpg" border="0" />
    <div class="Map_area">
        	<a href="<?=base_url()?>frontend/themes_view/13" id="map_area_03"></a>
            <a href="<?=base_url()?>frontend/themes_view/15" id="map_area_04"></a>
            <a href="<?=base_url()?>frontend/themes_view/17" id="map_area_05"></a>
            <a href="<?=base_url()?>frontend/themes_view/12	" id="map_area_06"></a>
    </div>
    <style>
			#map_area_03, #map_area_04, #map_area_05, #map_area_06 {
				position: absolute;
				bottom:0;
			}
		</style>
</div>

</div>
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="width:20px"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="width:20px"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<div class="top-cate col-md-12">
<h1 class="ttto">TOP CATEGORIES </h1>
</div>
<?php
         $top_cat= $this->frontend_model->get_home_top_category_images('top category','1');
         $top_cat2= $this->frontend_model->get_home_top_category_images('top category','2');
		 $top_cat3= $this->frontend_model->get_home_top_category_images('top category','3');
		 $top_cat4= $this->frontend_model->get_home_top_category_images('top category','4');
		 $top_cat5= $this->frontend_model->get_home_top_category_images('top category','5');
		 $top_cat6= $this->frontend_model->get_home_top_category_images('top category','6');
		 $top_cat7= $this->frontend_model->get_home_top_category_images('top category','7');
		 $top_cat8= $this->frontend_model->get_home_top_category_images('top category','8');
		 $top_cat9= $this->frontend_model->get_home_top_category_images('top category','9');
		 $top_cat10= $this->frontend_model->get_home_top_category_images('top category','10');
        ?>

<div class="tpl-cbs col-md-12"><div class="tpl-cb floatLeft">
<div class="track-group stc2" id="shoptop-test-a" style="display: block ! important;">
<div id="shoptop-layout-a" class="shopTopCategories">
<div class="category">
<a class="st-botanical" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$top_cat[0]->keyword?>/all"><img src="<?php echo base_url();?><?=$top_cat[0]->image?>" class="white-frame-bg"/> <br/>  <?=$top_cat[0]->title?> </a>
</div>
<div class="category">
<a class="st-botanical" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$top_cat6[0]->keyword?>/all"><img src="<?php echo base_url();?><?=$top_cat6[0]->image?>" class="brown-frame-bg" /> <br/> <?=$top_cat6[0]->title?> </a>
</div>
<div class="category">
<a class="st-botanical" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$top_cat2[0]->keyword?>/all"><img src="<?php echo base_url();?><?=$top_cat2[0]->image?>" class="white-frame-bg" />  <br/>  <?=$top_cat2[0]->title?></a>
</div>
<div class="category">
<a class="st-botanical" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$top_cat7[0]->keyword?>/all"><img src="<?php echo base_url();?><?=$top_cat7[0]->image?>" class="black-frame-bg" />  <br/>  <?=$top_cat7[0]->title?></a>
</div>
<div class="category">
<a class="st-botanical" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$top_cat3[0]->keyword?>/all"><img src="<?php echo base_url();?><?=$top_cat3[0]->image?>" class="brown-frame-bg" />  <br/>  <?=$top_cat3[0]->title?></a>
</div>
<div class="category">
<a class="st-botanical" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$top_cat8[0]->keyword?>/all"><img src="<?php echo base_url();?><?=$top_cat8[0]->image?>" class="white-frame-bg"  />  <br/>  <?=$top_cat8[0]->title?></a>
</div>
<div class="category">
<a class="st-botanical" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$top_cat4[0]->keyword?>/all"><img src="<?php echo base_url();?><?=$top_cat4[0]->image?>" class="black-frame-bg"  />  <br/>  <?=$top_cat4[0]->title?></a>
</div>
<div class="category">
<a class="st-botanical" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$top_cat9[0]->keyword?>/all"><img src="<?php echo base_url();?><?=$top_cat9[0]->image?>" class="brown-frame-bg"  /> <br/>   <?=$top_cat9[0]->title?></a>
</div>
<div class="category">
<a class="st-botanical" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$top_cat5[0]->keyword?>/all"><img src="<?php echo base_url();?><?=$top_cat5[0]->image?>" class="white-frame-bg"  />  <br/>  <?=$top_cat5[0]->title?></a>
</div>
<div class="category">
<a class="st-botanical" href="<?php print base_url(); ?>search/dosearch/1/32/<?=$top_cat10[0]->keyword?>/all"><img src="<?php echo base_url();?><?=$top_cat10[0]->image?>" class="black-frame-bg"  />  <br/>  <?=$top_cat10[0]->title?></a>
</div>
</div>
</div>
</div><div style="clear: both;"></div></div>

<!--<div class="top-cate toppe">
<hr class="line">
</div>-->
<div style="clear:both"></div>
<!--bottom top area-->
<div class="col-md-12" style="margin-bottom:30px">
<?php
        $bottom_top= $this->frontend_model->get_home_top_category_images('bottom top');
		
        //echo $bottom_top[0]->title_name;

		  $spit0= split('/',$bottom_top[0]->keyword);
			 $spit1= split('/',$bottom_top[1]->keyword);
			  $spit2= split('/',$bottom_top[2]->keyword);
			   $spit3= split('/',$bottom_top[3]->keyword);
			   
			  	
                                     if($spit0[1]=='frontend'){
                                              $url0=$bottom_top[0]->keyword;
                                          }else{
                                              $url0="search/dosearch/1/32/".$bottom_top[0]->keyword."/all";
                                          }if($spit1[1]=='frontend'){
                                              $url1=$bottom_top[1]->keyword;
                                          }else{
                                              $url1="search/dosearch/1/32/".$bottom_top[1]->keyword."/all";
                                          }if($spit2[1]=='frontend'){
                                              $url2=$bottom_top[2]->keyword;
                                          }else{
                                              $url2="search/dosearch/1/32/".$bottom_top[2]->keyword."/all";
                                          }if($spit3[1]=='frontend'){
                                              $url3=$bottom_top[3]->keyword;
                                          }else{
                                              $url3="search/dosearch/1/32/".$bottom_top[3]->keyword."/all";
                                          }
										 
		  
        ?>

<div class="row" style="padding-top:40px">
<div class="col-md-6 col-sm-6 margn box">
<div class="row">
<div class="col-xs-6 col-md-6 col-sm-6  bg">
<a href="<?php print base_url(); ?><?=$url0;?>">
<img src="<?php echo base_url();?><?=$bottom_top[0]->image?>" class="img-responsive" width="100%" /> </a>
</div>
<div class="col-xs-6 col-md-6 col-sm-6 bg_content">
<h4>
<?=$bottom_top[0]->field1?>
</h4>
<h5>
<?=$bottom_top[0]->title?>
</h5>
<p>
<?=$bottom_top[0]->description?>
</p>
<div style="text-align:right;padding:5px 0"> <a style="color:#6699FF" href="<?php print base_url(); ?><?=$url0;?>"> Read More. </a> </div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 margn box">
<div class="row">
<div class="col-xs-6 col-md-6 col-sm-6  bg"> <a href="<?php echo base_url();?><?=$url1?>"> <img src="<?php echo base_url();?><?=$bottom_top[1]->image?>" class="img-resonsive" width="100%"> </a> </div>
<div class="col-xs-6 col-md-6 col-sm-6 bg_content ">
<h4>
<?=$bottom_top[1]->field1?>
</h4>
<h5>
<?=$bottom_top[1]->title?>
</h5>
<p>
<?=$bottom_top[1]->description?>
</p>
<div style="text-align:right;padding:5px 0"> <a style="color:#6699FF" href="<?php echo base_url();?><?=$url1?>"> Read More. </a> </div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 margn box">
<div class="row">
<div class="col-xs-6 col-md-6 col-sm-6  bg "> <a href="javascript:call_collection(3)"> <img src="<?php echo base_url();?><?=$bottom_top[2]->image?>" class="img-responsive" width="100%"> </a> </div>
<div class="col-xs-6 col-md-6 col-sm-6 bg_content ">
<h4>
<?=$bottom_top[2]->field1?>
</h4>
<h5>
<?=$bottom_top[2]->title?>
</h5>
<p>
<?=ucfirst(strtolower($bottom_top[2]->description))?>
</p>
<div style="text-align:right;"> <a style="color:#6699FF" href="javascript:call_collection(3)"> Read More. </a> </div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 margn box">
<div class="row">
<div class="col-xs-6 col-md-6 col-sm-6  bg"> <a href="<?php print base_url(); ?><?=$url3;?>"> <img src="<?php echo base_url();?><?=$bottom_top[3]->image?>" class="img-responsive" width="100%"></a> </div>
<div class="col-xs-6 col-md-6 col-sm-6 bg_content">
<h4>
<?=$bottom_top[3]->field1?>
</h4>
<h5>
<?=$bottom_top[3]->title?>
</h5>
<p>
<?=$bottom_top[3]->description?>
</p>
<div style="text-align:right;padding:5px 0"> <a style="color:#6699FF" href="<?php print base_url(); ?><?=$url3;?>"> Read More. </a> </div>
</div>
</div>
</div>
</div>
</div>
</div></div>

</div>

<!--bottom slider-->



    

	<script>$(".flexslider").flexslider({animation:"slide",slideshow:false,slideshow:true,});



</script>
<style>
.slides li{border:2px solid #fff;height:210px;margin:0 5px;width:auto!important}
.slides li img{display:block;width:100%;height:auto!important}
.botanica .boxcolor{background:yellowgreen none repeat scroll 0 0;padding:6px}
.botanica img{box-shadow:0 0 0 rgba(0,0,0,0.5)!important}
.botanica a{box-shadow:5px 5px 5px rgba(0,0,0,0.5)}
.botanica .boximg{border:10px solid transparent;border-image:url("http://dev.wallsnart.com/images/contact.png") 20% round}
.onebyone-carosel div > div {
  height: 176px;
  padding-left:0
}

.carousel-inner.onebyone-carosel { margin: auto; width: 90%; }
.onebyone-carosel .active.left { left: -33.33%; }
.onebyone-carosel .active.right { left: 33.33%; }
.onebyone-carosel .next { left: 33.33%; }
.onebyone-carosel .prev { left: -33.33%; }
.carousel-control.left, .carousel-control.right {
  background-image: none;
}

.well {
  background-color: transparent;
  border: medium none;
  box-shadow: none;
  margin-left: 25px;
  margin-right: 10px;
}

#myCarousel2 .left.carousel-control, #myCarousel2 .right.carousel-control {
	width:5%
}

</style>
<script>
$(document).ready(function () {

    $('#addactive').addClass('active');
    $('#myCarousel2').carousel({
        interval: 10000
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        if (next.next().next().length > 0) {
            next.next().next().children(':first-child').clone().appendTo($(this));
        }
        if (next.next().next().length > 0) {
            next.next().next().next().children(':first-child').clone().appendTo($(this));
        }
        if (next.next().next().length > 0) {
            next.next().next().next().next().children(':first-child').clone().appendTo($(this));
        }
        else {
			//alert('elss')
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
});
</script>

<style>
.main-container.container {
  padding-bottom: 30px;
}


.carousel.fdi-Carousel.slide {
  background-color: #f5f5f5;
}
.shopTopCategories {
	box-sizing: border-box;
	column-gap: 30px;
	margin: 0 auto -16px;
	max-width: 100%;
	text-align: center;
}
.shopTopCategories .category {
  display: inline-block;
  margin: 0 auto 16px;
}
.shopTopCategories .category a {
	color: #4c4c4c;
	display: block;
	font-family: BebasFamily,BebasNeue,"Bebas Neue",Helvetica,Arial,sans-serif;
	font-size: 17px;
	font-weight: 200;
	letter-spacing: 0.05em;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
}
.shopTopCategories .category {
	display: inline-block;
	margin: 0 auto 16px;
}
.tpl-cb {
  width: 100%;
}
.floatLeft {
  float: left;
}
.white-frame-bg {
	border-color: transparent;
	border-image: url("<?php print base_url(); ?>header_images/white_frame_bg.jpg") 5% round;
	border-style: solid;
	border-width: 10px;
	padding: 5px;
	margin-bottom: 10px;
}

.brown-frame-bg {
  border-color: transparent;
  border-image: url("<?php print base_url(); ?>header_images/brown_frame_bg.jpg") 5% round;
  border-style: solid;
  border-width: 10px;
  padding:5px;
  margin-bottom:10px
}

.black-frame-bg {
  border-color: transparent;
  border-image: url("<?php print base_url(); ?>header_images/black_frame_bg.jpg") 5% round;
  border-style: solid;
  border-width: 10px;
  padding:5px;
  margin-bottom:10px
}

.shopTopCategories .category img {
	height: auto;
	width: 80%;
}
</style>