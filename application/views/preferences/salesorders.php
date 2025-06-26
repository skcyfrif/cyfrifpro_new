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
              	 <label class="control-label">Which of the following fields of Sales Orders do you want to update in the respective Invoices?</label>
                  <div class="controls">
                    <input type="checkbox" name="filed_upd_address" id="filed_upd_address"  value="1" <?php if($allrecord['filed_upd_address']==1){ echo "checked"; } ?>/> Address

                  </div>
                  <div class="controls">
                    <input type="checkbox" name="filed_upd_cnote" id="filed_upd_cnote"  value="1" <?php if($allrecord['filed_upd_cnote']==1){ echo "checked"; } ?>/> Customer Notes

                  </div>
                  <div class="controls">
                    <input type="checkbox" name="filed_upd_tc" id="filed_upd_tc"  value="1" <?php if($allrecord['filed_upd_tc']==1){ echo "checked"; } ?>/>Terms & Conditions

                  </div>
                </div>
               <hr />
              <div class="control-group">
              	 <label class="control-label">When do you want your Sales Orders to be closed?</label>
                  <div class="controls">
                    <input type="checkbox" name="saleord_close_inv_create" id="saleord_close_inv_create" <?php if($allrecord['saleord_close_inv_create']==1){ echo "checked"; } ?>  value="1"/>When invoice is created

                  </div>
                  
                  <div class="controls">
                    <input type="checkbox" name="saleord_close_shipment_ful" id="saleord_close_shipment_ful" <?php if($allrecord['saleord_close_shipment_ful']==1){ echo "checked"; } ?>  value="1"/> When shipment is fulfilled

                  </div>  
                  
                  <div class="controls">
                    <input type="checkbox" name="saleord_close_both" id="saleord_close_both" <?php if($allrecord['saleord_close_both']==1){ echo "checked"; } ?>  value="1"/>When shipment is fulfilled and invoice is created

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
              <a href="<?php echo base_url();?>inventory/brand/"><button type="button" class="btn btn-sm btn-info">Back</button></a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>




