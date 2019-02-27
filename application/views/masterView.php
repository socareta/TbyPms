<div class="container">       
      <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#sob" aria-controls="sob" role="tab" data-toggle="tab">SOB</a></li>
    <li role="presentation"><a href="<?php echo base_url('master/property') ?>" aria-controls="property" >Property</a></li>
    <li role="presentation"><a href="<?php echo base_url('master/room') ?>" aria-controls="room" >Room</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="sob">				
      <br/>
      <button class=" btn btn-success" data-toggle="modal" data-target="#popUpSob" >ADD</button> 
        <button class="btn btn-primary" onclick="fnselect()">EDIT</button>
        <a href="javascript:void();" class="btn btn-danger" data-toggle="modal" data-target="#delConfirmation">DELETE</a>
      <p></p>
      <table class="table table-bordered" id="tableSOB">
        <thead>
          <th>#</th><th>Name</th><th>URL</th><!--<th>Area Manager</th><th>E-Mail</th><th>CS</th><th>Other</th>-->
        </thead>
        <tbody>
        <?php 
          $i=1;
					foreach($sob as $u){ 
					?>
					<tr><td><?php echo $i;?></td>
						<td style="display: none;"><?php echo $u->sobId ?></td>
						<td><?php echo $u->name ?></td>
						<td><?php echo $u->url ?></td>
						<td style="display: none;"><?php echo $u->contact ?></td>
						<td style="display: none;"><?php echo $u->email ?></td>
						<td style="display: none;"><?php echo $u->cs ?></td>
						<td style="display: none;"><?php echo $u->other ?></td>
					</tr>
					<?php $i++; } ?>
        </tbody>
      </table>
    </div>
  </div>
      <div class="alert alert-info" id="pesanInfo" style="position:Fixed;bottom:0;left:0;width:30%;"><?php if($this->session->flashdata("pesan")) echo $this->session->flashdata("pesan");?></div>
      <div class="modal fade" id="delConfirmation" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-body">Are You Sure To Delete This Data??</div>
            <div class="modal-footer"><button class="btn btn-success" data-dismiss="modal">CANCEL</button><button class="btn btn-danger"  onclick="delR()">OK</button></div>
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

    });
    function delR(){
      var id=$("#tableSOB tr.selected td:first" ).html();
      window.location.href="<?php echo base_url('master/deleteSob/')?>"+id;
      
     
    }
      function highlight(e) {
          if (selected[0]) selected[0].className = '';
          e.target.parentNode.className = 'selected';
      }

      var tableSob = document.getElementById('tableSOB'),
          selected = tableSob.getElementsByClassName('selected');
          tableSob.onclick = highlight;
  function fnselect(){
    $('#popUpSob').modal('show');
    var id=$("#tableSOB tr.selected td:eq(1)" ).html();$('#id').val(id);
    var Name=$("#tableSOB tr.selected td:eq(2)" ).html();$('#name').val(Name);
    var url=$("#tableSOB tr.selected td:eq(3)" ).html();$('#url').val(url);
    var manager=$("#tableSOB tr.selected td:eq(4)" ).html();$('#manager').val(manager);
    var email=$("#tableSOB tr.selected td:eq(5)" ).html();$('#email').val(email);
    var cs=$("#tableSOB tr.selected td:eq(6)" ).html();$('#cs').val(cs);
    var other=$("#tableSOB tr.selected td:eq(7)" ).html();$('#other').val(other);
    }
    </script>
<div class="modal fade" id="popUpSob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>Sourde Of Booking FORM</strong> </h4>
      </div>
      <div class="modal-body">
        
        <form  method="POST" action="<?php echo base_url();?>master/saveSob">
          
       <div class="form-group">
          <label for="guestName">Name</label>
          <input type="hidden" id="id" name="id"><input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="guestName">URL</label>
          <input type="text" class="form-control" id="url" name="url" placeholder="URL">
        </div>
        <div class="form-group">
          <label for="guestName">Area manager</label>
          <input type="text" class="form-control" id="manager" name="manager" placeholder="Area Manager">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-6">
              <b>E-Mail</b>
              <input type="text" class="form-control" id="email" name="email" placeholder="jhon@exaple.com">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="guestName">CS</label>
          <input type="text" class="form-control" id="cs" name="cs" placeholder="CS">
        </div>
        <div class="form-group">
          <label for="remark">Other</label>
          <textarea class="form-control" id="other" name="other" ></textarea>
        </div>
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary save"> <span id="waitingLoad">Save changes </span></button></form>
      </div>
      </div>
    </div>
  </div>
</div> 
</div>
