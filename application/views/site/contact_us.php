<style>
.contact-page-row1 .map {
  float: left;
  margin-top:50px;
  margin-bottom:50px;
  padding: 0;
}
.contact-page-row1 .contact-form {

  float: left;
  margin-top:50px;
  margin-bottom:50px;
}
.contact-page-row1 .contact-form .title {
  font-size: 2.5em;
  font-family: "Roboto", sans-serif;
  font-weight: 700;
  color: #242424;
  margin: 5% 8%;
}
.contact-page-row1 .contact-form .subtitle {
  font-size: 1.2em;
  font-weight: 400;
  margin: 0 4% 5% 8%;
}
.contact-page-row1 .contact-form input,
.contact-page-row1 .contact-form textarea {
  width: 94.5%;
    padding: 3%;
    margin: 0 0 2% 8%;
    color: #242424;
    border: 1px solid #B7B7B7;
}
.contact-page-row1 .contact-form input::placeholder,
.contact-page-row1 .contact-form textarea::placeholder {
  color: #242424;
}
.contact-page-row1 .contact-form .btn-send {
  background: red;
  width: 180px;
  height: 60px;
  color: #FFFFFF;
  font-weight: 700;
  margin: 2% 8%;
  border: none;
}
.contact-page-row1{
	width:100%;
	float:left;
	padding:50px 0;
}

label {
    margin: 0px 0 20px 45px;
}

</style> 



<div class="contact-page-row1">
  <div class="wrapper">
    <div class="col-md-6 map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3741.102345828675!2d85.88239341423332!3d20.33739021639697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a190ba94b7eaf7f%3A0x7177477d4a2070d!2sUtkal%20Signature!5e0!3m2!1sen!2sin!4v1573462468912!5m2!1sen!2sin" width="100%" height="590px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <div class="col-md-6 contact-form">
      <h2 class="subtitle">We are here to assist you.</h2>
      <?php if($this->session->flashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible fade in col-md-12" data-dismiss="alert" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php } ?>
      <?php if($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger alert-dismissible fade in col-md-12" data-dismiss="alert" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
        </div>
      <?php } ?>

      <form action="" method="post">
            <input autocomplete="off" type="text" name="name" placeholder="Your Name" required />

            <input autocomplete="off" type="email" name="email" placeholder="Your E-mail Address" required />

            <input autocomplete="off" type="tel" maxlength="10" name="mobile" placeholder="Your Phone Number" required />

            <textarea name="message" id="" rows="8" placeholder="Your Message" required ></textarea>

            <label for="captcha"><?php echo $captcha['image']; ?></label>
            <br>
            <input autocomplete="off" type="text" name="userCaptcha" placeholder="Enter above text" value="<?php if(!empty($userCaptcha)){ echo $userCaptcha;} ?>" />
            <!-- <span class="required-server"><?php echo form_error('userCaptcha','<p style="color:#F83A18">','</p>'); ?></span>  -->

          <button type="submit" style="color:white" class="btn-send">Get a Call Back</button>
      </form>
    </div>
  </div>
</div>

