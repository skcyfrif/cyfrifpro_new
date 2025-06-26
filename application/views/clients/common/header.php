<!DOCTYPE html>
<html lang="en">
<head>
<title>Cyfrif Admin</title>

<?php //echo $_SERVER['REQUEST_URI']; ?>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-wysihtml5.css" />
<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<style>

.u-vmenu ul ul{
	display: none;
}
.u-vmenu ul {
    list-style: none;
    margin: 0px 0 0;
    padding: 0;
    /* position: absolute; */
    width: 220px;
    border-bottom: 1px solid #37414b;
}
.u-vmenu ul li {
    border-top: 1px solid #37414b;
    border-bottom: 1px solid #1f262d;
    display: block;
    position: relative;
}
.u-vmenu ul li a {
    padding: 10px 0 10px 15px;
    display: block;
    color: #939da8;
}
.u-vmenu ul li a i {
    margin-right: 10px;
}
.u-vmenu ul li a .label {
    background-color: #F66;
	margin: 0 20px 0 0;
    float: right;
    padding: 3px 5px 2px;
}
.u-vmenu ul li ul {
    background: #10736c;
}
.u-vmenu ul li ul li ul{
    background: #299a92;
}
.u-vmenu ul li ul li ul li ul{
    background: #299a92;
}
.u-vmenu ul li ul li ul li ul li ul{
    background: #299a92;
}
.u-vmenu ul li ul li ul li ul li ul li ul{
    background: #299a92;
}
.u-vmenu ul li ul li ul li ul li ul li ul li ul{
    background: #299a92;
}
.u-vmenu ul li ul li ul li ul li ul li ul li ul li ul{
    background: #1db7ac;
}
.u-vmenu ul li ul li a {
    color: #fff;
}


/*********************** PRE Loader  *******************************/

.loader{
    width: 30px;
    height: 30px;
    margin: 40px auto;
    transform: rotate(-45deg);
    font-size: 0;
    line-height: 0;
    animation: rotate-loader 5s infinite;
    padding: 10px;
    border: 1px solid #28b779;
}
.loader .loader-inner{
    position: relative;
    display: inline-block;
    width: 50%;
    height: 50%;
}
.loader .loading{
    position: absolute;
    background: #cf303d;
}
.loader .one{
    width: 100%;
    bottom: 0;
    height: 0;
    animation: loading-one 1s infinite;
}
.loader .two{
    width: 0;
    height: 100%;
    left: 0;
    animation: loading-two 1s infinite;
    animation-delay: 0.25s;
}
.loader .three{
    width: 0;
    height: 100%;
    right: 0;
    animation: loading-two 1s infinite;
    animation-delay: 0.75s;
}
.loader .four{
    width: 100%;
    top: 0;
    height: 0;
    animation: loading-one 1s infinite;
    animation-delay: 0.5s;
}
@keyframes loading-one {
    0% {
        height: 0;
        opacity: 1;
    }
    12.5% {
        height: 100%;
        opacity: 1;
    }
    50% {
        opacity: 1;
    }
    100% {
        height: 100%;
        opacity: 0;
    }
}
@keyframes loading-two {
    0% {
        width: 0;
        opacity: 1;
    }
    12.5% {
        width: 100%;
        opacity: 1;
    }
    50% {
        opacity: 1;
    }
    100% {
        width: 100%;
        opacity: 0;
    }
}
@keyframes rotate-loader {
    0% {
        transform: rotate(-45deg);
    }
    20% {
        transform: rotate(-45deg);
    }
    25% {
        transform: rotate(-135deg);
    }
    45% {
        transform: rotate(-135deg);
    }
    50% {
        transform: rotate(-225deg);
    }
    70% {
        transform: rotate(-225deg);
    }
    75% {
        transform: rotate(-315deg);
    }
    95% {
        transform: rotate(-315deg);
    }
    100% {
        transform: rotate(-405deg);
    }
}
.loadcustom{
  position: fixed;
    left: 0px;
    width: 100%;
    top: 50%;
    transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    z-index: 99999999;
}
/*********************** END PRE LOADER  *****************************/
</style>

</head>
<body>


<!-- ###########################  PRELOADER ################################# -->

<div class="container loadcustom" id="preloaderDiv">
    <div class="row">
        <div class="col-md-12">
            <div class="loader">
                <div class="loader-inner">
                    <div class="loading one"></div>
                </div>
                <div class="loader-inner">
                    <div class="loading two"></div>
                </div>
                <div class="loader-inner">
                    <div class="loading three"></div>
                </div>
                <div class="loader-inner">
                    <div class="loading four"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ###########################  END PRELOADER  ############################# -->


<!--Header-part-->
<div id="header">
  <h1><a href="/">Cyfrif</a></h1>
</div>
<!--close-Header-part--> 

<?php

//echo $_SERVER['REQUEST_URI'];

$uri3=$this->uri->segment(2);
$id='';
          if($this->session->userdata('client')){
            $type='client';
            $sessionName='business_name';
			$id=$this->session->userdata('client')['id'];
          }else if($this->session->userdata('admin')){
            $type='admin';
            $sessionName='name';
			$id=$this->session->userdata('admin')['id'];
          }else if($this->session->userdata('employee')){
            $type='employee';
            $sessionName='name';
			$id=$this->session->userdata('employee')['id'];
          }else if($this->session->userdata('hrms')){
            $type='hrms';
            $sessionName='name';
			$id=$this->session->userdata('hrms')['id'];
          }

