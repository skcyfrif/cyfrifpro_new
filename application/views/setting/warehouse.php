<style>
.content {
    height: 100%;
}
</style>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
       <a href="<?php echo base_url();?>client/add-warehouse" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>warehouse List</h5>
          </div>
          <div class="widget-content nopadding">
            <table id="table_id" class="table table-bordered data-table">
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

                if($warehouse){
                $i=1; foreach($warehouse as $kyx => $key){ ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo ++$kyx;?></td>
                        <td><?php echo $key->wr_name;?></td>
                        <td><?php echo $key->wr_email;?></td>
                        <td><?php echo $key->wr_ph;?></td>
                        <td> 
                            <?php    
                                    //$date=explode(' ',$key->created);
                                    echo date('d M Y',strtotime($key->created));
                            ?>
                        </td>
                        <td class="td-actions">
                            

                            <a href="<?php echo base_url();?>client/add-warehouse/<?php echo $key->wr_id;?>" class="btn btn-sm btn-info">
                                Edit                                       
                            </a>                           
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->wr_id; ?>" data-tblName="tbl_warehouses" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-sm btn-danger">
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
        window.location="<?php echo base_url();?>client/delete/"+tbl_name+"/"+return_URLen+"/"+id;
        return true;
    }
    else
    {
        //alert('Not Ok');
        return false;
    }

}

</script>

