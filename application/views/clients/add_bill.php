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
                        <form action="" method="post">
                            <div class="span6">
                                <div class="control-group">

                                    <!-- <label class="control-label">Vendor Name</label>
                                    <div class="controls"> -->
                                     <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php// echo $this_element->vendor; ?>" required/> -->
                                        <!-- <select id="name" onchange="openUrl(this)" name="name" class="span12" required>
                                            <?php
                                            //if ($vendors) {
                                             //   foreach ($vendors as $key) {

                                                    //$isSelected = ($this_element->vendor == $key->name) ? 'selected' : '';
                                                    ?>

                                                    <option value="<?php// echo $key->name; ?>:<?php //echo $key->id; ?>" <?php// echo $isSelected; ?>><?php //echo $key->name; ?></option>

                                                                    <?php// }
                                                              //  } else {
                                                                  //  echo '<option value="" >Select vendor</option>';
                                                               // } ?>
                                            <option value="govendor" style="font-weight: bold">+ Add</option>
                                        </select>
                                    </div>
                                </div> -->



                                <label class="control-label">Vendor Name</label>
                                    <div class="controls">
                                     <input type="text" class="span12" name="name" placeholder="Vender Name" value="<?php echo $this_element->vendor; ?>" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                <div class="controls">
                                <label class="control-label" for="vendor_email">Vendor Email:</label>
                                    <input type="email" class="span12" name="vendor_email" id="vendor_email" class="form-control" placeholder="Enter vendor email" value="<?php echo $this_element->vendor_email ;?>" required/>
                                </div>
                                </div>

                                <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="vendor_phone">Vendor Phone:</label>
                                    <input type="tel" class="span12" name="vendor_phone" maxlength="10" id="vendor_phone" class="form-control" placeholder="Enter vendor phone" value="<?php echo $this_element->vendor_phone; ?>" required>
                                </div>
                                </div>

                                <!-- <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="vendor_adds">Vendor Address:</label>
                                    <textarea name="vendor_adds" class="span10" id="vendor_adds" class="form-control" placeholder="Enter vendor address" rows="3" required><?php echo $this_element->vendor_adds;?></textarea>
                                </div>
                                </div> -->

                                <div class="control-group">
                                    <label class="control-label">Bill</label>
                                    <div class="controls">
                                        <input type="text" class="span12" name="bill" placeholder="Bill" value="<?php echo $this_element->bill; ?>" autocomplete="off" required/>
                                    </div>
                                </div>

                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Due Date</label>
                                    <div class="controls">
                                        <input type="date" class="span12" name="date" value="<?php echo $this_element->date; ?>" required/>
                                    </div>
                                </div>
    
                                <div class="control-group">
                                    <label class="control-label">Terms</label>
                                    <div class="controls mb-3">
                                      <!-- <input type="text" class="span10" name="terms" placeholder="Terms" value="<?php echo $this_element->terms; ?>" required/> -->
                                        <select id="terms" onchange="openUrl(this)" name="term" class="span12" required>
                                            <?php
                                            if ($terms) {
                                                foreach ($terms as $key) {

                                                    $isSelected = ($this_element->term == $key->name) ? 'selected' : '';
                                                    ?>

                                        <option value="<?php echo $key->name; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>

                                                <?php }
                                            } else {
                                                echo '<option value="" >Select Term</option>';
                                            } ?>
                                            <option value="goTerm" style="font-weight: bold">+ Add</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="vendor_adds">Vendor Address:</label>
                                    <textarea name="vendor_adds" class="span12" id="vendor_adds" class="form-control" placeholder="Enter vendor address" rows="3" required><?php echo $this_element->vendor_adds;?></textarea>
                                </div>
                                </div>
                            </div>
                            

                            <!-- *************  TABLE SECTION  ***************** -->

<?php $this->load->view('clients/dynamic_productbill'); ?>

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

                    if (goUrl == 'govendor')
                    {
                        var gUrl = '<?php echo base_url() . 'client/add_vendor?redirect=' . $_URL_add_bill; ?>';
                        //window.open(goUrl, '_blank');
                        window.location = gUrl;
                    } else if (goUrl == 'goTerm')
                    {
                        var gUrl = '<?php echo base_url() . 'admin/terms?redirect=' . $_URL_add_bill; ?>';
                        //window.open(gUrl, '_blank');
                        window.location = gUrl;
                    }
                }
                function goToInventory()
                {
                    var gUrl = '<?php echo base_url() . 'inventory/add_inventory?redirect=' . $_URL_add_bill; ?>';
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



            </script>

