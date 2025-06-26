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
.content {
    height: 100%;
}
</style>
  <div class="container-fluid">
    <div class="row-fluid">


<?php 

// $due_per=ceil(($due/$total)*100);
// $received_per=ceil(($received/$total)*100);
// $deposited_per=ceil(($deposited/$total)*100);

?>

      <!-- <div class="span3">
        <label style="font-family: Arial, Helvetica, sans-serif;">Over Due</label>
        <div class="progress progress-danger progress-striped active">
          <div class="bar" style="width: 60%;"></div>
        </div>
      </div> -->
      <!-- <div class="span4">
        <label style="font-family: Arial, Helvetica, sans-serif;">Due<span class="pull-right" style="color:orange;font-weight:bold;"><?php echo $due;?>/-</span></label>
        <div class="progress progress-striped progress-warning active">
          <div class="bar" style="width: <?php echo $due_per;?>%;"></div>
        </div>
      </div> 
      <div class="span4">
        <label style="font-family: Arial, Helvetica, sans-serif;">Recieved<span class="pull-right" style="color:blue;font-weight:bold;"><?php echo $received;?>/-</span></label>
        <div class="progress progress-striped active">
          <div class="bar" style="width: <?php echo $received_per;?>%;"></div>
        </div>
      </div>
      <div class="span4">
        <label style="font-family: Arial, Helvetica, sans-serif;">Diposited<span class="pull-right" style="color:green;font-weight:bold;"><?php echo $deposited;?>/-</span></label>
        <div class="progress progress-striped progress-success active">
          <div class="bar" style="width: <?php echo $deposited_per;?>%;"></div>
        </div>
      </div>  -->
      <div class="span12">
        <a href="<?php echo base_url();?>client/add_bill" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
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
                  <th>Term</th>
                  <th>Due Date</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($bills){
                $i=1; foreach($bills as $kyx=>$key){ 

                  
                    ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo ++$kyx;?></td>

                        <td><a href="<?php echo base_url();?>client/add_vendor/<?php echo $key->vendor_id;?>"><?php echo $key->vendor;?></a></td>
                        <td><?php echo $key->term;?></td>
                        <td><?php echo date('d M Y',strtotime($key->date));?></td>
                        <td><?php echo $key->total;?></td>

                        <td class="td-actions">

                            <a href="<?php echo base_url();?>client/add_bill/<?php echo $key->id;?>" class="btn btn-xs btn-info">
                                Edit                                       
                            </a>

                            <a href="<?php echo base_url();?>client/receipt?for=bills&id=<?php echo urlencode(base64_encode($key->id));?>" class="btn btn-xs btn-primary">
                                Receipt                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_bills" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
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
