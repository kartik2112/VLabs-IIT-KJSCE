<?php
    session_start();
    $_SESSION["currPage"]=8;
?> 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Virtual Labs </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

        <link href="../../src/Styles.css" rel="stylesheet" />
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <?php include '../../common/header.html';
              include 'lab_name.php';
              $lab_name = $_SESSION['lab_name'];
              $exp_name = $_SESSION['exp_name'];
         ?>

        <div class="wrapper">
        <header class="main-header">
        <!-- Logo -->
        <a href="../explist.php" class="logo">
        <p align="center" style="font-size:1em;"><b><?php echo $lab_name?><!-- Write your lab name --></b></p>
    </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
          <section class="content-header">
            <ol class="breadcrumb">
              <li>
                <a href="../explist.php"><i class="fa fa-dashboard"></i><?php echo $lab_name?><!-- Write your lab name --></a>
              </li>
              <li>
                <a href="#"><?php echo $exp_name?><!-- Write your experiment name --></a>
              </li>
              <li class="active">References</li>
            </ol>
          </section>
        </nav>
      </header>
            <?php include 'pane.php'; ?>
            
            <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 align="center"><?php echo $exp_name?>
            <!-- Write your experiment name -->
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <h3 style="margin-top:5%">References</h3>
          <p class="MsoNormal" style="text-align:justify">

           <!--Reference content goes here -->
            <li> <a href="https://en.wikipedia.org/wiki/Multilayer_perceptron" target="_blank" class="hyperlink">  https://en.wikipedia.org/wiki/Multilayer_perceptron</a></li>
              <li> <a href="https://en.wikipedia.org/wiki/Feedforward_neural_network" target="_blank" class="hyperlink">  https://en.wikipedia.org/wiki/Feedforward_neural_network</a></li>
              <li> <a href="https://en.wikipedia.org/wiki/Backpropagation" target="_blank" class="hyperlink">  https://en.wikipedia.org/wiki/Backpropagation</a></li>
            <b>Developed by:</b>
              <ol>
                  <li>Abhishek Ananthakrishnan</li>
                  <li>Abhishek Mahajani</li>
                  <li>Kartik Shenoy</li>
                  <li>Manmath Paste</li>                        
                  <li>Meet Mukadam</li>
                  <li>Nitin Mishra</li>
                  <li>Tejas Dastane</li>
                  <li>Varun Rao</li>
                  <li>Vinay Pandya</li>                        
              </ol>
          </p>
        </section>
        <!-- /.content -->
      </div>
      <?php include 'footer.html'; ?>
      <!-- /.content-wrapper -->
            
        </div>
    </body>
</html>

<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>