?>

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
   <?php if($this->uri->segment(2) != 'addDetails'){ ?>

        <ul class="nav">
            <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $this->session->userdata($type)[$sessionName];?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url();?><?php echo $type;?>/my_profile"><i class="icon-user"></i> My Profile</a></li>
                <!-- <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> My Tasks</a></li> -->
                <li class="divider"></li>
                <li><a href="<?php echo base_url().$type;?>/logout"><i class="icon-key"></i> Log Out</a></li>
            </ul>
            </li>
            <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> New message</a></li>
                <li class="divider"></li>
                <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> Inbox</a></li>
                <!-- <li class="divider"></li>
                <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> utbox</a></li> -->
                <li class="divider"></li>
                <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> Trash</a></li>
            </ul>
            </li>
            <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
            <li class=""><a title="" href="<?php echo base_url().$type;?>/logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
        </ul>
        <?php } ?>
        </div>



 <?php if($this->uri->segment(2) != 'addDetails'){ ?>
    <!--start-top-serch-->
  <div id="search">
   <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
  </div>
 <?php } ?>

        <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-file"></i>Addons</a>







           <div class="u-vmenu">
                <ul>
                <?php if($this->uri->segment(2) != 'addDetails'){ //REtriction for external employee add details ?>
                    <li>
                        <a href="<?php echo base_url().$type;?>/dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a>
                    </li>

                    <?php if($this->session->userdata('employee') && ($this->uri->segment(2) != 'addDetails')){ ?>
                    <li>
                        <a href="<?php echo base_url();?>employee/add_details/<?php echo $this->session->userdata('employee')['id'];?>"><i class="icon icon-fullscreen"></i> <span>Add Details</span></a>
                    </li>
                    <?php } ?>

                    



                    <?php if($this->session->userdata('employee') ){ ?>
                        <li>
                        <a href="#"><i class="icon icon-th-list"></i> <span>Attendance</span><span class="label label-important">+</span></a>
                        <ul>
                            <li><a href="<?php echo base_url();?>hrms/career"><i class="icon icon-inbox"></i> <span>Daily Attendance</span></a> </li>
                            <li><a href="<?php echo base_url('employee/monthly_attendance'); ?>"><i class="icon icon-inbox"></i> <span>Monthly Attendance Report</span></a></li>
                            <li><a href="<?php echo base_url();?>hrms/applications"><i class="icon icon-inbox"></i> <span>Leave Request</span></a> </li>
                            <li><a href="<?php echo base_url();?>hrms/employees"><i class="icon icon-user"></i> <span>Monthly Payslip</span></a></li>
                            <li><a href="<?php echo base_url();?>hrms/interview"><i class="icon icon-user"></i> <span>YID Report (salary)</span></a></li>
                            <li><a href="<?php echo base_url();?>hrms/reject_applications"><i class="icon icon-user"></i> <span>Leave Balance Report</span></a></li>
                            <li><a href="<?php echo base_url();?>hrms/offer_letters"><i class="icon icon-user"></i> <span>Request/Feedback</span></a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon icon-th-list"></i> <span>Claim</span><span class="label label-important">+</span></a>
                        <ul>
                            <li><a href="<?php echo base_url();?>hrms/career"><i class="icon icon-inbox"></i> <span>Marketing Personal</span></a> </li>
                            <li><a href="<?php echo base_url();?>hrms/applications"><i class="icon icon-inbox"></i> <span>Full</span></a> </li>
                            <li><a href="<?php echo base_url();?>hrms/employees"><i class="icon icon-user"></i> <span>Halting</span></a></li>
                            <li><a href="<?php echo base_url();?>hrms/interview"><i class="icon icon-user"></i> <span>Fooding</span></a></li>
                            <li><a href="<?php echo base_url();?>hrms/reject_applications"><i class="icon icon-user"></i> <span>Cab/Tramp</span></a></li>
                        </ul>
                    </li>
                    <?php } ?>








                <?php if($this->session->userdata('hrms') && ($this->uri->segment(2) != 'addDetails')){ ?>
                    <li>
                        <a href="#"><i class="icon icon-th-list"></i> <span>HRMS</span><span class="label label-important">+</span></a>
                        <ul>
                            <li><a href="<?php echo base_url();?>hrms/career"><i class="icon icon-inbox"></i> <span>Add Job</span></a> </li>
                            <li><a href="<?php echo base_url();?>hrms/applications"><i class="icon icon-inbox"></i> <span>Applicant</span></a> </li>
                            <li><a href="<?php echo base_url();?>hrms/employees"><i class="icon icon-user"></i> <span>Employees</span></a></li>
                            <li><a href="<?php echo base_url();?>hrms/interview"><i class="icon icon-user"></i> <span>Interview Scheduled</span></a></li>
                            <li><a href="<?php echo base_url();?>hrms/reject_applications"><i class="icon icon-user"></i> <span>Reject Application</span></a></li>
                            <li><a href="<?php echo base_url();?>hrms/offer_letters"><i class="icon icon-user"></i> <span>Offer Letters</span></a> </li>
                            <li><a href="<?php echo base_url();?>hrms/manage_leave_requests"><i class="icon icon-user"></i> <span>Leave Report</span></a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon icon-th-list"></i> <span>Report</span><span class="label label-important">+</span></a>
                            <ul>
                                <li><a href="<?php echo base_url();?>client/career"><i class="icon icon-inbox"></i> <span>Employee List</span></a> </li>
                                <li><a href="<?php echo base_url();?>hrms/monthly_leave_report"><i class="icon icon-user"></i> <span>Leave Report</span></a></li>
                                <li><a href="<?php echo base_url();?>hrms/monthly_attendance_report"><i class="icon icon-user"></i> <span>Attendance Report</span></a></li>
                                <li><a href="<?php echo base_url();?>client/reject_applications"><i class="icon icon-user"></i> <span>Claim Report</span></a></li>
                                <li><a href="<?php echo base_url();?>hrms/feedback"><i class="icon icon-user"></i> <span>Request Report</span></a> </li>
                                <li><a href="<?php echo base_url();?>client/applicants"><i class="icon icon-user"></i> <span>Tour Report</span></a> </li>
                        </ul>
                    </li>

                <?php } ?>


       







        <?php 
        //var_dump($this->Employee_M->isLoggedIn());exit();
        if($this->session->userdata('admin')){ ?>
          <li>
				<a href="#"><i class="icon icon-th-list"></i> <span>Website</span><span class="label label-important">+</span></a>
				<ul>
                      <li><a href="<?php echo base_url();?>admin/menus">Services Menus</a></li>
                      <li><a href="<?php echo base_url();?>admin/sub_menus">Services Sub Menus</a></li>
                      <li><a href="<?php echo base_url();?>admin/careers">Career Data</a></li>
                      <li><a href="<?php echo base_url();?>admin/contact_data">Contact Data</a></li>
                      <!-- <li><a href="#">Social Shares</a></li> -->
                 </ul>
			</li>
        <?php } ?> 

        <?php if($this->session->userdata('admin')){ ?>
            <li><a href="<?php echo base_url();?>admin/clients_hrms"><i class="icon icon-user"></i> <span>Client HRMS</span></a></li>
        <?php } ?> 



        <?php if($this->session->userdata('admin')){ ?>
            <li>
                <a href="#"><i class="icon icon-th-list"></i> <span>HRMS</span><span class="label label-important">+</span></a>
                <ul>
                <?php //if($this->session->userdata('admin')){ ?>
                    <li><a href="<?php echo base_url();?>admin/designation_levels"><i class="icon icon-user"></i> <span>Designation Levels</span></a></li>
                    <li><a href="<?php echo base_url();?>admin/employees"><i class="icon icon-user"></i> <span>Employees</span></a></li>
                    <li> <a href="<?php echo base_url();?>admin/zone"><i class="icon icon-map-marker"></i> <span>Zones</span></a> </li>
                    <li><a href="<?php echo base_url();?>admin/exams"><i class="icon icon-user"></i> <span>Exams</span></a> </li>
                    <li><a href="<?php echo base_url();?>admin/questions"><i class="icon icon-user"></i> <span>Questions</span></a> </li>
                    <li><a href="<?php echo base_url();?>admin/reject_applications"><i class="icon icon-user"></i> <span>Reject Application</span></a></li>
                    <li><a href="<?php echo base_url();?>admin/interview"><i class="icon icon-user"></i> <span>Interview Scheduled</span></a></li>
                    <li><a href="<?php echo base_url();?>admin/applicants"><i class="icon icon-user"></i> <span>Applicants</span></a> </li>
                    <li><a href="<?php echo base_url();?>admin/offer_letters"><i class="icon icon-user"></i> <span>Offer Letters</span></a> </li>
                    <!-- <li><a href="<?php echo base_url();?>admin/applicants"><i class="icon icon-user"></i> <span>Applicants</span></a> </li> -->

                <?php //} ?>
               </ul>
            </li>

        <?php }elseif($this->session->userdata('client'))  { ?>

            <li>
                <a href="#"><i class="icon icon-th-list"></i> <span>HRMS</span><span class="label label-important">+</span></a>
                <ul>
                <?php //if($this->session->userdata('admin')){ ?>
                    <li><a href="<?php echo base_url();?>client/career"><i class="icon icon-inbox"></i> <span>Add Job</span></a> </li>
                    <li><a href="<?php echo base_url();?>client/employees"><i class="icon icon-user"></i> <span>Employees</span></a></li>
                    <li><a href="<?php echo base_url();?>client/interview"><i class="icon icon-user"></i> <span>Interview Scheduled</span></a></li>
                    <li><a href="<?php echo base_url();?>client/reject_applications"><i class="icon icon-user"></i> <span>Reject Application</span></a></li>
                    <li><a href="<?php echo base_url();?>client/offer_letters"><i class="icon icon-user"></i> <span>Offer Letters</span></a> </li>
                    <li><a href="<?php echo base_url();?>client/applicants"><i class="icon icon-user"></i> <span>Applicants</span></a> </li>
                    <!-- <li> <a href="<?php // echo base_url();?>admin/zone"><i class="icon icon-map-marker"></i> <span>Zones</span></a> </li> -->
                    <!-- <li><a href="<?php // echo base_url();?>admin/exams"><i class="icon icon-user"></i> <span>Exams</span></a> </li> -->
                    <!-- <li><a href="<?php // echo base_url();?>admin/questions"><i class="icon icon-user"></i> <span>Questions</span></a> </li> -->
                    
                    
                    
                    <!-- <li><a href="<?php echo base_url();?>admin/applicants"><i class="icon icon-user"></i> <span>Applicants</span></a> </li> -->

                <?php //} ?>
               </ul>
            </li>

        <?php } ?> 














        




        <?php if($this->session->userdata('client')){ //|| $this->session->userdata('admin') ?>
            <?php if($this->session->userdata('admin')){ ?>
                <li>
                    <a href="#"><i class="icon icon-th-list"></i> <span>Client Section</span><span class="label label-important">+</span></a>
                    <ul> 
            <?php } ?>


            <?php if($this->session->userdata('client')['actype']==3){ ?>
            <li><a href="#"><i class="icon icon-th-list"></i> <span>Inventory</span><span class="label label-important">+</span></a>
				<ul>
                	
                	<li><a href="<?php echo base_url();?>inventory/group-items"><i class="icon icon-inbox"></i> <span>Group Item</span></a> </li>
                    
            		<li><a href="<?php echo base_url();?>inventory/inventory"><i class="icon icon-inbox"></i> <span>Inventory List</span></a> </li>
                    
                    
                    
                     <li><a href="<?php echo base_url();?>inventory/brand"><i class="icon icon-inbox"></i> <span>Brand</span></a> </li>
                     
                      <li><a href="<?php echo base_url();?>inventory/manufacture"><i class="icon icon-inbox"></i> <span>Manufacture</span></a> </li>

                      <li><a href="<?php echo base_url();?>inventory/bom"><i class="icon icon-inbox"></i> <span>BOM</span></a> </li>
                    
                   <!-- <li><a href="<?php echo base_url();?>inventory/attribute"><i class="icon icon-inbox"></i> <span>Attribute</span></a> </li>
                    <li><a href="<?php echo base_url();?>Csv"><i class="icon icon-inbox"></i> <span>Block Upload</span></a> </li>-->
            	</ul>
             </li>  
             
             <?php }elseif($this->session->userdata('client')['actype']==2){ ?>
            <li><a href="#"><i class="icon icon-th-list"></i> <span>Inventory</span><span class="label label-important">+</span></a>
				<ul>
                	
                	<li><a href="<?php echo base_url();?>inventory/group-items"><i class="icon icon-inbox"></i> <span>Group Item</span></a> </li>
                    
            		<li><a href="<?php echo base_url();?>inventory/inventory"><i class="icon icon-inbox"></i> <span>Inventory List</span></a> </li>
                    
                    
                    
                     <li><a href="<?php echo base_url();?>inventory/brand"><i class="icon icon-inbox"></i> <span>Brand</span></a> </li>
                     
                      <li><a href="<?php echo base_url();?>inventory/manufacture"><i class="icon icon-inbox"></i> <span>Manufacture</span></a> </li>

                      <li><a href="<?php echo base_url();?>inventory/bom"><i class="icon icon-inbox"></i> <span>BOM</span></a> </li>
                    
                   <!-- <li><a href="<?php echo base_url();?>inventory/attribute"><i class="icon icon-inbox"></i> <span>Attribute</span></a> </li>
                    <li><a href="<?php echo base_url();?>Csv"><i class="icon icon-inbox"></i> <span>Block Upload</span></a> </li>-->
            	</ul>
             </li>  
             
            <?php }else{ ?>
            	<li><a href="#"><i class="icon icon-th-list"></i> <span>Inventory</span><span class="label label-important">+</span></a>
				<ul>
                	
                	<li><a href="<?php echo base_url();?>inventory/group-items"><i class="icon icon-inbox"></i> <span>Group Item</span></a> </li>
                    
            		<li><a href="<?php echo base_url();?>inventory/inventory"><i class="icon icon-inbox"></i> <span>Inventory List</span></a> </li>
                    
                    
                    
                     <li><a href="<?php echo base_url();?>inventory/brand"><i class="icon icon-inbox"></i> <span>Brand</span></a> </li>
                     
                      <li><a href="<?php echo base_url();?>inventory/manufacture"><i class="icon icon-inbox"></i> <span>Manufacture</span></a> </li>

                      <li><a href="<?php echo base_url();?>inventory/bom"><i class="icon icon-inbox"></i> <span>BOM</span></a> </li>
                    
                   <!-- <li><a href="<?php echo base_url();?>inventory/attribute"><i class="icon icon-inbox"></i> <span>Attribute</span></a> </li>
                    <li><a href="<?php echo base_url();?>Csv"><i class="icon icon-inbox"></i> <span>Block Upload</span></a> </li>-->
            	</ul>
             </li>  
            <?php } ?>













             <?php if($this->session->userdata('client')['actype']==3){ ?>
              <li><a href="<?php echo base_url();?>customer/customers"><i class="icon icon-user"></i> <span>Customers</span></a> </li>
              <li><a href="<?php echo base_url();?>client/sales_orders"><i class="icon icon-inbox"></i> <span>Sales Orders</span></a> </li>
              
             <li><a href="<?php echo base_url();?>client/manage_package"><i class="icon icon-inbox"></i> <span>Package</span></a> </li>
             <li><a href="<?php echo base_url();?>client/delivery_challans"><i class="icon icon-inbox"></i> <span>Delivery Challans</span></a> </li>
              <li><a href="<?php echo base_url();?>client/invoices"><i class="icon icon-inbox"></i> <span>Invoices</span></a> </li>
                      
            <li><a href="<?php echo base_url();?>client/payment_recieved"><i class="icon icon-inbox"></i> <span>Payment Recieved</span></a> </li>
            <li>
				<a href="#"><i class="icon icon-th-list"></i> <span>Return</span><span class="label label-important">+</span></a>
				<ul>            
            		<li><a href="<?php echo base_url();?>client/recurring_invoice"><i class="icon icon-inbox"></i> <span>Sale Return</span></a> </li>
                    <li><a href="<?php echo base_url();?>client/credit_notes"><i class="icon icon-inbox"></i> <span>Credit Notes</span></a> </li>
               </ul>
             </li>
             <li><a href="<?php echo base_url();?>client/vendors"><i class="icon icon-inbox"></i> <span>Vendors</span></a></li>  
             <li><a href="<?php echo base_url();?>client/purchase_orders"><i class="icon icon-inbox"></i> <span>Purchase Orders</span></a> </li>
              <li><a href="<?php echo base_url();?>client/bills"><i class="icon icon-inbox"></i> <span>Bills</span></a> </li>
              <li><a href="<?php echo base_url();?>client/feedback"><i class="icon icon-inbox"></i> <span>Feedback</span></a> </li>
              <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Payments Made</span></a> </li> 




             <?php }elseif($this->session->userdata('client')['actype']==2){ ?>
              <li><a href="<?php echo base_url();?>customer/customers"><i class="icon icon-user"></i> <span>Customers</span></a> </li>
              <li><a href="<?php echo base_url();?>client/sales_orders"><i class="icon icon-inbox"></i> <span>Sales Orders</span></a> </li>
              
             <li><a href="<?php echo base_url();?>client/manage_package"><i class="icon icon-inbox"></i> <span>Package</span></a> </li>
             <li><a href="<?php echo base_url();?>client/delivery_challans"><i class="icon icon-inbox"></i> <span>Delivery Challans</span></a> </li>
              <!-- <li><a href="<?php echo base_url();?>client/invoices"><i class="icon icon-inbox"></i> <span>Invoices</span></a> </li> -->
                      
            <!-- <li><a href="<?php echo base_url();?>client/payment_recieved"><i class="icon icon-inbox"></i> <span>Payment Recieved</span></a> </li> -->
            <li>
				<a href="#"><i class="icon icon-th-list"></i> <span>Return</span><span class="label label-important">+</span></a>
				<ul>            
            		<li><a href="<?php echo base_url();?>client/recurring_invoice"><i class="icon icon-inbox"></i> <span>Sale Return</span></a> </li>
                    <li><a href="<?php echo base_url();?>client/credit_notes"><i class="icon icon-inbox"></i> <span>Credit Notes</span></a> </li>
               </ul>
             </li>
             <li><a href="<?php echo base_url();?>client/vendors"><i class="icon icon-inbox"></i> <span>Vendors</span></a></li>  
             <li><a href="<?php echo base_url();?>client/purchase_orders"><i class="icon icon-inbox"></i> <span>Purchase Orders</span></a> </li>
              <li><a href="<?php echo base_url();?>client/bills"><i class="icon icon-inbox"></i> <span>Bills</span></a> </li>
              <li><a href="<?php echo base_url();?>client/feedback"><i class="icon icon-inbox"></i> <span>Feedback</span></a> </li>
             <!-- <li><a href="#"><i class="icon icon-inbox"></i> <span>Payments Made</span></a> </li>  -->





              
           <?php }else{ ?>





            <li><a href="<?php echo base_url();?>customer/customers"><i class="icon icon-user"></i> <span>Customers</span></a> </li>
              <li><a href="<?php echo base_url();?>client/sales_orders"><i class="icon icon-inbox"></i> <span>Sales Orders</span></a> </li>
              
             <li><a href="<?php echo base_url();?>client/delivery_challans"><i class="icon icon-inbox"></i> <span>Delivery Challans</span></a> </li>
              <li><a href="<?php echo base_url();?>client/invoices"><i class="icon icon-inbox"></i> <span>Invoices</span></a> </li>
                      
            <li><a href="<?php echo base_url();?>client/payment_recieved"><i class="icon icon-inbox"></i> <span>Payment Recieved</span></a> </li>
            <li>
				<a href="#"><i class="icon icon-th-list"></i> <span>Return</span><span class="label label-important">+</span></a>
				<ul>            
            		<li><a href="<?php echo base_url();?>client/recurring_invoice"><i class="icon icon-inbox"></i> <span>Sale Return</span></a> </li>
                    <li><a href="<?php echo base_url();?>client/credit_notes"><i class="icon icon-inbox"></i> <span>Credit Notes</span></a> </li>
               </ul>
             </li>
             <li><a href="<?php echo base_url();?>client/vendors"><i class="icon icon-inbox"></i> <span>Vendors</span></a></li>  
             <li><a href="<?php echo base_url();?>client/purchase_orders"><i class="icon icon-inbox"></i> <span>Purchase Orders</span></a> </li>
              <li><a href="<?php echo base_url();?>client/bills"><i class="icon icon-inbox"></i> <span>Bills</span></a> </li>
              
             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Payments Made</span></a> </li> 
             <li><a href="<?php echo base_url();?>client/feedback"><i class="icon icon-inbox"></i> <span>Feedback</span></a> </li>



              <!-- <li>
				<a href="#"><i class="icon icon-th-list"></i> <span>Sales</span><span class="label label-important">+</span></a>
				<ul>
                      <li><a href="<?php echo base_url();?>customer/customers"><i class="icon icon-user"></i> <span>Customers</span></a> </li>
                      <li><a href="<?php echo base_url();?>client/estimates"><i class="icon icon-inbox"></i> <span>Estimates</span></a> </li>
                      <li><a href="<?php echo base_url();?>client/sales_orders"><i class="icon icon-inbox"></i> <span>Sales Orders</span></a> </li>
                      <li><a href="<?php echo base_url();?>client/delivery_challans"><i class="icon icon-inbox"></i> <span>Delivery Challans</span></a> </li>
                      <li><a href="<?php echo base_url();?>client/invoices"><i class="icon icon-inbox"></i> <span>Invoices</span></a> </li>
                      
                       <li><a href="<?php echo base_url();?>client/payment_recieved"><i class="icon icon-inbox"></i> <span>Payment Recieved</span></a> </li>
                       <li><a href="<?php echo base_url();?>client/recurring_invoice"><i class="icon icon-inbox"></i> <span>Recurring Invoices</span></a> </li>
                      
                      <li><a href="<?php echo base_url();?>client/credit_notes"><i class="icon icon-inbox"></i> <span>Credit Notes</span></a> </li>
                 </ul>
			</li>
              <li>
				<a href="#"><i class="icon icon-th-list"></i> <span>Purchases</span><span class="label label-important">+</span></a>
				<ul>
                      <li><a href="<?php echo base_url();?>client/vendors"><i class="icon icon-inbox"></i> <span>Vendors</span></a></li>
                      <li><a href="<?php echo base_url();?>client/expenses"><i class="icon icon-inbox"></i> <span>Expenses</span></a> </li>
                      <li><a href="<?php echo base_url();?>client/recurring_expenses"><i class="icon icon-inbox"></i> <span>Recurring Expenses</span></a> </li>
                      <li><a href="<?php echo base_url();?>client/purchase_orders"><i class="icon icon-inbox"></i> <span>Purchase Orders</span></a> </li>
                      <li><a href="<?php echo base_url();?>client/bills"><i class="icon icon-inbox"></i> <span>Bills</span></a> </li>
                      <li><a href="<?php echo base_url();?>client/recurring_bills"><i class="icon icon-inbox"></i> <span>Recurring Bills</span></a> </li>
                      <li><a href="<?php echo base_url();?>client/vendor_credits"><i class="icon icon-inbox"></i> <span>Vendor Credits</span></a> </li>
                 </ul>
			</li> -->
            <?php } ?> 




















            
            <?php if($this->session->userdata('admin')){ ?>
                   </ul>
                </li>
            <?php } ?>
                <?php } ?>
                <?php //if($this->Admin_M->isLoggedIn() == TRUE || $this->Employee_M->isLoggedIn() == TRUE){ ?>




                <!-- <?php if($this->session->userdata('client')['actype']==1 && $this->session->userdata('client')['parent_id']==0 ){ ?>
            	<li>
				<a href="#"><i class="icon icon-th-list"></i> <span>Setting</span><span class="label label-important">+</span></a>
                    <ul>
                             <li><a href="<?php echo base_url();?>client/sub_users"><i class="icon icon-inbox"></i> <span>Sub User</span></a> </li>
                     </ul>
                </li>  
 				<?php }?> -->

                 <?php if($this->session->userdata('client')['actype']==1 && $this->session->userdata('client')['parent_id']==0 ){ ?>
                    <li>
				<a href="#"><i class="icon icon-th-list"></i> <span>Setting</span><span class="label label-important">+</span></a>
                    <ul>

                           <li><a href="<?php echo base_url();?>client/sub_users"><i class="icon icon-inbox"></i> <span>Sub User</span></a> </li>
                             <li><a href="<?php echo base_url();?>client/update-profile/<?php echo $id; ?>"><i class="icon icon-inbox"></i> <span>Organization Profile</span></a> </li>
                              <li><a href="<?php echo base_url();?>setting/user-role"><i class="icon icon-inbox"></i> <span>Users & Roles</span></a> </li>
                             <li><a href="<?php echo base_url();?>client/warehouse"><i class="icon icon-inbox"></i> <span>Warehouses</span></a> </li>
                              <li><a href="#"><i class="icon icon-th-list"></i> <span>Preferences</span><span class="label label-important">+</span></a>
                              	<ul>
                              		<li><a href="<?php echo base_url();?>preferences/general"><i class="icon icon-inbox"></i> <span>General</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/branding"><i class="icon icon-inbox"></i> <span>Branding</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/customers-and-vendors"><i class="icon icon-inbox"></i> <span>Customers and Vendors</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/items"><i class="icon icon-inbox"></i> <span>Items</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/sales-orders"><i class="icon icon-inbox"></i> <span>Sales Orders</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/shipments"><i class="icon icon-inbox"></i> <span>Shipments</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/delivery-challans"><i class="icon icon-inbox"></i> <span>Delivery Challans</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/invoices"><i class="icon icon-inbox"></i> <span>Invoices</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/credit-notes"><i class="icon icon-inbox"></i><span>Credit Notes</span></a> </li>                                                                    
                                     <li><a href="<?php echo base_url();?>preferences/payments-made"><i class="icon icon-inbox"></i><span>Payments Made</span></a> </li>-->
                                     <li><a href="<?php echo base_url();?>preferences/purchase-orders"><i class="icon icon-inbox"></i><span>Purchase Orders</span></a> </li>
                              	</ul>
                               </li>
                              <li><a href="<?php echo base_url();?>Clientstore/currency"><i class="icon icon-inbox"></i> <span>Currencies</span></a> </li>
                              <li><a href="#"><i class="icon icon-th-list"></i> <span>Taxes</span><span class="label label-important">+</span></a>
                              	<ul>
                              		<li><a href="<?php echo base_url();?>preferences/tax-rate"><i class="icon icon-inbox"></i> <span>Tax Rate</span></a> </li>
                              		<li><a href="<?php echo base_url();?>preferences/gst-setting"><i class="icon icon-inbox"></i> <span>GST Setting</span></a> </li>                              
                                </ul>
                               </li>
                            
                             <li><a href="<?php echo base_url();?>client/reports"><i class="icon icon-inbox"></i> <span>Reports</span></a> </li>
                              <li><a href="<?php echo base_url();?>client/account_types"><i class="icon icon-inbox"></i> <span>Account Types</span></a> </li>
                             <li><a href="<?php echo base_url();?>client/accounts"><i class="icon icon-inbox"></i> <span>Accounts</span></a> </li>
                              <li><a href="<?php echo base_url();?>Clientstore/sales_person"><i class="icon icon-inbox"></i> <span>Sales Person</span></a> </li>
                              <li><a href="<?php echo base_url();?>Clientstore/projects"><i class="icon icon-inbox"></i> <span>Projects</span></a> </li>
                              <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Payment Mode</span></a> </li>
                     </ul>
                </li>
 				<?php }?>





                 <?php if($this->session->userdata('client')['actype']==1 && $this->session->userdata('client')['parent_id']!=0 ){ ?>
                    <li>
				<a href="#"><i class="icon icon-th-list"></i> <span>Setting</span><span class="label label-important">+</span></a>
                    <ul>
                    
                             <li><a href="<?php echo base_url();?>client/update-profile/<?php echo $id; ?>"><i class="icon icon-inbox"></i> <span>Organization Profile</span></a> </li>
                              <li><a href="<?php echo base_url();?>setting/user-role"><i class="icon icon-inbox"></i> <span>Users & Roles</span></a> </li>
                             <li><a href="<?php echo base_url();?>client/warehouse"><i class="icon icon-inbox"></i> <span>Warehouses</span></a> </li>
                              <li><a href="#"><i class="icon icon-th-list"></i> <span>Preferences</span><span class="label label-important">+</span></a>
                              	<ul>
                              		<li><a href="<?php echo base_url();?>preferences/general"><i class="icon icon-inbox"></i> <span>General</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/branding"><i class="icon icon-inbox"></i> <span>Branding</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/customers-and-vendors"><i class="icon icon-inbox"></i> <span>Customers and Vendors</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/items"><i class="icon icon-inbox"></i> <span>Items</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/sales-orders"><i class="icon icon-inbox"></i> <span>Sales Orders</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/shipments"><i class="icon icon-inbox"></i> <span>Shipments</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/delivery-challans"><i class="icon icon-inbox"></i> <span>Delivery Challans</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/invoices"><i class="icon icon-inbox"></i> <span>Invoices</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/credit-notes"><i class="icon icon-inbox"></i><span>Credit Notes</span></a> </li>                                                                    
                                     <li><a href="<?php echo base_url();?>preferences/payments-made"><i class="icon icon-inbox"></i><span>Payments Made</span></a> </li>-->
                                     <li><a href="<?php echo base_url();?>preferences/purchase-orders"><i class="icon icon-inbox"></i><span>Purchase Orders</span></a> </li>
                              	</ul>
                               </li>
                              <li><a href="<?php echo base_url();?>Clientstore/currency"><i class="icon icon-inbox"></i> <span>Currencies</span></a> </li>
                              <li><a href="#"><i class="icon icon-th-list"></i> <span>Taxes</span><span class="label label-important">+</span></a>
                              	<ul>
                              		<li><a href="<?php echo base_url();?>preferences/tax-rate"><i class="icon icon-inbox"></i> <span>Tax Rate</span></a> </li>
                              		<li><a href="<?php echo base_url();?>preferences/gst-setting"><i class="icon icon-inbox"></i> <span>GST Setting</span></a> </li>                              
                                </ul>
                               </li>
                            
                             <li><a href="<?php echo base_url();?>client/reports"><i class="icon icon-inbox"></i> <span>Reports</span></a> </li>
                              <li><a href="<?php echo base_url();?>client/account_types"><i class="icon icon-inbox"></i> <span>Account Types</span></a> </li>
                             <li><a href="<?php echo base_url();?>client/accounts"><i class="icon icon-inbox"></i> <span>Accounts</span></a> </li>
                              <li><a href="<?php echo base_url();?>Clientstore/sales_person"><i class="icon icon-inbox"></i> <span>Sales Person</span></a> </li>
                              <li><a href="<?php echo base_url();?>Clientstore/projects"><i class="icon icon-inbox"></i> <span>Projects</span></a> </li>
                              <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Payment Mode</span></a> </li>
                     </ul>
                </li>
 				<?php }?>








                
                <!-- <?php// if($this->session->userdata('client')['actype']!=1){ ?> -->
                <?php if($this->session->userdata('client')['actype'] == 2 || $this->session->userdata('client')['actype'] == 3) { ?>

                <li>
				<a href="#"><i class="icon icon-th-list"></i> <span>Setting</span><span class="label label-important">+</span></a>
                    <ul>
                        <?php if($this->session->userdata('client')['parent_id']==0){?>
                             <li><a href="<?php echo base_url();?>client/sub_users"><i class="icon icon-inbox"></i> <span>Sub User</span></a> </li>
                          <?php } ?>  
                            
                             <li><a href="<?php echo base_url();?>client/update-profile/<?php echo $id; ?>"><i class="icon icon-inbox"></i> <span>Organization Profile</span></a> </li>
                              <li><a href="<?php echo base_url();?>setting/user-role"><i class="icon icon-inbox"></i> <span>Users & Roles</span></a> </li>
                             <li><a href="<?php echo base_url();?>client/warehouse"><i class="icon icon-inbox"></i> <span>Warehouses</span></a> </li>
                              <li><a href="#"><i class="icon icon-th-list"></i> <span>Preferences</span><span class="label label-important">+</span></a>
                              	<ul>
                              		<li><a href="<?php echo base_url();?>preferences/general"><i class="icon icon-inbox"></i> <span>General</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/branding"><i class="icon icon-inbox"></i> <span>Branding</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/customers-and-vendors"><i class="icon icon-inbox"></i> <span>Customers and Vendors</span></a> </li>
                                    <!--<li><a href="<?php echo base_url();?>preferences/approvals"><i class="icon icon-inbox"></i> <span>Approvals</span></a> </li>-->
                                    <li><a href="<?php echo base_url();?>preferences/items"><i class="icon icon-inbox"></i> <span>Items</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/sales-orders"><i class="icon icon-inbox"></i> <span>Sales Orders</span></a> </li>
                                    <!--<li><a href="<?php echo base_url();?>preferences/packages"><i class="icon icon-inbox"></i> <span>Packages</span></a> </li>-->
                                    <li><a href="<?php echo base_url();?>preferences/shipments"><i class="icon icon-inbox"></i> <span>Shipments</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/delivery-challans"><i class="icon icon-inbox"></i> <span>Delivery Challans</span></a> </li>
                                    <li><a href="<?php echo base_url();?>preferences/invoices"><i class="icon icon-inbox"></i> <span>Invoices</span></a> </li>
                                   <!-- <li><a href="<?php echo base_url();?>preferences/payments-received"><i class="icon icon-inbox"></i> <span>Payments Received</span></a> </li>-->
                                    <li><a href="<?php echo base_url();?>preferences/credit-notes"><i class="icon icon-inbox"></i><span>Credit Notes</span></a> </li>                                                                    
                                    <!-- <li><a href="<?php echo base_url();?>preferences/bills"><i class="icon icon-inbox"></i><span>Bills</span></a> </li>
                                     <li><a href="<?php echo base_url();?>preferences/payments-made"><i class="icon icon-inbox"></i><span>Payments Made</span></a> </li>-->
                                     <li><a href="<?php echo base_url();?>preferences/purchase-orders"><i class="icon icon-inbox"></i><span>Purchase Orders</span></a> </li>
                                     <!--<li><a href="<?php echo base_url();?>preferences/purchase-receives"><i class="icon icon-inbox"></i><span>Purchase Receives</span></a> </li>-->
                                   
                              	</ul>
                               </li>
                              <li><a href="<?php echo base_url();?>Clientstore/currency"><i class="icon icon-inbox"></i> <span>Currencies</span></a> </li>
                              <li><a href="#"><i class="icon icon-th-list"></i> <span>Taxes</span><span class="label label-important">+</span></a>
                              	<ul>
                              		<li><a href="<?php echo base_url();?>preferences/tax-rate"><i class="icon icon-inbox"></i> <span>Tax Rate</span></a> </li>
                              		<li><a href="<?php echo base_url();?>preferences/gst-setting"><i class="icon icon-inbox"></i> <span>GST Setting</span></a> </li>                              
                                </ul>
                               </li>
                             
                            <!-- <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Reporting Tags</span></a> </li>
                             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Templates</span></a> </li>
                             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Emails</span></a> </li>
                             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Automation</span></a> </li>                 
                             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Automation</span></a> </li> 
                             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Automation</span></a> </li> -->
                             <li><a href="<?php echo base_url();?>client/reports"><i class="icon icon-inbox"></i> <span>Reports</span></a> </li>
                              <li><a href="<?php echo base_url();?>client/account_types"><i class="icon icon-inbox"></i> <span>Account Types</span></a> </li>
                             <li><a href="<?php echo base_url();?>client/accounts"><i class="icon icon-inbox"></i> <span>Accounts</span></a> </li>
                              <li><a href="<?php echo base_url();?>Clientstore/sales_person"><i class="icon icon-inbox"></i> <span>Sales Person</span></a> </li>
                              <li><a href="<?php echo base_url();?>Clientstore/projects"><i class="icon icon-inbox"></i> <span>Projects</span></a> </li>
                              <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Payment Mode</span></a> </li>
                     </ul>
                </li>
                <?php } ?>





<?php if($this->session->userdata('admin')){ ?>
<li>
<a href="#"><i class="icon icon-th-list"></i> <span>Setting</span><span class="label label-important">+</span></a>
    <ul>
    <li><a href="<?php echo base_url();?>admin/account"><i class="icon icon-inbox"></i> <span>Account Type</span></a></li>
             <li><a href="<?php echo base_url();?>client/update-profile/<?php echo $id; ?>"><i class="icon icon-inbox"></i> <span>Organization Profile</span></a> </li>
              <li><a href="<?php echo base_url();?>setting/user-role"><i class="icon icon-inbox"></i> <span>Users & Roles</span></a> </li>
             <li><a href="<?php echo base_url();?>client/warehouse"><i class="icon icon-inbox"></i> <span>Warehouses</span></a> </li>
              <li><a href="#"><i class="icon icon-th-list"></i> <span>Preferences</span><span class="label label-important">+</span></a>
                  <ul>
                      <li><a href="<?php echo base_url();?>preferences/general"><i class="icon icon-inbox"></i> <span>General</span></a> </li>
                    <li><a href="<?php echo base_url();?>preferences/branding"><i class="icon icon-inbox"></i> <span>Branding</span></a> </li>
                    <li><a href="<?php echo base_url();?>preferences/customers-and-vendors"><i class="icon icon-inbox"></i> <span>Customers and Vendors</span></a> </li>
                    <!--<li><a href="<?php echo base_url();?>preferences/approvals"><i class="icon icon-inbox"></i> <span>Approvals</span></a> </li>-->
                    <li><a href="<?php echo base_url();?>preferences/items"><i class="icon icon-inbox"></i> <span>Items</span></a> </li>
                    <li><a href="<?php echo base_url();?>preferences/sales-orders"><i class="icon icon-inbox"></i> <span>Sales Orders</span></a> </li>
                    <!--<li><a href="<?php echo base_url();?>preferences/packages"><i class="icon icon-inbox"></i> <span>Packages</span></a> </li>-->
                    <li><a href="<?php echo base_url();?>preferences/shipments"><i class="icon icon-inbox"></i> <span>Shipments</span></a> </li>
                    <li><a href="<?php echo base_url();?>preferences/delivery-challans"><i class="icon icon-inbox"></i> <span>Delivery Challans</span></a> </li>
                    <li><a href="<?php echo base_url();?>preferences/invoices"><i class="icon icon-inbox"></i> <span>Invoices</span></a> </li>
                   <!-- <li><a href="<?php echo base_url();?>preferences/payments-received"><i class="icon icon-inbox"></i> <span>Payments Received</span></a> </li>-->
                    <li><a href="<?php echo base_url();?>preferences/credit-notes"><i class="icon icon-inbox"></i><span>Credit Notes</span></a> </li>                                                                    
                    <!-- <li><a href="<?php echo base_url();?>preferences/bills"><i class="icon icon-inbox"></i><span>Bills</span></a> </li>
                     <li><a href="<?php echo base_url();?>preferences/payments-made"><i class="icon icon-inbox"></i><span>Payments Made</span></a> </li>-->
                     <li><a href="<?php echo base_url();?>preferences/purchase-orders"><i class="icon icon-inbox"></i><span>Purchase Orders</span></a> </li>
                     <!--<li><a href="<?php echo base_url();?>preferences/purchase-receives"><i class="icon icon-inbox"></i><span>Purchase Receives</span></a> </li>-->
                   
                  </ul>
               </li>
              <li><a href="<?php echo base_url();?>Clientstore/currency"><i class="icon icon-inbox"></i> <span>Currencies</span></a> </li>
              <li><a href="#"><i class="icon icon-th-list"></i> <span>Taxes</span><span class="label label-important">+</span></a>
                  <ul>
                      <li><a href="<?php echo base_url();?>preferences/tax-rate"><i class="icon icon-inbox"></i> <span>Tax Rate</span></a> </li>
                      <li><a href="<?php echo base_url();?>preferences/gst-setting"><i class="icon icon-inbox"></i> <span>GST Setting</span></a> </li>                              
                </ul>
               </li>
             
            <!-- <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Reporting Tags</span></a> </li>
             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Templates</span></a> </li>
             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Emails</span></a> </li>
             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Automation</span></a> </li>                 
             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Automation</span></a> </li> 
             <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Automation</span></a> </li> -->
             <li><a href="<?php echo base_url();?>client/reports"><i class="icon icon-inbox"></i> <span>Reports</span></a> </li>
              <li><a href="<?php echo base_url();?>client/account_types"><i class="icon icon-inbox"></i> <span>Account Types</span></a> </li>
             <li><a href="<?php echo base_url();?>client/accounts"><i class="icon icon-inbox"></i> <span>Accounts</span></a> </li>
              <li><a href="<?php echo base_url();?>Clientstore/sales_person"><i class="icon icon-inbox"></i> <span>Sales Person</span></a> </li>
              <li><a href="<?php echo base_url();?>Clientstore/projects"><i class="icon icon-inbox"></i> <span>Projects</span></a> </li>
              <li><a href="<?php echo base_url();?>Clientstore/payment_mode"><i class="icon icon-inbox"></i> <span>Payment Mode</span></a> </li>
     </ul>
</li>
<?php } ?>












                <?php if($this->session->userdata('admin')){ ?>

                <li><a href="<?php echo base_url();?>admin/clients"><i class="icon icon-user"></i> <span>CYFRIF Clients</span></a> </li>
                <li> <a href="<?php echo base_url();?>admin/sales_report"><i class="icon icon-map-marker"></i> <span>Sales Report</span></a> </li>

                <?php }else if($this->session->userdata('employee')){ ?>

                <li><a href="<?php echo base_url();?>admin/clients/<?php echo $this->session->userdata('employee')['id'];?>"><i class="icon icon-user"></i> <span>My Clients</span></a> </li>

                <?php } ?>
                
                <?php if($this->session->userdata('admin')){ ?>
			    <!-- <li> <a href="#"><i class="icon icon-inbox"></i> <span>Service Request Status</span></a> </li> -->
                <li><a href="<?php echo base_url();?>admin/feedback_admin"><i class="icon icon-inbox"></i> <span>Feedback</span></a> </li>

                
                <!-- <li><a href="#"><i class="icon icon-th-list"></i> <span>Setting</span><span class="label label-important">+</span></a>
                	<ul>
                      <li><a href="<?php// echo base_url();?>admin/account"><i class="icon icon-inbox"></i> <span>Account Type</span></a></li>
                    </ul>  
                </li> -->

                <?php } ?>
                
				</li>
			</ul>
        <?php } // End restriction for external employee add ?>
		</div>
</div>

<div class="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url();?><?php echo $type;?>/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a class="current"><?php echo $panelTitle;?></a> </div>

<?php if($this->session->userdata('client') && $this->Common_M->checkInventoryAlertNeeded() && ($this->uri->segment(2) != 'inventory')){ ?>
        <div class="alert alert-danger alert-dismissable" id="inventoryAlert" role="alert" >
            <button type="button" style="top: 5px !important;" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span></button>
            <p class="alert-body" style="margin: 0px;">
            Inventory Needs Attention
            <a href="<?php echo base_url();?>inventory/inventory?serachfor=Stock Critically Low">&nbsp&nbsp
                <button style="border-radius:20px;" class="btn btn-sm btn-rounded">Visit <i style="font-size: 16px;color:#28b779;" class="fa fa-arrow-right" aria-hidden="true"></button></i>
            </a>
            </p>
        </div>
<?php } ?>

    <h1><?php echo $panelTitle;?></h1>
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
  </div>


