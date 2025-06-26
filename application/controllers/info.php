<?php
include("header.php");
$alias 		= $_GET['id'];
$select_qry = mysql_query("select * from nm_articles where article_menu_id='".$alias."'") or die('error '.mysql_error());
$num_of_rec = mysql_num_rows($select_qry);
$data 	    = mysql_fetch_array($select_qry);
if($num_of_rec==0){
	header("location:../not_found.php");
}else{
?>
      <script type="text/javascript" src="<?php echo ROOTPATH;?>js/contact.js"></script>
       <link rel="stylesheet" href="css/popup.css" type="text/css"/>
      <!-- Start Bodycon -->   
      
      <div class="container inner-page">
      	<div id="preview"></div>
        <div class="col-sm-3">
        	<div class="blue-strip left-bar">
            <div class="strip">Access Point</div>
            <div class="content">
              <ul class="college-list cities">
        				<?php $customMenu=0;
								if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
									$arrCustom=array(30,31,32,33,82,83,84,106,66);
									if(in_array($_REQUEST['id'],$arrCustom)){
										$customMenu=1;
									} else {
										$customMenu=0;
									}
								}
								if($customMenu==1){
									if($_REQUEST['id']==30){
								?>
                  <li><?php if($_SESSION['user_loginid']!=''){?><a href="pdf.php?id=48">CAT Papers</a><?php }else{echo '<a href="registration">CAT Papers</a>';}?></li>
                  <li><a href="http://cat.jumbotests.com/" target="_blank">CAT Online Test</a></li>
                  <li><a href="https://iimcat.ac.in/EForms/Mock/Web_App_Template/756/1/index.html?1@@1@@1#!" target="_blank">FAQs for CAT</a></li>
                  <li><a href="http://www.iimcat.ac.in/" target="_blank">CAT official website</a></li>
                  <li><a href="https://www.youtube.com/watch?v=XTyfPDijKl8" target="_blank">CAT Registration Video</a></li>
								<?php } //id 30 ends CAT 
									if($_REQUEST['id']==31){
								?>
                  <li><?php if($_SESSION['user_loginid']!=''){?><a href="pdf.php?id=47">MAT Papers</a><?php }else{echo '<a href="registration">MAT Papers</a>';}?></li>
                  <li><a href="onlinemock/mat" target="_blank">MAT Online Test</a></li>
                  <li><a href="info/31#faqMAT">FAQs for MAT</a></li>
                  <li><a href="https://www.aima.in/testing-services/mat/mat.html" target="_blank">MAT official website</a></li>
                  <li><a href="javascript:void(0);" target="_blank">Online Registration for MAT</a></li>
								<?php } //id 31 ends MAT
									if($_REQUEST['id']==32){
								?>
                  <li><?php if($_SESSION['user_loginid']!=''){?><a href="pdf.php?id=49">XAT Papers</a><?php }else{echo '<a href="registration">XAT Papers</a>';}?></li>
                  <li><a href="http://www.xatonline.net.in/pages/faq.html" target="_blank">FAQs for XAT</a></li>
                  <li><a href="http://www.xatonline.net.in/" target="_blank">XAT official website</a></li>
                  <li><a href="http://www.xatonline.net.in/xatreg.aspx" target="_blank">Online Registration for XAT</a></li>
					<?php } //id 32 ends XAT
						if($_REQUEST['id']==33){
					?>
                  <li><?php if($_SESSION['user_loginid']!=''){?><a href="pdf.php?id=50">CMAT Papers</a><?php }else{echo '<a href="registration">CMAT Papers</a>';}?></li>
                  <li><a href="http://www.aicte-cmat.in/College/faq.aspx" target="_blank">FAQs for CMAT</a></li>
                  <li><a href="http://www.aicte-cmat.in/College/Index_New.aspx" target="_blank">CMAT official website</a></li>
                  <li><a href="http://www.aicte-cmat.in/Candidate/How_to_apply_A.aspx" target="_blank">Online Registration for CMAT</a></li>
                 				 <?php } //id 33 ends CMAT
									if($_REQUEST['id']==82){
								?>
                  <li><?php if($_SESSION['user_loginid']!=''){?><a href="pdf.php?id=85">IIFT Papers</a><?php }else{echo '<a href="registration">IIFT Papers</a>';}?></li>
                  <li><a href="#" target="_blank">FAQs for IIFT</a></li>
                  <li><a href="#" target="_blank">IIFT official website</a></li>
                  <li><a href="#" target="_blank">Online Registration for IIFT</a></li>
                  				<?php } //id 82 ends IIFT
									if($_REQUEST['id']==83){
								?>
                  <li><?php if($_SESSION['user_loginid']!=''){?><a href="pdf.php?id=86">SNAP Papers</a><?php }else{echo '<a href="registration">SNAP Papers</a>';}?></li>
                  <li><a href="#" target="_blank">FAQs for SNAP</a></li>
                  <li><a href="#" target="_blank">SNAP official website</a></li>
                  <li><a href="#" target="_blank">Online Registration for SNAP</a></li>
								<?php } //id 83 ends SNAP
									if($_REQUEST['id']==84){
								?>
                  <li><a href="#">IBSAT Papers</a></li>
                  <li><a href="#" target="_blank">FAQs for IBSAT</a></li>
                  <li><a href="#" target="_blank">IBSAT official website</a></li>
                  <li><a href="#" target="_blank">Online Registration for IBSAT</a></li>
								<?php } //id 84 ends SNAP
									if($_REQUEST['id']==106){
								?>
                  <li><a href="info/63">Recommended Videos</a></li>
                  <li><a href="info/64">Articles</a></li>
                  <li><a href="info/65">Frequent GD topics</a></li>
								<?php } //id 106 ends GD
									if($_REQUEST['id']==66){
								?>
                  <li><a href="info/68">Recommended Videos</a></li>
                  <li><a href="info/69">Articles</a></li>
								<?php } //id 66 ends PI
									} else {
								?>
                  <li><a href="registration">Register/Login</a></li>
                  <li><a href="step_1">Common Application Form</a></li>
                  <li><a href="scholarship">Apply for Scholarship</a></li>
                  <li><a href="info/113">FAQ's</a></li>
								<?php }?>
              </ul>
            </div>
          </div>
          <iframe style="width: 100%; height: 215px;" title="fb:like_box Facebook Social Plugin" name="f231ed1a4c" src="https://www.facebook.com/plugins/like_box.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FApnamba%2F458998660831508&amp;show_faces=true&amp;header=true&amp;stream=false&amp;width=244&amp;app_id=&amp;locale=en_US&amp;sdk=joey&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D24%23cb%3Df2c00d0a24%26origin%3Dhttp%253A%252F%252Fapnamba.co.in%252Ff3c17b8794%26domain%3Dapnamba.co.in%26relation%3Dparent.parent" frameborder="0" scrolling="no"></iframe>
          
        </div>
        <div class="col-sm-9">
			<div class="inner-content col-sm-12">
				<?php echo stripslashes($data['article_description']); ?>
			</div>
        </div>
      </div>
