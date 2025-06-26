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
          <h5>Offer Letter Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Employee Name</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Employee Name" value="<?php echo $this_element->name;?>" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Date of Joining</label>
              <div class="controls">
                <input type="date" class="span11" name="date" placeholder="date" value="<?php echo $this_element->date;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Applicant ID</label>
              <div class="controls">
                <input type="text" class="span11" name="applicant_id" placeholder="Applicant ID" value="<?php echo $this_element->applicant_id;?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Job Location</label>
              <div class="controls">
                <input type="text" class="span11" name="location" placeholder="Job Location" value="<?php echo $this_element->location;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Designation</label>
              <div class="controls">
                <input type="text" class="span11" name="designation" placeholder="Designation" value="<?php echo $this_element->designation;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Contact No</label>
            <div class="controls">
             <input type="tel" class="span11" name="phone" placeholder="Contact Number" value="<?php echo $this_element->phone;?>" required/>
             </div>
            </div>

            <div class="control-group">
              <label class="control-label">Level</label>
              <div class="controls">
                <input type="text" class="span11" name="level" placeholder="Level" value="<?php echo $this_element->level;?>" required/>
              </div>
            </div>


            



            <div class="control-group">
              <label class="control-label">Salary(Per Anum)</label>
              <div class="controls">
                <input type="text" class="span11" name="salary_per_anum" placeholder="Salary Per Anum" value="<?php echo $this_element->salary_per_anum;?>" required/>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              <a href="<?php echo base_url();?>admin/offer_letters"><button type="button" class="btn btn-sm btn-info">Back</button></a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>