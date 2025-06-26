<style>

.mainDiv{
  margin-left:30px;
}

</style>
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List </h5><span class="pull-right" style="margin-right:10px;"><span style="color:red;"><b>•</b>&nbsp</span>Wrong&nbsp&nbsp<span style="color:green;"><b>•</b>&nbsp</span>Correct</span>
          </div>
          <div class="mainDiv">
            <?php foreach($questions as $key){ 


              $question=$this->Common_M->getSingleRow('tbl_questions','id',$key->question_id);
              $option=$this->Common_M->getSingleRow('tbl_options','id',$key->option_id);
              if($option->isAnswer == 1)
              {
                $color='green';
              }
              else
              {
                $color='red';
              }
            ?>

              <h5><?php echo 'Q. '.$question->question;?></h5>
              <p><?php echo 'Ans. <span style="color:'.$color.';">'.$option->option_name.'</span>';?></p>

              <?php } ?>
                    <br /><br />

          </div>
      </div>

    </div>
  </div>
</div> 


