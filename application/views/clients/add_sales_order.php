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
             <!--  <a href="<?php echo base_url(); ?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Sales Order</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Customer Name</label>
                                    <div class="controls">
                                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer; ?>" required/> -->
                                        <select id="name" onChange="openUrl(this)" name="name" class="span12" required>
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
                                <div class="control-group">
                                    <label class="control-label">Sales Order</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="sales_ord_id" placeholder="Sales Order" value="<?php echo $this_element->sales_ord_id; ?>" autocomplete="off" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Reference</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="reference" placeholder="Reference" value="<?php echo $this_element->reference; ?>" autocomplete="off" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Sales Person</label>
                                    <div class="controls">
                                        <select id="name" name="sales_person" class="span12" required>
                                            <?php
                                            if ($sales_persons) {
                                                foreach ($sales_persons as $key) {
                                                    $isSelected = ($this_element->name == $key->name) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?php echo $key->name; ?>:<?php echo $key->id; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>
                                                    <?php
                                                }
                                            } else {
                                                echo '<option value="" >Select Sales Person</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="control-group" style="margin-top: 15px !important;">
                                    <label class="control-label">Attachment</label>
                                    <div class="controls">
                                        <input type="file" class="span12" name="file" />
                                    </div>
                                </div>
                                <input type="hidden" name="existingFilePath" value="<?php echo $this_element->filePath; ?>" />
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Date</label>
                                    <div class="controls">
                                        <input type="date" class="span12" name="date" value="<?php echo $this_element->date; ?>" autocomplete="off" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Shipment Date</label>
                                    <div class="controls">
                                        <input type="date" class="span12" name="shipment_date" value="<?php echo $this_element->shipment_date; ?>" autocomplete="off" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Delivery Method</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="delivery_method" placeholder="Delivery Method" value="<?php echo $this_element->delivery_method; ?>" autocomplete="off" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Sales Order Number</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="number" placeholder="Sales Order Number" value="<?php echo ($this_element->number) ?? 'SN' . mt_rand(100000, 999999); ?>" autocomplete="off" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="span12" style="margin-left:0%;">
                                <div class="control-group">
                                    <label class="control-label">Terms And Conditions</label>
                                    <div class="controls">
                                        <textarea class="span12" name="terms_conditions" placeholder="Terms And Conditions" required><?php echo $this_element->terms_conditions; ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Customer Note</label>
                                    <div class="controls">
                                        <textarea class="span12" name="customer_note" placeholder="Customer Note" required><?php echo $this_element->customer_note; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- *************  TABLE SECTION  ***************** -->

                            <?php $this->load->view('clients/dynamic_product'); ?>

                            <!-- *************  END TABLE SECTION  ***************** -->

                    </div>
                </div>
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

                    if (goUrl == 'goCustomer')
                    {
                        var gUrl = '<?php echo base_url() . 'customer/add_customer?redirect=' . $_URL_add_sales_order; ?>';
                        //window.open(goUrl, '_blank');
                        window.location = gUrl;
                    }
                }
                function goToInventory()
                {
                    var gUrl = '<?php echo base_url() . 'inventory/add_inventory?redirect=' . $_URL_add_sales_order; ?>';
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
                    var id = $('#currentSelected').val();
                    var listId = '#list' + id;
                    var priceId = 'price' + id;
                    //console.log(priceId);
                    var iTitle = $(val).text();
                    var iPrice = $(val).attr('data-sprice');
                    //console.log(iPrice);
                    $('[data-id=' + id + ']').val(iTitle);
                    $('[data-pid=' + priceId + ']').val(iPrice);
                    $(listId).html('');
                    $(listId).fadeOut();

                }

            </script>

