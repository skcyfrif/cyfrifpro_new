<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 

<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" >
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> 
<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>

<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
.dt-buttons{
      top: 5px;
    position: absolute;
    left: 90px;
}

.dataTables_filter {
        top: 3px !important;
    margin: 0 !important;
    position: absolute !important;
    float: right !important;
    right: 10px !important;
}
.dataTables_wrapper {
    position: inherit!important;
  }
.dataTables_wrapper .dataTables_info {
    position: absolute!important;
    padding-top: 2.755em!important;
    padding-left: 5px !important;
}
.dataTables_wrapper .dataTables_paginate {
    padding-top: 2.25em!important;
    position: absolute!important;
    right: 0!important;
    height: 50px !important;
}
</style>
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
       <!--  <a href="<?php echo base_url();?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">

          <div style="overflow-x:auto;">
            <table id="example" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Business Name</th>
                  <th>Contract Number</th>
                  <th>Category</th>
                  <th>Unclaimed Type</th>
                  <th>Match</th>
                  <th>Contract Amout</th>
                  <th>Data Source</th>
                  <th>Contract Status</th>
                  <th>Contract Type</th>
                  <th>Paid Amount</th>
                  <th>Employee Code</th>
                  <th>Client Code</th>
                  <th>Client Email</th>
                  <th>Client Mobile</th>
                  <th>Client Address</th>
                  <th>Pincode</th>
                  <th>Contact Person Name</th>
                  <th>Contact Person Number</th>
                  <th>Contact Person Email</th>
                  <th style="display:none;">Zone</th>
                  <th style="display:none;">Region Name</th>
                  <th style="display:none;">Branch Name</th>
                  <th style="display:none;">Branch DM</th>
                  <th style="display:none;">Zonal Business Director</th>
                  <th>Payment Status</th>
                  <th>CRM_ID</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($sales_report){
                $i=1; foreach($sales_report as $key){ 

                    ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $i;?></td>
                        <td><?php echo $key->cBusinessName;?></td>
                        <td><?php echo $key->cContractNumer;?></td>
                        <td><?php echo $key->cCategory;?></td>
                        <td><?php echo $key->cType;?></td>
                        <td><?php echo $key->cMatch;?></td>
                        <td><?php echo $key->cContractAmount;?></td>
                        <td><?php echo $key->cDataSource;?></td>
                        <td><?php echo $key->cContractStatus;?></td>
                        <td><?php echo $key->cContactType;?></td>
                        <td><?php echo $key->cPaidAmount;?></td>
                        <td><?php echo $key->eId;?></td>
                        <td><?php echo $key->cId;?></td>
                        <td><?php echo $key->cEmail;?></td>
                        <td><?php echo $key->cMobile;?></td>
                        <td><?php echo $key->cAddress;?></td>
                        <td><?php echo $key->cPincode;?></td>
                        <td><?php echo $key->cContactPersonName;?></td>
                        <td><?php echo $key->cContactPersonMobile;?></td>
                        <td><?php echo $key->cContactPersonEmail;?></td>
                        <td style="display:none;"><?php echo $key->zTitle;?></td>
                        <td style="display:none;"><?php echo $key->eRegionName;?></td>
                        <td style="display:none;"><?php echo $key->eBranchName;?></td>
                        <td style="display:none;"><?php echo $key->eBranchDM;?></td>
                        <td style="display:none;"><?php echo $key->eZonalBusinessDirector;?></td>
                        <td><?php echo $key->cPaymentStatus;?></td>
                        <td><?php echo $key->cCrmid;?></td>
                        <td> 
                            <?php    
                                    $date=explode(' ',$key->cCreated);
                                    echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td>
                        <td class="td-actions">
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->cId; ?>" data-tblName="tbl_clients" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
                                Delete                                       
                            </a>
                        </td>
                    </tr>
                <?php $i++; } } else { ?>

                    <tr class="gradeX">
                        <td class="center" colspan="29">No data found</td>
                    </tr>

                <?php } ?>
              </tbody> 
            </table>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<script>

$(document).ready(function() {

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [ 
             {
                 extend: 'csv',
                 footer: false,
                 exportOptions: {
                      columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]
                  }
             },
             {
                 extend: 'excel',
                 footer: false,
                 exportOptions: {
                      columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]
                  }
             } 
          ],
          stateSave: true
        

    } );
} );
</script>