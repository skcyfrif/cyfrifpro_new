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
	
//	echo "<pre>"; print_r($allrecord); exit;
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
              	 <label class="control-label">Set a decimal rate for your item quantity</label>
                  <div class="controls">
                  	<select name="decimal_quantity" id="decimal_quantity">
                    	<option value="">Select..</option>
                        <option value="1" <?php if($allrecord['decimal_quantity']==1){ echo "selected"; } ?>>1</option>
                        <option value="2" <?php if($allrecord['decimal_quantity']==2){ echo "selected"; } ?>>2</option>
                        <option value="3" <?php if($allrecord['decimal_quantity']==3){ echo "selected"; } ?>>3</option>
                        <option value="4" <?php if($allrecord['decimal_quantity']==4){ echo "selected"; } ?>>4</option>
                        <option value="5" <?php if($allrecord['decimal_quantity']==5){ echo "selected"; } ?>>5</option>
                        <option value="6" <?php if($allrecord['decimal_quantity']==6){ echo "selected"; } ?>>6</option>                        
                    </select>
                  </div>
                </div>
               <hr />
              <div class="control-group">
              	 <label class="control-label">Measure item dimensions in:</label>
                  <div class="controls">
                    <select name="dimensions" id="dimensions">
                    	<option value="">Select..</option>
                         <option value="in" <?php if($allrecord['dimensions']=='in'){ echo "selected"; } ?>>in</option>
                        <option value="cm" <?php if($allrecord['dimensions']=='cm'){ echo "selected"; } ?>>cm</option>                        
                     </select>   
                  </div>             
                 
                </div>
              <div class="control-group">
              	 <label class="control-label">Measure item weights in:</label>
                  <div class="controls">
                    <select name="weights" id="weights">
                    	<option value="">Select..</option>
                         <option value="lb" <?php if($allrecord['weights']=='lb'){ echo "selected"; } ?>>lb</option>
                        <option value="kg" <?php if($allrecord['weights']=='kg'){ echo "selected"; } ?>>kg</option>                        
                     </select>   
                  </div>             
                 
                </div>  
               <hr />
              <div class="control-group">
              	 <label class="control-label">Price Lists </label>
                  <div class="controls">
                    <input type="checkbox" name="e_pricelist" id="e_pricelist"  value="1" <?php if($allrecord['e_pricelist']==1){ echo "checked"; } ?>/>Enable Price Lists

                  </div>
                  <div class="controls">
                    <input type="checkbox" name="apply_price_list" id="apply_price_list"  value="1" <?php if($allrecord['apply_price_list']==1){ echo "checked"; } ?>/>Apply price list on each item in a transaction

                  </div>
                  
                </div> 
               <hr />
              <div class="control-group">
              	 <label class="control-label">Composite Items</label>
                  <div class="controls">
                    <input type="checkbox" name="composite_items" id="composite_items"  value="1" <?php if($allrecord['composite_items']==1){ echo "checked"; } ?>/> Enable Composite Items
                  </div>
                  
                </div>
               <hr />
              <div class="control-group">  
                 <label class="control-label">Inventory Start Date </label>        	 
                  <div class="controls">
                    <input type="date" name="in_start_date" id="in_start_date"  value="<?php echo $allrecord['in_start_date']; ?>" />
                  </div>
                </div>
               <hr />
              <div class="control-group">  
              	  <label class="control-label">Advanced Inventory Tracking</label>            	 
                  <div class="controls">
                    <input type="checkbox" name="serial_number_tracking" id="serial_number_tracking"  value="1" <?php if($allrecord['serial_number_tracking']==1){ echo "checked"; } ?>/> Enable Serial Number Tracking
                  </div>
                  <div class="controls">
                    <input type="checkbox" name="batch_tracking" id="batch_tracking"  value="1" <?php if($allrecord['batch_tracking']==1){ echo "checked"; } ?>/> Enable Batch Tracking
                  </div>
                </div> 
               <hr /> 
              <div class="control-group">              	 
                  <div class="controls">
                    <input type="checkbox" name="prevent_zero_stock" id="prevent_zero_stock"  value="1" <?php if($allrecord['prevent_zero_stock']==1){ echo "checked"; } ?>/> Prevent stock from going below zero 
                  </div>
                  <div class="controls">
                    <input type="checkbox" name="stock_warning" id="stock_warning"  value="1" <?php if($allrecord['stock_warning']==1){ echo "checked"; } ?>/> Show an Out of Stock warning when an item's stock drops below zero

                  </div>
                  <div class="controls">
                    <input type="checkbox" name="quantity_reache" id="quantity_reache"  value="1" <?php if($allrecord['quantity_reache']==1){ echo "checked"; } ?>/> Notify me if an item's quantity reaches the reorder point

                  </div>
                  <div class="controls">
                    <input type="checkbox" name="landed_cost" id="landed_cost"  value="1" <?php if($allrecord['landed_cost']==1){ echo "checked"; } ?>/> Track landed cost on items

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

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post" id="setaccounttype" name="setaccounttype">
      
     		 <div class="control-group">
              <label class="control-label">Type</label>
              <div class="controls">
               	<select name="type" id="type" readonly>
            	<option value="">Select....</option>
                <option value="1">Sale</option>
                <option value="2" selected="selected">Purchase</option>
            </select>
              </div>
            </div>
         
          	 <div class="control-group">
          <label class="control-label">Name</label>
          	 <div class="controls">
            <input type="text"  style="margin-bottom:0;" name="name" placeholder="Name" value="" required/>
            </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Account Code</label>
              <div class="controls">
               	 <input type="text"  style="margin-bottom:0;" name="ac_code" placeholder="Account Code" value="<?php echo $this_element->ac_code; ?>" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
              <textarea class="span12" name="content" placeholder="content" required></textarea>               	 
              </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                	<button type="button" class="btn btn-success" onclick="addaccounttype();">Add</button>
                </div>
            </div>        
          
      </form>
        </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>
