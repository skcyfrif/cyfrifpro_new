<?php $invoice=$invoice[0]; ?>
<div id="printarea">
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
            <h5><?php echo $client->business_name;?></h5><button class="pull-right btn btn-info" onclick="printDiv()">Print</button>
          </div>

          <div class="widget-content">
            <div class="row-fluid">
              <div class="span6">
                <table class="table table-bordered table-invoice">
                  <tbody>
                    <tr>
                    <tr>
                      <td class="width30">Invoice ID:</td>
                      <td class="width70"><strong><?php echo $invoice->invoice.'/P'.$invoice->counter;?></strong></td>
                    </tr>
                    <tr>
                      <td>Issue Date:</td>
                      <td><strong><?php    
                                    $date=$invoice->pay_date;
                                    echo date('d M Y',strtotime($date));
                            ?></strong></td>
                    </tr>
                    <tr>
                      <!-- <td>Due Date:</td>
                      <td><strong><?php    
                                    //$date=$invoice->date;
                                    //echo date('d M Y',strtotime($date));
                            ?></strong>
                      </td> -->
                    </tr>
                  <td class="width30">Customer Details:</td>
                    <td class="width70"><!-- <strong>Customer Company name.</strong> <br>--> 
                      <?php echo $invoice->cname;?> <br>
                      Contact No: <?php echo $invoice->mobile;?> <br>
                      Email: <?php echo $invoice->email;?> <br>
                      Company: <?php echo $invoice->company;?> <br>
                      Website: <?php echo $invoice->website;?> <br>
                     
                      </td>
                  </tr>
                    </tbody>
                  
                </table>
              </div>
              <div class="span6">
                <table class="" style="text-align:right !important;width:100% !important;">
                  <tbody>
                    <tr>
                      <td><img src="<?php echo base_url().$client->imagePath;?>" alt="Brand Name" style="max-height:80px;max-width:140px;" /></td>
                    </tr>
                    
                    <tr>
                    	<td><?php echo 'Mobile: '.$client->email;?></td>
                    </tr>
                    <tr>
                      <td><?php echo 'Email: '.$client->mobile;?></td>
                    </tr>
                    <tr>
                      <td><?php echo $client->address;?></td>
                    </tr>
                    <tr>
                      <td>Website: <?php echo ($client->website) ?? 'N.A';?></td>
                    </tr>
                    <tr>
                      <td>GST Number: <?php echo ($client->gst_number); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
            </div>
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th class="head0">Payment Mode</th>                     
                      <td><?php echo $invoice->paymode; ?></td>
                      <th class="head0">Deposit To</th>                     
                      <td><?php echo $invoice->deposit_to; ?></td>
                      <th class="head0">Reference</th>                     
                      <td><?php echo $invoice->reference; ?></td>
                    </tr>
                    
                      <tr>
                      <th class="head0">Payment</th>                     
                      <td><?php echo $invoice->payment; ?></td>
                      <th class="head0">Tax deducted</th>                     
                      <td><?php echo ($invoice->tax==1)?"Yes, TDS (Income Tax)":" No Tax deducted"; ?></td>
                      <th class="head0">TDS Tax Account</th>                     
                      <td><?php echo $invoice->tax_account; ?></td>
                    </tr>
                  </thead>
                  
                </table>
                <table class="table table-bordered table-invoice-full">
                  <tbody>
                    <tr>
                      <td class="msg-invoice" width="85%"><h4>Payment method: </h4>
                        <a href="#" class="tip-bottom" title="Wire Transfer">Wire transfer</a> |  <a href="#" class="tip-bottom" title="Bank account">Bank account #</a> |  <a href="#" class="tip-bottom" title="SWIFT code">SWIFT code </a>|  <a href="#" class="tip-bottom" title="IBAN Billing address">IBAN Billing address </a></td>
                      <td class="right"><strong>Subtotal</strong> <hr>
                        <strong>CGST: (<?php echo ($invoice->tax_per/2);?>%)</strong> <br>
                        <strong>SGST: (<?php echo ($invoice->tax_per/2);?>%)</strong> <br>
                        <!-- <strong>Discount</strong> -->
                        </td>
                      <td class="right"><strong><?php echo ($invoice->invoice_amnt) ;?> <hr>
                        <?php echo ($invoice->tax/2);?> <br>
                        <?php echo ($invoice->tax/2);?> <br>
                        <!-- 50 -->
                        </strong></td>
                    </tr>
                  </tbody>
                </table>
                <div class="pull-right">
                  <h4><span>Total Amount:</span> <?php echo $invoice->invoice_amnt;?></h4>
                  <br>
                  <!-- <a class="btn btn-primary btn-large pull-right" href="">Pay Invoice</a> </div> -->
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
        var printContents = document.getElementById("printarea").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
}
</script>