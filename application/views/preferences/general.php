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
              	 <label class="control-label">Select the modules you would like to enable.</label>
                  <div class="controls">
                    <input type="checkbox" name="delivery_challans" id="delivery_challans"  value="1" <?php if($allrecord['delivery_challans']==1){ echo "checked"; } ?>/> Delivery Challans

                  </div>
                </div>
               <hr />
              <div class="control-group">
              	 <label class="control-label">&nbsp;</label>
                  <div class="controls">
                    <input type="checkbox" name="attach_PDF" id="attach_PDF" <?php if($allrecord['attach_PDF']==1){ echo "checked"; } ?>  value="1"/> Attach PDF file with the link while emailing the invoice & estimate?

                  </div>
                  
                  <div class="controls">
                    <input type="checkbox" name="encrypt_PDF" id="encrypt_PDF" <?php if($allrecord['encrypt_PDF']==1){ echo "checked"; } ?>  value="1"/> I would like to encrypt the PDF files that I send.

                  </div>
                 	<p>This will ensure that the PDF files cannot be edited or converted into another file format</p> 
                </div>
               <hr />
              <div class="control-group">
              	 <label class="control-label">Do you give discounts?</label>
                  <div class="controls">
                    <input type="radio" name="discounts" id="discounts"  value="1" <?php if($allrecord['discounts']==1){ echo "checked"; } ?>/>I don't give discounts

                  </div>
                  <div class="controls">
                    <input type="radio" name="discounts" id="discounts"  value="2" <?php if($allrecord['discounts']==2){ echo "checked"; } ?>/>At line item level

                  </div>
                  <div class="controls">
                    <input type="radio" name="discounts" id="discounts"  value="3" <?php if($allrecord['discounts']==3){ echo "checked"; } ?>/>At transaction level

                  </div>
                </div> 
               <hr />
              <div class="control-group">
              	 <label class="control-label">Select any additional charges you'll like to add</label>
                  <div class="controls">
                    <input type="checkbox" name="additional_adjustments" id="additional_adjustments"  value="1" <?php if($allrecord['additional_adjustments']==1){ echo "checked"; } ?>/> Adjustments

                  </div>
                  <div class="controls">
                    <input type="checkbox" name="shipping_charges" id="shipping_charges"  value="1" <?php if($allrecord['shipping_charges']==1){ echo "checked"; } ?>/> Shipping Charges

                  </div>
                </div>
               <hr />
              <div class="control-group">              	 
                  <div class="controls">
                    <input type="checkbox" name="round_off" id="round_off"  value="1" <?php if($allrecord['round_off']==1){ echo "checked"; } ?>/> Round off total to the nearest whole number for sales transactions. 

                  </div>
                </div>
               <hr />
              <div class="control-group">              	 
                  <div class="controls">
                    <input type="checkbox" name="salesperson_field" id="salesperson_field"  value="1" <?php if($allrecord['salesperson_field']==1){ echo "checked"; } ?>/>  want to add a field for salesperson

                  </div>
                </div> 
               <hr /> 
              <div class="control-group">              	 
                  <div class="controls">
                    <input type="checkbox" name="physical_stock" id="physical_stock"  value="1" <?php if($allrecord['physical_stock']==1){ echo "checked"; } ?>/> Physical Stock - The stock on hand will be calculated based on Receives & Shipments

                  </div>
                  <div class="controls">
                    <input type="checkbox" name="acounting_stock" id="acounting_stock"  value="1" <?php if($allrecord['acounting_stock']==1){ echo "checked"; } ?>/> Accounting Stock - The stock on hand will be calculated based on Bills & Invoices

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

