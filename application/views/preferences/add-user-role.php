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
#myModal{display:none;}
input[type="file"], input[type="image"], input[type="submit"], input[type="reset"], input[type="button"], input[type="radio"], input[type="checkbox"]{
opacity:1 !important;}
</style>
<?php //echo "<pre>"; print_r($this_element); exit; ?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" class="form-horizontal" enctype="multipart/form-data">
          
          <input type="hidden" name="id" value="<?php echo $this_element->role_id; ?>" />
          
          	<div class="span12">
            
              <div class="control-group">
              	 <label class="control-label">Role Name</label>
                  <div class="controls">
                    <input type="text" name="name" id="name"  value="<?php echo $this_element->name; ?>"/> 

                  </div>                  
               </div>    
                          
              <div class="control-group">
              	 <label class="control-label">Description</label>
                  <div class="controls">
                    <textarea name="content" id="content" style="margin: 0px; width: 746px; height: 104px;"><?php echo $this_element->content; ?></textarea>
                  </div>
                </div>
               <hr />
               
              <div class="control-group">
              <table class="table table-bordered table-this_element">
              	<thead>
                	<tr>
                    	<th>Section</th>
                        <th>Full Access</th>
                        <th>View</th>
                        <th>Create</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Approve</th>
                    </tr>
                </thead>
                <tbody>
                	<tr>
                    	<th>Customers</th>
                        <th><input type="checkbox" name="cfullaccess" value="vced" <?php if($this_element->customers=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cust_access[]" value="v" <?php if(strpos($this_element->customers,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cust_access[]" value="c" <?php if(strpos($this_element->customers,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cust_access[]" value="e" <?php if(strpos($this_element->customers,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="cust_access[]" value="d" <?php if(strpos($this_element->customers,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Vendors</th>
                        <th><input type="checkbox" name="vendfullaccess" value="vced" <?php if($this_element->vendors=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="vend_access[]" value="v" <?php if(strpos($this_element->vendors,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="vend_access[]" value="c" <?php if(strpos($this_element->vendors,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="vend_access[]" value="e" <?php if(strpos($this_element->vendors,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="vend_access[]" value="d" <?php if(strpos($this_element->vendors,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th><input type="checkbox" name="vaccount" value="1" <?php if($this_element->vendors_ac==1){ echo "checked"; } ?> /></th>
                        <th colspan="6">Allow users to add, edit and delete vendor's bank account details.</th>
                       
                    </tr>
                    <tr>
                    	<th>Item</th>
                        <th><input type="checkbox" name="Itemfullaccess" value="vced" <?php if($this_element->Item=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="Item_access[]" value="v" <?php if(strpos($this_element->Item,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="Item_access[]" value="c" <?php if(strpos($this_element->Item,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="Item_access[]" value="e" <?php if(strpos($this_element->Item,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="Item_access[]" value="d" <?php if(strpos($this_element->Item,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Composite Items	</th>
                        <th><input type="checkbox" name="cmpitmfullaccess" value="vced" <?php if($this_element->composite_items=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cmpitm_access[]" value="v" <?php if(strpos($this_element->composite_items,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cmpitm_access[]" value="c" <?php if(strpos($this_element->composite_items,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cmpitm_access[]" value="e" <?php if(strpos($this_element->composite_items,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="cmpitm_access[]" value="d" <?php if(strpos($this_element->composite_items,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Warehouses</th>
                        <th><input type="checkbox" name="whfullaccess" value="vced" <?php if($this_element->warehouses=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="wh_access[]" value="v" <?php if(strpos($this_element->warehouses,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="wh_access[]" value="c" <?php if(strpos($this_element->warehouses,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="wh_access[]" value="e" <?php if(strpos($this_element->warehouses,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="wh_access[]" value="d" <?php if(strpos($this_element->warehouses,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Transfer Orders	</th>
                        <th><input type="checkbox" name="tordfullaccess" value="vced" <?php if($this_element->transfer_orders=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="tord_access[]" value="v" <?php if(strpos($this_element->transfer_orders,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="tord_access[]" value="c" <?php if(strpos($this_element->transfer_orders,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="tord_access[]" value="e" <?php if(strpos($this_element->transfer_orders,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="tord_access[]" value="d" <?php if(strpos($this_element->transfer_orders,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Inventory Adjustments</th>
                        <th><input type="checkbox" name="invadjtfullaccess" value="vced" <?php if($this_element->inventory_adjustments=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="invadjt_access[]" value="v" <?php if(strpos($this_element->inventory_adjustments,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="invadjt_access[]" value="c" <?php if(strpos($this_element->inventory_adjustments,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="invadjt_access[]" value="e" <?php if(strpos($this_element->inventory_adjustments,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="invadjt_access[]" value="d" <?php if(strpos($this_element->inventory_adjustments,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Price List</th>
                        <th><input type="checkbox" name="plfullaccess" value="vced" <?php if($this_element->price_list=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="pl_access[]" value="v" <?php if(strpos($this_element->price_list,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="pl_access[]" value="c" <?php if(strpos($this_element->price_list,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="pl_access[]" value="e" <?php if(strpos($this_element->price_list,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="pl_access[]" value="d" <?php if(strpos($this_element->price_list,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Invoices</th>
                        <th><input type="checkbox" name="invfullaccess" value="vceda" 
<?php if($this_element->invoices=="vceda"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="inv_access[]" value="v" <?php if(strpos($this_element->invoices,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="inv_access[]" value="c" <?php if(strpos($this_element->invoices,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="inv_access[]" value="e" <?php if(strpos($this_element->invoices,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="inv_access[]" value="d" <?php if(strpos($this_element->invoices,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="inv_access[]" value="a" <?php if(strpos($this_element->invoices,'a') !== false ){ echo "checked"; } ?> /></th>
                    </tr>
                    <tr>
                    	<th>Customer Payments</th>
                        <th><input type="checkbox" name="cpfullaccess" value="vced" <?php if($this_element->customer_payments=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cp_access[]" value="v" <?php if(strpos($this_element->customer_payments,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cp_access[]" value="c" <?php if(strpos($this_element->customer_payments,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cp_access[]" value="e" <?php if(strpos($this_element->customer_payments,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="cp_access[]" value="d" <?php if(strpos($this_element->customer_payments,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Sales Orders</th>
                        <th><input type="checkbox" name="sofullaccess" value="vceda" <?php if($this_element->sales_orders=="vceda"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="so_access[]" value="v" <?php if(strpos($this_element->sales_orders,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="so_access[]" value="c" <?php if(strpos($this_element->sales_orders,'c') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="so_access[]" value="e" <?php if(strpos($this_element->sales_orders,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="so_access[]" value="d" <?php if(strpos($this_element->sales_orders,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="so_access[]" value="a" <?php if(strpos($this_element->sales_orders,'a') !== false ){ echo "checked"; } ?> /></th>
                    </tr>
                    <tr>
                    	<th>Package</th>
                        <th><input type="checkbox" name="pakfullaccess" value="vced" <?php if($this_element->package=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="pak_access[]" value="v" <?php if(strpos($this_element->package,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="pak_access[]" value="c" <?php if(strpos($this_element->package,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="pak_access[]" value="e" <?php if(strpos($this_element->package,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="pak_access[]" value="d" <?php if(strpos($this_element->package,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Shipment Order</th>
                        <th><input type="checkbox" name="shofullaccess" value="vced" <?php if($this_element->shipment_order=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="sho_access[]" value="v" <?php if(strpos($this_element->shipment_order,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="sho_access[]" value="c" <?php if(strpos($this_element->shipment_order,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="sho_access[]" value="e" <?php if(strpos($this_element->shipment_order,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="sho_access[]" value="d" <?php if(strpos($this_element->shipment_order,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Credit Notes</th>
                        <th><input type="checkbox" name="cnfullaccess" value="vced" <?php if($this_element->credit_notes=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cn_access[]" value="v" <?php if(strpos($this_element->credit_notes,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cn_access[]" value="c" <?php if(strpos($this_element->credit_notes,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="cn_access[]" value="e" <?php if(strpos($this_element->credit_notes,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="cn_access[]" value="d" <?php if(strpos($this_element->credit_notes,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Sales Return</th>
                        <th><input type="checkbox" name="srfullaccess" value="vced" <?php if($this_element->sales_return=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="sr_access[]" value="v" <?php if(strpos($this_element->sales_return,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="sr_access[]" value="c" <?php if(strpos($this_element->sales_return,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="sr_access[]" value="e" <?php if(strpos($this_element->sales_return,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="sr_access[]" value="d" <?php if(strpos($this_element->sales_return,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Sales Return Receive</th>
                        <th><input type="checkbox" name="srrfullaccess" value="vced" <?php if($this_element->sales_return_receive=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="srr_access[]" value="v" <?php if(strpos($this_element->sales_return_receive,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="srr_access[]" value="c" <?php if(strpos($this_element->sales_return_receive,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="srr_access[]" value="e" <?php if(strpos($this_element->sales_return_receive,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="srr_access[]" value="d" <?php if(strpos($this_element->sales_return_receive,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Bills</th>
                        <th><input type="checkbox" name="bilfullaccess" value="vced" <?php if($this_element->bills=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="bil_access[]" value="v" <?php if(strpos($this_element->bills,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="bil_access[]" value="c" <?php if(strpos($this_element->bills,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="bil_access[]" value="e" <?php if(strpos($this_element->bills,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="bil_access[]" value="d" <?php if(strpos($this_element->bills,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Vendor Payments</th>
                        <th><input type="checkbox" name="vpfullaccess" value="vced" <?php if($this_element->vendor_payments=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="vp_access[]" value="v" <?php if(strpos($this_element->vendor_payments,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="vp_access[]" value="c" <?php if(strpos($this_element->vendor_payments,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="vp_access[]" value="e" <?php if(strpos($this_element->vendor_payments,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="vp_access[]" value="d" <?php if(strpos($this_element->vendor_payments,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>  
                    
                    <tr>
                    	<th>Purchase Orders</th>
                        <th><input type="checkbox" name="pofullaccess" value="vced" <?php if($this_element->purchase_orders=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="po_access[]" value="v" <?php if(strpos($this_element->purchase_orders,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="po_access[]" value="c" <?php if(strpos($this_element->purchase_orders,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="po_access[]" value="e" <?php if(strpos($this_element->purchase_orders,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="po_access[]" value="d" <?php if(strpos($this_element->purchase_orders,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Purchase Receive</th>
                        <th><input type="checkbox" name="prfullaccess" value="vced" <?php if($this_element->purchase_receive=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="pr_access[]" value="v" <?php if(strpos($this_element->purchase_receive,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="pr_access[]" value="c" <?php if(strpos($this_element->purchase_receive,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="pr_access[]" value="e" <?php if(strpos($this_element->purchase_receive,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="pr_access[]" value="d" <?php if(strpos($this_element->purchase_receive,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Chart of Accounts</th>
                        <th><input type="checkbox" name="cafullaccess" value="vced" <?php if($this_element->chart_of_zccounts=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="ca_access[]" value="v" <?php if(strpos($this_element->chart_of_zccounts,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="ca_access[]" value="c" <?php if(strpos($this_element->chart_of_zccounts,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="ca_access[]" value="e" <?php if(strpos($this_element->chart_of_zccounts,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="ca_access[]" value="d" <?php if(strpos($this_element->chart_of_zccounts,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Users</th>
                        <th><input type="checkbox" name="usfullaccess" value="vced" <?php if($this_element->set_users=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="us_access[]" value="v" <?php if(strpos($this_element->set_users,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="us_access[]" value="c" <?php if(strpos($this_element->set_users,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="us_access[]" value="e" <?php if(strpos($this_element->set_users,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="us_access[]" value="d" <?php if(strpos($this_element->set_users,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Export data</th>
                        <th><input type="checkbox" name="exdfullaccess" value="vced" <?php if($this_element->set_export_data=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="exd_access[]" value="v" <?php if(strpos($this_element->set_export_data,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="exd_access[]" value="c" <?php if(strpos($this_element->set_export_data,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="exd_access[]" value="e" <?php if(strpos($this_element->set_export_data,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="exd_access[]" value="d" <?php if(strpos($this_element->set_export_data,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>General preferences</th>
                        <th><input type="checkbox" name="gpfullaccess" value="vced" <?php if($this_element->set_general_preferences=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="gp_access[]" value="v" <?php if(strpos($this_element->set_general_preferences,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="gp_access[]" value="c" <?php if(strpos($this_element->set_general_preferences,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="gp_access[]" value="e" <?php if(strpos($this_element->set_general_preferences,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="gp_access[]" value="d" <?php if(strpos($this_element->set_general_preferences,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>
                    <tr>
                    	<th>Taxes</th>
                        <th><input type="checkbox" name="txfullaccess" value="vced" <?php if($this_element->set_taxes=="vced"){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="tx_access[]" value="v" <?php if(strpos($this_element->set_taxes,'v') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="tx_access[]" value="c" <?php if(strpos($this_element->set_taxes,'c') !== false ){ echo "checked"; } ?> /></th>
                        <th><input type="checkbox" name="tx_access[]" value="e" <?php if(strpos($this_element->set_taxes,'e') !== false ){ echo "checked"; } ?> /></th>	
                        <th><input type="checkbox" name="tx_access[]" value="d" <?php if(strpos($this_element->set_taxes,'d') !== false ){ echo "checked"; } ?> /></th>
                        <th></th>
                    </tr>      
                </tbody>
              </table>                                 
                </div>
               <hr />
              
            </div>
            <div style="clear:both;"></div>
           
            <hr />
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
             <!-- <a href="<?php echo base_url();?>inventory/brand/"><button type="button" class="btn btn-sm btn-info">Back</button></a>-->
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>




