<div class="wrapper theme-1-active pimary-color-red">
        <div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">boxes</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?= base_url('dashboard');?>">Dashboard</a></li>
						<li class="active"><span>boxes</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
	
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Companies</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="company_stb" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Company</th>
														<th>Total Box(s)</th>
														<th></th>
													</tr>
												</thead>
                                               
                                                <tfoot>
												<tr>
														<th>Company</th>
														<th>Total Box(s)</th>
														<th></th>
													</tr>
												</tfoot>
                                                
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>

				 <!-- jQuery -->

<script>

$(document).ready(function() {
	
	var table= $('#company_stb').DataTable( {
		 "processing": true,
		 "serverSide": true,
		 "ajax": {
				 "url": "company_stb_datatables",
				 "type": "POST"
		 },
 "columnDefs": [ 
				 { "searchable": false, "targets": 1 },
				 { "searchable": false, "targets": 2 },
		{
			"data":"ID",
							"render": function ( data, type, row ) {
								 return "<form action='"+"<?=base_url('operator/stbox')?>"+"' method='POST'><button type='submit'><input type='HIDDEN' name='COMP_ID' value='"+data+"'/><i class='fa fa-pencil text-inverse m-r-10'></i></button></form>"
						 },
						 "targets": 2
				 }
	 ],
		 // 
 "columns": [
				 { "data": "COMPANY" }, 
	 { "data": "TOTAL_BOX" }
				 //{ "defaultContent": "<form action='broadcaster_channel_list_datatable' method='POST'><button type='submit' name='MSO_ID'><i class='fa fa-pencil text-inverse m-r-10'></i></button></form>" }
	 
		 ]
 } );
} );
</script>
