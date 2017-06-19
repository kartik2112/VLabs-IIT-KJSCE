<?php
    session_start();
    $_SESSION["currPage"]=4;
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
              <li class="active">Procedure</li>
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
        <section class="content" id="pro">
          <h3 style="margin-top:5%">Procedure</h3>
          <p class="MsoNormal" style="text-align:justify">
              
              <br><br>
              <b>1.</b>	Aim is to implement MLP Algorithms on Ex-OR Gate.<br>
              <b>2.</b>	Firstly, Select the algorithm which is to be implemented i.e. FeedForward or Error Back Propagation.<br>
              <b>3.</b>	Enter the weights, bias, threshold values.<br>
              <b>4.</b>	Enter the number of iterations (Epochs) and the learning rate of the system ( Only in case of EBPMLP ).<br>
              <b>5.</b>	Depending on the algorithm chosen and the input values given following things could be observed :-<br></p>
            <div style="margin-left:1.5em">
            <p>
              <b>   a.</b>	Start the simulation.  <button class="btn btn-success" style="cursor: default;">Start Simulation</button><br>
              <b>   b.</b>	Simulation of the model will be generated.<br>
              <b>   c.</b>	Stepwise calculation of different intermediate and final outputs will be visible during the real-time simulation.<br>
                <b>   d.</b>	Moreover Graph will be plotted according to the weights and threshold values chosen so as to understand how the clustering of different group takes place.<br></p></div>
            <p>
              <b>6.</b>	After understanding the whole simulation for 1 input, then Apply the next set of inputs.  <button class="btn btn-warning" style="cursor: default;">Apply next set of I/P values</button><br>
              <b>7.</b>	Successively the changed weight and bias values will be shown for clear understanding of EBPMLP.<br>
              <b>8.</b>	If proper inputs of weight and bias are not provided then a hint having all the appropriate input values is also given to observe the correct simulation of the algorithm.<br>
              <b>9.</b>	Later, Answer the Post Test questions to ascertain the correctness of your  understanding.<br><br><br>
              <b>Note:</b>The simulation for error back propogation may hang if the number of iterations entered is greater than or equal to 100000. The answer will come, albeit with a minimal delay
              <p>* Hints to get correct output are provided in the Post Test section.</p>

            <!--Theory content goes here -->
          
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