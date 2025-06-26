<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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


            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
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
                  <th>Client Name</th>
                  <th>Client Email</th>
                  <th>Client Mobile</th>
                  <th>Client Address</th>
                  <th>Pincode</th>
                  <th>Contact Person Name</th>
                  <th>Contact Person Number</th>
                  <th>Contact Person Email</th>
                  <th>Zone</th>
                  <th>Region Name</th>
                  <th>Branch Name</th>
                  <th>Branch DM</th>
                  <th>Zonal Business Director</th>
                  <th>Contract Issuance Date</th>
                  <th>Payment Status</th>
                  <th>CRM_ID</th>
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

                        <td><?php echo $key->cContractNumer;?></td>
                        <td><?php echo $key->cCategory;?></td>
                        <td><?php echo $key->cUnclaimedtype;?></td>
                        <td><?php echo $key->cMatch;?></td>
                        <td><?php echo $key->cContractAmount;?></td>
                        <td><?php echo $key->cDataSource;?></td>
                        <td><?php echo $key->cContractStatus;?></td>
                        <td><?php echo $key->cContactType;?></td>
                        <td><?php echo $key->cPaidAmount;?></td>
                        <td><?php echo $key->eId;?></td>
                        <td><?php echo $key->cId;?></td>
                        <td><?php echo $key->cName;?></td>
                        <td><?php echo $key->cEmail;?></td>
                        <td><?php echo $key->cMobile;?></td>
                        <td><?php echo $key->cAddress;?></td>
                        <td><?php echo $key->cPincode;?></td>
                        <td><?php echo $key->cContactPersonName;?></td>
                        <td><?php echo $key->cContactPersonMobile;?></td>
                        <td><?php echo $key->cContactPersonEmail;?></td>
                        <td><?php echo $key->zTitle;?></td>
                        <td><?php echo $key->cRegionName;?></td>
                        <td><?php echo $key->cBranchName;?></td>
                        <td><?php echo $key->cBranchDM;?></td>
                        <td><?php echo $key->cZonalBusinessDirector;?></td>
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

<script>

$(document).ready(function() {

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [ 
             {
             extend: 'pdf',
             footer: false,
             exportOptions: {
                      columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]
                  }
             },
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