<style>

.details .control-label {
    padding-top: 15px !important;
    width: 10% !important;
    margin-right: 10px !important;
    text-align:left !important;
}
.details .controls {
    margin-left: 0 !important;
    padding: 10px 0 !important;
    width: 80% !important;
    float: left !important;
}
#myModal{display:none;}
</style>

<?php //echo "<pre>"; print_r($this_element); exit;
	//$alrecord=unserialize($this_element->imagePath);
 ?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
          
          	<div class="span12">             
               
              <div class="span6">
            	<div class="control-group">
                  <label class="control-label">Image</label>
                  <div class="controls">
                   <input type="file" name="file" value="" />
                   <br />
                   <?php if(isset($this_element->imagePath) && $this_element->imagePath!=""){ ?>
                   <img src="<?php echo base_url();?><?php echo $this_element->imagePath;?>" height="120" width="120" alt="logo" />
                   <input type="hidden" name="hiddenFilePath" value="<?php echo $this_element->imagePath;?>" />
                   <?php } ?>
                   
                   
                  </div>
                </div>  
              </div>
            </div>
            <div style="clear:both;"></div>
           
            <hr />
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              <a href="<?php echo base_url();?>inventory/brand/"><button type="button" class="btn btn-sm btn-info">Back</button></a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!--<div id="ex1" class="modal">
  <p>Thanks for clicking. That felt good.</p>
  <a href="javascript:void(0);" class="close" data-dismiss="modal" aria-label="Close">Close</a>
</div>-->




