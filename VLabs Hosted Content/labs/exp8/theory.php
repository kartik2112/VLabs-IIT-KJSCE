<?php
    session_start();
    $_SESSION["currPage"] = 2;
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
                            <li class="active">Theory</li>
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
                    <h3 style="margin-top:5%">Theory</h3>
                    <p class="MsoNormal" style="text-align:justify">
                        <!--Theory content goes here -->
                        <h3>Introduction to Fuzzy Logic:</h3>
                        <p>
                        Fuzzy Logic is a form of multi-valued logic to deal with reasoning that is approximate rather than precise. This is in contradiction with <strong>crisp logic</strong> that deals with precise values. Also, binary sets have binary or Boolean logic (either 0 or 1), which finds solution to a particular set of problems. Fuzzy logic variables may have a truth value that ranges between 0 and 1 and is not constrained to the two truth values of classic propositional logic.
                        <br />
                        Also, as linguistic variables are used in fuzzy logic, these degrees have to managed by specific functions.</p>
                        <br /><p>
                        Fuzzy logic is a mathematical tool for dealing with uncertainty. It provides a technique to handle imprecision and information granularity. The fuzzy theory provides a mechanism for representing linguistic constructs such as <strong>high</strong>, <strong>low</strong>, <strong>tall</strong>, <strong>short</strong>, <strong>many</strong>. All these terms are called as <strong>linguistic variables</strong> which represent the uncertainty in the system. In general, fuzzy logic provides an inference structure that enables appropriate human reasoning capabilities. On the contrary, the traditional binary set theory describes crisp events, that is, events that either do or do not occur. It uses probability theory to explain if event will occur, measuring the chance with which a given event is expected to occur. The theory of fuzzy logic is based upon the notion of relative graded membership and so are the functions of cognitive processes. The utility of fuzzy sets lies in their ability to model uncertain or ambiguous data and to provide suitable decisions as in <strong>Fig1.</strong></p>
                        <br />
                        <img src="images/Fuzzy_Logic_System.png" height="130" width="400" />
                        <br /><br />
                        <strong>Fig1: </strong>A fuzzy logic system accepting imprecise data and providing a decision.
                        <br /><br />
                        <h3>Fuzzy Set: </h3>
                        <p><b>Fuzzy Sets</b> are sets whose elements have degrees of membership. For example, a <b>classic set</b> can be written as { 1, 2, 3, 4 } whereas a ,<b>Fuzzy Set</b> can be written as { (1,0.4), (2,0.7), (3,0.1), (4,0.2)} where in every pair <b>(X,Y), X represents the value of the element whereas Y represents the degree of membership of the element in the set.</b>
                        <h3>Fuzzification:</h3>
                        <p><strong>Fuzzification </strong>is the process of changing a real scalar value into a fuzzy value. This is done by the help of fuzzifiers (membership functions).<br />
                        A <strong>membership function (MF)</strong> is a curve that defines how each point in the input space is mapped to a membership value (or degree of membership) between 0 and 1.</p>
                        <p>Let us consider an example of temperature ranges to understand the concept of fuzzy sets even better:-
                        <br />
                        Fuzzy Linguistic Variables are used to represent qualities spanning a particular spectrum
                        <br />
                        Question: What is the temperature?
                        <br />
                        Answer: It is warm.
                        <br />
                        Question: How warm is it?
                        <br /><br />
                        <strong>Temp: {Freezing, Cool, Warm, Hot}</strong><br />
                        <br />
                        <img src="images/Temperature_Main.png" height="200" width="400" />
                        <br />These values (30, 50, 70, 90) can be changed<br />
                        How cool is 36°F?<br />
                        It is 30% Cold & 70% Freezing
                        <br /><br />
                        <img src="images/Temperature_Ex.png" height="200" width="400" />
                        <br /><br />
                        Thus we can say that the value 36°F has a membership value of 0.3 in the Cold set and 0.7 in the Freezing set.
                        <h4>Membership Functions:
                        </h4>
                        The only condition a membership function must really satisfy is that it must vary between 0 and 1. The function itself can be an arbitrary curve whose shape we can define as a function that suits us from the point of view of simplicity, convenience, speed, and efficiency.

                        A classical set might be expressed as<br /><br />

                        A = {x | x > 6} <br /><br />

                        A fuzzy set is an extension of a classical set. If X is the sample space and its elements are denoted by x, then a fuzzy set A in X is defined as a set of ordered pairs. <br /><br />

                        A = {x, µA(x) | x ∊ X}<br /><br />

                        µA(x) is called the membership function (or MF) of x in A. The membership function maps each element of X to a membership value between 0 and 1.<br /><br />
                        <strong>Following are the different types of membership functions:-</strong>
                        <br />The simplest membership functions are formed using straight lines. Of these, the simplest is the triangular membership function, and it has the function name <strong>trimf</strong>. It's nothing more than a collection of three points forming a triangle. The trapezoidal membership function, <strong>trapmf</strong>, has a flat top and really is just a truncated triangle curve. These straight line membership functions have the advantage of simplicity.<br /> 
                        <img src="images/MF1.png" height="200" width="650" /><br />
                        Two membership functions are built on the Gaussian distribution curve: a simple Gaussian curve and a two-sided composite of two different Gaussian curves. The two functions are <strong>gaussmf</strong> and <strong>gauss2mf</strong>.
                        The generalized bell membership function is specified by three parameters and has the function name gbellmf. The bell membership function has one more parameter than the Gaussian membership function, so it can approach a non-fuzzy set if the free parameter is tuned. Because of their smoothness and concise notation, Gaussian and bell membership functions <strong>gbellmf</strong> are popular methods for specifying fuzzy sets. Both of these curves have the advantage of being smooth and nonzero at all points.<br /> 
                        <img src="images/MF2.png" height="200" width="750" /><br />
                        Although the Gaussian membership functions and bell membership functions achieve smoothness, they are unable to specify asymmetric membership functions, which are important in certain applications. Next we define the sigmoidal membership function <strong>sigmf</strong>, which is either open left or right. Asymmetric and closed (i.e. not open to the left or right) membership functions can be synthesized using two sigmoidal functions, so in addition to the basic sigmf, we also have the difference between two sigmoidal functions, <strong>dsigmf</strong>, and the product of two sigmoidal functions <strong>psigmf</strong>.<br /> 
                        <img src="images/MF3.png" height="200" width="750" /><br />
                        Polynomial based curves account for several of the membership functions in the toolbox. Three related membership functions are the Z, S, and Pi curves, all named because of their shape. The function <strong>zmf</strong> is the asymmetrical polynomial curve open to the left, <strong>smf</strong> is the mirror-image function that opens to the right, and <strong>pimf</strong> is zero on both extremes with a rise in the middle.<br /> 
                        <img src="images/MF4.png" height="200" width="750" /><br /><br />
                        <strong>A suitable membership function can be chosen based on the application and the requirement of the fuzzy system.</strong></p>

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
