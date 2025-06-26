<style>
   @import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css");
   
.feature-content{
    margin-top: 25px;
} 
  
body {
    font-family: 'Roboto';font-size: 16px;
}

.aboutus-section {
    padding: 90px 0;
}
.aboutus-title {
    font-size: 30px;
    letter-spacing: 0;
    line-height: 32px;
    margin: 0 0 39px;
    padding: 0 0 11px;
    position: relative;
    text-transform: uppercase;
    color: #000;
}
.aboutus-title::after {
    background: #ff002c none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 2px;
    left: 0;
    position: absolute;
    width: 54px;
}
.aboutus-text {
    color: #606060;
    font-size: 13px;
    line-height: 22px;
    margin: 0 0 35px;
}

a:hover, a:active {
    color: #ffb901;
    text-decoration: none;
    outline: 0;
}
.aboutus-more {
    border: 1px solid #ff002c;
    border-radius: 25px;
    color: #ff002c;
    display: inline-block;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0;
    padding: 7px 20px;
    text-transform: uppercase;
}
.feature .feature-box .iconset {
    background: #fff none repeat scroll 0 0;
    float: left;
    position: relative;
    width: 18%;
}
.feature .feature-box .iconset::after {
    background: #ff002c none repeat scroll 0 0;
    content: "";
    height: 150%;
    left: 43%;
    position: absolute;
    top: 100%;
    width: 1px;
}

.feature .feature-box .feature-content h4 {
    color: #00A99D !important;
    font-size: 18px;
    letter-spacing: 0;
    line-height: 22px;
    margin: 0 0 5px;
}


.feature .feature-box .feature-content {
    float: left;
    padding-left: 28px;
    width: 78%;
}
.feature .feature-box .feature-content h4 {
    color: #0f0f0f;
    font-size: 18px;
    letter-spacing: 0;
    line-height: 22px;
    margin: 0 0 5px;
}
.feature .feature-box .feature-content p {
    color: #606060;
    font-size: 13px;
    line-height: 22px;
}
.icon {
    color : #f4b841;
    padding:0px;
    font-size:40px;
    border: 1px solid #ff002c;
    border-radius: 100px;
    color: #ff002c;
    font-size: 28px;
    height: 70px;
    line-height: 70px;
    text-align: center;
    width: 70px;
    margin-bottom: 15px;
}
.infortmation-box h5 {
	font-size: 15px;
    color: #3b4273;
    text-transform: capitalize;
	    min-height: 50px;
    font-weight: 600;
}
.infortmation-box img {
	padding:8px;
	background:#FFF;
	box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.4);	
}
.infortmation-box .col-md-3  {
	margin-bottom:15px;	
}
.infortmation-box .col-md-3:nth-child(9) {
	display:none;
}
.infortmation-box .col-md-3:nth-child(16) {
	display:none;
}

</style>
<br /><br /><br /><br />
<div class="aboutus-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="aboutus infortmation-box">
                        <h2 class="aboutus-title">Infortmation Hub</h2>
                        
                        <?php 
								  $curl_handle=curl_init();          
								  curl_setopt($curl_handle,CURLOPT_URL,'https://newsapi.org/v2/top-headlines?country=in&category=business&apiKey=742cb2e0426a4b7a9e0884c5b936a44e');
								  curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
								  curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
								  $buffer = curl_exec($curl_handle);
								  curl_close($curl_handle);
						
			  						$this_element=json_decode($buffer);
									foreach($this_element->articles as $news ){
								 ?>
                       				 <div class="col-md-3">
                                     	<a href="<?php echo $news->url; ?>" target="_blank">
                        				<img src="<?php echo $news->urlToImage; ?>" style="width:350px; height:150px;" />
                                        <h5><?php echo substr($news->title,0,70); ?>....</h5>
                                        </a>
                        			</div>
                        <?php } ?>
                        <!-- <a class="aboutus-more" href="#">read more</a> -->
                    </div>
                </div>
                              
            </div>
        </div>
    </div>