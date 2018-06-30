<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
			<?php if($this->session->flashdata('edit_pack')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> Package Edited Successfuly.
									</div>
									<?php endif;?>
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Add Package</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>Packages</span></li>
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
										<h6 class="panel-title txt-dark">Add Package</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_pack')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Package Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('operator/packages/add_package');?>">
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Pack Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="exampleInputuname_3" name="p_name" placeholder="Pack Name" required>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="cost" class="col-sm-3 control-label">Cost Price</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="cost" name="COST_PRICE" placeholder="" required>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Selling Price</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="exampleInputuname_3" name="mrp" placeholder="Pack Amount" required>
																</div>
															</div>
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="mso">Select MSO:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="mso" class="form-control required" name="mso">
																	        <?php foreach ($list_item as $item):?>
																            <option value="<?php echo $item['FIRM_NAME'];?>"><?php echo $item['FIRM_NAME'];?></option>
															                <?php endforeach;?>
																          </select>
																	</div>  
																</div>	
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="pack">Select Pack Type:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="pack" class="form-control required" name="packtype">
																	        <?php foreach ($pack_item as $item):?>
																            <option value="<?php echo $item['NAME'];?>"><?php echo $item['NAME'];?></option>
															                <?php endforeach;?>
																          </select>
																	</div>  
																</div>	
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="pack_create">Created By:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="pack_create" class="form-control required" name="createdby">
																	        
																            <option value="1">MSO</option>
																			<option value="2">ME</option>
															                
																          </select>
																	</div>  
																</div>	
														</div>

														<div class="form-group">
																<label class="col-sm-3 control-label" for="service">Service:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="service" class="form-control required" name="service">
																	        <option value="1">Cable TV</option>
																			<option value="2">Internet</option>
															                <option value="3">Phone</option>
																          </select>
																	</div>  
																</div>	
														</div>
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="button" name="add_pack" class="btn btn-info" <?php if(is_array($_SESSION['dcn_id'])){echo 'disabled';}?>>Submit</button>
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
										<h6 class="panel-title txt-dark">Add Pack Type</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_pack_type')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Pack Type Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('operator/packages/pack_type');?>">
														<div class="form-group">
															<label for="exampleInputuname_3" class="col-sm-3 control-label">Pack Type*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" name="type" id="exampleInputuname_3" placeholder="Pack Type" required>
																</div>
															</div>
														</div>
														
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="button" name="pack_type"class="btn btn-info ">Submit</button>
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
					
					<div class="table-responsive"> 
						<table class="table table-bordered" id="packk" >
									<thead>
										<tr>
										    
											<th>Pack Name</th>
											<th>Pack Type</th>
											<th>MSO</th>
											<th>Created By</th>
											<th>Service</th>
											<th>Amount</th>
											<th>Add Channel</th>
											<th></th>
										</tr>
									</thead>
						
									<tfoot>
										<tr>
										    
											<th>Pack Name</th>
											<th>Pack Type</th>
											<th>MSO</th>
											<th>Created By</th>
											<th>Service</th>
											<th>Amount</th>
										    <th>Add Channel</th>
											<th></th>
										</tr>
									</tfoot>
						</table>
					</div>
					
					<div class="container">
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Pack</h4>
									</div>
									<div class="modal-body">
									
									<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('operator/packages/edit_pack');?>">
														<div class="form-group">
															<label for="PACK_NAME" class="col-sm-3 control-label">Pack Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="PACK_NAME" name="PACK_NAME" placeholder="Pack Name" required>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="PACK_AMOUNT" class="col-sm-3 control-label">Pack Amount</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="PACK_AMOUNT" name="PACK_AMOUNT" placeholder="Pack Amount" required>
																</div>
															</div>
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="MSO_ID">Select MSO:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="MSO_ID" class="form-control required" name="MSO_ID">
																	        <?php foreach ($list_item as $item):?>
																            <option value="<?php echo $item['ID'];?>"><?php echo $item['FIRM_NAME'];?></option>
															                <?php endforeach;?>
																          </select>
																	</div>  
																</div>	
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="P_TYPE_ID">Select Pack Type:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="P_TYPE_ID" class="form-control required" name="P_TYPE_ID">
																	        <?php foreach ($pack_item as $item):?>
																            <option value="<?php echo $item['ID'];?>"><?php echo $item['NAME'];?></option>
															                <?php endforeach;?>
																          </select>
																	</div>  
																</div>	
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="CREATED_BY">Created By:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="CREATED_BY" class="form-control required" name="CREATED_BY">
																	        
																            <option value="1">MSO</option>
																			<option value="2">ME</option>
															                
																          </select>
																	</div>  
																</div>	
														</div>

														<div class="form-group">
																<label class="col-sm-3 control-label" for="SERVICE_TYPE">Service:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="SERVICE_TYPE" class="form-control required" name="SERVICE_TYPE">
																	        <option value="1">Cable TV</option>
																			<option value="2">Internet</option>
															                <option value="3">Phone</option>
																          </select>
																	</div>  
																</div>	
														</div>
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="button" name="" class="btn btn-info ">Submit</button>
															</div>
														</div>
														<input type="hidden" name="PACK_I" id="PACK_I" value="">
													</form>
													</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div> 
								 </div> 
							 </div>
						 </div>
					 </div>
							