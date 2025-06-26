
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
       <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Company Information</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Business Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="business_name"  placeholder="Business Name" value="<?php echo $this_element->business_name;?>" autocomplete="off" required />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Business Email :</label>
              <div class="controls">
                <input type="email" class="span11" placeholder="Business Email" value="<?php echo $this_element->email;?>" autocomplete="off" required disabled />
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password" class="span11" id="password" name="password" onkeyup="validatePassword(this)" placeholder="Password" minlength="8" value="<?php echo $this_element->decrypted_password;?>" required/>
                <p id="error" style="display:none;margin:0px !important;color:red;"></p>
              </div>

            </div>

            <div class="control-group">
              <label class="control-label">Confirm Password :</label>
              <div class="controls">
                <input type="password" class="span11" id="cpassword" onkeyup="validateCofirmPassword(this)" placeholder="Confirm Password" minlength="8" value="<?php echo $this_element->decrypted_password;?>" required/>
                <p id="errorc" style="display:none;margin:0px !important;color:red;"></p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Business Mobile :</label>
              <div class="controls">
                <input type="tel" maxlength="10"  class="span11" placeholder="Business Mobile" value="<?php echo $this_element->mobile;?>" required disabled />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Logo</label>
              <div class="controls">
              <?php 
                      	$rawSRC=$this_element->imagePath;
                        if (file_exists($rawSRC) == 1) 
                        {
                            $imgHere=true;
                            $required='';
                        }
                        else
                        {
                        	$required='required';
                        }
              ?>
                <input type="file" name="image" onchange="doThisImage(this)" data-id="1" /><br />
                <img id="image1" src="<?php echo base_url().$rawSRC;?>" alt="Logo" style="height:100px;width:200px;display:<?php echo ($imgHere) ? 'block' : 'none';?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Website :</label>
              <div class="controls">
                <input type="text" class="span11" name="website"  placeholder="https://www.mywebsite.com" value="<?php echo $this_element->website;?>" autocomplete="off" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Owner Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="owner_name"  placeholder="Owner Name" value="<?php echo $this_element->owner_name;?>" autocomplete="off" required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Owner Mobile :</label>
              <div class="controls">
                <input type="tel" maxlength="10" class="span11" name="owner_mobile"  placeholder="Owner Mobile" value="<?php echo $this_element->owner_mobile;?>" autocomplete="off" required />
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">State Code</label>
              <div class="controls">
                <input type="text" class="span11" name="state_code" placeholder="State Code" value="<?php echo $this_element->state_code;?>" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">GST Number :</label>
              <div class="controls">
                <input type="text" class="span11" name="gst_number"  placeholder="GST Number" value="<?php echo $this_element->gst_number;?>" autocomplete="off" required  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Pincode :</label>
              <div class="controls">
                <input type="tel" class="span11" maxlingth="6" name="pincode"  placeholder="Pincode" value="<?php echo $this_element->pincode;?>" autocomplete="off" required  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">
                <textarea class="span11" name="address" required><?php echo $this_element->address;?></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">A/C Holder Name</label>
              <div class="controls">
                <input type="text" class="span6" name="ac_holder" placeholder="A/C Holder Name" value="<?php echo $this_element->ac_holder; ?>" autocomplete="off" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Bank Name</label>
              <div class="controls">
                <input type="text" class="span6" name="bank" placeholder="Bank Name" value="<?php echo $this_element->bank; ?>" autocomplete="off" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">A/C Number</label>
              <div class="controls">
                <input type="text" class="span6" name="acno" placeholder="A/C Number"  value="<?php echo $this_element->acno; ?>" autocomplete="off" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">IFC Code</label>
              <div class="controls">
                <input type="text" class="span6" name="ifccode" placeholder="IFC Code"  value="<?php echo $this_element->ifccode; ?>" autocomplete="off" required/>
              </div>
            </div>


            
            <div class="form-actions">
              <button type="submit" id="submitBtn" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
<script>

function readURL(input,displayId) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    var fetchId='#image'+displayId;
    reader.onload = function(e) {
    $(fetchId).show();
      $(fetchId).attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
function doThisImage(val)
{
    var displayId=$(val).attr('data-id');
    //alert(displayId);
    $(displayId).show();
    readURL(val,displayId);
   
}

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