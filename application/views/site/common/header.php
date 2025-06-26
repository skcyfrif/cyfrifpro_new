<!DOCTYPE html>
<html>
<head>
  <meta name="google-site-verification" content="VFXEDoN_3160W4N9j5ob0RPU-cs4NMF0QJ48-9OffX8" />
<title>Welcome To Our Website</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/css/menumaker.css">
<link href="<?php echo base_url();?>assets/site/css/style.css" rel="stylesheet" type="text/css" />

<!--<link href="https://fonts.googleapis.com/css?family=Lato|Poppins:300i,400,500,600&display=swap" rel="stylesheet">-->
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Open+Sans:300,400,600,700|Poppins:400,500,600,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Saira+Condensed:400,500,600,700&display=swap" rel="stylesheet">

<link href="<?php echo base_url();?>assets/site/css/bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>assets/site/css/animate.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="<?php echo base_url();?>assets/site/js/classie.js"></script>
<script>
function init() {
	window.addEventListener('scroll', function(e) {
		var distanceY = window.pageYOffset || document.documentElement.scrollTop,
				shrinkOn = 450,
				header2 = document.querySelector(".header2");
		if (distanceY > shrinkOn) {
			classie.add(header2, "smaller");
		} else {
			if (classie.has(header2, "smaller")) {
				classie.remove(header2, "smaller");
			}
		}
	});
}
window.onload = init();
</script>

<script>
	$(document).ready(function() {
		  "use strict";
		  $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
		  $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
		  $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">Menu</a>");
		  $(".menu > ul > li").hover(function(e) {
		    if ($(window).width() > 943) {
		      $(this).children("ul").stop(true, false).fadeToggle(150);
		      e.preventDefault();
		    }
		  });
		  $(".menu > ul > li").click(function() {
		    if ($(window).width() <= 943) {
		      $(this).children("ul").fadeToggle(150);
		    }
		  });
		  $(".menu-mobile").click(function(e) {
		    $(".menu > ul").toggleClass('show-on-mobile');
		    e.preventDefault();
		  });
		});
		$(window).resize(function() {
		  $(".menu > ul > li").children("ul").hide();
		  $(".menu > ul").removeClass('show-on-mobile');
		});
</script>
<script>
	    $(document).ready(function() {
        $('#shocountry').click(function() {
                $('.country-list').slideToggle("fast");
        });
    });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-202695776-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-202695776-1');
  gtag('config', 'AW-332474707');
  gtag('config', 'AW-332474707/1KsQCKUFENPSxJ4B', {
    'phone_conversion_number': '07008937383'
  });
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5daeec9fdf22d91339a06bad/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '3102006836544209'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=3102006836544209&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->



</head>

<body>
<?php 

$menus=$this->Main_M->get('tbl_menus','show_no','ASC');

?>
<div class="header-top">
	<div class="wrapper">
			<ul>
				<li><a href="#">Mail: info@cyfrif.com</a></li>
				<li>Registered Office: Utkal Signature Building Plot No - 273 8th Floor Pahala, NH-5 Bhubaneswar, 752101</li>
			</ul>
	</div>
</div>
<div class="header-row-2">
	<div class="wrapper">
    	<div class="header-row-2-col-1">
        	<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/site/images/logo.png"></a>
        </div>
		
        <div class="header-row-2-col-2">
            	   <div class="menu">
    <ul class="clearfix">
      <li><a href="<?php echo base_url();?>">Home</a></li>
      <li><a href="<?php echo base_url();?>about-us">About</a></li>
      <li><a href="#">Services <i class="fa fa-caret-down"></i></a>
        <ul> 
        <?php foreach($menus as $key){ ?>
          <li><a href="<?php echo base_url().$key->url;?>"><?php echo $key->name;?></a>
            <ul>
              <?php 
                
              $sub_menus=$this->Main_M->get('tbl_sub_menus','id','ASC','menu_id',$key->id);

              foreach($sub_menus as $sub){ ?>

                <li><a href="<?php echo base_url().$key->url.'#'.$sub->url;?>"><?php echo $sub->name;?></a></li>

              <?php } ?>
            </ul>
          </li>
        <?php } ?>
        </ul>
      </li>
      <li><a href="<?php echo base_url();?>information-hub">Information Hub</a></li>
      <li><a href="<?php echo base_url();?>Blog">Blog</a></li>
      <li><a href="#">Login</a>
        <ul>
          <!-- <li><a href="http://s691948366.onlinehome.us/demo/cyfrif/admin/login">Admin Login</a></li> -->
          <li><a href="<?php echo base_url();?>employee/login" target="_blank">Employee Login</a></li>
          <li><a href="<?php echo base_url();?>client/login" target="_blank">Client Login</a></li>
        </ul>
      </li>
      <li><a href="<?php echo base_url();?>contact-us">Contact Us</a></li>
      
    </ul>
  </div>
            
        	<!--<div class="search-box">
        <input type="text" placeholder="Search" />
        <input type="submit" value=""  />
      </div>-->
            <div class="login">
            	<!-- <a href="#"><img src="<?php echo base_url();?>assets/site/images/login.png"> login</a> -->
            </div>
        </div>
    </div>
</div>


