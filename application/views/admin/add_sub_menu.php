
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Menu Details</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Sub Menu Title</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Sub Menu Title" value="<?php echo $this_element->name;?>" required/>
              </div>
              <p id="alertDiv"></p>
            </div>
            <div class="control-group">
              <label class="control-label">Menu</label>
              <div class="controls">
                <select type="text" class="span11" name="menu_id" required>
                    
                    <?php foreach($menus as $key){ 

                            $is_selected=($key->id == $this_element->menu_id) ? 'selected' : '';

                    ?>
                    <option value="<?php echo $key->id; ?>" <?php echo $is_selected;?> ><?php echo $key->name; ?><option>
                    <?php } ?>
                </select>
              </div>
            </div>
            <div class="control-group" style="margin-right:7%;">
              <label class="control-label">Content</label>
              <div class="controls">
                 <textarea class="span11" name="content" rows="20"><?php echo $this_element->content;?></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
              <a href="<?php echo base_url();?>admin/sub_menus"><button type="button" class="btn btn-sm btn-info">Back</button></a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.tiny.cloud/1/9rqr173kezhhcyufrppxl1ju8s9059f5vrppqcyybb3r9bfv/tinymce/5/tinymce.min.js"></script>
<script>

  tinymce.init({
     selector: 'textarea',
     plugins: 'advcode importcss casechange formatpainter pagebreak preview linkchecker hr advlist table anchor lists media mediaembed pageembed permanentpen powerpaste tinymcespellchecker  print autoresize textpattern paste fullscreen insertdatetime searchreplace',
     toolbar: 'numlist bullist casechange checklist code formatpainter insertfile pageembed permanentpen table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol print paste insertdatetime',
     toolbar_drawer: 'floating',
     tinycomments_mode: 'embedded',
     tinycomments_author: 'Abhra',
     advlist_bullet_styles: "square",
     content_css: "<?php echo base_url();?>assets/my.css"
     //tinydrive_token_provider: 'http://jwt.io/#debugger-io?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c',
  });

// function checkExists(input)
// {
//   $.ajax({
//     type: "POST",
//     url: "<?php echo base_url();?>admin/checkExists",
//     data: {name:input},
//     contentType: "application/json; charset=utf-8",
//     dataType: "json",
//     success: function(result){
   
//         console.log(result);
//     }
//   });
// }

</script>
