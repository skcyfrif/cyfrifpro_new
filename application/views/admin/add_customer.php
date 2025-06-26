<style>
.control-group{
    margin: 10px !important;
}

.container{
    direction: rtl;
}
.navtop{
    margin-top:50px;
}
.tab-content {
    padding: 40px;
    margin-top: -20px; 
}
</style>

<div class="container-fluid" >
    <div class="row-fluid">
      <div class="span12">
       <!--  <a href="<?php echo base_url();?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List</h5>
          </div>
          <div class="widget-content nopadding">
    <form action="" method="post">
        <div class="span6">
            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->name;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="email" class="span10" name="email" placeholder="Email" value="<?php echo $this_element->email;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile</label>
              <div class="controls">
                <input type="tel" class="span10" maxlength="10" name="mobile" placeholder="Mobile" value="<?php echo $this_element->mobile;?>" required/>
              </div>
            </div>
        </div>
        <div class="span6">
            <div class="control-group">
              <label class="control-label">Website</label>
              <div class="controls">
                <input type="text" class="span10" name="website" placeholder="Terms" value="<?php echo $this_element->website;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Date</label>
              <div class="controls">
                <input type="date" class="span10" name="date" value="<?php echo $this_element->date;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Due Date</label>
              <div class="controls">
                <input type="date" class="span10" name="due_date" value="<?php echo $this_element->due_date;?>" required/>
              </div>
            </div>
        </div>
        <div class="span12" style="margin-left:0px !important;">
            <div class="control-group">
              <label class="control-label">Billing Address</label>
              <div class="controls">
                <textarea class="span11" name="billing_address" placeholder="Billing Address" required><?php echo $this_element->billing_address;?></textarea>
              </div>
            </div>
        </div>

        <div class="container">
			<ul class="nav nav-pills nav-fill navtop">
		        <li class="nav-item">
		            <a class="nav-link active" href="#menu1" data-toggle="tab">پرسش ها</a>
		        </li>
		        <li class="nav-item">
		            <a class="nav-link" href="#menu2" data-toggle="tab">پاسخ ها</a>
		        </li>
		        <li class="nav-item">
		            <a class="nav-link" href="#menu3" data-toggle="tab">نظرات</a>
		        </li>
		    </ul>
		    <div class="tab-content float-right">
		        <div class="tab-pane active" role="tabpanel" id="menu1">Created By Cytus ۱</div>
		        <div class="tab-pane" role="tabpanel" id="menu2">Created By Cytus ۲</div>
		        <div class="tab-pane" role="tabpanel" id="menu3">Created By Cytus ۳</div>
		    </div>
		</div>

    </div>
  </div>
</div>


