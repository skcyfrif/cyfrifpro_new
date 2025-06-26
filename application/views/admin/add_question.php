<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<style>
.opc input[type=checkbox] {
    opacity: 1 !important;
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
          <form action="#" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Question</label>
              <div class="controls">
                <input type="text" class="span11" name="question" placeholder="Enter Question" value="<?php echo $this_element->question;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Correct Answer</label>
              <div class="controls">
                <input type="number" class="span11" name="correct_option" placeholder="Enter the Ans Number. E.G ( 2 )"  value="<?php echo $this_element->correct_option;?>" required />
              </div>
            </div>

            <table class="table table-bordered table-hover" id="tab_logicExam">
		        <thead>
		          <tr>
		            <th class="text-center"> # </th>
		            <th class="text-center"> Option </th>
		            <th class="text-center"> Manage </th>
		          </tr>
		        </thead>
		        <tbody>
          <?php if($options){ $i=1; foreach($options as $key){ ?>

            <tr id="addr<?php echo $i;?>" class="text-center">
                <td>Option: <?php echo $i;?></td>
                <td><input style="width:98%;" type="text" name="option_name[]" value="<?php echo $key->option_name; ?>" placeholder="Enter Option" autocomplete="off" class="form-control" required /></td>
                <input type="hidden" name="hiddenAnsNumber[]" value="<?php echo $i;?>" required />
                <td class="center">
                  <button type="button" id="delete_row" onclick="deleteThisRow(this)" data-rowId="addr<?php echo $i;?>" class="pull-right btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
              </tr>

          <?php $i++; } } else { ?>
		        	<tr  id="addr1" class="text-center">
			        	<td>Option: 1</td>
			        	<td><input style="width:98%;" type="text" name="option_name[]" placeholder="Enter Option" autocomplete="off" class="form-control" required/></td>
			        	<input type="hidden" name="hiddenAnsNumber[]" value="1" required />
			        	<td class="center">
			        		<button type="button" id="delete_row" onclick="deleteThisRow(this)" data-rowId="addr1" class="pull-right btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
			        	</td>
		        	</tr>
          <?php } ?>
		        </tbody>
            	
            </table>
            <div class="row clearfix">
			    <div class="col-md-12">
			      <button type="button" id="add_row" style="margin-left: 3%;" class="btn btn-success pull-left">+</button>
			    </div>
			 </div>
      <br />
        <div class="form-actions">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="<?php echo base_url();?>admin/questions"><button type="button" class="btn btn-sm btn-info">Back</button></a>
        </div>
      </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php 

$option=($options) ? (count($options) + 1) : 2 ;
// echo $option;

?>
<script>


var i=<?php echo $option; ?>;
$("#add_row").click(function(){

        $('#tab_logicExam').append('<tr id="addr'+i+'"><td>Option: '+i+'</td><td><input style="width:98%;" type="text" name="option_name[]" placeholder="Enter Option" autocomplete="off" class="form-control" required /></td><input type="hidden" name="hiddenAnsNumber[]" value="'+i+'" required /><td class="text-center"><button type="button" id="delete_row" onclick="deleteThisRow(this)" data-rowId="addr'+i+'" class="pull-right btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
        i++; 
    });

function deleteThisRow(val)
{
    var rowId='#'+$(val).attr('data-rowId');
    // alert(rowId);
    $(rowId).remove();
}
</script>