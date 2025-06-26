<style>

.row-fluid .span12 {
  margin-left:0 !important;
}
.btn span.glyphicon {         
  opacity: 0 !important;       
}
.btn.active span.glyphicon {        
  opacity: 1 !important;
}
</style>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Score</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if($applicants){
                $i=1; foreach($applicants as $key){ 

                  
                    ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $key->id;?></td>

                        <td><?php echo $key->name;?></td>
                        <td><?php echo $key->email;?></td>
                        <td><?php echo $key->mobile;?></td>
                        <td>
                          <?php 

                              $correct=0;
                              $userAnswers=$this->Common_M->get('tbl_exam_sheet','id','DESC','apply_id',$key->id);
                              foreach($userAnswers as $answer)
                              {
                                $ans=$this->Common_M->getSingleRow('tbl_options','id',$answer->option_id);
                                if($ans->isAnswer == 1)
                                {
                                  $correct++;
                                }
                              }
                              echo $correct.'/'.count($userAnswers);
                              
                          ?>
                        </td>
                        <td> 
                            <?php    
                                    $date=explode(' ',$key->created);
                                    echo date('d M Y',strtotime($date[0]));
                            ?>
                        </td>
                        
                        <td class="td-actions">
 

                            <a href="<?php echo base_url();?>admin/view_sheet/<?php echo $key->id;?>" class="btn btn-xs btn-info">
                                View                                       
                            </a>
                            
                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_applied_exams" data-returnURL="<?php echo $this->uri->segment(1);?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
                                Delete                                       
                            </a>
                        </td>
                    </tr>
                <?php $i++; } } else { ?>

                    <tr class="gradeX">
                        <td class="center" colspan="5">No data found</td>
                    </tr>

                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> 

<script type="text/javascript">
  function changeIt(val)
  {
    var status=$(val).val();
    var id=$(val).attr('data-id');
    window.location="<?php echo base_url();?>admin/changeStatus/"+status+'/'+id;
  }
</script>
