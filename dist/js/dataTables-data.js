/*DataTable Init*/

"use strict"; 

$(document).ready(function(){  
      $('#datable').DataTable();  
 });  
 
// $(document).ready(function() {
	// "use strict";
	
	// $('#datable_1').DataTable();
    // $('#datable_2').DataTable({ "lengthChange": false});
// });


// /company stb data tables
    // $(document).ready(function() {
    // $('#_datatable').DataTable();
// });


$(document).ready(function() {
	
     var table= $('#_datatable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "datatables",
            "type": "POST"
        },
		"columnDefs": [ 
            { "searchable": false, "targets": 1 },
            { "searchable": false, "targets": 2 }
			],
        // 
		"columns": [
            { "data": "COMPANY" }, 
			{ "data": "TOTAL_BOX" },
            { "defaultContent": "<form action='stb_details' method='POST'><button type='submit' name='ID'><i class='fa fa-pencil text-inverse m-r-10'></i></button></form>" }
			
        ]
    } );
	 $('#_datatable tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $val=$(this).val(data['ID']);
    } );
} );




$(document).ready(function() {
	
     var table= $('#broadcaster_channel_list_datatable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "datatables",
            "type": "POST"
        },
		"columnDefs": [ 
            { "searchable": false, "targets": 1 },
            { "searchable": false, "targets": 2 }				
			],
        // 
		"columns": [
            { "data": "BROADCASTER" }, 
			{ "data": "TOTAL_CHANNEL" },
            { "defaultContent": "<form action='broadcaster_channel_company_list' method='POST'><button type='submit' name='BROADCASTER_ID'><i class='fa fa-pencil text-inverse m-r-10'></i></button></form>" }
			
        ]
    } );
	 $('#broadcaster_channel_list_datatable tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $(this).val(data['ID']);
    } );
} );




$(document).ready(function() {
	
     var table= $('#broadcaster_channel_company_list').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "broadcaster_channel_company_list_datatables",
            "type": "POST"
        },
		"columnDefs": [ 
            { "searchable": false, "targets": 1 },
            { "searchable": false, "targets": 2 }
			],
        // 
		"columns": [
            
            { "data": "NAME" }, 
			{ "data": "RATE" },
            { "defaultContent": "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'><i class='fa fa-pencil text-inverse m-r-10'></i></button>" }
            
			
        ]
    } );
	 $('#broadcaster_channel_company_list tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $("#CHANNEL_NAME").val(data['NAME']);
        $("#BORADCASTER_RATE").val(data['RATE']);
        $("#BROAD_CHA_ID").val(data['ID']);
    } );
} );



$(document).ready(function() {
	
     var table= $('#mso_channel').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "mso_channel_datatables",
            "type": "POST"
        },
		"columnDefs": [ 
            { "searchable": false, "targets": 1 },
            { "searchable": false, "targets": 2 }
			],
        // 
		"columns": [
            { "data": "MSO" }, 
			{ "data": "CHANNEL" },
            { "defaultContent": "<form action='broadcaster_channel_list_datatable' method='POST'><button type='submit' name='MSO_ID'><i class='fa fa-pencil text-inverse m-r-10'></i></button></form>" }
			
        ]
    } );
	 $('#mso_channel tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $val=$(this).val(data['ID']);
		alert("hello")
    } );
} );



// $(document).ready(function() {
	
     // var table= $('#company_stb').DataTable( {
        // "processing": true,
        // "serverSide": true,
        // "ajax": {
            // "url": "company_stb_datatables",
            // "type": "POST"
        // },
		// "columnDefs": [ 
            // { "searchable": false, "targets": 1 },
            // { "searchable": false, "targets": 2 },
			 // {
				 // "data":"ID",
                 // "render": function ( data, type, row ) {
                    // return "<?php echo site_url()?>";
                // },
                // "targets": 2
            // }
			// ],
        
		// "columns": [
            // { "data": "COMPANY" }, 
			// { "data": "TOTAL_BOX" }
            //{ "defaultContent": "<form action='broadcaster_channel_list_datatable' method='POST'><button type='submit' name='MSO_ID'><i class='fa fa-pencil text-inverse m-r-10'></i></button></form>" }
			
        // ]
    // } );
// } );
