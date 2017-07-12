var AND_threshold = 0,OR_threshold=0;
var AND_w1 = 1,OR_w1=0;
var AND_w2 = 1,OR_w2=0;
	var realInputX=[0,0,1,1];
	var realInputY=[0,1,0,1];
var AND_calcOP,OR_calcOP;
var gate_id=1;
var timer1, timer2, timer3,timer4,intervalTimer;


$(document).ready(function () {
    /*
    Initialize AND Gate sliders and add listeners to them
    */
    $("#AND_Gate_Threshold_slider").slider({
        max: 4.5,
        min: -4.5,
        step: 0.05,
        slide: function (event, ui) {
            $(".AND-threshold-value").text(ui.value);
            AND_threshold = ui.value;
            plotANDGraph();
        }
    });
    $(".AND-threshold-value").text($("#AND_Gate_Threshold_slider").slider("value"));
    AND_threshold = $("#AND_Gate_Threshold_slider").slider("value");


    $("#AND_Gate_w1_slider").slider({
        max: 4,
        min: -4,
        value: -1,
        step: 0.1,
        slide: function (event, ui) {
            $(".AND-inputX-oplay_neuron1-weight").text(ui.value);
            AND_w1 = ui.value;
            plotANDGraph();
        }
    });
    $(".AND-inputX-oplay_neuron1-weight").text($("#AND_Gate_w1_slider").slider("value"));
    AND_w1 = $("#AND_Gate_w1_slider").slider("value");


    $("#AND_Gate_w2_slider").slider({
        max: 4,
        min: -4,
        value: -1,
        step: 0.1,
        slide: function (event, ui) {
            $(".AND-inputY-oplay_neuron1-weight").text(ui.value);
            AND_w2 = ui.value;
            plotANDGraph();
        }
    });
    $(".AND-inputY-oplay_neuron1-weight").text($("#AND_Gate_w2_slider").slider("value"));
    AND_w2 = $("#AND_Gate_w2_slider").slider("value");

    plotANDGraph();

});


function displayDiv(val) {
    if (val == "AND") {
        gate_id=1;
        $("#AND-gate-sim").slideDown(400);
    }
    stopSimulation();
}

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

function resetCompleteSimulation() {
    resetSimulationPart();
    if(gate_id==1){
        $(".AND-TT-rows").removeClass("highlightTTRow");
        $(".AND-TT-OP-rows").text("");
    }
}

function resetSimulationPart() {
    $(".changingTextStyle").text("");

    $(".StdLine").removeClass("animatedLineGreen");
    $(".StdLine").removeClass("animatedLinePurple");
    $(".StdLine").removeClass("animatedLine");
}

