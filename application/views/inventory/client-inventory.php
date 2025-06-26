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
            <a href="<?php echo base_url(); ?>inventory/add_inventory" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>List</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Sale Price</th>
                                <th>Purchase Price</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($inventory) {
                                $i = 1;
                                foreach ($inventory as $kyx => $key) {
                                    ?>
                                    <tr class="gradeX">
                                        <td class="center"><?php echo ++$kyx; ?></td>

                                        <td><?php
                                            echo $key->title;

                                            if ($key->out_of_stock_alert == 1) {
                                                echo '<small style="color:red;" class="blink_me"> [Stock Critically Low]</small>';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $key->type; ?></td>
                                        <td><?php echo $key->sprice; ?></td>
                                        <td><?php echo $key->pprice; ?></td>
                                        <td> 
                                            <?php
                                            $date = explode(' ', $key->created);
                                            echo date('d M Y', strtotime($date[0]));
                                            ?>
                                        </td>
                                        <td class="td-actions">
                                            <a href="<?php echo base_url(); ?>inventory/add_inventory/<?php echo $key->id; ?>" class="btn btn-xs btn-info">
                                                Edit                                       
                                            </a>

                                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_inventory" data-returnURL="<?php echo $this->uri->segment(1); ?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
                                                Delete                                       
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>

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