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
    .opc input[type=radio] {
        opacity: 1 !important;
        margin-left: 2% !important;
        margin-top: 0 !important;
    }
</style>
<body onload="doThis()">
    <div class="container-fluid" >
        <div class="row-fluid">
            <div class="span12">
             <!--  <a href="<?php echo base_url(); ?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Purchase Orders</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="" method="post">
                            <div class="span6">

                                <div class="control-group">
                                    <label class="control-label">Vendor Name</label>
                                    <div class="controls">
                                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->vendor; ?>" required/> -->
                                        <select id="name" onchange="openUrl(this)" name="vendor" class="span12" required>
                                            <?php
                                            if ($vendors) {
                                                foreach ($vendors as $key) {

                                                    $isSelected = ($this_element->vendor == $key->name) ? 'selected' : '';
                                                    ?>

                                                    <option value="<?php echo $key->name; ?>:<?php echo $key->id; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>

                                                    <?php
                                                }
                                            } else {
                                                echo '<option value="" >Select vendor</option>';
                                            }
                                            ?>
                                            <option value="goVendor" style="font-weight: bold">+ Add</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Deliver To</label>
                                    <div class="controls opc"> 
                                        <label>
                                            <input type="radio" name="deliver_to" <?php echo ($this_element->oname) ? 'checked' : ''; ?> onchange="deliverHere(this.value)" value="o" />
                                            Organization</label>
                                        <label>
                                            <input type="radio" name="deliver_to" <?php echo ($this_element->customer_id) ? 'checked' : ''; ?> onchange="deliverHere(this.value)" value="c" />
                                            Customer</label>
                                    </div>
                                </div>

                                <div class="control-group" id="customerTab" style="display:none;">
                                    <label class="control-label">Customer Name</label>
                                    <div class="controls">
                                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer; ?>" required/> -->
                                        <select id="customer" onchange="openUrl(this)" name="customer" class="span12" >
                                            <?php
                                            if ($customers) {
                                                foreach ($customers as $key) {

                                                    $isSelected = ($this_element->customer == $key->name) ? 'selected' : '';
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

                                <div id="organizationTab" style="display:none;">

                                    <div class="control-group">
                                        <label class="control-label">Name</label>
                                        <div class="controls">
                                            <input type="text" id="oname" class="span12" name="oname" placeholder="Organization Name" value="<?php echo $this_element->oname; ?>" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Mobile</label>
                                        <div class="controls">
                                            <input type="text" id="omobile" class="span12" name="omobile" placeholder="Mobile" value="<?php echo $this_element->omobile; ?>" autocomplete="off" pattern="\d{10}" maxlength="10" title="Please enter a 10-digit mobile number" required />
                                        </div>
                                    </div>

                                    

                                    <div class="control-group">
                                        <label class="control-label">City</label>
                                        <div class="controls">
                                            <input type="text" id="ocity" class="span12" name="city" placeholder="City" value="<?php echo $this_element->ocity; ?>" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">State</label>
                                        <div class="controls">
                                            <input type="text" id="ostate" class="span12" name="state" placeholder="State" value="<?php echo $this_element->ostate; ?>" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Country</label>
                                        <div class="controls">
                                            <input type="text" id="ocountry" class="span12" name="country" placeholder="Country" value="<?php echo $this_element->ocountry; ?>" autocomplete="off" />
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="span6">

                                <div class="control-group">
                                    <label class="control-label">Date</label>
                                    <div class="controls">
                                        <input type="date" class="span12" name="date" value="<?php echo $this_element->date; ?>"  autocomplete="off" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Expected Delivery Date</label>
                                    <div class="controls">
                                        <input type="date" class="span12" name="delivery_date" value="<?php echo $this_element->delivery_date; ?>" autocomplete="off" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Preference</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="preference" placeholder="Preference" value="<?php echo $this_element->preference; ?>" autocomplete="off" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Reference</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="reference" placeholder="Reference" value="<?php echo $this_element->reference; ?>" autocomplete="off" required/>
                                    </div>
                                </div>
                            </div>

                            <!-- ************  TABLE SECTION  **************** -->

                            <?php $this->load->view('clients/dynamic_product'); ?>

                            <!-- ************  END TABLE SECTION  **************** -->

                    </div>
                </div>
            </div>

            <input type="hidden" id="totalProducts" value="<?php echo count($products); ?>" />

            <input type="hidden" value="0" id="currentSelected" />



            <script type="text/javascript">

<?php if ($this_element->customer_id) { ?>

                    deliverHere('c');

<?php } else if ($this_element->oname) { ?>

                    deliverHere('o');

<?php } ?>

                function deliverHere(val)
                {
                    if (val == 'o')
                    {
                        $('#customer').val('');
                        $('#customerTab').fadeOut();
                        $('#organizationTab').fadeIn();

                        // $('#oname').prop('diabled',false);
                        // $('#omobile').prop('diabled',false);
                        // $('#ocity').prop('diabled',false);
                        // $('#ostate').prop('diabled',false);
                        // $('#ocountry').prop('diabled',false);

                    } else if (val == 'c')
                    {
                        $('#oname').val('');//prop('diabled',true);
                        $('#omobile').val('');//prop('diabled',true);
                        $('#ocity').val('');//prop('diabled',true);
                        $('#ostate').val('');//prop('diabled',true);
                        $('#ocountry').val('');//prop('diabled',true);
                        //$('#customer').val('');//prop('diabled',false);
                        $('#organizationTab').fadeOut();
                        $('#customerTab').fadeIn();
                    }
                }

                function getData(val)
                {
                    var keyword = $(val).val();
                    var id = $(val).attr('data-id');
                    $('#currentSelected').val(id);
                    var listId = '#list' + id;
                    if (keyword != '')
                    {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>admin/getData",
                            data: {keyword: keyword, callForData: 'getData'},
                            success: function (data) {
                                let res = JSON.parse(data);
                                $('#unit' + id).val(res.unit);
                                $('#price' + id).val(res.sprice);
                                $('#tax' + id).val(res.tax);
                            }
                        });
                    } else
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
                    var goUrl = $(val).val();

                    if (goUrl == 'goCustomer')
                    {
                        var gUrl = '<?php echo base_url() . 'customer/add_customer?redirect=' . $_URL_add_purchase_order; ?>';
                        //window.open(goUrl, '_blank');
                        window.location = gUrl;
                    } else if (goUrl == 'goVendor')
                    {
                        var gUrl = '<?php echo base_url() . 'client/add_vendor?redirect=' . $_URL_add_purchase_order; ?>';
                        //window.open(goUrl, '_blank');
                        window.location = gUrl;
                    }
                }
                function goToInventory()
                {
                    var gUrl = '<?php echo base_url() . 'inventory/add_inventory?redirect=' . $_URL_add_purchase_order; ?>';
                    window.open(gUrl, '_blank');
                    //window.location=gUrl;
                }

            </script>

