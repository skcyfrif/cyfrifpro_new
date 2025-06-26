<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
	
h4{
	margin-left:10px;
}

.table-sortable tbody tr {
    cursor: move;
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
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Name" value="<?php echo $this_element->name;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="email" class="span11" name="email" placeholder="Email" value="<?php echo $this_element->email;?>" readonly />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile</label>
              <div class="controls">
                <input type="tel" class="span11" maxlength="10" name="mobile" placeholder="Mobile" value="<?php echo $this_element->mobile;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Father's Name</label>
              <div class="controls">
                <input type="text" class="span11" name="father_name" placeholder="Name" value="<?php echo $this_element->father_name;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Date Of Birth</label>
              <div class="controls">
                <input type="date" class="span11" name="dob" value="<?php echo $this_element->dob;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Current Address</label>
              <div class="controls">
                <textarea class="span11" rows="5" name="current_address" placeholder="Current Address" value="<?php echo $this_element->current_address;?>" required></textarea>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Permanet Address</label>
              <div class="controls">
                <textarea class="span11" rows="5" name="permanent_address" placeholder="Permanet Address" value="<?php echo $this_element->permanent_address;?>" required></textarea>
              </div>
            </div>

            <hr>
            <h4>Educational Details</h4>

            <table class="table table-bordered table-hover table-sortable" id="tab_login_employee">
				<thead>
					<tr>
						<th class="text-center">
							Degree
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

					<tr id='addr<?php echo $i;?>' data-id="<?php echo $i;?>" class="hidden">
						<td data-name="name">
						    <input type="text" name='degree[]'  value="<?php echo $key->degree; ?>" placeholder='Degree' class="form-control" />
						</td>
						<td data-name="mail">
						    <input type="number" maxlength="4" name='yop[]'  value="<?php echo $key->yop; ?>" class="form-control" />
						</td>
						<td data-name="desc">
						    <input type="number" name="marks[]" value="<?php echo $key->marks; ?>" placeholder="Marks" class="form-control"  />
						</td>
                        <td data-name="del">
                            <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
                        </td>
					</tr>
 
				<?php $i++; } } else { ?>
    				<tr id='addr0' data-id="0" class="hidden">
						<td data-name="name">
						    <input type="text" name='degree[]'  placeholder='Degree' class="form-control" />
						</td>
						<td data-name="mail">
						    <input type="number" maxlength="4" name='yop[]'  class="form-control" />
						</td>
						<td data-name="desc">
						    <input type="number" name="marks[]" placeholder="Marks" class="form-control"  />
						</td>
                        <td data-name="del">
                            <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
                        </td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<a style="margin-left:8px;" id="add_row" class="btn btn-primary float-right">+ Add</a>

			<hr>
            <h4>Proffesional Details</h4>

			<table class="table table-bordered table-hover table-sortable" id="tab_login_employee1">
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
					<tr id='addr<?php echo $j;?>' data-id="<?php echo $j;?>" class="hidden">
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
                            <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove1'><span aria-hidden="true">×</span></button>
                        </td>
					</tr>
				<?php $j++; } } else { ?>

    				<tr id='addr0' data-id="0" class="hidden">
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
                            <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove1'><span aria-hidden="true">×</span></button>
                        </td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<a style="margin-left:8px;" id="add_row1" class="btn btn-primary float-right">+ Add</a>
            
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

 

<?php 
		if($edu_details)
		{ 
			$ejs='var c = $(cur_td).find($(children[0]).prop("tagName")).clone()';
		}
		else
		{
			$ejs='var c = $(cur_td).find($(children[0]).prop("tagName")).clone().val("");';
		}
		if($pro_details)
		{ 
			$pjs='var c = $(cur_td).find($(children[0]).prop("tagName")).clone()';
		}
		else
		{
			$pjs='var c = $(cur_td).find($(children[0]).prop("tagName")).clone().val("");';
		}
		
?>

<script>
	
$(document).ready(function() {
    $("#add_row").on("click", function() {
        // Dynamic Rows Code
        
        // Get max row id and set new id
        var newid = 0;
        $.each($("#tab_login_employee tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#tab_login_employee tbody tr:nth(0) td"), function() {
            var td;
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") !== undefined) {
                td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                //var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                <?php echo $ejs;?>
                // c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                td = $("<td></td>", {
                    'text': $('#tab_login_employee tr').length
                }).appendTo($(tr));
            }
        });
        
        // add the new row
        $(tr).appendTo($('#tab_login_employee'));
        
        $(tr).find("td button.row-remove").on("click", function() {
             $(this).closest("tr").remove();
        });
});




    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();



    $("#add_row").trigger("click");
});

</script>


<script>
	
$(document).ready(function() {
    $("#add_row1").on("click", function() {
        // Dynamic Rows Code
        
        // Get max row id and set new id
        var newid = 0;
        $.each($("#tab_login_employee tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#tab_login_employee1 tbody tr:nth(0) td"), function() {
            var td;
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") !== undefined) {
                td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                //var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                <?php echo $pjs; ?>
                //c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                td = $("<td></td>", {
                    'text': $('#tab_login_employee1 tr').length
                }).appendTo($(tr));
            }
        });
        
        // add the new row
        $(tr).appendTo($('#tab_login_employee1'));
        
        $(tr).find("td button.row-remove1").on("click", function() {
             $(this).closest("tr").remove();
        });
});




    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();


    $("#add_row1").trigger("click");
    
});

</script>
