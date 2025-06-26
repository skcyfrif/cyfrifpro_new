<style>

.details .control-label {
    padding-top: 15px !important;
    width: 10% !important;
    margin-right: 10px !important;
    text-align:left !important;
}
.details .controls {
    margin-left: 0 !important;
    padding: 10px 0 !important;
    width: 80% !important;
    float: left !important;
}

#tot-p-cost,.bidhours,#budget_filed,#tot-p-cost,#costp_proj0,#costp_proj1,#budge_cost1,#budge_cost2{display:none;}
<?php if(isset($this_element)){ ?>

<?php if($this_element->bill_method==3 || $this_element->bill_method==2){	
?> .bidhours{display:block;} <?php } ?>

<?php if(isset($this_element->bill_method) && ($this_element->bill_method==0 || $this_element->bill_method==1)){ ?> #tot-p-cost{ display:block;}
#tot-p-cost<?php echo $this_element->bill_method; ?>{ display:block;}<?php } ?>

<?php if($this_element->addbudget == 1){ ?>#budget_filed{display:block;}
#budge_cost<?php echo $this_element->budget1; ?>{ display:block;}
<?php } ?>

<?php } ?>
.chekclass{
opcity:1 !important;}
.opc input[type=checkbox] {
    opacity: 1 !important;
    margin-top: -5px;
}

</style>

<?php //echo "<pre>"; print_r($this_element); exit; ?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Project</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">           
			<div class="control-group">
              <label class="control-label">Project Name</label>
              <div class="controls">
                <input type="text" class="span6"  name="name" id="name" placeholder="Project Name" value="<?php echo $this_element->name; ?>" autocomplete="off" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
              <textarea name="content" class="span6" rows="5" class="5"><?php echo $this_element->content; ?> </textarea>                
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Customer</label>
              <div class="controls">
                <select name="cus_id" class="span6" onchange="getcustomer_details(this.value);" required>
					<?php 
					if(count($customers)>0){ 					
						foreach($customers as $cn){
					?>
                  <option value="<?php echo $cn->id; ?>" <?php echo ($this_element->cus_id == $cn->id) ? 'selected' : '';?> ><?php echo $cn->name; ?></option>
                 	<?php } } ?>

                </select>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Billing Method</label>
              <div class="controls">
               <select name="bill_method" class="span6" id="bill_method" onchange="setpcost(this.value);"required>
               		<option value="">Select...</option>
                    <option value="0" <?php echo ($this_element->bill_method == 0) ? 'selected' : ''; ?>>Fixed Cost for Project</option>
                    <option value="1" <?php echo ($this_element->bill_method == 1) ? 'selected' : ''; ?>>Based on Project Hours</option>
                    <option value="2" <?php echo ($this_element->bill_method == 2) ? 'selected' : ''; ?>>Based on Task Hours</option>
                     <option value="3" <?php echo ($this_element->bill_method == 3) ? 'selected' : ''; ?>>Based on Staff Hours</option>
               </select>
              </div>
            </div>
            
            <div class="control-group" id="tot-p-cost">
            	<div id="costp_proj0">
                  <label class="control-label">Total Project Cost</label>
                  <div class="controls">
                    <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">INR</span></div> <input id="p_project_cost" name="p_project_cost"  type="text" class="span6" value="<?php echo $this_element->p_project_cost; ?>" autocomplete="off"> </div>
                   </div>
                </div>
                <div id="costp_proj1">
                    <label class="control-label">Rate Per Hour</label>
                    <div class="controls">
                    <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">INR</span></div> <input id="p_hour_cost" name="p_hour_cost"  type="text" class="span6" value="<?php echo $this_element->p_hour_cost; ?>" autocomplete="off"> </div>
                   </div>
               </div>
             </div> 
            
            
            <div class="control-group">
              <label class="control-label">&nbsp;</label>
              <div class="controls opc">
            	<input type="checkbox" name="addbudget" onclick="setbudget();" id="addbudget" value="1" <?php echo ($this_element->addbudget == 1) ? 'checked' : ''; ?> />
                Add budget for this project.
               </div>
             </div>
             
            <div id="budget_filed">
            	<div class="control-group">
                  <label class="control-label">Billing Method</label>
                  <div class="controls">
                   <select name="budget1" class="span6" id="budget1" onchange="setbudgetcost(this.value);">
                        <option value="">Select...</option>
                        <option value="1" <?php echo ($this_element->budget1 == 1) ? 'selected' : ''; ?>>Total Budget Cost</option>
                        <option value="2" <?php echo ($this_element->budget1 == 2) ? 'selected' : ''; ?>>Total Project Hours (HH:MM)</option>
                        <option value="3" <?php echo ($this_element->budget1 == 3) ? 'selected' : ''; ?>>Hours Per Task</option>
                         <option value="4" <?php echo ($this_element->budget1 == 4) ? 'selected' : ''; ?>>Hours Per Staff</option>
                   </select>
                  </div>
                </div>              
                <div class="control-group" id="budge_cost1">
                  <label class="control-label">Total Budget Cost</label>
                  <div class="controls">
                    <input type="text" name="budget_cost" id="budget_cost" value=" <?php echo $this_element->budget_cost; ?>" autocomplete="off" />
                   </div>
                 </div>                 
                <div class="control-group" id="budge_cost2">
                  <label class="control-label">Total Budget Hours</label>
                  <div class="controls">
                    <input type="text" name="budget_hours" id="budget_hours" value=" <?php echo $this_element->budget_hours; ?>" autocomplete="off" />
                   </div>
                 </div>
            </div>            
           
            <div class="control-group">
                  <label class="control-label"><strong>Tasks</strong></label>
            </div>
             <div class="control-group">
             	<div class="controls">
             		<table id="tasktable">
                 	<tr>
                    	<th width="25%">Task Name</th>
                        <th width="25%">Description</th>
                        <th width="25%" class="bidhours">Rate Per Hour</th> 
                        <th width="25%">Action</th>                       
                    </tr>
                    <?php if(count($this_element_tasks)>0){
					 $l=0;
					foreach($this_element_tasks as $task){
					?>
                    <tr class="tasklist" id="tasklist<?php echo $l; ?>">
                    	<td width="25%"><input type="text" value="<?php echo $task->title; ?>" name="title[]" /><input type="hidden" value="<?php echo $task->tsk_id; ?>" name="id[]" id="taksid<?php echo $l; ?>" /></td>
                        <td width="25%"><textarea name="details[]" cols="1" rows="1"><?php echo $task->details; ?></textarea></td>
                        <td class="bidhours opc" width="25%"><input type="text" value="<?php echo $task->price; ?>" name="price[]" /> <input type="checkbox" value="1" name="billable[]" class="chekclass" <?php echo ($task->billable==1)?"checked":""; ?> />Billable</td>
                        <td width="25%"><a href="javascript:void(0);" onclick="add_more();">+ Add</a> | <a href="javascript:void(0);" onclick="deletetask('<?php echo $l; ?>');">Remove</a></td>
                    </tr> 
                    <?php $l++; } }else{ ?> 
                    <tr class="tasklist" id="tasklist0">
                    	<td width="25%"><input type="text" value="" name="title[]" /></td>
                        <td width="25%"><textarea name="details[]" cols="1" rows="1"></textarea></td>
                        <td class="bidhours opc" width="25%"><input type="text" value="" name="price[]" /> <input type="checkbox" value="" name="billable[]" class="chekclass" />Billable</td>
                        <td width="25%"><a href="javascript:void(0);" onclick="add_more();">+ Add</a> | <a href="javascript:void(0);" onclick="removetask('0');">Remove</a></td>
                    </tr>
                   <?php } ?>        
                 </table>
                 </div>
             </div>   
            <hr />            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
             <button type="button" class="btn btn-sm btn-info" onclick="backtopage();">Back</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

function setcurrency(id){
	$.ajax({
		url: "<?php echo base_url().'Clientstore/ajax_currency'; ?>",
		 type:"post",
		 dataType:'json',
		 data:{id:id}, 
         success: function(result){ 		 			 	 	
         	$("#symbol").val(result.symbol); 
			$("#name").val(result.currency);					
     }}); }

function backtopage(val){
	window.history.back();}

function removetask(evt){
	var conf= confirm("Are you sure ?");
	if(conf==true){
		var coun=$(".tasklist").length;
	if(coun>1){
		$("#tasklist"+evt).remove();
	}else{
		alert("sorry you can't delete this.");
	}
	}
}

function add_more(){
	var coun=$(".tasklist").length;
		coun=parseInt(parseInt(coun)+1);
		
	var htm='<tr class="tasklist" id="tasklist'+coun+'"><td><input type="text" value="" name="title[]" /></td><td><textarea name="details[]" cols="1" rows="1"></textarea></td><td class="bidhours opc"><input type="text" value="" name="price[]" /> <input type="checkbox" value="" name="billable[]" class="chekclass" />Billable</td><td><a href="javascript:void(0);" onclick="add_more();">+ Add</a> | <a href="javascript:void(0);" onclick="removetask('+coun+');">Remove</a></td></tr>';		
	$("#tasktable").append(htm);
	setpcost(1);
	}

function setpcost(evt){

	evt= $("#bill_method").val();
	
	if(evt==0 || evt==1){
		$("#tot-p-cost").show();
		if(evt==1){
			$("#costp_proj1").show();
			$("#costp_proj0").hide();			
		}else{
			$("#costp_proj0").show();
			$("#costp_proj1").hide();
		}
		$(".bidhours").css('display','none');
	}else{
		$("#tot-p-cost").hide();
		$(".bidhours").css('display','block');
	}}

function setbudgetcost(evt){
	if(evt==1 || evt==2){
		$("#budge_cost").show();
		if(evt==1){
			$("#budge_cost1").show();
			$("#budge_cost2").hide();			
		}else{
			$("#budge_cost2").show();
			$("#budge_cost1").hide();
		}
		
	}else{
	
		$("#budge_cost1").hide();
		$("#budge_cost2").hide();			
	}}

function setbudget(){	
	if($("#addbudget").is(":checked")==true){
		$("#budget_filed").show();
	}else{
		$("#budget_filed").hide();		
	}}

function deletetask(evt){
	var conf= confirm("Are you sure ?");
	if(conf==true){
		var id=$("#taksid"+evt).val(); 
		$.ajax({
			url: "<?php echo base_url().'Clientstore/ajax_delete_task'; ?>",
			 type:"post",
			 dataType:'json',
			 data:{id:id}, 
			 success: function(result){ 		 			 	 	
				$("#tasklist"+evt).remove(); 								
		 }});
	}	 
}	
</script>

