

	<div class="wrapper theme-1-active pimary-color-red">
          <div class="page-wrapper">
				<div class="container-fluid">
				
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">MSO</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?= base_url('admin/dashboard')?>">Dashboard</a></li>
							<li><a href="#"><span>MSO</span></a></li>
							<li class="active"><span>Add mso</span></li>
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
										<h6 class="panel-title txt-dark">Add MSO</h6>
									</div>
									<div class="clearfix"></div>
                                    <?php if($this->session->flashdata('add_mso')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This MSO Type Has Been Added Successfully.
									</div>
									<?php endif;?>
					
        
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<?=form_open('admin/mso/add_mso')?>
														<div class="form-body">
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Person's Info</h6>
															<hr class="light-grey-hr"/>
                                                            <div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">First Name *</label>
																		<input type="text" id="firstName" class="form-control" placeholder="First Name" name="FIRST_NAME" value="<?= set_value('FIRST_NAME');?>" maxlength="30" required />
                                                                        <?php echo form_error('FIRST_NAME', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Middle Name *</label>
																		<input type="text" id="lastName" class="form-control" placeholder="Middle Name" name="MIDDLE_NAME" value="<?= set_value('MIDDLE_NAME');?>" maxlength="30" />
                                                                        <?php echo form_error('MIDDLE_NAME', '<p style="color:red;text-align:left">', '</p>');?>
                                                                    </div>
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
                                                            <div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Last Name *</label>
																		<input type="text" id="firstName" class="form-control" placeholder="Last Name" name="LAST_NAME" value="<?= set_value('LAST_NAME');?>" maxlength="30" required />
                                                                        <?php echo form_error('LAST_NAME', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Firm Name *</label>
																		<input type="text" id="lastName" class="form-control" placeholder="Firm Name" name="FIRM_NAME" value="<?= set_value('FIRM_NAME');?>" maxlength="60" required />
                                                                        <?php echo form_error('FIRM_NAME', '<p style="color:red;text-align:left">', '</p>');?>
                                                                    </div>
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Mobile *</label>
																		<input type="text" class="form-control" placeholder="Mobile" name="MOBILE" value="<?= set_value('MOBILE');?>" maxlength="10" required />
                                                                        <?php echo form_error('MOBILE', '<p style="color:red;text-align:left">', '</p>');?>
																		
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Alternate Mobile</label>
																		<input type="text" class="form-control" placeholder="Mobile" name="ALT_MOBILE" value="<?= set_value('ALT_MOBILE');?>" maxlength="10" />
                                                                        <?php echo form_error('ALT_MOBILE', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
                                                            <div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Phone</label>
																		<input type="text" class="form-control" placeholder="Mobile" name="PHONE" value="<?= set_value('PHONE');?>" maxlength="12" />
                                                                        <?php echo form_error('PHONE', '<p style="color:red;text-align:left">', '</p>');?>
																		
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Eamil *</label>
																		<input type="email" class="form-control" placeholder="Email" name="EMAIL" value="<?= set_value('EMAIL');?>" maxlength="40" required />
                                                                        <?php echo form_error('EMAIL', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																<!--/span-->
															</div>
                                                            <!-- /Row -->
                                                                <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label mb-10">PAN Card No.</label>
                                                                        <input type="text" class="form-control" placeholder="PAN Card No." name="PAN" value="<?= set_value('PAN');?>" maxlength="10" />
                                                                        <?php echo form_error('PAN', '<p style="color:red;text-align:left">', '</p>');?>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label mb-10">GSTIN</label>
                                                                        <input type="text" class="form-control" placeholder="GSTIN" name="GST" value="<?= set_value('GST');?>" maxlength="15" />
                                                                        <?php echo form_error('GST', '<p style="color:red;text-align:left">', '</p>');?>
                                                                    </div>
                                                            </div>
                                                            <!--/span-->
															</div>
															<!-- /Row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label mb-10">Aadhar</label>
                                                                        <input type="text" class="form-control" placeholder="Aadhar Card No." name="ADHAR" value="<?= set_value('ADHAR');?>" maxlength="12" />
                                                                        <?php echo form_error('ADHAR', '<p style="color:red;text-align:left">', '</p>');?>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label mb-10">Company</label>
                                                                       <select name="COMP_ID" class="form-control required" required>
\                                                                           <option></option>
																	       <?php option_dif("companies","ID","NAME");?>
                                                                       </select>
                                                                    </div>
                                                                </div>
                                                               
															</div>
															
															<div class="seprator-block"></div>
															
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>address</h6>
                                                            <hr class="light-grey-hr"/>
                                                            
															<div class="row">
																<div class="col-md-12 ">
																	<div class="form-group">
																		<label class="control-label mb-10">Street</label>
                                                                        <input type="text" class="form-control" placeholder="" name="ADDRESS" value="<?= set_value('ADDRESS');?>" maxlength="70" />
                                                                        <?php echo form_error('ADDRESS', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
                                                            </div>
                                                            	<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Office No. *</label>
																		<input type="text" class="form-control" placeholder="" name="OFFICE_NO" value="<?= set_value('OFFICE_NO');?>" maxlength="6" required />
                                                                        <?php echo form_error('OFFICE_NO', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Post Code *</label>
																		<input type="text" class="form-control" placeholder="" name="PINCODE" value="<?= set_value('PINCODE');?>" maxlength="6" required />
                                                                        <?php echo form_error('PINCODE', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																
															</div>
														</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">City</label>
																		<input type="text" class="form-control" placeholder="" name="CITY" value="<?= set_value('CITY');?>" maxlength="30" />
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">State</label>
																		<input type="text" class="form-control" placeholder="" name="STATE" value="<?= set_value('STATE');?>" maxlength="50" />
                                                                        <?php echo form_error('STATE', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																<!--/span-->
															</div>
														
                                                        <div class="seprator-block"></div>
															
															<h6 class="txt-dark capitalize-font"><i class="fa fa-book"></i> account</h6>
															<hr class="light-grey-hr"/>
															
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Username *</label>
																		<input type="text" class="form-control" placeholder="" name="USER_NAME" value="<?= set_value('USER_NAME');?>" maxlength="30" required />
                                                                        <?php echo form_error('USER_NAME', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																
															</div>
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Password *</label>
																		<input type="password" class="form-control" placeholder="" name="PASSWORD" value="" maxlength="15" required />
                                                                        <?php echo form_error('PASSWORD', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																
															</div>
														</div>
                                                        	<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Retype Password *</label>
																		<input type="password" class="form-control" placeholder="" name="PASSCONF" value="" maxlength="15" required />
                                                                        <?php echo form_error('PASSCONF', '<p style="color:red;text-align:left">', '</p>');?>
																	</div>
																</div>
																
															</div>
														</div>
														<div class="form-actions mt-10">
															<button type="submit" class="btn btn-success  mr-10"> Save</button>
															<button type="reset" class="btn btn-default">Cancel</button>
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