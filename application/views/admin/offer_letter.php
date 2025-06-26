<!DOCTYPE html>
<html lang="en">
<head>
<title>Cyfrif Admin</title>

<?php //echo $_SERVER['REQUEST_URI']; ?>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-wysihtml5.css" />
<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<style>
.content {
    background: none repeat scroll 0 0 #eeeeee;
    margin-right: 0;
    padding-bottom: 25px;
    position: relative;
    width: 83%;
    height: auto !important;
    float: left;
}
.offer_letter_details-letter-row-1 {
    width: 100%;
    float: left;
    padding: 0px 0;
    margin-top: -30px;
}
.offer_letter_details-letter-row-1 .wrapper {
    width: 90%;
    margin: auto;
    max-width: 90%;
}
.common-page-header {
    width: 100%;
    float: left;
    border-bottom: 2px solid #333;
}
.page-header-left {
    width: 50%;
    float: left;
    text-align: left;
    padding: 0 0 10px 0;
}
.page-header-left img{}
.page-header-right {
    width: 47%;
    float: right;
    text-align: right;
    /* padding: 50px 10px; */
}
.page-header-right h5 {
    padding: 35px 24px 14px 24px;
    margin-top: 9px;
}
#content-header h1{
    display:none !important;
}
.page-body h2 {
    text-align: center;
    font-family: 'Times New Roman';
    font-size: 22px;
    font-style: italic;
    color: #000;
}
.address-row {
    width: 100%;
    float: left;
    padding:0;
    text-align: left;
}
.address-row p {
    color: #333;
    font-size: 18px;
    font-style: italic;
    line-height: 22px;
    font-family: 'Times New Roman';
    margin: 0;
}
.name-row {
    width: 100%;
    float: left;
    padding: 0;
}
.name-row h4 {
   text-align: left;
    font-family: 'Times New Roman';
    font-size: 20px;
    font-style: italic;
    color: #000;
    padding: 0;
    margin: 0;
}
.employe-biotext {
    width: 100%;
    float: left;
}
.employe-biotext p {
    text-align: left;
    font-family: 'Times New Roman';
    font-size: 18px;
    font-style: italic;
    color: #000;
    line-height: 30px;
}
.salry-table {
    width: 100%;
    float: left;
    padding: 0;
}
.salry-table table {
    width: 70%;
    float: left;
}
.salry-table table tr{
    width: 100%;
}
.salry-table table tr td {
    width: 300px;
    text-align: left;
    font-family: 'Times New Roman';
    font-size: 18px;
    font-style: italic;
    color: #000;
    line-height: 30px;
}
.salry-table table tr td:nth-child(2n){
    text-align:center;
}
.salry-table p {
    text-align: left;
    font-family: 'Times New Roman';
    font-size: 18px;
    font-style: italic;
    color: #000;
    line-height: 30px;
    width: 100%;
    float: left;
    margin-top: 0px;
}
.page-body {
    width: 100%;
    float: left;
    padding: 0 0;
}
.title-text-container{
        width: 100%;
    float: left;
    padding: 0;
}
.title-text-container h2{
text-align: left;
    font-family: 'Times New Roman';
    font-size: 20px;
    font-style: italic;
    color: #000;
    text-decoration: underline;
    margin: 0;
}
.title-text-container p{
text-align: left;
    font-family: 'Times New Roman';
    font-size: 18px;
    font-style: italic;
    color: #000;
    line-height: 22px;
    margin: 2px 0;
}
.common-page-footer{}
.common-page-footer h5{
    color: #80b8e0;
    font-weight: 600;
    font-size: 15px;
    float: left;
    width: 100%;
}
.common-page-footer h5:before {
    display: inline-block;
    margin: 10px 9px 0 0;
    content: " ";
    text-shadow: none;
    border: 1px dashed;
    width: 40%;
    float: left;
}
.common-page-footer h5:after {
    display: inline-block;
    margin: 12px 0 0 0;
    content: " ";
    text-shadow: none;
    border: 1px dashed;
    width: 40%;
    float: right;;
}
.common-page-footer p{
    color: #80b8e0;
    font-size: 14px;
    text-align: center;
    line-height: 24px;
}
.lastpage-2nd-table {
    width: 100%;
    float: left;
    padding: 20px 0;
}
.lastpage-2nd-tablee table {
    width: 50%;
    float: left;
}
.lastpage-2nd-table tr{
    width: 100%;
}
.lastpage-2nd-table table tr td {
    width: 300px;
    text-align: left;
    font-family: 'Times New Roman';
    font-size: 18px;
    font-style: italic;
    color: #000;
    line-height: 30px;
    border: 1px solid;
}
.lastpage-2nd-table table tr th:nth-child(3n) {
    text-align: center !important;
}
.lastpage-2nd-table table tr th:nth-child(2n) {
    text-align: center !important; 
}
.lastpage-2nd-table table tr th:nth-child(1n) {
    text-align: left;
}

.lastpage-2nd-table table tr th {
    border: 1px solid;
    width: 265px;
    font-weight: bold;
    font-size: 17px;
    color: #000;
    padding: 5px 10px;
}
.lastpage-2nd-table table tr td:nth-child(2n) {
    text-align: center;
    font-size: 20px;
}
.lastpage-2nd-table table tr td:nth-child(3n){
text-align: center;
    font-size: 20px;    
}
.lastpage-2nd-table p {
    text-align: center;
    font-family: 'Times New Roman';
    font-size: 20px;
    font-style: italic;
    color: #000;
    line-height: 30px;
    width: 88%;
    float: left;
    margin-top:0px;
    font-weight: bold;
}
.last-page-contanier {
    width: 100%;
    float: left;
    padding:0;
}
.last-page-contanier-left {
    text-align: left;
    width: 50%;
    float: left;
    margin-top: 15px;
}
.last-page-contanier-left h2 {
    text-align: left;
    font-size: 18px;
}
.last-page-contanier-right {
    width: 28%;
    float: right;
    text-align: left;
}
.last-page-contanier-right h2 {
    text-align: left;
    font-size: 18px;
}
.common-page-header {
    width: 100%;
    float: left;
    border-bottom: 2px solid #333;
    margin-top: 40px;
}
button.btn, input[type="submit"].btn {
    height: 36px;
}
</style>
</head>
<div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
            <button class="pull-right btn btn-info" onclick="printDiv()">Print</button>
          </div>
