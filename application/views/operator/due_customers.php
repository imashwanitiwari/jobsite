<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
		<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<!--<h5 class="txt-dark">Due Customers</h5>-->
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							<li ><span>Reports</span></li>
							<li class="active"><span>Due Customers</span></li>
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
										<h6 class="panel-title txt-dark">DUE CUSTOMERS</h6>
										
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="<?php echo site_url('operator/customers/find_due_cust') ;?>" id="add_customer" method="post">
														<div class="form-body">
															
															<hr class="light-grey-hr"/>
															
															<div class="row">
															    
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Area Wise</label>
																		<select class="form-control" name="AREA_ID" id="">
																		      <option value="null">--Do Not Use This Criteria--</option>
																			 <?php option_dif_where('areas','OP_ID='.$_SESSION['dcn_id'] ,'ID','NAME')?>
																			
																		</select>
																	</div>
															    </div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Due Date Wise</label>
																		
																		<select class="form-control" name="DATE_WISE" id="">
																		      <option value="null">--ALL--</option>
																			  <option value="1">1</option>
																			  <option value="2">2</option>
																			  <option value="3">3</option>
																			  <option value="4">4</option>
																			  <option value="5">5</option>
																			  <option value="6">6</option>
																			  <option value="7">7</option>
																			  <option value="8">8</option>
																			  <option value="9">9</option>
																			  <option value="10">10</option>
																			  <option value="11">11</option>
																			  <option value="12">12</option>
																			  <option value="13">13</option>
                                                                              <option value="14">14</option>
																			  <option value="15">15</option>
																			  <option value="16">16</option>
																			  <option value="17">17</option>
																			  <option value="18">18</option>
																			  <option value="19">19</option>
																			  <option value="20">20</option>
																			  <option value="21">21</option>
																			  <option value="22">22</option>
																			  <option value="23">23</option>
																			  <option value="24">24</option>
																			  <option value="25">25</option>
																			  <option value="26">26</option>
																			  <option value="27">27</option>
																			  <option value="28">28</option>
																			  <option value="29">29</option>
																			  <option value="30">30</option>
																			  <option value="31">31</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Month Wise</label>
																		
																		<select class="form-control" name="BILL_DUES_LIMIT" id="BILL_DUES_LIMIT">
																		      <option value="null">--ALL--</option>
																			  <option value="1">Jan</option>
																			  <option value="2">Feb</option>
																			  <option value="3">Mar</option>
																			  <option value="4">Apr</option>
																			  <option value="5">May</option>
																			  <option value="6">Jun</option>
																			  <option value="7">Jul</option>
																			  <option value="8">Aug</option>
																			  <option value="9">Sep</option>
																			  <option value="10">Oct</option>
																			  <option value="11">Nov</option>
																			  <option value="12">Dec</option>
																			  
																		</select>
																	</div>
																</div>

																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">year</label>
																		<select class="form-control" name="GENDER" id="GENDER">
																		      <option value="2013">2013</option>
																			  <option value="2014">2014</option>
																			  <option value="2013">2015</option>
																			  <option value="2013">2016</option>
																			  <option value="2013">2017</option>
																			  <option value="2018">2018</option>
																			  <option value="2019">2019</option>
																			  <option value="2020">2020</option>
																		</select>
																	</div>
															    </div>
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Status</label>
																		<select class="form-control" name="STATUS" id="">
																		      <option value="1">Active</option>
																			  <option value="0">Inactive</option>
																			  <option value="2">All</option>
																			
																		</select>
																	</div>
															    </div>
																
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">List Type</label>
																		<select class="form-control" name="LIST_TYPE" id="">
																		     
																			  <option value="1">Customer Wise</option>
																			  <option value="2">Box Wise</option>
																			
																		</select>
																	</div>
															    </div>
																
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Send SMS</label>
																		<select class="form-control" name="SEND_SMS" id="">
																		      <option value="0">False</option>
																			  <option value="1">True</option>
																			  
																			
																		</select>
																	</div>
															    </div>
																
															</div>
															
															
																</div>
															<!-- /Row -->
															
															<div class="form-actions mt-10">
															<button type="submit" class="btn btn-success  mr-10"> Submit</button>
															<button type="button" class="btn btn-danger">Cancel</button>
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
					<!-- /Row -->
					
					<div class="table-responsive"> 
						<table class="table table-bordered" id="due_cust" >
									<thead>
										<tr>
										    
											<th>Subscription No </th>
											<th>Name</th>
											<th>Address</th>
											<th>Area</th>
											<th>Primary VC</th>
											<th>Due Date</th>
											<th>Status</th>
											<th>Contact</th>
										</tr>
									</thead>
						
									<tfoot>
										<tr>
										    
											<th>Subscription No </th>
											<th>Name</th>
											<th>Address</th>
											<th>Area</th>
											<th>Primary VC</th>
											<th>Due Date</th>
											<th>Status</th>
											<th>Contact</th>
										</tr>
									</tfoot>
						</table>
					</div>
					
					<script>
					$(document).ready(function(){
						
					$("#due_cust").DataTable();	
						
						
						
					});
					
					
					
					
					
					
					</script>