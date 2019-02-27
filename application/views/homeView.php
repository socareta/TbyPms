<?php
//if (isset($this->session->userdata['logged_in'])) {
//$username = ($this->session->userdata['logged_in']['username']);
//$email = ($this->session->userdata['logged_in']['email']);
//} else {
//header("location: login");
//}
?>
<style type="text/css"> a{text-decoration: none;font-weight: bold;} a:hover{text-decoration: none;font-weight: bold;}</style>
	<div class="row">
      	<div class="col-lg-4">
      		<a href="<?php echo base_url()?>frontDesk/reservation">
		    <div class="alert alert-dismissible" style="background-color:#20b2aa">
		    <center><img src="<?php echo base_url()?>file/images/service-bell.png" width="60%"><p style="color:black">
		    <br/><u>UPCOMING</u></p><br/>
			<?php 
								if(count($upcoming)<1)
								{
									echo "Not Found reservation!!";
								}
								else
								{
									foreach ($upcoming as $val) {
										echo '<p><span style="color:black;">'.$val->guest_name.'</span></p>';
									}
								}
							?>
		    	</center>	
			</div>
			</a>
		</div>
      	
	     <div class="col-lg-4">
      		<a href="<?php echo base_url()?>frontDesk/folio">
	      	<div class="alert alert-dismissible " style="background-color:#00ff00">
				<center><img src="<?php echo base_url()?>file/images/co.png" width="10%"> <p>PASS</p>
				
				<?php 
							if(count($pass)<1)
								{
									echo "Not Found reservation!!";
								}
								else
								{
									foreach ($pass as $val) {
										echo '<p><span style="color:black;">'.$val->guest_name.'</span></p>';
									}
								}
							?>
			</div>
	     </div>
	     <div class="col-lg-2">
      		<a href="javascript:void();">
	      	<div class="alert alert-dismissible " style="background-color:#f6546a">
				<center><img src="<?php echo base_url()?>file/images/booking.png" width="60%"><p>BOOKING</p> 
				<?php 
							if(count($booking)<1)
								{
									echo "Not Found reservation!!";
								}
								else
								{
									foreach ($booking as $val) {
										echo '<p><span style="color:black;">'.$val->jum.'</span></p>';
									}
								}
							?></center>	
			</div>
	     </div>
	     <div class="col-lg-2">
      		<a href="javascript:void()">
	      	<div class="alert alert-dismissible " style="background-color:#003366">
				<center><i class=" icon icon-usd icon-5x"></i><p>REVENUE</p>
				<?php 
							if(count($revenue)<1)
								{
									echo "Not Found reservation!!";
								}
								else
								{
									foreach ($revenue as $val) {
										echo '<p><span style="color:black;">'.number_format($val->jum,0,',',',').'</span></p>';
									}
								}
							?> </center>	
			</div>
	     </div>
	     
	     
      	<div class="col-lg-2">
      		<a href="<?php echo base_url()?>frontDesk/reservation">
		    <div class="alert alert-dismissible alert-info">
		    	<center><img src="<?php echo base_url()?>file/images/reservation.png" width="60%"><p>RESERVATION</p> </center>	
			</div></a>
		</div>
      	<div class="col-lg-4">
      		<a href="<?php echo base_url()?>frontDesk/calender">
	      	<div class="alert alert-dismissible alert-success">
				<center><img src="<?php echo base_url()?>file/images/chart.png" width="20%"><p>CHART</p> </center>	
			</div>
	     </div>
      	<div class="col-lg-2">
      		<a href="<?php echo base_url()?>report">
      		<div class="alert alert-dismissible alert-danger">
			  <center><img src="<?php echo base_url()?>file/images/report.png" width="60%"><p>REPORT</p> </center>	
			</div>
      	</div>

   
   
   
