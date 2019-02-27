
      <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#" aria-controls="sob" role="tab" data-toggle="tab">Dashboard</a></li>
          <li role="presentation"><a href="<?php echo base_url('frontDesk/calender') ?>" aria-controls="Reservation" >Calender</a></li>
          <li role="presentation"><a href="<?php echo base_url('frontDesk/reservation') ?>" aria-controls="Reservation" >Reservation</a></li>
          <li role="presentation"><a href="<?php echo base_url('frontDesk/folio') ?>" aria-controls="Folio" >Folio</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="sob">        
            <br/>
              <h2><strong>RESERVED</strong></h2>
              <div class="row">
                <div class="col-xs-6 col-md-6 col-lg-6">
                  <table class="table table-bordered" id="tableProperty">
                  <thead>
                    <tr>
                      <th colspan="3">This Month</th>
                    </tr>
                    <tr>
                      <th>Guest name</th><th>Villa</th><th>SOB</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  if(count($resThisMonth)<1)
                              {echo '<tr><td colspan="3">No find Data</td></tr>';}
                            else
                            {
                              foreach ($resThisMonth as $val ) { ?>
                                <tr>
                                  <td><?php echo $val->guest_name  ?></td><td><?php echo number_format($val->rate_usd,0,',',',') ?></td><td><?php echo $val->sobName ?></td>
                                </tr>
                              <?php  }
                            }
                     ?>
                  </tbody>
                </table>
                </div>
                <div class="col-xs-6 col-md-6 col-lg-6">
                  <table class="table table-bordered" id="tableProperty">
                  <thead>
                    <tr>
                      <th colspan="3">Next Month</th>
                    </tr>
                    <tr>
                      <th>Guest name</th><th>Villa</th><th>SOB</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php  if(count($resNextMonth)<1)
                              {echo '<tr><td colspan="3">No find Data</td></tr>';}
                            else
                            {
                              foreach ($resNextMonth as $val ) { ?>
                                <tr>
                                  <td><?php echo $val->guest_name ?></td><td><?php echo number_format($val->rate_usd,0,',',',') ?></td><td><?php echo $val->sobName ?></td>
                                </tr>
                              <?php  }
                            }
                     ?>
                  </tbody>
                </table>
                </div>
              </div>

              <h2><strong>BOOKING</strong></h2>
                   <div class="row">
                <div class="col-xs-6 col-md-6 col-lg-6">
                  <table class="table table-bordered" id="tableProperty">
                  <thead>
                    <tr>
                      <th colspan="3">This Month</th>
                    </tr>
                    <tr>
                      <th>Guest name</th><th>Villa</th><th>SOB</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  if(count($bookThisMonth)<1)
                              {echo '<tr><td colspan="3">No find Data</td></tr>';}
                            else
                            {
                              foreach ($bookThisMonth as $val ) { ?>
                                <tr>
                                  <td><?php echo $val->guest_name  ?></td><td><?php echo number_format($val->rate_usd,0,',',',') ?></td><td><?php echo $val->sobName ?></td>
                                </tr>
                              <?php  }
                            }
                     ?>
                  </tbody>
                </table>
                </div>
                <div class="col-xs-6 col-md-6 col-lg-6">
                  <table class="table table-bordered" id="tableProperty">
                  <thead>
                    <tr>
                      <th colspan="3">Last Month</th>
                    </tr>
                    <tr>
                      <th>Guest name</th><th>Villa</th><th>SOB</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php  if(count($bookLastMonth)<1)
                              {echo '<tr><td colspan="3">No find Data</td></tr>';}
                            else
                            {
                              foreach ($bookLastMonth as $val ) { ?>
                                <tr>
                                  <td><?php echo $val->guest_name ?></td><td><?php echo number_format($val->rate_usd,0,',',',') ?></td><td><?php echo $val->sobName ?></td>
                                </tr>
                              <?php  }
                            }
                     ?>
                  </tbody>
                </table>
                </div>
              </div>

                <h2><strong>PRODUCTION</strong></h2>
                   <div class="row">
                <div class="col-xs-6 col-md-6 col-lg-6">
                  <table class="table table-bordered" id="tableProperty">
                  <thead>
                    <tr>
                      <th>Type</th><th>Booking</th><th>Revenue</th><th>Margin</th><th>LOS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  if(count($production)<1)
                              {echo '<tr><td colspan="3">No find Data</td></tr>';}
                            else
                            {
                              foreach ($production as $val ) { ?>
                                <tr>
                                  <td><?php echo $val->Last  ?></td><td><?php echo $val->jum ?></td><td><?php echo number_format($val->rev,0,',',',') ?></td>
                                  <td><?php echo number_format($val->margin,0,',',',')  ?></td><td><?php echo $val->los ?></td>
                                </tr>
                              <?php  }
                            }
                     ?>
                  </tbody>
                </table>
                </div>
                
              </div>
          </div>
        </div>