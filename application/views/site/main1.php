<style>
.home-main{
      background: #008abd;
      color: #fff;
      padding: 14% 0 7%;
      text-align: center;
      height: 30px;
    }
.blinker{
      animation: blinker 1.5s linear infinite;
    }
@keyframes blinker {
      50% {
      opacity: 0;
      }
}
.inner_head {
    width: 100%;
    float: left;
    position: relative;
	padding: 0 !important;
}
.inner_head img {
    width: 100% !important;
}
.inner-title {
    width: 100%;
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    text-align: center;
}
.inner-title .banner-box a {
    font-size: 17px !important;
    background: #00a99d !important;
    border-radius: 25px !important;
    padding: 5px 35px !important;
    font-weight: bold !important;
    color: #fff !important;
    display: inline-block !important;
    margin-top: 15px !important;
    -moz-box-shadow: inset 0 0 10px #000000;
    -webkit-box-shadow: inset 0 0 10px #000000;
    box-shadow: inset 0 0 10px #104440;
}
.inner-title .banner-box a:hover{
	background:#ff002c !important;
	text-decoration:none;
}
.inner-title .banner-box h2 {
    font-size: 40px!important;
    font-weight: bold !important;
    line-height: 55px!important;
}
.inner-title .banner-box h2 span {
    font-size: 40px!important;
}
.inner-page-content-row-odd{
width:100%;
float:left;
padding:20px 0;
background:#fff;
}
.inner-page-content-row-odd .wrapper {
    width: 75%!important;
    margin: 0 auto!important;
    max-width: 65%!important;
    float: none!important;
}
.inner-page-content-row-even .wrapper {
    width: 75%!important;
    margin: 0 auto!important;
    max-width: 65%!important;
    float: none!important;
}
.inner-page-content-row-even{
width:100%;
float:left;
padding:20px 0;
background:#f2f2f2;
}
.odd-left {
    width: 40%;
    float: left;
    text-align: left;
}
.odd-left img {
    border: 40px solid #f7f7f7;
    border-radius: 12px;
	width: 320px;
	}
.odd-right {
    width: 50%;
    float: right;
	text-align: right;
}
.odd-right h3{
    font-family: 'Montserrat',Helvetica,Arial,Lucida,sans-serif;
    /* font-weight: 700; */
    /* font-size: 32px; */
    line-height: 1.1em;
    font-weight: bold;
    font-size: 25px;
    color: #033747!important;
    line-height: 1.1em;
    padding-top: 35px!important;
    float: left;
    padding-left: 15px;
}
.odd-right ul {
    width: auto;
    float: right;
    margin-top: 10px;
}
.inner-page-content-row-odd:nth-child(2) .odd-right ul {
    width: 65%;
}
.odd-right:nth-child(3) ul{}
.odd-right ul li {
        color: #02050e;
    font-size: 16px;
    text-align: left;
    width: 100%;
    float: left;
    margin-left: 10px;
}
.odd-right ul li i {
    color: #00a99d;
    font-size: 16px;
    margin-right: 16px;
}


.even-right {
    width: 40%;
    float: right;
    text-align: right;
}
.even-right img {
    border: 40px solid #f7f7f7;
    border-radius: 12px;
	width: 320px;
}
.even-left {
    width: 55%;
    float: left;
}
.even-left h3{
    font-family: 'Montserrat',Helvetica,Arial,Lucida,sans-serif;
    /* font-weight: 700; */
    /* font-size: 32px; */
    line-height: 1.1em;
    font-weight: bold;
    font-size: 25px;
    color: #033747!important;
    line-height: 1.1em;
    padding-top: 35px!important;
}
.even-left ul {
    width: 100%;
    float: left;
    margin-top: 10px;
}
.even-left ul li {
    color: #02050e;
    font-size: 16px;
    width: 100%;
    float: left;
    margin-left: 5px;
}
.even-left ul li i {
    color: #00a99d;
    font-size: 18px;
    margin-right: 16px;
}
.even-left a,
.odd-right a  {
    font-size: 17px !important;
    background: #00a99d !important;
    border-radius: 25px !important;
    padding: 5px 35px !important;
    font-weight: bold !important;
    color: #fff !important;
    display: inline-block !important;
    margin-top: 15px !important;
    -moz-box-shadow: inset 0 0 10px #000000;
    -webkit-box-shadow: inset 0 0 10px #000000;
    box-shadow: inset 0 0 10px #104440;
	float: left;
}
.even-left a:hover,
.odd-right a:hover{
	background:#ff002c !important;
	text-decoration:none;
}

.even-left ul li a {
    color: #02050e !important;
    font-size: 16px !important;
    margin-bottom: 10px !important;
    text-align: left !important;
    background: none !important;
    border-radius: 0px !important;
    padding: 0px !important;
    font-weight: normal !important;
    box-shadow: none;
    margin-top: 0px !important;
    float: left;
}

.even-left ul li a:hover{
    background:none !important;
}


.odd-right ul li a {
    color: #02050e !important;
    font-size: 16px !important;
    margin-bottom: 10px !important;
    text-align: left !important;
    background: none !important;
    border-radius: 0px !important;
    padding: 0px !important;
    font-weight: normal !important;
    box-shadow: none;
    margin-top: 0px !important;
    float: left;
}

.odd-right ul li a:hover{
    background:none !important;
}

.explore-btn {
    float: left;
    width: 100%;
    padding: 50px 10px;
}

