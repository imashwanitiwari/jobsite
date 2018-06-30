                    
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
							<li><a href="#">Company</a></li>
							<li class="active"><span>Add Company VC</span></li>
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
										<h6 class="panel-title txt-dark">Add Comapnay VC</h6>
									</div>
									<div class="clearfix"></div>
                                    <?php if($this->session->flashdata('add_company_vc')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This VC Has Been Added Successfully.
									</div>
									<?php endif;?>
					
        
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<?=form_open('admin/company/add_vc')?>
														<div class="form-body">
															
															<h6 class="txt-dark capitalize-font"><i class="fa fa-user"></i> company info</h6>
															<hr class="light-grey-hr"/>
															
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">VC No. *</label>
																		<input type="text" class="form-control" placeholder="" name="VC_NO" value="<?= set_value('VC_NO');?>" maxlength="50" required />
                                                                        <?php echo form_error('VC_NO', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																
															</div>
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Company *</label>
																		<select id="mso" class="form-control required" name="COMP_ID" required>
                                                                            <option></option>
																	       <?php option_dif("companies","ID","NAME");?>
																    </select>
                                                                        <?php echo form_error('COMP_ID', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																
															</div>
														</div>
                                                        	<!-- /Row -->
															
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