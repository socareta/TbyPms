
      <ul class="nav nav-tabs">
        <li class="active"><a href="#">Dashboard</a> </li>
        <li><a href="<?php echo base_url('report/comparison') ?>">Comparison</a></li>
      </ul>
      <div class="tab-pane active">
        <h2>Dashboard Report</h2> 
        <h3> Booking</h3>
        <div class="row">
          <div class="col-xs-4 col-md-4">
            <table class="table table-bordered">
                <thead>
                  <tr><th rowspan="2">#</th><th colspan="2"> This Month</th></tr>
                  <tr><th>Name</th><th>Amount</th></tr>
                </thead>
                  </tbody>
                  <?php 
                    $i=1;
                    foreach ($booking as $value) { ?>
                      <tr><td><?php echo $i ?></td><td><?php echo $value->guest_name ?></td><td><?php echo number_format($value->rate_usd,0,',',',')   ?></td></tr>
                    <?php $i++; }            ?>
                 <!-- <tr><td colspan="3"><center><u>no data</u> </center> </td></tr> -->
                </tbody>
              </table>
          </div>
          <div class="col-xs-4 col-md-4">
              <table class="table table-bordered">
                <thead>
                  <tr><th rowspan="2">#</th><th colspan="2"> Last Month</th></tr>
                  <tr><th>Name</th><th>Amount</th></tr>
                </thead>
                  </tbody>
                  <?php 
                    $i=1;
                    foreach ($lastBooking as $value) { ?>
                      <tr><td><?php echo $i ?></td><td><?php echo $value->guest_name ?></td><td><?php echo  number_format($value->rate_usd,0,',',',') ?></td></tr>
                    <?php $i++; }            ?>
                 <!-- <tr><td colspan="3"><center><u>no data</u> </center> </td></tr> -->
                </tbody>
              </table>
          </div>
        </div>
        
        <h3> Reserved</h3>
        <div class="row">
          <div class="col-xs-4 col-md-4">
              <table class="table table-bordered">
                <thead>
                  <tr><th colspan="3"> This Month</th></tr>
                  <th>#</th><th>Name</th><th>Amount</th>
                </thead>
                <tbody>
                   <?php 
                    $i=1;
                    foreach ($reserved as $value) { ?>
                      <tr><td><?php echo $i ?></td><td><?php echo $value->guest_name ?></td><td><?php echo  number_format($value->rate_usd,0,',',',') ?></td></tr>
                    <?php $i++; }            ?>
                 <!-- <tr><td colspan="3"><center><u>no data</u> </center> </td></tr> -->
                </tbody>
              </table>
          </div>
          <div class="col-xs-4 col-md-4">
               <table class="table table-bordered">
                <thead>
                  <tr><th colspan="3"> Last Month</th></tr>
                  <th>#</th><th>Name</th><th>Amount</th>
                </thead>
                <tbody>
                   <?php 
                    $i=1;
                    foreach ($lastReserved as $value) { ?>
                      <tr><td><?php echo $i ?></td><td><?php echo $value->guest_name ?></td><td><?php echo  number_format($value->rate_usd,0,',',',') ?></td></tr>
                    <?php $i++; }            ?>
                 <!-- <tr><td colspan="3"><center><u>no data</u> </center> </td></tr> -->
                </tbody>
              </table>
          </div>
        </div>
        
      </div>

  