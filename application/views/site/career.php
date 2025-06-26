<style>
.list-data {
    background: #fff;
    border: 1px solid #e1e1e1;
    float: left;
    margin: 10px 0;
    padding: 20px 20px 10px;
    width: 100%;
}


/*MODAL*/
.center {
    margin-top:50px;   
}

.modal-header {
	padding-bottom: 5px;
}

.modal-footer {
    	padding: 0;
	}
    
.modal-footer .btn-group button {
	height:40px;
	border-top-left-radius : 0;
	border-top-right-radius : 0;
	border: none;
	border-right: 1px solid #ddd;
}
	
.modal-footer .btn-group:last-child > button {
	border-right: 0;
}
/*End MODAL*/

/*Title*/

h1 {
  margin-top: 5%;
  font-size: 2rem;
  display: inline-block;
  /*margin:auto;*/

}
h1 div {
  position: relative;
  float: left;
  text-align:center;
}
h1 div:first-child {
  color: #3498db;
/*  margin-right: 1rem;*/
}


</style>


<div class="container">

<h1>
  <div class="animated fadeInLeft" style="text-align:center;" >Current</div><div  style="text-align:center;" class="animated fadeInRight">Openings</div>
</h1>


<?php foreach($careers as $key){ ?>

	<div class="list-data">
	<div>
		<div class="row">
			<div class="col-md-1 col-sm-2 hidden-xs">
				<div class="company-logo">
					<a href="#"><img src="<?php echo base_url();?>assets/site/images/logo.png" alt="" class="sjb-img-responsive " id=""></a>
				</div>
			</div>
			<div class="col-md-11 col-sm-10 header-margin-top">
				<div class="row">
					<div class="col-md-5">
						<div class="job-info">
							<h4>
								<a style="color:#3498db;">
									<span class="job-title"><?php echo $key->title;?> </span> 
								</a>
							</h4>
							<span style="font-size:14px;"><i class="fa fa-money" aria-hidden="true"></i> &nbsp&nbsp<?php if($key->display_salary == 1) { echo ($key->salary) ? $key->salary : 'As Per Industry Standards'; } else { echo 'Not Disclosed'; } ?></span>
						</div>
					</div>
					<div class="col-md-2 col-sm-4"></div>
					<div class="col-md-2 col-sm-4 pull-right">
						<div class="job-location"><i class="fa fa-map-marker"></i>&nbsp<?php echo $key->location;?></div>
					</div>
					<div class="col-md-3 col-sm-4" style="display:none;">
						<div class="job-date"><i class="fa fa-calendar-check-o"></i>Posted 
						<?php    
                                    $date=explode(' ',$key->created);
                                    echo date('d M Y',strtotime($date[0]));
                            ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br /><br /><br />
	<div class="job-description">
		<p><?php echo $key->description;?></p><p><a onclick="putJobId(this)" data-id="<?php echo $key->id;?>" style="color:white;" data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary">Apply</a></p>
	</div>
	</div>

<?php } ?>

</div>



<!-- MODAL -->




<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			<form action="" method="post" id="apply-form" enctype="multipart/form-data" > 

			<p id="inforDiv"></p>
				
			<div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Enter Name" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email" required>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Mobile</label>
                <input type="text" maxlength="10" class="form-control" name="mobile" id="exampleInputEmail1" placeholder="Enter Mobile" required>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Resume</label>
                <input type="file" class="form-control" name="fileToUpload" id="exampleInputEmail1" required>
              </div>

              <input type="hidden" name="hiddenJobId" id="hiddenJobId" value="" required />

              <button type="submit" class="btn btn-success">Apply</button>
              <img id="loading" src="https://loading.io/spinners/rolling/lg.curve-bars-loading-indicator.gif" style="height:20px;width:20px;display:none;"  />
            </form>

		</div>
	</div>
  </div>
</div>

<!-- END MODAL -->

<script>

function putJobId(val)
{
	var job_id=$(val).attr('data-id');
	//alert(job_id);
	$('#hiddenJobId').val(job_id);
}


$( "#apply-form" ).on( "submit", function( event ) {
  event.preventDefault();
  //console.log( $( this ).serialize() );

  var formData = new FormData(this);

	 $.ajax({
	   	type: 'POST',
	   	url: "<?php echo base_url(); ?>main/career",
	 	data: formData,  // I WANT TO ADD EXTRA DATA + SERIALIZE DATA
	   	beforeSend: function() {

          	$("#loading").fadeIn();
       },
	   success: function(data){
	      	//console.log(data);
	      	$( "#apply-form" ).trigger("reset");
	      	$("#loading").fadeOut();
	      	$('#inforDiv').fadeIn();
	      	$('#inforDiv').html($.parseJSON(data));
	      	setTimeout(function(){ $('#inforDiv').fadeOut() }, 10000);

	   },
	   	cache: false,
        contentType: false,
        processData: false
	});

});

</script>