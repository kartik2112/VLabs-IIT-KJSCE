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
        <!-- Custom stylesheet used -->
        <link rel="stylesheet" href="style.css">
        <!-- jQuery 2.2.3 -->
        <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <!-- Simulation scripts start-->
        <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
        <script type="text/javascript" src="../../plugins/jsxgraphcore.min.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jsxgraph/0.99.5/jsxgraphcore.js"></script>
        <script src="../../src/exp10Simulation.js"></script>
        <!-- <script src="../../../src/canvasjschart.ob.js"></script> -->
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
          <h3 id="title" style="margin-top:5%">What is to be done for step 1?</h3>

            <!--Simulation content goes here -->
            <div id="instr_div" style="font-size: 17px;">
              <ul>
                <li>Edit the name of descriptors for each variable.</li>
                <li>You can also edit the starting and ending values for each descriptor.</li>
                <li><b>You can only add upto 5 descriptors for any variable.</b></li>
                <li>Format of a descriptor: (start value) (Descriptor name) (end value)</li>
                <li>The maximum value for Grease & Dirt input is 100%, and wash time can be a maximum of 120 mins.</li>
                <li>To see changes in the graph, press the <button class="btn-warning btn-sm">View changes</button> button</li>
              </ul>
              <button data-toggle="tooltip" title="I have read the above instructions" data-placement="bottom" id="hide_instr" class="btn-success" onclick="hide_instrs(0);">Continue</button>
            </div>
            <br/>
            <div id="descriptor_div" style="width: 90%;display: none;">
              <a id="show_instr" href="#" onclick="show_instrs();">Show instructions</a>
              <h4>Add/Remove descriptors</h4>
              <div id="grease" class="descr_box">
                <h4 style="text-align: center;">Descriptors for Grease (in %)</h4>
                <br>
                <div id="descrs_1" style="height: 210px;">
                  <script type="text/javascript">
                    for (var i = 0; i < grease_descriptors.length; i++) {
                      document.writeln("<div class=\"descr\" id=\"g_d_"+grease_descriptors[i].id+"\">");
                      if(i==0)
                      {
                          document.writeln('<input class="line_input" type="number" max="100" min="0" placeholder="inf" disabled />');
                      }
                      else{
                          document.writeln('<input class="line_input" type="number" max="100" min="0" value='+grease_descriptors[i].start+' title="When descriptor\'s membership value begins to rise" />');
                      }
                      document.writeln("<input class='line_input' type=\"text\" placeholder=\"Name of descriptor\" value="+grease_descriptors[i].name+" />");
                      if(i==grease_descriptors.length-1) document.writeln("<input class='line_input' type=\"number\" max=\"100\" min=\"0\" placeholder=\"100\" disabled title=\"When descriptor's membership value reaches zero\" /><button id=\"g3\" onclick=\"rem_descriptor('g',3)\"><b>-</b></button>");
                      else document.writeln("<input class='line_input' type=\"number\" max=\"100\" min=\"0\" value="+grease_descriptors[i].end+" title=\"When descriptor's membership value reaches zero\" />");
                      document.writeln("</div>");
                    }
                  </script>
                </div>
                <br>
                <div id="g_add" class="add_btn_div" onclick="add_descriptor(1);">
                  <button>+</button>
                  <p>Add descriptor</p>
                </div>
                <p id="g_txt" style="float: right;margin: 10px;">Total: <span id="g_no">3</span></p>
              </div>

              <div id="dirt" class="descr_box">
                <h4 style="text-align: center;">Descriptors for Dirt (in %)</h4>
                <br>
                <div id="descrs_2" style="height: 210px;">
                  <script type="text/javascript">
                    for (var i = 0; i < dirt_descriptors.length; i++) {
                      document.writeln("<div class=\"descr\" id=\"d_d_"+dirt_descriptors[i].id+"\">");
                      if(i==0)
                      {
                          document.writeln('<input type="number" max="100" min="0" placeholder="inf" disabled />');
                      }
                      else{
                          document.writeln('<input type="number" max="100" min="0" value='+dirt_descriptors[i].start+' title="When descriptor\'s membership value begins to rise" />');
                      }
                      document.writeln("<input class='line_input' type=\"text\" placeholder=\"Name of descriptor\" value="+dirt_descriptors[i].name+" />");
                      if(i==dirt_descriptors.length-1) document.writeln("<input type=\"number\" max=\"100\" min=\"0\" placeholder=\"100\" disabled title=\"When descriptor's membership value reaches zero\" /><button id=\"d3\" onclick=\"rem_descriptor('d',3)\"><b>-</b></button>");
                      else document.writeln("<input type=\"number\" max=\"100\" min=\"0\" value="+dirt_descriptors[i].end+" title=\"When descriptor's membership value reaches zero\" />");
                      document.writeln("</div>");
                    }
                  </script>
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
                  <script type="text/javascript">
                    for (var i = 0; i < wash_descriptors.length; i++) {
                      document.writeln("<div class=\"descr\" id=\"t_d_"+wash_descriptors[i].id+"\">");
                      if(i==0)
                      {
                          document.writeln('<input type="number" max="100" min="0" placeholder="inf" disabled />');
                      }
                      else{
                          document.writeln('<input type="number" max="100" min="0" value='+wash_descriptors[i].start+' title="When descriptor\'s membership value begins to rise" />');
                      }
                      document.writeln("<input class='line_input' type=\"text\" placeholder=\"Name of descriptor\" value='"+wash_descriptors[i].name+"' />");
                      console.log(wash_descriptors[i].name);
                      if(i>=wash_descriptors.length-2) {
                        var str_to_put = "<input type=\"number\" max=\"100\" min=\"0\" ";
                        if(i == wash_descriptors.length-1){
                          str_to_put += "placeholder=\"120\" disabled ";
                        }
                        else str_to_put += "value='75'";
                        str_to_put += "title=\"When descriptor's membership value reaches zero\" /><button id=\"t"+(i+1)+"\" onclick=\"rem_descriptor('t',"+(i+1)+")\"><b>-</b></button>";
                        document.writeln(str_to_put);
                      }
                      else document.writeln("<input type=\"number\" max=\"100\" min=\"0\" value="+wash_descriptors[i].end+" title=\"When descriptor's membership value reaches zero\" />");
                      document.writeln("</div>");
                    }
                  </script>
                </div>
                <br>
                <div id="t_add" class="add_btn_div" onclick="add_descriptor(3);">
                  <button>+</button>
                  <p>Add descriptor</p>
                </div>
                <p id="t_txt" style="float: right;margin: 10px;color:red;">Total: <span id="t_no">4</span></p>
              </div>
              <div style="clear: both;">
                <button id="save" class="btn-warning btn-md" onclick="save();" data-toggle="tooltip" title="You will see the effect of your changes below">View changes</button>
                <a data-toggle="tooltip" title="Go to step 2" class="btn-success btn-md" onclick="next();">Continue &rarr;</a>
              </div>
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
            <div id="matrix_div" style="display: none;width: 100%;">
              <h4>
                Fill the table below with desired output descriptor for each combination of input descriptors.
              </h4>
              <div id="table_data" style="margin: auto;"></div>
              <br>
              <h4>Congratulations! You have designed a virtual Washing Machine!</h4>
              <button class="btn-warning btn-md" data-toggle="tooltip" title="Change descriptors. You will lose your progress here." style="float: left;margin-right: 10px;" onclick="edit_descr()"> &larr; Edit descriptors</button>
              <button data-toggle="tooltip" title="Go step 3: The trial!" class="btn-success btn-md" onclick='proceed();'>Proceed</button>
            </div>
          <div id="trial_div" style="display:none;width: 100%">
            <h4>
              Provide a grease percent and dirt percent as input, and you can see how your virtual washing machine will get you the wash time.
            </h4>
            <div class="form-group row">
              <div class="material-input" data-toggle="tooltip" title="How much grease does your clothes have?">
                <input class="m_input" class="form-control" type="number" min=0 max=100 id="grease_trial" onchange="check_vals(this);" required/>
                <label class="m_label" for="grease_trial">Grease %</label>
              </div>
              <div class="material-input" data-toggle="tooltip" title="How much dirt does your clothes have?">
                <input class="m_input" class="form-control" type="number" min="0" max="100" id="dirt_trial" onchange="check_vals(this);" required>
                <label class="m_label" for="dirt_trial">Dirt %</label>
              </div><br />
            </div>
            <button class="btn-warning btn-md" onclick="back()" data-toggle="tooltip" title="You wont lose your numbers!" style="margin-right: 15px;">&larr; Edit Inference Table</button>
            <button data-toggle="tooltip" title="Let's start our Washing machine!" id="proceed" class="btn-success btn-md" onclick="fuzzify(document.getElementById('grease_trial').value,document.getElementById('dirt_trial').value)">Find Wash Time</button>
            <div id="greaseFuzzy" style="display: none;margin-bottom: 30px;margin-top: 20px;">
            </div>
            <div id="dirtFuzzy" style="display: none;margin-bottom: 30px;">
            </div>
            <div id="washFuzzy" style="display: none;margin-bottom: 30px;">
            </div>
            <h4 id="defuzzifier_graph_title" style="display: none;">Graph:</h4>
            <div id="defuzzifierOP_GraphDiv" class="jxgbox" style="width:600px; height:300px;display: none;margin-bottom: 30px;">
            </div>
            <p id="defuzz-description" style="margin: 20px 0;font-size: 17px;display: none;">We can calculate the defuzzified output using the centroid method. For that we'll need to calculate the areas and the centroids for all descriptors.</p>
            <div id="FIS_Carousel" class="carousel slide changingBlocks" data-ride="carousel"
            data-interval="false" style="width: 550px;display:none;">
              <ol id="indicator" class="carousel-indicators">
              </ol>
              <div  id='slides' class="carousel-inner" style="margin: 0 auto; width: 740px; border-radius: 2px; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22); background-color: #F1F7F8">
              </div>
              <a class="left carousel-control" href="#FIS_Carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" style="color: #006ed7"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#FIS_Carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" style="color: #006ed7"></span>
                <span class="sr-only">Next</span>
              </a>
                <!-- Wrapper for slides -->
                <!-- <div class="carousel-inner" style="margin: 0 auto; width: 740px; border-radius: 2px; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22); background-color: #F1F7F8">
                  <script type="text/javascript">
                    for (var i = 0; i < wash_descriptors.length; i++) {
                        var str='<div class="item';
                        if(i==0)
                          str+=' active';
                        str+='" style="padding: 50px;">';
                        str+='<div id="expln'+i+'_GraphDiv" class="jxgbox" style="width:570px; height:180px;"></div>';
                        str+='<div id="ExplnPart'+i+'"></div>';
                        str+='</div>';
                        document.writeln(str);
                    }
                  </script>
                </div> -->

                <!-- Left and right controls -->

            </div>
            <div id="Final_calculation" style="display:none;padding-top: 25px"></div>
            <div id="Final_result" style="display:none;padding-top: 15px"></div>
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
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
