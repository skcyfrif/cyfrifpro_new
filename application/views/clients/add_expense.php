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
<body onload="doThis()">
    <div class="container-fluid" >
        <div class="row-fluid">
            <div class="span12">
             <!--  <a href="<?php echo base_url(); ?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Add Expense</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="span12">
                                <div class="control-group">
                                    <label class="control-label">Customer Name</label>
                                    <div class="controls">
                                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer; ?>" required/> -->
                                        <select id="name" onchange="openUrl(this)" name="customer" class="span12" required>
                                            <?php
                                            if ($customers) {
                                                foreach ($customers as $key) {

                                                    $isSelected = ($this_element->customer_id == $key->id) ? 'selected' : '';
                                                    ?>

                                                    <option value="<?php echo $key->name; ?>:<?php echo $key->id; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>

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

                                <div class="control-group">
                                    <label class="control-label">Expense Account</label>
                                    <div class="controls">
                                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer; ?>" required/> -->
                                        <select id="name" onchange="openUrl(this)" name="account_id" class="span12" required>
                                            <?php
                                            if ($accounts) {
                                                foreach ($accounts as $key) {

                                                    $isSelected = ($this_element->account_id == $key->id) ? 'selected' : '';
                                                    ?>

                                                    <option value="<?php echo $key->id; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>

                                                    <?php
                                                }
                                            } else {
                                                echo '<option value="" >Select Account</option>';
                                            }
                                            ?>
                                            <option value="goAccount" style="font-weight: bold">+ Add</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Invoice</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="invoice" placeholder="Invoice" value="<?php echo $this_element->invoice; ?>" autocomplete="off" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Paid Through</label>
                                    <div class="controls">
                                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer; ?>" required/> -->
                                        <select id="name" name="paid_through" class="span12" required>
                                            <?php
                                            if ($payment_accounts) {
                                                foreach ($payment_accounts as $key) {

                                                    $isSelected = ($this_element->paid_through == $key->name) ? 'selected' : '';
                                                    ?>

                                                    <option value="<?php echo $key->name; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>

                                                    <?php
                                                }
                                            } else {
                                                echo '<option value="" >Select</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Vendor</label>
                                    <div class="controls">
                                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer; ?>" required/> -->
                                        <select id="vendor" onchange="openUrl(this)" name="vendor" class="span12" required>
                                            <?php
                                            if ($vendors) {
                                                foreach ($vendors as $key) {

                                                    $isSelected = ($this_element->vendor_id == $key->id) ? 'selected' : '';
                                                    ?>

                                                    <option value="<?php echo $key->name; ?>:<?php echo $key->id; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>

                                                    <?php
                                                }
                                            } else {
                                                echo '<option value="" >Select Vendor</option>';
                                            }
                                            ?>
                                            <option value="goVendor" style="font-weight: bold">+ Add</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group" style="margin-top: 15px !important;">
                                    <label class="control-label">File</label>
                                    <div class="controls">
                                        <input type="file" class="span12" name="file" />
                                    </div>
                                    <?php if (!empty($this_element->filePath)) { ?>
                                        <img src="<?= base_url() . $this_element->filePath; ?>" width="100" />
                                    <?php } ?>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Note</label>
                                    <div class="controls">
                                        <textarea class="span12" name="note" placeholder="Note" required><?php echo $this_element->note; ?></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="existingFilePath" value="<?php echo $this_element->filePath; ?>" />
                            </div>

                    </div>
                </div>
                <div class="form-actions" >
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="<?php echo base_url(); ?>admin/clients/"><button type="button" class="btn btn-sm btn-info">Back</button></a>
                </div>
                </form>
            </div>

            <input type="hidden" id="totalProducts" value="<?php echo count($products); ?>" />

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
                    var goUrl = $(val).val();
                    //alert(goUrl);

                    if (goUrl == 'goCustomer')
                    {
                        var gUrl = '<?php echo base_url() . 'customer/add_customer?redirect=' . $_RETURN_URL; ?>';
                        //window.open(goUrl, '_blank');
                        window.location = gUrl;
                    } else if (goUrl == 'goVendor')
                    {
                        var gUrl = '<?php echo base_url() . 'client/add_vendor?redirect=' . $_RETURN_URL; ?>';
                        //window.open(goUrl, '_blank');
                        window.location = gUrl;
                    } else if (goUrl == 'goAccount')
                    {
                        var gUrl = '<?php echo base_url() . 'client/add_account?redirect=' . $_RETURN_URL; ?>';
                        //window.open(goUrl, '_blank');
                        window.location = gUrl;
                    }
                }

            </script>

