<style>

.table-sortable tbody tr {
    cursor: move;
}
</style>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Menu Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Menu Title</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Menu Title" value="<?php echo $this_element->name;?>" required/>
              </div>
            </div>

              <!--<div class="control-group">
              <label class="control-label">Content</label>
             <div class="controls">
                    <table class="table table-bordered table-hover table-sortable" id="tab_logic_v2">
                      <thead>
                        <tr >
                          <th class="text-center">
                            Title
                          </th>
                          <th class="text-center">
                            Description
                          </th>
                            <th class="text-center">
                            Option
                          </th>
                              <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                          </th>
                        </tr>
                      </thead>
                      <tbody id="tableBODY">
                        <?php foreach($service_details as $key){ ?>
                          <tr id="row0">
                            <td><input type="text" style="width:95%;" name="Title"value="<?php echo $key->title;?>"  placeholder="Title" class="form-control" required/></td>
                            <td><textarea type="text" style="width:95%;" rows="3" value="<?php echo $key->description;?>" name="description" placeholder="Description" class="form-control" required></textarea></td>
                            <td><button type="button" id="delete_row" onclick="deleteEl(this)" data-rowId="row0" class="pull-right btn btn-danger">Delete</button></td>
                          <tr>
                        <?php } ?>
                      </tbody>
                    </table>
                <a id="add_row" class="btn btn-primary float-right">Add Row</a>
              </div>
            </div>-->
            <div class="control-group" style="margin-right:7%;">
              <label class="control-label">Content</label>
              <div class="controls">
                 <textarea class="span11" name="content" rows="20"><?php echo $this_element->content;?></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              <a href="<?php echo base_url();?>admin/menus"><button type="button" class="btn btn-sm btn-info">Back</button></a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>

var i=1;
$("#add_row").click(function(){

  $("#tableBODY").append('<tr id="row'+i+'"><td><input type="text" style="width:95%;" name="Title"  placeholder="Title" class="form-control" required/></td><td><textarea type="text" style="width:95%;" rows="3" name="description" placeholder="Description" class="form-control" required></textarea></td><td><button type="button" id="delete_row" onclick="deleteRow(this)" data-rowId="row'+i+'" class="pull-right btn btn-danger">Delete</button></td>');
  i++;

});

function deleteEl(val)
{
   var rowId='#'+$(val).attr('data-rowId');
    $(rowId).remove();
}

</script>