<div class="offer_letter_details-letter-row-1" id="printarea2">
    <div class="wrapper">
        <div class="common-page-header">
            <div class="page-header-left">
                <img src="http://www.cyfrifpro.com/assets\site\images\logo.png"/>
            </div>
            <div class="page-header-right">
                <h5>1</h5>
            </div>
        </div>
       <!-- This is common for Body  Start -->
      <div class="page-body">
        <h2>Personal & Confidential</h2>
            <div class="address-row">
                <p>
                    D.O.J- <?php echo date('d F Y',strtotime($offer_letter_details->date));?></br>
                    Applicant ID- <?php echo $offer_letter_details->applicant_id;?></br>
                    Name- <?php echo $offer_letter_details->name;?></br>
                    Location- <?php echo $offer_letter_details->location;?>.
                </p></br>
            </div>
            <div class="name-row">
                <h4>Dear <?php echo $offer_letter_details->name;?>,</h4>
            </div>
            <div class="employe-biotext">
                <p>Further to the interview and discussion you had with us, we are pleased to offer_letter_details you the position of <strong>"<?php echo $offer_letter_details->designation;?>"</strong> in <strong>CYFRIFPRO PRIVATE LIMITED</strong> subject to the following terms and conditions:</p>
            </div>
            <div class="salry-table">
                <table>
                    <tr>
                        <td>Band</td>
                        <td>:</td>
                        <td>L2</td>
                    </tr>
                    
                    <tr>
                        <td>Base Salary </td>
                        <td>:</td>
                        <td>Rs. <?php echo $offer_letter_details->salary_per_anum;?>/- p.a.</td>
                    </tr>
                    
                    <tr>
                        <td>HRA </td>
                        <td>:</td>
                        <td>Rs. 30,000/- p.a.</td>
                    </tr>
                    
                    <tr>
                        <td>Conveyance</td>
                        <td>:</td>
                        <td>Rs. 18,000/- p.a.</td>
                    </tr>
                    
                    <tr>
                        <td>Medical</td>
                        <td>:</td>
                        <td>Rs.  6,000/- p.a.</td>
                    </tr>
                    
                    <tr>
                        <td>Lunch Allowance  </td>
                        <td>:</td>
                        <td>Rs.  8,400/- p.a.</td>
                    </tr>
                    
                    <tr>
                        <td>Personal Pay</td>
                        <td>:</td>
                        <td>Rs.  9,600/- p.a.</td>
                    </tr>
                    
                    <tr>
                        <td>Other Allowance</td>
                        <td>:</td>
                        <td>Rs.  9,600/- p.a.</td>
                    </tr>
                </table>
                <p>(The above compensation will be payable to you every month in the salary. You may claim income tax exemption as applicable within the parameters of the applicable tax structure)</p>
            </div>
            <div class="title-text-container">
            <h2>Leave Travel Allowance:</h2>
            <p>You would be entitled to LTA @ one month's base salary, after completion of one year of service in the Organisation. The tax exemption on LTA will be in accordance with Income Tax provisions.</p>
            </div>
            <div class="title-text-container">
            <h2>Provident Fund:</h2>
            <p>You will be covered under the Organisation's Provident Fund Trust. The Organisation shall contribute 12% of your base salary towards provident and pension fund in accordance with applicable laws. But the same will applicable when the Organisation come under such Act.</p>
            </div>
            <div class="title-text-container">
            <h2>Personal Pay:</h2>
            <p>The component of Personal Pay is specific to each individual and varies with regards to a person's level, performance rating, contribution, skills and competencies.</p>
            </div>
      </div>
      
     <!---- This is common for Body  End----->
     
     <!---- This is common for Page Footer Start----->
        <div class="common-page-footer">
            <h5>www.cyfrifpro.com</h5>
            <p>Regd. Office : Cyfrifpro Private Limited., Acrux Neon Building, Block "C", C-002, Rudrapur, Hanspal, Bhubaneswar, Odisha -752101.                    Corporate Identity No.: U74130OR2019PTC031592</p>
        </div>
     <!---- This is common for Page Footer End----->
     
