var weightMatrix = [[-2, 1, -5], [3,2,1], [0,-1,-1.5]];
var lineColors = ['#3366ff','#ff0000','#009933'];
var inputs = [[-2,3,1],[-2,2,1],[2,3,1],[2,2,1],[3,4,1],[-2,-2,1],[2,-2,1]];
var desiredOPs = [[1,-1,-1],[1,-1,-1],[-1,1,-1],[-1,1,-1],[-1,1,-1],[-1,-1,1],[-1,-1,1]];
var desiredOPsProps = [['^','#3366ff'],['^','#3366ff'],['o','#ff0000'],['o','#ff0000'],['o','#ff0000'],['[]','#009933'],['[]','#009933']];
var learningRate=0.4;
var sel = 1;
var timers=[];

var points = [];
var lines = [];

$(document).ready(function () {
    $(".changingBlocks").css("display", "none");

    for (var i = 0; i < weightMatrix.length; i++) {
        for (var j = 0; j < weightMatrix[i].length; j++) {
            $(".w" + (i + 1) + "" + (j + 1) + "text").text(weightMatrix[i][j]);
        }
    }

    /* Learning Rate Slider */
    $("#learningRate_slider").slider({
        max: 5,
        min: 0.2,
        step: 0.2,
        slide: function (event, ui) {
            $(".learningRate").text(ui.value);
            learningRate = ui.value;
        }
    });
    $("#learningRate_slider").slider("value", learningRate);
    $(".learningRate").text($("#learningRate_slider").slider("value"));
    learningRate = $("#learningRate_slider").slider("value");


    $("#wslider").slider({
        step: 0.5,
        max: 5,
        min: -5,
        slide: function (event, ui) {
            $(".w" + sel + "text").text(ui.value);
            weightMatrix[(sel / 10).toFixed(0) - 1][sel % 10 - 1] = parseInt(ui.value);
            plotGraph();
        }
    });

    $('[data-toggle="tooltip"]').tooltip();
    $(".lines").css("cursor","pointer");

    plotGraph();

    //learnInput(0);
});

function resetSimulation(){
    for (var i = 0; i < timers.length;i++ ){
        clearTimeout(timers[i]);
    }

    $(".lines").css("cursor", "pointer");
    $(".sliders").slider("enable");
    $("#FirstPartOfExpln").slideUp(500);
    $("#SecondPartOfExpln").slideUp(500);

    $("#PercLRStartSimButton").removeAttr("disabled", "disabled");
    $("#PercLRStartSimButton").removeClass("disabled");
    $("#PercLRStopSimButton").attr("disabled");
    $("#PercLRStopSimButton").addClass("disabled");
    $("#PercLRNextButton").attr("disabled");
    $("#PercLRNextButton").addClass("disabled");
    $("#PercLRNextButton").removeClass("displayActivatedButton");
}


function startSimulation(){
    varweightMatrix = [[-2, 1, -5], [3,2,1], [0,-1,-1.5]];
    lineColors = ['#3366ff','#ff0000','#009933'];
    inputs = [[-2,3,1],[-2,2,1],[2,3,1],[2,2,1],[3,4,1],[-2,-2,1],[2,-2,1]];
    desiredOPs = [[1,-1,-1],[1,-1,-1],[-1,1,-1],[-1,1,-1],[-1,1,-1],[-1,-1,1],[-1,-1,1]];
    desiredOPsProps = [['^','#3366ff'],['^','#3366ff'],['o','#ff0000'],['o','#ff0000'],['o','#ff0000'],['[]','#009933'],['[]','#009933']];

    $(".sliders").slider("disable");
    $(".lines").css("cursor","none");

    $("#PercLRStartSimButton").attr("disabled", "disabled");
    $("#PercLRStartSimButton").addClass("disabled");
    $("#PercLRStopSimButton").removeAttr("disabled");
    $("#PercLRStopSimButton").removeClass("disabled");

    $("#SecondPartOfExpln").slideUp(500);
    $("#FirstPartOfExpln").slideDown(1000);

    learnInput(0);

}

