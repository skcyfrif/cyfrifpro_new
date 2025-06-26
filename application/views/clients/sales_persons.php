<style>

.span12 input{
  
  float:left;
  margin-right:5px;
}

</style>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
      <form method="post" action="">
	      <input type="text" class="span3" name="name" placeholder="Enter Name" value="<?php echo $this_element->name;?>" autocomplete="off" required/>
	      <input type="email" class="span4" name="email" placeholder="Enter Email" value="<?php echo $this_element->email;?>" autocomplete="off" required/>
	      <input type="tel" maxlength="10" class="span3" name="mobile" placeholder="Enter Mobile" value="<?php echo $this_element->mobile;?>" autocomplete="off" required/>
	      <input style="margin-top:-10px;" type="submit" class="btn btn-success span2" value="<?php echo $btnText;?>" />
      </form>
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
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($sales_persons){
                $i=1; foreach($sales_persons as $key){ ?>
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
                            <a href="<?php echo base_url();?>client/sales_persons/<?php echo $key->id;?>" class="btn btn-sx btn-info">
                                Edit                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_sales_persons" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-sx btn-danger">
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


