
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Menu Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
            <!-- <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Name" value="<?php //echo $this_element->name;?>" required/>
              </div>
            </div> -->
             <div class="control-group">
              <label class="control-label">Business Name</label>
              <div class="controls">
                <input type="text" class="span11" name="business_name" placeholder="Business Name" value="<?php echo $this_element->business_name;?>" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="email" class="span11" name="email" placeholder="Email" value="<?php echo $this_element->email;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile</label>
              <div class="controls">
                <input type="number" class="span11" maxlength="10" name="mobile" placeholder="Mobile" value="<?php echo $this_element->mobile;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input type="password" class="span11" id="password" name="password" onkeyup="validatePassword(this)" placeholder="Password" minlength="8" value="<?php echo $this_element->decrypted_password;?>" required/>
                <p id="error" style="display:none;margin:0px !important;color:red;"></p>
              </div>

            </div>

            <div class="control-group">
              <label class="control-label">Confirm Password</label>
              <div class="controls">
                <input type="password" class="span11" id="cpassword" onkeyup="validateCofirmPassword(this)" placeholder="Confirm Password" minlength="8" value="<?php echo $this_element->decrypted_password;?>" required/>
                <p id="errorc" style="display:none;margin:0px !important;color:red;"></p>
              </div>
            </div>
           
            <?php if($this->Admin_M->isLoggedIn() == TRUE){ ?>
            <div class="control-group">
              <label class="control-label">Employee</label>
              <div class="controls">
                <select class="span11" name="employee_id" required>
                <?php foreach($employees as $key){ 

                    $isSelected=($key->id == $this_element->employee_id) ? 'selected' : '';
                ?>
                  <option value="<?php echo $key->id;?>" <?php echo $isSelected;?> ><?php echo $key->name;?></option>
                <?php } ?>
                </select>
              </div>
            </div>
            <?php } else {  ?>

              <div class="control-group">
              <label class="control-label">Employee</label>
                <div class="controls">
                <input type="text" class="span11" placeholder="Employee" value="<?php echo $this->session->userdata('employee')['name'];?>" disabled />
                  <input type="hidden" class="span11" name="employee_id" placeholder="Mobile" value="<?php echo $this->session->userdata('employee')['id'];?>" required/>
                </div>
              </div>

            <?php } ?>
            <div class="control-group">
              <label class="control-label">Contract Number</label>
              <div class="controls">
                <input type="text" class="span11" name="contract_number" placeholder="Name" value="<?php echo $this_element->contract_number;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Category</label>
              <div class="controls">
                <select class="span11" name="category" required>
                  <option value="individual">Individual</option>
                  <option value="business">Business</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Type</label>
              <div class="controls">
                <input type="text" class="span11" name="type" placeholder="Type" value="<?php echo $this_element->type;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Match</label>
              <div class="controls">
                <select class="span11" name="match" required>
                  <option value="pre">Pre-Match</option>
                  <option value="post">Post-Match</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Data Source</label>
              <div class="controls">
                <input type="text" class="span11" name="data_source" placeholder="Data Source" value="<?php echo $this_element->data_source;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Contract Status As On</label>
              <div class="controls">
                <input type="text" class="span11" name="contract_status" placeholder="Contract Status As On" value="<?php echo $this_element->contract_status;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Contact Type</label>
              <div class="controls">
                <input type="text" class="span11" name="contact_type" placeholder="Contact Type" value="<?php echo $this_element->contact_type;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Paid Amount</label>
              <div class="controls">
                <input type="text" class="span11" name="paid_amount" placeholder="Paid Amount" value="<?php echo $this_element->paid_amount;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Contract Amount</label>
              <div class="controls">
                <input type="text" class="span11" name="contract_amount" placeholder="Contract Amount" value="<?php echo $this_element->contract_amount;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Contact Person Name</label>
              <div class="controls">
                <input type="text" class="span11" name="contact_person_name" placeholder="Contact Person Name" value="<?php echo $this_element->contact_person_name;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Contact Person Mobile</label>
              <div class="controls">
                <input type="text" class="span11" name="contact_person_mobile" placeholder="Contact Person Mobile" value="<?php echo $this_element->contact_person_mobile;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Contact Person Email</label>
              <div class="controls">
                <input type="text" class="span11" name="contact_person_email" placeholder="Contact Person Email" value="<?php echo $this_element->contact_person_email;?>" required/>
              </div>
            </div>

            <!-- <div class="control-group">
              <label class="control-label">Zone</label>
              <div class="controls">
                <select class="span11" name="zone" required>
                <?php foreach($zones as $key){ 

                    $isSelected=($key->id == $this_element->zone_id) ? 'selected' : '';
                ?>
                  <option value="<?php echo $key->id;?>" <?php echo $isSelected;?> ><?php echo $key->title;?></option>
                <?php } ?>
                </select>
              </div>
            </div> 

            <div class="control-group">
              <label class="control-label">Region Name</label>
              <div class="controls">
                <input type="text" class="span11" name="region_name" placeholder="Region Name" value="<?php echo $this_element->region_name;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Branch Name</label>
              <div class="controls">
                <input type="text" class="span11" name="branch_name" placeholder="Branch Name" value="<?php echo $this_element->branch_name;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Branch Dm</label>
              <div class="controls">
                <input type="text" class="span11" name="branch_dm" placeholder="Branch Dm" value="<?php echo $this_element->branch_dm;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Zonal Business Director</label>
              <div class="controls">
                <input type="text" class="span11" name="zonal_business_director" placeholder="Zonal Business Director" value="<?php echo $this_element->zonal_business_director;?>" required/>
              </div>
            </div>-->

            <div class="control-group">
              <label class="control-label">Payment Status</label>
              <div class="controls">
                <input type="text" class="span11" name="payment_status" placeholder="Payment Status" value="<?php echo $this_element->payment_status;?>" required/>
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">State Code</label>
              <div class="controls">
                <input type="text" class="span11" name="state_code" placeholder="State Code" value="<?php echo $this_element->state_code;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">GST Number</label>
              <div class="controls">
                <input type="text" class="span11" name="gst_number" placeholder="GST Number" value="<?php echo $this_element->gst_number;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nature Of Work</label>
              <div class="controls">
                <input type="text" class="span11" name="nature_of_work" placeholder="Nature Of Work" value="<?php echo $this_element->nature_of_work;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Total Man Power</label>
              <div class="controls">
                <input type="text" class="span11" name="man_power" placeholder="Man Power" value="<?php echo $this_element->man_power;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Relationship Officer Name</label>
              <div class="controls">
                <input type="text" class="span11" name="relationship_officer_name" placeholder="Relationship Officer Name" value="<?php echo $this_element->relationship_officer_name;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contract Period</label>
              <div class="controls">
                <input type="text" class="span11" name="contract_period" placeholder="Contract Period" value="<?php echo $this_element->contract_period;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Service Availed</label>
              <div class="controls">
                <input type="text" class="span11" name="service_availed" placeholder="Service Availed" value="<?php echo $this_element->service_availed;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Owner Name</label>
              <div class="controls">
                <input type="text" class="span11" name="owner_name" placeholder="Owner Name" value="<?php echo $this_element->owner_name;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Owner Contact Number</label>
              <div class="controls">
                <input type="number" class="span11" maxlength="10" name="owner_mobile" placeholder="Owner Contact Number" value="<?php echo $this_element->owner_mobile;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">CRM ID</label>
              <div class="controls">
                <input type="text" class="span11" name="crm_id" placeholder="CRM ID" value="<?php echo $this_element->crm_id;?>" required />
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">
                <textarea type="text" class="span11" name="address" placeholder="Address" required><?php echo $this_element->address;?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Pincode</label>
              <div class="controls">
                <input type="text" class="span11" name="pincode" placeholder="Pincode" value="<?php echo $this_element->pincode;?>" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Acount Type</label>
              <div class="controls">
                <select name="actype" placeholder="actype" required> 
                <option value="">Select...</option>
                  <option value="1" <?php if($this_element->actype==1){ echo "selected";} ?>>Client</option>
                  <option value="2" <?php if($this_element->actype==2){ echo "selected";} ?>>Inventory</option>
                  <option value="3" <?php if($this_element->actype==3){ echo "selected";} ?>>Both</option>
                </select>
              </div>
            </div>
           
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              <a href="<?php echo base_url();?>admin/clients/"><button type="button" class="btn btn-sm btn-info">Back</button></a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
function validatePassword(val) {
    var p = $(val).val();
        errors = [];
    if (p.length < 8) {
        errors.push("Your password must be at least 8 characters");
    }
    if (p.search(/[a-z]/i) < 0) {
        errors.push("Your password must contain at least one letter."); 
    }
    if (p.search(/[0-9]/) < 0) {
        errors.push("Your password must contain at least one digit.");
    }
    if (p.search(/[!@#$%^&*()_+]/) < 0) {
        errors.push("Your password must contain at least one special character.");
    }
    if (errors.length > 0) {
        //alert(errors.join("\n"));
        $('#submitBtn').prop('disabled',true);
        $('#error').html(errors.join("<br>"));
        $('#error').show();
        return false;
    }
    $('#submitBtn').prop('disabled',false);
    $('#error').html('');
    $('#error').hide();
    return true;
}
function validateCofirmPassword(val){
  
  var password=$('#password').val();
  var cpassword=$(val).val();
  if(password != cpassword)
  {
    $('#submitBtn').prop('disabled',true);
    $('#errorc').html('Password not matched');
    $('#errorc').show();
    return false;
  }
    $('#errorc').html('');
    $('#errorc').hide();
    $('#submitBtn').prop('disabled',false);
    return true;
}


</script>