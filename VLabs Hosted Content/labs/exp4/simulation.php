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
        <script src="../../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../../../plugins/jQueryUI/jquery-ui.min.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        


        <!--Math.js has been used for easy Matrix handling-->
        <!--Here is the main script that handles the simulation-->
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/3.13.3/math.min.js"></script>-->
        <!--<script type="text/javascript" async src="https://example.com/MathJax.js?config=MML_CHTML"></script>-->
        <script type="text/javascript" src="../../../src/exp4Simulation.js"></script>        
        <!--Here is the main CSS file that adds more touch to the simulation and other stuff-->    
        <link href="../../../../src/Styles.css" rel="stylesheet" />


        <!--These are used for plotting the graphs-->
        <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
 		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jsxgraph/0.99.5/jsxgraphcore.js"></script>

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
            var sel = 1;
            var LEFT = 700, TOP = 500;
            $("#edit").hide();
            var changing = 0;

            function editWeights(id) {
                /*if (counter > 0 && counter < 4) {
                alert('Finish the simulation first!');
                return;
                }*/
                if (changing == 1) {
                    alert('Save the value first');
                    return;
                }

                changing = 1;
                sel = id;
                id = "w" + id;
                $("#" + id).removeClass("not_sel");
                $("#" + id).addClass("selected");
                var x = document.getElementById(id);
                var e = document.getElementById('edit');
                var val = $("#t" + sel).html();
                //alert("the value is " + val);
                $("#wslider").slider("value", val);
                var l, t;
                l = LEFT;
                e.style.left = l + "px";
                t = TOP;
                e.style.top = t + "px";
                $("#edit").show();
            }
            
            
            function set(id) {
                var e = document.getElementById('edit');
                $("#w" + id).removeClass("selected");
                $("#w" + id).addClass("not_sel");
                $("#edit").hide();
                $("#wslider").slider("value", 0, 0);
                changing = 0;
            }            
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
                    

                    <p>&rarr; Click on any line to change its weight</p>
                    <p>&rarr; Click on the threshold graph to change threshold value</p>
                    <p>&rarr; Click on any hidden/output neuron to change its bias</p>
                    <p>&rarr; You cannot change the parameters once you've started simulations.</p>
                    <p>&rarr; The red line in the decision boundaries graph depicts the boundary formed due to hidden neuron 1, blue line corresponds to hidden neuron 2, and green line to the output neuron respectively.</p>
                    <br>


                    <svg id="AND-gate-svg" width="800" height="500" style="float: left;margin-top: 70px">
                                <!--Neural Network connections-->
                                <line id="w11" class="not_sel" stroke="#ff6a00" stroke-width="5"  
                                      onclick="editWeights(11)"x1="50" y1="50" x2="350" y2="50" style=""/>
                                <line id="w12" class="not_sel" stroke="#ff6a00" stroke-width="5" onclick="editWeights(12)" x1="50" y1="50" x2="350" y2="200" style=""/>
                                <line id="w13" class="not_sel" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(13) "x1="50" y1="50" x2="350" y2="350" style=""/>

                                <line id="w21" class="not_sel" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(21)" x1="50" y1="200" x2="350" y2="50" style=""/>
                                <line id="w22" class="not_sel" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(22)" x1="50" y1="200" x2="350" y2="200" style=""/>
                                <line id="w23" class="not_sel" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(23)" x1="50" y1="200" x2="350" y2="350" style=""/>

                                <line id="w31" class="not_sel" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(31)" x1="50" y1="350" x2="350" y2="50" style=""/>
                                <line id="w32" class="not_sel" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(32)" x1="50" y1="350" x2="350" y2="200" style=""/>
                                <line id="w33" class="not_sel" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(33)" x1="50" y1="350" x2="350" y2="350" style=""/>

								<!-- @@@@@-->
                                <line id="AND-inputX-oplay_neuron2" class="StdLine" x1="300" y1="50" x2="650" y2="50" style=""/>
                                <line id="AND-inputY-oplay_neuron3" class="StdLine" x1="300" y1="200" x2="650" y2="200" style=""/>
                                <line id="AND-inputX-oplay_neuron3" class="StdLine" x1="300" y1="350" x2="650" y2="350" style=""/>
								<!-- @@@@@-->
                                

                                <!--Neural Network nodes-->
                                <circle id="AND-inputX" class="StdCircle" cx="50" cy="50" r="20"/>
                                <circle id="AND-inputY" class="StdCircle" cx="50" cy="200" r="20"/>
                                <circle id="AND-inputY" class="StdCircle" cx="50" cy="350" r="20"/>
								<!-- @@@@@ -->
								
                                <circle id="AND-oplay_neuron2" class="StdCircle" cx="350" cy="50" r="20"/>
                                <circle id="AND-oplay_neuron3" class="StdCircle" cx="350" cy="200" r="20"/>
                                <circle id="AND-oplay_neuron2" class="StdCircle" cx="350" cy="350" r="20"/>

								<!-- @@@@@  -->
                                <image id="AND-oplay_thrshld" x="650" y="25"  height="50" width="50" xlink:href="../images/unipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                <image id="AND-oplay_thrshld" x="650" y="175"  height="50" width="50" xlink:href="../images/unipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                <image id="AND-oplay_thrshld" x="650" y="325"  height="50" width="50" xlink:href="../images/unipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                

                                

                                <!--Input texts-->
                                <text font-size="20" x="10" y="55">X1</text>
                                <text class="changingTextStyle AND-XVal" font-size="20" x="45" y="55"></text>
                                <text font-size="20" x="10" y="210">X2</text>
                                <text class="changingTextStyle AND-YVal" font-size="20" x="45" y="255"></text>
                                <text font-size="20" x="10" y="360">X3</text>
                                <text class="changingTextStyle AND-YVal" font-size="20" x="45" y="455"></text>
                                
								
								<text font-size="20" x="340" y="55">n1</text>
                                <text font-size="20" x="340" y="205">n2</text>
                                <text font-size="20" x="340" y="355">n3</text>

                                <!--Weights text-->
                                <text font-size="20"  x="225" y="30">w<tspan baseline-shift="sub">11</tspan>=<tspan id="t11" class="AND-inputX-oplay_neuron1-weight" >1</tspan></text>
                                <text font-size="20"  x="235"  y="75">w<tspan baseline-shift="sub">21</tspan>=<tspan id="t21" class="AND-inputY-oplay_neuron1-weight">1</tspan></text>
                                <text font-size="20"  x="300" y="110">w<tspan baseline-shift="sub">31</tspan>=<tspan id="t31" class="AND-inputY-oplay_neuron1-weight">1</tspan></text>
                                <text font-size="20"  x="285" y="155">w<tspan baseline-shift="sub">12</tspan>=<tspan id="t12" class="AND-inputX-oplay_neuron1-weight">1</tspan></text>
                                <text font-size="20"  x="240" y="185">w<tspan baseline-shift="sub">22</tspan>=<tspan id="t22" class="AND-inputY-oplay_neuron1-weight">1</tspan></text>
                                <text font-size="20" x="288" y="240">w<tspan baseline-shift="sub">32</tspan>=<tspan id="t32" class="AND-inputY-oplay_neuron1-weight">1</tspan></text>
                                <text font-size="20"  x="300" y="300">w<tspan baseline-shift="sub">13</tspan>=<tspan id="t13" class="AND-inputX-oplay_neuron1-weight">1</tspan></text>
                                <text font-size="20"  x="195" y="320">w<tspan baseline-shift="sub">23</tspan>=<tspan id="t23" class="AND-inputY-oplay_neuron1-weight">1</tspan></text>
                                <text font-size="20"id="t33"  x="225" y="370">w<tspan baseline-shift="sub">33</tspan>=<tspan id="t33" class="AND-inputY-oplay_neuron1-weight">1</tspan></text>
								
								<!-- n(x) related text -->
								 
                               
								<text class="changingTextStyle" id="AND-n1x-value" font-size="20" x="230" y="40"></text>
								<text class="changingTextStyle" id="AND-n2x-value" font-size="20" x="200" y="330"></text>
                                <!--u(x) related texts-->
                                <text font-size="20" x="370" y="75">u(x) = w<tspan baseline-shift="sub">11</tspan>*X1 + w<tspan baseline-shift="sub">21</tspan>*X2 + w<tspan baseline-shift="sub">31</tspan>*X3</text>
                                <text font-size="20" x="370" y="230">u(x) = w<tspan baseline-shift="sub">12</tspan>*X1 + w<tspan baseline-shift="sub">22</tspan>*X2 + w<tspan baseline-shift="sub">32</tspan>*X3</text>
                                <text font-size="20" x="370" y="375">u(x) = w<tspan baseline-shift="sub">13</tspan>*X1 + w<tspan baseline-shift="sub">23</tspan>*X2 + w<tspan baseline-shift="sub">33</tspan>*X3</text>
                               

                                <!--y(x) related texts-->
                                <text font-size="20" x="710" y="50">y(x)</text>
                                <text class="changingTextStyle" id="AND-yx-value" font-size="20" x="620" y="160"></text>
                                
                                <text font-size="20" x="710" y="200">y(x)</text>
                                <text class="changingTextStyle" id="AND-yx-value" font-size="20" x="620" y="160"></text>
                                
                                <text font-size="20" x="710" y="350">y(x)</text>
                                <text class="changingTextStyle" id="AND-yx-value" font-size="20" x="620" y="160"></text>
                                


                                <text class="changingTextStyle" id="AND-yx-value-expln" font-size="20" x="415" y="70"></text>
                    </svg>


                    <div id="edit" style="position: absolute;width: 170px;height: 100px;background: rgba(0,0,0,0.75);border-radius: 20px;top: 0px;left: 0px;text-align: center;">
                        <p style="text-align: center;color: white;padding: 5px;">Slide to change weight</p>
                        <div id="wslider" class="sliders" style="margin: 0 10px;height: 10px;background: deepskyblue;"></div>
                        <button onclick="set(sel)" style="margin: 15px 0;border: none;outline: none;">Set</button>
                    </div>

                    <b>Learning Rate (η) : </b>
                    <div id="learningRate_slider" class="sliders" style="width: 200px;display: inline-block;"></div>&emsp;<span class="learningRate"></span><br/>

                    <div id="graph-outer">
			            <div id="graphDiv" class="jxgbox" style="width:300px; height:300px;"></div>
		            </div>

                    <div id="ExplanationOfCalculation">
                        <div id="FirstPartOfExpln">
                                <h3>Calculations:</h3>
                                O = sgn( W x X )<br/>

                                <div class="centerPosOperatorsForMatrices">O = </div>

                                <div class="centerPosOperatorsForMatrices">sgn(</div>
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

                                <div class="centerPosOperatorsForMatrices">
                                     = 
                                </div>

                                <div class="centerPosOperatorsForMatrices">sgn(</div>
                                <div style="display: inline-block">
                                    <table class="matrix changingBlocks summationVector" data-toggle="tooltip" data-placement="bottom" title="Σ Vector">
                                        <tr class="0"><td class="0">0</td></tr>
                                        <tr class="1"><td class="0">0</td></tr>
                                        <tr class="2"><td class="0">0</td></tr>
                                    </table>
                                </div>
                                <div class="centerPosOperatorsForMatrices">)</div> 

                                <div class="centerPosOperatorsForMatrices">
                                     = &nbsp;
                                </div>

                                <div style="display: inline-block">
                                    <table class="matrix changingBlocks outputVector" data-toggle="tooltip" data-placement="bottom" title="Output Vector O">
                                        <tr class="0"><td class="0">0</td></tr>
                                        <tr class="1"><td class="0">0</td></tr>
                                        <tr class="2"><td class="0">0</td></tr>
                                    </table>
                                </div>
                        </div>
                        
                        <br/><br/><br/>


                        <div id="SecondPartOfExpln" style="display: none;">
                                <div class="centerPosOperatorsForMatrices">
                                    O = 
                                </div>
                                <div style="display: inline-block">
                                    <table class="matrix changingBlocks outputVector" data-toggle="tooltip" data-placement="bottom" title="Output Vector O">
                                        <tr class="0"><td class="0">0</td></tr>
                                        <tr class="1"><td class="0">0</td></tr>
                                        <tr class="2"><td class="0">0</td></tr>
                                    </table>
                                </div>
                                <div class="centerPosOperatorsForMatrices">
                                    , D = 
                                </div>
                                <div style="display: inline-block">
                                    <table class="matrix changingBlocks desiredOutputVector" data-toggle="tooltip" data-placement="bottom" title="Desired Output Vector O">
                                        <tr class="0"><td class="0">0</td></tr>
                                        <tr class="1"><td class="0">0</td></tr>
                                        <tr class="2"><td class="0">0</td></tr>
                                    </table>
                                </div>

                                <div class="revealText1" style="display: none;">According to Perceptron Learning Rule: ΔW<sub>i</sub> = η ( D<sub>i</sub> - O<sub>i</sub> ) X / 2</div>
                                <div class="revealText2" style="display: none;">Hence, W<sub>i,new</sub> = W<sub>i,old</sub> + η ( D<sub>i</sub> - O<sub>i</sub> ) X / 2</div>
                                <div class="revealText3" style="display: none;">The calculations for weight vector for each classifier neuron is as shown below:</div>
                                <br/>

                                <div id="allPercWtChngeCalcns_Carousel" class="carousel slide changingBlocks" data-ride="carousel" style="width: 550px;">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#allPercWtChngeCalcns_Carousel" data-slide-to="0" class="active" data-toggle="tooltip" data-placement="bottom" title="Weight Calculations for i=1"></li>
                                        <li data-target="#allPercWtChngeCalcns_Carousel" data-slide-to="1" data-toggle="tooltip" data-placement="bottom" title="Weight Calculations for i=2"></li>
                                        <li data-target="#allPercWtChngeCalcns_Carousel" data-slide-to="2" data-toggle="tooltip" data-placement="bottom" title="Weight Calculations for i=3"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" style="margin: auto; height: 300px; width: 400px; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22); background-color: #F1F7F8">
                                        <div class="item active" style="padding: 15px;">
                                                <div id="PercCalcnExplnFor_i_0">
                                                        <div><h3>For i = 1, D<sub>1</sub> = <span class="Di"></span>, O<sub>1</sub> = <span class="Oi"></span></h3></div><br/><br/>

                                                        <div class="centerPosOperatorsForMatrices">W<sub>1,new</sub> = </div>

                                                        <div style="display: inline-block">
                                                            <table class="matrix indWeightVector" data-toggle="tooltip" data-placement="bottom" title="Old Weight Vector">
                                                                <tr class="0"><td class="0">0</td></tr>
                                                                <tr class="1"><td class="0">0</td></tr>
                                                                <tr class="2"><td class="0">0</td></tr>
                                                            </table>
                                                        </div>
                                                        <div class="centerPosOperatorsForMatrices"> + <span class="learningRate">1</span> ( ( <span class="Di"></span> ) - ( <span class="Oi"></span> ) ) </div>
                                 
                                                        <div style="display: inline-block">
                                                            <table class="matrix inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                                                <tr class="0"><td class="0">0</td></tr>
                                                                <tr class="1"><td class="0">0</td></tr>
                                                                <tr class="2"><td class="0">0</td></tr>
                                                            </table>
                                                        </div>
                                                        <div class="centerPosOperatorsForMatrices"> / 2</div>

                                                        <div class="centerPosOperatorsForMatrices"> = </div>

                                                        <div style="display: inline-block">
                                                            <table class="matrix newWtVector" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector">
                                                                <tr class="0"><td class="0">0</td></tr>
                                                                <tr class="1"><td class="0">0</td></tr>
                                                                <tr class="2"><td class="0">0</td></tr>
                                                            </table>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="item" style="padding: 15px;">
                                                <div id="PercCalcnExplnFor_i_1">
                                                        <div><h3>For i = 2, D<sub>2</sub> = <span class="Di"></span>, O<sub>2</sub> = <span class="Oi"></span></h3></div><br/><br/>

                                                        <div class="centerPosOperatorsForMatrices">W<sub>2,new</sub> = </div>

                                                        <div style="display: inline-block">
                                                            <table class="matrix indWeightVector" data-toggle="tooltip" data-placement="bottom" title="Old Weight Vector">
                                                                <tr class="0"><td class="0">0</td></tr>
                                                                <tr class="1"><td class="0">0</td></tr>
                                                                <tr class="2"><td class="0">0</td></tr>
                                                            </table>
                                                        </div>
                                                        <div class="centerPosOperatorsForMatrices"> + <span class="learningRate">1</span> ( ( <span class="Di"></span> ) - ( <span class="Oi"></span> ) ) </div>
                                 
                                                        <div style="display: inline-block">
                                                            <table class="matrix inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                                                <tr class="0"><td class="0">0</td></tr>
                                                                <tr class="1"><td class="0">0</td></tr>
                                                                <tr class="2"><td class="0">0</td></tr>
                                                            </table>
                                                        </div>
                                                        <div class="centerPosOperatorsForMatrices"> / 2</div>

                                                        <div class="centerPosOperatorsForMatrices"> = </div>

                                                        <div style="display: inline-block">
                                                            <table class="matrix newWtVector" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector">
                                                                <tr class="0"><td class="0">0</td></tr>
                                                                <tr class="1"><td class="0">0</td></tr>
                                                                <tr class="2"><td class="0">0</td></tr>
                                                            </table>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="item" style="padding: 15px;">
                                                <div id="PercCalcnExplnFor_i_2">
                                                        <div><h3>For i = 3, D<sub>3</sub> = <span class="Di"></span>, O<sub>3</sub> = <span class="Oi"></span></h3></div><br/><br/>

                                                        <div class="centerPosOperatorsForMatrices">W<sub>3,new</sub> = </div>

                                                        <div style="display: inline-block">
                                                            <table class="matrix indWeightVector" data-toggle="tooltip" data-placement="bottom" title="Old Weight Vector">
                                                                <tr class="0"><td class="0">0</td></tr>
                                                                <tr class="1"><td class="0">0</td></tr>
                                                                <tr class="2"><td class="0">0</td></tr>
                                                            </table>
                                                        </div>
                                                        <div class="centerPosOperatorsForMatrices"> + <span class="learningRate">1</span> ( ( <span class="Di"></span> ) - ( <span class="Oi"></span> ) ) </div>
                                 
                                                        <div style="display: inline-block">
                                                            <table class="matrix inputVector" data-toggle="tooltip" data-placement="bottom" title="Input Vector X">
                                                                <tr class="0"><td class="0">0</td></tr>
                                                                <tr class="1"><td class="0">0</td></tr>
                                                                <tr class="2"><td class="0">0</td></tr>
                                                            </table>
                                                        </div>
                                                        <div class="centerPosOperatorsForMatrices"> / 2</div>

                                                        <div class="centerPosOperatorsForMatrices"> = </div>

                                                        <div style="display: inline-block">
                                                            <table class="matrix newWtVector" data-toggle="tooltip" data-placement="bottom" title="New Weight Vector">
                                                                <tr class="0"><td class="0">0</td></tr>
                                                                <tr class="1"><td class="0">0</td></tr>
                                                                <tr class="2"><td class="0">0</td></tr>
                                                            </table>
                                                        </div>
                                                </div>
                                        </div>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#allPercWtChngeCalcns_Carousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" style="color: #006ed7"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#allPercWtChngeCalcns_Carousel" data-slide="next">
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
                                &#9;
                                <div style="display: inline-block">
                                    <table class="matrix changingBlocks newWeightMatrix" data-toggle="tooltip" data-placement="bottom" title="New Weight Matrix W">
                                        <tr class="0"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                        <tr class="1"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                        <tr class="2"><td class="0">0</td><td class="1">0</td><td class="2">0</td></tr>
                                    </table>
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