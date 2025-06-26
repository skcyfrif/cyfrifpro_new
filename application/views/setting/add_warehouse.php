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
       <!--  <a href="<?php echo base_url();?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">
    		<form action="" method="post">
            	<input type="hidden" name="id" value="" />
                <div class="span6">
                    <div class="control-group">
                      <label class="control-label">Name</label>
                      <div class="controls">
                        <input type="text" class="span10" name="wr_name" placeholder="Name" value="<?php echo $this_element->wr_name;?>" required/>
                      </div>
                    </div>
        
                    <div class="control-group">
                      <label class="control-label">Email</label>
                      <div class="controls">
                        <input type="email" class="span10" name="wr_email" placeholder="Email" value="<?php echo $this_element->wr_email;?>" required/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Phone</label>
                      <div class="controls">
                        <input type="text" class="span10" name="wr_ph" placeholder="Display Name" value="<?php echo $this_element->wr_ph;?>" required/>
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label">Address 1</label>
                      <div class="controls">
                        <input type="text" class="span10" name="wr_addr" placeholder="Enter here" value="<?php echo $this_element->wr_addr;?>" required/>
                      </div>
                    </div>
                    
                    
                </div>
                <div class="span6">    
                <div class="control-group">
                      <label class="control-label">Address 2</label>
                      <div class="controls">
                        <input type="text" class="span10" name="wr_addr2" placeholder="Enter here" value="<?php echo $this_element->wr_addr2;?>" required/>
                      </div>
                    </div>        
                    <div class="control-group">
                                    <label class="control-label">Country</label>
                                    <div class="controls">
                                      <select id="country" onchange="getState(this)" data-num='2' name="wr_country" class="span12" required>
                                          <option value="" selected disabled>---</option>
        
                                          <?php foreach($countries as $key){ 
        
                                                $isSelected=($this_element->wr_country == $key->id) ? 'selected' : '';
                                            ?>
        
                                              <option value="<?php echo $key->id;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>
        
                                          <?php } ?>
                                          </select>
                                          <img class="loading" src="<?php echo base_url();?>assets/gif/loading.gif" id="loadingC2" />
                                    </div>
                                  </div>
                    <div class="control-group">
                                    <label class="control-label">State</label>
                                    <div class="controls">
                                      <select id="state2" onchange="getCity(this)" data-num='2' name="wr_state" class="span12" required>
        
                                        <?php if($this_element->wr_state){ 
                                            
                                            foreach($states as $key2){ 
                                            $isSelected=($this_element->wr_state == $key2->id) ? 'selected' : '';
                                        ?>
                                          <option value="<?php echo $key2->id;?>" <?php echo $isSelected; ?>><?php echo $key2->name;?></option>
                                        <?php } } else { ?>
                                        <option value="">Select country first</option>
                                        <?php } ?>
                                      </select>
                                      <img class="loading" src="<?php echo base_url();?>assets/gif/loading.gif" id="loadingS2" />
                                    </div>
                                  </div>
                    <div class="control-group">
                                    <label class="control-label">City</label>
                                    <div class="controls">
                                      <select id="city2" name="wr_city" class="span12" required>
                                         <?php if($this_element->wr_city){ 
                                            
                                            foreach($cities as $k){
                                            $isSelected=($this_element->wr_city == $k->id) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $k->id;?>" <?php echo $isSelected; ?>><?php echo $k->name;?></option>
                                        <?php } } else { ?>
                                              <option value="">Select state first</option>
                                        <?php } ?>
                                        
                                          </select>
                                    </div>
                                  </div>
                    <div class="control-group">
                                    <label class="control-label">Postcode</label>
                                    <div class="controls">
                                      <input type="text" maxlength="6" id="wr_zip" class="span12" name="wr_zip" placeholder="Postcode" value="<?php echo $this_element->wr_zip;?>" required/>
                                    </div>
                                  </div>                  
                </div>    
                <div style="clear:both;"></div>    
          		<div class="form-actions" >
                      <button type="submit" class="btn btn-success">Save</button>
                      <a href="<?php echo base_url();?>warehouse"><button type="button" class="btn btn-sm btn-info">Back</button></a>
                    </div>

        	</form>

    </div>
  </div>
</div>

          <div class="widget-content"> <a style="display:none;" href="#myModal" id="showAlertBtn" data-toggle="modal" class="btn btn-success">Alert</a>
            <div id="myModal" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">�</button>
                <p>Please Complete Billing Details</p>
              </div>
            </div>
          </div>

<script>

function getState(val)
{
    var countryID = $(val).val();
    var num=$(val).attr('data-num');
    var stateId='#state'+num;
    var cityId='#city'+num;
    var loadingId='#loadingC'+num;
    if(countryID){
        $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>client/ajaxResponse/states/'+countryID,
            data:'country_id='+countryID,
            beforeSend: function() {
              $("#loadingC").fadeIn('slow');
            },
            success:function(html){
                // /console.log(html);
                $(stateId).html(html);
                $(cityId).html('<option value="">Select state first</option>'); 
                $(loadingId).fadeOut('slow');
            }
        }); 
    }else{
        $(stateId).html('<option value="">Select country first</option>');
        $(cityId).html('<option value="">Select state first</option>'); 
    }
}
function getCity(val)
{
    var stateID = $(val).val();
    var num=$(val).attr('data-num');
    var cityId='#city'+num;
    var loadingId='#loadingS'+num;
    if(stateID){
        $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>client/ajaxResponse/cities/'+stateID,
            data:'state_id='+stateID,
            beforeSend: function() {
              $(loadingId).fadeIn('slow');
            },
            success:function(html){
                $(cityId).html(html);
                $(loadingId).fadeOut('slow');
            }
        }); 
    }else{
        $(cityId).html('<option value="">Select state first</option>'); 
    }
}

function fillShiipingDetails()
{
    var stateId=$('#state1 :selected').val();
    var cityId=$('#city1 :selected').val();
    var countryId=$('#country1 :selected').val();

    var stateText=$('#state1 :selected').text();
    var cityText=$('#city1 :selected').text();
    var countryText=$('#country1 :selected').text();

    var stateHTML='<option value="'+stateId+'" selected>'+stateText+'</option>';
    var cityHTML='<option value="'+cityId+'" selected>'+cityText+'</option>';
    var countryHTML='<option value="'+countryId+'" selected>'+countryText+'</option>';
    //alert(stateHTML);alert(cityHTML);alert(countryHTML);
    if(stateId != '' && cityId != '' && countryId != '' && stateText != '' && cityText != '' && countryText)
    {
       $('#country2 :selected').text(countryText);
       $("#country2 :selected").val(countryId);
       $('#state2 :selected').text(stateText);
       $("#state2 :selected").val(stateId);
       $('#city2 :selected').text(cityText); 
       $("#city2 :selected").val(cityId);
       $('#shipaddress').val($('#address').val());
       $('#shippostcode').val($('#postcode').val());
       $('#shipfax').val($('#fax').val());
    }
    else
    {
      $('#showAlertBtn').click();
    }
}

</script>
