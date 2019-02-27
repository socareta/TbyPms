<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 2 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Note there is no responsive meta tag here -->

    <link rel="icon" href="<?php echo base_url('file/images/ico.png'); ?>">

    <title>TOBEASY SYSTEM - <?php echo $menu;?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('file/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('file/css/bootstrap.cus.css'); ?>" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url() ?>file/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="http://getbootstrap.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url() ?>/file/js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>file/css/jquery-ui.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css">
  .selected {
    background-color: grey;
    color: #FFF;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    border: 0;
    }   .nav-tabs {
        background-color: #3fb618 !important;
    }

    .nav-tabs>li.active {
        background-color:   #f9f9f9 !important;
        color: black;
        border-bottom-width: 2px;
        border-left-width: 2px;
        border-left-style: solid;
        border-left-color: #3fb618;
        border-top-style: solid;
        border-top-color: #3e8de6 ;
    }
    .nav-tabs>li>a{
      -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    color:#FFFFFF;
    font-size: 16px;
    font-weight: bold;
    }
    .nav-tabs>li>a:hover{
    color:#000000;
    }
    .nav > li > a {
        outline:none !important;
    }
</style>
    
</head>
  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse ">
      <div class="container-fluid">
        <div class="navbar-header navbar-fluid">
          <!-- The mobile navbar-toggle button can be safely removed since you do not need it in a non-responsive implementation -->
          <a class="navbar-brand" href="#"></a>
        </div>
        <!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
        <div id="navbar">
          <ul class="nav navbar-nav">
            <li class="<?php echo menu('Home',$menu); ?>"><a href="<?php echo $homeUrl; ?>"><i class="icon-home icon-large"></i> Home</a></li>
            <li class="<?php echo menu('FrontDesk',$menu); ?>"><a href="<?php base_url()?>frontDesk"><i class="icon-bell icon-large"></i> FrontDesk</a></li>
            <li class="<?php echo menu('Master',$menu); ?>"><a href="<?php base_url()?>master"><i class="icon-asterisk icon-large"></i> Master</a></li>
            <li class="<?php echo menu('Report',$menu); ?>"><a href="<?php base_url()?>report"><i class="icon-bar-chart icon-large"></i> Report</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="<?php echo $logout;?>"><i class="icon-signout icon-large"></i> Sign Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" >

<?php
  function menu($menu,$dt)
  {
    if($menu==$dt)
      return "active";
  }
  {

  }
?>