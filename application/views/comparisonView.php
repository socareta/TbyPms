<ul class="nav nav-tabs">
        <li><a href="<?php echo base_url()?>report">Dashboard</a> </li>
        <li class="active"><a href="<?php echo base_url('report/comparison') ?>">Comparison</a></li>
      </ul>
      <div class="tab-pane active">
     	<div class="row">
     		<div class="col-xs-12">
     			<h2>FACE REPORT</h2>
     			<table class="table table-bordered">
     				<thead><th style="min-width: 40px">Type</th><th>Year</th>
     					<?php 
	     					for($i=1;$i<=12;$i++)
	     					{
	     						$d="2017-".$i."-1";
	     						echo "<th>".date("M",strtotime($d))."</th>";
	     					}
     					?>
     				</thead>
     				<tbody>
     					<tr>
     						<td rowspan="2" ><b>Booking</b></td><td><b><?php echo date("Y"); ?></b></td>
     						<?php
     							$bul=1;
     							foreach ($booking as  $value) 
     							{  
     								$b=intval($value->bulan);
     								$book=$value->jumBooking;
     								if($bul==$b)
     								{
     									echo "<td>".$book."</td>";
     								}
     								else
     								{
     									$def=$b-$bul;
     									for($d=0;$d<$def;$d++){
     									echo "<td>0</td>";}echo "<td>".$book."</td>";
     									$bul++;
     								}
     								  
     								$bul++;  
     							}
     							$selisih=12-$bul;
     							for($r=0;$r<=$selisih;$r++)
     							{
     								echo "<td>0</td>";
     							}
     						?>
     					</tr>
     					<tr>
     						<td><b><?php  echo intval(date("Y"))-1?> </b></td>
     						<?php
     							$bul=1;
     							foreach ($bookingLastYear as  $value) 
     							{  
     								$b=intval($value->bulan);
     								$book=$value->jumBooking;
     								if($bul==$b)
     								{
     									echo "<td>".$book."</td>";
     								}
     								else
     								{
     									$def=$b-$bul;
     									for($d=0;$d<$def;$d++){
     									echo "<td>0</td>";}echo "<td>".$book."</td>";
     									$bul++;
     								}
     								  
     								$bul++;  
     							}
     							$selisih=12-$bul;
     							for($r=0;$r<=$selisih;$r++)
     							{
     								echo "<td>0</td>";
     							} 
     						?>
     					</tr>	
     					<tr>
     						<td rowspan="2"><b>Reserved</b></td><td><b><?php echo date("Y"); ?></b></td>
     						<?php  
     							$bul=1;
     							foreach ($reserved as  $value) 
     							{  
     								$b=intval($value->bulan);
     								$book=$value->jumBooking;
     								if($bul==$b)
     								{
     									echo "<td>".$book."</td>";
     								}
     								else
     								{
     									$def=$b-$bul;
     									for($d=0;$d<$def;$d++){
     									echo "<td>0</td>";}echo "<td>".$book."</td>";
     									$bul++;
     								}
     								  
     								$bul++;  
     							}
     							$selisih=12-$bul;
     							for($r=0;$r<=$selisih;$r++)
     							{
     								echo "<td>0</td>";
     							}
     						?>
     					</tr>
     					<tr>
     						<td><b><?php echo intval( date("Y"))-1; ?></b></td>
     						<?php
     							$bul=1;
     							foreach ($reservedLast as  $value) 
     							{  
     								$b=intval($value->bulan);
     								$book=$value->jumBooking;
     								if($bul==$b)
     								{
     									echo "<td>".$book."</td>";
     								}
     								else
     								{
     									$def=$b-$bul;
     									for($d=0;$d<$def;$d++){
     									echo "<td>0</td>";}echo "<td>".$book."</td>";
     									$bul++;
     								}
     								  
     								$bul++;  
     							}
     							$selisih=12-$bul;
     							for($r=0;$r<=$selisih;$r++)
     							{
     								echo "<td>0</td>";
     							}
     						?>
     					</tr>
     					<tr>
     						<td rowspan="2"><b>Revenue</b></td><td><b><?php echo date("Y"); ?></b></td>
     						<?php  
     							$bul=1;
     							foreach ($revenue as  $value) 
     							{  
     								$b=intval($value->bulan);
     								$rev=$value->revenue;
     								$profit=$value->margin;
     								if($bul==$b)
     								{
     									echo '<td >'.number_format($rev,0,',',',')."<p class='margin'>".number_format($profit,0,',',',')."</td>";
     								}
     								else
     								{
     									$def=$b-$bul;
     									for($d=0;$d<$def;$d++){
     									echo "<td>0</td>";}echo '<td>'.number_format($rev,0,',',',')."<p class='margin'>".number_format($profit,0,',',',')."</td>";
     									$bul++;
     								}
     								  
     								$bul++;  
     							}
     							$selisih=12-$bul;
     							for($r=0;$r<=$selisih;$r++)
     							{
     								echo "<td>0</td>";
     							}
     						?>
     					</tr>
     					<tr>
     						<td><b><?php echo intval(date("Y"))-1	; ?></b></td>
     						<?php  
                                        //print_r($bookingSobThis);
     							$bul=1;
     							foreach ($revenueLast as  $value) 
     							{  
     								$b=intval($value->bulan);
     								$rev=$value->revenue;
     								$profit=$value->margin;
     								if($bul==$b)
     								{
     									echo '<td>'.number_format($rev,0,',',',')."<p class='margin'>".number_format($profit,0,',',',')."</td>";
     								}
     								else
     								{
     									$def=$b-$bul;
     									for($d=0;$d<$def;$d++){
     									echo "<td>0</td>";}echo '<td >'.number_format($rev,0,',',',')."<p class='margin'>".number_format($profit,0,',',',')."</p></td>";
     									$bul++;
     								}
     								  
     								$bul++;  
     							}
     							$selisih=12-$bul;
     							for($r=0;$r<=$selisih;$r++)
     							{
     								echo "<td>0</td>";
     							}
     						?>
     					</tr>
     				</tbody>
     			</table>
     		</div>
     		<div  class="col-xs-12">
     			<h2>SOB REPORT</h2>
     			<table class="table table-bordered">
     				<thead><th>Type</th>
     					<?php 
	     					for($i=1;$i<=12;$i++)
	     					{
	     						$d="2017-".$i."-1";
	     						echo "<th>".date("M",strtotime($d))."</th>";
	     					}
     					?>
     				</thead>
     				<tbody>
                              <!-- booking sob 2017 -->
     					<tr>
     						<td colspan="13" style="background-color: #88c45a">Booking <?php echo date("Y"); ?></td>
                              </tr>
                              <tr>
     						<?php
     							$bulT=1;
     							$sob="";
                                        foreach ($bookingSobThis as  $value) 
     							{  
     								$b=intval($value->bulan);
     								$book=$value->jumBooking;
                                             $sobTmp=$value->name;
                                             if($sobTmp==$sob)
                                             {
                                                  if($bulT==$b)
                                                  {
                                                       echo "<td>".$book."</td>";
                                                  }
                                                  else
                                                  {
                                                       $def=$b-$bulT;
                                                       for($d=0;$d<$def;$d++){
                                                       echo "<td>0</td>";}echo "<td>".$book."</td>";
                                                       $bulT=$b;
                                                  }
                                             }
          							else
                                             {    
                                                  if($bulT<>1){
                                                       $selisih=12-$bulT;
                                                       for($r=0;$r<=$selisih;$r++)
                                                       {
                                                            echo "<td>0</td>";
                                                       }
                                                  }
                                                  $bulT=1;
                                                                 
                                                  echo "<tr><td><b>".$sobTmp."</b></td>";


                                                  if($bulT==$b)
                                                  {
                                                       echo "<td>".$book."</td>";
                                                  }
                                                  else
                                                  {
                                                       $def=$b-$bulT;
                                                       for($d=0;$d<$def;$d++){
                                                       echo "<td>0</td>";}echo "<td>".$book."</td>";
                                                       $bulT++;
                                                  }
                                             }	
          								  
     								$bulT++;
                                             $sob= $sobTmp;  
     							}
     							$selisih=12-$bulT;
     							for($r=0;$r<=$selisih;$r++)
     							{
     								echo "<td>0</td>";
     							}
                                        $bulT=1;
                                        $sob="";
     						?>
     					</tr>
                              <!-- end booking sob 2017 -->

                              <!-- booking sob 2016 -->
     					<tr>
                                   <td colspan="13" style="background-color: #88c45a">Booking <?php echo intval(date("Y"))-1; ?></td>
                              </tr>
                              <tr>
     						<?php
     							$bulT=1;
                                        $sob="";
                                        //print_r($bookingSobLast);
                                        if(count($bookingSobLast)<1)
                                        {
                                             echo "<td colspan='13'> <center>no data available..</center></td>";
                                        }
                                        else
                                        {
                                        foreach ($bookingSobLast as  $value) 
                                        {  
                                             $b=intval($value->bulan);
                                             $book=$value->jumBooking;
                                             $sobTmp=$value->name;
                                             if($sobTmp==$sob)
                                             {
                                                  if($bulT==$b)
                                                  {
                                                       echo "<td>".$book."</td>";
                                                  }
                                                  else
                                                  {
                                                       $def=$b-$bulT;
                                                       for($d=0;$d<$def;$d++){
                                                       echo "<td>0</td>";}echo "<td>".$book."</td>";
                                                       $bulT=$b;
                                                  }
                                             }
                                             else
                                             {    
                                                  if($bulT<>1){
                                                       $selisih=12-$bulT;
                                                       for($r=0;$r<$selisih;$r++)
                                                       {
                                                            echo "<td>0</td>";
                                                       }
                                                  }
                                                  $bulT=1;
                                                                 
                                                  echo "<tr><td><b>".$sobTmp."</b></td>";


                                                  if($bulT==$b)
                                                  {
                                                       echo "<td>".$book."</td>";
                                                  }
                                                  else
                                                  {
                                                       $def=$b-$bulT;
                                                       for($d=0;$d<$def;$d++){
                                                       echo "<td>0</td>";}echo "<td>".$book."</td>";
                                                       $bulT++;
                                                  }
                                             }    
                                                    
                                             $bulT++;
                                             $sob= $sobTmp;  
                                        }
                                        $selisih=12-$bulT;
                                        for($r=0;$r<=$selisih;$r++)
                                        {
                                             echo "<td>0</td>";
                                        }
                                   }
                                        $bulT=1;
                                        $sob="";
     						?>
     					</tr>
                              <tr>
                                   <td colspan="13" style="background-color: #88c45a">REVENUE <?php echo date("Y"); ?></td>
                              </tr>
                              <tr>
                                   <?php
                                        $bulT=1;
                                        $sob="";
                                        if(count($revenueSob)<1)
                                        {
                                             echo "<td colspan='13'> <center>no data available..</center></td>";
                                        }
                                        else
                                        {
                                        foreach ($revenueSob as  $value) 
                                        {  
                                             $b=intval($value->bulan);
                                             $re=$value->rev;
                                             $book=number_format($re,0,',',',');
                                             $sobTmp=$value->name;
                                             if($sobTmp==$sob)
                                             {
                                                  $df=$b-1;
                                                  if($bulT==$df)
                                                  {
                                                       echo "<td>".$book."</td>";
                                                       $bulT=$b;
                                                  }
                                                  else
                                                  {
                                                       $def=$b-$df;
                                                       for($d=0;$d<$def;$d++){
                                                       echo "<td>0</td>";}echo "<td>".$book."</td>";
                                                       $bulT=$b;
                                                  }
                                             }
                                             else
                                             {    
                                                  if($bulT<>1){
                                                       $selisih1=12-$bulT;
                                                       for($r=0;$r<$selisih1;$r++)
                                                       {
                                                            echo "<td>0</td>";
                                                       }
                                                  }
                                                  echo "</tr>";
                                                  $bulT=1;
                                                                 
                                                  echo "<tr><td><b>".$sobTmp."</b></td>";


                                                  if($bulT==$b)
                                                  {
                                                       echo "<td>".$book."</td>";
                                                       $bulT=$b;
                                                  }
                                                  else
                                                  {
                                                       $def=$b-$bulT;
                                                       for($d=0;$d<$def;$d++){
                                                       echo "<td>0</td>";}echo "<td>".$book."</td>";
                                                       $bulT=$b;
                                                  }
                                             }    
                                             $sob= $sobTmp;  
                                        }
                                        $selisih2=12-$bulT;
                                        for($r=0;$r<$selisih2;$r++)
                                        {
                                             echo "<td>0</td>";
                                        }
                                   }
                                        $bulT=1;
                                        $sob="";
                                   ?>
                              </tr>
                               <tr>
                                   <td colspan="13" style="background-color: #88c45a">REVENUE <?php echo intval( date("Y"))-1; ?></td>
                              </tr>
                              <tr>
                                   <?php
                                        $bulT=1;
                                        $sob="";

                                        if(count($revenueSobLast)<1)
                                        {
                                             echo "<td colspan='13'> <center>no data available..</center></td>";
                                        }
                                        else
                                        {
                                        foreach ($revenueSobLast as  $value) 
                                        {  
                                             $b=intval($value->bulan);
                                             $re=$value->rev;
                                             $book=number_format($re,0,',',',');
                                             $sobTmp=$value->name;
                                             if($sobTmp==$sob)
                                             {
                                                  if($bulT==$b)
                                                  {
                                                       echo "<td>".$book."</td>";
                                                  }
                                                  else
                                                  {
                                                       $def=$b-$bulT;
                                                       for($d=0;$d<$def;$d++){
                                                       echo "<td>0</td>";}echo "<td>".$book."</td>";
                                                       $bulT=$b;
                                                  }
                                             }
                                             else
                                             {    
                                                  if($bulT<>1){
                                                       $selisih=12-$bulT;
                                                       for($r=0;$r<$selisih;$r++)
                                                       {
                                                            echo "<td>0</td>";
                                                       }
                                                  }
                                                  $bulT=1;
                                                                 
                                                  echo "<tr><td><b>".$sobTmp."</b></td>";


                                                  if($bulT==$b)
                                                  {
                                                       echo "<td>".$book."</td>";
                                                  }
                                                  else
                                                  {
                                                       $def=$b-$bulT;
                                                       for($d=0;$d<$def;$d++){
                                                       echo "<td>0</td>";}echo "<td>".$book."</td>";
                                                       $bulT++;
                                                  }
                                             }    
                                                    
                                             $bulT++;
                                             $sob= $sobTmp;  
                                        }
                                        $selisih=12-$bulT;
                                        for($r=0;$r<=$selisih;$r++)
                                        {
                                             echo "<td>0</td>";
                                        }
                                   }
                                        $bulT=1;
                                        $sob="";
                                   ?>
                              </tr>
     					</tbody>
     				</table>

     		</div>
     	</div>
      </div>
      <?php
      ?>