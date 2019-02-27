<script type="text/javascript" src="http://opensource.teamdf.com/number/jquery.number.js"></script>

    <div class="container" >
      <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="<?php echo base_url('master/'); ?>" aria-controls="sob" >SOB</a></li>
    <li role="presentation"><a href="<?php echo base_url('master/property'); ?>" aria-controls="property" >Property</a></li>
    <li role="presentation" class="active"><a href="<?php echo base_url('master/room'); ?>" aria-controls="room" >Room</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane " id="sob">				
     
    </div>
    <div role="tabpanel" class="tab-pane " id="property">
       
    </div>
    <div role="tabpanel" class="tab-pane active" id="room">
      <br/>
        <button class=" btn btn-success" data-toggle="modal" data-target="#popUpRoom" > <strong>ADD ROOM TYPE</strong> </button> 
      <p></p>
      <table class="table table-bordered" id="">
        <thead>
          <th>Name</th><th>Property</th>     <th>type Of Room</th><th>rate_low</th><th>rate_hight</th><th>rate_peak</th><th>Description</th><th></th>        </thead>        <tbody>
      	 <?php
            foreach ($room as $field ) {?>
              <tr><td class="roomId" style="display: none; "><?php echo $field ->roomsId ?></td>
              <td class="name"><?php echo $field ->name ?></td>
              <td class="prtyId" style="display: none;"><?php echo $field ->propertyId?></td>
              <td ><?php echo $field ->propertyName?></td>
              <td class="typeOfRoom"><?php echo $field ->typeOfRoom ?></td>
              <td class="rateLowSeason"><span class="ls"><?php echo $field ->rateLowSeason ?></span></td>
              <td class="rateHightSeason"><span class="hs"><?php echo $field ->rateHightSeason ?></span></td>
              <td class="ratePeakSeason"><span class="ps"><?php echo $field ->ratePeakSeason ?></span></td> 
              <td class="description"><?php echo $field ->description ?></td>
              <td> 
                <div class="dropdown">
                  <button class="btn btn-success btn-sm dropdown-toggle " type="button" id="menu1" data-toggle="dropdown"><strong>TOOL</strong> 
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void()" class="editRoom"><strong>EDIT</strong> </a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void()" class="delRoom"><strong>DELETE</strong> </a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <?php
            }
         ?>
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
            <div class="modal-footer"><button class="btn btn-success" data-dismiss="modal">CANCEL</button><button class="btn btn-danger"  onclick="delRooms()">OK</button></div>
          </div>
        </div>
      </div>
    <script src="<?php echo base_url() ?>file/js/bootstrap-datetimepicker.min.js"></script>
   <script type="text/javascript">
    $(document).ready(function(){

      $('.editRoom').click(function(){
          $('#popUpRoom').modal('show');
          var $row=$(this).closest("tr");
          var $idR=$row.find(".roomId").text();$('#idR').val($idR);
          var $name=$row.find(".name").text();$('#name').val($name);
          var $property=$row.find(".prtyId").text();$('#propertyId').val($property);
          var $typeOfRoom=$row.find(".typeOfRoom").text();$('#typeOfRoom').val($typeOfRoom);
          var $rateLowSeason=$row.find(".rateLowSeason").text(); var df=$rateLowSeason.replace(/,/gi,"");$('#rateLowSeason').val(df);
          var $rateHightSeason=$row.find(".rateHightSeason").text();var dh=$rateHightSeason.replace(/,/gi,"");$('#rateHightSeason').val(dh);
          var $ratePeakSeason=$row.find(".ratePeakSeason").text();var dp=$ratePeakSeason.replace(/,/gi,"");$('#ratePeakSeason').val(dp);
          var $description=$row.find(".description").text();$('#description').val($description);
      });
   });
  $('.delRoom').click(function(){

        var $row=$(this).closest("tr");
        var $idP=$row.find(".roomId").text();
        document.getElementById("tmpId").value=$idP;
        $("#delConfirmation").modal("show");
       
      });
    function delRooms(){
       var id=document.getElementById("tmpId").value; 
       window.location.href="<?php echo base_url('master/deleteRoom/')?>"+id;     
    }
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
    </script>
<script type="text/javascript">
      
      $(function(){
        // Set up the number formatting.
        $('#rateLowSeason').number( true, 0 );$('#rateHightSeason').number( true, 0 );$('#ratePeakSeason').number( true, 0 );
        $('span.ls').number( true, 0 );$('span.hs').number( true, 0 );$('span.ps').number( true, 0 );
      });
    </script>
<div class="modal fade" id="popUpRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Property FORM</h4>
      </div>
      <div class="modal-body">
        
        <form action="<?php echo base_url('master/saveRoom')?>" method="POST">
          
       <div class="form-group">
          <label for="name">Name</label>
          <input type="hidden" id="idR" name="idR"><input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-6">
              <b>Property</b>
              <select id="propertyId" name="property" class="form-control" >
                <?php foreach ($prty as $field ) {?>
                <option value="<?php echo $field ->propertyId ?>"><?php echo $field ->name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-6">
              <b>Type Of Room</b>
              <select id="typeOfRoom" name="typeOfRoom" class="form-control" >
                <option value="1 Bedroom villa">1 Bedroom villa</option>
                <option value="2 Bedroom villa">2 Bedroom villa</option>
                <option value="3 Bedroom villa">3 Bedroom villa</option>
                <option value="4 Bedroom villa">4 Bedroom villa</option>
                <option value="5 Bedroom villa">5 Bedroom villa</option>
                <option value="6 Bedroom villa">6 Bedroom villa</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <div class="form-group">
              <label for="rateLowSeason">Rate Low Season</label>
              <input type="text" class="form-control" id="rateLowSeason" name="rateLowSeason" placeholder="Rate Low Season">
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
              <label for="rateHightSeason">Rate Hight Season</label>
              <input type="text" class="form-control" id="rateHightSeason" name="rateHightSeason" placeholder="Rate Hight Season">
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
              <label for="ratePeakSeason">Rate Peak Season</label>
              <input type="text" class="form-control" id="ratePeakSeason" name="ratePeakSeason" placeholder="Rate Peak Season">
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" ></textarea>
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
  </body>
</html>
