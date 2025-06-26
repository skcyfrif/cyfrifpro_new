<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
.addLinkC{
  margin-top:2px;
  margin-left:-17%;
}
</style>
<body onLoad="doThis()">
<div class="container-fluid" >
    <div class="row-fluid">
      <div class="span12">
       <!--  <a href="<?php echo base_url();?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>vendor_credit</h5>
          </div>
          <div class="widget-content nopadding">
    <form action="" method="post">
        <div class="span6">
            <div class="control-group">
              <label class="control-label">Vendor Name</label>
              <div class="controls">
               <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->vendor;?>" required/> -->
                <select id="name" onChange="openUrl(this)" name="vendor" class="span12" required>
                  <?php if($vendors){ foreach($vendors as $key){ 

                        $isSelected=($this_element->vendor == $key->name) ? 'selected' : '';
                    ?>

                      <option value="<?php echo $key->name;?>:<?php echo $key->id;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                  <?php } } else { echo '<option value="" >Select vendor</option>' ; } ?>
                      <option value="govendor" style="font-weight: bold">+ Add</option>
                </select>
              </div>
            </div>
            <br />
            <div class="control-group">
              <label class="control-label">Order Number</label>
              <div class="controls">
                <input type="number" class="span12" name="order_number" placeholder="Order Number" value="<?php echo $this_element->order_number;?>" autocomplete="off" required/>
              </div>
            </div>
        </div>
        <div class="span6">

            <div class="control-group">
              <label class="control-label">Vendor Credit Date</label>
              <div class="controls">
                <input type="date" class="span12" name="date" value="<?php echo $this_element->date;?>" autocomplete="off" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Credit Note</label>
              <div class="controls">
                <input type="text" class="span12" name="credit_note" placeholder="Credit Note" value="<?php echo $this_element->credit_note;?>" autocomplete="off" required/>
              </div>
            </div>
        </div>
        
      <!--<table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center"> Product </th>
            <th class="text-center"> Quantity </th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
        <?php if($products){ 

            $i=0;
            foreach ($products as $key) {

        ?>

          <tr id='addr<?php echo $i;?>'>
            <td><?php echo $key->id; ?></td>
            <td>

              <input type="text" name='title[]' data-id='<?php echo $i;?>' onKeyUp="getData(this)" placeholder='Enter Product Name' value="<?php echo $key->title;?>" autocomplete="off" class="form-control keyword"/>
              <div id="list<?php echo $i;?>"></div>
            </td>
            <td><input type="number" name='qty[]' placeholder='Enter Qty' value="<?php echo $key->qty;?>" class="form-control qty" step="0" min="0"/></td>
            <td><input type="number" name='price[]' data-pid="price<?php echo $i;?>" placeholder='Enter Unit Price' value="<?php echo $key->price;?>" class="form-control price" step="0.00" min="0"/></td>
            <td><input type="number" name='total[]' placeholder='0.00' value="<?php echo ($key->price * $key->qty);?>" class="form-control total" readonly/></td>
            <td><button type="button" id="delete_row" onClick="deleteRow(this)" data-rowId="addr<?php echo $i;?>" class="pull-right btn btn-danger">Delete</button></td>
          </tr>

        <?php  $i++; } } else { ?>

          <tr id='addr0'>
            <td>1</td>
            <td>
              <input type="text" name='title[]' data-id='0' onKeyUp="getData(this)" placeholder='Enter Product Name' autocomplete="off" class="form-control"/>
              <div id="list0"></div>
            </td>
            <td><input type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
            <td><input type="number" name='price[]' data-pid="price0" placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
            <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
            <td><button type="button" id="delete_row" onClick="deleteRow(this)" data-rowId="addr0" class="pull-right btn btn-danger">Delete</button></td>
          </tr>

          <?php } ?>
        </tbody>
      </table>-->
      <?php $this->load->view('clients/dynamic_product'); ?>
      
    </div>
  </div>
<!--  <div class="row clearfix">
    <div class="col-md-12">
      <button type="button" id="add_row" style="margin-left: 3%;" class="btn btn-success pull-left">Add Row</button>
      <!-- <button type="button" id="delete_row" class="pull-right btn btn-danger">Delete Row</button> 
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Tax %</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" name="tax_per" class="form-control" id="tax" value="<?php echo $this_element->tax_per;?>" placeholder="0">
                <!-- <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
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
  </div>-->
</div>

<input type="hidden" id="totalProducts" value="<?php echo count($products);?>" />

<input type="hidden" value="0" id="currentSelected" />

<script type="text/javascript">
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
	  	var gUrl='<?php echo base_url().'customer/add_customer?redirect='.$_URL_add_vendor_credit;?>';
	    //window.open(goUrl, '_blank');
	    window.location=gUrl;
	}
	else if(goUrl == 'govendor')
  {
      var gUrl='<?php echo base_url().'client/add_vendor?redirect='.$_URL_add_vendor_credit;?>';
      //window.open(goUrl, '_blank');
      window.location=gUrl;
  }
}
function goToInventory()
{
  var gUrl='<?php echo base_url().'inventory/add_inventory?redirect='.$_URL_add_vendor_credit;?>';
  window.open(gUrl, '_blank');
  //window.location=gUrl;
}

</script>

