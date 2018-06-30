<div class="wrapper theme-1-active pimary-color-red">
        <div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">MSO</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?= base_url('admin/dashboard');?>">Dashboard</a></li>
						<li><a href="#"><span>MSO</span></a></li>
						<li class="active"><span>MSO broadcaster channel</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
	<?php if($this->session->flashdata('box_validation_fail')):?>
	<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?= validation_errors()?></strong>
</div><?php endif;?>

<?php if($this->session->flashdata('add_box')):?>
	<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> This Channel has been added successfully.</a>.
</div>
<?php endif;?>
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">mso broadcaster channel</h6>
								</div>
                              
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="broadcaster_channel_company_list" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Channel(s)</th>
														<th>Broadcaster Rate</th>
														<th>Tools</th>
													</tr>
												</thead>
                                               
                        						<tfoot>
												<tr>
														<th>Channel(s)</th>
														<th>Broadcaster Rate</th>
														<th>Tools</th>
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
												<?= form_open('admin/mso/mso_broadcaster_channel');?>
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h5 class="modal-title" id="exampleModalLabel1">Add Channel</h5>
														</div>


														<!-- seting some hidden input -->
														<input type="HIDDEN" name="BROAD_CHA_ID" id="BROAD_CHA_ID"/>
														<input type="HIDDEN" name="MSO_ID" id="MSO_ID" value="<?= $_SESSION['mso_channel']?>"/>
														<div class="modal-body">
															
																<div class="form-group">
																	<label for="recipient-name" class="control-label sm-5">Channel *</label>
																	<input class="form-control" type="text" disabled ID="CHANNEL_NAME" maxlength="30" ID="BOX_NO" required>
																</div>
																<div class="form-group">
																	<label for="message-text" class="control-label sm-5">Broadcaster Rate * <i class="fa fa-inr"></i></label>
																	<input class="form-control required" disabled id="BORADCASTER_RATE" required>
																	
																</div>
																<div class="form-group">
																	<label for="message-text" class="control-label sm-5">MSO Rate *<i class="fa fa-inr"></i> </label>
																	<input class="form-control required" name="RATE" type="text" required>
																	
																</div>
																
														</div>
                                                   </form>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Add</button>
													</div>
                                                   
												</div>
											</div>
										</div>
                        </form>
				
			</div>
			
		</div>
        
        </div>
		
	
	
	