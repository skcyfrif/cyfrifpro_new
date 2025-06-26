<style>

.row-fluid .span12 {
  margin-left:0 !important;
}
.blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {  
  50% { opacity: 0; }
}
</style>
  <div class="container-fluid">
    <div class="row-fluid"> 
      <div class="span12">
        <!--<a href="<?php echo base_url();?>inventory/add_bom" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a><a href="javascript:void();" class="pull-right">&nbsp;  &nbsp;</a>

        <a href="<?php echo base_url();?>csv" ><button class="btn btn-success btn-sm pull-right">Import</button></a>-->

        
          <div class="widget-content nopadding">
            
            <div class="span6">
             
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Finish Good</h5>
          </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>price</th>                  
                  
                </tr>
              </thead>
              <tbody>
                <?php 

                if($bom){
                $i=1; 
                foreach($bom as $key){ ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $key->id;?></td>
                        <td><?php echo $key->title; ?></td>
                        <td><?php echo $key->sprice;?></td>                       
                    </tr>
                <?php $i++; } } else { ?>
                    <tr class="gradeX">
                        <td class="center" colspan="5">No data found</td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <div class="span6">
              
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Raw Metarilas</h5>
          </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>price</th>                  
                  
                </tr>
              </thead>
              <tbody>
                <?php 

                if($raw){
                $i=1; 
                foreach($raw as $key){ ?>
                    <tr class="gradeX">
                        <td class="center"><?php echo $key->id;?></td>
                        <td><?php echo $key->title; ?></td>
                        <td><?php echo $key->pprice;?></td>                       
                    </tr>
                <?php $i++; } } else { ?>
                    <tr class="gradeX">
                        <td class="center" colspan="5">No data found</td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>


          </div>
        </div>
      </div>
    </div>
  </div>