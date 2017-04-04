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

        <script type="text/javascript">
          
          function init() {
            
            /* This function asks the user to enter the weights first*/



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
          <button id="startSimButton">Start simulation</button>
          <h3 style="margin-top:5%">Simulation</h3>
           
            <!--Simulation content goes here -->

            <svg height="300" width="700">

            <!-- The weights connecting input and hidden layer -->

              <line x1="70" y1="50" x2="270" y2="50" stroke="#ff6a00" stroke-width="5" style="z-index: 1"/>
              <line x1="70" y1="50" x2="270" y2="250" stroke="#ff6a00" stroke-width="5" style="z-index: 1"/>

              <line x1="70" y1="250" x2="270" y2="50" stroke="#ff6a00" stroke-width="5" style="z-index: 1"/>
              <line x1="70" y1="250" x2="270" y2="250" stroke="#ff6a00" stroke-width="5" style="z-index: 1"/>

            <!-- Ouput neuron and its weights -->

              <line x1="270" y1="50" x2="470" y2="150" stroke="#ff6a00" stroke-width="5" />
              <line x1="270" y1="250" x2="470" y2="150" stroke="#ff6a00" stroke-width="5" />

              <circle cx="470" cy="150" r="20" fill="#00b8ff" style="z-index: 10"/>

            <!-- The input layer -->

              <circle cx="70" cy="50" r="20" fill="#00b8ff" style="z-index: 10"/>
              <circle cx="70" cy="250" r="20" fill="#00b8ff" style="z-index: 10"/>

            <!-- The hidden layer -->

              <circle cx="270" cy="50" r="20" fill="#222d32" style="z-index: 10"/>
              <circle cx="270" cy="250" r="20" fill="#222d32" style="z-index: 10"/>

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