<?php
		session_start();
		$_SESSION["currPage"]=2;
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
							A <b>MultiLayer Perceptron (MLP)</b> is a feedforward artificial neural network model that maps sets of input data onto a set of appropriate outputs. An MLP consists of multiple layers of nodes in a directed graph, with each layer fully connected to the next one. Except for the input nodes, each node is a neuron (or processing element) with a nonlinear activation function. MLP utilizes a supervised learning technique called backpropagation for training the network. MLP is a modification of the standard linear perceptron and can distinguish data that are not linearly separable.
							<br />
							The multilayer perceptron consists of three or more layers (an input and an output layer with one or more hidden layers) of nonlinearly-activating nodes and is thus considered a deep neural network. Since an MLP is a Fully Connected Network, each node in one layer connects with a certain weight wij  t{\displaystyle w_{ij}}to every node in the following layer. Some people do not include the input layer when counting the number of layers and there is disagreement about whether wij {\displaystyle w_{ij}}should be interpreted as the weight from i to j or the other way around.
							<br /><br />
							<b>FeedForward MultiLayer Perceptron:-</b>
							<br />
							This class of networks consists of multiple layers of computational units, usually interconnected in a feed-forward way. Each neuron in one layer has directed connections to the neurons of the subsequent layer. In many applications the units of these networks apply a <b>sigmoid</b> function as an activation function.
							In the mathematical theory of artificial neural networks, the <b>Universal Approximation Theorem</b> states that a feed-forward network with a single hidden layer containing a finite number of neurons can approximate continuous functions on compact subsets of Rn, under mild assumptions on the activation function. The theorem thus states that simple neural networks can represent a wide variety of interesting functions when given appropriate parameters; however, it does not touch upon the algorithmic learnability of those parameters.
                            <br><br></p>
                            <img src="mlp.jpg" style="width:274px;height:228px;">
                    
                            <p><br><br>
                            <b>Error Back Propagation MLP :-</b>
                            <br>
                            The Error Backward Propagation or backpropagation, is a common method of training artificial neural networks and used in conjunction with an optimization method such as gradient descent. The algorithm repeats a two phase cycle, propagation and weight update. When an input vector is presented to the network, it is propagated forward through the network, layer by layer, until it reaches the output layer. The output of the network is then compared to the desired output, using a loss function, and an error value is calculated for each of the neurons in the output layer. The error values are then propagated backwards, starting from the output, until each neuron has an associated error value which roughly represents its contribution to the original output.<br>
                            Backpropagation uses these error values to calculate the gradient of the loss function with respect to the weights in the network. In the second phase, this gradient is fed to the optimization method, which in turn uses it to update the weights, in an attempt to minimize the loss function.
                            The importance of this process is that, as the network is trained, the neurons in the intermediate layers organize themselves in such a way that the different neurons learn to recognize different characteristics of the total input space. After training, when an arbitrary input pattern is present which contains noise or is incomplete, neurons in the hidden layer of the network will respond with an active output if the new input contains a pattern that resembles a feature that the individual neurons have learned to recognize during their training.<br>
                            Backpropagation requires a known, desired output for each input value in order to calculate the loss function gradient – it is therefore usually considered to be a supervised learning method; nonetheless, it is also used in some unsupervised networks such as auto encoders. It is a generalization of the delta rule to multi-layered feedforward networks, made possible by using the chain rule to iteratively compute gradients for each layer. Backpropagation requires that the activation function used by the artificial neurons (or "nodes") be differentiable.<br><br></p>
                    
                            <img src="EBP.jpg" style="width:404px;height:300px;">
                            <p><br>
                            <b>It Consists of 2 Phases :-</b><br><br>
                            <b>Phase 1: Propagation</b><br>
                            Each propagation involves the following steps:<br>
                            <b>1.</b>	Forward propagation of a training pattern's input through the neural network in order to generate the network's output value(s).<br>
                            <b>2.</b>	Backward propagation of the propagation's output activations through the neural network using the training pattern target in order to generate the deltas (the difference between the targeted and actual output values) of all output and hidden neurons.<br><br>

                            <b>Phase 2: Weight update</b><br>
                            For each weight, the following steps must be followed:<br>
                            <b>1.</b>	The weight's output delta and input activation are multiplied to find the gradient of the weight.<br>
                            <b>2.</b>  	 A ratio (percentage) of the weight's gradient is subtracted from the weight.<br>
                            This ratio (percentage) influences the speed and quality of learning; it is called the learning rate. The greater the ratio, the faster the neuron trains, but the lower the ratio, the more accurate the training is.<br> The sign of the gradient of a weight indicates whether the error varies directly with, or inversely to, the weight. Therefore, the weight must be updated in the opposite direction, "descending" the gradient.<br>
                            Phases 1 and 2 are repeated until the performance of the network is satisfactory.

                            
							
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