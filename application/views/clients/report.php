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
      <?php $totColumns=count($columns); ?>
      <div class="span12">
     <!--    <a href="<?php echo base_url();?>client/add_sales_order" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
              <tr>
              <?php 

                  $resstrictedColumns=array('client_id','customer_id','vendor_id','id','created','paidFlag','partially_paid_status','partially_paid_amount','preventEdit','received','due','depostited','customer_note','terms_conditions','filePath','deposited');
				  
				  //echo "<pre>"; print_r($columns); exit;
				  
                  foreach($columns as $key){ 

                    $column=$key->COLUMN_NAME;

                    if($column == 'customer' || $column == 'vendor')
                    {
                      $tbl_name='tbl_'.str_replace('_id','',$column).'s';
                      $column_id=$column.'_id';
                      //echo $tbl_name;
                      //echo $column_id;
                      $person=$this->Common_M->getSingleRow($tbl_name,'id',$this_element->$column_id);
                      //exit();
                    }
					
					

                    if(!in_array($column,$resstrictedColumns))
                    {
                  ?>
                    <th><?php echo str_replace('_',' ',strtoupper($column));?></th>
                  <?php } } ?>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($reports){


                $total_amount=0;
                $totalDisplayFlag=0;
                $i=1; foreach($reports as $rkey){ 

                  
                    ?>
                    <tr class="gradeX">
                      <?php 

                        foreach($columns as $key){ 

                          $column=$key->COLUMN_NAME;

                          if($column == 'customer' || $column == 'vendor')
                          {
                            $tbl_name='tbl_'.str_replace('_id','',$column).'s';
                            $column_id=$column.'_id';
                            //echo $tbl_name;
                            //echo $column_id;
                            $person=$this->Common_M->getSingleRow($tbl_name,'id',$this_element->$column_id);
                            //exit();
                          }

                          if(!in_array($column,$resstrictedColumns))
                          {
                        ?>
                        <td class="center"><?php 

                                if($column == 'total')
                                {
                                  $totalDisplayFlag=1;
                                  $total_amount=($total_amount + $rkey->$column);
                                  echo $rkey->$column;
                                }
                                else
                                {
                                  echo $rkey->$column;
                                }

                        ?>

                        </td>
                        <?php } } ?>
                    </tr>
                <?php $i++; } } else { ?>

                    <tr class="gradeX">
                        <td class="center" colspan="<?php echo number_format($totColumns);?>">No data found</td>
                    </tr>

                <?php } 

                  if($totalDisplayFlag == 1){
                ?>
                <tfoot>
                  <tr>
                    <td class="right" style="text-align: right;" colspan="<?php echo $totColumns;?>">
                        <?php echo '<h3>Total: '.$total_amount.'</h3>'; ?>
                    </td>
                  </tr>
                </tfoot>
              <?php } ?>
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
