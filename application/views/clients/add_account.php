<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
.control-group{
    margin: 10px !important;
}

.list-unstyled{
	   color: #000;
    text-align: left;
    padding: 5px 10px;
    font-size: 14px;
    border-bottom: 1px dotted #a3b5e0;
    list-style:none;
}
.liClass{
      background-color: #eaf5f4;
    padding: 2px;
    margin-bottom: 2px;
    margin-left: -17%;
    border: 1px solid blue;
    cursor: pointer;
}
.addLinkC{
  margin-top:2px;
  margin-left:-17%;
}

.opc input[type=checkbox] {
    opacity: 1 !important;
    margin-top: -315% !important;
    margin-right: -1000% !important;
}
</style>
<body onload="doThis()">
<div class="container-fluid" >
    <div class="row-fluid">
      <div class="span12">
       <!--  <a href="<?php echo base_url();?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Account</h5>
          </div>
          <div class="widget-content nopadding">
    <form action="" method="post">
        <div class="span6">
            <div class="control-group">
              <label class="control-label">Account Type</label>
              <div class="controls">
                <select id="name" name="type_id" class="span12" required>
                  <?php if($account_types){ foreach($account_types as $key){ 

                        $isSelected=($this_element->type_id == $key->id) ? 'selected' : '';
                    ?>

                      <option value="<?php echo $key->id;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                  <?php } } else { echo '<option value="" >Select type</option>' ; } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Account Name</label>
              <div class="controls">
                <input type="text" class="span12" name="name" placeholder="Account Name" value="<?php echo $this_element->name;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Code</label>
              <div class="controls">
                <input type="text" class="span12" name="code" placeholder="Code" value="<?php echo $this_element->code;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sub Account</label>
              <div class="controls opc">
                <input type="checkbox" class="span12" onchange="displayParent(this)" name="sub_account" value="1" <?php echo ($this_element->sub_account== 1) ? 'checked' : '';?> />
              </div>
            </div>
            <div class="control-group" style="display:<?php echo ($this_element->sub_account == 1) ? 'block' : 'none';?>" id="parent_account">
              <label class="control-label">Parent Account</label>
              <div class="controls">
                <select id="name" name="parent_account" class="span12" required>
                  <?php if($account_types){ foreach($account_types as $key){ 

                        $isSelected=($this_element->parent_account == $key->id) ? 'selected' : '';
                    ?>

                      <option value="<?php echo $key->id;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                  <?php } } else { echo '<option value="" >Select type</option>' ; } ?>
                </select>
              </div>
            </div>
            <br>
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
                <textarea class="span12" name="description" placeholder="Description" required=""><?php echo $this_element->description;?></textarea>
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <input type="submit" class="btn btn-success" name="submit" value="Save" />
              </div>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  
  function displayParent(val)
  {
    if($('input[name="sub_account"]:checked').length > 0)
    {
        $('#parent_account').fadeIn();
    }
    else
    {
        $('#parent_account').fadeOut();
    }
  }
</script>

