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
        <style>
          p,b,li{
            font-size: 15px;
          }
        </style>
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
          <h1 align="center"> <?php echo $exp_name?>
            <!-- Write your experiment name -->
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <h3 style="margin-top:5%">Theory</h3>

            <p class="MsoNormal" style="text-align:justify">
              <!--Theory content goes here -->
              <p>
              Fuzzy logic is basically a multi-valued logic that allows intermediate value to be defined between conventional evaluations
			  like yes/no, true/false and black/white. Notions like warm cold or very cold can be formulated mathematically and processed by
              computers.
              </p>
              <p>
              <b>Fuzzy inference</b> (reasoning) is the actual process of mapping from a given input to an output using fuzzy logic. 
              <br>
              The process involves all the pieces that we have discussed in the previous sections:
              membership functions, fuzzy logic operators, and if-then rules
              </p>
              <p>
             
              <b>Fuzzy Interference Systems</b>
              <br>
              <p>
              Fuzzy inference systems have been successfully applied in fields such as automatic control, data classification, decision analysis,
              expert systems, and computer vision.
              </p>
              <p>
              Because of its multi-disciplinary nature, the fuzzy inference system is known by a number of names, such as fuzzy-rule-based system,
              fuzzy expert system,
              fuzzy model,
              fuzzy associative memory,
              fuzzy logic controller,
              and simply fuzzy system. 
              </p>
              
              <p>

              <b>The steps of fuzzy reasoning performed by FISs are:</b>
<br>
<br>
<b>1.</b> Compare the input variables with the membership functions on the antecedent
part to obtain the membership values of each linguistic label. (this step is often
called fuzzification.)
<br>
<b>2.</b> Combine (usually multiplication or min) the membership values on the premise
part to get firing strength (deree of fullfillment) of each rule.
<br>
<b>3.</b> Generate the qualified consequents (either fuzzy or crisp) or each rule depending
on the firing strength.
<br>
<b>4.</b> Aggregate the qualified consequents to produce a crisp output. (This step is called
defuzzification.)
              </p>
              <p>
              <b>Architecture</b>
              <p>
              <img src="fisarchi.png">
              </p>
              <p>
              <b>Fuzzy Rule Base</b>: Rule base that ontains a number of fuzzy rules.
              <br>
              <b>Fuzzification</b>: A process to convert the crisp input to a linguistic variable using
the membership functions stored in the fuzzy.
              <br>
              <b>Inference Engine</b>: Using the fuzzy rules converts the fuzzy
input to the fuzzy output.
              <br>
              <b>Defuzzification</b>: A process to convert the fuzzy output of the inference engine
to crisp using membership functions analogous to
the ones used by the fuzzifier.
              <br>
              <br>
              Here we will be using the <b>washing machine</b> which is a common feature in an Indian household.
              <br>
               We will formulate a precise mathematical relationship between amount of grease, dirt and the duration of
washing time required.
              <br>
              The input parameters used to solve the above mention problem
are:
<ul>
<li> Grease
<li> Dirt
</ul>
The fuzzy controller takes two inputs, processes the information
and gives output as washing time.
<br>
<p>The two crisp inputs, grease and dirtiness vary from 0 to 100 and
presented as fuzzy sets defined by their respective membership
functions. Let the output: washing time be allowed to have three
linguistic values less, medium and high. Similarly, let the input
variable: grease be expressed as low, average and
large and dirtiness of clothes be described as being less,medium
and high.
</p>
<br>

<b>Rules</b>
<p>
The decision which the fuzzy controller makes is derived from the
rules which are stored in the database. These are stored in the set
of rules.Basically the rules are if-then statements that are intuitive
and easy to understand, since they are nothing but common English
statements. For example, the set of rules that can be used to derive the output:
<ol>
<li> if(dirtiness is less) and (grease is low) then (washingtime
is less).
<li> if(dirtiness is less) and (grease is average) then (washingtime
is less).
<li> if (dirtiness is less) and (grease is large) then (washingtime
is medium).
<li> if (dirtiness is medium) and (grease is low) then (washingtime
is less).
<li> if (dirtiness is medium) and (grease is average) then
(washing- time is medium).
<li> if dirtiness is medium) and (grease is large) then (washingtime
is high).
<li> if (dirtiness is high) and (grease is low) then (washingtime
is medium).
<li> if (dirtiness is high) and (grease is medium) then (washingtime
is high).
<li> if(dirtiness is less) and (grease is high) then (washing- time
is high).

</ol>
<br>
The rules too have been defined in imprecise sense and hence they
too are not crisp but fuzzy values.The two input parameters after
being read from the sensors are fuzzified as per the membership
functon of the respective variables.At last the crisp value of
washing time is obtained as a answer.
            </p>
        </section>
        <!-- /.content -->
      </div>
      <?php include 'footer.html'; ?>
      <!-- /.content-wrapper -->
        </div>
    </body>to
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