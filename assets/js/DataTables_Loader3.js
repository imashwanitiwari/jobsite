/* 
 * Copyright © Technopits. All rights Reserved.
 * Project Name: Digital Cable Networks CMS
 * Project Url: http://www.dcnonline.in
 * Project Developer: Rohit Hazra [rohithzr@live.com]
 * Project Theme: Dandelion Admin Template [Simple License]
 */


$(document).ready(function() {

    //tfoot input create
    $('#boxes tfoot th').each(function() {
        var title = $('#boxes thead th').eq($(this).index()).text();
        $(this).html('<input class="span12" type="text" placeholder="Search ' + title + '" />');
    });

    //datatable initialisation
    var cust = $('#boxes').DataTable({
        "processing": true,
        "serverSide": true,
        "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
        "ajax": "functions/get_boxes.php?url=../box_stock.php",
        "paginationType": "full_numbers",
        "dom": '<"pad5"CT><"clear"><lf<"clear">r<t>ip>',
        tableTools: {
            "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
            "processing": "<img src='assets/images/loaders/loader27.gif' class='loader'>"
        }
    });

    //tfooter search
    cust.columns().eq(0).each(function(colIdx) {
        $('input', cust.column(colIdx).footer()).on('keyup change', function() {
            cust
                    .column(colIdx)
                    .search(this.value)
                    .draw();
        });
    });
});