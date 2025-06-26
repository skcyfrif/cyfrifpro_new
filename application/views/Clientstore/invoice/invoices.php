<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.row-fluid .span12 {
  margin-left:0 !important;
}
.btn span.glyphicon {         
  opacity: 0 !important;       
}
.btn.active span.glyphicon {        
  opacity: 1 !important;
}
.select2-drop, .select2-with-searchbox, .select2-drop-above, .select2-drop-active{
  z-index: 999999999 !important;
}

.update-done {
    width: 60%;
}
.amount-price{
    float: left;
    color: #3575B9;
    text-transform: uppercase;
    padding-top: 10px;
    font-size:15px;
}
.modal {
    left: 55% !important;
  }
</style>
  <div class="container-fluid">
    <div class="row-fluid">
<?php
	$due_per=ceil(($due/$total)*100);
	$received_per=ceil(($received/$total)*100);
	$deposited_per=ceil(($deposited/$total)*100);
?>
      <div class="span12">
        <a href="<?php echo base_url();?>client/add_payment_recieved" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a><a href="javascript:void();" class="pull-right">&nbsp;  &nbsp;</a>
        <a href="<?php echo base_url();?>payment-recieved/csv" ><button class="btn btn-success btn-sm pull-right">Import</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>SL No</th>
                  <th>Invoice</th> 
                  <th>Customer</th> 
                  <th>Document</th>
                  <th>Total Amt</th>                  
                  <th>Date</th>                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($invoicpay){
                $i=1; foreach($invoicpay as $kyx=>$key){  ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo ++$kyx;?></td>
                        <td><?php echo $key->invoice.'/P'.$key->counter; ?></td>
                        <td><?php echo $key->cname; ?></td>
                        <td> 
                          <?php if($key->files != NULL){
                              echo '<a href="'.base_url().$key->files.'" class="">Download</a>';
                          }else{
                              echo '<span style="color:red;">N.A</span>';
                          }
                          ?>
                        </td>
                        <td><?php echo $key->invoice_amnt;?></td>
                        <td><?php echo date('d M Y',strtotime($key->pay_date));?></td>
                      
                        
                        <td class="td-actions">                            
                            <a href="<?php echo base_url();?>client/add_payment_recieved/<?php echo $key->payid;?>" class="btn btn-xs btn-info">
                                Edit                                       
                            </a>
                             <a href="<?php echo base_url();?>client/payment-recieved/<?php echo urlencode(base64_encode($key->payid));?>" class="btn btn-xs btn-primary">
                                Receipt                                       
                            </a>
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->payid; ?>" data-tblName="tbl_invoice_payments" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
                                Delete                                       
                            </a>
                        </td>
                    </tr>
                <?php $i++; } } else { ?>

                    <tr class="gradeX">
                        <td class="center" colspan="5">No data found</td>
                    </tr>

                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> 

<button style="display:none;" data-toggle="modal" data-target="#myModal" id="openModal"></button>
  <!-- MODAL -->
<div class="container">
  

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="titleModal"></h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="status-form" action="#" method="post">

            <div class="control-group">
                <label class="control-label">Payment Mode</label>
                <div class="controls">
                  <select name="mode" required>

                    <option value="cash">Cash</option>
                    <option value="cheque">Cheque</option>
                    <option value="direct">Direct Transaction</option>
                    <option value="card">Card</option>

                  </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Amount</label>
                <div class="controls">
                  <input class="span5" id="payAmount" onkeyup="checkAmount(this)" type="number" name="payAmount" required />
                </div>
                <p id="errorP"></p>
            </div>

            <div class="control-group">
                <label class="control-label">Instrument Number</label>
                <div class="controls">
                  <input class="span5" type="text" name="instrument_number" required />
                </div>
            </div>
            <input type="hidden" id="status" name="status" required />
            <input type="hidden" id="internalUseAmount" name="totalAmount" required />
            <input type="hidden" id="invoice_id" value="" name="invoice_id" required />
        </div>

        <p style="color:red;text-align:center;">Note*: After one receive or deposit you can't be able to edit your invoice.</p>

        <!-- Modal footer -->
        <div class="modal-footer">
        <div class="row">
          <div style="margin-left:5%;" class="col-md-6">
            <label class="pull-left">Total: <b id="total"></b></label>
          </div>
          <div class="col-md-6">
            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>&nbsp&nbsp&nbsp            
            <button type="button" class="btn btn-success pull-right" onclick="sendThis()" style="margin-right:5px;" id="saveBtn">Save</button>
          </div>
        </div>
        </div>
        </form>
      </div>
    </div>
   </div>


    <!-- THE MODAL 2 -->
    <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="titleModal">Payment History</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="widget-content nopadding updates" id="historyDiv">
            
          </div>

        </div>
         
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>           
        </div>
      </div>
    </div>


 

<script type="text/javascript">

  function changeIt(val)
  {
    if($(val).val() != 'due')
    {
      var status=$(val).val();
      var id=$(val).attr('data-id');
      var amount=$(val).attr('data-amount');
      var tamount=$(val).attr('data-tamount');

      var title='Status: '+status.charAt(0).toUpperCase()+ status.slice(1);
      $('#titleModal').html(title);
      $('#invoice_id').val(id);
      $('#status').val(status);
      if($(val).val() == 'received')
      {
        $('#internalUseAmount').val(amount);
        $('#total').html(amount);
      }
      else if($(val).val() == 'deposited')
      {
        $('#internalUseAmount').val(tamount);
        $('#total').html(tamount);
      }
      
      $('#openModal').click();
      //window.location="<?php echo base_url();?>admin/changeStatus/"+status+'/'+id;
    }
  }

  function checkAmount(val)
  {
    var amount=$(val).val();
    var ptotal=$('#internalUseAmount').val();
    if(amount <= 0)
    {
      $(val).val('');
      $('#total').html(ptotal);
    }
    else
    {
      $('#total').html(ptotal - amount);
      // console.log(amount);
      // console.log(ptotal);
      if(+amount > +ptotal){
        $('#total').html(ptotal);
        $('#errorP').html('<span style="color:red;">Amount Exceeded, Please have a look on total amount to be paid</span>');
        $('#errorP').fadeIn();
        $('#saveBtn').prop('disabled',true);
      }
      else{
        $('#errorP').html();
        $('#errorP').fadeOut();
        $('#saveBtn').prop('disabled',false);
      }
    }
  }
function sendThis()
{
  if($('#payAmount').val() != '')
  {
      var input=$('#status-form').serialize();
      //console.log(input);
      $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>client/saveInvoiceStatus",
          data:input,
          beforeSend:function(){
            $('#saveBtn').html('Saving..');
          },
          success: function(data){
            console.log(data);
            $('#saveBtn').html('Processing..');
            if($.parseJSON(data) == 'saved')
            {
              var dt=$('#titleModal').html();
              var status=dt.replace('Status: ','');
              var invoice_id=$('#invoice_id').val();
              window.location="<?php echo base_url();?>client/changeStatus/"+status+'/'+invoice_id;
            }
            
          }
      });
  }
  else
  {
    $('#payAmount').focus();
  }
}


function getHistory(val)
{
  var invoice_id=$(val).attr('data-invoice_id');
  $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>client/getInvoiceHistory/"+invoice_id,
          data:{noUse:'NoUSe'},
          beforeSend:function(){
            $('#historyDiv').html('Proccessing..');
          },
          success: function(content){
            console.log(content);
            $('#historyDiv').html(content);
            
          }
      });
}



</script>
