<?php
    session_start();
    $_SESSION["currPage"] = 4;
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
                     The Procedures to be followed for the simulation are:
                     <br>
                     <br>
                     <b>Step 1</b>
                     <ol>
                     <li> We can edit the descriptor name, start and end value of the descriptor. Also we can add more descriptors upto a total count of 5. The maximum value for greese and dirt input is 100% and for the washing time it is 120 mins.
                     <li>To see changes in the graph, press the <button class="btn-warning btn-sm">View changes</button> button.</li>
                     <br>
                     <li>To proceed to the next step, press the <button data-toggle="tooltip" title="" class="btn-success btn-md" onclick="next();">Continue &rarr;</button> button.
                     </ol>
                     <b>Step 2</b>
                     <ol>
                     <li>Fill the table shown by choosing the desired output descriptor for each combination of input descriptors.
                     <li>If you need to make changes to the descriptors, you can do so by clicking the <button class="btn-warning btn-md" data-toggle="tooltip" title="" style=""> &larr; Edit descriptors</button> button.
                     <li>If you want to proceed to the next step, click the <button data-toggle="tooltip" title="" class="btn-success btn-md" onclick='proceed();'>Proceed</button> button.
                     </ol>
                     <br>
                     <b>Step 3</b>
                     <ol>
                     <li>
                     Here finally you can provide a grease percent and dirt percent as input, and get the required wash time as output.
                     <li>If you want any changes to be made to the inference table, you can do so by clicking the  <button class="btn-warning btn-md" onclick="back()" data-toggle="tooltip" title="" style="">&larr; Edit Inference Table</button> button.
                     <li>Once you are completely sure regarding the inference table and descriptors, you can click the <button data-toggle="tooltip" title="" id="proceed" class="btn-success btn-md" onclick="fuzzify(document.getElementById('grease_trial').value,document.getElementById('dirt_trial').value)">Find Wash Time</button> button to get your wash time.
                     <li>Now the defuzzified output is calculated using the centroid method which would requires the calculation of areas and centroids for all descriptors. The display of calculations involved is displayed in a sequential manner which explains the defuzzification process and the formula involved. Finally the output wash time is displayed as the output.
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