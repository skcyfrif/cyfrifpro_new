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
<?php
//echo "<pre>"; print_r($this_element); exit; 
//$this_element=$this_element[0];
?>

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
                            <th>Type</th>
                            <td><?php echo ($this_element->type == 'business') ? 'Business' : 'Individual'; ?></td>
                            <th>Comnapny</th>
                            <td><?php echo $this_element->company; ?></td>
                        </tr>

                        <tr>
                            <th>Customer ID</th>
                            <td><?php echo "CUS0" . $this_element->id; ?></td>
                            <th>&nbsp;</th>
                            <td>&nbsp;</td>
                            <th>&nbsp;</th>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <th>Designation</th>
                            <td><?php echo $this_element->position; ?></td>
                            <th>GST</th>
                            <td><?php echo $this_element->gst; ?></td>
                            <th>Email</th>
                            <td><?php echo $this_element->email; ?></td>
                        </tr>

                        <tr>
                            <th>Mobile</th>
                            <td><?php echo $this_element->mobile; ?></td>
                            <th>Skype ID</th>
                            <td><?php echo $this_element->skype_id; ?></td>
                            <th>Website</th>
                            <td><?php echo $this_element->website; ?></td>
                        </tr>
                        <tr><th colspan="6">Other Details</th></tr>
                        <tr>
                            <th>Currency</th>
                            <td><?php foreach ($allcurn as $cnc) { ?>
                                    <?php echo ($cnc->id == $this_element->currency) ? $cnc->name . '&nbsp;(' . $cnc->ccode . ')' : ""; ?>
<?php } ?>
                            </td>
                            <th>Opening Balance</th>
                            <td><?php echo $this_element->opening_balance; ?></td>
                            <th>Payment Terms</th>
                            <td><?php foreach ($trems as $trm) { ?>
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
<?php
if (count($customer_contact) > 0) {
    $x = 1;
    foreach ($customer_contact as $cscn) {
        ?>    
                                <tr class="contactloop" id="contactloop<?php echo $x; ?>">
                                    <td><?php echo $cscn->name; ?></td>
                                    <td><?php echo $cscn->email; ?></td>
                                    <td><?php echo $cscn->ph; ?></td>
                                </tr>
    <?php }
} ?>
                        <tr><th colspan="6">Remark</th></tr>

                        <tr><th colspan="6"><?php echo $this_element->remark; ?></th></tr>
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