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
<body>
    <div class="container-fluid" >
        <div class="row-fluid">
            <div class="span12">       
                <img class="pull-right" src="<?php echo base_url() . $client->imagePath; ?>" alt="Brand Name" style="max-height:40px;max-width:90px;margin-top: -5%;" />
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5><?=$panelTitle;?></h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="post" enctype="multipart/form-data">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Customer Name</label>
                                    <div class="controls">
                                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->customer; ?>" required/> -->
                                        <select id="name" onChange="setcustomerinvoice(this.value);" name="customer_id" class="span12" required>
                                            <?php if ($isEditing != TRUE) { ?>
                                                <option value="" selected disabled>Select Customer</option>
                                                <?php
                                            }

                                            if ($customers) {
                                                foreach ($customers as $key) {
                                                    $isSelected = ($this_element->name == $key->id) ? 'selected' : '';
                                                    ?>

                                                    <option value="<?php echo $key->id; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>

                                                    <?php
                                                }
                                            } else {

                                                echo '<option value="" >Select Customer</option>';
                                            }
                                            if ($isEditing != TRUE) {
                                                ?>
                                                <option value="goCustomer" style="font-weight: bold">+ Add</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div style="clear:both;"></div>


                                <div class="control-group">
                                    <label class="control-label">Total Amount</label>
                                    <div class="controls">
                                        <span id="total_amnt"><?php echo $invoice->total; ?></span>
                                    </div>
                                </div>

                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Invoice Number</label>
                                    <div class="controls">
                                        <select name="invoice_id" id="customer_invoice" onChange="setinvdetailos(this.value);">
                                            <?php if (isset($invoice)) {
                                                ?>
                                                <option value="<?php echo $invoice->id; ?>"><?php echo $invoice->number; ?></option>
                                            <?php } ?>
                                        </select>  
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label">Order Status</label>
                                    <div class="controls">
                                        <select name="package_status" id="package_status" >
                                            <option value="1" <?= ($get_data->package_status == 1) ? 'selected' : ''; ?> >Created</option>                                             
                                            <option value="2" <?= ($get_data->package_status == 2) ? 'selected' : ''; ?> >In Progress</option>
                                            <option value="3" <?= ($get_data->package_status == 3) ? 'selected' : ''; ?> >Completed</option>  
                                        </select>  
                                    </div>
                                </div>



                            </div>
                            <div id="update_details" style=" <?= (!empty($get_data)) ? '' : 'display:none;'; ?>">
                                <div class="control-group">
                                    <label class="control-label">Package current Information</label>
                                    <div class="controls">

                                        <table id="package_row">
                                            <?php
                                            if (!empty($get_data)) {
                                                $loop_data = !empty($get_data->package_info) ? json_decode($get_data->package_info, true) : [];
                                                foreach ($loop_data as $ky => $lop_li) {
                                                    ?>

                                                    <tr id="pkg_rw_<?= $ky + 1; ?>" class="pkg_rw">
                                                        <td><input type="date" name="pkg_dt[]" value="<?=$lop_li['dt'];?>"></td>
                                                        <td><textarea type="text" name="info[]" placeholder="info."><?=$lop_li['info'];?></textarea></td>
                                                        <td><button type="button" class="btn btn-danger pull-left" onclick="$('#pkg_rw_<?= $ky + 1; ?>').remove()">Delete</button>      </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </table>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <button type="button" onclick="add_pkg_row()" style="margin-left: 3%;" class="btn btn-success pull-left">Add Row</button>      
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <button type="submit" style="margin-left: 3%; margin-top: 20px" class="btn btn-info pull-left">Submit</button>      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>

            </div>

            <script type="text/javascript">


                function add_pkg_row() {
                    let pkg_cnt = $('.pkg_rw').length;
                    let new_pkg_cnt = pkg_cnt + 1;
                    let html = `<tr id="pkg_rw_${new_pkg_cnt}" class="pkg_rw">
                                            <td><input type="date" name="pkg_dt[]"></td>
                                            <td><textarea type="text" name="info[]" placeholder="info."></textarea></td>
                                            <td><button type="button" class="btn btn-danger pull-left" onclick="$('#pkg_rw_${new_pkg_cnt}').remove()">Delete</button>      </td>
                                </tr>`;
                    $('#package_row').append(html);
                }


                function setcustomerinvoice(id) {
                    if (id == "goCustomer") {
                        if (confirm('Want to add new customer?')) {
                            window.location.href = '<?php echo base_url(); ?>customer/add_customer';
                        }
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>Clientstore/get_customer_all_invoices",
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
                            $('#total_amnt').html(data.total);
                            if (data.package_status == "3") {
                                $('#update_details').hide();
                            } else {
                                $('#update_details').show();
                            }
                            $('#package_status').val(data.package_status);
                        }
                    });
                }
            </script>

