var weightMatrix = [[1,3],[1,2],[5,1]];
var inputs = [[2,2],[2.5,2.5],[3,2],[0.5,1],[1,0.5],[1,4],[2,4.5]];
var clusterCenterDenotions=[['x','#004c64'],['+','#a10900'],['<>','#0d6032']];
var learningRate=0.2;
var sel = 1;
var timers=[];
var simulationStart=false;
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

    plotGraph(lrString);
    displayWeightsInNeuralNet(lrString);
    simulationStart=false;
}


function startSimulation(lrString){
    //weightMatrix = [[-2,3],[1,2],[-6.5,1]];
    inputs = [[2,2],[2.5,2.5],[3,2],[0.5,1],[1,0.5],[1,4],[2,4.5]];
    var clusterCenterDenotions=[['x','#3366ff'],['+','#1231da'],['<>','#009933']];
    displayWeightsInNeuralNet(lrString);
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

    learnProc(lrString);
    //resetSimulation(lrString);
    //learnInput(lrString,0);

}

function learnProc(lrString)
{
    for(var i=0;i<inputs.length;i++)
    {
          $("line."+lrString+"Neur_1_lines").addClass("animatedLineRegionBlue");
          $("line."+lrString+"Neur_2_lines").addClass("animatedLineRegionRed");
          setTimeout(function(){
            $("line."+lrString+"Neur_1_lines").removeClass("animatedLineRegionBlue");
            $("line."+lrString+"Neur_2_lines").removeClass("animatedLineRegionRed");
          },2000);
          var distancesFromClusterCenters=[];
          for(var k=0;k<weightMatrix.length;k++)
          {
              distancesFromClusterCenters[k]=Math.pow((inputs[i][0]-weightMatrix[k][0]),2)+Math.pow((inputs[i][1]-weightMatrix[k][1]),2);
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
          var content = document.createTextNode("Winning neuron to be changed of:"+(J_min+1));
          theDiv.appendChild(content);
          for(var j=0;j<inputs[i].length;j++)
          {
              weightMatrix[J_min][j]=parseFloat(weightMatrix[J_min][j]+learningRate*(inputs[i][j]-weightMatrix[J_min][j])).toFixed(3);
          }
          points[i].setAttribute({color:clusterCenterDenotions[J_min][1],face:clusterCenterDenotions[J_min][0]});
          theDiv = document.getElementById("resultCalculations");
          x = document.createElement("br");
          theDiv.appendChild(x);
          content = document.createTextNode("Updated weights:"+weightMatrix[J_min]);
          theDiv.appendChild(content);
          plotGraph("KSOM");
    }
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
    if(!simulationStart)
    {
      for(var i=0;i<inputs.length;i++){
          points[i] = board.create('point',[inputs[i][0],inputs[i][1]],{fixed:true});
      }
    }
    else {
      for(var i=0;i<inputs.length;i++){
        var distancesFromClusterCenters=[];
        for(var k=0;k<weightMatrix.length;k++)
        {
            distancesFromClusterCenters[k]=Math.pow((inputs[i][0]-weightMatrix[k][0]),2)+Math.pow((inputs[i][1]-weightMatrix[k][1]),2);
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
        points[i] = board.create('point',[inputs[i][0],inputs[i][1]],{fixed:true,color:clusterCenterDenotions[J_min][1],face:clusterCenterDenotions[J_min][0]});
      }
    }

    for(var i=0;i<weightMatrix.length;i++)
    {
        clusterCenters[i]=board.create('point',[weightMatrix[i][0],weightMatrix[i][1]],{fixed:true,name:'C'+(i+1),color:clusterCenterDenotions[i][1],face:clusterCenterDenotions[i][0]});
    }
}
