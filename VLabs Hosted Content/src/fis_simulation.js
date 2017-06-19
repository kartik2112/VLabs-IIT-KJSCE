var n_descriptor_grease = 3;    //To keep track for new id assignment
var n_descriptor_dirt = 3;
var dirt_descriptor_ids = [1,2,3], grease_descriptor_ids = [1,2,3];  //To keep track of ids of each descriptor
var dirt_descriptors = [], grease_descriptors = [];

$(".descr input[type='text']").tooltip({title: 'Edit descriptor name'});
$(".descr input[type='number']").tooltip({placement: "right"});
$(".descr button").tooltip({title: 'Remove descriptor', placement: 'right'});
$("#save").tooltip({placement: 'bottom'});

function add_descriptor(who){
    // Add a descriptor for Grease.
    if(who==1){
        document.getElementById('g_add').removeAttribute('onclick');
        if(grease_descriptor_ids.length == 5){
            alert('Maximum limit for descriptors reached!');
            return;
        }
        n_descriptor_grease++;
        var html_content_to_be_added = '<div class="descr" style="display: none;" id="g_d_'+n_descriptor_grease+'"><input type="number" max="100" min="0" value="0"  title="When descriptor\'s membership value begins to rise"/><input type="text" placeholder="Name of descriptor"/><input type="number" max="100" min="0" value="100"  title="When descriptor\'s membership value reaches zero"/><button id="g'+n_descriptor_grease+'" onclick="rem_descriptor(\'g\','+n_descriptor_grease+');"><b>-</b></button></div>';
        document.getElementById('descrs_1').innerHTML += html_content_to_be_added;
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
        var html_content_to_be_added = '<div class="descr" style="display: none;" id="d_d_'+n_descriptor_dirt+'"><input type="number" max="100" min="0" value="0"  title="When descriptor\'s membership value begins to rise"/><input type="text" placeholder="Name of descriptor" value="High"/><input type="number" max="100" min="0" value="100"  title="When descriptor\'s membership value reaches zero"/><button id="d'+n_descriptor_dirt+'" onclick="rem_descriptor(\'d\','+n_descriptor_dirt+');"><b>-</b></button>\</div>';
        document.getElementById('descrs_2').innerHTML += html_content_to_be_added;
        dirt_descriptor_ids.push(n_descriptor_dirt);
        $("#d_d_"+n_descriptor_dirt).fadeIn(700);
        setTimeout(function(){document.getElementById('d_add').setAttribute('onclick','add_descriptor(2);');},700);
        $("#d_no").html(dirt_descriptor_ids.length);
        if(dirt_descriptor_ids.length==5) $("#d_txt").css('color','red');
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
            if(which == n_descriptor_grease) n_descriptor_grease--;
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
            if(which == n_descriptor_dirt) n_descriptor_dirt--;
        },900);
    }
}

function save(){
    for(var i=0;i<grease_descriptor_ids.length;i++){
        var x = document.getElementById('g_d_'+grease_descriptor_ids[i]);
        // Retreive the start value, end value and name of descriptor related HTML elements
        var elems = x.children;
        var s = parseInt(elems[0].value);
        if(i == 0) s = 999; //Because start value of first descriptor is not defined
        var descriptor = {'id': grease_descriptor_ids[i], 'name': elems[1].value, 'start': s, 'end': elems[2].value};
        grease_descriptors.push(descriptor);
        console.log(grease_descriptors[i].name);
    }

    for(var i=0;i<dirt_descriptor_ids.length;i++){
        var x = document.getElementById('d_d_'+dirt_descriptor_ids[i]);
        var elems = x.children;
        var s = parseInt(elems[0].value); //Because start value of first descriptor is not defined
        if(i == 0) s = 999;
        var descriptor = {'id': dirt_descriptor_ids[i], 'name': elems[1].value, 'start': s, 'end': elems[2].value};
        dirt_descriptors.push(descriptor);
    }
}

function hide_instrs(arg){
    console.log(arg);
    $('#instr_div').fadeOut(500);
    if(arg==1){
        setTimeout(function(){
            $("#show_instr").css('visibility','visible');
        },600);
        return;
    }
    setTimeout(function(){
        $("#title").html("Simulation");
        $('#descriptor_div').fadeIn(500);
        $('#hide_instr').html("Hide");
        document.getElementById('hide_instr').setAttribute('onclick','hide_instrs(1);');
    },1000);
}

function show_instrs(){
    $("#instr_div").fadeIn(700);
    $("#show_instr").css('visibility','hidden');
}