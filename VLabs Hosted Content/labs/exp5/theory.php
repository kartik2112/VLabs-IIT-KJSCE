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
                        <h4>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="https://wikimedia.org/api/rest_v1/media/math/render/svg/20f25ecb34dbe39ea1419dfd1781e43208f8749b">
                        <br>
                        <br>
                        or the change in the <b>ith</b> synaptic weight w<sub>i</sub> is equal to a learning rate <b>c</b> times the <b>ith</b> input <b>x<sub>i</sub></b> times the postsynaptic response <b>y</b>. Often cited is the case of a linear neuron,
                        <br>
                        <br>
                        <img src="https://wikimedia.org/api/rest_v1/media/math/render/svg/cc410c6aff9ff68c8e3c4b8b512385b8d7b8fa8d">
                        </p>

                        <p><b>Consider an example given below :</b>
                        <br>
                           <p>There are two input neurons and their values are denoted by X<sub>1</sub> and X<sub>2</sub> respectively.</p>
                           </p>
                           Also consider a bias fixed input as 1.
                           <br>
                           Let X1= -2, X2= 3. Thus the input vector X= [-2 3 1].
                           <br>
                           
                           Here the activation function used is tan sigmoid:
                           f(x) = 2 1 + e-x - 1</p>
                        <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                      <svg id="percLR_svg" width="700" height="400" s style="float: left;margin-left: 200">
                                        <!--Neural Network connections-->
                                        <line id="percLR_line11" class="not_sel percLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(11,'percLR')" x1="50" y1="50" x2="350" y2="50" style=""/>
                                        <line id="percLR_line12" class="not_sel percLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(12,'percLR')" x1="50" y1="200" x2="350" y2="50" style=""/>
                                        <line id="percLR_line13" class="not_sel percLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(13,'percLR')" x1="50" y1="350" x2="350" y2="50" style=""/>

                                        <line id="percLR_line21" class="not_sel percLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(21,'percLR')" x1="50" y1="50" x2="350" y2="200" style=""/>
                                        <line id="percLR_line22" class="not_sel percLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(22,'percLR')" x1="50" y1="200" x2="350" y2="200" style=""/>
                                        <line id="percLR_line23" class="not_sel percLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(23,'percLR')" x1="50" y1="350" x2="350" y2="200" style=""/>

                                        <line id="percLR_line31" class="not_sel percLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(31,'percLR') "x1="50" y1="50" x2="350" y2="350" style=""/>
                                        <line id="percLR_line32" class="not_sel percLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(32,'percLR')" x1="50" y1="200" x2="350" y2="350" style=""/>
                                        <line id="percLR_line33" class="not_sel percLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(33,'percLR')" x1="50" y1="350" x2="350" y2="350" style=""/>

                                        <!-- @@@@@-->
                                        <line class="StdLine percLRNeur_1_lines" x1="350" y1="50" x2="610" y2="50" style=""/>
                                        <line class="StdLine percLRNeur_2_lines" x1="350" y1="200" x2="610" y2="200" style=""/>
                                        <line class="StdLine percLRNeur_3_lines" x1="350" y1="350" x2="610" y2="350" style=""/>
                                        <!-- @@@@@-->
                                         
                                        <line id="corrLR_line21" class="not_sel corrLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(21,'corrLR')" x1="350" y1="50" x2="610" y2="50" style=""/>
                                        <line id="corrLR_line21" class="not_sel corrLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(21,'corrLR')" x1="350" y1="200" x2="610" y2="200" style=""/>
                                        <line id="corrLR_line21" class="not_sel corrLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(21,'corrLR')" x1="350" y1="350" x2="610" y2="350" style=""/>

                                        <!--Neural Network nodes-->
                                        <circle class="StdCircle" cx="50" cy="50" r="20"/>
                                        <circle class="StdCircle" cx="50" cy="200" r="20"/>
                                        <circle class="StdCircle" cx="50" cy="350" r="20"/>
                                        <!-- @@@@@ -->

                                        <circle class="StdCircle" cx="350" cy="50" r="20"/>
                                        <circle class="StdCircle" cx="350" cy="200" r="20"/>
                                        <circle class="StdCircle" cx="350" cy="350" r="20"/>

                                        <!-- @@@@@  -->
                                        <image x="610" y="25"  height="50" width="50" xlink:href="../images/bipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                        <image x="610" y="175"  height="50" width="50" xlink:href="../images/bipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                        <image x="610" y="325"  height="50" width="50" xlink:href="../images/bipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>




                                        <!--Input texts-->
                                        <text font-size="20" x="5" y="55">X1</text>
                                        <text class="changingTextStyle percLRX_inputX1" font-size="20" x="45" y="57" style="stroke: #ff0000;stroke-width: 1px;"></text>
                                        <text font-size="20" x="5" y="210">X2</text>
                                        <text class="changingTextStyle percLRX_inputX2" font-size="20" x="45" y="207" style="stroke: #ff0000;stroke-width: 1px;"></text>
                                        <text font-size="20" x="10" y="360">1</text>
                                        <!--<text class="changingTextStyle percLRX_inputX3" font-size="20" x="45" y="355">0</text>-->


                                        <text font-size="20" x="342" y="55">∑</text>
                                        <text font-size="20" x="342" y="205">∑</text>
                                        <text font-size="20" x="342" y="355">∑</text>

                                        <!--Weights text-->
                                        <text font-size="20"  x="225" y="30" >w<tspan baseline-shift="sub">11</tspan><tspan class="w11text"></tspan></text>
                                        <text font-size="20"  x="235" y="75" >w<tspan baseline-shift="sub">12</tspan><tspan class="w12text"></tspan></text>
                                        <text font-size="20"  x="303" y="110">w<tspan baseline-shift="sub">13</tspan><tspan class="w13text"></tspan></text>
                                        <text font-size="20"  x="285" y="155">w<tspan baseline-shift="sub">21</tspan><tspan class="w21text"></tspan></text>
                                        <text font-size="20"  x="240" y="195">w<tspan baseline-shift="sub">22</tspan><tspan class="w22text"></tspan></text>
                                        <text font-size="20"  x="288" y="245">w<tspan baseline-shift="sub">23</tspan><tspan class="w23text"></tspan></text>
                                        <text font-size="20"  x="300" y="300">w<tspan baseline-shift="sub">31</tspan><tspan class="w31text"></tspan></text>
                                        <text font-size="20"  x="195" y="320">w<tspan baseline-shift="sub">32</tspan><tspan class="w32text"></tspan></text>
                                        <text font-size="20"  x="225" y="370">w<tspan baseline-shift="sub">33</tspan><tspan class="w33text"></tspan></text>


                                        <!--u(x) related texts-->
                                        <text font-size="20" x="370" y="35">= w<tspan baseline-shift="sub">11</tspan>*X1 + w<tspan baseline-shift="sub">12</tspan>*X2 + w<tspan baseline-shift="sub">13</tspan>*1</text>
                                        <text font-size="20" x="370" y="190">= w<tspan baseline-shift="sub">21</tspan>*X1 + w<tspan baseline-shift="sub">22</tspan>*X2 + w<tspan baseline-shift="sub">23</tspan>*1</text>
                                        <text font-size="20" x="370" y="335">= w<tspan baseline-shift="sub">31</tspan>*X1 + w<tspan baseline-shift="sub">32</tspan>*X2 + w<tspan baseline-shift="sub">33</tspan>*1</text>


                                        <!--y(x) related texts-->
                                        <text font-size="20" x="665" y="50" style="stroke: #3366ff;stroke-width: 1px;">O1</text>
                                        <text class="changingTextStyle percLR_outputO1" font-size="20" x="670" y="80" style="stroke: #3366ff;"></text>

                                        <text font-size="20" x="665" y="200" style="stroke: #ff0000;stroke-width: 1px;">O2</text>
                                        <text class="changingTextStyle percLR_outputO2" font-size="20" x="670" y="230" style="stroke: #ff0000;"></text>

                                        <text font-size="20" x="665" y="350" style="stroke: #009933;stroke-width: 1px;">O3</text>
                                        <text class="changingTextStyle percLR_outputO3" font-size="20" x="670" y="380" style="stroke: #009933;"></text>
                            </svg>
                         
                        <br>
                        <br>
                        <p id="pid" style="float: left;">
                        <b>Step 1:</b> 
                        <br>
                        <br>
                                 Calculate output as O = f(W * X) 
                                <br>
                                <br>
                                O = f ( [-2 -1 -6.5; 3 2 1] * [-2  3 1] ) = f( [0.5 1 -4.5] ) = [0.2449 0.4621 -0.978]
                                <br>
                                <br>
                                Desired output D given as [1 -1 -1]
                                <br>
                                <br>
                                Now as we know, ΔWi = η ( Oi ) X
                        <br>
                                W<sub>new</sub> = W<sub>old</sub> + ΔW
                                <br>
                                <br>
                            
                                Applying the formula we get W<sub>1,new</sub> = [-2.1959 1.2939  -6.402]
                                <br>
                                <br>
                                Finally perform the same steps for each iteration
 
                         </p>

                        </h4>
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

