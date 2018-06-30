/* 
 * Copyright © Technopits. All rights Reserved.
 * Project Name: Digital Cable Networks CMS
 * Project Url: http://www.dcnonline.in
 * Project Developer: Rohit Hazra [rohithzr@live.com]
 * Project Theme: Dandelion Admin Template [Simple License]
 */



function update_base() {
    var packs = document.getElementById('package');
    var packs_opt_value = parseFloat(packs.options[packs.selectedIndex].getAttribute('rel'));
    //  var total_amt = document.getElementById('total_amt');
    var pri_amt = document.getElementById('primary_amt');

    // var ala_amt = document.getElementById('ala_amt');
    // var ala_amt_val = parseFloat(ala_amt.value);
    pri_amt.value = packs_opt_value;
}

function ala_update(sing) {
    var num_ch = document.getElementById('num_ch');
    var ala_amt = document.getElementById('ala_amt');
    var ala_amt_2 = document.getElementById('ala_amt_2');
    var chan = document.getElementById(sing);
    var amt = parseFloat(chan.getAttribute('rel'));

    if (chan.checked == true) {
        ala_amt_2.value = ala_amt.value = parseFloat(ala_amt.value) + amt;
        num_ch.value = parseFloat(num_ch.value) + 1;

    } else if (chan.checked == false) {
        ala_amt_2.value = ala_amt.value = parseFloat(ala_amt.value) - amt;
        num_ch.value = parseFloat(num_ch.value) - 1;
    }
    update_base();
}

$(document).ready(function () {

    var MaxInputs = 100; //maximum input boxes allowed
    var InputsWrapper = $("#addinput"); //Input boxes wrapper ID
    var AddButton = $("#add_but"); //Add button ID

    var x = InputsWrapper.length; //initlal text box count
    var FieldCount = 1; //to keep track of text box added

    $(AddButton).click(function (e)  //on add input button click
    {
        if (x <= MaxInputs) //max input box allowed
        {
            FieldCount++; //text box added increment
            //add input box
            $(InputsWrapper).append(add_dom);
            x++; //text box increment
        }
        return false;
    });

    $("body").on("click", ".removeclass", function (e) { //user click on remove text
        if (x > 1) {
            $(this).parent('div').remove(); //remove text box
            x--; //decrement textbox
        }
        return false;
    })

});