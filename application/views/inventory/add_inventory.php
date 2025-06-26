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
              <div class="span6">
            	<div class="control-group">
                  <label class="control-label">Type</label>
                  <div class="controls">
                    <select name="type" onchange="manageThis(this);">
    
                      <option value="Product" <?php echo ($this_element->type == 'Product') ? 'selected' : '';?> >Product</option>
                      <option value="Service" <?php echo ($this_element->type == 'Service') ? 'selected' : '';?> >Service</option>
    
                    </select>
                  </div>
                </div>  
                <div class="control-group">
              	 <label class="control-label">Item</label>
                  <div class="controls">
                    <input type="text"  onKeyUp="validateThis(this)" name="title" placeholder="Item Name" value="<?php echo $this_element->title;?>" autocomplete="off"/>
                  </div>
                </div>
                <div class="control-group">
              <label class="control-label">Unique Code</label>
              <div class="controls">
                <input type="text"  name="sku" placeholder="Unique Code" value="<?php echo $this_element->sku;?>" autocomplete="off" />
              </div>
            </div>
              </div> 
              <div class="span6">
              	<div class="control-group">
                  <label class="control-label">Image</label>
                  <div class="controls">
                   <input type="file" name="file" value="" />
                   <br />
                   <?php if(isset($this_element->img) && $this_element->img!=""){ ?>
                   <img src="<?php echo base_url();?><?php echo $this_element->img;?>" height="120" width="120" />
                   <input type="hidden" name="hiddenFilePath" value="<?php echo $this_element->img;?>" />
                   <?php } ?>
                   
                   
                  </div>
                </div>      
            	<div class="control-group">
              <label class="control-label">Unit</label>
              <div class="controls">
              	<select name="unit" id="unit">
                	<option value="">Select....</option>
                    <option value="box" <?php if($this_element->unit=='box'){ echo "selected"; } ?> >box</option>
                    <option value="cm" <?php  if($this_element->unit=='cm'){ echo "selected"; } ?>>cm</option>
                    <option value="dz" <?php  if($this_element->unit=='dz'){ echo "selected"; } ?>>dz</option>
                    <option value="ft" <?php  if($this_element->unit=='ft'){ echo "selected"; } ?>>ft</option>
                    <option value="g" <?php  if($this_element->unit=='g'){ echo "selected"; } ?>>g</option>
                    <option value="ln" <?php  if($this_element->unit=='ln'){ echo "selected"; } ?>>ln</option>
                    <option value="kg" <?php  if($this_element->unit=='kg'){ echo "selected"; } ?>>kg</option>
                    <option value="km" <?php  if($this_element->unit=='box'){ echo "selected"; } ?>>km</option>
                    <option value="lb" <?php  if($this_element->unit=='lb'){ echo "selected"; } ?>>lb</option>
                    <option value="mg" <?php  if($this_element->unit=='mg'){ echo "selected"; } ?>>mg</option>
                    <option value="m" <?php  if($this_element->unit=='m'){ echo "selected"; } ?>>m</option>
                    <option value="pcs" <?php  if($this_element->unit=='pcs'){ echo "selected"; } ?>>pcs</option>
                    <option value="hour" <?php  if($this_element->unit=='hour'){ echo "selected"; } ?>>hour</option>                     
                </select>               
              </div>
            </div>

              <div class="control-group">
              <label class="control-label">Group Item</label>
              <div class="controls">
                   <select name="grp_id">
              <?php foreach($groupitme as $mfc){ ?>
                      <option value="<?php echo $mfc->gt_id; ?>" <?php echo ($this_element->grp_id == $mfc->gt_id) ? 'selected' : '';?> ><?php echo $mfc->title; ?></option>
                      <?php } ?>
    
                    </select>
              </div>
            </div>

              </div> 
            </div>
            <hr /> 
           	<div class="span12">
              <div class="span6">
            	<div class="control-group">
              <label class="control-label">Dimensions</label>
              <div class="controls">
                <input type="text"  name="dim"  placeholder="Dimensions" value="<?php echo $this_element->dim;?>" autocomplete="off"/>
              </div>
            </div> 

            	<!--<div class="control-group">
              <label class="control-label">Manufacturer</label>
              <div class="controls">
                	 <select name="manufacturer" required>
    					<?php foreach($manufac as $mfc){ ?>
                      <option value="Product" <?php echo ($this_element->manufacturer == $mfc->id) ? 'selected' : '';?> ><?php echo $mfc->name; ?></option>
                      <?php } ?>
    
                    </select>
              </div>
            </div>-->

            	<div class="control-group">
              <label class="control-label">UPC </label>
              <div class="controls">
                <input type="text"  name="UPC" placeholder="UPC" value="<?php echo $this_element->UPC ;?>" autocomplete="off"/>
              </div>
            </div>
            	<!--<div class="control-group">
              <label class="control-label">EAN</label>
              <div class="controls">
                <input type="text"  name="EAN" placeholder="EAN" value="<?php echo $this_element->EAN;?>" required/>
              </div>
            </div>-->
            
            <div class="control-group">
              <label class="control-label">HSN</label>
              <div class="controls">
                <input type="text"  name="HSN" placeholder="HSN" value="<?php echo $this_element->HSN;?>" autocomplete="off"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">SAC</label>
              <div class="controls">
                <input type="text"  name="SAC" placeholder="SAC" value="<?php echo $this_element->SAC;?>" autocomplete="off"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Tax</label>
              <div class="controls">
                <input type="text"  name="tax" placeholder="Tax" value="<?php echo $this_element->tax;?>" autocomplete="off"/>
              </div>
            </div>

              </div> 
              
              <div class="span6"> 
              	<div class="control-group">
              <label class="control-label">Weight</label>
              <div class="controls">
                <input type="text"  name="Weight"  placeholder="Weight" value="<?php echo $this_element->weight;?>" autocomplete="off" />
              </div>
            </div> 
            	<div class="control-group">
              <label class="control-label">Brand</label>
              <div class="controls">
                	 <select name="brand">
    					<?php foreach($brand as $br){ ?>
                      <option value="<?=$br->id;?>" <?php echo ($this_element->brand == $br->id) ? 'selected' : '';?> ><?php echo $br->name; ?></option>
                      <?php } ?>
    
                    </select>
              </div>
            </div>            

            <div class="control-group">
              <label class="control-label">IGST</label>
              <div class="controls">
                <input type="number"  name="IGST" id="IGST" onkeyup="calgst(this.value);" placeholder="IGST" value="<?php echo $this_element->IGST;?>" autocomplete="off" />
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">SGST</label>
              <div class="controls">
                <input type="number"  name="SGST" id="SGST" placeholder="SGST" value="<?php echo $this_element->SGST;?>" autocomplete="off"/>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">CGST</label>
              <div class="controls">
                <input type="number"  name="CGST" id="CGST" placeholder="CGST" value="<?php echo $this_element->CGST;?>" autocomplete="off"/>
              </div>
            </div>



            	<!--<div class="control-group">
              <label class="control-label">MPN</label>
              <div class="controls">
                <input type="text"  name="MPN" placeholder="MPN" value="<?php echo $this_element->MPN;?>" required/>
              </div>
            </div>
            	<div class="control-group">
              <label class="control-label">ISBN</label>
              <div class="controls">
                <input type="text"  name="ISBN" placeholder="ISBN" value="<?php echo $this_element->ISBN;?>" required/>
              </div>
            </div>-->
              </div>
            </div>   
            
            <hr />

              <div class="span12">
              <h4>Track Inventory for this item</h4>
            </div>  
            
            <div class="span12">              
              <div class="span6">
              <div class="control-group">
              <label class="control-label">Inventory Account</label>
              <div class="controls">
                  <select name="inv_acc" onchange="setsaleopt(this.value);">                      
              <option value="" >Select....</option>                      
                      <option value="Finished Goods" <?php echo ($this_element->inv_acc == 'Finished Goods') ? 'selected' : '';?> >Finished Goods</option>
                      <option value="Inventory Asset" <?php echo ($this_element->inv_acc == 'Inventory Asset') ? 'selected' : '';?> >Inventory Asset</option>
                       <option value="Work In Progress" <?php echo ($this_element->inv_acc == 'Work In Progress') ? 'selected' : '';?> >Work In Progress</option> 
                       <option value="Raw Material" <?php echo ($this_element->inv_acc == 'Raw Material') ? 'selected' : '';?> >Raw Material</option>       
                    </select>
              </div>
            </div>  
              <div class="control-group">
                  <label class="control-label">Opening Stock</label>
                  <div class="controls">
                    <input type="text"  id="op_stock" name="op_stock" placeholder="Remaining Stock" value="<?php echo $this_element->op_stock;?>" autocomplete="off">
                  </div>
              </div>
              <div class="control-group">
              <label class="control-label">Reorder Point</label>
              <div class="controls">
                <input type="text" name="reorder"  id="reorder" placeholder="Reorder Point" value="<?php echo $this_element->reorder;?>" autocomplete="off"/>
              </div>
            </div>            
              </div>
              <div class="span6"> 
              <div class="control-group">
                  <label class="control-label">Opening Stock Rate per Unit</label>
                  <div class="controls">
                    <input type="text"  id="rate_per_unit" name="rate_per_unit" placeholder="Opening Stock Rate per Unit" value="<?php echo $this_element->rate_per_unit;?>" autocomplete="off">
                  </div>
              </div>
              <div class="control-group">
              <label class="control-label">Preferred Vendor</label>
              <div class="controls">
                <select id="name" onchange="openUrl(this)" name="vendor">
                  <?php if($vendors){ foreach($vendors as $key){ 

                        $isSelected=($this_element->vendor == $key->name) ? 'selected' : '';
                  ?>

                      <option value="<?php echo $key->name;?>:<?php echo $key->id;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                  <?php } } else { echo '<option value="" >Select vendor</option>' ; } ?>
                      <option value="goVendor" style="font-weight: bold">+ Add</option>
                </select>
              </div>
            </div>  
              </div>
            </div>     
             
            
             <div class="span12 details">
              <div class="span6" id="sales_recd">
                <h4>Selling Details</h4>
                 <div class="control-group">
                    <label class="control-label">Price</label>
                    <div class="controls">
                      <input type="number"  name="sprice" placeholder="Sales Price Per Unit" value="<?php echo $this_element->sprice;?>" step="0.01" autocomplete="off"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label">Account</label>
                    <div class="controls">                     
                      <select  name="saccount">
                       <option value="">Select.....</option>
                       <?php foreach($saledrpdn as $saccn){ ?>
                      <option value="<?php echo $saccn['id']; ?>" <?php echo ($this_element->saccount == $saccn['id']) ? 'selected' : ''; ?>><?php echo $saccn['name']; ?> </option>
                      <?php } ?>                       
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Detail</label>
                    <div class="controls">
                      <textarea  name="sdesc" placeholder="Description"><?php echo $this_element->sdesc;?></textarea>
                    </div>
                </div>
              </div>

              <div class="span6" id="purc_recd">
                <h4>Purchase Details</h4>
                  <div class="control-group">
                    <label class="control-label">Price</label>
                    <div class="controls">
                      <input type="number"  name="pprice" placeholder="Purchase Price Per Unit" value="<?php echo $this_element->pprice;?>" step="0.01" autocomplete="off"/>
                    </div>
                </div>
                  <div class="control-group">
                    <label class="control-label">Expense Account</label>
                    <div class="controls">                     
                      <select  name="paccount" id="paccount" class="span12">                      
                       <?php foreach($purchdropdn as $saccn){ ?>
                      <option value="<?php echo $saccn['id']; ?>" <?php echo ($this_element->paccount == $saccn['id']) ? 'selected' : ''; ?>><?php echo $saccn['name']; ?> </option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Detail</label>
                    <div class="controls">
                      <textarea  name="pdesc" placeholder="Description"><?php echo $this_element->pdesc;?></textarea>
                    </div>
                  </div>
                </div>
            </div>            
               <hr />
             <div style="clear:both;"></div>         		

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
            <input type="text"  style="margin-bottom:0;" name="name" placeholder="Name" value="" autocomplete="off"/>
            </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Account Code</label>
              <div class="controls">
               	 <input type="text"  style="margin-bottom:0;" name="ac_code" placeholder="Account Code" value="<?php echo $this_element->ac_code; ?>" autocomplete="off"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
              <textarea class="span12" name="content" placeholder="content"></textarea>               	 
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
  <style type="text/css">
    #sales_recd, #purc_recd{
    display: none;
   } 
    <?php if ($this_element->inv_acc == 'Work In Progress' || $this_element->inv_acc == 'Raw Material'){ ?>
       #purc_recd{
        display: block;
       } 
       #sales_recd{
        display: none;
       } 
    <?php }elseif ($this_element->inv_acc == 'Finished Goods'){ ?>
       #purc_recd{
        display: none;
       } 
       #sales_recd{
        display: block;
       } 
    <?php }else{ ?>
   #sales_recd, #purc_recd{
    display: block;
   } 
 <?php } ?>
  </style>
<script>

function validateThis(txt){
    //alert(txt.value);
    //txt.value = txt.value.replace(/[^a-zA-Z0-9 )(]+/g, '');
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

function calgst(evt){
  var augst=parseInt(evt/2).toFixed(2);
   $('#SGST').val(augst);
   $('#CGST').val(augst);
 }

function setsaleopt(evt){
  if(evt=="Work In Progress" || evt=="Raw Material"){
     $('#purc_recd').show();
     $('#sales_recd').hide();
  }else if(evt=="Finished Goods"){
      $('#sales_recd').show();
      $('#purc_recd').hide();
  }else{
    $('#sales_recd').show();
    $('#purc_recd').show();
  }
}

</script>