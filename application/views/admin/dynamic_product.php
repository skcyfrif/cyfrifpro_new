
<style>
.discount, .qty{
  
  width:35% !important;
}

</style>
<?php 

$accountDisplay=($accountEnabled) ? 'block' : 'none';
$totalDisplay=($accountEnabled) ? 'none' : 'block';
$accountActive=($accountEnabled) ? '' : 'disabled';

?>
<table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center"> Product </th>
            <th class="text-center"> Unit </th>
            <th style="display:<?php echo $accountDisplay; ?>" class="text-center"> Account </th>
            <th class="text-center"> Quantity </th>
            
            <th class="text-center"> Price </th>
            <th class="text-center"> Discount </th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
        <?php if($products){ 

            $i=0;
            foreach ($products as $key) {

        ?>

          <tr id='addr<?php echo $i;?>'>
            <td width="5%"><?php echo $key->id; ?></td>
            <td width="15%">

              <input type="text" name='title[]' data-id='<?php echo $i;?>' onkeyup="getData(this)" placeholder='Enter Product Name' value="<?php echo $key->title;?>" autocomplete="off" class="form-control keyword"/>
              <div id="list<?php echo $i;?>"></div>
            </td>
            <td width="10%">
            <select  name="unit[]" id="unit<?php echo $key->id; ?>">
                	<option value="">Select....</option>
                    <option value="box" <?php if($key->unit=='box'){ echo "selected"; } ?> >box</option>
                    <option value="cm" <?php  if($key->unit=='cm'){ echo "selected"; } ?>>cm</option>
                    <option value="dz" <?php  if($key->unit=='dz'){ echo "selected"; } ?>>dz</option>
                    <option value="ft" <?php  if($key->unit=='ft'){ echo "selected"; } ?>>ft</option>
                    <option value="g" <?php  if($key->unit=='g'){ echo "selected"; } ?>>g</option>
                    <option value="ln" <?php  if($key->unit=='ln'){ echo "selected"; } ?>>ln</option>
                    <option value="kg" <?php  if($key->unit=='kg'){ echo "selected"; } ?>>kg</option>
                    <option value="km" <?php  if($key->unit=='box'){ echo "selected"; } ?>>km</option>
                    <option value="lb" <?php  if($key->unit=='lb'){ echo "selected"; } ?>>lb</option>
                    <option value="mg" <?php  if($key->unit=='mg'){ echo "selected"; } ?>>mg</option>
                    <option value="m" <?php  if($key->unit=='m'){ echo "selected"; } ?>>m</option>
                    <option value="pcs" <?php  if($key->unit=='pcs'){ echo "selected"; } ?>>pcs</option>                    
                </select>          
            
            </td>
            <td width="10%" class="account-td" style="display:<?php echo $accountDisplay;?>;min-width: 200px;">
              <select  name="account[]" class="form-control account" <?php echo $accountActive;?> >
                <?php foreach($accounts as $akey){

                      $isSelected=($key->account == $akey->name) ? 'selected' : '';
                      echo '<option value="'.$akey->name.'" '.$isSelected.'>'.$akey->name.'</option>';

                    }
                ?>
              </select>
            </td>
			
            <td class="qty-td" width="10%"><input type="number" name='qty[]' placeholder='Qty' value="<?php echo $key->qty;?>" class="form-control qty" step="0" min="0"/></td>
            
            <td width="10%"><input type="number" name='price[]' data-pid="price<?php echo $i;?>" placeholder='Enter Unit Price' value="<?php echo $key->price;?>" class="form-control price" step="0.01" min="0"/></td>
            <td width="10%" class="discount-td"><input type="number" name='discount[]' data-pid="discount<?php echo $i;?>" placeholder='[%]' value="<?php echo $key->discount;?>" class="form-control discount" step="0.00" min="0"/></td>
            <td width="10%" style="display:<?php echo $totalDisplay;?>"><input type="number" name='total[]' placeholder='0.00' value="<?php echo ($key->price * $key->qty);?>" class="form-control total" readonly/></td>
            <td width="10%"><button type="button" id="delete_row" onclick="deleteRow(this)" data-rowId="addr<?php echo $i;?>" class="pull-right btn btn-danger">Delete</button></td>
          </tr>

        <?php  $i++; } } else { ?>

          <tr id='addr0'>
            <td width="5%">1</td>
            <td width="15%">
              <input type="text" name='title[]' data-id='0' onkeyup="getData(this)" placeholder='Enter Product Name' autocomplete="off" class="form-control"/>
              <div id="list0"></div>
            </td>
            <td width="10%">
            <select name="unit[]" id="unit">
                    <option value="">Select....</option>
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
                </select>          
            
            </td>
            <td width="10%" class="account-td" style="display:<?php echo $accountDisplay;?>;min-width: 200px;">
              <select  name="account[]" class="form-control account" <?php echo $accountActive;?> >
                <?php foreach($accounts as $akey){

                      echo '<option value="'.$akey->name.'">'.$akey->name.'</option>';

                    }
                ?>
              </select>
            </td>
            <td class="qtytd" width="10%"><input type="number" name='qty[]' placeholder='Qty' class="form-control qty" step="0" min="0"/></td>
            
            <td width="10%"><input type="number" name='price[]' data-pid="price0" placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
            <td class="discounttd" width="10%"><input type="number" name='discount[]' data-pid="discount0" placeholder='[%]' class="form-control discount" step="0.00" min="0"/></td>
            <td width="10%" style="display:<?php echo $totalDisplay;?>"><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
            <td width="10%"><button type="button" id="delete_row" onclick="deleteRow(this)" data-rowId="addr0" class="pull-right btn btn-danger">Delete</button></td>
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
          </tr>
          <tr>
            <th class="text-center">Tax %</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <!-- <input type="number" name="tax_per" class="form-control" id="tax" value="<?php echo $this_element->tax_per;?>" placeholder="0"> -->
                <select name="tax_per" class="form-control" id="tax">
                  
                  <option value="">0%</option>
                  <option value="5" <?php echo ($this_element->tax_per == 5) ? 'selected' : '' ; ?> >5%</option>
                  <option value="12" <?php echo ($this_element->tax_per == 12) ? 'selected' : '' ; ?> >12%</option>
                  <option value="18" <?php echo ($this_element->tax_per == 18) ? 'selected' : '' ; ?> >18%</option>
                  <option value="28" <?php echo ($this_element->tax_per == 18) ? 'selected' : '' ; ?> >28%</option>

                </select>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Adjustment</th>
            <td class="text-center"><input type="number" id="adjustment" placeholder='0.00' class="form-control" />
            <button type="button" style="margin-top: -10px;background-color: #51A355;color:white;" onclick="adjust()" class="btn">Adjust</button></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <td class="text-center"><input type="submit" name='submit' class="form-control btn btn-success" value="Save" /></td>
          </tr>
          <input type="hidden" id="total_amount_hidden" value="" required="" />
        </tbody>
        </form>
      </table>

<script>

function adjust()
{
    var amount = $('#adjustment').val();
    var total_amount = $('#total_amount').val();
    if(total_amount > 0 && amount != '-' && amount != '+')
    {
      if(amount != '')
      {
          if(Math.sign(parseInt(amount)) < 0)
          {
            var adjusted = parseInt(total_amount) - parseInt(amount);
            $('#total_amount').val(adjusted);
          }
          else if(Math.sign(parseInt(amount)) > 0)
          {
            var adjusted = parseInt(total_amount) + parseInt(amount);
            $('#total_amount').val(adjusted);
          }
        }
      else
      {
          $('#total_amount').val($('#total_amount_hidden').val());
      }
        
    }
      
}

function getData(val)
{   
    var keyword=$(val).val();
    var id=$(val).attr('data-id');
    $('#currentSelected').val(id);
    //console.log(id);
    //alert(keyword);
    var listId='#list'+id;
    if(keyword != '')  
    {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>client/getData",
            data:{keyword:keyword,callForData:'getData'},
            success: function(data){
              $(listId).fadeIn();
              $(listId).html(data);
              //alert('Ok');
              //console.log(data);
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
  //console.log(priceId);
  var iTitle=$(val).text();
  var iPrice=$(val).attr('data-sprice');
  //console.log(iPrice);
  $('[data-id='+id+']').val(iTitle);
  $('[data-pid='+priceId+']').val(iPrice);
  $(listId).html('');
  $(listId).fadeOut(); 
  
}

</script>