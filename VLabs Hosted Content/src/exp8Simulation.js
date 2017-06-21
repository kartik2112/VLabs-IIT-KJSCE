
var timer1, timer2, timer3,intervalT=2000;
var cool_start=30,cool_end=70,warm_start=50,warm_end=90,hot_start=80,hot_end=120,scallar_value=55;
$(document).ready(function () {
    
	
	
    $('html, body').animate({
        scrollTop: $("#top_div").offset().top
    }, 1500);
																		// sliders
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
	 $("#hot_end_slider").slider({
        max: 120,
        min: 0,
        step: 5,
		value :120,
        slide: function (event, ui) {
            if(ui.value<=hot_start)
			{
				$("#hot_end_slider").slider("value",hot_start);
				window.alert("end value should be more than start");
				hot_end=hot_start<120?hot_start+5:120;
				$(".hot_end_value").text(hot_end);
			}
			else
			{
            $(".hot_end_value").text(ui.value);
			hot_end=ui.value;
			}
		   plotTheGraph();
        }
    });
	$("#scallar_slider").slider({
        max: 120,
        min: 0,
        step: 5,
		value :55,
		animate: "slow",
        slide: function (event, ui) {
            $(".scallar_value").text(ui.value);
			scallar_value=ui.value;	
		 plotTheGraph();
        }
    });

	$("start_simulation_button").click(function(){
       $(this).hide();
    });

});
function startSimulation1()
{
	erasepoints();
	plotTheGraph();
	disableSliders();
	var interLine=$("#interscection_line"); 
	$("#main_button").text("stop the simulation");
	$("#main_button").removeClass("btn-primary");
	$("#main_button").addClass("btn-warning");
	$("#main_button").attr("onclick","stopSimulation1()");
	interLine.addClass("animatedLinePurple2");
	interLine.attr("x1",20+4*scallar_value);
	interLine.attr("x2",20+4*scallar_value);
	interLine.attr("y1",50);
	interLine.attr("y2",450);
	timer1=window.setTimeout(function () {
		
		interLine.removeClass("animatedLinePurple2");
		plotThePoints();	
		stopSimulation1();
		},intervalT*2);
	
}
function plotThePoints()
{
	var flag=false;
	var stringResult="The temprature is ";
	if(scallar_value>=cool_start&&scallar_value<=cool_end)
	{
		flag=true;
		if(scallar_value<=(cool_start+cool_end)/2)
		{
			
			$("#circle1").attr("cx",20+4*scallar_value);
			$("#circle1").attr("cy",400-(( 400/(cool_end-cool_start))*(scallar_value-cool_start)));
			$("#circle1").attr("r",5);
			stringResult=stringResult+Math.floor((scallar_value-cool_start)/(cool_end-cool_start)*200)+"% cool ";
		}
		else
		{
			$("#circle1").attr("cx",20+4*scallar_value);
			$("#circle1").attr("cy",400-(( 400/(cool_end-cool_start))*(cool_end-scallar_value)));
			$("#circle1").attr("r",5);
			stringResult=stringResult+Math.floor((cool_end-scallar_value)/(cool_end-cool_start)*200)+"% cool ";
		}
	}
	if(scallar_value>=warm_start&&scallar_value<=warm_end)
	{
		if(flag)
		{
			stringResult=stringResult+"and ";
		}
		flag=true;
		if(scallar_value<=(warm_start+warm_end)/2)
		{
			$("#circle2").attr("cx",20+4*scallar_value);
			$("#circle2").attr("cy",400-(( 400/(warm_end-warm_start))*(scallar_value-warm_start)));
			$("#circle2").attr("r",5);
			stringResult=stringResult+Math.floor((scallar_value-warm_start)/(warm_end-warm_start)*200)+"% warm ";
		}
		else
		{
			$("#circle2").attr("cx",20+4*scallar_value);
			$("#circle2").attr("cy",400-(( 400/(warm_end-warm_start))*(warm_end-scallar_value)));
			$("#circle2").attr("r",5);
			stringResult=stringResult+Math.floor((warm_end-scallar_value)/(warm_end-warm_start)*200)+"% warm ";
		}	
	}
	if(scallar_value>=hot_start&&scallar_value<=hot_end)
	{
		if(flag)
		{
			stringResult=stringResult+"and ";
		}
		if(scallar_value<=(hot_start+hot_end)/2)
		{
			$("#circle3").attr("cx",20+4*scallar_value);
			$("#circle3").attr("cy",400-(( 400/(hot_end-hot_start))*(scallar_value-hot_start)));
			$("#circle3").attr("r",5);
			stringResult=stringResult+Math.floor((scallar_value-hot_start)/(hot_end-hot_start)*200)+"% hot";
		}
		else
		{
			$("#circle3").attr("cx",20+4*scallar_value);
			$("#circle3").attr("cy",400-(( 400/(hot_end-hot_start))*(hot_start-scallar_value)));
			$("#circle3").attr("r",5);
			stringResult=stringResult+Math.floor((hot_end-scallar_value)/(hot_end-cool_start)*200)+"% hot";
		}
	}
	$("#div_for_result").addClass("well");
	$("#div_for_result").append(""+stringResult);
}
function disableSliders()
{
	
	$("#cool_start_slider").slider("disable");
	$("#cool_end_slider").slider("disable");
	$("#warm_start_slider").slider("disable");
	$("#warm_end_slider").slider("disable");
	$("#hot_start_slider").slider("disable");
	$("#hot_end_slider").slider("disable");
	$("#scallar_slider").slider("disable");
}
function enableSliders()
{
	$("#cool_start_slider").slider("enable");
	$("#cool_end_slider").slider("enable");
	$("#warm_start_slider").slider("enable");
	$("#warm_end_slider").slider("enable");
	$("#hot_start_slider").slider("enable");
	$("#hot_end_slider").slider("enable");
	$("#scallar_slider").slider("enable");
}
function erasepoints()
{
	$("#circle1").attr("r",0);
	$("#circle2").attr("r",0);
	$("#circle3").attr("r",0);
	$("#div_for_result").removeClass("well");
	$("#div_for_result").empty();
}
function stopSimulation1()
{
	window.clearTimeout(timer1);
	window.clearTimeout(timer2);
	enableSliders();
	$("#main_button").text("Start The Simulation");
	$("#main_button").removeClass("btn-warning");
	$("#main_button").addClass("btn-primary");
	$("#main_button").attr("onclick","startSimulation1()");
	var interLine=$("#interscection_line"); 
	interLine.removeClass("animatedLinePurple2");
}
function plotTheGraph()
{
		
	
	$("#cool_line1").attr("x1",20+4*cool_start>0?20+4*cool_start:0);
	$("#cool_line1").attr("x2",20+2*(cool_start+cool_end));
	$("#cool_line2").attr("x1",20+2*(cool_end+cool_start));
	$("#cool_line2").attr("x2",20+4*cool_end);
	$("#warm_line1").attr("x1",20+4*warm_start);
	$("#warm_line1").attr("x2",20+2*(warm_start+warm_end));
	$("#warm_line2").attr("x1",20+2*(warm_start+warm_end));
	$("#warm_line2").attr("x2",20+4*warm_end);
	$("#hot_line1").attr("x1",20+4*hot_start);
	$("#hot_line1").attr("x2",20+2*(hot_end+hot_start));
	$("#hot_line2").attr("x1",20+2*(hot_end+hot_start));
	$("#hot_line2").attr("x2",20+4*hot_end);
}