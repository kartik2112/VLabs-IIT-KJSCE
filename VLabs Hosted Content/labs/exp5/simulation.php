<?php
    session_start();
    $_SESSION["currPage"] = 5;
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
        <!-- Simulation scripts start-->

        <!-- jQuery 2.2.3 -->
        <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../plugins/jQueryUI/jquery-ui.min.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        


        <!--Math.js has been used for easy Matrix handling-->
        <!--Here is the main script that handles the simulation-->
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/3.13.3/math.min.js"></script>-->
        <script type="text/javascript" async src="https://example.com/MathJax.js?config=MML_CHTML"></script>
        <script type="text/javascript" src="../../src/exp4Simulation.js"></script>        
        <!--Here is the main CSS file that adds more touch to the simulation and other stuff-->    
        <link href="../../src/Styles.css" rel="stylesheet" />


        <!--These are used for plotting the graphs-->
        <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
 		<script type="text/javascript" src="../../plugins/jsxgraphcore.min.js"></script>

        <!-- Simulation scripts end-->
        <style>
            .not_sel{
              stroke: #ff6a00;
            }
            .selected{
              stroke: #0e95ca;
              stroke-dasharray: 7px;
            }
        </style>

        <script type="text/javascript">
            
            var LEFT = 650, TOP = 374;
            //$("#percLR_SliderOuter").hide();
            $("#hebbLR_SliderOuter").hide();
            //$("#corrLR_SliderOuter").hide();
            
            var changing = 0;

            function editWeights(id,lrString) {
                if (changing == 1) {
                    alert('Save the value first');
                    return;
                }

                changing = 1;
                sel = id;
                id = lrString+"_line" + id;
                $("#" + id).removeClass("not_sel");
                $("#" + id).addClass("selected");
                var x = document.getElementById(id);
                var e = document.getElementById(lrString+'_SliderOuter');
                var val = $("#"+lrString+"MainOuterDiv tspan.w" + sel+"text").html();
                //alert("the value is " + val);
                $("#"+lrString+"_WeightsSlider").slider("value", val);
                var l, t;
                l = LEFT;
                e.style.left = l + "px";
                t = TOP;
                e.style.top = t + "px";
                $("#"+lrString+"_SliderOuter").show();
            }
            
            
            function set(id,lrString) {
                var e = document.getElementById(lrString+'_SliderOuter');
                $("#"+lrString+"_line" + id).removeClass("selected");
                $("#"+lrString+"_line" + id).addClass("not_sel");
                $("#"+lrString+"_SliderOuter").hide();
                $("#"+lrString+"_WeightsSlider").slider("value", 0, 0);
                changing = 0;
            }            

            $(document).ready(function () {
                $(".changingBlocks").css("display", "none");

                //displayWeightsInNeuralNet("percLR");
                displayWeightsInNeuralNet("hebbLR");


                // Hebbian LR Stuff
                // Learning Rate Slider
                $("#hebbLRLearningRate_slider").slider({
                    max: 5,
                    min: 0.2,
                    step: 0.2,
                    slide: function (event, ui) {
                        $("#hebbLRMainOuterDiv span.learningRate").text(ui.value);
                        learningRate = ui.value;
                    }
                });
                $("#hebbLRLearningRate_slider").slider("value", learningRate);
                $("#hebbLRMainOuterDiv span.learningRate").text($("#hebbLRLearningRate_slider").slider("value"));
                learningRate = $("#hebbLRLearningRate_slider").slider("value");

                // weight slider
                $("#hebbLR_WeightsSlider").slider({
                    step: 0.5,
                    max: 5,
                    min: -5,
                    slide: function (event, ui) {
                        $("#hebbLRMainOuterDiv tspan.w" + sel + "text").text(ui.value);
                        weightMatrix[(sel / 10).toFixed(0) - 1][sel % 10 - 1] = parseInt(ui.value);
                        plotGraph("hebbLR");
                    }
                });


                $('[data-toggle="tooltip"]').tooltip();

                // Make lines clickable
                $(".lines").css("cursor", "pointer");
                $(".lines").css("pointer-events","auto");

                plotGraph("hebbLR");
            });     
    </script>
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
                            <li class="active">Simulation</li>
                        </ol>
                    </section>
                </nav>
            </header>
            <?php include 'pane.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center"><?php echo $exp_name?></h1>
                    <!-- Write your experiment name -->
                </section>
                <script type="text/javascript">
                    // Popup window code
                    function newPopup(url) {
                        popupWindow = window.open(url,'popUpWindow','height=500,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes')
                    }
                </script>
                <section class="content-header" style="float:right; margin-top:2%">
                    <a href="JavaScript:newPopup('procedure.php');" style="color:green;font-size: 16px"><img src="../../dist/img/popout.png" style="height:20px; width:20px; "> Pop Up Procedure</a>
                    <br>
                    <br>
                    <a href="" style="color:green; font-size: 16px"><img src="../../dist/img/fork.png" style="height:20px; width:20px; "></a>
                </section>
                <!-- Main content -->
                <section class="content">
                    <h3 style="margin-top:5%">Simulation</h3>
                    <!--Simulation content goes here -->

                    <div id="hebbLRMainOuterDiv">
                            <p>&rarr; Click on any line to change its weight. This will also update the regions in the graph.</p>
                            <p>&rarr; You cannot change the parameters once you've started simulations.</p>
                            <p>&rarr; The blue region in the graph depicts the boundary formed due to neuron 1, red region corresponds to neuron 2, and green region corresponds to neuron 3.</p>
                            <br>


                            <svg id="hebbLR_svg" width="700" height="400" style="float: left;clear:left;">
                                        <!--Neural Network connections-->
                                        <line id="hebbLR_line11" class="not_sel hebbLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(11,'hebbLR')"x1="50" y1="50" x2="350" y2="50" style=""/>
                                        <line id="hebbLR_line12" class="not_sel hebbLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(12,'hebbLR')" x1="50" y1="200" x2="350" y2="50" style=""/>
                                        <line id="hebbLR_line13" class="not_sel hebbLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(13,'hebbLR')" x1="50" y1="350" x2="350" y2="50" style=""/>

                                        <line id="hebbLR_line21" class="not_sel hebbLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(21,'hebbLR')" x1="50" y1="50" x2="350" y2="200" style=""/>
                                        <line id="hebbLR_line22" class="not_sel hebbLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(22,'hebbLR')" x1="50" y1="200" x2="350" y2="200" style=""/>
                                        <line id="hebbLR_line23" class="not_sel hebbLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(23,'hebbLR')" x1="50" y1="350" x2="350" y2="200" style=""/>

                                        <line id="hebbLR_line31" class="not_sel hebbLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(31,'hebbLR') "x1="50" y1="50" x2="350" y2="350" style=""/>                                
                                        <line id="hebbLR_line32" class="not_sel hebbLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(32,'hebbLR')" x1="50" y1="200" x2="350" y2="350" style=""/>                                
                                        <line id="hebbLR_line33" class="not_sel hebbLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(33,'hebbLR')" x1="50" y1="350" x2="350" y2="350" style=""/>

								        <!-- @@@@@-->
                                        <line class="StdLine hebbLRNeur_1_lines" x1="350" y1="50" x2="610" y2="50" style=""/>
                                        <line class="StdLine hebbLRNeur_2_lines" x1="350" y1="200" x2="610" y2="200" style=""/>
                                        <line class="StdLine hebbLRNeur_3_lines" x1="350" y1="350" x2="610" y2="350" style=""/>
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
                                        <image x="610" y="25"  height="50" width="50" xlink:href="../images/bipolar_sigmoid_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                        <image x="610" y="175"  height="50" width="50" xlink:href="../images/bipolar_sigmoid_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                        <image x="610" y="325"  height="50" width="50" xlink:href="../images/bipolar_sigmoid_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                

                                

                                        <!--Input texts-->
                                        <text font-size="15" x="5" y="55">X1</text>
                                        <text class="changingTextStyle hebbLRX_inputX1" font-size="15" x="45" y="57" style="stroke: #ff0000;stroke-width: 1px;"></text>
                                        <text font-size="15" x="5" y="210">X2</text>
                                        <text class="changingTextStyle hebbLRX_inputX2" font-size="15" x="45" y="207" style="stroke: #ff0000;stroke-width: 1px;"></text>
                                        <text font-size="15" x="10" y="360">1</text>
                                        <!--<text class="changingTextStyle hebbLRX_inputX3" font-size="15" x="45" y="355">0</text>-->
                                
								
								        <text font-size="15" x="342" y="55">∑</text>
                                        <text font-size="15" x="342" y="205">∑</text>
                                        <text font-size="15" x="342" y="355">∑</text>

                                        <!--Weights text-->
                                        <text font-size="15"  x="225" y="30" >w<tspan baseline-shift="sub">11</tspan>=<tspan class="w11text">1</tspan></text>
                                        <text font-size="15"  x="235" y="75" >w<tspan baseline-shift="sub">12</tspan>=<tspan class="w12text">1</tspan></text>
                                        <text font-size="15"  x="303" y="110">w<tspan baseline-shift="sub">13</tspan>=<tspan class="w13text">1</tspan></text>
                                        <text font-size="15"  x="285" y="155">w<tspan baseline-shift="sub">21</tspan>=<tspan class="w21text">1</tspan></text>
                                        <text font-size="15"  x="240" y="185">w<tspan baseline-shift="sub">22</tspan>=<tspan class="w22text">1</tspan></text>
                                        <text font-size="15"  x="288" y="245">w<tspan baseline-shift="sub">23</tspan>=<tspan class="w23text">1</tspan></text>
                                        <text font-size="15"  x="305" y="300">w<tspan baseline-shift="sub">31</tspan>=<tspan class="w31text">1</tspan></text>
                                        <text font-size="15"  x="195" y="320">w<tspan baseline-shift="sub">32</tspan>=<tspan class="w32text">1</tspan></text>
                                        <text font-size="15"  x="225" y="370">w<tspan baseline-shift="sub">33</tspan>=<tspan class="w33text">1</tspan></text>
								
								
                                        <!--u(x) related texts-->
                                        <text font-size="15" x="370" y="35">= w<tspan baseline-shift="sub">11</tspan>*X1 + w<tspan baseline-shift="sub">12</tspan>*X2 + w<tspan baseline-shift="sub">13</tspan>*1</text>
                                        <text font-size="15" x="370" y="184">= w<tspan baseline-shift="sub">21</tspan>*X1 + w<tspan baseline-shift="sub">22</tspan>*X2 + w<tspan baseline-shift="sub">23</tspan>*1</text>
                                        <text font-size="15" x="370" y="335">= w<tspan baseline-shift="sub">31</tspan>*X1 + w<tspan baseline-shift="sub">32</tspan>*X2 + w<tspan baseline-shift="sub">33</tspan>*1</text>


                                        <!--y(x) related texts-->
                                        <text font-size="15" x="665" y="50" style="stroke: #3366ff;stroke-width: 1px;">O1</text>
                                        <text class="changingTextStyle hebbLR_outputO1" font-size="15" x="640" y="90" style="stroke: #3366ff;"></text>
                                
                                        <text font-size="15" x="665" y="200" style="stroke: #ff0000;stroke-width: 1px;">O2</text>
                                        <text class="changingTextStyle hebbLR_outputO2" font-size="15" x="640" y="240" style="stroke: #ff0000;"></text>
                                
                                        <text font-size="15" x="665" y="350" style="stroke: #009933;stroke-width: 1px;">O3</text>
                                        <text class="changingTextStyle hebbLR_outputO3" font-size="15" x="640" y="390" style="stroke: #009933;"></text>
                            </svg>


                            <div id="hebbLR_SliderOuter" style="position: absolute;width: 170px;height: 100px;background: rgba(0,0,0,0.75);border-radius: 20px;top: 0px;left: 0px;text-align: center;">
                                <p style="text-align: center;color: white;padding: 5px;">Slide to change weight</p>
                                <div id="hebbLR_WeightsSlider" class="sliders" style="margin: 0 10px;height: 10px;background: deepskyblue;"></div>
                                <button onclick="set(sel,'hebbLR')" style="margin: 15px 0;border: none;outline: none;">Set</button>
                            </div>

                            <div>
			                    <div id="hebbLRGraphDiv" class="jxgbox" style="width:300px; height:300px;"></div>
		                    </div>
                            <br/><br/>
                            <b>Learning Rate (η) : </b>
                            <div id="hebbLRLearningRate_slider" class="sliders" style="width: 200px;display: inline-block;"></div>&emsp;<span class="learningRate"></span><br/><br/><br/>

                            <button id="hebbLRStartSimButton" class="btn btn-success" onclick="startSimulation('hebbLR')">Start Simulation</button>
                            <button id="hebbLRStopSimButton" class="btn btn-danger disabled" onclick="resetSimulation('hebbLR')" disabled>Stop Simulation</button>
                            <button class="btn btn-warning disabled" id="hebbLRNextButton" disabled data-toggle="tooltip" data-placement="right" title="Click this button only when you have understood the calculations for this input">Apply next I/P value</button><br/><br/>

                            <div>
                                Here, the activation function used is <span style="font-size: larger; font-weight: bolder">tan sigmoid</span>:<br/>
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
                            </div>

                            <div>To understand what calculations are happening check <a href="JavaScript:newPopup('procedure.php#expln');" class="hyperlink">this popup</a> and to understand the representations of vectors and matrices <a href="JavaScript:newPopup('procedure.php#repn');" class="hyperlink">click here</a> or hover your mouse over them.

                            <div id="hebbLR_ExplanationOfCalculation" style="clear: both;">
                                <div id="hebbLR_FirstPartOfExpln" style="display: none;">
                                        <h3>Calculations:</h3>
                                        &emsp;O =f ( W x X )<br/>

                                        <div class="centerPosOperatorsForMatrices" style="margin-right: 0px!important;">O &nbsp; = </div>

                                        <div class="centerPosOperatorsForMatrices">f (</div>
                                        <div style="display: inline-block">
                                            <table class="matrix changingBlocks weightMatrix" data-toggle="tooltip" data-placement="bottom" title="Weight Matrix W">
                                                <tr class="0"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                                <tr class="1"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                                <tr class="2"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                            </table>
                                        </div>                                        

                                        <div class="centerPosOperatorsForMatrices">
                                             X 
                                        </div>

                                        <div style="display: inline-block">
                                            <table class="matrix changingBlocks inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                                <tr class="0"><td class="0">0</td></tr>
                                                <tr class="1"><td class="0">0</td></tr>
                                                <tr class="2"><td class="0">0</td></tr>
                                            </table>
                                        </div>
                                        <div class="centerPosOperatorsForMatrices">)</div> 

                                        <div class="centerPosOperatorsForMatrices" style="margin-left: 0px!important; margin-right: 0px!important;">
                                             = 
                                        </div>

                                        <div class="centerPosOperatorsForMatrices">f (</div>
                                        <div style="display: inline-block">
                                            <table class="matrix changingBlocks summationVector" data-toggle="tooltip" data-placement="bottom" title="∑ Vector">
                                                <tr class="0"><td class="0">0</td></tr>
                                                <tr class="1"><td class="0">0</td></tr>
                                                <tr class="2"><td class="0">0</td></tr>
                                            </table>
                                        </div>
                                        <div class="centerPosOperatorsForMatrices">)</div> 

                                        <div class="centerPosOperatorsForMatrices" style="margin-left: 0px!important;">
                                             = &nbsp;
                                        </div>

                                        <div style="display: inline-block">
                                            <table class="matrix changingBlocks outputVector" data-toggle="tooltip" data-placement="bottom" title="Actual Output Vector O">
                                                <tr class="0"><td class="0">0</td></tr>
                                                <tr class="1"><td class="0">0</td></tr>
                                                <tr class="2"><td class="0">0</td></tr>
                                            </table>
                                        </div>
                                </div>
                        
                                <br/>


                                <div id="hebbLR_SecondPartOfExpln" style="display: none;">
                                        <div class="centerPosOperatorsForMatrices">
                                            O = 
                                        </div>
                                        <div style="display: inline-block">
                                            <table class="matrix changingBlocks outputVector" data-toggle="tooltip" data-placement="bottom" title="Actual Output Vector O">
                                                <tr class="0"><td class="0">0</td></tr>
                                                <tr class="1"><td class="0">0</td></tr>
                                                <tr class="2"><td class="0">0</td></tr>
                                            </table>
                                        </div>
                                        <div class="centerPosOperatorsForMatrices">
                                            , D = 
                                        </div>
                                        <div style="display: inline-block">
                                            <table class="matrix changingBlocks desiredOutputVector" data-toggle="tooltip" data-placement="bottom" title="Desired Output Vector D">
                                                <tr class="0"><td class="0">0</td></tr>
                                                <tr class="1"><td class="0">0</td></tr>
                                                <tr class="2"><td class="0">0</td></tr>
                                            </table>
                                        </div>

                                        <div class="revealText1 changingBlocks" style="display: none;">According to <span style="font-size: larger; font-weight: bolder">Hebbian Learning Rule</span> : ΔW<sub>i</sub> = η ( O<sub>i</sub> ) X </div>
                                        <div class="revealText2 changingBlocks" style="display: none;">Hence, W<sub>i,new</sub> = W<sub>i,old</sub> + η ( O<sub>i</sub> ) X </div>
                                        <div class="revealText3 changingBlocks" style="display: none;">The calculations for weight vector for each classifier neuron are as shown below:</div>
                                        <br/>

                                        <div id="all_hebbLRWtChngeCalcns_Carousel" class="carousel slide changingBlocks" data-ride="carousel" style="width: 550px;">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-target="#all_hebbLRWtChngeCalcns_Carousel" data-slide-to="0" class="active" data-toggle="tooltip" data-placement="bottom" title="Weight Calculations for i=1"></li>
                                                <li data-target="#all_hebbLRWtChngeCalcns_Carousel" data-slide-to="1" data-toggle="tooltip" data-placement="bottom" title="Weight Calculations for i=2"></li>
                                                <li data-target="#all_hebbLRWtChngeCalcns_Carousel" data-slide-to="2" data-toggle="tooltip" data-placement="bottom" title="Weight Calculations for i=3"></li>
                                            </ol>

                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" style="margin: auto; height: 400px; width: 350px; border-radius: 2px; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22); background-color: #F1F7F8">
                                                <div class="item active" style="padding: 15px;">
                                                        <div id="hebbLRCalcnExplnFor_i_0">
                                                                <div><h3>For i = 1, O<sub>1</sub> = <span class="Oi"></span></h3></div><br/><br/>

                                                                <div class="centerPosOperatorsForMatrices">W<sub>1,new</sub> = </div>

                                                                <div style="display: inline-block">
                                                                    <table class="matrix indWeightVector" data-toggle="tooltip" data-placement="bottom" title="Old Weight Vector W1,old">
                                                                        <tr class="0"><td class="0">0</td></tr>
                                                                        <tr class="1"><td class="0">0</td></tr>
                                                                        <tr class="2"><td class="0">0</td></tr>
                                                                    </table>
                                                                </div>
                                                                <div class="centerPosOperatorsForMatrices"> + <span class="learningRate" data-toggle="tooltip" data-placement="bottom" title="Learning Rate η">1</span> ( <span class="Oi" data-toggle="tooltip" data-placement="bottom" title="ith Actual Output"></span>) </div>
                                 
                                                                <div style="display: inline-block">
                                                                    <table class="matrix inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                                                        <tr class="0"><td class="0">0</td></tr>
                                                                        <tr class="1"><td class="0">0</td></tr>
                                                                        <tr class="2"><td class="0">0</td></tr>
                                                                    </table>
                                                                </div>
                                                                <br/><br/>
                                                                <div class="centerPosOperatorsForMatrices">&emsp;&emsp;&emsp; = </div>

                                                                <div style="display: inline-block">
                                                                    <table class="matrix newWtVector" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W1,new">
                                                                        <tr class="0"><td class="0">0</td></tr>
                                                                        <tr class="1"><td class="0">0</td></tr>
                                                                        <tr class="2"><td class="0">0</td></tr>
                                                                    </table>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="item" style="padding: 15px;">
                                                        <div id="hebbLRCalcnExplnFor_i_1">
                                                                <div><h3>For i = 2, O<sub>2</sub> = <span class="Oi"></span></h3></div><br/><br/>

                                                                <div class="centerPosOperatorsForMatrices">W<sub>2,new</sub> = </div>

                                                                <div style="display: inline-block">
                                                                    <table class="matrix indWeightVector" data-toggle="tooltip" data-placement="bottom" title="Old Weight Vector W2,old">
                                                                        <tr class="0"><td class="0">0</td></tr>
                                                                        <tr class="1"><td class="0">0</td></tr>
                                                                        <tr class="2"><td class="0">0</td></tr>
                                                                    </table>
                                                                </div>
                                                                <div class="centerPosOperatorsForMatrices"> + <span class="learningRate" data-toggle="tooltip" data-placement="bottom" title="Learning Rate η">1</span> ( <span class="Oi" data-toggle="tooltip" data-placement="bottom" title="ith Actual Output"></span> ) </div>
                                 
                                                                <div style="display: inline-block">
                                                                    <table class="matrix inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                                                        <tr class="0"><td class="0">0</td></tr>
                                                                        <tr class="1"><td class="0">0</td></tr>
                                                                        <tr class="2"><td class="0">0</td></tr>
                                                                    </table>
                                                                </div>
                                                                <br/><br/>
                                                                <div class="centerPosOperatorsForMatrices">&emsp;&emsp;&emsp; = </div>

                                                                <div style="display: inline-block">
                                                                    <table class="matrix newWtVector" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W2,new">
                                                                        <tr class="0"><td class="0">0</td></tr>
                                                                        <tr class="1"><td class="0">0</td></tr>
                                                                        <tr class="2"><td class="0">0</td></tr>
                                                                    </table>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="item" style="padding: 15px;">
                                                        <div id="hebbLRCalcnExplnFor_i_2">
                                                                <div><h3>For i = 3, O<sub>3</sub> = <span class="Oi"></span></h3></div><br/><br/>

                                                                <div class="centerPosOperatorsForMatrices">W<sub>3,new</sub> = </div>

                                                                <div style="display: inline-block">
                                                                    <table class="matrix indWeightVector" data-toggle="tooltip" data-placement="bottom" title="Old Weight Vector W3,old">
                                                                        <tr class="0"><td class="0">0</td></tr>
                                                                        <tr class="1"><td class="0">0</td></tr>
                                                                        <tr class="2"><td class="0">0</td></tr>
                                                                    </table>
                                                                </div>
                                                                <div class="centerPosOperatorsForMatrices"> + <span class="learningRate" data-toggle="tooltip" data-placement="bottom" title="Learning Rate η">1</span> ( <span class="Oi" data-toggle="tooltip" data-placement="bottom" title="ith Actual Output"></span> ) </div>
                                 
                                                                <div style="display: inline-block">
                                                                    <table class="matrix inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                                                        <tr class="0"><td class="0">0</td></tr>
                                                                        <tr class="1"><td class="0">0</td></tr>
                                                                        <tr class="2"><td class="0">0</td></tr>
                                                                    </table>
                                                                </div>
                                                                <br/><br/>
                                                                <div class="centerPosOperatorsForMatrices">&emsp;&emsp;&emsp; = </div>

                                                                <div style="display: inline-block">
                                                                    <table class="matrix newWtVector" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W3,new">
                                                                        <tr class="0"><td class="0">0</td></tr>
                                                                        <tr class="1"><td class="0">0</td></tr>
                                                                        <tr class="2"><td class="0">0</td></tr>
                                                                    </table>
                                                                </div>
                                                        </div>
                                                </div>
                                            </div>

                                            <!-- Left and right controls -->
                                            <a class="left carousel-control" href="#all_hebbLRWtChngeCalcns_Carousel" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left" style="color: #006ed7"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#all_hebbLRWtChngeCalcns_Carousel" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right" style="color: #006ed7"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                
                                        <br/>

                                        <div class="revealNewWtLine1 changingBlocks">Hence, the new weight vectors are (Refer to the carousel above) : </div>

                                        <div class="centerPosOperatorsForArrays">  <div class="revealNewWtLine2 changingBlocks">W<sub>1,new</sub> = </div>  </div>
                                        <div style="display: inline-block">
                                            <table class="matrix newWtVectorW0 changingBlocks" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W1,new">
                                                <tr class="0"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                            </table>
                                        </div>

                                        <div class="centerPosOperatorsForArrays">  <div class="revealNewWtLine3 changingBlocks">W<sub>2,new</sub> = </div>  </div>
                                        <div style="display: inline-block">
                                            <table class="matrix newWtVectorW1 changingBlocks" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W2,new">
                                                <tr class="0"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                            </table>
                                        </div>

                                        <div class="centerPosOperatorsForArrays">  <div class="revealNewWtLine4 changingBlocks">W<sub>3,new</sub> = </div>  </div>
                                        <div style="display: inline-block">
                                            <table class="matrix newWtVectorW2 changingBlocks" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector W3,new">
                                                <tr class="0"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                            </table>
                                        </div>

                                        <div class="revealNewWtLine5 changingBlocks">Thus, the new weight matrix becomes: </div>
                                        &emsp;&emsp;&emsp;
                                        <div style="display: inline-block">
                                            <table class="matrix changingBlocks newWeightMatrix" data-toggle="tooltip" data-placement="bottom" title="New Weight Matrix W">
                                                <tr class="0"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                                <tr class="1"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                                <tr class="2"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                            </table>
                                        </div>    
                                        <br/>
                                        <div class="revealNewWtLine6 changingBlocks" style="font-size: x-large;"></div>
                                    </div>
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



<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>