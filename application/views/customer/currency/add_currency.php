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

</style>

<?php //echo "<pre>"; print_r($this_element); exit; ?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Currency</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">           
			
            <div class="control-group">
              <label class="control-label">Type</label>
              <div class="controls">
                <select class="span11" name="code" onchange="setcurrency(this.value);" required>
					<?php if(count($currency)>0){ 
						foreach($currency as $cn){
					?>
                  <option value="<?php echo $cn->id; ?>" <?php echo ($this_element->code == $cn->id) ? 'selected' : '';?> ><?php echo $cn->country.'('.$cn->code.')'; ?></option>
                 	<?php } } ?>

                </select>
              </div>
            </div>            
            <div class="control-group">
              <label class="control-label">Symbol</label>
              <div class="controls">
                <input type="text" class="span11"  name="symbol" id="symbol" placeholder="symbol" value="<?php echo $this_element->symbol;?>" autocomplete="off" required/>
              </div>
            </div> 
            
            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text" class="span11" name="name" id="name"  placeholder="Name" value="<?php echo $this_element->name;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Decimal Places</label>
              <div class="controls">
               <select class="span11" name="decimal_place" id="decimal_place" required>
               		<option value="">Select...</option>
                    <option value="0" <?php echo ($this_element->decimal_place == 0) ? 'selected' : '';?>>0</option>
                    <option value="1" <?php echo ($this_element->decimal_place == 1) ? 'selected' : '';?>>1</option>
                    <option value="2" <?php echo ($this_element->decimal_place == 2) ? 'selected' : '';?>>2</option>
               </select>
              </div>
            </div>
            
             <input type="hidden" class="span11" name="formate"  placeholder="Name" value="<?php echo $this_element->formate;?>"/>
            
            <hr />
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
             <button type="button" class="btn btn-sm btn-info" onclick="backtopage();">Back</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

function setcurrency(id){
	$.ajax({
		url: "<?php echo base_url().'customer/ajax_currency'; ?>",
		 type:"post",
		 dataType:'json',
		 data:{id:id}, 
         success: function(result){ 		 			 	 	
         	$("#symbol").val(result.symbol); 
			$("#name").val(result.currency);					
     }}); 
}

function backtopage(val){
	window.history.back();
}
</script>

