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
.discount, .qty{
  
  width:35% !important;
}
.fa-file-pdf-o{
font-size: 50px;
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
        <div class="span6">
            <div class="control-group">
              <label class="control-label">Customer Name</label>
              <div class="controls">
               <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer;?>" required/> -->
                <select id="name" onChange="openUrl(this)" name="name" class="span12" required>
                  <?php if($customers){				  
				  	foreach($customers as $key){ 
                        $isSelected=($this_element->name == $key->name) ? 'selected' : '';
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
                <select id="terms" onChange="openUrl(this)" name="sales_person" class="span12" required>
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
            
            <div class="control-group">
              <label class="control-label">Repeat Every</label>
              <div class="controls">
               	<select id="repet_every" name="repet_every" class="span12" required>
                	<option value="" >Select...</option>
                	<option value="2 Week" <?php echo ($this_element->repet_every == "2 Week") ? 'selected' : ''; ?> >2 Week</option>
                    <option value="2 Month" <?php echo ($this_element->repet_every == "2 Month") ? 'selected' : ''; ?>  >2 Month</option>
                    <option value="3 Month" <?php echo ($this_element->repet_every == "3 Month") ? 'selected' : ''; ?>  >3 Month</option>
                    <option value="6 Month" <?php echo ($this_element->repet_every == "6 Month") ? 'selected' : ''; ?>  >6 Month</option>
                    <option value="2 Year" <?php echo ($this_element->repet_every == "2 Year") ? 'selected' : ''; ?>  >2 Year</option>
                    <option value="3 Year" <?php echo ($this_element->repet_every == "2 Week") ? 'selected' : ''; ?> >3 Year</option>
                    <option value="4 Year" <?php echo ($this_element->repet_every == "4 Year") ? 'selected' : ''; ?> >4 Year</option>
                    <option value="5 Year" <?php echo ($this_element->repet_every == "5 Year") ? 'selected' : ''; ?> >5 Year</option>
                    <option value="6 Year" <?php echo ($this_element->repet_every == "6 Year") ? 'selected' : ''; ?> >6 Year</option>
                </select>
              </div>
            </div>
        </div>
        <div class="span6">
            <div class="control-group">
              <label class="control-label">Terms</label>
              <div class="controls">
                <!-- <input type="text" class="span10" name="terms" placeholder="Terms" value="<?php echo $this_element->terms;?>" required/> -->
                <select id="terms" onChange="openUrl(this)" name="terms" class="span12" required>
                    <?php if($terms){ foreach($terms as $key){ 

                          $isSelected=($this_element->terms == $key->terms) ? 'selected' : '';
                      ?>

                        <option value="<?php echo $key->name;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                    <?php } } else { echo '<option value="" >Select Term</option>' ; } ?>
                    <option value="goTerm" style="font-weight: bold">+ Add</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Date</label>
              <div class="controls">
                <input type="date" class="span12" name="date" value="<?php echo $this_element->date;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Due Date</label>
              <div class="controls">
                <input type="date" class="span12" name="due_date" value="<?php echo $this_element->due_date;?>" autocomplete="off" required/>
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
            <input type="hidden" name="existingFilePath" value="<?php echo $this_element->filePath;?>" autocomplete="off" />
        </div>
        <div class="span12" style="margin-left:0px !important;">
            
            <div class="control-group">
              <label class="control-label">Billing Address</label>
              <div class="controls">
                <textarea class="span12" name="billing_address" placeholder="Billing Address" required><?php echo $this_element->billing_address;?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Terms And Conditions</label>
              <div class="controls">
                <textarea class="span12" name="terms_conditions" placeholder="Terms And Conditions" required><?php echo $this_element->terms_conditions;?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Customer Note</label>
              <div class="controls">
                <textarea class="span12" name="customer_note" placeholder="Customer Note" required><?php echo $this_element->customer_note;?></textarea>
              </div>
            </div>
        </div>

      <!-- *************  TABLE SECTION  ***************** -->

                            <?php $this->load->view('clients/dynamic_product'); ?>

                            <!-- *************  END TABLE SECTION  ***************** -->
        
    </div>
  </div>
  
</div>

<input type="hidden" id="totalProducts" value="<?php echo count($products);?>" />




<input type="hidden" value="0" id="currentSelected" />

<script type="text/javascript">
    
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
                    var keyword = $(val).val();
                    var id = $(val).attr('data-id');
                    $('#currentSelected').val(id);
                    //console.log(id);
                    //alert(keyword);
                    var listId = '#list' + id;
                    if (keyword != '')
                    {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>admin/getData",
                            data: {keyword: keyword, callForData: 'getData'},
                            success: function (data) {
                                let res = JSON.parse(data);
//                                console.log(res);
//                                console.log(res.unit);
                                $('#unit' + id).val(res.unit);
                                $('#price' + id).val(res.sprice);
                                $('#tax' + id).val(res.tax);
                               /* $(listId).fadeIn();
                                $(listId).html(data);*/
//                                alert('Ok');
                                //console.log(data);
                            }
                        });
                    } else
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
  //console.log(priceId);
  var iTitle=$(val).text();
  var iPrice=$(val).attr('data-sprice');
  //console.log(iPrice);
  $('[data-id='+id+']').val(iTitle);
  $('[data-pid='+priceId+']').val(iPrice);
  $(listId).html('');
  $(listId).fadeOut(); 
  calc();
  calc_total();
}

</script>

