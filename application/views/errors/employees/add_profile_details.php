<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
	
h4{
	margin-left:10px;
}

.table-sortable tbody tr {
    cursor: move;
}
.mandatory{
  color:red;
}

</style>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Profile</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

          <h4>Personal Details</h4>

            <div class="control-group">
              <label class="control-label">Name<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Name" value="<?php echo $this_element->name;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Email<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="email" class="span11" name="email" placeholder="Email" value="<?php echo $this_element->email;?>" readonly />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="tel" class="span11" maxlength="10" name="mobile" placeholder="Mobile" value="<?php echo $this_element->mobile;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Emergency Mobile<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="tel" class="span11" maxlength="10" name="emg_mobile" placeholder="Emergency Mobile" value="<?php echo $this_element->emg_mobile;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Date Of Birth<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="date" class="span11" name="dob" value="<?php echo $this_element->dob;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Gender<span class="mandatory">*</span></label>
              <div class="controls">
                <select name="gender" required>
                  <option value="male" <?php echo ($this_element->gender == 'male') ? 'selected' : '';?> >Male</option>
                  <option value="female" <?php echo ($this_element->gender == 'female') ? 'selected' : '';?> >Female</option>
                  <option value="other" <?php echo ($this_element->gender == 'other') ? 'selected' : '';?> >Other</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Marital Status<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="text" class="span11" name="marital_status" placeholder="Marital Status" value="<?php echo $this_element->marital_status;?>" required/>
              </div>
            </div>

            <hr>
            <h4>Address</h4>

            <div class="control-group">
              <label class="control-label">Current Address<span class="mandatory">*</span></label>
              <div class="controls">
                <textarea class="span11" rows="5" name="current_address" placeholder="Current Address" required><?php echo $this_element->current_address;?></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Permanet Address<span class="mandatory">*</span></label>
              <div class="controls">
                <textarea class="span11" rows="5" name="permanent_address" placeholder="Permanet Address" required><?php echo $this_element->permanent_address;?></textarea>
              </div>
            </div>
            <hr>
            <h4>Family Details</h4>

             <div class="control-group">
              <label class="control-label">Father's Name<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="text" class="span11" name="father_name" placeholder="Name" value="<?php echo $this_element->father_name;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Father's Occupation<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="text" class="span11" name="father_occupation" placeholder="Occupation" value="<?php echo $this_element->father_occupation;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Mother's Name<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="text" class="span11" name="mother_name" placeholder="Mother's Name" value="<?php echo $this_element->mother_name;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Siblings<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="number" class="span11" name="siblings" placeholder="Siblings" value="<?php echo ($this_element->siblings) ?? 0;?>" required/>
              </div>
            </div>

            <hr>
            <h4>ID Details</h4>

            <div class="control-group">
              <label class="control-label">Adhar Number<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="text" class="span11" name="adhar_number" placeholder="Adhar Number" value="<?php echo $this_element->adhar_number;?>" required/>
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Pan Number<span class="mandatory">*</span></label>
              <div class="controls">
                <input type="text" class="span11" name="pan_number" placeholder="Pan Number" value="<?php echo $this_element->pan_number;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Passport Number</label>
              <div class="controls">
                <input type="text" class="span11" name="passport_number" placeholder="Password Number" value="<?php echo $this_element->passport_number;?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Driving License Number</label>
              <div class="controls">
                <input type="text" class="span11" name="driving_license" placeholder="Driving License Number" value="<?php echo $this_element->driving_license;?>" />
              </div>
            </div>

            <hr>
            <h4>Educational Details</h4>

      <table class="table table-bordered table-hover table-sortable" id="tab_logic_education">
				<thead>
					<tr>
						<th class="text-center">
							Degree
						</th>
            <th class="text-center">
              Institute/University
            </th>
						<th class="text-center">
							Year Of Passing
						</th>
						<th class="text-center">
							Marks(%)
						</th>
        				<th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
						</th>
					</tr>
				</thead>
				<tbody>
				<?php if(count($edu_details) > 0){ 

					// echo '<pre>';
					// print_r($edu_details);exit();

						$i=0;
						foreach($edu_details as $key) {

				?>

					<tr id='addr<?php echo $i;?>' data-id="<?php echo $i;?>">
						<td>
						    <input type="text" name='degree[]'  value="<?php echo $key->degree; ?>" placeholder='Degree' class="form-control" />
						</td>
            <td>
                <input type="text" name='doneFrom[]'  value="<?php echo $key->doneFrom; ?>" placeholder='Institute/Univeristy' class="form-control" />
            </td>
						<td>
						    <input type="number" maxlength="4" name='yop[]'  value="<?php echo $key->yop; ?>" class="form-control" />
						</td>
						<td>
						    <input type="number" name="marks[]" value="<?php echo $key->marks; ?>" placeholder="Marks" class="form-control"  />
						</td>
                        <td>
                            <button data-row="addr<?php echo $i;?>" onclick="deleteRowThis(this)" type="button" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
                        </td>
					</tr>
 
				<?php $i++; } } else { ?>
    				<tr id='addr0' data-id="0" >
						<td data-name="name">
						    <input type="text" name='degree[]'  placeholder='Degree' class="form-control" />
						</td>
            <td data-name="name">
                <input type="text" name='doneFrom[]'  placeholder='Institute/University' class="form-control" />
            </td>
						<td data-name="mail">
						    <input type="number" maxlength="4" name='yop[]'  class="form-control" />
						</td>
						<td data-name="desc">
						    <input type="number" name="marks[]" placeholder="Marks" class="form-control"  />
						</td>
                        <td data-name="del">
                            <button data-row="addr0" type="button" onclick="deleteRowThis(this)" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
                        </td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<a style="margin-left:8px;" id="add_edu_row" class="btn btn-primary float-right">+ Add</a>

			<hr>
      <h4>Proffesional Details</h4>

			<table class="table table-bordered table-hover table-sortable" id="tab_logic_proffession">
				<thead>
					<tr>
						<th class="text-center">
							Company Name
						</th>
						<th class="text-center">
							Start Date
						</th>
						<th class="text-center">
							End Date
						</th>
    					<th class="text-center">
							Salary
						</th>
        				<th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
						</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($pro_details) > 0){ 

					// echo '<pre>';
					// print_r($pro_details);exit();
						//echo count($pro_details);

						$j=0;
						foreach($pro_details as $key) {



				?>
					<tr id='addp<?php echo $j;?>'>
						<td data-name="name">
						    <input type="text" name='company[]'  value="<?php echo $key->company ; ?>"  placeholder='Company Name' class="form-control" />
						</td>
						<td data-name="name">
						    <input type="date" name='start_date[]'  value="<?php echo $key->start_date ; ?>" class="form-control" />
						</td>
						<td data-name="mail">
						    <input type="date" name='end_date[]' value="<?php echo $key->end_date ; ?>"  class="form-control" />
						</td>
						<td data-name="desc">
						    <input type="number" name="salary[]" value="<?php echo $key->salary ; ?>"  placeholder="Salary" class="form-control"  />
						</td>
                        <td data-name="del">
                            <button data-row="addp<?php echo $j;?>" onclick="deleteRowThis(this)" type="button"  class='btn btn-danger glyphicon glyphicon-remove row-remove1'><span aria-hidden="true">×</span></button>
                        </td>
					</tr>
				<?php $j++; } } else { ?>

    				<tr id='addp0'>
						<td data-name="name">
						    <input type="text" name='company[]'  placeholder='Company Name' class="form-control" />
						</td>
						<td data-name="name">
						    <input type="date" name='start_date[]' class="form-control" />
						</td>
						<td data-name="mail">
						    <input type="date" name='end_date[]' class="form-control" />
						</td>
						<td data-name="desc">
						    <input type="number" name="salary[]" placeholder="Salary" class="form-control"  />
						</td>
                        <td data-name="del">
                            <button data-row="addp0" onclick="deleteRowThis(this)" type="button" class='btn btn-danger glyphicon glyphicon-remove row-remove1'><span aria-hidden="true">×</span></button>
                        </td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<a style="margin-left:8px;" id="add_pro_row" class="btn btn-primary float-right">+ Add</a>
            
      <hr>
      <h4>Documents</h4>

      <table class="table table-bordered table-hover table-sortable" id="tab_logic_document">
        <thead>
          <tr>
            <th class="text-center">
              Document
            </th>
            <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
            </th>
          </tr>
        </thead>
        <tbody>
          <?php if(count($documents) > 0){ 

          // echo '<pre>';
          // print_r($pro_details);exit();
            //echo count($pro_details);

            $k=0;
            foreach($documents as $key) {



        ?>
          <tr id='addf<?php echo $k;?>'>
            <td data-name="name">
                <a href="<?php echo base_url();?><?php echo $key->documentPath;?>">View Document</a>
            </td>
            <td data-name="del">
                <button data-row="addf<?php echo $k;?>" onclick="deleteRowThis(this)" type="button"  class='btn btn-danger glyphicon glyphicon-remove row-remove2'><span aria-hidden="true">×</span></button>
            </td>
          </tr>
        <?php $k++; } } else { ?>

            <tr id='addf0'>
            <td data-name="name">
                <input type="file" name='document[]' class="form-control" />
            </td>
            <td data-name="del">
                <button data-row="addf0" onclick="deleteRowThis(this)" type="button" class='btn btn-danger glyphicon glyphicon-remove row-remove2'><span aria-hidden="true">×</span></button>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
      <a style="margin-left:8px;" id="add_doc_row" class="btn btn-primary float-right">+ Add</a>

            
      <div class="form-actions">
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </form>

        </div>
      </div>
    </div>
  </div>
</div>


<script>
	
$(document).ready(function() {

	var i=<?php echo (count($edu_details) > 0) ? count($edu_details) : 1;?>;
	$("#add_edu_row").click(function(){

		//alert('ok');
        $('#tab_logic_education').append('<tr id="addr'+i+'"><td><input type="text" name="degree[]" placeholder="Degree" class="form-control" /></td><td><input type="text" name="doneFrom[]" placeholder="Institute/University" class="form-control" /></td><td><input type="number" maxlength="4" name="yop[]"  class="form-control" /></td><td><input type="number" name="marks[]" placeholder="Marks" class="form-control"  /></td><td><button type="button" onclick="deleteRowThis(this)" data-row="addr'+i+'" class="btn btn-danger glyphicon glyphicon-remove row-remove"><span aria-hidden="true">×</span></button></td></tr>');
        i++; 
    });

	var j=<?php echo (count($pro_details) > 0) ? count($pro_details) : 1;?>;
    $("#add_pro_row").click(function(){

		//alert('ok');
        $('#tab_logic_proffession').append('<tr id="addp'+j+'" ><td data-name="name"><input type="text" name="company[]"  placeholder="Company Name" class="form-control" /></td><td data-name="name"><input type="date" name="start_date[]" class="form-control" /></td><td data-name="mail"><input type="date" name="end_date[]" class="form-control" /></td><td data-name="desc"><input type="number" name="salary[]" placeholder="Salary" class="form-control"  /></td><td data-name="del"><button data-row="addp'+j+'" onclick="deleteRowThis(this)" type="button" class="btn btn-danger glyphicon glyphicon-remove row-remove1"><span aria-hidden="true">×</span></button></td></tr>');
        j++; 
    });

  var k=<?php echo (count($documents) > 0) ? count($documents) : 1;?>;
    $("#add_doc_row").click(function(){

    //alert('ok');
        $('#tab_logic_document').append('<tr id="addf'+k+'" ><td data-name="name"><input type="file" name="document[]" class="form-control" /></td><td data-name="del"><button data-row="addf'+k+'" onclick="deleteRowThis(this)" type="button" class="btn btn-danger glyphicon glyphicon-remove row-remove2"><span aria-hidden="true">×</span></button></td></tr>');
        k++; 
    });

});

function deleteRowThis(val)
{
    var rowId='#'+$(val).attr('data-row');
    $(rowId).remove();
}

</script>


<script>
	
$(document).ready(function() {
   
    
});

</script>