<!--=================================================================================================================================   -->  
<!-- This is common for Page Header Start -->
        <div class="common-page-header">
            <div class="page-header-left">
                <img src="http://www.cyfrifpro.com/assets/site/images/logo.png" />
            </div>
            <div class="page-header-right">
                <h5>2</h5>
            </div>
        </div>
     <!-- This is common for Page Header End
       This is common for Body  Start-- -->
      <div class="page-body">
            <div class="title-text-container">
            <h2>Hospitalisation Benefit:  </h2>
            <p>You will be entitled to hospitalisation benefits under the prevailing Hospitalisation Scheme of the Organisation.</p>
            </div>
            <div class="title-text-container">
            <h2>Probationary Period:</h2>
            <p>You will be on probation for a period of six months from the date of your employment. Subject to satisfactory performance during the probationary period you will be confirmed in the services of the Organisation. During probationary period either party may terminate the services by giving one month's notice or salary in lieu thereof at the Organisation's discretion. However, after confirmation either party will be required to give three months' notice or Salary in lieu of notice at the organisation's discretion.</p>
            </div>
            <div class="title-text-container">
            <h2>Job description:</h2>
            <p>Your duties and responsibilities will be explained to you on your joining the organisation. However, you shall execute and perform all such duties that may be assigned to you by the Organisation from time to time and the Organisation reserves its right to vary these at its discretion.</p>
            </div>
            
            <div class="title-text-container">
            <h2>Location:</h2>
            <p>Your initial place of posting will be <strong>BEREHAMPUR.</strong> Your final place of posting will be intimated to-you subsequently. However, the Organisation reserves the right to transfer you to any other Office/Branch, Subsidiary or Associate Company of the Organisation, in India, that is in-existence or may come into existence at a future date.</p>
            </div>
            
            <div class="title-text-container">
            <h2>Secrecy:</h2>
            <p>It is a condition of your employment that you will not, for whatever reason, divulge without express written authority from the Management, any information relating to the organisation or any of its constituents or employees, as received by you in the course of your employment and after the cessation of your employment with the Organisation.</p>
            </div>
            
            <div class="title-text-container">
            <h2>Alternative Employment:</h2>
            <p>During the course of your employment with the Organisation, you will not engage yourself directly or indirectly in any trade, business, occupation, employment, service or calling whether for remuneration or otherwise, without the prior written consent of the Organisation.</p>
            </div>
            
            <div class="title-text-container">
            <h2> Maternity Benefits:</h2>
            <p>a) All women employees of the Organisation, irrespective of their tenure shall be eligible for Maternity Leave. The Organisation shall allow 26 weeks of paid Maternity leave to its women employees, of which, not more than 8 weeks to precede the date of her expected delivery. The maximum period entitled for maternity benefit by a woman having two or more than two surviving children shall be 12 weeks of which not more than 6 weeks shall precede the date of her expected delivery.</p>
            <p>b) The employee shall be also eligible for leave with pay for a period of 6 weeks in the event of a miscarriage or medical termination of pregnancy.</p>
            </div>
      </div>
      
     <!---- This is common for Body  End----->
     
     <!---- This is common for Page Footer Start----->
        <div class="common-page-footer">
            <h5>www.cyfrifpro.com</h5>
            <p>Regd. Office : Cyfrifpro Private Limited., Acrux Neon Building, Block "C", C-002, Rudrapur, Hanspal, Bhubaneswar, Odisha -752101.                    Corporate Identity No.: U74130OR2019PTC031592</p>
        </div>
     <!---- This is common for Page Footer End----->     
 <!--=================================================================================================================================   -->  
<!---- This is common for Page Header Start----->
        <div class="common-page-header">
            <div class="page-header-left">
                <img src="http://www.cyfrifpro.com/assets/site/images/logo.png" />
            </div>
            <div class="page-header-right">
                <h5>3</h5>
            </div>
        </div>
     <!---- This is common for Page Header End----->
      <!---- This is common for Body  Start----->
      <div class="page-body">
          <div class="title-text-container">
            <p>c) In case of tubectomy operation, a woman employee is entitled for leave for a period of 2 weeks immediately following the day of her tubectomy operation.</p>
            <p>d) The Organisation shall additionally provide leave with pay for a maximum period of one month for Illness arising out of Pregnancy, delivery, premature birth of the child, miscarriage, medical termination of pregnancy or tubectomy. This benefit is allowed subject to production of Medical Certificate.</p>
            <p>e) A woman employee who legally adopts a child below the age of three months or a commissioning mother, shall be entitled to maternity leave with pay for a period of 12 weeks from the date the child is handed over to the adopting mother or the commissioning mother, as the case may be. The maximum period of maternity leave entitled to a woman employee legally adopting a child of over three months old and below the age of 6 years shall be eight weeks.</p>
            <p>f) In cases where a woman employee is not able to resume her duties at the end of Maternity Leave on account of medical / health reasons, she may be allowed to work from home for a period not exceeding 30 days subject to approval of concerned  Department Head and Management provided the nature of work is such that she may work from home.</p>
            </div>  
            <div class="title-text-container">
            <h2>Creche facility:</h2>
            <p>a) The Organisation will provide creche facility in line with regulatory guidelines. The offices / locations where such facilities would be made available and the applicable terms and conditions would be notified in the Employee Portal of the Organisation.</p>
            <p>b) The Organisation receiving attested copies of all your degrees and professional qualifications certificates and documentary evidence of scholarships or prizes won, if any.</p>
            <p>c) The Organisation receiving a copy of the relieving letter from your previous employer.</p>
            <p>d) The Self Declaration given by you in respect of your medical fitness is in order.</p>
            <p>The terms and conditions set out in this letter of appointment constitute service conditions applicable to your employment in the Organisation and with regard to any dispute arising thereof, the Bhubaneswar Courts will have exclusive jurisdiction.</p>
            <p>This letter is issued on your representation that you were not subjected to disciplinary action by your present or previous employers and/or held guilty in any legal proceedings. In the event any such incident is brought to the notice of the Organisation; the Organisation reserves its right to withdraw this letter/terminate your services without any prior notice and without assigning any reason.</p>
            <br /><br /><br /><br /><br /><br /><br /><br />

            </div>
      </div>
      
     <!---- This is common for Body  End----->
     
     <!---- This is common for Page Footer Start----->
        <div class="common-page-footer">
            <h5>www.cyfrifpro.com</h5>
            <p>Regd. Office : Cyfrifpro Private Limited., Acrux Neon Building, Block "C", C-002, Rudrapur, Hanspal, Bhubaneswar, Odisha -752101.                    Corporate Identity No.: U74130OR2019PTC031592</p>
        </div>
     <!---- This is common for Page Footer End----->     



 <!--=================================================================================================================================   -->  
