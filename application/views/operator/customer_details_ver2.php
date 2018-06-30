<!-- Main Content -->
<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark"><?php echo strtoupper($_SESSION['name'])." "."Welcome to View Customer page";?></h5>
						<input type="hidden" name="subscription" id="subscription" value="<?php echo $data[0]['SUBSCRIPTION_NO']?>">
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							<li><a href="#"><span>Cable TV Users</span></a></li>
							<li class="active"><span>Customers list</span></li>
                            <li class="active"><span>Customer Details</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
					</div>
                  <!-- /Title -->
 <div class="container">
    
        <div class="panel-group" >
            <div class="panel panel-default">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1">Customer Details</a>
                                </h4>
                        </div>
                <div id="collapse1" class="panel-collapse collapse in">


                   <div class="panel-body">            
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th>Name</th>
                                <td><?php echo $data[0]['FIRST_NAME']." ".$data[0]['LAST_NAME']?></td>
                                <th>Subscription No.</th>
                                <td><?php echo $data[0]['SUBSCRIPTION_NO']?></td>
                            </tr>
                            <tr>
                                <th>Billing Date</th>
                                <td><?php echo $data[0]['ACTIVATION_DATE']?></td>
                                <th>Secondary Subscription No.</th>
                                <td><?php echo $data[0]['SEC_SUBS_NO']?></td>
                            </tr>

                            <tr>
                                <th>Join Date</th>
                                <td><?php echo $data[0]['ACTIVATION_DATE']?></td>
                                <th>Contact Number</th>
                                <td><?php echo $data[0]['MOBILE']?></td>
                            </tr>

                            <tr>
                                <th>Profession</th>
                                <td><?php echo $data[0]['PROFESSION']?></td>
                                <th>Area</th>
                                <td><?php echo $data[0]['AREA_NAME']?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td colspan="3"><?php echo $data[0]['ADDRESS']?></td>
                            </tr>
                            <tr>
                                <th>Packages</th>
                                <td>
                                <ol>
                                <?php 
                                for($i=0;$i<sizeof($data);$i++)
                                
                                { ?>

                                 <li><?php echo $data[$i]['NAME']?></li>
                                 
                              <?php
                                }
                                
                                
                                
                                ?>
                               </ol> 
                                </td>
                                <th>Total Amount [All Boxes]</th>
                                <td>
                                <?php
                                $sum=0;
                                for($i=0;$i<sizeof($data);$i++){
                                    
                                 $sum+=$data[$i]['AMOUNT'];

                                }
                                echo $sum;
                                ?>
                                
                                </td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>Prepaid</td>
                                <th>Account Status</th>
                                <td></td>
                            </tr>

                            <tr>
                                <th>Suggested Payment Date</th>
                                <td></td>
                            </tr>

                        </table>


                    </div>

                       
                 </div>
           </div>
       </div>

    
    </div>  
    <div class="container">
       <div class="panel-group">
            <div class="panel panel-default">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse2">Box Details</a>
                                </h4>
                        </div>
                <div id="collapse2" class="panel-collapse collapse in">


                   <div class="panel-body">            
                        <table class="table table-bordered table-responsive" id="box_details">
                        <thead>
                            <tr>
                            <th>#VC Number</th>
                            <th>#STB Number</th>
                            <th>Activation Date</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Tools</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>


                    </div>

                       
                 </div>
           </div>
       </div>
       </div>

       <div class="container">
       <div class="panel-group">
            <div class="panel panel-default">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse3"> Payment Card</a>
                                </h4>
                        </div>
                <div id="collapse3" class="panel-collapse collapse in">


                   <div class="panel-body">            
                        <table class="table table-bordered table-responsive">
                            <tr>
                            <th>Months</th>				 				
                            <th>Transaction Time</th>
                            <th>Paid</th>
                            <th>Package</th>
                            <th>Adjusted(adv/disc)</th>
                            <th>Monthly Status</th>
                            <th>Status</th>
                            <th>Receipt#</th>
                            <th>Lineman</th>
                            </tr>

                        </table>


                    </div>

                       
                 </div>
           </div>
       </div>
       </div>
      

      <div class="container">
       <div class="panel-group">
            <div class="panel panel-default">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse4"> MONEY LOADS</a>
                                </h4>
                        </div>
                <div id="collapse4" class="panel-collapse collapse in">


                   <div class="panel-body">            
                        <table id="money_load" class="table table-bordered table-responsive display" >
                         <thead>
                            <tr>
                            <th>Date/Time</th>
                            <th>Amount</th>
                            <th>Mode</th>
                            <th>Received By</th>
                            <th>Status</th>
                            </tr>
                            </thead>
                        </table>


                    </div>

                       
                 </div>
           </div>
       </div>
       </div>
       
       <div class="container">
       <div class="panel-group">
            <div class="panel panel-default">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse8">BILLS</a>
                                </h4>
                        </div>
                <div id="collapse8" class="panel-collapse collapse in">


                   <div class="panel-body">            
                        <table id="invoice" class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                            <th>INVOICE NO</th>
                            <th>Amount</th>
                            <th>Date/Time</th>
                            <th>Tools</th>
                            </tr>
                        </thead>
                        
                        </table>


                    </div>

                       
                 </div>
           </div>
       </div>
       </div>
       <div class="container">
       <div class="panel-group">
            <div class="panel panel-default">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse5"> Package History</a>
                                </h4>
                        </div>
                <div id="collapse5" class="panel-collapse collapse in">


                   <div class="panel-body">            
                        <table class="table table-bordered table-responsive">
                            <tr>
                            <th>Receipt #</th>																		 				
                            <th>Serial No #</th>
                            <th>Payment For</th>
                            <th>Box #</th>
                            <th>Package Amount</th>
                            <th>Discount</th>
                            <th>Net Amount</th>
                            <th>VC #</th>
                            <th> Status</th>
                            <th>Tools</th>
                            </tr>

                        </table>


                    </div>

                       
                 </div>
           </div>
       </div>
       </div>

       <div class="container">
       <div class="panel-group">
            <div class="panel panel-default">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse6"> Transaction Table</a>
                                </h4>
                        </div>
                <div id="collapse6" class="panel-collapse collapse in">


                   <div class="panel-body">            
                        <table class="table table-bordered table-responsive">
                            <tr>

                            <th>Time</th>						
						    <th>Opening Balance</th>
                            <th>Pack</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Closing Balance</th>
                            
                            </tr>

                        </table>


                    </div>

                       
                 </div>
           </div>
       </div>
       </div>
       <div class="container">
       <div class="panel-group">
            <div class="panel panel-default">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse7"> Complaints List</a>
                                </h4>
                        </div>
                <div id="collapse7" class="panel-collapse collapse in">

                   					
                   <div class="panel-body">            
                        <table class="table table-bordered table-responsive">
                            <tr>
                            
                            <th>Complain</th>						
						    <th>Category</th>
                            <th>Registration Date</th>
                            <th>Resolving Date</th>
                            <th>Register by</th>
                            <th>Description	</th>
                            <th>Tools</th>
                            </tr>

                        </table>


                    </div>

                       
                 </div>
           </div>
       </div>
       </div>

       <script>
       $(document).ready(function(){
         var d=new Date();
         $("#invoice").DataTable({
                     "ajax":{
                              "type":"post",
                               "url":"http://localhost/dcntv-app/api/invoice/get_invoice",
                              "data":{"OP_ID":<?php echo json_encode($_SESSION['dcn_id'])?>,"api_key":1234,"START_DATE":"2018-05-30 13:27:43","END_DATE":d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds(),"BY":"SUBSCRIBER_ID","BY_ID":<?php echo $data[0]['ID']?>}
                     },

                     "columns":[
                        { "data": "INVOICE_NO" },
                        { "data": "AMOUNT" },
                        { "data": "DATE" },
                        { "data": null }
                     ],

                     "columnDefs": [ 
          
                        {
                       
                       "render": function ( data, type, row ) {
                          return '<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tools <span class="caret"></span></button><ul class="dropdown-menu" role="menu" aria-labelledby="menu1"><li role="presentation"><a role="menuitem" tabindex="-1"><form action="../accounts/generate_invoice" method="POST"><input type="hidden" name="SUBSCRIBER_ID" value="<?php echo $data[0]['ID']?>"><input type="hidden" name="OP_ID" value="<?php echo json_encode($_SESSION['dcn_id'])?>"><input type="hidden" name="INVOICE_NO" value="'+row.INVOICE_NO+'"><button type="submit" style="border:none;background:none">Invoice</button></form></a></li></ul></div>';
                      },
                      "targets": 3
                  }
                  ]

            }); 


         

         $("#box_details").DataTable({

           "ajax":{
                              "type":"post",
                               "url":"http://localhost/dcntv-app/operator/boxes/subscriber_boxes",
                              "data":{"SUBSCRIBER_ID":<?php echo $data[0]['ID']?>}
                     },

                     "columns":[
                        { "data": "VC_NO" },
                        { "data": "BOX_NO" },
                        { "data": "ACTIVATION_DATE" },
                        { "data": "BOX_TYPE" },
                        { "data": "STATUS" },
                        { "data": null }
                     ],

                     columnDefs : [
                            { targets : [3],
                              render : function (data, type, row) {
                                switch(data) {
                                        case '1' : return 'NON HD'; break;
                                        case '2' : return 'HD'; break;
                                       default  : return 'N/A';
                                     }
                              }
                            },
                            { targets : [4],
                                render : function (data, type, row) {
                                    switch(data) {
                                        case '1' : return 'ACTIVE'; break;
                                        case '0' : return 'INACTIVE'; break;
                                        default  : return 'N/A';
                                     }
                                }
                                
                              },

                             { targets : [5],
                                render : function (data, type, row) {

                             return '<button type="button" class="btn btn-primary">Track</button>';


                                }
 
                             } 
                            ]
    

         });

         $("#money_load").DataTable({

              "ajax":{
                              "type":"post",
                               "url":"http://localhost/dcntv-app/operator/customers/money_load",
                              "data":{"SUBSCRIBER_ID":<?php echo $data[0]['ID']?>}
                     },

                     "columns":[
                        { "data": "DATE" },
                        { "data": "MONEY" },
                        { "data": null,
                            render : function (data, type, row) {
                                return 'cash';
                            }
                        
                         },
                        { "data": "F_NAME" },
                        { "data": null,
                            render : function (data, type, row) {
                                return 'success';
                            } },
                        
                     ],


         });

       });
       
    
       
       </script>