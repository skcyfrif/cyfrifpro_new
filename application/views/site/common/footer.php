<div class="footer">
  <div class="wrapper">
        <div class="footer-col-1">
			<h2>About Us</h2>
			<p>Cyfrifpro is a leading outsourcing and investment solutions company offering country-wide business services.</p>
			<h3>Utkal Signature Building Plot No - 273 8th Floor
Pahala, NH-5 Bhubaneswar, 752101</h3>
			

		<ul class="footer-social">
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
		</ul>
			
		</div>
    
    <div class="footer-col-2">
	<h2>Information</h2>
            <ul>
              <li><a href="#"><i class="fa fa-angle-right"></i> Home</a></li>
                <li><a href="<?php echo base_url();?>about-us"><i class="fa fa-angle-right"></i> About</a></li>
                <li><a href="<?php echo base_url();?>Vision-&-Value"><i class="fa fa-angle-right"></i> Vision & Value</a></li>
                <!--<li><a href="#"><i class="fa fa-angle-right"></i> Services</a></li>-->
                <li><a href="<?php echo base_url();?>Blog"><i class="fa fa-angle-right"></i> Blog</a></li>
                <li><a href="<?php echo base_url();?>Faq"><i class="fa fa-angle-right"></i> FAQ</a></li>
                <li><a href="<?php echo base_url();?>contact-us"><i class="fa fa-angle-right"></i> Contact Us</a></li>
                <li><a href="<?php echo base_url();?>career"><i class="fa fa-angle-right"></i> Career</a></li>
            </ul>
      
    </div>
    <div class="footer-col-3">
	<h2>Our Services</h2>
            <ul>             
                <li><a href="http://www.cyfrif.com/Finance-And-Accounts"><i class="fa fa-angle-right"></i> Finance And Accounts Services</a></li>
                <li><a href="http://www.cyfrif.com/Inventory-Management"><i class="fa fa-angle-right"></i> Inventory Management</a></li>
                <li><a href="http://www.cyfrif.com/Tax-Services"><i class="fa fa-angle-right"></i> Tax Services</a></li>
                <li><a href="http://www.cyfrif.com/CREDIT-REPAIR-AND--DEBT-MANAGEMENT-SERVICES"><i class="fa fa-angle-right"></i> Credit Repair And Debt Management Services</a></li>
                <li><a href="http://www.cyfrif.com/Investment"><i class="fa fa-angle-right"></i> Investment solutions Services</a></li>
                <li><a href="http://www.cyfrif.com/Loans"><i class="fa fa-angle-right"></i> Loan Services</a></li>
            </ul>
      
    </div>
    
    <div class="footer-col-4">
      <h2>Get In Touch</h2>
			<ul class="footer-social-list">
				<li>
				<h3>For Support & Help
				<span>0674-2953002</span>
				</h3>
				</li>
				<li>
				<h3>The Office Hours
				<span>Mon - Sat 8am to 6pm</span>
				</h3>
				</li>
				<li>
				<h3>Send Us Email
				<span>info@cyfrif.com</span>
				</h3>
				</li>
			</ul>
    </div>
    </div>
</div>
<div class="copyright">
  <div class="wrapper">
          <p>Copyright &copy; 2022  CYFRIFPRO. All Rights Reserved</p>
       
    </div>
</div>

<!--<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
	//$(".inner-page-content-row-odd").css("padding-top","122px");
	//$(".inner-page-content-row-even").css("padding-top","122px");

  } else {
    header.classList.remove("sticky");
	//$(".inner-page-content-row-odd").css("padding-top","20px");
	//$(".inner-page-content-row-even").css("padding-top","20px");
  }
}
</script>
--><script>
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
<script src="<?php echo base_url();?>assets/site/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/site/js/animate.js"></script>
<script src="<?php echo base_url();?>assets/site/js/menumaker.js"></script>
<script type="text/javascript">
	$("#cssmenu").menumaker({
		title: "Menu",
		format: "multitoggle"
	});
</script>
</body>
</html>