<div class="wrapper theme-1-active pimary-color-red">
        <div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Company Set Top Box</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index-2.html">Dashboard</a></li>
						<li><a href="#"><span>table</span></a></li>
						<li class="active"><span>Company stb</span></li>
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
  <strong>Well done!</strong> This Box has been added successfully.</a>.
</div>
<?php endif;?>
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">company Set top box</h6>
								</div>
                                <div class="pull-right">
                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Set Top Box</button>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="_datatable" class="table table-hover display  pb-30" >
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
				<!-- /Row -->
                  <?php  echo form_open('admin/stbox/add_box')?>
                   
             
             
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h5 class="modal-title" id="exampleModalLabel1">Add Set Top Box</h5>
													</div>
													<div class="modal-body">
														
															<div class="form-group">
																<label for="recipient-name" class="control-label sm-5">STB No. *</label>
                                                                <input class="form-control" type="text" name="BOX_NO" maxlength="30" required>
															</div>
															<div class="form-group">
																<label for="message-text" class="control-label sm-5">Company * </label>
																<select class="form-control required" name="COMP_ID" required>
																<option></option>
																<?= option_dif('companies','ID','NAME');?>
																</select>
															</div>
                                                            <div class="form-group">
																<label for="message-text" class="control-label sm-5">Box Type *</label>
																<select class="form-control required" name="BOX_TYPE" required>
																<option></option>
																<?= option_dif('box_type','ID','BOX_TYPE');?>
																</select>
															</div>
															<div class="form-group">
																<label for="message-text" class="control-label sm-5">Warranty Type *</label>
																<select class="form-control required" name="WARRANTY_TYPE" required>
																<option></option>
																<?= option_dif('box_warranty','ID','WARRANTY_TYPE');?>
																</select>
															</div>
													</div>
                                                   
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
		
	
	