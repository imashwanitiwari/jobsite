            <div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">add Box</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?= base_url('dashboard')?>">Dashboard</a></li>
								<li><a href="<?= base_url('operator/stbox/company_stb')?>">Boxes<span></span></a></li>
								<li class="active"><span>add boxes</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					
					</div>
					<!-- /Title -->
					
                        <div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark"><?php echo $CHANNEL[0]['NAME']; ?></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
                                    <!-- <?php if($this->session->flashdata('stbox')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Box Has Been Added Successfully.
									</div>
									<?php endif;?> -->
					

										<div class="row">
											<div class="col-md-12">
												<div class="form-wrap">
													<form action="<?= base_url('operator/stbox');?>" class="form-horizontal" method="post">
                                                    <input type="hidden" name="COMP_ID" VALUE="<?= $CHANNEL[0]['ID'];?>" />
                                                    <input type="hidden" name="OP_MSO_ID" value="<?= $MSO_OP[0]['ID'];?>" />
														<div class="form-body">
															<h6 class="txt-dark capitalize-font"><i class="fa fa-credit-card-alt"> </i> Box's Info</h6>
															<hr class="light-grey-hr"/>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">STB No *</label>
																		<div class="col-md-9">
																			<input type="text" class="form-control" placeholder="STB No." name="BOX_NO"  required>
                                                                            <?php echo form_error('BOX_NO', '<p style="color:red;text-align:left">', '</p>');?>
																		</div>
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">VC No.</label>
																		<div class="col-md-9">
																			<input type="text" class="form-control" name="VC_NO" placeholder="VC No." required />
                                                                            <?php echo form_error('VC_NO', '<p style="color:red;text-align:left">', '</p>');?>
																		</div>
																	</div>
																</div>
																<!--/span-->
                                                            </div>
                                                            <div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">Box Type *</label>
																		<div class="col-md-9">
																			<select class="form-control" required name="BOX_TYPE">
                                                                                <option></option>
                                                                                    <?= option_dif('box_type','ID','BOX_TYPE')?>
                                                                            </select>
																		</div>
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">Warranty Type</label>
																		<div class="col-md-9">
                                                                        <select class="form-control" name="WARRANTY_TYPE" required>
                                                                                <option></option>
                                                                                    <?= option_dif('box_warranty','ID','WARRANTY_TYPE')?>
                                                                        </select>
																		</div>
																	</div>
																</div>
																<!--/span-->
                                                            </div>
														<div class="form-actions mt-10">
															<div class="row">
																<div class="col-md-6">
																	<div class="row">
																		<div class="col-md-offset-3 col-md-9">
																			<button type="submit" class="btn btn-success  mr-10">Submit</button>
																			<button type="button" class="btn btn-default">Cancel</button>
																		</div>
																	</div>
																</div>
																<div class="col-md-6"> </div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
                    </DIV>
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
				 "url": "<?=base_url('operator/stbox/datatables')?>",
				 "type": "POST"
		 },
 "columnDefs": [ 
				//  { "searchable": false, "targets": 1 },
				 { "searchable": false, "targets": 2 },
		{
			"data":"ID",
							"render": function ( data, type, row ) {
								 return "<button type='submit'><input type='HIDDEN' name='COMP_ID' value='"+data+"'/><i class='fa fa-pencil text-inverse m-r-10'></i></button>"
						 },
						 "targets": 2
				 }
	 ],
		 // 
 "columns": [
				 { "data": "BOX_NO" }, 
				 { "data": "VC_NO" }
				 //{ "defaultContent": "<form action='broadcaster_channel_list_datatable' method='POST'><button type='submit' name='MSO_ID'><i class='fa fa-pencil text-inverse m-r-10'></i></button></form>" }
	 
		 ]
 } );
} );
</script>
