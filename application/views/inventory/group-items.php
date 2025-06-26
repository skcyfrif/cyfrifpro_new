
  <div class="container-fluid">
    <div class="row-fluid"> 
      <div class="span12">
        <a href="<?php echo base_url();?>inventory/add-group-items" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a><!--<a href="javascript:void();" class="pull-right">&nbsp;  &nbsp;</a>
        <a href="<?php echo base_url();?>group-items/csv" ><button class="btn btn-success btn-sm pull-right">Import</button></a>-->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Code</th>                
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($inventory){
                $i=1; 

                foreach($inventory as $key){   
                // echo "<pre>"; print_r($inventory); exit; 
                    ?>

                    <tr class="gradeX">
                        <td class="center"><?php echo $i; ?></td>

                        <td><?php echo $key->title; ?></td>
                        <td><?php echo "GROUP00".$key->gt_id; ?></td>                      
                      	<td> 
                            <?php    
                                    $date=explode(' ',$key->created);
                                    echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td>
                        <td class="td-actions">
                            <a href="<?php echo base_url();?>inventory/add-group-items/<?php echo $key->gt_id;?>" class="btn btn-xs btn-info">
                                Edit                                       
                            </a>

                            <a class="btn btn-xs btn-danger" href="<?php echo base_url();?>inventory/delete-group-items/<?php echo $key->gt_id;?>">
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