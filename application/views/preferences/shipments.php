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
              	  <label class="control-label">Shipment Notification</label>
                  <div class="controls">
                    <input type="checkbox" name="shipment_notification" id="shipment_notification" <?php if($allrecord['shipment_notification']==1){ echo "checked"; } ?>  value="1"/> Do you want to send notifications to customers for carrier shipments?

                  </div>
                  
                  <div class="controls">
                    <input type="checkbox" name="shipments_manual" id="shipments_manual" <?php if($allrecord['shipments_manual']==1){ echo "checked"; } ?>  value="1"/> Do you want to send notifications to customers for manual shipments?

                  </div>
                 	
                </div>
               <hr />             
            </div>
            <div style="clear:both;"></div>
           
            <hr />
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              <!--<a href="<?php echo base_url();?>inventory/brand/"><button type="button" class="btn btn-sm btn-info">Back</button></a>-->
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
            <input type="text"  style="margin-bottom:0;" name="name" placeholder="Name" value="" autocomplete="off" required/>
            </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Account Code</label>
              <div class="controls">
               	 <input type="text"  style="margin-bottom:0;" name="ac_code" placeholder="Account Code" value="<?php echo $this_element->ac_code; ?>" autocomplete="off" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
              <textarea class="span12" name="content" placeholder="content" autocomplete="off" required></textarea>               	 
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

