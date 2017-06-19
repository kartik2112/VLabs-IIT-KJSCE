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
        <script type="text/javascript" src="../../src/exp7Simulation.js"></script>


        <!--Here is the main script that handles the simulation-->

        <!--Here is the main CSS file that adds more touch to the simulation and other stuff-->
        <link href="../../src/Styles.css" rel="stylesheet" />
        <style>
            .not_sel{
              stroke: #ff6a00;
            }
            .selected{
              stroke: #0e95ca;
              stroke-dasharray: 7px;
            }
            .resContent{
                font-size: 20px;
            }
            .table_res{
                padding: 5px 10px;
            }
        </style>
        <script type="text/javascript">
        var LEFT = 360, TOP = 670;
        $("#KSOM_SliderOuter").hide();
        //$("#hebbLR_SliderOuter").hide();
        //$("#corrLR_SliderOuter").hide();

        var changing = 0;

        function editWeights(id,lrString) {
            if (changing == 1) {
                alert('Save the value first');
                return;
            }

            changing = 1;
            sel = id;
            id = lrString+"_conn" + id;
            $("#" + id).removeClass("not_sel");
            $("#" + id).addClass("selected");
            var x = document.getElementById(id);
            var e = document.getElementById(lrString+'_SliderOuter');
            var val = $("#"+lrString+"MainOuterDiv tspan.w" + sel+"text").html();
            //alert("the value is " + val);
            //$("#"+lrString+"_WeightsSlider").slider("value", val);
            var l, t;
            l = LEFT;
            e.style.left = l + "px";
            t = TOP;
            e.style.top = t + "px";
            $("#"+lrString+"_SliderOuter").show();
        }

        function set(id,lrString) {
            var e = document.getElementById(lrString+'_SliderOuter');
            $("#"+lrString+"_conn" + id).removeClass("selected");
            $("#"+lrString+"_conn" + id).addClass("not_sel");
            $("#"+lrString+"_SliderOuter").hide();
            $("#"+lrString+"_WeightsSlider").slider("value", 0, 0);
            changing = 0;
        }

        $(document).ready(function () {
            //$(".changingBlocks").css("display", "none");

            //displayWeightsInNeuralNet("KSOM");

            // Perceptron LR Stuff
            // Learning Rate Slider
            $("#KSOMLearningRate_slider").slider({
                max: 5,
                min: 0.2,
                step: 0.2,
                slide: function (event, ui) {
                    $(".learningRate").text(ui.value);
                    learningRate = ui.value;
                }
            });
            $("#KSOMLearningRate_slider").slider("value", learningRate);
            $(".learningRate").text($("#KSOMLearningRate_slider").slider("value"));
            learningRate = $("#KSOMLearningRate_slider").slider("value");

            // weight slider
            $("#KSOM_WeightsSlider").slider({
                step: 0.5,
                max: 5,
                min: -5,
                slide: function (event, ui) {
                    $("#KSOMMainOuterDiv tspan.w" + sel + "text").text(ui.value);
                    if(sel-20>0)
                      weightMatrix[sel % 20 - 1][1] = parseFloat(ui.value);
                    else {
                      weightMatrix[sel % 10 - 1][0] = parseFloat(ui.value);
                    }
                    plotGraph("KSOM");
                }
            });
            $('[data-toggle="tooltip"]').tooltip();

            // Make lines clickable
            $(".lines").css("cursor", "pointer");
            $(".lines").css("pointer-events","auto");

            plotGraph("KSOM");
        });

        </script>
        <!--These are used for plotting the graphs-->
        <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
 		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jsxgraph/0.99.5/jsxgraphcore.js"></script>

        <!-- Simulation scripts end-->
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
                    <div id="KSOMMainOuterDiv">
                            <p>&rarr; Click on any line to change its weight. This will also update the regions in the graph.</p>
                            <p>&rarr; You cannot change the parameters once you've started simulations.</p>
                            <br>
                            <svg id="KSOM_svg" width="500" height="400" style="float: left;clear:left;">
                              <!--Neural network connections-->
                              <!--From 1st input neuron-->
                              <line id="KSOM_conn11" class="not_sel lines KSOMNeur_1_lines" stroke="#ff6a00" stroke-width="5" onclick="editWeights(11,'KSOM')" x1="50" y1="100" x2="350" y2="50" />
                              <line id="KSOM_conn12" class="not_sel lines KSOMNeur_1_lines" stroke="#ff6a00" stroke-width="5" onclick="editWeights(12,'KSOM')" x1="50" y1="100" x2="350" y2="200" />
                              <line id="KSOM_conn13" class="not_sel lines KSOMNeur_1_lines" stroke="#ff6a00" stroke-width="5" onclick="editWeights(13,'KSOM')" x1="50" y1="100" x2="350" y2="350" />
                              <!--From 2nd input neuron-->
                              <line id="KSOM_conn21" class="not_sel lines KSOMNeur_2_lines" stroke="#ff6a00" stroke-width="5" onclick="editWeights(21,'KSOM')" x1="50" y1="300" x2="350" y2="50" />
                              <line id="KSOM_conn22" class="not_sel lines KSOMNeur_2_lines" stroke="#ff6a00" stroke-width="5" onclick="editWeights(22,'KSOM')" x1="50" y1="300" x2="350" y2="200" />
                              <line id="KSOM_conn23" class="not_sel lines KSOMNeur_2_lines" stroke="#ff6a00" stroke-width="5" onclick="editWeights(23,'KSOM')" x1="50" y1="300" x2="350" y2="350" />
                              <!--Input nodes-->
                              <circle class="StdCircle inputNodes" cx="50" cy="100" r="20" fill="blue"/>
                              <text x="50" id="x" y="100" text-anchor="middle" stroke="#000000"></text>
                              <circle class="StdCircle inputNodes" cx="50" cy="300" r="20" fill="blue"/>
                              <text x="50" id="y" y="300" text-anchor="middle" stroke="#000000"></text>
                              <!--Output nodes-->
                              <circle class="StdCircle outputNodes" id="op1" cx="350" cy="50" r="20" fill="red"/>
                              <circle class="StdCircle outputNodes" id="op2" cx="350" cy="200" r="20" fill="red"/>
                              <circle class="StdCircle outputNodes" id="op3" cx="350" cy="350" r="20" fill="red"/>
                              <!--Weight notations-->
                              <text font-size="20"  x="75" y="85" transform="rotate(-7.9072,75,65)">w<tspan baseline-shift="sub">11</tspan>=<tspan class="w11text">1</tspan></text>
                              <text font-size="20"  x="115" y="110" transform="rotate(18.435,115,110)">w<tspan baseline-shift="sub">12</tspan>=<tspan class="w12text">1</tspan></text>
                              <text font-size="20"  x="70" y="135" transform="rotate(39.8056,70,135)" >w<tspan baseline-shift="sub">13</tspan>=<tspan class="w13text">5</tspan></text>
                              <text font-size="20"  x="60" y="275" transform="rotate(-39.8056,60,275)">w<tspan baseline-shift="sub">21</tspan>=<tspan class="w21text">3</tspan></text>
                              <text font-size="20"  x="130" y="295" transform="rotate(-18.435,130,295)">w<tspan baseline-shift="sub">22</tspan>=<tspan class="w22text">2</tspan></text>
                              <text font-size="20"  x="80" y="325" transform="rotate(7.9072,80,325)">w<tspan baseline-shift="sub">23</tspan>=<tspan class="w23text">1</tspan></text>
                            </svg>
                            <div id="KSOM_SliderOuter" style="position: absolute;width: 170px;height: 100px;background: rgba(0,0,0,0.75);border-radius: 20px;top: 0px;left: 0px;text-align: center;">
                                <p style="text-align: center;color: white;padding: 5px;">Slide to change weight</p>
                                <div id="KSOM_WeightsSlider" class="sliders" style="margin: 0 10px;height: 10px;background: deepskyblue;"></div>
                                <button onclick="set(sel,'KSOM')" style="margin: 15px 0;border: none;outline: none;">Set</button>
                            </div>
                            <div id="KSOMGraphDiv" class="jxgbox" style="width:500px; height:500px;"></div>
                    </div>
                    <br/><br/>
                    <b>Learning Rate (η) : </b>
                    <div id="KSOMLearningRate_slider" class="sliders" style="width: 200px;display: inline-block;"></div>&emsp;<span class="learningRate">0.4</span><br/><br/><br/>

                    <button id="KSOMStartSimButton" class="btn btn-success" onclick="startSimulation('KSOM')">Start Simulation</button>
                    <button id="KSOMStopSimButton" class="btn btn-danger disabled" onclick="resetSimulation('KSOM')" disabled>Stop Simulation</button>
                    <button class="btn btn-warning disabled" id="KSOMNextButton" disabled data-toggle="tooltip" data-placement="right" title="Click this button only when you have understood the calculations for this input">Apply next I/P value</button><br/><br/>
                    <div>To understand what calculations are happening check <a href="JavaScript:newPopup('procedure.php#expln');" class="hyperlink">this popup</a> and to understand the representations of vectors and matrices <a href="JavaScript:newPopup('procedure.php#repn');" class="hyperlink">click here</a> or hover your mouse over them.
                    <br/>
                    <br/>
                    <div>
                        <b class="resContent">We have 7 samples (red dots) which we are going to classify into 3 clusters. </b>
                        <b class="resContent">Each cluster has its own cluster centroid (C1, C2 & C3 respectively).</b>
                    </div>
                    <br/>
                    <div id="finalClusterOutput">
                        <p class="resContent">Samples & their clusters:</p>
                        <table border="1">
                            <tr><th class="table_res">Sample</th><th class="table_res">Cluster</th></tr>
                            <tr id="cluster_row1"><td class="table_res">(2, 2)</td><td class="table_res" id="cluster1">-</td></tr>
                            <tr id="cluster_row2"><td class="table_res">(2.5, 2.5)</td><td class="table_res" id="cluster2">-</td></tr>
                            <tr id="cluster_row3"><td class="table_res">(3, 2)</td><td class="table_res" id="cluster3">-</td></tr>
                            <tr id="cluster_row4"><td class="table_res">(0.5, 1)</td><td class="table_res" id="cluster4">-</td></tr>
                            <tr id="cluster_row5"><td class="table_res">(1, 0.5)</td><td class="table_res" id="cluster5">-</td></tr>
                            <tr id="cluster_row6"><td class="table_res">(1, 4)</td><td class="table_res" id="cluster6">-</td></tr>
                            <tr id="cluster_row7"><td class="table_res">(2, 4.5)</td><td class="table_res" id="cluster7">-</td></tr>
                        </table>
                    </div>
                    <br/>
                    <div id="input" class="noshow"></div>
                    <div id="weightMatrix" class="noshow"></div>
                    <div id="distFromCentre" class="noshow"></div>
                    <div id="neuronWeightChange" class="noshow"></div>
                    <div id="updatedWeight" class="noshow"></div>
                    <script>
                        $(".noshow").hide();
                    </script>
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
