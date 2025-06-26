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
          <h5>Career Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Job Title</label>
              <div class="controls">
                <input type="text" class="span11" name="title" placeholder="Job Title" value="<?php echo $this_element->title;?>" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Location</label>
              <div class="controls">
                <input type="text" class="span11" name="location" placeholder="Location" value="<?php echo $this_element->location;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Salary [INR/Month]</label>
              <div class="controls">
                <input type="text" class="span11" name="salary" placeholder="Salary" value="<?php echo $this_element->salary;?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Display Salary</label>
              <div class="controls opc">
                <input type="checkbox" style="opacity:1 !important;" class="span11" name="display_salary" value="1" <?php echo ($this_element->display_salary == 1) ? 'checked' : '';?> />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
                <textarea type="text" rows="6" style="color:black;" class="span11 textarea_editor" name="description" placeholder="Description" required><?php echo $this_element->description;?></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              <a href="<?php echo base_url();?>admin/careers"><button type="button" class="btn btn-sm btn-info">Back</button></a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>