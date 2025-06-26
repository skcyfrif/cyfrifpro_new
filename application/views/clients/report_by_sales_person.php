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
                  <th>Sales Person</th>
                  <th>Invoice Count</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
              <?php 

                if($sales_persons){
                  // echo '<pre>';
                  // print_r($sales_persons);
                  $totAmount=0;
                $i=1; foreach($sales_persons as $key){ 

                		$whereArr=array('client_id'=>$this->session->userdata('client')['id'],'sales_person'=>$key->sales_person);
                        $amount=$this->Common_M->getSUMArr('tbl_invoices','total',$whereArr);   
                        $totalInvoice=count($this->Common_M->getByArr('tbl_invoices','created','DESC',$whereArr));     
                        if($totalInvoice > 0){      
                        
                        $totAmount=$totAmount + $amount;  
                    ?>
                    <tr class="gradeX">
                        <td><?php echo $i;?></td>
                        <td><?php echo $key->sales_person;?></td>
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

<script type="text/javascript">
  function changeIt(val)
  {
    var status=$(val).val();
    var id=$(val).attr('data-id');
    window.location="<?php echo base_url();?>admin/changeStatus/"+status+'/'+id;
  }
</script>
