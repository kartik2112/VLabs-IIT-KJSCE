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
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="style.css"/>
        <!-- jQuery 2.2.3 -->
        <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <style>
          .options{
            font-size: 16px;
            margin-left: 20px;
          }
          input{
            float: left;
          }
          #status{
            font-weight: bold;
            font-size: 17px;
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
          <h1 align="center"><?php echo $exp_name?>
            <!-- Write your experiment name -->
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <h3 style="margin-top:5%">Pre Test</h3>
          <p class="MsoNormal" style="text-align:justify">

            <!-- Pre Test content goes here -->
            <h3>1. What is Fuzzy Inference System?</h3>
            <input type="radio" class="q1" name="q1"/> <p class="options1 options">A. The process of formulating the mapping from a given input to an output using fuzzy logic.</p>
            <input type="radio" class="q1" name="q1"/> <p class="options1 options">B. Changing the output value to match the input value to give it an equal balance.</p>
            <input type="radio" class="q1" name="q1"/> <p class="options1 options">C. Having a larger output than the input.</p>
            <input type="radio" class="q1" name="q1"/> <p class="options1 options">D. Having a smaller output than the input.</p>
            
            <h3>What are the 2 types of Fuzzy Inference Systems?</h3>
            <input type="radio" class="q2" name="q2"/> <p class="options2 options">A. Model-Type and System-Type</p>
            <input type="radio" class="q2" name="q2"/> <p class="options2 options">B. Momfred-Type and Semigi-Type</p>
            <input type="radio" class="q2" name="q2"/> <p class="options2 options">C. Mamdani-Type and Sugeno-Type</p>
            <input type="radio" class="q2" name="q2"/> <p class="options2 options">D. Mihni-Type and Sujgani-Type</p>
            
            <h3>What operations are performed during inference in a Fuzzy Inference System?</h3>
            <input type="radio" class="q3" name="q3"/> <p class="options3 options">A. Fuzzification</p>
            <input type="radio" class="q3" name="q3"/> <p class="options3 options">B. Defuzzification</p>
            <input type="radio" class="q3" name="q3"/> <p class="options3 options">C. Both A & B</p>
            <input type="radio" class="q3" name="q3"/> <p class="options3 options">D. None of these</p>

            <h3>If there are 3 descriptors for dirt and 2 descriptors for grease, how many rules must be defined in Fuzzy rule base?</h3>
            <input type="radio" class="q4" name="q4"/> <p class="options4 options">A. 5</p>
            <input type="radio" class="q4" name="q4"/> <p class="options4 options">B. 6</p>
            <input type="radio" class="q4" name="q4"/> <p class="options4 options">C. Depends on implementation</p>
            <input type="radio" class="q4" name="q4"/> <p class="options4 options">D. None of these</p>
            <br>
            <p id="status"></p>
            <button style="cursor: no-drop;" id="check" class="btn-success" onclick="check()" disabled>Check</button>
          </p>
        </section>
        <!-- /.content -->
      </div>
      <?php include 'footer.html'; ?>
      <!-- /.content-wrapper -->
        </div>
        <script>
          var answered = [false,false,false,false];
          function check(){
            correct = [0,2,2,1];
            var wrong = 0;
            for(var q=1;q<=correct.length;q++){
              var ans1 = document.getElementsByClassName('q'+q);
              var op = document.getElementsByClassName('options'+q);
              for(var i=0;i<ans1.length;i++){
                if(ans1[i].checked && i!=correct[q-1]){
                  op[i].style.color = "red";
                  wrong++;
                }
              }
              op[correct[q-1]].style.color = "green";
              op[correct[q-1]].style.fontWeight = "bold";
            }
            if(wrong==0){
              $("#status").html("All answers correct! Proceed to reading procedure for simulation.");
              $("#status").css("color","green");
            }
            else if(wrong==correct.length){
              $("#status").html("All answers wrong! Refresh page to try again.");
              $("#status").css("color","red");
            }
            else $("#status").html("You got "+(correct.length-wrong)+" answer(s) correct! Refresh page to try again.");
          }

          $(document).ready(function(){
            $(".q1").click(function(){
              answered[0] = true;
              validate();
            });
            $('.q2').click(function(){
              answered[1] = true;
              validate();
            });
            $('.q3').click(function(){
              answered[2] = true;
              validate();
            });
            $('.q4').click(function(){
              answered[3] = true;
              validate();
            });
          });

          function validate(){
            for(var i=0;i<answered.length;i++) if(answered[i]==false) return;
            document.getElementById('check').removeAttribute("disabled");
            document.getElementById('check').style.cursor = "pointer";
          }
          $("#check").tooltip({title: "Check my answers", placement: "bottom"});
        </script>
    </body>
</html>

<!-- ./wrapper -->
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>