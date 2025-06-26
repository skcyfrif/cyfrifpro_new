
  <div class="container-fluid">
    <div class="row-fluid">
     
      <form action="" method="post">
      
     		 <div class="control-group">
              <label class="control-label">Type</label>
              <div class="controls">
               	<select name="type" id="type" required>
            	<option value="">Select....</option>
                <option value="1" <?php if($this_element->type==1){ echo "selected"; } ?>>Sale</option>
                <option value="2" <?php if($this_element->type==2){ echo "selected"; } ?>>Purchase</option>
            </select>
              </div>
            </div>
         
          	 <div class="control-group">
          <label class="control-label">Name</label>
          	 <div class="controls">
            <input type="text" class="span11" style="margin-bottom:0;" name="name" placeholder="Name" value="<?php echo $this_element->name; ?>" autocomplete="off" required/>
            </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Account Code</label>
              <div class="controls">
               	 <input type="text" class="span11" style="margin-bottom:0;" autocomplete="off" name="ac_code" placeholder="Account Code" value="<?php echo $this_element->ac_code; ?>" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
              <textarea class="span12" name="content" placeholder="content" required><?php echo $this_element->content;?></textarea>               	 
              </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                	<button type="submit" class="btn btn-success"><?php echo $btn;?></button>
                </div>
            </div>        
          
      </form>
        
      </div>
    </div>
  </div>
  



