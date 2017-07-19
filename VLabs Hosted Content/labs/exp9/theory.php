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
                        <h3>Defuzzification:</h3>
                        <p>
                        Defuzzification is the process of producing a quantifiable result in Crisp logic, given fuzzy sets and corresponding membership degrees. It is the process that maps a fuzzy set to a crisp set. It is typically needed in fuzzy control systems. These will have a number of rules that transform a number of variables into a fuzzy result, that is, the result is described in terms of membership in fuzzy sets. Defuzzification is the conversion of a fuzzy
                        quantity to a precise quantity, just as
                        fuzzification is the conversion of a precise
                        quantity to a fuzzy quantity. µ
                        <br />
                        <p>
                        For example, <b>Fig (a)</b> shows the first part of the Fuzzy output and <b>Fig (b)</b> shows the second part of the Fuzzy output.<br /><br />
                        <img src="images/1.png" height="250" width="400"><img src="images/2.png" height="250" width="400"><br /><br />
                        Then <b>Fig (c)</b>  shows the union of the two parts (a) and (b).<br /><br /><img src="images/3.png" height="250" width="400"><br /><br />
                        A fuzzy output process may involve many output parts, and the membership function representing each part of the output can have any shape. The membership function of the fuzzy output need not be normal always.</p>
                        <h3>Defuzzification Methods: </h3>
                        <p><b>1. Max-Membership Principle</b><br />
                        This method is also known as height method and is limited to peak output functions. This method is given by the algebraic expression <br /><b >µ</b>(z*) >= <b>µ</b>(z) for all z ∊ Z.<br /><br /><img src="images/DFM1.jpg" height="200" width="300"><br /><br />
                        <b>2. Centroid Method</b><br />
                        This method is also known as center of mass, center of area or center of gravity . It is the most commonly used defuzzification method. The defuzzified output z* is given by <br /><b >z* = ∫µ(z).zdz / ∫µ(z)dz</b><br /><br /><img src="images/DFM2.png" height="200" width="300"><br /><br />
                        <b>3. Weighted Average Method</b><br />
                        This method is valid for symmetrical output membership functions only. Each membership function is weighted by its maximum membership value. The output in the case is given by <br /><b >z* = ∑µ(z').z' / ∑µ(z') </b> ; where z' is the maximum value of the membership function.<br /><br /><img src="images/DFM3.png" height="200" width="300"><br /><br />
                        <b>4. Mean-Max Membership</b><br />
                        This method is also knows as middle of the maxima. This is closely related to the max-membership method, except that the locations of the maximum membership can be nonunique. The output here is given by <br /><b >z* = ∑z' / n </b> ; where z' is the maximum value of the membership function.<br /><br /><img src="images/DFM4.jpg" height="200" width="300"><br /><br />
                        <b>5. Center of Sums</b><br />
                        This method employs the algebraic sum of the individual fuzzy subsets instead of their union. The calculations here are very fast, but the main drawback is that the intersecting areas are added twice. The defuzzified value z* is given by<br /><b >z* = ∫ z*∑µ(z).zdz / ∫ ∑µ(z)dz </b><br /><br /><img src="images/DFM5.jpg" height="200" width="300"><br /><br />
                        <b>6. Center of Largest Area</b><br />
                        This method can be adopted whent the output of at least two convex fuzzy subsets which are not overlapping. The output in this case is baised towwards a side of one membership function. When output fuzzy st has at least two convex regions, then the center of gravity of the convex fuzzy subregion having the largest are is used to obtain the defuzzified value z*. The value is given by<br /><b >z* = ∫ µc(z).zdz / ∫ ∑µc(z)dz </b><br /><br /><img src="images/DFM6.jpg" height="200" width="300"><br /><br />
                        <h4>Let us take an example and see how the defuzzified value is calculated by all the above mentioned methods for better understanding.</h4>Let there be 3 different fuzzy sets as shown in the figures below:-<br><b>A</b><img src="images/Ex1.png" height="150px" width="300px" style="padding: 10px" /><b>B</b><img src="images/Ex2.png" height="150px" width="300px" style="padding: 10px"/><b>C</b><img src="images/Ex3.png" height="150px" width="300px" style="padding: 10px"/><br>Hence the union of all the three sets can be represented by the following figure:-<br><b>D = A</b> U <b>B</b> U <b>C</b><img src="images/Ex4.png" height="200px" width="400px" style="padding: 10px" align="center" /><br>Now we shall calculate the defuzzified value using all the methods one by one.<br><br><b>1. Max-Membership Method</b><br>From <b>D</b> we can say that the maximum membership value is <b>1</b>. Hence the scalar value corresponding to the maximum membership value. Therefore,<br><b>x* = 6 , 7</b><br><br><b>2. Centroid Method</b><br>In this method we have to find the area bounded by the union of the 3 sets and find its centroid which will be the defuzzified value.<br><img src="images/table.png" height="300px" width="600px" style="padding: 10px"><br><b>
                        x*=∑Area &times x&#772 &divide ∑Area<br>
                        x*=24.989 &divide 3.715<br>
                        x*=6.72</b>
                         <br><br><b>3. Weighted Average Method</b><br>In this case for each fuzzy set the center is calculated individually by multiplying the mean with its membership value and then average of all sets is calculated.<br>Membership value of <b>A</b> at 2.5 = <b>0.3</b><br>Membership value of <b>B</b> at 0.5 = <b>0.5</b><br>Membership value of <b>C</b> at 6.5 = <b>1</b><br><b>x* = (2.5 &times 0.3 + 0.5 &times 1 + 6.5 &times 1) &divide (0.3 + 0.5 + 1)</b><br>
                        <b>x* = 9.75 &divide 1.8</b><br>
                        <b>x* = 5.146</b><br><br><b>4. Mean-Max Membership</b><br>Here we consider the mean of the range with maximum membership value. Here the maximum membership value is <b>1</b> which is between <b>6 and 7</b>. Therefore,<br><b>x* = (6 + 7) &divide 2</b><br><b>x* = 13 &divide 2</b><br><b>6.5</b><br><br><b>5. Center of Sums</b><br>In this method we calulate the sum of the areas of individual fuzzy sets and then find the center of this area.<br><b>Area(A) = [(5 + 3) &times 0.3] &divide 2 = 1.2</b><br>
                        <b>Area(B) = [(4 + 2) &times 0.5] &divide 2 = 1.5</b><br>
                        <b>Area(C) = [(3 + 1) &times 1] &divide 2 = 2</b><br>
                        <b>x* = [(1.2 &times 2.5) + (1.5 &times 5) + (2 &times 6.5)] &divide (1.2 + 1.5 + 2)</b><br><b>x* = 5</b><br><br><b>6. Center of Largest Area</b><br>In this method, the defuzzified value is the mean value of the fuzzy set having the maximum or the largest area<br>From method 5 we can see that <b>C</b> has the largest area. Therefore,<b><br>x* = (6 + 7) &divide 2<br>x* = 6.5</b>
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

