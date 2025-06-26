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
<?php //echo "<pre>"; print_r($this_element); exit; ?>

<div class="container-fluid" >
    <div class="row-fluid">
      <div class="span12">
       <!--  <a href="<?php echo base_url();?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Customer</h5>
            <a href="javascript:void();" onclick="printrecord();" class="pull-right btn btn-info">Print</a>
          </div>
          <div class="widget-content nopadding" id="printarea">
          <table class="table table-bordered table-invoice">
          	<tr>
          		<th>Customer Name</th>
                <td><?php echo $customers[0]->name;?></td>    
                <th>Expense Account</th>
                <td><?php echo $accounts[0]->name;?></td>            
                <th>Invoice</th>
                <td><?php echo $this_element->invoice;?></td>
          	</tr>
            
            <tr>
          	<th>Paid Through</th>
                <td><?php echo $this_element->paid_through;?></td>
                <th>Vendor</th>
                <td><?php echo $vendors[0]->name;?></td>                
          	</tr> 
            <tr>
            	<th>Note</th>
                <td colspan="4"><?php echo $this_element->note;?></td>
            </tr>
                         
          </table>
          
          
    
           </div>
        </div>

    </div>
  </div>
</div>
</div>
</div>
<script>
	function printrecord(){
		 var printContents = document.getElementById("printarea").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
	}
</script>