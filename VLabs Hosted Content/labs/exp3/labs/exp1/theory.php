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
                        <p class="MsoNormal" style="text-align:justify; font-size: 18px">
                            A <b>Radial Basis Function Network (RBFN)</b> is a particular type of neural network. 
The RBFN approach is more intuitive than the MLP. An RBFN performs classification by measuring the input’s similarity to examples from the training set. Each RBFN neuron stores a “prototype”, which is just one of the examples from the training set. When we want to classify a new input, each neuron computes the Euclidean distance between the input and its prototype. Thus, if the input more closely resembles the class A prototypes than the class B prototypes, it is classified as class A.

<br>

<b>RBF Network Architecture</b>
<br>
<img src="architecture_simple2.png" style="width:450px;height:300px;">
  <br>
  <br>                         
The above illustration shows the typical architecture of an RBF Network. It consists of an input vector, a layer of RBF neurons, and an output layer with one node per category or class of data.
<br>
<b>The Input Vector</b>
<br>
The input vector is the n-dimensional vector that you are trying to classify. The entire input vector is shown to each of the RBF neurons.

<br>
<b>The RBF Neurons:</b>
<br>
Each RBF neuron stores a “prototype” vector which is just one of the vectors from the training set. Each RBF neuron compares the input vector to its prototype, and outputs a value between 0 and 1 which is a measure of similarity. If the input is equal to the prototype, then the output of that RBF neuron will be 1. As the distance between the input and prototype grows, the response falls off exponentially towards 0.  The shape of the RBF neuron’s response is a bell curve, as illustrated in the network architecture diagram.
The neuron’s response value is also called its “activation” value.
The prototype vector is also often called the neuron’s “center”, since it’s the value at the center of the bell curve.
<br>
                            <b>The Output Nodes:</b>
                            <br >
                            The output of the network consists of a set of nodes, one per category that we are trying to classify. Each output node computes a sort of score for the associated category. Typically, a classification decision is made by assigning the input to the category with the highest score.
The score is computed by taking a weighted sum of the activation values from every RBF neuron. By weighted sum we mean that an output node associates a weight value with each of the RBF neurons, and multiplies the neuron’s activation by this weight before adding it to the total response.
Because each output node is computing the score for a different category, every output node has its own set of weights. The output node will typically give a positive weight to the RBF neurons that belong to its category, and a negative weight to the others.

                            <br>
<b>RBF Neuron Activation Function:</b>
                            <br >
                            Each RBF neuron computes a measure of the similarity between the input and its prototype vector (taken from the training set). Input vectors which are more similar to the prototype return a result closer to 1. There are different possible choices of similarity functions, but the most popular is based on the Gaussian. Below is the equation for a Gaussian with a one-dimensional input.

                            <br>
                            
                            <img src="eqtn.png" style="width:274px;height:100px;">
                            <br>
                            Where x is the input, mu is the mean, and sigma is the standard deviation. This produces the familiar bell curve shown below, which is centered at the mean, mu (in the below plot the mean is 5 and sigma is 1).
                            <br>
                            <img src="bell_curve.png" style="width:400px;height:200px;">
                            <br>
                            The RBF neuron activation function is slightly different, and is typically written as:
                            <br>
                            <img src="activation_equation.png" style="width:200px;height:100px;">
                            <br>
                            In the Gaussian distribution, mu refers to the mean of the distribution. Here, it is the prototype vector which is at the center of the bell curve.
For the activation function, phi, we aren’t directly interested in the value of the standard deviation, sigma, so we make a couple simplifying modifications.
The first change is that we’ve removed the outer coefficient, 1 / (sigma * sqrt(2 * pi)). This term normally controls the height of the Gaussian. Here, though, it is redundant with the weights applied by the output nodes. During training, the output nodes will learn the correct coefficient or “weight” to apply to the neuron’s response.
The second change is that we’ve replaced the inner coefficient, 1 / (2 * sigma^2), with a single parameter ‘beta’. This beta coefficient controls the width of the bell curve. Again, in this context, we don’t care about the value of sigma, we just care that there’s some coefficient which is controlling the width of the bell curve. So we simplify the equation by replacing the term with a single variable.
                            <br>

                            <img src="diff_variances_plot.png" style="width:400px;height:200px;">
                            <br>
                            RBF Neuron activation for different values of beta
There is also a slight change in notation here when we apply the equation to n-dimensional vectors. The double bar notation in the activation equation indicates that we are taking the Euclidean distance between x and mu, and squaring the result. For the 1-dimensional Gaussian, this simplifies to just (x - mu)^2.
It’s important to note that the underlying metric here for evaluating the similarity between an input vector and a prototype is the Euclidean distance between the two vectors.
Also, each RBF neuron will produce its largest response when the input is equal to the prototype vector. This allows to take it as a measure of similarity, and sum the results from all of the RBF neurons.
As we move out from the prototype vector, the response falls off exponentially. Recall from the RBFN architecture illustration that the output node for each category takes the weighted sum of every RBF neuron in the network–in other words, every neuron in the network will have some influence over the classification decision. The exponential fall off of the activation function, however, means that the neurons whose prototypes are far from the input vector will actually contribute very little to the result.
If you are interested in gaining a deeper understanding of how the Gaussian equation produces this bell curve shape, check out my post on the Gaussian Kernel.
<br>
<b>RBFN as a Neural Network</b>
<br>
Below is another version of the RBFN architecture diagram.
<br>
<img src="neuralxor.png" style="width:400px;height:300px;">
<br>
Here the RBFN is viewed as a “3-layer network” where the input vector is the first layer, the second “hidden” layer is the RBF neurons, and the third layer is the output layer containing linear combination neurons.
One bit of terminology that really had people confused for a while is that the prototype vectors used by the RBFN neurons are sometimes referred to as the “input weights”. I generally think of weights as being coefficients, meaning that the weights will be multiplied against an input value. Here, though, we’re computing the distance between the input vector and the “input weights” (the prototype vector).
<br>
                           
                            
                        
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

