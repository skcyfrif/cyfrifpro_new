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
    .opc input[type=radio]{
        opacity: 1 !important;
        margin-top: -5px;
    }
    #ydeduct_tax{
        display:none;
    }
</style>
<body onLoad="doThis()">
    <div class="container-fluid" >
        <div class="row-fluid">
            <div class="span12">       
                <img class="pull-right" src="<?php echo base_url() . $client->imagePath; ?>" alt="Brand Name" style="max-height:40px;max-width:90px;margin-top: -5%;" />
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Record Payment</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="post" enctype="multipart/form-data">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Customer Name</label>
                                    <div class="controls">
                                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer; ?>" required/> -->
                                        <select id="name" onChange="setcustomerinvoice(this.value);" name="name" class="span12" required>
                                            <option value="" selected disabled>Select Customer</option>
                                            <?php
                                            if ($customers) {
                                                foreach ($customers as $key) {
                                                    $isSelected = ($this_element->cust_id == $key->id) ? 'selected' : '';
                                                    ?>

                                                    <option value="<?php echo $key->id; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>

                                                    <?php
                                                }
                                            } else {
                                                echo '<option value="" >Select Customer</option>';
                                            }
                                            ?>
                                            <option value="goCustomer" style="font-weight: bold">+ Add</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="span12">
                                    <div class="span6">
                                        <div class="control-group">
                                            <label class="control-label">Amount</label>
                                            <div class="controls opc">
                                                <input type="text" class="span12" name="amount" placeholder="Amount" value="<?php echo $this_element->amount; ?>" required/>                
                                                <input type="checkbox" name="fuulamnt" id="fuulamnt" value="1">Pay full amount
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="control-group">
                                            <label class="control-label">Bank Charges (if any)</label>
                                            <div class="controls">
                                                <input type="text" class="span12" name="bank_charge" placeholder="Bank Charges" value="<?php echo $this_element->bank_charge; ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>

                                <div class="control-group">
                                    <label class="control-label">Payment Date</label>
                                    <div class="controls">
                                        <input type="date" class="span12" name="date" value="<?php echo $this_element->pay_date; ?>" autocomplete="off" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Payment</label>
                                    <div class="controls">
                                        <input type="number" class="span10" name="payemnt" placeholder="Payemnt" value="<?php echo $this_element->payment; ?>" autocomplete="off" required/>

                                    </div>
                                </div>

                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Payment Mode</label>
                                    <div class="controls">
                                      <!-- <input type="text" class="span10" name="terms" placeholder="Terms" value="<?php echo $this_element->terms; ?>" required/> -->
                                        <select id="mode" name="mode" class="span12" required onchange="payModeChanged(this.value)">
                                            <?php
                                            if ($modes) {
                                                foreach ($modes as $key) {
                                                    $isSelected = ($this_element->mode == $key->mode_id) ? 'selected' : '';
                                                    ?>

                                                    <option value="<?php echo $key->mode_id; ?>" <?php echo $isSelected; ?>><?php echo $key->mode; ?></option>

                                                    <?php
                                                }
                                            } else {
                                                echo '<option value="" >Select Term</option>';
                                            }
                                            ?>
                                            <option value="goTerm" style="font-weight: bold">+ Add</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Deposit To</label>
                                    <div class="controls">
                                        <select id="deposite_to" name="deposite_to" class="span12" required>
                                            <option value="">select...</option>

                                            <option value="Petty Cash" <?php echo ($this_element->deposit_to == "Petty Cash") ? 'selected' : ''; ?>>Petty Cash</option>
                                            <option value="Undeposited Funds" <?php echo ($this_element->deposit_to == "Undeposited Funds") ? 'selected' : ''; ?>>Undeposited Funds</option>

                                            <option value="Employee Reimbursements" <?php echo ($this_element->deposit_to == "Employee Reimbursements") ? 'selected' : ''; ?>>Employee Reimbursements</option>
                                            <option value="Opening Balance Adjustment" <?php echo ($this_element->deposit_to == "Opening Balance Adjustment") ? 'selected' : ''; ?>>Opening Balance Adjustment</option>
                                            <option value="TDS Payable" <?php echo ($this_element->deposit_to == "TDS Payable") ? 'selected' : ''; ?>>TDS Payable</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Reference</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="reference" value="<?php echo $this_element->reference; ?>" autocomplete="off" required/>
                                    </div>
                                </div>

                                <div class="control-group" style="margin-top: 15px !important;">
                                    <label class="control-label">Attachment</label>
                                    <div class="controls">
                                        <input type="file" class="span12" name="file" />
                                    </div>

                                    <?php if (isset($this_element->files) && $this_element->files != "") { ?>
                                        <a href="<?php echo base_url() . $this_element->files; ?>" target="_blank">Download here</a>
                                    <?php } ?>
                                    <input type="hidden" name="existingFilePath" value="<?php echo $this_element->files; ?>">
                                </div>


                            </div>
                            <div class="span12">

                                <div class="control-group">
                                    <label class="control-label">Tax deducted ? </label>
                                    <div class="controls opc">
                                        <input type="radio" name="tax" onClick="dedutax('0');"  value="0" <?php echo ($this_element->tax == 0) ? 'checked' : ''; ?>> No Tax deducted  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="tax" value="1" onClick="dedutax('1');" <?php echo ($this_element->tax == 1) ? 'checked' : ''; ?>> Yes, TDS (Income Tax)

                                    </div>
                                </div>


                                <div class="control-group" id="ydeduct_tax" <?php echo ($this_element->tax == 1) ? 'style="display:block;"' : ''; ?>>
                                    <label class="control-label">TDS Tax Account</label>
                                    <div class="controls">
                                        <select name="tds_tax" id="tds_tax">
                                            <option value="">Select...</option>
                                            <option value="Advance Tax" <?php echo ($this_element->tax_account == "Advance Tax") ? 'selected' : ''; ?>>Advance Tax</option>
                                            <option value="Employee Advance" <?php echo ($this_element->tax_account == "Employee Advance") ? 'selected' : ''; ?>>Employee Advance</option>
                                            <option value="Prepaid Expenses" <?php echo ($this_element->tax_account == "Prepaid Expenses") ? 'selected' : ''; ?>>Prepaid Expenses</option>
                                            <option value="TDS Receivable" <?php echo ($this_element->tax_account == "TDS Receivable") ? 'selected' : ''; ?>>TDS Receivable</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <table class="table table-bordered table-hover" id="tab_logic">
                                <thead>
                                    <tr>                    
                                        <th class="text-center">Invoice Number</th>
                                        <th class="text-center"> Date </th>
                                        <th class="text-center"> Invoice Amount	 </th>
                                        <th class="text-center"> Amount Due	 </th>
                                        <th class="text-center"> Payment </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0' class="">            
                                        <td width="20%">              
                                            <select name="invoice" id="customer_invoice" onChange="setinvdetailos(this.value);">
                                                <?php if (isset($invoice)) {
                                                    ?>
                                                    <option value="<?php echo $invoice->id; ?>"><?php echo $invoice->number; ?></option>
                                                <?php } ?>
                                            </select>              
                                        </td>
                                        <td width="20%"><span id="due_date"><?php echo date('Y-m-d',strtotime($this_element->pay_date)); ?></span></td>
                                        <td width="20%"><span id="total_amnt"><?php echo $invoice->total; ?></span></td>
                                        <td width="20%"><span id="due_amnt"><?php echo $invoice->due; ?></span></td>
                                        <td width="20%"><input type="text" name="recvamnt" id="recvamnt" onBlur="setrevcal(this.value);" value="<?php echo $this_element->invoice_amnt; ?>"/></td>          
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
                <!--<div class="row clearfix">
                  <div class="col-md-12">
                    <button type="button" id="add_row" style="margin-left: 3%;" class="btn btn-success pull-left">Add Row</button>
                    <button type="button" id="delete_row" class="pull-right btn btn-danger">Delete Row</button>
                  </div>
                </div>-->

                <div class="row clearfix" style="margin-top:20px">

                    <div class="pull-right col-md-4">

                        <table class="table table-bordered table-hover" id="tab_logic_total">

                            <tbody>
                                <tr>
                                    <th class="text-center">Amount Received :</th>
                                    <td class="text-center"><span id="revamnt"><?php echo $this_element->invoice_amnt; ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-center">Amount used for payments :</th>
                                    <td class="text-center"><span id="amnt_use_pay"><?php echo $this_element->invoice_amnt; ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-center">Amount Refunded :</th>
                                    <td class="text-center"><span id="refu_amnt">0.00</span></td>
                                </tr>
                                <tr>
                                    <th class="text-center">Amount in excess :</th>
                                    <td class="text-center"><span id="exce_amnt">0.00</span></td>
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

            <script type="text/javascript">
                function dedutax(val) {
                    if (val == 1) {
                        $('#ydeduct_tax').show();
                    } else {
                        $('#ydeduct_tax').hide();
                    }
                }

                function setrevcal(evt) {
                    $('#revamnt').html(evt);
                    $('#amnt_use_pay').html(evt);

                }

                function payModeChanged(id) {
                    if(id=="goTerm"){
                        if(confirm('Want to add new payment mode?')){
                            window.location.href ='<?php echo base_url(); ?>Clientstore/add_payment_mode';
                        }
                    }
                    }
                function setcustomerinvoice(id) {
                    if(id=="goCustomer"){
                        if(confirm('Want to add new customer?')){
                            window.location.href ='<?php echo base_url(); ?>customer/add_customer';
                        }
                    }else{
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>Clientstore/get_customer_invoices",
                            dataType: "json",
                            data: {id: id},
                            success: function (data) {
                                console.log(data);
                                $('#customer_invoice').html(data.htm);
                            }
                        });
                    }
                }

                function setinvdetailos(id) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>Clientstore/get_details_invoices",
                        dataType: "json",
                        data: {id: id},
                        success: function (data) {
                            $('#due_date').html(data.date);
                            $('#total_amnt').html(data.total);
                            $('#due_amnt').html(data.due);
                        }
                    });
                }
            </script>

