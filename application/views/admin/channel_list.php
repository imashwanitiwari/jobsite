<div class="wrapper theme-1-active pimary-color-red">
        <div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">channel companies</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?= base_url('admin/dashboard')?>">Dashboard</a></li>
						<li><a href="#"><span>channel companies</span></a></li>
						<li class="active"><span>channel(s) list</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
               
               
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
                                     <h6 class="panel-title txt-dark">channel(s) list</h6>
								</div>
                               
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="channel_list" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Channel(s) Name</th>
														<th>Channel Company</th>
														<th>Channel Type</th>
                                                        <th>Channel Category</th>
													</tr>
												</thead>
                                               
                                                <tfoot>
                                                <tr>
														<th>Channel(s) Name</th>
														<th>Channel Company</th>
														<th>Channel Type</th>
                                                        <th>Channel Category</th>
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
                <script src="<?php echo base_url('vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
	
                <script>

                    $(document).ready(function() {
                        
                        var table= $('#channel_list').DataTable( {
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "<?=base_url('admin/add_channel/channel_list_datatables');?>",
                            "type": "POST"
                        },
                        
                        "columns": [
                            { "data": "CHANNEL" }, 
                            { "data": "CHANNEL_COMPANY" },
                            { "data": "CHANNEL_TYPE" },
                            { "data": "CHANNEL_CATEGORY" }
                            
                            
                        ]
                    } );
                    } );



                </script>
				