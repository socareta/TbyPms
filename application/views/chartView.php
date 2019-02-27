
      <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"><a href="<?php echo base_url('frontDesk') ?>" aria-controls="sob" >Dashboard</a></li>
          <li role="presentation" class="active"><a href="<?php echo base_url('frontDesk/calender') ?>" aria-controls="Reservation" >Calender</a></li>
          <li role="presentation"><a href="<?php echo base_url('frontDesk/reservation') ?>" aria-controls="Reservation" >Reservation</a></li>
          <li role="presentation"><a href="<?php echo base_url('frontDesk/folio') ?>" aria-controls="Folio" >Folio</a></li>
        </ul>
<script type="text/javascript">
  function popUp(title)
  {//alert(title);
    $('.myModal').modal('show');
    $('#content').html(title);
  }
</script>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="sob">        
            <br/>
               <a href="calender" class="btn btn-success ">CALENDER</a>  <button class="btn btn-default active">CHART</button>
                <br/><p> 
                  <div class="row">
                    <div class="col-xs-3 col-xs-offset-3">
                      <div class="input-group number-spinner">
                        <?php 
                          $m= $log['m'];
                          $months="2017-".$m."-1";
                          $next=date('F', strtotime("+1 months", strtotime($months)));
                          $fwd=date('F', strtotime("-1 months", strtotime($months)));?>
                        <span class="input-group-btn">
                          <a href="chart?m=<?php echo $fwd;?>" class="btn btn-default dwn" ><span class="glyphicon glyphicon-minus"></span></a>
                        </span>
                        <input type="text" class="form-control text-center" value="<?php echo $m; ?>">
                        <span class="input-group-btn">

                          <a href="chart?m=<?php echo $next;?>" class="btn btn-default up" ><span class="glyphicon glyphicon-plus"></span></a>
                        </span>
                      </div>
                    </div>
                  </div>
                  <?php
                    $start= date("Y-m-d", strtotime($months));
                    $lastDate= intval( date("t", strtotime($months)))-1; 
                    $date=ceateDate($start,$lastDate);
                  ?>
                  <br/>
                  <table class="t1">
                    <thead>
                        <th >Room</th><th>Property</th>
                        <?php
                          foreach ($date as $day) {
                            echo "<th >".date("d",strtotime($day))."</th>";
                          }
                        ?>
                    </thead>
                    <tbody>
               <?php
                //print_r($chart);
                $tmpIndex=0;
                $guest_name="";
                if(empty($chart))
                {
                  $long=$lastDate+3;
                  echo "<tr><td colspan='".$long."'><center><b>....Reservation is empty....</b></center></td></tr>";
                }
                else
                {
                    foreach ($chart as $val) {
                    if($val->guest_name<>$guest_name)
                    {
                      if($tmpIndex<>0)
                      {
                        $diff=$lastDate-$tmpIndex;
                        cetakKosongAKhir($diff);
                        echo "</tr>";
                      }
                      $tmpIndex=0;
                      echo "<tr><td><b>".$val->typeOfRoom."</b></td><td><b>".$val->property."</b></td>";
                      $index=cek_index($val->check_in,$date);
                      $selisih=$index-$tmpIndex;
                      cetakKosong($selisih);
                      echo "<td class='dt' onclick='popUp(this.title)' colspan='".$val->los."'  title=\"<table border='0px' class='table'>
                                        <tr><td>Name</td><td>". $val->guest_name."</td></tr>
                                          <tr><td>Check_In</td><td>". $val->check_in."</td></tr>
                                          <tr><td>Check_Out</td><td>". $val->check_out."</td></tr>
                                          <tr><td>Room</td><td>". $val->typeOfRoom."</td></tr>
                                          <tr><td>Villa</td><td>". $val->property."</td></tr>
                                          <tr><td>Sob</td><td>". $val->sob."</td></tr>
                                          <tr><td>Rate</td><td>". number_format($val->rate_usd,0,',',',')."</td></tr>
                                          <tr><td>remark</td><td>". $val->remark."</td></tr>
                                      </table>\"><div class='divName'>".$val->guest_name."</div></td>";
                      $tmpIndex=cek_index($val->check_out,$date);;
                      $guest_name=$val->guest_name;
                    }
                }
                //echo $lastDate."-".$tmpIndex;.
                 $diff=$lastDate-$tmpIndex;
                cetakKosongAKhir($diff);
                }
               ?>
                </tr>
               </tbody>
              </table>
          </div>
        </div>
 <?php
 function ceateDate($from,$lengthenght){  
      $date1=array();
      for ($a=0;$a<=$lengthenght;$a++)
        {
        $date1[$a]=date('Y-m-d', strtotime('+'.$a.' day', strtotime($from)));
        }
      return $date1;
    }
  function cek_index($date,$dateAr){
      $jum=count($dateAr);
      for ($i=0;$i<$jum;$i++)
      {
        if ($date==$dateAr[$i])
          {
          return $i;
          }
      }
      return 10987;//not_found
    }
  function cetakKosong($jum)
  {
    for ($i=0; $i <$jum; $i++) { 
      echo "<td></td>";
    }
  }
  function cetakKosongAKhir($jum)
  {
    for ($i=0; $i <=$jum ; $i++) { 
     echo "<td></td>";
    }
  }
 ?>
 <style type="text/css">
.t1{border-collapse:collapse;border-spacing:0;}

.t1 th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px; border-color:grey ;overflow:hidden;word-break:normal;background: #3fb618;  color: #fff;}
.t1 td{font-family:Arial, sans-serif;font-size:14px;padding:2px;border-style:solid;border-width:1px; border-color:grey ;overflow:hidden;word-break:normal;}

.divName{
   -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  width: auto;
  height: auto;
  padding: 4px;
  overflow: hidden;
  border: none;
  -webkit-border-radius: 4px;
  border-radius: 4px;
  font: normal 16px/1 "Times New Roman", Times, serif;
  color: rgba(255,255,255,1);
  text-align: center;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  background: #0199d9;
  -webkit-box-shadow: 1px 1px 1px 0 rgba(0,0,0,0.3) ;
  box-shadow: 1px 1px 1px 0 rgba(0,0,0,0.3) ;
  text-shadow: 1px 1px 1px rgba(0,0,0,0.2) ;
  cursor: pointer;
  position: relative;
}
 </style>

<div class="modal fade myModal bs-example-modal-sm" role="modal">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-body">
        <div id="content"></div>
      <br/>
      <button class="btn btn-success" data-dismiss="modal">CLOSE</button>
    </div>   
  </div>
    
  </div>
</div>