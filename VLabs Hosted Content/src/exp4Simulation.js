var weightMatrix = [[-2, 1, -6.5], [3,2,1], [0,-1,-1.5]];
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

    displayWeightsInNeuralNet();

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

    /* weight slider */
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

    /* Make lines clickable */
    $(".lines").css("cursor", "pointer");
    $(".lines").css("pointer-events","auto");

    plotGraph();
});

function displayWeightsInNeuralNet(){
    for (var i = 0; i < weightMatrix.length; i++) {
        for (var j = 0; j < weightMatrix[i].length; j++) {
            $(".w" + (i + 1) + "" + (j + 1) + "text").text(weightMatrix[i][j]);
        }
    }
}

function resetSimulation(){
    for (var i = 0; i < timers.length;i++ ){
        clearTimeout(timers[i]);
    }

    $(".lines").css("cursor", "pointer");
    $(".lines").css("pointer-events","auto");
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
    $("#PercLRNextButton").unbind("click");

    $("line.percLRNeur_1_lines").removeClass("animatedLineRegionBlue");
    $("line.percLRNeur_2_lines").removeClass("animatedLineRegionRed");
    $("line.percLRNeur_3_lines").removeClass("animatedLineRegionGreen");

    $(".changingTextStyle").text("");

    varweightMatrix = [[-2, 1, -5], [3,2,1], [0,-1,-1.5]];
    lineColors = ['#3366ff','#ff0000','#009933'];
    inputs = [[-2,3,1],[-2,2,1],[2,3,1],[2,2,1],[3,4,1],[-2,-2,1],[2,-2,1]];
    desiredOPs = [[1,-1,-1],[1,-1,-1],[-1,1,-1],[-1,1,-1],[-1,1,-1],[-1,-1,1],[-1,-1,1]];
    desiredOPsProps = [['^','#3366ff'],['^','#3366ff'],['o','#ff0000'],['o','#ff0000'],['o','#ff0000'],['[]','#009933'],['[]','#009933']];

    plotGraph();
    displayWeightsInNeuralNet();
}


function startSimulation(){
    varweightMatrix = [[-2, 1, -5], [3,2,1], [0,-1,-1.5]];
    lineColors = ['#3366ff','#ff0000','#009933'];
    inputs = [[-2,3,1],[-2,2,1],[2,3,1],[2,2,1],[3,4,1],[-2,-2,1],[2,-2,1]];
    desiredOPs = [[1,-1,-1],[1,-1,-1],[-1,1,-1],[-1,1,-1],[-1,1,-1],[-1,-1,1],[-1,-1,1]];
    desiredOPsProps = [['^','#3366ff'],['^','#3366ff'],['o','#ff0000'],['o','#ff0000'],['o','#ff0000'],['[]','#009933'],['[]','#009933']];

    displayWeightsInNeuralNet();

    $(".sliders").slider("disable");
    $(".lines").css("cursor","none");
    $(".lines").css("pointer-events","none");

    $("#PercLRStartSimButton").attr("disabled", "disabled");
    $("#PercLRStartSimButton").addClass("disabled");
    $("#PercLRStopSimButton").removeAttr("disabled");
    $("#PercLRStopSimButton").removeClass("disabled");
    $(".changingTextStyle").text("");

    $("#SecondPartOfExpln").slideUp(500);
    $("#FirstPartOfExpln").slideDown(1000);

    learnInput(0);

}

