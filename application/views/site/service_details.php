<?php header('Access-Control-Allow-Origin: *');  ?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/my.css" />
<script src="https://cdn.tiny.cloud/1/9rqr173kezhhcyufrppxl1ju8s9059f5vrppqcyybb3r9bfv/tinymce/5/tinymce.min.js"></script>
<style>

.tox-toolbar{
  display:none !important;
} 
.tox-statusbar{
  display:none !important;
}

</style>


<div class="inner_head">
<img src="http://www.cyfrif.com/assets/site/images/investment.jpg" alt="banner">
<div class="inner-title">
  <div class="wrapper">
    <?php 
    
        if($this->uri->segment(2))
        {
          $title=$this->uri->segment(2);
        }
        else if($this->uri->segment(1))
        {
          $title=$this->uri->segment(1);
        }

    ?>
    <div class="banner-caption2">
      <div class="wrapper">
          <div class="banner-box2">
                 <h2><?php echo str_replace('-',' ',$title);?></h2>
                 
             </div>
        </div>
    </div>
      </div>
    </div>
</div>

<?php if($content) { echo $content; } else { echo 'Not updated yet'; }?> 


<script src="<?php echo base_url();?>assets/site/js/inner-accodian.js"></script> 
<script src="https://cdn.tiny.cloud/1/9rqr173kezhhcyufrppxl1ju8s9059f5vrppqcyybb3r9bfv/tinymce/5/tinymce.min.js"></script>
  <script>//activate tinyMCE
        tinyMCE.init({
            selector: '.tmpTextArea',
            menubar: false,
            plugins: [
                'importcss advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code autoresize'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: '<?php echo base_url();?>assets/my.css',
            readonly:true,
            allow_script_urls: true
        });
    //get what is inside the textarea editor
      var content = $('iframe').contents().find('#tinymce').contents();
//append it in a div
      $("#toAppend").append(content);
//disable edit 
      tinymce.activeEditor.hide();
//hide the textarea editor 
      $(".tmpTextArea").hide();
      </script> 