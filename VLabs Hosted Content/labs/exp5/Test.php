<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <!-- jQuery 2.2.3 -->
        <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../plugins/jQueryUI/jquery-ui.min.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!--These are used for plotting the graphs-->
        <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
 		<!--<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jsxgraph/0.99.5/jsxgraphcore.js"></script>-->
        <script type="text/javascript" src="../../plugins/jsxgraphcore.min.js"></script>

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
                    /*var board = JXG.JSXGraph.initBoard('graphDiv', { axis: true, boundingbox: [-4, 5, 4, -3] });  //Creates the cartesian graph
                    var constPointSize = 5;

                    for (var i = 0; i < inputs.length; i++) {
                        points[i] = board.create('point', [inputs[i][0], inputs[i][1]], { size: constPointSize, face: desiredOPsProps[i][0], fixed: true, color: desiredOPsProps[i][1] });
                    }

                    for (var i = 0; i < weightMatrix.length; i++) {
                        lines[i] = board.create('line', [weightMatrix[i][2], weightMatrix[i][0], weightMatrix[i][1]], { strokeColor: lineColors[i], fixed: true , withLabel: true, name: function () { return weightMatrix[i][0]+'x + '+weightMatrix[i][1]+'y + '+weightMatrix[i][2]+' = 0';}, label: {position: 'lrb', offsets: [-20, 40]},display: 'internal' } );
                        ineq = board.create('inequality', [lines[i]], { fillColor: lineColors[i] });
                        

                    }*/

                    var b = JXG.JSXGraph.initBoard('graphDiv', {boundingbox: [-5, 5, 5, -5], axis:true, grid: true});
                    /*var c = b.create('slider', [[-3,4], [2,4], [-5,1,5]]),
                    line1 = b.create('line', [function() { return [c.Value(), 0, -1]; }],),
                    ineq1 = b.create('inequality', [line1], {inverse: true}),*/

                    var line1 = b.create('line', [3, 2, -1]), // Line y = 2x + 3 or 2x - 1y + 3 = 0
                    ineq1 = b.create('inequality', [line1], {fillColor: 'yellow'});  //This would plot the inequality 2x - y + 3 <= 0

                    var line2 = b.create('line', [-3, 1, 0], {strokeColor: 'black'}); // Line x = 3 or 1x + 0y - 3 = 0
                    var ineq2 = b.create('inequality', [line2], {inverse: true, fillColor: 'red'});  //This would plot the inequality 1x + 0y - 3 >= 0
            });

            
        </script>
    </head>
    <body>
        <div id="graph-outer">
			<div id="graphDiv" class="" style="width:300px; height:300px;"></div>
		</div>
    </body>
</html>