function learnInput(inputIndex){
    //O=W'X
    //O - OPs, W - Weight Matrix, X - Inputs
    $("#PercLRNextButton").attr("disabled");
    $("#PercLRNextButton").addClass("disabled");
    $("#PercLRNextButton").removeClass("displayActivatedButton");


    var constPointSize = 5;
    $("#FirstPartOfExpln").css("display","none");
    $("#SecondPartOfExpln").css("display","none");    

    $(".changingBlocks").fadeOut(300);

    /* Scroll to neuralnet */
    $('html, body').animate({
        scrollTop: $("#PercLR_svg").offset().top
    }, 1500);

    /* Highlight selected point */
    window.setTimeout(function () {
        points[inputIndex].fillColor('#000000');
        points[inputIndex].strokeColor('#000000');
        points[inputIndex].size(15);
        window.setTimeout(function () {
            points[inputIndex].fillColor(desiredOPsProps[0][1]);
            points[inputIndex].strokeColor(desiredOPsProps[0][1]);
            points[inputIndex].size(constPointSize);
            window.setTimeout(function () {
                points[inputIndex].fillColor('#000000');
                points[inputIndex].strokeColor('#000000');
                points[inputIndex].size(15);
                window.setTimeout(function () {
                    points[inputIndex].fillColor(desiredOPsProps[0][1]);
                    points[inputIndex].strokeColor(desiredOPsProps[0][1]);
                    points[inputIndex].size(constPointSize);
                    window.setTimeout(function () {
                        points[inputIndex].fillColor('#000000');
                        points[inputIndex].strokeColor('#000000');
                        points[inputIndex].size(15);
                    }, 500);
                }, 500);
            }, 500);
        }, 500);
    }, 500);

    /* Show flow animation */
    window.setTimeout(function(){
        $("line.percLRNeur_1_lines").addClass("animatedLineRegionBlue");
        $("line.percLRNeur_2_lines").addClass("animatedLineRegionRed");
        $("line.percLRNeur_3_lines").addClass("animatedLineRegionGreen");
    },2000);


    timers.push(window.setTimeout(function () {
        $("#FirstPartOfExpln").slideDown(1000);
        var input = inputs[inputIndex];

        for (var i = 0; i < input.length; i++) {
            $(".inputVector tr." + i + " td.0").text(input[i]);
        }

        for (var i = 0; i < weightMatrix.length; i++) {
            for (var j = 0; j < weightMatrix[i].length; j++) {
                $(".weightMatrix tr." + i + " td." + j).text(weightMatrix[i][j]);
            }
        }

        var tempOP = [0, 0, 0];
        var OP = [0, 0, 0]

        for (var i = 0; i < weightMatrix.length; i++) {
            for (var j = 0; j < weightMatrix[i].length; j++) {
                tempOP[i] += weightMatrix[i][j] * input[j];   //W x X
            }

            $(".summationVector tr." + i + " td.0").text(tempOP[i]);

            if (tempOP[i] >= 0) {
                $(".outputVector tr." + i + " td.0").text("+1");
                OP[i] = 1;
            }
            else {
                $(".outputVector tr." + i + " td.0").text("-1");
                OP[i] = -1;
            }
        }

        //Display these vectors and matrix one by one
        timers.push(window.setTimeout(function () {
            $(".weightMatrix").fadeIn(500);
            $('html, body').animate({
                scrollTop: $(".weightMatrix").offset().top
            }, 1500);
        }, 1000));

        timers.push(window.setTimeout(function () {
            $(".inputVector").fadeIn(500);
        }, 2000));

        timers.push(window.setTimeout(function () {
            $(".summationVector").fadeIn(500);
        }, 6000));

        timers.push(window.setTimeout(function () {
            $(".outputVector").fadeIn(500);
        }, 8000));



        for (var i = 0; i < input.length; i++) {
            $(".desiredOutputVector tr." + i + " td.0").text(desiredOPs[inputIndex][i]);
        }

        timers.push(window.setTimeout(function () {
            //$("#FirstPartOfExpln").slideUp(2000);
            $("#SecondPartOfExpln").slideDown(500);
            timers.push(window.setTimeout(function () {
                $(".desiredOutputVector").fadeIn(500);
            }, 2000));

            timers.push(window.setTimeout(function () {
                $("#SecondPartOfExpln div.revealText1").slideDown(500);
                $('html, body').animate({
                    scrollTop: $("#SecondPartOfExpln div.revealText1").offset().top
                }, 1500);
            }, 4000));

            timers.push(window.setTimeout(function () {
                $("#SecondPartOfExpln div.revealText2").slideDown(500);
            }, 8000));

            timers.push(window.setTimeout(function () {
                $("#SecondPartOfExpln div.revealText3").slideDown(500);
            }, 12000));

            for (var calcnIndex = 0; calcnIndex < weightMatrix.length; calcnIndex++) {
                $("#PercCalcnExplnFor_i_" + calcnIndex + " span.Di").text(desiredOPs[inputIndex][calcnIndex]);
                $("#PercCalcnExplnFor_i_" + calcnIndex + " span.Oi").text(OP[calcnIndex]);

                for (var i = 0; i < input.length; i++) {
                    $("#PercCalcnExplnFor_i_" + calcnIndex + " table.indWeightVector tr." + i + " td.0").text(weightMatrix[calcnIndex][i]);
                }

                for (var i = 0; i < input.length; i++) {
                    $("#PercCalcnExplnFor_i_" + calcnIndex + " table.inputVector tr." + i + " td.0").text(input[i]);
                }

                timers.push(window.setTimeout(function () {
                    $("#PercCalcnExplnFor_i_" + calcnIndex + " table.indWeightVector").fadeIn(500);
                }, 20000));

                timers.push(window.setTimeout(function () {
                    $("#PercCalcnExplnFor_i_" + calcnIndex + " table.inputVector").fadeIn(500);
                }, 20000));

                for (var i = 0; i < input.length; i++) {
                    //alert();
                    var tempVal = weightMatrix[calcnIndex][i] + parseFloat((learningRate * (desiredOPs[inputIndex][calcnIndex] - OP[calcnIndex]) * input[i] / 2).toFixed(3));
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

                timers.push(window.setTimeout(function () {
                    $("#SecondPartOfExpln div.revealNewWtLine1").slideDown(500);
                }, 3000));


                timers.push(window.setTimeout(function () {
                    $("#SecondPartOfExpln div.revealNewWtLine2").slideDown(500);
                }, 4000));
                timers.push(window.setTimeout(function () {
                    $("#SecondPartOfExpln table.newWtVectorW0").slideDown(500);
                    $('html, body').animate({
                        scrollTop: $("#SecondPartOfExpln table.newWtVectorW0").offset().top
                    }, 1500);
                }, 5000));


                timers.push(window.setTimeout(function () {
                    $("#SecondPartOfExpln div.revealNewWtLine3").slideDown(500);
                }, 8000));
                timers.push(window.setTimeout(function () {
                    $("#SecondPartOfExpln table.newWtVectorW1").slideDown(500);
                    $('html, body').animate({
                        scrollTop: $("#SecondPartOfExpln table.newWtVectorW1").offset().top
                    }, 1500);
                }, 9000));
                timers.push(window.setTimeout(function () {
                    $("#SecondPartOfExpln div.revealNewWtLine4").slideDown(500);
                }, 12000));
                timers.push(window.setTimeout(function () {
                    $("#SecondPartOfExpln table.newWtVectorW2").slideDown(500);
                    $('html, body').animate({
                        scrollTop: $("#SecondPartOfExpln table.newWtVectorW2").offset().top
                    }, 1500);
                }, 13000));
                timers.push(window.setTimeout(function () {
                    $("#SecondPartOfExpln div.revealNewWtLine5").slideDown(500);
                }, 16000));

                timers.push(window.setTimeout(function () {
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
                        window.setTimeout(function () {
                            $("#PercLRNextButton").removeAttr("disabled");
                            $("#PercLRNextButton").removeClass("disabled");
                            $("#PercLRNextButton").addClass("displayActivatedButton");
                            $("#PercLRNextButton").unbind("click");
                            $("#PercLRNextButton").click(function () {
                                learnInput(inputIndex + 1);
                            });
                        }, 1000);
                    }, 4500);
                }, 18000));

            }, 16000);
        }, 15000));
    }, 5000));
    
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