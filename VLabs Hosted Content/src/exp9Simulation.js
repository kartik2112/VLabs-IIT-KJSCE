var board;
var timer1, timer2, timer3,intervalT=2000;

//Slider Defaults

var cool_start=30,cool_end=70,warm_start=50,warm_end=90,hot_start=80,hot_end=100,scallar_value=55;


$(document).ready(function () {
	
   	

	plotTheGraph();
	$('html, body').animate({
        scrollTop: $("#sim").offset().top
    }, 1500);

	//Sliders

    $("#cool_start_slider").slider({
        max: 120,
        min: 0,
        step: 5,
		value :30,
		animate: "slow",
        slide: function (event, ui) {
            $(".cool_start_value").text(ui.value);
			cool_start=ui.value;
           plotTheGraph();
        }
    });
	$("#cool_end_slider").slider({
        max: 120,
        min: 0,
        step: 5,
		value :70,
        slide: function (event, ui) {
			if(ui.value<=cool_start)
			{
				$("#cool_end_slider").slider("value",cool_start);
				window.alert("end value should be more than start");
				cool_end=cool_start<120?cool_start+5:120;
				$(".cool_end_value").text(cool_end);
			}
			else
			{
            $(".cool_end_value").text(ui.value);
			cool_end=ui.value;
			}
           plotTheGraph();
        }
    });
	$("#warm_start_slider").slider({
        max: 120,
        min: 0,
        step: 5,
		value :50,
        slide: function (event, ui) {
            $(".warm_start_value").text(ui.value);
			warm_start=ui.value;
           plotTheGraph();
        }
    });
	
	$("#warm_end_slider").slider({
        max: 120,
        min: 0,
        step: 5,
		value :90,
        slide: function (event, ui) {
			if(ui.value<=warm_start)
			{
				$("#warm_end_slider").slider("value",warm_start);
				window.alert("end value should be more than start");
				warm_end=warm_start<120?warm_start+5:120;
				$(".cool_end_value").text(warm_end);
			}
			else
			{
				$(".warm_end_value").text(ui.value);
				warm_end=ui.value;
			}
		  plotTheGraph();
        }
    });
	$("#hot_start_slider").slider({
        max: 100,
        min: 0,
        step: 5,
		value :80,
        slide: function (event, ui) {
            $(".hot_start_value").text(ui.value);
           hot_start=ui.value;
		  plotTheGraph();
        }
    });
	 
	$("start_simulation_button").click(function(){
       $(this).hide();
    });

});

//Plotting the initial lines on the graph.