<!---- This is common for Page Header Start----->
        <div class="common-page-header">
            <div class="page-header-left">
                <img src="http://www.cyfrifpro.com/assets/site/images/logo.png" />
            </div>
            <div class="page-header-right">
                <h5>4</h5>
            </div>
        </div>
     <!---- This is common for Page Header End----->
      <!---- This is common for Body  Start----->
      <div class="page-body">
          <div class="title-text-container">
            <p>Notwithstanding anything contained in the above paragraphs, your services may be terminated by the Organisation if you are found to be indulging in acts of Commission/Omission which may be prejudicial to the interests of the Organisation or any act of dishonesty, disobedience, insubordination or any other misconduct or neglect of duty or incompetence in the discharge of duty on your part.</p>
            
            <p>Kindly note that you are required to join the Organisation as per the joining date agreed basis our discussion not exceeding 30 days from the receipt of the letter. You are required to give acceptance of the offer_letter_details & above terms and conditions of employment immediately on receipt of this offer_letter_details letter. This offer_letter_details letter will be valid for a maximum of 30 days from the date of this letter.</p>
            
            <p>We welcome you to CYFRIF PRO and look forward to having a long and mutually</p>
            
            <p>beneficial association with you.</p>
            <br /><br />
            <p>Yours truly,</p><br />
            <p><strong>For CYFRIF PRO PRIVATE LIMITED,</strong></p>
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            </div>
      </div>
      
     <!---- This is common for Body  End----->
     
     <!---- This is common for Page Footer Start----->
        <div class="common-page-footer">
            <h5>www.cyfrifpro.com</h5>
            <p>Regd. Office : Cyfrifpro Private Limited., Acrux Neon Building, Block "C", C-002, Rudrapur, Hanspal, Bhubaneswar, Odisha -752101.                    Corporate Identity No.: U74130OR2019PTC031592</p>
        </div>
     <!---- This is common for Page Footer End----->     
<!--=========================================================================================================================================-->

<!---- This is common for Page Header Start----->
        <div class="common-page-header">
            <div class="page-header-left">
                <img src="http://www.cyfrifpro.com/assets/site/images/logo.png" />
            </div>
            <div class="page-header-right">
                <h5>5</h5>
            </div>
        </div>
     <!---- This is common for Page Header End----->
      <!---- This is common for Body  Start----->
      <div class="page-body">
      <div class="last-page-contanier">
            <div class="last-page-contanier-left">
                <h2>CYFRIFPRO PRIVATE LIMITED.</h2>
            </div>
            <div class="last-page-contanier-right">
            <h2>D.O.J- <?php echo date('d F Y',strtotime($offer_letter_details->date));?><br />
                Applicant ID - <?php echo $offer_letter_details->applicant_id;?></h2>
            </div>
      </div>
           
            <div class="salry-table">
                <table>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?php echo $offer_letter_details->name;?></td>
                    </tr>
                    
                    <tr>
                        <td>Designation</td>
                        <td>:</td>
                        <td><?php echo strtoupper($offer_letter_details->designation);?></td>
                    </tr>
                    
                    <!-- <tr>
                        <td>Vertical</td>
                        <td>:</td>
                        <td>SALES</td>
                    </tr> -->
                    
                    <tr>
                        <td>Location</td>
                        <td>:</td>
                        <td><?php echo $offer_letter_details->location;?></td>
                    </tr>
                    
                    <tr>
                        <td>Contact No</td>
                        <td>:</td>
                        <td><?php echo $offer_letter_details->phone;?></td>
                    </tr>
                </table>
            </div>
           <div class="lastpage-2nd-table">
                <table>
                    <tr>
                        <th> </th>
                        <th>Per Month</th>
                        <th>Per Annum</th>
                    </tr>
                    <tr>
                        <th>Base Salary</th>
                        <td><i class="fa fa-inr"></i> <?php echo number_format(ceil($offer_letter_details->salary_per_anum / 12));?></td>
                        <td><i class="fa fa-inr"></i> <?php echo $offer_letter_details->salary_per_anum;?></td>
                    </tr>
                    <tr>
                        <th>HRA</th>
                        <td><i class="fa fa-inr"></i> 2,500</td>
                        <td><i class="fa fa-inr"></i> 30,000</td>
                    </tr>
                    <tr>
                        <th>Conveyance </th>
                        <td><i class="fa fa-inr"></i> 1,500</td>
                        <td><i class="fa fa-inr"></i> 18,000</td>
                    </tr>
                    <tr>
                        <th>Medical</th>
                        <td><i class="fa fa-inr"></i> 500</td>
                        <td><i class="fa fa-inr"></i> 6,000</td>
                    </tr>
                    <tr>
                        <th>Lunch Allowance </th>
                        <td><i class="fa fa-inr"></i> 700</td>
                        <td><i class="fa fa-inr"></i> 8,400</td>
                    </tr>
                    <tr>
                        <th>Personal Pay </th>
                        <td><i class="fa fa-inr"></i> 800</td>
                        <td><i class="fa fa-inr"></i> 9,600</td>
                    </tr>
                    <tr>
                        <th>Other Allowance </th>
                        <td><i class="fa fa-inr"></i> 800</td>
                        <td><i class="fa fa-inr"></i> 9,600</td>
                    </tr>
                    <tr>
                        <th>LTA</th>
                        <td> </td>
                        <td><i class="fa fa-inr"></i> 5,200</td>
                    </tr>
                    <tr>
                        <th>Total Fixed Cost (A)</th>
                        <th><i class="fa fa-inr"></i> <?php echo number_format(ceil(($offer_letter_details->salary_per_anum/12) + 6800));?></th>
                        <th><i class="fa fa-inr"></i> <?php echo number_format(ceil($offer_letter_details->salary_per_anum + 86700));?></th>
                    </tr>
                    <tr>
                        <th>Provident Fund</th>
                        <td><i class="fa fa-inr"></i> 624</td>
                        <td><i class="fa fa-inr"></i> 7,488</td>
                    </tr>
                    <tr>
                        <th>Retirals</th>
                        <td><i class="fa fa-inr"></i> 624</td>
                        <td><i class="fa fa-inr"></i> 7,488</td>
                    </tr>
                    <tr>
                        <th>Total Fixed Pay (A+B)</th>
                        <th><i class="fa fa-inr"></i> <?php echo number_format(ceil(($offer_letter_details->salary_per_anum/12) + 8048));?></th>
                        <th><i class="fa fa-inr"></i> <?php echo number_format(ceil(($offer_letter_details->salary_per_anum) + 101776));?></th>
                    </tr>
                </table>
                <p>Welcome to The Cyfrifpro Family</p><br /><br /><br />
           </div> 
      </div>
        <div class="common-page-footer">
            <h5>www.cyfrifpro.com</h5>
            <p>Regd. Office : Cyfrifpro Private Limited., Acrux Neon Building, Block "C", C-002, Rudrapur, Hanspal, Bhubaneswar, Odisha -752101.                    Corporate Identity No.: U74130OR2019PTC031592</p>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>



