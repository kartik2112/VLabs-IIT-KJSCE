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
                        
                        <p>According to <b>Perceptron</b> Learning Rule,</p>
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
                        We will demonstrate the learning rule for 1 input of 1st iteration.
                        Let the input vector be 
                            <table class="matrix changingBlocks inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X"><tr class="0"><td class="0">-2</td><td class="1">3</td><td class="2">1</td></tr></table> 
                            and the initial weight matrix, W be<br/>
                            <table class="matrix changingBlocks weightMatrix" data-toggle="tooltip" data-placement="bottom" title="Weight Matrix W">
                                <tr class="0"><td class="0">-2</td><td class="1">1</td><td class="2">-6.5</td></tr>
                                <tr class="1"><td class="0">3</td><td class="1">2</td><td class="2">1</td></tr>
                                <tr class="2"><td class="0">0</td><td class="1">-1</td><td class="2">-1.5</td></tr>
                            </table>                           
                            The learning constant is assumed to be η = 0.1. 
                            The desired response for this input X is D = <table class="matrix changingBlocks inputVector" data-toggle="tooltip" data-placement="bottom" title="Desired Output Vector D"><tr class="0"><td class="0">1</td><td class="1">-1</td><td class="2">-1</td></tr></table>
                            Here, the activation function used is <b>bipolar hard-limit activation function</b>.

                    
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                      
                            <svg id="percLR_svg" width="700" height="400" style="margin-left: 200px">
                                        <!--Neural Network connections-->
                                        <line id="percLR_line11" class="not_sel percLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="50" x2="350" y2="50"/>
                                        <line id="percLR_line12" class="not_sel percLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="200" x2="350" y2="50"/>
                                        <line id="percLR_line13" class="not_sel percLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="350" x2="350" y2="50"/>

                                        <line id="percLR_line21" class="not_sel percLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="50" x2="350" y2="200"/>
                                        <line id="percLR_line22" class="not_sel percLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="200" x2="350" y2="200"/>
                                        <line id="percLR_line23" class="not_sel percLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="350" x2="350" y2="200"/>

                                        <line id="percLR_line31" class="not_sel percLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="50" x2="350" y2="350"/>
                                        <line id="percLR_line32" class="not_sel percLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="200" x2="350" y2="350"/>
                                        <line id="percLR_line33" class="not_sel percLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5" x1="50" y1="350" x2="350" y2="350"/>

								        <!-- @@@@@-->
                                        <line class="StdLine percLRNeur_1_lines" x1="350" y1="50" x2="610" y2="50" style=""/>
                                        <line class="StdLine percLRNeur_2_lines" x1="350" y1="200" x2="610" y2="200" style=""/>
                                        <line class="StdLine percLRNeur_3_lines" x1="350" y1="350" x2="610" y2="350" style=""/>
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
                                        <image x="610" y="25" height="50" width="50" xlink:href="../images/bipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                        <image x="610" y="175" height="50" width="50" xlink:href="../images/bipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                        <image x="610" y="325" height="50" width="50" xlink:href="../images/bipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>




                                        <!--Input texts-->
                                        <text font-size="15" x="5" y="55">X1</text>
                                        <text class="changingTextStyle percLRX_inputX1" font-size="15" x="45" y="57" style="stroke: #ff0000;stroke-width: 1px;">-2</text>
                                        <text font-size="15" x="5" y="210">X2</text>
                                        <text class="changingTextStyle percLRX_inputX2" font-size="15" x="45" y="207" style="stroke: #ff0000;stroke-width: 1px;">3</text>
                                        <text font-size="15" x="10" y="360">1</text>
                                        <!--<text class="changingTextStyle percLRX_inputX3" font-size="15" x="45" y="355">0</text>-->


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
                                        <text class="changingTextStyle percLR_outputO1" font-size="15" x="670" y="80" style="stroke: #3366ff;"></text>

                                        <text font-size="15" x="665" y="200" style="stroke: #ff0000;stroke-width: 1px;">O2</text>
                                        <text class="changingTextStyle percLR_outputO2" font-size="15" x="670" y="230" style="stroke: #ff0000;"></text>

                                        <text font-size="15" x="665" y="350" style="stroke: #009933;stroke-width: 1px;">O3</text>
                                        <text class="changingTextStyle percLR_outputO3" font-size="15" x="670" y="380" style="stroke: #009933;"></text>
                            </svg>
                         
                        <br>
                        <br>
                        <div>
                            Here, the activation function used is <span style="font-size: larger; font-weight: bolder">signum</span>:<br/>
                            sgn( x ) = 1 , &nbsp; x >= 0<br/>
                            &emsp;&emsp;&emsp; = -1 , &nbsp; x < 0
                        </div>
                        <p id="pid">
                            Learning according to the perceptron learning rule progresses as follows
                        </p>
                        &emsp;O = sgn( W x X )<br/>

                        <div class="centerPosOperatorsForMatrices" style="margin-right: 0px!important;">O &nbsp; = </div>

                        <div class="centerPosOperatorsForMatrices">sgn(</div>
                        <div style="display: inline-block">
                            <table class="matrix changingBlocks weightMatrix" data-toggle="tooltip" data-placement="bottom" title="Weight Matrix W">
                                <tr class="0"><td class="0">-2</td><td class="1">1</td><td class="2">-6.5</td></tr>
                                <tr class="1"><td class="0">3</td><td class="1">2</td><td class="2">1</td></tr>
                                <tr class="2"><td class="0">0</td><td class="1">-1</td><td class="2">-1.5</td></tr>
                            </table>
                        </div>

                        <div class="centerPosOperatorsForMatrices">
                                X
                        </div>

                        <div style="display: inline-block">
                            <table class="matrix changingBlocks inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                <tr class="0"><td class="0">-2</td></tr>
                                <tr class="1"><td class="0">3</td></tr>
                                <tr class="2"><td class="0">1</td></tr>
                            </table>
                        </div>
                        <div class="centerPosOperatorsForMatrices">)</div>

                        <div class="centerPosOperatorsForMatrices" style="margin-left: 0px!important; margin-right: 0px!important;">
                                =
                        </div>

                        <div class="centerPosOperatorsForMatrices">sgn(</div>
                        <div style="display: inline-block">
                            <table class="matrix changingBlocks summationVector" data-toggle="tooltip" data-placement="bottom" title="∑ Vector">
                                <tr class="0"><td class="0">0.5</td></tr>
                                <tr class="1"><td class="0">1</td></tr>
                                <tr class="2"><td class="0">-4.5</td></tr>
                            </table>
                        </div>
                        <div class="centerPosOperatorsForMatrices">)</div>

                        <div class="centerPosOperatorsForMatrices" style="margin-left: 0px!important;">
                                = &nbsp;
                        </div>

                        <div style="display: inline-block">
                            <table class="matrix changingBlocks outputVector" data-toggle="tooltip" data-placement="bottom" title="Actual Output Vector O">
                                <tr class="0"><td class="0">1</td></tr>
                                <tr class="1"><td class="0">1</td></tr>
                                <tr class="2"><td class="0">-1</td></tr>
                            </table>
                        </div><br/>
                        <div class="centerPosOperatorsForMatrices">
                            O =
                        </div>
                        <div style="display: inline-block">
                            <table class="matrix changingBlocks outputVector" data-toggle="tooltip" data-placement="bottom" title="Actual Output Vector O">
                                <tr class="0"><td class="0">1</td></tr>
                                <tr class="1"><td class="0">1</td></tr>
                                <tr class="2"><td class="0">-1</td></tr>
                            </table>
                        </div>
                        <div class="centerPosOperatorsForMatrices">
                            , D =
                        </div>
                        <div style="display: inline-block">
                            <table class="matrix changingBlocks desiredOutputVector" data-toggle="tooltip" data-placement="bottom" title="Desired Output Vector D">
                                <tr class="0"><td class="0">1</td></tr>
                                <tr class="1"><td class="0">-1</td></tr>
                                <tr class="2"><td class="0">-1</td></tr>
                            </table>
                        </div><br/>

                        <div class="revealText1 changingBlocks">According to Perceptron Learning Rule : <span style="font-size: larger; font-weight: bolder">ΔW<sub>i</sub> = η ( D<sub>i</sub> - O<sub>i</sub> ) X</span> </div>
                        <div class="revealText2 changingBlocks">Hence, W<sub>i,new</sub> = W<sub>i,old</sub> + η ( D<sub>i</sub> - O<sub>i</sub> ) X </div>
                        <div class="revealText3 changingBlocks">The calculations for weight vector for each classifier neuron are as shown below:</div>
                        <br/>

                        <div id="all_percLRWtChngeCalcns_Carousel" class="carousel slide changingBlocks" data-ride="carousel" style="width: 550px;">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#all_percLRWtChngeCalcns_Carousel" data-slide-to="0" class="active" data-toggle="tooltip" data-placement="bottom" title="Weight Calculations for i=1"></li>
                                <li data-target="#all_percLRWtChngeCalcns_Carousel" data-slide-to="1" data-toggle="tooltip" data-placement="bottom" title="Weight Calculations for i=2"></li>
                                <li data-target="#all_percLRWtChngeCalcns_Carousel" data-slide-to="2" data-toggle="tooltip" data-placement="bottom" title="Weight Calculations for i=3"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" style="margin: auto; height: 400px; width: 350px; border-radius: 2px; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22); background-color: #F1F7F8">
                                <div class="item active" style="padding: 15px;">
                                        <div id="percLRCalcnExplnFor_i_0" style="background-color: rgb(205, 255, 175);">
                                                <div><h3>For i = 1, D<sub>1</sub> = <span class="Di">1</span>, O<sub>1</sub> = <span class="Oi">1</span></h3></div><br/><br/>

                                                <div class="centerPosOperatorsForMatrices">W<sub>1,new</sub> = </div>

                                                <div style="display: inline-block">
                                                    <table class="matrix indWeightVector" data-toggle="tooltip" data-placement="bottom" title="Old Weight Vector W1,old">
                                                        <tr class="0"><td class="0">-2</td></tr>
                                                        <tr class="1"><td class="0">1</td></tr>
                                                        <tr class="2"><td class="0">-6.5</td></tr>
                                                    </table>
                                                </div>
                                                <div class="centerPosOperatorsForMatrices"> + <span class="learningRate" data-toggle="tooltip" data-placement="bottom" title="Learning Rate η">0.1</span> ( ( <span class="Di" data-toggle="tooltip" data-placement="bottom" title="ith Desired Output">1</span> ) - ( <span class="Oi" data-toggle="tooltip" data-placement="bottom" title="ith Actual Output">1</span> ) ) </div>

                                                <div style="display: inline-block">
                                                    <table class="matrix inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                                        <tr class="0"><td class="0">-2</td></tr>
                                                        <tr class="1"><td class="0">3</td></tr>
                                                        <tr class="2"><td class="0">1</td></tr>
                                                    </table>
                                                </div>
                                                <div class="centerPosOperatorsForMatrices"> </div>
                                                <br/><br/>
                                                <div class="centerPosOperatorsForMatrices">&emsp;&emsp;&emsp; = </div>

                                                <div style="display: inline-block">
                                                    <table class="matrix newWtVector" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W1,new">
                                                        <tr class="0"><td class="0">-2</td></tr>
                                                        <tr class="1"><td class="0">1</td></tr>
                                                        <tr class="2"><td class="0">-6.5</td></tr>
                                                    </table>
                                                </div>
                                        </div>
                                </div>

                                <div class="item" style="padding: 15px;">
                                        <div id="percLRCalcnExplnFor_i_1" style="background-color: rgb(255, 214, 214);">
                                                <div><h3>For i = 2, D<sub>2</sub> = <span class="Di">-1</span>, O<sub>2</sub> = <span class="Oi">1</span></h3></div><br/><br/>

                                                <div class="centerPosOperatorsForMatrices">W<sub>2,new</sub> = </div>

                                                <div style="display: inline-block">
                                                    <table class="matrix indWeightVector" data-toggle="tooltip" data-placement="bottom" title="Old Weight Vector W2,old">
                                                        <tr class="0"><td class="0">3</td></tr>
                                                        <tr class="1"><td class="0">2</td></tr>
                                                        <tr class="2"><td class="0">1</td></tr>
                                                    </table>
                                                </div>
                                                <div class="centerPosOperatorsForMatrices"> + <span class="learningRate" data-toggle="tooltip" data-placement="bottom" title="Learning Rate η">0.1</span> ( ( <span class="Di" data-toggle="tooltip" data-placement="bottom" title="ith Desired Output">-1</span> ) - ( <span class="Oi" data-toggle="tooltip" data-placement="bottom" title="ith Actual Output">1</span> ) ) </div>

                                                <div style="display: inline-block">
                                                    <table class="matrix inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                                        <tr class="0"><td class="0">-2</td></tr>
                                                        <tr class="1"><td class="0">3</td></tr>
                                                        <tr class="2"><td class="0">1</td></tr>
                                                    </table>
                                                </div>
                                                <div class="centerPosOperatorsForMatrices"> </div>
                                                <br/><br/>
                                                <div class="centerPosOperatorsForMatrices">&emsp;&emsp;&emsp; = </div>

                                                <div style="display: inline-block">
                                                    <table class="matrix newWtVector" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W2,new">
                                                        <tr class="0"><td class="0">4.6</td></tr>
                                                        <tr class="1"><td class="0">-0.4</td></tr>
                                                        <tr class="2"><td class="0">0.2</td></tr>
                                                    </table>
                                                </div>
                                        </div>
                                </div>

                                <div class="item" style="padding: 15px;">
                                        <div id="percLRCalcnExplnFor_i_2" style="background-color: rgb(205, 255, 175);">
                                                <div><h3>For i = 3, D<sub>3</sub> = <span class="Di">-1</span>, O<sub>3</sub> = <span class="Oi">-1</span></h3></div><br/><br/>

                                                <div class="centerPosOperatorsForMatrices">W<sub>3,new</sub> = </div>

                                                <div style="display: inline-block">
                                                    <table class="matrix indWeightVector" data-toggle="tooltip" data-placement="bottom" title="Old Weight Vector W3,old">
                                                        <tr class="0"><td class="0">0</td></tr>
                                                        <tr class="1"><td class="0">-1</td></tr>
                                                        <tr class="2"><td class="0">-1.5</td></tr>
                                                    </table>
                                                </div>
                                                <div class="centerPosOperatorsForMatrices"> + <span class="learningRate" data-toggle="tooltip" data-placement="bottom" title="Learning Rate η">0.1</span> ( ( <span class="Di" data-toggle="tooltip" data-placement="bottom" title="ith Desired Output">-1</span> ) - ( <span class="Oi" data-toggle="tooltip" data-placement="bottom" title="ith Actual Output">-1</span> ) ) </div>

                                                <div style="display: inline-block">
                                                    <table class="matrix inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                                        <tr class="0"><td class="0">-2</td></tr>
                                                        <tr class="1"><td class="0">3</td></tr>
                                                        <tr class="2"><td class="0">1</td></tr>
                                                    </table>
                                                </div>
                                                <div class="centerPosOperatorsForMatrices"> </div>
                                                <br/><br/>
                                                <div class="centerPosOperatorsForMatrices">&emsp;&emsp;&emsp; = </div>

                                                <div style="display: inline-block">
                                                    <table class="matrix newWtVector" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W3,new">
                                                        <tr class="0"><td class="0">0</td></tr>
                                                        <tr class="1"><td class="0">-1</td></tr>
                                                        <tr class="2"><td class="0">-1.5</td></tr>
                                                    </table>
                                                </div>
                                        </div>
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#all_percLRWtChngeCalcns_Carousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" style="color: #006ed7"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#all_percLRWtChngeCalcns_Carousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" style="color: #006ed7"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <br/>
                        <div class="revealNewWtLine0 changingBlocks">In the carousel, the cards with <span style="background-color: #CDFFAF">green background</span> indicate the corresponding <b>weight vector has not changed</b> whereas
                            the cards with <span style="background-color: #FFD6D6">red background</span> indicate the corresponding <b>weight vector has changed</b>.
                        </div>

                        <div class="revealNewWtLine1 changingBlocks">Hence, the new weight vectors are (Refer to the carousel above) : </div>

                        <div class="centerPosOperatorsForArrays">  <div class="revealNewWtLine2 changingBlocks">W<sub>1,new</sub> = </div>  </div>
                        <div style="display: inline-block">
                            <table class="matrix newWtVectorW0 changingBlocks" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W1,new">
                                <tr class="0"><td class="0">-2</td><td class="1">1</td><td class="2">-6.5</td></tr>
                            </table>
                        </div>

                        <div class="centerPosOperatorsForArrays">  <div class="revealNewWtLine3 changingBlocks">W<sub>2,new</sub> = </div>  </div>
                        <div style="display: inline-block">
                            <table class="matrix newWtVectorW1 changingBlocks" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W2,new">
                                <tr class="0"><td class="0">4.6</td><td class="1">-0.4</td><td class="2">0.2</td></tr>
                            </table>
                        </div>

                        <div class="centerPosOperatorsForArrays">  <div class="revealNewWtLine4 changingBlocks">W<sub>3,new</sub> = </div>  </div>
                        <div style="display: inline-block">
                            <table class="matrix newWtVectorW2 changingBlocks" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W3,new">
                                <tr class="0"><td class="0">0</td><td class="1">-1</td><td class="2">-1.5</td></tr>
                            </table>
                        </div>

                        <div class="revealNewWtLine5 changingBlocks">Thus, the new weight matrix becomes: </div>
                        &emsp;&emsp;&emsp;
                        <div style="display: inline-block">
                            <table class="matrix changingBlocks newWeightMatrix" data-toggle="tooltip" data-placement="bottom" title="New Weight Matrix W">
                                <tr class="0"><td class="0">-2</td><td class="1">1</td><td class="2">-6.5</td></tr>
                                <tr class="1"><td class="0">4.6</td><td class="1">-0.4</td><td class="2">0.2</td></tr>
                                <tr class="2"><td class="0">0</td><td class="1">-1</td><td class="2">-1.5</td></tr>
                            </table>
                        </div>
                        <div class="revealNewWtLine6 changingBlocks" style="font-size: x-large; color: rgb(210, 38, 38);">The weight matrix has <b>changed</b> and hence the graph will also change.</div>
                        
                        Similarly calculate for each input vector and update the weight vector correspondingly.
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