function plotTheGraph()
{
	var graphEnds=100;
	board = JXG.JSXGraph.initBoard('graph1Div',{axis:true, boundingbox:[-1,1.1,graphEnds+10,-0.1],showCopyright:false,showNavigation:false});
	var c_s =board.create('line',[[cool_start,0],[(cool_start+cool_end)/2,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#0000ff',strokeWidth:2});
	var c_e =board.create('line',[[(cool_start+cool_end)/2,1],[cool_end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#0000ff',strokeWidth:2});
	var w_s =board.create('line',[[warm_start,0],[(warm_start+warm_end)/2,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2});
	var w_e =board.create('line',[[(warm_start+warm_end)/2,1],[warm_end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2});
	var h_s =board.create('line',[[hot_start,0],[hot_end,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#ff0000',strokeWidth:2});
}

//Function when the users clicks the Start Simulation button.

function startSimulation1()
{

	method1();
	method2();
	method3();
	method4();
	method5();
	method6();
	$('html, body').animate({
        scrollTop: $("#methods").offset().top
    }, 2000);
	
}

//Method 1

function method1()
{
	//StrTemp is the string that stores the calculation part.
	//s stores the final answer.


	$("#m1answer").empty();
	$("#m1final").empty();
	document.getElementById("m1answer").style.color = "red";
	var data="<h4 style='color:black'>DATA:</h4>";
	
	//Finding the set having the maximum value of membership and defuzzified value is the value on x-axis corresponding to it.

	var strTemp="<h4 style='color:black'>Here we have to consider the maximum value of the set having the maximum membership value.</h4> MAX {1, 1, 1}<br>";
	strTemp = strTemp + "Since all three sets have equal maximum membership value, there are 3 possible Defuzzified Values.<br>";
	strTemp = strTemp + "MAX {(Cool_Start + Cool_End) &divide 2 , (Warm_Start + Warm_End) &divide 2 , (Hot_End)}<br>";
	strTemp = strTemp + "MAX {("+cool_start+" + "+cool_end+") &divide 2 , ("+warm_start+" + "+warm_end+") &divide 2 , "+hot_end+"}<br>";
	strTemp = strTemp + "MAX {"+(cool_start+cool_end)/2+" , "+(warm_end+warm_start)/2+" , "+(hot_end+hot_end)/2+"}<br>";
	var s=" <h4 style='color:black'>The Defuzzified value is <span style='color:red'>"+ (cool_start+cool_end)/2+" or "+(warm_end+warm_start)/2+" or "+(hot_end)+"</span>.</h4>";
	var timer1=window.setTimeout(function () {
		$("#m1answer").addClass("well");
		$("#m1answer").append(""+strTemp);
		},2000);
	var timer1=window.setTimeout(function () {
		$("#m1final").addClass("well");
		$("#m1final").append(""+s);
		},3000);
		
}

//Method 2

function method2()
{
	//temp stores the calculation part.
	//s stores the final answer.


	$("#m2answer").empty();
	$("#m2final").empty();
	document.getElementById("m2answer").style.color = "red";
	var data="<h4 style='color:black'>DATA:</h4><table class='truthTable'><tr><th></th><th>Start</th><th>End</th></tr>";
	var temp=data+"<tr><th>Cool</th><td>"+cool_start+ "</td><td>"+cool_end+"</td></tr>";
	temp=temp+"<tr><th>Warm</th><td>"+warm_start+"</td><td>"+warm_end+"</td></tr></table>";
	var sol="<h4 style='color:black'>SOLUTION:</h4>";
	temp=temp+sol;
	var a=cool_end;
	var b=warm_start;
	var c=warm_end;
	var d=hot_start;
	var area1=(cool_end+cool_start)/2;
	var area2=(warm_end+warm_start/2);
	var area3=(warm_end+warm_start/2);
	temp = temp+"Total Area = [( cool_end + cool_start ) &divide 2 + (warm_end+warm_start) &divide 2 + (hot_end+hot_start) &divide 2] &divide (1 + 1 + 1)<br>";
	temp=temp+"Total Area = [( "+cool_end+" + "+cool_start+" ) &divide 2 + ( "+warm_end+" + "+warm_start+") &divide 2 + ( "+hot_end+" + "+hot_start+") &divide 2] &divide 3<br>";
	var ans=(((cool_end+cool_start)/2 + (warm_end+warm_start)/2 + (hot_end+hot_start)/2))/3;
	temp=temp+"Total Area: "+ans.toFixed(2)+"<br>";
	var y1,y2;

	//Finding the overlapping area between the cool and the warm sets.

	if(cool_end>warm_start && cool_start<warm_end)
	{
		var m1=1/(((cool_start+cool_end)/2)-cool_end);
		var m2=1/(((warm_start+warm_end)/2)-warm_start);
		var c1=-m1*cool_end;
		var c2=-m2*warm_start;
		y1=(m2*c1-m1*c2)/(m2-m1);
		temp=temp+"Overlapping Area: "+Math.abs((b-a)*y1/2).toFixed(2)+"<br>";
		temp=temp+"Ans = Total Area - Overlapping Area<br>";
		temp=temp+"Ans = "+ans.toFixed(2)+" - "+Math.abs((b-a)*y1/2).toFixed(2)+"<br>";
		ans = ans - Math.abs((b-a)*y1/2).toFixed(2);
		temp = temp+"Ans = "+ans.toFixed(2)+"<br>";
	}

	//Finding the area between the hot and the warm sets.

	if(hot_start<warm_end && cool_start<hot_start)
	{
		var m1=1/(((warm_start+warm_end)/2)-warm_end);
		var m2=1/(100-hot_start);
		var c1=-m1*warm_end;
		var c2=-m2*hot_start;
		y2=(m2*c1-m1*c2)/(m2-m1);
		temp=temp+"Overlapping Area: "+Math.abs((d-c)*y2/2).toFixed(2)+"<br>";
		temp=temp+"Ans = Total Area - Overlapping Area<br>";
		temp=temp+"Ans = "+ans.toFixed(2)+" - "+Math.abs((d-c)*y2/2).toFixed(2)+"<br>";
		ans = ans - Math.abs((d-c)*y2/2).toFixed(2);
		temp = temp+"Ans = "+ans.toFixed(2);
	}
	var s="<h4 style='color:black'> The Defuzzified value is : <span style='color:red'>"+ans.toFixed(2)+"</span></h4>";
	temp=temp;
	var timer1=window.setTimeout(function () {
		$("#m2answer").addClass("well");
		$("#m2answer").append(""+temp);
		},2000);
	var timer1=window.setTimeout(function () {
		$("#m2final").addClass("well");
		$("#m2final").append(""+s);
		},3000);	
}

//Method 3

function method3()
{
	//temp is the string that stores the calculations.
	//s stores the final answer.


	$("#m3answer").empty();
	$("#m3final").empty();
	var data="<h4 style='color:black'>DATA:</h4><table class='truthTable'><tr><th></th><th>Start</th><th>End</th></tr>";
	
	var temp=data+"<tr><th>Cool</th><td>"+cool_start+"</td><td>"+cool_end+"</td></tr>";
	temp=temp+"<tr><th>Warm</th><td>"+warm_start+"</td><td>"+warm_end+"</td></tr></table>";
	
	var sol="<h4 style='color:black'>SOLUTION:</h4>";
	temp=temp+sol;
	
	temp=temp+"a = (cool_start+cool_end) &divide 2 <br>";
	temp=temp+"a = ("+cool_start+"+"+cool_end+") &divide 2 <br>"
	
	//Finding the maximum membership value of a set and assigning weight according to the membership value.
	
	document.getElementById("m3answer").style.color = "red";
	var a=(cool_end+cool_start)/2;
	temp=temp+"a = "+a+" <br>";
	temp=temp+"b = (warm_start+warm_end) &divide 2 <br>";
	temp=temp+"b = ("+warm_start+"+"+warm_end+") &divide 2 <br>"
	var b=(warm_end+warm_start)/2;
	temp=temp+"b = "+b+" <br>";
	var ans=(a+b)/2;
	temp=temp+"value = (a+b)&divide 2 <br>";
	temp=temp+"value = ("+a+"+"+b+") &divide 2 <br> ";
	temp=temp+"value = "+ans.toFixed(2);
	
	var s="<h4 style='color:black'> The Defuzzified value is : <span style='color:red'>"+ans.toFixed(2)+"</span></h4>";
	temp=temp;
	
	var timer1=window.setTimeout(function () {
		$("#m3answer").addClass("well");
		$("#m3answer").append(""+temp);
		},2000);
	var timer1=window.setTimeout(function () {
		$("#m3final").addClass("well");
		$("#m3final").append(""+s);
		},3000);	

	document.getElementById("m3answer").style.color = "red";
	$("#m3answer").append();	
}

//Method 4

function method4()
{
	//temp is the string that stores the calculations.
	//s stores the final answer.


	$("#m4answer").empty();
	$("#m4final").empty();
	var data="<h4 style='color:black'>DATA:</h4><table class='truthTable'><tr><th></th><th>Start</th><th>End</th></tr>";
	
	var temp=data+"<tr><th>Cool</th><td>"+cool_start+ "</td><td>"+cool_end+"</td></tr>";
	temp=temp+"<tr><th>Warm</th><td>"+warm_start+"</td><td>"+warm_end+"</td></tr>";
	temp=temp+"<tr><th>Hot</th><td>"+hot_start+"</td><td>100</td></tr></table>";
	
	var sol="<h4 style='color:black'>SOLUTION:</h4>";
	temp=temp+sol;
	
	temp=temp+"a = (cool_start+cool_end) &divide 2 <br>";
	temp=temp+"a = ("+cool_start+"+"+cool_end+") &divide 2 <br>"
	
	document.getElementById("m4answer").style.color = "red";

	//Finding the mean of the set where the set is having the maximum membership value.

	var a=(cool_end+cool_start)/2;
	temp=temp+"a = "+a+" <br>";
	temp=temp+"b = (warm_start+warm_end) &divide 2 <br>";
	temp=temp+"b = ("+warm_start+"+"+warm_end+") &divide 2 <br>"
	
	var b=(warm_end+warm_start)/2;
	temp=temp+"b = "+b+" <br>";
	
	temp=temp+"c = (hot_start+hot_end) &divide 2 <br>";
	temp=temp+"c = ("+hot_start+"+100) &divide 2 <br>";
	
	var c= (100+hot_start)/2;
	temp=temp+"c = "+c+" <br>";


	//Finding the mean of the set where the set is having the maximum membership value.
	
	var ans=(a+b+c)/3;
	
	temp=temp+"value = (a+b+c) &divide 3 <br>";
	temp=temp+"value = ("+a+"+"+b+"+"+c+") &divide 2 <br> ";
	temp=temp+"value = "+ans.toFixed(2);
	
	var s="<h4 style='color:black'> The Defuzzified value is : <span style='color:red'>"+ans.toFixed(2)+"</span></h4>";
	temp=temp;
	
	
	var timer1=window.setTimeout(function () {
		$("#m4answer").addClass("well");
		$("#m4answer").append(""+temp);
		},2000);
	var timer1=window.setTimeout(function () {
		$("#m4final").addClass("well");
		$("#m4final").append(""+s);
		},3000);	

	document.getElementById("m4answer").style.color = "red";
	$("#m4answer").append();
		
}

//Method 5

function method5()
{

	//temp is the string that stores the calculations.
	//s stores the final answer.


	$("#m5answer").empty();
	$("#m5final").empty();
	var data="<h4 style='color:black'>DATA:</h4><table class='truthTable'><tr><th></th><th>Start</th><th>End</th></tr>";
	var temp=data+"<tr><th>Cool</th><td>"+cool_start+ "</td><td>"+cool_end+"</td></tr>";
	temp=temp+"<tr><th>Warm</th><td>"+warm_start+"</td><td>"+warm_end+"</td></tr></table>";
	var sol="<h4 style='color:black'>SOLUTION:</h4>";
	temp=temp+sol;
	temp=temp+"a = ( cool_end - cool_start ) * ( cool_end + cool_start ) &divide 2<br>";
	temp=temp+"a = ( "+cool_end+" - "+cool_start+") * ( "+cool_end+"+"+cool_start+" ) &divide 2 <br>";
	

	document.getElementById("m5answer").style.color = "red";
	var a=(cool_end-cool_start)*(cool_end+cool_start)/2;
	temp=temp+"a = "+a+"<br>";
	var b=(warm_end-warm_start)*(warm_end+warm_start)/2;
	temp=temp+"b = (warm_end-warm_start) &times (warm_end+warm_start) &divide 2<br>";
	temp=temp+"b = ("+warm_end+"-"+warm_start+") &times ("+warm_end+"+"+warm_start+") &divide 2 <br>";
	temp=temp+"b = "+b+"<br>";
	temp=temp+"value = (a+b) &divide [(cool_end-cool_start)+(warm_end-warm_start)] <br>";
	temp=temp+"value = ("+a+"+"+b+") &divide [("+cool_end+"-"+cool_start+")+("+warm_end+"-"+warm_start+")]<br>";
	
	
	//Finding the area of all similar sets sets.

	var ans=(a+b)/((cool_end-cool_start)+(warm_end-warm_start));
	temp=temp+"value = "+ans.toFixed(2);
	var s="<h4 style='color:black'> The Defuzzified value is : <span style='color:red'>"+ans.toFixed(2)+"</span></h4>";
	temp=temp;
	var timer1=window.setTimeout(function () {
		$("#m5answer").addClass("well");
		$("#m5answer").append(""+temp);
		},2000);
	var timer1=window.setTimeout(function () {
		$("#m5final").addClass("well");
		$("#m5final").append(""+s);
		},3000);	

	document.getElementById("m5answer").style.color = "red";
	$("#m5answer").append();
	
}

//Method 6

function method6()
{
	//temp is the string that stores the calculations.
	//s stores the final answer.



	$("#m6answer").empty();
	$("#m6final").empty();
	document.getElementById("m6answer").style.color = "red";
	var data="<h4 style='color:black'>DATA:</h4><table class='truthTable'><tr><th></th><th>Start</th><th>End</th></tr>";
	
	var temp=data+"<tr><th>Cool</th><td>"+cool_start+ "</td><td>"+cool_end+"</td></tr>";
	temp=temp+"<tr><th>Warm</th><td>"+warm_start+"</td><td>"+warm_end+"</td></tr>";
	temp=temp+"<tr><th>Hot</th><td>"+hot_start+"</td><td>100</td></tr></table>";
	var sol="<h4 style='color:black'>SOLUTION:</h4>";
	var a=cool_end-cool_start;
	temp=temp+sol;
	var b=warm_end-warm_start;
	
	var c=(100-hot_start);

	//Finding the set with the largest area.

	var ans;
	//If cool < warm
	if(a<=b)
	{	
		//If hot > warm
		if(b<c)
		{
			ans=hot_start+2*(100-hot_start)/3;
			temp=temp+"Ans = hot_start + 2 &times ( hot_end - hot_start ) &divide 3 <br>";
			temp=temp+"Ans = "+hot_start+" +2 &times ( "+hot_end+" - "+hot_start+" ) &divide 3 <br>";
			temp=temp+"Ans="+ans.toFixed(2);
		}
		else
		{
			ans=(warm_end+warm_start)/2;
			temp=temp+"Ans = ( warm_end + warm_start ) &divide 2 <br> ";
			temp=temp+"Ans = ( "+warm_end+" + "+warm_start+" ) &divide 2 <br>";
			temp=temp+"Ans = "+ans.toFixed(2);
		}
	}
	//Else
	else
	{	
		//If cool < hot 
		if(a<=c)
		{
			ans=(cool_end-cool_start)/2;
			temp=temp+"ans=(cool_end-cool_start) &divide 2 <br>";
			temp=temp+"ans=("+cool_end+"-"+cool_start+") &divide 2 <br>";
			temp=temp+"ans="+ans.toFixed(2);			
		}
		else
		{
			ans=hot_start+2*(100-hot_start)/3;
			temp=temp+"ans=hot_start+2*(hot_end-hot_start) &divide 3<br>";
			temp=temp+"ans="+hot_start+"+2*(100-"+hot_start+") &divide 3 <br>";
			temp=temp+"ans="+ans.toFixed(2);
		}
	}
	var s="<h4 style='color:black'> The Defuzzified value is : <span style='color:red'>"+ans.toFixed(2)+"</span></h4>";
	temp=temp;
	var timer1=window.setTimeout(function () {
		$("#m6answer").addClass("well");
		$("#m6answer").append(""+temp);
		},2000);
		var timer1=window.setTimeout(function () {
		$("#m6final").addClass("well");
		$("#m6final").append(""+s);
		},3000);	
}
