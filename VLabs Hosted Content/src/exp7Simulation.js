var weightMatrix = [[1,3],[1,2],[5,1]];
var inputs = [[2,2],[2.5,2.5],[3,2],[0.5,1],[1,0.5],[1,4],[2,4.5]];
var desiredOPs = [[1,-1,-1],[1,-1,-1],[-1,1,-1],[-1,1,-1],[-1,1,-1],[-1,-1,1],[-1,-1,1]];
var clusterCenterDenotions=[['x','#3366ff'],['+','#1231da'],['<>','#009933']];
var learningRate=0.2;
var sel = 1;
var timers=[];

var points = [];
var clusterCenters = [];

function displayWeightsInNeuralNet(lrString){
    for (var i = 0; i < weightMatrix.length; i++) {
        for (var j = 0; j < weightMatrix[i].length; j++) {
            $("#"+lrString+"MainOuterDiv tspan.w" + (i + 1) + "" + (j + 1) + "text").text(weightMatrix[i][j]);
        }
    }
}

function resetSimulation(lrString){
    for (var i = 0; i < timers.length;i++ ){
        clearTimeout(timers[i]);
    }

    $(".lines").css("cursor", "pointer");
    $(".lines").css("pointer-events","auto");
    $(".sliders").slider("enable");
    $("#"+lrString+"_FirstPartOfExpln").slideUp(500);
    $("#"+lrString+"_SecondPartOfExpln").slideUp(500);

    $("#"+lrString+"StartSimButton").removeAttr("disabled", "disabled");
    $("#"+lrString+"StartSimButton").removeClass("disabled");
    $("#"+lrString+"StopSimButton").attr("disabled");
    $("#"+lrString+"StopSimButton").addClass("disabled");
    $("#"+lrString+"NextButton").attr("disabled");
    $("#"+lrString+"NextButton").addClass("disabled");
    $("#"+lrString+"NextButton").removeClass("displayActivatedButton");
    $("#"+lrString+"NextButton").unbind("click");

    $("line."+lrString+"Neur_1_lines").removeClass("animatedLineRegionBlue");
    $("line."+lrString+"Neur_2_lines").removeClass("animatedLineRegionRed");
    $("line."+lrString+"Neur_3_lines").removeClass("animatedLineRegionGreen");

    $("#"+lrString+"LearningRate_slider").slider("value", learningRate);
    $("#"+lrString+"MainOuterDiv span.learningRate").text($("#percLRLearningRate_slider").slider("value"));

    $(".changingTextStyle").text("");

    weightMatrix = [[-2,3],[1,2],[-6.5,1]];
    inputs = [[1,2],[1,1],[3,3],[2,3],[5,6],[1,3]];
    desiredOPs = [[1,-1,-1],[1,-1,-1],[-1,1,-1],[-1,1,-1],[-1,1,-1],[-1,-1,1],[-1,-1,1]];
    desiredOPsProps = [['^','#3366ff'],['^','#3366ff'],['o','#ff0000'],['o','#ff0000'],['o','#ff0000'],['[]','#009933'],['[]','#009933']];

    plotGraph(lrString);
    displayWeightsInNeuralNet(lrString);
}


function startSimulation(lrString){
    weightMatrix = [[-2,3],[1,2],[-6.5,1]];
    inputs = [[1,2],[1,1],[3,3],[2,3],[5,6],[1,3]];
    var clusterCenterDenotions=[['x','#3366ff'],['+','#1231da'],['<>','#009933']];
    displayWeightsInNeuralNet(lrString);

    $(".sliders").slider("disable");
    $(".lines").css("cursor","none");
    $(".lines").css("pointer-events","none");

    $("#"+lrString+"StartSimButton").attr("disabled", "disabled");
    $("#"+lrString+"StartSimButton").addClass("disabled");
    $("#"+lrString+"StopSimButton").removeAttr("disabled");
    $("#"+lrString+"StopSimButton").removeClass("disabled");
    $(".changingTextStyle").text("");

    // $("#"+lrString+"_SecondPartOfExpln").slideUp(500);
    // $("#"+lrString+"_FirstPartOfExpln").slideDown(1000);

    timers.push(window.setTimeout(function(){
        $("line."+lrString+"Neur_1_lines").addClass("animatedLineRegionBlue");
        $("line."+lrString+"Neur_2_lines").addClass("animatedLineRegionRed");
    },2000));

    //learnInput(lrString,0);

}

function learnProc()
{
  
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

function plotGraph(lrString){
    points = [];
    lines = [];
    var board = JXG.JSXGraph.initBoard(lrString+'GraphDiv',{axis:true, boundingbox:[-7, 7, 7, -7]});  //Creates the cartesian graph
	  var constPointSize=5;

    for(var i=0;i<inputs.length;i++){
        points[i] = board.create('point',[inputs[i][0],inputs[i][1]],{fixed:true});
    }

    for(var i=0;i<weightMatrix.length;i++)
    {
        clusterCenters[i]=board.create('point',[weightMatrix[i][0],weightMatrix[i][1]],{fixed:true,color:clusterCenterDenotions[i][1],face:clusterCenterDenotions[i][0]});
    }
}
