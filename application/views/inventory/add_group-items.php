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

div.checker input{
opacity:1 !important;
}
</style>

<?php //echo "<pre>"; print_r($variation); exit; ?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" id="allform" method="post" class="form-horizontal" enctype="multipart/form-data">          
          	<div class="span12">
              <div class="span6">
            	
                <div class="control-group">
              	 <label class="control-label">Title</label>
                  <div class="controls">
                    <input type="text"  onKeyUp="validateThis(this)" name="title" placeholder="Item Name" value="<?php echo $this_element->title;?>" autocomplete="off" required/>
                  </div>
                </div>
               
              </div> 

            </div>
            <hr />  
                         
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              <a href="<?php echo base_url();?>admin/employees/<?php echo $emp_id;?>"><button type="button" class="btn btn-sm btn-info">Back</button></a>
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

function setattribute(){
	var htm='';
	$.ajax({
		url: "<?php echo base_url().'inventory/setattribute'; ?>",
		 type:"post",
		 dataType:'json',
		 data:$("#allform").serialize(), 
         success: function(result){ 	
		 	/*htm='<tr><th></th><th><input type="text" name="unccode[]" value="" required /></th><th><input type="text" name="op_stock[]" value="" required /></th><th><input type="text" name="rate_per_unit[]" value="" required /></th><th><input type="text" name="pprice[]" value="" required /></th><th><input type="text" name="sprice[]" value="" required /></th><th><input type="text" name="UPC[]" value="" required /></th><th><input type="text" name="EAN[]" value="" required /></th><th><input type="text" name="ISBN[]" value="" required /></th><th><input type="text" name="reorder[]" value="" required /></th><th> <select id="name" onchange="openUrl(this)" name="vendor[]"  required><?php if($vendors){ foreach($vendors as $key){ ?><option value="<?php echo $key->name;?>:<?php echo $key->id;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option><?php } } else { echo '<option value="" >Select vendor</option>' ; } ?><option value="goVendor" style="font-weight: bold">+ Add</option></select></th></tr>';*/
		 		 	
         	$("#attr-list").html(result); 
			
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