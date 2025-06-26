<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


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
          <h5>Menu Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Exam Title</label>
              <div class="controls">
                <input type="text" class="span11" name="title" placeholder="Enter Title" value="<?php echo $this_element->title;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Opening</label>
              <div class="controls">
                <select class="span11" name="opening" >
                  <option value="">--Select--</option>
                  <?php foreach($openings as $key) { 

                      $isSelected=($this_element->opening == $key->id) ? 'selected' : '';

                  ?>
                      <option value="<?php echo $key->id;?>" <?php echo $isSelected; ?>><?php echo $key->title;?></option>

                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Total Time</label>
              <div class="controls">
                <input type="number" class="span11" name="time" placeholder="Total Time (In Minutes)" value="<?php echo $this_element->time;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Questions</label>
              <div class="controls">
                <select class="span11" name="questions[]" multiple required>

                  <?php 
                        $questionArr=array();
                        $questionArr=explode(',',$this_element->questions);
                      foreach($questions as $key) { 

                        $isSelected=(in_array($key->id,$questionArr)) ? 'selected' : '';

                  ?>
                      <option value="<?php echo $key->id;?>" <?php echo $isSelected; ?>><?php echo $key->question;?></option>

                  <?php } ?>

                </select>
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
          <a href="<?php echo base_url();?>admin/exams"><button type="button" class="btn btn-sm btn-info">Back</button></a>
        </div>
      </form>

        </div>
      </div>
    </div>
  </div>
</div>

