<style>

.row-fluid .span12 {
  margin-left:0 !important;
}
.blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {  
  50% { opacity: 0; }
}
</style>
  <div class="container-fluid">
    <div class="row-fluid"> 
      <div class="span12">
        <a href="<?php echo base_url();?>inventory/add-brand" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a><a href="javascript:void();" class="pull-right">&nbsp;  &nbsp;</a>
        <a href="<?php echo base_url();?>brand/csv" ><button class="btn btn-success btn-sm pull-right">Import</button></a>
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
                  <th>imgage</th>                  
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($attr){
                $i=1; foreach($attr as $key){ 			
					  
				?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $key->id;?></td>
                        <td><?php echo $key->name;?></td>
                        <td><?php echo "BRAND0".$key->id;?></td>
                        <td><?php if(isset($key->img) && $key->img!=""){ ?>
                        <img src="<?php echo base_url();?><?php echo $key->img;?>" height="120" width="120" alt="<?php echo $key->name;?>" />
                        <?php }else{ ?>
                        ---
                        <?php } ?>
                        </td>                      
                      	<td> 
                            <?php    
                                    $date=explode(' ',$key->created);
                                    echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td>
                        <td class="td-actions">
                            <a href="<?php echo base_url();?>inventory/add-brand/<?php echo $key->id;?>" class="btn btn-xs btn-info">Edit</a>                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_brands" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">Delete</a>
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