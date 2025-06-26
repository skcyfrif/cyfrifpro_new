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

$due_per=ceil(($due/$total)*100);
$received_per=ceil(($received/$total)*100);
$deposited_per=ceil(($deposited/$total)*100);

?>

      <!-- <div class="span3">
        <label style="font-family: Arial, Helvetica, sans-serif;">Over Due</label>
        <div class="progress progress-danger progress-striped active">
          <div class="bar" style="width: 60%;"></div>
        </div>
      </div> -->
      <div class="span4">
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
      </div> 
      <div class="span12">
        <a href="<?php echo base_url();?>admin/add_invoice" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Customer</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Due Date</th>
                  <th>Amount</th>
                  <th>Manage</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($invoices){
                $i=1; foreach($invoices as $key){ 

                  
                    ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $key->id;?></td>

                        <td><?php echo $key->customer;?></td>
                        <td><?php echo $key->email;?></td>
                        <td><?php echo date('d M Y',strtotime($key->date));?></td>
                        <td><?php echo date('d M Y',strtotime($key->due_date));?></td>
                        <td><?php echo $key->total;?></td>
                      <!--   <td> 
                            <?php    
                                    // $date=explode(' ',$key->created);
                                    // echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td> -->
                        <td>
                          
                            <select onclick="changeIt(this)" data-id="<?php echo $key->id;?>" >
                              <option value="due" <?php echo ($key->status == 'due') ? 'selected' : '';?> >Due</option>
                              <option value="received" <?php echo ($key->status == 'received') ? 'selected' : '';?> >Recieved</option>
                              <option value="deposited" <?php echo ($key->status == 'deposited') ? 'selected' : '';?> >Deposited</option>
                            </select>

                        </td>
                        <td class="td-actions">
                            <!-- <a type="button" onclick="putData(this)" data-id="<?php echo $key->id;?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Manage</a> -->
                            
                            <!--<a href="<?php echo base_url();?>admin/invoice/<?php echo base64_encode($key->id);?>" class="btn btn-xs btn-primary">-->
                            <!--    Invoice <?php echo $key->id;?>                                  -->
                            <!--</a>-->
                            <a href="<?php echo base_url();?>admin/invoice/<?php echo $key->id;?>" class="btn btn-xs btn-primary">
                                Invoice                                 
                            </a>

                            <a href="<?php echo base_url();?>admin/add_invoice/<?php echo $key->id;?>" class="btn btn-xs btn-info">
                                Edit                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_invoices" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
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
            <input type="hidden" id="invoice_id" />
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
