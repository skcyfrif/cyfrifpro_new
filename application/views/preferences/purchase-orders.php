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
input[type="file"], input[type="image"], input[type="submit"], input[type="reset"], input[type="button"], input[type="radio"], input[type="checkbox"]{
opacity:1 !important;}
</style>

<?php //echo "<pre>"; print_r($this_element); exit;
	$allrecord=unserialize($this_element->key_value);
	
	//echo "<pre>"; print_r($allrecord); exit;
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
          <input type="hidden" name="id" value="<?php echo $this_element->set_id; ?>" />
          
          	<div class="span12">
               
              <div class="control-group">
              	 <label class="control-label">When do you want your Purchase Orders to be closed?</label>
                  <div class="controls">
                    <input type="radio" name="purch_ord_close" id="sale_ord_no"  value="1" <?php if($allrecord['purch_ord_close']==1){ echo "checked"; } ?>/>When a Purchase Receive is recorded
                  </div>
                  <div class="controls">
                    <input type="radio" name="purch_ord_close" id="sale_ref_no"  value="2" <?php if($allrecord['purch_ord_close']==2){ echo "checked"; } ?>/> When a Bill is created
                  </div>	
                  <div class="controls">
                    <input type="radio" name="purch_ord_close" id="sale_ref_no"  value="3" <?php if($allrecord['purch_ord_close']==3){ echo "checked"; } ?>/> When Receives and Bills are recorded
                  </div>
                  <div class="controls">
                  </div>
                  
                </div>
               <hr />              
              <div class="control-group">
              	 <label class="control-label">Terms & Conditions</label>
                  <div class="controls">
                   <textarea name="tandc" id="tandc" style="margin: 0px; width: 746px; height: 104px;"><?php echo $allrecord['tandc']; ?></textarea>
                  </div>
                </div> 
               <hr />
             <div class="control-group">
              	 <label class="control-label">Customer Notes</label>
                  <div class="controls">
                   <textarea name="cnotes" id="cnotes" style="margin: 0px; width: 746px; height: 104px;"><?php echo $allrecord['cnotes']; ?></textarea>
                  </div>
                </div>
               <hr />  
            </div>
            <div style="clear:both;"></div>
           
            <hr />
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
             <!-- <a href="<?php echo base_url();?>inventory/brand/"><button type="button" class="btn btn-sm btn-info">Back</button></a>-->
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>




