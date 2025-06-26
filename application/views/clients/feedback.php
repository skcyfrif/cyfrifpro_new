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
        <a href="<?php echo base_url();?>client/add_feedback" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a><a href="javascript:void();" class="pull-right">&nbsp;  &nbsp;</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Users</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Created </th>
                  <th>Updated</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($feedback){
                $i=1; foreach($feedback as $kyx=>$key){ 

                  
                    ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo ++$kyx;?></td>
                        <td><?php echo $key->email;?></td>
                        <td><?php echo $key->subject;?></td>
                        <td><?php echo $key->message;?></td>
                        <td><?php echo $key->created;?></td>
                        <td><?php echo $key->updated;?></td>
                        <td class="td-actions">
                            <a href="<?php echo base_url();?>client/add_feedback/<?php echo $key->id;?>" class="btn btn-xs btn-info">
                                Edit                                       
                            </a>
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_feedback" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
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
