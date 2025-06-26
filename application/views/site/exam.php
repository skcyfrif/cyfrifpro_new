<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.demo {
  text-align: center;
  font-size: 20px;
  margin-top:0px;
}

/* The radio */
.radio {
 
     display: block;
    position: relative;
    padding-left: 40px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 18px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none
}

/* Hide the browser's default radio button */
.radio input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    display: none;
}

/* Create a custom radio button */
.checkround {

    position: absolute;
    top: 6px;
    left: 15px;
    height: 20px;
    width: 20px;
    background-color: #fff ;
    border-color:orange;
    border-style:solid;
    border-width:2px;
     border-radius: 50%;
}


/* When the radio button is checked, add a blue background */
.radio input:checked ~ .checkround {
    background-color: #fff;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkround:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.radio input:checked ~ .checkround:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.radio .checkround:after {
     left: 2px;
    top: 2px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background:#0055a5;
    
 
}
</style>
<?php 
    // echo '<pre>';
    // print_r($exam);exit();
    $total_time=$exam->time;
    $timer=date('Y-m-d H:i:s',strtotime('+'.$total_time.' minutes',strtotime($start_time))); 
    // echo $timer.'<br />';
    // echo $timerO;

    // $rawIds=explode(',',$exam->questions);
    // $questionIds=$rawIds;
?>
<input type="hidden" id="date" value="<?php echo $timer;?>" />

<div class="container" id="examBoard">
<p id="demo" class="demo pull-right"></p>
    <div class="col-md-12 row" style=" border: 0px solid black; margin-left: 0px;">
        <div  class="col-md-12" style=" border:0px solid red; border-radius: 2px;box-shadow: 1px 1px 1px 1px #e2e2e2;margin-top: 60px;">
        
            <?php 
            //var_dump($questionIds);
            for($i=0;$i<count($questionIds);$i++){ 

                $question=$this->Common_M->getSingleRow('tbl_questions','id',$questionIds[$i]);
                $answers=$this->Common_M->get('tbl_options','id','ASC','question_id',$question->id);

            ?>
            <p style="font-size: 22px;">Q. <?php echo $question->question;?></p></div>
            <br />
            <form action="" method="post" style="border: 0px solid green;margin-top: 10px;">
                
                <?php foreach($answers as $key){ ?>
                    <label class="radio"><?php echo $key->option_name;?>
                      <input type="radio" onchange="allowSubmit(this)" value="<?php echo $key->id;?>" name="ans">
                      <span class="checkround"></span>
                    </label>
                <?php } ?>
                <br />
                    <input type="hidden" name="h_question_id" value="<?php echo $questionIds[$i];?>" />
                    <!-- <input type="hidden" name="h_index_id" value="<?php  //echo $i;?>" /> -->
                    <input class="btn btn-success" style="margin-left: 15px;" type="submit" id="submit" name="submit" value="Save & Next" disabled />

               
            </form>
             <?php break; } ?>
            <br />
        </div>

    </div>
    </div>
</div>

<br /><br />
<script>

var date=document.getElementById("date").value;

//alert(date);
    // Set the date we're counting down to
    

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get todays date and time
    var countDownDate = new Date(date).getTime();
    var now = (new Date()).getTime();

    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    // document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    // + minutes + "m " + seconds + "s ";

    document.getElementById("demo").innerHTML = "Time Left: " + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "TIME OUT";
        document.getElementById("examBoard").innerHTML = "<h3 slign='center'>Exam Over. Redirecting....</h3>";
        window.location="<?php echo base_url();?>completed";
    }
}, 1000);

function allowSubmit()
{
    $('#submit').prop('disabled',false);
}

</script>