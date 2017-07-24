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
        


        <!--Here is the main script that handles the simulation-->
         
        <script type="text/javascript" src="../../src/exp8Simulation.js"></script>
        <!--Here is the main CSS file that adds more touch to the simulation and other stuff-->    
        <link href="../../src/Styles.css" rel="stylesheet" />
        <style>
        .animatedLinePurple2{
    stroke: #7100d5!important;
    stroke-dasharray: 50;
    animation: dash 2s linear infinite;
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
                <section class="content" >
                    <h3 style="margin-top:5%" id="sim">Simulation</h3>
                    <!--Simulation content goes here -->
                    <div id="top_div" >
                    
                            <div id="top_right_div" style="float:left ;margin-left:102px">
        <table class="table table-striped" style="text-align:center" >
    <thead >
      <tr>
        <th>Parameter</th>
        <th>Start</th>
        <th>End</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Cool</td>
        <td width="200"><div id="cool_start_slider" class="sliders"></div>
        <span class="cool_start_value">30</span>        
        </td>
        <td width="200"><div id="cool_end_slider" class="sliders"></div>
        <span class="cool_end_value">70</span></td>
      </tr>
      <tr>
        <td>Warm</td>
        <td><div id="warm_start_slider" class="sliders"></div>
        <span class="warm_start_value">50</span></td>
        <td><div id="warm_end_slider" class="sliders"></div>
        <span class="warm_end_value">90</span></td>
      </tr>
      <tr>
        <td>Hot</td>
        <td><div id="hot_start_slider" class="sliders"></div>
        <span class="hot_start_value">80</span></td>
        <td><div id="hot_end_slider" class="sliders"></div>
        <span class="hot_end_value">120</span></td>
      </tr>
      <tr>
        <td>Scalar Input</td>
        <td><div id="scallar_slider" class="sliders"></div>
        <span class="scallar_value">55</span></td>
        <td> <button  id="main_button" type="button" class="btn btn-primary" onclick="startSimulation1()">Start Simulation</button></td>
      </tr>
    </tbody>
  </table>
                            </div>
                    </div>
                    <br>
                    <div >
                    <div id="div_for_svg" style="float:left;width:45%">
                    <svg id="graph_svg" width="700" height="400" style="">
                        <line id="x_axis" class="axis" stroke="#000" stroke-width="2" 
                        x1="20" y1="300" x2="600" y2="300" style=""/>
                        <line id="y_axis" class="axis" stroke="#000" stroke-width="2"
                        x1="20" y1="300" x2="20" y2="0" style=""/>
                        <text font-size="20" x="20" y="320">0</text>
                        <text font-size="20" x="540" y="330">Temperature</text>
                        <text font-size="20" x="40" y="20">Degree Of Truth</text>
                        
                        <text font-size="15" x="60" y="305"> | </text>
                        <text font-size="15" x="100" y="305">|</text>
                        <text font-size="15" x="140" y="305">|</text>
                        <text font-size="15" x="180" y="305">|</text>
                        <text font-size="15" x="220" y="305">|</text>
                        <text font-size="15" x="260" y="305">|</text>
                        <text font-size="15" x="300" y="305">|</text>
                        <text font-size="15" x="340" y="305">|</text>
                        <text font-size="15" x="380" y="305">|</text>
                        <text font-size="15" x="420" y="305">|</text>
                        <text font-size="15" x="460" y="305">|</text>
                        <text font-size="15" x="500" y="305">|</text>
                        
                        <text font-size="17" x="5" y="100">1</text>
                        <text font-size="30" x="15" y="110">-</text>
                        
                        <text font-size="17" x="60" y="330">10</text>
                        <text font-size="17" x="100" y="330">20</text>
                        <text font-size="17" x="140" y="330">30</text>
                        <text font-size="17" x="180" y="330">40</text>
                        <text font-size="17" x="220" y="330">50</text>
                        <text font-size="17" x="260" y="330">60</text>
                        <text font-size="17" x="300" y="330">70</text>
                        <text font-size="17" x="340" y="330">80</text>
                        <text font-size="17" x="380" y="330">90</text>
                        <text font-size="17" x="420" y="330">100</text>
                        <text font-size="17" x="460" y="330">110</text>
                        <text font-size="17" x="500" y="330">120</text>
                        
                        <line id="cool_line1" class="line" stroke="#f00" stroke-width="2" 
                        x1="140" y1="300" x2="220" y2="100" style=""/>
                        <line id="cool_line2" class="line" stroke="#f00" stroke-width="2" 
                        x1="220" y1="100" x2="300" y2="300" style=""/>
                        
                        <line id="warm_line1" class="line" stroke="#0f0" stroke-width="2" 
                        x1="220" y1="300" x2="300" y2="100" style=""/>
                        <line id="warm_line2" class="line" stroke="#0f0" stroke-width="2" 
                        x1="300" y1="100" x2="380" y2="300" style=""/>
                        
                        <line id="hot_line1" class="line" stroke="#00f" stroke-width="2" 
                        x1="340" y1="300" x2="420" y2="100" style=""/>
                        <line id="hot_line2" class="line" stroke="#00f" stroke-width="2" 
                        x1="420" y1="100" x2="500" y2="300" style=""/>
                        
                        <line id="interscection_line" class="line" stroke="#00f" stroke-width="2" style=""/>
                        <circle id="circle1" cx="100" cy="100" r="0"/>
                        <circle id="circle2" cx="100" cy="100" r="0"/>
                        <circle id="circle3" cx="100" cy="100" r="0"/>
                    </svg>
                    </div>
                    <div style="clear:both; font-size:1px;"></div>
                    </div>
                    <div id="calc" class="" style="font-size: 16px">
                    </div>
                    <div id="div_for_result" class="" style="font-size: 16px">
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

