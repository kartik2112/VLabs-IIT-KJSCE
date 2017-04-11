[1mdiff --cc VLabs Hosted Content/labs/Styles.css[m
[1mindex 3d05182,5b180c0..0000000[m
[1m--- a/VLabs Hosted Content/labs/Styles.css[m
[1m+++ b/VLabs Hosted Content/labs/Styles.css[m
[36m@@@ -87,10 -87,4 +87,13 @@@[m [mbutton.displayActivatedButton[m
  [m
  .jxgbox{[m
      background-color: rgba(236, 240, 245, 0.85)!important;[m
[32m++<<<<<<< HEAD[m
[32m +}[m
[32m +[m
[32m +.testAns{[m
[32m +    color: #ff4600;[m
[32m +    font-size: 20px;[m
[32m +    font-weight: bolder;[m
[32m++=======[m
[32m++>>>>>>> origin/exp3-master[m
  }[m
[1mdiff --cc VLabs Hosted Content/labs/exp3/index.php[m
[1mindex 0c7836d,c8971ec..0000000[m
[1m--- a/VLabs Hosted Content/labs/exp3/index.php[m
[1m+++ b/VLabs Hosted Content/labs/exp3/index.php[m
[36m@@@ -72,7 -72,7 +72,11 @@@[m
                      <h3 style="margin-top:5%"> Aim </h3>[m
                      <p style="font-size:130%; margin-top:2%">[m
                          <!--Aim of experiment -->[m
[32m++<<<<<<< HEAD:VLabs Hosted Content/labs/exp1/index.php[m
[32m +                        To understand the basics of how neural network works using AND, OR, NOT Gates implemented using a single neuron of neural network[m
[32m++=======[m
[32m+                         To Implement Ex-OR Gate using Radial Basis Function Network[m
[32m++>>>>>>> origin/exp3-master:VLabs Hosted Content/labs/exp3/index.php[m
                      </p>[m
                  </section>                [m
              </div>[m
[1mdiff --cc VLabs Hosted Content/labs/exp3/lab_name.php[m
[1mindex ff7d283,bdec832..0000000[m
[1m--- a/VLabs Hosted Content/labs/exp3/lab_name.php[m
[1m+++ b/VLabs Hosted Content/labs/exp3/lab_name.php[m
[36m@@@ -1,7 -1,7 +1,13 @@@[m
  <?php [m
[32m++<<<<<<< HEAD:VLabs Hosted Content/labs/exp1/lab_name.php[m
[32m +$lab_name = "Neural Networks Lab";[m
[32m +[m
[32m +$exp_name = "Introduction to Neural Networks using Logic Gates";[m
[32m++=======[m
[32m+ $lab_name = "Machine Learning";[m
[32m+ [m
[32m+ $exp_name = "XOR Using RBFN";[m
[32m++>>>>>>> origin/exp3-master:VLabs Hosted Content/labs/exp3/lab_name.php[m
  [m
  $_SESSION['lab_name'] = $lab_name;[m
  $_SESSION['exp_name'] = $exp_name;[m
[1mdiff --cc VLabs Hosted Content/labs/exp3/posttest.php[m
[1mindex c9071b8,e70522d..0000000[m
[1m--- a/VLabs Hosted Content/labs/exp3/posttest.php[m
[1m+++ b/VLabs Hosted Content/labs/exp3/posttest.php[m
[36m@@@ -101,104 -73,61 +101,162 @@@[m
                      <h3 style="margin-top:5%">Post Test</h3>[m
                      <p class="MsoNormal" style="text-align:justify">[m
                          <!-- Post Test content goes here -->[m
[32m++<<<<<<< HEAD:VLabs Hosted Content/labs/exp1/posttest.php[m
[32m +                        <div>[m
[32m +                            <h3>1. Which of the following can be the correct combination of weights & threshold for the neural network to function as an OR Gate?</h3>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio1" value="Q11">A<table class="table-condensed truthTable" style="text-align: center;">[m
[32m +                                            <tr><th>W1</th><th>W2</th><th>Threshold</th></tr>[m
[32m +                                            <tr><td>0</td><td>0</td><td >0</td></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio1" value="Q12">B<table class="table-condensed truthTable" style="text-align: center;">[m
[32m +                                            <tr><th>W1</th><th>W2</th><th>Threshold</th></tr>[m
[32m +                                            <tr><td>0</td><td>0</td><td style="text-align: center;">1</td></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio1" value="Q13">C<table class="table-condensed truthTable" style="text-align: center;">[m
[32m +                                            <tr><th>W1</th><th>W2</th><th>Threshold</th></tr>[m
[32m +                                            <tr><td>1</td><td>0</td><td style="text-align: center;">0</td></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio1" value="Q14">D<table class="table-condensed truthTable" style="text-align: center;">[m
[32m +                                            <tr><th>W1</th><th>W2</th><th>Threshold</th></tr>[m
[32m +                                            <tr><td>1</td><td>1</td><td style="text-align: center;">0.5</td></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div><br />[m
[32m +                            <p id="optradio1Ans" class="testAns" style="display:none;"> Ans is D</p>[m
[32m +                        </div>[m
[32m +                    [m
[32m +                        <div>[m
[32m +                            <h3>2. The experiment performed can be considered as an example of which of the following type of learning?</h3>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio2" id="Q12"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>A. Supervised Learning</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio2" id="Q22"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>B. Unsupervised Learning</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio2" id="Q23"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>C. Reinforcement Learning</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div><br />[m
[32m +                            <p id="optradio2Ans" class="testAns" style="display:none;"> Ans is A</p>[m
[32m +                        </div>[m
[32m +[m
[32m +                        <div>[m
[32m +                            <h3>3.Given the weights W1 = 0.4 & W2 = 0.3, what should be the threshold value for the neural network to function as AND Gate?</h3>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio3" id="Q31"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>A. Greater than 0 but less than 0.3</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio3" id="Q32"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>B. Greater than 0.3 but less than 0.4</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio3" id="Q33"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>C. Greater than 0.4 but less than 1</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio3" id="Q34"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>D. Greater than 1</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div><br />[m
[32m +                            <p id="optradio3Ans" class="testAns" style="display:none;"> Ans is C</p>[m
[32m +                        </div>[m
[32m +                            [m
[32m +                        <div>[m
[32m +                            <h3>4. Which of the following Gates cannot be implemented using single layer perceptron model?</h3>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio4" id="Q41"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>A. AND</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio4" id="Q42"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>B. OR</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio4" id="Q43"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>C. NOT</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio4" id="Q44"><table class="table-condensed" style="text-align: center;">[m
[32m +                                            <tr><th>D. XOR</th></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div><br />[m
[32m +                            <p id="optradio4Ans" class="testAns" style="display:none;"> Ans is D</p>[m
[32m +                        </div>[m
[32m++=======[m
[32m+                          <script>[m
[32m+ [m
[32m+                   function result()[m
[32m+                   {  [m
[32m+                       if(document.querySelector('input[name="q1"]:checked').value == 1)[m
[32m+                           document.getElementById("a1").innerHTML = "1) Correct";[m
[32m+                       else[m
[32m+                           document.getElementById("a1").innerHTML =  "1) Wrong";[m
[32m+                       if(document.querySelector('input[name="q2"]:checked').value == 3)[m
[32m+                           document.getElementById("a2").innerHTML = "2) Correct";[m
[32m+                       else[m
[32m+                           document.getElementById("a2").innerHTML =  "2) Wrong";[m
[32m+                      [m
[32m+                       [m
[32m+                } [m
[32m+             [m
[32m+             </script>[m
[32m+               [m
[32m+             [m
[32m+               <br>[m
[32m+               1. Why RBFN is better than Multi layer Perceptron (MLP)?<br>[m
[32m+               <input type="radio" name="q1" value="1">[m
[32m+               "Because RBFN performs classification by measuring the input’s similarity to the examples from the training set"[m
[32m+               <br>[m
[32m+               <input type="radio" name="q1" value="2">[m
[32m+               "Because it is easy to solve complex network problem by RBFN than MLP"[m
[32m+               <br>[m
[32m+               <input type="radio" name="q1" value="3">[m
[32m+               "Because RBFN has one single hidden layer"[m
[32m+               <br>[m
[32m+               <input type="radio" name="q1" value="4">[m
[32m+               "None of these"[m
[32m+               <br><br>[m
[32m+               2. If  the  difference  between  the  input  and  the  prototype  increases ,what will be the effect  on the total response?<br>[m
[32m+               <input type="radio" name="q2" value="1">[m
[32m+               "The response will increase exponentially"[m
[32m+               <br>[m
[32m+               <input type="radio" name="q2" value="2">[m
[32m+               "The response will increase linearly"[m
[32m+               <br>[m
[32m+               <input type="radio" name="q2" value="3">[m
[32m+               "The response will fall exponentially"[m
[32m+               <br>[m
[32m+               <input type="radio" name="q2" value="4">[m
[32m+               "The response will not change"[m
[32m+               <br><br>[m
[32m+               [m
[32m+             [m
[32m+               <input type="button" value="Evaluate" onclick="result()">[m
[32m+               [m
[32m+               <h3 id="a1"></h3>[m
[32m+               <h3 id="a2"></h3>[m
[32m+              [m
[32m+             [m
[32m+             [m
[32m++>>>>>>> origin/exp3-master:VLabs Hosted Content/labs/exp3/posttest.php[m
                      </p>[m
                  </section>[m
                  <!-- /.content -->[m
[1mdiff --cc VLabs Hosted Content/labs/exp3/pretest.php[m
[1mindex a882d11,e2e7e27..0000000[m
[1m--- a/VLabs Hosted Content/labs/exp3/pretest.php[m
[1m+++ b/VLabs Hosted Content/labs/exp3/pretest.php[m
[36m@@@ -95,90 -73,58 +95,145 @@@[m
                      <h3 style="margin-top:5%">Pre Test</h3>[m
                      <p class="MsoNormal" style="text-align:justify">[m
                          <!-- Pre Test content goes here -->[m
[32m++<<<<<<< HEAD:VLabs Hosted Content/labs/exp1/pretest.php[m
[32m +                        <div>[m
[32m +                            <h3>1. Which of the following is the truth table of NOT Gate?</h3>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio1" name="optradio1" id="Q11">A<table class="table-condensed truthTable" style="text-align: center;">[m
[32m +                                            <tr><th>I/P</th><th>O/P</th></tr>[m
[32m +                                            <tr><td>0</td><td>0</td></tr>[m
[32m +                                            <tr><td>1</td><td>1</td></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio1" name="optradio1" id="Q12">B<table class="table-condensed truthTable" style="text-align: center;">[m
[32m +                                            <tr><th>I/P</th><th>O/P</th></tr>[m
[32m +                                            <tr><td>0</td><td>1</td></tr>[m
[32m +                                            <tr><td>1</td><td>0</td></tr>[m
[32m +                                            </table></label>[m
[32m +                            </div>[m
[32m +                            <div class="radio">[m
[32m +                                <label><input type="radio" class="optradio1" name="optradio1" id="Q13">C<table class="table-condensed truthTa