<script type="text/javascript">
	$(document).ready(function(){
		var path = window.location.pathname;
		var PathName = path.substr(6);
		if(path == '/info/25' || path == '/info/164' || path == '/info/31') 
		{	
			if (($('#startMAT').length)) {
				var scrollTrigger = 200, // px
				backToTop = function() {
					var scrollTop = $(window).scrollTop();
					if (scrollTop > scrollTrigger) {
						if (!$('div.MATPopupImageInner').hasClass("closeonce")){
							$('#startMAT').modal('show');
							$('.quick-bar').removeClass("quick_bar_out");
							$('.quick-bar').addClass("quick_bar_in");
						}
					} else {
						$('#startMAT').hide();
					}
				};
				$(window).on('scroll', function() {
					backToTop();
				});
			}
		}
		/*on time interval*/
		if(path == '/info/169' || path == '/info/170' || path == '/info/161' || path == '/info/174' || path == '/info/24' || path == '/info/175' || path == '/info/176' || path == '/info/177' || path == '/info/178') 
		{
			if (($('#startMAT').length)) {
				setTimeout(function(){
					if (!$('div.MATPopupImageInner').hasClass("closeonce")){
						$('#startMAT').modal('show');
						$('.quick-bar').removeClass("quick_bar_out");
						$('.quick-bar').addClass("quick_bar_in");
					}
				}, 10000);
			}
		}
		/*end*/
	});
	function cancelPop(){
		$('#startMAT').modal('toggle');
		$('.MATPopupImageInner').addClass('closeonce');
	}
</script>
	<?php include("footer.php"); ?>    
<?php
}
?>