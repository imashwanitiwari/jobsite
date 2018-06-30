/* 
 * Copyright © Technopits. All rights Reserved.
 * Project Name: Digital Cable Networks CMS
 * Project Url: http://www.dcnonline.in
 * Project Developer: Rohit Hazra [rohithzr@live.com]
 * Project Theme: Dandelion Admin Template [Simple License]
 */

function ala() {
    $("#ala").dialog("option", {modal: true}).dialog("open");
}

function pay_pop() {
    $("#payment").dialog("option", {modal: true}).dialog("open");
    $("#edit_area").dialog("option", {modal: true}).dialog("open");
    $("#box_stock").dialog("option", {modal: true}).dialog("open");
    
}

function loadIframe(iframeName, url) {
//    alert('loading ' + iframeName + '   ' + url);
    var $iframe = $('#' + iframeName);
    if ($iframe.length) {
        $iframe.attr('src', url);
        pay_pop();
        return false;
    }
    pay_pop();
    return true;
}