<!-- Your JavaScript code -->
<script>
function printDiv(){
        var printContents = document.getElementById("printarea2").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
}
</script>
<style type="text/css">
@media print {
  .table.table-bordered tr td,.table.table-bordered a{
    color:#1771D6 !important;
 -webkit-print-color-adjust: exact;
  color-adjust: exact;
  }

}
  .table.table-bordered tr td,.table.table-bordered a{
  color:#1771D6 !important;
}
.taxrattabl{
  display: table-cell;;
  width: 20%;
    border-right: 1px solid #ddd;    
    padding-left: 10px;
}

table.table.tbl-invs thead tr td {
    text-align: center !important;
    font-weight: bold;
    font-size: 13px;
    border-bottom: 1px solid #ccc;

}

table.table.tbl-invs tr td {
    border: 1px solid #ccc;
}

table.table.tbl-invs1 tr td {
    width: 0% !important;
}

table.table.table-bordered.table-invoice h5, h4 {
    font-size: 11px;
    margin: 0px;
}
</style>
</div>

</div><!-- Content Ends Here Very Important-->


<!--Footer-part-->
<!-- <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div> -->

<?php 

$uri=$this->uri->segment(2);
$allUri=array('sales_report');

$accounts= $this->Common_M->get('tbl_accounts','name','ASC');
$accountArr = '';
foreach ($accounts as $key) {
  $accountArr .= '<option value="'.$key->name.'">'.$key->name.'</option>';
}


?>


<!--end-Footer-part-->
<?php if(!in_array($uri,$allUri)){ ?>

<input type="hidden" id="rowCount" value="<?php echo ($products) ? count($products) :  1 ;?>" />

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<?php } ?>
<?php if($isEditing == TRUE){ $isEdit=1; } else { $isEdit=0; } ?>
<input type="hidden" value="<?php echo $isEdit;?>" id="isEdit" />
<script>

$(document).ready(function(){
    

    $('#preloaderDiv').hide();

/*! Fades in page on load */
    $('body').css('display', 'none');
    $('body').fadeIn(500);
    $('#inventoryAlert').fadeIn(500);

    if($('#isEdit').val() == 1) {
      var totalProducts=$('#totalProducts').val();
      var i=totalProducts + 1;
      //alert(i);
    }else{
      var i=2;
    }

    var accounts =<?php echo json_encode($accountArr);?>;
    var accountDisplay='<?php echo ($accountEnabled) ? 'block' : 'none';?>';
    var totalDisplay='<?php echo ($accountEnabled) ? 'none' : 'block';?>';
    var accountActive='<?php echo ($accountEnabled) ? '' : 'disabled';?>';

    //console.log(accounts);

    $("#add_row").click(function(){
        b=i-1;

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url();?>client/invoices_p_list",
            data:{'callForData':'getData'},
            success: function(data){
                //alert(b);
                $('#tab_logic').append('<tr id="addr'+i+'"><td>'+i+'</td><td><select name="title[]" data-id="'+i+'" onchange="getData(this)"><option value="">Select...</option>'+data+'</select></td><td><input type="text" name="hsn[]"  data-phsn="hsn'+i+'" id="hsn'+i+'" value="" readonly/></td><td><input type="text" name="unit[]" data-punit="unit'+i+'" id="unit'+i+'" value="" readonly></td><td class="account-td" style="display:'+accountDisplay+';;min-width: 200px;"><select name="account[]"" class="form-control account" '+accountActive+'>'+accounts+'</select></td><td><input type="number" name="qty[]" placeholder="Qty" class="form-control qty" step="0.01" min="0"/></td><td><input type="number" name="price[]" data-pid="price'+i+'" placeholder="Enter Unit Price" class="form-control price" step="0.01" min="0" readonly/></td><td><input type="text" name="tax[]" data-tax="tax'+i+'" placeholder="Enter tax" value="" class="form-control tax" readonly/></td><td><input type="text" name="taxamnt[]" data-taxamnt="taxamnt'+i+'" placeholder="Enter tax amount" value="" class="form-control taxamnt" readonly/></td><td><input type="number" name="discount[]" data-pid="discount0" placeholder="[%]" class="form-control discount" step="0.01" min="0"/></td><td style="display:'+totalDisplay+'"><input type="number" name="total[]" placeholder="0.00" class="form-control total" readonly/></td><td><button type="button" id="delete_row" onclick="deleteRow(this)" data-rowId="addr'+i+'" class="pull-right btn btn-danger">Delete</button></td></tr>');
                i++; 
                //alert(i);
                $('#rowCount').val(i);

               }
        });

        
    });

  $('#tab_logic tbody').on('keyup change',function(){
    calc();
  });
  $('#tax').on('keyup change',function(){
    calc_total();
  });
  

});

function deleteRow(val)
{
  var rowCount=$('#rowCount').val();
  if(rowCount > 1)
  {
    var rowId='#'+$(val).attr('data-rowId');
    $(rowId).remove();
  }
  calc();
}

function calc()
{
  var taxmnt=0;
  var subtot=0;
  var allto=0;
  $('#tab_logic tbody tr').each(function(i, element) {
    var html = $(this).html();
      if(html!='')
      {
        var qty = $(this).find('.qty').val();
        var price = $(this).find('.price').val();
        var discount = $(this).find('.discount').val();
        var tax = $(this).find('.tax').val();
        var discountPrice=((price*discount)/100)*qty;        
        var tot=(qty*price) - discountPrice;
        var taxval=(tot*tax)/100;
        tot=tot;
        //tot=parseInt(tot+taxval);
        $(this).find('.total').val(tot); 
        taxmnt=parseInt(taxval+taxmnt); 
        subtot=parseInt(tot+subtot); 

        $(this).find('.taxamnt').val((taxval).toFixed(2));

        //calc_total();
      }
    });

  allto=parseInt(subtot+taxmnt);
  $('#sub_total').val(subtot.toFixed(2));
  $("#tax_amount").val(taxmnt.toFixed(2));
  $('#total_amount').val((allto).toFixed(2));
  $('#total_amount_hidden').val((allto).toFixed(2));
}

