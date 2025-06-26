<!DOCTYPE html>
<html>
<head>
<title>Welcome To Our Website</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
<!--<link href="https://fonts.googleapis.com/css?family=Lato|Poppins:300i,400,500,600&display=swap" rel="stylesheet">-->
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700&display=swap" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet"/>
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
  <a href="http://s691948366.onlinehome.us/demo/cyfrif" class="logo"><img src="images/LOGO-1.svg" height="58"></a>
    <ul class="clearfix">
      <li><a href="http://s691948366.onlinehome.us/demo/cyfrif">Home</a></li>
      <li><a href="about-us.html">About</a></li>
      <li><a href="#">Services <i class="fa fa-caret-down"></i></a>
        <ul>
          <li><a href="#">Biz Registration</a>
            <ul>
              <li><a href="#">Private Limited Company</a></li>
              <li><a href="#">Limited Liability Partnership (LLP)</a></li>
              <li><a href="#">Foreign Subsidiary</a></li>
              <li><a href="#">One Person Company (OPC)</a></li>
              <li><a href="#">Public Limited Company</a></li>
              <li><a href="#">Partnership Firm</a></li>
              <li><a href="#">Sole Proprietorship</a></li>
              <li><a href="#">Non-Banking Finance Company (NBFC)</a></li>
              <li><a href="#">Charitable Company (Section 8)</a></li>
              <li><a href="#">Producer Company</a></li>
            </ul>
          </li>
          <li><a href="#">Biz Licenses</a>
            <ul>
              <li><a href="#">Permanent Account Number (PAN)</a></li>
              <li><a href="#">Tax Account Number (TAN)</a></li>
              <li><a href="#">Goods and Service Tax (GST- Individuals)</a></li>
              <li><a href="#">Goods and Service Tax (GST- LLP)</a></li>
              <li><a href="#">Goods and Service Tax (GST- Companies)</a></li>
              <li><a href="#">Goods and Service Tax (GST- Others)</a></li>
              <li><a href="#">Profession Tax (PTEC/PTRC)</a></li>
              <li><a href="#">Import Export Code (IEC)</a></li>
              <li><a href="#">Startup India Registration</a></li>
              <li><a href="#">MSME Registration</a></li>
              <li><a href="#">Any other License</a></li>
            </ul>
          </li>
          <li><a href="#">Biz Accounts</a>
            <ul>
              <li><a href="#">Accounting Packages</a></li>
              <li><a href="#">Income Tax Advisory Services</a></li>
              <li><a href="#">GST Advisory Services</a></li>
              <li><a href="#">TDS Advisory Services</a></li>
              <li><a href="#">GST Returns</a></li>
              <li><a href="#">Income Tax Returns</a></li>
              <li><a href="#">TDS Returns</a></li>
            </ul>
          </li>
          <li><a href="#">Biz Legal Services</a>
            <ul>
              <li><a href="#">Copyright</a></li>
              <li><a href="#">Patent Search</a></li>
              <li><a href="#">Provisional Patent</a></li>
              <li><a href="#">Permanent Patent</a></li>
              <li><a href="#">Trademark Registration</a></li>
              <li><a href="#">Trademark Opposition</a></li>
              <li><a href="#">Trademark Assignment</a></li>
              <li><a href="#">Trademark Renewal</a></li>
              <li><a href="#">Drafting Assistance </a></li>
            </ul>
          </li>
          <li><a href="#"> Biz Companies Compliances </a>
          <a href="#">  Biz LLP/FEMA Compliances  </a>
          <a href="#">  Biz LLP/FEMA Compliances  </a>
          <a href="#">  Biz Tax Routine Compliances  </a>
          <a href="#">  Biz Tax Routine Compliances  </a>
          <a href="#"> Biz Personalised </a>
            
          </li>
        </ul>
      </li>
      <li><a href="information-hub.html">Information Hub</a></li>
      <!--<li><a href="#">Contact</a>
        <ul>
          <li><a href="#">School</a>
            <ul>
              <li><a href="#">Lidership</a></li>
              <li><a href="#">History</a></li>
              <li><a href="#">Locations</a></li>
              <li><a href="#">Careers</a></li>
            </ul>
          </li>
          <li><a href="#">Study</a>
            <ul>
              <li><a href="#">Undergraduate</a></li>
              <li><a href="#">Masters</a></li>
              <li><a href="#">International</a></li>
              <li><a href="#">Online</a></li>
            </ul>
          </li>
          <li><a href="#">Study</a>
            <ul>
              <li><a href="#">Undergraduate</a></li>
              <li><a href="#">Masters</a></li>
              <li><a href="#">International</a></li>
              <li><a href="#">Online</a></li>
            </ul>
          </li>
          <li><a href="#">Empty sub</a>
          	<ul>
          		<li><img src="http://www.pgecurrents.com/wp-content/uploads/2012/05/300x200_ggb_fort_point.jpg"></li>
          	</ul>
          </li>
        </ul>
      </li>-->
      <li><a href="blog.html">Blog</a></li>
      <li><a href="#">Login</a>
        <ul>
          <li><a href="#">Admin Login</a></li>
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

