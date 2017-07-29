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
        <link href="../../src/Styles.css" rel="stylesheet" />
        <script type="text/javascript" async src="https://example.com/MathJax.js?config=MML_CHTML"></script>
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
                        <p>
                        <b>Hebbian learning</b> is one of the oldest learning algorithms, and is based in large part on the dynamics of biological systems.
                        <br>
                        <br>
                        The general idea is that any two cells or systems of cells that are repeatedly active at the same time will tend to become 'associated', so that activity in one facilitates activity in the other.
                        <br> 
                        <br>
                        A synapse between two neurons is strengthened when the neurons on either side of the synapse (input and output) have highly correlated outputs.
                        <br>
                        <p>In essence, when an input neuron fires, if it frequently leads to the firing of the output neuron, the synapse is strengthened. Following the analogy to an artificial system, the tap weight is increased with high correlation between two sequential neurons.</p>
                        <br> 
                        <p>
                        From the point of view of artificial neurons and artificial neural networks, Hebb's principle can be described as a method of determining how to alter the weights between model neurons. The weight between two neurons increases if the two neurons activate simultaneously, and reduces if they activate separately. Nodes that tend to be either both positive or both negative at the same time have strong positive weights, while those that tend to be opposite have strong negative weights.
                        </p>
                        <p>
                        According to <b>Hebbian Rule</b>,
                        <br>
                        <br>
                        <span style="margin-left: 350px"><b style="font-size: larger">ΔW<sub>i</sub> = η ( O<sub>i</sub> ) X </b></span>
                        <br>
                        <br>
                        or the change in the synaptic weights of the i<sup>th</sup> neuron <b>W<sub>i</sub></b> is equal to a learning rate <b>η</b> times the i<sup>th</sup> output <b>O<sub>i</sub></b> times the input <b>X</b>. Often cited is the case of a linear neuron output <b>y</b> or <b>O</b>,
                        <br>
                        <br>
                        <img src="https://wikimedia.org/api/rest_v1/media/math/render/svg/cc410c6aff9ff68c8e3c4b8b512385b8d7b8fa8d">                            
                        </p>

                        <p><b>Consider an example given below :</b></p>
                        <br>
                           <p>We will demonstrate the learning rule for 1 input of 1st iteration. There are two input neurons and their values are denoted by X<sub>1</sub> and X<sub>2</sub> respectively.</p>
                           <p>
                           Also consider a bias fixed input as 1.
                           <br>
                           Let X1= -2, X2= 3. Thus the input vector X= [-2 3 1].
                           <br>
                           
                           Here the activation function used is tan sigmoid:</p>
                           <math xmlns="http://www.w3.org/1998/Math/MathML" display="inline-block">
                                    <mi>f( x )</mi> <mo>=</mo>
                                    <mrow>
                                        <mfrac>
                                            <mrow>
                                                <mn>2</mn>
                                            </mrow>
                                            <mrow>
                                                <mn>1</mn>
                                                <mo>+</mo>
                                                <msup><mi>e</mi><mi>-x</mi></msup>                                                
                                            </mrow>
                                        </mfrac>
                                        <mo>-</mo>
                                        <mn>1</mn>
                                    </mrow>
                                </math>
                        <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                      
                               <svg id="corrLR_svg" width="700" height="400" style="margin-left: 200px">
                                        <!--Neural Network connections-->
                                        <line id="corrLR_line11" class="not_sel corrLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="50" x2="350" y2="50"/>
                                        <line id="corrLR_line12" class="not_sel corrLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="200" x2="350" y2="50"/>
                                        <line id="corrLR_line13" class="not_sel corrLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="350" x2="350" y2="50"/>

                                        <line id="corrLR_line21" class="not_sel corrLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="50" x2="350" y2="200"/>
                                        <line id="corrLR_line22" class="not_sel corrLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="200" x2="350" y2="200"/>
                                        <line id="corrLR_line23" class="not_sel corrLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="350" x2="350" y2="200"/>

                                        <line id="corrLR_line31" class="not_sel corrLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="50" x2="350" y2="350"/>                                
                                        <line id="corrLR_line32" class="not_sel corrLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="200" x2="350" y2="350"/>                                
                                        <line id="corrLR_line33" class="not_sel corrLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="350" x2="350" y2="350"/>

								        <!-- @@@@@-->
                                        <line class="StdLine corrLRNeur_1_lines" x1="350" y1="50" x2="610" y2="50" style=""/>
                                        <line class="StdLine corrLRNeur_2_lines" x1="350" y1="200" x2="610" y2="200" style=""/>
                                        <line class="StdLine corrLRNeur_3_lines" x1="350" y1="350" x2="610" y2="350" style=""/>
								        <!-- @@@@@-->
                                

                                        <!--Neural Network nodes-->
                                        <circle class="StdCircle" cx="50" cy="50" r="20"/>
                                        <circle class="StdCircle" cx="50" cy="200" r="20"/>
                                        <circle class="StdCircle" cx="50" cy="350" r="20"/>
								        <!-- @@@@@ -->
								
                                        <circle class="StdCircle" cx="350" cy="50" r="20"/>
                                        <circle class="StdCircle" cx="350" cy="200" r="20"/>
                                        <circle class="StdCircle" cx="350" cy="350" r="20"/>

								        <!-- @@@@@  -->
                                        <image x="610" y="25" height="50" width="50" xlink:href="../images/bipolar_sigmoid_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                        <image x="610" y="175" height="50" width="50" xlink:href="../images/bipolar_sigmoid_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                        <image x="610" y="325" height="50" width="50" xlink:href="../images/bipolar_sigmoid_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                

                                

                                        <!--Input texts-->
                                        <text font-size="15" x="5" y="55">X1</text>
                                        <text class="changingTextStyle corrLRX_inputX1" font-size="15" x="45" y="57" style="stroke: #ff0000;stroke-width: 1px;">-2</text>
                                        <text font-size="15" x="5" y="210">X2</text>
                                        <text class="changingTextStyle corrLRX_inputX2" font-size="15" x="45" y="207" style="stroke: #ff0000;stroke-width: 1px;">3</text>
                                        <text font-size="15" x="10" y="360">1</text>
                                        <!--<text class="changingTextStyle corrLRX_inputX3" font-size="15" x="45" y="355">0</text>-->
                                
								
								        <text font-size="15" x="342" y="55">∑</text>
                                        <text font-size="15" x="342" y="205">∑</text>
                                        <text font-size="15" x="342" y="355">∑</text>

                                        <!--Weights text-->
                                        <text font-size="15" x="225" y="30">w<tspan baseline-shift="sub">11</tspan>=<tspan class="w11text">-2</tspan></text>
                                        <text font-size="15" x="235" y="75">w<tspan baseline-shift="sub">12</tspan>=<tspan class="w12text">1</tspan></text>
                                        <text font-size="15" x="303" y="110">w<tspan baseline-shift="sub">13</tspan>=<tspan class="w13text">-6.5</tspan></text>
                                        <text font-size="15" x="285" y="155">w<tspan baseline-shift="sub">21</tspan>=<tspan class="w21text">3</tspan></text>
                                        <text font-size="15" x="240" y="185">w<tspan baseline-shift="sub">22</tspan>=<tspan class="w22text">2</tspan></text>
                                        <text font-size="15" x="288" y="245">w<tspan baseline-shift="sub">23</tspan>=<tspan class="w23text">1</tspan></text>
                                        <text font-size="15" x="305" y="300">w<tspan baseline-shift="sub">31</tspan>=<tspan class="w31text">0</tspan></text>
                                        <text font-size="15" x="195" y="320">w<tspan baseline-shift="sub">32</tspan>=<tspan class="w32text">-1</tspan></text>
                                        <text font-size="15" x="225" y="370">w<tspan baseline-shift="sub">33</tspan>=<tspan class="w33text">-1.5</tspan></text>
								
								
                                        <!--u(x) related texts-->
                                        <text font-size="15" x="370" y="35">= w<tspan baseline-shift="sub">11</tspan>*X1 + w<tspan baseline-shift="sub">12</tspan>*X2 + w<tspan baseline-shift="sub">13</tspan>*1</text>
                                        <text font-size="15" x="370" y="184">= w<tspan baseline-shift="sub">21</tspan>*X1 + w<tspan baseline-shift="sub">22</tspan>*X2 + w<tspan baseline-shift="sub">23</tspan>*1</text>
                                        <text font-size="15" x="370" y="335">= w<tspan baseline-shift="sub">31</tspan>*X1 + w<tspan baseline-shift="sub">32</tspan>*X2 + w<tspan baseline-shift="sub">33</tspan>*1</text>
                               

                                        <!--y(x) related texts-->
                                        <text font-size="15" x="665" y="50" style="stroke: #3366ff;stroke-width: 1px;">O1</text>
                                        <text class="changingTextStyle corrLR_outputO1" font-size="15" x="670" y="80" style="stroke: #3366ff;"></text>
                                
                                        <text font-size="15" x="665" y="200" style="stroke: #ff0000;stroke-width: 1px;">O2</text>
                                        <text class="changingTextStyle corrLR_outputO2" font-size="15" x="670" y="230" style="stroke: #ff0000;"></text>
                                
                                        <text font-size="15" x="665" y="350" style="stroke: #009933;stroke-width: 1px;">O3</text>
                                        <text class="changingTextStyle corrLR_outputO3" font-size="15" x="670" y="380" style="stroke: #009933;"></text>
                            </svg>
                         
                        <br>
                        <br>
                        <br>
                        <br>
                                Calculate output as
                                O =f ( W x X )<br>

                                <div class="centerPosOperatorsForMatrices" style="margin-right: 0px!important;">O &nbsp; = </div>

                                <div class="centerPosOperatorsForMatrices">f (</div>
                                <div style="display: inline-block">
                                    <table class="matrix changingBlocks weightMatrix" data-toggle="tooltip" data-placement="bottom" title="" style="" data-original-title="Weight Matrix W">
                                        <tbody><tr class="0"><td class="0">-2</td><td class="1">1</td><td class="2">-6.5</td></tr>
                                        <tr class="1"><td class="0">3</td><td class="1">2</td><td class="2">1</td></tr>
                                        <tr class="2"><td class="0">0</td><td class="1">-1</td><td class="2">-1.5</td></tr>
                                    </tbody></table>
                                </div>                                        

                                <div class="centerPosOperatorsForMatrices">
                                        X 
                                </div>

                                <div style="display: inline-block">
                                    <table class="matrix changingBlocks inputVector" data-toggle="tooltip" data-placement="bottom" title="" style="" data-original-title="Input Vector X">
                                        <tbody><tr class="0"><td class="0">-2</td></tr>
                                        <tr class="1"><td class="0">3</td></tr>
                                        <tr class="2"><td class="0">1</td></tr>
                                    </tbody></table>
                                </div>
                                <div class="centerPosOperatorsForMatrices">)</div> 

                                <div class="centerPosOperatorsForMatrices" style="margin-left: 0px!important; margin-right: 0px!important;">
                                        = 
                                </div>

                                <div class="centerPosOperatorsForMatrices">f (</div>
                                <div style="display: inline-block">
                                    <table class="matrix changingBlocks summationVector" data-toggle="tooltip" data-placement="bottom" title="" style="" data-original-title="∑ Vector">
                                        <tbody><tr class="0"><td class="0">0.5</td></tr>
                                        <tr class="1"><td class="0">1</td></tr>
                                        <tr class="2"><td class="0">-4.5</td></tr>
                                    </tbody></table>
                                </div>
                                <div class="centerPosOperatorsForMatrices">)</div> 

                                <div class="centerPosOperatorsForMatrices" style="margin-left: 0px!important;">
                                        = &nbsp;
                                </div>

                                <div style="display: inline-block">
                                    <table class="matrix changingBlocks outputVector" data-toggle="tooltip" data-placement="bottom" title="" style="" data-original-title="Actual Output Vector O">
                                        <tr class="0"><td class="0">0.2449</td></tr>
                                        <tr class="1"><td class="0">0.4621</td></tr>
                                        <tr class="2"><td class="0">-0.978</td></tr>
                                    </table>
                                </div>
                                <br>
                                <br>
                                Desired output D given as [1 -1 -1]
                                <br>
                                <br>
                                Now as we know, <b style="font-size: larger">ΔW<sub>i</sub> = η ( O<sub>i</sub> ) X</b>
                        <br>
                                W<sub>new</sub> = W<sub>old</sub> + ΔW
                                <br>
                                <br>
                            
                                Applying the formula we get the new weight vector as
                                <table class="matrix changingBlocks newWeightMatrix" data-toggle="tooltip" data-placement="bottom" title="" style="" data-original-title="New Weight Matrix W">
                                    <tbody><tr class="0"><td class="0">-2.1959</td><td class="1">1.2939</td><td class="2">-6.402</td></tr>
                                    <tr class="1"><td class="0">2.6303</td><td class="1">2.5545</td><td class="2">1.1848</td></tr>
                                    <tr class="2"><td class="0">0.7824</td><td class="1">-2.1736</td><td class="2">-1.8912</td></tr>
                                </tbody></table>
                                <br>
                                <br>
                                Finally perform the same steps for each iteration
 
                         </p>
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

