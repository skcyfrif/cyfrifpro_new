<style>
.opc input[type=checkbox] {
    opacity: 1 !important;
}
</style>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Product Account</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
          	<div class="control-group">
              <label class="control-label">Type</label>
              <div class="controls">
               	<select name="type" id="type">
                	<option value="">Select..</option>
                    <option value="1" <?php if($this_element->type==1){ echo "Selected"; } ?>>Sales</option>
                    <option value="2" <?php if($this_element->type==2){ echo "Selected"; } ?>>Purchase</option>
                </select>
                
              </div>
            </div>
          
            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Employee Name" value="<?php echo $this_element->name;?>" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Status</label>
              <div class="controls">
               <select name="status" id="status">
                	<option value="">Select..</option>
                    <option value="1" <?php if($this_element->status==1){ echo "Selected"; } ?>>Active</option>
                    <option value="0" <?php if($this_element->status==0){ echo "Selected"; } ?>>Inactive</option>
                </select>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              <a href="<?php echo base_url();?>admin/account"><button type="button" class="btn btn-sm btn-info">Back</button></a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>