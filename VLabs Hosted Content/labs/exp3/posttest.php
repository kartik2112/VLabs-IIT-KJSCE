<?php
    session_start();
    $_SESSION["currPage"] = 7;
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

        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link href="../../src/Styles.css" rel="stylesheet" />
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php
            include '../../common/header.html';
            include 'lab_name.php';
            $lab_name = $_SESSION['lab_name'];
            $exp_name = $_SESSION['exp_name'];
            ?>
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="../explist.php" class="logo">
                    <p align="center" style="font-size:1em;">
                        <b>
                            <?php echo $lab_name?><!-- Write your lab name -->
                        </b>
                    </p>
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
                                <a href="../explist.php">
                                    <i class="fa fa-dashboard"></i><?php echo $lab_name?><!-- Write your lab name -->
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <?php echo $exp_name?><!-- Write your experiment name -->
                                </a>
                            </li>
                            <li class="active">Post Test</li>
                        </ol>
                    </section>
                </nav>
            </header>
            <?php include 'pane.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center">
                        <?php echo $exp_name?>
                        <!-- Write your experiment name -->
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <h3 style="margin-top:5%">Post Test</h3>
                    <p class="MsoNormal" style="text-align:justify">
                        <!-- Post Test content goes here -->
                         <script>
                             $(document).ready(function () {
                                 $(".optradio1").click(function () {
                                     ////alert("clicked");
                                     $("#optradio1Ans").slideDown();
                                     $('html, body').animate({
                                        scrollTop: $("#optradio1Ans").offset().top-300
                                     }, 1000);
                                     $('.optradio1').attr('disabled','disabled');
                                 });
                                 $(".optradio2").click(function () {
                                     //alert("clicked");
                                     $("#optradio2Ans").slideDown();
                                     $('html, body').animate({
                                        scrollTop: $("#optradio2Ans").offset().top-300
                                     }, 1000);
                                     $('.optradio2').attr('disabled','disabled');
                                 });
                                 $(".optradio3").click(function () {
                                     //alert("clicked");
                                     $("#optradio3Ans").slideDown();
                                     $('html, body').animate({
                                        scrollTop: $("#optradio3Ans").offset().top-300
                                     }, 1000);
                                     $('.optradio3').attr('disabled','disabled');
                                 });

                             });

            </script>
              
            
              <br>
              <h3>1. Why RBFN is better than Multi layer Perceptron (MLP)?</h3>
              <input class="optradio1" type="radio" name="q1" value="1">
              A. Because RBFN performs classification by measuring the input’s similarity to the examples from the training set
              <br>
              <input class="optradio1" type="radio" name="q1" value="2">
              B. Because it is easy to solve complex network problem by RBFN than MLP
              <br>
              <input class="optradio1" type="radio" name="q1" value="3">
              C. Because RBFN has one single hidden layer
              <br>
              <input class="optradio1" type="radio" name="q1" value="4">
              D. None of these
              <br><p id="optradio1Ans" class="testAns" style="display:none;"> Ans is A</p><br>
              
              <h3>2. If  the  difference  between  the  input  and  the  prototype  increases ,what will be the effect  on the total response?</h3>
              <input class="optradio2" type="radio" name="q2" value="1">
              A. The response will increase exponentially
              <br>
              <input class="optradio2" type="radio" name="q2" value="2">
              B. The response will increase linearly
              <br>
              <input class="optradio2" type="radio" name="q2" value="3">
              C. The response will fall exponentially
              <br>
              <input class="optradio2" type="radio" name="q2" value="4">
              D. The response will not change
              <br><p id="optradio2Ans" class="testAns" style="display:none;"> Ans is A</p><br>
              <br>

              <h3>3.What are the two stages in radial basis function network ?</h3>
              <input class="optradio3" type="radio" name="q3" value="1">
              A. Stage 1: establish a centre and a radii for the RBF layer.<br>
			  &emsp;&emsp;Stage 2: Discover the weights for the output layer.
              <br>
              <input class="optradio3" type="radio" name="q3" value="2">
              B. Stage 1: Discover the weights for the output layer.<br>
			  &emsp;&emsp;Stage 2: establish a centre and a radii for the RBF layer.
              <br>
              <input class="optradio3" type="radio" name="q3" value="3">
              C. Stage 1: establish a centre for the RBF layer.<br>
			  &emsp;&emsp;Stage 2: establish a radii for the RBF layer.
              <br>
              <input class="optradio3" type="radio" name="q3" value="4">
              D. Stage 1: establish a centre and a radii for the RBF layer.<br>
			  &emsp;&emsp;Stage 2: Discover the weights for the hidden layer.
              <br><p id="optradio3Ans" class="testAns" style="display:none;"> Ans is A</p><br>
            
              
              <h3 id="a1"></h3>
              <h3 id="a2"></h3>
             <h3 id="a3"></h3>
            
            
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

