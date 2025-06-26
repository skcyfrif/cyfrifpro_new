<style>
.content {
    height: 100%;
}
</style>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">
            <table id="table_id" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Slno.</th>
                  <th>Business Name</th>
                  <th>Email</th>
				          <th>Mobile</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($clients){
                $i=1; foreach($clients as $key){ ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $key->id;?></td>
                        <td><?php echo $key->business_name;?></td>
                        <td><?php echo $key->email;?></td>
                        <td><?php echo $key->mobile;?></td>
                        <td> 
                            <?php    
                                    $date=explode(' ',$key->created);
                                    echo date('d M Y',strtotime($date[0]));
                            ?>
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
        window.location="<?php echo base_url();?>admin/delete/"+tbl_name+"/"+return_URLen+"/"+id;
        return true;
    }
    else
    {
        //alert('Not Ok');
        return false;
    }

}

</script>

