var board;
var timer1, timer2, timer3,intervalT=2000;
var cool_start=30,cool_end=70,warm_start=50,warm_end=90,hot_start=80,hot_end=100,scallar_value=55;
$(document).ready(function () {
	
   
	plotTheGraph();
	$('html, body').animate({
        scrollTop: $("#top_div").offset().top
    }, 1500);
																		// slidersalert("tt");alert("tt");
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
        max: 120,
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

function plotTheGraph()
{
	 var graphEnds=100;
	board = JXG.JSXGraph.initBoard('graph1Div',{axis:true, boundingbox:[-1,1.1,graphEnds+10,-0.1]});
	var c_s =board.create('line',[[cool_start,0],[(cool_start+cool_end)/2,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#0000ff',strokeWidth:2});
	var c_e =board.create('line',[[(cool_start+cool_end)/2,1],[cool_end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#0000ff',strokeWidth:2});
	var w_s =board.create('line',[[warm_start,0],[(warm_start+warm_end)/2,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2});
	var w_e =board.create('line',[[(warm_start+warm_end)/2,1],[warm_end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2});
	var h_s =board.create('line',[[hot_start,0],[hot_end,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#ff0000',strokeWidth:2});
}

function startSimulation1()
{
//	alert("start");
	method1();
	method2();
	method3();
	method4();
	method5();
	method6();
	
}
function method1()
{
	$("#m1answer").empty();
	$("#m1answer").append(" the answer is "+ (cool_start+cool_end)/2+" or "+(warm_end+warm_start)/2+" or "+(hot_start+hot_end)/2);
}
function method2()
{
	$("#m2answer").empty();
	var a=cool_end;
	var b=warm_start;
	var c=warm_end;
	var d=hot_start;
	var ans=((cool_end+cool_start)/2 + (warm_end+warm_start/2) + (hot_end+hot_start)/2);
	var y1,y2;
	if(cool_end>warm_start && cool_start<warm_end)
	{
		var m1=1/(((cool_start+cool_end)/2)-cool_end);
		var m2=1/(((warm_start+warm_end)/2)-warm_start);
		var c1=-m1*cool_end;
		var c2=-m2*warm_start;
		y1=(m2*c1-m1*c2)/(m2-m1);
		ans = ans - (b-a)*y1/2;
	}
	if(hot_start<warm_end && cool_start<hot_start)
	{
		var m1=1/(((warm_start+warm_end)/2)-warm_end);
		var m2=1/(100-hot_start);
		var c1=-m1*warm_end;
		var c2=-m2*hot_start;
		y2=(m2*c1-m1*c2)/(m2-m1);
		ans = ans - (d-c)*y2/2;
	}
	$("#m2answer").append(" the answer is "+ ans/3);	
}

function method3()
{
	$("#m3answer").empty();
	var a=(cool_end+cool_start)/2;
	var b=(warm_end+warm_start)/2;
	var ans=(a+b)/2;
	$("#m3answer").append(" the answer is "+ ans);	
}
function method4()
{
	$("#m4answer").empty();
	var a=(cool_end+cool_start)/2;
	var b=(warm_end+warm_start)/2;
	var c= (100+hot_start)/2;
	var ans=(a+b+c)/3;
	$("#m4answer").append(" the answer is "+ ans);	
}
function method5()
{
	$("#m5answer").empty();
		var a=(cool_end-cool_start)*(cool_end+cool_start)/2;
	var b=(warm_end-warm_start)*(warm_end+warm_start)/2;
	var ans=(a+b)/((cool_end-cool_start)+(warm_end-warm_start));
	$("#m5answer").append(" the answer is "+ ans);	
}
function method6()
{
	$("#m6answer").empty();
	var a=cool_end-cool_start;
	var b=warm_end-warm_start;
	var c=(100-hot_start);
	var ans;
	if(a<=b)
	{
		if(b<c)
		{
			ans=hot_start+2*(100-hot_start)/3;
		}
		else{
			ans=(warm_end+warm_start)/2;
		}
	}
	else
	{
		if(a<=c)
		{
			ans=(cool_end-cool_start)/2;
		}
		else
		{
			ans=hot_start+2*(100-hot_start)/3;
		}
	}
	$("#m6answer").append(" the answer is "+ (cool_start+cool_end)/2);	
}