
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
      <!-- <form action="" method="post">
        <div class="control-group">
          <label class="control-label">Employee Details</label>
            <input type="text" class="span11" style="margin-bottom:2px;" name="name" placeholder="Name" value="<?php //echo $this_element->name;?>" required/>
            <input type="email" class="span11" style="margin-bottom:2px;" name="email" placeholder="Email" value="<?php //echo $this_element->email;?>" required/>
            <input type="number" class="span11" style="margin-bottom:0;" name="mobile" maxlength="10" placeholder="Mobile" value="<?php //echo $this_element->mobile;?>" required/>
            <button type="submit" class="btn btn-success">Add</button>
        </div>
      </form> -->
      <a href="<?php echo base_url();?>admin/add_employee" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
      <label class="pull-left">Shareable Link:&nbsp</label>
      <input id="link" style="width:50%;" type="text" class="pull-left" value="<?php echo base_url().'employee/addDetails/'.md5(rand());?>" />
      <a href="<?php echo base_url();?>admin/employees"><button style="margin-left: 1% !important;" class="btn btn-warning btn-sm pull-left">Generate New</button></a>
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">
            <table id="table_id" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Employee Code</th>
                  <th>Name</th>
                  <th>Email</th>
                          <th>Mobile</th>
                  <th>Address</th>
                  <th>Document</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($employees){
                $i=1; foreach($employees as $key){ ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $i;?></td>
                        <td><?php echo 'EMP'.$key->id;?></td>
                        <td><?php echo $key->name;?></td>
                        <td><?php echo $key->email;?></td>
                        <td><?php echo $key->mobile;?></td>
                        <td><?php echo ($key->addressVerified) ? '<span style="color:green;">Verified</span>' : '<span style="color:red;">Not Verified</span>' ;?></td>
                        <td><?php echo ($key->documentVerified) ? '<span style="color:green;">Verified</span>' : '<span style="color:red;">Not Verified</span>' ;?></td>
                        <td> 
                            <?php    
                                    $date=explode(' ',$key->created);
                                    echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td>
                        <td class="td-actions">
                            
                            <!-- <a href="<?php //echo base_url();?>admin/clients/<?php //echo $key->id;?>" class="btn btn-sm btn-primary">
                                Clients                                       
                            </a> -->
                            <a href="<?php echo base_url();?>admin/view_employee/<?php echo $key->id;?>" class="btn btn-xs btn-info">
                                View                                       
                            </a>

                            <a href="<?php echo base_url();?>admin/add_employee/<?php echo $key->id;?>" class="btn btn-sm btn-info">
                                Edit                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_employees" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-sm btn-danger">
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

