var XOR_threshold = 0;
var XOR_w1 = 1;
var XOR_w2 = 1;
var realInputX=[0,0,1,1];
var realInputY=[0,1,0,1];
var XOR_calcOP;
var gate_id=1;
var timer1, timer2, timer3,timer4,intervalTimer;


$(document).ready(function () {
    /*
    Initialize XOR Gate sliders XOR add listeners to them
    */
    $("#XOR_Gate_Threshold_slider").slider({
        max: 4.5,
        min: -4.5,
        step: 0.05,
        slide: function (event, ui) {
            $(".XOR-threshold-value").text(ui.value);
            XOR_threshold = ui.value;
            plotXORGraph();
        }
    });
    $(".XOR-threshold-value").text($("#XOR_Gate_Threshold_slider").slider("value"));
    XOR_threshold = $("#XOR_Gate_Threshold_slider").slider("value");


    $("#XOR_Gate_w1_slider").slider({
        max: 4,
        min: -4,
        value: -1,
        step: 0.1,
        slide: function (event, ui) {
            $(".XOR-inputX-oplay_neuron1-weight").text(ui.value);
            XOR_w1 = ui.value;
            plotXORGraph();
        }
    });
    $(".XOR-inputX-oplay_neuron1-weight").text($("#XOR_Gate_w1_slider").slider("value"));
    XOR_w1 = $("#XOR_Gate_w1_slider").slider("value");


    $("#XOR_Gate_w2_slider").slider({
        max: 4,
        min: -4,
        value: -1,
        step: 0.1,
        slide: function (event, ui) {
            $(".XOR-inputY-oplay_neuron1-weight").text(ui.value);
            XOR_w2 = ui.value;
            plotXORGraph();
        }
    });
    $(".XOR-inputY-oplay_neuron1-weight").text($("#XOR_Gate_w2_slider").slider("value"));
    XOR_w2 = $("#XOR_Gate_w2_slider").slider("value");

    /*
    Plot the graph
    */
    plotXORGraph();

});

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
    if(gate_id==1){
    	$("#XORNextButton").unbind("click");
    	$("#XORNextButton").addClass("disabled");
		$("#XORNextButton").attr("disabled","disabled");
		$("#XORNextButton").removeClass("displayActivatedButton");
        $(".XOR-TT-rows").removeClass("highlightTTRow");
        $(".XOR-TT-OP-rows").text("");
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
The function simulateXORGate will be called from startSimulation
*/
function simulateXORGate(iterationNo, inputX, inputY, w1, w2, threshold, interval, timer) {
    $("#XORNextButton").addClass("disabled");
    $("#XORNextButton").attr("disabled","disabled");
    $("#XORNextButton").removeClass("displayActivatedButton");
    /* This is the way arrays were getting passed as String */
    inputX = inputX.split(",");
    inputY = inputY.split(",");

    resetSimulationPart();

    /*
    Remove all highlights from truth table XOR highlight current truth table row
    */
    $(".XOR-TT-rows").removeClass("highlightTTRow");
    $("#XOR-TT-row-" + (iterationNo + 1)).addClass("highlightTTRow");

    /*
    Set animations on lines
    */
    $(".XOR-X1Val").text(realInputX[iterationNo]);
    $(".XOR-Y1Val").text(realInputY[iterationNo]);
	$("#XOR-inputX-oplay_neuron2").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
	$("#XOR-inputY-oplay_neuron2").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
	$("#XOR-inputX-oplay_neuron3").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
	$("#XOR-inputY-oplay_neuron3").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
	
    

	timer4=window.setTimeout(function(){
		
	/* Calculate intermediate, u(x) */
    $("#XOR-inputX-oplay_neuron1").addClass(inputX[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
    $("#XOR-inputY-oplay_neuron1").addClass(inputY[iterationNo] == 1 ? "animatedLineGreen" : "animatedLinePurple");
	$(".XOR-XVal").text(inputX[iterationNo]);
    $(".XOR-YVal").text(inputY[iterationNo]);
	$("#XOR-n1x-value").text("= " +inputX[iterationNo]);
	$("#XOR-n2x-value").text("= " + inputY[iterationNo]);
    var ux = w1 * inputX[iterationNo] + w2 * inputY[iterationNo];
		ux = parseFloat(ux).toFixed( 2 );	
    timer1 = window.setTimeout(function () {
        /* Display u(x) XOR pause */
        $("#XOR-ux-value").text("= " + ux);

        timer2 = window.setTimeout(function () {
            /* Display threshold calculation XOR pause */
            $("#XOR-oplay_neuron1-oplay_thrshld").addClass("animatedLine");
            if (ux >= threshold) {
                $("#XOR-yx-value-expln").text("u(x) = " + ux + " >= " + threshold);
            }
            else {
                $("#XOR-yx-value-expln").text("u(x) = " + ux + " < " + threshold);
            }

            timer3 = window.setTimeout(function () {
                /* Display calculation output as y(x) XOR add to truth table */
                if (ux >= threshold) {
                    $("#XOR-yx-value-expln").text("u(x) = " + ux + " >= " + threshold + " ⇒ y(x) = 1"); /* Change explanation to include y(x) */
                    $("#XOR-TT-OP-row-" + (iterationNo + 1)).text(1); /* Add entry in truth table */
                    $("#XOR-yx-value").text("= " + 1);
                    XOR_calcOP.push(1);
                }
                else {
                    $("#XOR-yx-value-expln").text("u(x) = " + ux + " < " + threshold + " ⇒ y(x) = 0"); /* Change explanation to include y(x) */
                    $("#XOR-TT-OP-row-" + (iterationNo + 1)).text(0); /* Add entry in truth table */
                    $("#XOR-yx-value").text("= " + 0);
                    XOR_calcOP.push(0);
                }

                if (iterationNo != 3) {
                    $("#XORNextButton").unbind("click");
                    $("#XORNextButton").removeClass("disabled");
                    $("#XORNextButton").removeAttr("disabled");
                    $("#XORNextButton").addClass("displayActivatedButton");
                    $("#XORNextButton").click(function () {
                        simulateXORGate(iterationNo + 1, inputX.join(","), inputY.join(","), w1, w2, threshold, interval);
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
                    verifyXOROutputs();
                }

            }, interval * 6);
        }, interval * 4);

    }, interval *4);
	},interval*4);
}
/*
When the Start Simulation button is clicked the active gate's simulate function will be called as defined above
*/
function startSimulation(interval) {
    resetCompleteSimulation();

    var inputXofXOROR = [1, 0.3678,0.3678,0.1353];
    var inputYofXOROR = [0.1353,0.3678,0.3678,1];

    var iterationNo = 0;
    XOR_calcOP = [];

    $(".sliders").slider("disable");

    $("#startSimButton").addClass("disabled");
    $("#startSimButton").attr("disabled","disabled");
    $("#selGate").prop("disabled", true);
    $("#stopSimButton").removeClass("disabled");
    $("#stopSimButton").removeAttr("disabled");


    if(gate_id==1){
        $('html, body').animate({
            scrollTop: $("#XOR-box").offset().top
        }, 500);
        simulateXORGate(iterationNo, inputXofXOROR.join(","), inputYofXOROR.join(","), parseFloat(XOR_w1), parseFloat(XOR_w2), parseFloat(XOR_threshold), interval);
    }       
}

/*
These verify functions will verify the expected outputs 
with the ones calculated along the course of the simulation
and display whether it matches or not
*/
function verifyXOROutputs() {
    var correctXOROPs = [0, 1, 1,0];
    if (correctXOROPs.length == XOR_calcOP.length) {
        for (var i = 0; i<XOR_calcOP.length; i++) {
            if (correctXOROPs[i] != XOR_calcOP[i]) {
                alert("Incorrect Output values obtained from Neural Network!!! Try some different weights XOR threshold.");
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
function plotXORGraph(){
	var board = JXG.JSXGraph.initBoard('XOR-box',{axis:true, boundingbox:[-0.5, 2, 2, -0.5],showCopyright:false,showNavigation:false});  //Creates the cartesian graph
	var constPointSize=5;
	var OP1 = board.create('point',[1.0000,0.1353], {size:constPointSize,face:'x',fixed:true});
	var OP2 = board.create('point',[0.3678,0.3678], {size:constPointSize,face:'^',fixed:true});
	var OP3 = board.create('point',[0.3678,0.3678], {size:constPointSize,face:'^',fixed:true});
	var OP4 = board.create('point',[0.1353,1], {size:constPointSize,face:'x',fixed:true});

    decisionBoundary1 = board.create('line', [XOR_threshold*-1, Number(XOR_w1), Number(XOR_w2)], {fixed:true});
}
