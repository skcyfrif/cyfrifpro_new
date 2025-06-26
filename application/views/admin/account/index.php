
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">     
      <a href="<?php echo base_url();?>account/add_product_account" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> 
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">
            <table id="table_id" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sl no</th>
                  <th>Name</th>                  
                  <th>Type</th>				 
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if($index){
                $i=1; 
				foreach($index as $key){ ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo  $i++;?></td>
                        <td><?php echo $key->name;?></td>
                        <td><?php 
							if($key->type==1){
								echo "Sales";
							}else{
								echo "Purchase ";
							}	
						?></td>
                        <td> 
                            <?php    
                                 if($key->status==1){
									echo "Active";
								  }else{
									echo "Inactive ";
								   }	
                            ?>
                        </td>
                        <td class="td-actions">
                        
                            <a href="<?php echo base_url();?>account/add_product_account/<?php echo $key->id;?>" class="btn btn-sm btn-info">Edit</a>
                                                        
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_product_account_types" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-sm btn-danger">Delete</a>
                            
                        </td>
                    </tr>
                <?php } } else { ?>

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


<script>

$('#table_id').DataTable();

function deleteThis(val)
{
    if(confirm('Are you sure want to delete this?'))
    {
        //alert('Ok');
        var id=$(val).attr('data-id');
        var tbl_name=$(val).attr('data-tblName');
        var return_URL=$(val).attr('data-returnURL');
        var return_URLen = return_URL.replace("/", "-");
        window.location="<?php echo base_url();?>admin/delete/"+tbl_name+"/"+return_URLen+"/"+id;
        return true;
    }
    else
    {
        //alert('Not Ok');
        return false;
    }

}
function makeCode()
{

  var num=Math.round(Math.random() * 10);
  //alert(num);
  var baseUrl='<?php echo base_url();?>';
  var link=baseUrl+'employee/addDetails/'+rstr2b64(rstr_md5(str2rstr_utf8(num)));
  $('#link').val(link); 
}


</script>

