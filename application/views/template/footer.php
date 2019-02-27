 </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>file/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>file/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url() ?>file/js/ie10-viewport-bug-workaround.js"></script>
    <script src="<?php echo base_url() ?>file/js/jquery-ui.js"></script>
 <script type="text/javascript">
 $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
    	content: function () {
              return $(this).prop('title');
          }
    });   
});
</script>
 </body>
 </html>