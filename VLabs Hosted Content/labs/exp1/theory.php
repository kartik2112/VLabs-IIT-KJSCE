<?php
    session_start();
    $_SESSION["currPage"] = 2;
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
                            <li class="active">Theory</li>
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
                    <h3 style="margin-top:5%">Theory</h3>
                    <p class="MsoNormal" style="text-align:justify">
                        <!--Theory content goes here -->
                        <h3>Activation functions:- </h3>
                        <b>In computational networks, the activation function of a node defines the output of that node given an input or set of inputs.</b>
                        <br /><br /><img src="../images/artificial_nn.png" height="190px" width="400px;" /><br />
                        Fig 1. General structure of an artificial neural network with a single perceptron.
                        <br /><br />
                        <h3>Types of activation functions:-</h3>
                        <b>1. Hard-limit Activation Function</b>
                        <br /><br /><img src="../images/hardlimit.png" /><br /><br />
                        <b>2. Sigmoidal Activation Function</b>
                        <br /><br /><img src="../images/sigmoid.png" /><b><br /><br />
                        <b>3. Piecewise Linear Activation Function</b>
                        <br /><br /><img src="../images/piecewise.png" /><b><br /><br />
                        <b>4. Signum Activation Function</b>
                        <br /><br /><img src="../images/signum.png" /><br /><br />
                        <h3>Working:- </h3>
                        Let us consider the problem of building an OR Gate using single layer perceptron.
                        <br /><br />
                        Following is the truth table of OR Gate.<br />
                        <img src="../images/or.jpg" height="160" width="230" /><br /><br />
                        Referring to Fig 1 and the above truth table, X and Y are the two inputs corresponding to X1 and X2.Let Y' be the output of the perceptron and let Z' be the output of the newral network after applying the activation function (Signum in this case). Let the weights be W1=0.5 and W2=0.5.
                        <br />
                        Now,<br /> Y' = X1*W1 + X2*W2<br />Z' = F(Y') ; F is the Activation Function.<br /><br />For X = 0 & Y = 0<br/><br />Y' = X*W1 + Y*W2<br />Y' = 0*0.5 + 0*0.5<br />Y' = 0 + 0<br />Y' = 0<br />Z' = F(Y')<br />Z' = F(0)<br />For Signum activation function, F(x) = 0 ; x = 0<br /><br />Z' = 0<br /><br />For X = 0 & Y = 1<br/><br />Y' = X*W1 + Y*W2<br />Y' = 0*0.5 + 1*0.5<br />Y' = 0 + 0.5<br />Y' = 0.5<br />Z' = F(Y')<br />Z' = F(0.5)<br />For Signum activation function, F(x) = 1 ; x > 0<br /><br />Z' = 1<br /><br />For X=1 & Y=0<br/><br />Y' = X*W1 + Y*W2<br />Y' = 1*0.5 + 0*0.5<br />Y' = 0.5 + 0<br />Y' = 0.5<br />Z' = F(Y')<br />Z' = F(0.5)<br />For Signum activation function, F(x) = 1 ; x > 0<br /><br />Z' = 1<br /><br />For X=1 & Y=1<br/><br />Y' = X*W1 + Y*W2<br />Y' = 1*0.5 + 1*0.5<br />Y' = 0.5 + 0.5<br />Y' = 1<br />Z' = F(Y')<br />Z' = F(1)<br />For Signum activation function, F(x) = 1 ; x > 0<br /><br />Z' = 1<br /><br />Thus we can plot a graph as shown below where ^ represents 0 and X represents 1.<br />
                        <img src="../images/orgraph.png"/>
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

