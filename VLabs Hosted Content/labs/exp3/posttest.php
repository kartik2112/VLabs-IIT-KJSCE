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

                  function result()
                  {  
                      if(document.querySelector('input[name="q1"]:checked').value == 1)
                          document.getElementById("a1").innerHTML = "1) Correct";
                      else
                          document.getElementById("a1").innerHTML =  "1) Wrong";
                      if(document.querySelector('input[name="q2"]:checked').value == 3)
                          document.getElementById("a2").innerHTML = "2) Correct";
                      else
                          document.getElementById("a2").innerHTML =  "2) Wrong";
                     if(document.querySelector('input[name="q3"]:checked').value == 1)
                          document.getElementById("a3").innerHTML = "3) Correct";
                      else
                          document.getElementById("a3").innerHTML =  "3) Wrong";
                      
               } 
            
            </script>
              
            
              <br>
              1. Why RBFN is better than Multi layer Perceptron (MLP)?<br>
              <input type="radio" name="q1" value="1">
              Because RBFN performs classification by measuring the input’s similarity to the examples from the training set
              <br>
              <input type="radio" name="q1" value="2">
              Because it is easy to solve complex network problem by RBFN than MLP
              <br>
              <input type="radio" name="q1" value="3">
              Because RBFN has one single hidden layer
              <br>
              <input type="radio" name="q1" value="4">
              None of these
              <br><br>
              2. If  the  difference  between  the  input  and  the  prototype  increases ,what will be the effect  on the total response?<br>
              <input type="radio" name="q2" value="1">
              The response will increase exponentially
              <br>
              <input type="radio" name="q2" value="2">
              The response will increase linearly
              <br>
              <input type="radio" name="q2" value="3">
              The response will fall exponentially
              <br>
              <input type="radio" name="q2" value="4">
              The response will not change
              <br><br>
              <br>
              3.What are the two stages in radial basis function network ?<br>
              <input type="radio" name="q3" value="1">
              Stage 1: establish a centre and a radii for the RBF layer.<br>
			  Stage 2: Discover the weights for the output layer.
              <br>
              <input type="radio" name="q3" value="2">
              Stage 1: Discover the weights for the output layer.<br>
			  Stage 2: establish a centre and a radii for the RBF layer.
              <br>
              <input type="radio" name="q3" value="3">
              Stage 1: establish a centre for the RBF layer.<br>
			  Stage 2: establish a radii for the RBF layer.
              <br>
              <input type="radio" name="q3" value="4">
              Stage 1: establish a centre and a radii for the RBF layer.<br>
			  Stage 2: Discover the weights for the hidden layer.
              <br><br>
            
              <input type="button" value="Evaluate" onclick="result()">
              
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

