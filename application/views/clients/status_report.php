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
                  <th>Invoice</th>
                  <th>Cutomer Name</th>
                  <th>Date</th>
                  <th><?php echo ucfirst($for);?> Amount</th>
                </tr>
              </thead>
              <tbody>
            <?php 

              if($invoices)
              {
                  $totAmount=0;
                  foreach($invoices as $key)
                  {     
                        $totAmount=$totAmount + $key->$for;  
                    ?>
                    <tr class="gradeX">
                        <td><?php echo 'INV-'.$key->id;?></td>
                        <td><?php echo $key->customer;?></td>
                        <td><?php echo date('d M y',strtotime($key->date));?></td>
                        <td><?php echo $key->$for;?></td>
                    </tr>
                <?php } } else { ?>

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
