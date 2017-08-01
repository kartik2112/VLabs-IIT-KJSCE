	<?php
    session_start();
    $_SESSION["currPage"] = 3;
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
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link href="../../src/Styles.css" rel="stylesheet" />
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
                            <li class="active">Pre Test</li>
                        </ol>
                    </section>
                </nav>
            </header>
            <?php include 'pane.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center">
                        <?php echo $exp_name?>
                        <!-- Write your experiment name -->
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <h3 style="margin-top:5%">Pre Test</h3>
                    <p class="MsoNormal" style="text-align:justify">
                        <!-- Pre Test content goes here -->
                        <script>
                            $(document).ready(function () {
                                $(".optradio1").click(function () {
                                    ////alert("clicked");
                                    $("#optradio1Ans").slideDown();
                                    $('html, body').animate({
                                        scrollTop: $("#optradio1Ans").offset().top-300
                                    }, 1000);
                                    $('.optradio1').attr('disabled','disabled');
                                });
                                $(".optradio2").click(function () {
                                    //alert("clicked");
                                    $("#optradio2Ans").slideDown();
                                    $('html, body').animate({
                                        scrollTop: $("#optradio2Ans").offset().top-300
                                    }, 1000);
                                    $('.optradio2').attr('disabled','disabled');
                                });
                                $(".optradio3").click(function () {
                                    //alert("clicked");
                                    $("#optradio3Ans").slideDown();
                                    $('html, body').animate({
                                        scrollTop: $("#optradio3Ans").offset().top-300
                                    }, 1000);
                                    $('.optradio3').attr('disabled','disabled');
                                });

                            });

            </script>
              
            
              <br>
              <h3>1. If the value of 1/(2*σ<sup>2</sup>) increases in activation function then the size of graph  ?</h3>
              <input class="optradio1" type="radio" name="q1" value="1">
              A. Decreases
              <br>
              <input class="optradio1" type="radio" name="q1" value="2">
              B. Increases
              <br>
              <input class="optradio1" type="radio" name="q1" value="3">
              C. Remains Constant
              <br>
              <input class="optradio1" type="radio" name="q1" value="4">
              D. None of these
              <br>
              <p id="optradio1Ans" class="testAns" style="display:none;"> Ans is A</p>
              <br>
              <h3>2. How many hidden layers are there in RBFN?</h3>
              <input class="optradio2" type="radio" name="q2" value="1">
              A. 0
              <br>
              <input class="optradio2" type="radio" name="q2" value="2">
              B. 1
              <br>
              <input class="optradio2" type="radio" name="q2" value="3">
              C. 2
              <br>
              <input class="optradio2" type="radio" name="q2" value="4">
              D. 3
              <br>
              <p id="optradio2Ans" class="testAns" style="display:none;"> Ans is B</p><br>
            
			<br>
            <h3>3. RBF neuron activation function is given by ?</h3>
              <input class="optradio3" type="radio" name="q3" value="1">
                    A. &#934(x)=e<sup>(-&#946 &times ||x- &#956||<sup>2</sup>)</sup>
              <br>
              <input class="optradio3" type="radio" name="q3" value="2">
                    B. &#934(x)=e<sup>(-&#946 &divide ||x- &#956||<sup>2</sup>)</sup>
              <br>
              <input class="optradio3" type="radio" name="q3" value="3">
                    C. &#934(x)=e<sup>(-(&#946 &times ||x- &#956||)<sup>2</sup>)</sup>
              <br>
              <input class="optradio3" type="radio" name="q3" value="4">
                    D. &#934(x)=e<sup>(-&#946^2 &times ||x- &#956||<sup>2</sup>)</sup>
              <br>
              <p id="optradio3Ans" class="testAns" style="display:none;"> Ans is A</p><br>
                          
              <h3 id="a1"></h3>
              <h3 id="a2"></h3>
            <h3 id="a3"></h3>
                    </p>
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

