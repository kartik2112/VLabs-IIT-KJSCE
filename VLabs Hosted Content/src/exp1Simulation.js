/*
Here by using dropdown you can select the Gate
Thus at a time only one will be visible while others will have 'display: none'
*/
var AND_threshold = 0,
    OR_threshold = 0,
    NOT_threshold = 0;
var AND_w1 = 1,
    OR_w1 = 0;
var AND_w2 = 1,
    OR_w2 = 0;
var NOT_w1 = 1;
var AND_calcOP, OR_calcOP, NOT_calcOP;
var gate_id = 1;
var timer1, timer2, timer3, timer4, intervalTimer;

$(document).ready(function() {
    /*
    Initialize AND Gate sliders and add listeners to them
    */
    $("#AND_Gate_Threshold_slider").slider({
        max: 6.5,
        min: -2,
        step: 0.1,
        slide: function(event, ui) {
            $(".AND-threshold-value").text(ui.value);
            AND_threshold = ui.value;
            plotANDGraph();
        }
    });
    $(".AND-threshold-value").text($("#AND_Gate_Threshold_slider").slider("value"));
    AND_threshold = $("#AND_Gate_Threshold_slider").slider("value");


    $("#AND_Gate_w1_slider").slider({
        max: 3,
        min: -1,
        value: 1,
        step: 0.05,
        slide: function(event, ui) {
            $(".AND-inputX-oplay_neuron1-weight").text(ui.value);
            AND_w1 = ui.value;
            plotANDGraph();
        }
    });
    $(".AND-inputX-oplay_neuron1-weight").text($("#AND_Gate_w1_slider").slider("value"));
    AND_w1 = $("#AND_Gate_w1_slider").slider("value");


    $("#AND_Gate_w2_slider").slider({
        max: 3,
        min: -1,
        value: 1,
        step: 0.05,
        slide: function(event, ui) {
            $(".AND-inputY-oplay_neuron1-weight").text(ui.value);
            AND_w2 = ui.value;
            plotANDGraph();
        }
    });
    $(".AND-inputY-oplay_neuron1-weight").text($("#AND_Gate_w2_slider").slider("value"));
    AND_w2 = $("#AND_Gate_w2_slider").slider("value");



    /*
    Initialize OR Gate sliders and add listeners to them
    */
    $("#OR_Gate_Threshold_slider").slider({
        max: 6.5,
        min: -2,
        step: 0.1,
        slide: function(event, ui) {
            $(".OR-threshold-value").text(ui.value);
            OR_threshold = ui.value;
            plotORGraph();
        }
    });
    $(".OR-threshold-value").text($("#OR_Gate_Threshold_slider").slider("value"));
    OR_threshold = $("#OR_Gate_Threshold_slider").slider("value");


    $("#OR_Gate_w1_slider").slider({
        max: 3,
        min: -1,
        value: 1,
        step: 0.05,
        slide: function(event, ui) {
            $(".OR-inputX-oplay_neuron1-weight").text(ui.value);
            OR_w1 = ui.value;
            plotORGraph();
        }
    });
    $(".OR-inputX-oplay_neuron1-weight").text($("#OR_Gate_w1_slider").slider("value"));
    OR_w1 = $("#OR_Gate_w1_slider").slider("value");
    
    
    $("#OR_Gate_w2_slider").slider({
        max: 3,
        min: -1,
        value: 1,
        step: 0.05,
        slide: function(event, ui) {
            $(".OR-inputY-oplay_neuron1-weight").text(ui.value);
            OR_w2 = ui.value;
            plotORGraph();
        }
    });
    $(".OR-inputY-oplay_neuron1-weight").text($("#OR_Gate_w2_slider").slider("value"));
    OR_w2 = $("#OR_Gate_w2_slider").slider("value");



    /*
    Initialize NOT Gate sliders and add listeners to them
    */
    $("#NOT_Gate_Threshold_slider").slider({
        max: 6.5,
        min: -2,
        step: 0.1,
        slide: function(event, ui) {
            $(".NOT-threshold-value").text(ui.value);
            NOT_threshold = ui.value;
            plotNOTGraph();
        }
    });
    $(".NOT-threshold-value").text($("#NOT_Gate_Threshold_slider").slider("value"));
    NOT_threshold = $("#NOT_Gate_Threshold_slider").slider("value");


    $("#NOT_Gate_w1_slider").slider({
        max: 3,
        min: -1,
        value: 1,
        step: 0.05,
        slide: function(event, ui) {
            $(".NOT-inputX-oplay_neuron1-weight").text(ui.value);
            NOT_w1 = ui.value;
            plotNOTGraph();
        }
    });
    $(".NOT-inputX-oplay_neuron1-weight").text($("#NOT_Gate_w1_slider").slider("value"));
    NOT_w1 = $("#NOT_Gate_w1_slider").slider("value");




    /*
    Plot the graphs
    */
    plotANDGraph();
    plotORGraph();
    plotNOTGraph();

});


