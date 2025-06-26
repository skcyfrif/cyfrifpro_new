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

.u-vmenu ul ul{
  display: none;
}
.u-vmenu ul {
    list-style: none;
    margin: 0px 0 0;
    padding: 0;
    /* position: absolute; */
    width: 220px;
    border-bottom: 1px solid #37414b;
}
.u-vmenu ul li {
    border-top: 1px solid #37414b;
    border-bottom: 1px solid #1f262d;
    display: block;
    position: relative;
}
.u-vmenu ul li a {
    padding: 10px 0 10px 15px;
    display: block;
    color: #939da8;
}
.u-vmenu ul li a i {
    margin-right: 10px;
}
.u-vmenu ul li a .label {
    background-color: #F66;
  margin: 0 20px 0 0;
    float: right;
    padding: 3px 5px 2px;
}
.u-vmenu ul li ul {
    background: #10736c;
}
.u-vmenu ul li ul li ul{
    background: #299a92;
}
.u-vmenu ul li ul li ul li ul{
    background: #299a92;
}
.u-vmenu ul li ul li ul li ul li ul{
    background: #299a92;
}
.u-vmenu ul li ul li ul li ul li ul li ul{
    background: #299a92;
}
.u-vmenu ul li ul li ul li ul li ul li ul li ul{
    background: #299a92;
}
.u-vmenu ul li ul li ul li ul li ul li ul li ul li ul{
    background: #1db7ac;
}
.u-vmenu ul li ul li a {
    color: #fff;
}


/*********************** PRE Loader  *******************************/

.loader{
    width: 30px;
    height: 30px;
    margin: 40px auto;
    transform: rotate(-45deg);
    font-size: 0;
    line-height: 0;
    animation: rotate-loader 5s infinite;
    padding: 10px;
    border: 1px solid #28b779;
}
.loader .loader-inner{
    position: relative;
    display: inline-block;
    width: 50%;
    height: 50%;
}
.loader .loading{
    position: absolute;
    background: #cf303d;
}
.loader .one{
    width: 100%;
    bottom: 0;
    height: 0;
    animation: loading-one 1s infinite;
}
.loader .two{
    width: 0;
    height: 100%;
    left: 0;
    animation: loading-two 1s infinite;
    animation-delay: 0.25s;
}
.loader .three{
    width: 0;
    height: 100%;
    right: 0;
    animation: loading-two 1s infinite;
    animation-delay: 0.75s;
}
.loader .four{
    width: 100%;
    top: 0;
    height: 0;
    animation: loading-one 1s infinite;
    animation-delay: 0.5s;
}
@keyframes loading-one {
    0% {
        height: 0;
        opacity: 1;
    }
    12.5% {
        height: 100%;
        opacity: 1;
    }
    50% {
        opacity: 1;
    }
    100% {
        height: 100%;
        opacity: 0;
    }
}
@keyframes loading-two {
    0% {
        width: 0;
        opacity: 1;
    }
    12.5% {
        width: 100%;
        opacity: 1;
    }
    50% {
        opacity: 1;
    }
    100% {
        width: 100%;
        opacity: 0;
    }
}
@keyframes rotate-loader {
    0% {
        transform: rotate(-45deg);
    }
    20% {
        transform: rotate(-45deg);
    }
    25% {
        transform: rotate(-135deg);
    }
    45% {
        transform: rotate(-135deg);
    }
    50% {
        transform: rotate(-225deg);
    }
    70% {
        transform: rotate(-225deg);
    }
    75% {
        transform: rotate(-315deg);
    }
    95% {
        transform: rotate(-315deg);
    }
    100% {
        transform: rotate(-405deg);
    }
}
.loadcustom{
  position: fixed;
    left: 0px;
    width: 100%;
    top: 50%;
    transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    z-index: 99999999;
}
/*********************** END PRE LOADER  *****************************/
.container-fluid{
  height: 100% !important;
  width: 100% !important;
}
.table.table-bordered tr td {
  padding: 0 4px !important; 
}
.table th, .table td{
  padding: 0 4px !important; 
}
.table {    
    margin-bottom: 5px;
}
table.tbl-invs td {
    border: 1px solid #ccc !important;
}

