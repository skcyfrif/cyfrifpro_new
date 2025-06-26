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
</style>

<div class="container-fluid" >
    <div class="row-fluid">
        <div class="span12">
         <!--  <a href="<?php echo base_url(); ?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>List</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="" method="post">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->name; ?>" autocomplete="off" required/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="email" class="span10" name="email" placeholder="Email" value="<?php echo $this_element->email; ?>" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Display Name</label>
                                <div class="controls">
                                    <input type="text" class="span10" name="display_name" placeholder="Display Name" value="<?php echo $this_element->display_name; ?>" autocomplete="off" required/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">GST</label>
                                <div class="controls">
                                    <input type="text" class="span10" name="gst" placeholder="GST" value="<?php echo $this_element->gst; ?>" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group" style="display:none;">
                                <label class="control-label">Mobile</label>
                                <div class="controls">
                                    <input type="tel" class="span10" maxlength="10" name="mobile" placeholder="Mobile" value="00000000" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Company Name</label>
                                <div class="controls">
                                    <input type="text" class="span10" name="company_name" placeholder="Company Name" value="<?php echo $this_element->company_name; ?>" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Website</label>
                                <div class="controls">
                                    <input type="text" class="span10" name="website" placeholder="Website" value="<?php echo $this_element->website; ?>" autocomplete="off" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">State Code</label>
                                <div class="controls">
                                    <input type="text" class="span10" name="state_code" placeholder="State Code" value="<?php echo $this_element->state_code; ?>" autocomplete="off" required/>
                                </div>
                            </div>

                            <?php if (!$this->session->userdata('client')['id']) { ?>
                                <div class="control-group">
                                    <label class="control-label">Client</label>
                                    <div class="controls">
                                        <select class="span10" name="client_id" required>
                                            <?php foreach ($clients as $key) { ?>

                                                <option value="<?php echo $key->id; ?>"><?php echo $key->business_name; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="span12" style="margin-left:0px !important;">
                            <div class="control-group">
                                <div class="widget-title"> <span class="icon"> <i class="icon-hand-right"></i> </span>
                                    <ul class="nav nav-pills nav-fill navtop controls">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#menu3" data-toggle="tab" id="oth_tab_nav">Other</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#menu1" data-toggle="tab" id="adr_tab_nav">Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#menu2" data-toggle="tab" id="cnt_tab_nav">Contact Person</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#menu4" data-toggle="tab" id="rmk_tab_nav">Remark</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="tab-content span12 float-left">
                                    <div class="tab-pane" role="tabpanel" id="menu1">

                                        <div class="span6">

                                            <!-- ******************  BILLING DETAILS  ******************* -->

                                            <div class="control-group">
                                                <h3>Billing Address</h3>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Address</label>
                                                <div class="controls">
                                                    <textarea class="span12" id="address" name="address" placeholder="Address" required><?php echo $this_element->address; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Country</label>
                                                <div class="controls">
                                                    <select id="country1" onchange="getState(this)" data-num='1' name="country" class="span12" required>
                                                        <?php
                                                        foreach ($countries as $key) {

                                                            $isSelected = ($this_element->country_id == $key->id) ? 'selected' : '';
                                                            ?>

                                                            <option value="<?php echo $key->id; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                    <img class="loading" src="<?php echo base_url(); ?>assets/gif/loading.gif" id="loadingC1" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">State</label>
                                                <div class="controls">
                                                    <select id="state1" onchange="getCity(this)" data-num='1' name="state" class="span12" required>

                                                        <?php
                                                        if ($this_element->state_id) {

                                                            foreach ($states as $key2) {
                                                                $isSelected = ($this_element->state_id == $key2->id) ? 'selected' : '';
                                                                ?>
                                                                <option value="<?php echo $key2->id; ?>" <?php echo $isSelected; ?>><?php echo $key2->name; ?></option>
                                                            <?php }
                                                        } else {
                                                            ?>
                                                            <option value="">Select country first</option>
<?php } ?>
                                                    </select>
                                                    <img class="loading" src="<?php echo base_url(); ?>assets/gif/loading.gif" id="loadingS1" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">City</label>
                                                <div class="controls">
                                                    <select id="city1" name="city" class="span12" required>
                                                        <?php
                                                        if ($this_element->city_id) {

                                                            foreach ($cities as $k) {
                                                                $isSelected = ($this_element->city_id == $k->id) ? 'selected' : '';
                                                                ?>
                                                                <option value="<?php echo $k->id; ?>" <?php echo $isSelected; ?>><?php echo $k->name; ?></option>
                                                            <?php }
                                                        } else {
                                                            ?>
                                                            <option value="">Select state first</option>
<?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Postcode</label>
                                                <div class="controls">
                                                    <input type="text" maxlength="6" id="postcode" class="span12" name="postcode" placeholder="Postcode" value="<?php echo $this_element->postcode; ?>" autocomplete="off" required/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Fax</label>
                                                <div class="controls">
                                                    <input type="text" class="span12" id="fax" name="fax" placeholder="Fax" value="<?php echo $this_element->fax; ?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ******************  END BILLING DETAILS  ******************* -->

                                        <!-- ******************  SHIPPING DETAILS  ********************** -->

                                        <div class="span6">

                                            <div class="control-group">
                                                <h3>Shipping Address</h3> <a onclick="fillShiipingDetails()" style="color:blue;cursor:pointer" class="pull-right">Auto Fill Text Fields</a>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Address</label>
                                                <div class="controls">
                                                    <textarea class="span12" name="shipaddress" id="shipaddress" placeholder="Address" required><?php echo $this_element->shipaddress; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Country</label>
                                                <div class="controls">
                                                    <select id="country" onchange="getState(this)" data-num='2' name="shipcountry" class="span12" required>
                                                        <?php
                                                        foreach ($countries as $key) {

                                                            $isSelected = ($this_element->country_id == $key->id) ? 'selected' : '';
                                                            ?>

                                                            <option value="<?php echo $key->id; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>

<?php } ?>
                                                    </select>
                                                    <img class="loading" src="<?php echo base_url(); ?>assets/gif/loading.gif" id="loadingC2" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">State</label>
                                                <div class="controls">
                                                    <select id="state2" onchange="getCity(this)" data-num='2' name="shipstate" class="span12" required>

                                                        <?php
                                                        if ($this_element->shipstate_id) {

                                                            foreach ($states as $key2) {
                                                                $isSelected = ($this_element->shipstate_id == $key2->id) ? 'selected' : '';
                                                                ?>
                                                                <option value="<?php echo $key2->id; ?>" <?php echo $isSelected; ?>><?php echo $key2->name; ?></option>
                                                            <?php }
                                                        } else {
                                                            ?>
                                                            <option value="">Select country first</option>
<?php } ?>
                                                    </select>
                                                    <img class="loading" src="<?php echo base_url(); ?>assets/gif/loading.gif" id="loadingS2" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">City</label>
                                                <div class="controls">
                                                    <select id="city2" name="shipcity" class="span12" required>
                                                        <?php
                                                        if ($this_element->shipcity_id) {

                                                            foreach ($cities as $k) {
                                                                $isSelected = ($this_element->shipcity_id == $k->id) ? 'selected' : '';
                                                                ?>
                                                                <option value="<?php echo $k->id; ?>" <?php echo $isSelected; ?>><?php echo $k->name; ?></option>
                                                            <?php }
                                                        } else {
                                                            ?>
                                                            <option value="">Select state first</option>
<?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Postcode</label>
                                                <div class="controls">
                                                    <input type="text" maxlength="6" id="shippostcode" class="span12" name="shippostcode" placeholder="Postcode" value="<?php echo $this_element->postcode; ?>" autocomplete="off" required/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Fax</label>
                                                <div class="controls">
                                                    <input type="text" class="span12" id="shipfax" name="shipfax" placeholder="Fax" value="<?php echo $this_element->fax; ?>" autocomplete="off"/>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- ******************  END SHIPPING DETAILS  ******************* -->
                                        <div class="span12">
                                        <button type="button" class="btn btn-primary" onclick="$('#oth_tab_nav').click();">Previous</button>
                                        <button type="button" class="btn btn-info" onclick="$('#cnt_tab_nav').click();">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="menu2">

                                        <div class="span6">
                                            <div class="control-group">
                                                <label class="control-label">Name</label>
                                                <div class="controls">
                                                    <input type="text" class="span10" name="cp_name" placeholder="Name" value="<?php echo $this_element->cp_name; ?>" autocomplete="off" required/>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Email</label>
                                                <div class="controls">
                                                    <input type="email" class="span10" name="cp_email" placeholder="Email" value="<?php echo $this_element->cp_email; ?>" autocomplete="off" required/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Mobile</label>
                                                <div class="controls">
                                                    <input type="tel" class="span10" maxlength="10" name="cp_mobile" placeholder="Mobile" value="<?php echo $this_element->cp_mobile; ?>" autocomplete="off" required/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="span12">
                                        <button type="button" class="btn btn-primary" onclick="$('#adr_tab_nav').click();">Previous</button>                                        
                                        <button type="button" class="btn btn-info" onclick="$('#rmk_tab_nav').click();">Next</button>
                                        </div>                                       
                                        
                                    </div>
                                    <div class="tab-pane active" role="tabpanel" id="menu3">
                                        <div class="span6">
                                            <div class="control-group">
                                                <label class="control-label">Currency</label>
                                                <div class="controls">
                                                    <select id="currency" name="currency" class="span12" required>
<?php foreach ($currency as $cnc) { ?>
                                                            <option value="<?php echo $cnc->id; ?>" <?php echo ($cnc->id == $this_element->currency) ? "selected" : ""; ?>><?php echo $cnc->currency . '&nbsp;(' . $cnc->code . ')'; ?></option>
<?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Opening Balance</label>
                                                <div class="controls">
                                                    <input type="number" class="span12" name="opening_balance" placeholder="Opening Balance" value="<?php echo $this_element->opening_balance; ?>" autocomplete="off" required/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Exchange Rate</label>
                                                <div class="controls">
                                                    <input type="tel" class="span12" maxlength="10" name="exchange_rate" placeholder="Exchange Rate" value="<?php echo $this_element->exchange_rate; ?>" autocomplete="off" required/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Terms</label>
                                                <div class="controls">
                                                    <select id="terms" name="terms" class="span12" required>
                                                        <?php
                                                        foreach ($terms as $key) {
                                                            $isSelected = ($this_element->terms == $key->id) ? 'selected' : '';
                                                            ?>
                                                            <option value="<?php echo $key->id; ?>" <?php echo $isSelected; ?>><?php echo $key->name; ?></option>
<?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span12">
                                        <button type="button" class="btn btn-info" onclick="$('#adr_tab_nav').click();">Next</button>
                                        </div>
                                    </div>

                                    <div class="tab-pane" role="tabpanel" id="menu4">
                                        <div class="span12">
                                            <textarea name="remarks" id="remarks" style="margin: 0px 0px 10px; width: 540px; height: 69px;" ><?php echo $this_element->remarks; ?></textarea>
                                        </div>
                                        <div class="span12">
                                        <button type="button" class="btn btn-primary" onclick="$('#cnt_tab_nav').click();">Previous</button>
                                        <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
<!--                            <div class="form-actions" >
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="<?php echo base_url(); ?>admin/clients/"><button type="button" class="btn btn-sm btn-info">Back</button></a>
                                </div>-->
                        </div>


                    </form>
                </div>
            </div>
        </div>

        <div class="widget-content"> <a style="display:none;" href="#myModal" id="showAlertBtn" data-toggle="modal" class="btn btn-success">Alert</a>
            <div id="myModal" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <p>Please Complete Billing Details</p>
                </div>
            </div>
        </div>

        <script>

            function getState(val)
            {
                var countryID = $(val).val();
                var num = $(val).attr('data-num');
                var stateId = '#state' + num;
                var cityId = '#city' + num;
                var loadingId = '#loadingC' + num;
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>client/ajaxResponse/states/' + countryID,
                        data: 'country_id=' + countryID,
                        beforeSend: function () {
                            $("#loadingC").fadeIn('slow');
                        },
                        success: function (html) {
                            // /console.log(html);
                            $(stateId).html(html);
                            $(cityId).html('<option value="">Select state first</option>');
                            $(loadingId).fadeOut('slow');
                        }
                    });
                } else {
                    $(stateId).html('<option value="">Select country first</option>');
                    $(cityId).html('<option value="">Select state first</option>');
                }
            }
            function getCity(val)
            {
                var stateID = $(val).val();
                var num = $(val).attr('data-num');
                var cityId = '#city' + num;
                var loadingId = '#loadingS' + num;
                if (stateID) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>client/ajaxResponse/cities/' + stateID,
                        data: 'state_id=' + stateID,
                        beforeSend: function () {
                            $(loadingId).fadeIn('slow');
                        },
                        success: function (html) {
                            $(cityId).html(html);
                            $(loadingId).fadeOut('slow');
                        }
                    });
                } else {
                    $(cityId).html('<option value="">Select state first</option>');
                }
            }

            function fillShiipingDetails(){
                var stateId=$('#state1').val();
                var cityId=$('#city1').val();
                var countryId=$('#country1').val();

                $('#country').val(countryId);
                $('#country').trigger('change');
                setTimeout(function(){        
                    $('#state2').val(stateId);
                    $('#state2').trigger('change');
                    setTimeout(function(){        
                        $('#city2').val(cityId);
                    $('#city2').trigger('change');
                    }, 1500);
                }, 500);   


                   $('#shipaddress').val($('#address').val());
                   $('#shippostcode').val($('#postcode').val());
                   $('#shipfax').val($('#fax').val());

                if(stateId.length >= 1 && cityId.length >= 1 && countryId.length >= 1 )
                {}else
                {
                  $('#showAlertBtn').click();
                }
            }

        </script>
