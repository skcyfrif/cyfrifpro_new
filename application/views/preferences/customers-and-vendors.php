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
                  <div class="controls">
                    <input type="checkbox" name="duplicates_name" id="duplicates_name"  value="1"  <?php if($allrecord['duplicates_name']==1){ echo "checked"; } ?>/> Allow duplicates for customer and vendor display name.

                  </div>
                </div>
               <hr />
              <div class="control-group">
              	 <label class="control-label">Customer Credit Limit</label>
                  <div class="controls">
                  <p>Credit Limit enables you to set limit on the outstanding receivable amount of the customers.</p>
                    <input type="checkbox" name="credit_limit" onchange="showoption();" id="credit_limit" <?php if($allrecord['credit_limit']==1){ echo "checked"; } ?>  value="1"/> Enable Credit Limit

                  </div>
                  <div id="is_credit_limit" <?php if($allrecord['credit_limit']!=1){ ?>style="display:none;" <?php } ?>>
                  <div class="controls">
                  	<p>What do you want to do when credit limit is exceeded?</p>
                    <input type="radio" name="is_credit_limit" id="is_credit_limit" <?php if($allrecord['is_credit_limit']==1){ echo "checked"; } ?>  value="1"/> Restrict creating or updating invoices

					 <input type="radio" name="is_credit_limit" id="is_credit_limit" <?php if($allrecord['is_credit_limit']==2){ echo "checked"; } ?>  value="2"/> Show a warning and allow users to proceed

                  </div>
                  <div class="controls">
                    <input type="checkbox" name="sale_order_amnt" id="sale_order_amnt" <?php if($allrecord['sale_order_amnt']==1){ echo "checked"; } ?> onchange="showoption2();"  value="1"/> Include sales orders' amount in limiting the credit given to customers
                    <p id="sale_order_amnt_qut" <?php if($allrecord['sale_order_amnt']!=1){ ?>style="display:none;" <?php } ?>>Credit Limit will not affect the creation of sales orders from marketplace.</p> 
                  </div>
                 	
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
<!--<div id="ex1" class="modal">
  <p>Thanks for clicking. That felt good.</p>
  <a href="javascript:void(0);" class="close" data-dismiss="modal" aria-label="Close">Close</a>
</div>-->


<script type="text/javascript">

function showoption(){

	if($("#credit_limit").is(':checked')==true){		
		$("#is_credit_limit").show();
	}else{
		$("#is_credit_limit").hide();
	}
}

function showoption2(){
	if($("#sale_order_amnt").is(':checked')==true){
		$("#sale_order_amnt_qut").show();
	}else{
		$("#sale_order_amnt_qut").hide();
	}
}

</script>

