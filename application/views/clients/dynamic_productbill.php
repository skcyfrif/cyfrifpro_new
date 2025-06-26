
<style>
.discount .qty{
  
  width:35% !important;
}

input, textarea, .uneditable-input {
    width: 100px;
}


select {
    width: 215px;
    background-color: #fff;
    border: 1px solid #ccc;
}

.table.table-bordered tr td:nth-child(1) {
    width: 30px;
}

.table.table-bordered tr td:last-child {
    width: 65px;
}

.pull-right .table.table-bordered tr td:last-child {
    width: 300px;
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
            <th class="text-center"> Quantity </th>            
            <th class="text-center"> Price </th>
            <th class="text-center"> Discount </th>
            <th class="text-center"> Tax </th>
            <th class="text-center"> Tax amount</th>
            <th class="text-center"> Total </th>
            <th class="text-center">  </th>
          </tr>
        </thead>
        <tbody>
        <?php if($products){ 

            $i=0;
            foreach ($products as $key) {

        ?>

          <tr id='addr<?php echo $i;?>'>
            <td width="5%"><?php echo  $i+1; ?></td>
            <td width="15%">

              <input type="text" name='title[]' data-id='<?php echo $i;?>' onkeyup="getData(this)" placeholder='Enter Product Name' value="<?php echo $key->title;?>" autocomplete="off" class="form-control keyword"/>
              <div id="list<?php echo $i;?>"></div>
            </td>
            

            <td width="10%">
        <select name="unit[]"     data-punit="unit<?= $i; ?>"     id="unit<?= $i;?>">
        <option value="">Select....</option>
        <option value="box" <?php if($key->unit == 'box') { echo "selected"; } ?>>box</option>
        <option value="cm" <?php if($key->unit == 'cm') { echo "selected"; } ?>>cm</option>
        <option value="dz" <?php if($key->unit == 'dz') { echo "selected"; } ?>>dz</option>
        <option value="ft" <?php if($key->unit == 'ft') { echo "selected"; } ?>>ft</option>
        <option value="g" <?php if($key->unit == 'g') { echo "selected"; } ?>>g</option>
        <option value="ln" <?php if($key->unit == 'ln') { echo "selected"; } ?>>ln</option>
        <option value="kg" <?php if($key->unit == 'kg') { echo "selected"; } ?>>kg</option>
        <option value="km" <?php if($key->unit == 'km') { echo "selected"; } ?>>km</option>
        <option value="lb" <?php if($key->unit == 'lb') { echo "selected"; } ?>>lb</option>
        <option value="mg" <?php if($key->unit == 'mg') { echo "selected"; } ?>>mg</option>
        <option value="m" <?php if($key->unit == 'm') { echo "selected"; } ?>>m</option>
        <option value="pcs" <?php if($key->unit == 'pcs') { echo "selected"; } ?>>pcs</option>
    </select>
</td>
            <td class="qty-td" width="10%"><input type="number" name='qty[]' placeholder='Qty' value="<?php echo $key->qty;?>" class="form-control qty" step="0" min="0" id="qty<?= $i; ?>" style="width: 80% !important;"/></td>
            
            <td width="10%"><input type="number" name='price[]' data-pid="price<?php echo $i;?>" placeholder='Enter Unit Price' value="<?php echo $key->price;?>" class="form-control price" step="0.01" min="0" /></td>
            
            <td width="10%" class="discount-td"><input type="number" name='discount[]' data-pid="discount<?php echo $i;?>" placeholder='discount' value="<?php echo $key->discount;?>" class="form-control discount" step="0.00" min="0"/></td>
            
            <td><input type="text" name="tax[]" data-tax="tax<?php echo $i;?>" id="tax<?php echo $i;?>"  placeholder="Enter tax" class="form-control tax" value="<?php echo $key->tax;?>" /></td>
            
            <td><input type="text" name="taxamnt[]" id="taxamnt<?php echo $i;?>"  data-taxamnt="taxamnt<?php echo $i;?>" placeholder="Enter tax amount" class="form-control taxamnt" value="totaltotaltotaltotal $key->tax_amount;?>" readonly/></td>
            
            <td width="10%"><input type="number" name="total[]" placeholder="0.00" id="totalamt<?php echo $i; ?>"  class="form-control total"  value="<?php echo ($key->total);?>" readonly/></td>
            
            <td width="10%"><button type="button" id="delete_row" onclick="deleteRow(this)" data-rowId="addr<?php echo $i;?>" class="pull-right btn btn-danger">Delete</button></td>
          </tr>

        <?php  $i++; } } ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row clearfix">
    <div class="col-md-12">
      <button type="button" id="add_row5" style="margin-left: 3%;" class="btn btn-success pull-left">Add Row</button>
      <!-- <button type="button" id="delete_row" class="pull-right btn btn-danger">Delete Row</button> -->
    </div>

  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="pull-right col-md-6">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
            <tr style="display:none;">
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
                  <option value="28" <?php echo ($this_element->tax_per == 28) ? 'selected' : '' ; ?> >28%</option>

                </select>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Adjustment</th>
            <td class="text-center"><input type="number" id="adjustment" name="adjustment" placeholder='0.00' class="form-control" value="<?php echo $this_element->adjustment;?>"/>
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
    calc();
    var amount = $('#adjustment').val();
    var total_amount = $('#total_amount').val();
    if(total_amount > 0 && amount != '-' && amount != '+')
    {
      if(amount != '')
      {
          if(Math.sign(parseFloat(amount)) < 0)
          {
            var adjusted = parseFloat(total_amount) + parseFloat(amount);
            $('#total_amount').val(adjusted);
          }
          else if(Math.sign(parseFloat(amount)) > 0)
          {
            var adjusted = parseFloat(total_amount) + parseFloat(amount);
            $('#total_amount').val(adjusted);
          }
        }
      else
      {
          $('#total_amount').val($('#total_amount_hidden').val());
      }
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


<script>
$(document).ready(function () {
    let i = 1; // Initialize row counter

    // Add a new row
    $("#add_row5").click(function () {
        $('#tab_logic').append(
            `<tr id="addr${i}">
                <td>${i}</td>
                <td>
                    <input type="text" name="title[]" data-id="${i}" placeholder="Product" class="form-control">
                </td>
              
                <td>
                    <select name="unit[]" data-punit="unit${i}" id="unit${i}" class="form-control">
                        <option value="">Select...</option>
                        <option value="box">box</option>
                        <option value="pcs">pcs</option>
                        <option value="cm">cm</option>
                        <option value="ft">ft</option>
                        <option value="g">g</option>
                        <option value="in">in</option>
                        <option value="kg">kg</option>
                        <option value="km">km</option>
                        <option value="lb">Lb</option>
                        <option value="mg">mg</option>
                        <option value="m">m</option>
                    </select>
                </td>
                <td><input type="number" name="qty[]" class="form-control qty" step="0.01" min="0" id="qty${i}"></td>
                <td><input type="number" name="price[]" data-pid="price${i}" class="form-control price" step="0.01" min="0" id="price${i}"></td>
                <td><input type="number" name="discount[]" data-pid="discount${i}" class="form-control discount" step="0.01" min="0"></td>
                <td><input type="text" name="tax[]" data-tax="tax${i}" id="tax${i}" class="form-control tax"></td>
                <td><input type="text" name="taxamnt[]" id="taxamnt${i}" data-taxamnt="taxamnt${i}" class="form-control taxamnt" readonly></td>
                <td><input type="number" name="total[]" id="totalamt${i}" class="form-control total" readonly></td>
                <td><button type="button" class="delete_row btn btn-danger" data-rowId="addr${i}">Delete</button></td>
            </tr>`
        );
        i++; // Increment the row count
        $('#rowCount').val(i); // Update the row count
    });

    // Delete row functionality
    $(document).on("click", ".delete_row", function () {
        const rowId = $(this).data("rowid");
        $(`#${rowId}`).remove(); // Remove the corresponding row
    });

    // Calculation triggers
    $('#tab_logic tbody').on('keyup change', function () {
        calc();
    });

    $('#tax').on('keyup change', function () {
        calc_total();
    });
});
</script>
<style>
  select {
    width: 100px;
    background-color: #fff;
    border: 1px solid #ccc;
}
</style>
