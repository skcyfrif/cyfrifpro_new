<style>
.home-main{
      background: #008abd;
      color: #fff;
      padding: 14% 0 7%;
      text-align: center;
      height: 30px;
    }
.blinker{
      animation: blinker 1.5s linear infinite;
    }
@keyframes blinker {
      50% {
      opacity: 0;
      }
}
.inner_head {
    width: 100%;
    float: left;
    position: relative;
	padding: 0 !important;
}
.inner_head img {
    width: 100% !important;
}
.inner-title {
    width: 100%;
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    text-align: center;
}
.inner-title h2 {
    color: #FFF;
    font-weight: 600;
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
    text-transform: capitalize;
    font-size: 40px;
    text-shadow: 2px 2px 2px #000;
}
.inner-title h2:before {
    display: inline-block;
    margin: 0 20px 8px 0;
    height: 2px;
    content: " ";
    text-shadow: none;
    background-color: #fff;
    width: 140px;
    box-shadow: 2px 2px 2px #000;
}
.inner-title h2:after {
    display: inline-block;
    margin: 0 0 8px 20px;
    height: 2px;
    content: " ";
    text-shadow: none;
    background-color: #fff;
    width: 140px;
    box-shadow: 2px 2px 2px #000;
}
.inner-page-content-row{
width:100%;
float:left;
padding:50px 0;
}
.accordion_container {
  width: 100%;
}

.accordion_head {
    background-color: #00a99d;
    transition: background-color .17s ease;
    -webkit-transition: background-color .17s ease;
    -moz-transition: background-color .17s ease;
    -o-transition: background-color .17s ease;
    -ms-transition: background-color .17s ease;
    color: white;
    cursor: pointer;
    /* font-family: arial; */
    font-size: 25px;
    /* margin: 0 0 1px 0; */
    padding: 14px 11px;
    font-weight: bold;
    text-shadow: 0 1px 0 rgba(0,0,0,0.6);
    background-image: -webkit-gradient(linear,left top,left bottom,from(rgba(0,0,0,0.10)),to(rgba(0,0,0,0.50)));
    /* background-image: -webkit-linear-gradient(top,rgba(0,0,0,0.10),rgba(0,0,0,0.50)); */
    background-image: -moz-linear-gradient(top,rgba(0,0,0,0.10),rgba(0,0,0,0.50));
    background-image: -o-linear-gradient(top,rgba(0,0,0,0.10),rgba(0,0,0,0.50));
    background-image: -ms-linear-gradient(top,rgba(0,0,0,0.10),rgba(0,0,0,0.50));
    background-image: linear-gradient(top,rgba(0,0,0,0.10),rgba(0,0,0,0.50));
    box-shadow: inset 0 1px 0 rgba(255,255,255,0.16), inset 0 -1px 0 rgba(0,0,0,0.25), 0 2px 0 rgba(0,0,0,0.1);
    -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.16), inset 0 -1px 0 rgba(0,0,0,0.25), 0 2px 0 rgba(0,0,0,0.1);
    -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.16),inset 0 -1px 0 rgba(0,0,0,0.25),0 2px 0 rgba(0,0,0,0.1);
    -o-box-shadow: inset 0 1px 0 rgba(255,255,255,0.16),inset 0 -1px 0 rgba(0,0,0,0.25),0 2px 0 rgba(0,0,0,0.1);
    -ms-box-shadow: inset 0 1px 0 rgba(255,255,255,0.16),inset 0 -1px 0 rgba(0,0,0,0.25),0 2px 0 rgba(0,0,0,0.1);
    -khtml-box-shadow: inset 0 1px 0 rgba(255,255,255,0.16),inset 0 -1px 0 rgba(0,0,0,0.25),0 2px 0 rgba(0,0,0,0.1);
}
.accordion_head:hover{
    background-color: #ff002c;
    transition: background-color .17s ease;
    -webkit-transition: background-color .17s ease;
    -moz-transition: background-color .17s ease;
    -o-transition: background-color .17s ease;
    -ms-transition: background-color .17s ease;
    color: white;
    cursor: pointer;
    /* font-family: arial; */
    font-size: 25px;
    /* margin: 0 0 1px 0; */
    padding: 14px 11px;
    font-weight: bold;
    text-shadow: 0 1px 0 rgba(0,0,0,0.6);
    background-image: -webkit-gradient(linear,left top,left bottom,from(rgba(0,0,0,0.10)),to(rgba(0,0,0,0.50)));
    /* background-image: -webkit-linear-gradient(top,rgba(0,0,0,0.10),rgba(0,0,0,0.50)); */
    background-image: -moz-linear-gradient(top,rgba(0,0,0,0.10),rgba(0,0,0,0.50));
    background-image: -o-linear-gradient(top,rgba(0,0,0,0.10),rgba(0,0,0,0.50));
    background-image: -ms-linear-gradient(top,rgba(0,0,0,0.10),rgba(0,0,0,0.50));
    background-image: linear-gradient(top,rgba(0,0,0,0.10),rgba(0,0,0,0.50));
    box-shadow: inset 0 1px 0 rgba(255,255,255,0.16), inset 0 -1px 0 rgba(0,0,0,0.25), 0 2px 0 rgba(0,0,0,0.1);
    -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.16), inset 0 -1px 0 rgba(0,0,0,0.25), 0 2px 0 rgba(0,0,0,0.1);
    -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.16),inset 0 -1px 0 rgba(0,0,0,0.25),0 2px 0 rgba(0,0,0,0.1);
    -o-box-shadow: inset 0 1px 0 rgba(255,255,255,0.16),inset 0 -1px 0 rgba(0,0,0,0.25),0 2px 0 rgba(0,0,0,0.1);
    -ms-box-shadow: inset 0 1px 0 rgba(255,255,255,0.16),inset 0 -1px 0 rgba(0,0,0,0.25),0 2px 0 rgba(0,0,0,0.1);
    -khtml-box-shadow: inset 0 1px 0 rgba(255,255,255,0.16),inset 0 -1px 0 rgba(0,0,0,0.25),0 2px 0 rgba(0,0,0,0.1);
}
.accordion_body {
  background: lightgray;
}

