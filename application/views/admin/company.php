                    
	<div class="wrapper theme-1-active pimary-color-red">
          <div class="page-wrapper">
				<div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Company</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
						<li><a href="<?= base_url('admin/dashboard')?>">Dashboard</a></li>
						<li><a href="#"><span>Coampany</span></a></li>
						<li class="active"><span>Add Company</span></li>
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
										<h6 class="panel-title txt-dark">Add Comapnay</h6>
									</div>
									<div class="clearfix"></div>
                                    <?php if($this->session->flashdata('add_company')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Company Type Has Been Added Successfully.
									</div>
									<?php endif;?>
					
        
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<?=form_open('admin/company/add')?>
														<div class="form-body">
															
															<h6 class="txt-dark capitalize-font"><i class="fa fa-user"></i> company info</h6>
															<hr class="light-grey-hr"/>
															
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Comapny Name *</label>
																		<input type="text" class="form-control" placeholder="" name="NAME" value="<?= set_value('NAME');?>" maxlength="50" required />
                                                                        <?php echo form_error('NAME', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																
															</div>
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">GSTIN *</label>
																		<input type="text" class="form-control" placeholder="" name="GST" value="<?= set_value('GST');?>" maxlength="15" required />
                                                                        <?php echo form_error('GST', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																
															</div>
														</div>
                                                        	<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Aadhar *</label>
																		<input type="text" class="form-control" placeholder="" name="ADHAR" value="<?= set_value('ADHAR');?>" maxlength="12" required />
                                                                        <?php echo form_error('ADHAR', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																
															</div>
														</div>
														<div class="form-actions mt-10">
															<button type="submit" class="btn btn-success  mr-10"> Save</button>
															<button type="button" class="btn btn-default">Cancel</button>
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
                </div> 
             </div>
           </div>     