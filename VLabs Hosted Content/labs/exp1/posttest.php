<?php
    session_start();
    $_SESSION["currPage"] = 7;
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
        
        
        <!-- jQuery 2.2.3 -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link href="../../src/Styles.css" rel="stylesheet" />
        
        <script>
            $(document).ready(function(){
                $(".optradio1").click(function(){
                    ////alert("clicked");
                    $("#optradio1Ans").slideDown();
                    $('html, body').animate({
                        scrollTop: $("#optradio1Ans").offset().top-300
                    }, 1000);
                    $('.optradio1').attr('disabled','disabled');
                });
                $(".optradio2").click(function(){
                    //alert("clicked");
                    $("#optradio2Ans").slideDown();
                    $('html, body').animate({
                        scrollTop: $("#optradio2Ans").offset().top-300
                    }, 1000);
                    $('.optradio2').attr('disabled','disabled');
                });
                $(".optradio3").click(function(){
                    //alert("clicked");
                    $("#optradio3Ans").slideDown();
                    $('html, body').animate({
                        scrollTop: $("#optradio3Ans").offset().top-300
                    }, 1000);
                    $('.optradio3').attr('disabled','disabled');
                });
                $(".optradio4").click(function(){
                    //alert("clicked");
                    $("#optradio4Ans").slideDown();
                    $('html, body').animate({
                        scrollTop: $("#optradio4Ans").offset().top-300
                    }, 1000);
                    $('.optradio4').attr('disabled','disabled');
                });
            });
        </script>
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
                            <li class="active">Post Test</li>
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
                    <h3 style="margin-top:5%">Post Test</h3>
                    <p class="MsoNormal" style="text-align:justify">
                        <!-- Post Test content goes here -->
                        <div>
                            <h3>1. Which of the following can be the correct combination of weights & threshold for the neural network to function as an OR Gate?</h3>
                            <div class="radio">
                                <label><input name="Q1" type="radio" class="optradio1" value="Q11">A<table class="table-condensed truthTable" style="text-align: center;">
                                            <tr><th>W1</th><th>W2</th><th>Threshold</th></tr>
                                            <tr><td>0</td><td>0</td><td >0</td></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input name="Q1" type="radio" class="optradio1" value="Q12">B<table class="table-condensed truthTable" style="text-align: center;">
                                            <tr><th>W1</th><th>W2</th><th>Threshold</th></tr>
                                            <tr><td>0</td><td>0</td><td style="text-align: center;">1</td></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input name="Q1" type="radio" class="optradio1" value="Q13">C<table class="table-condensed truthTable" style="text-align: center;">
                                            <tr><th>W1</th><th>W2</th><th>Threshold</th></tr>
                                            <tr><td>1</td><td>0</td><td style="text-align: center;">0</td></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input name="Q1" type="radio" class="optradio1" value="Q14">D<table class="table-condensed truthTable" style="text-align: center;">
                                            <tr><th>W1</th><th>W2</th><th>Threshold</th></tr>
                                            <tr><td>1</td><td>1</td><td style="text-align: center;">0.5</td></tr>
                                            </table></label>
                            </div><br />
                            <p id="optradio1Ans" class="testAns" style="display:none;"> Ans is D</p>
                        </div>
                    
                        <div>
                            <h3>2. The experiment performed can be considered as an example of which of the following type of learning?</h3>
                            <div class="radio">
                                <label><input type="radio" name="Q2" class="optradio2" id="Q12"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>A. Supervised Learning</th></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Q2" class="optradio2" id="Q22"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>B. Unsupervised Learning</th></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Q2" class="optradio2" id="Q23"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>C. Reinforcement Learning</th></tr>
                                            </table></label>
                            </div><br />
                            <p id="optradio2Ans" class="testAns" style="display:none;"> Ans is A</p>
                        </div>

                        <div>
                            <h3>3.Given the weights W1 = 0.4 & W2 = 0.3, what should be the threshold value for the neural network to function as AND Gate?</h3>
                            <div class="radio">
                                <label><input type="radio" name="Q3" class="optradio3" id="Q31"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>A. Greater than 0 but less than 0.3</th></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Q3" class="optradio3" id="Q32"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>B. Greater than 0.3 but less than 0.4</th></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Q3" class="optradio3" id="Q33"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>C. Greater than 0.4 but less than 1</th></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Q3" class="optradio3" id="Q34"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>D. Greater than 1</th></tr>
                                            </table></label>
                            </div><br />
                            <p id="optradio3Ans" class="testAns" style="display:none;"> Ans is C</p>
                        </div>
                            
                        <div>
                            <h3>4. Which of the following Gates cannot be implemented using single layer perceptron model?</h3>
                            <div class="radio">
                                <label><input type="radio" name="Q4" class="optradio4" id="Q41"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>A. AND</th></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Q4" class="optradio4" id="Q42"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>B. OR</th></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Q4" class="optradio4" id="Q43"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>C. NOT</th></tr>
                                            </table></label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Q4" class="optradio4" id="Q44"><table class="table-condensed" style="text-align: center;">
                                            <tr><th>D. XOR</th></tr>
                                            </table></label>
                            </div><br />
                            <p id="optradio4Ans" class="testAns" style="display:none;"> Ans is D</p>
                        </div>

                        <br><br>
                        <b>Hints :-</b><br><br>
                        1. And Gate :- Try using 1.5 as threshold and 1 as weights<br>
                        2. Or Gate :- Try using 0.5 as threshold and 1 as weights<br>
                        3. Not Gate :- Try using -0.5 as threshold and -1 as weight
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

