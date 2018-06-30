<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Staff List</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>staff</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				<?php if($this->session->flashdata('edit_staff')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> Staff Has Been Updated Successfully.
									</div>
									<?php endif;?>
                <table class="table table-bordered" id="stafff">
								<thead>
									<tr>
										<th>First Name</th>
										<th>Last Name</th>
										<th>ADDRESS</th>	
										<th>EMAIL</th>
										<th>USERNAME</th>
										<th>ROLE</th>
										<th>AREA</th>
										<th>JOINING DATE</th>	
										<th>EDIT </th>
									</tr>
								</thead>
					
					
							</table>

		<!-- Staff Modal -->
		<div class="modal fade" id="staff_model" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Staff</h4>
        </div>
        <div class="modal-body">
		<div class="row">
											<div class="col-sm-12 col-xs-12">
                                            
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('operator/addStaff/edit_staff');?>">
                                                   
                                                          <div class="form-group">
                                                          
															<label for="" class="col-sm-3 control-label">First Name*</label>
															<?php echo form_error('F_NAME'); ?>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="F_NAME" name="F_NAME" value="<?php echo set_value('F_NAME'); ?>" placeholder="First Name">
																</div>
															</div>
														</div>
                                                    
														<div class="form-group">
															<label for="" class="col-sm-3 control-label">Last Name</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="L_NAME" name="L_NAME" value="<?php echo set_value('L_NAME'); ?>"placeholder="Last Name">
																</div>
															</div>
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="TYPE">Select Type:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="TYPE" class="form-control required" name="TYPE" value="<?php echo set_value('TYPE'); ?>">
                                                                            <?php 
                                                                            /* $array = array('OP_ID' => $this->session->userdata('dcn_id'));
                                                                            option_dif_where('staff_types',$array,'ID','NAME'); */
                                                                            
                                                                            ?>
																          </select>
																	</div>  
																</div>	
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="AREA_ID">Select Area:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="AREA_ID" class="form-control required" name="AREA_ID" value="<?php echo set_value('AREA_ID'); ?>">
                                                                            <?php 
                                                                            /* $array = array('OP_ID' => $this->session->userdata('dcn_id'));
																			option_dif_where('areas',$array,'ID','NAME'); */
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
																	<input type="text" class="form-control" id="ADDRESS" name="ADDRESS" value="<?php echo set_value('ADDRESS'); ?>"placeholder="Fill Adress">
																</div>
															</div>
														</div>

                                                        

                                                        <div class="form-group">
															<label for="" class="col-sm-3 control-label">Email</label>
															<?php echo form_error('EMAIL'); ?>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="EMAIL" name="EMAIL" value="<?php echo set_value('EMAIL'); ?>"placeholder="Email">
																</div>
															</div>
														</div>
                                                        <div class="form-group">
															<label for="" class="col-sm-3 control-label">ADHAR</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="ADHAR" name="ADHAR" value="<?php echo set_value('ADHAR'); ?>" placeholder="ADHAR">
																</div>
															</div>
														</div>
                                                        <div class="form-group">
															<label for="PAN" class="col-sm-3 control-label">PAN</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="PAN" name="PAN" value="<?php echo set_value('PAN'); ?>" placeholder="PAN">
																</div>
															</div>
														</div>
                                                        <div class="form-group">
															<label for="GST" class="col-sm-3 control-label">GST</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="GST" name="GST" value="<?php echo set_value('GST'); ?>" placeholder="GST">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="USER_NAME" class="col-sm-3 control-label">User Name</label>
															<?php echo form_error('USER_NAME'); ?>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="USER_NAME" name="USER_NAME" value="<?php echo set_value('USER_NAME'); ?>" placeholder="User Name">
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
														<input type="hidden" name="STAFF_ID" id="STAFF_ID" value="">
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