var n_descriptor_qty = 3;
var n_descriptor_dirt = 3;

function add_descriptor(who){
    // Add a descriptor for Quantity.
    if(who==1){
        n_descriptor_qty++;
        var html_content_to_be_added = '<div class="descr" id="q_d_'+n_descriptor_qty+'"><input type="number" max="100" min="0" value="0"/><input type="text" placeholder="Name of descriptor"/><input type="number" max="100" min="0" value="100"/><button id="q'+n_descriptor_qty+'" onclick="rem_descriptor(\'q\','+n_descriptor_qty+');"><b>-</b></button></div>';
        document.getElementById('descrs_1').innerHTML += html_content_to_be_added;
    }
    // Add a descriptor for Dirt
    else if(who==2){
        n_descriptor_dirt++;
        var html_content_to_be_added = '<div class="descr" id="d_d_'+n_descriptor_dirt+'"><input type="number" max="100" min="0" value="0"/><input type="text" placeholder="Name of descriptor" value="High"/><input type="number" max="100" min="0" value="100"/><button id="d'+n_descriptor_dirt+'" onclick="rem_descriptor(\'d\','+n_descriptor_dirt+');"><b>-</b></button>\</div>';
        document.getElementById('descrs_2').innerHTML += html_content_to_be_added;
    }
}

function rem_descriptor(who,which){
    if(who=='q'){
        var parent = document.getElementById('descrs_1')
        var elem = document.getElementById('q_d_'+which);
        parent.removeChild(elem);
    }
    else if(who == 'd'){
        var parent = document.getElementById('descrs_2')
        var elem = document.getElementById('d_d_'+which);
        parent.removeChild(elem);
    }
}