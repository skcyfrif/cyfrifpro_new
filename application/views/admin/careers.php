
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <a href="<?php echo base_url();?>admin/add_career" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>location</th>
                  <th>Salary</th>
                  <!-- <th>Description</th> -->
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($careers){
                $i=1; foreach($careers as $key){ ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $i;?></td>
                        <td><?php echo $key->title;?></td>
                        <td><?php echo $key->location;?></td>
                        <td><?php echo $key->salary;?></td>
                        <!-- <td><?php echo $key->description;?></td> -->
                        <td> 
                            <?php    
                                    $date=explode(' ',$key->created);
                                    echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td>
                        <td class="td-actions">
                             <a href="<?php echo base_url();?>admin/applications/<?php echo $key->id;?>" class="btn btn-sx btn-primary">
                                View Applications                                    
                            </a>

                            <a href="<?php echo base_url();?>admin/add_career/<?php echo $key->id;?>" class="btn btn-sx btn-info">
                                Edit                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_careers" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-sx btn-danger">
                                Delete                                       
                            </a>
                            <a href="<?php echo base_url();?>admin/interview2/<?php echo $key->id;?>" class="btn btn-sm btn-info"> Interview </a>
                            <a href="<?php echo base_url();?>admin/reject_applications2/<?php echo $key->id;?>" class="btn btn-sm btn-info"> Reject List</a>
                            <a href="<?php echo base_url();?>admin/interview_offer_letters2/<?php echo $key->id;?>" class="btn btn-sm btn-info"> Offer Letter</a>

                        </td>
                    </tr>
                <?php $i++; } } else { ?>

                    <tr class="gradeX">
                        <td class="center" colspan="4">No data found</td>
                    </tr>

                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    .btn {
    padding: 4px 19.5px !important;
    margin:2px 0;
}
    a.btn.btn-sx.btn-danger {
    padding: 4px 30.5px !important;
}
.table.table-bordered tr td {
    padding: 5px 10px 7px;  
}
@media only screen and (min-width: 1140px) {
  a.btn.btn-sx.btn-danger {
    padding: 4px 31px !important;
}
}
  </style>


