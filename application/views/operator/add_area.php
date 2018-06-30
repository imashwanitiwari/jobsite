<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Add Area</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>Add Area</span></li>
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
										<h6 class="panel-title txt-dark">Add Area</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('addarea')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Area Has Been Added Successfully.
									</div>
									<?php endif;
									if($this->session->flashdata('edit_area')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> Area Has Been Updated Successfully.
									</div>
									<?php endif;
									
									?>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('operator/add_area/addArea'); ?>">
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Area Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="exampleInputuname_3" name="areaname" placeholder="Area Name">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Total Houses</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="exampleInputuname_3" name="thouse" placeholder="Number Of Houses">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Remark</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="exampleInputuname_3" name="remark" placeholder="Remark">
																</div>
															</div>
														</div>
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="btn btn-info" name="area" <?php if(is_array($_SESSION['dcn_id'])){echo 'disabled';}?>>Submit</button>
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


					 <table class="table table-bordered" id="areaa">
								<thead>
									<tr>
										<th>Area Name</th>
										<th>Total Houses</th>
										<th>Remark</th>	
										<th>Edit</th>
									</tr>
								</thead>
					
					            <tfoot>
									<tr>
										<th>Area Name</th>
										<th>Total Houses</th>
										<th>Remark</th>	
										<th>Edit</th>
									</tr>
								</tfoot>
							</table>

			    <!-- Modal -->
  <div class="modal fade" id="area_model" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Area</h4>
        </div>
        <div class="modal-body">
		<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('operator/add_area/edit_area');?>">
														<div class="form-group">
															<label for="edit_area" class="col-sm-3 control-label">Area Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="edit_area" name="edit_area" placeholder="Area Name">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="edit_houses" class="col-sm-3 control-label">Total Houses</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="edit_houses" name="edit_houses" placeholder="Number Of Houses">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="edit_remark" class="col-sm-3 control-label">Remark</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="edit_remark" name="edit_remark" placeholder="Remark">
																</div>
															</div>
														</div>
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="btn btn-info" name="edit_area_submit" <?php if(is_array($_SESSION['dcn_id'])){echo 'disabled';}?>>Submit</button>
															</div>
														</div>
														<input type="hidden" name="AREA_ID" id="AREA_ID" value="">
													</form>
												</div>
											</div>
										</div>
		  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>				