function calc_total()
{
  /*total=0;
  $('.total').each(function() {
        total += parseInt($(this).val());
    });
  $('#sub_total').val(total.toFixed(2));
  tax_sum=total/100*$('#tax').val();
  $('#tax_amount').val(tax_sum.toFixed(2));
  $('#total_amount').val((total).toFixed(2));
  $('#total_amount_hidden').val((total).toFixed(2));*/
}


(function($) {
  $.fn.vmenuModule = function(option) {
    var obj,
      item;
    var options = $.extend({
        Speed: 220,
        autostart: true,
        autohide: 1
      },
      option);
    obj = $(this);

    item = obj.find("ul").parent("li").children("a");
    item.attr("data-option", "off");

    item.unbind('click').on("click", function() {
      var a = $(this);
      if (options.autohide) {
        a.parent().parent().find("a[data-option='on']").parent("li").children("ul").slideUp(options.Speed / 1.2,
          function() {
            $(this).parent("li").children("a").attr("data-option", "off");
          })
      }
      if (a.attr("data-option") == "off") {
        a.parent("li").children("ul").slideDown(options.Speed,
          function() {
            a.attr("data-option", "on");
          });
      }
      if (a.attr("data-option") == "on") {
        a.attr("data-option", "off");
        a.parent("li").children("ul").slideUp(options.Speed)
      }
    });
    if (options.autostart) {
      obj.find("a").each(function() {

        $(this).parent("li").parent("ul").slideDown(options.Speed,
          function() {
            $(this).parent("li").children("a").attr("data-option", "on");
          })
      })
    }

  }
})(window.jQuery || window.Zepto);
</script>
<script type="text/javascript">
      $(document).ready(function() {
        $(".u-vmenu").vmenuModule({
          Speed: 200,
          autostart: false,
          autohide: true
        });
      });
    </script>

<?php if(!in_array($uri,$allUri)){ ?>

<script src="<?php echo base_url();?>assets/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/jquery.flot.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/jquery.flot.resize.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/jquery.peity.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/matrix.js"></script> 
<script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/matrix.calendar.js"></script> 
<script src="<?php echo base_url();?>assets/js/matrix.chat.js"></script> 
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script> 
<script src="<?php echo base_url();?>assets/js/matrix.form_validation.js"></script> 
<script src="<?php echo base_url();?>assets/js/jquery.wizard.js"></script> 
<script src="<?php echo base_url();?>assets/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url();?>assets/js/select2.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/matrix.popover.js"></script> 
<script src="<?php echo base_url();?>assets/js/matrix.tables.js"></script> 
<script src="<?php echo base_url();?>assets/js/matrix.interface.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/wysihtml5-0.3.0.js"></script> 
<script src="<?php echo base_url();?>assets/js/bootstrap-wysihtml5.js"></script> 

<?php } ?>
<script type="text/javascript">



  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}

function deleteThis(val)
{
    if(confirm('Are you sure want to delete this?'))
    {
        var id=$(val).attr('data-id');
        var tbl_name=$(val).attr('data-tblName');
        var return_URL=$(val).attr('data-returnURL');
        var return_URLen = return_URL.replace("/", "-");
        window.location="<?php echo base_url();?>admin/delete/"+tbl_name+"/"+return_URLen+"/"+id;
        return true;
    }
    else
    {
        //alert('Not Ok');
        return false;
    }

}
  $('.textarea_editor').wysihtml5();



// MD% Encryption By Javascript

function md5_vm_test()
{
  return hex_md5("abc").toLowerCase() == "900150983cd24fb0d6963f7d28e17f72";
}

/*
 * Calculate the MD5 of a raw string
 */
function rstr_md5(s)
{
  return binl2rstr(binl_md5(rstr2binl(s), s.length * 8));
}

/*
 * Calculate the HMAC-MD5, of a key and some data (raw strings)
 */
function rstr_hmac_md5(key, data)
{
  var bkey = rstr2binl(key);
  if(bkey.length > 16) bkey = binl_md5(bkey, key.length * 8);

  var ipad = Array(16), opad = Array(16);
  for(var i = 0; i < 16; i++)
  {
    ipad[i] = bkey[i] ^ 0x36363636;
    opad[i] = bkey[i] ^ 0x5C5C5C5C;
  }

  var hash = binl_md5(ipad.concat(rstr2binl(data)), 512 + data.length * 8);
  return binl2rstr(binl_md5(opad.concat(hash), 512 + 128));
}

/*
 * Convert a raw string to a hex string
 */
function rstr2hex(input)
{
  try { hexcase } catch(e) { hexcase=0; }
  var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
  var output = "";
  var x;
  for(var i = 0; i < input.length; i++)
  {
    x = input.charCodeAt(i);
    output += hex_tab.charAt((x >>> 4) & 0x0F)
           +  hex_tab.charAt( x        & 0x0F);
  }
  return output;
}

/*
 * Convert a raw string to a base-64 string
 */
function rstr2b64(input)
{
  try { b64pad } catch(e) { b64pad=''; }
  var tab = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
  var output = "";
  var len = input.length;
  for(var i = 0; i < len; i += 3)
  {
    var triplet = (input.charCodeAt(i) << 16)
                | (i + 1 < len ? input.charCodeAt(i+1) << 8 : 0)
                | (i + 2 < len ? input.charCodeAt(i+2)      : 0);
    for(var j = 0; j < 4; j++)
    {
      if(i * 8 + j * 6 > input.length * 8) output += b64pad;
      else output += tab.charAt((triplet >>> 6*(3-j)) & 0x3F);
    }
  }
  return output;
}

