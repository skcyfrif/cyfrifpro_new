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
</style>

<?php //echo "<pre>"; print_r($this_element); exit; ?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
          
          	<div class="span12">
             
            	<div class="control-group">
                  <label class="control-label">Select Finished Goods</label>
                  <div class="controls">
                    <select name="title" onchange="getpriceoffinish(this.value);">
                      <option value="">Select..</option>
                      <?php foreach($allpr as $inv){ ?>
                        <option value="<?php echo $inv->id; ?>" <?php if($this_element[0]->title==$inv->id){ echo "selected"; } ?>><?php echo $inv->title; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Price</label>
                    <div class="controls">
                      <input type="text" name="price" id="price" value="<?php echo $this_element[0]->price; ?>">
                    </div>
                  </div>
                </div>           
              <div class="span12">
                <h5>Raw Materilals</h5>
                
                <table id="rawdata" class="table table-bordered">
                  <?php if(count($subbom)>0){ 
                    $m=0;
                      foreach($subbom as $k){
                    ?>

                  <tr id="rwano<?php echo $m; ?>" class="rawclass">
                    <td></td>
                    <td><input type="text" name="rawdata[<?php echo $m; ?>][rawname]" id="rawname<?php echo $m; ?>" placeholder="Enter Name" value="<?php echo $k->stitle; ?>"></td>
                    <td><input type="text" name="rawdata[<?php echo $m; ?>][price]" id="rawprc<?php echo $m; ?>" placeholder="Enter Price" value="<?php echo $k->sprice; ?>"></td>
                    <td><a href="javascript:void(0);" class="btn btn-danger" onclick="removeraw(<?php echo $m; ?>);">Remove</a></td>
                  </tr>  
                  <?php } }else{ ?>
                    <tr id="rwano0" class="rawclass">
                    <td></td>
                    <td><input type="text" name="rawdata[0][rawname]" id="rawname0" placeholder="Enter Name" value=""></td>
                    <td><input type="text" name="rawdata[0][price]" id="rawprc0" placeholder="Enter Price" value=""></td>
                    <td><a href="javascript:void(0);" class="btn btn-danger" onclick="removeraw(0);">Remove</a></td>
                  </tr>  
                  <?php } ?>                
                </table>

                <a href="javascript:void(0);" class="btn btn-success" onclick="addraw();">Add More</a>
                  </div>
                </div>

              </div> 
            </div>
            <hr /> 
             <div style="clear:both;"></div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
function getpriceoffinish(id){
	$.ajax({
		url: "<?php echo base_url().'inventory/bom_price'; ?>",
		 type:"post",
		 dataType:'json',
		 data:{id:id}, 
    success: function(result){ 	
		 	$("#price").val(result);	 	
      
     }}); 
}

function removeraw(evt){
  var tot=$(".rawclass").length;
  if(tot>1){
    $("#rwano"+evt).remove();
  }else{
    alert("Sorry your not allowe.");
  }
}

function addraw(){
  var tot=$(".rawclass").length; 
  tot=parseInt(parseInt(tot)+1);
  var htm='<tr id="rwano'+tot+'" class="rawclass"><td></td><td><input type="text" name="rawdata['+tot+'][rawname]" id="rawname0" placeholder="Enter Name" value=""></td><td><input type="text" name="rawdata['+tot+'][price]" id="rawprc0" placeholder="Enter Price" value=""></td><td><a href="javascript:void(0);" class="btn btn-danger" onclick="removeraw('+tot+');">Remove</a></td></tr>';
    $("#rawdata").append(htm);
}


</script>