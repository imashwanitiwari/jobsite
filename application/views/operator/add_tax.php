<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
			<?php if($this->session->flashdata('edit_tax')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> Tax Edited Successfuly.
									</div>
									<?php endif;?>
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Add Tax</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>Taxes</span></li>
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
										<h6 class="panel-title txt-dark">Add Tax</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_tax')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Tax Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('');?>">
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Tax Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="exampleInputuname_3" name="p_name" placeholder="Tax Name" required>
																</div>
															</div>
														</div>
														<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Tax Scope</h6>
												<div style="width:100%;height:auto;border:1px solid grey">
												
												<div class="panel-group" id="accordion">
															<div class="row">
															<div class="col-sm-4">
																<div class="panel panel-default">
																	<div class="panel-heading">
																		<h4 class="panel-title">
																			<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Installation</a>
																		</h4>
																	</div>
																	<div id="collapse1" class="panel-collapse collapse in">
																		<div class="panel-body">
																		<div class="form-group">
																        <label class="col-sm-3 control-label" for="mso">Charge Type:</label>
																      <div class="col-sm-9">
																        <div class="input-group">
																          <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="mso" class="form-control required" name="mso">
																	        <option>-Select-</option>
																					<option value="1">Percentage</option>
																					<option value="0">Flat</option>
																          </select>
																      	</div>  
																     </div>	
														       </div>
																	 <div class="form-group">
																			<label for="exampleInputuname_3" class="col-sm-3 control-label">Rate</label>
																			<div class="col-sm-9">
																				<div class="input-group">
																					<div class="input-group-addon"><i class="icon-user"></i></div>
																					<input type="text" class="form-control" id="exampleInputuname_3" name="mrp" placeholder="" required>
																				</div>
																			</div>
																	</div>
																		</div>
																</div>
																	</div>
																</div>
																<div class="col-sm-4">
																<div class="panel panel-default">
																	<div class="panel-heading">
																		<h4 class="panel-title">
																			<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Pack</a>
																		</h4>
																	</div>
																	<div id="collapse2" class="panel-collapse collapse">
																		<div class="panel-body">
																		<div class="form-group">
																        <label class="col-sm-3 control-label" for="mso">Charge Type:</label>
																      <div class="col-sm-9">
																        <div class="input-group">
																          <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="mso" class="form-control required" name="mso">
																	        <option>-Select-</option>
																					<option value="1">Percentage</option>
																					<option value="0">Flat</option>
																          </select>
																      	</div>  
																     </div>	
														       </div>
																	 <div class="form-group">
																			<label for="exampleInputuname_3" class="col-sm-3 control-label">Rate</label>
																			<div class="col-sm-9">
																				<div class="input-group">
																					<div class="input-group-addon"><i class="icon-user"></i></div>
																					<input type="text" class="form-control" id="exampleInputuname_3" name="mrp" placeholder="" required>
																				</div>
																			</div>
																	</div>
																		</div>
																	</div>
																</div>
																</div>
																<div class="col-sm-4">
																<div class="panel panel-default">
																	<div class="panel-heading">
																		<h4 class="panel-title">
																			<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">ALA-Carte</a>
																		</h4>
																	</div>
																	<div id="collapse3" class="panel-collapse collapse">
																		<div class="panel-body">
																		<div class="form-group">
																        <label class="col-sm-3 control-label" for="mso">Charge Type:</label>
																      <div class="col-sm-9">
																        <div class="input-group">
																          <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="mso" class="form-control required" name="mso">
																	        <option>-Select-</option>
																					<option value="1">Percentage</option>
																					<option value="0">Flat</option>
																          </select>
																      	</div>  
																     </div>	
														       </div>
																	 <div class="form-group">
																			<label for="exampleInputuname_3" class="col-sm-3 control-label">Rate</label>
																			<div class="col-sm-9">
																				<div class="input-group">
																					<div class="input-group-addon"><i class="icon-user"></i></div>
																					<input type="text" class="form-control" id="exampleInputuname_3" name="mrp" placeholder="" required>
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
					
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="button" name="add_tax" class="btn btn-info ">Submit</button>
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