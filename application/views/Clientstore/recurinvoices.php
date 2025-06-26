<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.select2-drop, .select2-with-searchbox, .select2-drop-above, .select2-drop-active{
  z-index: 999999999 !important;
}

.update-done {
    width: 60%;
}
.amount-price{
    float: left;
    color: #3575B9;
    text-transform: uppercase;
    padding-top: 10px;
    font-size:15px;
}
.modal {
    left: 55% !important;
  }
</style>
  <div class="container-fluid">
    <div class="row-fluid">
       
      <div class="span12">
        <a href="<?php echo base_url();?>client/add_recurinvoice" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>INV</th>
                  <th>Customer</th>                  
                  <th>Date</th>
                  <th>Due Date</th>
                  <th>Document</th>
                  <th>Total Amt</th>
                  <th>Due Amt</th>                 
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($invoices){
                $i=1; foreach($invoices as $key){ 

                  
                    ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo 'INV-'.$key->id;?></td>

                        <td><?php echo $key->customer;?></td>                        
                        <td><?php echo date('d M Y',strtotime($key->date));?></td>
                        <td><?php echo date('d M Y',strtotime($key->due_date));?></td>
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
                        <td><?php echo $key->due;?></td>                                             
                        <td class="td-actions">                            
                            <a href="<?php echo base_url();?>client/recurinvoice/<?php echo $key->id;?>" class="btn btn-xs btn-primary">
                                Invoice                                 
                            </a>
                            
                            <a href="<?php echo base_url();?>client/add_recurinvoice/<?php echo $key->id;?>" class="btn btn-xs btn-info">
                                Edit                                       
                            </a>
                            
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_recurring_invoices" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
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