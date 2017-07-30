<?php
session_start();
$_SESSION["currPage"]=5;
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
  <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../plugins/jQueryUI/jquery-ui.min.js"></script>


  <!-- Simulation scripts start-->

  <link href="../../src/Styles.css" rel="stylesheet" />

  <!-- JSX Graph links -->
  <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jsxgraph/0.99.5/jsxgraphcore.js"></script>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script type="text/javascript">
        /*
            These add sliders to each line, for threshold, for bias and learning rate.      
        */

      $(function () {
          $(".sliders").slider({
              step: 0.1,
              max: 5,
              min: -5,
              slide: function (event, ui) {
                  $("#t" + sel).html(ui.value);
              }
          });
          $(".tsliders").slider({
              step: 0.1,
              max: 2,
              min: -2,
              slide: function (event, ui) {
                  $("#thresh").html(ui.value);
              }
          });
          $(".bsliders").slider({
              step: 0.1,
              max: 2,
              min: -2,
              slide: function (event, ui) {
                  $("#b" + sel).html(ui.value);
              }
          });
          $("#lslider").slider({
              step: 0.1,
              max: 3.0,
              min: 0.1,
              value: 1,
              slide: function (event, ui) {
                  $("#learn").html(ui.value);
              }
          });
          init_mlp();
      });

      var counter, board, constPointSize, OP1, OP2, OP3, OP4, x1, x2, z, testOneX, testOneY, testTwoX, testTwoY, w11, w12, w21, w22, v1, v2, b1, b2, b3, theta, flag, erroneousCount, errorRate;

      //These variables are used only for Multi Layer Perceptron
      var mlp_saved_w11 = 0, mlp_saved_w12 = 0, mlp_saved_w21 = 0, mlp_saved_w22 = 0, mlp_saved_v1 = 0, mlp_saved_v2 = 0, mlp_saved_b1 = 0, mlp_saved_b2 = 0, mlp_saved_b3 = 0, mlp_saved_theta = 0;

      //These variables are used only for Error Back Propogation.
      var ebp_saved_w11 = 0, ebp_saved_w12 = 0, ebp_saved_w21 = 0, ebp_saved_w22 = 0, ebp_saved_v1 = 0, ebp_saved_v2 = 0, ebp_saved_b1 = 0, ebp_saved_b2 = 0, ebp_saved_b3 = 0, ebp_saved_learning_rate = 1, ebp_saved_no_of_iterations = 1000, sim, learningRate, e = Math.E, iter, iterations = -1, outs = [], outs_hidden_1 = [], outs_hidden_2 = [];

      //This function is used when we change from Multi-layer Perceptron to Error Back Propogation or vice versa.
      function changeMode() {
          var simulation_mode = document.getElementById('m');

          if (simulation_mode.value == "mlp") {
              document.getElementById('start').setAttribute("onclick", "start_mlp()");
              document.getElementById('thresh_title').style.display = "block";
              document.getElementById('img_thresh').setAttribute("onclick", "editThreshold()");
              init_mlp();

              for (var i = 1; i <= 4; i++) {
                  document.getElementById('out' + i).innerHTML = "-";
                  document.getElementById('h1' + i).innerHTML = "-";
                  document.getElementById('h2' + i).innerHTML = "-";
              }
              document.getElementById('acc_val').innerHTML = 0;
              document.getElementById('acc').style.display = "none";
              document.getElementById('grph').style.display = "none";
          }
          else {
              save_weights_mlp();
              document.getElementById('start').setAttribute('onclick', 'save_weights_ebp()');
              document.getElementById('thresh_title').style.display = "none";
              document.getElementById('img_thresh').setAttribute("onclick", "");
              init_ebp();

              for (var i = 1; i <= 4; i++) {
                  document.getElementById('out' + i).innerHTML = "-";
                  document.getElementById('h1' + i).innerHTML = "-";
                  document.getElementById('h2' + i).innerHTML = "-";
              }
              document.getElementById('acc_val').innerHTML = 0;
              document.getElementById('acc').style.display = "none";
              document.getElementById('grph').style.display = "none";
          }


          document.getElementById('r4').style.background = "transparent";
          document.getElementById('start').innerHTML = "Start simulation";
          board = JXG.JSXGraph.initBoard('box', { axis: true, boundingbox: [-0.5, 2, 2, -0.5],showCopyright:false,showNavigation:false});
          OP1 = board.create('point', [0, 0], { size: constPointSize, face: 'x', fixed: true });
          OP2 = board.create('point', [0, 1], { size: constPointSize, face: '^', fixed: true });
          OP3 = board.create('point', [1, 0], { size: constPointSize, face: '^', fixed: true });
          OP4 = board.create('point', [1, 1], { size: constPointSize, face: 'x', fixed: true });

          for (var i = 1; i <= 4; i++) {
              document.getElementById('out' + i).innerHTML = "-";
          }
      }

      //This function saves weights before changing mode. So testing on different sets of weights can be done.
      function save_weights_ebp() {
          ebp_saved_w11 = parseFloat(document.getElementById('t1').innerHTML);
          ebp_saved_w12 = parseFloat(document.getElementById('t2').innerHTML);
          ebp_saved_b1 = parseFloat(document.getElementById('b1').innerHTML);

          ebp_saved_w21 = parseFloat(document.getElementById('t3').innerHTML);
          ebp_saved_w22 = parseFloat(document.getElementById('t4').innerHTML);
          ebp_saved_b2 = parseFloat(document.getElementById('b2').innerHTML);

          ebp_saved_v1 = parseFloat(document.getElementById('t5').innerHTML);
          ebp_saved_v2 = parseFloat(document.getElementById('t6').innerHTML);
          ebp_saved_b3 = parseFloat(document.getElementById('b3').innerHTML);

          ebp_saved_learning_rate = parseFloat(document.getElementById('learn').innerHTML);
          theta = parseFloat(document.getElementById('thresh').innerHTML);
          ebp_saved_no_of_iterations = parseFloat(document.getElementById('iter').value);

          init_ebp();
          start_ebp();
      }
      
      // Save weights. Applicable only to MLP.
      function save_weights_mlp() {
          mlp_saved_w11 = parseFloat(document.getElementById('t1').innerHTML);
          mlp_saved_w12 = parseFloat(document.getElementById('t2').innerHTML);
          mlp_saved_b1 = parseFloat(document.getElementById('b1').innerHTML);

          mlp_saved_w21 = parseFloat(document.getElementById('t3').innerHTML);
          mlp_saved_w22 = parseFloat(document.getElementById('t4').innerHTML);
          mlp_saved_b2 = parseFloat(document.getElementById('b2').innerHTML);

          mlp_saved_v1 = parseFloat(document.getElementById('t5').innerHTML);
          mlp_saved_v2 = parseFloat(document.getElementById('t6').innerHTML);
          mlp_saved_b3 = parseFloat(document.getElementById('b3').innerHTML);

          mlp_saved_theta = parseFloat(document.getElementById('thresh').innerHTML);
      }

      function init_ebp() {
          // Unhighlight the last row in the outputs table. Useful if navigated from mlp to ebp.
          document.getElementById('r4').style.background = "transparent";
          $("#acc_title").html("Root mean square error: ");
          
          document.getElementById('start').innerHTML = "Start simulation";
          
          // --- Enter saved weights, biases, iterations, learning rate & threshold ---
          w11 = document.getElementById('t1').innerHTML = ebp_saved_w11;
          w12 = document.getElementById('t2').innerHTML = ebp_saved_w12;
          b1 = document.getElementById('b1').innerHTML = ebp_saved_b1;

          w21 = document.getElementById('t3').innerHTML = ebp_saved_w21;
          w22 = document.getElementById('t4').innerHTML = ebp_saved_w22;
          b2 = document.getElementById('b2').innerHTML = ebp_saved_b2;

          v1 = document.getElementById('t5').innerHTML = ebp_saved_v1;
          v2 = document.getElementById('t6').innerHTML = ebp_saved_v2;
          b3 = document.getElementById('b3').innerHTML = ebp_saved_b3;

          learningRate = document.getElementById('learn').innerHTML = ebp_saved_learning_rate;
          iter = document.getElementById('iter').value = ebp_saved_no_of_iterations;
          // ---------------------------------------------------------------------------

          // Display elements specific to EBP simulation
          var ebp_elems = document.getElementsByClassName('ebp_content_only');
          for (var i = 0; i < ebp_elems.length; i++) {
              ebp_elems[i].style.display = "block";
          }
          
          // Empty the output table.
          for (var i = 1; i <= 4; i++) {
              document.getElementById('out' + i).innerHTML = "-";
              document.getElementById('h1' + i).innerHTML = "-";
              document.getElementById('h2' + i).innerHTML = "-";
          }

          // Hide Accuracy and graphs
          document.getElementById('acc_val').innerHTML = 0;
          document.getElementById('acc').style.display = "none";
          document.getElementById('grph').style.display = "none";
          
          // Hide the reset button.
          document.getElementById('reset').style.display = "none";

          // --- Initialize graph ---
          counter = 0;
          board = JXG.JSXGraph.initBoard('box', { axis: true, boundingbox: [-0.5, 2, 2, -0.5],showCopyright:false,showNavigation:false});  //Creates the cartesian graph
          board1 = JXG.JSXGraph.initBoard('box1', { axis: true, boundingbox: [-0.5, 2, 2, -0.5],showCopyright:false,showNavigation:false});
          constPointSize = 5;
          OP1 = board.create('point', [0, 0], { size: constPointSize, face: 'x', fixed: true });
          OP2 = board.create('point', [0, 1], { size: constPointSize, face: '^', fixed: true });
          OP3 = board.create('point', [1, 0], { size: constPointSize, face: '^', fixed: true });
          OP4 = board.create('point', [1, 1], { size: constPointSize, face: 'x', fixed: true });
          x1 = [0, 0, 1, 1];
          x2 = [0, 1, 0, 1];
          z = [0, 1, 1, 0];
          // ------------------------
      }

      function start_ebp() {
          // -- This part initializes the graph --
          board = JXG.JSXGraph.initBoard('box', { axis: true, boundingbox: [-0.5, 2, 2, -0.5],showCopyright:false,showNavigation:false});  //Creates the cartesian graph
          board1 = JXG.JSXGraph.initBoard('box1', { axis: true, boundingbox: [-0.5, 2, 2, -0.5],showCopyright:false,showNavigation:false});
          constPointSize = 5;
          OP1 = board.create('point', [0, 0], { size: constPointSize, face: 'x', fixed: true });
          OP2 = board.create('point', [0, 1], { size: constPointSize, face: '^', fixed: true });
          OP3 = board.create('point', [1, 0], { size: constPointSize, face: '^', fixed: true });
          OP4 = board.create('point', [1, 1], { size: constPointSize, face: 'x', fixed: true });
          //--------------------------------------

          // -- This part handles results & other objects which hide during simulation --
          document.getElementById('bef_thresh_op_txt').style.display = "none";
          document.getElementById('after_threshold_op').style.display = "none";
          document.getElementById('grph').style.display = "none";
          var mode = document.getElementsByClassName('nw');
          for (var i = 0; i < mode.length; i++) {
              mode[i].style.display = "none";
          }
          document.getElementById('acc').style.display = "none";
          document.getElementById('msg').innerHTML = "Calculating.. This might take a few minutes.";
          document.getElementById('start').setAttribute("disabled", "disabled");
          // ----------------------------------------------------------------------------

          z1 = z2 = y = y1 = y2 = yin = 0;


          //Start animation of weight lines
          var i;
          for (i = 1; i <= 6; i++) {
              $("#w" + i).addClass('animatedLinePurple');
          }
          $("#w" + i).addClass('animatedLineGreen');

          // Start calculations. This starts after 1s.
          setTimeout(function () {
              for (var i = iterations + 1; i < iter; i++) {
                  var set_op = false;                       //To pause & show output?
                  errorRate = 0;
                  // For each input
                  for (counter = 0; counter < 4; counter++) ebp(counter);
                  
                  // The last iteration has been finished!
                  if (i == iter - 1) {
                      var reset = document.getElementById('reset');
                      reset.style.display = "block";
                      reset.innerHTML = "Reset";
                      reset.setAttribute('onclick', 'init_ebp()');
                      iterations = 0;
                      i++;

                      set_op = true;
                  }
                  // Pausing simulation after {10k, 1 lakh, 10 lakh and 1 crore} iterations to view current output
                  else if (i == 10000 || i == 100000 || i == 1000000 || i == 10000000) {
                      var reset = document.getElementById('reset');
                      reset.style.display = "block";
                      reset.innerHTML = "Continue";
                      reset.setAttribute('onclick', 'start_ebp()');

                      set_op = true;
                  }
                  
                  // To show output
                  if (set_op == true) {
                      
                      // Remove animated lines
                      setTimeout(function () {
                          var p;
                          for (p = 1; p <= 6; p++) {
                              $("#w" + p).removeClass('animatedLinePurple');
                          }
                          $("#w" + p).removeClass('animatedLineGreen');
                          iterations++;
                      }, 1000);
                      
                      // Display relevant outputs
                      var msg = document.getElementById('msg');
                      msg.innerHTML = "No. of iterations completed: " + (i);
                      if (i != iter) msg.innerHTML += ". Check how the weights affect the decision boundaries and the solution below. Click the button below to continue.";
                      else {
                          msg.innerHTML += ". Click Reset to try again with different values."
                          document.getElementById('start').removeAttribute("disabled");
                          var mode = document.getElementsByClassName('nw');
                          for (var i = 0; i < mode.length; i++) {
                              mode[i].style.display = "block";
                          }
                      }

                      // Show weights on weight lines
                      for (var wt = 1; wt <= 6; wt++) {
                          var weight = document.getElementById("t" + wt);
                          switch (wt) {
                              case 1:
                                  weight.innerHTML = w11.toFixed(3); break;
                              case 2:
                                  weight.innerHTML = w12.toFixed(3); break;
                              case 3:
                                  weight.innerHTML = w21.toFixed(3); break;
                              case 4:
                                  weight.innerHTML = w22.toFixed(3); break;
                              case 5:
                                  weight.innerHTML = v1.toFixed(3); break;
                              case 6:
                                  weight.innerHTML = v2.toFixed(3); break;
                          }
                      }

                      // Show biases
                      document.getElementById('b1').innerHTML = b1.toFixed(3);
                      document.getElementById('b2').innerHTML = b2.toFixed(3);
                      document.getElementById('b3').innerHTML = b3.toFixed(3);

                      // Show intermediate output
                      document.getElementById('bef_thresh_op').innerHTML = yin.toFixed(3);

                      // Show final output
                      document.getElementById('op').innerHTML = y.toFixed(3);
                      
                      // Show output of hidden neurons
                      for (var j = 0; j < 4; j++) document.getElementById('out' + (j + 1)).innerHTML = outs[j].toFixed(3);
                      for (var ctr = 1; ctr <= 4; ctr++) {
                          console.log(outs_hidden_1[ctr] + " " + outs_hidden_2[ctr - 1]);
                          document.getElementById('h1' + ctr).innerHTML = outs_hidden_1[ctr - 1].toFixed(3);
                          document.getElementById('h2' + ctr).innerHTML = outs_hidden_2[ctr - 1].toFixed(3);
                      }

                      // Update both the graphs (i.e. update the decision boundaries)
                      for (j = 0; j < outs_hidden_1.length; j++) {
                          if (z[j] == 0)
                              var finalPoints = board1.create('point', [outs_hidden_1[j], outs_hidden_2[j]], { size: constPointSize, face: 'x', fixed: true, name: 'Group 0' });
                          else
                              var finalPoints = board1.create('point', [outs_hidden_1[j], outs_hidden_2[j]], { size: constPointSize, face: '^', fixed: true, name: 'Group 1' });
                      }
                      decisionBoundary1 = board.create('line', [b1, Number(w11), Number(w21)], { fixed: true });
                      decisionBoundary2 = board.create('line', [b2, Number(w12), Number(w22)], { fixed: true });
                      finalBoundary = board1.create('line', [b3, Number(v1), Number(v2)], { fixed: true });
                      
                      // Show the graph after changing data
                      document.getElementById('grph').style.display = "block";
                      break;
                  }

                  iterations++;
              }
              
              // Show output before applying threshold.
              document.getElementById('bef_thresh_op_txt').style.display = "block";
              // Show output after applying threshold.
              document.getElementById('after_threshold_op').style.display = "block";
              // Display final accuracy rate object
              document.getElementById('acc').style.display = "block";
              
              // Calculating & displaying the rms error rate
              rms = Math.sqrt(errorRate / 4);
              rms = rms * 100;

              document.getElementById('acc_val').innerHTML = rms.toFixed(3) + "%";
          }, 1000);
      }

      function ebp(j) {

          /*document.getElementById('bef_thresh_op_txt').style.display = "block";
          document.getElementById('after_threshold_op').style.display = "block";*/

          //Hidden Neuron computations
          z1 = x1[j] * w11 + x2[j] * w21 + b1;  // Computation at hidden neuron 1
          z2 = x1[j] * w21 + x2[j] * w22 + b2;  // Computation at hidden neuron 2

          //Output at hidden layer nuerons
          var temp = Math.pow(e, -z1);
          y1 = 1 / (1 + temp);
          temp = Math.pow(e, -z2);
          y2 = 1 / (1 + temp);

          //Calculation at output nueron
          yin = y1 * v1 + y2 * v2 + b3;

          //Output at output nueron
          var temp = Math.pow(e, -yin);
          y = 1 / (1 + temp);

          //Calculation of delta values for each neuron
          var delta1 = y * (1 - y) * (z[j] - y);
          var delta2 = y1 * (1 - y1) * v1 * delta1;
          var delta3 = y2 * (1 - y2) * v2 * delta1;

          //Update Bias:
          b1 = b1 + learningRate * delta2;
          b2 = b2 + learningRate * delta3;
          b3 = b3 + learningRate * delta1;

          //Changing weights between input neurons and hidden neurons
          w11 = w11 + learningRate * x1[j] * delta2;
          w12 = w12 + learningRate * x1[j] * delta2;
          w21 = w21 + learningRate * x2[j] * delta3;
          w22 = w22 + learningRate * x2[j] * delta3;

          // Changing weights between output neurons and hidden neurons
          v1 = v1 + learningRate * y1 * delta1;
          v2 = v2 + learningRate * y2 * delta1;

          outs[j] = y;
          outs_hidden_1[j] = y1;
          outs_hidden_2[j] = y2;

          errorRate += Math.pow(z[j] - y, 2);

      }

      function init_mlp() {
         
          // --- Enter saved weights, biases, threshold values ---
          document.getElementById('t1').innerHTML = mlp_saved_w11;
          document.getElementById('t2').innerHTML = mlp_saved_w12;
          document.getElementById('b1').innerHTML = mlp_saved_b1;

          document.getElementById('t3').innerHTML = mlp_saved_w21;
          document.getElementById('t4').innerHTML = mlp_saved_w22;
          document.getElementById('b2').innerHTML = mlp_saved_b2;

          document.getElementById('t5').innerHTML = mlp_saved_v1;
          document.getElementById('t6').innerHTML = mlp_saved_v2;
          document.getElementById('b3').innerHTML = mlp_saved_b3;
          document.getElementById('thresh').innerHTML = mlp_saved_theta;
          // -----------------------------------------------------

          //Hide all elements unique to EBP.
          var ebp_elems = document.getElementsByClassName('ebp_content_only');
          for (var i = 0; i < ebp_elems.length; i++) {
              ebp_elems[i].style.display = "none";
          }

          $("#acc_title").html("Accuracy of network: ");

          counter = 0;

          /* --- Creates the cartesian graph --- */
          board = JXG.JSXGraph.initBoard('box', { axis: true, boundingbox: [-0.5, 2, 2, -0.5],showCopyright:false,showNavigation:false});
          board1 = JXG.JSXGraph.initBoard('box1', { axis: true, boundingbox: [-0.5, 2, 2, -0.5],showCopyright:false,showNavigation:false});
          constPointSize = 5;
          OP1 = board.create('point', [0, 0], { size: constPointSize, face: 'x', fixed: true });
          OP2 = board.create('point', [0, 1], { size: constPointSize, face: '^', fixed: true });
          OP3 = board.create('point', [1, 0], { size: constPointSize, face: '^', fixed: true });
          OP4 = board.create('point', [1, 1], { size: constPointSize, face: 'x', fixed: true });
          x1 = [0, 0, 1, 1];
          x2 = [0, 1, 0, 1];
          z = [0, 1, 1, 0];

          testOneX = 0;
          testOneY = 0;

          testTwoX = 1;
          testTwoY = 0;
          /* ----------------------------------- */
          flag = true;
          erroneousCount = 0;

          var i;
          for (i = 1; i <= 7; i++) {
              $("#w" + i).addClass('StdLine');
          }

      }

      function start_mlp() {
          
          // Show graph and set weights
          document.getElementById('grph').style.display = "block";

          w11 = parseFloat(document.getElementById('t1').innerHTML);
          w12 = parseFloat(document.getElementById('t2').innerHTML);
          b1 = parseFloat(document.getElementById('b1').innerHTML);

          w21 = parseFloat(document.getElementById('t3').innerHTML);
          w22 = parseFloat(document.getElementById('t4').innerHTML);
          b2 = parseFloat(document.getElementById('b2').innerHTML);

          v1 = parseFloat(document.getElementById('t5').innerHTML);
          v2 = parseFloat(document.getElementById('t6').innerHTML);
          b3 = parseFloat(document.getElementById('b3').innerHTML);
          theta = parseFloat(document.getElementById('thresh').innerHTML);
          z1 = z2 = y = y1 = y2 = yin = 0;

          //Hide the Accuracy of network text
          document.getElementById('acc').style.display = "none";

          //Hide the Dropdown to select network.
          var mode = document.getElementsByClassName('nw');
          for (var i = 0; i < mode.length; i++) {
              mode[i].style.display = "none";
          }

          //Last input
          if (counter == 3) {
              document.getElementById('start').innerHTML = "Restart simulation";
              var mode = document.getElementsByClassName('nw');
              for (var i = 0; i < mode.length; i++) {
                  mode[i].style.display = "block";
              }
          }

          //Restarted simulation
          else if (counter == 4) {
              for (var i = 1; i <= 4; i++) {
                  document.getElementById('out' + i).innerHTML = "-";
              }
              counter = 0;

              /* Hide the outputs of network */
              document.getElementById('bef_thresh_op_txt').style.display = "none";
              document.getElementById('after_threshold_op').style.display = "none";

              //Change text of start button
              document.getElementById('start').innerHTML = "Test next input";

              //Re-plot the graph
              board = JXG.JSXGraph.initBoard('box', { axis: true, boundingbox: [-0.5, 2, 2, -0.5],showCopyright:false,showNavigation:false});
              board1 = JXG.JSXGraph.initBoard('box1', { axis: true, boundingbox: [-0.5, 2, 2, -0.5],showCopyright:false,showNavigation:false});
              OP1 = board.create('point', [0, 0], { size: constPointSize, face: 'x', fixed: true });
              OP2 = board.create('point', [0, 1], { size: constPointSize, face: '^', fixed: true });
              OP3 = board.create('point', [1, 0], { size: constPointSize, face: '^', fixed: true });
              OP4 = board.create('point', [1, 1], { size: constPointSize, face: 'x', fixed: true });
          }

          //Input between 1 and 3
          else document.getElementById('start').innerHTML = "Test next input";

          //Change the input indicator in truth table
          if (counter != 0) document.getElementById('r' + (counter)).style.background = "transparent";
          else document.getElementById('r4').style.background = "transparent";

          document.getElementById('r' + (counter + 1)).style.background = "#ff9595";

          //Start animation of weight lines
          var i;
          for (i = 1; i <= 6; i++) {
              $("#w" + i).addClass('animatedLinePurple');
          }
          $("#w" + i).addClass('animatedLineGreen');

          //Disable start button
          document.getElementById('start').setAttribute("disabled", "disabled");

          //Call mlp() function to calculate output.
          setTimeout(function () {
              mlp(counter);

              //Stop animation of lines.
              for (i = 1; i <= 6; i++) {
                  $("#w" + i).removeClass('animatedLinePurple');
              }
              $("#w" + i).removeClass('animatedLineGreen');

              //Enable start button
              document.getElementById('start').removeAttribute("disabled");

              //If it was the last input
              if (counter == 4) {

                  /* Show accuracy of network */
                  document.getElementById('acc').style.display = "block";

                  errorRate = erroneousCount / 4;
                  errorRate = 1 - errorRate;

                  errorRate = errorRate * 100;

                  document.getElementById('acc_val').innerHTML = errorRate + "%";
                  erroneousCount = 0;
              }
          }, 2000);


      }

      function mlp(index) {
          // Show outputs before and after applying threshold values.
          document.getElementById('bef_thresh_op_txt').style.display = "block";
          document.getElementById('after_threshold_op').style.display = "block";
          counter++;
          
          // The hidden layer outputs
          var z11 = x1[index] * w11 + x2[index] * w21 - b1;
          var z22 = x1[index] * w12 + x2[index] * w22 - b2;
          
          // Apply threshold
          z1 = z11; z2 = z22;

          y1 = Number(z1);
          y2 = Number(z2);

          if (z1 >= theta)
              y1 = 1;
          else
              y1 = 0;
          if (z2 >= theta)
              y2 = 1;
          else
              y2 = 0;

          // Calculate final output.
          var yin1 = y1 * v1 + y2 * v2 - b3;
          yin = yin1;

          yin = Number(yin);
          document.getElementById('bef_thresh_op').innerHTML = yin;
          
          // Apply threshold on final output
          if (yin >= theta)
              y = 1;
          else
              y = 0;
         
          // Calculate errors and update graphs.
          if (z[index] == 1)
              HiddenLayerOP = board1.create('point', [y1, y2], { size: constPointSize, face: '^', fixed: true });
          else
              HiddenLayerOP = board1.create('point', [y1, y2], { size: constPointSize, face: 'x', fixed: true });

          var flagger = false;

          if (y != z[index]) {
              erroneousCount++;
          }

          decisionBoundary1 = board.create('line', [b1 * -1, Number(w11), Number(w21)]);
          decisionBoundary2 = board.create('line', [-b2, Number(w12), Number(w22)]);
          finalBoundary = board1.create('line', [-b3, Number(v1), Number(v2)]);
          document.getElementById('h1' + (index + 1)).innerHTML = y1;
          document.getElementById('h2' + (index + 1)).innerHTML = y2;

          document.getElementById('op').innerHTML = y;
          document.getElementById('out' + (index + 1)).innerHTML = y;
          z1 = z2 = y = y1 = y2 = 0;
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

    .selected{
      stroke: #0e95ca;
      stroke-dasharray: 7px;
    }

    .not_sel{
      stroke: #ff6a00;
    }

    .neuron_sel{
      fill: #ff6a00;
    }

    .opneuron{
      fill: #00b8ff;
    }

    .hneuron{
      fill: #222d32;
    }
  </style>
    </head>
</body>
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

    <?php include 'pane.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1250px">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 align="center"><?php echo $exp_name?></h1>
        <!-- Write your experiment name -->
          
           
            <!--Simulation content goes here -->

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
        <p>&rarr; Click on any line to change its weight</p>
          <p>&rarr; Click on the threshold graph to change threshold value</p>
          <p>&rarr; Click on any hidden/output neuron to change its bias</p>
          <p>&rarr; You cannot change the parameters once you've started simulations.</p>
          <p>&rarr; The red line in the decision boundaries graph depicts the boundary formed due to hidden neuron 1, blue line corresponds to hidden neuron 2, and green line to the output neuron respectively.</p>
        <br>

        <!--Simulation content goes here -->

        <p class="nw">Select a network:</p>
        <select class="nw" id="m" onchange="changeMode()">
          <option value="mlp">Multi-Layer Perceptron</option>
          <option value="ebp">Error   Back Propogation</option>
        </select>

        <br>

        <div style="width: 100%;height: 700px">
          <div style="float: left;height: 300px;clear: right;">
            <svg height="300" width="680">

              <!-- The weights connecting input and hidden layer -->

              <line class="not_sel" id="w1" x1="70" y1="50" x2="270" y2="50" stroke="#ff6a00" stroke-width="5" onclick="editWeights(1)"><title>W11</title></line>
              <text id="t1" x="110" y="40" font-size="17">0</text>

              <line class="not_sel" id="w2" x1="70" y1="50" x2="270" y2="250" stroke="#ff6a00" stroke-width="5" onclick="editWeights(2)"><title>W12</title></line>
              <text id="t2" x="130" y="100" font-size="17">0</text>

              <line class="not_sel" id="w3" x1="70" y1="250" x2="270" y2="50" stroke="#ff6a00" stroke-width="5" onclick="editWeights(3)"><title>W21</title></line>
              <text id="t3" x="120" y="170" font-size="17">0</text>

              <line class="not_sel" id="w4" x1="70" y1="250" x2="270" y2="250" stroke="#ff6a00" stroke-width="5" onclick="editWeights(4)"><title>W22</title></line>
              <text id="t4" x="110" y="240" font-size="17">0</text>

              <!-- Ouput neuron and its weights -->

              <line class="not_sel" id="w5" x1="270" y1="50" x2="470" y2="150" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(5)"><title>V1</title></line>
              <text id="t5" x="340" y="80" font-size="17">0</text>

              <line class="not_sel" id="w6" x1="270" y1="250" x2="470" y2="150" stroke="#ff6a00" stroke-width="5"  onclick="editWeights(6)"><title>V2</title></line>
              <text id="t6" x="330" y="205" font-size="17">0</text>

              <line id="w7" x1="470" y1="150" x2="570" y2="150" stroke="#ff6a00" stroke-width="5" ><title>y</title></line>

              <circle id="c3" class="opneuron" cx="470" cy="150" r="20" fill="#00b8ff" onclick="editBias(3)" style="z-index: 10"><title>Output Neuron</title></circle>
              <text id="bef_thresh_op_txt" style="display: none;" x="450" y="190" font-size="17">y(x) = <tspan id="bef_thresh_op">0</tspan></text>

              <!-- The input layer -->

              <circle class="neuron" cx="70" cy="50" r="20" fill="#00b8ff" style="z-index: 10"><title>Input 1</title></circle>
              <circle class="neuron" cx="70" cy="250" r="20" fill="#00b8ff" style="z-index: 10"><title>Input 2</title></circle>

              <!-- The hidden layer -->

              <circle id="c1" class="hneuron" cx="270" cy="50" r="20" onclick="editBias(1)" style="z-index: 10"><title>Hidden Neuron 1</title></circle>
              <circle id="c2" class="hneuron" cx="270" cy="250" r="20" onclick="editBias(2)" style="z-index: 10"><title>Hidden Neuron 2</title></circle>

              <!-- Biases  -->

              <text x="250" y="30">b1 = <tspan id="b1">0</tspan></text>
              <text x="250" y="280">b2 = <tspan id="b2">0</tspan></text>
              <text x="450" y="130">b3 = <tspan id="b3">0</tspan></text>

              <!-- Threshold. Use #thresh to set value of threshold -->

              <text id="thresh_title" x="570" y="115" font-size="15">Threshold = <tspan id="thresh">0</tspan></text>
              <image id="img_thresh" x="570" y="125" height="50" width="50" xlink:href="../images/unipolar_threshold.png" style="padding: 10px;fill: #00b8ff" onclick="editThreshold()"/>

              <!-- The output. Use #op to set value of output -->

              <text id="after_threshold_op" style="display: none;" x="570" y="200" font-size="17">o(x) = <tspan id="op">0</tspan></text>
            </svg>

          </div>

          <br/>

          <div style="float: right;width: 300px;height: 350px;">
            <div style="width: 100%;height: 48%;">
              <h3>Truth Table</h3>
              <br/>
              <table id="truth" border="1" style="text-align: center;">
                  <tr>
                    <th colspan="2" style="text-align: center;">Input</th>
                    <th colspan="5" style="text-align: center;">Output</th>
                  </tr>
                  <tr>
                    <th>X1</th>
                    <th>X2</th>
                    <th>Output of hidden neuron 1</th>
                    <th>Output of hidden neuron 2</th>
                    <th>Final Network Output</th>
                    <th>Expected Output</th>
                  </tr>

                  <tr id="r1">
                    <td>0</td>
                    <td>0</td>
                    <td id="h11">-</td>
                    <td id="h21">-</td>
                    <td id="out1">-</td>
                    <td>0</td>
                  </tr>

                  <tr id="r2">
                    <td>0</td>
                    <td>1</td>
                    <td id="h12">-</td>
                    <td id="h22">-</td>
                    <td id="out2">-</td>
                    <td>1</td>
                  </tr>

                  <tr id="r3">
                    <td>1</td>
                    <td>0</td>
                    <td id="h13">-</td>
                    <td id="h23">-</td>
                    <td id="out3">-</td>
                    <td>1</td>
                  </tr>

                  <tr id="r4">
                    <td>1</td>
                    <td>1</td>
                    <td id="h14">-</td>
                    <td id="h24">-</td>
                    <td id="out4">-</td>
                    <td>0</td>
                  </tr>
                </table>
              <h5 id="acc" style="display: none;border: 1px solid black;color: #f3bb43;text-align: center;padding: 3px;background:  #222d32;"><span id="acc_title">Accuracy of network: </span><span id="acc_val">0%</span></h5>
            </div>
          </div>
              
          <div class="ebp_content_only" style="width: 240px;height: 290px;">
            <h5 style="float: left;margin: 0;width: 140px">
              Set Learning rate: &nbsp;<span id="learn">1</span>
            </h5>
            <br>
            <div id="lslider" style="float: right;background: deepskyblue;margin-bottom: 10px;width: 100px"></div>
          </div>

          <br>

          <div class="ebp_content_only" style="width: 100%">
            <label for="iter" style="float: left;width: 150px">No. of iterations? &rarr; </label>
            <input type="number" min="1000" max="1000000000" name="iter" id="iter" value="1000">
          </div>

          <br/>

          <h4 id="msg" class="ebp_content_only">Set the no.of iterations between 1000 & 100000000</h4>

          <br>

          <button style="float: left;margin-right: 10px;clear: both;" id="start" class="btn btn-success" onclick="start_mlp();">Start simulation</button>
          <button id="reset" class="btn btn-success ebp_content_only" style="background: red;" onclick="document.getElementById('start').setAttribute('onclick','save_weights_ebp()');init_ebp();">Reset</button>

          <br>
          <br>

          <div id="grph" style="width: 640px;height: 410px;clear: both;display: none;">
            <div id="output">
              <div  style="width: 48%;float: left;">
                <h3 style="text-align: center;width: 300px;height: 52px;">Decision Boundaries</h3>
                <div id="box" class="jxgbox" style="width:300px; height:300px;float: left;"></div>
              </div>
              <div style="width: 48%;float: right;">
                <h3 style="text-align: center;width: 300px;">After conversion of Feature space to image space</h3>
                <div id="box1" class="jxgbox" style="width:300px; height:300px;float: right;"></div>
              </div>              
            </div>
          </div>

          <br/>
        </div>
      </section>
    <!-- /.content -->
    </div>

    <?php include 'footer.html'; ?>

    <!-- /.content-wrapper -->
  </div>

  <!-- The slider to edit Weights -->
  <div id="edit" style="position: absolute;width: 170px;height: 100px;background: rgba(0,0,0,0.75);border-radius: 20px;top: 0px;left: 0px;text-align: center;">
    <p style="text-align: center;color: white;padding: 5px;">Slide to change weight</p>
    <div id="wslider" class="sliders" style="margin: 0 10px;height: 10px;background: deepskyblue;"></div>
    <button onclick="set(sel)" style="margin: 15px 0;border: none;outline: none;">Set</button>
  </div>

  <!-- The slider to edit Threshold values -->
  <div id="edit_th" style="position: absolute;width: 170px;height: 100px;background: rgba(0,0,0,0.75);border-radius: 20px;top: 0px;left: 0px;text-align: center;z-index: 99">
    <p style="text-align: center;color: white;padding: 5px;">Slide to change threshold</p>
    <div id="tslider" class="tsliders" style="margin: 0 10px;height: 10px;background: deepskyblue;"></div>
    <button onclick="set_th()" style="margin: 15px 0;border: none;outline: none;">Set</button>
  </div>

  <!-- The slider to edit Bias values -->
  <div id="edit_b" style="position: absolute;width: 170px;height: 100px;background: rgba(0,0,0,0.75);border-radius: 20px;top: 0px;left: 0px;text-align: center;z-index: 99">
    <p style="text-align: center;color: white;padding: 5px;">Slide to change bias</p>
    <div id="tslider" class="bsliders" style="margin: 0 10px;height: 10px;background: deepskyblue;"></div>
      <button onclick="set_b()" style="margin: 15px 0;border: none;outline: none;">Set</button>
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
<!-- Editing weights -->
<script type="text/javascript">
  var sel = 1;
  var LEFT = 700,TOP = 500;
  $("#edit").hide();
  $("#edit_th").hide();
  $("#edit_b").hide();

  var changing = 0;
  function editWeights(id) {
    if (counter > 0 && counter < 4) {
      alert('Finish the simulation first!');
      return;
    }
    if (changing == 1) {
      alert('Save the value first');
      return;
    }

    changing = 1;
    sel = id;
    id = "w" + id;

    $("#" + id).removeClass("not_sel");
    $("#" + id).addClass("selected");
    var x = document.getElementById(id);
    var e = document.getElementById('edit');

    var val = $("#t" + sel).html();
    $(".sliders").slider("value", val);
    var l, t;
    l = LEFT;
    e.style.left = l + "px";
    t = TOP;
    e.style.top = t + "px";
    $("#edit").show();
  }

  function editThreshold() {
    if (counter > 0 && counter < 4) {
      alert('Finish the simulation first!');
      return;
    }
    if (changing == 1) {
      alert('Save the value first');
      return;
    }

    changing = 1;
    var e = document.getElementById('edit_th');

    var val = $("#thresh").html();
    $(".tsliders").slider("value", val);
    var l, t;
    l = LEFT;
    e.style.left = l + "px";
    t = TOP;
    e.style.top = t + "px";
    $("#edit_th").show();
  }

  function editBias(id) {
    if (counter > 0 && counter < 4) {
      alert('Finish the simulation first!');
      return;
    }
    if (changing == 1) {
      alert('Save the value first');
      return;
    }
    sel = id;

    if (sel < 3) $("#c" + id).removeClass("hneuron");
    else $("#c" + id).removeClass("opneuron");
    $("#c" + id).addClass("neuron_sel");

    var val = $("#b" + id).html();
    $(".bsliders").slider("value", val);
    changing = 1;
    var e = document.getElementById('edit_b');

    var l, t;
    l = LEFT;
    e.style.left = l + "px";
    t = TOP;
    e.style.top = t + "px";
    $("#edit_b").show();
  }

  function set(id) {
    var e = document.getElementById('edit');

    $("#w" + id).removeClass("selected");
    $("#w" + id).addClass("not_sel");
    $("#edit").hide();
    $(".sliders").slider("value", 0, 0);
    changing = 0;
  }

  function set_th() {
    changing = 0;
    $("#edit_th").hide();
    $(".tsliders").slider("value", 0, 0);
  }

  function set_b() {
    changing = 0;
    $("#c" + sel).removeClass("neuron_sel");
    if (sel < 3) $("#c" + sel).addClass("hneuron");
    else $("#c" + sel).addClass("opneuron");
    $("#edit_b").hide();
    $(".bsliders").slider("value", 0, 0);
  }
</script>