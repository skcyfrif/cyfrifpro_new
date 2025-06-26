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
            	<table class="table table-bordered table-this_element" id="taxtable">
                	<?php 
					if(count($allrecord['taxes'])>0){
					$x=1;
					foreach($allrecord['taxes'] as $rcr){ ?>
                	<tr class="ratecount" id="ratecount<?php echo $x; ?>">
                    	<td><input type="text" name="taxes[<?php echo $x; ?>][name]" value="<?php echo $rcr['name']; ?>" placeholder="Enter Name" /></td>
                        <td><input type="text" name="taxes[<?php echo $x; ?>][rate]" value="<?php echo $rcr['rate']; ?>" placeholder="Enter % Rate" /></td>  
                        <td><a href="javascript:void(0);" onclick="deletetax(<?php echo $x; ?>);">Remove</a></td>                     
               		</tr>
                    <?php $x++; } } else{ ?>
                    
                    <tr class="ratecount" id="ratecount0">
                    	<td><input type="text" name="taxes[0][name]" value="" placeholder="Enter Name" /></td>
                        <td><input type="text" name="taxes[0][rate]" value="" placeholder="Enter % Rate" /></td>
                         <td><a href="javascript:void(0);" onclick="deletetax(0);">Remove</a></td>                        
               		</tr>
                    <?php } ?>
              	</table>
               <hr />  
            </div>
            <div style="clear:both;"></div>
           
            <hr />
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button> 
              <button type="button" class="btn btn-primary" onclick="addmoretax();">+add more</button>            
            </div>
            
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
	function addmoretax(){
	
		var coun= $(".ratecount").length;
		var tot=parseInt(coun+1);
		var htm='<tr class="ratecount" id="ratecount'+tot+'"><td><input type="text" name="taxes['+tot+'][name]" value="" placeholder="Enter Name" /></td><td><input type="text" name="taxes['+tot+'][rate]" value="" placeholder="Enter % Rate" /></td><td><a href="javascript:void(0);" onclick="deletetax('+tot+');">Remove</a></td></tr>';		
		$("#taxtable").append(htm);
	}
	
	function deletetax(evt){
		var coun= $(".ratecount").length;
		if(coun>1){
			$("#ratecount"+evt).remove();
		}else{
			alert("Not Applicable.");
		}
	}
</script>