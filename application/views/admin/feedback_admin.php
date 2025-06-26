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
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Client Email</th>
                  <th>Client Phone</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Created </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if($feedback){
                $i=1; foreach($feedback as $kyx=>$key){ 
                    ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo ++$kyx;?></td>
                        <td><?php echo $key->client_email;?></td>
                        <td><?php echo $key->client_phone	;?></td>
                        <td><?php echo $key->subject;?></td>
                        <td><?php echo $key->message;?></td>
                        <td><?php echo $key->created;?></td>
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