/*
 * Convert a raw string to an arbitrary string encoding
 */
function rstr2any(input, encoding){

  var divisor = encoding.length;
  var i, j, q, x, quotient;

  /* Convert to an array of 16-bit big-endian values, forming the dividend */
  var dividend = Array(Math.ceil(input.length / 2));
  for(i = 0; i < dividend.length; i++)
  {
    dividend[i] = (input.charCodeAt(i * 2) << 8) | input.charCodeAt(i * 2 + 1);
  }

  /*
   * Repeatedly perform a long division. The binary array forms the dividend,
   * the length of the encoding is the divisor. Once computed, the quotient
   * forms the dividend for the next step. All remainders are stored for later
   * use.
   */
  var full_length = Math.ceil(input.length * 8 /
                                    (Math.log(encoding.length) / Math.log(2)));
  var remainders = Array(full_length);
  for(j = 0; j < full_length; j++)
  {
    quotient = Array();
    x = 0;
    for(i = 0; i < dividend.length; i++)
    {
      x = (x << 16) + dividend[i];
      q = Math.floor(x / divisor);
      x -= q * divisor;
      if(quotient.length > 0 || q > 0)
        quotient[quotient.length] = q;
    }
    remainders[j] = x;
    dividend = quotient;
  }

  /* Convert the remainders to the output string */
  var output = "";
  for(i = remainders.length - 1; i >= 0; i--)
    output += encoding.charAt(remainders[i]);

  return output;
}

/*
 * Encode a string as utf-8.
 * For efficiency, this assumes the input is valid utf-16.
 */
function str2rstr_utf8(input)
{
  var output = "";
  var i = -1;
  var x, y;

  while(++i < input.length)
  {
    /* Decode utf-16 surrogate pairs */
    x = input.charCodeAt(i);
    y = i + 1 < input.length ? input.charCodeAt(i + 1) : 0;
    if(0xD800 <= x && x <= 0xDBFF && 0xDC00 <= y && y <= 0xDFFF)
    {
      x = 0x10000 + ((x & 0x03FF) << 10) + (y & 0x03FF);
      i++;
    }

    /* Encode output as utf-8 */
    if(x <= 0x7F)
      output += String.fromCharCode(x);
    else if(x <= 0x7FF)
      output += String.fromCharCode(0xC0 | ((x >>> 6 ) & 0x1F),
                                    0x80 | ( x         & 0x3F));
    else if(x <= 0xFFFF)
      output += String.fromCharCode(0xE0 | ((x >>> 12) & 0x0F),
                                    0x80 | ((x >>> 6 ) & 0x3F),
                                    0x80 | ( x         & 0x3F));
    else if(x <= 0x1FFFFF)
      output += String.fromCharCode(0xF0 | ((x >>> 18) & 0x07),
                                    0x80 | ((x >>> 12) & 0x3F),
                                    0x80 | ((x >>> 6 ) & 0x3F),
                                    0x80 | ( x         & 0x3F));
  }
  return output;
}

/*
 * Encode a string as utf-16
 */
function str2rstr_utf16le(input)
{
  var output = "";
  for(var i = 0; i < input.length; i++)
    output += String.fromCharCode( input.charCodeAt(i)        & 0xFF,
                                  (input.charCodeAt(i) >>> 8) & 0xFF);
  return output;
}

function str2rstr_utf16be(input)
{
  var output = "";
  for(var i = 0; i < input.length; i++)
    output += String.fromCharCode((input.charCodeAt(i) >>> 8) & 0xFF,
                                   input.charCodeAt(i)        & 0xFF);
  return output;
}

/*
 * Convert a raw string to an array of little-endian words
 * Characters >255 have their high-byte silently ignored.
 */
function rstr2binl(input)
{
  var output = Array(input.length >> 2);
  for(var i = 0; i < output.length; i++)
    output[i] = 0;
  for(var i = 0; i < input.length * 8; i += 8)
    output[i>>5] |= (input.charCodeAt(i / 8) & 0xFF) << (i%32);
  return output;
}

/*
 * Convert an array of little-endian words to a string
 */
function binl2rstr(input)
{
  var output = "";
  for(var i = 0; i < input.length * 32; i += 8)
    output += String.fromCharCode((input[i>>5] >>> (i % 32)) & 0xFF);
  return output;
}

/*
 * Calculate the MD5 of an array of little-endian words, and a bit length.
 */
