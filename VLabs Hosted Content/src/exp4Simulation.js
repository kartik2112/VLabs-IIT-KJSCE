var weightMatrix = [[-2, 1, -5], [3,2,1], [0,-1,-1.5]];
var lineColors = ['#3366ff','#ff0000','#009933'];
var inputs = [[-2,3,1],[-2,2,1],[2,3,1],[2,2,1],[3,4,1],[-2,-2,1],[2,-2,1]];
var desiredOPs = [[1,-1,-1],[1,-1,-1],[-1,1,-1],[-1,1,-1],[-1,1,-1],[-1,-1,1],[-1,-1,1]];
var desiredOPsProps = [['^','#3366ff'],['^','#3366ff'],['o','#ff0000'],['o','#ff0000'],['o','#ff0000'],['[]','#009933'],['[]','#009933']];
var learningRate=1;

var points = [];
var lines = [];

$(document).ready(function () {
    /* Learning Rate Slider */
    $("#learningRate_slider").slider({
        max: 5,
        min: 1,
        step: 0.2,
        slide: function (event, ui) {
            $(".learningRate").text(ui.value);
            learningRate = ui.value;
        }
    });
    $(".learningRate").text($("#learningRate_slider").slider("value"));
    learningRate = $("#learningRate_slider").slider("value");

    $("#wslider").slider({
        step: 0.1,
        max: 5,
        min: -5,
        slide: function (event, ui) {
            $("#t" + sel).html(ui.value);
        }
    });

    $('[data-toggle="tooltip"]').tooltip(); 

    plotGraph();
    
    window.setTimeout(function(){
        //learnInput(0);
    },1000);    
});


