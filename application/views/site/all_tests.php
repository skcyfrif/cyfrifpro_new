<style>

.list-group {
  width:100% !important;
}
h4{
  margin-top:30px;
  font-size: 30px;
  letter-spacing: 0;

  padding: 0 0 11px;
  line-height: 32px;
  margin-bottom:4px;
  position: relative;
  text-transform: uppercase;
  color: #000;
}
h4::after {
    background: #ff002c none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 2px;
    left: 0;
    position: absolute;
    width: 54px;
    margin-bottom:5px;
}
</style>

<div class="container">
  <div class="row">
      <h4>Ongoing Exams</h4>
        <ul class="list-group" style="margin-bottom:20px;">
          <?php foreach($exams as $key){ ?>
            <li class="list-group-item"><?php echo $key->title;?><a class="pull-right" href="<?php echo base_url();?>introduction/<?php echo urlencode(base64_encode($key->id));?>"><button class="btn btn-info btn-sm">Take</button></a></li>
          <?php } ?>
        </ul>
  </div>
  <br /><br />
</div>
