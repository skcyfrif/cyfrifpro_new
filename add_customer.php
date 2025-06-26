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
<?php //echo "<pre>"; print_r($allcurn); exit; ?>
<div class="container-fluid" >
    <div class="row-fluid">
      <div class="span12">
       <!--  <a href="<?php echo base_url();?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>New Customer</h5>
          </div>
          <div class="widget-content nopadding">
    <form action="" method="post">
        <div class="span6">
        
        	<div class="control-group span12">
              <div class="span2">
              	<label class="control-label">Type</label>
              </div>
              <div class="span10">
              <div class="controls span12 opc">
              	<div class="span6">
                <input type="radio" style="opacity:1 !important;margin-top: -9px;" class="span11" name="type" value="business" <?php echo ($this_element->type == 'business') ? 'checked' : '';?> /> Business
                </div>
                <div class="span6">
                <input type="radio" style="opacity:1 !important;" class="span11" name="type" value="individual" <?php echo ($this_element->type == 'Individual') ? 'checked' : '';?> /> Individual
                </div>
              </div>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->name;?>" autocomplete="off" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Company Name</label>
              <div class="controls">
                <input type="text" class="span10" name="company" placeholder="company" value="<?php echo $this_element->company;?>" autocomplete="off" required/>
              </div>
            </div>  
            
            <div class="control-group">
              <label class="control-label">Designation</label>
              <div class="controls">
                <input type="text" class="span10" name="position" placeholder="Designation" value="<?php echo $this_element->position;?>" autocomplete="off" required/>
              </div>
            </div> 
             
            <div class="control-group">
              <label class="control-label">GST</label>
              <div class="controls">
                <input type="text" class="span10" name="gst" placeholder="GST" value="<?php echo $this_element->gst;?>" autocomplete="off"/>
              </div>
            </div>        
            
            <?php if(!$this->session->userdata('client')['id']){ ?>
            <div class="control-group">
              <label class="control-label">Client</label>
              <div class="controls">
                <select class="span10" name="client_id" required>
                <?php foreach($clients as $key){ ?>

                    <option value="<?php echo $key->id; ?>"><?php echo $key->business_name; ?></option>

                <?php } ?>
                </select>
              </div>
            </div>
            <?php } ?>
            
        </div>   
        <div class="span6">
        	<div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="email" class="span10" name="email" placeholder="Email" value="<?php echo $this_element->email;?>" autocomplete="off" required/>
              </div>
            </div>
            
			<div class="control-group">
              <label class="control-label">Mobile</label>
              <div class="controls">
                <input type="tel" class="span10" maxlength="10" name="mobile" placeholder="Mobile" value="<?php echo $this_element->mobile;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Skype ID</label>
              <div class="controls">
                <input type="text" class="span10" name="skype_id" placeholder="Skype ID" value="<?php echo $this_element->skype_id; ?>" autocomplete="off"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Website</label>
              <div class="controls">
                <input type="text" class="span10" name="website" placeholder="Website" value="<?php echo $this_element->website;?>" autocomplete="off"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">State Code</label>
              <div class="controls">
                <input type="text" class="span10" name="state_code" placeholder="state code" value="<?php echo $this_element->state_code;?>" autocomplete="off" required/>
              </div>
            </div>  
        </div>     

        <div class="span12">
            <div class="control-group">
              <label class="control-label">Pay INFO</label>
              <div class="controls">
                <textarea class="span10" name="pay_info" id="pay_info"><?php echo $this_element->pay_info;?></textarea>
              </div>
            </div> 
        </div>

        <div class="span12" style="margin-left:0px !important;"><div class="control-group">
            <div class="widget-title"> 
            <span class="icon"> <i class="icon-hand-right"></i> </span>
                <ul class="nav nav-pills nav-fill navtop controls">
                	 <li class="nav-item active"><a class="nav-link active" id="addMenu" href="#other_det" data-toggle="tab">Other Details</a></li>
                      <li class="nav-item"><a class="nav-link"  href="#menu1" data-toggle="tab" id="adr_tab_nav">Address</a></li>
                      <li class="nav-item"><a class="nav-link" href="#menu2" data-toggle="tab"  id="cnt_tab_nav">Contact Person</a></li>
                      <li class="nav-item"><a class="nav-link" href="#Remarks" data-toggle="tab" id="rmk_tab_nav">Remarks</a></li>
                      
                  </ul>
              </div>
                 
                <div class="tab-content span12 float-left">
                	<div class="tab-pane active" role="tabpanel" id="other_det">
                    	<div class="control-group">
                          <label class="control-label">Currency</label>
                          <div class="controls opc">
                           		<select name="currency" id="currency" onchange="addcurrency(this.value);">
                                	<option value="">Select....</option>
                                    <?php foreach($allcurn as $cnc){ ?>
                                    	<option value="<?php echo $cnc->id; ?>" <?php echo ($cnc->id==$this_element->currency)?"selected":""; ?>><?php echo $cnc->name.'&nbsp;('.$cnc->ccode.')'; ?></option>
                                    <?php } ?>
                                    <option value="add_cur">+Add</option>
                                </select>
                          </div>
            			</div>
            
            			<div class="control-group">
                          <label class="control-label">Opening Balance</label>
                          <div class="controls opc">
                            <input type="text" class="span11" name="o_balnce" id="o_balnce" value="<?php echo $this_element->opening_balance; ?>" autocomplete="off" />
                          </div>
                        </div>
            
                    	<div class="control-group">
                          <label class="control-label">Payment Terms</label>
                          <div class="controls opc">
                           		<select name="pterms" id="pterms">
                                	<option value="">Select....</option>
                                    <?php foreach($trems as $trm){ ?>
                                    	<option value="<?php echo $trm->id; ?>"  <?php echo ($trm->id==$this_element->terms)?"selected":""; ?>><?php echo $trm->name; ?></option>
                                    <?php } ?>
                                    
                                </select>
                          </div>
                        </div>
            
                    	<div class="control-group">
                          <label class="control-label">Facebook</label>
                          <div class="controls opc">
                            <input type="text" class="span11" name="facebook" id="facebook" value="<?php echo $this_element->facebook;?>" autocomplete="off" />
                          </div>
                        </div>
            
            			<div class="control-group">
                          <label class="control-label">Twitter</label>
                          <div class="controls opc">
                             <input type="text" class="span11" name="twitter" id="twitter" value="<?php echo $this_element->twitter;?>" autocomplete="off" />
                          </div>
                        </div>    
                        <div class="span12">
                                        <button type="button" class="btn btn-info" onclick="$('#adr_tab_nav').click();">Next</button>
                                        </div>
                    </div>                
                    <div class="tab-pane" role="tabpanel" id="menu1">
                      <div class="span6">

                      <!-- ******************  BILLING DETAILS  ******************* -->
                          
                          <div class="control-group">
                              <h3>Billing Address</h3>
                          </div>
                          <div class="control-group">
                              <label class="control-label">Address</label>
                              <div class="controls">
                                <textarea class="span12" id="address" name="address" placeholder="Address" required><?php echo $this_element->address;?></textarea>
                              </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Country</label>
                            <div class="controls">
                              <select id="country1" onchange="getState(this)" data-num='1' name="country" class="span12" required>
                                  <?php foreach($countries as $key){ 

                                        $isSelected=($this_element->country_id == $key->id) ? 'selected' : '';
                                    ?>

                                      <option value="<?php echo $key->id;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                                  <?php } ?>
                                  </select>
                                  <img class="loading" src="<?php echo base_url();?>assets/gif/loading.gif" id="loadingC1" />
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">State</label>
                            <div class="controls">
                              <select id="state1" onchange="getCity(this)" data-num='1' name="state" class="span12" required>

                                <?php if($this_element->state_id){ 
                                    
                                    //$state=$this->Main_M->getOneRow('states','id',$this_element->state_id);
									
									//echo "<pre>"; print_r($states); exit;
                                    //$state_id=$state->id;
                                    ///$state_name=$state->name;
									foreach($states as $key2){ 

                    if($key2->country_id==$this_element->country_id){
										 $isSelected=($this_element->state_id == $key2->id) ? 'selected' : '';
                                ?>
                                  <option value="<?php echo $key2->id;?>" <?php echo $isSelected; ?>><?php echo $key2->name;?></option>
                                <?php } } } else { ?>
                                <option value="">Select country first</option>
                                <?php } ?>
                              </select>
                              <img class="loading" src="<?php echo base_url();?>assets/gif/loading.gif" id="loadingS1" />
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">City</label>
                            <div class="controls">
                              <select id="city1" name="city" class="span12" required>
                                 <?php if($this_element->city_id){ 
                                    
                                   /* $city=$this->Main_M->getOneRow('cities','id',$this_element->city_id);
									
                                    $city_id=$city->id;
                                    $city_name=$city->name;*/
                    

                    //echo "<pre>"; print_r($cities); exit;
									foreach($cities as $k){
                    if($k->state_id==$this_element->state_id){
									$isSelected=($this_element->city_id == $k->id) ? 'selected' : '';
                                ?>
                                  <option value="<?php echo $k->id;?>" <?php echo $isSelected; ?>><?php echo $k->name;?></option>
                                <?php } } } else { ?>
                                      <option value="">Select state first</option>
                                <?php } ?>
                                  </select>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Postcode</label>
                            <div class="controls">
                              <input type="text" maxlength="6" id="postcode" class="span12" name="postcode" placeholder="Postcode" value="<?php echo $this_element->postcode;?>" autocomplete="off" required/>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Fax</label>
                            <div class="controls">
                              <input type="text" class="span12" id="fax" name="fax" placeholder="Fax" value="<?php echo $this_element->fax;?>" autocomplete="off"/>
                            </div>
                          </div>
                      </div>
                      <div class="span6">
                          
                          <div class="control-group">
                              <h3>Shipping Address</h3> <a onclick="fillShiipingDetails()" style="color:blue;cursor:pointer" class="pull-right">Auto Fill Text Fields</a>
                          </div>
                          <div class="control-group">
                              <label class="control-label">Address</label>
                              <div class="controls">
                                <textarea class="span12" name="shipaddress" id="shipaddress" placeholder="Address" required><?php echo $this_element->shipaddress;?></textarea>
                              </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Country</label>
                            <div class="controls">
                              <select id="country" onchange="getState(this)" data-num='2' name="shipcountry" class="span12" required>
                                  <?php foreach($countries as $key){ 

                                        $isSelected=($this_element->shipcountry_id == $key->id) ? 'selected' : '';
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
                              <select id="state2" onchange="getCity(this)" data-num='2' name="shipstate" class="span12" required>

                                <?php if($this_element->shipstate_id){ 
                                    
                                  /*  $state=$this->Main_M->getOneRow('states','id',$this_element->shipstate_id);
                                    $state_id=$state->id;
                                    $state_name=$state->name;*/

									foreach($states as $key2){ 
                     if($key2->country_id==$this_element->shipcountry_id){
									$isSelected=($this_element->state_id == $key2->id) ? 'selected' : '';
                                ?>
                                  <option value="<?php echo $key2->id;?>" <?php echo $isSelected; ?>><?php echo $key2->name;?></option>
                                <?php } } } else { ?>
                                <option value="">Select country first</option>
                                <?php } ?>
                              </select>
                              <img class="loading" src="<?php echo base_url();?>assets/gif/loading.gif" id="loadingS2" />
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">City</label>
                            <div class="controls">
                              <select id="city2" name="shipcity" class="span12" required>
                                 <?php if($this_element->shipcity_id){ 
                                    
                                    /*$city=$this->Main_M->getOneRow('cities','id',$this_element->shipcity_id);
                                    $city_id=$city->id;
                                    $city_name=$city->name;*/
									foreach($cities as $k){
                     if($k->state_id==$this_element->shipstate_id){
									$isSelected=($this_element->city_id == $k->id) ? 'selected' : '';
                                ?>
                                <option value="<?php echo $k->id;?>" <?php echo $isSelected; ?>><?php echo $k->name;?></option>
                                <?php } } } else { ?>
                                      <option value="">Select state first</option>
                                <?php } ?>
                                  </select>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Postcode</label>
                            <div class="controls">
                              <input type="text" maxlength="6" id="shippostcode" class="span12" name="shippostcode" placeholder="Postcode" value="<?php echo $this_element->postcode;?>" autocomplete="off" required/>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Fax</label>
                            <div class="controls">
                              <input type="text" class="span12" id="shipfax" name="shipfax" placeholder="Fax" value="<?php echo $this_element->fax;?>" autocomplete="off" required/>
                            </div>
                          </div>
                      </div>
                        
                        <div class="span12">
                                        <button type="button" class="btn btn-primary" onclick="$('#addMenu').click();">Previous</button>
                                        <button type="button" class="btn btn-info" onclick="$('#cnt_tab_nav').click();">Next</button>
                                        </div>
                        
                    </div>
                    <div class="tab-pane" role="tabpanel" id="menu2">
                    	<table id="contactptable">   
                        <?php if(count($customer_contact)>0){ 
						$x=1;
							foreach($customer_contact as $cscn){
							
						?>     
                        	<tr class="contactloop" id="contactloop<?php echo $x; ?>">
                                <td>
                                <input type="hidden" class="span10" maxlength="10" name="cp_id[]" placeholder="Mobile" value="<?php echo $cscn->id; ?>"/>
                                
                                <input type="text" class="span10" name="cp_name[]" placeholder="Name" value="<?php echo $cscn->name; ?>" required/></td>
                                <td> <input type="email" class="span10" name="cp_email[]" placeholder="Email" value="<?php echo $cscn->email; ?>" required/></td>
                                <td><input type="text" class="span10" maxlength="10" name="cp_mobile[]" placeholder="Mobile" value="<?php echo $cscn->ph; ?>" required/></td>
                                <td><a href="javascript:void(0);" onclick="addmrecon();">Add more</a> | <a href="javascript:void(0);" onclick="removedive(<?php echo $x; ?>);">Remove</a></td>
                            </tr>
                        <?php } }else{ ?>                	
                            <tr class="contactloop" id="contactloop0">
                                <td><input type="hidden" class="span10" maxlength="10" name="cp_id[]" placeholder="Mobile" value=""/><input type="text" class="span10" name="cp_name[]" placeholder="Name" value="" required/></td>
                                <td> <input type="email" class="span10" name="cp_email[]" placeholder="Email" value="" required/></td>
                                <td><input type="tel" class="span10" maxlength="10" name="cp_mobile[]" placeholder="Mobile" value="" required/></td>
                                <td><a href="javascript:void(0);" onclick="addmrecon();">Add more</a> | <a href="javascript:void(0);" onclick="removedive(0);">Remove</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    
                         <div class="span12">
                                        <button type="button" class="btn btn-primary" onclick="$('#adr_tab_nav').click();">Previous</button>                                        
                                        <button type="button" class="btn btn-info" onclick="$('#rmk_tab_nav').click();">Next</button>
                                        </div> 
                    </div>
                    <div class="tab-pane" role="tabpanel" id="Remarks">
                          <div class="control-group">
                              <label class="control-label">Remarks</label>
                              <div class="controls">
                                <textarea name="remark" id="remark" cols="100" rows="5"><?php echo $this_element->remark;?></textarea>
                              </div>
                            </div>
                        <div class="form-actions" >
                            <button type="button" class="btn btn-primary" onclick="$('#cnt_tab_nav').click();">Previous</button>
                      <button type="submit" class="btn btn-success">Save</button>
      <!--                      <a href="<?php echo base_url(); ?>admin/clients/"><button type="button" class="btn btn-sm btn-info">Back</button></a>-->
                    </div>
                    </div>
					<div class="tab-pane" role="tabpanel" id="other_det"></div>
                    <div class="tab-pane" role="tabpanel" id="other_det"></div>
                    <div class="tab-pane" role="tabpanel" id="other_det"></div>
                </div>
                

                </form>
              </div>
        </div>

    </div>
  </div>
</div>

          <!--<div class="widget-content"> <a style="display:none;" href="#myModal" id="showAlertBtn" data-toggle="modal" class="btn btn-success">Alert</a>
            <div id="myModal" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <p>Please Complete Billing Details</p>
              </div>
            </div>
          </div>-->
</div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post" class="form-horizontal" id="curform">           
			
            <div class="control-group">
              <label class="control-label">Type</label>
              <div class="controls">
                <select  name="code" onchange="setcurrency(this.value);" required>
					<?php if(count($currency)>0){ 
						foreach($currency as $cn){
					?>
                  <option value="<?php echo $cn->id; ?>" ><?php echo $cn->country.'('.$cn->code.')'; ?></option>
                 	<?php } } ?>
					
                </select>
              </div>
            </div>            
            <div class="control-group">
              <label class="control-label">Symbol</label>
              <div class="controls">
                <input type="text" name="symbol" id="symbol" placeholder="symbol" value="" autocomplete="off" required/>
              </div>
            </div> 
            
            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text" name="name" id="name"  placeholder="Name" value="" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Decimal Places</label>
              <div class="controls">
               <select class="span11" name="decimal_place" id="decimal_place" required>
               		<option value="">Select...</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
               </select>
              </div>
            </div>
            
             <input type="hidden" class="span11" name="formate"  placeholder="Name" value=""/>
            
            <hr />
            
            <div class="form-actions">
              <button type="button" class="btn btn-success" onclick="savecurrency();">Save</button>
             <button type="button" class="btn btn-sm btn-info"  data-dismiss="modal">Back</button>
            </div>
          </form>
        </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>
<script>

$('#addMenu').click();

function getState(val){
    var countryID = $(val).val();
    var num=$(val).attr('data-num');
    var stateId='#state'+num;
    var cityId='#city'+num;
    var loadingId='#loadingC'+num;
    if(countryID){
        $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>customer/ajaxResponse/states/'+countryID,
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
function getCity(val){
    var stateID = $(val).val();
    var num=$(val).attr('data-num');
    var cityId='#city'+num;
    var loadingId='#loadingS'+num;
    if(stateID){
        $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>customer/ajaxResponse/cities/'+stateID,
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

function addmrecon(){
	var len=$(".contactloop").length;
	len=parseInt(parseInt(len)+1);
	var htm='<tr class="contactloop" id="contactloop'+len+'"><td><input type="hidden" class="span10" maxlength="10" name="cp_id[]" placeholder="Mobile" value=""/><input type="text" class="span10" name="cp_name[]" placeholder="Name" value="" required/></td><td> <input type="email" class="span10" name="cp_email[]" placeholder="Email" value="" required/></td><td><input type="tel" class="span10" maxlength="10" name="cp_mobile[]" placeholder="Mobile" value="" required/></td><td><a href="javascript:void(0);" onclick="addmrecon();">Add more</a> | <a href="javascript:void(0);" onclick="removedive('+len+');">Remove</a></td></tr>';	
	$("#contactptable").append(htm);
	
}
function removedive(evt){
	var len=$(".contactloop").length;
	if(len >1){
		$("#contactloop"+evt).remove();
	}else{
		alert("You can't delete it.");
	}}

function addcurrency(evt){
	if(evt=="add_cur"){
		$("#myModal").modal('show');
	}
}	

function savecurrency(){
	$.ajax({
		url: "<?php echo base_url().'Clientstore/ajax_add_currency'; ?>",
		 type:"post",
		 dataType:'json',
		 data:$("#curform").serialize(), 
         success: function(result){ 		 			 	 	
         	$("#myModal").modal('hide'); 
			$("#currency").prepend(result);					
     }}); 
}

function setcurrency(id){
	$.ajax({
		url: "<?php echo base_url().'Clientstore/ajax_currency'; ?>",
		 type:"post",
		 dataType:'json',
		 data:{id:id}, 
         success: function(result){ 		 			 	 	
         	$("#symbol").val(result.symbol); 
			$("#name").val(result.currency);					
     }}); 
}
</script>
