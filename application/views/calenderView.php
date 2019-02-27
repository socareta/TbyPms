
      <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"><a href="<?php echo base_url('frontDesk') ?>" aria-controls="sob" role="tab" >Dashboard</a></li>
          <li role="presentation" class="active"><a href="<?php echo base_url('frontDesk/calender') ?>" aria-controls="Reservation" >Calender</a></li>
          <li role="presentation"><a href="<?php echo base_url('frontDesk/reservation') ?>" aria-controls="Reservation" >Reservation</a></li>
          <li role="presentation"><a href="<?php echo base_url('frontDesk/folio') ?>" aria-controls="Folio" >Folio</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="sob">        
            <br/>
                <button class="btn btn-default"> CALENDER</button> <a class="btn btn-success" href="<?php echo base_url('frontDesk/chart')?>">CHART</a>
                <p></p>
                <div class="row"> 
                    <?php
                    for($i=1;$i<=12;$i++)
                    {?>
                    <div class="col-xs-6 col-md-4 col-lg-3">
                      <div class="panel panel-success">
                          <div class="panel-heading">
                            <?php $d="2017-".$i."-01"; echo date("F", strtotime($d));?>
                          </div>
                             <?php 
                                  //print_r($Jan);
                                  $m=date("M", strtotime($d));
                                  foreach (${$m} as $val ) {?>
                                    <ul class="list-group">
                                      <li class="list-group-item" data-toggle="tooltip" title="<table border='0px'>
                                        <tr><td>Name</td><td><?php echo $val->guest_name?></td></tr>
                                          <tr><td>Check_In</td><td><?php echo $val->check_in?></td></tr>
                                          <tr><td>Check_Out</td><td><?php echo $val->check_out?></td></tr>
                                          <tr><td>Room</td><td><?php echo $val->roomsName?></td></tr>
                                          <tr><td>Villa</td><td><?php echo $val->propertyName?></td></tr>
                                          <tr><td>Sob</td><td><?php echo $val->sob?></td></tr>
                                          <tr><td>Rate</td><td><?php echo $val->rate_usd?></td></tr>
                                          <tr><td>remark</td><td><?php echo $val->remark?></td></tr>
                                      </table>"><?php echo $val->guest_name ?></li>
                                      
                                    </ul>
                                  <?php }
                             ?>
                      </div>
                    </div>
                      <?php }
                    ?>
                </div>
          </div>
        </div>
