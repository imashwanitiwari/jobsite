<div class="wrapper theme-1-active pimary-color-red">
        <div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark"> TAXES </h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?= base_url('operator/dashboard')?>">Dashboard</a></li>
						<li><a href="#"><span>Taxes</span></a></li>
						<li class="active"><span>Add Tax</span></li>
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
									<h6 class="panel-title txt-dark">Products</h6>
								</div>
                               
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="add_tax_table" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Product / Service </th>
														<th></th>
													</tr>
												</thead>
												
                                                <tfoot>
													<tr>
														<th>Product / Service </th>
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
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
											<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h5 class="modal-title" id="exampleModalLabel1">Add Taxes</h5>
														</div>


														
														<div class="modal-body">
														<!-- //remove inline tag in future -->
														<table id="add_tax_table2" class="table table-hover display" style="width:100%" >
												<thead>
													<tr>
														<th>Tax Name </th>
														<th></th>
													</tr>
												</thead>
													
                                                <tfoot>
													<tr>
														<th>Tax Name </th>
														<th></th>
													</tr>
												</tfoot>
                                                
											</table>		
																
														</div>
                                                   </form>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
                                                   
												</div>
											</div>
										</div>
                        </form>
				
			</div>
			<script src="<?base_url('js/tables.js')?>"></script>