<div class="banner-main">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Information Hub</h2>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li>/</li>
						<li>Information Hub</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</div>
<div class="content-row-1-hub">
	<div class="wrapper">
    	<div class="blog-cat">
	<div class="container">
		<ul>
			<li>
				<a href="#">Top Stories</a>
			</li>	<li>|</li>
							<li><a href="#">Income Tax</a></li>
				<li>|</li>
							<li><a href="#">Goods &amp; Service Tax</a></li>
				<li>|</li>
							<li><a href="#">RBI / FEMA</a></li>
				<li>|</li>
							<li><a href="#">SEBI</a></li>
				<li>|</li>
							<li><a href="#">MCA / IBC</a></li>
				<li>|</li>
							<li><a href="#">Articles</a></li>
				<li>|</li>
							<li><a href="#">Resolutions</a></li>
				<li>|</li>
							<li><a href="#">Due Date Calendar</a></li>
				<li>|</li>
						
		</ul>
	</div>
</div>
    </div>
</div>
<div style="width:100%; float:left; text-align:center; padding:100px 0;">
<h2 style="font-size: 30px;text-transform: capitalize;color: #3a4172; margin: 20px 0;font-family: 'Nunito Sans', sans-serif !important;">Coming <span style="color: #009999; font-family: 'Nunito Sans', sans-serif !important;">Soon</span></h2>

</div>	
<div class="content-row-7">
	<div class="wrapper">
    	<h2>Switch to Smart <span>Inventory & Accounting</span>Management. Switch to <span>CYFRIF</span></h2>
        <form>
        	<ul class="iti-flag">
            	<li>
                	<div class="input-container">
                        <i class="fa fa-user-o icon"></i>
                        <input class="input-field" type="text" placeholder="Username" >
                    </div>
                </li>
                <li>
                	<div class="input-container" style="position:relative;">
                        <div class="icon2">
                			<img src="images/india-flag.jpg"> +91 <i class="fa fa-caret-down"></i>
                    	</div>
                        <input class="input-field" type="text" placeholder="Mobile No." >
                    </div>
                </li>
                <li><div class="input-container">
                        <i class="fa fa-envelope-o icon"></i>
                        <input class="input-field" type="text" placeholder="E-mail" >
                    </div></li>
                <li><button type="submit" class="btn btn-primary">Submit</button></li>
            </ul>
        </form>
</div>
</div>
<div class="footer">
	<div class="wrapper">
        <div class="footer-col-1">
            <img src="images/footer-logo.png">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
    </div>
    
    <div class="footer-col-2">
    	<h2>Menu</h2>
            <ul>
            	<li><a href="#"><i class="fa fa-angle-right"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> About</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Services</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Blog</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Faq</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Contact Us</a></li>
            </ul>
    </div>
    <div class="footer-col-3">
    	<h2>Contact</h2>
            <ul>
            	<li><a href="#"> <i class="fa fa-envelope-o"></i> info@example.com</a></li>
                <li><p>
                		Acrux Neon Building</br>
                        Block - C,C-002, Hanspal,</br> 
                        Bhubaneswar , Odisha
                    </p>
                </li>
            </ul>
    </div>
    
    <div class="footer-col-4">
    	<h2>Follow Us</h2>
            <ul>
            	<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
    </div>
    </div>
</div>
<div class="copyright">
	<div class="wrapper">
    	<div class="copy-right-left">
        	<p>Copyright &copy; 2019  CYFRIF. All Rights Reserved</p>
        </div>
        <div class="copy-right-right">
        	<p>Designed By <a href="#">Shilabs Private Limited</a></p>
        </div>
    </div>
</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
