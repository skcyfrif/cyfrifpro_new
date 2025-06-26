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
              	 <label class="control-label">Is your business registered for GST?</label>
                  <div class="controls">
                    <input type="radio" name="business_gst" id="business_gst1"  value="1" <?php if($allrecord['business_gst']==1){ echo "checked"; } ?> onclick="shoopt(1);"/> Yes
                  </div>
                  <div class="controls">
                    <input type="radio" name="business_gst" id="business_gst2"  value="0" <?php if($allrecord['business_gst']==0){ echo "checked"; } ?> onclick="shoopt(0);"/> No
                  </div>
                  
                </div>
               <hr />
               <div id="isenable" <?php if($allrecord['business_gst']!=1){ ?>style="display:none;"<?php } ?>>
              	<div class="control-group">
              	 <label class="control-label">GSTIN (Maximum 15 digits)</label>
                  <div class="controls">
                    <input type="text" name="GSTIN" id="GSTIN" value="<?php echo $allrecord['GSTIN']; ?>"/>
                  </div>     
                </div>
               <hr />
              	<div class="control-group">
              	 <label class="control-label">GST Registered On</label>
                  <div class="controls">
                    <input type="date" name="GST_date" id="GST_date" value="<?php echo $allrecord['GST_date']; ?>"/>
                  </div>     
                </div> 
               <hr />
             	<div class="control-group">
              	 <label class="control-label">Composition Scheme </label>
                  <div class="controls">
                    <input type="checkbox" name="composition" id="composition" <?php if($allrecord['composition']==1){ echo "checked"; } ?>  value="1" onclick="show_compo();"/>My business is registered for Composition Scheme.
                  </div>
            	</div>
                
                <div class="control-group" id="compshow" <?php if($allrecord['composition']!=1){ ?> style="display:none;"<?php  } ?>>
              	 <label class="control-label">Composition Scheme Percentage</label>      
                   <div class="controls">
                   	 <input type="radio" name="composition_percentage" id="composition_percentage1" <?php if($allrecord['composition_percentage']==1){ echo "checked"; } ?>  value="1"/>1% (For Traders and Manufacturers)
                   </div>   
                   
                   <div class="controls">
                   	 <input type="radio" name="composition_percentage" id="composition_percentage2" <?php if($allrecord['composition_percentage']==2){ echo "checked"; } ?>  value="2"/>2% (For Manufacturers - GSTN has lowered the rate for manufacturers to 1%.)
                   </div> 
                   
                   <div class="controls">
                   	 <input type="radio" name="composition_percentage" id="composition_percentage3" <?php if($allrecord['composition_percentage']==3){ echo "checked"; } ?>  value="3"/>5% (For Restaurant sector)
                   </div>
                   
                   <div class="controls">
                   	 <input type="radio" name="composition_percentage" id="composition_percentage" <?php if($allrecord['composition_percentage']==4){ echo "checked"; } ?>  value="4"/>6% (For Suppliers of Services or Mixed Suppliers)
                   </div>                    
                </div>   
                
               <hr />  
                 <div class="control-group">
              	 <label class="control-label">Import / Export</label>
                  <div class="controls">
                    <input type="checkbox" name="overseas_trd" id="overseas_trd" <?php if($allrecord['overseas_trd']==1){ echo "checked"; } ?> onclick="showtrack();"  value="1"/>My business is involved in SEZ / Overseas Trading.
                  </div>     
                </div>
               <hr /> 
                 <div class="control-group" id="tracking-opt" <?php if($allrecord['overseas_trd']!=1){ ?> style="display:none;"<?php  } ?>>
              	 <label class="control-label">Custom Duty Tracking Account</label>
                  <div class="controls">
                  		<select name="tracking_ac">
                        	<option value="">Select...</option>
                            <?php foreach($accounts as $ac){ ?>
                            <option value="<?php echo $ac->id; ?>" <?php if($allrecord['tracking_ac']==$ac->id){ echo "selected"; } ?>><?php echo $ac->name; ?></option>
                            <?php } ?>
                        </select>
                  </div>     
                </div>
               <hr /> 
                 <div class="control-group">
              	 <label class="control-label">Digital Services</label>
                  <div class="controls">
                    <input type="checkbox" name="digital_serv" id="digital_serv" <?php if($allrecord['digital_serv']==1){ echo "checked"; } ?>  value="1"/>Track sale of digital services to overseas customers
                  </div>     
                </div>
               <hr />
               </div> 
            </div>
            <div style="clear:both;"></div>
           
            <hr />
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
             <!-- <a href="<?php echo base_url();?>inventory/brand/"><button type="button" class="btn btn-sm btn-info">Back</button></a>-->
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
	function shoopt(evt){
		if(evt==1){
			$("#isenable").show();
		}else{
			$("#isenable").hide();
		}
	}
	function show_compo(){
		if($("#composition").is(":checked")==true){
			$("#compshow").show();
		}else{
			$("#compshow").hide();
		}
	}
	
	function showtrack(){
		if($("#overseas_trd").is(":checked")==true){
			$("#tracking-opt").show();
		}else{
			$("#tracking-opt").hide();
		}
	}
</script>