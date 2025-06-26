<style>
.control-group{
    margin: 10px !important;
}

.list-unstyled{
	   color: #000;
    text-align: left;
    padding: 5px 10px;
    font-size: 14px;
    border-bottom: 1px dotted #a3b5e0;
    list-style:none;
}
.liClass{
      background-color: #eaf5f4;
    padding: 2px;
    margin-bottom: 2px;
    margin-left: -17%;
    border: 1px solid blue;
    cursor: pointer;
}

input.span6 {
    width: 100% !important;
}
    
.addLinkC{
  margin-top:2px;
  margin-left:-17%;
}
.discount, .qty{
  
  width:35% !important;
}
.fa-file-pdf-o{
font-size: 50px;
}

.left-margin-30{
margin-left: 0px !important;    
    
}

input.form-control.discount {
    width: 90% !important;
}

input.form-control.qty {
    width: 90% !important;
}

table#tab_logic td {
    white-space: nowrap;
    box-sizing: border-box;
    width: auto;
    padding: 0;
}

@media (min-width: 1200px){
.row-fluid [class*="span"]:first-child {
    margin-left: 0 !important;
}
}


</style>
<body onLoad="doThis()">
<div class="container-fluid" >
    <div class="row-fluid">
      <div class="span12">
       <!--  <a href="<?php echo base_url();?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
       <img class="pull-right" src="<?php echo base_url().$client->imagePath;?>" alt="Brand Name" style="max-height:40px;max-width:90px;margin-top: -5%;" />
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Invoice</h5>
          </div>
          <div class="widget-content nopadding">
    <form method="post" enctype="multipart/form-data">
        <div class="span12 left-pad-30">
            <div class="span6">
         <div class="control-group">
              <label class="control-label">Type</label>
              <div class="controls">
                <select  name="type" id="type">
                  <option value="">Select....</option>
                    <option value="Tax Invoice" <?php if($this_element->type=='Tax Invoice'){ echo "selected"; } ?> >Tax Invoice</option>
                    <option value="Retail Invoice" <?php  if($this_element->type=='Retail Invoice'){ echo "selected"; } ?>>Retail Invoice</option>
                                  
                </select> 
                </div>
            </div>     

      </div>
      <div class="span6"></div>      
          </div>
     <div style="clear: both;"></div>

      <div class="span12 left-margin-30">
        <div class="span6">
            <div class="control-group">
              <label class="control-label">Customer Name</label>
              <div class="controls">
               <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer;?>" required/> -->
                <select id="name" onChange="openUrlcust(this)" name="name" class="span12" required>
                  <option value="">Select....</option>
                  <?php if($customers){				  
				  	foreach($customers as $key){ 
                        $isSelected=($this_element->customer_id == $key->id) ? 'selected' : '';
                    ?>

                      <option value="<?php echo $key->name;?>:<?php echo $key->id;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                  <?php } } else { echo '<option value="" >Select Customer</option>' ; } ?>
                      <option value="goCustomer" style="font-weight: bold">+ Add</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Order Number</label>
              <div class="controls">
                <input type="text" class="span12" name="order_id" placeholder="Order Number" value="<?php echo $this_element->order_id;?>" autocomplete="off" required/>
              </div>
            </div>
            <!--<div class="control-group">
              <label class="control-label">Place Of Supply</label>
              <div class="controls">
                <input type="text" class="span12" name="supply_place" placeholder="Place" value="<?php echo $this_element->supply_place;?>" required/>
              </div>
            </div>-->
            <div class="control-group">
              <label class="control-label">Sales Person</label>
              <div class="controls">
                <!-- <input type="text" class="span10" name="terms" placeholder="Terms" value="<?php echo $this_element->terms;?>" required/> -->
                <select id="sales_person" onChange="openUrl(this)" name="sales_person" class="span12" required>
                  <option value="">Select....</option>
                    <?php if($sales_persons){ 
					foreach($sales_persons as $key){ 
                        $isSelected=($this_element->sales_person == $key->name) ? 'selected' : '';
                      ?>
  
                        <option value="<?php echo $key->name;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                    <?php } } else { echo '<option value="" >Select Sales Person</option>' ; } ?>
                    <option value="goSalesPerson" style="font-weight: bold">+ Add</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Invoice Number</label>
              <div class="controls">
                <input type="text" class="span6" name="number" placeholder="Invoice Number" value="<?php echo ($this_element->number) ?? 'INV'.mt_rand(100000, 999999);?>" autocomplete="off" required/>
              </div>
            </div>
        </div>
        <div class="span6">
            <div class="control-group">
              <label class="control-label">Terms</label>
              <div class="controls">
                <input type="text" class="span10" name="terms" id="terms" placeholder="Terms" value="<?php echo $this_element->terms;?>" required/>
               <!--  <select id="terms" onChange="openUrl(this)" name="terms" class="span12" required>
                  <option value="">Select....</option>
                    <?php //if($terms){ foreach($terms as $key){ 

                          //$isSelected=($this_element->terms == $key->terms) ? 'selected' : '';
                      ?>

                        <option value="<?php //echo $key->name;?>" <?php //echo $isSelected;?>><?php //echo $key->name;?></option>

                    <?php //} } else { echo '<option value="" >Select Term</option>' ; } ?>
                    <option value="goTerm" style="font-weight: bold">+ Add</option> -->

                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Date</label>
              <div class="controls">
                <input type="date" class="span12" name="date" id="date" autocomplete="off" value="<?php echo $this_element->date;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Due Date</label>
              <div class="controls">
                <input type="date" class="span12" name="due_date" id="due_date" value="<?php echo $this_element->due_date;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group" style="margin-top: 15px !important;">
              <label class="control-label">Attachment</label>
              <div class="controls">
                <input type="file" class="span12" name="file" />
              </div>
            </div>
            <?php if(isset($this_element->filePath) && $this_element->filePath!=""){ ?>
            	<a href="<?php echo base_url().$this_element->filePath;?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
            <?php } ?>
            <input type="hidden" name="existingFilePath" value="<?php echo $this_element->filePath;?>" />
        </div>
      </div>

      <div style="clear: both;"></div>

        <div class="span12" style="margin-left:0px !important;">
            
            <div class="control-group">
              <label class="control-label">Billing Address</label>
              <div class="controls">
                <textarea class="span12" name="billing_address" id="billing_address" placeholder="Billing Address" required><?php echo $this_element->billing_address;?></textarea>
              </div>
            </div>
            <?php //echo "<pre>"; print_r($setting); exit;

                $dval=unserialize($setting[0]->key_value);

             ?>
            <div class="control-group">
              <label class="control-label">Terms And Conditions</label>
              <div class="controls">
                <textarea class="span12" name="terms_conditions" placeholder="Terms And Conditions" required><?php 
                if(isset($this_element->terms_conditions)){
                  echo $this_element->terms_conditions;
                }else{
                  echo $dval['tandc'];
                }
                

                 ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Customer Note</label>
              <div class="controls">
                <textarea class="span12" name="customer_note" placeholder="Customer Note" required><?php 
                if(isset($this_element->customer_note)){
                  echo $this_element->customer_note;
                }else{
                  echo $dval['cnotes'];
                } ?>
                </textarea>
              </div>
            </div>
        </div>

      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center"> Product </th>
            <th class="text-center"> HSN/SAC </th>
            <th class="text-center"> Unit </th>
            <th class="text-center"> Quantity </th>            
            <th class="text-center"> Price </th>
            <th class="text-center"> Tax </th>
            <th class="text-center"> Tax Amount</th>
            <th class="text-center"> Discount </th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
        <?php if($products){ 
            $i=0;
            foreach ($products as $key) {
            $sql="SELECT type,id FROM tbl_inventory WHERE id='".$key->id."'";
            $query = $this->db->query($sql);
            $res=$query->result();
            if($res[0]->type=="Service"){
              $l="readonly";
            }else{
              $l="";
            }
        ?>

          <tr id='addr<?php echo $i;?>'>
            <td><?php echo $key->id; ?></td>
            <td>
              <select name='title[]' data-id='<?php echo $i;?>' onchange="getData(this)" style="width:200px;">
                <option value="">Select...</option>
                <?php foreach($proctlist as $pls){ ?>
                  <option value="<?php echo $pls->title.":".$pls->id; ?>" <?php if($key->title==$pls->title){ echo "selected"; } ?>><?php echo $pls->title; ?></option>
                <?php } ?>
              </select>
             

              <!--<div id="list<?php echo $i;?>"></div>-->
            </td>
            <td><input type="text" name="hsn[]"  data-phsn="hsn<?php echo $i;?>" id="hsn<?php echo $key->id; ?>" value="<?php echo $key->hsn;  ?>" readonly/></td>
            <td width="10%">
              <input type="text" name="unit[]" data-punit="unit<?php echo $i;?>" id="unit<?php echo $key->id; ?>" value="<?php echo $key->unit;  ?>" readonly>
           <!-- <select  name="unit[]" id="unit<?php echo $key->id; ?>">
                	<option value="">Select....</option>
                    <option value="box" <?php //if($key->unit=='box'){ echo "selected"; } ?> >box</option>
                    <option value="cm" <?php  //if($key->unit=='cm'){ echo "selected"; } ?>>cm</option>
                    <option value="dz" <?php  //if($key->unit=='dz'){ echo "selected"; } ?>>dz</option>
                    <option value="ft" <?php  //if($key->unit=='ft'){ echo "selected"; } ?>>ft</option>
                    <option value="g" <?php  //if($key->unit=='g'){ echo "selected"; } ?>>g</option>
                    <option value="ln" <?php  //if($key->unit=='ln'){ echo "selected"; } ?>>ln</option>
                    <option value="kg" <?php  //if($key->unit=='kg'){ echo "selected"; } ?>>kg</option>
                    <option value="km" <?php  //if($key->unit=='box'){ echo "selected"; } ?>>km</option>
                    <option value="lb" <?php  //if($key->unit=='lb'){ echo "selected"; } ?>>lb</option>
                    <option value="mg" <?php  //if($key->unit=='mg'){ echo "selected"; } ?>>mg</option>
                    <option value="m" <?php  //if($key->unit=='m'){ echo "selected"; } ?>>m</option>
                    <option value="pcs" <?php  //if($key->unit=='pcs'){ echo "selected"; } ?>>pcs</option>                    
                </select>-->           
            
            </td>
            <td class="qty-td"><input type="number" name='qty[]' placeholder='Qty' value="<?php echo $key->qty;?>" class="form-control qty" step="0" min="0" onkeyup="checkthestock('<?php echo $key->id; ?>',this);" autocomplete="off"/></td>
            <td><input type="number" name='price[]' data-pid="price<?php echo $i;?>" placeholder='Enter Unit Price' value="<?php echo $key->price;?>" class="form-control price" step="0.01" min="0" autocomplete="off" <?php echo $l; ?>/></td>

            <td><input type="text" name='tax[]' data-tax="tax<?php echo $i;?>" placeholder='Enter tax' value="<?php echo $key->tax;?>" class="form-control tax" readonly/></td>

            <td><input type="text" name='taxamnt[]' data-taxamnt="taxamnt<?php echo $i;?>" placeholder='Enter tax amount' value="<?php echo $key->taxamnt;?>" class="form-control taxamnt" readonly/></td>

            <td class="discount-td"><input type="number" name='discount[]' data-pid="discount<?php echo $i;?>" placeholder='[%]' value="<?php echo $key->discount;?>" class="form-control discount" step="0.01" min="0" autocomplete="off"/></td>
            <td><input type="number" name='total[]' placeholder='0.00' value="<?php echo $key->price; ?>" class="form-control total" autocomplete="off" readonly/></td>
            <td><button type="button" id="delete_row" onClick="deleteRow(this)" data-rowId="addr<?php echo $i;?>" class="pull-right btn btn-danger">Delete</button></td>
          </tr>

        <?php  $i++; } } else { ?>

          <tr id='addr0'>
            <td>1</td>
            <td>
               <select name='title[]' data-id="0" onchange="getData(this)">
                <option value="">Select...</option>
                <?php foreach($proctlist as $pls){ ?>
                  <option value="<?php echo $pls->title.":".$pls->id; ?>"><?php echo $pls->title; ?></option>
                <?php } ?>
              </select>
              <!--<div id="list0"></div>-->
            </td>
            <td><input type="text" name="hsn[]"  data-phsn="hsn0" id="hsn<?php echo $key->id; ?>" value="" readonly/></td>
            <td width="10%">
            <input type="text" name="unit[]" data-punit="unit0" id="unit" value="" readonly>
                	<!--<option value="">Select....</option>
                    <option value="box">box</option>
                    <option value="cm">cm</option>
                    <option value="dz">dz</option>
                    <option value="ft">ft</option>
                    <option value="g">g</option>
                    <option value="ln">ln</option>
                    <option value="kg">kg</option>
                    <option value="km">km</option>
                    <option value="lb">lb</option>
                    <option value="mg">mg</option>
                    <option value="m">m</option>
                    <option value="pcs">pcs</option>                    
                </select>-->          
            
            </td>
            <td class="qtytd"><input type="number" name='qty[]' placeholder='Qty' class="form-control qty" step="0" min="0" autocomplete="off"/></td>

            <td><input type="number" name='price[]' data-pid="price0" placeholder='Enter Unit Price' class="form-control price" step="0.01" min="0" readonly/></td>

            <td><input type="text" name='tax[]' data-tax="tax0" placeholder='Enter tax' value="" class="form-control tax" readonly/></td>

             <td><input type="text" name='taxamnt[]' data-taxamnt="taxamnt0" placeholder='Enter tax amount' value="" class="form-control taxamnt" readonly/></td>

            <td class="discounttd"><input type="number" name='discount[]' data-pid="discount0" placeholder='[%]' class="form-control discount" step="0.01" min="0" autocomplete="off"/></td>
            <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
            <td><button type="button" id="delete_row" onClick="deleteRow(this)" data-rowId="addr0" class="pull-right btn btn-danger">Delete</button></td>
          </tr>

          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <button type="button" id="add_row" style="margin-left: 3%;" class="btn btn-success pull-left">Add Row</button>
      <!-- <button type="button" id="delete_row" class="pull-right btn btn-danger">Delete Row</button> -->
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
             <input type="hidden" name="tax_per" class="form-control" id="tax" value="<?php echo $this_element->tax_per;?>" placeholder="0"> 
          </tr>
          <!-- <tr>
            <th class="text-center">Tax %</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" name="tax_per" class="form-control" id="tax" value="<?php echo $this_element->tax_per;?>" placeholder="0"> 
                <select name="tax_per" class="form-control" id="tax">
                  <option value="" >0%</option>
                  <option value="5" <?php echo ($this_element->tax_per == 5) ? 'selected' : '' ; ?> >5%</option>
                  <option value="12" <?php echo ($this_element->tax_per == 12) ? 'selected' : '' ; ?> >12%</option>
                  <option value="18" <?php echo ($this_element->tax_per == 18) ? 'selected' : '' ; ?> >18%</option>
                  <option value="28" <?php echo ($this_element->tax_per == 28) ? 'selected' : '' ; ?> >28%</option>

                </select>-->
                <!-- <div class="input-group-addon">%</div> 
              </div></td>
          </tr>-->
          <tr>
            <th class="text-center">Total Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <td class="text-center"><input type="submit" name='submit' class="form-control btn btn-success" value="Save" /></td>
          </tr>
        </tbody>
        </form>
      </table>
    </div>
  </div>
</div>

<input type="hidden" id="totalProducts" value="<?php echo isset($products) ? count($products) : 0;?>" />




<input type="hidden" value="0" id="currentSelected" />

<script type="text/javascript">
    


function openUrlcust(val)
{
  var goUrl=$(val).val();

  if(goUrl == 'goCustomer')
  {
      var gUrl='<?php echo base_url().'customer/add_customer?redirect='.$_URL_add_invoice;?>';
      //window.open(goUrl, '_blank');
      window.location=gUrl;
  }
  else 
  {
    $.ajax({
    url: "<?php echo base_url().'client/ajax_get_cdata'; ?>",
     type:"post",
     dataType:'json',
     data:{'cid':goUrl}, 
      success: function(result){   
        if(result!=""){
          $("#billing_address").val(result.addr);
          $("#terms").val(result.terms);
          $("#due_date").val(result.tod);
          $("#date").val(result.fromd);
        }
             
     }}); 
  }
}


function doThis()
{
    //alert('ok');
    calc();
    calc_total();
}

function openUrl(val)
{
	var goUrl=$(val).val();

	if(goUrl == 'goCustomer')
	{
	  	var gUrl='<?php echo base_url().'customer/add_customer?redirect='.$_URL_add_invoice;?>';
	    //window.open(goUrl, '_blank');
	    window.location=gUrl;
	}
	else if(goUrl == 'goSalesPerson')
	{
		var gUrl='<?php echo base_url().'client/sales_persons?redirect='.$_URL_add_invoice;?>';
    //window.open(gUrl, '_blank');
    window.location=gUrl;
	}
}
function goToInventory()
{
  var gUrl='<?php echo base_url().'inventory/add_inventory?redirect='.$_URL_add_invoice;?>';
  window.open(gUrl, '_blank');
  //window.location=gUrl;
}

function getData(val)
{   
    var keyword=$(val).val();
    var id=$(val).attr('data-id');
    $('#currentSelected').val(id);
     var listId='#list'+id;
      var priceId='price'+id;
      var tax='tax'+id;
      var unit='unit'+id;
      var hsn='hsn'+id;
    //console.log(id);
    //alert(keyword);
    var listId='#list'+id;
    if(keyword != '')  
    {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url();?>client/getData",
            data:{keyword:keyword,callForData:'getData'},
            success: function(data){
              //$(listId).fadeIn();
              //$(listId).html(data);
                //var iTitle=$(val).text();
                var itax=$(val).attr('data-tax');
                var iunit=$(val).attr('data-unit');
                var ihsn=$(val).attr('data-hsn');
                var iPrice=$(val).attr('data-sprice');
                //console.log(iPrice);
                //$('[data-id='+id+']').val(iTitle);
                $('[data-tax='+tax+']').val(data.tax);
                $('[data-punit='+unit+']').val(data.unit);
                $('[data-phsn='+hsn+']').val(data.hsn);
                $('[data-pid='+priceId+']').val(data.sprice);
                if(data.type=="Service"){
                   $('[data-pid='+priceId+']').removeAttr('readonly');
                }

              calc();
            }
        });
    }
    else
    {
      $(listId).html('');
      $(listId).fadeOut(); 
    }
}

function putData(val)
{
  var id=$('#currentSelected').val();
  var listId='#list'+id;
  var priceId='price'+id;
  var tax='tax'+id;
  var unit='unit'+id;
  var hsn='hsn'+id;
  //console.log(priceId);
  var iTitle=$(val).text();
  var itax=$(val).attr('data-tax');
  var iunit=$(val).attr('data-unit');
  var ihsn=$(val).attr('data-hsn');
  var iPrice=$(val).attr('data-sprice');
  //console.log(iPrice);
  $('[data-id='+id+']').val(iTitle);
  $('[data-tax='+tax+']').val(itax);
  $('[data-punit='+unit+']').val(iunit);
  $('[data-phsn='+hsn+']').val(ihsn);
  $('[data-pid='+priceId+']').val(iPrice);
  $(listId).html('');
  $(listId).fadeOut(); 
  calc();
  calc_total();
}

</script>

