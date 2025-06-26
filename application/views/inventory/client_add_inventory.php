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
          <h5>Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
            
			<div class="span6">
            <div class="control-group">
              <label class="control-label">Type</label>
              <div class="controls">
                <select class="span11" name="type" onchange="manageThis(this);" required>

                  <option value="Product" <?php echo ($this_element->type == 'Product') ? 'selected' : '';?> >Product</option>
                  <option value="Service" <?php echo ($this_element->type == 'Service') ? 'selected' : '';?> >Service</option>

                </select>
              </div>
            </div>
            
            
            <div class="control-group">
              <label class="control-label">Item</label>
              <div class="controls">
                <input type="text" class="span11" onKeyUp="validateThis(this)" name="title" placeholder="Item Name" value="<?php echo $this_element->title;?>" autocomplete="off" required/>
              </div>
            </div> 

            <div class="control-group">
              <label class="control-label">Quantity</label>
              <div class="controls">
                <input type="text" class="span11" onKeyUp="validateThis(this)" name="stock" placeholder="Add Quantity" value="<?php echo $this_element->stock;?>" autocomplete="off" required/>
              </div>
            </div>
              
          <?php if($this->session->userdata('client')){  ?>   
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
            </div>
            <div style="clear:both;"></div>
          <?php }else{ ?>        
            <div class="control-group" id="domDiv">
              <label class="control-label">Date Of Manufacture</label>
              <div class="controls">
                <input type="date" class="span11" name="dom" value="<?php echo $this_element->dom;?>" autocomplete="off" />
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
            </div>
            <div style="clear:both;"></div>
            <div class="span6">		
            <div class="control-group" id="doeDiv">
              <label class="control-label">Date Of Expire</label>
              <div class="controls">
                <input type="date" class="span11" name="doe" value="<?php echo $this_element->doe;?>" autocomplete="off" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Quantity</label>
              <div class="controls">
                <input type="number" class="span11" name="stock" onkeyup="putInRemaining(this)" onclick="putInRemaining(this)" placeholder="Stock" value="<?php echo $this_element->stock;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Available Stock</label>
              <div class="controls">
                <input type="number" class="span11" id="remaining_stock" placeholder="Remaining Stock" value="<?php echo $this_element->remaining_stock;?>" autocomplete="off" disabled/>
              </div>
            </div>
            </div>
            <div class="span6">
            <div class="control-group">
              <label class="control-label">Bill Number</label>
              <div class="controls">
                <input type="text" class="span11" name="bn" placeholder="Bill Number" value="<?php echo $this_element->bn;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Bill Date</label>
              <div class="controls">
                <input type="date" class="span11" name="bd"  value="<?php echo $this_element->bd;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Purchase Order Number</label>
              <div class="controls">
                <input type="text" class="span11" name="pon" placeholder="Purchase Order Number" value="<?php echo $this_element->pon;?>" autocomplete="off" required/>
              </div>
            </div>
            </div>
            <div style="clear:both;"></div>
            <div class="span6">
            <div class="control-group">
              <label class="control-label">Purchase Order Date</label>
              <div class="controls">
                <input type="date" class="span11" name="pod" value="<?php echo $this_element->pod;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Vendor Name</label>
              <div class="controls">
               <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->vendor;?>" required/> -->
                <select id="name" onchange="openUrl(this)" name="vendor" class="span11" required>
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
            <div class="span6">
            <div class="control-group">
              <label class="control-label">Client</label>
              <div class="controls">
                <select class="span10" name="client_id" required>
                <?php foreach($clients as $key){ ?>

                    <option value="<?php echo $key->id; ?>"><?php echo $key->business_name; ?></option>

                <?php } ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Terms</label>
              <div class="controls">
                <!-- <input type="text" class="span10" name="terms" placeholder="Terms" value="<?php echo $this_element->terms;?>" required/> -->
                <select id="terms" onchange="openUrl(this)" name="term" class="span11" required>
                    <?php if($terms){ foreach($terms as $key){ 

                          $isSelected=($this_element->term == $key->name) ? 'selected' : '';
                      ?>

                        <option value="<?php echo $key->name;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                    <?php } } else { echo '<option value="" >Select Term</option>' ; } ?>
                    <option value="goTerm" style="font-weight: bold">+ Add</option>
                </select>
              </div>
            </div>
            </div>
            <div style="clear:both;"></div>
			<?php } ?>
            <hr />
            <div class="span12 details">
              <div class="span6">
                <h4>Selling Details</h4>
                 <div class="control-group">
                    <label class="control-label">Price</label>
                    <div class="controls">
                      <input type="number" class="span11" name="saleprice" placeholder="Sales Price Per Unit" value="<?php echo $this_element->sprice;?>" autocomplete="off" required/>
                    </div>
                  </div>
                  <!--<div class="control-group">
                    <label class="control-label">Unit</label>
                    <div class="controls">
                      <input type="text" class="span11" name="sunit" placeholder="Unit" value="<?php echo $this_element->sunit;?>" required/>
                    </div>
                  </div>-->
                  <div class="control-group">
                    <label class="control-label">Account</label>
                    <div class="controls">
                      <!-- <input type="number" class="span11" name="saccount" placeholder="Sale" value="<?php echo $this_element->saccount;?>" required/> -->
                      <select class="span11" name="saccount" required>
                       <option value="">Select.....</option>
                       <?php foreach($saledrpdn as $saccn){ ?>
                      <option value="<?php echo $saccn['id']; ?>" <?php echo ($this_element->saccount == $saccn['id']) ? 'selected' : ''; ?>><?php echo $saccn['name']; ?> </option>
                      <?php } ?>
                        <!--<option value="Sales" <?php echo ($this_element->saccount == 'Sales') ? 'selected' : ''; ?> >Sales</option>
                        <option value="Discount" <?php echo ($this_element->saccount == 'Discount') ? 'selected' : ''; ?> >Discount</option>
                        <option value="General Income" <?php echo ($this_element->saccount == 'General Income') ? 'selected' : ''; ?> >General Income</option>
                        <option value="Interest Income" <?php echo ($this_element->saccount == 'Interest Income') ? 'selected' : ''; ?> >Interest Income</option>
                        <option value="Late Fee Income" <?php echo ($this_element->saccount == 'Late Fee Income') ? 'selected' : ''; ?> >Late Fee Income</option>
                        <option value="Other Charges" <?php echo ($this_element->saccount == 'Other Charges') ? 'selected' : ''; ?> >Other Charges</option>
                        <option value="Shipping Charge" <?php echo ($this_element->saccount == 'Shipping Charge') ? 'selected' : ''; ?> >Shipping Charge</option>-->
                      </select>
                    </div>
                  </div>
<!--                  <div class="control-group">
                    <label class="control-label">Detail</label>
                    <div class="controls">
                      <textarea class="span11" name="sdescription" placeholder="Description" required><?php echo $this_element->sdescription;?></textarea>
                    </div>
                </div>-->
              </div>

              <div class="span6">
                <h4>Purchase Details</h4>
                <div class="control-group">
                    <label class="control-label">Price</label>
                    <div class="controls">
                      <input type="number" class="span11" name="purchaseprice" placeholder="Purchase Price Per Unit" value="<?php echo $this_element->pprice;?>" autocomplete="off" required/>
                    </div>
                </div>
              
                <!--<div class="control-group">
                  <label class="control-label">Unit</label>
                  <div class="controls">
                    <input type="text" class="span11" name="punit" placeholder="Unit" value="<?php echo $this_element->punit;?>" required/>
                  </div>
                </div>-->
                <div class="control-group">
                    <label class="control-label">Expense Account</label>
                    <div class="controls">
                    
                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer;?>" required/> -->
                     
                      <select  onchange="openUrl(this);" name="paccount" id="paccount" class="span12">                      
                       <?php foreach($purchdropdn as $saccn){ ?>
                      <option value="<?php echo $saccn['id']; ?>" <?php echo ($this_element->paccount == $saccn['id']) ? 'selected' : ''; ?>><?php echo $saccn['name']; ?> </option>
                      <?php } ?>
                      
                        <!-- <?php //if($accounts){ foreach($accounts as $key){ 

                              //$isSelected=($this_element->paccount == $key->name) ? 'selected' : '';
                          ?>

                            <option value="<?php //echo $key->name;?>" <?php //echo $isSelected;?>><?php echo $key->name;?></option>

                        <?php //} } else { echo '<option value="" >Select Account</option>' ; } ?>-->
                            <!--<option value="goAccount" style="font-weight: bold">+ Add</option>-->
                      </select>
                    </div>
                  </div>
<!--                  <div class="control-group">
                    <label class="control-label">Detail</label>
                    <div class="controls">
                      <textarea class="span11" name="pdescription" placeholder="Description" required><?php echo $this_element->pdescription;?></textarea>
                    </div>
                  </div>-->
                </div>
            </div>
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
            <input type="text" class="span11" style="margin-bottom:0;" name="name" placeholder="Name" value="" autocomplete="off" required/>
            </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Account Code</label>
              <div class="controls">
               	 <input type="text" class="span11" style="margin-bottom:0;" name="ac_code" placeholder="Account Code" value="<?php echo $this_element->ac_code; ?>" autocomplete="off" required/>
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