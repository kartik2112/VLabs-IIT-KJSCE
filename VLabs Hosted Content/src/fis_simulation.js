var n_descriptor_qty = 3;
var n_descriptor_dirt = 3;

function add_descriptor(who){
    // Add a descriptor for Quantity.
    if(who==1){
        n_descriptor_qty++;
        var html_content_to_be_added = '<div class="descr" id="q_d_'+n_descriptor_qty+'"><input type="number" max="100" min="0" value="0"/><input type="text" placeholder="Name of descriptor"/><input type="number" max="100" min="0" value="100"/><button id="q'+n_descriptor_qty+'"><b>-</b></button></div>';
        document.getElementById('descrs_1').innerHTML += html_content_to_be_added;
    }
}