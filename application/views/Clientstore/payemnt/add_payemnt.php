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
          <h5>Add New Payment Mode</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">           
			<div class="control-group">
              <label class="control-label">Payment Mode Name</label>
              <div class="controls">
                <input type="text" class="span6"  name="mode" id="mode" placeholder="Payment Mode Name" value="<?php echo $this_element->mode; ?>" autocomplete="off" required/>
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
function backtopage(val){
	window.history.back();]
}

</script>

