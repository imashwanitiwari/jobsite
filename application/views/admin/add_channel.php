<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Add Channel</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?= base_url('admin/dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>Add Channel</span></li>
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
										<h6 class="panel-title txt-dark">Add Channel</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_new_channel')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Channel Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('admin/add_channel/add_new_channel');?>">
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Channel Name *</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="exampleInputuname_3" name="NAME" placeholder="Channel Name">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Channel Company</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<select id="mso" class="form-control required" name="CH_COMP_ID">
																	       <?php option_dif("channel_companies","ID","NAME");?>
																    </select>
																</div>
															</div>
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="CHANNEL TYPE">Channel Type</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="mso" class="form-control required" name="CH_TYPE_ID">
																	       <?php option_dif("channel_types","ID","NAME");?>
																          </select>
																	</div>  
																</div>	
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="mso">Channel Category</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="pack" class="form-control required" name="CAT_ID">
																            <?php  option_dif("channel_categories","ID","NAME");?>                                                                            
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
										<h6 class="panel-title txt-dark">Add Channel Company</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_channel_company')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Company Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('admin/add_channel/add_channel_company');?>">
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Company Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" name="NAME" id="exampleInputuname_3" placeholder="Company Name" maxlength="50" VALUE="<?php if($this->session->flashdata('company_validation_fail')): echo set_value('NAME'); endif;?>" >
																	<?php if($this->session->flashdata('company_validation_fail')): echo form_error('NAME', '<p style="color:red;text-align:left">', '</p>'); endif;?>
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
                        <div class="col-md-6">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Add Channel Type</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_channel_type')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Channel Type Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('admin/add_channel/add_channel_type');?>">
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Channel Type*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" name="NAME" id="exampleInputuname_3" placeholder="Channel Type" maxlength="10" value="<?php if($this->session->flashdata('company_type_validation_fail')): echo set_value('NAME'); endif;?>" >
																	<?php if($this->session->flashdata('company_type_validation_fail')): echo form_error('NAME', '<p style="color:red;text-align:left">', '</p>'); endif;?>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label"> Description*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" name="DESCRIPTION" id="exampleInputuname_3" placeholder="Channel Description" maxlength="200">
																</div>
															</div>
														</div>
														
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label"> Remark*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" name="REMARK" id="exampleInputuname_3" placeholder="Channel Remark" maxlength="100">
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
										<h6 class="panel-title txt-dark">Add Channel Category</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_channel_category')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Channel Category Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('admin/add_channel/add_channel_category');?>">
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Channel Category*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" name="NAME" id="exampleInputuname_3" placeholder="Channel Type" maxlength="50" >
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label"> Description*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" name="DESCRIPTION" id="exampleInputuname_3" placeholder="Channel Description" maxlength="200">
																</div>
															</div>
														</div>
														
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label"> Remark*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" name="REMARK" id="exampleInputuname_3" placeholder="Channel Remark" maxlength="100">
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
                    