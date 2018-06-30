<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
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
							<li><a href="#">Company</a></li>
							<li class="active"><span>Add Company Service</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				<div class="row">
						<div class="col-md-6">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Add Company Service</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_company_service')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Company Service Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('admin/company_service/add_company_service');?>">
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Company</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<select id="mso" class="form-control required" name="COMP_ID" required>
                                                                            <option></option>
																	       <?php option_dif("companies","ID","NAME");?>
																    </select>
																</div>
															</div>
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="CHANNEL TYPE">Service Type</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="mso" class="form-control required" name="SERVICE_ID" required>
                                                                          <option></option>
																	       <?php option_dif("services","ID","NAME");?>
																          </select>
																	</div>  
																</div>	
														</div>
														
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="btn btn-info ">Submit</button>
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
						<div class="col-md-6">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Add Service</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_service')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Service Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('admin/company_service/add_service');?>">
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Service Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" name="NAME" id="exampleInputuname_3" placeholder="Company Name" maxlength="50" VALUE="<?php if($this->session->flashdata('add_service_validation_fail')): echo set_value('NAME'); endif;?>" required>
																	<?php if($this->session->flashdata('add_service_validation_fail')): echo form_error('NAME', '<p style="color:red;text-align:left">', '</p>'); endif;?>
																</div>
															</div>
														</div>
														
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="btn btn-info ">Submit</button>
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
						<br clear="all" />
                        
                    