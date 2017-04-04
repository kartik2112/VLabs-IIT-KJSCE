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
        <script src="../src/math.ob.js"></script>
        <script src="../src/numcheck.ob.js"></script>
        <script src="../src/canvasjschart.ob.js"></script>
        <script src="../src/bracket.ob.js"></script>

        <!-- jQuery 2.2.3 -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script type="text/javascript">
            var AND_threshold = 0;
            var AND_w1 = 1;
            var AND_w2 = 1;
            var AND_calcOP;
            var timer1, timer2, timer3,timer4;

            $(document).ready(function () {
                /*
                Initialize sliders and add listeners
                */
                $("#AND_Gate_Threshold_slider").slider({
                    max: 6.5,
                    min: -0.5,
                    step: 0.1,
                    slide: function (event, ui) {
                        $("#AND-threshold-value").text("Threshold: " + ui.value);
                        AND_threshold = ui.value;
                    }
                });
                $("#AND-threshold-value").text("Threshold: " + $("#AND_Gate_Threshold_slider").slider("value"));
                AND_threshold = $("#AND_Gate_Threshold_slider").slider("value");



                $("#AND_Gate_w1_slider").slider({
                    max: 3,
                    min: 0,
                    value: 1,
                    step: 0.05,
                    slide: function (event, ui) {
                        $(".AND-inputX-oplay_neuron1-weight").text(ui.value);
                        AND_w1 = ui.value;
                    }
                });

                $(".AND-inputX-oplay_neuron1-weight").text($("#AND_Gate_w1_slider").slider("value"));
                AND_w1 = $("#AND_Gate_w1_slider").slider("value");


                $("#AND_Gate_w2_slider").slider({
                    max: 3,
                    min: 0,
                    value: 1,
                    step: 0.05,
                    slide: function (event, ui) {
                        $(".AND-inputY-oplay_neuron1-weight").text(ui.value);
                        AND_w2 = ui.value;
                    }
                });

                $(".AND-inputY-oplay_neuron1-weight").text($("#AND_Gate_w2_slider").slider("value"));
                AND_w2 = $("#AND_Gate_w2_slider").slider("value");

            });


            function displayDiv(val) {
                if (val == "AND") {
                    $("#OR-gate-sim").slideUp(400);
                    $("#NOT-gate-sim").slideUp(400);
                    $("#AND-gate-sim").slideDown(400);
                }
                else if (val == "OR") {
                    $("#NOT-gate-sim").slideUp(400);
                    $("#AND-gate-sim").slideUp(400);
                    $("#OR-gate-sim").slideDown(400);
                }
                else {
                    $("#OR-gate-sim").slideUp(400);
                    $("#AND-gate-sim").slideUp(400);
                    $("#NOT-gate-sim").slideDown(400);
                }
                stopSimulation();
            }

            function stopSimulation(timer) {
                resetCompleteSimulation();
                $(".sliders").slider("enable");
                $("#startSimButton").removeClass("disabled");
                $("#selGate").prop("disabled", false);
                $("#stopSimButton").addClass("disabled");
                window.clearInterval(timer);
                window.clearTimeout(timer1);
                window.clearTimeout(timer2);
                window.clearTimeout(timer3);
                window.clearTimeout(timer4);
            }

            function resetCompleteSimulation() {
                resetSimulationPart();
                $(".AND-TT-rows").removeClass("highlightTTRow");
                $(".AND-TT-OP-rows").text("");
            }

            function resetSimulationPart() {
                $(".changingTextStyle").text("");

                $(".StdLine").removeClass("animatedLineGreen");
                $(".StdLine").removeClass("animatedLinePurple");
                $(".StdLine").removeClass("animatedLine");
            }

            function simulateANDGate(iterationNo, inputX, inputY, w1, w2, threshold, interval, timer) {
                /* This is the way arrays were getting passed as String */
                inputX = inputX.split(",");
                inputY = inputY.split(",");

                resetSimulationPart();

                /*
                Remove all highlights from truth table and highlight current truth table row
                */
                $(".AND-TT-rows").removeClass("highlightTTRow");
                $("#AND-TT-row-" + (iterationNo + 1)).addClass("highlightTTRow");

                /*
                Set animations on lines
                */
                $(".AND-XVal").text(inputX[iterationNo]);
                $(".AND-YVal").text(inputY[iterationNo]);
                $("#AND-inputX-oplay_neuron1").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
                $("#AND-inputY-oplay_neuron1").addClass(inputY[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
                var ux = w1 * inputX[iterationNo] + w2 * inputY[iterationNo]; /* Calculate intermediate, u(x) */
                //alert(w1 + " " + w2 + " " + inputX[iterationNo] + " " + inputY[iterationNo] + " " + ux);

                timer1 = window.setTimeout(function () {
                    /* Display u(x) and pause */
                    $("#AND-ux-value").text("= " + ux);

                    timer2 = window.setTimeout(function () {
                        /* Display threshold calculation and pause */
                        $("#AND-oplay_neuron1-oplay_thrshld").addClass("animatedLine");
                        if (ux >= threshold) {
                            $("#AND-yx-value-expln").text("u(x) = " + ux + " >= " + threshold);
                        }
                        else {
                            $("#AND-yx-value-expln").text("u(x) = " + ux + " < " + threshold);
                        }

                        timer3 = window.setTimeout(function () {
                            /* Display calculation output as y(x) and add to truth table */
                            if (ux >= threshold) {
                                $("#AND-yx-value-expln").text("u(x) = " + ux + " >= " + threshold + " ⇒ y(x) = 1"); /* Change explanation to include y(x) */
                                $("#AND-TT-OP-row-" + (iterationNo + 1)).text(1); /* Add entry in truth table */
                                $("#AND-yx-value").text("= " + 1);
                                AND_calcOP.push(1);
                            }
                            else {
                                $("#AND-yx-value-expln").text("u(x) = " + ux + " < " + threshold + " ⇒ y(x) = 0"); /* Change explanation to include y(x) */
                                $("#AND-TT-OP-row-" + (iterationNo + 1)).text(0); /* Add entry in truth table */
                                $("#AND-yx-value").text("= " + 0);
                                AND_calcOP.push(0);
                            }

                        }, interval * 6);
                    }, interval * 4);

                }, interval * 2);
            }

            function startSimulation(interval) {
                resetCompleteSimulation();

                var inputXofAND = [0, 0, 1, 1];
                var inputYofAND = [0, 1, 0, 1];
                var iterationNo = 0;
                AND_calcOP = new Array();

                $(".sliders").slider("disable");
                $("#startSimButton").addClass("disabled");
                $("#selGate").prop("disabled", true);
                $("#stopSimButton").removeClass("disabled");
                $('html, body').animate({
                    scrollTop: $("#AND-gate-svg").offset().top
                }, 500);

                /* The first simulation iteration call is done immediately and then later iterations are called in intervals */
                simulateANDGate(iterationNo, inputXofAND.join(","), inputYofAND.join(","), parseFloat(AND_w1), parseFloat(AND_w2), parseFloat(AND_threshold), interval);
                iterationNo++;

                var timer = window.setInterval(function () {
                    simulateANDGate(iterationNo, inputXofAND.join(","), inputYofAND.join(","), parseFloat(AND_w1), parseFloat(AND_w2), parseFloat(AND_threshold), interval, timer);
                    iterationNo++;
                    if (iterationNo == 4) {
                        window.clearInterval(timer);
                    }
                }, interval * 17);

                timer4=window.setTimeout(function () {
                    resetSimulationPart();                    
                    $(".sliders").slider("enable");
                    $("#startSimButton").removeClass("disabled");
                    $("#selGate").prop("disabled", false);
                    $("#stopSimButton").addClass("disabled");
                    alert("Simulation Complete!");
                }, interval * 17 * 4);


                $("#stopSimButton").click(function () {
                    stopSimulation(timer);
                });

            }

            /* 
            This code is making webpage unresponsives
            function verifyANDOutputs() {
            var correctANDOPs = [0, 0, 0, 1];
            if (correctANDOPs.length == AND_calcOP.length) {
            for (var i = 0; AND_calcOP.length; i++) {
            if (correctANDOPs[i] != AND_calcOP[i]) {
            alert("Incorrect Output values found!!! This threshold value does not work for this neural network.");
            return;
            }
            }
            alert("Correct Output values found! This threshold value works for this neural network.");
            }
            }
            */
        </script>
        <link href="../src/StyleSheet1.css" rel="stylesheet" />
        <link href="../Styles.css" rel="stylesheet" />
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
                    <div class="form-group" style="display: inline-block;">
                        <label for="selGate">Select gate:</label>
                        <select class="form-control" id="selGate" onchange="displayDiv(this.value)" style="width: 150px">
                            <option value="AND">AND Gate</option>
                            <option value="OR">OR Gate</option>
                            <option value="NOT">NOT Gate</option>
                        </select>
                    </div>
                    <button id="startSimButton" class="btn btn-success" onclick="startSimulation(1000)">Start Simulation</button>
                    <button id="stopSimButton" class="btn btn-danger disabled">Stop Simulation</button><br/>
                    <div>
                        <p id="ux-wrapper">y(x) = 1 , u(x) >= Threshold<br/>
                            &emsp;&emsp;= 0 , u(x) < Threshold</p>
                    </div>
                    <br/>
                    <div id="AND-gate-sim">
                            <b>w<sub>1</sub> : </b>
                            <div id="AND_Gate_w1_slider" class="sliders" style="width: 200px;display: inline-block;"></div><br/>

                            <b>w<sub>2</sub> : </b>
                            <div id="AND_Gate_w2_slider" class="sliders" style="width: 200px;display: inline-block;"></div><br/>

                            <b>Threshold Value : </b>
                            <div id="AND_Gate_Threshold_slider" class="sliders" style="width: 200px;display: inline-block;"></div><br/>
                            <svg id="AND-gate-svg" width="700" height="300" style="float: left;">
                                <!--Neural Network connections-->
                                <line id="AND-inputX-oplay_neuron1" class="StdLine" x1="50" y1="50" x2="250" y2="150" style=""/>
                                <line id="AND-inputY-oplay_neuron1" class="StdLine" x1="50" y1="250" x2="250" y2="150" style=""/>
                                <line id="AND-oplay_neuron1-oplay_thrshld" class="StdLine" x1="250" y1="150" x2="500" y2="150" style=""/>

                                <!--Neural Network nodes-->
                                <circle id="AND-inputX" class="StdCircle" cx="50" cy="50" r="20"/>
                                <circle id="AND-inputY" class="StdCircle" cx="50" cy="250" r="20"/>
                                <circle id="AND-oplay_neuron1" class="StdCircle" cx="250" cy="150" r="20"/>
                                <image id="AND-oplay_thrshld" x="475" y="125"  height="50" width="50" xlink:href="../images/unipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>

                                <text font-size="20" x="242" y="155" font-size="25">∑</text>

                                <!--Input texts-->
                                <text font-size="20" x="15" y="55">X</text>
                                <text class="changingTextStyle AND-XVal" font-size="20" x="45" y="55"></text>
                                <text font-size="20" x="15" y="255">Y</text>
                                <text class="changingTextStyle AND-YVal" font-size="20" x="45" y="255"></text>

                                <!--Weights text-->
                                <text font-size="20" x="170" y="90">w<tspan baseline-shift="sub">1</tspan>=<tspan class="AND-inputX-oplay_neuron1-weight">1</tspan></text>
                                <text font-size="20" x="170" y="215">w<tspan baseline-shift="sub">2</tspan>=<tspan class="AND-inputY-oplay_neuron1-weight">1</tspan></text>

                                <!--u(x) related texts-->
                                <text font-size="20" x="260" y="120">u(x) = w<tspan baseline-shift="sub">1</tspan>*X + w<tspan baseline-shift="sub">2</tspan>*Y</text>
                                <text font-size="20" x="270" y="180"> = <tspan class="AND-inputX-oplay_neuron1-weight">1</tspan>*(X=<tspan class="changingTextStyle AND-XVal"> </tspan>) + <tspan class="AND-inputY-oplay_neuron1-weight">1</tspan>*(Y=<tspan class="changingTextStyle AND-YVal"> </tspan>)</text>
                                <text class="changingTextStyle" id="AND-ux-value" font-size="20" x="270" y="200"></text>

                                <!--y(x) related texts-->
                                <text font-size="20" x="535" y="150">y(x)</text>
                                <text class="changingTextStyle" id="AND-yx-value" font-size="20" x="535" y="170"></text>
                                <text class="" id="AND-threshold-value" font-size="20" x="455" y="220">Threshold: 0</text>

                                <text class="changingTextStyle" id="AND-yx-value-expln" font-size="20" x="415" y="70"></text>
                            </svg>
                            <div style="font-family: 'Source Sans Pro', sans-serif;font-size: 20px;">                                
                                <!--<button id="ANDNextButton" onclick="startSimulation(1000,0)" disabled>Move to next set of values</button><br/><br/>-->
                                <h3>Truth Table of AND Gate</h3>
                                <table class="table-condensed truthTable" style="">
                                    <tr><th>X</th><th>Y</th><th>Expected O/P</th><th>O/P from NN</th></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-1"><td>0</td><td>0</td><td>0</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-1"></td></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-2"><td>0</td><td>1</td><td>0</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-2"></td></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-3"><td>1</td><td>0</td><td>0</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-3"></td></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-4"><td>1</td><td>1</td><td>1</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-4"></td></tr>
                                </table>
                            </div> 
                            <br/><br/><br/>
                            <p>
                                <b>Hint:</b> Try using 1.5 as threshold and 1 as weights
                            </p>                   
                    </div>

                    <div id="OR-gate-sim">
                    </div>

                    <div id="NOT-gate-sim">
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