<script type="text/javascript" src="http://opensource.teamdf.com/number/jquery.number.js"></script>

<div class="container">
      <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"><a href="<?php echo base_url('FrontDesk') ?>" aria-controls="sob" >Dashboard</a></li>
          <li role="presentation" ><a href="<?php echo base_url('frontDesk/calender') ?>" aria-controls="calender" >Calender</a></li>
          <li role="presentation" class="active"><a href="<?php echo base_url('frontDesk/reservation') ?>" aria-controls="Reservation" >Reservation</a></li>
          <li role="presentation"><a href="<?php echo base_url('frontDesk/folio') ?>" aria-controls="Folio" >Folio</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane" id="Dashboard">        
            <br/>
                dashboard
          </div>
          <div role="tabpanel" class="tab-pane active" id="Reservation">
              <br/>
              <button class=" btn btn-success" data-toggle="modal" data-target="#resDialog" >New Reservation</button> 
              <p></p>
              <table class="table table-bordered" id="tableProperty">
                <thead> </th><th>Guest_Name</th>               <th>check_in</th><th>check_out</th><th>Room</th> <th>villa</th>                <th>status</th><th>Rate</th><th>sob</th><th>email</th>                <th></th>
                </thead>
                <tbody>
                <?php foreach ($reservation as $dt){?>
                  <tr>
                    <td class="resId" style="display: none;"><?php echo $dt->resId?></td>
                    <td class="guestN" title="<?php echo $dt->remark;?>"><?php echo $dt->guest_name?></td>
                    <td class="ci"><?php $ciTmp=$dt->check_in; echo date("Y-m-d",strtotime($ciTmp));?></td>
                    <td class="co"><?php $coTmp=$dt->check_out; echo date("Y-m-d",strtotime($coTmp));?></td>
                    <td class="rI" style="display:none;"><?php echo $dt->roomsId?></td>
                    <td ><?php echo $dt->roomsName?></td>
                    <td ><?php echo $dt->propertyName?></td>
                    <td class="stt"><?php echo $dt->status?></td>
                    <td class="usd"><?php echo number_format($dt->rate_usd,0,',',',')?></td>
                    <td class="idr" style="display:none;"><?php echo $dt->rate_idr?></td>
                    <td class="ls" style="display:none;"><?php echo $dt->los?></td>
                    <td class="contract" style="display:none;"><?php echo $dt->rate_contract?></td>
                    <td style="display:none;"><?php echo $dt->sobId?></td>
                    <td class="sI" style="display:none;"><?php echo $dt->sobId?></td>
                    <td ><?php echo $dt->sobName?></td>
                    <td ><?php $email=$dt->email?> <a class="email" title="<?php echo $email?>" href="mailto:<?php echo $email?>"><?php echo substr($email,0,15)?></a></td>
                    <td  style="display:none;" class="remark" title="<?php $rmk=$dt->remark; echo $rmk; ?>"><?php echo substr($rmk,0,10)?></td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown">TOOL<span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                          <li role="presentation"> <a role="menu-item" tabindex="-1" href="javascipt:void()" class="editRes">EDIT</a></li>
                          <li role="presentation"> <a role="menu-item" tabindex="-1" href="javascipt:void()" class="deltRes">DELETE</a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                 </tbody>
              </table>
          </div>
          <div role="tabpanel" class="tab-pane" id="Folio">
            
          </div>
        </div>

    </div> <!-- /container -->
<div class="alert alert-info" id="pesanInfo" style="position:Fixed;bottom:0;left:0;width:30%;"><?php if($this->session->flashdata("pesan")) echo $this->session->flashdata("pesan");?></div>
      <div class="modal fade" id="delConfirmation" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-body">Are You Sure To Delete This Data??<input type="hidden" id="tmpId"></div>
            <div class="modal-footer"><button class="btn btn-success" data-dismiss="modal">CANCEL</button><button class="btn btn-danger"  onclick="deleteRes()">OK</button></div>
          </div>
        </div>
      </div>
          
     <script type="text/javascript">
      $(document).ready(function(){
            $("#pesanInfo").hide();
            var info=$("#pesanInfo").html();
            var l=info.length;
            if(l>1)
            {
              $("#pesanInfo").show();
              $("#pesanInfo").alert();
              $("#pesanInfo").fadeTo(2000,500).slideUp(500,function(){
               $("#pesanInfo").slideUp(500);
              });
            }

            $('.editRes').click(function(){
              var $row=$(this).closest("tr");
              var $resId=$row.find(".resId").text();$('#resId').val($resId);
              var $Gname=$row.find(".guestN").text();$('#guestName').val($Gname);
              var $ci=$row.find(".ci").text();$('.checkIn').val($ci);
              var $co=$row.find(".co").text();$('.checkOut').val($co);
              var $roomId=$row.find(".rI").text();$('#roomsId').val($roomId);
              var $stt=$row.find(".stt").text();$('#status').val($stt);
              var $usd=$row.find(".usd").text();var us=$usd.replace(/,/gi,"");$('#rateUSd').val(us);
              var $idr=$row.find(".idr").text();$('#rateIdr').val($idr);
              var $ls=$row.find(".ls").text();$('#losTmp').html($ls);$('#los').val($ls);
              var $contract=$row.find(".contract").text();$('#rateContract').val($contract);
              var $si=$row.find(".sI").text();$('#sob').val($si);
              var $email=$row.find(".email").attr('title');$('#email').val($email);
              var $remark=$row.find(".remark").attr('title');$('#remark').val($remark);//alert($ci);
              $('#resDialog').modal('show');
            });
            $('.deltRes').click(function(){

              var $row=$(this).closest("tr");
              var $idR=$row.find(".resId").text();
              document.getElementById("tmpId").value=$idR;
              $("#delConfirmation").modal("show");
             
            });
            $('#losTmp').click(function(){
              $('#los').attr('type','text');
              $('#losTmp').hide();
            });
         });
      function deleteRes()
      {
        var id=document.getElementById("tmpId").value;
        //alert(id);
        window.location.href="<?php echo base_url('/frontDesk/deleteRes/')?>"+id;
      }
      </script>
      <script>
       $( function() {
    $("#checkIn,#checkOut" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat:'yy-mm-dd'
    });
  } );  
    </script> 
