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
        <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../../dist/css/AdminLTE.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
        <!-- Custom stylesheet used -->
        <link rel="stylesheet" href="../style.css">
        <!-- jQuery 2.2.3 -->
        <script src="../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <!-- Simulation scripts start-->
        <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
        <script type="text/javascript" src="../../../plugins/jsxgraphcore.min.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jsxgraph/0.99.5/jsxgraphcore.js"></script>
        <script src="../../../src/fis_simulation.js"></script>
        <!-- <script src="../../../src/canvasjschart.ob.js"></script> -->
        <style>

        </style>
    <!-- Simulation scripts end-->
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <?php
        include '../header.html';
        include '../lab_name.php';
        $lab_name = $_SESSION['lab_name'];
        $exp_name = $_SESSION['exp_name'];
        ?>

        <div class="wrapper">
        <header class="main-header">
        <!-- Logo -->
        <a href="../../explist.php" class="logo">
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
                <a href="../../explist.php"><i class="fa fa-dashboard"></i><?php echo $lab_name?><!-- Write your lab name --></a>
              </li>
              <li>
                <a href="#"><?php echo $exp_name?><!-- Write your experiment name --></a>
              </li>
              <li class="active">Simulation</li>
            </ol>
          </section>
        </nav>
      </header>
            <?php include '../pane.php'; ?>
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
          <a href="JavaScript:newPopup('../procedure.php');" style="color:green;font-size: 16px"><img src="../../../dist/img/popout.png" style="height:20px; width:20px; "> Pop Up Procedure</a>
          <br>
          <br>
          <a href="" style="color:green; font-size: 16px"><img src="../../../dist/img/fork.png" style="height:20px; width:20px; "></a>
        </section>
        <!-- Main content -->
        <section class="content">
          <h3 id="title" style="margin-top:5%">What is to be done?</h3>

            <!--Simulation content goes here -->
            <div id="instr_div" style="font-size: 17px;">
              <ul>
                <li>Edit the name of descriptors for each variable.</li>
                <li>You can also edit the starting and ending values for each descriptor</li>
                <li>Default values are also provided.</li>
                <li><b>You can only add upto 5 descriptors for any variable</b></li>
                <li><u>Format:</u> (start value) (Descriptor name) (end value)</li>
              </ul>
              <button id="hide_instr" class="btn-success" onclick="hide_instrs(0);">Continue</button>
            </div>
            <br/>
            <div id="descriptor_div" style="width: 90%;display: none;">
              <a id="show_instr" href="#" onclick="show_instrs();">Show instructions</a>
              <h4>Add/Remove descriptors</h4>
              <div id="grease" class="descr_box" style="margin-right: 12.5px;">
                <h4 style="text-align: center;">Descriptors for Grease (in %)</h4>
                <br>
                <div id="descrs_1" style="height: 210px;">
                  <script type="text/javascript">
                    for (var i = 0; i < grease_descriptors.length; i++) {
                      document.writeln("<div class=\"descr\" id=\"g_d_"+grease_descriptors[i].id+"\">");
                      if(i==0)
                      {
                          document.writeln('<input type="number" max="100" min="0" placeholder="inf" disabled />');
                      }
                      else{
                          document.writeln('<input type="number" max="100" min="0" value='+grease_descriptors[i].start+' title="When descriptor\'s membership value begins to rise" />');
                      }
                      document.writeln("<input type=\"text\" placeholder=\"Name of descriptor\" value="+grease_descriptors[i].name+" />");
                      if(i==grease_descriptors.length-1) document.writeln("<input type=\"number\" max=\"100\" min=\"0\" placeholder=\"inf\" disabled title=\"When descriptor's membership value reaches zero\" /><button id=\"g3\" onclick=\"rem_descriptor('g',3)\"><b>-</b></button>");
                      else document.writeln("<input type=\"number\" max=\"100\" min=\"0\" value="+grease_descriptors[i].end+" title=\"When descriptor's membership value reaches zero\" />");
                      document.writeln("</div>");
                    }
                  </script>
                  <!-- <div class="descr" id="g_d_1">
                    <input type="number" max="100" min="0" placeholder="inf" disabled/>
                    <input type="text" placeholder="Name of descriptor" value="Low"/>
                    <input type="number" max="100" min="0" value="33" title="When descriptor's membership value reaches zero"/>
                  </div>
                  <div class="descr" id="g_d_2">
                    <input type="number" max="100" min="0" value="34" title="When descriptor's membership value begins to rise"/>
                    <input type="text" placeholder="Name of descriptor" value="Medium"/>
                    <input type="number" max="100" min="0" value="66" title="When descriptor's membership value reaches zero"/>
                  </div>
                  <div class="descr" id="g_d_3">
                    <input type="number" max="100" min="0" value="67" title="When descriptor's membership value begins to rise"/>
                    <input type="text" placeholder="Name of descriptor" value="High" />
                    <input type="number" max="100" min="0" value="100" title="When descriptor's membership value reaches zero"/>
                    <button id="g3" onclick="rem_descriptor('g',3)"><b>-</b></button>
                  </div> -->
                </div>
                <br>
                <div id="g_add" class="add_btn_div" onclick="add_descriptor(1);">
                  <button>+</button>
                  <p>Add descriptor</p>
                </div>
                <p id="g_txt" style="float: right;margin: 10px;">Total: <span id="g_no">3</span></p>
              </div>

              <div id="dirt" class="descr_box" style="margin-right: 12.5px;">
                <h4 style="text-align: center;">Descriptors for Dirt (in %)</h4>
                <br>
                <div id="descrs_2" style="height: 210px;">
                  <div class="descr" id="d_d_1">
                    <input type="number" max="100" min="0" placeholder="inf" disabled/>
                    <input type="text" placeholder="Name of descriptor" value="Low" />
                    <input type="number" max="100" min="0" value="33" title="When descriptor's membership value reaches zero"/>
                  </div>
                  <div class="descr" id="d_d_2">
                    <input type="number" max="100" min="0" value="34" title="When descriptor's membership value begins to rise"/>
                    <input type="text" placeholder="Name of descriptor" value="Medium" />
                    <input type="number" max="100" min="0" value="66" title="When descriptor's membership value reaches zero"/>
                  </div>
                  <div class="descr" id="d_d_3">
                    <input type="number" max="100" min="0" value="67" title="When descriptor's membership value begins to rise"/>
                    <input type="text" placeholder="Name of descriptor" value="High" />
                    <input type="number" max="100" min="0" placeholder="inf" title="When descriptor's membership value reaches zero" disabled/>
                    <button id="d3" onclick="rem_descriptor('d',3);"><b>-</b></button>
                  </div>
                </div>
                <br>
                <div id="d_add" class="add_btn_div" onclick='add_descriptor(2);'>
                  <button>+</button>
                  <p>Add descriptor</p>
                </div>
                <p id="d_txt" style="float: right;margin: 10px;">Total: <span id="d_no">3</span></p>
              </div>
              <div id="wash_time" class="descr_box">
                <h4 style="text-align: center;">Descriptors for Wash time (in mins)</h4>
                <br>
                <div id="descrs_3" style="height: 210px;">
                  <div class="descr" id="t_d_1">
                    <input type="number" max="120" min="0" placeholder="inf" disabled/>
                    <input type="text" placeholder="Name of descriptor" value="Low"/>
                    <input type="number" max="120" min="0" value="33" title="When descriptor's membership value reaches zero"/>
                  </div>
                  <div class="descr" id="t_d_2">
                    <input type="number" max="120" min="0" value="34" title="When descriptor's membership value begins to rise"/>
                    <input type="text" placeholder="Name of descriptor" value="Medium"/>
                    <input type="number" max="120" min="0" value="66" title="When descriptor's membership value reaches zero"/>
                  </div>
                  <div class="descr" id="t_d_3">
                    <input type="number" max="120" min="0" value="67" title="When descriptor's membership value begins to rise"/>
                    <input type="text" placeholder="Name of descriptor" value="High" />
                    <input type="number" max="120" min="0" placeholder="inf" disabled title="When descriptor's membership value reaches zero"/>
                    <button id="t3" onclick="rem_descriptor('t',3)"><b>-</b></button>
                  </div>
                </div>
                <br>
                <div id="t_add" class="add_btn_div" onclick="add_descriptor(3);">
                  <button>+</button>
                  <p>Add descriptor</p>
                </div>
                <p id="t_txt" style="float: right;margin: 10px;">Total: <span id="t_no">3</span></p>
              </div>
              <div style="clear: both;">
                <button id="save" class="btn-success btn-md" onclick="save();" title="You will see the effect of your changes below">Save</button>
              </div>
                <hr>
            
                <div id="table_data"></div>
              <br>
              <div id="graph_div">
                <!-- Graph goes here -->
              <h3>Graph for Grease descriptors</h3>
              <div id="grease_GraphDiv" class="jxgbox" style="width:600px; height:300px;"></div>
              <h3>Graph for Dirt descriptors</h3>
              <div id="dirt_GraphDiv" class="jxgbox" style="width:600px; height:300px;"></div>
              <h3>Graph for Wash time descriptors</h3>
              <div id="washing_GraphDiv" class="jxgbox" style="width:600px; height:300px;"></div>
              </div>
            </div>

        </section>
        <!-- /.content -->
      </div>
      <?php include '../footer.html'; ?>
      <!-- /.content-wrapper -->
        </div>
    </body>
</html>

<!-- ./wrapper -->
<!-- Slimscroll -->
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/app.min.js"></script>


<script src="../../../src/fis_simulation.js"></script>
