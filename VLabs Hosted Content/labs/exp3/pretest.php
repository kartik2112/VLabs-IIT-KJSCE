	<?php
    session_start();
    $_SESSION["currPage"] = 3;
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
                            <li class="active">Pre Test</li>
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
                    <h3 style="margin-top:5%">Pre Test</h3>
                    <p class="MsoNormal" style="text-align:justify">
                        <!-- Pre Test content goes here -->
                        <script>

                  function result()
                  {  
                      if(document.querySelector('input[name="q1"]:checked').value == 1)
                          document.getElementById("a1").innerHTML = "1) Correct";
                      else
                          document.getElementById("a1").innerHTML =  "1) Wrong";
                      if(document.querySelector('input[name="q2"]:checked').value == 2)
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
            1. If the value of 1/(2*sigma^2) increases in activation function then the size of graph  ?<br>
              <input type="radio" name="q1" value="1">
              Decreases
              <br>
              <input type="radio" name="q1" value="2">
              Increases
              <br>
              <input type="radio" name="q1" value="3">
              Remains Constant
              <br>
              <input type="radio" name="q1" value="4">
              None of these
              <br><br>
            2. How many hidden layers are there in RBFN?<br>
              <input type="radio" name="q2" value="1">
              0
              <br>
              <input type="radio" name="q2" value="2">
              1
              <br>
              <input type="radio" name="q2" value="3">
              2
              <br>
              <input type="radio" name="q2" value="4">
              3
              <br><br>
            
			<br>
            3. RBF neuron activation function is given by ?<br>
              <input type="radio" name="q3" value="1">
              Phi(x)=e^(-beta*||x- mu||^2)
              <br>
              <input type="radio" name="q3" value="2">
              Phi(x)=e^(-beta/||x- mu||^2)
              <br>
              <input type="radio" name="q3" value="3">
              Phi(x)=e^(-(beta*||x- mu||)2)
              <br>
              <input type="radio" name="q3" value="4">
              Phi(x)=e^(-beta^2*||x- mu||^2)
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

