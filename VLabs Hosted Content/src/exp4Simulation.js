/*

This js file is used by simulation.php of experiments 4-6

In each of the simulation.php files the class/id names have a substring of the corresponding Learning Rule
Thus the code in this file though appears long is actually consisting of snippets that are almost identical especially the learnInput part
This is the reason why learnInput function has an if else ladder for these 3 learning rules

*/
//This is the weight matrix that will be displayed on the neural network connections
var weightMatrix = [
    [-2, 1, -6.5],
    [3, 2, 1],
    [0, -1, -1.5]
];
var lineColors = ['#3366ff', '#ff0000', '#009933']; //This is used to color the lines according to the 3 classes

//These are the sample inputs that will be applied to the neural network for learning
var inputs = [
    [-2, 3, 1],
    [-2, 2, 1],
    [2, 3, 1],
    [2, 2, 1],
    [3, 4, 1],
    [-2, -2, 1],
    [2, -2, 1]
];

//These are the desired outputs for the above inputs
var desiredOPs = [
    [1, -1, -1],
    [1, -1, -1],
    [-1, 1, -1],
    [-1, 1, -1],
    [-1, 1, -1],
    [-1, -1, 1],
    [-1, -1, 1]
];

//These properties are used in JSXGraph
var desiredOPsProps = [
    ['^', '#3366ff'],
    ['^', '#3366ff'],
    ['o', '#ff0000'],
    ['o', '#ff0000'],
    ['o', '#ff0000'],
    ['[]', '#009933'],
    ['[]', '#009933']
];

var learningRate = 0.4;
var timers = []; //An array of timers is maintained so that when Stop Simulation Button is clicked, all the timers are also cleared
var points = [];
var lines = [];


/* This function displays the values currently in the weight matrix on the lines connecting the neurons */
function displayWeightsInNeuralNet(lrString) {
    for (var i = 0; i < weightMatrix.length; i++) {
        for (var j = 0; j < weightMatrix[i].length; j++) {
            $("#" + lrString + "MainOuterDiv tspan.w" + (i + 1) + "" + (j + 1) + "text").text(weightMatrix[i][j]);
        }
    }
}

/* 
This function resets all timers and resets the visibility of all elements and resets all values
Depending on the type of learning rule, the corresponding classes and ids will be updated
*/
function resetSimulation(lrString) {
    for (var i = 0; i < timers.length; i++) { //Here all the timers are cleared so as to prevent any further triggering
        clearTimeout(timers[i]);
    }

    $(".lines").css("cursor", "pointer");
    $(".lines").css("pointer-events", "auto");
    $(".sliders").slider("enable");
    $("#" + lrString + "_FirstPartOfExpln").slideUp(500);
    $("#" + lrString + "_SecondPartOfExpln").slideUp(500);

    $("#" + lrString + "StartSimButton").removeAttr("disabled", "disabled");
    $("#" + lrString + "StartSimButton").removeClass("disabled");
    $("#" + lrString + "StopSimButton").attr("disabled");
    $("#" + lrString + "StopSimButton").addClass("disabled");
    $("#" + lrString + "NextButton").attr("disabled");
    $("#" + lrString + "NextButton").addClass("disabled");
    $("#" + lrString + "NextButton").removeClass("displayActivatedButton");
    $("#" + lrString + "NextButton").unbind("click");

    $("line." + lrString + "Neur_1_lines").removeClass("animatedLineRegionBlue");
    $("line." + lrString + "Neur_2_lines").removeClass("animatedLineRegionRed");
    $("line." + lrString + "Neur_3_lines").removeClass("animatedLineRegionGreen");

    $("#" + lrString + "LearningRate_slider").slider("value", learningRate);
    $("#" + lrString + "MainOuterDiv span.learningRate").text($("#" + lrString + "LearningRate_slider").slider("value"));

    $(".changingTextStyle").text("");

    weightMatrix = [
        [-2, 1, -6.5],
        [3, 2, 1],
        [0, -1, -1.5]
    ];
    lineColors = ['#3366ff', '#ff0000', '#009933'];
    inputs = [
        [-2, 3, 1],
        [-2, 2, 1],
        [2, 3, 1],
        [2, 2, 1],
        [3, 4, 1],
        [-2, -2, 1],
        [2, -2, 1]
    ];
    desiredOPs = [
        [1, -1, -1],
        [1, -1, -1],
        [-1, 1, -1],
        [-1, 1, -1],
        [-1, 1, -1],
        [-1, -1, 1],
        [-1, -1, 1]
    ];
    desiredOPsProps = [
        ['^', '#3366ff'],
        ['^', '#3366ff'],
        ['o', '#ff0000'],
        ['o', '#ff0000'],
        ['o', '#ff0000'],
        ['[]', '#009933'],
        ['[]', '#009933']
    ];

    plotGraph(lrString);
    displayWeightsInNeuralNet(lrString);
}


