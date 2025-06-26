<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

<style>

.border {
    border: 1px solid #dee2e6!important;
}
.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: .50rem;
}
.allreports .col-md-3 {
    width: 22%;
    /* margin: 0 2% 0% 0; */
    padding: 10px;
    float: left;
}
.allreports .border {
    border: 1px solid #ccc!important;
    text-align: left;
    padding: 10px;
    border-radius: 15px;
}
</style>
<div class="container-fluid" style="font-size:14px;text-decoration:none;">
  <div class="row-fluid">
      <div class="allreports">
                  <div class="row text-center">
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/report?for=invoices">Invoices</a>
                                  <a href="<?php echo base_url();?>client/graph?for=invoice"><small class="pull-right" style="margin-top: 6%;color: green;"><i class="fa fa-bar-chart" title="View Graph" aria-hidden="true"></i></small></a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/get_reports?by=customer">Invoices By Customer</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/report?for=estimates">Estimates</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/report?for=sales-orders">Sales Order</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/report?for=purchase-orders">Purchase Order</a>
                              </div>
                          </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/report?for=credit-notes">Credit Notes</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/report?for=vendor-credits">Vendor Credits</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/report?for=delivery-challans">Delivery Challans</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/report?for=bills">Bills</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/report?for=recurring-expenses">Recurring Expenses</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/report?for=recurring-bills">Recurring Bills</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/profit_and_loss?filter=1">Profit And Loss</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/status_report?for=due">Total Due</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/status_report?for=received">Total Received</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/status_report?for=deposited">Total Deposited</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/get_reports?by=sales_person">Sales By Sales Person</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/get_reports?by=item">Sales By Item</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="card border">
                              <div class="card-body">
                                  <i class="fa fa-dot-circle-o"></i>
                                  <a href="<?php echo base_url();?>client/inventory_report">Inventory Status</a>
                              </div>
                          </div>
                      </div>
                  </div>
            </div>
    </div>
</div>