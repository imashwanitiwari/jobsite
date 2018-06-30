/* 
 * Copyright © Technopits. All rights Reserved.
 * Project Name: Digital Cable Networks CMS
 * Project Url: http://www.dcnonline.in
 * Project Developer: Rohit Hazra [rohithzr@live.com]
 * Project Theme: Dandelion Admin Template [Simple License]
 */


$(document).ready(function() {
    $('#simple').DataTable({
        "paginationType": "full_numbers",
        "dom": '<"pad5"CT><"clear"><lf<"clear">r<t>ip>',
        tableTools: {
            "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
            "processing": "<img src='assets/images/loaders/loader27.gif' class='loader'>"
        },
        "order": [ 0, 'desc' ],
        lengthMenu: [
        [10, 25, 50, 100, 200, -1],
        [10, 25, 50, 100, 200, "All"]
    ]
    });
});
$(document).ready(function() {
    $('#simple_small').DataTable({
        "paginationType": "full_numbers",
        "dom": '<CT><<t>p>',
        tableTools: {
            "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
        },
        "order": [ 0, 'desc' ],
        lengthMenu: [
        [10, 25, 50, 100, 200, -1],
        [10, 25, 50, 100, 200, "All"]
    ]
    });
});
$(document).ready(function() {
    $('#simple_dup').DataTable({
        "paginationType": "full_numbers",
        "dom": '<"pad5"CT><"clear"><lf<"clear">r<t>ip>',
        tableTools: {
            "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
            "processing": "<img src='assets/images/loaders/loader27.gif' class='loader'>"
        },
        "order": [ 1, 'desc' ],
        lengthMenu: [
        [12, 25, 50, 100, 200, -1],
        [12, 25, 50, 100, 200, "All"]
    ]
    });
});
$(document).ready(function() {
    $('#pay_hist').DataTable({
        "paginationType": "full_numbers",
        "dom": '<"pad5"CT><"clear"><lf<"clear">r<t>ip>',
        tableTools: {
            "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
            "processing": "<img src='assets/images/loaders/loader27.gif' class='loader'>"
        },
        "sort": false,
        lengthMenu: [
        [12, 25, 50, 100, 200, -1],
        [12, 25, 50, 100, 200, "All"]
    ]
    });
});