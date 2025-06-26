
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <a href="<?php echo base_url();?>setting/add-user-role" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>  
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
                  <th>Content</th> 
                  <th>Action</th>               
                </tr>
              </thead>
              <tbody>
                <?php 

                if($this_element){
                $i=1; 
				foreach($this_element as $kyx => $key){
				 
					
				?>
                    <tr class="gradeX">
                        <td class="center"><?php echo ++$kyx;?></td>
                        <td><?php echo $key->name;?></td>
                        <td><?php echo substr($key->content,0,200);?></td>                        
                        <td class="td-actions">
                            <a href="<?php echo base_url();?>setting/add-user-role/<?php echo $key->role_id;?>" class="btn btn-sx btn-info">
                                Edit                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->role_id; ?>" data-tblName="tbl_user_roles" data-returnURL="<?php echo $this->uri->segment(1);?>/user_role" class="btn btn-sx btn-danger">
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


