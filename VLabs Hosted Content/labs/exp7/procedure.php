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
                        <li>Change the learning rate if you want to by using the slider for the same.</li>
                        <li>Change the initial weights by clicking on any links connecting the input to the output neuron. You will see the changes in cluster centroids as you do the same.</li>
                            <li><b>Once the simulation is started, these can't be changed.</b></li>
                            <li>After making changes as needed, click <button class="btn btn-success">Start Simulation</button> button. Now each input as highlighted in the graph will be chosen and classified into one of the three clusters.</li>
                            <li>If you want to stop the simulation in between you can do so by clicking the <button class="btn btn-danger">Stop Simulation</button> button. </li>
                            <li>After each input is completely processed, the <button class="btn btn-warning" >Apply next I/P value</button> button will get activated.
                            Click on this button to classify the next input.</li>
                        <li>The weights of only the winning neuron (whose cluster centroid is closest to the input) are changed. Other neuron's weights remain the same.</li>
                        <li>You can see the cluster of each input in the table provided below the model. The cluster of each consequent input will get updated as they get classified.</li>
                        <li>The graph also gets updated each time an input is assigned a cluster.</li>
                        <li>You can see the calculations as an input is processed for classification. They provide step by step procedure of what is being calculated.</li>
                        <li><i>The page scrolls automatically towards the relevant information, so you may sit tight and observe these changes.</i></li>
                </ol>
                    <div id="expln">
                        <h3>The following calculations take place whenever an input is taken under consideration.</h3>
                        <ol>
                            <li>The input sample is located on the graph with a green dot.</li>
                            <li>Difference between the input sample and each neuron's weights (i.e. Distance between sample and each cluster centroid in the graph) is calculated using:<br/>sqrt( ( W<sub>i1</sub> - X<sub>i1</sub> )<sup>2</sup> + ( W<sub>i2</sub> - X<sub>i2</sub>)<sup>2</sup>)</li>
                            <li>The distance between the sample and each cluster centroid calculated using the above formula are depicted in a table</li>
                            <li>The neuron whose weights are closest to the input sample is the winning neuron.</li>
                            <li>The winning neuron can be seen in <span style='background:lightgreen'>green colour</span> unpke other neurons which have <span style="background: red;color: white">red colour</span>.</li>
                            <li>Also, you can see the minimum difference highlighted in the table</li>
                            <li>The sample is assigned the cluster corresponding to the winning neuron. <i>(Eg. if 2 is winning neuron, then sample is assigned to cluster 2).</i></li>
                            <li>The weights of the winning neuron are updated using the formula:<br/>W<sub>i</sub>&nbsp = W<sub>i</sub> + c * (W<sub>i</sub> - X<sub>i</sub>)</li>
                            <li>An entry is made in the table, which contains clusters for each input sample, corresponding to the current input sample, and is highlighted in <span style="background: red;color: white">red colour</span>.</li>
                            <li>You can then press the <button class="btn btn-warning" >Apply next I/P value</button> button for the next input.</li>
                            <li>Once all inputs are processed, press the <button class="btn btn-danger">Stop Simulation</button> button. Make changes to the weights and/or learning rate to see the effect in classification.</li>
                        </ol>
                    </div>
                    <div id="repn">
                        <h3>Representations used:</h3><br>
                        <div>By hovering your mouse over the vectors and matrices in the simulation you can come to know what they represent.</div>
                        <div class="centerPosOperatorsForMatrices">
                            W (Weight Matrix) =
                        </div>
                        <div style="display: inline-block">
                            <table class="matrix changingBlocks" data-toggle="tooltip" data-placement="bottom" title="Weight Matrix W">
                                <tr class="0"><td class="0">W<sub>11</sub></td><td class="1">W<sub>12</sub></td></tr>
                                <tr class="1"><td class="0">W<sub>21</sub></td><td class="1">W<sub>22</sub></td></tr>
                                <tr class="2"><td class="0">W<sub>31</sub></td><td class="1">W<sub>32</sub></td></tr>
                            </table>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <div class="centerPosOperatorsForMatrices">
                            X (Input Vector) = [ X<sub>1</sub> X<sub>2</sub> ]
                        </div>
                        <div>c = learning rate</div>
                    </div>


                    </div>
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
