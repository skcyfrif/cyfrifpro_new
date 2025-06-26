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
          <h5><?php echo $panelTitle; ?></h5>
        </div>
        <div class="widget-content nopadding">
          <form action="<?php echo base_url('recurring-expense/import'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">           
			
                        
            <div class="control-group">
              <label class="control-label">Import</label>
              <div class="controls">
                <input type="file" class="span11"  name="file" id="file" required/>
              </div>
            </div> 
           
            
            <hr />
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="importSubmit" value="1">Save</button>
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
		url: "<?php echo base_url().'Clientstore/ajax_currency'; ?>",
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