/* 
This is the first function that will be called when Start Simulation Button is clicked 
Depending on the type of learning rule, the corresponding tasks will be done
*/
function startSimulation(lrString) {
    lineColors = ['#3366ff', '#ff0000', '#009933'];
    inputs = [
        [-2, 3, 1],
        [-2, 2, 1],
        [2, 3, 1],
        [2, 2, 1],
        [3, 4, 1],
        [-2, -2, 1],
        [2, -2, 1]
    ];
    desiredOPs = [
        [1, -1, -1],
        [1, -1, -1],
        [-1, 1, -1],
        [-1, 1, -1],
        [-1, 1, -1],
        [-1, -1, 1],
        [-1, -1, 1]
    ];
    desiredOPsProps = [
        ['^', '#3366ff'],
        ['^', '#3366ff'],
        ['o', '#ff0000'],
        ['o', '#ff0000'],
        ['o', '#ff0000'],
        ['[]', '#009933'],
        ['[]', '#009933']
    ];

    displayWeightsInNeuralNet(lrString);

    $(".sliders").slider("disable");
    $(".lines").css("cursor", "none");
    $(".lines").css("pointer-events", "none");

    $("#" + lrString + "StartSimButton").attr("disabled", "disabled");
    $("#" + lrString + "StartSimButton").addClass("disabled");
    $("#" + lrString + "StopSimButton").removeAttr("disabled");
    $("#" + lrString + "StopSimButton").removeClass("disabled");
    $(".changingTextStyle").text("");

    $("#" + lrString + "_SecondPartOfExpln").slideUp(500);
    $("#" + lrString + "_FirstPartOfExpln").slideDown(1000);


    learnInput(lrString, 0); //For 1st input, learning rule is applied

}


