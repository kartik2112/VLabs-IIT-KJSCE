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
        <script type="text/javascript">
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
                resetCompleteSimulation();
            }

            function stopSimulation(timer) {
                window.clearTimeout(timer);
                resetCompleteSimulation();
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

            function simulationPart(iterationNo, inputX, inputY, w1, w2, threshold, interval, timer) {
                inputX = inputX.split(",");
                inputY = inputY.split(",");

                resetSimulationPart();

                /*
                Highlight current truth table row
                */
                $(".AND-TT-rows").removeClass("highlightTTRow");
                $("#AND-TT-row-" + (iterationNo + 1)).addClass("highlightTTRow");

                /*
                Set animations
                */
                $("#AND-XVal").text(inputX[iterationNo]);
                $("#AND-YVal").text(inputY[iterationNo]);
                $("#inputX-oplay_neuron1").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
                $("#inputY-oplay_neuron1").addClass(inputY[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
                var ux = w1 * inputX[iterationNo] + w2 * inputY[iterationNo];

                window.setTimeout(function () {
                    $("#ux-wrapper").addClass("highlightDiv");
                    $("#ux-value").text("= " + ux);

                    window.setTimeout(function () {
                        $("#ux-wrapper").removeClass("highlightDiv");
                        $("#yx-wrapper").addClass("highlightDiv");

                        $("#oplay_neuron1-oplay_thrshld").addClass("animatedLine");

                        if (ux > threshold) {
                            $("#yx-value-expln").text("u(x) = " + ux + " > " + threshold);
                        }
                        else {
                            $("#yx-value-expln").text("u(x) = " + ux + " < " + threshold);
                        }

                        window.setTimeout(function () {
                            if (ux > threshold) {
                                $("#yx-value-expln").text("u(x) = " + ux + " > " + threshold + " => y(x) = 1");
                                $("#AND-TT-OP-row-" + (iterationNo+1)).text(1);
                                $("#yx-value").text("= " + 1);
                            }
                            else {
                                $("#yx-value-expln").text("u(x) = " + ux + " < " + threshold + " => y(x) = 0");
                                $("#AND-TT-OP-row-" + (iterationNo+1)).text(0);
                                $("#yx-value").text("= " + 0);
                            }
                        }, interval * 6);
                    }, interval * 4);

                }, interval * 2);
            }

            function startSimulation(interval) {
                var inputX = [0, 0, 1, 1];
                var inputY = [0, 1, 0, 1];
                var w1 = 1;
                var w2 = 1;
                var threshold = 1.5;
                var iterationNo = 0;

                simulationPart(iterationNo, inputX.join(","), inputY.join(","), w1, w2, threshold, interval);

                iterationNo++;

                var timer = window.setInterval(function () {
                    simulationPart(iterationNo, inputX.join(","), inputY.join(","), w1, w2, threshold, interval, timer);

                    iterationNo++;
                    if (iterationNo == 4) {
                        window.clearInterval(timer);
                    }
                }, interval * 17);

                $("#stopSimButton").click(function () {
                    stopSimulation(timer);
                });

            }
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
            <?php include 'pane.html'; ?>
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
                    <select onchange="displayDiv(this.value)">
                        <option value="AND">AND Gate</option>
                        <option value="OR">OR Gate</option>
                        <option value="NOT">NOT Gate</option>
                    </select>
                    <button onclick="startSimulation(1000)">Start Simulation</button>
                    <button id="stopSimButton">Stop Simulation</button>
                    <br/>
                    <div id="AND-gate-sim">
                            <svg width="650" height="300">
                                <line id="inputX-oplay_neuron1" class="StdLine" x1="50" y1="50" x2="250" y2="150" style=""/>
                                <line id="inputY-oplay_neuron1" class="StdLine" x1="50" y1="250" x2="250" y2="150" style=""/>
                                <line id="oplay_neuron1-oplay_thrshld" class="StdLine" x1="250" y1="150" x2="450" y2="150" style=""/>

                                <circle id="inputX" class="StdCircle" cx="50" cy="50" r="20" style=""/>
                                <circle id="inputY" class="StdCircle" cx="50" cy="250" r="20" style=""/>
                                <circle id="oplay_neuron1" class="StdCircle" cx="250" cy="150" r="20" style=""/>
                                <image id="oplay_thrshld" x="425" y="125"  height="50" width="50" xlink:href="../images/unipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>

                                <text font-size="20" x="242" y="155" font-size="25">∑</text>

                                <text font-size="20" x="15" y="55">X</text>
                                <text class="changingTextStyle" id="AND-XVal" font-size="20" x="45" y="55"></text>

                                <text font-size="20" x="15" y="255">Y</text>
                                <text class="changingTextStyle" id="AND-YVal" font-size="20" x="45" y="255"></text>

                                <text font-size="20" id="inputX-oplay_neuron1-weight" x="220" y="120">1</text>
                                <text font-size="20" id="inputX-oplay_neuron1-weight" x="220" y="185">1</text>

                                <text font-size="20" x="270" y="130">u(x) = 1*X + 1*Y</text>
                                <text class="changingTextStyle" id="ux-value" font-size="20" x="280" y="180"></text>

                                <text font-size="20" x="485" y="150">y(x)</text>
                                <text class="changingTextStyle" id="yx-value" font-size="20" x="485" y="170"></text>

                                <text class="changingTextStyle" id="yx-value-expln" font-size="20" x="415" y="70"></text>
                            </svg>
                            <div style="font-family: 'Source Sans Pro', sans-serif;font-size: 20px;">
                                <div>
                                    <!--<p id="ux-wrapper">u(x) = 1*X + 1*Y = <span style="font-weight: bolder" id="ux-value"></span></p>-->
                                    <p id="ux-wrapper">y(x) = 1 , u(x) > <span class="AND-gate-threshold">1.5</span><br/>
                                        &emsp;&emsp;= 0 , u(x) < <span class="AND-gate-threshold">1.5</span></p>
                                </div>
                                <!--<button id="ANDNextButton" onclick="startSimulation(1000,0)" disabled>Move to next set of values</button><br/><br/>-->
                                <table class="table-condensed truthTable" style="">
                                    <tr><th>X</th><th>Y</th><th>Expected O/P</th><th>O/P from NN</th></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-1"><td>0</td><td>0</td><td>0</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-1"></td></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-2"><td>0</td><td>1</td><td>0</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-2"></td></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-3"><td>1</td><td>0</td><td>0</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-3"></td></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-4"><td>1</td><td>1</td><td>1</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-4"></td></tr>
                                </table>
                            </div>                    
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


