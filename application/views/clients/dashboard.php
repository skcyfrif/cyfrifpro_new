<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 

$due_per=ceil(($due/$total)*100);
$received_per=ceil(($received/$total)*100);
$deposited_per=ceil(($deposited/$total)*100);

?>

<?php if($this->session->userdata('client')['actype']==1){ ?>

  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lo"> <a href="<?php echo base_url();?>customer/customers"> <i class="icon-group"></i> Customers </a> </li>
      <li class="bg_lb"> <a href="<?php echo base_url();?>client/vendors"> <i class="icon-dashboard"></i> Vendors </a> </li>
      <li class="bg_lg"> <a href="<?php echo base_url();?>client/invoices"> <i class="icon-shopping-cart"></i> Invoices</a> </li>
      <li class="bg_ly"> <a href="<?php echo base_url();?>client/reports"> <i class=" icon-globe"></i> Reports </a> </li>
      <li class="bg_ls"> <a href="<?php echo base_url();?>inventory/inventory"> <i class="icon-signal"></i> Inventory</a> </li>
    </ul>
  </div>

  <?php }elseif ($this->session->userdata('client')['actype']==3) { ?>

    <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lo"> <a href="<?php echo base_url();?>customer/customers"> <i class="icon-group"></i> Customers </a> </li>
      <li class="bg_lb"> <a href="<?php echo base_url();?>client/vendors"> <i class="icon-dashboard"></i> Vendors </a> </li>
      <li class="bg_lg"> <a href="<?php echo base_url();?>client/invoices"> <i class="icon-shopping-cart"></i> Invoices</a> </li>
      <li class="bg_ly"> <a href="<?php echo base_url();?>client/reports"> <i class=" icon-globe"></i> Reports </a> </li>
      <li class="bg_ls"> <a href="<?php echo base_url();?>inventory/inventory"> <i class="icon-signal"></i> Inventory</a> </li>
    </ul>
  </div>

    <?php }else { ?>

      <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lo"> <a href="<?php echo base_url();?>customer/customers"> <i class="icon-group"></i> Customers </a> </li>
      <li class="bg_lb"> <a href="<?php echo base_url();?>client/vendors"> <i class="icon-dashboard"></i> Vendors </a> </li>
      <li class="bg_ly"> <a href="<?php echo base_url();?>client/reports"> <i class=" icon-globe"></i> Reports </a> </li>
      <li class="bg_ls"> <a href="<?php echo base_url();?>inventory/inventory"> <i class="icon-signal"></i> Inventory</a> </li>
    </ul>
  </div>

      <?php } ?>



  <div class="container-fluid">
    <div class="row-fluid">

      <!-- <div class="span6">
        <div class="widget-box"> -->


          <!-- <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Last Three Invoice Status</h5>
          </div> -->


          <!-- <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="<?php echo base_url();?>assets/images/demo/av1.jpg"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="<?php echo base_url();?>assets/images/demo/av2.jpg"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="<?php echo base_url();?>assets/images/demo/av4.jpg"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.Itaffle to pad out the comment.</a> </p>
                </div>
              <li>
                <button class="btn btn-warning btn-mini">View All</button>
              </li>
            </ul>
          </div> -->


        <!-- </div>
        <div class="widget-box"> -->


          <!-- <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>To Do list</h5>
          </div> -->


          <!-- <div class="widget-content">
            <div class="todo">
              <ul>
                <li class="clearfix">
                  <div class="txt"> Luanch This theme on Themeforest <span class="by label">Nirav</span> <span class="date badge badge-important">Today</span> </div>
                  <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
                </li>
                <li class="clearfix">
                  <div class="txt"> Manage Pending Orders <span class="by label">Alex</span> <span class="date badge badge-warning">Today</span> </div>
                  <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
                </li>
                <li class="clearfix">
                  <div class="txt"> MAke your desk clean <span class="by label">Admin</span> <span class="date badge badge-success">Tomorrow</span> </div>
                  <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
                </li>
                <li class="clearfix">
                  <div class="txt"> Today we celebrate the great looking theme <span class="by label">Admin</span> <span class="date badge badge-info">08.03.2013</span> </div>
                  <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
                </li>
                <li class="clearfix">
                  <div class="txt"> Manage all the orders <span class="by label">Mark</span> <span class="date badge badge-info">12.03.2013</span> </div>
                  <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
                </li>
              </ul>
            </div>
          </div> -->


        <!-- </div>
      </div> -->

      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>Invoice Status</h5>
          </div>
          <div class="widget-content">
            <ul class="unstyled">
              <li> <span class="icon24 icomoon-icon-arrow-down-2 red"></span> Due <span class="pull-right strong"><i class="fa fa-rupee"></i><?php echo ' '.round($due, 2);;?></span>
                <div class="progress progress-warning progress-striped ">
                  <div style="width: <?php echo $due_per;?>%;" class="bar"></div>
                </div>
              </li>
              <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Received<span class="pull-right strong"><i class="fa fa-rupee"></i><?php echo ' '.round($received, 2);?></span>
                <div class="progress progress-striped ">
                  <div style="width: <?php echo $received_per;?>%;" class="bar"></div>
                </div>
              </li>
              <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Deposited <span class="pull-right strong"><i class="fa fa-rupee"></i><?php echo ' '.round($deposited, 2);?></span>
                <div class="progress progress-success progress-striped ">
                  <div style="width: <?php echo $deposited_per;?>%;" class="bar"></div>
                </div>
              </li>
              <!-- <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> 3% Online Users <span class="pull-right strong">8</span>
                <div class="progress progress-danger progress-striped ">
                  <div style="width: 3%;" class="bar"></div>
                </div>
              </li> -->
            </ul>
          </div>
        </div>
        <div class="widget-box">


          <!-- <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>News updates</h5>
          </div> -->


          <!-- <div class="widget-content nopadding updates collapse in" id="collapseG3">
            <div class="new-update clearfix"><i class="icon-ok-sign"></i>
              <div class="update-done"><a title="" href="#"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></a> <span>dolor sit amet, consectetur adipiscing eli</span> </div>
              <div class="update-date"><span class="update-day">20</span>jan</div>
            </div>
            <div class="new-update clearfix"> <i class="icon-gift"></i> <span class="update-notice"> <a title="" href="#"><strong>Congratulation Maruti, Happy Birthday </strong></a> <span>many many happy returns of the day</span> </span> <span class="update-date"><span class="update-day">11</span>jan</span> </div>
            <div class="new-update clearfix"> <i class="icon-move"></i> <span class="update-alert"> <a title="" href="#"><strong>Maruti is a Responsive Admin theme</strong></a> <span>But already everything was solved. It will ...</span> </span> <span class="update-date"><span class="update-day">07</span>Jan</span> </div>
            <div class="new-update clearfix"> <i class="icon-leaf"></i> <span class="update-done"> <a title="" href="#"><strong>Envato approved Maruti Admin template</strong></a> <span>i am very happy to approved by TF</span> </span> <span class="update-date"><span class="update-day">05</span>jan</span> </div>
            <div class="new-update clearfix"> <i class="icon-question-sign"></i> <span class="update-notice"> <a title="" href="#"><strong>I am alwayse here if you have any question</strong></a> <span>we glad that you choose our template</span> </span> <span class="update-date"><span class="update-day">01</span>jan</span> </div>
          </div> -->


        </div>
      </div>
    </div>
    <hr>
  </div>
  <style>
    .quick-actions li {
    min-width: 24%;
    min-height: 70px;
}
  </style>
  

