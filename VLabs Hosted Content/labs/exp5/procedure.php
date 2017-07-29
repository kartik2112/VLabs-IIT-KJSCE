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
                    <h2 style="margin-top:5%">Procedure</h2>
                    <p class="MsoNormal" style="text-align:justify">
                        <!--Theory content goes here -->
                        <h3>The following procedure is to be followed for the simulation:</h3>
                        <ol>
                            <li>Change the learning rate if you want to by using the slider for the same.</li>
                            <li>Change the initial weights of the neural network if you want to by clicking on the links connecting the input nodes to summation nodes. You can see the weight changes in the alongside graph.</li>
                            <li><b>Once the simulation is started, these can't be changed</b>.</li>
                            <li>After making changes as needed, click <button class="btn btn-success">Start Simulation</button> button. Now each input as highlighted in the graph will be chosen and learnt using the learning algorithm.</li>
                            <li>If you want to stop the simulation in between, you can do so by clicking the <button class="btn btn-danger">Stop Simulation</button> button. </li>
                            <li>After each input is completely processed, the <button class="btn btn-warning" >Apply next I/P value</button> button will get activated. 
                                Click on this button to learn using the next input.</li>
                            <li><b>As you will see the regions will converge towards correct classification after each iteration. 
                                For correct classification, the regions should be such that for each input, the output of only one neuron should be approx +1 (>= 0) and that of other neurons should be approx -1 (< 0). 
                                Thus, in the graph, each point should fall under one region only. Initially, they will fall under multiple regions. 
                                But as you will see, the position of the regions changes after every iteration so that each point falls under one region only.</b></li>
                            <li><b>Thus, you can consider the aim to be colors of the regions should match the colors of the points that they cover. And the regions should cover all the same color points.</b></li>
                        </ol>

                        <div id="expln">
                            <h3>For each iteration(processing of 1 combination of inputs i.e. one point in the graph), the sequence of events is as follows:</h3>
                            <ol>
                                <li>The <b>input (point)</b> that will be processed is <b>highlighted in the graph</b>.</li>
                                <li>The inputs i.e. X and Y coordinates of this point are indicated in the neural network. The third input is always 1 which acts as a bias.</li>
                                <li>The <b>weight matrix, input vector</b>(X-coordinate, Y-coordinate, 1) for this iteration are <b>displayed</b>.</li>
                                <li>Matrix multiplication is done to find the <b>sum of inputs at all the summing junctions</b> <img src="../images/summing_junction.PNG" alt="Summing Junction"/>. This is represented as the <b>summation vector</b>.</li>
                                <li>The appropriate <b>activation function</b> is applied at the next layer of nodes <img src="../images/bipolar_sigmoid_threshold.png" height="50" width="50" alt="O/P Node Image"/> to this summation vector, thus forming the <b>output vector</b>. 
                                    In this experiment, activation function applied is tan sigmoid.</li>
                                <li>The actual output vector as obtained from the above calculations and the desired output vector are shown side by side for comparison. 
                                    <b>Hebbian Learning Rule being unsupervised</b>, this desired output vector will not be used in the learning process. This is shown just for comparison.</li>
                                <li>The hebbian learning rule whose formula is shown is applied using these vectors.</li>
                                <li>The <b>calculations are performed for each output node</b> to find the new weight vectors. These calculations are shown in the <b>carousel</b>. 
                                    You can click the left and right arrows to check the individual calculations.</li>
                                <li>The weight vectors for each neuron will change.</li>
                                <li>The individual weight vectors are written together as the <b>weight matrix</b>. 
                                    If atleast one of the constituent weight vectors has got modified, then new weight matrix will be different from that of the older one.</li>
                                <li>Now these <b>changes are reflected in the graph and in the neural network</b>.</li>
                                <li>The <button class="btn btn-warning" >Apply next I/P value</button> button gets activated to apply the next input combination.</li>
                                <li><b>As you can see the regions are converging towards correct classification after each iteration. 
                                    For correct classification, the regions should be such that for each input, each point should fall under one region only. 
                                    Initially, they were falling under multiple regions. 
                                    But as you can see, the position of the regions changes after every iteration so that each point falls under one region only.</b></li>
                                <li><b>Thus, you can consider the aim to be colors of the regions should match the colors of the points that they cover. And the regions should cover all the same color points.</b></li>
                            </ol>
                        </div>

                        <div id="repn">
                            <h3>Representations Used:</h3>
                            <div>By hovering your mouse over the vectors and matrices in the simulation you can come to know what they represent.</div>
                            <div class="centerPosOperatorsForMatrices">
                                W (Weight Matrix) = 
                            </div>
                            <div style="display: inline-block">
                                <table class="matrix changingBlocks" data-toggle="tooltip" data-placement="bottom" title="Weight Matrix W">
                                    <tr class="0"><td class="0">W<sub>11</sub></td><td class="1">W<sub>12</sub></td><td class="2">W<sub>13</sub></td></tr>
                                    <tr class="1"><td class="0">W<sub>21</sub></td><td class="1">W<sub>22</sub></td><td class="2">W<sub>23</sub></td></tr>
                                    <tr class="2"><td class="0">W<sub>31</sub></td><td class="1">W<sub>32</sub></td><td class="2">W<sub>33</sub></td></tr>
                                </table>
                            </div>

                            <div class="centerPosOperatorsForMatrices">
                                X (Input Vector) = 
                            </div>
                            <div style="display: inline-block">
                                <table class="matrix changingBlocks" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                    <tr class="0"><td class="0">X<sub>1</sub></td></tr>
                                    <tr class="1"><td class="0">X<sub>2</sub></td></tr>
                                    <tr class="2"><td class="0">X<sub>3</sub></td></tr>
                                </table>
                            </div><br/>

                            <div class="centerPosOperatorsForMatrices">
                                O (Actual Output Vector) = 
                            </div>
                            <div style="display: inline-block">
                                <table class="matrix changingBlocks" data-toggle="tooltip" data-placement="bottom" title="Actual Output Vector O">
                                    <tr class="0"><td class="0">O<sub>1</sub></td></tr>
                                    <tr class="1"><td class="0">O<sub>2</sub></td></tr>
                                    <tr class="2"><td class="0">O<sub>3</sub></td></tr>
                                </table>
                            </div>

                            <div class="centerPosOperatorsForMatrices">
                                D (Desired Output Vector) = 
                            </div>
                            <div style="display: inline-block">
                                <table class="matrix changingBlocks" data-toggle="tooltip" data-placement="bottom" title="Desired Output Vector O">
                                    <tr class="0"><td class="0">D<sub>1</sub></td></tr>
                                    <tr class="1"><td class="0">D<sub>2</sub></td></tr>
                                    <tr class="2"><td class="0">D<sub>3</sub></td></tr>
                                </table>
                            </div><br/>

                            <div class="centerPosOperatorsForMatrices">
                                W<sub>i,new</sub> (New i<sup>th</sup> Weight Vector) = 
                            </div>
                            <div style="display: inline-block">
                                <table class="matrix changingBlocks" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector Wi,new">
                                    <tr class="0"><td class="0">W<sub>i1</sub></td></tr>
                                    <tr class="1"><td class="0">W<sub>i2</sub></td></tr>
                                    <tr class="2"><td class="0">W<sub>i3</sub></td></tr>
                                </table>
                            </div>
                            <div class="centerPosOperatorsForMatrices">
                                or
                            </div>
                            <div style="display: inline-block; bottom:32px;" class="centerPosOperatorsForMatrices">
                                <table class="matrix changingBlocks" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector Wi,new">
                                    <tr class="0"><td class="0">W<sub>i1</sub></td><td class="0">W<sub>i2</sub></td><td class="0">W<sub>i3</sub></td></tr>
                                </table>
                            </div>

                        </div>
                    </p>
                    <b>* </b> Hint for this simulation in order to obtain the correct classification is given in the Post Test Section.     
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

