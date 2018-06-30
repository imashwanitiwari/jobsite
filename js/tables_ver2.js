$(document).ready( function () {

 
    var table=$('#customer').DataTable(

{
      "processing": true,
      "serverSide": true,

      "ajax":
       {
          
        "url":"customers/show_customers",
         "type":"post"
      },
      "columnDefs": [ 
			 {
				"data":"ID",
                 "render": function ( data, type, row ) {
                    return "<?php echo site_url()?>";
                },
                "targets": 2
            }
			],
        
      "columns": [
        { "data": "SUBSCRIPTION_NO" },
        { "data": "FIRST_NAME" },
        { "data": "LAST_NAME" },
        { "data": "AREA_NAME" },
        { "data": "VC_NO" },
        { "data": "BOX_SUB_ID" },
        { "data": "CLOSING_DATE" },
        { "data": "STATUS" },
        { "data": "AMOUNT" },
        { "data": "SUBSCRIPTION_NO" ,"searchable":false ,"render": function ( data, type, row ) {
            return ' <div class="dropdown"><button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tools <span class="caret"></span></button><ul class="dropdown-menu" role="menu" aria-labelledby="menu1"><li role="presentation"><a role="menuitem" tabindex="-1"><button data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="border:none;background:none">Pay</button></a></li><li role="presentation"><a role="menuitem" tabindex="-1"><form action="customers/view_details" method="POST"><input type="hidden" name="CUSTOMER_ID" value="'+row.ID+'"><button style="border:none;background:none">View Details</button></form></a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit Details</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">Split Details</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">Add Boxes</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">Add Complaint</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li></ul></div></div>';
     }}
        
                ]
}
        
    );
    $('#customer tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $.ajax({
            url:"customers/payments_ajax_hendler",
            type:"POST",
            dataType:"json",
            data:{"table":"payments","where":"SUBSCRIBER_ID="+data['ID'],"feild":"sum(AMOUNT) as TOPAY","area":data['AREA_ID']},
            success:function(response)
            {
               // JSON.parse(response)
               // alert(response["PRE"]);
               $("#TO_PAY").val(response['TOPAY']);
               $("#PRE_BALANCE").val(response['PRE']);
               $("#PAYING").val(response['TOPAY']);
            }
        });
        $("#CURTOMER_NAME").val(data['FIRST_NAME']+" "+data['LAST_NAME']);
        $("#SUBSCRIBER_ID").val(data['ID']);        
    } );

    //post balance count
    $("#PAYING").focusout(function(){
        var paying = Number($("#PAYING").val());
        var to_pay = Number($("#TO_PAY").val());
        var post_balance = to_pay-paying;
        $("#POST_BALANCE").val(post_balance);
    });

    //change subscriber
    $("#SUBSCRIBER_BTN").click(function(){
        if($("#SUBSCRIBER_INP").val()!='')
        {
            var subscriber_id=$("#SUBSCRIBER_INP").val();
        $.ajax({
            url:"customers/switch_subcriber_ajax_hendler",
            type:"POST",
            dataType:"json",
            data:{"table":"payments","SUBSCRIBER":subscriber_id,"feild":"sum(AMOUNT) as TOPAY"},
            success:function(response)
            {
                $("#TO_PAY").val(response['TOPAY']);
               $("#PRE_BALANCE").val(response['PRE']);
               $("#PAYING").val(response['TOPAY']);
               $("#POST_BALANCE").val("0");
               $("#REMARK").val("");
               $("#CURTOMER_NAME").val(response['NAME']);
               $("#SUBSCRIBER_ID").val(response['ID']); 
            }

        });
    }
    });

    //MAKE PAYMENT
    $("#PAY").click(function(){
        swal({
            title: "Are you sure?",
            text: "To Make this Payment",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: "Yes, Make it!",
            closeOnConfirm: false
          },
          function(){
        $.ajax({
            url:"customers/make_payment_ajax_hendler",
            type:"POST",
            dataType:"json",
            data:{"SUBSCRIBER_ID":$("#SUBSCRIBER_ID").val(),"TYPE":$("#FOR").val(),"AMOUNT":$("#PAYING").val(),"PAYMENT_MODE":$("#PAY_MODE").val(),"DATE_TIME":$("#ACTIVATION_DATE").val(),"REMARK":$("#REMARK").val(),"INVOICE_NO":"1","STAFF_ID":"1"},
            success:function(response)
            {
                swal("Well Done", "This Payment has been Maked successfully ", "success");  
                $("#TO_PAY").val(response['TOPAY']);
                $("#PRE_BALANCE").val(response['PRE']);
                $("#PAYING").val(response['TOPAY']);
                $("#POST_BALANCE").val("0");
                $("#REMARK").val("");
                $("#CURTOMER_NAME").val(response['NAME']);
                $("#SUBSCRIBER_ID").val(response['ID']); 
            }
        });
    });
    });



    $('#packk').DataTable(

        {
            
        
              "ajax":
               {
                "url":"packages/package_list",
                "type":"post"
               
              },
        
              "columns": [
                
                { "data": "NAME" },
                { "data": "PACK_TYPE" },
                { "data": "FIRM_NAME" },
                { "data": "CREATED_BY"},
                { "data": "SERVICE_TYPE" },
                { "data": "MRP" },
                { "data": null},
                { "data" :"ID"},  
                { "data": "ID" },
                { "data": "PACK_ID" }
                        ],

                        columnDefs : [
                            { targets : [3],
                              render : function (data, type, row) {
                                 return data == '1' ? 'MSO' : 'ME'
                              }
                            },
                            { targets : [4],
                                render : function (data, type, row) {
                                    switch(data) {
                                        case '1' : return 'Cable TV'; break;
                                        case '2' : return 'Internet'; break;
                                        case '3' : return 'Phone'; break;
                                        default  : return 'N/A';
                                     }
                                }
                                
                              },
                              { targets : [7],
                                render : function (data, type, row,meta) {
                                   return '<form action="packages/add_pack_channel" method="POST"><input type="text" name="MSO_ID" value="'+row.ID +'"><input type="text" name="PACK_ID" value="'+ row.PACK_ID+'"><button type="submit">ADD CHANNELS</button></form>'
                                }
                              },

                              {targets:[8,9],visible:false}
                       ]       
        }
                
            );

            $('#areaa').DataTable(

                {
                    
                
                      "ajax":
                       {
                        "url":"add_area/area_list",
                        "type":"post"
                       
                      },
                
                      "columns": [
                        { "data": "NAME" },
                        { "data": "TOTAL_HOUSES" },
                        { "data": "REMARK" },
                        
                        
                                ]
        
                                
                }
                        
                    );

                    $('#stafff').DataTable(

                        {
                            
                        
                              "ajax":
                               {
                                "url":"http://localhost/newdcntv.in/operator/addStaff/show_staff_list",
                                "type":"post"
                               
                              },
                        
                              "columns": [
                                { "data": "F_NAME" },
                                { "data": "L_NAME" },
                                { "data": "ADDRESS" },
                                { "data": "EMAIL" },
                                { "data": "USER_NAME" },
                                { "data": "STAFF_TYPE" },
                                { "data": "JOINING_DATE" },
                                
                                        ]
                                              
                
                                        
                        }
                                
                            );

} );
