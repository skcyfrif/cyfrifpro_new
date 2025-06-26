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
    margin-bottom: 10px;
	text-align:left;
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
    margin-bottom: 10px;
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
</style>
<div class="inner_head">
<img src="http://www.cyfrif.com/assets/site/images/investment.jpg" alt="banner">
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
                 <h2>WEALTH <br><span>MANAGEMENT SERVICES</span></h2>
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
        	<img src="<?php echo base_url();?>assets/site/images/services/Private-Wealth-Management.jpg" />
        </div>
        <div class="odd-right wow fadeInRight" data-wow-delay="0.4s">
        	<h3 id="Balanced-Advantage-Funds">Private Investment Solutions</h3>
           <!-- <ul>
            	<li><i class="fa fa-check-circle"></i> Accounts Payable</li>
                <li><i class="fa fa-check-circle"></i> Accounts Receivable</li>
                <li><i class="fa fa-check-circle"></i> Invoice Processing</li>
                <li><i class="fa fa-check-circle"></i> Bank Reconciliation</li>
                <a href="#">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>-->
            <a href="<?php echo base_url();?>Private_Wealth_Management">Explore More <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="inner-page-content-row-even">
	<div class="wrapper">
    	<div class="even-left wow fadeInLeft" data-wow-delay="0.2s">
        	<h3 id="Debt-Funds">Mutual Funds</h3>
            <!--<ul>
            	<li><i class="fa fa-check-circle"></i> Daily Attendance Sheet</li>
                <li><i class="fa fa-check-circle"></i> Payroll Sheet </li>
                <li><i class="fa fa-check-circle"></i> Pay Checker Sheet</li>
                <li><i class="fa fa-check-circle"></i> Tax Computation Sheet</li>
                <li><i class="fa fa-check-circle"></i> Return in Regular Interval</li>
                <a href="#">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>-->
            <a href="<?php echo base_url();?>Mutual_Fund">Explore More <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    <div class="even-right wow fadeInRight" data-wow-delay="0.4s">
        	<img src="<?php echo base_url();?>assets/site/images/services/Mutual-Funds.jpg" />
        </div>
    </div>
</div>

<div class="inner-page-content-row-odd">
	<div class="wrapper">
    <div class="odd-left wow fadeInLeft" data-wow-delay="0.2s">
        	<img src="<?php echo base_url();?>assets/site/images/services/Share-Trading.jpg" />
        </div>
        <div class="odd-right wow fadeInRight" data-wow-delay="0.4s">
        	<h3 id="Equity-Funds">Share Trading</h3>
         <!--   <ul style="width:65%;">
            	<li><i class="fa fa-check-circle"></i> Margin</li>
                <li><i class="fa fa-check-circle"></i> Costs</li>
                <li><i class="fa fa-check-circle"></i> Cash Flow</li>
                <li><i class="fa fa-check-circle"></i> Budgeting</li>
                <li><i class="fa fa-check-circle"></i> Finance Control</li>
                <li><i class="fa fa-check-circle"></i> Performance Ratio</li>
                <li><i class="fa fa-check-circle"></i> Operation Cost</li>
                <a href="#">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>-->
            
           <a style="float: right;" href="<?php echo base_url();?>Share_Trading">Explore More <i class="fa fa-arrow-circle-right"></i></a>  
            
        </div>
    </div>
</div>
<div class="inner-page-content-row-even">
	<div class="wrapper">
    	<div class="even-left wow fadeInLeft" data-wow-delay="0.2s">
        	<h3 id="Hybrid-Equity-Funds">General Insurance</h3>
           <!-- <ul>
            	<li><i class="fa fa-check-circle"></i> GST Computation & Return</li>
                <li><i class="fa fa-check-circle"></i> Individual Tax Computation & Return</li>

                <li><i class="fa fa-check-circle"></i> Professional Tax Computation & Execute</li>
                <a href="#">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>-->
          
        <a href="<?php echo base_url();?>General_Insurance">Explore More <i class="fa fa-arrow-circle-right"></i></a>    
            
        </div>
         <div class="even-right wow fadeInRight" data-wow-delay="0.4s">
        	<img src="<?php echo base_url();?>assets/site/images/services/General-Insurance.jpg" />
        </div>
    </div>
