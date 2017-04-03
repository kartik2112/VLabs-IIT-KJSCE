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
                    <svg width="900" height="600">
                        <line id="inputX-oplay_neuron1" class="StdLine" x1="50" y1="50" x2="250" y2="150" style=""/>
                        <line id="inputY-oplay_neuron1" class="StdLine" x1="50" y1="250" x2="250" y2="150" style=""/>
                        <line id="oplay_neuron1-oplay_thrshld" class="StdLine" x1="250" y1="150" x2="450" y2="150" style=""/>
                        <circle id="inputX" class="StdCircle" cx="50" cy="50" r="20" style="fill: #00b8ff"/>
                        <circle id="inputY" class="StdCircle"x cx="50" cy="250" r="20" style="fill: #00b8ff"/>
                        <circle id="oplay_neuron1" class="StdCircle" cx="250" cy="150" r="20" style="fill: #00b8ff"/>
                        <image id="oplay_thrshld" x="425" y="125"  height="50" width="50" xlink:href="../images/threshold.png" style="padding: 10px;fill: #00b8ff"/>
                        <text x="240" y="157" font-size="25">∑</text>
                        <text id="inputX-oplay_neuron1-weight" x="220" y="120">1</text>
                        <text id="inputX-oplay_neuron1-weight" x="220" y="185">1</text>
                    </svg>
                    <table class="truthTable">
                        <tr><th>X</th><th>Y</th><th>Expected O/P</th><th>O/P from NN</th></tr>
                        <tr><td>0</td><td>0</td><td>0</td><td></td></tr>
                        <tr><td>0</td><td>1</td><td>0</td><td></td></tr>
                        <tr><td>1</td><td>0</td><td>0</td><td></td></tr>
                        <tr><td>1</td><td>1</td><td>1</td><td></td></tr>
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