/* 
This function will be used to learn the input referenced via inputIndex 
and then according to the corresponding learning rule specified via lrString, the weights are updated
*/
function learnInput(lrString, inputIndex) {
    //O = W X
    //O - OPs, W - Weight Matrix, X - Inputs

    var input = inputs[inputIndex];

    if (lrString == "percLR") {
        $("#" + lrString + "NextButton").attr("disabled");
        $("#" + lrString + "NextButton").addClass("disabled");
        $("#" + lrString + "NextButton").removeClass("displayActivatedButton");
        $("#" + lrString + "NextButton").unbind("click"); //This is essential since it will ubind any previous listeners on the button
        $(".changingTextStyle").text("");

        var constPointSize = 5;
        $("#" + lrString + "_FirstPartOfExpln").css("display", "none");
        $("#" + lrString + "_SecondPartOfExpln").css("display", "none");

        $(".changingBlocks").fadeOut(300);

        plotGraph(lrString);

        /* Scroll to neuralnet */
        scrollToElement("#" + lrString + "_svg", 0);

        /* This snippet will highlight selected point on JSXGraph */
        timers.push(window.setTimeout(function() {
            points[inputIndex].fillColor('#000000');
            points[inputIndex].strokeColor('#000000');
            points[inputIndex].size(25);
            timers.push(window.setTimeout(function() {
                points[inputIndex].fillColor(desiredOPsProps[inputIndex][1]);
                points[inputIndex].strokeColor(desiredOPsProps[inputIndex][1]);
                points[inputIndex].size(constPointSize);
                timers.push(window.setTimeout(function() {
                    points[inputIndex].fillColor('#000000');
                    points[inputIndex].strokeColor('#000000');
                    points[inputIndex].size(25);
                    timers.push(window.setTimeout(function() {
                        points[inputIndex].fillColor(desiredOPsProps[inputIndex][1]);
                        points[inputIndex].strokeColor(desiredOPsProps[inputIndex][1]);
                        points[inputIndex].size(constPointSize);
                        timers.push(window.setTimeout(function() {
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
            $("." + lrString + "X_inputX" + (i + 1)).text(input[i]);
        }

        /* Show flow animation */
        timers.push(window.setTimeout(function() {
            $("line." + lrString + "Neur_1_lines").addClass("animatedLineRegionBlue");
            $("line." + lrString + "Neur_2_lines").addClass("animatedLineRegionRed");
            $("line." + lrString + "Neur_3_lines").addClass("animatedLineRegionGreen");
        }, 2000));


        timers.push(window.setTimeout(function() {
            $("#" + lrString + "_FirstPartOfExpln").slideDown(1000);

            /* The matrix to be displayed is initialized */
            for (var i = 0; i < input.length; i++) {
                $("#" + lrString + "_FirstPartOfExpln table.inputVector tr." + i + " td.0").text(input[i]);
            }
            for (var i = 0; i < weightMatrix.length; i++) {
                for (var j = 0; j < weightMatrix[i].length; j++) {
                    $("#" + lrString + "_FirstPartOfExpln table.weightMatrix tr." + i + " td." + j).text(weightMatrix[i][j]);
                }
            }

            var tempOP = [0, 0, 0];
            var OP = [0, 0, 0];

            /* Do all the calculations */
            for (var i = 0; i < weightMatrix.length; i++) {

                //Here is the summation function
                for (var j = 0; j < weightMatrix[i].length; j++) {
                    tempOP[i] = parseFloat((tempOP[i] + weightMatrix[i][j] * input[j]).toFixed(4)); //W x X
                }
                $("#" + lrString + "_FirstPartOfExpln table.summationVector tr." + i + " td.0").text(tempOP[i]);


                //Here is the activation function
                if (tempOP[i] >= 0) {
                    $("#" + lrString + "_FirstPartOfExpln table.outputVector tr." + i + " td.0").text("1");
                    $("#" + lrString + "_SecondPartOfExpln table.outputVector tr." + i + " td.0").text("1");
                    OP[i] = 1;
                    $("." + lrString + "_outputO" + (i + 1)).text("+1");
                } else {
                    $("#" + lrString + "_FirstPartOfExpln table.outputVector tr." + i + " td.0").text("-1");
                    $("#" + lrString + "_SecondPartOfExpln table.outputVector tr." + i + " td.0").text("-1");
                    OP[i] = -1;
                    $("." + lrString + "_outputO" + (i + 1)).text("-1");
                }
            }

            //Display these vectors and weight matrix one by one
            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.weightMatrix", 1000);
            scrollToElement("#" + lrString + "_FirstPartOfExpln table.weightMatrix", 1000);

            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.inputVector", 2000);

            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.summationVector", 6000);

            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.outputVector", 8000);


            //Display desired Output vector
            for (var i = 0; i < input.length; i++) {
                $("#" + lrString + "_SecondPartOfExpln table.desiredOutputVector tr." + i + " td.0").text(desiredOPs[inputIndex][i]);
            }

            //Start second part of explanation
            timers.push(window.setTimeout(function() {
                revealByFadeIn("#" + lrString + "_SecondPartOfExpln table.outputVector", 0);
                $("#" + lrString + "_SecondPartOfExpln").slideDown(500);

                //Reveal individual Elements one by one            
                revealByFadeIn("#" + lrString + "_SecondPartOfExpln table.desiredOutputVector", 2000);
                scrollToElement("#" + lrString + "_SecondPartOfExpln table.desiredOutputVector", 2000);

                revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealText1", 4000);
                scrollToElement("#" + lrString + "_SecondPartOfExpln div.revealText1", 4000);

                revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealText2", 8000);

                revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealText3", 12000);

                var weightMatrixChangedFlag = false;

                /* The content of carousel displayed is set over here */
                for (var calcnIndex = 0; calcnIndex < weightMatrix.length; calcnIndex++) {
                    $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " span.Di").text(desiredOPs[inputIndex][calcnIndex]);
                    $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " span.Oi").text(OP[calcnIndex]);

                    for (var i = 0; i < input.length; i++) {
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.indWeightVector tr." + i + " td.0").text(weightMatrix[calcnIndex][i]);
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.inputVector tr." + i + " td.0").text(input[i]);
                    }

                    revealByFadeIn("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.indWeightVector", 20000)

                    revealByFadeIn("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.inputVector", 20000)

                    var weightChangedFlag = false;

                    for (var i = 0; i < input.length; i++) {
                        var tempVal = parseFloat((weightMatrix[calcnIndex][i] + learningRate * (desiredOPs[inputIndex][calcnIndex] - OP[calcnIndex]) * input[i]).toFixed(4));
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.newWtVector tr." + i + " td.0").text(tempVal); //Changes new weight vectors in carousel
                        $("#" + lrString + "_SecondPartOfExpln table.newWtVectorW" + calcnIndex + " tr.0 td." + i).text(tempVal); //Changes new weight vectors displayed after carousel
                        $("#" + lrString + "_SecondPartOfExpln table.newWeightMatrix tr." + calcnIndex + " td." + i).text(tempVal);
                        if (weightMatrix[calcnIndex][i] != tempVal) {
                            weightChangedFlag = true;
                            weightMatrixChangedFlag = true;
                        }
                        weightMatrix[calcnIndex][i] = tempVal; //The new weight matrix is calculated over here
                    }

                    if (weightChangedFlag == true) { //The corresponding carousel card will be colored depending on whether the weight has changed or not
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex).css("background-color", "#FFD6D6");
                    } else {
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex).css("background-color", "#CDFFAF");
                    }
                }

                //Final conclusion of whether weight matrix has got modified or not is mentioned over here
                if (weightMatrixChangedFlag == true) {
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").html("The weight matrix has <b>changed</b> and hence the graph will also change.");
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").css("color", "#d22626");
                } else {
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").html("The weight matrix <b>hasn't changed</b> and hence the graph remains unchanged.");
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").css("color", "#009B03");
                }


                /* Here the rest of the divs and contents are displayed one by one */
                timers.push(window.setTimeout(function() {
                    $("#all_" + lrString + "WtChngeCalcns_Carousel").carousel();
                    $("#all_" + lrString + "WtChngeCalcns_Carousel").slideDown(500);

                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 0);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine0", 1000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine1", 3000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine2", 4000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln table.newWtVectorW0", 5000);
                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 5000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine3", 8000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln table.newWtVectorW1", 9000);
                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 9000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine4", 12000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln table.newWtVectorW2", 13000);
                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 13000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine5", 16000);
                    scrollToElement("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine5", 16000);

                    timers.push(window.setTimeout(function() {
                        $("line." + lrString + "Neur_1_lines").removeClass("animatedLineRegionBlue");
                        $("line." + lrString + "Neur_2_lines").removeClass("animatedLineRegionRed");
                        $("line." + lrString + "Neur_3_lines").removeClass("animatedLineRegionGreen");

                        $("#" + lrString + "_SecondPartOfExpln table.newWeightMatrix").slideDown(500);
                        revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6", 1500);
                        scrollToElement("#" + lrString + "_SecondPartOfExpln table.newWeightMatrix", 0);
                        scrollToElement("#" + lrString + "GraphDiv", 4000);

                        timers.push(window.setTimeout(function() {
                            displayWeightsInNeuralNet(lrString);
                            plotGraph(lrString);

                            /* Highlight the input that was just considered */
                            points[inputIndex].fillColor('#000000');
                            points[inputIndex].strokeColor('#000000');
                            points[inputIndex].size(15);

                            if (inputIndex != inputs.length - 1) {
                                timers.push(window.setTimeout(function() {
                                    $("#" + lrString + "NextButton").removeAttr("disabled");
                                    $("#" + lrString + "NextButton").removeClass("disabled");
                                    $("#" + lrString + "NextButton").addClass("displayActivatedButton");
                                    $("#" + lrString + "NextButton").click(function() {
                                        learnInput(lrString, inputIndex + 1);
                                    });
                                }, 1000));
                            } else {
                                alert("Simulation has been completed! As you can see from the graph, the classifier is converging towards classifying all inputs correctly!")
                            }
                        }, 6000));
                    }, 18000));

                }, 16000));
            }, 15000));
        }, 5000));


    } else if (lrString == "hebbLR") {

        $("#" + lrString + "NextButton").attr("disabled");
        $("#" + lrString + "NextButton").addClass("disabled");
        $("#" + lrString + "NextButton").removeClass("displayActivatedButton");
        $("#" + lrString + "NextButton").unbind("click");
        $(".changingTextStyle").text("");

        var constPointSize = 5;
        $("#" + lrString + "_FirstPartOfExpln").css("display", "none");
        $("#" + lrString + "_SecondPartOfExpln").css("display", "none");

        $(".changingBlocks").fadeOut(300);

        plotGraph(lrString);

        /* Scroll to neuralnet */
        scrollToElement("#" + lrString + "_svg", 0);

        /* This snippet will highlight selected point on JSXGraph */
        timers.push(window.setTimeout(function() {
            points[inputIndex].fillColor('#000000');
            points[inputIndex].strokeColor('#000000');
            points[inputIndex].size(25);
            timers.push(window.setTimeout(function() {
                points[inputIndex].fillColor(desiredOPsProps[inputIndex][1]);
                points[inputIndex].strokeColor(desiredOPsProps[inputIndex][1]);
                points[inputIndex].size(constPointSize);
                timers.push(window.setTimeout(function() {
                    points[inputIndex].fillColor('#000000');
                    points[inputIndex].strokeColor('#000000');
                    points[inputIndex].size(25);
                    timers.push(window.setTimeout(function() {
                        points[inputIndex].fillColor(desiredOPsProps[inputIndex][1]);
                        points[inputIndex].strokeColor(desiredOPsProps[inputIndex][1]);
                        points[inputIndex].size(constPointSize);
                        timers.push(window.setTimeout(function() {
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
            $("." + lrString + "X_inputX" + (i + 1)).text(input[i]);
        }

        /* Show flow animation */
        timers.push(window.setTimeout(function() {
            $("line." + lrString + "Neur_1_lines").addClass("animatedLineRegionBlue");
            $("line." + lrString + "Neur_2_lines").addClass("animatedLineRegionRed");
            $("line." + lrString + "Neur_3_lines").addClass("animatedLineRegionGreen");
        }, 2000));


        timers.push(window.setTimeout(function() {
            $("#" + lrString + "_FirstPartOfExpln").slideDown(1000);
            /* The matrix to be displayed is initialized */
            for (var i = 0; i < input.length; i++) {
                $("#" + lrString + "_FirstPartOfExpln table.inputVector tr." + i + " td.0").text(input[i]);
            }
            for (var i = 0; i < weightMatrix.length; i++) {
                for (var j = 0; j < weightMatrix[i].length; j++) {
                    $("#" + lrString + "_FirstPartOfExpln table.weightMatrix tr." + i + " td." + j).text(weightMatrix[i][j]);
                }
            }

            var tempOP = [0, 0, 0];
            var OP = [0, 0, 0];

            /* Do all the calculations */
            for (var i = 0; i < weightMatrix.length; i++) {

                //Here is the summation function
                for (var j = 0; j < weightMatrix[i].length; j++) {
                    tempOP[i] = parseFloat((tempOP[i] + weightMatrix[i][j] * input[j]).toFixed(4)); //W x X
                }
                $("#" + lrString + "_FirstPartOfExpln table.summationVector tr." + i + " td.0").text(tempOP[i]);


                //Here is the activation function
                var tempOPVal = parseFloat((Math.exp(-tempOP[i])).toFixed(6));
                tempOPVal = parseFloat((2 / (1 + tempOPVal) - 1).toFixed(4));
                $("#" + lrString + "_FirstPartOfExpln table.outputVector tr." + i + " td.0").text(tempOPVal);
                $("#" + lrString + "_SecondPartOfExpln table.outputVector tr." + i + " td.0").text(tempOPVal);
                OP[i] = tempOPVal;
                $("." + lrString + "_outputO" + (i + 1)).text(tempOPVal);
            }

            //Display these vectors and weight matrix one by one
            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.weightMatrix", 1000);
            scrollToElement("#" + lrString + "_FirstPartOfExpln table.weightMatrix", 1000);

            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.inputVector", 2000);

            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.summationVector", 6000);

            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.outputVector", 8000);

            //Display desired Output vector
            for (var i = 0; i < input.length; i++) {
                $("#" + lrString + "_SecondPartOfExpln table.desiredOutputVector tr." + i + " td.0").text(desiredOPs[inputIndex][i]);
            }

            //Start second part of explanation
            timers.push(window.setTimeout(function() {

                revealByFadeIn("#" + lrString + "_SecondPartOfExpln table.outputVector", 0);
                scrollToElement("#" + lrString + "_SecondPartOfExpln table.outputVector", 0);
                $("#" + lrString + "_SecondPartOfExpln").slideDown(500);

                //Reveal individual Elements one by one            
                revealByFadeIn("#" + lrString + "_SecondPartOfExpln table.desiredOutputVector", 2000);
                scrollToElement("#" + lrString + "_SecondPartOfExpln table.desiredOutputVector", 2000);

                revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealText1", 4000);
                scrollToElement("#" + lrString + "_SecondPartOfExpln div.revealText1", 4000);

                revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealText2", 8000);

                revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealText3", 12000);

                var weightMatrixChangedFlag = false;

                /* The content of carousel displayed is set over here */
                for (var calcnIndex = 0; calcnIndex < weightMatrix.length; calcnIndex++) {
                    //$("#"+lrString+"CalcnExplnFor_i_" + calcnIndex + " span.Di").text(desiredOPs[inputIndex][calcnIndex]);
                    $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " span.Oi").text(OP[calcnIndex]);

                    for (var i = 0; i < input.length; i++) {
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.indWeightVector tr." + i + " td.0").text(weightMatrix[calcnIndex][i]);
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.inputVector tr." + i + " td.0").text(input[i]);
                    }

                    revealByFadeIn("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.indWeightVector", 20000)

                    revealByFadeIn("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.inputVector", 20000)

                    var weightChangedFlag = false;

                    for (var i = 0; i < input.length; i++) {
                        var tempVal = parseFloat((weightMatrix[calcnIndex][i] + learningRate * (OP[calcnIndex]) * input[i]).toFixed(4));
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.newWtVector tr." + i + " td.0").text(tempVal); //Changes new weight vectors in carousel
                        $("#" + lrString + "_SecondPartOfExpln table.newWtVectorW" + calcnIndex + " tr.0 td." + i).text(tempVal); //Changes new weight vectors displayed after carousel
                        $("#" + lrString + "_SecondPartOfExpln table.newWeightMatrix tr." + calcnIndex + " td." + i).text(tempVal);
                        if (weightMatrix[calcnIndex][i] != tempVal) {
                            weightChangedFlag = true;
                            weightMatrixChangedFlag = true;
                        }
                        weightMatrix[calcnIndex][i] = tempVal; //The new weight matrix is calculated over here
                    }
                    /* Here due to the learning rule, all weights will change hence, coloring of carousel cards is not done */

                }

                //Final conclusion of whether weight matrix has got modified or not is mentioned over here
                if (weightMatrixChangedFlag == true) {
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").html("The weight matrix has <b>changed</b> and hence the graph will also change.");
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").css("color", "#d22626");
                } else {
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").html("The weight matrix <b>hasn't changed</b> and hence the graph remains unchanged.");
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").css("color", "#009B03");
                }

                /* Here the rest of the divs and contents are displayed one by one */
                timers.push(window.setTimeout(function() {
                    $("#all_" + lrString + "WtChngeCalcns_Carousel").carousel();
                    $("#all_" + lrString + "WtChngeCalcns_Carousel").slideDown(500);

                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 0);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine1", 3000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine2", 4000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln table.newWtVectorW0", 5000);
                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 5000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine3", 8000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln table.newWtVectorW1", 9000);
                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 9000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine4", 12000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln table.newWtVectorW2", 13000);
                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 13000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine5", 16000);
                    scrollToElement("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine5", 16000);

                    timers.push(window.setTimeout(function() {
                        $("line." + lrString + "Neur_1_lines").removeClass("animatedLineRegionBlue");
                        $("line." + lrString + "Neur_2_lines").removeClass("animatedLineRegionRed");
                        $("line." + lrString + "Neur_3_lines").removeClass("animatedLineRegionGreen");

                        $("#" + lrString + "_SecondPartOfExpln table.newWeightMatrix").slideDown(500);
                        revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6", 1500);
                        scrollToElement("#" + lrString + "_SecondPartOfExpln table.newWeightMatrix", 0);
                        scrollToElement("#" + lrString + "GraphDiv", 4000);

                        timers.push(window.setTimeout(function() {
                            displayWeightsInNeuralNet(lrString);
                            plotGraph(lrString);

                            /* Highlight the input that was just considered */
                            points[inputIndex].fillColor('#000000');
                            points[inputIndex].strokeColor('#000000');
                            points[inputIndex].size(15);

                            if (inputIndex != inputs.length - 1) {
                                timers.push(window.setTimeout(function() {
                                    $("#" + lrString + "NextButton").removeAttr("disabled");
                                    $("#" + lrString + "NextButton").removeClass("disabled");
                                    $("#" + lrString + "NextButton").addClass("displayActivatedButton");
                                    $("#" + lrString + "NextButton").click(function() {
                                        learnInput(lrString, inputIndex + 1, );
                                    });
                                }, 1000));
                            } else {
                                alert("Simulation has been completed! As you can see from the graph, the classifier is converging towards classifying all inputs correctly!")
                            }
                        }, 6000));
                    }, 18000));

                }, 16000));
            }, 15000));
        }, 5000));

    } else if (lrString == "corrLR") {


        $("#" + lrString + "NextButton").attr("disabled");
        $("#" + lrString + "NextButton").addClass("disabled");
        $("#" + lrString + "NextButton").removeClass("displayActivatedButton");
        $("#" + lrString + "NextButton").unbind("click");
        $(".changingTextStyle").text("");

        var constPointSize = 5;
        $("#" + lrString + "_FirstPartOfExpln").css("display", "none");
        $("#" + lrString + "_SecondPartOfExpln").css("display", "none");

        $(".changingBlocks").fadeOut(300);

        plotGraph(lrString);

        /* Scroll to neuralnet */
        scrollToElement("#" + lrString + "_svg", 0);

        /* This snippet will highlight selected point on JSXGraph */
        timers.push(window.setTimeout(function() {
            points[inputIndex].fillColor('#000000');
            points[inputIndex].strokeColor('#000000');
            points[inputIndex].size(25);
            timers.push(window.setTimeout(function() {
                points[inputIndex].fillColor(desiredOPsProps[inputIndex][1]);
                points[inputIndex].strokeColor(desiredOPsProps[inputIndex][1]);
                points[inputIndex].size(constPointSize);
                timers.push(window.setTimeout(function() {
                    points[inputIndex].fillColor('#000000');
                    points[inputIndex].strokeColor('#000000');
                    points[inputIndex].size(25);
                    timers.push(window.setTimeout(function() {
                        points[inputIndex].fillColor(desiredOPsProps[inputIndex][1]);
                        points[inputIndex].strokeColor(desiredOPsProps[inputIndex][1]);
                        points[inputIndex].size(constPointSize);
                        timers.push(window.setTimeout(function() {
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
            $("." + lrString + "X_inputX" + (i + 1)).text(input[i]);
        }

        /* Show flow animation */
        timers.push(window.setTimeout(function() {
            $("line." + lrString + "Neur_1_lines").addClass("animatedLineRegionBlue");
            $("line." + lrString + "Neur_2_lines").addClass("animatedLineRegionRed");
            $("line." + lrString + "Neur_3_lines").addClass("animatedLineRegionGreen");
        }, 2000));


        timers.push(window.setTimeout(function() {
            $("#" + lrString + "_FirstPartOfExpln").slideDown(1000);

            /* The matrix to be displayed is initialized */
            for (var i = 0; i < input.length; i++) {
                $("#" + lrString + "_FirstPartOfExpln table.inputVector tr." + i + " td.0").text(input[i]);
            }
            for (var i = 0; i < weightMatrix.length; i++) {
                for (var j = 0; j < weightMatrix[i].length; j++) {
                    $("#" + lrString + "_FirstPartOfExpln table.weightMatrix tr." + i + " td." + j).text(weightMatrix[i][j]);
                }
            }

            var tempOP = [0, 0, 0];
            var OP = [0, 0, 0];

            /* Do all the calculations */
            for (var i = 0; i < weightMatrix.length; i++) {

                //Here is the summation function
                for (var j = 0; j < weightMatrix[i].length; j++) {
                    tempOP[i] = parseFloat((tempOP[i] + weightMatrix[i][j] * input[j]).toFixed(4)); //W x X
                }
                $("#" + lrString + "_FirstPartOfExpln table.summationVector tr." + i + " td.0").text(tempOP[i]);


                //Here is the activation function
                if (tempOP[i] >= 0) {
                    $("#" + lrString + "_FirstPartOfExpln table.outputVector tr." + i + " td.0").text("1");
                    $("#" + lrString + "_SecondPartOfExpln table.outputVector tr." + i + " td.0").text("1");
                    OP[i] = 1;
                    $("." + lrString + "_outputO" + (i + 1)).text("+1");
                } else {
                    $("#" + lrString + "_FirstPartOfExpln table.outputVector tr." + i + " td.0").text("-1");
                    $("#" + lrString + "_SecondPartOfExpln table.outputVector tr." + i + " td.0").text("-1");
                    OP[i] = -1;
                    $("." + lrString + "_outputO" + (i + 1)).text("-1");
                }
            }

            //Display these vectors and weight matrix one by one
            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.weightMatrix", 1000);
            scrollToElement("#" + lrString + "_FirstPartOfExpln table.weightMatrix", 1000);

            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.inputVector", 2000);

            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.summationVector", 6000);

            revealByFadeIn("#" + lrString + "_FirstPartOfExpln table.outputVector", 8000);

            //Display desired Output vector
            for (var i = 0; i < input.length; i++) {
                $("#" + lrString + "_SecondPartOfExpln table.desiredOutputVector tr." + i + " td.0").text(desiredOPs[inputIndex][i]);
            }

            //Start second part of explanation
            timers.push(window.setTimeout(function() {
                //$("#"+lrString+"_FirstPartOfExpln").slideUp(2000);

                revealByFadeIn("#" + lrString + "_SecondPartOfExpln table.outputVector", 0);
                scrollToElement("#" + lrString + "_SecondPartOfExpln table.outputVector", 0);
                $("#" + lrString + "_SecondPartOfExpln").slideDown(500);

                //Reveal individual Elements one by one            
                revealByFadeIn("#" + lrString + "_SecondPartOfExpln table.desiredOutputVector", 2000);
                scrollToElement("#" + lrString + "_SecondPartOfExpln table.desiredOutputVector", 2000);

                revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealText1", 4000);
                scrollToElement("#" + lrString + "_SecondPartOfExpln div.revealText1", 4000);

                revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealText2", 8000);

                revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealText3", 12000);

                var weightMatrixChangedFlag = false;

                /* The content of carousel displayed is set over here */
                for (var calcnIndex = 0; calcnIndex < weightMatrix.length; calcnIndex++) {
                    $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " span.Di").text(desiredOPs[inputIndex][calcnIndex]);

                    for (var i = 0; i < input.length; i++) {
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.indWeightVector tr." + i + " td.0").text(weightMatrix[calcnIndex][i]);
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.inputVector tr." + i + " td.0").text(input[i]);
                    }

                    revealByFadeIn("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.indWeightVector", 20000)

                    revealByFadeIn("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.inputVector", 20000)

                    var weightChangedFlag = false;

                    for (var i = 0; i < input.length; i++) {

                        var tempVal = parseFloat((weightMatrix[calcnIndex][i] + learningRate * (desiredOPs[inputIndex][calcnIndex]) * input[i]).toFixed(4));
                        $("#" + lrString + "CalcnExplnFor_i_" + calcnIndex + " table.newWtVector tr." + i + " td.0").text(tempVal); //Changes new weight vectors in carousel
                        $("#" + lrString + "_SecondPartOfExpln table.newWtVectorW" + calcnIndex + " tr.0 td." + i).text(tempVal); //Changes new weight vectors displayed after carousel
                        $("#" + lrString + "_SecondPartOfExpln table.newWeightMatrix tr." + calcnIndex + " td." + i).text(tempVal);
                        if (weightMatrix[calcnIndex][i] != tempVal) {
                            weightChangedFlag = true;
                            weightMatrixChangedFlag = true;
                        }
                        weightMatrix[calcnIndex][i] = tempVal; //The new weight matrix is calculated over here
                    }
                    /* Here due to the learning rule, all weights will change hence, coloring of carousel cards is not done */

                }

                //Final conclusion of whether weight matrix has got modified or not is mentioned over here
                if (weightMatrixChangedFlag == true) {
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").html("The weight matrix has <b>changed</b> and hence the graph will also change.");
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").css("color", "#d22626");
                } else {
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").html("The weight matrix <b>hasn't changed</b> and hence the graph remains unchanged.");
                    $("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6").css("color", "#009B03");
                }

                /* Here the rest of the divs and contents are displayed one by one */
                timers.push(window.setTimeout(function() {
                    $("#all_" + lrString + "WtChngeCalcns_Carousel").carousel();
                    $("#all_" + lrString + "WtChngeCalcns_Carousel").slideDown(500);

                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 0);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine1", 3000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine2", 4000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln table.newWtVectorW0", 5000);
                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 5000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine3", 8000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln table.newWtVectorW1", 9000);
                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 9000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine4", 12000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln table.newWtVectorW2", 13000);
                    scrollToElement("#all_" + lrString + "WtChngeCalcns_Carousel", 13000);

                    revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine5", 16000);
                    scrollToElement("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine5", 16000);

                    timers.push(window.setTimeout(function() {
                        $("line." + lrString + "Neur_1_lines").removeClass("animatedLineRegionBlue");
                        $("line." + lrString + "Neur_2_lines").removeClass("animatedLineRegionRed");
                        $("line." + lrString + "Neur_3_lines").removeClass("animatedLineRegionGreen");

                        $("#" + lrString + "_SecondPartOfExpln table.newWeightMatrix").slideDown(500);
                        revealBySlideDown("#" + lrString + "_SecondPartOfExpln div.revealNewWtLine6", 1500);
                        scrollToElement("#" + lrString + "_SecondPartOfExpln table.newWeightMatrix", 0);
                        scrollToElement("#" + lrString + "GraphDiv", 4000);

                        timers.push(window.setTimeout(function() {
                            displayWeightsInNeuralNet(lrString);
                            plotGraph(lrString);

                            /* Highlight the input that was just considered */
                            points[inputIndex].fillColor('#000000');
                            points[inputIndex].strokeColor('#000000');
                            points[inputIndex].size(15);

                            if (inputIndex != inputs.length - 1) {
                                timers.push(window.setTimeout(function() {
                                    $("#" + lrString + "NextButton").removeAttr("disabled");
                                    $("#" + lrString + "NextButton").removeClass("disabled");
                                    $("#" + lrString + "NextButton").addClass("displayActivatedButton");
                                    $("#" + lrString + "NextButton").click(function() {
                                        learnInput(lrString, inputIndex + 1, );
                                    });
                                }, 1000));
                            } else {
                                alert("Simulation has been completed! As you can see from the graph, the classifier is converging towards classifying all inputs correctly!")
                            }
                        }, 6000));
                    }, 18000));

                }, 16000));
            }, 15000));
        }, 5000));
    }


}

/* 
This function has been defined to reduce the number of lines of code 
This will just scroll to the element whose selector is elem after time ms
*/
function scrollToElement(elem, time) {
    if (time == null) time = 0;
    timers.push(window.setTimeout(function() {
        $('html, body').animate({
            scrollTop: $(elem).offset().top
        }, 1500);
    }, time));
}

/* 
This function has been defined to reduce the number of lines of code 
This will just fadeIn the element whose selector is elem after time ms
*/
function revealByFadeIn(elem, time) {
    timers.push(window.setTimeout(function() {
        $(elem).fadeIn(500);
    }, time));
}

/* 
This function has been defined to reduce the number of lines of code 
This will just slideDown the element whose selector is elem after time ms
*/
function revealBySlideDown(elem, time) {
    timers.push(window.setTimeout(function() {
        $(elem).slideDown(500);
    }, time));
}


/* Depending on the learning rule, the points are plotted and the lines depending on the current values of the weight matrix are plotted */
function plotGraph(lrString) {
    points = [];
    lines = [];
    var board = JXG.JSXGraph.initBoard(lrString + 'GraphDiv', {
        axis: true,
        boundingbox: [-4, 5, 4, -3],
        showCopyright: false,
        showNavigation: false
    }); //Creates the cartesian graph
    var constPointSize = 5;

    /* Plots the points */
    for (var i = 0; i < inputs.length; i++) {
        points[i] = board.create('point', [inputs[i][0], inputs[i][1]], {
            size: constPointSize,
            face: desiredOPsProps[i][0],
            fixed: true,
            color: desiredOPsProps[i][1]
        });
    }

    /* Plots the lines and the corresponding inequalities */
    for (var i = 0; i < weightMatrix.length; i++) {
        lines[i] = board.create('line', [weightMatrix[i][2], weightMatrix[i][0], weightMatrix[i][1]], {
            strokeColor: lineColors[i],
            fixed: true
        });
        ineq = board.create('inequality', [lines[i]], {
            inverse: true,
            fillColor: lineColors[i]
        });

    }

}