.aboutus h3 {
    font-weight: bold;
    font-size: 16px;
}
</style>
<div class="inner_head">
<img src="http://www.cyfrif.com/assets/site/images/consultancy.jpg" alt="banner">
<div class="inner-title">
	<div class="wrapper">
    <?php 
    
        if($this->uri->segment(2))
        {
          $title=$this->uri->segment(2);
        }
        else if($this->uri->segment(1))
        {
          $title=$this->uri->segment(1);
        }

    ?>
    <div class="banner-caption">
    	<div class="wrapper">
        	<div class="banner-box">
                 <h2>TAX <br><span>SERVICES</span></h2>
                 <a href="#">Explore More <i class="fa fa-arrow-circle-right"></i></a> 
             </div>
        </div>
    </div>
    	</div>
    </div>
</div>

<div class="inner-page-content-row-odd">
	<div class="wrapper">
    	<div class="odd-left wow fadeInLeft" data-wow-delay="0.2s">
        	<img src="<?php echo base_url();?>assets/site/images/CAPITAL-GAIN-TAX-SERVICES.png" />
        </div>
        <div class="odd-right wow fadeInRight" data-wow-delay="0.4s">
        	<h3 id="Capital-Gain-Tax-Services">Capital Gain Tax Services</h3>
           <ul>
            	<li><a href="#"><i class="fa fa-check-circle"></i> Short-Term Capital Gain</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> Long-Term Capital Gain</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> Equity Taxation</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> Debt Taxation</a></li>
                <a href="<?php echo base_url(); ?>Capital-Gain" class="explore">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>
        </div>
    </div>
</div>
<div class="inner-page-content-row-even">
	<div class="wrapper">
    	<div class="even-left wow fadeInLeft" data-wow-delay="0.2s">
        	<h3 id="GST-Advisory-Services">GST Services</h3>
             <ul>
                <li><a href="#"><i class="fa fa-check-circle"></i> GST Registration</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> GST Computation & Filing</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> GST Advisory Services</a></li>

                <a href="<?php echo base_url(); ?>gst-advisory-services" class="explore">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>
            
        </div>
        <div class="even-right wow fadeInRight" data-wow-delay="0.4s">
        	<img src="<?php echo base_url();?>assets/site/images/GST-ADVISORY-SERVICES.png" />
        </div>
    </div>
</div>

<div class="inner-page-content-row-odd">
	<div class="wrapper">
    	<div class="odd-left wow fadeInLeft" data-wow-delay="0.2s">
        	<img src="<?php echo base_url();?>assets/site/images/GST--INDIVIDUALS.png" />
        </div>
        <div class="odd-right wow fadeInRight" data-wow-delay="0.4s">
        	<h3 id="GST--Individuals">GST- Individuals</h3>
      <ul>
            	  <li><i class="fa fa-check-circle"></i> Individuals GST Registration</li>
                <li><i class="fa fa-check-circle"></i> Individuals GST Filing</li>
                <li><i class="fa fa-check-circle"></i>Other GST Service</li>
            <div class="explore"><a href="<?php echo base_url(); ?>gst-Individuals">Explore More <i class="fa fa-arrow-circle-right"></i></a></div>
            </ul>
            
            
        </div>
    </div>
</div>
<div class="inner-page-content-row-even">
	<div class="wrapper">
    	<div class="even-left wow fadeInLeft" data-wow-delay="0.2s">
        	<h3 id="Income-Tax-Advisory-Services">Income Tax Services</h3>
            <ul>
                <li><a href="#"><i class="fa fa-check-circle"></i> Prepare Profit and Loss Statement</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> Prepare Balance Sheet</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> Companies / Firm Tax Computation Filing</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> HUF Tax Computation</a></li>
                <a href="#" class="explore">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>
        </div>
        <div class="even-right wow fadeInRight" data-wow-delay="0.4s">
        	<img src="<?php echo base_url();?>assets/site/images/INCOME-TAX-ADVISORY-SERVICES.png" />
        </div>
    </div>
</div>

<div class="inner-page-content-row-odd">
	<div class="wrapper">
    	<div class="odd-left wow fadeInLeft" data-wow-delay="0.2s">
        	<img src="<?php echo base_url();?>assets/site/images/INDIVIDUAL-TAX-SERVICES.png" />
        </div>
        <div class="odd-right wow fadeInRight" data-wow-delay="0.4s">
        	<h3 id="Individual-Tax-Services">Individual Tax Services</h3>
            <ul>
                <li><a href="#"><i class="fa fa-check-circle"></i> Individual Income Tax Computation & Filing</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> Resident With Global Income & Service</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> Professional Tax Computation</a></li>
                <a href="<?php echo base_url(); ?>Individual-Tax-Serices" class="explore">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>
        </div>
    </div>
</div>
<div class="inner-page-content-row-even">
	<div class="wrapper">
    	<div class="even-left wow fadeInLeft" data-wow-delay="0.2s">
        	<h3 id="TDS-Advisory-Services">TDS Services</h3>
           <ul>
                <li><a href="#"><i class="fa fa-check-circle"></i> Professional Fees</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> Fees For Technical Services</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> Royalty</a></li>
                <li><a href="#"><i class="fa fa-check-circle"></i> Other TDS Advisory Services</a></li>
                <a href="<?php echo base_url(); ?>tds-advisory-services">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>
        </div>
        <div class="even-right wow fadeInRight" data-wow-delay="0.4s">
        	<img src="<?php echo base_url();?>assets/site/images/TDS-ADVISORY-SERVICES.png" />
        </div>
    </div>
</div>