function learnInput(inputIndex){
    //O=W'X
    //O - OPs, W - Weight Matrix, X - Inputs
    
    $(".changingBlocks").fadeOut(300);
    $(".sliders").slider("disable");

    var input = inputs[inputIndex];

    for(var i=0;i<input.length;i++){
        $(".inputVector tr."+i+" td.0").text(input[i]);
    }

    for(var i=0;i<weightMatrix.length;i++){
        for (var j = 0; j < weightMatrix[i].length;j++ ){
            $(".weightMatrix tr." + i + " td."+j).text(weightMatrix[i][j]);
        }            
    }

    var tempOP = [0,0,0];
    var OP=[0,0,0]

    for(var i=0;i<weightMatrix.length;i++){
        for (var j = 0; j < weightMatrix[i].length;j++ ){
            tempOP[i] += weightMatrix[i][j] * input[j];   //W x X
        }

        $(".summationVector tr." + i + " td.0").text(tempOP[i]);

        if(tempOP[i]>=0){
            $(".outputVector tr." + i + " td.0").text("+1");
            OP[i] = 1;
        }
        else{
            $(".outputVector tr." + i + " td.0").text("-1");
            OP[i] = -1;
        }        
    }

    //Display these vectors and matrix one by one
    window.setTimeout(function(){
        $(".weightMatrix").fadeIn(500);
        $('html, body').animate({
            scrollTop: $(".weightMatrix").offset().top
        }, 1500);
    },1000);

    window.setTimeout(function(){
        $(".inputVector").fadeIn(500);
    },2000);

    window.setTimeout(function(){
        $(".summationVector").fadeIn(500);
    },6000);

    window.setTimeout(function(){
        $(".outputVector").fadeIn(500);
    },8000);



    for(var i=0;i<input.length;i++){
        $(".desiredOutputVector tr."+i+" td.0").text(desiredOPs[inputIndex][i]);
    }

    window.setTimeout(function () {
        //$("#FirstPartOfExpln").slideUp(2000);
        $("#SecondPartOfExpln").slideDown(500);
        window.setTimeout(function () {
            $(".desiredOutputVector").fadeIn(500);
        }, 2000);

        window.setTimeout(function () {
            $("#SecondPartOfExpln div.revealText1").slideDown(500);
        }, 4000);

        window.setTimeout(function () {
            $("#SecondPartOfExpln div.revealText2").slideDown(500);
        }, 8000);

        window.setTimeout(function () {
            $("#SecondPartOfExpln div.revealText3").slideDown(500);
        }, 12000);

        for (var calcnIndex = 0; calcnIndex < weightMatrix.length; calcnIndex++) {
            $("#PercCalcnExplnFor_i_" + calcnIndex + " span.Di").text(desiredOPs[inputIndex][calcnIndex]);
            $("#PercCalcnExplnFor_i_" + calcnIndex + " span.Oi").text(OP[calcnIndex]);

            for (var i = 0; i < input.length; i++) {
                $("#PercCalcnExplnFor_i_" + calcnIndex + " table.indWeightVector tr." + i + " td.0").text(weightMatrix[calcnIndex][i]);
            }

            for (var i = 0; i < input.length; i++) {
                $("#PercCalcnExplnFor_i_" + calcnIndex + " table.inputVector tr." + i + " td.0").text(input[i]);
            }

            window.setTimeout(function () {
                $("#PercCalcnExplnFor_i_" + calcnIndex + " table.indWeightVector").fadeIn(500);
            }, 20000);

            window.setTimeout(function () {
                $("#PercCalcnExplnFor_i_" + calcnIndex + " table.inputVector").fadeIn(500);
            }, 20000);

            for (var i = 0; i < input.length; i++) {
                alert();
                var tempVal = weightMatrix[calcnIndex][i] + learningRate * (desiredOPs[inputIndex][calcnIndex] - OP[calcnIndex]) * input[i] / 2;
                $("#PercCalcnExplnFor_i_" + calcnIndex + " table.newWtVector tr." + i + " td.0").text(tempVal);  //Changes new weight vectors in carousel
                $("#SecondPartOfExpln table.newWtVectorW" + calcnIndex + " tr.0 td." + i).text(tempVal);               //Changes new weight vectors displayed after carousel
                $("#SecondPartOfExpln table.newWeightMatrix tr." + calcnIndex + " td." + i).text(tempVal);
                weightMatrix[calcnIndex][i] = tempVal;
            }
        }

        window.setTimeout(function () {
            $("#allPercWtChngeCalcns_Carousel").carousel();
            $("#allPercWtChngeCalcns_Carousel").slideDown(500);

            $('html, body').animate({
                scrollTop: $("#allPercWtChngeCalcns_Carousel").offset().top
            }, 1500);

            window.setTimeout(function () {
                $("#SecondPartOfExpln div.revealNewWtLine1").slideDown(500);
            }, 3000);


            window.setTimeout(function () {
                $("#SecondPartOfExpln div.revealNewWtLine2").slideDown(500);
            }, 4000);
            window.setTimeout(function () {
                $("#SecondPartOfExpln table.newWtVectorW0").slideDown(500);
                $('html, body').animate({
                    scrollTop: $("#SecondPartOfExpln table.newWtVectorW0").offset().top
                }, 1500);
            }, 5000);


            window.setTimeout(function () {
                $("#SecondPartOfExpln div.revealNewWtLine3").slideDown(500);
            }, 8000);
            window.setTimeout(function () {
                $("#SecondPartOfExpln table.newWtVectorW1").slideDown(500);
                $('html, body').animate({
                    scrollTop: $("#SecondPartOfExpln table.newWtVectorW1").offset().top
                }, 1500);
            }, 9000);
            window.setTimeout(function () {
                $("#SecondPartOfExpln div.revealNewWtLine4").slideDown(500);
            }, 12000);
            window.setTimeout(function () {
                $("#SecondPartOfExpln table.newWtVectorW2").slideDown(500);
                $('html, body').animate({
                    scrollTop: $("#SecondPartOfExpln table.newWtVectorW2").offset().top
                }, 1500);
            }, 13000);
            window.setTimeout(function () {
                $("#SecondPartOfExpln div.revealNewWtLine5").slideDown(500);
            }, 16000);

            window.setTimeout(function () {
                $("#SecondPartOfExpln table.newWeightMatrix").slideDown(500);
                $('html, body').animate({
                    scrollTop: $("#SecondPartOfExpln table.newWeightMatrix").offset().top
                }, 1500);
                window.setTimeout(function () {
                    $('html, body').animate({
                        scrollTop: $("#graphDiv").offset().top
                    }, 1500);
                }, 3000);
                window.setTimeout(function () {
                    plotGraph();
                }, 4500);
            }, 18000);

        }, 16000);
    }, 15000);
    
}


function plotGraph(){
    var board = JXG.JSXGraph.initBoard('graphDiv',{axis:true, boundingbox:[-4, 5, 4, -3]});  //Creates the cartesian graph
	var constPointSize=5;
	
    for(var i=0;i<inputs.length;i++){
        points[i] = board.create('point',[inputs[i][0],inputs[i][1]], {size:constPointSize,face:desiredOPsProps[i][0],fixed:true, color: desiredOPsProps[i][1]});
    }

    for(var i=0;i<weightMatrix.length;i++){
        lines[i] = board.create('line', [weightMatrix[i][2], weightMatrix[i][0], weightMatrix[i][1]], { strokeColor: lineColors[i], fixed: true });
        //ineq = board.create('inequality', [lines[i]], {fillColor: lineColors[i]});
        if(weightMatrix[i][2]>=0){
            ineq = board.create('inequality', [lines[i]], {inverse:true, fillColor: lineColors[i]});
        }
        else{
            ineq = board.create('inequality', [lines[i]], {fillColor: lineColors[i]});
        }
        
    }

    //decisionBoundary1 = board.create('line', [AND_threshold*-1, Number(AND_w1), Number(AND_w2)], {fixed:true});
}