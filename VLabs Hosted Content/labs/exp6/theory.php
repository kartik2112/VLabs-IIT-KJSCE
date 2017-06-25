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
                        <p>The correlation learning rule is based on a similar principle as the Hebbian learning rule.
                        <br>
                        <br> 
                         <p>   It assumes that weights between simultaneously responding neurons should be largely positive, and weights between
                               neurons with opposite reaction should be largely negative.
                        </p>
                        <p>Contrary to the Hebbian rule, the correlation rule is the supervised learning. Instead of actual response, <b>oj</b>
,                          the desired response, <b>dj</b>, is used for the weight-change calculation.
                        <br>
                        <br>
                        According to <b>Correlation</b> Rule,
                        </p>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>∆w<sub>ij</sub>= cd<sub>j</sub>x<sub>i</sub></b>
                        <br>
                        <br>
                        where <b>dj</b> is the desired value of output signal. This training algorithm usually starts with initialization
                        of weights to zero.
                        <br>
                        <br>
                        <p>
                        This simple rule states that if <b>d<sub>i</sub></b> is the desired response due to <b>x<sub>j</sub></b>, the correspondseing weight increase is proportional to their product. The rule typically applies to recording data in memory networks with binary response neurons. It can be interpreted as a special case of the Hebbian rule with a binary  activation function and for <b>o<sub>i</sub> = d<sub>i</sub>.</b>
                        <br>
                        <br>
                        However, Hebbian learning is performed in an unsupervised environment, while correlation learning is supervised. 
                        <br>
                        While keeping this basic difference in mind, we can observe that Hebbian rule weight adjustment and correlation rule weight adjustment become identical. 
                        <br>
                        Similar to Hebbian learning rule, this learning rule also requires the weight initialization <b>w = 0</b>.
                         <p><b>Consider an example given below :</b>
                        <br>
                           <p>There are two input neurons and their values are denoted by X<sub>1</sub> and X<sub>2</sub> respectively.
                
                             
                           </p>
                           Also consider a bias fixed input as 1.
                           <br>
                           Let X1= -2, X2= 3. Thus the input vector X= [-2 3 1].
                           <br>
                            Here the activation function used is signum:
                           <br>
                           <br>
                           f(x) = 1 ( for x>=0)
                           <br>
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      =-1 (x<0)
                           </p>
                        <br>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                      <svg id="percLR_svg" width="700" height="400" style="margin-left: 200px">
                                        <!--Neural Network connections-->
                                        <line id="percLR_line11" class="not_sel percLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(11,'percLR')" x1="50" y1="50" x2="350" y2="50" style=""/>
                                        <line id="percLR_line12" class="not_sel percLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(12,'percLR')" x1="50" y1="200" x2="350" y2="50" style=""/>
                                        <line id="percLR_line13" class="not_sel percLRNeur_1_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(13,'percLR')" x1="50" y1="350" x2="350" y2="50" style=""/>

                                        <line id="percLR_line21" class="not_sel percLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(21,'percLR')" x1="50" y1="50" x2="350" y2="200" style=""/>
                                        <line id="percLR_line22" class="not_sel percLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(22,'percLR')" x1="50" y1="200" x2="350" y2="200" style=""/>
                                        <line id="percLR_line23" class="not_sel percLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(23,'percLR')" x1="50" y1="350" x2="350" y2="200" style=""/>

                                        <line id="percLR_line31" class="not_sel percLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(31,'percLR') "x1="50" y1="50" x2="350" y2="350" style=""/>
                                        <line id="percLR_line32" class="not_sel percLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(32,'percLR')" x1="50" y1="200" x2="350" y2="350" style=""/>
                                        <line id="percLR_line33" class="not_sel percLRNeur_3_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(33,'percLR')" x1="50" y1="350" x2="350" y2="350" style=""/>

                                        <!-- @@@@@-->
                                        <line class="StdLine percLRNeur_1_lines" x1="350" y1="50" x2="610" y2="50" style=""/>
                                        <line class="StdLine percLRNeur_2_lines" x1="350" y1="200" x2="610" y2="200" style=""/>
                                        <line class="StdLine percLRNeur_3_lines" x1="350" y1="350" x2="610" y2="350" style=""/>
                                        <!-- @@@@@-->
                                         
                                        <line id="corrLR_line21" class="not_sel corrLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(21,'corrLR')" x1="350" y1="50" x2="610" y2="50" style=""/>
                                        <line id="corrLR_line21" class="not_sel corrLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(21,'corrLR')" x1="350" y1="200" x2="610" y2="200" style=""/>
                                        <line id="corrLR_line21" class="not_sel corrLRNeur_2_lines lines" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(21,'corrLR')" x1="350" y1="350" x2="610" y2="350" style=""/>

                                        <!--Neural Network nodes-->
                                        <circle class="StdCircle" cx="50" cy="50" r="20"/>
                                        <circle class="StdCircle" cx="50" cy="200" r="20"/>
                                        <circle class="StdCircle" cx="50" cy="350" r="20"/>
                                        <!-- @@@@@ -->

                                        <circle class="StdCircle" cx="350" cy="50" r="20"/>
                                        <circle class="StdCircle" cx="350" cy="200" r="20"/>
                                        <circle class="StdCircle" cx="350" cy="350" r="20"/>

                                        <!-- @@@@@  -->
                                        <image x="610" y="25"  height="50" width="50" xlink:href="../images/bipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                        <image x="610" y="175"  height="50" width="50" xlink:href="../images/bipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>
                                        <image x="610" y="325"  height="50" width="50" xlink:href="../images/bipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>




                                        <!--Input texts-->
                                        <text font-size="20" x="5" y="55">X1</text>
                                        <text class="changingTextStyle percLRX_inputX1" font-size="20" x="45" y="57" style="stroke: #ff0000;stroke-width: 1px;"></text>
                                        <text font-size="20" x="5" y="210">X2</text>
                                        <text class="changingTextStyle percLRX_inputX2" font-size="20" x="45" y="207" style="stroke: #ff0000;stroke-width: 1px;"></text>
                                        <text font-size="20" x="10" y="360">X3</text>
                                        <!--<text class="changingTextStyle percLRX_inputX3" font-size="20" x="45" y="355">0</text>-->


                                        <text font-size="20" x="342" y="55">∑</text>
                                        <text font-size="20" x="342" y="205">∑</text>
                                        <text font-size="20" x="342" y="355">∑</text>

                                        <!--Weights text-->
                                        <text font-size="20"  x="225" y="30" >w<tspan baseline-shift="sub">11</tspan><tspan class="w11text"></tspan></text>
                                        <text font-size="20"  x="235" y="75" >w<tspan baseline-shift="sub">12</tspan><tspan class="w12text"></tspan></text>
                                        <text font-size="20"  x="303" y="110">w<tspan baseline-shift="sub">13</tspan><tspan class="w13text"></tspan></text>
                                        <text font-size="20"  x="285" y="155">w<tspan baseline-shift="sub">21</tspan><tspan class="w21text"></tspan></text>
                                        <text font-size="20"  x="240" y="195">w<tspan baseline-shift="sub">22</tspan><tspan class="w22text"></tspan></text>
                                        <text font-size="20"  x="288" y="245">w<tspan baseline-shift="sub">23</tspan><tspan class="w23text"></tspan></text>
                                        <text font-size="20"  x="300" y="300">w<tspan baseline-shift="sub">31</tspan><tspan class="w31text"></tspan></text>
                                        <text font-size="20"  x="195" y="320">w<tspan baseline-shift="sub">32</tspan><tspan class="w32text"></tspan></text>
                                        <text font-size="20"  x="225" y="370">w<tspan baseline-shift="sub">33</tspan><tspan class="w33text"></tspan></text>


                                        <!--u(x) related texts-->
                                        <text font-size="20" x="370" y="35">= w<tspan baseline-shift="sub">11</tspan>*X1 + w<tspan baseline-shift="sub">12</tspan>*X2 + w<tspan baseline-shift="sub">13</tspan>*X3</text>
                                        <text font-size="20" x="370" y="190">= w<tspan baseline-shift="sub">21</tspan>*X1 + w<tspan baseline-shift="sub">22</tspan>*X2 + w<tspan baseline-shift="sub">23</tspan>*X3</text>
                                        <text font-size="20" x="370" y="335">= w<tspan baseline-shift="sub">31</tspan>*X1 + w<tspan baseline-shift="sub">32</tspan>*X2 + w<tspan baseline-shift="sub">33</tspan>*X3</text>


                                        <!--y(x) related texts-->
                                        <text font-size="20" x="665" y="50" style="stroke: #3366ff;stroke-width: 1px;">O1</text>
                                        <text class="changingTextStyle percLR_outputO1" font-size="20" x="670" y="80" style="stroke: #3366ff;"></text>

                                        <text font-size="20" x="665" y="200" style="stroke: #ff0000;stroke-width: 1px;">O2</text>
                                        <text class="changingTextStyle percLR_outputO2" font-size="20" x="670" y="230" style="stroke: #ff0000;"></text>

                                        <text font-size="20" x="665" y="350" style="stroke: #009933;stroke-width: 1px;">O3</text>
                                        <text class="changingTextStyle percLR_outputO3" font-size="20" x="670" y="380" style="stroke: #009933;"></text>
                            </svg>
                         
                        <br>
                        <br>
                        <p id="pid">
                        <b>Step 1:</b> 
                        <br>
                        <br>
                                 Calculate output as O = f(W * X) 
                                <br>
                                <br>
                                O = f ( [-2 -1 -6.5; 3 2 1] * [-2  3 1] ) = f( [0.5 1 -4.5] ) = [1 1 -1]
                                <br>
                                <br>
                                Desired output D given as [1 -1 -1]
                                <br>
                                <br>
                                Now as we know, ΔWi = η ( Di ) X
                        <br>
                                W<sub>new</sub> = W<sub>old</sub> + ΔW
                                <br>
                                <br>
                            
                                Applying the formula we get W<sub>1,new</sub> = [-2.8 2.2 -6.1]
                                <br>
                                <br>
                                Finally perform the same steps for each iteration
 
                         </p>                        
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

