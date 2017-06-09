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
    document.getElementById("op1").style.fill="#ff0000";
    document.getElementById("op2").style.fill="#ff0000";
    document.getElementById("op3").style.fill="#ff0000";

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

function learnProc(lrString,inputIndex)
{
      document.getElementById("op1").style.fill="#ff0000";
      document.getElementById("op2").style.fill="#ff0000";
      document.getElementById("op3").style.fill="#ff0000";
      document.getElementById("resultCalculations").innerHTML="";
      document.getElementById("x").innerHTML="x="+inputs[inputIndex][0];
      document.getElementById("y").innerHTML="y="+inputs[inputIndex][1];
      points[inputIndex].size(25);
      points[inputIndex].fillColor("#00ff00");
      points[inputIndex].strokeColor("#00ff00");
      var content_to_be_shown="<h2>"+"Considered sample:("+inputs[inputIndex]+")"+"</h2>";

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
        // var header3=document.createElement("h3");
        // theDiv.appendChild(header3);

        for(var k=0;k<weightMatrix.length;k++)
        {
            distancesFromClusterCenters[k]=Math.pow((inputs[inputIndex][0]-weightMatrix[k][0]),2)+Math.pow((inputs[inputIndex][1]-weightMatrix[k][1]),2);
            content_to_be_shown+="<h3>"+"Distance from C"+(k+1)+":"+distancesFromClusterCenters[k]+"</h3>";
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
        content_to_be_shown+="<h3>"+"Closest to the input sample is:"+(J_min+1)+"</h3>";
        content_to_be_shown+="<h3>"+"Weights to be changed of neuron "+(J_min+1)+"</h3>";

        for(var j=0;j<inputs[inputIndex].length;j++)
        {
            weightMatrix[J_min][j]=parseFloat(weightMatrix[J_min][j]+learningRate*(inputs[inputIndex][j]-weightMatrix[J_min][j])).toFixed(3);
        }
        points[inputIndex].setAttribute({color:clusterCenterDenotions[J_min][1],face:clusterCenterDenotions[J_min][0]});
        content_to_be_shown+="<h3>"+"Updated weights:"+weightMatrix[J_min]+"</h3>";
        document.getElementById("resultCalculations").innerHTML=content_to_be_shown;
        document.getElementById("op"+(J_min+1)).style.fill="#00ff00";
        board.removeObject(points[inputIndex]);
        board.removeObject(clusterCenters[J_min]);
        points[inputIndex]=board.create('point',[inputs[inputIndex][0],inputs[inputIndex][1]],{fixed:true,name:'',color:clusterCenterDenotions[J_min][1],face:clusterCenterDenotions[J_min][0]});
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
        points[i] = board.create('point',[inputs[i][0],inputs[i][1]],{fixed:true,name:''});
    }

    for(var i=0;i<weightMatrix.length;i++)
    {
        clusterCenters[i]=board.create('point',[weightMatrix[i][0],weightMatrix[i][1]],{fixed:true,name:'C'+(i+1),color:clusterCenterDenotions[i][1],face:clusterCenterDenotions[i][0]});
    }
}
