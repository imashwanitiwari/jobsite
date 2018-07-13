<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
		<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<!--<h5 class="txt-dark">Due Customers</h5>-->
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							<li ><span>Cable TV Users</span></li>
							<li class="active"><span>Deleted Customers</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
                <!-- /Title -->
				
				<div class="table-responsive">
					<table class="table table-bordered display" id="deleted_cust" style="width:100%">
						<thead>
							<tr>
								<th>Subs No</th>
								<th>Name</th>
								<th>Address</th>
								<th>Primary VC</th>
								<th>Boxes</th>
								<th>Due Date</th>
								<th>Contact</th>
								<th>Tools</th>
							</tr>
						</thead>
						<tbody></tbody>
						<tfoot>
						<tr>
								<th>Subs No</th>
								<th>Name</th>
								<th>Address</th>
								<th>Primary VC</th>
								<th>Boxes</th>
								<th>Due Date</th>
								<th>Contact</th>
								<th>Tools</th>
							</tr>
						</tfoot>
				
					</table>
				</div>
            
			
			<script>
			$(document).ready(function(){
				
             $("#deleted_cust").DataTable({
				 
				 "ajax":{
										"type":"post",
										"url":"../../api/customers/deleted_customer_list/"+<?php echo $_SESSION['dcn_id']?>,
										"data":{"api_key":"1234"},
						},
						
				"columns": [
                
											{ "data": "SUBSCRIPTION_NO" },
											{ "data": "FIRST_NAME" },
											{ "data": "ADDRESS" },
											{ "data": "VC_NO" },
											{ "data" :"BOX_NO"}, 
											{ "data" :"BILLING_DAY"},
											{ "data": "MOBILE" },
											 { "data": null }
                                          ]		
				 
			 });
				
				
			});
			</script>