.accordion_body p {
  padding: 18px 5px;
  margin: 0px;
}

.plusminus {
  float: right;
}


</style>
<div class="inner_head">
<img src="http://www.cyfrif.com/assets/site/images/all-banner.jpg" alt="banner">
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
    <h2><?php echo str_replace('-',' ',$title);?> <span class="blinker">.</span></h2>
    <!-- <button type="button" class="btn btn-default">View Profile</button> -->
    	</div>
    </div>
</div>

<div class="inner-page-content-row">
	<div class="wrapper">
    	<div class="accordion_container">
  <div class="accordion_head">Bookkeeping<span class="plusminus">+</span></div>
  <div class="accordion_body" style="display: none;">
    <p>First Accordian Body, it will have description</p>
  </div>
  <div class="accordion_head">Payroll Services<span class="plusminus">+</span></div>
  <div class="accordion_body" style="display: none;">
    <p>Second Accordian Body, it will have description</p>
  </div>
  <div class="accordion_head">Financial Reporting<span class="plusminus">+</span></div>
  <div class="accordion_body" style="display: none;">
    <p>Third Accordian Body, it will have description</p>
  </div>
  
  <div class="accordion_head">Tax Preparation<span class="plusminus">+</span></div>
  <div class="accordion_body" style="display: none;">
    <p>Third Accordian Body, it will have description</p>
  </div>
  
  <div class="accordion_head">Accounting Software<span class="plusminus">+</span></div>
  <div class="accordion_body" style="display: none;">
    <p>Third Accordian Body, it will have description</p>
  </div>
  
  <div class="accordion_head">Automation Of Sales And Services<span class="plusminus">+</span></div>
  <div class="accordion_body" style="display: none;">
    <p>Third Accordian Body, it will have description</p>
  </div>
  
  <div class="accordion_head">Industry Accounting<span class="plusminus">+</span></div>
  <div class="accordion_body" style="display: none;">
    <p>Third Accordian Body, it will have description</p>
  </div>
</div>
    </div>
</div>
<script>
	$(document).ready(function() {
  //toggle the component with class accordion_body
  $(".accordion_head").click(function() {
    if ($('.accordion_body').is(':visible')) {
      $(".accordion_body").slideUp(300);
      $(".plusminus").text('+');
    }
    if ($(this).next(".accordion_body").is(':visible')) {
      $(this).next(".accordion_body").slideUp(300);
      $(this).children(".plusminus").text('+');
    } else {
      $(this).next(".accordion_body").slideDown(300);
      $(this).children(".plusminus").text('-');
    }
  });
});

</script>