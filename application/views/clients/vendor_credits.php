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


<?php 

// $due_per=ceil(($due/$total)*100);
// $received_per=ceil(($received/$total)*100);
// $deposited_per=ceil(($deposited/$total)*100);

?>


      <div class="span12">
        <a href="<?php echo base_url();?>client/add_vendor_credit" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Vendor</th>
                  <th>Credit Note</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($vendor_credits){
                $i=1; foreach($vendor_credits as $ky=>$key){ 

                  
                    ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo ++$ky;?></td>

                        <td><?php echo $key->vendor;?></td>
                        <td><?php echo $key->credit_note;?></td>
                        <td><?php echo date('d M Y',strtotime($key->date));?></td>
                        <td><?php echo $key->total;?></td>

                        <td class="td-actions">

                            <a href="<?php echo base_url();?>client/add_vendor_credit/<?php echo $key->id;?>" class="btn btn-xs btn-info">
                                Edit                                       
                            </a>

                             <a href="<?php echo base_url();?>client/receipt?for=vendor_credits&id=<?php echo urlencode(base64_encode($key->id));?>" class="btn btn-xs btn-primary">
                                Receipt                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_vendor_credits" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
                                Delete                                       
                            </a>
                        </td>
                    </tr>
                <?php $i++; } } else { ?>

                    <tr class="gradeX">
                        <td class="center" colspan="5">No data found</td>
                    </tr>

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