table.tbl-invs {
    width: 100%;
    background: #fff;
}
.table thead th {
    vertical-align: top;
}



</style>
</head>
<body id="printarea">
<div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
            <h5><?php echo $client->business_name;?></h5><button class="pull-right btn btn-info" onclick="printDiv()">Print</button>
          </div>

          <div class="widget-content" id="printarea2">
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice" width="100%">
                  <tbody>
                    <?php $d=date('d m y h i s' , strtotime($invoice->created));
                         $d=str_replace(" ","",$d);
                     ?>
                   <tr>
                      <td width="50%" colspan="2"><img src="<?php echo base_url().$client->imagePath;?>" alt="Brand Name" style="max-height:80px;max-width:140px;" /></td>
                      <td width="50%"><img alt="testing" src="<?php  echo base_url(); ?>barcode.php?text=CYF<?php echo $d; ?>&print=true"/></td>
                    </tr>           
                    
                    <!--<tr>
                      <td colspan="4"><strong><?php echo $client->address;?>,Website: <?php echo ($client->website) ?? 'N.A';?>,GST Number: <?php echo ($client->gst_number); ?>,<?php echo 'Mobile: '.$client->mobile;?>,<?php echo 'Email: '.$client->email;?></strong></td>
                    </tr> -->    
                    <tr>
                      <td colspan="2">Type</td>
                       <td colspan="2"><strong><?php echo $invoice->type;?></strong></td>
                    </tr>
                    <tr>
                      <td width="50%" colspan="3">
                        <table width="100%">
                          <tr>
                            <td colspan="4"><strong>Supplier;</strong></td>
                          </tr>
                          <tr> 
                            <td>Name</td>
                            <td colspan="3"><?php echo $client->business_name; ?></td>
                          </tr>
                          <tr>
                            <td>Address</td>
                            <td colspan="3"><?php echo $client->address; ?></td>
                          </tr>
                          <tr> 
                            <td width="25%">Contact No:</td>
                            <td width="25%"><?php echo $client->mobile; ?></td>
                            <td width="25%">Email:</td>
                            <td width="25%"><?php echo $client->email; ?></td>
                          </tr>

                          <tr> 
                            <td width="25%">State Code:</td>
                            <td width="25%"><?php echo $client->state_code; ?></td>
                            <td width="25%">GST:</td>
                            <td width="25%"><?php echo $client->gst_number; ?></td>
                          </tr>                            
                        </table>
                      </td>
                      <td width="50%">
                        <table width="100%">
                           <tr>
                              <td style="border-left: none; width: 25%;">Invoice ID:</td>
                              <td style="width: 25%;"><strong><?php echo $invoice->number;?></strong></td>                    
                              <td  width="25%">Issue Date:</td>
                              <td  width="25%"><strong><?php    
                                          $date=$invoice->date;
                                          echo date('d M Y',strtotime($date));
                                  ?></strong></td> 
                          </tr>
                          <tr>
                              <td style="border-left: none; width: 25%;">Mode:</td>
                              <td style="width: 25%;"><strong></strong></td>                          
                              <td  width="25%">Term of Payments:</td>
                              <td  width="25%"><strong><?php echo $invoice->terms; ?></strong></td>
                          </tr>
                          <tr>
                              <td style="border-left: none; width: 25%;">SAP Doc No.:</td>
                              <td style="width: 25%;"><strong></strong></td>                          
                              <td  width="25%">AWB No:</td>
                              <td  width="25%"><strong></strong></td>
                          </tr>

                        </table>                        
                      </td>
                    </tr>



                    <tr>
                      <td colspan="2" width="35%">
                        <table  width="100%">
                          <tr>
                            <td colspan="4"><strong>Place of Supply</strong></td>
                          </tr>
                          <tr>                              
                            <td>Name</td>
                            <td colspan="3"><?php echo $customer->name; ?></td>
                          </tr>
                          <tr>
                            <td>Address</td>
                            <td colspan="3" ><?php echo $customer->address; ?>, <?php echo $CSCNames['city'].', '.$CSCNames['state'].', '.$CSCNames['country'];?></td>
                          </tr>
                          <tr> 
                            <td width="25%">Contact No:</td>
                            <td width="25%"><?php echo $customer->mobile; ?></td>
                            <td width="25%">Email:</td>
                            <td width="25%"><?php echo $customer->email; ?></td>
                          </tr>

                          <tr> 
                            <td width="25%">State Code:</td>
                            <td width="25%"><?php echo $customer->state_code; ?></td>
                            <td width="25%">GST:</td>
                            <td width="25%"><?php echo $customer->gst; ?></td>
                          </tr>
                        </table>
                      </td>                     
                      
                       <td width="35%">
                        <table  width="100%">
                          <tr>
                            <td colspan="4"><strong>Customer Details</strong></td>
                          </tr><tr>                              
                            <td>Name</td>
                            <td colspan="3"><?php echo $customer->name; ?></td>
                          </tr>
                          <tr>
                            <td>Address</td>
                            <td colspan="3"><?php echo $customer->address; ?>, <?php echo $CSCNames['city'].', '.$CSCNames['state'].', '.$CSCNames['country'];?></td>
                          </tr>
                          <tr> 
                            <td width="25%">Contact No:</td>
                            <td width="25%"><?php echo $customer->mobile; ?></td>
                            <td width="25%">Email:</td>
                            <td width="25%"><?php echo $customer->email; ?></td>
                          </tr>

                          <tr> 
                            <td width="25%">State Code:</td>
                            <td width="25%"><?php echo $customer->state_code; ?></td>
                            <td width="25%">GST:</td>
                            <td width="25%"><?php echo $customer->gst; ?></td>
                          </tr>
                        </table>
                      </td>
                      <td width="30%">
                        <table  width="100%">
                           <tr>
                              <td style="border-left: none; width: 25%;">Buyer PO No:</td>
                              <td style="width: 25%;"><strong></strong></td>
                              <td  width="25%">PO Date:</td>
                              <td  width="25%"><strong></strong></td>
                          </tr>                      

                          <tr>
                              <td style="border-left: none; width: 25%;">E-Way Bill No:</td>
                              <td style="width: 25%;"><strong></strong></td>                          
                              <td  width="25%">E-Way Date:</td>
                              <td  width="25%"><strong></strong></td>
                          </tr>

                          <tr>
                              <td style="border-left: none; width: 25%;">Area Code / Destination:</td>
                              <td style="width: 25%;"><strong></strong></td>                          
                              <td  width="25%">Delivery Documents:</td>
                              <td  width="25%"><strong></strong></td>
                          </tr>
                          <tr>
                              <td>Despatched Through:</td>
                              <td colspan="3"><strong></strong></td>
                          </tr>
                        </table>                        
                      </td>
                    </tr> 




                      <tr>
                        <td colspan="4"  width="100%">
                          <table class="table table-bordered table-invoice-full" width="100%">
                            <thead>
                              <tr>
                              	<th class="head0">Sl No</th>
                                <th class="head0">Title</th>
                                <th class="head0 right">HSN/SAC</th>
                                <th class="head0 right">Unit</th>
                                <th class="head0 right" >Qty</th>
                                <th class="head1 right">Price</th>
                                <th class="head0 right">Dis.</th>
                                <th class="head1 right">Taxable Value</th>
                                <th class="head0 right" style="line-height: 12px;">TAX Rate
                                	<span class="">IGST, CGST, SGST</span>
                                	
                                </th>
                                <th class="head1 right">TAX Amount</th>
                                <th class="head1 right">Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                               <?php 

                              $discount=0;
                              $taxmnt=0;
                              $subtot=0;
                              $subtot1=0;
                              $subtot2=0;
                              $allto=0;
                              $i=1;
                              $igstary=array();
                              $sgstary=array();
                              $lron=array();           
                              $tloot=0;                                     
                              $allto=0;
                            foreach($products as $key) {

                              //echo "<pre>"; print_r($key); 

                                 $sql="SELECT type,id FROM tbl_inventory WHERE title='".$key->title."' and client_id='".$key->client_id."'";
                                $query = $this->db->query($sql);

                                $res=$query->result();
    
                                if($res[0]->type=="Service"){
                                  $lron[]="Service";
                                }
                                  $key->discount = isset($key->discount) ? $key->discount : 0;
                                  $discount= ($key->discount)? (($key->price*$key->discount)/100)*$key->qty: 0;
                                  $subtot1=($key->qty * $key->price)-$discount;
                                  $subtot2=($subtot1 * $key->tax)/100;
                                  $subtot=$subtot2+$subtot1;
                            ?>
                              <tr>
                              	<td><?php echo $i++;?></td>
                                <td><?php echo $key->title;?></td>
                                <td class="right"><?php echo $key->hsn;?></td>
                                <td class="right"><?php echo $key->unit;?></td>
                                <td class="right"><?php echo $key->qty;?></td>
                                <td class="right"><?php echo number_format($key->price,2);?></td>
                                <td class="right"><strong><?php echo isset($key->discount) ? $key->discount: 'N.A';?>%</strong></td>
                                <td class="right"><strong><?php echo number_format($subtot1,2);?></strong></td>
                                <td class="right">                                	
                                <?php if($customer->state_code==$client->state_code){                      
                                      $sgstary[$i]['tax']=$key->tax;
                                      $sgstary[$i]['subto']=$subtot1;                        

                                  ?>
                                  <span class="taxrattabl right">0%</span>
                                	<span class="taxrattabl right"><?php echo ($key->tax/2);?>%</span>
                                	<span class="taxrattabl right"><?php echo ($key->tax/2);?>%</span>	
                                   <?php }else { 

                                      $igstary[$i]['tax']=$key->tax;
                                      $igstary[$i]['subto']=$subtot1;
                                    ?>                                  
                                  <span class="taxrattabl right"><?php echo ($key->tax);?>%</span>
                                	<span class="taxrattabl right">0%</span>
                                	<span class="taxrattabl right">0%</span>	
                                  <?php } ?>
                                	</td>
                                <td class="right"><strong><?php echo number_format($subtot2,2); ?></strong></td>

                                <td class="right"><strong><?php  echo number_format($subtot,2); ?></strong></td>

                              </tr>
                            <?php 
                              $allto+=$subtot1;
                              $taxmnt+=$subtot2;
                          } 

                              
                            ?>
                              </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                      	<td colspan="4"> 
                      	<table class="tbl-invs1" width="100%">
                      		<tr>
                      			<td width="33%">                     		
		                      		<table class="tbl-invs" width="100%">
		                      			<thead>
			                              	<tr>
			                              		<td>Bank Detail</td>
			                              	</tr>
		                                </thead>
			                            <tbody>
			                            	<tr>
			                            		<td>Name : <strong><?php echo $client->ac_holder;?></strong></td>
			                            	</tr>
			                            	<tr>
			                            		<td>Account No : <strong><?php echo $client->acno;?></strong></td>
			                            	</tr>
			                            	<tr>
			                            		<td>IFSC Code : <strong><?php echo $client->ifccode;?></strong></td>
			                            	</tr>
                                      <tr>
                                      <td>Bank Name : <strong><?php echo $client->bank;?></strong></td>
                                    </tr>
			                            </tbody>
		                        	</table>
		                      	</td>
                      	<td width="34%">
                      		
                      		<table class="tbl-invs" width="100%">
                      		    <thead>
                      			<tr>
                      				<td>GST Classification</td>
                      			</tr>
                      			  </thead>
                      			     <tbody>
                      			<tr>
                      				<td>
                      					<table class="table" width="100%">
                      						<tr>
                      							<td>Value</td>
                      							<td>IGST Rate</td>
                      							<td>IGST Amount</td>
                      							<td>CGST Rate</td>
                      							<td>CGST Amount</td>
                      							<td>SGST Rate</td>
                      							<td>SGST Amount</td>
                      						</tr>
                                  <?php 
                                  $sgstval=$this->Client_M->callarray($sgstary); 
                                  if(!empty($sgstval)){
                                    foreach ($sgstval as $k) {
                                  ?>
                      						<tr>
                      							<td><?php echo number_format($k['total'],2); ?></td>
                      							<td>0</td>
                      							<td>0</td>
                      							<td><?php echo $k['cgst']; ?>%</td>
                      							<td><?php echo number_format($k['total']*$k['cgst']/100,2); ?></td>
                      							<td><?php echo $k['sgst']; ?>%</td>
                      							<td><?php echo number_format($k['total']*$k['sgst']/100,2); ?></td>
                      						</tr>
                                  <?php } } ?>
                                <?php 
                                $igstval=$this->Client_M->callarray2($igstary); 
                                 
                                if(!empty($igstval)){
                                  foreach ($igstval as $k) {
                                    //echo "<pre>"; print_r($k);
                                ?>

                                  <tr>
                                    <td><?php echo number_format($k['total'],2); ?></td>
                                    <td><?php echo $k['igsc']; ?>%</td>
                                    <td><?php echo number_format($k['total']*$k['igsc']/100,2); ?></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                  </tr>
                                <?php } } ?>
                      				   </table>
                      				</td>
                      			</tr>
                      			  </tbody>
                      		</table>

                      	</td>
                      	<td width="33%">
                      		<table class="tbl-invs" width="100%">
                      		     <thead>
                      			<tr>
                      				<td colspan="2">Summary</td>
                      			</tr>
                      				  </thead>
                      				     <tbody>
                      			
                      			<tr>
                      				<td>Sub Total</td>
                      				<td><?php echo number_format($allto,2) ;?></td>
                      			</tr>

                      			<tr>
                      				<td>Tax Amount</td>
                      				<td><?php echo number_format($taxmnt,2) ;?></td>
                      			</tr>

                      			<tr>
                      				<td>Grand Total</td>
                      				<td><?php 
                              if(!empty($lron)){
                                $tloot= number_format($allto+$taxmnt,2);
                              }else{
                                $tloot= number_format(round($allto +$taxmnt),2);
                              }
                              
                              echo $tloot;

                              ?></td>
                      			</tr>
                      			   </tbody>
                      		</table>
                      	</td>
                      	</tr>
                      	</table>
                      	</td>
                      </tr>

                    
                      <tr>
                                               
                        <td style="text-align:center !important;" colspan="3"> <h4><span>Total Amount:</span> <?php echo $this->Client_M->convert_number_to_words($tloot); ?></h4></td>
                       <td style="width: 50%; border: none; border-left: 1px solid #ddd; border-top: 1px solid #ddd; padding:0;" >
                                      <h5 style="text-align:right;"></h5>
                                        <p style="float:right;">Authorised Signatory</p>
                                    </td>
                      </tr> 



                     <tr>
                       <td style="width: 50%; border: none;" colspan="4">
                                        <h5>Declaration</h5>
                                        <p><?php echo $invoice->terms_conditions;?></p>
                                    </td>
                                    
                     </tr>

                  </tbody>
                </table>               
                       
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>
</div>
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
