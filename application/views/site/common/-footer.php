<div class="footer">
  <div class="wrapper">
        <div class="footer-col-2">
            <!--<img src="<?php echo base_url();?>assets/site/images/logo.png">
            <p>Cyfrifpro is a leading company offering world-wide business services like Finance & Accounts, Loan, Debt Management, Investment, Accounting Software, Advisory Services to Individual as well as Business Houses, Cost Management, Risk Management, Accounts Management and Research & Analysis. </p>-->
            <h2>Information</h2>
            <ul>
              <li><a href="#"><i class="fa fa-angle-right"></i> Home</a></li>
                <li><a href="<?php echo base_url();?>about-us"><i class="fa fa-angle-right"></i> About</a></li>
                <li><a href="<?php echo base_url();?>Vision-&-Value"><i class="fa fa-angle-right"></i> Vision & Value</a></li>
                <!--<li><a href="#"><i class="fa fa-angle-right"></i> Services</a></li>-->
                <li><a href="<?php echo base_url();?>Blog"><i class="fa fa-angle-right"></i> Blog</a></li>
                <li><a href="<?php echo base_url();?>Faq"><i class="fa fa-angle-right"></i> Faq</a></li>
                <li><a href="<?php echo base_url();?>contact-us"><i class="fa fa-angle-right"></i> Contact Us</a></li>
                <li><a href="<?php echo base_url();?>career"><i class="fa fa-angle-right"></i> Career</a></li>
            </ul>
    </div>
    
    <div class="footer-col-2">
      <h2>Services</h2>
            <ul>             
                <li><a href="<?php echo base_url();?>Consultancy-Services"><i class="fa fa-angle-right"></i> Consultancy Services</a></li>
                <li><a href="<?php echo base_url();?>Debt-Management"><i class="fa fa-angle-right"></i> Debt Management</a></li>
                <li><a href="<?php echo base_url();?>Finance-And-Accounts"><i class="fa fa-angle-right"></i> Finance And Accounts</a></li>
                <li><a href="<?php echo base_url();?>Investment"><i class="fa fa-angle-right"></i> Investment</a></li>
                <li><a href="<?php echo base_url();?>Loans"><i class="fa fa-angle-right"></i> Loans</a></li>
                <li><a href="<?php echo base_url();?>Optimized-And-Accelerate-Services"><i class="fa fa-angle-right"></i> Optimized And Accelerate Services</a></li>
            </ul>
    </div>
    <div class="footer-col-3">
      <h2>Contact</h2>
            <ul>
              <!--<li><a href="#"> <i class="fa fa-envelope-o"></i> care@cyfrif.com</a></li>
              <li><a href="#"> <i class="fa fa-envelope-o"></i> 0674-2953002</a></li>-->
                <!--<li>
                 <p>
                 <strong>Registered Office :- </strong></br> 
                 Acrux Neon Building</br>
                        Block - C,C-002, Hanspal,</br> 
                        Bhubaneswar, Odisha
                    </p>
                </li>-->
               
            </ul>
    </div>
    
    <div class="footer-col-4">
      <h2>Follow Us</h2>
            <ul>
            <li>
                 <p>
                 <strong>Register Office :- </strong></br> 
                 Utkal Signature Building</br>
                 Plot No - 273</br> 
                 8th Floor</br>
                 Pahala, NH-5</br>
                 Bhubaneswar, 752101 
                    </p>
                </li>
             
            </ul>
            <ul class="follow-us-2">
              <li><a href="mailto:care@cyfrif.com"> <i class="fa fa-envelope-o"></i> care@cyfrif.com</a></li>
              <li><a href="tel:06742953002"> <i class="fa fa-phone"></i> 0674-2953002</a></li>
            </ul>
    </div>
    </div>
</div>
<div class="copyright">
  <div class="wrapper">
      <div class="copy-right-left">
          <p>Copyright &copy; 2019  CYFRIFPRO. All Rights Reserved</p>
        </div>
        <div class="copy-right-right">
          <!----<p>Designed By <a href="#">Shilabs Private Limited</a></p>--->
        </div>
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
</body>
</html>