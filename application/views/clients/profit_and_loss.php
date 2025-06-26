<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.bold{
	text-align:left !important;
	font-weight:bold;
}
.nor{
  text-align:left !important;
}
.normal{
	text-align:center !important;
}
table td{
  font-size: 15px !important;
}
.tot{
	font-weight:bold;
}


.select2-container, .select2-drop{
    padding: 3px !important;
    width: 20% !important;
    float:right !important;
}
</style>

<?php 


$grossProfitRaw=$totalSales-($totalPurchaseOrders+$totalBills+$totalRecurringBills+$totalRecurringExpenses);
$netProfitRaw=($grossProfitRaw - $totalTaxAmount);

if($grossProfitRaw < 0)
{
  $colorG='red';
  $grossProfit=$grossProfitRaw * (-1);
  $arrowG='<i class="fa fa-long-arrow-down" aria-hidden="true"></i>';
}
else
{
  $colorG='green';
  $arrowG='<i class="fa fa-long-arrow-up" aria-hidden="true"></i>';
  $grossProfit=$grossProfitRaw;
}

if($netProfitRaw < 0)
{
  $colorN='red';
  $netProfit=$netProfitRaw * (-1);
  $arrowN='<i class="fa fa-long-arrow-down" aria-hidden="true"></i>';
}
else
{
  $colorN='green';
  $arrowN='<i class="fa fa-long-arrow-up" aria-hidden="true"></i>';
  $netProfit=$netProfitRaw;
}
?>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            
            <select onchange="filterBy(this)" required>
              <option value="1" <?php echo ($_GET['filter'] == 1) ? 'selected' : '' ;?> >Last 1 Month</option>
              <option value="2" <?php echo ($_GET['filter'] == 2) ? 'selected' : '' ;?> >Last 2 Months</option>
              <option value="3" <?php echo ($_GET['filter'] == 3) ? 'selected' : '' ;?> >Last 3 Months</option>
              <option value="6" <?php echo ($_GET['filter'] == 6) ? 'selected' : '' ;?> >Last 6 Months</option>
              <option value="12" <?php echo ($_GET['filter'] == 12) ? 'selected' : '' ;?> >Last 1 Year</option>
            </select>

            <select onchange="viewGraph(this)" required>
              <option value="0">View Graph</option>
              <option value="2019">Graph 2019</option>
              <option value="2020">Graph 2020</option>
              <option value="2020">Graph 2021</option>
              <option value="2020">Graph 2022</option>
            </select>
          </div>

          <div class="widget-content nopadding">
            <table class="table">
              <thead>
                <tr>
                  <th class="bold">Account</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="nor">Goods Sold</td>
                  <td class="normal">₹<?php echo $totalSales?></td>
                </tr>
                <tr>
                  <td class="bold">Total Sales</td>
                  <td class="normal tot"><hr>₹<?php echo $totalSales?></td>
                </tr>
                <tr>
                  <td class="nor">Purchase Receipts</td>
                  <td class="normal">₹<?php echo $totalPurchaseOrders?></td>
                </tr>
                <tr>
                  <td class="nor">Recurring Expenses</td>
                  <td class="normal">₹<?php echo $totalRecurringExpenses?></td>
                </tr>
                <tr>
                  <td class="nor">Recurring Bills</td>
                  <td class="normal">₹<?php echo $totalRecurringBills?></td>
                </tr>
                <tr>
                  <td class="nor">Other Bills</td>
                  <td class="normal">₹<?php echo $totalBills?></td>
                </tr>
                <tr>
                  <td class="bold">Total Expenses</td>
                  <td class="normal tot"><hr>₹<?php echo ($totalPurchaseOrders + $totalBills + $totalRecurringBills + $totalRecurringExpenses);?></td>
                </tr>
                <tr>
                  <td class="bold">Gross Profit</td>
                  <td class="normal tot"><hr><span style="color:<?php echo $colorG;?>">₹<?php echo $grossProfit.' <b>'.$arrowG.'</b>'; ?></span></td>
                </tr>
                <tr>
                  <td class="nor">Total Payable Tax</td>
                  <td class="normal"><span style="color:orangered;">₹<?php echo $totalTaxAmount; ?></span></td>
                </tr>
                <tr>
                  <td class="bold">Net Profit</td>
                  <td class="normal tot"><hr><span style="color:<?php echo $colorN;?>">₹<?php echo $netProfit.' '.$arrowN;?></span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> 

<script>

function filterBy(val)
{
    var months=$(val).val();
    window.location="<?php echo base_url();?>client/profit_and_loss?filter="+months;
}

function viewGraph(val)
{
    var year=$(val).val();
    if(year !=0)
    {
      window.location="<?php echo base_url();?>client/graph?for=profit_and_loss&year="+year;
    }
}

</script>