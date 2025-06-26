
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Menu Details</h5>
        </div>

        
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">

            
             <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Name" value="<?php echo $this_element->name;?>" required/>
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

            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              <a href="<?php echo base_url();?>client/sub_users/"><button type="button" class="btn btn-sm btn-info">Back</button></a>
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