function simulateANDGate(iterationNo, inputX, inputY, w1, w2, threshold, interval, timer) {
    $("#ANDNextButton").addClass("disabled");
    $("#ANDNextButton").attr("disabled","disabled");
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
    $(".AND-XVal").text(realInputX[iterationNo]);
    $(".AND-YVal").text(realInputY[iterationNo]);
	$("#AND-inputX-oplay_neuron2").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
	$("#AND-inputY-oplay_neuron2").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
	$("#AND-inputX-oplay_neuron3").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
	$("#AND-inputY-oplay_neuron3").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
	
    //alert(w1 + " " + w2 + " " + inputX[iterationNo] + " " + inputY[iterationNo] + " " + ux);

	timer4=window.setTimeout(function()
	{
		
	/* Calculate intermediate, u(x) */
    $("#AND-inputX-oplay_neuron1").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
    $("#AND-inputY-oplay_neuron1").addClass(inputY[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
	$("#AND-n1x-value").text("= " +inputX[iterationNo]);
	$("#AND-n2x-value").text("= " + inputY[iterationNo]);
    var ux = w1 * inputX[iterationNo] + w2 * inputY[iterationNo];
		ux = parseFloat(ux).toFixed( 2 );	
    timer1 = window.setTimeout(function () {
        /* Display u(x) and pause */
        $("#AND-ux-value").text("= " + ux);

        timer2 = window.setTimeout(function () {
            /* Display threshold calculation and pause */
            $("#AND-oplay_neuron1-oplay_thrshld").addClass("animatedLine");
            if (ux >= threshold) {
                $("#AND-yx-value-expln").text("u(x) = " + ux + " >= " + threshold);
            }
            else {
                $("#AND-yx-value-expln").text("u(x) = " + ux + " < " + threshold);
            }

            timer3 = window.setTimeout(function () {
                /* Display calculation output as y(x) and add to truth table */
                if (ux >= threshold) {
                    $("#AND-yx-value-expln").text("u(x) = " + ux + " >= " + threshold + " ⇒ y(x) = 1"); /* Change explanation to include y(x) */
                    $("#AND-TT-OP-row-" + (iterationNo + 1)).text(1); /* Add entry in truth table */
                    $("#AND-yx-value").text("= " + 1);
                    AND_calcOP.push(1);
                }
                else {
                    $("#AND-yx-value-expln").text("u(x) = " + ux + " < " + threshold + " ⇒ y(x) = 0"); /* Change explanation to include y(x) */
                    $("#AND-TT-OP-row-" + (iterationNo + 1)).text(0); /* Add entry in truth table */
                    $("#AND-yx-value").text("= " + 0);
                    AND_calcOP.push(0);
                }

                if (iterationNo != 3) {
                    $("#ANDNextButton").unbind("click");
                    $("#ANDNextButton").removeClass("disabled");
                    $("#ANDNextButton").removeAttr("disabled");
                    $("#ANDNextButton").addClass("displayActivatedButton");
                    $("#ANDNextButton").click(function () {
                        simulateANDGate(iterationNo + 1, inputX.join(","), inputY.join(","), w1, w2, threshold, interval);
                    });
                }
                else {
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

    }, interval *4);
	},interval*4);
}

function startSimulation(interval) {
    resetCompleteSimulation();

    var inputXofANDOR = [1, 0.3678,0.3678,0.1353];
    var inputYofANDOR = [0.1353,0.3678,0.3678,1];

    var iterationNo = 0;
    AND_calcOP = [];

    $(".sliders").slider("disable");

    $("#startSimButton").addClass("disabled");
    $("#startSimButton").attr("disabled","disabled");
    $("#selGate").prop("disabled", true);
    $("#stopSimButton").removeClass("disabled");
    $("#stopSimButton").removeAttr("disabled");


    if(gate_id==1){
        $('html, body').animate({
            scrollTop: $("#AND-box").offset().top
        }, 500);
        simulateANDGate(iterationNo, inputXofANDOR.join(","), inputYofANDOR.join(","), parseFloat(AND_w1), parseFloat(AND_w2), parseFloat(AND_threshold), interval);
    }       
}


function verifyANDOutputs() {
    var correctANDOPs = [0, 1, 1,0];
    if (correctANDOPs.length == AND_calcOP.length) {
        for (var i = 0; i<AND_calcOP.length; i++) {
            if (correctANDOPs[i] != AND_calcOP[i]) {
                alert("Incorrect Output values obtained from Neural Network!!! Try some different weights and threshold.");
                return;
            }
        }
        alert("Correct Output values obtained from Neural Network!");
    }
}

function plotANDGraph()
{
	var board = JXG.JSXGraph.initBoard('AND-box',{axis:true, boundingbox:[-0.5, 2, 2, -0.5]});  //Creates the cartesian graph
	var constPointSize=5;
	var OP1 = board.create('point',[1.0000,0.1353], {size:constPointSize,face:'x',fixed:true});
	var OP2 = board.create('point',[0.3678,0.3678], {size:constPointSize,face:'^',fixed:true});
	var OP3 = board.create('point',[0.3678,0.3678], {size:constPointSize,face:'^',fixed:true});
	var OP4 = board.create('point',[0.1353,1], {size:constPointSize,face:'x',fixed:true});

    decisionBoundary1 = board.create('line', [AND_threshold*-1, Number(AND_w1), Number(AND_w2)], {fixed:true});
}