<script type="text/javascript">
      
      $(function(){
        // Set up the number formatting.
        $('#rateUSd').number( true, 0 );$('#rateIdr').number( true, 0 );$('#rateContract').number( true, 0 );
        
      });
    </script>
    <div class="modal fade popUp" id="resDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Reservation</h4>
          </div>
          <div class="modal-body">
            
            <form class ="resForm" method="POST" action="<?php echo base_url('frontDesk/saveReservation')?>">
              
           <div class="form-group">
            <label for="guestName">Guest Name</label>
              <input type="hidden" id="resId" name="id"><input type="text" class="form-control" id="guestName" name="guestName" placeholder="Guest Name">
            </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-xs-4" >
                    <b>Check In</b>
                    <input class="form-control checkIn" name="checkIn" id="checkIn">
                  </div>
                  <div class="col-xs-4">
                    <b>Check Out</b>
                    <input type="text" class="form-control checkOut" name="checkOut"  id="checkOut" onchange="getLenght()">
                  </div>
                  <div class="col-xs-2">
                      <b>LOS</b>
                    <br/><input type="hidden" name='los' id="los" class="form-control"><span id="losTmp" class="form-control"></span>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label for="villa">Villa</label>
              <select class="form-control" id="roomsId" name="roomsId">
                <?php 
                foreach ($roomsType as $rT ) {?>
                   <option value="<?php echo $rT->roomsId ?>"><?php echo $rT->roomsType?></option>';
                <?php }     
                ?>
              </select>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-xs-4">
                <b>Status</b>
                  <select class="form-control" id="status" name="status">
                  <option value="Booking">Booking</option>
                  <option value="Confirmed">Confirmed</option>
                  <option value="Registered">Registered</option>
                  <option value="Canceled">Canceled</option>
                </select>
                </div>
                <div class="col-xs-4">
                  <b>SOB</b>
                  <select class="form-control" id="sob" name="sob">
                    <?php       foreach ($sob as $mySob) {?>
                         <option value="<?php echo $mySob->sobId ?>"><?php echo $mySob->name?></option>';
                       <?php }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-inline">
              <div class="row">
                <div class="col-xs-4">
                <b>Rate USD</b>
                <input type="text" class="form-control" id="rateUSd" name="rateUSd" placeholder="Rate(USD)">
                </div>
                <div class="col-xs-4"><b>Rate IDR</b>
                  <input type="text" class="form-control" id="rateIdr" name="rateIdr" placeholder="Rate(IDR)">
                </div>
                <div class="col-xs-4"><b>Rate Contract</b><br/>
                  <input type="text" class="form-control" id="rateContract" name="rateContract" placeholder="Rate(Contract)">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-xs-12">
                  <b>E-Mail</b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="jhon@exaple.com">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="remark">Remark</label>
              <textarea class="form-control" id="remark" name="remark" ></textarea>
            </div>
            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-primary save"> <span id="waitingLoad">Save changes </span></button></form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  function getLenght()
  {
   var ci= $('#checkIn').val(); var co=$('#checkOut').val();
   var start= new Date(ci);
   var end= new Date(co);
   var timeDiff=Math.abs(end.getTime()-start.getTime());
   var diffDay=Math.ceil(timeDiff/(1000*3600*24));
   $('#los').val(diffDay);
   $('#losTmp').html(diffDay);
  }
</script>