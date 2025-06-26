<style>
.row-fluid .span12 {
  margin-left:0 !important;
}
.btn span.glyphicon {         
  opacity: 0 !important;       
}
.btn.active span.glyphicon {        
  opacity: 1 !important;
}
</style>
  <div class="container-fluid">
    <div class="row-fluid">

      <div class="span12">
        <!-- <a href="<?php echo base_url();?>client/add_recurring_bill" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item Name</th>
                  <th>Unit Price</th>
                  <th>Quantity</th>
                  <th>Amount(unit)</th>
                  <th>Discount</th>
                </tr>
              </thead>
              <tbody>
              <?php 

              if($items)
              {
                  // echo '<pre>';
                  // print_r($items);exit();
                  $totAmount=0;
                  $i=1; 
                  foreach($items as $key){ 

                    $whereArr=array('title'=>$key->title,'client_id'=>$key->client_id);
                    $qty=$this->Common_M->getSUMArr('tbl_invoice_inventory','qty',$whereArr);
                    if($qty > 0)
                    {
                        $price=$this->Common_M->getSUMArr('tbl_invoice_inventory','price',$whereArr);  
                        $discount=$this->Common_M->getSUMArr('tbl_invoice_inventory','discount',$whereArr);  
                        $whereUnitArr=array('title'=>$key->title,'client_id'=>$client_id);
                        $unit=$this->Common_M->getSingleRowArr('tbl_inventory',$whereUnitArr);

                        $grossAmount=($price * $qty);
                        if(($qty % 2) == 0)
                        {
                          $grossAmount=($grossAmount / 2);
                        }

                        $discountAmount=($grossAmount) * ($discount/100);
                        $totAmount=$totAmount + ($grossAmount - $discountAmount);  
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $i;?></td>
                            <td><a href="<?php echo base_url();?>inventory/add_inventory/<?php echo $key->id;?>"><?php echo $key->title;?></a></td>
                            <td><?php echo $unit->saleprice;?></td>
                            <td><?php echo $qty;?></td>
                            <td><?php echo $grossAmount;?></td>
                            <td><?php echo $discountAmount;?></td>
                        </tr>
                    <?php $i++; } } } else { ?>

                        <tr class="gradeX">
                            <td class="center" colspan="6">No data found</td>
                        </tr>

                    <?php } ?>
                <tfoot>
                  <tr>
                    <td class="right" style="text-align: right;" colspan="6">
                        <?php echo '<h3>Total: '.$totAmount.'</h3>'; ?>
                    </td>
                  </tr>
                </tfoot>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> 

