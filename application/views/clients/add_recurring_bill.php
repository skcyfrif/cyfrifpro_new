
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
</style>
<body onload="doThis()">
<div class="container-fluid" >
    <div class="row-fluid">
      <div class="span12">
       <!--  <a href="<?php echo base_url();?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Recurring Bill</h5>
          </div>
          <div class="widget-content nopadding">
    <form action="" method="post">
        <div class="span6">
            <div class="control-group">
              <label class="control-label">Vendor Name</label>
              <div class="controls">
               <!--  <input type="text" class="span10" name="name" placeholder="Name" value="<?php echo $this_element->vendor;?>" required/> -->
                <select id="name" onchange="openUrl(this)" name="name" class="span12" required>
                  <?php if($vendors){ foreach($vendors as $key){ 

                        $isSelected=($this_element->vendor == $key->name) ? 'selected' : '';
                    ?>

                      <option value="<?php echo $key->name;?>:<?php echo $key->id;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                  <?php } } else { echo '<option value="" >Select vendor</option>' ; } ?>
                      <option value="govendor" style="font-weight: bold">+ Add</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Profile Name</label>
              <div class="controls">
                <input type="text" class="span12" name="profile_name" placeholder="Profile Name" value="<?php echo $this_element->profile_name;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Repeat Every</label>
              <div class="controls">
                <select class="span12" name="repeat_every" required>
                  <?php foreach($time as $key){ 

                      $isSelected=($this_element->repeat_every == $key->value) ? 'selected' : '';
                  ?>

                    <option value="<?php echo $key->value;?>" <?php echo $isSelected; ?> ><?php echo $key->value;?></option>

                  <?php } ?>
                </select>
              </div>
            </div>
            <br /><br />
        </div>
        <div class="span6">
            <div class="control-group">
              <label class="control-label">Date</label>
              <div class="controls">
                <input type="date" class="span12" name="date" value="<?php echo $this_element->date;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">End Date</label>
              <div class="controls">
                <input type="date" class="span12" name="end_date" value="<?php echo $this_element->end_date;?>" autocomplete="off" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Terms</label>
              <div class="controls">
                <!-- <input type="text" class="span10" name="terms" placeholder="Terms" value="<?php echo $this_element->terms;?>" required/> -->
                <select id="terms" onchange="openUrl(this)" name="term" class="span12" required>
                    <?php if($terms){ foreach($terms as $key){ 

                          $isSelected=($this_element->term == $key->name) ? 'selected' : '';
                      ?>

                        <option value="<?php echo $key->name;?>" <?php echo $isSelected;?>><?php echo $key->name;?></option>

                    <?php } } else { echo '<option value="" >Select Term</option>' ; } ?>
                    <option value="goTerm" style="font-weight: bold">+ Add</option>
                </select>
              </div>
            </div>
            <br />
        </div>

        <!-- *************  TABLE SECTION  ***************** -->

          <?php $this->load->view('clients/dynamic_product'); ?>

        <!-- *************  END TABLE SECTION  ***************** -->
      
    </div>
  </div>
</div>

<input type="hidden" id="totalProducts" value="<?php echo count($products);?>" />

<input type="hidden" value="0" id="currentSelected" />

<script type="text/javascript">
    
function doThis()
{
    //alert('ok');
    calc();
    calc_total();
}

function openUrl(val)
{
  var goUrl=$(val).val();

  if(goUrl == 'goCustomer')
  {
      var gUrl='<?php echo base_url().'customer/add_customer?redirect='.$_URL_add_recurring_bill;?>';
      //window.open(goUrl, '_blank');
      window.location=gUrl;
  } 
  else if(goUrl == 'goTerm')
  {
    var gUrl='<?php echo base_url().'admin/terms?redirect='.$_URL_add_recurring_bill;?>';
    //window.open(gUrl, '_blank');
    window.location=gUrl;
  }
  else if(goUrl == 'govendor')
  {
      var gUrl='<?php echo base_url().'client/add_vendor?redirect='.$_URL_add_recurring_bill;?>';
      //window.open(goUrl, '_blank');
      window.location=gUrl;
  }
}
function goToInventory()
{
  var gUrl='<?php echo base_url().'inventory/add_inventory?redirect='.$_URL_add_recurring_bill;?>';
  window.open(gUrl, '_blank');
  //window.location=gUrl;
}

function getData(val)
{   
    var keyword=$(val).val();
    var id=$(val).attr('data-id');
    $('#currentSelected').val(id);
     var listId='#list'+id;
      var priceId='price'+id;
      var tax='tax'+id;
      var unit='unit'+id;
      var hsn='hsn'+id;
    //console.log(id);
    //alert(keyword);
    var listId='#list'+id;
    if(keyword != '')  
    {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url();?>client/getData",
            data:{keyword:keyword,callForData:'getData'},
            success: function(data){
              //$(listId).fadeIn();
              //$(listId).html(data);
                //var iTitle=$(val).text();
                var itax=$(val).attr('data-tax');
                var iunit=$(val).attr('data-unit');
                var ihsn=$(val).attr('data-hsn');
                var iPrice=$(val).attr('data-sprice');
                //console.log(iPrice);
                //$('[data-id='+id+']').val(iTitle);
                $('[data-tax='+tax+']').val(data.tax);
                $('[data-punit='+unit+']').val(data.unit);
                $('[data-phsn='+hsn+']').val(data.hsn);
                $('[data-pid='+priceId+']').val(data.sprice);
                if(data.type=="Service"){
                   $('[data-pid='+priceId+']').removeAttr('readonly');
                }

              calc();
            }
        });
    }
    else
    {
      $(listId).html('');
      $(listId).fadeOut(); 
    }
}

</script>

