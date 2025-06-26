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
                    <h5>Add Applicant in exam</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="#" method="post" class="form-horizontal">

                        <input type="hidden" name="exam_id" value="<?= $exam_id; ?>" />
                        <div class="control-group">
                            <label class="control-label">Applicant Email</label>
                            <div class="controls">
                                <input type="email" class="span11" name="user_email" placeholder="Enter Email" required/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">One time code</label>
                            <div class="controls">
                                <input type="text" class="span11" name="code" placeholder="Enter Appear code" value="CYF<?= rand(1111, 9999); ?>" required/>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="<?php echo base_url(); ?>admin/exams"><button type="button" class="btn btn-sm btn-info">Back</button></a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="span12" style="margin: 0;">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Applicant list</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Email</th>
                  <th>Code</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($applicant_list){
                $i=1; 
                foreach($applicant_list as $key){
                    if($key->exam_id == $exam_id){
                    ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $i;?></td>
                        <td><?php echo $key->user_email;?></td>
                        <td><?php echo $key->code;?></td>                      
                        <td class="td-actions">                           
                            <a href="<?=base_url()."admin/delete_assign_to_applicant/".$exam_id."/".$key->id;?>" class="btn btn-sx btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php $i++; } }
                }else { ?>

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

