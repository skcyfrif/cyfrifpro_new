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
                  <th>Cutomer Name</th>
                  <th>Invoice Count</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($customers){
                  // echo '<pre>';
                  // print_r($customers);
                  $totAmount=0;
                $i=1; foreach($customers as $key){ 

                        $amount=$this->Common_M->getSUM('tbl_invoices','total','customer_id',$key->customer_id);   
                        $totalInvoice=count($this->Common_M->get('tbl_invoices','created','DESC','customer_id',$key->customer_id));     
                        if($totalInvoice > 0){      
                        
                        $totAmount=$totAmount + $amount;  
                    ?>
                    <tr class="gradeX">
                        <td><?php echo $i;?></td>
                        <td><?php echo $key->customer;?></td>
                        <td><?php echo $totalInvoice;?></td>
                        <td><?php echo $amount;?></td>
                    </tr>
                <?php $i++; } } } else { ?>

                    <tr class="gradeX">
                        <td class="center" colspan="4">No data found</td>
                    </tr>

                <?php } ?>
                <tfoot>
                  <tr>
                    <td class="right" style="text-align: right;" colspan="4">
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
