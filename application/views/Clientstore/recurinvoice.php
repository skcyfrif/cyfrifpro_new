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
                      <td class="width70"><strong><?php echo $invoice->number;?></strong></td>
                      
                    </tr>
                    
                    <tr>
                      <td>Issue Date:</td>
                      <td><strong><?php    
                                    $date=$invoice->date;
                                    echo date('d M Y',strtotime($date));
                            ?></strong></td>
                    </tr>
                    <tr>
                    	<td class="width30">Repeat Every:</td>
                      <td class="width70"><strong><?php echo $invoice->repet_every;?></strong></td>
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
                      <?php echo $customer->name;?> <br>
                      Contact No: <?php echo $customer->mobile;?> <br>
                      Email: <?php echo $customer->email;?> <br>
                      <?php echo $customer->address;?> <br>
                      <?php echo $CSCNames['city'].', '.$CSCNames['state'].', '.$CSCNames['country'];?>
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
                    	<td><?php echo 'Mobile: '.$client->mobile;?></td>
                    </tr>
                    <tr>
                      <td><?php echo 'Email: '.$client->email;?></td>
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
                      <th class="head0">Title</th>
                      <!-- <th class="head1">Type</th> -->
                      <th class="head0 right">Qty</th>
                      <th class="head1 right">Price</th>
                      <th class="head0 right">Amount</th>
                      <th class="head0 right">Discount</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 

                    $discount=0;
                  foreach($products as $key) { 

                        $total=($key->qty * $key->price);
                        $discount=$discount+$key->discount;
                  ?>
                    <tr>
                      <td><?php echo $key->title;?></td>
                      <!-- <td><?php echo $key->type;?></td> -->
                      <td class="right"><?php echo $key->qty;?></td>
                      <td class="right"><?php echo $key->price;?></td>
                      <td class="right"><strong><?php echo ($key->qty * $key->price);?></strong></td>
                      <td class="right"><strong><?php echo ($key->discount) ?? 'N.A';?>%</strong></td>
                    </tr>
                  <?php } ?>
                  </tbody>
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
                      <td class="right"><strong><?php echo ($invoice->total - $invoice->tax) ;?> <hr>
                        <?php echo ($invoice->tax/2);?> <br>
                        <?php echo ($invoice->tax/2);?> <br>
                        <!-- 50 -->
                        </strong></td>
                    </tr>
                  </tbody>
                </table>
                <div class="pull-right">
                  <h4><span>Total Amount:</span> <?php echo $invoice->total;?></h4>
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