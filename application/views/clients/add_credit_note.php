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
<body onload="doThis()">
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
                                        <select id="name" onchange="setcustomerinvoice(this.value)" name="name" class="span12" required>
                                            <option value="" selected disabled>Select Customer</option>
                                            <?php
                                            if ($customers) {
                                                foreach ($customers as $key) {
                                                    ?>

                                                    <option value="<?php echo $key->name; ?>:<?php echo $key->id; ?>" <?php echo ($this_element->customer_id == $key->id) ? 'selected' : ''; ?>><?php echo $key->name; ?></option>

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
                                    <label class="control-label">Credit Note</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="number" placeholder="Credit Note Number" value="<?php echo ($this_element->number) ?? 'CN' . mt_rand(100000, 999999); ?>" autocomplete="off" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Reference</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="reference" placeholder="Reference" value="<?php echo $this_element->reference; ?>" autocomplete="off" required/>
                                    </div>
                                </div>

                                <div id="previous_item_list">
                                    
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Invoice</label>
                                    <div class="controls">
                                        <select name="invoice" id="customer_invoice" onChange="setinvdetailos(this.value);">
                                            <?php if (isset($invoice)) {
                                                ?>
                                                <option value="<?php echo $invoice->id; ?>"><?php echo $invoice->number; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Date</label>
                                    <div class="controls">
                                        <input type="date" class="span12" name="date" value="<?php echo $this_element->date; ?>" autocomplete="off" required/>
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
                                    <label class="control-label">File</label>
                                    <div class="controls">
                                        <input type="file" class="span12" name="file" />
                                    </div>
                                </div>
                                <input type="hidden" name="existingFilePath" value="<?php echo $this_element->filePath; ?>" />
                            </div>
                            <div class="span12" style="margin-left:0%;">
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
<?php
if(!empty($this_element) && !empty($this_element->customer_id)){
    ?>
            <script>
            $(document).ready(function(){
                setcustomerinvoice('<?=$this_element->customer.':'.$this_element->customer_id;?>');
                setTimeout(function(){
                    $('#customer_invoice').val('<?=$this_element->invoice;?>').trigger('change');
                }, 2000);
            });
            </script>
    <?php
}
?>
            <script type="text/javascript">

                function doThis()
                {
                    //alert('ok');
                    calc();
                    calc_total();
                }

                function setcustomerinvoice(id) {
                    if (id == "goCustomer") {
                        if (confirm('Want to add new customer?')) {
                            window.location.href = '<?php echo base_url(); ?>customer/add_customer';
                        }
                    } else {
                        var parts = id.split(':');
                        var lastSegment = parts.pop() || parts.pop();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>Clientstore/get_customer_invoices_list",
                            dataType: "json",
                            data: {id: lastSegment},
                            success: function (data) {
                                console.log(data);
                                $('#customer_invoice').html(data.htm);
                            }
                        });
                    }
                }
                
                function setinvdetailos(id){
                    $('#previous_item_list').html('');
                    $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>client/getInvoiceItms",
                            data: {id: id},
                            success: function (data) {                                
                                $('#previous_item_list').html(data);
                            }
                        });
                }

                function openUrl(val)
                {
                    var goUrl = $(val).val();

                    if (goUrl == 'goCustomer')
                    {
                        var gUrl = '<?php echo base_url() . 'customer/add_customer?redirect=' . $_URL_add_credit_note; ?>';
                        //window.open(goUrl, '_blank');
                        window.location = gUrl;
                    }
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
                function goToInventory()
                {
                    var gUrl = '<?php echo base_url() . 'inventory/add_inventory?redirect=' . $_URL_add_credit_note; ?>';
                    window.open(gUrl, '_blank');
                    //window.location=gUrl;
                }

            </script>