function binl_md5(x, len)
{
  /* append padding */
  x[len >> 5] |= 0x80 << ((len) % 32);
  x[(((len + 64) >>> 9) << 4) + 14] = len;

  var a =  1732584193;
  var b = -271733879;
  var c = -1732584194;
  var d =  271733878;

  for(var i = 0; i < x.length; i += 16)
  {
    var olda = a;
    var oldb = b;
    var oldc = c;
    var oldd = d;

    a = md5_ff(a, b, c, d, x[i+ 0], 7 , -680876936);
    d = md5_ff(d, a, b, c, x[i+ 1], 12, -389564586);
    c = md5_ff(c, d, a, b, x[i+ 2], 17,  606105819);
    b = md5_ff(b, c, d, a, x[i+ 3], 22, -1044525330);
    a = md5_ff(a, b, c, d, x[i+ 4], 7 , -176418897);
    d = md5_ff(d, a, b, c, x[i+ 5], 12,  1200080426);
    c = md5_ff(c, d, a, b, x[i+ 6], 17, -1473231341);
    b = md5_ff(b, c, d, a, x[i+ 7], 22, -45705983);
    a = md5_ff(a, b, c, d, x[i+ 8], 7 ,  1770035416);
    d = md5_ff(d, a, b, c, x[i+ 9], 12, -1958414417);
    c = md5_ff(c, d, a, b, x[i+10], 17, -42063);
    b = md5_ff(b, c, d, a, x[i+11], 22, -1990404162);
    a = md5_ff(a, b, c, d, x[i+12], 7 ,  1804603682);
    d = md5_ff(d, a, b, c, x[i+13], 12, -40341101);
    c = md5_ff(c, d, a, b, x[i+14], 17, -1502002290);
    b = md5_ff(b, c, d, a, x[i+15], 22,  1236535329);

    a = md5_gg(a, b, c, d, x[i+ 1], 5 , -165796510);
    d = md5_gg(d, a, b, c, x[i+ 6], 9 , -1069501632);
    c = md5_gg(c, d, a, b, x[i+11], 14,  643717713);
    b = md5_gg(b, c, d, a, x[i+ 0], 20, -373897302);
    a = md5_gg(a, b, c, d, x[i+ 5], 5 , -701558691);
    d = md5_gg(d, a, b, c, x[i+10], 9 ,  38016083);
    c = md5_gg(c, d, a, b, x[i+15], 14, -660478335);
    b = md5_gg(b, c, d, a, x[i+ 4], 20, -405537848);
    a = md5_gg(a, b, c, d, x[i+ 9], 5 ,  568446438);
    d = md5_gg(d, a, b, c, x[i+14], 9 , -1019803690);
    c = md5_gg(c, d, a, b, x[i+ 3], 14, -187363961);
    b = md5_gg(b, c, d, a, x[i+ 8], 20,  1163531501);
    a = md5_gg(a, b, c, d, x[i+13], 5 , -1444681467);
    d = md5_gg(d, a, b, c, x[i+ 2], 9 , -51403784);
    c = md5_gg(c, d, a, b, x[i+ 7], 14,  1735328473);
    b = md5_gg(b, c, d, a, x[i+12], 20, -1926607734);

    a = md5_hh(a, b, c, d, x[i+ 5], 4 , -378558);
    d = md5_hh(d, a, b, c, x[i+ 8], 11, -2022574463);
    c = md5_hh(c, d, a, b, x[i+11], 16,  1839030562);
    b = md5_hh(b, c, d, a, x[i+14], 23, -35309556);
    a = md5_hh(a, b, c, d, x[i+ 1], 4 , -1530992060);
    d = md5_hh(d, a, b, c, x[i+ 4], 11,  1272893353);
    c = md5_hh(c, d, a, b, x[i+ 7], 16, -155497632);
    b = md5_hh(b, c, d, a, x[i+10], 23, -1094730640);
    a = md5_hh(a, b, c, d, x[i+13], 4 ,  681279174);
    d = md5_hh(d, a, b, c, x[i+ 0], 11, -358537222);
    c = md5_hh(c, d, a, b, x[i+ 3], 16, -722521979);
    b = md5_hh(b, c, d, a, x[i+ 6], 23,  76029189);
    a = md5_hh(a, b, c, d, x[i+ 9], 4 , -640364487);
    d = md5_hh(d, a, b, c, x[i+12], 11, -421815835);
    c = md5_hh(c, d, a, b, x[i+15], 16,  530742520);
    b = md5_hh(b, c, d, a, x[i+ 2], 23, -995338651);

    a = md5_ii(a, b, c, d, x[i+ 0], 6 , -198630844);
    d = md5_ii(d, a, b, c, x[i+ 7], 10,  1126891415);
    c = md5_ii(c, d, a, b, x[i+14], 15, -1416354905);
    b = md5_ii(b, c, d, a, x[i+ 5], 21, -57434055);
    a = md5_ii(a, b, c, d, x[i+12], 6 ,  1700485571);
    d = md5_ii(d, a, b, c, x[i+ 3], 10, -1894986606);
    c = md5_ii(c, d, a, b, x[i+10], 15, -1051523);
    b = md5_ii(b, c, d, a, x[i+ 1], 21, -2054922799);
    a = md5_ii(a, b, c, d, x[i+ 8], 6 ,  1873313359);
    d = md5_ii(d, a, b, c, x[i+15], 10, -30611744);
    c = md5_ii(c, d, a, b, x[i+ 6], 15, -1560198380);
    b = md5_ii(b, c, d, a, x[i+13], 21,  1309151649);
    a = md5_ii(a, b, c, d, x[i+ 4], 6 , -145523070);
    d = md5_ii(d, a, b, c, x[i+11], 10, -1120210379);
    c = md5_ii(c, d, a, b, x[i+ 2], 15,  718787259);
    b = md5_ii(b, c, d, a, x[i+ 9], 21, -343485551);

    a = safe_add(a, olda);
    b = safe_add(b, oldb);
    c = safe_add(c, oldc);
    d = safe_add(d, oldd);
  }
  return Array(a, b, c, d);
}

/*
 * These functions implement the four basic operations the algorithm uses.
 */
function md5_cmn(q, a, b, x, s, t)
{
  return safe_add(bit_rol(safe_add(safe_add(a, q), safe_add(x, t)), s),b);
}
function md5_ff(a, b, c, d, x, s, t)
{
  return md5_cmn((b & c) | ((~b) & d), a, b, x, s, t);
}
function md5_gg(a, b, c, d, x, s, t)
{
  return md5_cmn((b & d) | (c & (~d)), a, b, x, s, t);
}
function md5_hh(a, b, c, d, x, s, t)
{
  return md5_cmn(b ^ c ^ d, a, b, x, s, t);
}
function md5_ii(a, b, c, d, x, s, t)
{
  return md5_cmn(c ^ (b | (~d)), a, b, x, s, t);
}

/*
 * Add integers, wrapping at 2^32. This uses 16-bit operations internally
 * to work around bugs in some JS interpreters.
 */
function safe_add(x, y)
{
  var lsw = (x & 0xFFFF) + (y & 0xFFFF);
  var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
  return (msw << 16) | (lsw & 0xFFFF);
}

/*
 * Bitwise rotate a 32-bit number to the left.
 */
function bit_rol(num, cnt)
{
  return (num << cnt) | (num >>> (32 - cnt));
}


</script>

</body>
</html>