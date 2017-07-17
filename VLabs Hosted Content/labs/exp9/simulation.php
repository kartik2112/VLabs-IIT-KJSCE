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
        <!--Here is the main CSS file that adds more touch to the simulation and other stuff-->    
        <link href="../../src/Styles.css" rel="stylesheet" />
        <!-- jQuery 2.2.3 -->
        <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../plugins/jQueryUI/jquery-ui.min.js"></script>
		
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Bootstrap 3.3.6 -->
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <!-- Simulation scripts start-->
        <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
        <script type="text/javascript" src="../../plugins/jsxgraphcore.min.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jsxgraph/0.99.5/jsxgraphcore.js"></script>
        <script src="../../src/exp9Simulation.js"></script>
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
                    <a href="" style="color:green; font-size: 16px"><img src="../../dist/img/fork.png" style="height:20px; width:20px; "></a>
                </section>
                <!-- Main content -->
                <section class="content">
                    <h3 style="margin-top:5%" id="sim">Simulation</h3>
                    <!--Simulation content goes here -->
					
					<div id="top_div" style="margin-top:-30px">
					<div id="top_left_div" style="float:left; font-size:20px;margin-left:50px;"><br><br>
					 <div id="gpraphAndResult1">
		
        <div id="graph1Div" class="jxgbox" style="width:600px; height:300px;"></div>
		<div id="result1">
		</div>
	  </div>
					
                        </div>
							<div id="top_right_div" style="float:left ;margin-left:100px;"><br><br>
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
        <td><div id="warm_end_slider"class="slider"></div>
		<span class="warm_end_value">90</span></td>
      </tr>
      <tr>
        <td>Hot</td>
        <td><div id="hot_start_slider" class="sliders"></div>
		<span class="hot_start_value">80</span></td>
        <td>
		<span class="hot_end_value">100</span></td>
      </tr>
	  <tr>
        <td></td>
        <td> <button  id="main_button" type="button" class="btn btn-primary" onclick="startSimulation1()" style="margin-top: 10px">Start Simulation</button></td>
		<td></td>
      </tr>
    </tbody>
  </table><br>
							</div>
					</div>
		<div>
		<div style="clear:both;" id="methods">
		<br><br>
  <ul class="nav nav-pills" style="font-size:120%;">
    <li class="active"><a data-toggle="pill" href="#method1">Method 1</a></li>
    <li><a data-toggle="pill" href="#method2">Method 2</a></li>
    <li><a data-toggle="pill" href="#method3">Method 3</a></li>
    <li><a data-toggle="pill" href="#method4">Method 4</a></li>
    <li><a data-toggle="pill" href="#method5">Method 5</a></li>
    <li><a data-toggle="pill" href="#method6">Method 6</a></li>
  </ul>
  </div>
  <br>
  <div class="tab-content" style="font-size:120%;">
    <div id="method1" class="tab-pane fade in active">
      <h3> Max-Membership Method</h3>
      <p>This method is also known as height method and is limited to peak output functions. This method is given by the algebraic expression <br>
	  µ(z*) >= µ(z) for all z ∊ Z.</p>
	  <p id="m1answer" style="font-size:100%"> </p>
      <div id="m1final" class="">
	   </div>
    </div>
    <div id="method2" class="tab-pane fade">
      <h3>Centroid Method</h3>
      <p>This method is also known as center of mass, center of area or center of gravity . It is the most commonly used defuzzification method. Basically it is the centroid of the area under the graph plotted by the intersection of all the sets. The defuzzified output z* is given by <br>
		z* = ∫µ(z).zdz / ∫µ(z)dz</p><br>
		<p id="m2answer" style="font-size:100%"> </p>
        <div id="m2final" class="">
       </div>
    </div>
    <div id="method3" class="tab-pane fade">
      <h3>Weighted Average Method</h3>
      <p>This method is valid for symmetrical output membership functions only. Each membership function is weighted by its maximum membership value. The output in the case is given by <br>
z* = ∑µ(z').z' / ∑µ(z') ; <br> where z' is the maximum value of the membership function.</p>
<p> As the membership function for hot is not symmetrical we are ignoring it in this method.</p>
	<p id="m3answer" style="font-size:100%"> </p>
    <div id="m3final" class="">
       </div>
    </div>
    <div id="method4" class="tab-pane fade">
      <h3>Mean-Max Membership</h3>
      <p>This method is also knows as middle of the maxima. This is closely related to the max-membership method, except that the locations of the maximum membership can be nonunique. The output here is given by <br>
z* = ∑z' / n ; <br> where z' is the maximum value of the membership function</p><br>
<p id="m4answer" style="font-size:100%"> </p>
<div id="m4final" class="">
       </div>
    </div>
	<div id="method5" class="tab-pane fade">
      <h3>Center of Sums</h3>
      <p>This method employs the algebraic sum of the individual fuzzy subsets instead of their union. The calculations here are very fast, but the main drawback is that the intersecting areas are added twice. The defuzzified value z* is given by <br> z* = ∫ z*∑µ(z).zdz / ∫ ∑µ(z)dz</p><br>
	  <p id="m5answer" style="font-size:100%"> </p>
      <div id="m5final" class="">
       </div>
    </div>
	<div id="method6" class="tab-pane fade">
      <h3>Center of Largest Area</h3>
      <p>This method can be adopted whent the output of at least two convex fuzzy subsets which are not overlapping. The output in this case is baised towwards a side of one membership function. When output fuzzy st has at least two convex regions, then the center of gravity of the convex fuzzy subregion having the largest are is used to obtain the defuzzified value z*. The value is given by<br>
z* = ∫ µc(z).zdz / ∫ ∑µc(z)dz </p><br>
	<p id="m6answer" style="font-size:100%"> </p>
    <div id="m6final" class="">
       </div>
    </div>
  </div>
                    
                </section>                
                <!-- /.content -->
				</div>
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