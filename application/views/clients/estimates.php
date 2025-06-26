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
        <a href="<?php echo base_url();?>client/add_estimate" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> <a href="javascript:void();" class="pull-right">&nbsp;  &nbsp;</a>
        <a href="<?php echo base_url();?>estimate/csv" ><button class="btn btn-success btn-sm pull-right">Import</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Estimate Number</th>
                  <th>Customer</th>
                  <th>Project</th>
                  <th>Date</th>
                  <th>Expiry Date</th>
                  <th>Document</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($estimates){
                $i=1; foreach($estimates as $kyx => $key){ 

                  
                    ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo ++$kyx;?></td>

                        <td><?php echo $key->customer;?></td>
                        <td><?php echo "PROJ0".$key->project_name;?></td>
                        <td><?php echo date('d M Y',strtotime($key->date));?></td>
                        <td><?php echo date('d M Y',strtotime($key->expiry_date));?></td>
                        <td> 
                          <?php if($key->filePath != NULL)
                          {
                              echo '<a href="'.base_url().$key->filePath.'" class="">Download</a>';
                          }
                          else
                          {

                              echo '<span style="color:red;">N.A</span>';
                          }
                          ?>
                        </td>
                        <td><?php echo $key->total;?></td>
                      <!--   <td> 
                            <?php    
                                    // $date=explode(' ',$key->created);
                                    // echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td> -->
                       <!--  <td>
                          
                            <select onclick="changeIt(this)" data-id="<?php //echo $key->id;?>" >
                              <option value="due" <?php //echo ($key->status == 'due') ? 'selected' : '';?> >Due</option>
                              <option value="received" <?php //echo ($key->status == 'received') ? 'selected' : '';?> >Recieved</option>
                              <option value="deposited" <?php //echo ($key->status == 'deposited') ? 'selected' : '';?> >Deposited</option>
                            </select>

                        </td> -->
                        <td class="td-actions">
                            <!-- <a type="button" onclick="putData(this)" data-id="<?php //echo $key->id;?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Manage</a> -->
                            
                            <!--<a href="<?php //echo base_url();?>admin/estimate/<?php //echo base64_encode($key->id);?>" class="btn btn-xs btn-primary">-->
                            <!--    estimate <?php //echo $key->id;?>                                  -->
                            <!--</a>-->
                            <!-- <a href="<?php //echo base_url();?>admin/estimate/<?php //echo $key->id;?>" class="btn btn-xs btn-primary">
                                estimate                                 
                            </a> -->

                            <a href="<?php echo base_url();?>client/add_estimate/<?php echo $key->id;?>" class="btn btn-xs btn-info">
                                Edit                                       
                            </a>
                            <a href="<?php echo base_url();?>client/receipt?for=estimates&id=<?php echo urlencode(base64_encode($key->id));?>" class="btn btn-xs btn-primary">
                                Receipt                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_estimates" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
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

  <!-- MODAL -->
<!--   <div class="container">
  

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Manage Payment</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="post">

            <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <select>
                    <option value="recived"></option>
                    <option value="deposited"></option>
                  </select>
                </div>
            </div>
            <input type="hidden" id="estimate_id" />
          </form>
        </div>
         
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div> -->

<script type="text/javascript">
  function changeIt(val)
  {
    var status=$(val).val();
    var id=$(val).attr('data-id');
    window.location="<?php echo base_url();?>admin/changeStatus/"+status+'/'+id;
  }
</script>
