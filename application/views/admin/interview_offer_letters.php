  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Applicant ID</th>
                  <th>Employee Name</th>
                  <th>Job Location</th>
                  <th>Salary(Per Anum)</th>
                  <th>Designation</th>
                  <th>LEVEL</th>
                  <th>CONTACT NO</th>
                  <th>Date Of Joing</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($offer_letters){
                $i=1; foreach($offer_letters as $key){ ?>
                    <tr class="gradeX">
                        <td><?php echo $key->id;?></td>
                        <td><?php echo $key->applicant_id;?></td>
                        <td><?php echo $key->name;?></td>
                        <td><?php echo $key->location;?></td>
                        <td><?php echo $key->salary_per_anum;?></td>
                        <td><?php echo $key->designation;?></td>
                        <td><?php echo $key->level;?></td>
                        <td><?php echo $key->mobile;?></td>
                        <td> 
                            <?php   
                                    echo date('d M Y',strtotime($key->date));
                            ?>
                        </td>
                        <td class="td-actions">

                            <a href="<?php echo base_url();?>admin/offer_letter2/<?php echo $key->id;?>" class="btn btn-sx btn-success" target="_blank">
                                Generate                                       
                            </a>
                            

                            <a href="<?php echo base_url();?>admin/interview_issue_offer_letter/<?php echo $key->id;?>" class="btn btn-sx btn-info">
                                Edit                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_career_applications" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-sx btn-danger">
                                Delete                                       
                            </a>
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


