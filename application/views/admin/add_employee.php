<style>
.opc input[type=checkbox] {
    opacity: 1 !important;
    margin-top: -2px !important;
}
</style>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Menu Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
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
              <label class="control-label">Designation</label>
              <div class="controls">
                <input type="text" class="span11" name="designation" placeholder="Designation Name" value="<?php echo $this_element->designation;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Designation Level</label>
              <div class="controls">
                <select class="span11" name="designation_level" required>
                <?php foreach($designation_levels as $key){ 

                    $isSelected=($key->id == $this_element->designation_level) ? 'selected' : '';
                ?>
                  <option value="<?php echo $key->id;?>" <?php echo $isSelected;?> ><?php echo $key->level;?></option>
                <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Report Level</label>
              <div class="controls">
                <select class="span11" name="reporting_designation_level" onchange="getEmployeesByLevels(this)" id="rLevel" required>
                <?php foreach($designation_levels as $key){ 

                    $isSelected=($key->id == $this_element->reporting_designation_level) ? 'selected' : '';
                ?>
                  <option value="<?php echo $key->id;?>" <?php echo $isSelected;?> ><?php echo $key->level;?></option>
                <?php } ?>
                </select><br>
                <img class="loading" src="<?php echo base_url();?>assets/gif/loading.gif" style="display:none;height:30px;width:30px;margin-left: -90%;margin-top: 1%;" id="loading" />
            
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Report Employee</label>
              <div class="controls">
                <select class="span11" name="reportingToEmployeeId" id="reportingToEmployee">
                    <?php if($this_element->reportingToEmployeeId){ 

                        $emp=$this->Common_M->getSIngleRow('tbl_employees','id',$this_element->reportingToEmployeeId);
                    ?>

                        <option value="<?php echo $emp->id;?>"><?php echo $emp->name;?></option>

                    <?php } ?>
                </select>
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

            <div class="control-group">
              <label class="control-label">Mobile</label>
              <div class="controls">
                <input type="tel" class="span11" maxlength="10" name="mobile" placeholder="Mobile" value="<?php echo $this_element->mobile;?>" required/>
              </div>
            </div>

            <div class="control-group">
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
            </div>


            <h4 style="margin-left:7px;">Verifications</h4>
            <hr>

            <div class="control-group">
              <label class="control-label">Address Verified</label>
              <div class="controls opc">
                <input type="checkbox" onchange="showImage(this)" class="span11" name="addressVerified" value="0" <?php echo ($this_element->addressVerified == 1) ? 'checked' : ''; ?> />
                <?php if($this_element->imagePath){ ?>
                <a target="_blank" href="<?php echo base_url().$this_element->imagePath; ?>">View Image</a>
                <?php } ?>
              </div>
            </div>

            <div class="control-group" id="imageBox" style="display:none;">
              <label class="control-label">Enter Picture Of The Site Visit</label>
              <div class="controls">
                <input type="file" class="span11" id="image" name="siteImage" value="1" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Document Verified</label>
              <div class="controls opc">
                <input type="checkbox" class="span11" name="documentVerified" onchange="checkVerify(this)" value="1" <?php echo ($this_element->documentVerified == 1) ? 'checked' : ''; ?> />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Verifier Name</label>
              <div class="controls opc">
                <input type="text" class="span11" name="verifier_name" value="<?php echo $this_element->verifier_name;?>" placeholder="Verifier Name" id="verifier_name" />
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success" id="submitBtn">Save</button>
              <a href="<?php echo base_url();?>admin/employees/<?php echo $emp_id;?>"><button type="button" class="btn btn-sm btn-info">Back</button></a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  
  var level=$('#rLevel').val();
  getEmployeesByLevels(l);

  function showImage(val)
  {

      var ischecked= $(val).is(':checked');
      if(ischecked)
      {
        $(val).val(1);
        $('#imageBox').fadeIn(100);
        $('#image').prop('required',true);
        $('#verifier_name').prop('required',true);
        
      }
      else
      {
        $(val).val(0);
        $('#imageBox').fadeOut(100);
        $('#image').prop('required',false);
        $('#verifier_name').prop('required',false);
        
      }
  }

  function checkVerify(val)
  {
    var ischecked= $(val).is(':checked');
      if(ischecked)
      {
        $(val).val(1);
        $('#verifier_name').prop('required',true);
        
      }
      else
      {
        $(val).val(0);
        $('#verifier_name').prop('required',false);
        
      }
  }
//validatePassword();

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
function getEmployeesByLevels(val)
{
    var levelID = $(val).val();
    //var loadingId='#loading'+num;
    if(levelID == 10)
    {
      $('#reportingToEmployee').prop('required',false);
    }
    else
    {
      $('#reportingToEmployee').prop('required',true);
    }
    if(levelID > 0)
    {
        $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>admin/getEmployeesByLevels/'+levelID,
            data:'level_id='+levelID,
            beforeSend: function() {
              $("#loading").fadeIn();
            },
            success:function(html){
                //console.log(html);
                if(html)
                {
                  $('#reportingToEmployee').html(html);
                  $('#loading').fadeOut('slow');
                }
                
            }
        }); 
    }
}

</script>