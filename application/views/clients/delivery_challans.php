<style>

    .row-fluid .span12 {
        margin-left:0 !important;
    }
    .btn span.glyphicon {
        opacity: 0 !important;
    }
    .btn.active span.glyphicon {
        opacity: 1 !important;
    }
</style>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <a href="<?php echo base_url(); ?>client/add_delivery_challan" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a><a href="javascript:void();" class="pull-right">&nbsp;  &nbsp;</a>
            <a href="<?php echo base_url(); ?>delivery-challan/csv" ><button class="btn btn-success btn-sm pull-right">Import</button></a>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>List</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Challan Number</th>
                                <th>Customer</th>
                                <th>Challan Type</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Document</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($delivery_challans) {
                                $i = 1;
                                foreach ($delivery_challans as $kyx=>$key) {
                                    ?>
                                    <tr class="gradeX">
                                        <td class="center"><?php echo ++$kyx; ?></td>

                                        <td><?php echo $key->customer; ?></td>
                                        <td><?php echo $key->challan_type; ?></td>
                                        <td><?php echo date('d M Y', strtotime($key->date)); ?></td>
                                        <td><?php echo $key->total; ?></td>
                                        <td> 
                                            <?php
                                            if ($key->filePath != NULL) {
                                                echo '<a href="' . base_url() . $key->filePath . '" class="">Download</a>';
                                            } else {

                                                echo '<span style="color:red;">N.A</span>';
                                            }
                                            ?>
                                        </td>
                                        <td class="td-actions">

                                            <a href="<?php echo base_url(); ?>client/add_delivery_challan/<?php echo $key->id; ?>" class="btn btn-xs btn-info">
                                                Edit                                       
                                            </a>

                                            <a href="<?php echo base_url(); ?>client/receipt?for=delivery_challans&id=<?php echo urlencode(base64_encode($key->id)); ?>" class="btn btn-xs btn-primary">
                                                Receipt                                       
                                            </a>

                                            <a onclick="deleteThis(this)" data-id="<?php echo $key->id; ?>" data-tblName="tbl_delivery_challans" data-returnURL="<?php echo $this->uri->segment(1); ?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-xs btn-danger">
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
                                    <td class="center" colspan="6">No data found</td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 

<script type="text/javascript">
    function changeIt(val)
    {
        var status = $(val).val();
        var id = $(val).attr('data-id');
        window.location = "<?php echo base_url(); ?>admin/changeStatus/" + status + '/' + id;
    }
</script>