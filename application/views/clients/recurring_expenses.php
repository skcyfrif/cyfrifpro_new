
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <a href="<?php echo base_url();?>client/add_recurring_expense" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
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
                  <th>Vendor</th>
                  <th>Amount</th>
                  <!-- <th>Description</th> -->
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($recurring_expenses){
                $i=1; foreach($recurring_expenses as $key){ ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $i;?></td>
                        <td><a href="<?php echo base_url();?>customer/add_customer/<?php echo $key->customer_id;?>"><?php echo $key->customer_name;?></a></td>
                        <td><a href="<?php echo base_url();?>client/add_vendor/<?php echo $key->vendor_id;?>"><?php echo $key->vendor_name;?></a></td>
                        <td><?php echo $key->amount;?></td>
                        <td> 
                            <?php    
                                    $date=explode(' ',$key->start_date);
                                    echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td>
                        <td> 
                            <?php    
                                    $date=explode(' ',$key->end_date);
                                    echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td>
                        <td class="td-actions">
                            <a href="<?php echo base_url();?>client/add_recurring_expense/<?php echo $key->id;?>" class="btn btn-sx btn-info">
                                Edit                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_recurring_expenses" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-sx btn-danger">
                                Delete                                       
                            </a>
                        </td>
                    </tr>
                <?php $i++; } } else { ?>

                    <tr class="gradeX">
                        <td class="center" colspan="4">No data found</td>
                    </tr>

                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


