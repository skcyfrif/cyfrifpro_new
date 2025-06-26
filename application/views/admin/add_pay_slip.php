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
.customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
.customers td {
    border: 1px solid #ddd;
    padding: 8px;
}

.pay-slip {
    width: 100%;
    float: left;
    padding: 20px 0;
}
.pay-slip .wrapper {
    width: 98%;
    /* float: left; */
    margin: auto;
}
.pay-slip .wrapper table{
width:100%;}
.comp-nm{
    text-align: center !important;
    font-size: 20px!important;
    padding: 15px!important;
    font-family: 'Times New Roman'!important;
    color: #151515!important;
    font-style: italic!important;
    font-weight: bold!important;
}
.sub-comp-details{
    text-align: center!important;
    font-size: 18px!important;
    padding: 15px!important;
    font-family: 'Times New Roman'!important;
    color: #151515!important;
    font-style: italic!important;
    font-weight: bold!important;
}
.customers td input {
    width: 95%;
    padding: 0 10px;
    height: 40px;
    border: none;
    background: transparent;
    margin: 0;
    float: left;
	font-size: 15px;
    font-family: 'Times New Roman';
    color: #151515;
    font-style: italic;
    font-weight: bold;
}
.customers td input::-webkit-input-placeholder
{ 
  text-align: left;
    font-size: 15px;
    padding: 10px;
    font-family: 'Times New Roman';
    color: #151515;
    font-style: italic;
    font-weight: bold;
}
.customers td input[type="text"]:focus{
	outline:none;
	box-shadow:none;
}
.customers td input::-webkit-input-placeholder:-ms-input-placeholder{ 
   text-align: left;
    font-size: 15px;
    padding: 10px;
    font-family: 'Times New Roman';
    color: #151515;
    font-style: italic;
    font-weight: bold;
}
.customers td input::placeholder{ 
  text-align: left;
    font-size: 15px;
    padding: 10px;
    font-family: 'Times New Roman';
    color: #151515;
    font-style: italic;
    font-weight: bold;
}
.customers tr td{
 	text-align: left;
    font-size: 15px;
    padding: 10px;
    font-family: 'Times New Roman';
    color: #151515;
    font-style: italic;
    font-weight: bold;
 }
</style>
</head>

<body>
<div class="pay-slip">
	<div class="wrapper">
<table class="customers" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="2" width="166"><img src="http://www.cyfrif.com/assets/site/images/logo.png" /></td>
    <td colspan="6" width="783" class="comp-nm">Cyfrifpro Private Limited</td>
  </tr>
  <tr>
    <td colspan="6" class="sub-comp-details">Payslip for the month of November 2019</td>
  </tr>
  <tr>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td width="187">Employee Code</td>
    <td width="120">&nbsp;</td>
    <td width="139">Posted Location</td>
    <td width="120">&nbsp;</td>
    <td width="261">PF Account No</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>Name</td>
    <td>&nbsp;</td>
    <td>EPS Account No</td>
    <td>&nbsp;</td>
    <td colspan="3" rowspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>&nbsp;</td>
    <td>Bank Name</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>DOJ</td>
    <td>&nbsp;</td>
    <td>Bank A/C No</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Date Of  Confirmation</td>
    <td>&nbsp;</td>
    <td>Standerd Days</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Grade</td>
    <td>&nbsp;</td>
    <td>LOP Days</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Department</td>
    <td>&nbsp;</td>
    <td>Refund Days</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td>Earning</td>
    <td>Monthly Rate</td>
    <td>Current Month</td>
    <td>Arrears</td>
    <td width="261">Total</td>
    <td width="145">Deductions</td>
    <td width="124">Total</td>
  </tr>
  <tr>
    <td>Basic</td>
    <td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP"/></td>
<td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP + Arrear"/></td>
<td>Profession Tax</td>
<td><input type="text" placeholder="Total Amount"/></td>
  </tr>
  <tr>
    <td>House Rent    Allowance</td>
    <td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP"/></td>
<td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP + Arrear"/></td>
<td>Employee PF</td>
<td><input type="text" placeholder="Total Amount"/></td>
  </tr>
  <tr>
    <td>Conveyance&nbsp;Allowance</td>
    <td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP"/></td>
<td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP + Arrear"/></td>
<td>ESIC</td>
<td><input type="text" placeholder="Total Amount"/></td>
  </tr>
  <tr>
    <td>Medical&nbsp;Allowance</td>
    <td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP"/></td>
<td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP + Arrear"/></td>
    <td colspan="2" rowspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>Lunch    Allowance&nbsp;</td>
    <td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP"/></td>
<td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP + Arrear"/></td>
  </tr>
  <tr>
    <td>Personal    Pay&nbsp;</td>
    <td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP"/></td>
<td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP + Arrear"/></td>
  </tr>
  <tr>
    <td>Other    Allowance&nbsp;</td>
    <td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP"/></td>
<td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP + Arrear"/></td>
  </tr>
  <tr>
    <td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP"/></td>
<td><input type="text" placeholder="Amount"/></td>
<td><input type="text" placeholder="LOP + Arrear"/></td>
  </tr>
  <tr>
    <td colspan="2">Total Amount</td>
    <td colspan="2">Gross Earning</td>
    <td>Sum Of Above</td>
    <td>Gross Deductions</td>
    <td>Sum Of Above</td>
  </tr>
  <tr>
    <td colspan="4">Net Salary Payable</td>
    <td>Gross Earning - Gross    Deductions</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7">Net Salary Payable    (In Words ) :</td>
  </tr>
</table>    

<p>Generated on DD/MM/YYYY  HH:MM</p>
<p>This is system generated payslip no need to seal & signature.</p>
	</div>
</div>