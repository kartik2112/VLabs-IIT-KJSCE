var n_descriptor_grease = 3;    //To keep track for new id assignment
var n_descriptor_dirt = 3, n_descriptor_wash = 3;
var dirt_descriptor_ids = [1,2,3], grease_descriptor_ids = [1,2,3], wash_descriptor_ids = [1,2,3];  //To keep track of ids of each descriptor
var dirt_descriptors = [{'id':1, 'name':"Low", 'start': 999, 'end': 33},
                          {'id':2, 'name':"Medium", 'start': 33, 'end': 66},
                          {'id':3, 'name':"High", 'start': 66, 'end': 100}];

var grease_descriptors = [{'id':1, 'name':"Low", 'start': 999, 'end': 33},
                          {'id':2, 'name':"Medium", 'start': 33, 'end': 66},
                          {'id':3, 'name':"High", 'start': 66, 'end': 100}];
var wash_descriptors = [{'id':1, 'name':"Low", 'start': 999, 'end': 40},
                          {'id':2, 'name':"Medium", 'start': 40, 'end': 80},
                          {'id':3, 'name':"High", 'start': 80, 'end': 120}];
var grease_lines_up=[],grease_lines_down=[];
var dirt_lines_up=[],dirt_lines_down=[];
var washing_lines_up=[],washing_lines_down=[];
var board;
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
        m=parseInt((grease_descriptors[grease_descriptors.length-1].start+100)/2);

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
        n_descriptor_dirt++;
        m=parseInt((dirt_descriptors[dirt_descriptors.length-1].start+100)/2);
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
        n_descriptor_wash++;
        m=parseInt((wash_descriptors[wash_descriptors.length-1].start+120)/2);
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
    $("#title").html("Step 2: Deciding the wash time...");
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
        table();
    },1000);
}


function edit_descr(){
    $("#matrix_div").fadeOut(1200);
    $("#descriptor_div").fadeIn(1200);
    $('#title').html("Step 1: Describe our inputs and outputs");
}

var inference_table = [];
function proceed(){
    inference_table = [];
    for(var i=0;i<grease_descriptors.length;i++){
        var inference_row = [];
        for(var j=0;j<dirt_descriptors.length;j++){
            var x = document.getElementById('sel'+j+i);
            inference_row.push(x.value);
        }
        inference_table.push(inference_row);
    }
}