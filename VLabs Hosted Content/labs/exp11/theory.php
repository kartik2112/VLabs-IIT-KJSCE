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
                            Optical character recognition (also optical character reader, OCR) is the mechanical or electronic conversion of images of typed, handwritten or printed text into machine-encoded text, whether from a scanned document, a photo of a document, a scene-photo (for example the text on signs and billboards in a landscape photo) or from subtitle text superimposed on an image (for example from a television broadcast). 
                            It is widely used as a form of information entry from printed paper data records, whether passport documents, invoices, bank statements, computerised receipts, business cards, mail, printouts of static-data, or any suitable documentation. 
                            It is a common method of digitising printed texts so that they can be electronically edited, searched, stored more compactly, displayed on-line, and used in machine processes such as cognitive computing, machine translation, (extracted) text-to-speech, key data and text mining. 
                            OCR is a field of research in pattern recognition, artificial intelligence and computer vision.
                        </p>
                        <p>
                            Early versions needed to be trained with images of each character, and worked on one font at a time. 
                            Advanced systems capable of producing a high degree of recognition accuracy for most fonts are now common, and with support for a variety of digital image file format inputs. 
                            Some systems are capable of reproducing formatted output that closely approximates the original page including images, columns, and other non-textual components.
                        </p>
                        <p>
                            OCR can be done in many ways such as by using Contours, by training a network according to the type of recognition wanted ( Handwritten, Recognition of Latex Code or a Specific Language), by using a commercial or Open-Source engine such as Google Vision API, Google Tesseract, Infyt Reader.
                        </p>
                        <h2>Different phases required for OCR are:</h2>
                        <ol>
                            <li>
                                <h3><b>Pre-processing:</b></h3>
                                The raw data is subjected to a number of preliminary processing steps to make it usable in the descriptive stages of character analysis. Pre-processing aims to produce data that are easy for the OCR systems to operate accurately. The main objectives of pre-processing are:
                                <ul>
                                    <li>
                                        <b>Binarization: </b>Convert an image from color or greyscale to black-and-white (called a "binary image" because there are two colours). 
                                        The task of binarisation is performed as a simple way of separating the text (or any other desired image component) from the background.
                                        <img style="display:block;margin-left: 10%;" src="./images/theory/binarization.png" alt="Binarization Pic"/>
                                    </li>
                                    <li>
                                        <b>Noise Reduction(Despeckle): </b>Remove positive and negative spots, smoothing edges.
                                        <div style="display:block;margin-left: 10%">
                                            <img src="./images/theory/despeckle-1_1.png" width="170px" alt="Pic"/>
                                            <img src="./images/arrow.png" width="100px" alt="Pic"/>
                                            <img src="./images/theory/despeckle-1_2.png" width="170px" alt="Pic"/>
                                        </div>
                                        <br/>
                                        <div style="display:block;margin-left: 10%">
                                            <img src="./images/theory/despeckle-2_1.png" width="100px" alt="Pic" style="margin-left: 35px"/>
                                            <img src="./images/arrow.png" width="100px" alt="Pic" style="margin-left: 35px"/>
                                            <img src="./images/theory/despeckle-2_2.png" width="100px" alt="Pic" style="margin-left: 35px"/>
                                        </div>
                                    </li>
                                    <li>
                                        <b>Skew Correction: </b>If the document was not aligned properly when scanned, it may need to be tilted a few degrees clockwise or counterclockwise in order to make lines of text perfectly horizontal or vertical.
                                        Main approaches for skew detection include correlation, projection profiles, Hough transform.
                                        <div style="display:block;margin-left: 10%">
                                            <img src="./images/theory/deskew_1.png" width="170px" alt="Pic"/>
                                            <img src="./images/arrow.png" width="100px" alt="Pic"/>
                                            <img src="./images/theory/deskew_2.png" width="170px" alt="Pic"/>
                                        </div>
                                    </li>
                                    <li>
                                        <b>Slant Removal: </b>The slant of handwritten texts varies from user to user. Slant removal methods are used to normalize the all characters to a standard form.
                                        Popular deslanting techniques are:
                                        <ul>
                                            <li>Calculation of the average angle of near-vertical elements</li>
                                            <li>Bozinovic – Shrihari Method (BSM)</li>
                                        </ul>
                                        <div style="display:block;margin-left: 10%">
                                            <img src="./images/theory/deslant_1.png" width="120px" alt="Pic" style="margin-left: 25px"/>
                                            <img src="./images/arrow.png" width="100px" alt="Pic" style="margin-left: 25px"/>
                                            <img src="./images/theory/deslant_2.png" width="120px" alt="Pic" style="margin-left: 25px"/>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h3><b>Segmentation:</b></h3>
                                Establishes baseline for word and character shapes, separates words if necessary.
                                <ul>
                                    <li>Text Line Detection (Hough Transform, projections, smearing)</li>
                                    <li>Word Extraction (vertical projections, connected component analysis)</li>
                                </ul>
                                Types of Segmentation:
                                <ul>
                                    <li>
                                        <b>Explicit Segmentation: </b>In explicit approaches one tries to identify the smallest possible word segments (primitive segments) that may be smaller than letters, but surely cannot be segmented further. 
                                        Later in the recognition process these primitive segments are assembled into letters based on input from the character recognizer. 
                                        The advantage of the first strategy is that it is robust and quite straightforward, but is not very flexible.                                        
                                        <div style="display:block;margin-left: 5%">
                                            <img src="./images/theory/segmentation_1.jpg" width="400px" alt="Pic"/>
                                            <img src="./images/arrow.png" width="100px" alt="Pic"/>
                                            <img src="./images/theory/segmentation_2.jpg" width="400px" alt="Pic"/>
                                        </div>
                                    </li>
                                    <li>
                                        <b>Implicit Segmentation: </b>In implicit approaches the words are recognized entirely without segmenting them into letters. 
                                        This is most effective and viable only when the set of possible words is small and known in advance, such as the recognition of bank checks and postal address.
                                        <div style="display:block;margin-left: 10%">
                                            <img src="./images/theory/impl_segmentation_1.png" width="120px" alt="Pic" style="margin-left: 25px"/>
                                            <img src="./images/arrow.png" width="100px" alt="Pic" style="margin-left: 25px"/>
                                            <img src="./images/theory/impl_segmentation_2.png" width="120px" alt="Pic" style="margin-left: 25px"/>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h3><b>Feature Extraction:</b></h3>
                                In feature extraction stage each character is represented as a feature vector, which becomes its identity. 
                                The major goal of feature extraction is to extract a set of features, which maximizes the recognition rate with the least amount of elements. 
                                Due to the nature of handwriting with its high degree of variability and imprecision obtaining these features, is a difficult task. 
                                Feature extraction methods are based on 3 types of features: 
                                <ol>
                                    <li>
                                        <b>Statistical</b>
                                        <ul>
                                            <li>
                                                <b>Zoning: </b>The character image is divided into NxM zones. 
                                                From each zone features are extracted to form the feature vector. 
                                                The goal of zoning is to obtain the local characteristics instead of global characteristics 
                                                <div style="display:block;margin-left: 10%">
                                                    <img src="./images/theory/feature_extraction-zoning_1.png" width="90px" alt="Pic" style="margin-left: 25px"/>
                                                    <img src="./images/arrow.png" width="100px" alt="Pic" style="margin-left: 25px"/>
                                                    <img src="./images/theory/feature_extraction-zoning_2.png" width="90px" alt="Pic" style="margin-left: 25px"/>
                                                </div>
                                                <b>By finding density features:</b> The number of foreground pixels, or the normalized number of foreground pixels, in each cell is considered a feature.
                                                Darker squares indicate higher density of zone pixels.
                                                <div style="display:block;margin-left: 10%">
                                                    <img src="./images/theory/feature_extraction-zoning_dens_1.png" width="90px" alt="Pic" style="margin-left: 25px"/>
                                                    <img src="./images/arrow.png" width="100px" alt="Pic" style="margin-left: 25px"/>
                                                    <img src="./images/theory/feature_extraction-zoning_dens_2.png" width="90px" alt="Pic" style="margin-left: 25px"/>
                                                </div>
                                                <b>By finding directional features(Chain Codes):</b> They are used to represent a boundary by a connected sequence of straight line segments.
                                                As an edge is traced from its beginning point to the end point, the direction that must be taken to move from one pixel to the next is given by the number in the 8-chain code.
                                                The 8-chain code is as follows for the corresponding directions:
                                                <img style="display:block;margin-left: 10%;" src="./images/theory/feature_extraction_chaincodes.png" width="100px" alt="Pic"/><br/>
                                                <img style="display:block;margin-left: 10%;" src="./images/theory/feature_extraction_chaincodes_1.png" width="180px" alt="Pic"/>
                                            </li>
                                            <li>
                                                <b>Projection Histograms: </b>Projection histograms count the number of pixels in each column and row of a character image. 
                                                Projection histograms can separate characters such as “m” and “n”.
                                                <img style="display:block;margin-left: 10%;" src="./images/theory/feature_extraction-proj_hist.png" width="180px" alt="Pic"/>
                                            </li>
                                            <li>
                                                <b>Profiles: </b>The profile counts the number of pixels (distance) between the bounding box of the character image and the edge of the character. 
                                                The profiles describe well the external shapes of characters and allow to distinguish between a great number of letters, such as “p” and “q”.
                                                <img style="display:block;margin-left: 10%;" src="./images/theory/feature_extraction-profiles.png" width="180px" alt="Pic"/>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <b>Structural</b>
                                        <ul>
                                            <li>
                                                Characters can be represented by structural features with high tolerance to distortions and style variations. 
                                                This type of representation may also encode some knowledge about the structure of the object or may provide some knowledge as to what sort of components make up that object.
                                                Structural features are based on topological and geometrical properties of the character, such as aspect ratio, cross points, loops, branch points, strokes and their directions, inflection between two points, horizontal curves at top or bottom, etc.<br/>
                                                <img style="display:inline-block;margin-left: 10%;" src="./images/theory/feature_extraction-str_features_1.png" height="150px" alt="Pic"/>
                                                <img style="display:inline-block;margin-left: 10%;" src="./images/theory/feature_extraction-str_features_2.png" height="150px" alt="Pic"/>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <b>Global transformations and moments</b>
                                        The Fourier Transform (FT) of the contour of the image is calculated. 
                                        Since the first n coefficients of the FT can be used in order to reconstruct the contour, then these n coefficients are considered to be a n-dimesional feature vector that represents the character.
                                        Central, Zenrike moments that make the process of recognizing an object scale, translation, and rotation invariant. 
                                        The original image can be completely reconstructed from the moment coefficients.
                                        <img style="display:block;margin-left: 10%;" src="./images/theory/feature_extraction-moments.png" width="380px" alt="Pic"/>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <h3><b>Classification:</b></h3>
                                <p>For classification any of k-Nearest Neighbour (k-NN) , Bayes Classifier, Neural Networks (NN), Hidden Markov Models (HMM), Support Vector Machines (SVM), etc. can be used.
                                There is no such thing as the “best classifier”. The use of classifier depends on many factors, such as available training set, number of free parameters etc.</p>
                                <p>Software such as Cuneiform and Tesseract use a two-pass approach to character recognition. 
                                The second pass is known as "adaptive recognition" and uses the letter shapes recognised with high confidence on the first pass to recognise better the remaining letters on the second pass. 
                                This is advantageous for unusual fonts or low-quality scans where the font is distorted (e.g. blurred or faded).</p>
                            </li>
                            <li>
                                <h3><b>Post-processing:</b></h3>
                                OCR accuracy can be increased if the output is constrained by a lexicon – a list of words that are allowed to occur in a document. 
                                This might be, for example, all the words in the English language, or a more technical lexicon for a specific field. 
                                This technique can be problematic if the document contains words not in the lexicon, like proper nouns. 
                                Tesseract uses its dictionary to influence the character segmentation step, for improved accuracy.
                            </li>
                        </ol>
                        The OCR result can be stored in the standardised ALTO format, a dedicated XML schema .<br><br><h4>Below is shown the working of Tesseract ( One of the OCR Engines, developed by Google. )</h4><br>
                        <h3><b>Tesseract OCR</b></h3><br>
                        Tesseract was originally developed at Hewlett-Packard Laboratories, Later developed by Google since 2006.<br>   Tesseract has unicode (UTF-8) support, and can recognize more than 100 languages (out of the box) .Tesseract supports various output formats.<br>
                        <h4><b>Here is How it works :-</b></h4><br>
                        The first step is a connected component analysis in which outlines of the components are stored.<br>

                        This is a computationally expensive design decision at the time, but has a significant advantage: by inspection of the nesting of outlines, and the number of child and grandchild outlines, it is simple to detect inverse text and recognize it as easily as black-on-white text.<br><br>
                        At this stage, outlines are gathered together, purely by nesting, into Blobs. Blobs are organized into text lines, and the lines and regions are analyzed for fixed pitch or proportional text.<br>
                        Text lines are broken into words differently according to the kind of character spacing. Fixed pitch text is chopped immediately by character cells.Proportional text is broken into words using definite spaces and fuzzy spaces.<br><br>

                        Recognition then proceeds as a two-pass process.<br>

                        In the first pass, an attempt is made to recognize each word in turn. Each word that is satisfactory is passed to an adaptive classifier as training data. The adaptive classifier then gets a chance to more accurately recognize text lower down the page. Since the adaptive classifier may have learned something useful too late to make a contribution near the top of the page, a second pass is run over the page, in which words that were not recognized well enough are recognized again. A final phase resolves fuzzy spaces, and checks alternative hypotheses for the x-height to locate small-cap text.
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

