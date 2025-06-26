
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <a href="<?php echo base_url();?>admin/add_career" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <!-- <th>Description</th> -->
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($customers){
                $i=1; foreach($customers as $key){ ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $i;?></td>
                        <td><?php echo $key->name;?></td>
                        <td><?php echo $key->email;?></td>
                        <td><?php echo $key->mobile;?></td>
                        <td> 
                            <?php    
                                    $date=explode(' ',$key->created);
                                    echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td>
                        <td class="td-actions">
                            <a href="<?php echo base_url();?>admin/add_customer/<?php echo $key->id;?>" class="btn btn-sx btn-info">
                                Edit                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_careers" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-sx btn-danger">
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


