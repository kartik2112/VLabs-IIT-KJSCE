<?php
    session_start();
    $_SESSION["currPage"]=5;
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
        <!-- JSX Graph links -->
        <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jsxgraph/0.99.5/jsxgraphcore.js"></script>
        <!-- Simulation scripts start-->
          <script src="../src/math.ob.js"></script>

          <script src="../src/numcheck.ob.js"></script>
          <script src="../src/canvasjschart.ob.js"></script>
          <script src="../src/bracket.ob.js"></script>
          <link href="../src/StyleSheet1.css" rel="stylesheet" />
          <link href="../Styles.css" rel="stylesheet" />

          <!-- jQuery 2.2.3 -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script type="text/javascript">

            $(function () {
                $(".sliders").slider({
                    step: 0.1,
                    max: 3,
                    min: -3,
                    slide: function (event, ui) {
                        $("#t" + sel).html(ui.value);
                    }
                });
                $(".tsliders").slider({
                    step: 0.1,
                    max: 2,
                    min: -2,
                    slide: function (event, ui) {
                        $("#thresh").html(ui.value);
                    }
                });
                $(".bsliders").slider({
                    step: 0.1,
                    max: 2,
                    min: -2,
                    slide: function (event, ui) {
                        $("#b" + sel).html(ui.value);
                    }
                });
                init_xor();
            });

            var counter, board, constPointSize, OP1, OP2, OP3, OP4, x1, x2, z, testOneX, testOneY, testTwoX, testTwoY, w11, w12, w21, w22, v1, v2, b1, b2, b3, theta, flag, erroneousCount, errorRate;

            function changeMode(){
              var m = document.getElementById('m');

              if(m.value=="xor"){
                document.getElementById('start').setAttribute("onclick","start_xor()");
                init_xor();
              }
              else{
                document.getElementById('start').setAttribute('onclick','start_ebp()');
                init_ebp();
              }

              document.getElementById('r4').style.background = "transparent";
              document.getElementById('start').innerHTML = "Start simulation";
              board = JXG.JSXGraph.initBoard('box', { axis: true, boundingbox: [-0.5, 2, 2, -0.5] });
              OP1 = board.create('point', [0, 0], { size: constPointSize, face: 'x', fixed: true });
              OP2 = board.create('point', [0, 1], { size: constPointSize, face: '^', fixed: true });
              OP3 = board.create('point', [1, 0], { size: constPointSize, face: '^', fixed: true });
              OP4 = board.create('point', [1, 1], { size: constPointSize, face: 'x', fixed: true });

              for(var i=1;i<=4;i++){
                document.getElementById('out' + i).innerHTML = "-";
              }
            }

            function init_ebp(){

            }

            function start_ebp(){
              
            }

           function init_xor() {
                counter = 0;
                board = JXG.JSXGraph.initBoard('box', { axis: true, boundingbox: [-0.5, 2, 2, -0.5] });  //Creates the cartesian graph
                constPointSize = 5;
                OP1 = board.create('point', [0, 0], { size: constPointSize, face: 'x', fixed: true });
                OP2 = board.create('point', [0, 1], { size: constPointSize, face: '^', fixed: true });
                OP3 = board.create('point', [1, 0], { size: constPointSize, face: '^', fixed: true });
                OP4 = board.create('point', [1, 1], { size: constPointSize, face: 'x', fixed: true });
                x1 = [0, 0, 1, 1];
                x2 = [0, 1, 0, 1];
                z = [0, 1, 1, 0];

                testOneX = 0;
                testOneY = 0;

                testTwoX = 1;
                testTwoY = 0;

                flag = true;
                erroneousCount = 0;

                var i;
                for (i = 1; i <= 7; i++) {
                    $("#w" + i).addClass('StdLine');
                }

            }

            function start_xor() {

                document.getElementById('grph').style.display = "block";

                w11 = Number(document.getElementById('t1').innerHTML);
                w12 = Number(document.getElementById('t2').innerHTML);
                b1 = Number(document.getElementById('b1').innerHTML);

                w21 = Number(document.getElementById('t3').innerHTML);
                w22 = Number(document.getElementById('t4').innerHTML);
                b2 = Number(document.getElementById('b2').innerHTML);

                v1 = Number(document.getElementById('t5').innerHTML);
                v2 = Number(document.getElementById('t6').innerHTML);
                b3 = Number(document.getElementById('b3').innerHTML);
                theta = Number(document.getElementById('thresh').innerHTML);
                z1 = z2 = y = y1 = y2 = yin = 0;

                document.getElementById('acc').style.display = "none";
                document.getElementById('m').setAttribute("disabled","disabled");
                if (counter == 3) {
                    document.getElementById('start').innerHTML = "Restart simulation";
                    document.getElementById('m').removeAttribute("disabled");
                }
                else if (counter == 4) {
                    for (var i = 1; i <= 4; i++) {
                        document.getElementById('out' + i).innerHTML = "-";
                    }
                    counter = 0;
                    document.getElementById('bef_thresh_op_txt').style.display = "none";
                    document.getElementById('after_threshold_op').style.display = "none";
                    document.getElementById('start').innerHTML = "Test next input";
                    board = JXG.JSXGraph.initBoard('box', { axis: true, boundingbox: [-0.5, 2, 2, -0.5] });
                    OP1 = board.create('point', [0, 0], { size: constPointSize, face: 'x', fixed: true });
                    OP2 = board.create('point', [0, 1], { size: constPointSize, face: '^', fixed: true });
                    OP3 = board.create('point', [1, 0], { size: constPointSize, face: '^', fixed: true });
                    OP4 = board.create('point', [1, 1], { size: constPointSize, face: 'x', fixed: true });
                }
                else document.getElementById('start').innerHTML = "Test next input";

                if (counter != 0) document.getElementById('r' + (counter)).style.background = "transparent";
                else document.getElementById('r4').style.background = "transparent";

                document.getElementById('r' + (counter + 1)).style.background = "#ff9595";

                var i;
                for (i = 1; i <= 6; i++) {
                    $("#w" + i).addClass('animatedLinePurple');
                }
                $("#w" + i).addClass('animatedLineGreen');

                document.getElementById('start').setAttribute("disabled", "disabled");

                setTimeout(function () {
                    mlp(counter);
                    for (i = 1; i <= 6; i++) {
                        $("#w" + i).removeClass('animatedLinePurple');
                    }
                    document.getElementById('start').removeAttribute("disabled");
                    $("#w" + i).removeClass('animatedLineGreen');
                    if (counter == 4) {
                        document.getElementById('acc').style.display = "block";

                        errorRate = erroneousCount / 4;
                        errorRate = 1 - errorRate;

                        errorRate = errorRate * 100;

                        document.getElementById('acc_val').innerHTML = errorRate + "%";
                        erroneousCount = 0;
                    }
                }, 2000);


            }

            function mlp(index) {
                document.getElementById('bef_thresh_op_txt').style.display = "block";
                document.getElementById('after_threshold_op').style.display = "block";
                counter++;

                var z11 = x1[index] * w11 + x2[index] * w21 - b1;
                var z22 = x1[index] * w12 + x2[index] * w22 - b2;

                z1 = z11; z2 = z22;

                y1 = Number(z1);
                y2 = Number(z2);

                if (z1 >= theta)
                    y1 = 1;
                else
                    y1 = 0;
                if (z2 >= theta)
                    y2 = 1;
                else
                    y2 = 0;

                var yin1 = y1 * v1 + y2 * v2 - b3;
                yin = yin1;

                yin = Number(yin);
                document.getElementById('bef_thresh_op').innerHTML = yin;

                if (yin >= theta)
                    y = 1;
                else
                    y = 0;

                var flagger = false;

                if (y != z[index]) {
                    erroneousCount++;
                }

                decisionBoundary1 = board.create('line', [b1 * -1, Number(w11), Number(w21)]);
                decisionBoundary2 = board.create('line', [-b2, Number(w12), Number(w22)]);

                document.getElementById('op').innerHTML = y;
                document.getElementById('out' + (index + 1)).innerHTML = y;
                z1 = z2 = y = y1 = y2 = 0;
            }
        </script> 

        <style type="text/css">
          #truth td{
            padding: 3px;
          }

          #truth th{
            padding: 3px;
            background: #89deff;
            border: 1px solid black;
          }

          .selected{
            stroke: #00b8ff;
          }

          .not_sel{
            stroke: #ff6a00;
          }

          .neuron_sel{
            fill: #ff6a00;
          }

          .opneuron{
            fill: #00b8ff;
          }

          .hneuron{
            fill: #222d32;
          }
        </style>
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
        <p align="center" style="font-size:1em;"><b><?php echo $lab_name?><!-- Write your lab name --></b></p>
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
                <a href="../explist.php"><i class="fa fa-dashboard"></i><?php echo $lab_name?><!-- Write your lab name --></a>
              </li>
              <li>
                <a href="#"><?php echo $exp_name?><!-- Write your experiment name --></a>
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

          <p>--> Click on any line to change its weight</p>
          <p>--> Click on the threshold graph to change threshold value</p>
          <p>--> Click on any hidden/output neuron to change its bias</p>
           
            <!--Simulation content goes here -->

            <select id="m" onchange="changeMode()">
              <option value="xor">XOR</option>
              <option value="ebp">Error Back Propogation</option>
            </select>

            <svg height="350" width="900">

            <!-- The weights connecting input and hidden layer -->

              <line class="not_sel" id="w1" x1="70" y1="50" x2="270" y2="50" stroke="#ff6a00" stroke-width="5" onclick="editWeights(1)"><title>W11</title></line>
              <text id="t1" x="110" y="40" font-size="17">0</text>

              <line class="not_sel" id="w2" x1="70" y1="50" x2="270" y2="250" stroke="#ff6a00" stroke-width="5" onclick="editWeights(2)"><title>W12</title></line>
              <text id="t2" x="130" y="100" font-size="17">0</text>

              <line class="not_sel" id="w3" x1="70" y1="250" x2="270" y2="50" stroke="#ff6a00" stroke-width="5" onclick="editWeights(3)"><title>W21</title></line>
              <text id="t3" x="120" y="170" font-size="17">0</text>

              <line class="not_sel" id="w4" x1="70" y1="250" x2="270" y2="250" stroke="#ff6a00" stroke-width="5" onclick="editWeights(4)"><title>W22</title></line>
              <text id="t4" x="110" y="240" font-size="17">0</text>

            <!-- Ouput neuron and its weights -->

              <line class="not_sel" id="w5" x1="270" y1="50" x2="470" y2="150" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(5)"><title>V1</title></line>
              <text id="t5" x="340" y="80" font-size="17">0</text>

              <line class="not_sel" id="w6" x1="270" y1="250" x2="470" y2="150" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(6)"><title>V2</title></line>
              <text id="t6" x="330" y="205" font-size="17">0</text>

              <line id="w7" x1="470" y1="150" x2="570" y2="150" stroke="#ff6a00" stroke-width="5" ><title>y</title></line>

              <circle id="c3" class="opneuron" cx="470" cy="150" r="20" fill="#00b8ff" onclick="editBias(3)" style="z-index: 10"><title>Output Neuron</title></circle>
              <text id="bef_thresh_op_txt" style="display: none;" x="450" y="190" font-size="17">y(x) = <tspan id="bef_thresh_op">0</tspan></text>

            <!-- The input layer -->

              <circle class="neuron" cx="70" cy="50" r="20" fill="#00b8ff" style="z-index: 10"><title>Input 1</title></circle>
              <circle class="neuron" cx="70" cy="250" r="20" fill="#00b8ff" style="z-index: 10"><title>Input 2</title></circle>

            <!-- The hidden layer -->

              <circle id="c1" class="hneuron" cx="270" cy="50" r="20" onclick="editBias(1)" style="z-index: 10"><title>Hidden Neuron 1</title></circle>
              <circle id="c2" class="hneuron" cx="270" cy="250" r="20" onclick="editBias(2)" style="z-index: 10"><title>Hidden Neuron 2</title></circle>

            <!-- Biases  -->

              <text x="250" y="30">b1 = <tspan id="b1">0</tspan></text>
              <text x="250" y="280">b2 = <tspan id="b2">0</tspan></text>
              <text x="450" y="130">b3 = <tspan id="b3">0</tspan></text>

            <!-- Threshold. Use #thresh to set value of threshold -->

              <text x="570" y="115" font-size="15">Threshold = <tspan id="thresh">0</tspan></text>
              <image x="570" y="125" height="50" width="50" xlink:href="../images/unipolar_threshold.png" style="padding: 10px;fill: #00b8ff" onclick="editThreshold()"/>

            <!-- The output. Use #op to set value of output -->

              <text id="after_threshold_op" style="display: none;" x="640" y="150" font-size="17">o(x) = <tspan id="op">0</tspan></text>
            </svg>

            <br/>

            <button id="start" class="btn btn-success" onclick="start_xor();">Start simulation</button>

            <div style="width: 100%;height: 300px;">
              <div style="width: 45%;float: left;">
                <h3>Truth Table</h3>
                <br/>
                <table id="truth" border="2" style="text-align: center;">
                  <tr>
                    <th colspan="2" style="text-align: center;">Input</th>
                    <th colspan="2" style="text-align: center;">Output</th>
                  </tr>
                  <tr>
                    <th>X1</th>
                    <th>X2</th>
                    <th>Expected Output</th>
                    <th>Network's output</th>
                  </tr>

                  <tr id="r1">
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td id="out1">-</td>
                  </tr>

                  <tr id="r2">
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td id="out2">-</td>
                  </tr>

                  <tr id="r3">
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td id="out3">-</td>
                  </tr>

                  <tr id="r4">
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td id="out4">-</td>
                  </tr>
                </table>
                <h4 id="acc" style="display: none;">Accuracy of network: <span id="acc_val">0%</span></h5>
              </div>

              <div id="grph" style="width: 45%;float: right;display: none;">
                <h3>Decision Boundaries</h3>
                <div id="output">
                  <div id="box" class="jxgbox" style="width:300px; height:300px;"></div>
                </div>
              </div>

            </div>
        </section>
        <!-- /.content -->
      </div>
      <?php include 'footer.html'; ?>
      <!-- /.content-wrapper -->
        </div>
        <div id="edit" style="position: absolute;width: 170px;height: 100px;background: rgba(0,0,0,0.75);border-radius: 20px;top: 0px;left: 0px;text-align: center;">
            <p style="text-align: center;color: white;padding: 5px;">Slide to change weight</p>
            <div id="wslider" class="sliders" style="margin: 0 10px;height: 10px;background: deepskyblue;"></div>
            <button onclick="set(sel)" style="margin: 15px 0;border: none;outline: none;">Set</button>
        </div>
        <div id="edit_th" style="position: absolute;width: 170px;height: 100px;background: rgba(0,0,0,0.75);border-radius: 20px;top: 0px;left: 0px;text-align: center;z-index: 99">
            <p style="text-align: center;color: white;padding: 5px;">Slide to change threshold</p>
            <div id="tslider" class="tsliders" style="margin: 0 10px;height: 10px;background: deepskyblue;"></div>
            <button onclick="set_th()" style="margin: 15px 0;border: none;outline: none;">Set</button>
        </div>
        <div id="edit_b" style="position: absolute;width: 170px;height: 100px;background: rgba(0,0,0,0.75);border-radius: 20px;top: 0px;left: 0px;text-align: center;z-index: 99">
            <p style="text-align: center;color: white;padding: 5px;">Slide to change bias</p>
            <div id="tslider" class="bsliders" style="margin: 0 10px;height: 10px;background: deepskyblue;"></div>
            <button onclick="set_b()" style="margin: 15px 0;border: none;outline: none;">Set</button>
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
<!-- Editing weights -->
<script type="text/javascript">
    var sel = 1;
    $("#edit").hide();
    $("#edit_th").hide();
    $("#edit_b").hide();

    var changing = 0;
    function editWeights(id) {
        if (counter > 0 && counter < 4) {
            alert('Please iterate through all the inputs first. Try after that.');
            return;
        }
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
        $(".sliders").slider("value", val);
        var l, t;
        l = 750;
        e.style.left = l + "px";
        t = 270;
        e.style.top = t + "px";
        $("#edit").show();
    }

    function editThreshold() {
        if (counter > 0 && counter < 4) {
            alert('Please iterate through all the inputs first. Try after that.');
            return;
        }
        if (changing == 1) {
            alert('Save the value first');
            return;
        }
        changing = 1;
        var e = document.getElementById('edit_th');

        var val = $("#thresh").html();
        $(".tsliders").slider("value", val);
        var l, t;
        l = 750;
        e.style.left = l + "px";
        t = 270;
        e.style.top = t + "px";
        $("#edit_th").show();
    }

    function editBias(id) {
        if (counter > 0 && counter < 4) {
            alert('Please iterate through all the inputs first. Try after that.');
            return;
        }
        if (changing == 1) {
            alert('Save the value first');
            return;
        }
        sel = id;

        if (sel < 3) $("#c" + id).removeClass("hneuron");
        else $("#c" + id).removeClass("opneuron");
        $("#c" + id).addClass("neuron_sel");

        var val = $("#b" + id).html();
        $(".bsliders").slider("value", val);
        changing = 1;
        var e = document.getElementById('edit_b');

        var l, t;
        l = 750;
        e.style.left = l + "px";
        t = 270;
        e.style.top = t + "px";
        $("#edit_b").show();
    }

    function set(id) {
        var e = document.getElementById('edit');

        $("#w" + id).removeClass("selected");
        $("#w" + id).addClass("not_sel");
        $("#edit").hide();
        $(".sliders").slider("value", 0, 0);
        changing = 0;
    }

    function set_th() {
        changing = 0;
        $("#edit_th").hide();
        $(".tsliders").slider("value", 0, 0);
    }

    function set_b() {
        changing = 0;
        $("#c" + sel).removeClass("neuron_sel");
        if (sel < 3) $("#c" + sel).addClass("hneuron");
        else $("#c" + sel).addClass("opneuron");
        $("#edit_b").hide();
        $(".bsliders").slider("value", 0, 0);
    }
</script>