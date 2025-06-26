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
          <h5>Add New Sales Person</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">           
			
            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text"   name="name" id="name" placeholder="Name" value="<?php echo $this_element->name;?>" required/>
              </div>
            </div>            
            <div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="email"   name="email" id="email" placeholder="Email" value="<?php echo $this_element->email;?>" required/>
              </div>
            </div>             
            <div class="control-group">
              <label class="control-label">Phone</label>
              <div class="controls">
                <input type="text"   name="mobile" id="mobile" size="10" placeholder="Phone" value="<?php echo $this_element->mobile;?>" required/>
              </div>
            </div> 
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

