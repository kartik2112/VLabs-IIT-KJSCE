<?php
    session_start();
    $_SESSION["currPage"] = 5;
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
        <!-- Simulation scripts start-->

        <!-- jQuery 2.2.3 -->
        <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../plugins/jQueryUI/jquery-ui.min.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

               
        <!--Here is the main CSS file that adds more touch to the simulation and other stuff-->
        <link href="../../src/Styles.css" rel="stylesheet" />


        <!--<script src='https://cdn.rawgit.com/naptha/tesseract.js/1.0.10/dist/tesseract.js'></script>-->
        <script type="text/javascript" src="../../src/tesseract.js"></script> 

        <!-- Simulation scripts end-->
        <style>
            .dlImage{
                border-radius: 50%;      
                transition: all 0.2s;         
            }
            .dlImage:hover{                
                box-shadow: 3px 3px 10px #8BA7BD;
            }
        </style>
        <script>
            function runOCR(url) {
                document.getElementById("statusProgressBar").classList.add('active');
                Tesseract.recognize(url)
                    .then(function (result) {
                        if (result.text == "") {
                            alert("The selected image is of poor quality! No text has been detected! To see the recognition in action either upload a clearer image or use the downloadable images provided on this page!");
                        }
                        document.getElementById("ocr_results").innerHTML = result.text;
                        console.log(result);
                        $("#ocr_results").fadeIn(1000);
                        $("#loadingImg").slideUp(500);
                        $("#successImg").slideDown(500);
                        document.getElementById("statusProgressBar").classList.remove('active');
                        $("#displayCanvasSwitchOuter").fadeIn(400);

                        var canv = document.getElementById("cvs");
                        var ctxt = canv.getContext("2d");

                        var scalingFactor = document.getElementById("img1").clientHeight / document.getElementById("img1").naturalHeight;

                        timeIndex = 0;
                        var baseMultiplier = 2000 / result.words.length;
                        result.words.forEach(function (w) {
                            window.setTimeout(function () {
                                var bbox = w.bbox;
                                ctxt.beginPath();
                                ctxt.strokeStyle = "red";
                                ctxt.lineWidth = "2";
                                ctxt.rect(Math.floor(bbox.x0 * scalingFactor), Math.floor(bbox.y0 * scalingFactor), Math.floor((bbox.x1 - bbox.x0) * scalingFactor), Math.floor((bbox.y1 - bbox.y0)) * scalingFactor);
                                ctxt.stroke();
                            }, baseMultiplier * timeIndex);
                            timeIndex++;
                        });
                    }).progress(function (result) {
                        document.getElementById("statusProgressBar").innerHTML = (parseFloat((result["progress"] * 100).toFixed(2))) + "%";
                        document.getElementById("statusProgressBar").style.width = (parseFloat((result["progress"] * 100).toFixed(2))) + "%";
                        document.getElementById("ocr_status").innerText = result["status"];
                    });
            }


            function loadImg(elem) {
                if (elem.files && (elem.files[0].type.endsWith("jpg") || elem.files[0].type.endsWith("png") || elem.files[0].type.endsWith("bmp") || elem.files[0].type.endsWith("jpeg"))) {
                    alert("File accepted");
                    var reader = new FileReader();

                    var cvs = document.getElementById('cvs');
                    var ctxt = cvs.getContext("2d");

                    reader.addEventListener("load", function (e) {
                        var img = document.getElementById("img1");
                        img.src = e.target.result;
                        cvs.height = img.height;
                        cvs.width = img.width;
                        ctxt.clearRect(0, 0, cvs.clientWidth, cvs.clientHeight);
                    });

                    reader.readAsDataURL(elem.files[0]);
                }
                else {
                    alert("File format not supported\nOnly .jpg, .jpeg, .bmp, .png Formats are Supported");
                    elem.value = '';
                    document.getElementById('img1').src = './images/no_img.png';
                }
            }

            $(document).ready(function () {
                document.getElementById("img1").addEventListener("load", function (e) {
                    var img = document.getElementById("img1");
                    var canv = document.getElementById("cvs");
                    canv.height = img.height;
                    canv.width = img.width;
                    $("#img1").unbind("load");
                });

                document.getElementById("fileInput").addEventListener("change", function (e) {
                    $("#loadingImg").css("display", "none");
                    $("#successImg").css("display", "none");
                    $("#statusProgressBarOuter").css("display", "none");
                    $("#displayCanvasSwitchOuter").css("display", "none");
                    $("#ocr_results").html("");
                    $("#ocr_status").html("");
                    loadImg(this);
                });

                /*document.getElementById("img1").addEventListener("change",function(e){
                var img = document.getElementById("img1");
                var canv = document.getElementById("cvs");
                alert(img.style.marginLeft);
                canv.style.marginLeft=img.style.marginLeft;
                });*/

                document.getElementById("go_button").addEventListener("click", function (e) {
                    var img = document.getElementById("img1");
                    var canv = document.getElementById("cvs");
                    console.log(canv);
                    console.log(img);
                    if ($("#img1").attr("src") != './images/no_img.png') {
                    	$("#successImg").css("display", "none");
	                    $("#statusProgressBarOuter").css("display", "none");
	                    $("#ocr_results").html("");
	                    
                        $('html, body').animate({
                            scrollTop: $("#cvs").offset().top
                        }, 300);
                        $("#loadingImg").slideDown(500);
                        $("#statusProgressBarOuter").slideDown(200);
                        runOCR(img);
                    }
                    else {
                        alert("Upload image to recognize text!");
                    }
                });

                $("#displayCanvasSwitch").change(function () {
                    if (this.checked) {
                        $("#cvs").fadeIn(500);
                    }
                    else {
                        $("#cvs").fadeOut(500);
                    }
                });
            });
        </script>
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
                            <li class="active">Simulation</li>
                        </ol>
                    </section>
                </nav>
            </header>
            <?php include 'pane.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center"><?php echo $exp_name?></h1>
                    <!-- Write your experiment name -->
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
                    <!--Simulation content goes here -->

                    <form action="#">
                        <!--<input type="text" id="url" placeholder="Image URL" />-->
                        <input type="file" id="fileInput" class="btn btn-warning" style="display:inline-block;"/>                        
                        <input type="button" class="btn btn-success" id="go_button" value="Run" /> 
                        &emsp;<a href="./images/test1.jpg" download target="_blank"><img src="./images/dl_Link.png" height="40px" class="dlImage" data-toggle="tooltip" data-placement="top" title="Download Sample Image 1 for OCR"/></a>
                        &emsp;<a href="./images/test2.jpg" download target="_blank"><img src="./images/dl_Link.png" height="40px" class="dlImage" data-toggle="tooltip" data-placement="top" title="Download Sample Image 2 for OCR"/></a>
                        <br><br>
                    </form>

                    <div class="row">
                        <div class="col-sm-5">
                            <div style="position:relative;">
                                <canvas id="cvs" style="position:absolute; z-index:5; left:0px; top:0px; display:block;"></canvas>
                                <img id="img1" src="./images/no_img.png" style="position:relative; max-width:100%; display:block;" /><br/>
                                <div id="displayCanvasSwitchOuter" style="display: none;">
                                    <h4>Bounding Boxes Visibility: </h4> 
                                    <label class="switch123">
                                        <input id="displayCanvasSwitch" type="checkbox" checked="checked">
                                        <div class="sliderSwitch round"></div>
                                    </label>
                                </div>                                
                            </div>                            
                        </div>

                        <div class="col-sm-2">
                            <img src="./images/scan-animation-fast.gif" id="loadingImg" style="max-width:100%; margin:auto; display:none;" />
                            <img src="./images/success.png" id="successImg" style="max-width:100%; margin:auto; display:none;" />                            
                            <div id="ocr_status" style="margin:auto"></div>
                            <div id="statusProgressBarOuter" class="progress" style="display:none">
                                <div id="statusProgressBar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-5" id="ocr_results"></div>
                    </div>
                    <br><br>
                </section>
                <!-- /.content -->
            </div>
            <?php include 'footer.html'; ?>
            <!-- /.content-wrapper -->
        </div>
    </body>
</html>


<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