/*
This is the dropdown event handler
*/
function displayDiv(val) {
    if (val == "AND") {
        gate_id = 1;
        $("#OR-gate-sim").slideUp(400);
        $("#NOT-gate-sim").slideUp(400);
        $("#AND-gate-sim").slideDown(400);
    } else if (val == "OR") {
        gate_id = 2;
        $("#NOT-gate-sim").slideUp(400);
        $("#AND-gate-sim").slideUp(400);
        $("#OR-gate-sim").slideDown(400);
    } else {
        gate_id = 3;
        $("#OR-gate-sim").slideUp(400);
        $("#AND-gate-sim").slideUp(400);
        $("#NOT-gate-sim").slideDown(400);
    }
    stopSimulation();
}


/*
When the Stop Simulation button is clicked this function gets triggered
*/
function stopSimulation() {
    resetCompleteSimulation();
    $(".sliders").slider("enable");

    $("#startSimButton").removeClass("disabled");
    $("#startSimButton").removeAttr("disabled");
    $("#selGate").prop("disabled", false);
    $("#stopSimButton").addClass("disabled");
    $("#stopSimButton").attr("disabled", "disabled");

    window.clearTimeout(timer1);
    window.clearTimeout(timer2);
    window.clearTimeout(timer3);
    window.clearTimeout(timer4);
    window.clearInterval(intervalTimer);
}


/*
This will remove highlights from the currently visible truth table and reset the values in this truth table
*/
function resetCompleteSimulation() {
    resetSimulationPart();
    if (gate_id == 1) {
    	$("#ANDNextButton").unbind("click");
    	$("#ANDNextButton").addClass("disabled");
		$("#ANDNextButton").attr("disabled", "disabled");
		$("#ANDNextButton").removeClass("displayActivatedButton");
		
        $(".AND-TT-rows").removeClass("highlightTTRow");
        $(".AND-TT-OP-rows").text("");
    } else if (gate_id == 2) {
    	$("#ORNextButton").unbind("click");
    	$("#ORNextButton").addClass("disabled");
		$("#ORNextButton").attr("disabled", "disabled");
		$("#ORNextButton").removeClass("displayActivatedButton");
		
        $(".OR-TT-rows").removeClass("highlightTTRow");
        $(".OR-TT-OP-rows").text("");
    } else if (gate_id == 3) {
    	$("#NOTNextButton").unbind("click");
    	$("#NOTNextButton").addClass("disabled");
		$("#NOTNextButton").attr("disabled", "disabled");
		$("#NOTNextButton").removeClass("displayActivatedButton");
		
        $(".NOT-TT-rows").removeClass("highlightTTRow");
        $(".NOT-TT-OP-rows").text("");
    }
}


/*
This will reset the neural network line colors
*/
function resetSimulationPart() {
    $(".changingTextStyle").text("");

    $(".StdLine").removeClass("animatedLineGreen");
    $(".StdLine").removeClass("animatedLinePurple");
    $(".StdLine").removeClass("animatedLine");
}


