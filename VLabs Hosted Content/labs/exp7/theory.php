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
                      <p>
                        The Self-Organizing Map is one of the most popular neural network models.
                        It belongs to the category of competitive learning networks.
                        The Self-Organizing Map is based on unsupervised learning, which means that no human intervention is needed during the learning and that little needs to be known about the characteristics of the input data. We could, for example, use the SOM for clustering data without knowing the class memberships of the input data.
                      </p>
                      <p>
                        Self-organizing neural networks are used to cluster input patterns into groups of similar patterns.
                        They're called "maps" because they assume a topological structure among their cluster units; effectively mapping weights to input data.
                        The artificial neural network introduced by the Finnish professor Teuvo Kohonen in the 1980s is sometimes called a <b>Kohonen map</b> or <b>network</b>.
                        The Kohonen network is probably the best example, because it's simple, yet introduces the concepts of self-organization and unsupervised learning easily.
                        Each weight is representative of a certain input.
                        Input patterns are shown to all neurons simultaneously.
                      </p>
                      <p>
                        The structure of a self-organizing map involves m output neurons, which correspond to m output clusters, and n input neurons which correspond to the n-dimensionality of the dataset.
                      </p>
                      <img src="images/ksom_struct.png" />
                      <p>
                        The weight vectors define each cluster.
                        Input patterns are compared to each cluster, and associated with the cluster it best matches.
                        The comparison is usually based on the square of the minimum Euclidean distance.
                        When a best match is found, the associated cluster gets its weights updated.
                        KSOM is based on the Winner-Takes-All learning rule.
                      </p>
                      <p>
                        The learning rate α alpha is a slowly decreased with each epoch.
                        The size or radius of the neighbourhood around a cluster unit can also decrease during the later epochs.
                      </p>
                      <p>
                        The formation of a map occurs in two stages:
                        <ol>
                          <li>The initial formation of the correct order</li>
                          <li>The final convergence</li>
                        </ol>
                        <br />The second stage takes much longer, and usually occurs when the learning rate gets smaller. The initial weights can be random values.
                      </p>
                      <p>
                        Following is the flowchart which shows the algorithm used in KSOM:
                        <img src="images/ksom_FC.png" />
                        <br />Stopping Condition here refers to if number of epochs to be performed as been reached, or there are small number of changes in input mappings.
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
