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
                    <h1 align="center">
                        <?php echo $exp_name?>
                        <!-- Write your experiment name -->
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content" id="pro" style="font-size: larger">
                    <h3 style="margin-top:5%">Procedure</h3>
                    <p class="MsoNormal" style="text-align:justify">
                        <!--Theory content goes here -->
                        The following procedure is to be followed for the simulation:
                    </p>
                    <ol>
                        <li>Select any one of the gates from the dropdown. By default, AND Gate is selected.</li>
                        <li>Click on <button class="btn btn-success" style="cursor: default;">Start Simulation</button> button.</li>
                        <li>Now wait and observe how the I/P combination is interpreted by the neural network.</li>
                        <li>After the neural network completely interprets each I/P combination, the <button class="btn btn-warning" style="cursor: default;">Apply next set of I/P values</button> button gets enabled. 
                            After understanding how this I/P combination was interpreted by the neural network, you can click on this button.
                            After clicking on this button, this button gets disabled until the next input is completely interpreted by the neural network.</li>
                    </ol>
                    <p>After the entire simulation is completed, you will get a popup indicating this completion. 
                        Now you may select another Gate and run the simulation.</p>
                    <p>At any point of time during the simulation, you can stop the simulation by clicking on the <button class="btn btn-danger" style="cursor: default;">Stop Simulation</button> button.</p>
                    <p>The correct outputs will be obtained by the neural network only for certain ranges of inputs.<br/>
                        You can easily visualize this using the graph.
                        When the line (decision boundary) is such that points that look same are on the same side of line, then correct output has been obtained.</p>
                    <p>
                        <b>E.g.</b> In the following plot, <b>similar points are not on the same side of the line</b>. 
                        Hence, the weights and threshold chosen provide an <b>incorrect output</b> for the corresponding Gate.<br/>
                        <img src="images/SS2.PNG" alt="SS2"/><br/>
                        <b>E.g.</b> In the following plot, <b>similar points are on the same side of the line</b>. 
                        Hence, the weights and threshold chosen provide a <b>correct output</b> for the corresponding Gate.<br/>
                        <img src="images/SS1.PNG" alt="SS1"/><br/>
                        <b>Note:</b> If you choose negative weights and negative threshold, then the decision boundary might recognize similar points in same class. 
                        But here the output will be for opposite class. To see this, try -1 as weights and -1.5 as threshold in AND Gate simulation. This will give incorrect outputs.<br><br>
                        
                        <b>* </b> Hint for all the gates in order to obtain appropriate outputs is given in the Post Test Section.
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

