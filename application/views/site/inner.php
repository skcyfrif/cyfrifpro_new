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

.inner-page-content-row {
    width: 100%;
    float: left;
    padding: 40px 0;
}
.title {
    color: #626060;
    font-size: 37px;
}
.title span.red_blog {
    color: #ff002c;
    line-height: 32px;
}
.red_blog span {
    padding: 0!important;
}
.title h1.red_blog {
    border-left: 3px solid #ff002c;
    color: #00a99d;
    font-size: 28px;
    padding: 0 0 0 10px;
    margin-top: 20px;
	font-family: 'Open Sans', sans-serif;
	font-weight:bold;
}
.inner-list{
	margin: 15px 0;
	margin-bottom: 0;
    padding: 0 0 15px;
	width:100%;
	float:left;
}
.inner-list li{
	border-bottom: 1px solid #ededed;
    text-align: left;
    background: url(http://www.cyfrif.com/assets/site/images/list.png) left center no-repeat rgba(0,0,0,0);
    color: #212121;
    display: block;
    float: left;
    padding: 15px 0 15px 25px;
    width: 100%;
    transition: all 0.3s;
	font-family: 'Open Sans', sans-serif;
}
.inner-list li:hover {
    color: #ff002c;
    padding-left: 30px;
}
.list-section-odd{
	width:100%;
	float:left;
	background:#fff;
	
}
.list-section-even{
width:100%;
	float:left;
	background:#f2f2f2;
	margin:50px 0;
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
                 <h2>Industry Accounting</h2>
                 
             </div>
        </div>
    </div>
    	</div>
    </div>
</div>

<div class="inner-page-content-row">
	
    	<div class="list-section-odd">
        	<div class="wrapper">
    	   <div class="title">
              <h1 class="red_blog"><span class="red_blog">Retail and Wholesale </span>Accounting Services</h1>
            </div>
           <ul class="inner-list">
            	<li> Retail Bookkeeping & Accounting (sales receipts, accounts payable, accounts receivable, bank account reconciliations, and so on.)</li>
                <li> Inventory management</li>
                <li> Tax preparation services</li>
                <li> Budget creation and updation</li>
                <li> Payroll processing services</li>
                <li> Benefits management</li>
                <li> Weekly estimated Profit & Loss by business units, outlets and entire company</li>
                <li> Sales and labour reporting by business units and outlets</li>
                <li> Daily Cash Flow analysis with comprehensive drill down capability</li>
                <li> Management set up custom decision-support reporting</li>
                <li> Transactional reporting</li>
                <li> Industry best practices as well as benchmarking</li>
                <li> Inventory and shrink regulation</li>
                <li> We keep track of your Sales Tax</li>
                <li> Review of your service provider bills</li>
            </ul>
            </div>
        </div>
        
        <div class="list-section-even">
        	<div class="wrapper">
               <div class="title">
                  <h1 class="red_blog"><span class="red_blog">Manufacturing Unit </span>Accounting Services</h1>
                </div>
               <ul class="inner-list">
                    <li> Transactions entry</li>
                    <li> Journal Entry</li>
                    <li> Inventory Reconciliation</li>
                    <li> Loan Accounts Reconciliation</li>
                    <li> Accounts Payable Services</li>
                    <li> Accounts Receivable Services</li>
                    <li> Bank Account and Credit Card Reconciliation</li>
                    <li> Assets/Equipment Ledgers</li>
                    <li> Payroll Processing</li>
                    <li> Profit and Loss Statement</li>
                    <li> Cash Flow Statement</li>
                    <li> Balance Sheet Reporting</li>
                    <li> Trial Balance</li>
                    <li> Fixed Assets Process Reports</li>
                    <li> Inventory Accounting</li>
                    <li> Financial Analysis</li>
                    <li> Monthly/Quarterly/Yearly Review</li>
                    <li> Tax Preparation Services</li>
                    <li> Project & Job Reporting</li>
                    <li> Cost Variance Analysis</li>
                </ul>
            </div>
        </div>
        
        <div class="list-section-odd">
        	<div class="wrapper">
               <div class="title">
                  <h1 class="red_blog"><span class="red_blog">Accounting services for </span>insurance business</h1>
                </div>
               <ul class="inner-list">
                    <li> Accounts Payable Services</li>
                    <li> Accounts Receivable Services</li>
                    <li> Insurance Data Entry</li>
                    <li> Carrier Statement Reconciliation</li>
                    <li> Maintaining General Ledger</li>
                    <li> Income Statement and Balance Sheet Preparation</li>
                    <li> Customized Reports</li>
                    <li> Tax Authority Reconciliation</li>
                    <li> Retail Agent Reconciliation</li>
                    <li> Monthly/Quarterly/Yearly Financial Reports</li>
                    <li> Preparation Tax Authority Returns</li>
                    <li> Management Reports</li>
                    <li> Payroll Processing Services</li>
                    <li> Fixed Asset Management</li>
                    <li> Financial Analysis</li>
                    <li> Profit and Loss Statement</li>
                </ul>
            </div>
        </div>
        
        <div class="list-section-even">
        <div class="wrapper">
    	   <div class="title">
              <h1 class="red_blog"><span class="red_blog">Real estate </span>accounting</h1>
            </div>
           <ul class="inner-list">
            	<li> Real estate bookkeeping</li>
                <li> Setting up Chart of Accounts</li>
                <li> Recording expense receipts from tenants</li>
                <li> Recording invoices from suppliers</li>
                <li> Paying suppliers</li>
                <li> Processing payroll and providing the paychecks</li>
                <li> Recording depreciation and other adjusting entries</li>
                <li> Entering bank details</li>
                <li> Segregation and allocation of project-related costs</li>
                <li> Construction in progress reports</li>
                <li> Month-end or year-end closing (reconciliations & preparing cash projections)</li>
                <li> Recording the transactions by Properties/class or Jobs</li>
                <li> Inter-company transaction processing</li>
            </ul>
            </div>
        </div>
        
        <div class="list-section-odd">
        <div class="wrapper">
    	   <div class="title">
              <h1 class="red_blog"><span class="red_blog">Retail and Wholesale </span>Accounting Services</h1>
            </div>
           <ul class="inner-list">
            	<li> Retail Bookkeeping & Accounting (sales receipts, accounts payable, accounts receivable, bank account reconciliations, and so on.)</li>
                <li> Inventory management</li>
                <li> Tax preparation services</li>
                <li> Budget creation and updation</li>
                <li> Payroll processing services</li>
                <li> Benefits management</li>
                <li> Weekly estimated Profit & Loss by business units, outlets and entire company</li>
                <li> Sales and labour reporting by business units and outlets</li>
                <li> Daily Cash Flow analysis with comprehensive drill down capability</li>
                <li> Management set up custom decision-support reporting</li>
                <li> Transactional reporting</li>
                <li> Industry best practices as well as benchmarking</li>
                <li> Inventory and shrink regulation</li>
                <li> We keep track of your Sales Tax</li>
                <li> Review of your service provider bills</li>
            </ul>
            </div>
        </div>
        
        <div class="list-section-even">
        <div class="wrapper">
    	   <div class="title">
              <h1 class="red_blog"><span class="red_blog">Firm </span>Accounting</h1>
            </div>
           <ul class="inner-list">
            	<li> Accounting Setup</li>
                <li> Income Statements Preparations</li>
                <li> Balance Sheet Preparation</li>
                <li> Cash Flow Budgeting</li>
                <li> Financial statement and reporting</li>
                <li> Preparing closing entries</li>
                <li> Monthly, Quarterly, Yearly Review</li>
                <li> Financial Analysis</li>
                <li> Management Reporting</li>
                <li> Cost Variance Analysis</li>
                <li> Payroll processing services</li>
                <li> Accounts payable services</li>
                <li> Accounts receivable services</li>
                <li> Bank accounts and general ledger reconciliation</li>
                <li> Credit Card Reconciliation</li>
                <li> Cleaning up Books</li>
                <li> Revenue Reconciliation with Bank Deposits</li>
                <li> Tax preparation service</li>
            </ul>
            </div>
        </div>
        
        <div class="list-section-odd">
        <div class="wrapper">
    	   <div class="title">
              <h1 class="red_blog"><span class="red_blog">Healthcare Accounting </span>and Bookkeeping</h1>
            </div>
           <ul class="inner-list">
            	<li> Weekly/ Monthly/ Quarterly/ Yearly healthcare bookkeeping services</li>
                <li> Bank account and credit card reconciliation services</li>
                <li> Accounts payable and accounts receivable services</li>
                <li> Payroll processing services</li>
                <li> Financial reporting (Profit and loss by month, by location/classes and with previous year comparison, balance sheets, AP/AR aging details, trial balance and general ledger)</li>
                <li> Tax preparation services</li>
            </ul>
            </div>
        </div>
</div>