<script>

function validateThis(txt){
    //alert(txt.value);
    txt.value = txt.value.replace(/[^a-zA-Z0-9 )(]+/g, '');
}

function putInRemaining(val){
  var stock=$(val).val();
  $('#remaining_stock').val(stock);
}

function openUrl(val){
  var goUrl=$(val).val();
  if(goUrl == 'goVendor'){
      var gUrl='<?php echo base_url().'client/add_vendor?redirect='.$_URL_add_inventory;?>';
      //window.open(goUrl, '_blank');
      window.location=gUrl;
  }else if(goUrl == 'goTerm'){
    var gUrl='<?php echo base_url().'admin/terms?redirect='.$_URL_add_inventory;?>';
    //window.open(gUrl, '_blank');
    window.location=gUrl;
  }else if(goUrl == 'goAccount'){
      var gUrl='<?php echo base_url().'client/add_account?redirect='.$_URL_add_inventory;?>';
	  $("#myModal").modal('show');
	  
      //window.open(goUrl, '_blank');
      //window.location=gUrl;
  }
}

function addaccounttype(){
	$.ajax({
		url: "<?php echo base_url().'client/ajax_add_account_types'; ?>",
		 type:"post",
		 dataType:'json',
		 data:$("#setaccounttype").serialize(), 
         success: function(result){ 	
		 	$("#myModal").modal('hide');	 	
         	$("#paccount").prepend(result); 
			
     }}); 
}

function manageThis(val){

    var type=$(val).val();
    //alert(type);
    if(type == 'Product')
    {
       $('#domDiv').fadeIn();
       $('#doeDiv').fadeIn();
    }
    else if(type == 'Service')
    {
      $('#domDiv').fadeOut();
      $('#doeDiv').fadeOut();
    }
}
</script>

