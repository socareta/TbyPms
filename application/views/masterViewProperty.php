
<div class="container"> 
      <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="<?php echo base_url('master'); ?>" aria-controls="sob" >SOB</a></li>
    <li role="presentation" class="active"><a href="<?php echo base_url('/master/property'); ?>" aria-controls="property" role="tab" data-toggle="tab">Property</a></li>
    <li role="presentation"><a href="<?php echo base_url('/master/room'); ?>" aria-controls="room" >Room</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="property">
        <br/>
        <button class=" btn btn-success" data-toggle="modal" data-target="#popUpProperty" > ADD PROPERTY</button> <p></p>
      <table class="table table-bordered" id="tableProperty">
        <thead><th>Name</th><th>address</th><th>reservation</th><th>phone</th><th>sales</th>
         <th>web</th><th>remark</th><th></th>
        </thead>
        <tbody>
      		<?php 
					foreach($property as $u){ 
					?>
					<tr>
						<td class="propertyID" style="display: none;"><?php echo $u->propertyId ?></td>
						<td class="name"><?php echo $u->name ?></td>
						<td class="address" title="<?php $addr =$u->address; echo $addr; ?>"><?php echo substr($addr, 0,18).".." ?></td>
						<td class="reservation"><a href="mailto:<?php $mail=$u->reservation;echo $mail; ?>"><?php echo $mail ?></a></td>
            <td class="phone"><?php echo $u->phone ?></td>
						
						<td class="sales"><?php echo $u->sales ?></td>
						<td> <a class="web" href="http://<?php echo $u->web;?>" target="_blank" title="<?php $web=$u->web;  echo $web ?>"><img src="<?php echo base_url('file/images/webIcon.png')?>" width="30px"></a></td>
						<td class="remark" title="<?php $rmk=$u->remark;echo $rmk; ?>"><?php echo substr($rmk, 0,15) ?></td>
            <td> 
                <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle btn-sm" type="button" id="menu1" data-toggle="dropdown">TOOL
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void()" class="editProperty">EDIT</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void()" class="delProperty">DELETE</a></li>
                  </ul>
                </div>
              </td>
					</tr>
					<?php } ?>
      </tbody>
      </table>
    </div>
  </div>

    </div> <!-- /container -->
<div class="alert alert-info" id="pesanInfo" style="position:Fixed;bottom:0;left:0;width:30%;"><?php if($this->session->flashdata("pesan")) echo $this->session->flashdata("pesan");?></div>
      <div class="modal fade" id="delConfirmation" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-body">Are You Sure To Delete This Data??<input type="hidden" id="tmpId"></div>
            <div class="modal-footer"><button class="btn btn-success" data-dismiss="modal">CANCEL</button><button class="btn btn-danger"  onclick="delP()">OK</button></div>
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

      $('.editProperty').click(function(){
        var $row=$(this).closest("tr");
        var $idP=$row.find(".propertyID").text();$('#idP').val($idP);
        var $name=$row.find(".name").text();$('#nameV').val($name);
        var $address=$row.find(".address").attr('title');$('#address').val($address);
        var $reservation=$row.find(".reservation").text();$('#reservation').val($reservation);
        var $phone=$row.find(".phone").text();$('#phone').val($phone);
        var $sales=$row.find(".sales").text();$('#sales').val($sales);
        var $web=$row.find(".web").attr('title');$('#web').val($web);
        var $remark=$row.find(".remark").attr('title');$('#remark').val($remark);
        $('#popUpProperty').modal('show');
      });
      $('.delProperty').click(function(){

        var $row=$(this).closest("tr");
        var $idP=$row.find(".propertyID").text();
        document.getElementById("tmpId").value=$idP;
        $("#delConfirmation").modal("show");
       
      });
   });
   function delP(){
       var id=document.getElementById("tmpId").value; 
       window.location.href="<?php echo base_url('master/delProperty/')?>"+id;     
    }
    </script>

<div class="modal fade" id="popUpProperty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Property FORM</h4>
      </div>
      <div class="modal-body">
        
        <form id="formProperty" method="POST" action="<?php echo base_url()?>master/saveProperty">
          
       <div class="form-group">
          <label for="guestName">Name</label>
          <input type="hidden" id="idP" name="idP"><input type="text" class="form-control" id="nameV" name="nameV" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="guestName">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Address">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-6">
              <b>Reservation</b>
              <input type="email" class="form-control" id="reservation" name="reservation" placeholder="jhon@exaple.com">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <div class="form-group">
              <label for="guestName">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
              <label for="guestName">Sales</label>
              <input type="text" class="form-control" id="sales" name="sales" placeholder="Sales">
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label for="guestName">Web</label>
          <input type="text" class="form-control" id="web" name="web" placeholder="Web">
        </div>
        <div class="form-group">
          <label for="remark">Remark</label>
          <textarea class="form-control" id="remark" name="remark" ></textarea>
        </div>
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary saveProperty"> <span id="waitingLoadV">Save changes </span></button></form>
      </div>
      </div>
    </div>
  </div>
</div> 
</div> 
  </body>
</html>
