var n_descriptor_grease = 3;    //To keep track for new id assignment
var n_descriptor_dirt = 3, n_descriptor_wash = 3;
var dirt_descriptor_ids = [1,2,3], grease_descriptor_ids = [1,2,3], wash_descriptor_ids = [1,2,3,4];  //To keep track of ids of each descriptor
var dirt_descriptors = [{id:1,name:"Low",start:999,end:65},
                    {id:2,name:"Medium",start:15,end:75},
                    {id:3,name:"High",start:50,end:100}];

var grease_descriptors = [{id:1,name:"Low",start:999,end:45},
                      {id:2,name:"Medium",start:15,end:85},
                      {id:3,name:"High",start:55,end:100}];
var wash_descriptors = [{id:1,name:"Low",start:999,end:45},
                    {id:2,name:"Medium",start:35,end:55},
                    {id:3,name:"High",start:45,end:75},
                    {id:4,name:"Very High",start:65,end:120}];
var grease_lines_up=[],grease_lines_down=[];
var dirt_lines_up=[],dirt_lines_down=[];
var washing_lines_up=[],washing_lines_down=[];
var board;
$(document).ready(function(){
    $(".descr input[type='text']").tooltip({title: 'Edit descriptor name'});
    $(".descr input[type='number']").tooltip({placement: "right"});
    $(".descr button").tooltip({title: 'Remove descriptor', placement: 'right'});
    $("[data-toggle='input']").tooltip();
});

