<style>

    .row-fluid .span12 {
        margin-left:0 !important;
    }
    .blink_me {
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
</style>
<div class="container-fluid">
    <div class="row-fluid"> 
        <div class="span12">
            <a href="<?php echo base_url(); ?>Clientstore/add_payment_mode" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>List</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($modes) {
                                $i = 1;
                                foreach ($modes as $kyx => $key) {
                                    ?>
                                    <tr class="gradeX">
                                        <td class="center"><?php echo ++$kyx; ?></td>
                                        <td><?php echo $key->mode; ?></td>
                                        <td class="td-actions">
                                            <a href="<?php echo base_url(); ?>Clientstore/add_payment_mode/<?php echo $key->mode_id; ?>" class="btn btn-xs btn-info">
                                                Edit                                       
                                            </a>

                                            <a  data-id="<?php echo $key->mode_id; ?>" data-tblName="tbl_payment_modes" href="<?php echo base_url(); ?>Clientstore/payment_mode/<?php echo $key->mode_id; ?>" class="btn btn-xs btn-danger">
                                                Delete                                       
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++;
                                }
                            } else { ?>

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