function learnInput(inputIndex){
    //O = W X
    //O - OPs, W - Weight Matrix, X - Inputs

    var input = inputs[inputIndex];


    $("#PercLRNextButton").attr("disabled");
    $("#PercLRNextButton").addClass("disabled");
    $("#PercLRNextButton").removeClass("displayActivatedButton");
    $("#PercLRNextButton").unbind("click");
    $(".changingTextStyle").text("");

    var constPointSize = 5;
    $("#FirstPartOfExpln").css("display","none");
    $("#SecondPartOfExpln").css("display","none");    

    $(".changingBlocks").fadeOut(300);

    plotGraph();

    /* Scroll to neuralnet */
    scrollToElement("#PercLR_svg",0);

    /* Highlight selected point */
    timers.push(window.setTimeout(function () {
        points[inputIndex].fillColor('#000000');
        points[inputIndex].strokeColor('#000000');
        points[inputIndex].size(25);
        timers.push(window.setTimeout(function () {
            points[inputIndex].fillColor(desiredOPsProps[0][1]);
            points[inputIndex].strokeColor(desiredOPsProps[0][1]);
            points[inputIndex].size(constPointSize);
            timers.push(window.setTimeout(function () {
                points[inputIndex].fillColor('#000000');
                points[inputIndex].strokeColor('#000000');
                points[inputIndex].size(25);
                timers.push(window.setTimeout(function () {
                    points[inputIndex].fillColor(desiredOPsProps[0][1]);
                    points[inputIndex].strokeColor(desiredOPsProps[0][1]);
                    points[inputIndex].size(constPointSize);
                    timers.push(window.setTimeout(function () {
                        points[inputIndex].fillColor('#000000');
                        points[inputIndex].strokeColor('#000000');
                        points[inputIndex].size(15);
                    }, 500));
                }, 500));
            }, 500));
        }, 500));
    }, 500));

    /* Display IP values in neuralnet */
    for (var i = 0; i < input.length - 1; i++) {
        $(".percLRX_inputX" + (i + 1)).text(input[i]);
    }

    /* Show flow animation */
    timers.push(window.setTimeout(function(){
        $("line.percLRNeur_1_lines").addClass("animatedLineRegionBlue");
        $("line.percLRNeur_2_lines").addClass("animatedLineRegionRed");
        $("line.percLRNeur_3_lines").addClass("animatedLineRegionGreen");
    },2000));


    timers.push(window.setTimeout(function () {
        $("#FirstPartOfExpln").slideDown(1000);

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
                tempOP[i] = parseFloat((tempOP[i] + weightMatrix[i][j] * input[j]).toFixed(4));   //W x X
            }
            $(".summationVector tr." + i + " td.0").text(tempOP[i]);

            if (tempOP[i] >= 0) {
                $(".outputVector tr." + i + " td.0").text("+1");
                OP[i] = 1;
                $(".percLR_outputO" + (i + 1)).text("+1");
            }
            else {
                $(".outputVector tr." + i + " td.0").text("-1");
                OP[i] = -1;
                $(".percLR_outputO" + (i + 1)).text("-1");
            }
        }

        //Display these vectors and weight matrix one by one
        revealByFadeIn(".weightMatrix", 1000);
        scrollToElement(".weightMatrix", 1000);

        revealByFadeIn(".inputVector", 2000);

        revealByFadeIn(".summationVector", 6000);

        revealByFadeIn(".outputVector", 8000);

        //Display desired Output vector
        for (var i = 0; i < input.length; i++) {
            $(".desiredOutputVector tr." + i + " td.0").text(desiredOPs[inputIndex][i]);
        }

        //Start second part of explanation
        timers.push(window.setTimeout(function () {
            //$("#FirstPartOfExpln").slideUp(2000);
            $("#SecondPartOfExpln").slideDown(500);

            //Reveal individual Elements one by one
            revealByFadeIn(".desiredOutputVector", 2000);
            scrollToElement(".desiredOutputVector", 2000);

            revealBySlideDown("#SecondPartOfExpln div.revealText1", 4000);
            scrollToElement("#SecondPartOfExpln div.revealText1", 4000);

            revealBySlideDown("#SecondPartOfExpln div.revealText2", 8000);

            revealBySlideDown("#SecondPartOfExpln div.revealText3", 12000);

            //
            for (var calcnIndex = 0; calcnIndex < weightMatrix.length; calcnIndex++) {
                $("#PercCalcnExplnFor_i_" + calcnIndex + " span.Di").text(desiredOPs[inputIndex][calcnIndex]);
                $("#PercCalcnExplnFor_i_" + calcnIndex + " span.Oi").text(OP[calcnIndex]);

                for (var i = 0; i < input.length; i++) {
                    $("#PercCalcnExplnFor_i_" + calcnIndex + " table.indWeightVector tr." + i + " td.0").text(weightMatrix[calcnIndex][i]);
                    $("#PercCalcnExplnFor_i_" + calcnIndex + " table.inputVector tr." + i + " td.0").text(input[i]);
                }

                revealByFadeIn("#PercCalcnExplnFor_i_" + calcnIndex + " table.indWeightVector", 20000)

                revealByFadeIn("#PercCalcnExplnFor_i_" + calcnIndex + " table.inputVector", 20000)

                var weightChangedFlag = false;

                for (var i = 0; i < input.length; i++) {
                    //alert();
                    var tempVal = parseFloat((weightMatrix[calcnIndex][i] + learningRate * (desiredOPs[inputIndex][calcnIndex] - OP[calcnIndex]) * input[i] / 2).toFixed(4));
                    $("#PercCalcnExplnFor_i_" + calcnIndex + " table.newWtVector tr." + i + " td.0").text(tempVal);  //Changes new weight vectors in carousel
                    $("#SecondPartOfExpln table.newWtVectorW" + calcnIndex + " tr.0 td." + i).text(tempVal);               //Changes new weight vectors displayed after carousel
                    $("#SecondPartOfExpln table.newWeightMatrix tr." + calcnIndex + " td." + i).text(tempVal);
                    if (weightMatrix[calcnIndex][i] != tempVal) {
                        weightChangedFlag = true;
                    }
                    weightMatrix[calcnIndex][i] = tempVal;
                }

                if (weightChangedFlag == true) {
                    $("#PercCalcnExplnFor_i_" + calcnIndex).css("background-color","#FFD6D6");
                }
                else{
                    $("#PercCalcnExplnFor_i_" + calcnIndex).css("background-color","#CDFFAF");
                }
            }

            window.setTimeout(function () {
                $("#allPercWtChngeCalcns_Carousel").carousel();
                $("#allPercWtChngeCalcns_Carousel").slideDown(500);

                scrollToElement("#allPercWtChngeCalcns_Carousel", 0);

                revealBySlideDown("#SecondPartOfExpln div.revealNewWtLine1", 3000);

                revealBySlideDown("#SecondPartOfExpln div.revealNewWtLine2", 4000);

                revealBySlideDown("#SecondPartOfExpln table.newWtVectorW0", 5000);
                scrollToElement("#allPercWtChngeCalcns_Carousel", 5000);

                revealBySlideDown("#SecondPartOfExpln div.revealNewWtLine3", 8000);

                revealBySlideDown("#SecondPartOfExpln table.newWtVectorW1", 9000);
                scrollToElement("#allPercWtChngeCalcns_Carousel", 9000);

                revealBySlideDown("#SecondPartOfExpln div.revealNewWtLine4", 12000);

                revealBySlideDown("#SecondPartOfExpln table.newWtVectorW2", 13000);
                scrollToElement("#allPercWtChngeCalcns_Carousel", 13000);

                revealBySlideDown("#SecondPartOfExpln div.revealNewWtLine5", 16000);

                timers.push(window.setTimeout(function () {
                    $("line.percLRNeur_1_lines").removeClass("animatedLineRegionBlue");
                    $("line.percLRNeur_2_lines").removeClass("animatedLineRegionRed");
                    $("line.percLRNeur_3_lines").removeClass("animatedLineRegionGreen");

                    $("#SecondPartOfExpln table.newWeightMatrix").slideDown(500);
                    scrollToElement("#SecondPartOfExpln table.newWeightMatrix", 0);
                    scrollToElement("#graphDiv", 3000);

                    timers.push(window.setTimeout(function () {
                        displayWeightsInNeuralNet();
                        plotGraph();

                        points[inputIndex].fillColor('#000000');
                        points[inputIndex].strokeColor('#000000');
                        points[inputIndex].size(15);

                        if (inputIndex != inputs.length - 1) {
                            timers.push(window.setTimeout(function () {
                                $("#PercLRNextButton").removeAttr("disabled");
                                $("#PercLRNextButton").removeClass("disabled");
                                $("#PercLRNextButton").addClass("displayActivatedButton");
                                $("#PercLRNextButton").click(function () {
                                    learnInput(inputIndex + 1);
                                });
                            }, 1000));
                        }
                        else {
                            alert("Simulation has been completed! As you can see from the graph, the classifier is converging towards classifying all inputs correctly!")
                        }
                    }, 4500));
                }, 18000));

            }, 16000);
        }, 15000));
    }, 5000));
    
}

function scrollToElement(elem,time){
    if (time == null) time = 0;
    timers.push(window.setTimeout(function(){
        $('html, body').animate({
            scrollTop: $(elem).offset().top
        }, 1500);
    },time));    
}

function revealByFadeIn(elem,time){
    timers.push(window.setTimeout(function () {
        $(elem).fadeIn(500);
    }, time));
}

function revealBySlideDown(elem,time){
    timers.push(window.setTimeout(function () {
        $(elem).slideDown(500);
    }, time));
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