/*
The appropriate function - simulateANDGate, simulateORGate, simulateNOTGate will be called
from startSimulation depending on the gate that is active
*/
function simulateANDGate(iterationNo, inputX, inputY, w1, w2, threshold, interval, timer) {
    $("#ANDNextButton").addClass("disabled");
    $("#ANDNextButton").attr("disabled", "disabled");
    $("#ANDNextButton").removeClass("displayActivatedButton");
    /* This is the way arrays were getting passed as String */
    inputX = inputX.split(",");
    inputY = inputY.split(",");

    resetSimulationPart();

    /*
    Remove all highlights from truth table and highlight current truth table row
    */
    $(".AND-TT-rows").removeClass("highlightTTRow");
    $("#AND-TT-row-" + (iterationNo + 1)).addClass("highlightTTRow");

    /*
    Set animations on lines
    */
    $(".AND-XVal").text(inputX[iterationNo]);
    $(".AND-YVal").text(inputY[iterationNo]);
    $("#AND-inputX-oplay_neuron1").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
    $("#AND-inputY-oplay_neuron1").addClass(inputY[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
    var ux = parseFloat((w1 * inputX[iterationNo] + w2 * inputY[iterationNo]).toFixed(4)); /* Calculate intermediate, Y' */
    //alert(w1 + " " + w2 + " " + inputX[iterationNo] + " " + inputY[iterationNo] + " " + ux);

    timer1 = window.setTimeout(function() {

        /* Display Y' and pause */
        $("#AND-ux-value").text("= " + ux);

        timer2 = window.setTimeout(function() {
            /* Display threshold calculation and pause */
            $("#AND-oplay_neuron1-oplay_thrshld").addClass("animatedLine");
            if (ux >= threshold) {
                $("#AND-yx-value-expln").text("Y' = " + ux + " >= " + threshold);
            } else {
                $("#AND-yx-value-expln").text("Y' = " + ux + " < " + threshold);
            }

            timer3 = window.setTimeout(function() {
                /* Display calculation output as Z' and add to truth table */
                if (ux >= threshold) {
                    $("#AND-yx-value-expln").text("Y' = " + ux + " >= " + threshold + " ⇒ Z' = 1"); /* Change explanation to include Z' */
                    $("#AND-TT-OP-row-" + (iterationNo + 1)).text(1); /* Add entry in truth table */
                    $("#AND-yx-value").text("= " + 1);
                    AND_calcOP.push(1);
                } else {
                    $("#AND-yx-value-expln").text("Y' = " + ux + " < " + threshold + " ⇒ Z' = 0"); /* Change explanation to include Z' */
                    $("#AND-TT-OP-row-" + (iterationNo + 1)).text(0); /* Add entry in truth table */
                    $("#AND-yx-value").text("= " + 0);
                    AND_calcOP.push(0);
                }

                if (iterationNo != 3) {
                    $("#ANDNextButton").unbind("click");
                    $("#ANDNextButton").removeClass("disabled");
                    $("#ANDNextButton").removeAttr("disabled");
                    $("#ANDNextButton").addClass("displayActivatedButton");
                    $("#ANDNextButton").click(function() {
                        simulateANDGate(iterationNo + 1, inputX.join(","), inputY.join(","), w1, w2, threshold, interval);
                    });
                } else {
                    $(".StdLine").removeClass("animatedLineGreen");
                    $(".StdLine").removeClass("animatedLinePurple");
                    $(".StdLine").removeClass("animatedLine");
                    $(".sliders").slider("enable");
                    $("#startSimButton").removeClass("disabled");
                    $("#startSimButton").removeAttr("disabled");
                    $("#selGate").prop("disabled", false);
                    $("#stopSimButton").addClass("disabled");
                    $("#stopSimButton").attr("disabled", "disabled");
                    alert("Simulation Complete!");
                    verifyANDOutputs();
                }

            }, interval * 6);
        }, interval * 4);

    }, interval * 2);
}



function simulateORGate(iterationNo, inputX, inputY, w1, w2, threshold, interval, timer) {
    $("#ORNextButton").addClass("disabled");
    $("#ORNextButton").attr("disabled", "disabled");
    $("#ORNextButton").removeClass("displayActivatedButton");
    /* This is the way arrays were getting passed as String */
    inputX = inputX.split(",");
    inputY = inputY.split(",");

    resetSimulationPart();

    /*
    Remove all highlights from truth table and highlight current truth table row
    */
    $(".OR-TT-rows").removeClass("highlightTTRow");
    $("#OR-TT-row-" + (iterationNo + 1)).addClass("highlightTTRow");

    /*
    Set animations on lines
    */
    $(".OR-XVal").text(inputX[iterationNo]);
    $(".OR-YVal").text(inputY[iterationNo]);
    $("#OR-inputX-oplay_neuron1").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
    $("#OR-inputY-oplay_neuron1").addClass(inputY[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
    var ux = parseFloat((w1 * inputX[iterationNo] + w2 * inputY[iterationNo]).toFixed(4)); /* Calculate intermediate, Y' */
    //alert(w1 + " " + w2 + " " + inputX[iterationNo] + " " + inputY[iterationNo] + " " + ux);

    timer1 = window.setTimeout(function() {
        /* Display Y' and pause */
        $("#OR-ux-value").text("= " + ux);

        timer2 = window.setTimeout(function() {
            /* Display threshold calculation and pause */
            $("#OR-oplay_neuron1-oplay_thrshld").addClass("animatedLine");
            if (ux >= threshold) {
                $("#OR-yx-value-expln").text("Y' = " + ux + " >= " + threshold);
            } else {
                $("#OR-yx-value-expln").text("Y' = " + ux + " < " + threshold);
            }

            timer3 = window.setTimeout(function() {
                /* Display calculation output as Z' and add to truth table */
                if (ux >= threshold) {
                    $("#OR-yx-value-expln").text("Y' = " + ux + " >= " + threshold + " ⇒ Z' = 1"); /* Change explanation to include Z' */
                    $("#OR-TT-OP-row-" + (iterationNo + 1)).text(1); /* Add entry in truth table */
                    $("#OR-yx-value").text("= " + 1);
                    OR_calcOP.push(1);
                } else {
                    $("#OR-yx-value-expln").text("Y' = " + ux + " < " + threshold + " ⇒ Z' = 0"); /* Change explanation to include Z' */
                    $("#OR-TT-OP-row-" + (iterationNo + 1)).text(0); /* Add entry in truth table */
                    $("#OR-yx-value").text("= " + 0);
                    OR_calcOP.push(0);
                }

                if (iterationNo != 3) {
                    $("#ORNextButton").unbind("click");
                    $("#ORNextButton").removeClass("disabled");
                    $("#ORNextButton").removeAttr("disabled");
                    $("#ORNextButton").addClass("displayActivatedButton");
                    $("#ORNextButton").click(function() {
                        simulateORGate(iterationNo + 1, inputX.join(","), inputY.join(","), w1, w2, threshold, interval);
                    });
                } else {
                    $(".StdLine").removeClass("animatedLineGreen");
                    $(".StdLine").removeClass("animatedLinePurple");
                    $(".StdLine").removeClass("animatedLine");
                    $(".sliders").slider("enable");
                    $("#startSimButton").removeClass("disabled");
                    $("#startSimButton").removeAttr("disabled");
                    $("#selGate").prop("disabled", false);
                    $("#stopSimButton").addClass("disabled");
                    $("#stopSimButton").attr("disabled", "disabled");
                    alert("Simulation Complete!");
                    verifyOROutputs();
                }

            }, interval * 6);
        }, interval * 4);

    }, interval * 2);
}



function simulateNOTGate(iterationNo, inputX, w1, threshold, interval, timer) {
    $("#NOTNextButton").addClass("disabled");
    $("#NOTNextButton").attr("disabled", "disabled");
    $("#NOTNextButton").removeClass("displayActivatedButton");
    /* This is the way arrays were getting passed as String */
    inputX = inputX.split(",");

    resetSimulationPart();

    /*
    Remove all highlights from truth table and highlight current truth table row
    */
    $(".NOT-TT-rows").removeClass("highlightTTRow");
    $("#NOT-TT-row-" + (iterationNo + 1)).addClass("highlightTTRow");

    /*
    Set animations on lines
    */
    $(".NOT-XVal").text(inputX[iterationNo]);
    $("#NOT-inputX-oplay_neuron1").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
    var ux = parseFloat((w1 * inputX[iterationNo]).toFixed(4)); /* Calculate intermediate, Y' */
    //alert(w1 + " " + w2 + " " + inputX[iterationNo] + " " + inputY[iterationNo] + " " + ux);

    timer1 = window.setTimeout(function() {
        /* Display Y' and pause */
        $("#NOT-ux-value").text("= " + ux);

        timer2 = window.setTimeout(function() {
            /* Display threshold calculation and pause */
            $("#NOT-oplay_neuron1-oplay_thrshld").addClass("animatedLine");
            if (ux >= threshold) {
                $("#NOT-yx-value-expln").text("Y' = " + ux + " >= " + threshold);
            } else {
                $("#NOT-yx-value-expln").text("Y' = " + ux + " < " + threshold);
            }

            timer3 = window.setTimeout(function() {
                /* Display calculation output as Z' and add to truth table */
                if (ux >= threshold) {
                    $("#NOT-yx-value-expln").text("Y' = " + ux + " >= " + threshold + " ⇒ Z' = 1"); /* Change explanation to include Z' */
                    $("#NOT-TT-OP-row-" + (iterationNo + 1)).text(1); /* Add entry in truth table */
                    $("#NOT-yx-value").text("= " + 0);
                    NOT_calcOP.push(1);
                } else {
                    $("#NOT-yx-value-expln").text("Y' = " + ux + " < " + threshold + " ⇒ Z' = 0"); /* Change explanation to include Z' */
                    $("#NOT-TT-OP-row-" + (iterationNo + 1)).text(0); /* Add entry in truth table */
                    $("#NOT-yx-value").text("= " + 1);
                    NOT_calcOP.push(0);
                }

                if (iterationNo != 1) {
                    $("#NOTNextButton").unbind("click");
                    $("#NOTNextButton").removeClass("disabled");
                    $("#NOTNextButton").removeAttr("disabled");
                    $("#NOTNextButton").addClass("displayActivatedButton");
                    $("#NOTNextButton").click(function() {
                        simulateNOTGate(iterationNo + 1, inputX.join(","), w1, threshold, interval);
                    });
                } else {
                    $(".StdLine").removeClass("animatedLineGreen");
                    $(".StdLine").removeClass("animatedLinePurple");
                    $(".StdLine").removeClass("animatedLine");
                    $(".sliders").slider("enable");
                    $("#startSimButton").removeClass("disabled");
                    $("#startSimButton").removeAttr("disabled");
                    $("#selGate").prop("disabled", false);
                    $("#stopSimButton").addClass("disabled");
                    $("#stopSimButton").attr("disabled", "disabled");
                    alert("Simulation Complete!");
                    verifyNOTOutputs();
                }

            }, interval * 6);
        }, interval * 4);

    }, interval * 2);
}

/*
When the Start Simulation button is clicked the active gate's simulate function will be called as defined above
*/
function startSimulation(interval) {
    resetCompleteSimulation(); //This is used to reset the simulation

    var inputXofANDOR = [0, 0, 1, 1];
    var inputYofANDOR = [0, 1, 0, 1];
    var inputXofNOT = [0, 1];
    var iterationNo = 0;

    /*The outputs that will be calculated as the simulation proceeds will be stored in these arrays*/
    AND_calcOP = [];
    OR_calcOP = [];
    NOT_calcOP = [];

    $(".sliders").slider("disable");

    $("#startSimButton").addClass("disabled");
    $("#startSimButton").attr("disabled", "disabled");
    $("#selGate").prop("disabled", true);
    $("#stopSimButton").removeClass("disabled");
    $("#stopSimButton").removeAttr("disabled");

    /*
    Depending on the gate the appropriate simulate function will be called and 
    the page will scroll to the corresponding gate section
	*/
    if (gate_id == 1) {
        $('html, body').animate({
            scrollTop: $("#AND-box").offset().top
        }, 500);
        simulateANDGate(iterationNo, inputXofANDOR.join(","), inputYofANDOR.join(","), parseFloat(AND_w1), parseFloat(AND_w2), parseFloat(AND_threshold), interval);
    } else if (gate_id == 2) {
        $('html, body').animate({
            scrollTop: $("#OR-box").offset().top
        }, 500);
        simulateORGate(iterationNo, inputXofANDOR.join(","), inputYofANDOR.join(","), parseFloat(OR_w1), parseFloat(OR_w2), parseFloat(OR_threshold), interval);
    } else {
        $('html, body').animate({
            scrollTop: $("#NOT-box").offset().top
        }, 500);
        simulateNOTGate(iterationNo, inputXofNOT.join(","), parseFloat(NOT_w1), parseFloat(NOT_threshold), interval);

    }
}


/*
These verify functions will verify the expected outputs 
with the ones calculated along the course of the simulation
and display whether it matches or not
*/
function verifyANDOutputs() {
    var correctANDOPs = [0, 0, 0, 1];
    if (correctANDOPs.length == AND_calcOP.length) {
        for (var i = 0; i < AND_calcOP.length; i++) {
            if (correctANDOPs[i] != AND_calcOP[i]) {
                alert("Incorrect Output values obtained from Neural Network!!! Try some different weights and threshold.");
                return;
            }
        }
        alert("Correct Output values obtained from Neural Network!");
    }
}

function verifyOROutputs() {
    var correctOROPs = [0, 1, 1, 1];
    if (correctOROPs.length == OR_calcOP.length) {
        for (var i = 0; i < OR_calcOP.length; i++) {
            if (correctOROPs[i] != OR_calcOP[i]) {
                alert("Incorrect Output values obtained from Neural Network!!! Try some different weights and threshold.");
                return;
            }
        }
        alert("Correct Output values obtained from Neural Network!");
    }
}

function verifyNOTOutputs() {
    var correctNOTOPs = [1, 0];
    if (correctNOTOPs.length == NOT_calcOP.length) {
        for (var i = 0; i < NOT_calcOP.length; i++) {
            if (correctNOTOPs[i] != NOT_calcOP[i]) {
                alert("Incorrect Output values obtained from Neural Network!!! Try some different weights and threshold.");
                return;
            }
        }
        alert("Correct Output values obtained from Neural Network!");
    }
}


/*
These plot functions will plot the graph
The functions used belong to the JSXGraph API
*/
function plotANDGraph() {
    var board = JXG.JSXGraph.initBoard('AND-box', {
        axis: true,
        boundingbox: [-0.5, 2, 2, -0.5],
        showCopyright: false,
        showNavigation: false
    }); //Creates the cartesian graph
    var constPointSize = 5;
    var OP1 = board.create('point', [0, 0], {
        size: constPointSize,
        face: '^',
        fixed: true
    });
    var OP2 = board.create('point', [0, 1], {
        size: constPointSize,
        face: '^',
        fixed: true
    });
    var OP3 = board.create('point', [1, 0], {
        size: constPointSize,
        face: '^',
        fixed: true
    });
    var OP4 = board.create('point', [1, 1], {
        size: constPointSize,
        face: 'x',
        fixed: true
    });

    decisionBoundary1 = board.create('line', [AND_threshold * -1, Number(AND_w1), Number(AND_w2)], {
        fixed: true
    });
}

function plotORGraph() {
    var board = JXG.JSXGraph.initBoard('OR-box', {
        axis: true,
        boundingbox: [-0.5, 2, 2, -0.5],
        showCopyright: false,
        showNavigation: false
    }); //Creates the cartesian graph
    var constPointSize = 5;
    var OP1 = board.create('point', [0, 0], {
        size: constPointSize,
        face: '^',
        fixed: true
    });
    var OP2 = board.create('point', [0, 1], {
        size: constPointSize,
        face: 'x',
        fixed: true
    });
    var OP3 = board.create('point', [1, 0], {
        size: constPointSize,
        face: 'x',
        fixed: true
    });
    var OP4 = board.create('point', [1, 1], {
        size: constPointSize,
        face: 'x',
        fixed: true
    });

    decisionBoundary1 = board.create('line', [OR_threshold * -1, Number(OR_w1), Number(OR_w2)], {
        fixed: true
    });
}

function plotNOTGraph() {
    var board = JXG.JSXGraph.initBoard('NOT-box', {
        axis: true,
        boundingbox: [-0.5, 2, 2, -0.5],
        showCopyright: false,
        showNavigation: false
    }); //Creates the cartesian graph
    var constPointSize = 5;
    var OP1 = board.create('point', [0, 0], {
        size: constPointSize,
        face: '^',
        fixed: true
    });
    var OP2 = board.create('point', [1, 0], {
        size: constPointSize,
        face: 'x',
        fixed: true
    });

    decisionBoundary1 = board.create('line', [NOT_threshold * -1, Number(NOT_w1), 0], {
        fixed: true
    });
}
