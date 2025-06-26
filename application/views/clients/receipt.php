<div id="printarea">
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
            <h5 ><?php echo $this->session->userdata('client')['business_name'];?></h5><span style="marin-top:10px;">GST Number: <?php echo ($client->gst_number); ?></span><button class="pull-right btn btn-info" onclick="printDiv()">Print</button>
          </div>

          <div class="widget-content">
            <div class="row-fluid">
              <div class="span12">
                  <a class="pull-left" title="<?php echo $this_element->business_name;?>" href="<?php echo ($client->website) ?? '#';?>"><img src="<?php echo base_url().$client->imagePath;?>" alt="Brand Name" style="max-height:40px;max-width:90px;" /></a>
                <table class="table table-bordered table-this_element">
                  <tbody>
                  <?php 

                  $resstrictedColumns=array('client_id','customer_id','vendor_id','id','tax','tax_per','total','created');
                  foreach($columns as $key){ 

                    $column=$key->COLUMN_NAME;

                    if($column == 'customer' || $column == 'vendor')
                    {
                      $tbl_name='tbl_'.str_replace('_id','',$column).'s';
                      $column_id=$column.'_id';
                      //echo $tbl_name;
                      //echo $column_id;
                      $person=$this->Common_M->getSingleRow($tbl_name,'id',$this_element->$column_id);
                      $country=$this->Common_M->getSingleRow('tbl_countries','id',$person->country_id);
                      $state=$this->Common_M->getSingleRow('tbl_states','id',$person->state_id);
                      $city=$this->Common_M->getSingleRow('tbl_cities','id',$person->city_id);
                      //exit();
                    }

                    if(!in_array($column,$resstrictedColumns))
                    {
                  ?>
                        <tr>
                            <?php if(!empty($this_element->$column)){ ?>
                          <td><?php echo str_replace('_',' ',strtoupper($column));?></td>
                          <td><?php 

                            echo $this_element->$column;

                          ?></td>
                    <?php } ?>
                        </tr>
                      <?php } } ?>
                        <tr>
                          <td>Issue Date:</td>
                          <td>
                            <strong>
                                <?php    
                                        $date=$this_element->date;
                                        echo date('d M Y',strtotime($date));
                                ?>
                            </strong>
                          </td>
                        </tr>
                        <tr>
                        <!-- <td>Due Date:</td>
                        <td><strong><?php    
                                      //$date=$this_element->date;
                                      //echo date('d M Y',strtotime($date));
                              ?></strong>
                        </td> -->
                    </tr>
                    
                  <!-- <td class="width30">Customer Address:</td> -->
                    <!-- <td class="width70"><strong>Customer Company name.</strong> <br>  -->
                      <!-- <?php //echo $person->name;?> <br> -->
                      <!-- Contact No: <?php// echo $person->mobile;?> <br> -->
                      <!-- Email: <?php ///echo $person->email;?><br> -->
                      <!-- <?php //echo $person->address;?> <br> -->
                      <!-- <?php // echo $city->name.', '.$state->name.', '.$country->name;?><br> -->
                       <!-- </td> -->

                        <td class="width30">Customer Address:</td>
                     <td class="width70"><!--<strong>Customer Company name.</strong> <br>  -->
                      <?php echo $tbl_bill->vendor;?> <br>
                      Contact No: <?php echo $tbl_bill->vendor_phone;?> <br>
                      Email: <?php echo $tbl_bill->vendor_email;?><br>
                      <?php echo $tbl_bill->vendor_adds;?> <br>
                      <!-- <?php // echo $city->name.', '.$state->name.', '.$country->name;?><br> -->
                       </td>

                  </tr>
                    </tbody>
                  
                </table>
              </div>
              <!-- <div class="span6">
                <table class="" style="text-align:right !important;width:100% !important;">
                  <tbody>
                    <tr>
                      <td><h4>Client's Company</h4></td>
                    </tr>
                    <tr>
                      <td>Acrux Neon Building</td>
                    </tr>
                    <tr>
                      <td>Block - C,C-002, Hanspal</td>
                    </tr>
                    <tr>
                      <td> Bhubaneswar , Odisha</td>
                    </tr>
                    <tr>
                      <td>Mobile Phone: +999999999999</td>
                    </tr>
                    <tr>
                      <td>Website: <?php echo base_url();?></td>
                    </tr>
                  </tbody>
                </table>
              </div> -->
              
            </div>
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-this_element-full">
                  <thead>
                    <tr>
                      <th class="head0">Title</th>
                      <!-- <th class="head1">Type</th> -->
                      <th class="head0 right">Qty</th>
                      <th class="head0 right">Unit</th>
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
                      <td class="right"><?php echo $key->unit;?></td>
                      <td class="right"><?php echo $key->price;?></td>
                      <td class="right"><strong><?php echo ($key->qty * $key->price);?></strong></td>
                      <td class="right"><strong><?php echo ($key->discount) ?? 'N.A';?>%</strong></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <table class="table table-bordered table-this_element-full">
                  <tbody>
                    <tr>
                      <td class="msg-this_element" width="85%"><h4>Payment method: </h4>
                        <a href="#" class="tip-bottom" title="Wire Transfer">Wire transfer</a> |  <a href="#" class="tip-bottom" title="Bank account">Bank account #</a> |  <a href="#" class="tip-bottom" title="SWIFT code">SWIFT code </a>|  <a href="#" class="tip-bottom" title="IBAN Billing address">IBAN Billing address </a></td>
                      <td class="right"><strong>Subtotal</strong> <br>
                        <strong>CGST: (<?php echo ($this_element->tax_per/2);?>%)</strong> <br>
                        <strong>SGST: (<?php echo ($this_element->tax_per/2);?>%)</strong> <br>
                        <!-- <strong>Discount</strong> -->
                        </td>
                      <td class="right"><strong><?php echo ($this_element->total - $this_element->tax) ;?> <br>
                        <?php echo number_format(($this_element->tax/2),2,",",".");?> <br>
                        <?php echo number_format(($this_element->tax/2),2,",",".");?> <br>
                        <!-- 50 -->
                        </strong></td>
                    </tr>
                  </tbody>
                </table>
                <div class="pull-right">
                  <h4><span>Total Amount:</span> <?php echo $this_element->total;?></h4>
                </div>
                
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