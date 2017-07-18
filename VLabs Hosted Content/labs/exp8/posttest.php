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
        <style>
            .optradio1{
                padding:20px;
            }
        </style>
        
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
                        <h3>1.What is the core region in a graph ?</h3><br>
                         <img src="images/fuzzy2.jpg"><br><br>
                        <input type="radio" class="optradio1" name="q1" value="1">A. (a,d)<br>
                        <input type="radio" class="optradio1" name="q1" value="2">B. [b,c]<br>
                        <input type="radio" class="optradio1" name="q1" value="3">C. [a,b)<br>
                        <input type="radio" class="optradio1" name="q1" value="4">D. [c,d]<br>
                        <br />
                        <p id="optradio1Ans" class="testAns" style="display:none;"> Ans is B</p>
                        
                        <h3>2.Which of the following graphs yields the result of the operation A OR B.</h3>
                        <img src="images/ques21.PNG"><br><br>
                        <input type="radio" class="optradio2" name="q2" value="1"> A. <image src="images/que2a.PNG"></image><br><br>
                        <input type="radio" class="optradio2" name="q2" value="2"> B.  <image src="images/ques2b.PNG"></image><br><br>
                        <input type="radio" class="optradio2" name="q2" value="3"> C. <image src="images/ques2c.PNG"></image><br><br>
                        <input type="radio" class="optradio2" name="q2" value="4"> D. None Of the above<br><br>
                        <br />
                        <p id="optradio2Ans" class="testAns" style="display:none;"> Ans is A</p>
                    </p>
                        <h3>3.Considering a graphical representation of the `tallness' of people using its appropriate member function, which of the following combinations are true ?</h3>
                        <h4>i. TALL is usually the fuzzy subset.</h4>
                        <h4>ii. HEIGHT is usually the fuzzy set.</h4>
                        <h4>iii. PEOPLE is usually the universe of discourse.</h4><br>
                        <input type="radio" class="optradio3" name="q3" value="1"> A. i, ii & iii<br>
                        <input type="radio" class="optradio3" name="q3" value="2"> B. i & ii only <br>
                        <input type="radio" class="optradio3" name="q3" value="3"> C. i, iii only<br>
                        <input type="radio" class="optradio3" name="q3" value="4"> D. ii & iii.<br>      
                        <br />
                        <p id="optradio3Ans" class="testAns" style="display:none;"> Ans is B</p>
                            
                        <h3>4.If A={ 0 &divide x1, 0.4 &divide x2, 1 &divide x3, 0.5 &divide x4 } and B={ 1 &divide x1,0.5 &divide x2,1 &divide x3,0.6 &divide x4 } then &#956 <sub>AuB</sub> </h3>

                        <input type="radio" class="optradio4" name="q4" value="1"> A. &#956 <sub>AuB</sub>={ 0.6 &divide X1, 0.8 &divide X2, 1 &divide X3, 0.2 &divide X4 } <br><br>
                        <input type="radio" class="optradio4" name="q4" value="2"> B. &#956 <sub>AuB</sub>={ 0.9 &divide X1, 0.7 &divide X2, 0.1 &divide X3, 1 &divide X4 }  <br><br>
                        <input type="radio" class="optradio4" name="q4" value="3"> C. &#956 <sub>AuB</sub>={ 1 &divide X1, 0.5 &divide X2, 1 &divide X3, 0.6 &divide X4 } <br><br>
                        <input type="radio" class="optradio4" name="q4" value="4"> D. &#956 <sub>AuB</sub>={ 1 &divide X1, 0.9 &divide X2, 0.6 &divide X3, 0.1 &divide X4 } <br><br>
                        <br />
                        <p id="optradio4Ans" class="testAns" style="display:none;"> Ans is C</p>
                    </p>
                </section>
                <!-- /.content -->
        
        </div>
            <div>
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

