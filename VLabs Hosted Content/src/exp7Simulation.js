var weightMatrix = [[1,3],[1,2],[5,1]];
var inputs = [[2,2],[2.5,2.5],[3,2],[0.5,1],[1,0.5],[1,4],[2,4.5]];
var clusterCenterDenotions=[['x','#004c64'],['+','#a10900'],['<>','#0d6032']];
var learningRate=0.2;
var sel = 1;
var timers=[];
var simulationStart=false;
var points = [];
var clusterCenters = [];
var board;

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
    document.getElementById("resultCalculations").innerHTML="";
    document.getElementById("x").innerHTML="";
    document.getElementById("y").innerHTML="";


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

    plotGraph(lrString);
    displayWeightsInNeuralNet(lrString);
    simulationStart=false;
}


function startSimulation(lrString){
    inputs = [[2,2],[2.5,2.5],[3,2],[0.5,1],[1,0.5],[1,4],[2,4.5]];
    var clusterCenterDenotions=[['x','#3366ff'],['+','#1231da'],['<>','#009933']];
    //displayWeightsInNeuralNet(lrString);
    simulationStart=true;
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

    // timers.push(window.setTimeout(function(){
    //     $("line."+lrString+"Neur_1_lines").addClass("animatedLineRegionBlue");
    //     $("line."+lrString+"Neur_2_lines").addClass("animatedLineRegionRed");
    // },2000));

    learnProc(lrString,0);
    //resetSimulation(lrString);
    //learnInput(lrString,0);

}
var animatro;
var operatingAlgo;
function learnProc(lrString,inputIndex)
{
      document.getElementById("resultCalculations").innerHTML="";
      document.getElementById("x").innerHTML="x="+inputs[inputIndex][0];
      document.getElementById("y").innerHTML="y="+inputs[inputIndex][1];
      setTimeout(function(){
        $("line."+lrString+"Neur_1_lines").addClass("animatedLineRegionBlue");
        $("line."+lrString+"Neur_2_lines").addClass("animatedLineRegionRed");
      },0);
      setTimeout(function(){
        $("#"+lrString+"NextButton").attr("disabled");
        $("#"+lrString+"NextButton").addClass("disabled");
        $("#"+lrString+"NextButton").removeClass("displayActivatedButton");
        $("#"+lrString+"NextButton").unbind("click");
        var distancesFromClusterCenters=[];
        for(var k=0;k<weightMatrix.length;k++)
        {
            distancesFromClusterCenters[k]=Math.pow((inputs[inputIndex][0]-weightMatrix[k][0]),2)+Math.pow((inputs[inputIndex][1]-weightMatrix[k][1]),2);
        }
        var max=10000;
        var J_min;
        for(var j=0;j<distancesFromClusterCenters.length;j++)
        {
            if(distancesFromClusterCenters[j]<max)
            {
                max=distancesFromClusterCenters[j];
                J_min=j;
            }
        }
        var theDiv = document.getElementById("resultCalculations");
        var x = document.createElement("br");
        theDiv.appendChild(x);
        var content = document.createTextNode("Considered sample:"+inputs[inputIndex]);
        theDiv.appendChild(content);
        theDiv.appendChild(x);
        var content = document.createTextNode("Winning neuron to be changed of:"+(J_min+1));
        theDiv.appendChild(content);
        for(var j=0;j<inputs[inputIndex].length;j++)
        {
            weightMatrix[J_min][j]=parseFloat(weightMatrix[J_min][j]+learningRate*(inputs[inputIndex][j]-weightMatrix[J_min][j])).toFixed(3);
        }
        points[inputIndex].setAttribute({color:clusterCenterDenotions[J_min][1],face:clusterCenterDenotions[J_min][0]});
        theDiv = document.getElementById("resultCalculations");
        x = document.createElement("br");
        theDiv.appendChild(x);
        content = document.createTextNode("Updated weights:"+weightMatrix[J_min]);
        theDiv.appendChild(content);
        board.removeObject(points[inputIndex]);
        board.removeObject(clusterCenters[J_min]);
        points[inputIndex]=board.create('point',[inputs[inputIndex][0],inputs[inputIndex][1]],{fixed:true,color:clusterCenterDenotions[J_min][1],face:clusterCenterDenotions[J_min][0]});
        clusterCenters[J_min]=board.create('point',[weightMatrix[J_min][0],weightMatrix[J_min][1]],{fixed:true,name:'C'+(J_min+1),color:clusterCenterDenotions[J_min][1],face:clusterCenterDenotions[J_min][0]});
        displayWeightsInNeuralNet(lrString);
        //plotGraph("KSOM");
        $("line."+lrString+"Neur_1_lines").removeClass("animatedLineRegionBlue");
        $("line."+lrString+"Neur_2_lines").removeClass("animatedLineRegionRed");
        if(inputIndex!=inputs.length-1)
        {
            $("#"+lrString+"NextButton").removeAttr("disabled");
            $("#"+lrString+"NextButton").removeClass("disabled");
            $("#"+lrString+"NextButton").addClass("displayActivatedButton");
            $("#"+lrString+"NextButton").click(function () {
                learnProc(lrString, inputIndex + 1);
            });
        }
      },1000);

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
    board = JXG.JSXGraph.initBoard(lrString+'GraphDiv',{axis:true, boundingbox:[-7, 7, 7, -7]});  //Creates the cartesian graph
	  var constPointSize=5;
    for(var i=0;i<inputs.length;i++){
        points[i] = board.create('point',[inputs[i][0],inputs[i][1]],{fixed:true});
    }

    for(var i=0;i<weightMatrix.length;i++)
    {
        clusterCenters[i]=board.create('point',[weightMatrix[i][0],weightMatrix[i][1]],{fixed:true,name:'C'+(i+1),color:clusterCenterDenotions[i][1],face:clusterCenterDenotions[i][0]});
    }
}
