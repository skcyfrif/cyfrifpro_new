<!DOCTYPE html>
<html lang="en">
<head>
        <title>Cyfrif Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-login.css" />
        <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
    <div class="main">
        <div id="loginbox" class="login-form">            
            <form id="loginform" class="form-vertical" action="" method="post">
				 <div class="control-group normal_text"> <h3><img style="height:75px;" src="<?php echo base_url();?>assets/images/LOGO.png" alt="Logo" /></h3></div>
                    <?php if($this->session->flashdata('success'))
                          {
                                  $msg = $this->session->flashdata('success');?>
                              <div class="alert alert-success alert-dismissible fade in col-md-12" data-dismiss="alert" role="alert">  <?php echo $msg; ?>
                          </div>
                    <?php } if($this->session->flashdata('error'))
                          {
                              $msg = $this->session->flashdata('error');?>
                              <div class="alert alert-danger alert-dismissible fade in col-md-12" data-dismiss="alert" role="alert">  <?php echo $msg; ?>
                          </div>
                    <?php } ?>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Username" name="email" autocomplete="off" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" autocomplete="off" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><button type="submit" class="btn btn-success" /> Explore</button></span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>
     </div>  
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>  
        <script src="<?php echo base_url();?>assets/js/matrix.login.js"></script> 
    </body>

</html>
