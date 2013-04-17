<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Typing Test</title>
    
    <base href="<?php echo $config['http']; ?>" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="assets/circle.skin/circle.player.css" rel="stylesheet">
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jsdiff.js"></script>
    <script src="assets/js/jquery.transform2d.js"></script>
    <script src="assets/js/jquery.grab.js"></script>
    <script src="assets/js/jquery.jplayer.js"></script>
    <script src="assets/js/mod.csstransforms.min.js"></script>
    <script src="assets/js/circle.player.js"></script>
    
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="">
              <?php if( isset( $_SESSION['testername'] ) ) { ?>
                  Welcome, <?php echo $_SESSION['testername']; ?>
              <?php } else { ?>
                  Welcome
              <?php } ?>
          </a>
          <div class="nav-collapse collapse">
            <!--
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
            -->
          </div>
        </div>
      </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="span12">
                
                <?php if( isset( $message ) ) { ?>
                    <div class="alert alert-block alert-danger">
                        <p class="lead"><?php echo $message; ?></p>
                    </div>
                <?php } ?>
