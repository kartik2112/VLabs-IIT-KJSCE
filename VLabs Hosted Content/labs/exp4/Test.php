<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <!-- jQuery 2.2.3 -->
        <script src="../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../../plugins/jQueryUI/jquery-ui.min.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!--These are used for plotting the graphs-->
        <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
 		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jsxgraph/0.99.5/jsxgraphcore.js"></script>

        <script>
            var weightMatrix = [[-2, 1, -6.5], [3,2,1], [0,-1,-1.5]];
            var lineColors = ['#3366ff', '#ff0000', '#009933'];
            var inputs = [[-2, 3, 1], [-2, 2, 1], [2, 3, 1], [2, 2, 1], [3, 4, 1], [-2, -2, 1], [2, -2, 1]];
            var desiredOPs = [[1, -1, -1], [1, -1, -1], [-1, 1, -1], [-1, 1, -1], [-1, 1, -1], [-1, -1, 1], [-1, -1, 1]];
            var desiredOPsProps = [['^', '#3366ff'], ['^', '#3366ff'], ['o', '#ff0000'], ['o', '#ff0000'], ['o', '#ff0000'], ['[]', '#009933'], ['[]', '#009933']];
            var learningRate = 1;
            var points = [];
            var lines = [];

            $(document).ready(function () {
                    var board = JXG.JSXGraph.initBoard('graphDiv', { axis: true, boundingbox: [-4, 5, 4, -3] });  //Creates the cartesian graph
                    var constPointSize = 5;

                    for (var i = 0; i < inputs.length; i++) {
                        points[i] = board.create('point', [inputs[i][0], inputs[i][1]], { size: constPointSize, face: desiredOPsProps[i][0], fixed: true, color: desiredOPsProps[i][1] });
                    }

                    for (var i = 0; i < weightMatrix.length; i++) {
                        lines[i] = board.create('line', [weightMatrix[i][2], weightMatrix[i][0], weightMatrix[i][1]], { strokeColor: lineColors[i], fixed: true , withLabel: true, name: function () { return weightMatrix[i][0]+'x + '+weightMatrix[i][1]+'y + '+weightMatrix[i][2]+' = 0';}, label: {position: 'lrb', offsets: [-20, 40]},display: 'internal' } );
                        ineq = board.create('inequality', [lines[i]], { fillColor: lineColors[i] });
                        /*if (weightMatrix[i][2] <= 0) {
                            ineq = board.create('inequality', [lines[i]], { inverse: true, fillColor: lineColors[i] });
                        }
                        else {
                            ineq = board.create('inequality', [lines[i]], { fillColor: lineColors[i] });
                        }*/

                    }
            });

            
        </script>
    </head>
    <body>
        <div id="graph-outer">
			<div id="graphDiv" class="jxgbox" style="width:300px; height:300px;"></div>
		</div>
    </body>
</html>
