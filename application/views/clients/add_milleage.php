<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
.control-group{
    margin: 10px !important;
}

.list-unstyled{
     color: #000;
    text-align: left;
    padding: 5px 10px;
    font-size: 14px;
    border-bottom: 1px dotted #a3b5e0;
    list-style:none;
}
.liClass{
      background-color: #eaf5f4;
    padding: 2px;
    margin-bottom: 2px;
    margin-left: -17%;
    border: 1px solid blue;
    cursor: pointer;
}
.addLinkC{
  margin-top:2px;
  margin-left:-17%;
}
.table-sortable tbody tr {
    cursor: move;
}

</style>
<body onload="doThis()">
<div class="container-fluid" >
    <div class="row-fluid">
      <div class="span12">
       <!--  <a href="<?php echo base_url();?>admin/add_menu" ><button class="btn btn-success btn-sm pull-right">+ Add</button></a> -->
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Add Expense</h5>
          </div>
          <div class="widget-content nopadding">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="span12">
               
            <div class="control-group">
              <label class="control-label">Invoice</label>
              <div class="controls">
                <input type="text" class="span12" name="invoice" placeholder="Invoice" value="<?php echo $this_element->invoice;?>" autocomplete="off" required/>
              </div>
            </div>
            <table class="table table-bordered table-hover table-sortable" id="milleage_tab_logic">
              <thead>
                <tr >
                  <th class="text-center">
                    Name
                  </th>
                  <th class="text-center">
                    Email
                  </th>
                      <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                  </th>
                </tr>
              </thead>
              <tbody>
                  <tr id='addr0' data-id="0" class="hidden">
                  <td data-name="name">
                      <input type="text" name='name0'  placeholder='Name' autocomplete="off" class="form-control"/>
                  </td>
                  <td data-name="mail">
                      <input type="text" name='mail0' placeholder='Email' autocomplete="off" class="form-control"/>
                  </td>
                              <td data-name="del">
                                  <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
                              </td>
                </tr>
              </tbody>
            </table>
        </div>
        
    </div>
  </div>
   <div class="form-actions" >
      <button type="submit" class="btn btn-success">Save</button>
      <a href="<?php echo base_url();?>admin/clients/"><button type="button" class="btn btn-sm btn-info">Back</button></a>
    </div>
    </form>
</div>

<input type="hidden" id="totalProducts" value="<?php echo count($products);?>" />

<input type="hidden" value="0" id="currentSelected" />

<script type="text/javascript">
    
$(document).ready(function() {
    $("#add_row").on("click", function() {
        // Dynamic Rows Code
        
        // Get max row id and set new id
        var newid = 0;
        $.each($("#milleage_tab_logic tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#milleage_tab_logic tbody tr:nth(0) td"), function() {
            var td;
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") !== undefined) {
                td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                td = $("<td></td>", {
                    'text': $('#milleage_tab_logic tr').length
                }).appendTo($(tr));
            }
        });
        
        // add delete button and td
        /*
        $("<td></td>").append(
            $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
                .click(function() {
                    $(this).closest("tr").remove();
                })
        ).appendTo($(tr));
        */
        
        // add the new row
        $(tr).appendTo($('#milleage_tab_logic'));
        
        $(tr).find("td button.row-remove").on("click", function() {
             $(this).closest("tr").remove();
        });
});




    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();



    $("#add_row").trigger("click");
});

</script>

