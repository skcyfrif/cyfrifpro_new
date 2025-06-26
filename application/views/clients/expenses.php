
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <a href="<?php echo base_url();?>client/add_expense" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>  <a href="javascript:void();" class="pull-right">&nbsp;  &nbsp;</a>
        <a href="<?php echo base_url();?>expense/csv" ><button class="btn btn-success btn-sm pull-right">Import</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Expense Number</th>
                  <th>Customer</th>
                  <th>Vendor</th>
                  <th>Invoice</th>
                  <th>Document</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($expenses){
                $i=1; 
				foreach($expenses as $ky=>$key){
				 
					
				?>
                    <tr class="gradeX">
                        <td class="center"><?php echo ++$ky;?></td>
                        <td><a href="<?php echo base_url();?>customer/add_customer/<?php echo $key->customer_id;?>"><?php echo $key->customer_name;?></a></td>
                        <td><a href="<?php echo base_url();?>client/add_vendor/<?php echo $key->vendor_id;?>"><?php echo $key->vendor_name;?></a></td>
                        <td><?php echo $key->invoice;?></td>
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
                        <td class="td-actions">
                            <a href="<?php echo base_url();?>client/add_expense/<?php echo $key->id;?>" class="btn btn-sx btn-info">
                                Edit                                       
                            </a>
                            
                            <a href="<?php echo base_url();?>client/expense_report/<?php echo $key->id;?>" class="btn btn-xs btn-primary">View</a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_expenses" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-sx btn-danger">
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


