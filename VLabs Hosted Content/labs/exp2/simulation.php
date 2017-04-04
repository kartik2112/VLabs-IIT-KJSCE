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
          <link href="../src/StyleSheet1.css" rel="stylesheet" />
          <link href="../Styles.css" rel="stylesheet" />

          <!-- jQuery 2.2.3 -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script type="text/javascript">

          $(function(){
            $(".sliders").slider({
              step: 0.1,
              max: 3,
              min: -3,
              slide: function(event,ui){
                $("#t"+sel).html(ui.value);
              }
            });
            $(".tsliders").slider({
              step: 0.1,
              max: 2,
              min: -2,
              slide: function(event,ui){
                $("#thresh").html(ui.value);
              }
            });
          });
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
            stroke-dasharray: 7px;
          }

          .not_sel{
            stroke: #ff6a00;
            stroke-dasharray: 0px;
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
          <button id="start" class="btn btn-success">Start simulation</button>
          <h3 style="margin-top:5%">Simulation</h3>

          <p>Click on any line to change its weight</p>
           
            <!--Simulation content goes here -->

            <svg height="300" width="800">

            <!-- The weights connecting input and hidden layer -->

              <line class="not_sel" id="w1" x1="70" y1="50" x2="270" y2="50" stroke="#ff6a00" stroke-width="5" onclick="editWeights(1)"/>
              <text id="t1" x="110" y="40" font-size="17">0</text>

              <line class="not_sel" id="w2" x1="70" y1="50" x2="270" y2="250" stroke="#ff6a00" stroke-width="5" onclick="editWeights(2)"/>
              <text id="t2" x="130" y="100" font-size="17">0</text>

              <line class="not_sel" id="w3" x1="70" y1="250" x2="270" y2="50" stroke="#ff6a00" stroke-width="5" onclick="editWeights(3)"/>
              <text id="t3" x="120" y="170" font-size="17">0</text>

              <line class="not_sel" id="w4" x1="70" y1="250" x2="270" y2="250" stroke="#ff6a00" stroke-width="5" onclick="editWeights(4)"/>
              <text id="t4" x="110" y="240" font-size="17">0</text>

            <!-- Ouput neuron and its weights -->

              <line class="not_sel" id="w5" x1="270" y1="50" x2="470" y2="150" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(5)"/>
              <text id="t5" x="340" y="80" font-size="17">0</text>

              <line class="not_sel" id="w6" x1="270" y1="250" x2="470" y2="150" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(6)"/>
              <text id="t6" x="330" y="205" font-size="17">0</text>

              <line x1="470" y1="150" x2="570" y2="150" stroke="#ff6a00" stroke-width="5" />

              <circle class="neuron" cx="470" cy="150" r="20" fill="#00b8ff" style="z-index: 10"><title>Output Neuron</title></circle>

            <!-- The input layer -->

              <circle class="neuron" cx="70" cy="50" r="20" fill="#00b8ff" style="z-index: 10"><title>Input 1</title></circle>
              <circle class="neuron" cx="70" cy="250" r="20" fill="#00b8ff" style="z-index: 10"><title>Input 2</title></circle>

            <!-- The hidden layer -->

              <circle class="neuron" cx="270" cy="50" r="20" fill="#222d32" style="z-index: 10"><title>Hidden Neuron 1</title></circle>
              <circle class="neuron" cx="270" cy="250" r="20" fill="#222d32" style="z-index: 10"><title>Hidden Neuron 2</title></circle>

            <!-- Threshold. Use #thresh to set value of threshold -->

              <text x="570" y="115" font-size="15">Threshold = <tspan id="thresh">0</tspan></text>
              <image x="570" y="125" height="50" width="50" xlink:href="../images/unipolar_threshold.png" style="padding: 10px;fill: #00b8ff" onclick="editThreshold()"/>

            <!-- The output. Use #op to set value of output -->

              <text x="640" y="150" font-size="17">y(x) = <tspan id="op">0</tspan></text>
            </svg>

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

              <tr>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td id="out1">-</td>
              </tr>

              <tr>
                <td>0</td>
                <td>1</td>
                <td>1</td>
                <td id="out2">-</td>
              </tr>

              <tr>
                <td>1</td>
                <td>0</td>
                <td>1</td>
                <td id="out3">-</td>
              </tr>

              <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td id="out4">-</td>
              </tr>
            </table>

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
            <p style="text-align: center;color: white;padding: 5px;">Slide to change Threshold</p>
            <div id="tslider" class="tsliders" style="margin: 0 10px;height: 10px;background: deepskyblue;"></div>
            <button onclick="set_th()" style="margin: 15px 0;border: none;outline: none;">Set</button>
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
  var sel=1;
  $("#edit").hide();
  $("#edit_th").hide();

  var changing = 0;
  function editWeights(id){
      if(changing==1){
        alert('Set the threshold value first');
        return;
      }
      changing=1;
      sel=id;
      id = "w" + id;
      $("#"+id).removeClass("not_sel");
      $("#"+id).addClass("selected");
      var x = document.getElementById(id);
      var e = document.getElementById('edit');

      var l,t;
      l = 750;
      e.style.left = l+"px";
      t = 270;
      e.style.top = t+"px";
      $("#edit").show();
  }

  function editThreshold(){
    if(changing==1){
        alert('Set the weight value first');
        return;
      }
      changing=1;
      var x = document.getElementById('thresh');
      var e = document.getElementById('edit_th');

      var l,t;
      l = 750;
      e.style.left = l+"px";
      t = 270;
      e.style.top = t+"px";
      $("#edit_th").show();
  }

  function set(id){
      var e = document.getElementById('edit');

      $("#w"+id).removeClass("selected");
      $("#w"+id).addClass("not_sel");
      $("#edit").hide();
      $(".sliders").slider("value",0,0);
      changing=0;
  }

  function set_th(){
      changing=0;
      $("#edit_th").hide();
      $(".tsliders").slider("value",0,0);
  }
</script>