<style>
    .control-group{
        margin: 10px !important;
    }

    .navtop{
        margin-top:50px;
    }
    .tab-content {
        padding: 40px;
        margin-top: -20px;
    }
    .loading{
        height:17px;
        width:17px;
        display:none;
    }
    .opc input[type=radio] {
        opacity: 1 !important;
        margin-top: -5px;
    }

</style>
<?php //echo "<pre>"; print_r($this_element); exit; ?>

<div class="container-fluid" >
    <div class="row-fluid">
        <div class="span12">
         <!--  <a href="<?php echo base_url(); ?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Customer</h5>
                    <a href="javascript:void();" onclick="printrecord();" class="pull-right btn btn-info">Print</a>
                </div>
                <div class="widget-content nopadding" id="printarea">
                
                    <table class="table table-bordered table-invoice">
                        <tr>
                            <th>Name</th>
                            <td><?php echo $this_element->name; ?></td>    
                            <th>Display Name</th>
                            <td><?php echo $this_element->display_name; ?></td>            
                            <th>Comnapny</th>
                            <td><?php echo $this_element->company_name; ?></td>
                        </tr>

                        <tr>
                            <th>Vendor ID</th>
                            <td><?php echo "VENDR" . $this_element->id; ?></td>
                            <th>Email</th>
                            <td><?php echo $this_element->email; ?></td>
                            <th>Website</th>
                            <td><?php echo $this_element->website; ?></td>
                        </tr>           

                        <tr><th colspan="6">Other Details</th></tr>
                        <tr>
                            <th>Currency</th>
                            <td><?php foreach ($currency_list as $cnc) { ?>
                                    <?php echo ($cnc->id == $this_element->currency) ? $cnc->currency . '&nbsp;(' . $cnc->code . ')' : ""; ?>
                                <?php } ?>
                            </td>
                            <th>Opening Balance</th>
                            <td><?php echo $this_element->opening_balance; ?></td>
                            <th>Payment Terms</th>
                            <td><?php foreach ($terms_list as $trm) { ?>
                                    <?php echo ($trm->id == $this_element->terms) ? $trm->name : ""; ?>
                                <?php } ?></td>
                        </tr>

                        <tr><th colspan="6">Address</th></tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $this_element->address; ?></td>
                            <th>Country</th>
                            <td><?php
                                foreach ($countries as $key) {
                                    echo ($this_element->country_id == $key->id) ? $key->name : '';
                                }
                                ?></td>
                            <th>State</th>
                            <td><?php
                                foreach ($states as $key2) {
                                    echo ($this_element->state_id == $key2->id) ? $key2->name : '';
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <th>City</th>                
                            <td><?php
                                foreach ($cities as $key) {
                                    echo ($this_element->city_id == $key->id) ? $key->name : '';
                                }
                                ?></td>
                            <th>Postcode</th>
                            <td><?php echo $this_element->postcode; ?></td>
                            <th>Fax</th>
                            <td><?php echo $this_element->fax; ?></td>
                        </tr>

                        <tr><th colspan="6">Contact Person</th></tr>

                        <tr class="contactloop">
                            <td colspan="2"><?php echo $this_element->cp_name; ?></td>
                            <td colspan="2"><?php echo $this_element->cp_email; ?></td>
                            <td colspan="2"><?php echo $this_element->cp_mobile; ?></td>
                        </tr>

                        <tr><th colspan="6">Remark</th></tr>

                        <tr><th colspan="6"><?php echo $this_element->remarks; ?></th></tr>
                    </table>



                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
<script>
    function printrecord() {
        var printContents = document.getElementById("printarea").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>