function plotGraph(){
    var graphEnds=100;
    board = JXG.JSXGraph.initBoard('grease_GraphDiv',{axis:true, boundingbox:[-1,1.1,graphEnds+10,-0.1]});
    for (var i = 0; i < grease_descriptors.length; i++) {
        var start=grease_descriptors[i].start;
        var end=grease_descriptors[i].end;
        if(start==999)
        {
            //First descriptor Line:
            grease_lines_down.push(board.create('line',[[0,1],[end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
        }
        else if (end==100) {
            //Last descriptor Line:
            grease_lines_up.push(board.create('line',[[start,0],[end,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
            var horiz_line=board.create('line',[[end,1],[end+100,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2});
        }
        else {
            var mid=parseFloat((start+end)/2).toFixed(2);
            console.log(mid);
            grease_lines_up.push(board.create('line',[[start,0],[mid,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
            grease_lines_down.push(board.create('line',[[mid,1],[end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
        }
    }
    //Following is to draw graph for Dirt descriptors
    var board_dirt = JXG.JSXGraph.initBoard('dirt_GraphDiv',{axis:true, boundingbox:[-1,1.1,graphEnds+10,-0.1]});
    for (var i = 0; i < dirt_descriptors.length; i++) {
        var start=dirt_descriptors[i].start;
        var end=dirt_descriptors[i].end;
        if(start==999)
        {
            //First descriptor Line:
            dirt_lines_down.push(board_dirt.create('line',[[0,1],[end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
        }
        else if (end==100) {
            //Last descriptor Line:
            dirt_lines_up.push(board_dirt.create('line',[[start,0],[end,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
            horiz_line_dirt=board_dirt.create('line',[[end,1],[end+100,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2});
        }
        else {
            var mid=parseFloat((start+end)/2).toFixed(2);
            console.log(mid);
            dirt_lines_up.push(board_dirt.create('line',[[start,0],[mid,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
            dirt_lines_down.push(board_dirt.create('line',[[mid,1],[end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
        }
    }
    //Following is to draw graph for Wash time descriptors
    graphEnds=wash_descriptors[wash_descriptors.length-1].end;
    // console.log(graphEnds);
    var board_washing = JXG.JSXGraph.initBoard('washing_GraphDiv',{axis:true, boundingbox:[-1,1.1,parseInt(graphEnds/10)*10+10,-0.1]});

    for (var i = 0; i < wash_descriptors.length; i++) {
        var start=wash_descriptors[i].start;
        var end=wash_descriptors[i].end;
        if(start==999)
        {
            //First descriptor Line:
            washing_lines_down.push(board_washing.create('line',[[0,1],[end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
        }
        else if (i==wash_descriptors.length-1) {
            //Last descriptor Line:
            washing_lines_up.push(board_washing.create('line',[[start,0],[end,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
            horiz_line_washing=board_washing.create('line',[[end,1],[end+100,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2});
        }
        else {
            var mid=parseFloat((start+end)/2).toFixed(2);
            console.log(mid);
            washing_lines_up.push(board_washing.create('line',[[start,0],[mid,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
            washing_lines_down.push(board_washing.create('line',[[mid,1],[end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
        }
    }
}

$(".descr input[type='text']").tooltip({title: 'Edit descriptor name'});
$(".descr input[type='number']").tooltip({placement: "right"});
$(".descr button").tooltip({title: 'Remove descriptor', placement: 'right'});
$("#save").tooltip({placement: 'bottom'});

function add_descriptor(who){
    // Add a descriptor for Grease.
    //save();
    if(who==1){
        document.getElementById('g_add').removeAttribute('onclick');
        if(grease_descriptor_ids.length == 5){
            alert('Maximum limit for descriptors reached!');
            return;
        }
        var x = document.getElementById('g_d_'+grease_descriptor_ids[n_descriptor_grease-1]);
        // Retreive the start value, end value and name of descriptor related HTML elements
        var elems = x.children;
        var prevStart=Number(parseInt(elems[0].value));
        m=parseInt((prevStart+100)/2);
        console.log(prevStart+";"+m);
        n_descriptor_grease++;
        var div = document.createElement("div");
        div.setAttribute("class","descr");
        div.style.display = "none";
        div.setAttribute("id","g_d_"+n_descriptor_grease);
        div.innerHTML = '<input type="number" max="100" min="0" value="'+m+'"  title="When descriptor\'s membership value begins to rise"/><input type="text" placeholder="Name of descriptor"/><input type="number" max="100" min="0" placeholder="100" disabled title="When descriptor\'s membership value reaches zero"/><button id="g'+n_descriptor_grease+'" onclick="rem_descriptor(\'g\','+n_descriptor_grease+');"><b>-</b></button>';
        var parent = document.getElementById('descrs_1');
        parent.appendChild(div);

        var prev = document.getElementById('g_d_'+grease_descriptor_ids[grease_descriptor_ids.length-1]);
        var inp_elem = prev.children[2];
        inp_elem.removeAttribute("placeholder");
        inp_elem.removeAttribute('disabled');
        inp_elem.value = m+1;

        grease_descriptor_ids.push(n_descriptor_grease);
        $("#g_d_"+n_descriptor_grease).fadeIn(700);
        setTimeout(function(){document.getElementById('g_add').setAttribute('onclick','add_descriptor(1);');},700);
        $("#g_no").html(grease_descriptor_ids.length);
        if(grease_descriptor_ids.length==5) $("#g_txt").css('color','red');
    }
    // Add a descriptor for Dirt
    else if(who==2){
        document.getElementById('d_add').removeAttribute('onclick');
        if(dirt_descriptor_ids.length == 5){
            alert('Maximum limit for descriptors reached!');
            return;
        }
        var x = document.getElementById('d_d_'+dirt_descriptor_ids[n_descriptor_dirt-1]);
        // Retreive the start value, end value and name of descriptor related HTML elements
        var elems = x.children;
        var prevStart=Number(parseInt(elems[0].value));
        m=parseInt((prevStart+100)/2);
        n_descriptor_dirt++;
        var div = document.createElement("div");
        div.setAttribute("class","descr");
        div.style.display = "none";
        div.setAttribute("id","d_d_"+n_descriptor_dirt);
        div.innerHTML = '<input type="number" max="100" min="0" value="'+m+'"  title="When descriptor\'s membership value begins to rise"/><input type="text" placeholder="Name of descriptor"/><input type="number" max="100" min="0" placeholder="100"  title="When descriptor\'s membership value reaches zero" disabled/><button id="d'+n_descriptor_dirt+'" onclick="rem_descriptor(\'d\','+n_descriptor_dirt+');"><b>-</b></button>';
        var parent = document.getElementById('descrs_2');
        parent.appendChild(div);

        var prev = document.getElementById('d_d_'+dirt_descriptor_ids[dirt_descriptor_ids.length-1]);
        var inp_elem = prev.children[2];
        inp_elem.removeAttribute("placeholder");
        inp_elem.removeAttribute('disabled');
        inp_elem.value = m+1;

        dirt_descriptor_ids.push(n_descriptor_dirt);
        $("#d_d_"+n_descriptor_dirt).fadeIn(700);
        setTimeout(function(){document.getElementById('d_add').setAttribute('onclick','add_descriptor(2);');},700);
        $("#d_no").html(dirt_descriptor_ids.length);
        if(dirt_descriptor_ids.length==5) $("#d_txt").css('color','red');
    }
    else if(who==3){
        document.getElementById('t_add').removeAttribute('onclick');
        if(wash_descriptor_ids.length == 5){
            alert('Maximum limit for descriptors reached!');
            return;
        }
        var x = document.getElementById('t_d_'+wash_descriptor_ids[n_descriptor_wash-1]);
        // Retreive the start value, end value and name of descriptor related HTML elements
        var elems = x.children;
        var prevStart=Number(parseInt(elems[0].value));
        m=parseInt((prevStart+120)/2);
        n_descriptor_wash++;
        var div = document.createElement("div");
        div.setAttribute("class","descr");
        div.style.display = "none";
        div.setAttribute("id","t_d_"+n_descriptor_wash);
        div.innerHTML = '<input type="number" max="100" min="0" value="'+m+'"  title="When descriptor\'s membership value begins to rise"/><input type="text" placeholder="Name of descriptor"/><input type="number" max="100" min="0" placeholder="120" disabled title="When descriptor\'s membership value reaches zero"/><button id="t'+n_descriptor_wash+'" onclick="rem_descriptor(\'t\','+n_descriptor_wash+');"><b>-</b></button>';
        var parent = document.getElementById('descrs_3');
        parent.appendChild(div);

        var prev = document.getElementById('t_d_'+wash_descriptor_ids[wash_descriptor_ids.length-1]);
        var inp_elem = prev.children[2];
        inp_elem.removeAttribute("placeholder");
        inp_elem.removeAttribute('disabled');
        inp_elem.value = m+1;

        wash_descriptor_ids.push(n_descriptor_wash);
        $("#t_d_"+n_descriptor_wash).fadeIn(700);
        setTimeout(function(){document.getElementById('t_add').setAttribute('onclick','add_descriptor(3);');},700);
        $("#t_no").html(wash_descriptor_ids.length);
        if(wash_descriptor_ids.length==5) $("#t_txt").css('color','red');
    }
    $(".descr input[type='text']").tooltip({title: 'Edit descriptor name'});
    $(".descr input[type='number']").tooltip({placement: "right"});
    $(".descr button").tooltip({title: 'Remove descriptor', placement: 'right'});
}

function rem_descriptor(who,which){
    if(who=='g'){
        var parent = document.getElementById('descrs_1')
        var elem = document.getElementById('g_d_'+which);
        $("#g_d_"+which).fadeOut(700);
        $("#g_no").html(grease_descriptor_ids.length-1);
        $("#g_txt").css('color','inherit');
        document.getElementById('g'+which).removeAttribute('onclick');
        setTimeout(function(){
            parent.removeChild(elem);
            var index = grease_descriptor_ids.indexOf(which);
            grease_descriptor_ids.splice(index,1);
            if(which == n_descriptor_grease) {
                var prev = document.getElementById('g_d_'+grease_descriptor_ids[grease_descriptor_ids.length-1]);
                var inp_elem = prev.children[2];
                inp_elem.setAttribute("placeholder","100");
                inp_elem.value = "";
                inp_elem.setAttribute("disabled","disabled");
                n_descriptor_grease--;
            }
        },900);
    }
    else if(who == 'd'){
        var parent = document.getElementById('descrs_2')
        var elem = document.getElementById('d_d_'+which);
        $("#d_d_"+which).fadeOut(700);
        $("#d_no").html(dirt_descriptor_ids.length-1);
        $("#d_txt").css('color','inherit');
        document.getElementById('d'+which).removeAttribute('onclick');
        setTimeout(function(){
            parent.removeChild(elem);
            var index = dirt_descriptor_ids.indexOf(which);
            dirt_descriptor_ids.splice(index,1);
            if(which == n_descriptor_dirt){
                var prev = document.getElementById('d_d_'+dirt_descriptor_ids[dirt_descriptor_ids.length-1]);
                var inp_elem = prev.children[2];
                inp_elem.setAttribute("placeholder","100");
                inp_elem.value = "";
                inp_elem.setAttribute("disabled","disabled");
                n_descriptor_dirt--;
            }
        },900);
    }
    else if(who == 't'){
        var parent = document.getElementById('descrs_3')
        var elem = document.getElementById('t_d_'+which);
        $("#t_d_"+which).fadeOut(700);
        $("#t_no").html(wash_descriptor_ids.length-1);
        $("#t_txt").css('color','inherit');
        document.getElementById('t'+which).removeAttribute('onclick');
        setTimeout(function(){
            parent.removeChild(elem);
            var index = wash_descriptor_ids.indexOf(which);
            wash_descriptor_ids.splice(index,1);
            if(which == n_descriptor_wash){
                var prev = document.getElementById('t_d_'+wash_descriptor_ids[wash_descriptor_ids.length-1]);
                var inp_elem = prev.children[2];
                inp_elem.setAttribute("placeholder","120");
                inp_elem.value = "";
                inp_elem.setAttribute("disabled","disabled");
                n_descriptor_wash--;
            }
        },900);
    }
}

function save(){
    dirt_descriptors = [];
    grease_descriptors = [];
    wash_descriptors = [];
    for (var i = 0; i < grease_lines_up.length; i++) {
      board.removeObject(grease_lines_up[i]);
    }
    grease_lines_up=[];
    for (var i = 0; i < grease_lines_down.length; i++) {
      board.removeObject(grease_lines_down[i]);
    }
    grease_lines_down=[];
    for(var i=0;i<grease_descriptor_ids.length;i++){
        var x = document.getElementById('g_d_'+grease_descriptor_ids[i]);
        // Retreive the start value, end value and name of descriptor related HTML elements
        var elems = x.children;

        var s = parseInt(elems[0].value);
        var n = elems[1].value;
        if(n=="") n = "Grease Descriptor #"+(i+1);
        var e = parseInt(elems[2].value);
        if(i == 0) s = 999; //Because start value of first descriptor is not defined
        if(i==grease_descriptor_ids.length-1) e = 100;  //Because end value of last descriptor is not defined
        var descriptor = {'id': grease_descriptor_ids[i], 'name': n, 'start': s, 'end': e};
        grease_descriptors.push(descriptor);
        //console.log(grease_descriptors[i].name);
    }
    for (var i = 0; i < dirt_lines_up.length; i++) {
      board.removeObject(dirt_lines_up[i]);
    }
    dirt_lines_up=[];
    for (var i = 0; i < dirt_lines_down.length; i++) {
      board.removeObject(dirt_lines_down[i]);
    }
    dirt_lines_down=[];
    for(var i=0;i<dirt_descriptor_ids.length;i++){
        var x = document.getElementById('d_d_'+dirt_descriptor_ids[i]);
        var elems = x.children;
        var s = parseInt(elems[0].value); //Because start value of first descriptor is not defined
        var n = elems[1].value;
        if(n=="") n = "Dirt Descriptor #"+(i+1);
        if(i==dirt_descriptor_ids.length-1)
        {
            var e = 100;  //Because end value of last descriptor is not defined
        }
        else {
            var e = parseInt(elems[2].value);
        }
        if(i == 0) s = 999;
        var descriptor = {'id': dirt_descriptor_ids[i], 'name': n, 'start': s, 'end': e};
        dirt_descriptors.push(descriptor);
    }
    for (var i = 0; i < washing_lines_up.length; i++) {
      board.removeObject(washing_lines_up[i]);
    }
    washing_lines_up=[];
    for (var i = 0; i < washing_lines_down.length; i++) {
      board.removeObject(washing_lines_down[i]);
    }
    washing_lines_down=[];
    for(var i=0;i<wash_descriptor_ids.length;i++){
        var x = document.getElementById('t_d_'+wash_descriptor_ids[i]);
        var elems = x.children;
        var s = parseInt(elems[0].value); //Because start value of first descriptor is not defined
        var n = elems[1].value;
        if(n=="") n = "Wash Descriptor #"+(i+1);
        if(i==wash_descriptor_ids.length-1)
        {
            e = 120;  //Because end value of last descriptor is not defined
        }
        else {
            var e = parseInt(elems[2].value);
        }
        if(i == 0) s = 999;
        var descriptor = {'id': wash_descriptor_ids[i], 'name': n, 'start': s, 'end': e};
        wash_descriptors.push(descriptor);
    }

    plotGraph();
}

function table(){
    var option_content = "";
    for(var k=0;k<wash_descriptors.length;k++){
        option_content += "<option value='"+wash_descriptors[k].id+"'>"+wash_descriptors[k].name+"</option>";
    }

    var htm_to_add='<p style="text-align: center;">Table</p>'+'<div>'+'<table class="fam" border="1">'
    for(var i=-1;i<dirt_descriptors.length;i++){
        htm_to_add+='<tr>'
        for(var j=-1;j<grease_descriptors.length;j++){
            if(i==-1){
                if(j==-1) htm_to_add += "<th id='empty'>Grease descriptors &rarr;<br>Dirt descriptors &darr;</th>"
                else htm_to_add += "<th>"+grease_descriptors[j].name+"</th>";
            }
            else if(j==-1){
                htm_to_add += "<th>"+dirt_descriptors[i].name+"</th>";
            }
            else htm_to_add += "<td class='selector' title='Output descriptor for "+grease_descriptors[j].name+" grease and "+dirt_descriptors[i].name+" dirt'><select id='sel"+i+j+"'>"+option_content+"</select></td>";
        }
        htm_to_add+='</tr>'
    }
    htm_to_add+='</table>'+'</div>';
    document.getElementById("table_data").innerHTML=htm_to_add;

    if(dirt_descriptors.length > 4 || grease_descriptors.length > 4){
        $('.fam td').css("padding","13px");
    }
}

function hide_instrs(arg){
    $('#instr_div').fadeOut(500);
    if(arg==1){
        setTimeout(function(){
            $("#show_instr").css('visibility','visible');
        },600);
        return;
    }
    setTimeout(function(){
        $("#title").html("Step 1: Describe our inputs and outputs");
        $('#descriptor_div').fadeIn(500);
        $('#hide_instr').html("Hide");
        document.getElementById('hide_instr').setAttribute('onclick','hide_instrs(1);');
    },1000);
    plotGraph();
}

function show_instrs(){
    $("#instr_div").fadeIn(700);
    $("#show_instr").css('visibility','hidden');
}

function next(){
    save();
    $('#descriptor_div').fadeOut(800);
    setTimeout(function(){
        $('#matrix_div').fadeIn(800);
        $("#title").html("Step 2: Deciding the wash time...");
        table();
    },1000);
}


function edit_descr(){
    var msg = confirm('You will lose all progress you made in this page. Continue?');
    if(msg==true){
        $("#matrix_div").fadeOut(1200);
        $("#descriptor_div").fadeIn(1200);
        $('#title').html("Step 1: Describe our inputs and outputs");
    }
}

var inference_table = [];
function proceed(){
    inference_table = [];
    for(var i=0;i<dirt_descriptors.length;i++){
        var inference_row = [];
        for(var j=0;j<grease_descriptors.length;j++){
            var x = document.getElementById('sel'+i+j);
            inference_row.push(x.value);
        }
        inference_table.push(inference_row);
    }
    $("#matrix_div").fadeOut(800);
    setTimeout(function(){
        $("#trial_div").fadeIn(1200);
        $("#title").html("Step 3: Trial of your washing machine...");
    },1000);
}

var fuzzyGrease=[];
var fuzzyDirt=[];
var fuzzyWash=[];

function fuzzify(g,d){ //Generates fuzzy input from the grease and dirt percentages.
    var inputs = document.getElementsByClassName('m_input');
    for(var i=0;i<inputs.length;i++){
        if(inputs[i].value == "") inputs[i].value = "0";
    }
    var fuzzyGrease=[];
    var fuzzyDirt=[];
    var fuzzyWash=[];
    var grease=parseInt(Number(g));
    var dirt=parseInt(d);
    document.getElementById("greaseFuzzy").innerHTML="";
    document.getElementById("dirtFuzzy").innerHTML="";
    document.getElementById("washFuzzy").innerHTML="";
    $("#greaseFuzzy").fadeOut(400);
    $("#dirtFuzzy").fadeOut(400);
    $("#washFuzzy").fadeOut(400);
    $("#defuzzifierOP_GraphDiv").fadeOut(400);
    $("#FIS_Carousel").fadeOut(400);
    $("#Final_calculation").fadeOut(400);
    $("#Final_result").fadeOut(400);
    $("#defuzz-description").fadeOut(400);
    $("#defuzzifier_graph_title").fadeOut(400);
    document.getElementById('proceed').setAttribute('disabled','disabled');
    //Find fuzzy input using the values
    for (var i = 0; i < grease_descriptors.length; i++) {
        var start=grease_descriptors[i].start;
        var end=grease_descriptors[i].end;
        var id=grease_descriptors[i].id;
        var fuzzyVal=0;
        if(i==0)
        {
            start=0;
            if(grease>start&&grease<end)
            {
                fuzzyVal=Number(parseFloat((end-grease)/(end-start)).toFixed(3));
            }
            else if (grease==start) {
                fuzzyVal=1;
            }
        }
        else if(end==100)
        {
            if(grease>start&&grease<end)
            {
                fuzzyVal=Number(parseFloat((grease-start)/(end-start)).toFixed(3));
            }
            else if (grease==end) {
                fuzzyVal=1;
            }
        }
        else
        {
            var mid=Number(parseFloat((start+end)/2).toFixed(3));
            if(grease>=start&&grease<=mid)
            {
                fuzzyVal=Number(parseFloat((grease-start)/(mid-start)).toFixed(3));
            }
            else if (grease>mid&&grease<end)
            {
                fuzzyVal=Number(parseFloat((end-grease)/(end-mid)).toFixed(3));
            }
        }
        var descriptor={'id':id,'name':grease_descriptors[i].name,'fuzzyVal':fuzzyVal};
        fuzzyGrease.push(descriptor);
    }
    var str="<h5>Fuzzy set for Grease:</h5>";
    str+="<table class='fuzzySet'><tr>";
    for (var i = 0; i < fuzzyGrease.length; i++) {
      str+="<td style=\"border-bottom:1px solid black;text-align:center\">"+fuzzyGrease[i].fuzzyVal+"</td>";
      if(i!=fuzzyGrease.length-1)
        str+="<td rowspan=2 style=\"padding-left:13px;padding-right:13px;text-align:center\">+</td>";
    }
    str+="</tr><tr>";
    for (var i = 0; i < fuzzyGrease.length; i++) {
      str+="<td style=\"text-align:center\">"+fuzzyGrease[i].name+"</td>";
    }
    str+="</tr></table>";
    $("#greaseFuzzy").fadeIn(800);
    document.getElementById("greaseFuzzy").innerHTML=str;
    for (var i = 0; i < dirt_descriptors.length; i++) {
        var start=dirt_descriptors[i].start;
        var end=dirt_descriptors[i].end;
        var id=dirt_descriptors[i].id;
        var fuzzyVal=0;
        if(i==0)
        {
            start=0;
            if(dirt>start&&dirt<end)
            {
                fuzzyVal=Number(parseFloat((end-dirt)/(end-start)).toFixed(3));
            }
            else if (dirt==start) {
                fuzzyVal=1;
            }
        }
        else if(end==100)
        {
            if(dirt>start&&dirt<end)
            {
                fuzzyVal=Number(parseFloat((dirt-start)/(end-start)).toFixed(3));
            }
            else if(dirt==end)
            {
                fuzzyVal=1;
            }
        }
        else
        {
            var mid=Number(parseFloat((start+end)/2).toFixed(3));
            if(dirt>=start&&dirt<=mid)
            {
                fuzzyVal=Number(parseFloat((dirt-start)/(mid-start)).toFixed(3));
            }
            else if (dirt>mid&&dirt<end)
            {
                fuzzyVal=Number(parseFloat((end-dirt)/(end-mid)).toFixed(3));
            }
        }
        var descriptor={'id':id,'name':dirt_descriptors[i].name,'fuzzyVal':fuzzyVal};
        fuzzyDirt.push(descriptor);
    }
    var str2="<h5>Fuzzy set for Dirt:</h5>";
    str2+="<table class='fuzzySet'><tr>";
    for (var i = 0; i < fuzzyDirt.length; i++) {
      str2+="<td style=\"border-bottom:1px solid black;text-align:center\">"+fuzzyDirt[i].fuzzyVal+"</td>";
      if(i!=fuzzyDirt.length-1)
        str2+="<td rowspan=2 style=\"padding-left:13px;padding-right:13px;text-align:center\">+</td>";
    }
    str2+="</tr><tr>";
    for (var i = 0; i < fuzzyDirt.length; i++) {
      str2+="<td style=\"text-align:center\">"+fuzzyDirt[i].name+"</td>";
    }
    str2+="</tr></table>";
    setTimeout(function(){
        $("#dirtFuzzy").fadeIn(800);
        document.getElementById("dirtFuzzy").innerHTML=str2;
    },1500);
    for (var i = 0; i < wash_descriptors.length; i++) {
      fuzzyWash.push({'id':wash_descriptors[i].id,'name':wash_descriptors[i].name,'fuzzyVal':0});
    }
    for (var i = 0; i < fuzzyGrease.length; i++) {
      for (var j = 0; j < fuzzyDirt.length; j++) {
          var colIndex=fuzzyGrease[i].id-1;
          var rowIndex=fuzzyDirt[j].id-1;
          var resultDescriptor=inference_table[rowIndex][colIndex];
          var resultFuzzy=Math.min(fuzzyGrease[i].fuzzyVal,fuzzyDirt[j].fuzzyVal);
          var newFuzzyVal=Math.max(resultFuzzy,fuzzyWash[resultDescriptor-1].fuzzyVal);
          fuzzyWash[resultDescriptor-1].fuzzyVal=newFuzzyVal;
      }
    }
    var str3="<h4>Using extension principle on above two sets, Fuzzy set on washing time:</h4>";
    str3+="<table class='fuzzySet'><tr>";
    for (var i = 0; i < fuzzyWash.length; i++) {
      str3+="<td style=\"border-bottom:1px solid black;text-align:center\">"+fuzzyWash[i].fuzzyVal+"</td>";
      if(i!=fuzzyWash.length-1)
        str3+="<td rowspan=2 style=\"padding-left:13px;padding-right:13px;text-align:center\">+</td>";
    }
    str3+="</tr><tr>";
    for (var i = 0; i < fuzzyWash.length; i++) {
      str3+="<td style=\"text-align:center\">"+fuzzyWash[i].name+"</td>";
    }
    str3+="</tr></table>";
    setTimeout(function(){
        $("#washFuzzy").fadeIn(800);
        document.getElementById("washFuzzy").innerHTML=str3;
    },3000);
    setTimeout(function(){
        $("#defuzzifier_graph_title").fadeIn(800);
        $("#defuzzifierOP_GraphDiv").fadeIn(800);
        $("#FIS_Carousel").fadeIn(800);
        $("#Final_calculation").fadeIn(400);
        $("#Final_result").fadeIn(400);
        defuzzify(fuzzyWash);
    },4500);
}
var p1,p2,p3,p4,pc1,pc2,pc3,pc4;
function defuzzify(fuzzyWash)
{
    $("#defuzz-description").fadeIn(800);
    graphEnds=wash_descriptors[wash_descriptors.length-1].end;
    var A=[];
    var C=[];
    var explnBoards=[];
    for (var i = 0; i < wash_descriptors.length; i++) {
      var b=JXG.JSXGraph.initBoard('expln'+i+'_GraphDiv',{axis:true, boundingbox:[-1,1.1,parseInt(graphEnds/10)*10+10,-0.1],showNavigation:false});
      var start=wash_descriptors[i].start;
      var end=wash_descriptors[i].end;
      if(start==999){
          //First descriptor Line:
          washing_lines_down.push(b.create('line',[[0,1],[end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
      }
      else if (i==wash_descriptors.length-1) {
          //Last descriptor Line:
          washing_lines_up.push(b.create('line',[[start,0],[end,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
          horiz_line_washing=b.create('line',[[end,1],[end+100,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2});
      }
      else {
          var mid=parseFloat((start+end)/2).toFixed(2);
          console.log(mid);
          washing_lines_up.push(b.create('line',[[start,0],[mid,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
          washing_lines_down.push(b.create('line',[[mid,1],[end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
      }
      explnBoards.push(b);
    }
    var board_washing = JXG.JSXGraph.initBoard('defuzzifierOP_GraphDiv',{axis:true, boundingbox:[-1,1.1,parseInt(graphEnds/10)*10+10,-0.1]});
    for (var i = 0; i < wash_descriptors.length; i++) {
        var start=wash_descriptors[i].start;
        var end=wash_descriptors[i].end;
        if(start==999)
        {
            //First descriptor Line:
            washing_lines_down.push(board_washing.create('line',[[0,1],[end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
        }
        else if (i==wash_descriptors.length-1) {
            //Last descriptor Line:
            washing_lines_up.push(board_washing.create('line',[[start,0],[end,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
            horiz_line_washing=board_washing.create('line',[[end,1],[end+100,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2});
        }
        else {
            var mid=parseFloat((start+end)/2).toFixed(2);
            console.log(mid);
            washing_lines_up.push(board_washing.create('line',[[start,0],[mid,1]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
            washing_lines_down.push(board_washing.create('line',[[mid,1],[end,0]],{straightFirst:false,fixed:true, straightLast:false,strokeColor:'#00ff00',strokeWidth:2}));
        }
    }
    for (var i = 0; i < fuzzyWash.length; i++) {
      A.push(0);
      C.push(0);
    }
    for (var i = 0; i < fuzzyWash.length; i++) {
        if(fuzzyWash[i].fuzzyVal!=0)
        {
            var currBoard=explnBoards[i];
            if (i==0) {
              start=0;
            }
            else {
                var start=wash_descriptors[i].start;
            }
            var end=wash_descriptors[i].end;
            var fixedSize=0;
            var showLines=false;
            var shouldPointsBeSeen=false;
            p1=board_washing.create('point',[start,0],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
            p4=board_washing.create('point',[end,0],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
            pc1=currBoard.create('point',[start,0],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
            pc4=currBoard.create('point',[end,0],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
            if(i==0)
            {
                p2=board_washing.create('point',[0,fuzzyWash[i].fuzzyVal],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
                pc2=currBoard.create('point',[0,fuzzyWash[i].fuzzyVal],{fixed:true,name:'B',size:1});
                var str="";
                start=0;
                pc1.setAttribute({name:'A',size:1,visible:true});
                pc4.setAttribute({name:'E',size:1,visible:true});
                if(fuzzyWash[i].fuzzyVal==1)
                {
                    A[i]=Number(parseFloat(0.5*(end-start)).toFixed(3));
                    C[i]=Number(parseFloat((end-start)/3+start).toFixed(3));
                    var pol = board_washing.create('polygon', [p1, p2, p4],{withLines:showLines});
                    var polc = currBoard.create('polygon', [pc1, pc2, pc4],{withLines:showLines});
                    str+="<p>The above figure is a right angled triangle. Here we are only concerned with the X-co-ordinate of the centroid. The centroid for the right angled triangle is at a distance of 1/3<sup>rd</sup> of the base from the perpendicular.</p>";
                    str+="The centroid comes out to be <b>"+C[i]+"</b><br />";
                    str+="The area of the triangle can be calculated as <br />A=0.5*("+end+"-"+start+")*"+fuzzyWash[i].fuzzyVal+"="+A[i];
                    str+="<h3>The area of this desciptor is "+A[i]+" and the centroid is at "+C[i]+".</h3>";
                }
                else
                {
                    str+="<p>The above figure does look like a trapezium. So the area calculation is very straight-forward. But since the figure is assymetric about the X-axis, the centroid calculation is not. We therefore take two parts and then calculate the centroid.</p>"
                    x1=Number(parseFloat(end-parseFloat(fuzzyWash[i].fuzzyVal*(end-start))).toFixed(3));
                    p3=board_washing.create('point',[x1,fuzzyWash[i].fuzzyVal],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
                    pc3=currBoard.create('point',[x1,fuzzyWash[i].fuzzyVal],{fixed:true,name:'C',size:1});
                    var a1=Number(parseFloat((x1-start)*fuzzyWash[i].fuzzyVal).toFixed(3));
                    var c1=Number(parseFloat((start+x1)/2).toFixed(3));
                    console.log(a1+":"+c1);
                    var a2=Number(parseFloat(0.5*(end-x1)*fuzzyWash[i].fuzzyVal).toFixed(3));
                    var c2=Number(parseFloat((end-x1)/3+x1).toFixed(3));
                    console.log(a2+":"+c2);
                    A[i]=Number(parseFloat(a1+a2).toFixed(3));
                    C[i]=Number(parseFloat((a1*c1+a2*c2)/(a1+a2)).toFixed(3));
                    var pol = board_washing.create('polygon', [p1, p2, p3, p4],{withLines:showLines});
                    var polc = currBoard.create('polygon', [pc1, pc2, pc3, pc4],{withLines:showLines});
                    var temp_point=currBoard.create('point',[x1,0],{fixed:true,name:'D',size:1});
                    var temp_line=currBoard.create('line',[temp_point,pc3],{fixed:true,dash:1,straightFirst:false,straightLast:false});
                    str+="<table>";
                    str+="<tr>";
                    str+="<td class='explnRightSide'>";
                    str+="<p>Consider the rectangle ABCD.</p>";
                    str+="<p>This rectangle is symmetric about the X-axis. Therefore, the centroid can be taken as the midpoint of the base.</p>";
                    str+="The centroid for the rectangle is <b>"+c1+"</b>";
                    str+="<p>The area of the rectangle is:<br />A<sub>1</sub>=("+x1+"-"+start+")*"+fuzzyWash[i].fuzzyVal+"=<b>"+a1+"</b></p>";
                    str+="<h4>The area of the rectangle is "+a1+" and centroid is "+c1+".</h4>";
                    str+="</td>";
                    str+="<td class='explnLeftSide'>";
                    str+="<p>Consider the triangle DCE.</p>";
                    str+="<p>This is a right angled triangle. Therefore, the X-co-ordinate of the centroid can be taken as the 1/3<sup>rd</sup> from the perpendicular.</p>";
                    str+="The centroid for the triangle is <b>"+c2+"</b>";
                    str+="<p>The area of the triangle is:<br />A<sub>2</sub>=0.5*("+end+"-"+x1+")*"+fuzzyWash[i].fuzzyVal+"=<b>"+a2+"</b></p>";
                    str+="<h4>The area of the triangle is "+a2+" and centroid is "+c2+".</h4>";
                    str+="</td>";
                    str+="</tr>";
                    str+="</table>";
                    str+="<p>Finally we calculate the centroid with the formula:</p>";
                    str+="<table class='formula'>";
                    str+="<tr>";
                    str+="<td rowspan=2>C</td>";
                    str+="<td rowspan=2 class='equalSign'>=</td>";
                    str+="<td class='numerator'>";
                    str+="A<sub>1</sub>C<sub>1</sub>+A<sub>2</sub>C<sub>2</sub>";
                    str+="</td>";
                    str+="<td rowspan=2 class='equalSign'>=</td>";
                    str+="<td class='numerator'>";
                    str+="("+a1+"*"+c1+")+("+a2+"*"+c2+")";
                    str+="</td>";
                    str+="<td rowspan=2 class='equalSign'>=</td>";
                    str+="<td rowspan=2><b>"+C[i]+"</b></td>";
                    str+="</tr>";
                    str+="<tr>";
                    str+="<td class='denominator'>";
                    str+="A<sub>1</sub>+A<sub>2</sub>";
                    str+="</td>";
                    str+="<td class='denominator'>";
                    str+="("+a1+")+("+a2+")";
                    str+="</td>";
                    str+="</tr>";
                    str+="</table>";
                    str+="<p>The area is simple sum of the rectangle and triangle areas.</p>";
                    str+="<h3>Thus, the area for this descriptor is "+A[i]+" and the centroid as calculated is "+C[i]+".</h3>";
                }

            }
            else if (i==fuzzyWash.length-1) {
              str="";
              pc1.setAttribute({name:'A',size:1,visible:true});
              pc4.setAttribute({name:'D',size:1,visible:true});
              p3=board_washing.create('point',[end,fuzzyWash[i].fuzzyVal],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
              pc3=currBoard.create('point',[end,fuzzyWash[i].fuzzyVal],{fixed:true,name:'C',size:1});
              if(fuzzyWash[i].fuzzyVal==1)
              {
                  A[i]=Number(parseFloat(0.5*(end-start)).toFixed(3));
                  C[i]=Number(parseFloat(end-(end-start)/3).toFixed(3));
                  var pol = board_washing.create('polygon', [p1, p3, p4],{withLines:showLines});
                  var polc = currBoard.create('polygon', [pc1, pc3, pc4],{withLines:showLines});
                  str+="<p>The above figure is a right angled triangle. Here we are only concerned with the X-co-ordinate of the centroid. The centroid for the right angled triangle is at a distance of 1/3<sup>rd</sup> of the base from the perpendicular.</p>";
                  str+="The centroid comes out to be <b>"+C[i]+"</b><br />";
                  str+="The area of the triangle can be calculated as <br />A=0.5*("+end+"-"+start+")*"+fuzzyWash[i].fuzzyVal+"="+A[i];
                  str+="<h3>The area of this desciptor is "+A[i]+" and the centroid is at "+C[i]+".</h3>";
              }
              else
              {
                  str+="<p>The above figure does look like a trapezium. So the area calculation is very straight-forward. But since the figure is assymetric about the X-axis, the centroid calculation is not. We therefore take two parts and then calculate the centroid.</p>";
                  x1=Number(parseFloat(start+fuzzyWash[i].fuzzyVal*(end-start)).toFixed(3));
                  p2=board_washing.create('point',[x1,fuzzyWash[i].fuzzyVal],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
                  pc2=currBoard.create('point',[x1,fuzzyWash[i].fuzzyVal],{fixed:true,name:'B',size:1});
                  //Centroid and area of rectangle
                  var a1=Number(parseFloat((end-x1)*fuzzyWash[i].fuzzyVal).toFixed(3));
                  var c1=Number(parseFloat((x1+end)/2).toFixed(3));
                  //Centroid and area of triangle
                  var a2=Number(parseFloat(0.5*(x1-start)*fuzzyWash[i].fuzzyVal).toFixed(3));
                  var c2=Number(parseFloat(x1-(x1-start)/3).toFixed(3));
                  A[i]=Number(parseFloat(a1+a2).toFixed(3));
                  C[i]=Number(parseFloat((a1*c1+a2*c2)/(a1+a2)).toFixed(3));
                  var pol = board_washing.create('polygon', [p1, p2, p3, p4],{withLines:showLines});
                  var polc = currBoard.create('polygon', [pc1, pc2, pc3, pc4],{withLines:showLines});
                  var temp_point=currBoard.create('point',[x1,0],{fixed:true,name:'E',size:1});
                  var temp_line=currBoard.create('line',[temp_point,pc2],{fixed:true,dash:1,straightFirst:false,straightLast:false});
                  str+="<table>";
                  str+="<tr>";
                  str+="<td class='explnRightSide'>";
                  str+="<p>Consider the triangle ABE.</p>";
                  str+="<p>This is a right angled triangle. Therefore, the X-co-ordinate of the centroid can be taken as the 1/3<sup>rd</sup> from the perpendicular.</p>";
                  str+="The centroid for the triangle is <b>"+c2+"</b>";
                  str+="<p>The area of the triangle is:<br />A<sub>2</sub>=0.5*("+x1+"-"+start+")*"+fuzzyWash[i].fuzzyVal+"=<b>"+a2+"</b></p>";
                  str+="<h4>The area of the triangle is "+a2+" and centroid is "+c2+".</h4>";
                  str+="</td>";
                  str+="<td class='explnLeftSide'>";
                  str+="<p>Consider the rectangle BCDE.</p>";
                  str+="<p>This rectangle is symmetric about the X-axis. Therefore, the centroid can be taken as the midpoint of the base.</p>";
                  str+="The centroid for the rectangle is <b>"+c1+"</b>";
                  str+="<p>The area of the rectangle is:<br />A<sub>1</sub>=("+end+"-"+x1+")*"+fuzzyWash[i].fuzzyVal+"=<b>"+a1+"</b></p>";
                  str+="<h4>The area of the rectangle is "+a1+" and centroid is "+c1+".</h4>";
                  str+="</td>";
                  str+="</tr>";
                  str+="</table>";
                  str+="<p>Finally we calculate the centroid with the formula:</p>";
                  str+="<table class='formula'>";
                  str+="<tr>";
                  str+="<td rowspan=2>C</td>";
                  str+="<td rowspan=2 class='equalSign'>=</td>";
                  str+="<td class='numerator'>";
                  str+="A<sub>1</sub>C<sub>1</sub>+A<sub>2</sub>C<sub>2</sub>";
                  str+="</td>";
                  str+="<td rowspan=2 class='equalSign'>=</td>";
                  str+="<td class='numerator'>";
                  str+="("+a2+"*"+c2+")+("+a1+"*"+c1+")";
                  str+="</td>";
                  str+="<td rowspan=2 class='equalSign'>=</td>";
                  str+="<td rowspan=2><b>"+C[i]+"</b></td>";
                  str+="</tr>";
                  str+="<tr>";
                  str+="<td class='denominator'>";
                  str+="A<sub>1</sub>+A<sub>2</sub>";
                  str+="</td>";
                  str+="<td class='denominator'>";
                  str+="("+a2+")+("+a1+")";
                  str+="</td>";
                  str+="</tr>";
                  str+="</table>";
                  str+="<p>The area is simple sum of the rectangle and triangle areas.</p>";
                  str+="<h3>Thus, the area for this descriptor is "+A[i]+" and the centroid as calculated is "+C[i]+".</h3>";
              }
            }
            else {
                var str="<p>The figure above is symmetric with respect to the X-axis. Hence we can take the midpoint of the start and end of the descriptor as the centroid.</p>";
                C[i]=Number(parseFloat((start+end)/2).toFixed(3));
                str+="The Centroid of the above shaded region is <b>"+C[i]+"</b>.";
                if(fuzzyWash[i].fuzzyVal==1)
                {
                    A[i]=Number(parseFloat(0.5*(end-start)).toFixed(3));
                    str+="<p>The figure is a triangle. The area can be calculated as <br />A=0.5*("+end+"-"+start+")*"+fuzzyWash[i].fuzzyVal+"=<b>"+A[i]+"</b></p>";
                    p2=board_washing.create('point',[C[i],fuzzyWash[i].fuzzyVal],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
                    pc2=currBoard.create('point',[C[i],fuzzyWash[i].fuzzyVal],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
                    var pol = board_washing.create('polygon', [p1, p2, p4],{withLines:showLines});
                    var polc = currBoard.create('polygon', [pc1, pc2, pc4],{withLines:showLines});
                }
                else
                {
                    var mid=Number(parseFloat((start+end)/2).toFixed(3));
                    x1=Number(parseFloat(start+Number(parseFloat(fuzzyWash[i].fuzzyVal*(mid-start)).toFixed(3))).toFixed(3));
                    p2=board_washing.create('point',[x1,fuzzyWash[i].fuzzyVal],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
                    pc2=currBoard.create('point',[x1,fuzzyWash[i].fuzzyVal],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
                    x2=Number(parseFloat(end-Number(parseFloat(fuzzyWash[i].fuzzyVal*(end-mid)).toFixed(3))).toFixed(3));
                    p3=board_washing.create('point',[x2,fuzzyWash[i].fuzzyVal],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
                    pc3=currBoard.create('point',[x2,fuzzyWash[i].fuzzyVal],{fixed:true,name:'',size:fixedSize,visible:shouldPointsBeSeen});
                    var a=Number(parseFloat(x2-x1).toFixed(3));
                    var b=Number(parseFloat(end-start).toFixed(3));
                    A[i]=Number(parseFloat((a+b)*0.5*fuzzyWash[i].fuzzyVal).toFixed(3));
                    str+="<p>The figure is a trapezium. The area can be calculated as <br />A=0.5*(("+end+"-"+start+")+("+x2+"-"+x1+"))*"+fuzzyWash[i].fuzzyVal+"=<b>"+A[i]+"</b></p>";
                    var pol = board_washing.create('polygon', [p1, p2, p3, p4],{withLines:showLines});
                    var polc = currBoard.create('polygon', [pc1, pc2, pc3, pc4],{withLines:showLines});
                    str+="<h3>Area of the shaded figure is "+A[i]+" and centroid of this region is "+C[i]+".</h3>"
                }
            }
            var ptName="C"+(i+1);
            var pt=board_washing.create('point',[C[i],0],{fixed:true,name:ptName,face:'^'});
            var ptc=currBoard.create('point',[C[i],0],{fixed:true,name:ptName,face:'^'});
        }
        else {
          var str="<p>The fuzzy component for this descriptor is zero. Hence the area and centroid is zero.</p><h3>The area and centroid of this desciptor is 0</h3>";
        }
        document.getElementById('ExplnPart'+i).innerHTML=str;
        $(".carousel-inner").css("height","auto");
        document.getElementById("proceed").removeAttribute('disabled');
        // console.log("Area:"+A[i]+" Centroid:"+C[i]);  Debugging purposes.
    }
    var num=0;
    var den=0;
    for (var i = 0; i < A.length; i++) {
        num+=Number(parseFloat(A[i]*C[i]).toFixed(3));
        den+=A[i];
    }
    var washTime=Number(parseFloat(num/den).toFixed(3));
    //Real calculations are finished here. Below is the display part.
    var numCalc="";
    var finalCalc="";
    finalCalc="<h3><table class='formula'>";
    finalCalc+="<tr>";
    finalCalc+="<td rowspan=2>Final Centroid</td>";
    finalCalc+="<td rowspan=2 class='equalSign'>=</td>";
    finalCalc+="<td class='numerator'>";
    for (var i = 0; i < wash_descriptors.length; i++) {
      finalCalc+="A<sub>"+wash_descriptors[i].name+"</sub>C<sub>"+wash_descriptors[i].name+"</sub>";
      numCalc+="("+A[i]+"*"+C[i]+")";
      if(i!=wash_descriptors.length-1)
      {
        finalCalc+="+";
        numCalc+="+";
      }
    }
    finalCalc+="</td>";
    finalCalc+="<td rowspan=2 class='equalSign'>=</td>";
    finalCalc+="<td class='numerator'>"+numCalc+"</td>";
    finalCalc+="<td rowspan=2 class='equalSign'>=</td>";
    finalCalc+="<td class='numerator'>"+num+"</td>";
    finalCalc+="<td rowspan=2 class='equalSign'>=</td>";
    finalCalc+="<td rowspan=2 class='equalSign'><b>"+washTime+"</b></td>";
    finalCalc+="</tr>";
    var numCalc="";
    finalCalc+="<tr>";
    finalCalc+="<td class='denominator'>";
    for (var i = 0; i < wash_descriptors.length; i++) {
      finalCalc+="A<sub>"+wash_descriptors[i].name+"</sub>";
      numCalc+=A[i];
      if(i!=wash_descriptors.length-1)
      {
        finalCalc+="+";
        numCalc+="+";
      }
    }
    finalCalc+="</td>";
    finalCalc+="<td class='denominator'>"+numCalc+"</td>";
    finalCalc+="<td class='denominator'>"+den+"</td>";
    finalCalc+="</tr>";
    finalCalc+="</table></h3>";
    $('#Final_calculation').fadeIn(1500);
    document.getElementById('Final_calculation').innerHTML=finalCalc;
    var finalRes="";
    finalRes+="<h3>The final washing time required for the clothes is "+washTime+" minutes. Happy Washing!</h3>";
    $('#Final_result').fadeIn(1700);
    document.getElementById('Final_result').innerHTML=finalRes;
}

function back(){
    $('#trial_div').fadeOut(1200);
    $('#matrix_div').fadeIn(1200);
    $("#title").html("Step 2: Deciding the wash time...");
}

function check_vals(elem){
    var x = elem.value; 
    if(x>100) x=100; 
    if(x<0) x=0; 
    elem.value=x;
}