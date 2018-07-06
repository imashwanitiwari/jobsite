var base_url = window.location.pathname;
function add_tax(tax_id,product_id,op_id,task)
    {
        var name = $("#"+tax_id).text();
        var rate = name.split("@");
        var rate = rate[1];
        var rate = rate.split("%");
        var rate = rate[0];
        switch (task) {
            case 1:
                var pre_url = "add_tax";
                var msg = "Added";
                var msg1 = "Add";
                var data = {"api_key":"1234","OP_ID":op_id,"PRODUCT_ID":product_id,"ACCOUNT_ID":tax_id,"RATE":rate,"RATE_TYPE":1}
                var btn_type = "#5cb85c";
                break;
            case 2:
                var pre_url = "remove_tax";
                var msg = "Removed"
                var msg1 = "Remove"
                var data = {"api_key":"1234","OP_ID":op_id,"PRODUCT_ID":product_id,"ACCOUNT_ID":tax_id,"RATE":rate,"RATE_TYPE":1};
                var btn_type = "#d9534f";
                break;
        }
        swal({
            title: "Are you sure?",
            text: "To "+msg1+" "+name+" Tax",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: btn_type,
            confirmButtonText: "Yes, "+msg1+" it!",
            closeOnConfirm: false
          },
          function(){
        $.ajax({
            url:"../../api/invoice/"+pre_url,
            type:"POST",
            dataType:"json",
            data:{"api_key":"1234","OP_ID":op_id,"PRODUCT_ID":product_id,"ACCOUNT_ID":tax_id,"RATE":rate,"RATE_TYPE":1},
            success:function(response)
            {
                if(response.status==1)
                {
                    swal("Added", "This Tax has been "+msg+" successfully ", "success");  
                }
                else
                {
                    swal("Failed", "This Tax did not "+msg+". Please Try again ", "error");  
                }
            }
        });
        // alert("done");
    });
    }
   
