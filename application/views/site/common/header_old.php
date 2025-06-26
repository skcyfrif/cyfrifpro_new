<!DOCTYPE html>
<html>
<head>
<title>Welcome To Our Website</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url();?>assets/site/css/style.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
<!--<link href="https://fonts.googleapis.com/css?family=Lato|Poppins:300i,400,500,600&display=swap" rel="stylesheet">-->
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700&display=swap" rel="stylesheet">
<link href="<?php echo base_url();?>assets/site/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
      "use strict";
      $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
      $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
      $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">&nbsp;</a>");
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
</head>

<body>

<?php 

$menus=$this->Main_M->get('tbl_menus','name','ASC');

?>

<div class="header-row-1">
  <div class="wrapper">
      <div class="header-row-1-col-1">
          <ul class="top-contact-list">
              <li><a href="#"><i class="fa fa fa-envelope-o"></i> info@cyfrif.com</a></li>
                <li> <a href="#"><i class="fa fa-phone"></i> (002) 0952279111</a></li>
            </ul>
          
        </div>
        <div class="header-row-1-col-2">
           <ul class="header-social">
                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
             </ul>
        </div>
    </div>
</div>
<div class="header-row-2">
  <div class="wrapper">
      <div class="menu-container">
  <div class="menu">
    <a href="<?php echo base_url();?>" class="logo"><img src="<?php echo base_url();?>assets/site/images/LOGO-1.svg" height="58"></a>
    <ul class="clearfix">
      <li><a href="<?php echo base_url();?>">Home</a></li>
      <li><a href="about-us.html">About</a></li>
      <li><a href="#">Services <i class="fa fa-caret-down"></i></a>
        <ul>
          <?php foreach($menus as $key){ ?>
            <li><a href="#"><?php echo $key->name;?></a>
              <ul>
                <?php 
                  
                $sub_menus=$this->Main_M->get('tbl_sub_menus','name','ASC','menu_id',$key->id);

                foreach($sub_menus as $sub){ ?>
                  <li><a href="#"><?php echo $sub->name;?></a></li>
                <?php } ?>
              </ul>
            </li>
          <?php } ?>
        </ul>
      </li>
      <li><a href="information-hub.html">Information Hub</a></li>

      <li><a href="blog.html">Blog</a></li>
      <li><a href="#">Login</a>
        <ul>
          <li><a href="http://s691948366.onlinehome.us/demo/cyfrif/admin/login">Admin Login</a></li>
          <li><a href="#">Employee Login</a></li>
          <li><a href="#">Customer Login</a></li>
        </ul>
      </li>
      <li><a href="contact-us.html">Contact Us</a></li>
      
    </ul>
  </div>
</div>
    </div>
</div>