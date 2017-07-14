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
                        <p>In machine learning, the perceptron is an algorithm for supervised learning of binary classifiers. It is a type of linear classifier, i.e. a classification algorithm that makes its predictions based on a linear predictor function combining a set of weights with the feature vector. The algorithm allows for online learning, in that it processes elements in the training set one at a time.</p>
                        <br>
                        <p>
                            Perceptrons are trained on examples of desired behavior. The desired behavior can be summarized by a set of input, output pairs 
                            <br>
                            <br>
                            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;p1t1, p2t2, p3t3, p4t4...pntn&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                            <br>
                            <br>
                            where <b>p</b> is an input to the network and <b>t</b> is the corresponding correct (target) output. The objective is to reduce the error <b>e</b>, which is the difference 
                        <b>t-a</b> between the neuron response <b>a</b>, and the target vector <b>t</b>. The perceptron learning rule calculates desired changes to the perceptron's weights and biases given an input vector <b>p</b>, and the associated error <b>e</b>. The target vector t must contain values of either <b>-1</b> or <b>1</b>, as perceptrons (with signum activation functions) can only output such values.
                        </p>
                        <br>
                        <p>
                        As each iteration goes on, the perceptron has a better chance of producing the correct outputs. The perceptron rule is proven to converge on a solution in a finite number of iterations if a solution exists. 
                        <p>
                        If a bias is not used, learning algorithm works to find a solution by altering only the weight vector <b>w</b> to point toward input vectors to be classified as <b>1</b>, and away from vectors to be classified as <b>-1</b>. This results in a decision boundary that is perpendicular to <b>w</b>, and which properly classifies the input vectors.
                        <br>
                        <br>
                        There are three conditions that can occur for a single neuron once an input vector <b>p</b> is presented and the network's response <b>a</b> is calculated:
                        </p>
                        <br>
                        <p>
                        <b>CASE 1.</b> If an input vector is presented and the output of the neuron is correct (<b>a</b> = <b>t</b>, and <b>e</b> = <b>t</b> - <b>a</b> = <b>0</b>), then the weight vector <b>w</b> is not altered.
                        </p>
                        <p>
                        <b>CASE 2.</b> If the neuron output is <b>-1</b> and should have been <b>1</b> (<b>a</b> = <b>-1</b> and <b>t</b> = <b>1</b>, and <b>e</b> = <b>t</b> - <b>a</b> = <b>2</b>), the input vector <b>p</b> is added to the weight vector <b>w</b>. This makes the weight vector point closer to the input vector, increasing the chance that the input vector will be classified as a <b>1</b> in the future.
                        </p>
                        <p>
                        <b>CASE 3.</b> If the neuron output is <b>1</b> and should have been <b>-1</b> (<b>a</b> = <b>1</b> and <b>t</b> = <b>-1</b>, and <b>e</b> = <b>t</b> - <b>a</b> = <b>-2</b>), the input vector <b>p</b> is subtracted from the weight vector <b>w</b>. This makes the weight vector point farther away from the input vector, increasing the chance that the input vector is classified as a <b>-1</b> in the future
                        </p>
                        <br>
                        The perceptron learning rule can be written more succinctly in terms of the error <b>e</b> = <b>t</b> - <b>a</b>, and the change to be made to the weight vector <b>w</b>:
                        <br>
                        <br>
                        <p>
                        <b>CASE 1.</b> If <b>e</b> = <b>0</b>, then make a change in w equal to <b>0</b>.
                        <br>
                        </p>
                        <p>
                        <b>CASE 2.</b> If <b>e</b> = <b>1</b>, then make a change in w equal to <b>2p<sup>T</sup></b>.
                        <br>
                        </p>
                        <p>
                        <b>CASE 3.</b> If <b>e</b> = <b>-1</b>, then make a change in w equal to <b>-2p<sup>T</sup></b>.
                        <br>
                        </p>
                        
                        <p>According to <b>Perceptron</b> Learning Rule,
                        <br>
                        <br>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>W<sub>new</sub> = W<sub>old</sub> + ∆w</b>
                        <br>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;where <b>(∆w = <b>e * p<sup>T</sup></b>)</b>
                            or <b style="font-size: larger">ΔW<sub>i</sub> = η ( D<sub>i</sub> - O<sub>i</sub> ) X</b>
                        <br>
                        <br>
                        <b>Consider an example</b>
                        <br>
                        <br>
                        Let the 3 input vectors be x<sub>1</sub> = [1 -2 0 -1] , x<sub>2</sub> = [0 1.5 -0.5 -1] and x<sub>3</sub> = [-1 1 0.5 -1] and the initial weight vector w<sub>1</sub> be [1 -1 0 0.5]. The learning constant is assumed to be c = 0.1. The teacher's desired responses for x<sub>l</sub>, x<sub>2</sub>, x<sub>3</sub> are d<sub>l</sub> = - 1, d<sub>2</sub> = - 1, and d<sub>3</sub> = 1, respectively. 

                    
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                      <svg id="percLR_svg" width="700" height="400" style="margin-left: 200px">
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
                                        <text font-size="20" x="10" y="360">X3</text>
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
                                        <text font-size="20" x="370" y="35">= w<tspan baseline-shift="sub">11</tspan>*X1 + w<tspan baseline-shift="sub">12</tspan>*X2 + w<tspan baseline-shift="sub">13</tspan>*X3</text>
                                        <text font-size="20" x="370" y="190">= w<tspan baseline-shift="sub">21</tspan>*X1 + w<tspan baseline-shift="sub">22</tspan>*X2 + w<tspan baseline-shift="sub">23</tspan>*X3</text>
                                        <text font-size="20" x="370" y="335">= w<tspan baseline-shift="sub">31</tspan>*X1 + w<tspan baseline-shift="sub">32</tspan>*X2 + w<tspan baseline-shift="sub">33</tspan>*X3</text>


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
                        <p id="pid">
                                                 The learning according to the perceptron learning rule progresses as follows
                        <br>
                        <br>
                        <b>Step 1 :</b> 
                        <br>
                        Input is x<sub>l</sub>, desired output is d<sub>l</sub>: 
                        <br>
                        <br>
                        net<sub>1</sub>=w<sub>1</sub><sup>T</sup>X<sub>1</sub>
                        <br>
                        <br>
                        Correction in this step is necessary since d<sub>1</sub> is not equal to sgn(2.5). We thus obtain updated weight vector 
                        <br>
                        <br>
                        w<sub>2</sub>= w<sub>1</sub> + 0.1(-1-1)X<sub>1</sub>
                        <br>
                        <br>
                        Plugging in numerical values we obtain  
                        <br>
                        <br>
                        w<sub>2</sub> = [1 -1 0 0.5] - 0.2 [1 -2 0 -1] = [0.8 -0.6 0 0.7]
                        <br>
                        <br>
                        Similarly calculate for each input vector and update the weight vector correspondingly.
                        <br>
                        <br>
                        The final weight vector after considering all inputs is [0.6 -0.4 0.1 0.5].
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