$(document).ready( function () {
    
    $('#customer tfoot th').each( function (i) {
        var title = $('#customer thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" data-index="'+i+'" />' );
    } );   

var tablee=$('#customer').DataTable(

{
      "processing": true,
      "serverSide": true,

      "ajax":
       {
          
        "url":"customers/show_customers",
         "type":"post"
      },
     
        
      "columns": [
        { "data": "SUBSCRIPTION_NO" },
        { "data": "NAME" },
        
        { "data": "AREA_NAME" },
        { "data": "VC_NO" },
        { "data": "BOX_SUB_ID",render : function (data, type, row,meta) {

             var view='';
             for(var i=0;i<data;i++){

                view += '<span class="glyphicon glyphicon-hdd fa-1x"></span>'

             }
             return view;
            
        }},
        { "data": "ACTIVATION_DATE" ,
    
        render : function (data, type, row) {
 
              var d=new Date();
              return Number(row.ACTIVATION_DATE)+'-'+(d.getMonth()+1)+'-'+d.getFullYear();

        }
    
    
    
    },
        { "data": "STATUS" ,render : function (data, type, row) {
            switch(data) {
                case '1' : return '<button class="btn btn-xs btn-rounded btn-success" >Running</button>'; break;
                case '0' : return '<button class="btn btn-xs btn-rounded btn-danger" >Stopped</button>'; break;
                default  : return 'N/A';
             }
        }},
        { "data": "AMOUNT" },
        { "data": "SUBSCRIPTION_NO" ,"searchable":false ,"render": function ( data, type, row ) {
            return ' <div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tools <span class="caret"></span></button><ul class="dropdown-menu" role="menu" aria-labelledby="menu1"><li role="presentation"><a role="menuitem" tabindex="-1"><button class="pay" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="border:none;background:none">Pay</button></a></li><li role="presentation"><a role="menuitem" tabindex="-1"><form action="customers/view_details" method="POST"><input type="hidden" name="CUSTOMER_ID" value="'+row.IDD+'"><button style="border:none;background:none">View Details</button></form></a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="./customers/edit_customer?SUBSCRIBER_ID='+row.IDD+'">Edit Details</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">Split Details</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="./customers/add_boxes?SUBS_NO='+row.SUBSCRIPTION_NO+' & NAME='+row.NAME+' & SUBSCRIBER_ID='+row.IDD+' ">Add Boxes</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="./complaints?SUBSCRIBER_ID='+row.IDD+'">Add Complaint</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li></ul></div></div>';
     }}
        
                ]
}
        
    );
   
    $( tablee.table().container() ).on( 'keyup', 'tfoot input', function () {
                        tablee
                            .column( $(this).data('index') )
                            .search( this.value )
                            .draw();
                    } );
   

    
    
    $('#customer tbody').on( 'click', '.pay', function () {
        var data = tablee.row( $(this).parents('tr') ).data();
        $.ajax({
            url:"../api/payment/get_balance",
            type:"POST",
            dataType:"json",
            data:{"api_key":"1234","OP_ID":$("#OP_ID").val(),"SUBSCRIPTION_NO":data['SUBSCRIPTION_NO']},
            success:function(response)
            {
               // JSON.parse(response)
               // alert(response["PRE"]);
               var balance=response['response']['balance'];
               $("#TO_PAY").val(balance);
               if(balance>=0){
                $("#PRE_BALANCE").val('BAL('+balance+')');
               }
               
               else {
                $("#PRE_BALANCE").val('ADV('+(-balance)+')');

               }
               
               $("#PAYING").val(balance);
            }
        });
        $("#CURTOMER_NAME").val(data['FIRST_NAME']+" "+data['LAST_NAME']);
        $("#SUBSCRIBER_ID").val(data['IDD']); 
        $("#ACCOUNT_ID").val(data['ACCOUNT_ID']);
        $("#AREA_ID").val(data['AREA_ID']);       
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
            var subscription_no=$("#SUBSCRIBER_INP").val();
        $.ajax({
            url:"http://localhost/dcntv-app/api/payment/get_balance",
            type:"POST",
            dataType:"json",
            data:{"api_key":"1234","OP_ID":$("#OP_ID").val(),"SUBSCRIPTION_NO":subscription_no},
            success:function(response)
            {
               // JSON.parse(response)
               // alert(response["PRE"]);
               $("#CUSTOMER_NAME").val(response['response']['FIRST_NAME']+' '+response['response']['LAST_NAME']);
               $("#TO_PAY").val(response['response']['balance']);
               $("#PRE_BALANCE").val(response['response']['balance']);
               $("#PAYING").val(response['response']['balance']);
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
            url:"http://localhost/dcntv-app/api/payment/add_money",
            type:"POST",
            dataType:"json",
            data:{"api_key":"1234","OP_ID":$("#OP_ID").val(),"CR_ID":$("#ACCOUNT_ID").val(),"DR_ID":$("#PAY_MODE").val(),"AREA_ID":$("#AREA_ID").val(),"STAFF_ID":$("#STAFF_ID").val(),"PARTICULAR":"PACK ACTIVATION PAYMENT","AMOUNT":$("#PAYING").val(),"REFRENCE":null,"DATE":$("#ACTIVATION_DATE").val()},
            success:function(response)
            {

                /* alert(response['errors']['count']); */
                swal("Well Done", "This Payment has been Made successfully ", "success");  
                /* $("#TO_PAY").val(response['TOPAY']);
                $("#PRE_BALANCE").val(response['PRE']);
                $("#PAYING").val(response['TOPAY']);
                $("#POST_BALANCE").val("0");
                $("#REMARK").val("");
                $("#CURTOMER_NAME").val(response['NAME']);
                $("#SUBSCRIBER_ID").val(response['ID']); */ 
            }
        });
    });
    });


    $('#packk tfoot th').each( function (i) {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" data-index="'+i+'" />' );
    } );  

   var table3= $('#packk').DataTable(

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
                              { targets : [6],
                                render : function (data, type, row,meta) {
                                   return '<form action="packages/add_pack_channel" method="POST"><input type="hidden" name="MSO_ID" value="'+row.ID +'"><input type="hidden" name="PACK_ID" value="'+ row.PACK_ID+'"><button class="button" type="submit">ADD CHANNELS</button></form>'
                                }
                              },

                              {targets:[7],
                                render : function (data, type, row,meta) {
                                    return '<button class="button edit" type="button" data-toggle="modal" data-target="#myModal">EDIT</button>'
                                 }
                            },
                              {targets:[8],visible:false} 
                       ]       
        }
                
            );



            $( table3.table().container() ).on( 'keyup', 'tfoot input', function () {
                table3
                    .column( $(this).data('index') )
                    .search( this.value )
                    .draw();
            } );

           
            $('#packk').on( 'click','.edit', function ()
             {  
                var data = table3.row( $(this).parents('tr') ).data();
                $("#PACK_NAME").val(data['NAME']);
                $("#PACK_AMOUNT").val(data['MRP']);
                $("#PACK_I").val(data['PACK_ID']);
                //alert(data['NAME']+"  "+data['MRP']);
        
 
            });

            $('#areaa').on( 'click','.edit_area', function ()
             {  
                var data = table4.row( $(this).parents('tr') ).data();
                $("#edit_area").val(data['NAME']);
                $("#edit_houses").val(data['TOTAL_HOUSES']);
                $("#edit_remark").val(data['REMARK']);
                $("#AREA_ID").val(data['ID']);
                
        
 
            });

            $('#stafff').on( 'click','.edit_staff', function ()
             {  
                var data = table5.row( $(this).parents('tr') ).data();
                $("#F_NAME").val(data['F_NAME']);
                $("#L_NAME").val(data['L_NAME']);
                $("#ADDRESS").val(data['ADDRESS']);
                $("#EMAIL").val(data['EMAIL']);
                $("#ADHAR").val(data['ADHAR']);
                $("#PAN").val(data['PAN']);
                $("#GST").val(data['GST']);
                $("#USER_NAME").val(data['USER_NAME']);
                $("#STAFF_ID").val(data['STAFF_ID']);
                
                
            });

            $('#areaa tfoot th').each( function (i) {
                var title = $('#example thead th').eq( $(this).index() ).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" data-index="'+i+'" />' );
            } );


          var table4=  $('#areaa').DataTable(

                {
                    
                
                      "ajax":
                       {
                        "url":"./add_area/area_list",
                        "type":"post"
                       
                      },
                
                      "columns": [
                        { "data": "NAME" },
                        { "data": "TOTAL_HOUSES" },
                        { "data": "REMARK" },
                        { "data": "ID" }
                                ],

                        "columnDefs": [ 
    
                            {
                            
                            "render": function ( data, type, row ) {
                                return '<button type="button" class="btn btn-info edit_area" data-toggle="modal" data-target="#area_model">EDIT</button>';
                            },
                            "targets": 3
                        }
                        ]        
        
                                
                }
                        
                    );

                    $( table4.table().container() ).on( 'keyup', 'tfoot input', function () {
                        table4
                            .column( $(this).data('index') )
                            .search( this.value )
                            .draw();
                    } );


                 var table5=$('#stafff').DataTable(

                        {
                            
                        
                              "ajax":
                               {
                                "url":"./show_staff_list",
                                "type":"post"
                               
                              },
                              "columnDefs": [ 
          
                                {
                               "data":"STAFF_ID",
                               "render": function ( data, type, row ) {
                                  return '<button type="button" class="btn btn-info edit_staff" data-toggle="modal" data-target="#staff_model">EDIT</button>';
                              },
                              "targets": 8
                          }
                          ],
                        
                              "columns": [
                                { "data": "F_NAME" },
                                { "data": "L_NAME" },
                                { "data": "ADDRESS" },
                                { "data": "EMAIL" },
                                { "data": "USER_NAME" },
                                { "data": "STAFF_TYPE" },
                                { "data": "AREA_NAME" },
                                { "data": "JOINING_DATE" },
                                
                                
                              ],
                                
                                              
                
                                        
                        }
                                
                            );

               var table= $("#mso_channnels").DataTable({

                    "ajax":
                    {
                     "url":"./mso_channel_list",
                     "type":"post",
                     "data": { ID: $("#MSO_ID").val(),ID2: $("#PACK_ID").val()},
                    
                   },
                   	"columnDefs": [ 
          
			      {
				 "data":"CHA_ID",
                 "render": function ( data, type, row ) {
                    return "<button class='btn btn-success' id="+data+">ADD</button>";
                },
                "targets": 1
            }
			],
                   "columns": [
                    { "data": "CHA_NAME" }
                   
                    
                    
                            ]

          
                });

                     
			
                $('#mso_channnels tbody').on( 'click','button', function () {
                     var data = table.row( $(this).parents('tr') ).data();
                     var CHA_ID=data['CHA_ID']; 
                     
                    
                    $.ajax({type: "POST",
                    url: "./mso_pack_channel_add",
                    data: { TEXT: $(this).text(),PACK_ID:$("#PACK_ID").val(),CHANNEL_ID:CHA_ID,MSO_ID:$("#MSO_ID").val()},
                    
                    success: function(result)
            {
                    if($("#"+CHA_ID).text()=='ADD')
                    {
                    $("#"+CHA_ID).addClass("btn btn-danger").text("REMOVE");    
                    
                   
                }
                  else if ($("#"+CHA_ID).text()=='REMOVE')
                  {
                    $("#"+CHA_ID).removeClass("btn-danger").addClass("btn-success").text("ADD");  
                   
                   
                  }
                 
            },
                error:function(result) {
                    alert('error');
                    }
                });

                } );
               
              
                var table2=$('#channels_in_pack').DataTable({

                
                "ajax":
                {
                 "url":"./channels_in_packs",
                 "type":"post",
                 "data": { PACK_ID:$("#PACK_ID").val(),MSO_ID:$("#MSO_ID").val()},
                
               },
               "columnDefs": [ 
          
                {
               "data":"CHAN_ID",
               "render": function ( data, type, row ) {
                  return "<button class='btn btn-danger' id="+data+">REMOVE</button>";
              },
              "targets": 2
          }
          ],
               "columns": [
                { "data": "PACK" },
                { "data": "CHANNEL" }
                
            
                        ]





            });

            $('#channels_in_pack tbody').on( 'click', 'button', function () {
                var data = table2.row( $(this).parents('tr') ).data();
                var CHA_ID=data['CHAN_ID']; 
                
               
               $.ajax({type: "POST",
               url: "./mso_pack_channel_remove",
               data: { TEXT: $(this).text(),PACK_ID:$("#PACK_ID").val(),CHANNEL_ID:CHA_ID,MSO_ID:$("#MSO_ID").val()},
               
               success: function(result)
       {
              
        
               $("#"+CHA_ID).removeClass("btn-danger").addClass("btn-info").text("REMOVED SUCCESSFULLY")  ;
               $("#"+CHA_ID).off('click');
            
       },
           error:function(result) {
               alert('error');
               }
           });

           } );
                   
           /* $('#complaints').DataTable({

            "ajax":
            {
             "url":"http://localhost/dcntv-app/api/complaint/get_all_complaint",
             "type":"post",
              "data":{OP_ID:"1",api_key:"1234",START_LIMIT:"1",END_LIMIT:"10"}
           },
     
           "columns": [
             
             { "data": "COMP_NO" },
             { "data": "VICTIM_ID" },
             { "data": "ISSUE_ID" },
             { "data": "SUB_ISSUE_ID"},
             { "data": "TITLE" },
             { "data": "PROBLEM" },
             { "data" :"RESOLVE_DATE"},  
             { "data": "RESOLVE_DETAILS" },
             { "data": "PRIORITY" }
                     ]


           });    */ 

          
          var tax_table = $("#add_tax_table").DataTable({
            //"processing": true,
            //"serverSide": true,
      
            "ajax":
             {
                
              "url":"get_products",
               "type":"POST"
            },
           
              
            "columns": [
              { "data": "NAME" },
              {render : function (data, type, row,meta) {
                return "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'><i class='fa fa-pencil text-inverse m-r-10'></i></button>";
               
           },"searchable":false}
            ]
              
          });

          $('#add_tax_table tbody').on( 'click', 'button', function () {
            $("#add_tax_table2 tbody").html("");
            var data = tax_table.row( $(this).parents('tr') ).data();
            var id = data.ID;
            $.ajax({
                "url":"get_taxes/"+id+"/2",
                "type":"POST",
                "dataType":"json",
                "success":function(response){
                    for(i=0;i<=response.data.length;i++)
                    {
                        
                        $("#add_tax_table2 #tbody1").append(
                            "<tr>"
                                +"<td id='"+response.data[i].ID+"'>"+response.data[i].NAME+"</td>"
                                +"<td>"+'<button onclick=add_tax('+response.data[i].ID+','+id+','+response.op_id+',1)>Add</button></td>'
                            +"</tr>"
                            
                        );

                    }
                }
            });
            $.ajax({
                "url":"get_taxes/"+id+"/1",
                "type":"POST",
                "dataType":"json",
                "success":function(response){
                    for(i=0;i<=response.data.length;i++)
                    {
                        
                        $("#add_tax_table2 #tbody2").append(
                            "<tr>"
                                +"<td id='"+response.data[i].ID+"'>"+response.data[i].NAME+"</td>"
                                +"<td>"+'<button onclick=add_tax('+response.data[i].ID+','+id+','+response.op_id+',2)>Remove</button></td>'
                            +"</tr>"
                            
                        );

                    }
                }
            });
          });
          
        //   $("#add_tax_table2").DataTable({
        //     //"processing": true,
        //     //"serverSide": true,
      
        //     "ajax":
        //      {
                
        //       "url":"get_taxes",
        //        "type":"POST"
        //     },
           
              
        //     "columns": [
        //       { "data": "NAME" },
        //       {render : function (data, type, row,meta) {
        //         return "<button type='button'> Add</button>";
               
        //    },"searchable":false}
        //     ]
              
        //   });
 
} );