</div>


<div class="inner-page-content-row-odd">
	<div class="wrapper">
    	 <div class="odd-left wow fadeInLeft" data-wow-delay="0.2s">
        	<img src="<?php echo base_url();?>assets/site/images/services/health-insurance1.jpg" />
        </div>
        <div class="odd-right wow fadeInRight" data-wow-delay="0.4s">
        	<h3 id="Liquid-Funds">Health Insurance</h3>
         <!--   <ul style="width:65%;">
            	<li><i class="fa fa-check-circle"></i> Margin</li>
                <li><i class="fa fa-check-circle"></i> Costs</li>
                <li><i class="fa fa-check-circle"></i> Cash Flow</li>
                <li><i class="fa fa-check-circle"></i> Budgeting</li>
                <li><i class="fa fa-check-circle"></i> Finance Control</li>
                <li><i class="fa fa-check-circle"></i> Performance Ratio</li>
                <li><i class="fa fa-check-circle"></i> Operation Cost</li>
                <a href="#">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>-->
            
             <a style="float: right;" href="<?php echo base_url();?>Health_Insurance">Explore More <i class="fa fa-arrow-circle-right"></i></a>  
        </div>
    </div>
</div>
<div class="inner-page-content-row-even">
	<div class="wrapper">
    	<div class="even-left wow fadeInLeft" data-wow-delay="0.2s">
        	<h3 id="NFO">Fixed Deposits</h3>
           <!-- <ul>
            	<li><i class="fa fa-check-circle"></i> GST Computation & Return</li>
                <li><i class="fa fa-check-circle"></i> Individual Tax Computation & Return</li>

                <li><i class="fa fa-check-circle"></i> Professional Tax Computation & Execute</li>
                <a href="#">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>-->
             <a href="<?php echo base_url();?>fixed_deposit">Explore More <i class="fa fa-arrow-circle-right"></i></a>     
            
        </div>
          <div class="even-right wow fadeInRight" data-wow-delay="0.4s">
        	<img src="<?php echo base_url();?>assets/site/images/services/Fixed-Deposits.jpg" />
        </div>
    </div>
</div>
<div class="inner-page-content-row-odd">
	<div class="wrapper">
         	<div class="odd-left wow fadeInLeft" data-wow-delay="0.2s">
        	<img src="<?php echo base_url();?>assets/site/images/services/Life-Insurance.jpg" />
        </div>
        <div class="odd-right wow fadeInRight" data-wow-delay="0.4s">
        	<h3 id="Other-Funds">Life Insurance</h3>
         <!--   <ul style="width:65%;">
            	<li><i class="fa fa-check-circle"></i> Margin</li>
                <li><i class="fa fa-check-circle"></i> Costs</li>
                <li><i class="fa fa-check-circle"></i> Cash Flow</li>
                <li><i class="fa fa-check-circle"></i> Budgeting</li>
                <li><i class="fa fa-check-circle"></i> Finance Control</li>
                <li><i class="fa fa-check-circle"></i> Performance Ratio</li>
                <li><i class="fa fa-check-circle"></i> Operation Cost</li>
                <a href="#">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>-->
          <a style="float: right;" href="<?php echo base_url();?>Life_Insurance">Explore More <i class="fa fa-arrow-circle-right"></i></a>     
            
        </div>
    </div>
</div>
  <!--  <div class="inner-page-content-row-even">
	<div class="wrapper">
    	<div class="even-left wow fadeInLeft" data-wow-delay="0.2s">
        	<h3 id="Retirement-Saving-Funds">Retirement Saving Funds</h3>
           <!-- <ul>
            	<li><i class="fa fa-check-circle"></i> GST Computation & Return</li>
                <li><i class="fa fa-check-circle"></i> Individual Tax Computation & Return</li>

                <li><i class="fa fa-check-circle"></i> Professional Tax Computation & Execute</li>
                <a href="#">Explore More <i class="fa fa-arrow-circle-right"></i></a>
            </ul>-->
          <!-- </div>
        <div class="even-right wow fadeInRight" data-wow-delay="0.4s">
        	<img src="<?php echo base_url();?>assets/site/images/services/RETIREMENT SAVING FUNDS.jpg" />
        </div>
    </div>
</div>-->







