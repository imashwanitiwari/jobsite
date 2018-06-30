

<!-- Main Content -->

 
	<div class="page-wrapper">
    
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark"> Staff</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>Staff</span></li>
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
										<h6 class="panel-title txt-dark">Add Staff Member</h6>
									</div>
									<div class="clearfix"></div>
								</div>
                                
								<?php if($this->session->flashdata('msg')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Staff Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
                                            
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('operator/addStaff/add_member');?>">
                                                   
                                                          <div class="form-group">
                                                          
															<label for="" class="col-sm-3 control-label">First Name*</label>
															<?php echo form_error('F_NAME'); ?>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="" name="F_NAME" value="<?php echo set_value('F_NAME'); ?>" placeholder="First Name">
																</div>
															</div>
														</div>
                                                    
														<div class="form-group">
															<label for="" class="col-sm-3 control-label">Last Name</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="" name="L_NAME" value="<?php echo set_value('L_NAME'); ?>"placeholder="Last Name">
																</div>
															</div>
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="mso">Select Type:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="mso" class="form-control required" name="TYPE" value="<?php echo set_value('TYPE'); ?>">
                                                                            <?php 
                                                                            $array = array('OP_ID' => $this->session->userdata('dcn_id'));
                                                                            option_where('staff_types',$array,'NAME');
                                                                            
                                                                            ?>
																          </select>
																	</div>  
																</div>	
														</div>
														<!-- <div class="form-group">
																<label class="col-sm-3 control-label" for="mso">Select Area:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="pack" class="form-control required" name="AREA_ID" value="<?php echo set_value('AREA_ID'); ?>">
                                                                            <?php 
                                                                            $array = array('OP_ID' => $this->session->userdata('dcn_id'));
																			option_dif_where('areas',$array,'ID','NAME');
																		   ?>
																          </select>
																	</div>  
																</div>	
														</div> -->
														<div class="form-group">
																<label class="col-sm-3 control-label" for="mso">Select Area:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="pack" class="form-control required chosen-select" name="AREA_ID[]" data-placeholder="Choose An Area..." value="<?php echo set_value('AREA_ID'); ?>" multiple>
                                                                            <?php 
                                                                            $array = array('OP_ID' => $this->session->userdata('dcn_id'));
																			option_dif_where('areas',$array,'ID','NAME');
                                                                            ?>
																          </select>
																	</div>  
																</div>	
														</div>
                                                        <div class="form-group">
                                                        
															<label for="" class="col-sm-3 control-label">Address*</label>
															<?php echo form_error('ADDRESS'); ?>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="" name="ADDRESS" value="<?php echo set_value('ADDRESS'); ?>"placeholder="Fill Adress">
																</div>
															</div>
														</div>

                                                        

                                                        <div class="form-group">
															<label for="" class="col-sm-3 control-label">Email</label>
															<?php echo form_error('EMAIL'); ?>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="" name="EMAIL" value="<?php echo set_value('EMAIL'); ?>"placeholder="Email">
																</div>
															</div>
														</div>
                                                        <div class="form-group">
															<label for="" class="col-sm-3 control-label">ADHAR</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="" name="ADHAR" value="<?php echo set_value('ADHAR'); ?>" placeholder="ADHAR">
																</div>
															</div>
														</div>
                                                        <div class="form-group">
															<label for="" class="col-sm-3 control-label">PAN</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="" name="PAN" value="<?php echo set_value('PAN'); ?>" placeholder="PAN">
																</div>
															</div>
														</div>
                                                        <div class="form-group">
															<label for="" class="col-sm-3 control-label">GST</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="" name="GST" value="<?php echo set_value('GST'); ?>" placeholder="GST">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="" class="col-sm-3 control-label">User Name</label>
															<?php echo form_error('USER_NAME'); ?>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="" name="USER_NAME" value="<?php echo set_value('USER_NAME'); ?>" placeholder="User Name">
																</div>
															</div>
														</div>
                                                        <div class="form-group">
															<label for="" class="col-sm-3 control-label">Password</label>
															<?php echo form_error('PASSWORD'); ?>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="password" class="form-control" id="" name="PASSWORD" value="<?php echo set_value('PASSWORD'); ?>"placeholder="Password">
																</div>
															</div>
														</div>
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" name="add_staff" class="btn btn-info ">Submit</button>
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
										<h6 class="panel-title txt-dark">Add Staff Type</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_staff_type')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Staff Type Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('operator/addStaff/add_type');?>">
														<div class="form-group">
															<label for="" class="col-sm-3 control-label">Staff Type*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" name="NAME" id="" placeholder="Staff Type">
																</div>
															</div>
														</div>
														
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" name="pack_type"class="btn btn-info ">Submit</button>
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

					<script src="<?php echo base_url('js/chosen.jquery.min.js');?>"></script>
	                <script src="<?php echo base_url('js/chosen.proto.min.js');?>"></script>
					<script>
					$(document).ready(function(){
              
						$(".chosen-select").chosen();

					});
					
					
					
					</script>