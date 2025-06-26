<style>
.introdoction-form{
	width:100%;
	float:left;
	padding:20px 0;
	text-align:center;
}
.introdoction-form form {
  width: 60%;
  margin: 10px auto;
  background: #efefef;
  padding: 60px 120px 80px 120px;
  text-align: center;
  -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
  box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}
.introdoction-form label {
  display: block;
  position: relative;
  margin: 40px 0px;
}
.introdoction-form .label-txt {
  position: absolute;
  top: -1.6em;
  padding: 10px;
  font-family: sans-serif;
  font-size: .8em;
  letter-spacing: 1px;
  color: rgb(120,120,120);
  transition: ease .3s;
}
.introdoction-form .input {
  width: 100%;
  padding: 10px;
  background: transparent;
  border: none;
  outline: none;
}

.introdoction-form .line-box {
  position: relative;
  width: 100%;
  height: 2px;
  background: #BCBCBC;
}

.introdoction-form .line {
  position: absolute;
  width: 0%;
  height: 2px;
  top: 0px;
  left: 50%;
  transform: translateX(-50%);
  background: #8BC34A;
  transition: ease .6s;
}

.introdoction-form .input:focus + .line-box .line {
  width: 100%;
}

.introdoction-form .label-active {
  top: -3em;
}

.introdoction-form button {
  display: inline-block;
  padding: 12px 24px;
  background: rgb(220,220,220);
  font-weight: bold;
  color: rgb(120,120,120);
  border: none;
  outline: none;
  border-radius: 3px;
  cursor: pointer;
  transition: ease .3s;
}

.introdoction-form button:hover {
  background: #8BC34A;
  color: #ffffff;
}
.introdoction-form h2{}
.introdoction-form p{}

</style>
<div class="introdoction-form" id="introdoction-form">
	<h2><?php echo $exam->title; ?></h2>

	<form id="detailForm" action="" method="post">
    <div class="alert alert-info" id="emailExists" style="display:none;">
      Oops! You've already applied
    </div>
	  <label>
	    <p class="label-txt">ENTER YOUR NAME</p>
	    <input type="text" name="name" class="input" autocomplete="off" required />
	    <div class="line-box">
	      <div class="line"></div>
	    </div>
	  </label>
	  <label>
	    <p class="label-txt">ENTER YOUR EMAIL</p>
	    <input type="email" name="email" class="input" autocomplete="off" required />
	    <div class="line-box">
	      <div class="line"></div>
	    </div>
	  </label>
	  <label>
	    <p class="label-txt">ENTER YOUR EXAM CODE</p>
	    <input type="text" name="code" class="input" autocomplete="off" required />
	    <div class="line-box">
	      <div class="line"></div>
	    </div>
	  </label>
	  <label>
	    <p class="label-txt">ENTER YOUR MOBILE</p>
	    <input type="tel" maxlength="10" name="mobile" class="input" autocomplete="off" required />
	    <div class="line-box">
	      <div class="line"></div>
	    </div>
	  </label>
	  <input type="hidden" name="hiddenExamId" value="<?php echo $exam->id;?>" requred/>
	  <button type="submit">Submit</button>
    <img style="height: 30px;display:none;" id="loading" src="http://www.canadianprincess.com/wp-content/themes/leisure-child/images/green_loading.gif" />
    <br />
    <small style="color:red">Note: Any suspicious activity will cancel the test.</small>
	</form>
  <div id="startTestDiv" style="display:none;">
    <br />
    <p><?php echo $exam->description;?></p>
    <a href="<?php echo base_url();?>test/<?php echo urlencode(base64_encode($exam->id));?>"><button class="btn btn-success">Start Test</button></a>
    <br /><br />
  </div>
</div>

<script>


$( "#detailForm" ).on( "submit", function( event ) {
  event.preventDefault();
	 $.ajax({
	   type: 'POST',
	   url: "<?php echo base_url(); ?>main/saveInformation",
	   data: $( this ).serialize(),  
	   beforeSend: function() {

          $("#loading").show();
       }, 
	   success: function(result){
          $("#loading").fadeOut();
          $( "#emailExists" ).fadeOut();
          console.log(result);
	      	if($.parseJSON(result) == 'dataSaved')
	      	{
                    $( "#detailForm" ).fadeOut();
                    $('#startTestDiv').fadeIn();
	      	} else if($.parseJSON(result) == 'applied')
                {
                    $( "#emailExists" ).fadeIn();
                } else if($.parseJSON(result) == 'not_valid_user')
                {
                    alert('Invalid details. Contact HR team.');
                }
	   }
	});


});

</script>
